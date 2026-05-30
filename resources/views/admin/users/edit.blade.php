@extends('admin.layout')

@section('title', 'Edit Pengguna')
@section('header', 'Edit Pengguna')

@section('content')
<form action="{{ route('admin.pengguna.update', $user->id) }}" method="POST" class="bg-white rounded-lg shadow p-6">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Email</label>
            <input type="email" value="{{ $user->email }}" class="w-full border rounded-lg px-4 py-2 bg-gray-100" disabled>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Password Baru (kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="w-full border rounded-lg px-4 py-2">
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Role</label>
            <select name="role" class="w-full border rounded-lg px-4 py-2">
                <option value="customer" {{ !$user->isAdmin() ? 'selected' : '' }}>Customer</option>
                <option value="admin" {{ $user->isAdmin() ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        <a href="{{ route('admin.pengguna.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Batal</a>
    </div>
</form>
@endsection