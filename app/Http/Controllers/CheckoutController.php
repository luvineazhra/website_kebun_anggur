<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(): View
    {
        $carts = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        $total = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price;
        });

        return view('checkout.index', compact('carts', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'notes' => 'nullable|string',
            'payment_method' => 'required|in:Transfer BCA,Transfer BRI,Transfer Mandiri',
        ]);

        $carts = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        $total = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price;
        });

        $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $bankCodes = [
            'Transfer BCA' => '8888',
            'Transfer BRI' => '7777',
            'Transfer Mandiri' => '9999',
        ];
        $bankCode = $bankCodes[$request->payment_method] ?? '0000';
        $virtualAccount = $bankCode . rand(1000000000, 9999999999);

        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => $orderNumber,
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'virtual_account' => $virtualAccount,
            'notes' => $request->notes,
        ]);

        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);
        }

        // Clear cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('payment.show', $order->order_number)
            ->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');
    }
}