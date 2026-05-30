@extends('layouts.app')

@section('title', 'Keranjang - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Keranjang Belanja</h1>
        
        @if($carts->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    @foreach($carts as $cart)
                        <div class="bg-white rounded-lg shadow-md p-6 mb-4 flex items-center gap-4">
                            <div class="w-24 h-24 bg-gray-200 rounded flex items-center justify-center flex-shrink-0">
                                @if($cart->product->image)
                                    <img src="{{ asset('storage/products/' . $cart->product->image) }}" alt="{{ $cart->product->name }}" class="w-full h-full object-cover rounded">
                                @else
                                    <span class="text-4xl">🍇</span>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">{{ $cart->product->name }}</h3>
                                <p class="text-green-600 font-bold">{{ $cart->product->formatted_price }}</p>
                            </div>
                            <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}" class="border rounded px-3 py-2 w-16 text-center">
                                <button type="submit" class="text-green-600 hover:text-green-700">Update</button>
                            </form>
                            <div class="text-right">
                                <p class="font-bold text-gray-800">Rp {{ number_format($cart->quantity * $cart->product->price, 0, ',', '.') }}</p>
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm" onclick="return confirm('Hapus produk ini dari keranjang?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Cart Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h3>
                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-600">Total</span>
                                <span class="text-xl font-bold text-green-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <a href="{{ route('checkout.index') }}" class="block w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition text-center">Lanjut ke Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">🛒</div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Keranjang Anda kosong</h2>
                <p class="text-gray-600 mb-6">Silakan pilih produk terlebih dahulu</p>
                <a href="{{ route('products.index') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">Lihat Produk</a>
            </div>
        @endif
    </div>
</div>
@endsection