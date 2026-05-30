@extends('admin.layout')

@section('title', 'Detail Layanan')
@section('header', 'Detail Layanan')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <p class="text-gray-500">Nama</p>
            <p class="font-semibold">{{ $service->name }}</p>
        </div>
        <div>
            <p class="text-gray-500">Customer</p>
            <p class="font-semibold">{{ $service->user->name }}</p>
        </div>
        <div>
            <p class="text-gray-500">HP</p>
            <p class="font-semibold">{{ $service->phone }}</p>
        </div>
        <div>
            <p class="text-gray-500">Tanggal Kunjungan</p>
            <p class="font-semibold">{{ \Carbon\Carbon::parse($service->visit_date)->format('d M Y') }}</p>
        </div>
        <div>
            <p class="text-gray-500">Jumlah Kunjungan</p>
            <p class="font-semibold">{{ $service->visit_count }}x</p>
        </div>
        <div>
            <p class="text-gray-500">Total Harga</p>
            <p class="font-semibold text-green-600">{{ $service->formatted_total }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-gray-500">Alamat</p>
            <p>{{ $service->address }}</p>
        </div>
        @if($service->notes)
        <div class="col-span-2">
            <p class="text-gray-500">Catatan</p>
            <p>{{ $service->notes }}</p>
        </div>
        @endif
        @if($service->payment_proof)
        <div class="col-span-2 mt-4">
            <p class="text-gray-500 mb-2">Bukti Pembayaran ({{ $service->payment_method }})</p>
            <a href="{{ asset('storage/payments/' . $service->payment_proof) }}" target="_blank">
                <img src="{{ asset('storage/payments/' . $service->payment_proof) }}" alt="Bukti Pembayaran" class="max-w-md rounded-lg shadow-md hover:opacity-90 transition">
            </a>
            <p class="text-xs text-gray-400 mt-1">* Klik gambar untuk memperbesar</p>
        </div>
        @endif
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6 mt-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Update Status</h3>
    <form action="{{ route('admin.layanan.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <select name="status" class="border rounded-lg px-4 py-2 mr-4">
            <option value="pending" {{ $service->status === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ $service->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="completed" {{ $service->status === 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ $service->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</div>
<a href="{{ route('admin.layanan.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">← Kembali</a>
@endsection