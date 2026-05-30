<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product categories
        $productCategories = [
            'Bibit Anggur Import',
            'Tanaman Buah Dalam Pot',
            'Media Tanam',
            'Pupuk Anggur',
        ];

        foreach ($productCategories as $name) {
            Category::create([
                'name' => $name,
                'type' => 'product',
            ]);
        }

        // Article categories
        $articleCategories = [
            'Cara Menanam',
            'Perawatan',
            'Pembuahan',
            'Dokumentasi',
        ];

        foreach ($articleCategories as $name) {
            Category::create([
                'name' => $name,
                'type' => 'article',
            ]);
        }
    }
}