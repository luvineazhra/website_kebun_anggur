@extends('admin.layout')

@section('title', 'Tambah Produk')
@section('header', 'Tambah Produk')

@section('content')
<form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk *</label>
            <input type="text" name="name" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori *</label>
            <select name="category_id" class="w-full border rounded-lg px-4 py-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi *</label>
        <textarea name="description" rows="4" class="w-full border rounded-lg px-4 py-2" required></textarea>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Harga *</label>
            <input type="number" name="price" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Stok *</label>
            <input type="number" name="stock" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded-lg px-4 py-2">
        </div>
    </div>
    <div class="mt-4">
            <label class="flex items-center">
                <input type="checkbox" name="is_featured" value="1" class="mr-2">
                <span class="text-gray-700">Produk Unggulan</span>
            </label>
        </label>
    </div>
    <div class="mt-6 flex gap-4">
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('admin.produk.index') }}" class="border border-gray-300 px-6 py-2 rounded hover:bg-gray-50">Batal</a>
    </div>
</form>
@endsection