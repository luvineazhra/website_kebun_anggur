@extends('layouts.app')

@section('title', 'Artikel - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Artikel</h1>
            <p class="text-gray-600">Tips dan panduan berkebun anggur</p>
        </div>

        <!-- Category Filter -->
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <a href="{{ route('articles.index') }}" class="px-4 py-2 rounded-full {{ !request('category') ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Semua
            </a>
            @foreach($categories as $category)
                <a href="{{ route('articles.index', ['category' => $category->id]) }}" class="px-4 py-2 rounded-full {{ request('category') == $category->id ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $article)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-green-100 flex items-center justify-center">
                        @if($article->image)
                            <img src="{{ asset('storage/articles/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-6xl">📖</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <span class="text-xs text-green-600 font-semibold">{{ $article->category->name }}</span>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 mt-1">{{ $article->title }}</h3>
                        <p class="text-sm text-gray-500 mb-3">{{ $article->published_at->format('d M Y') }}</p>
                        <a href="{{ route('articles.show', $article->slug) }}" class="text-green-600 hover:text-green-700 font-medium">Baca selengkapnya →</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500">
                    Tidak ada artikel
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection