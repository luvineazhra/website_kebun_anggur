<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $articles = [
            [
                'category_id' => 5,
                'title' => 'Cara Menanam Anggur di Pots',
                'content' => '<h2>Persiapan Pot dan Media Tanam</h2><p>Menanam anggur dalam pot membutuhkan persiapan yang matang. Pilih pot dengan diameter minimal 40cm agar akar memiliki ruang cukup untuk berkembang. Gunakan campuran tanah, kompos, dan pasir dengan perbandingan 2:1:1.</p><h2>Pemilihan Bibit</h2><p>Pilih bibit anggur yang sehat dengan akar yang kuat. Bibit yang baik memiliki minimal 3-4 daun dan batang yang kokoh. Periksa juga apakah ada tanda-tanda penyakit atau hama.</p><h2>Penanaman</h2><p>Lubangi tengah pot, letakkan bibit dengan hati-hati agar akar tidak terlipat. Timbun dengan media tanam dan tekan perlahan agar padat. Siram hingga jenuh dan letakkan di tempat yang mendapat sinar matahari penuh.</p><h2>Perawatan Rutin</h2><p>Siram tanaman secara teratur, pagi hari adalah waktu terbaik. Berikan pupuk organik setiap 2 minggu sekali. Pangkas cabang yang tidak diperlukan untuk mendorong pertumbuhan buah.</p>',
                'is_published' => true,
            ],
            [
                'category_id' => 6,
                'title' => 'Tips Perawatan anggur Agar Berbuah Lebat',
                'content' => '<h2>Penyiraman yang Tepat</h2><p>anggur membutuhkan penyiraman yang konsisten. Siram 2 kali sehari pada musim kemarau, dan 1 kali sehari pada musim hujan. Hindari genangan air di pot karena dapat menyebabkan akar membusuk.</p><h2>Pemberian Pupuk</h2><p>Gunakan pupuk NPK dengan rumus 10-20-10 untuk mendorong pembungaan. Berikan pupuk organik cair setiap minggu. Pada saat buah mulai terbentuk, tambahkan pupuk kalium untuk memperbesar buah.</p><h2>Pemangkasan</h2><p>Pemangkasan penting untuk membentuk tanaman dan mendorong pembuahan. Pangkas cabang yang terlalu panjang dan daun yang menutupi buah. Pemangkasan dilakukan setelah panen dan saat dorman.</p><h2>Pengendalian Hama</h2><p>Gunakan pestisida organik jika diperlukan. Semprotkan larutan neem oil secara berkala untuk mencegah serangan kutu dan jamur. Jaga kebersihan area tanam untuk mencegah berkembangnya pathogen.</p>',
                'is_published' => true,
            ],
            [
                'category_id' => 7,
                'title' => 'Agar anggur Cepat Berbuah: Tips Pembuahan',
                'content' => '<h2>Memahami Siklus Pembuahan</h2><p>anggur biasanya mulai berbuah pada usia 2-3 tahun setelah tanam. Pemahaman tentang siklus pembuahan membantu kita merawat tanaman dengan optimal. Bunga muncul pada tunas yang sudah cukup tua.</p><h2>Faktor Pendukung Pembuahan</h2><p>Cahaya matahari yang cukup adalah faktor utama. Pastikan tanaman mendapat sinar matahari minimal 6 jam sehari. Suhu ideal untuk pembuahan adalah 25-35°C dengan kelembaban 60-70%.</p><h2>Teknik Penyerbukan</h2><p>Untuk varietas yang membutuhkan penyerbukan silang, tanam minimal 2 tanaman berbeda varietas. Anda juga bisa melakukan penyerbukan manual dengan menggunakan kuas untuk memindahkan serbuk sari.</p><h2>Perawatan Saat Berbuah</h2><p>Setelah buah terbentuk, kurangi penyiraman tetapi tetap jaga kelembaban. Berikan pupuk kalium lebih banyak. Singkirkan buah yang terlalu banyak agar yang tersisa mendapat nutrisi cukup.</p>',
                'is_published' => true,
            ],
            [
                'category_id' => 8,
                'title' => 'Dokumentasi Kebun Anggur Jakarta Pusat',
                'content' => '<h2>Tentang Kebun Anggur Jakarta Pusat</h2><p>Kebun Anggur Jakarta Pusat adalah pusat penjualanbibit anggur dan tanaman buah berkualitas di Jakarta. Kami menyediakan berbagai varietas anggur import dan lokal yang cocok untuk iklim tropis Indonesia.</p><h2>Layanan Kami</h2><p>Kami tidak hanya menjualbibit, tetapi juga memberikan konsultasi gratis untuk perawatan tanaman Anda. Layanan kunjungan ke lokasi juga tersedia untuk area Jakarta dan sekitarnya.</p><h2>Koleksi Produk</h2><p>Koleksi kami meliputi berbagai varietas anggur import seperti Crimson Seedless, Thompson Seedless, dan Black Emerald. Selain itu, kami juga menyediakan tanaman buah dalam pot seperti mangga,jeruk, dan kelengkeng.</p><h2>Kontak dan Lokasi</h2><p>Kunjungi kebun kami di Jl. Kebun Anggur No. 1, Jakarta Pusat. Buka setiap hari Senin-Minggu pukul 08.00-17.00. Hubungi kami di 021-12345678 untuk informasi lebih lanjut.</p>',
                'is_published' => true,
            ],
        ];

        foreach ($articles as $article) {
            Article::create([
                'category_id' => $article['category_id'],
                'user_id' => $admin->id,
                'title' => $article['title'],
                'slug' => Str::slug($article['title']),
                'content' => $article['content'],
                'image' => null,
                'is_published' => $article['is_published'],
                'published_at' => now(),
            ]);
        }
    }
}