@extends('admin.layout')

@section('title', 'Detail Produk')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">{{ $product->name }}</h2>

    @if($product->image)
        <img src="{{ asset('storage/products/' . $product->image) }}" class="w-48 mb-4">
    @endif

    <p><b>Kategori:</b> {{ $product->category->name }}</p>
    <p><b>Harga:</b> {{ $product->formatted_price }}</p>
    <p><b>Stok:</b> {{ $product->stock }}</p>
    <p class="mt-4"><b>Deskripsi:</b> {{ $product->description }}</p>
</div>
<br>
    <a href="{{ route('admin.produk.index') }}" 
       class="bg-gray-200 px-4 py-2 rounded">
        Kembali
    </a>
@endsection