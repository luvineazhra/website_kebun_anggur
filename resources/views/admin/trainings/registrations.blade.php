@extends('admin.layout')

@section('title', 'Pendaftaran Pelatihan')
@section('header', 'Pendaftaran Pelatihan: ' . $training->title)

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">HP</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bukti Bayar</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($registrations as $reg)
                <tr>
                    <td class="px-6 py-4 text-gray-800">{{ $reg->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $reg->user->email }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $reg->phone }}</td>
                    <td class="px-6 py-4">
                        @if($reg->payment_proof)
                            <a href="{{ asset('storage/payments/' . $reg->payment_proof) }}" target="_blank" class="text-blue-600 hover:underline text-sm">Lihat Bukti</a>
                            <div class="text-xs text-gray-400">{{ $reg->payment_method }}</div>
                        @else
                            <span class="text-gray-400 text-sm">Belum ada</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold 
                            {{ $reg->status === 'confirmed' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $reg->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $reg->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst($reg->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.pelatihan.updateRegistration', $reg->id) }}" method="POST" class="inline">
                            @csrf
                            <select name="status" class="border rounded px-2 py-1 text-sm">
                                <option value="pending" {{ $reg->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $reg->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $reg->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="text-blue-600 hover:text-blue-700 ml-2">Update</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada pendaftaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    <a href="{{ route('admin.pelatihan.index') }}" class="text-green-600 hover:text-green-700">← Kembali ke Pelatihan</a>
</div>
@endsection