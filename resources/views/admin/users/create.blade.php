@extends('admin.layout')

@section('title', 'Tambah Pengguna')
@section('header', 'Tambah Pengguna')

@section('content')
<form action="{{ route('admin.pengguna.store') }}" method="POST" class="bg-white rounded-lg shadow p-6">
    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Nama</label>
            <input type="text" name="name" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Password</label>
            <input type="password" name="password" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Role</label>
            <select name="role" class="w-full border rounded-lg px-4 py-2">
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('admin.pengguna.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Batal</a>
    </div>
</form>
@endsection