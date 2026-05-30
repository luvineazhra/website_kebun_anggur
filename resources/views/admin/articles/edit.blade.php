@extends('admin.layout')

@section('title', 'Edit Artikel')
@section('header', 'Edit Artikel')

@section('content')
<div x-data="{ show: true }">

    @if(session('success'))
        <div x-show="show" x-transition
             class="bg-green-500 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
            <button @click="show = false" class="ml-2">✖</button>
        </div>
    @endif

    @if(session('error'))
        <div x-show="show" x-transition
             class="bg-red-500 text-white px-4 py-2 rounded mb-4">
            {{ session('error') }}
            <button @click="show = false" class="ml-2">✖</button>
        </div>
    @endif
</div>
<form action="{{ route('admin.artikel.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Judul</label>
            <input type="text" name="title" value="{{ $article->title }}" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Kategori</label>
                <select name="category_id" class="w-full border rounded-lg px-4 py-2" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $article->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Status</label>
            <select name="is_published" class="w-full border rounded-lg px-4 py-2">
                <option value="1" {{ $article->is_published ? 'selected' : '' }}>Published</option>
                <option value="0" {{ !$article->is_published ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Konten</label>
            <textarea name="content" rows="8" class="w-full border rounded-lg px-4 py-2" required>{{ $article->content }}</textarea>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Gambar (kosongkan jika tidak ingin diubah)</label>
            <input type="file" name="image" class="w-full border rounded-lg px-4 py-2" accept="image/*">
            @if($article->image)
                <img src="{{ asset('storage/articles/' . $article->image) }}" class="mt-2 w-32 h-32 object-cover rounded">
            @endif
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        <a href="{{ route('admin.artikel.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Batal</a>
    </div>
</form>
@endsection