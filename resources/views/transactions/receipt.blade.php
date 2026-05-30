@extends('layouts.app')

@section('title', 'Bukti Transaksi - ' . $transaction->order_number)

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200" id="receipt">
            <!-- Receipt Header -->
            <div class="bg-green-600 px-8 py-6 text-white flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto bg-white p-1 rounded">
                    <div class="ml-4">
                        <h1 class="text-2xl font-bold uppercase tracking-wider">Bukti Transaksi</h1>
                        <p class="text-green-100">Kebun Anggur Jakarta Pusat</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm opacity-80">Nomor Transaksi:</p>
                    <p class="font-mono font-bold">{{ $transaction->order_number }}</p>
                </div>
            </div>

            <div class="p-8">
                <!-- Customer & Info -->
                <div class="grid grid-cols-2 gap-8 mb-8">
                    <div>
                        <h3 class="text-gray-500 text-xs uppercase font-bold mb-2">Ditujukan Kepada:</h3>
                        <p class="font-bold text-gray-800 text-lg">{{ $transaction->user->name ?? $transaction->name }}</p>
                        <p class="text-gray-600 text-sm">{{ $transaction->user->email ?? '' }}</p>
                        <p class="text-gray-600 text-sm">{{ $transaction->phone }}</p>
                    </div>
                    <div class="text-right">
                        <h3 class="text-gray-500 text-xs uppercase font-bold mb-2">Detail Transaksi:</h3>
                        <p class="text-gray-600 text-sm"><span class="font-medium">Tipe:</span> {{ $type }}</p>
                        <p class="text-gray-600 text-sm"><span class="font-medium">Tanggal:</span> {{ $transaction->created_at->format('d F Y') }}</p>
                        <p class="text-gray-600 text-sm"><span class="font-medium">Status:</span> 
                            <span class="text-green-600 font-bold uppercase">{{ $transaction->status }}</span>
                        </p>
                    </div>
                </div>

                <!-- Transaction Content -->
                <div class="border-t border-b border-gray-100 py-6 mb-8">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-gray-400 text-xs uppercase font-bold">
                                <th class="pb-4">Deskripsi</th>
                                <th class="pb-4 text-center">Jumlah</th>
                                <th class="pb-4 text-right">Harga</th>
                                <th class="pb-4 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @if($type === 'Produk')
                                @foreach($transaction->orderItems as $item)
                                <tr>
                                    <td class="py-3 font-medium">{{ $item->product->name }}</td>
                                    <td class="py-3 text-center">{{ $item->quantity }}</td>
                                    <td class="py-3 text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="py-3 text-right">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            @elseif($type === 'Layanan')
                                <tr>
                                    <td class="py-3 font-medium">Layanan Perawatan Kebun ({{ $transaction->visit_count }} Kunjungan)</td>
                                    <td class="py-3 text-center">1</td>
                                    <td class="py-3 text-right">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                    <td class="py-3 text-right">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                </tr>
                            @elseif($type === 'Pelatihan')
                                <tr>
                                    <td class="py-3 font-medium">Pelatihan: {{ $transaction->training->title }}</td>
                                    <td class="py-3 text-center">{{ $transaction->participant_count }} Orang</td>
                                    <td class="py-3 text-right">Rp {{ number_format($transaction->training->price_per_person, 0, ',', '.') }}</td>
                                    <td class="py-3 text-right">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Total -->
                <div class="flex justify-end">
                    <div class="w-64">
                        <div class="flex justify-between py-2 text-gray-600">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($transaction->total_amount ?? $transaction->total_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between py-2 text-gray-600">
                            <span>Biaya Admin</span>
                            <span>Rp 0</span>
                        </div>
                        <div class="flex justify-between py-4 border-t border-gray-200 mt-2">
                            <span class="font-bold text-gray-800 text-lg">Total Pembayaran</span>
                            <span class="font-bold text-green-600 text-lg">Rp {{ number_format($transaction->total_amount ?? $transaction->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-dashed border-gray-200 text-center">
                    <p class="text-gray-500 text-sm mb-4 italic">Tunjukkan bukti transaksi ini kepada tim Kebun Anggur Jakarta Pusat di lokasi.</p>
                    <div class="flex justify-center gap-4 no-print">
                        <button onclick="window.print()" class="bg-gray-800 text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-900 transition flex items-center gap-2">
                            <span>🖨️</span> Cetak Bukti
                        </button>
                        <a href="{{ route('transactions.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                            Kembali ke Riwayat
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-4 text-center text-gray-400 text-xs">
                &copy; {{ date('Y') }} Kebun Anggur Jakarta Pusat. Seluruh hak cipta dilindungi.
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .no-print, nav, footer {
        display: none !important;
    }
    body {
        background: white !important;
    }
    .py-12 {
        padding: 0 !important;
    }
    .max-w-3xl {
        max-width: 100% !important;
    }
    #receipt {
        box-shadow: none !important;
        border: none !important;
    }
}
</style>
@endsection
