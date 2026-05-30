@extends('layouts.app')

@section('title', $article->title . ' - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="h-64 bg-green-100 flex items-center justify-center">
                @if($article->image)
                    <img src="{{ asset('storage/articles/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                @else
                    <span class="text-9xl">📖</span>
                @endif
            </div> 
            <div class="p-8">
                <div class="flex items-center gap-4 mb-4">
                    <span class="text-sm text-green-600 font-semibold">{{ $article->category->name }}</span>
                    <span class="text-sm text-gray-500">{{ $article->published_at->format('d M Y') }}</span>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $article->title }}</h1>
                <div class="prose max-w-none text-gray-600">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
        
<!-- Related Articles -->
@if($relatedArticles->count() > 0)
<div class="mt-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Artikel Terkait
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($relatedArticles as $related)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <!-- GAMBAR -->
                <div class="h-48 bg-gray-100 overflow-hidden">
                    @if($related->image)
                        <img src="{{ asset('storage/articles/' . $related->image) }}"
                             alt="{{ $related->title }}"
                             class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-green-100">
                            <span class="text-5xl">📖</span>
                        </div>
                    @endif
                </div>

                <!-- CONTENT -->
                <div class="p-4">

                    <span class="text-xs text-green-600 font-semibold">
                        {{ $related->category->name }}
                    </span>

                    <h3 class="font-semibold text-gray-800 mt-2 mb-2 line-clamp-2">
                        {{ $related->title }}
                    </h3>

                    <p class="text-sm text-gray-500 mb-4">
                        {{ $related->created_at->format('d M Y') }}
                    </p>

                    <a href="{{ route('articles.show', $related->slug) }}"
                       class="block text-center bg-green-600 text-white py-2 rounded hover:bg-green-700 transition text-sm">
                        Baca Artikel
                    </a>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
        
        <div class="mt-8">
            <a href="{{ route('articles.index') }}" class="text-green-600 hover:text-green-700">← Kembali ke Artikel</a>
        </div>
    </div>
</div>
@endsection