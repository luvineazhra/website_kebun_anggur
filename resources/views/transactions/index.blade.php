@extends('layouts.app')

@section('title', 'Transaksi Saya - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Transaksi Saya</h1>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-700 uppercase text-sm">
                        <tr>
                            <th class="px-6 py-4 font-semibold">No. Transaksi</th>
                            <th class="px-6 py-4 font-semibold">Tipe</th>
                            <th class="px-6 py-4 font-semibold">Tanggal</th>
                            <th class="px-6 py-4 font-semibold">Total</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($transactions as $trx)
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $trx->order_number }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    {{ $trx->type === 'Produk' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $trx->type === 'Layanan' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $trx->type === 'Pelatihan' ? 'bg-orange-100 text-orange-800' : '' }}">
                                    {{ $trx->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $trx->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                Rp {{ number_format($trx->total_amount ?? $trx->total_price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    {{ $trx->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $trx->status === 'paid' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $trx->status === 'confirmed' || $trx->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $trx->status === 'rejected' || $trx->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($trx->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ $trx->url }}" class="text-green-600 hover:text-green-700 font-medium">Detail</a>
                                    @if($trx->status === 'confirmed' || $trx->status === 'completed')
                                        <span class="text-gray-300">|</span>
                                        <a href="{{ route('transactions.receipt', $trx->order_number) }}" class="text-blue-600 hover:text-blue-700 font-medium">Bukti Transaksi</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <div class="text-5xl mb-4">📄</div>
                                <p>Belum ada transaksi.</p>
                                <a href="{{ route('products.index') }}" class="text-green-600 hover:underline mt-2 inline-block">Mulai Belanja</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
