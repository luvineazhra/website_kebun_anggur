@extends('layouts.app')

@section('title', 'Pembayaran - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Pembayaran Pesanan</h1>
            
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <p class="text-green-800 font-semibold">Nomor Pesanan: {{ $order->order_number }}</p>
            </div>
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Informasi Pembayaran</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="mb-2"><span class="text-gray-600">Virtual Account:</span> <span class="font-bold text-xl text-green-600">{{ $order->virtual_account }}</span></p>
                    <p class="mb-2"><span class="text-gray-600">Total Tagihan:</span> <span class="font-bold text-xl">{{ $order->formatted_total }}</span></p>
                    <p><span class="text-gray-600">Metode:</span> {{ $order->payment_method }}</p>
                </div>
            </div>
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Upload Bukti Pembayaran</h3>
                @if($order->payment_proof)
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                        <p class="text-green-700">✓ Bukti pembayaran sudah diupload. Menunggu verifikasi admin.</p>
                    </div>
                @else
                    <form action="{{ route('payment.upload', $order->order_number) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Transfer (JPG/PNG, max 2MB)</label>
                            <input type="file" name="payment_proof" accept="image/jpeg,image/png" class="w-full border rounded-lg px-4 py-2" required>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">Upload Bukti Bayar</button>
                    </form>
                @endif
            </div>
            
            <div class="border-t pt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Status Pesanan</h3>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $order->status === 'confirmed' ? 'bg-green-100 text-green-800' : ($order->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>
            
            <div class="mt-6">
                <a href="{{ route('home') }}" class="text-green-600 hover:text-green-700">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>
@endsection