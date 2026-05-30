<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Kebun Anggur Jakarta Pusat')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        green: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>
    <style>
    [x-cloak] {
        display: none !important;
    }
</style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-green-800 text-white flex flex-col">
            <div class="p-4 border-b border-green-700">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Admin" class="h-8 w-auto">
                    <span class="ml-2 text-lg font-bold">Dashboard Admin</span>
                </a>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">📊</span>
                    Dashboard
                </a>
                <a href="{{ route('admin.produk.index') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.produk.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">🍇</span>
                    Produk
                </a>
                <a href="{{ route('admin.kategori.index') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.kategori.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">📁</span>
                    Kategori
                </a>
                <a href="{{ route('admin.pesanan.index') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.pesanan.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">🛒</span>
                    Pesanan
                </a>
                <a href="{{ route('admin.layanan.index') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.layanan.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">🔧</span>
                    Layanan
                </a>
                <a href="{{ route('admin.pelatihan.index') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.pelatihan.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">📚</span>
                    Pelatihan
                </a>
                <a href="{{ route('admin.artikel.index') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.artikel.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">📖</span>
                    Artikel
                </a>
                <a href="{{ route('admin.testimoni.index') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.testimoni.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">💬</span>
                    Testimoni
                </a>
                <a href="{{ route('admin.pengguna.index') }}" class="flex items-center px-4 py-3 rounded {{ request()->routeIs('admin.pengguna.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
                    <span class="mr-3">👥</span>
                    Pengguna
                </a>
            </nav>
            <div class="p-4 border-t border-green-700">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-2 rounded hover:bg-green-700">
                    <span class="mr-3">🏠</span>
                    Lihat Website
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h2>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-700">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>