@extends('layouts.app')

@section('title', 'Tentang Kami - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Tentang Kami</h1>
            <p class="text-gray-600">Membangun hijau Indonesia dengan качествен bibitan anggur</p>
        </div>

        <!-- Profile -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Profil Bisnis</h2>
                    <p class="text-gray-600 mb-4">
                        <strong>Kebun Anggur Jakarta Pusat</strong> adalah pusat penjualan bibit anggur import dan tanaman buah berkualitas tinggi yang berlokasi di Jakarta. Kami berkomitmen untuk memberikan kualitas terbaik bagi para pecinta tanaman buah di Indonesia.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Didirikan dengan semangat untuk mengembangkan pertanian buah lokal, kami menyediakan berbagai varietasbibit anggur import yang cocok untuk iklim tropis Indonesia. Selain itu, kami juga menyediakan layanan perawatan profesional dan pelatihan berkebun.
                    </p>
                </div>
                <img src="{{ asset('images/logo.png') }}" alt="Logo Anggur" class="mx-auto w-100 h-100 object-contain">
            </div>
        </div>

        <!-- Visi Misi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Visi</h2>
                <p class="text-gray-600">
                    Menjadi pusat bibit anggur import dan tanaman buah terpercaya di Indonesia dengan pelayanan terbaik dan kualitas produk yang terjamin.
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Misi</h2>
                <ul class="text-gray-600 space-y-2">
                    <li>✓ Menyediakanbibit anggur berkualitas tinggi</li>
                    <li>✓ Memberikan layanan konsultasi gratis</li>
                    <li>✓ Menyediakan layanan perawatan profesional</li>
                    <li>✓ Mengadakan pelatihan berkebun secara berkala</li>
                    <li>✓ Membantu masyarakat berkebun dengan benar</li>
                </ul>
            </div>
        </div>

        <!-- Keunggulan -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Keunggulan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-5xl mb-4">🌱</div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Bibit Berkualitas</h3>
                    <p class="text-gray-600">Bibit anggur import pilihan dengan kualitas terjamin</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl mb-4">💡</div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Konsultasi Gratis</h3>
                    <p class="text-gray-600">Tim ahli siap membantu perawatan tanaman Anda</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl mb-4">🚚</div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pengiriman Aman</h3>
                    <p class="text-gray-600">Packing profesional untuk keamanan pengiriman</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection