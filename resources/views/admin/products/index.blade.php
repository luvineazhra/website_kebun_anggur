@extends('admin.layout')

@section('title', 'Kelola Produk')
@section('header', 'Kelola Produk')

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
    <a href="{{ route('admin.produk.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Tambah Produk
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Featured</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @forelse($products as $product)
            <tr>
                <td class="px-6 py-4">
                    @if($product->image)
                        <img src="{{ asset('storage/products/'.$product->image) }}" class="w-16 h-16 object-cover rounded">
                    @else
                        <span class="text-2xl">🍇</span>
                    @endif
                </td>

                <td class="px-6 py-4">{{ $product->name }}</td>
                <td class="px-6 py-4">{{ $product->category->name }}</td>
                <td class="px-6 py-4 text-green-600">{{ $product->formatted_price }}</td>
                <td class="px-6 py-4">{{ $product->stock }}</td>

                <td class="px-6 py-4">
                    @if($product->is_featured)
                        <span class="bg-green-100 text-green-800 px-2 py-1 text-xs rounded">
                            Ya
                        </span>
                    @else
                        <span class="bg-gray-100 text-gray-600 px-2 py-1 text-xs rounded">
                            Tidak
                        </span>
                    @endif
                </td>

                {{-- AKSI --}}
                <td class="px-6 py-4">
                    <a href="{{ route('admin.produk.show', $product->id) }}" class="text-gray-600 mr-3">
                        Detail
                    </a>

                    <a href="{{ route('admin.produk.edit', $product->id) }}" class="text-blue-600 mr-3">
                        Edit
                    </a>

                    {{-- DELETE MODAL --}}
                    <div x-data="{ open: false }" class="inline">

                        <button @click="open = true" class="text-red-600">
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
                                    Yakin mau hapus produk ini?
                                </p>

                                <div class="flex justify-end gap-2">

                                    <button 
                                        @click="open = false"
                                        class="px-4 py-2 border rounded"
                                    >
                                        Batal
                                    </button>

                                    <form action="{{ route('admin.produk.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">
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
                <td colspan="7" class="text-center py-4">
                    Tidak ada produk
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $products->links() }}
</div>

@endsection