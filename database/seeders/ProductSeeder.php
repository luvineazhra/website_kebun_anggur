<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Bibit Anggur Crimson Seedless',
                'category_id' => 1,
                'description' => 'Bibit anggur import berkualitas tinggi, varietas Crimson Seedless yang terkenal dengan buah tanpa biji dan rasa manis legit. Cocok untuk ditanam di iklim tropis Indonesia.',
                'price' => 150000,
                'stock' => 50,
                'is_featured' => true,
            ],
            [
                'name' => 'Bibit Anggur Thompson Seedless',
                'category_id' => 1,
                'description' => 'Bibit anggur Thompson Seedless import, varietas legendaris yang menghasilkan buah hijau keemasan dengan rasa manis dan aroma khas. Sangat populer untuk konsumsi segar.',
                'price' => 125000,
                'stock' => 45,
                'is_featured' => true,
            ],
            [
                'name' => 'Tanaman Mangga Dalam Pot',
                'category_id' => 2,
                'description' => 'Tanaman mangga dalam pot siap tanam, varietas harum manis yang sudah berbuah. Tinggi sekitar 80-100cm, cocok untuk taman rumah atau rooftop.',
                'price' => 350000,
                'stock' => 20,
                'is_featured' => true,
            ],
            [
                'name' => 'Tanaman Jeruk Dalam Pot',
                'category_id' => 2,
                'description' => 'Tanaman jeruk dalam pot, varietas lokal berkualitas. Sudah berbuah dengan buah berwarna oranye menarik. Tinggi 60-80cm, cocok untuk dekorasi rumah.',
                'price' => 275000,
                'stock' => 25,
                'is_featured' => false,
            ],
            [
                'name' => 'Pupuk Organik Granul',
                'category_id' => 4,
                'description' => 'Pupuk organik granul berkualitas tinggi untuk tanaman buah dan anggur. Mengandung unsur hara lengkap dan mikroorganisme beneficial. Kemasan 1kg.',
                'price' => 45000,
                'stock' => 100,
                'is_featured' => false,
            ],
            [
                'name' => 'Pupuk NPK Mutiara',
                'category_id' => 4,
                'description' => 'Pupuk NPK lengkap untuk pertumbuhan optimal tanaman buah. Rumus seimbang 16-16-16. Kemasan 500gr, cocok untuk semua jenis tanaman.',
                'price' => 35000,
                'stock' => 150,
                'is_featured' => true,
            ],
            [
                'name' => 'Media Tanam Cocopeat',
                'category_id' => 3,
                'description' => 'Cocopeat berkualitas tinggi sebagai media tanam alternatif. Mampu menyimpan air dan nutrisi dengan baik. Kemasan 5kg, cocok untuk pot dan polybag.',
                'price' => 55000,
                'stock' => 80,
                'is_featured' => false,
            ],
            [
                'name' => 'Bibit Anggur Black Emerald',
                'category_id' => 1,
                'description' => 'Bibit anggur Black Emerald import, varietas unggul dengan buah berwarna hitam keunguan. Rasanya manis dengan tekstur renyah. Tinggi 40-60cm.',
                'price' => 175000,
                'stock' => 30,
                'is_featured' => true,
            ],
            [
                'name' => 'Tanaman Kelengkeng Dalam Pot',
                'category_id' => 2,
                'description' => 'Tanaman kelengkeng dalam pot, varietas pingpong yang sudah berbuah. Tinggi 70-90cm, cocok untuk taman rumah dengan perawatan mudah.',
                'price' => 425000,
                'stock' => 15,
                'is_featured' => false,
            ],
            [
                'name' => 'Pupuk Kandang Kering',
                'category_id' => 4,
                'description' => 'Pupuk kandang kering yang sudah terfermentasi sempurna. Tanpa bau dan bebas pathogen. Sangat baik untuk menyuburkan tanah dan tanaman.',
                'price' => 25000,
                'stock' => 200,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'image' => null,
                'is_featured' => $product['is_featured'],
            ]);
        }
    }
}