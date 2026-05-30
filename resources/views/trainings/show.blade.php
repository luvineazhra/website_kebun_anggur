@extends('layouts.app')

@section('title', $training->title . ' - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Training Details -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-64 bg-green-100 flex items-center justify-center">
                        @if($training->image)
                            <img src="{{ asset('storage/trainings/' . $training->image) }}" alt="{{ $training->title }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-9xl">📚</span>
                        @endif
                    </div>
                    <div class="p-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $training->title }}</h1>
                        <div class="flex flex-wrap gap-4 mb-6">
                            <div class="bg-green-50 px-4 py-2 rounded-lg">
                                <p class="text-sm text-gray-600">Tanggal</p>
                                <p class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($training->schedule_date)->format('d M Y') }}</p>
                            </div>
                            <div class="bg-green-50 px-4 py-2 rounded-lg">
                                <p class="text-sm text-gray-600">Harga</p>
                                <p class="font-semibold text-gray-800">{{ $training->formatted_price }}/orang</p>
                            </div>
                            <div class="bg-green-50 px-4 py-2 rounded-lg">
                                <p class="text-sm text-gray-600">Kuota</p>
                                <p class="font-semibold text-gray-800">{{ $training->available_slots }} / {{ $training->max_participants }}</p>
                            </div>
                        </div>
                        <div class="prose max-w-none text-gray-600">
                            {!! nl2br(e($training->description)) !!}
                        </div>
                        @if($training->bonus_info)
                            <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <p class="font-semibold text-yellow-800">🎁 Bonus: {{ $training->bonus_info }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="lg:col-span-1">
                @auth
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Daftar Pelatihan</h3>
                    <form action="{{ route('trainings.register', $training->id) }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full border rounded-lg px-4 py-2" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                                <input type="text" name="phone" class="w-full border rounded-lg px-4 py-2" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Peserta</label>
                                <input type="number" name="participant_count" id="participant_count" value="1" min="1" max="{{ $training->available_slots }}" class="w-full border rounded-lg px-4 py-2" required onchange="calculateTotal()">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran *</label>
                                <select name="payment_method" class="w-full border rounded-lg px-4 py-2" required>
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <option value="Transfer BCA">Transfer BCA</option>
                                    <option value="Transfer BRI">Transfer BRI</option>
                                    <option value="Transfer Mandiri">Transfer Mandiri</option>
                                </select>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Total:</span>
                                    <span class="text-xl font-bold text-green-600" id="total_price">Rp {{ number_format($training->price_per_person, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">Daftar Sekarang</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="text-5xl mb-4">🔒</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Login untuk Daftar</h3>
                    <p class="text-gray-600 mb-6">Silakan login terlebih dahulu untuk mendaftar pelatihan</p>
                    <a href="{{ route('login') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">Login</a>
                </div>
                @endauth
            </div>
        </div>
        
        <div class="mt-8">
            <a href="{{ route('trainings.index') }}" class="text-green-600 hover:text-green-700">← Kembali ke Pelatihan</a>
        </div>
    </div>
</div>

<script>
function calculateTotal() {
    const participantCount = document.getElementById('participant_count').value;
    const pricePerPerson = {{ $training->price_per_person }};
    const total = participantCount * pricePerPerson;
    document.getElementById('total_price').innerText = 'Rp ' + total.toLocaleString('id-ID');
}
</script>
@endsection