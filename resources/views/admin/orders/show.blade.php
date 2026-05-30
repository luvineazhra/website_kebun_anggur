@extends('admin.layout')

@section('title', 'Detail Pesanan')
@section('header', 'Detail Pesanan')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Order Info -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pesanan</h3>
        <div class="space-y-3">
            <div class="flex justify-between">
                <span class="text-gray-600">No. Pesanan:</span>
                <span class="font-semibold">{{ $order->order_number }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Customer:</span>
                <span>{{ $order->user->name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Email:</span>
                <span>{{ $order->user->email }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Total:</span>
                <span class="font-bold text-green-600">{{ $order->formatted_total }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Status:</span>
                <span class="px-2 py-1 rounded text-xs font-semibold {{ $order->status === 'confirmed' ? 'bg-green-100 text-green-800' : ($order->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Metode Pembayaran:</span>
                <span>{{ $order->payment_method }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Virtual Account:</span>
                <span class="font-mono">{{ $order->virtual_account }}</span>
            </div>
            @if($order->notes)
            <div class="flex justify-between">
                <span class="text-gray-600">Catatan:</span>
                <span>{{ $order->notes }}</span>
            </div>
            @endif
        </div>
    </div>

    <!-- Order Items -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Item Pesanan</h3>
        <div class="space-y-3">
            @foreach($order->orderItems as $item)
                <div class="flex justify-between items-center border-b pb-2">
                    <div>
                        <p class="font-semibold">{{ $item->product->name }}</p>
                        <p class="text-sm text-gray-500">{{ $item->quantity }} x {{ $item->product->formatted_price }}</p>
                    </div>
                    <span class="font-semibold">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Payment Proof -->
@if($order->payment_proof)
<div class="bg-white rounded-lg shadow p-6 mt-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Bukti Pembayaran</h3>
    <img src="{{ asset('storage/payments/' . $order->payment_proof) }}" alt="Bukti Pembayaran" class="max-w-md rounded-lg">
</div>
@endif

<!-- Actions -->
<div class="bg-white rounded-lg shadow p-6 mt-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Aksi</h3>
    @if($order->status === 'paid')
        <form action="{{ route('admin.pesanan.verify', $order->id) }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mr-2">Verifikasi (Setuju)</button>
        </form>
        <form action="{{ route('admin.pesanan.reject', $order->id) }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('Tolak pesanan ini?')">Tolak</button>
        </form>
    @else
        <p class="text-gray-500">Pesanan sudah diproses.</p>
    @endif
    <a href="{{ route('admin.pesanan.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">← Kembali</a>
</div>
@endsection