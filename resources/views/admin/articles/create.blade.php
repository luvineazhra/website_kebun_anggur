@extends('admin.layout')

@section('title', 'Tambah Artikel')
@section('header', 'Tambah Artikel')

@section('content')
<form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Judul</label>
            <input type="text" name="title" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Kategori</label>
            <select name="category_id" class="w-full border rounded-lg px-4 py-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Status</label>
            <select name="is_published" class="w-full border rounded-lg px-4 py-2">
                <option value="1">Published</option>
                <option value="0">Draft</option>
            </select>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Konten</label>
            <textarea name="content" rows="8" class="w-full border rounded-lg px-4 py-2" required></textarea>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Gambar</label>
            <input type="file" name="image" class="w-full border rounded-lg px-4 py-2" accept="image/*">
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('admin.artikel.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Batal</a>
    </div>
</form>
@endsection