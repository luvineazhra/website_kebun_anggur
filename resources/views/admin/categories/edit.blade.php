@extends('admin.layout')

@section('title', 'Edit Kategori')
@section('header', 'Edit Kategori')

@section('content')
<form action="{{ route('admin.kategori.update', $category->id) }}" method="POST" class="bg-white rounded-lg shadow p-6">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori *</label>
            <input type="text" name="name" value="{{ $category->name }}" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tipe *</label>
            <select name="type" class="w-full border rounded-lg px-4 py-2" required>
                <option value="product" {{ $category->type === 'product' ? 'selected' : '' }}>Product</option>
                <option value="article" {{ $category->type === 'article' ? 'selected' : '' }}>Article</option>
            </select>
        </div>
    </div>
    <div class="mt-6 flex gap-4">
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Update</button>
        <a href="{{ route('admin.kategori.index') }}" class="border border-gray-300 px-6 py-2 rounded hover:bg-gray-50">Batal</a>
    </div>
</form>
@endsection