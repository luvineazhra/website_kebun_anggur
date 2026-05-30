<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'content' => 'Sangat puas dengan kualitasbibit anggur dari Kebun Anggur Jakarta Pusat. Bibit yang saya beli sehat dan sudah berbuah setelah 3 bulan. Recommended!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Siti Rahayu',
                'content' => 'Layanan konsultasi gratis sangat membantu. Timnya ramah dan sabar menjawab semua pertanyaan saya tentang perawatan anggur. Sekarang kebun saya subur!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Ahmad Wijaya',
                'content' => 'Sudah dua kali beli bibit di sini dan kualitasnya selalu oke. Pengiriman cepat dan packing aman. Akan terus belanja di sini.',
                'rating' => 4,
                'is_approved' => true,
            ],
            [
                'name' => 'Dewi Lestari',
                'content' => 'Saya mengikuti pelatihan di Kebun Anggur Jakarta Pusat dan sangat informative. Materi mudah dipahami dan praktiknya langsung di kebun. Worth it!',
                'rating' => 5,
                'is_approved' => true,
            ],
            [
                'name' => 'Hendra Kusuma',
                'content' => 'Tanamanku yang sebelumnya sering mati, setelah konsultasi dan menggunakan produk dari sini akhirnya bisa tumbuh dengan baik. Terima kasih!',
                'rating' => 4,
                'is_approved' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}