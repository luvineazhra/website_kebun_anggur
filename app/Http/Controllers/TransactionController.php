<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\TrainingRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function index(): View
    {
        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)->get()->map(function ($item) {
            $item->type = 'Produk';
            $item->url = route('payment.show', $item->order_number);
            return $item;
        });

        $services = Service::where('user_id', $userId)->get()->map(function ($item) {
            $item->type = 'Layanan';
            $item->url = route('payment.show', $item->order_number);
            return $item;
        });

        $trainings = TrainingRegistration::with('training')->where('user_id', $userId)->get()->map(function ($item) {
            $item->type = 'Pelatihan';
            $item->url = route('payment.show', $item->order_number);
            return $item;
        });

        $transactions = $orders->concat($services)->concat($trainings)->sortByDesc('created_at');

        return view('transactions.index', compact('transactions'));
    }

    public function showReceipt($orderNumber): View
    {
        $user = Auth::user();
        $orderNumber = trim($orderNumber);
        $transaction = null;
        $type = '';

        $query = function($model, $with = []) use ($orderNumber, $user) {
            $q = $model::where('order_number', $orderNumber);
            if (!empty($with)) {
                $q->with($with);
            }
            // If not admin, must own the transaction
            if (!$user->isAdmin()) {
                $q->where('user_id', $user->id);
            }
            return $q->first();
        };

        // 1. Try with prefix
        if (str_starts_with($orderNumber, 'ORD-')) {
            $transaction = $query(Order::class, ['user', 'orderItems.product']);
            if ($transaction) $type = 'Produk';
        } elseif (str_starts_with($orderNumber, 'SVC-')) {
            $transaction = $query(Service::class, ['user']);
            if ($transaction) $type = 'Layanan';
        } elseif (str_starts_with($orderNumber, 'TRN-')) {
            $transaction = $query(TrainingRegistration::class, ['user', 'training']);
            if ($transaction) $type = 'Pelatihan';
        }

        // 2. Fallback: Search all tables
        if (!$transaction) {
            $transaction = $query(Order::class, ['user', 'orderItems.product']);
            if ($transaction) {
                $type = 'Produk';
            } else {
                $transaction = $query(Service::class, ['user']);
                if ($transaction) {
                    $type = 'Layanan';
                } else {
                    $transaction = $query(TrainingRegistration::class, ['user', 'training']);
                    if ($transaction) {
                        $type = 'Pelatihan';
                    }
                }
            }
        }

        if (!$transaction) {
            abort(404, 'Bukti transaksi tidak ditemukan.');
        }

        // Allow viewing receipt if status is confirmed or completed
        // For admins, allow viewing regardless of status (useful for previewing)
        if (!$user->isAdmin() && $transaction->status !== 'confirmed' && $transaction->status !== 'completed') {
            abort(403, 'Bukti transaksi belum tersedia. Menunggu verifikasi admin.');
        }

        return view('transactions.receipt', compact('transaction', 'type'));
    }
}
