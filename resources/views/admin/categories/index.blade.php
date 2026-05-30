@extends('admin.layout')

@section('title', 'Kelola Kategori')
@section('header', 'Kelola Kategori')

@section('content')

{{-- NOTIF --}}
@if(session('success'))
<div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.kategori.create') }}" 
       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">

        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Nama
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Tipe
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">

            @forelse($categories as $category)

            <tr>

                <td class="px-6 py-4 text-gray-800">
                    {{ $category->name }}
                </td>

                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-xs font-semibold 
                        {{ $category->type === 'product' 
                            ? 'bg-blue-100 text-blue-800' 
                            : 'bg-purple-100 text-purple-800' }}">
                        
                        {{ ucfirst($category->type) }}
                    </span>
                </td>

                <td class="px-6 py-4">

                    {{-- DETAIL --}}
                    <a href="{{ route('admin.kategori.show', $category->id) }}"
                       class="text-gray-600 hover:text-gray-700 mr-3">
                        Detail
                    </a>

                    {{-- EDIT --}}
                    <a href="{{ route('admin.kategori.edit', $category->id) }}"
                       class="text-blue-600 hover:text-blue-700 mr-3">
                        Edit
                    </a>

                    {{-- DELETE MODAL --}}
                    <div x-data="{ open: false }" class="inline">

                        <button @click="open = true"
                                class="text-red-600 hover:text-red-700">
                            Hapus
                        </button>

                        <div
                            x-show="open"
                            x-cloak
                            x-transition
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                        >

                            <div class="bg-white p-6 rounded-lg shadow w-80">

                                <h2 class="text-lg font-semibold mb-4">
                                    Konfirmasi
                                </h2>

                                <p class="mb-4">
                                    Yakin mau hapus kategori ini?
                                </p>

                                <div class="flex justify-end gap-2">

                                    <button
                                        @click="open = false"
                                        class="px-4 py-2 border rounded"
                                    >
                                        Batal
                                    </button>

                                    <form action="{{ route('admin.kategori.destroy', $category->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-4 py-2 bg-red-600 text-white rounded">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                    Tidak ada kategori
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $categories->links() }}
</div>

@endsection