@extends('admin.layout')

@section('title', 'Kelola Layanan')
@section('header', 'Kelola Layanan')

@section('content')
<!-- Filter -->
<div class="mb-4 flex gap-2">
    <a href="{{ route('admin.layanan.index') }}" class="px-4 py-2 rounded {{ !request('status') ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Semua</a>
    <a href="{{ route('admin.layanan.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded {{ request('status') == 'pending' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Pending</a>
    <a href="{{ route('admin.layanan.index', ['status' => 'confirmed']) }}" class="px-4 py-2 rounded {{ request('status') == 'confirmed' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Confirmed</a>
    <a href="{{ route('admin.layanan.index', ['status' => 'completed']) }}" class="px-4 py-2 rounded {{ request('status') == 'completed' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Completed</a>
    <a href="{{ route('admin.layanan.index', ['status' => 'cancelled']) }}" class="px-4 py-2 rounded {{ request('status') == 'cancelled' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Cancelled</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kunjungan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($services as $service)
                <tr>
                    <td class="px-6 py-4 text-gray-800">{{ $service->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $service->user->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ Str::limit($service->address, 30) }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($service->visit_date)->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $service->visit_count }}x</td>
                    <td class="px-6 py-4 text-green-600 font-semibold">{{ $service->formatted_total }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold 
                            {{ $service->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $service->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                            {{ $service->status === 'confirmed' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $service->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                            {{ ucfirst($service->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.layanan.show', $service->id) }}" class="text-blue-600 hover:text-blue-700">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">Tidak ada layanan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $services->links() }}
</div>
@endsection