@extends('layouts.app')

@section('title', $product->name . ' - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div class="h-96 bg-gray-200 flex items-center justify-center">
                    @if($product->image)
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-9xl">🍇</span>
                    @endif
                </div>
                
                <!-- Product Details -->
                <div class="p-8">
                    <span class="text-sm text-gray-500">{{ $product->category->name }}</span>
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                    <p class="text-3xl text-green-600 font-bold mb-4">{{ $product->formatted_price }}</p>
                    
                    <div class="mb-4">
                        <span class="text-gray-600">Stok: </span>
                        @if($product->stock > 0)
                            <span class="text-green-600 font-semibold">{{ $product->stock }} tersedia</span>
                        @else
                            <span class="text-red-500 font-semibold">Habis</span>
                        @endif
                    </div>
                    
                    <div class="prose prose-sm text-gray-600 mb-6">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                    
                    @auth
                        @if($product->stock > 0)
                            <form action="{{ route('cart.store') }}" method="POST" class="mb-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="flex items-center gap-4 mb-4">
                                    <label class="text-gray-600">Jumlah:</label>
                                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="border rounded px-3 py-2 w-20">
                                </div>
                                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">Tambah ke Keranjang</button>
                            </form>
                        @else
                            <button disabled class="w-full bg-gray-300 text-gray-500 py-3 rounded-lg font-semibold cursor-not-allowed">Stok Habis</button>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition text-center">Login untuk Beli</a>
                    @endauth
                    
                    <a href="{{ route('products.index') }}" class="inline-block mt-4 text-green-600 hover:text-green-700">← Kembali ke Produk</a>
                </div>
            </div>
        </div>
        
       <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Terkait</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <!-- GAMBAR -->
                            <div class="h-48 bg-gray-100 overflow-hidden">
                                @if($related->image)
                                    <img src="{{ asset('storage/products/' . $related->image) }}"
                                        alt="{{ $related->name }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="text-5xl">🍇</span>
                                    </div>
                                @endif
                            </div>

                            <!-- CONTENT -->
                            <div class="p-4">

                                <h3 class="font-semibold text-gray-800 mb-1">
                                    {{ $related->name }}
                                </h3>

                                <p class="text-green-600 font-bold mb-3">
                                    {{ $related->formatted_price }}
                                </p>

                                <a href="{{ route('products.show', $related->slug) }}"
                                class="block text-center bg-green-600 text-white py-2 rounded hover:bg-green-700 transition text-sm">Lihat Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection