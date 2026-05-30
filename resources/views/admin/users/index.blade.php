@extends('admin.layout')

@section('title', 'Kelola Pengguna')
@section('header', 'Kelola Pengguna')

@section('content')

{{-- NOTIF --}}
<div x-data="{ show: true }">

    @if(session('success'))
        <div 
            x-show="show"
            x-transition
            x-cloak
            class="bg-green-500 text-white px-4 py-3 rounded-lg mb-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>

            <button @click="show = false" class="ml-4 font-bold">
                ✕
            </button>
        </div>
    @endif

    @if(session('error'))
        <div 
            x-show="show"
            x-transition
            x-cloak
            class="bg-red-500 text-white px-4 py-3 rounded-lg mb-4 flex justify-between items-center">
            <span>{{ session('error') }}</span>

            <button @click="show = false" class="ml-4 font-bold">
                ✕
            </button>
        </div>
    @endif

</div>

<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.pengguna.create') }}" class="bg-[#84B179] text-white px-4 py-2 rounded-lg hover:bg-[#A2CB8B] transition"> + Tambah Pengguna</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Nama
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Email
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Role
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Terdaftar
                </th>

                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">

            @forelse($users as $user)

            <tr>

                <td class="px-6 py-4 text-gray-800">
                    {{ $user->name }}
                </td>

                <td class="px-6 py-4 text-gray-600">
                    {{ $user->email }}
                </td>

                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-xs font-semibold
                        {{ $user->isAdmin() 
                            ? 'bg-purple-100 text-purple-800' 
                            : 'bg-blue-100 text-blue-800' }}">
                        {{ $user->isAdmin() ? 'Admin' : 'Customer' }}
                    </span>
                </td>

                <td class="px-6 py-4 text-gray-600">
                    {{ $user->created_at->format('d M Y') }}
                </td>

                <td class="px-6 py-4">

                    {{-- DETAIL --}}
                    <a 
                        href="{{ route('admin.pengguna.show', $user->id) }}"
                        class="text-gray-600 hover:text-gray-800 mr-3"
                    >
                        Detail
                    </a>

                    {{-- EDIT --}}
                    <a 
                        href="{{ route('admin.pengguna.edit', $user->id) }}"
                        class="text-blue-600 hover:text-blue-700 mr-3"> Edit</a>

                    {{-- DELETE MODAL --}}
                    @if($user->id !== auth()->id())

                    <div x-data="{ open: false }" class="inline">

                        <button 
                            @click="open = true"
                            class="text-red-600 hover:text-red-700">Hapus</button>

                        {{-- MODAL --}}
                        <div 
                            x-show="open"
                            x-transition
                            x-cloak
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                            <div class="bg-white p-6 rounded-xl shadow-lg w-80">

                                <h2 class="text-lg font-semibold mb-4">
                                    Konfirmasi
                                </h2>

                                <p class="text-gray-600 mb-6">
                                    Yakin mau hapus pengguna ini?
                                </p>

                                <div class="flex justify-end gap-2">

                                    <button @click="open = false" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Batal</button>

                                    <form 
                                        action="{{ route('admin.pengguna.destroy', $user->id) }}" 
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                    Tidak ada pengguna
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $users->links() }}
</div>

@endsection