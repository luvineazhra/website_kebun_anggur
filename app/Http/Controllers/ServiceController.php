<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('services.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'visit_date' => 'required|date|after_or_equal:today',
            'visit_count' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string',
            'payment_method' => 'required|in:Transfer BCA,Transfer BRI,Transfer Mandiri',
        ]);

        $totalPrice = $request->visit_count * 250000;
        $orderNumber = 'SVC-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(4));
        
        $bankCodes = [
            'Transfer BCA' => '8888',
            'Transfer BRI' => '7777',
            'Transfer Mandiri' => '9999',
        ];
        $bankCode = $bankCodes[$request->payment_method] ?? '0000';
        $virtualAccount = $bankCode . rand(1000000000, 9999999999);

        $service = Service::create([
            'user_id' => Auth::id(),
            'order_number' => $orderNumber,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'visit_date' => $request->visit_date,
            'visit_count' => $request->visit_count,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
            'virtual_account' => $virtualAccount,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        return redirect()->route('payment.show', $service->order_number)
            ->with('success', 'Booking layanan berhasil! Silakan lakukan pembayaran.');
    }
}