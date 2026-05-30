@extends('layouts.app')

@section('title', 'Kontak - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h1>
            <p class="text-gray-600">Kami siap membantu Anda</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Info -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h2>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="text-3xl">📍</div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Alamat</h3>
                            <p class="text-gray-600">Jl. Pasar Senen No.dalam, RT.10/RW.4, Senen, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10410</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="text-3xl">📞</div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Telepon</h3>
                            <p class="text-gray-600">085714122705</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="text-3xl">✉️</div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Email</h3>
                            <p class="text-gray-600">kebunanggur_jakpus@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="text-3xl">🕐</div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Jam Operasional</h3>
                            <p class="text-gray-600">Senin - Minggu: 08.00 - 21.00</p>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="rounded-lg overflow-hidden shadow h-64">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6834161171428!2d106.84139499999999!3d-6.173124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5ed3ffee3c7%3A0x51e911e8d903b760!2sBibit%20Anggur%20import%20ANGKER%20GRAPES%20jakarta%20pusat!5e0!3m2!1sid!2sid!4v1778159602046!5m2!1sid!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full border rounded-lg px-4 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" class="w-full border rounded-lg px-4 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea name="message" rows="5" class="w-full border rounded-lg px-4 py-2" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection