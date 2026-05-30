@extends('admin.layout')

@section('title', 'Detail Kategori')
@section('header', 'Detail Kategori')

@section('content')

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-2">{{ $category->name }}</h2>

    <p class="text-gray-600 mb-4">
        Tipe: {{ ucfirst($category->type) }}
    </p>

    <a href="{{ route('admin.kategori.index') }}" 
       class="bg-gray-200 px-4 py-2 rounded">
        Kembali
    </a>
</div>

@endsection