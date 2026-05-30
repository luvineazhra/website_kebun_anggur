@extends('layouts.app')

@section('title', 'Checkout - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Checkout</h1>
        
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pengiriman</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                                <textarea name="notes" rows="3" class="w-full border rounded-lg px-4 py-2" placeholder="Catatan untuk pesanan (opsional)"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Metode Pembayaran</h3>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="Transfer BCA" class="mr-3" required>
                                <span>Transfer BCA - 1234567890 (a.n. Kebun Anggur)</span>
                            </label>
                            <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="Transfer BRI" class="mr-3" required>
                                <span>Transfer BRI - 0987654321 (a.n. Kebun Anggur)</span>
                            </label>
                            <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="Transfer Mandiri" class="mr-3" required>
                                <span>Transfer Mandiri - 1122334455 (a.n. Kebun Anggur)</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h3>
                        @foreach($carts as $cart)
                            <div class="flex justify-between py-2 border-b">
                                <div>
                                    <p class="text-gray-800">{{ $cart->product->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $cart->quantity }} x {{ $cart->product->formatted_price }}</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($cart->quantity * $cart->product->price, 0, ',', '.') }}</p>
                            </div>
                        @endforeach
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between mb-4">
                                <span class="font-semibold">Total</span>
                                <span class="text-xl font-bold text-green-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">Buat Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection