@extends('admin.layout')

@section('title', 'Kelola Pesanan')
@section('header', 'Kelola Pesanan')

@section('content')
<!-- Filter -->
<div class="mb-4 flex gap-2">
    <a href="{{ route('admin.pesanan.index') }}" class="px-4 py-2 rounded {{ !request('status') ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Semua</a>
    <a href="{{ route('admin.pesanan.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded {{ request('status') == 'pending' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Pending</a>
    <a href="{{ route('admin.pesanan.index', ['status' => 'paid']) }}" class="px-4 py-2 rounded {{ request('status') == 'paid' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Paid</a>
    <a href="{{ route('admin.pesanan.index', ['status' => 'confirmed']) }}" class="px-4 py-2 rounded {{ request('status') == 'confirmed' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Confirmed</a>
    <a href="{{ route('admin.pesanan.index', ['status' => 'rejected']) }}" class="px-4 py-2 rounded {{ request('status') == 'rejected' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Rejected</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. Pesanan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($orders as $order)
                <tr>
                    <td class="px-6 py-4 text-gray-800">{{ $order->order_number }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $order->user->name }}</td>
                    <td class="px-6 py-4 text-green-600 font-semibold">{{ $order->formatted_total }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold 
                            {{ $order->status === 'confirmed' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $order->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}
                            {{ $order->status === 'paid' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $order->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.pesanan.show', $order->id) }}" class="text-blue-600 hover:text-blue-700">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada pesanan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $orders->links() }}
</div>
@endsection