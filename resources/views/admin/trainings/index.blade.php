@extends('admin.layout')

@section('title', 'Kelola Pelatihan')
@section('header', 'Kelola Pelatihan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.pelatihan.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Pelatihan</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kuota</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($trainings as $training)
                <tr>
                    <td class="px-6 py-4 text-gray-800">{{ $training->title }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($training->schedule_date)->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-green-600 font-semibold">{{ $training->formatted_price }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $training->max_participants }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $training->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $training->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.pelatihan.edit', $training->id) }}" class="text-blue-600 hover:text-blue-700 mr-3">Edit</a>
                        <a href="{{ route('admin.pelatihan.registrations', $training->id) }}" class="text-green-600 hover:text-green-700">Peserta</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada pelatihan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $trainings->links() }}
</div>
@endsection