@extends('admin.layout')

@section('title', 'Tambah Pelatihan')
@section('header', 'Tambah Pelatihan')

@section('content')
<form action="{{ route('admin.pelatihan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Judul</label>
            <input type="text" name="title" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Tanggal Jadwal</label>
            <input type="date" name="schedule_date" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Harga per Orang (Rp)</label>
            <input type="number" name="price_per_person" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Kuota Maksimal</label>
            <input type="number" name="max_participants" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Bonus Info</label>
            <input type="text" name="bonus_info" class="w-full border rounded-lg px-4 py-2" placeholder="Contoh: Include sertifikat">
        </div>
        <div>
            <label class="block text-gray-700 mb-2">Status</label>
            <select name="is_active" class="w-full border rounded-lg px-4 py-2">
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border rounded-lg px-4 py-2" required></textarea>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 mb-2">Gambar</label>
            <input type="file" name="image" class="w-full border rounded-lg px-4 py-2" accept="image/*">
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('admin.pelatihan.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Batal</a>
    </div>
</form>
@endsection