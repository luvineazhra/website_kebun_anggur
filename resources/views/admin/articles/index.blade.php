@extends('admin.layout')

@section('title', 'Kelola Artikel')
@section('header', 'Kelola Artikel')

@section('content')

{{-- NOTIF --}}
@if(session('success'))
<div 
    x-data="{ show: true }"
    x-show="show"
    x-transition
    x-init="setTimeout(() => show = false, 3000)"
    x-cloak
    class="bg-green-500 text-white px-4 py-3 rounded mb-4 flex justify-between items-center">
    <span>{{ session('success') }}</span>

    <button @click="show = false" class="ml-4 font-bold">
        ✕
    </button>
</div>
@endif

@if(session('error'))
<div 
    x-data="{ show: true }"
    x-show="show"
    x-transition
    x-init="setTimeout(() => show = false, 3000)"
    x-cloak
    class="bg-red-500 text-white px-4 py-3 rounded mb-4 flex justify-between items-center">
    <span>{{ session('error') }}</span>

    <button @click="show = false" class="ml-4 font-bold">
        ✕
    </button>
</div>
@endif

<div class="mb-4">
    <a href="{{ route('admin.artikel.create') }}" 
       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Tambah Artikel
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Judul
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Kategori
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Status
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">

            @forelse($articles as $article)

            <tr>

                <td class="px-6 py-4 text-gray-800">
                    {{ $article->title }}
                </td>

                <td class="px-6 py-4 text-gray-600">
                    {{ $article->category->name }}
                </td>

                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-xs font-semibold 
                        {{ $article->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        
                        {{ $article->is_published ? 'Published' : 'Draft' }}

                    </span>
                </td>

                {{-- AKSI --}}
                <td class="px-6 py-4">

                    {{-- DETAIL --}}
                    <a href="{{ route('admin.artikel.show', $article->id) }}" 
                       class="text-gray-600 hover:text-gray-700 mr-3">
                        Detail
                    </a>

                    {{-- EDIT --}}
                    <a href="{{ route('admin.artikel.edit', $article->id) }}" 
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
                            x-transition
                            x-cloak
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

                            <div class="bg-white p-6 rounded-lg shadow w-80">

                                <h2 class="text-lg font-semibold mb-4">
                                    Konfirmasi
                                </h2>

                                <p class="mb-4">
                                    Yakin mau hapus artikel ini?
                                </p>

                                <div class="flex justify-end gap-2">

                                    <button @click="open = false" class="px-4 py-2 border rounded">Batal</button>

                                    <form 
                                        action="{{ route('admin.artikel.destroy', $article->id) }}" 
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Hapus</button>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                    Tidak ada artikel
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $articles->links() }}
</div>

@endsection