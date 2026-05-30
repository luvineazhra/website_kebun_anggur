@extends('admin.layout')

@section('title', 'Detail Artikel')
@section('header', 'Detail Artikel')

@section('content')
<div class="bg-white rounded-lg shadow p-6">

    {{-- Judul --}}
    <h1 class="text-2xl font-bold text-gray-800 mb-4">
        {{ $article->title }}
    </h1>

    {{-- Meta --}}
    <div class="flex items-center gap-4 text-sm mb-6">
        <span class="bg-green-100 text-green-800 px-2 py-1 rounded">
            {{ $article->category->name }}
        </span>

        <span class="text-gray-500">
            {{ $article->published_at ? $article->published_at->format('d M Y') : 'Belum publish' }}
        </span>

        <span class="px-2 py-1 rounded text-xs font-semibold 
            {{ $article->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
            {{ $article->is_published ? 'Published' : 'Draft' }}
        </span>
    </div>

    {{-- Gambar --}}
    @if($article->image)
        <div class="mb-6">
            <img src="{{ asset('storage/articles/'.$article->image) }}" 
                 class="w-full max-h-96 object-cover rounded">
        </div>
    @endif

    {{-- Konten --}}
    <div class="prose max-w-none text-gray-700">
        {!! $article->content !!}
    </div>

    {{-- Tombol --}}
    <div class="mt-6 flex gap-3">
        <a href="{{ route('admin.artikel.edit', $article->id) }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Edit
        </a>

        <a href="{{ route('admin.artikel.index') }}" 
           class="border px-4 py-2 rounded hover:bg-gray-100">
            Kembali
        </a>
    </div>

</div>
@endsection