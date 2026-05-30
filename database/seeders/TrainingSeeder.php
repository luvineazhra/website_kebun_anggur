<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainings = [
            [
                'title' => 'Workshop Menanam Anggur untuk Pemula',
                'description' => 'Pelajari dasar-dasar menanam anggur di rumah. Materi meliputi pemilihanbibit, persiapan media tanam, teknik penanaman, dan perawatan harian. Cocok untuk siapa saja yang ingin memulai berkebun anggur.',
                'schedule_date' => '2026-06-15',
                'price_per_person' => 250000,
                'bonus_info' => '1 bibit anggur Crimson Seedless',
                'max_participants' => 20,
                'is_active' => true,
            ],
            [
                'title' => 'Pelatihan Lanjutan: Perawatan dan Pembuahan',
                'description' => 'Pelatihan intensif untuk perawatan anggur agar berbuah lebat. Materi meliputi pemangkasan, pengendalian hama, pemberian pupuk, dan teknik pembuahan. Include praktik langsung di kebun.',
                'schedule_date' => '2026-07-20',
                'price_per_person' => 250000,
                'bonus_info' => '1 bibit anggur Thompson Seedless + Ebook Panduan',
                'max_participants' => 15,
                'is_active' => true,
            ],
            [
                'title' => 'Kelas Berkebun Organik: Tanaman Buah',
                'description' => 'Kelas komprehensif tentang berkebun organik untuk berbagai tanaman buah. Pelajari cara membuat pupuk organik, pestisida alami, dan teknik pertanian organik lainnya.',
                'schedule_date' => '2026-08-10',
                'price_per_person' => 300000,
                'bonus_info' => 'Pupuk organik 5kg + Bibit mangga',
                'max_participants' => 25,
                'is_active' => true,
            ],
        ];

        foreach ($trainings as $training) {
            Training::create($training);
        }
    }
}