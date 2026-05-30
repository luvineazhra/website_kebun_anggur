@extends('admin.layout')

@section('title', 'Detail Pengguna')
@section('header', 'Detail Pengguna')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex items-center gap-4 mb-6">
        <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center text-2xl">
            👤
        </div>

        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $user->name }}
            </h2>

            <p class="text-gray-500">
                Pengguna terdaftar
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Nama -->
        <div>
            <p class="text-sm text-gray-500 mb-1">Nama</p>

            <div class="border rounded-lg px-4 py-3 bg-gray-50">
                {{ $user->name }}
            </div>
        </div>

        <!-- Email -->
        <div>
            <p class="text-sm text-gray-500 mb-1">Email</p>

            <div class="border rounded-lg px-4 py-3 bg-gray-50">
                {{ $user->email }}
            </div>
        </div>

        <!-- Role -->
        <div>
            <p class="text-sm text-gray-500 mb-1">Role</p>

            <div class="border rounded-lg px-4 py-3 bg-gray-50">
                @if($user->isAdmin())
                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded text-sm">
                        Admin
                    </span>
                @else
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded text-sm">
                        Customer
                    </span>
                @endif
            </div>
        </div>

        <!-- Telepon -->
        <div>
            <p class="text-sm text-gray-500 mb-1">No Telepon</p>

            <div class="border rounded-lg px-4 py-3 bg-gray-50">
                {{ $user->phone ?? '-' }}
            </div>
        </div>

        <!-- Alamat -->
        <div class="md:col-span-2">
            <p class="text-sm text-gray-500 mb-1">Alamat</p>

            <div class="border rounded-lg px-4 py-3 bg-gray-50">
                {{ $user->address ?? '-' }}
            </div>
        </div>

        <!-- Tanggal -->
        <div>
            <p class="text-sm text-gray-500 mb-1">Tanggal Bergabung</p>

            <div class="border rounded-lg px-4 py-3 bg-gray-50">
                {{ $user->created_at->format('d F Y') }}
            </div>
        </div>

    </div>

    <!-- Tombol -->
    <div class="mt-8 flex gap-3">

        <a href="{{ route('admin.pengguna.edit', $user->id) }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('admin.pengguna.index') }}"
           class="border border-gray-300 hover:bg-gray-100 px-5 py-2 rounded-lg">
            Kembali
        </a>

    </div>

</div>

@endsection