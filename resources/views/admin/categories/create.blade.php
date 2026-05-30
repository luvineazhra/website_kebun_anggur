@extends('admin.layout')

@section('title', 'Tambah Kategori')
@section('header', 'Tambah Kategori')

@section('content')
<form action="{{ route('admin.kategori.store') }}" method="POST" class="bg-white rounded-lg shadow p-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori *</label>
            <input type="text" name="name" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tipe *</label>
            <select name="type" class="w-full border rounded-lg px-4 py-2" required>
                <option value="product">Product</option>
                <option value="article">Article</option>
            </select>
        </div>
    </div>
    <div class="mt-6 flex gap-4">
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('admin.kategori.index') }}" class="border border-gray-300 px-6 py-2 rounded hover:bg-gray-50">Batal</a>
    </div>
</form>
@endsection 