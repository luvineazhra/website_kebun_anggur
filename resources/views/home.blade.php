@extends('layouts.app')

@section('title', 'Beranda - Kebun Anggur Jakarta Pusat')

@section('content')

<!-- HERO SECTION -->
<section class="relative bg-gradient-to-r from-[#346739] via-[#7aa86c] to-[#6f9e63] text-white py-24 lg:py-36 overflow-hidden">

    <!-- Blur -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">

        <p class="uppercase tracking-[0.3em] text-sm text-white/80 mb-4">
            Kebun Anggur Jakarta Pusat
        </p>

        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6">
            Budidayakan Anggur <br>
            <span class="text-white/90">di Rumah Anda</span>
        </h1>

        <p class="max-w-2xl mx-auto text-lg md:text-xl text-white/85 leading-relaxed mb-10">
            Temukan berbagai varietas bibit anggur import berkualitas tinggi 
            serta layanan perawatan profesional untuk kebun impian Anda.
        </p>

        <div class="flex flex-wrap justify-center gap-4">

            <a href="{{ route('products.index') }}"
               class="bg-white text-[#6f9e63] px-8 py-3 rounded-full font-semibold shadow-lg hover:scale-105 hover:bg-gray-100 transition duration-300">
                Lihat Produk
            </a>

            <a href="{{ route('services.index') }}"
               class="border border-white/70 px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-[#6f9e63] transition duration-300">
                Booking Layanan
            </a>

        </div>

    </div>
</section>

<!-- PRODUK UNGGULAN -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Produk Unggulan
            </h2>

            <p class="text-gray-600">
                Koleksi terbaik bibit anggur dan tanaman buah berkualitas
            </p>
        </div>

        <!-- GRID PRODUK -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @forelse($featuredProducts as $product)

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">

                    <!-- GAMBAR -->
                    <div class="h-56 bg-gray-100 overflow-hidden">

                        @if($product->image)

                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover hover:scale-105 transition duration-300">

                        @else

                            <div class="w-full h-full flex items-center justify-center text-6xl">
                                🍇
                            </div>

                        @endif

                    </div>

                    <!-- CONTENT -->
                    <div class="p-6 flex flex-col flex-grow">

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-2">
                            {{ $product->name }}
                        </h3>

                        <p class="text-green-600 text-2xl font-bold mb-2">
                            {{ $product->formatted_price }}
                        </p>

                        <p class="text-sm text-gray-500 mb-5">
                            Stok tersedia: {{ $product->stock }}
                        </p>

                        <div class="mt-auto">

                            @auth

                                @if($product->stock > 0)

                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">

                                        <button type="submit"
                                                class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
                                            Tambah ke Keranjang
                                        </button>
                                    </form>

                                @else

                                    <button disabled
                                            class="w-full bg-gray-300 text-gray-500 py-3 rounded-lg cursor-not-allowed">
                                        Stok Habis
                                    </button>

                                @endif

                            @else

                                <a href="{{ route('login') }}"
                                   class="block w-full bg-green-600 text-white py-3 rounded-lg text-center font-semibold hover:bg-green-700 transition">
                                    Login untuk Beli
                                </a>

                            @endauth

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-8 text-gray-500">
                    Tidak ada produk unggulan
                </div>

            @endforelse

        </div>

        <!-- BUTTON -->
        <div class="text-center mt-10">

            <a href="{{ route('products.index') }}"
               class="inline-block border-2 border-green-600 text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-green-600 hover:text-white transition">
                Lihat Semua Produk
            </a>

        </div>

    </div>
</section>

<!-- LAYANAN -->
<section class="py-16 bg-gray-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">

            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Layanan Kami
            </h2>

            <p class="text-gray-600">
                Perawatan profesional untuk kebun anggur Anda
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <div class="text-5xl mb-4">🌱</div>

                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Konsultasi Gratis
                </h3>

                <p class="text-gray-600">
                    Konsultasi perawatan anggur via telepon atau chat untuk membantu kebun Anda tumbuh optimal.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <div class="text-5xl mb-4">🏠</div>

                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Kunjungan ke Lokasi
                </h3>

                <p class="text-gray-600">
                    Tim ahli akan datang ke lokasi Anda untuk perawatan langsung di tempat.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <div class="text-5xl mb-4">📅</div>

                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Jadwal Fleksibel
                </h3>

                <p class="text-gray-600">
                    Booking layanan dengan jadwal yang dapat disesuaikan dengan kebutuhan Anda.
                </p>
            </div>

        </div>

        <div class="text-center mt-8">

            <a href="{{ route('services.index') }}"
               class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">
                Booking Layanan
            </a>

        </div>

    </div>

</section>

<!-- JADWAL PELATIHAN -->
<section class="py-16 bg-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">

            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Jadwal Pelatihan
            </h2>

            <p class="text-gray-600">
                Tingkatkan pengetahuan berkebun anggur Anda
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @forelse($activeTrainings as $training)

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">

                    <div class="h-44 bg-green-100 flex items-center justify-center">
                        <span class="text-6xl">📚</span>
                    </div>

                    <div class="p-6">

                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $training->title }}
                        </h3>

                        <p class="text-sm text-gray-500 mb-2">
                            📅 {{ \Carbon\Carbon::parse($training->schedule_date)->format('d M Y') }}
                        </p>

                        <p class="text-green-600 text-2xl font-bold mb-3">
                            {{ $training->formatted_price }}/orang
                        </p>

                        <p class="text-sm text-gray-600 mb-4">
                            Kuota: {{ $training->available_slots }} / {{ $training->max_participants }}
                        </p>

                        <a href="{{ route('trainings.show', $training->id) }}"
                           class="block w-full bg-green-600 text-white py-3 rounded-lg text-center font-semibold hover:bg-green-700 transition">
                            Detail
                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-8 text-gray-500">
                    Tidak ada jadwal pelatihan
                </div>

            @endforelse

        </div>

    </div>

</section>

<!-- ARTIKEL -->
<section class="py-16 bg-gray-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">

            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Artikel Terbaru
            </h2>

            <p class="text-gray-600">
                Tips dan panduan berkebun anggur
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($recentArticles as $article)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">
                <div class="h-44 bg-gray-100 overflow-hidden">
                    @if($article->image)
                        <img src="{{ asset('storage/articles/' . $article->image) }}"
                            alt="{{ $article->title }}"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-green-100">
                            <span class="text-6xl">📖</span>
                        </div>
                    @endif
                </div>
                    <div class="p-6">

                        <span class="text-xs text-green-600 font-semibold">
                            {{ $article->category->name }}
                        </span>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 mt-2">
                            {{ $article->title }}
                        </h3>

                        <p class="text-sm text-gray-500 mb-4">
                            {{ $article->published_at->format('d M Y') }}
                        </p>

                        <a href="{{ route('articles.show', $article->slug) }}"
                           class="text-green-600 hover:text-green-700 font-semibold">
                            Baca selengkapnya →
                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-8 text-gray-500">
                    Tidak ada artikel
                </div>

            @endforelse

        </div>

        <div class="text-center mt-10">

            <a href="{{ route('articles.index') }}"
               class="inline-block border-2 border-green-600 text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-green-600 hover:text-white transition">
                Lihat Semua Artikel
            </a>

        </div>

    </div>

</section>

<!-- TESTIMONI -->
<section class="py-16 bg-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">

            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Testimoni Pelanggan
            </h2>

            <p class="text-gray-600">
                Apa kata mereka tentang layanan kami
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            @forelse($approvedTestimonials as $testimonial)

                <div class="bg-gray-50 rounded-xl p-6 shadow-sm">

                    <div class="text-yellow-400 mb-3">

                        @for($i = 0; $i < $testimonial->rating; $i++)
                            ★
                        @endfor

                    </div>

                    <p class="text-gray-600 mb-4">
                        "{{ $testimonial->content }}"
                    </p>

                    <p class="font-semibold text-gray-800">
                        - {{ $testimonial->name }}
                    </p>

                </div>

            @empty

                <div class="col-span-full text-center py-8 text-gray-500">
                    Tidak ada testimoni
                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection