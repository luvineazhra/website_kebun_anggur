@extends('layouts.app')

@section('title', 'Layanan Perawatan - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Layanan Perawatan Kebun</h1>
            <p class="text-gray-600">Perawatan profesional untuk kebun anggur Anda</p>
        </div>

        <!-- Service Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <div class="text-5xl mb-4">💰</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Rp 250.000</h3>
                <p class="text-gray-600">Per kunjungan</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <div class="text-5xl mb-4">📞</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Konsultasi Gratis</h3>
                <p class="text-gray-600">Via telepon atau chat</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <div class="text-5xl mb-4">🏠</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Kunjungan ke Lokasi</h3>
                <p class="text-gray-600">Area Jakarta & Sekitar</p>
            </div>
        </div>

        <!-- Service Features -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Apa yang termasuk dalam layanan?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center gap-3">
                    <span class="text-green-600 text-2xl">✓</span>
                    <span class="text-gray-700">Pemeriksaan kondisi tanaman</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-green-600 text-2xl">✓</span>
                    <span class="text-gray-700">Pemangkasan dan perawatan</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-green-600 text-2xl">✓</span>
                    <span class="text-gray-700">Pemberian pupuk dan nutrisi</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-green-600 text-2xl">✓</span>
                    <span class="text-gray-700">Pengendalian hama dan penyakit</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-green-600 text-2xl">✓</span>
                    <span class="text-gray-700">Saran perawatan lanjutan</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-green-600 text-2xl">✓</span>
                    <span class="text-gray-700">Dokumentasi kondisi kebun</span>
                </div>
            </div>
        </div>

        <!-- Booking Form -->
        @auth
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Booking Layanan</h2>
            <form action="{{ route('services.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full border rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP *</label>
                        <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="w-full border rounded-lg px-4 py-2" required>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lokasi *</label>
                    <textarea name="address" rows="2" class="w-full border rounded-lg px-4 py-2" placeholder="Alamat lengkap lokasi perawatan" required></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kunjungan *</label>
                        <input type="date" name="visit_date" min="{{ date('Y-m-d') }}" class="w-full border rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kunjungan *</label>
                        <input type="number" name="visit_count" id="visit_count" value="1" min="1" max="10" class="w-full border rounded-lg px-4 py-2" required onchange="calculateTotal()">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional)</label>
                    <textarea name="notes" rows="2" class="w-full border rounded-lg px-4 py-2" placeholder="Catatan khusus untuk layanan"></textarea>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran *</label>
                    <select name="payment_method" class="w-full border rounded-lg px-4 py-2" required>
                        <option value="">Pilih Metode Pembayaran</option>
                        <option value="Transfer BCA">Transfer BCA</option>
                        <option value="Transfer BRI">Transfer BRI</option>
                        <option value="Transfer Mandiri">Transfer Mandiri</option>
                    </select>
                </div>
                <div class="mt-6 bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="text-lg text-gray-700">Total Harga:</span>
                        <span class="text-2xl font-bold text-green-600" id="total_price">Rp 250.000</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">* 1 Kunjungan = Rp 250.000</p>
                </div>
                <button type="submit" class="w-full mt-6 bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">Booking Sekarang</button>
            </form>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <div class="text-5xl mb-4">🔒</div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Login untuk Booking</h3>
            <p class="text-gray-600 mb-6">Silakan login terlebih dahulu untuk memesan layanan</p>
            <a href="{{ route('login') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">Login</a>
        </div>
        @endauth
    </div>
</div>

<script>
function calculateTotal() {
    const visitCount = document.getElementById('visit_count').value;
    const pricePerVisit = 250000;
    const total = visitCount * pricePerVisit;
    document.getElementById('total_price').innerText = 'Rp ' + total.toLocaleString('id-ID');
}
</script>
@endsection