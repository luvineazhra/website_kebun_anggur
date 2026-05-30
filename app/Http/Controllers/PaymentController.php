<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private function findTransaction($orderNumber)
    {
        $user = Auth::user();
        $orderNumber = trim($orderNumber);
        
        $query = function($model) use ($orderNumber, $user) {
            $q = $model::where('order_number', $orderNumber);
            // If not admin, must own the transaction
            if (!$user->isAdmin()) {
                $q->where('user_id', $user->id);
            }
            return $q->first();
        };

        // 1. Try based on prefix first (optimization)
        if (str_starts_with($orderNumber, 'ORD-')) {
            $transaction = $query(\App\Models\Order::class);
            if ($transaction) return $transaction;
        } elseif (str_starts_with($orderNumber, 'SVC-')) {
            $transaction = $query(\App\Models\Service::class);
            if ($transaction) return $transaction;
        } elseif (str_starts_with($orderNumber, 'TRN-')) {
            $transaction = $query(\App\Models\TrainingRegistration::class);
            if ($transaction) return $transaction;
        }
        
        // 2. Fallback: Search all tables
        $transaction = $query(\App\Models\Order::class);
        if ($transaction) return $transaction;
        
        $transaction = $query(\App\Models\Service::class);
        if ($transaction) return $transaction;
        
        $transaction = $query(\App\Models\TrainingRegistration::class);
        if ($transaction) return $transaction;
        
        abort(404, 'Transaksi tidak ditemukan.');
    }

    public function show($orderNumber): View
    {
        $order = $this->findTransaction($orderNumber);
        return view('payment.show', compact('order'));
    }

    public function upload(Request $request, $orderNumber)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $order = $this->findTransaction($orderNumber);

        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = 'payment_' . $orderNumber . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/payments', $filename);

            $order->update([
                'payment_proof' => $filename,
            ]);
            
            // For orders, status 'paid' means proof uploaded. 
            // For Services and Training, we keep 'pending' until admin confirms.
            if ($order instanceof \App\Models\Order) {
                $order->update(['status' => 'paid']);
            }
        }

        return redirect()->route('payment.show', $orderNumber)
            ->with('success', 'Bukti pembayaran berhasil diupload! Menunggu verifikasi dari admin.');
    }
}