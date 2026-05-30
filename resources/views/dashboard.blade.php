<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-[#84B179] to-[#A2CB8B] py-10">
        <div class="max-w-7xl mx-auto px-4">

            {{-- WELCOME --}}
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    Halo, {{ auth()->user()->name }} 👋
                </h1>

                <p class="text-gray-600">
                    Selamat datang di website Kebun Anggur Jakarta Pusat.
                </p>
            </div>

            {{-- MENU CARD --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- PRODUK --}}
                <a href="{{ route('products.index') }}"
                   class="bg-white rounded-3xl shadow-lg p-6 hover:scale-105 transition duration-300">

                    <div class="text-5xl mb-4">🍇</div>

                    <h2 class="text-xl font-bold text-gray-800 mb-2">
                        Produk
                    </h2>

                    <p class="text-gray-600">
                        Lihat berbagai bibit dan produk anggur terbaik.
                    </p>
                </a>

                {{-- TRANSAKSI --}}
                <a href="{{ route('transactions.index') }}"
                   class="bg-white rounded-3xl shadow-lg p-6 hover:scale-105 transition duration-300">

                    <div class="text-5xl mb-4">🛒</div>

                    <h2 class="text-xl font-bold text-gray-800 mb-2">
                        Transaksi
                    </h2>

                    <p class="text-gray-600">
                        Cek riwayat pembelian dan status pesanan Anda.
                    </p>
                </a>

                {{-- PROFILE --}}
                <a href="{{ route('profile.edit') }}"
                   class="bg-white rounded-3xl shadow-lg p-6 hover:scale-105 transition duration-300">

                    <div class="text-5xl mb-4">👤</div>

                    <h2 class="text-xl font-bold text-gray-800 mb-2">
                        Profile
                    </h2>

                    <p class="text-gray-600">
                        Kelola informasi akun dan password Anda.
                    </p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>