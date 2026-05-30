@extends('layouts.app')

@section('title', 'Produk - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Produk Kami</h1>
            <p class="text-gray-600">Koleksi lengkap bibit anggur dan tanaman buah berkualitas</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filter -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Kategori</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('products.index') }}" class="block px-3 py-2 rounded {{ !request('category') ? 'bg-green-100 text-green-700' : 'text-gray-600 hover:bg-gray-50' }}">
                                Semua Kategori
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('products.index', ['category' => $category->id]) }}" class="block px-3 py-2 rounded {{ request('category') == $category->id ? 'bg-green-100 text-green-700' : 'text-gray-600 hover:bg-gray-50' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="lg:w-3/4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <div class="h-48 bg-gray-200 flex items-center justify-center relative">
                                @if($product->image)
                                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-6xl">🍇</span>
                                @endif
                                @if($product->stock == 0)
                                    <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded">Habis</div>
                                @endif
                            </div>
                            <div class="p-4">
                                <span class="text-xs text-gray-500">{{ $product->category->name }}</span>
                                <h3 class="font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
                                <p class="text-green-600 font-bold text-lg mb-2">{{ $product->formatted_price }}</p>
                                <p class="text-sm text-gray-500 mb-3">Stok: {{ $product->stock }}</p>
                                <div class="flex gap-2">
                                    <a href="{{ route('products.show', $product->slug) }}" class="flex-1 border border-green-600 text-green-600 py-2 rounded text-center hover:bg-green-600 hover:text-white transition text-sm">Detail</a>
                                    @auth
                                        @if($product->stock > 0)
                                            <form action="{{ route('cart.store') }}" method="POST" class="flex-1">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition text-sm">Keranjang</button>
                                            </form>
                                        @else
                                            <button disabled class="flex-1 bg-gray-300 text-gray-500 py-2 rounded text-sm cursor-not-allowed">Habis</button>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-gray-500">
                            Tidak ada produk
                        </div>
                    @endforelse
                </div>

                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection