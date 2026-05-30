<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $query = Order::with('user');

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id): View
    {
        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function verify($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'confirmed']);

        // Reduce stock
        $orderItems = OrderItem::where('order_id', $id)->get();
        foreach ($orderItems as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $product->decrement('stock', $item->quantity);
            }
        }

        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil diverifikasi.');
    }

    public function reject(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'notes' => 'nullable|string',
        ]);

        $order->update([
            'status' => 'rejected',
            'notes' => $request->notes . "\n[Ditolak: " . now()->format('d M Y H:i') . "]",
        ]);

        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil ditolak.');
    }
}
