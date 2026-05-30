@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Produk</p>
                <p class="text-2xl font-bold text-gray-800">{{ $stats['totalProducts'] }}</p>
            </div>
            <div class="text-4xl text-green-600">🍇</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Pesanan</p>
                <p class="text-2xl font-bold text-gray-800">{{ $stats['totalOrders'] }}</p>
            </div>
            <div class="text-4xl text-blue-600">🛒</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Pendapatan</p>
                <p class="text-2xl font-bold text-gray-800">
                    Rp {{ number_format($stats['totalRevenue'], 0, ',', '.') }}
                </p>
            </div>
            <div class="text-4xl text-yellow-600">💰</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6"> 
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Customer</p>
                <p class="text-2xl font-bold text-gray-800">
                    {{ $stats['totalCustomers'] }}
                </p>
            </div>
            <div class="text-4xl text-purple-600">👥</div>
        </div>
    </div>
</div>



<!-- Charts and Tables -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

    <!-- Revenue Chart -->
    <div class="bg-white rounded-lg shadow p-6">

        <div class="flex items-center justify-between mb-4">

            <h3 class="text-lg font-semibold text-gray-800">
                Grafik Pendapatan
            </h3>

            <select id="revenueType"
                    class="border rounded-lg px-3 py-2 text-sm">

                <option value="weekly">
                    Mingguan
                </option>

                <option value="monthly" selected>
                    Bulanan
                </option>

                <option value="yearly">
                    Tahunan
                </option>

            </select>

        </div>

        <canvas id="revenueChart" height="200"></canvas>

    </div>



    <!-- Best Seller Category -->
    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Best Seller per Kategori
        </h3>

        <canvas id="categoryChart" height="200"></canvas>

    </div>

</div>



<!-- Top Products -->
<div class="bg-white rounded-lg shadow p-6 mb-8">

    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        Produk Paling Laku
    </h3>

    <div class="space-y-3">

        @forelse($topProducts as $index => $item)

            <div class="flex items-center justify-between">

                <span class="text-gray-600">
                    {{ $index + 1 }}. {{ $item->product_name }}
                </span>

                <span class="font-semibold text-green-600">
                    {{ $item->total_sold }} terjual
                </span>

            </div>

        @empty

            <p class="text-gray-500">
                Belum ada data
            </p>

        @endforelse

    </div>

</div>



<!-- Recent Orders & Services -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

    <!-- Recent Orders -->
    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Pesanan Produk Terbaru
        </h3>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>
                    <tr class="border-b text-left text-xs text-gray-500 uppercase">
                        <th class="py-2">No. Pesanan</th>
                        <th class="py-2">Total</th>
                        <th class="py-2">Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($recentOrders as $order)

                        <tr class="border-b text-sm">

                            <td class="py-2">
                                <p class="font-medium">
                                    {{ $order->order_number }}
                                </p>

                                <p class="text-xs text-gray-400">
                                    {{ $order->user->name }}
                                </p>
                            </td>

                            <td class="py-2">
                                {{ $order->formatted_total }}
                            </td>

                            <td class="py-2">

                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold 
                                    {{ $order->status === 'confirmed'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-yellow-100 text-yellow-800' }}">

                                    {{ ucfirst($order->status) }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="3"
                                class="py-4 text-center text-gray-500 text-sm">
                                Tidak ada pesanan
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <a href="{{ route('admin.pesanan.index') }}"
           class="mt-4 block text-center text-sm text-green-600 hover:underline">

            Lihat Semua Pesanan →

        </a>

    </div>



    <!-- Recent Services -->
    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Layanan Terbaru
        </h3>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>
                    <tr class="border-b text-left text-xs text-gray-500 uppercase">
                        <th class="py-2">Customer</th>
                        <th class="py-2">Tanggal</th>
                        <th class="py-2">Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($recentServices as $service)

                        <tr class="border-b text-sm">

                            <td class="py-2">

                                <p class="font-medium">
                                    {{ $service->name }}
                                </p>

                                <p class="text-xs text-gray-400">
                                    {{ $service->visit_count }}x Kunjungan
                                </p>

                            </td>

                            <td class="py-2">
                                {{ \Carbon\Carbon::parse($service->visit_date)->format('d/m/Y') }}
                            </td>

                            <td class="py-2">

                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold 
                                    {{ $service->status === 'confirmed' || $service->status === 'completed'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-yellow-100 text-yellow-800' }}">

                                    {{ ucfirst($service->status) }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="3"
                                class="py-4 text-center text-gray-500 text-sm">
                                Tidak ada layanan
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <a href="{{ route('admin.layanan.index') }}"
           class="mt-4 block text-center text-sm text-green-600 hover:underline">

            Lihat Semua Layanan →

        </a>

    </div>

</div>



<!-- Recent Training -->
<div class="bg-white rounded-lg shadow p-6 mb-8">

    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        Pendaftaran Pelatihan Terbaru
    </h3>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b text-left text-xs text-gray-500 uppercase">
                    <th class="py-2">Nama Peserta</th>
                    <th class="py-2">Pelatihan</th>
                    <th class="py-2">Jumlah</th>
                    <th class="py-2">Total Harga</th>
                    <th class="py-2">Status</th>
                </tr>

            </thead>

            <tbody>

                @forelse($recentRegistrations as $reg)

                    <tr class="border-b text-sm">

                        <td class="py-2">

                            <p class="font-medium">
                                {{ $reg->name }}
                            </p>

                            <p class="text-xs text-gray-400">
                                {{ $reg->phone }}
                            </p>

                        </td>
                        <td class="py-2">
                            {{ $reg->training->title }}
                        </td>
                        <td class="py-2 text-center">
                            {{ $reg->participant_count }}
                        </td>
                        <td class="py-2 font-semibold">
                            Rp {{ number_format($reg->total_price, 0, ',', '.') }}
                        </td>
                        <td class="py-2">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold 
                                {{ $reg->status === 'confirmed'
                                    ? 'bg-green-100 text-green-800'
                                    : 'bg-yellow-100 text-yellow-800' }}">

                                {{ ucfirst($reg->status) }}

                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"
                            class="py-4 text-center text-gray-500 text-sm">
                            Tidak ada pendaftaran
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



<!-- Pending Payments -->
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        Pembayaran Menunggu Verifikasi (Semua Transaksi)
    </h3>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b text-left text-xs text-gray-500 uppercase">
                    <th class="py-2">Tipe</th>
                    <th class="py-2">No. Transaksi / Customer</th>
                    <th class="py-2">Total</th>
                    <th class="py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendingPayments as $payment)
                    <tr class="border-b text-sm">
                        <td class="py-2">
                            <span class="px-2 py-1 rounded text-xs font-medium 
                                {{ $payment->type === 'Produk' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $payment->type === 'Layanan' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $payment->type === 'Pelatihan' ? 'bg-orange-100 text-orange-800' : '' }}">
                                {{ $payment->type }}
                            </span>
                        </td>
                        <td class="py-2">
                            <p class="font-medium">
                                {{ $payment->order_number ?? $payment->name }}
                            </p>
                            <p class="text-xs text-gray-400">
                                {{ $payment->user->name }}
                            </p>
                        </td>
                        <td class="py-2 font-semibold text-green-600">

                            Rp {{ number_format($payment->total_amount ?? $payment->total_price, 0, ',', '.') }}
                        </td>
                        <td class="py-2">
                            <a href="{{ $payment->route }}"
                               class="text-blue-600 hover:underline">
                                Verifikasi →
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"
                            class="py-4 text-center text-gray-500 text-sm">
                            Tidak ada pembayaran yang perlu diverifikasi
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    // ======================================
    // DATA REVENUE
    // ======================================

    const weeklyLabels = {!! json_encode($weeklyRevenue->pluck('label')) !!};
    const weeklyData = {!! json_encode($weeklyRevenue->pluck('total')) !!};

    const monthlyLabels = {!! json_encode($monthlyRevenue->pluck('label')) !!};
    const monthlyData = {!! json_encode($monthlyRevenue->pluck('total')) !!};

    const yearlyLabels = {!! json_encode($yearlyRevenue->pluck('label')) !!};
    const yearlyData = {!! json_encode($yearlyRevenue->pluck('total')) !!};



    // ======================================
    // REVENUE CHART
    // ======================================

    const ctx = document
        .getElementById('revenueChart')
        .getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Pendapatan',
                data: monthlyData,
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                backgroundColor: 'rgba(22,163,74,0.2)',
                borderColor: '#16a34a',
            }]
        },

        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });



    // ======================================
    // DROPDOWN FILTER
    // ======================================

    document
        .getElementById('revenueType')
        .addEventListener('change', function() {

            if(this.value === 'weekly') {
                revenueChart.data.labels = weeklyLabels;
                revenueChart.data.datasets[0].data = weeklyData;
            }

            else if(this.value === 'monthly') {
                revenueChart.data.labels = monthlyLabels;
                revenueChart.data.datasets[0].data = monthlyData;
            }
            else {

                revenueChart.data.labels = yearlyLabels;
                revenueChart.data.datasets[0].data = yearlyData;
            }
            revenueChart.update();
        });



    // ======================================
    // CATEGORY CHART
    // ======================================

    const categoryCtx = document
        .getElementById('categoryChart')
        .getContext('2d');

    new Chart(categoryCtx, {

        type: 'doughnut',

        data: {
            labels: {!! json_encode($bestCategoryProducts->pluck('category_name')) !!},
            datasets: [{
                data: {!! json_encode($bestCategoryProducts->pluck('total_sold')) !!},
                backgroundColor: [
                    '#16a34a',
                    '#2563eb',
                    '#9333ea',
                    '#f59e0b',
                    '#ef4444',
                    '#14b8a6'
                ]

            }]
        },

        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'

                }
            }
        }
    });

</script>
@endsection