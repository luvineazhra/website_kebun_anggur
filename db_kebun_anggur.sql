-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Bulan Mei 2026 pada 12.06
-- Versi server: 8.0.30
-- Versi PHP: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kebun_anggur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `user_id`, `title`, `slug`, `content`, `image`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(2, 6, 1, 'Tips Perawatan anggur Agar Berbuah Lebat', 'tips-perawatan-anggur-agar-berbuah-lebat', '<h2>Penyiraman yang Tepat</h2><p>anggur membutuhkan penyiraman yang konsisten. Siram 2 kali sehari pada musim kemarau, dan 1 kali sehari pada musim hujan. Hindari genangan air di pot karena dapat menyebabkan akar membusuk.</p><h2>Pemberian Pupuk</h2><p>Gunakan pupuk NPK dengan rumus 10-20-10 untuk mendorong pembungaan. Berikan pupuk organik cair setiap minggu. Pada saat buah mulai terbentuk, tambahkan pupuk kalium untuk memperbesar buah.</p><h2>Pemangkasan</h2><p>Pemangkasan penting untuk membentuk tanaman dan mendorong pembuahan. Pangkas cabang yang terlalu panjang dan daun yang menutupi buah. Pemangkasan dilakukan setelah panen dan saat dorman.</p><h2>Pengendalian Hama</h2><p>Gunakan pestisida organik jika diperlukan. Semprotkan larutan neem oil secara berkala untuk mencegah serangan kutu dan jamur. Jaga kebersihan area tanam untuk mencegah berkembangnya pathogen.</p>', NULL, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58', '2026-05-02 03:42:58'),
(3, 7, 1, 'Agar anggur Cepat Berbuah: Tips Pembuahan', 'agar-anggur-cepat-berbuah-tips-pembuahan', '<h2>Memahami Siklus Pembuahan</h2><p>anggur biasanya mulai berbuah pada usia 2-3 tahun setelah tanam. Pemahaman tentang siklus pembuahan membantu kita merawat tanaman dengan optimal. Bunga muncul pada tunas yang sudah cukup tua.</p><h2>Faktor Pendukung Pembuahan</h2><p>Cahaya matahari yang cukup adalah faktor utama. Pastikan tanaman mendapat sinar matahari minimal 6 jam sehari. Suhu ideal untuk pembuahan adalah 25-35°C dengan kelembaban 60-70%.</p><h2>Teknik Penyerbukan</h2><p>Untuk varietas yang membutuhkan penyerbukan silang, tanam minimal 2 tanaman berbeda varietas. Anda juga bisa melakukan penyerbukan manual dengan menggunakan kuas untuk memindahkan serbuk sari.</p><h2>Perawatan Saat Berbuah</h2><p>Setelah buah terbentuk, kurangi penyiraman tetapi tetap jaga kelembaban. Berikan pupuk kalium lebih banyak. Singkirkan buah yang terlalu banyak agar yang tersisa mendapat nutrisi cukup.</p>', NULL, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58', '2026-05-02 03:42:58'),
(4, 8, 1, 'Pelatihan Budidaya Anggur Bersama Kementerian Pertanian', 'pelatihan-budidaya-anggur-bersama-kementerian-pertanian', 'Kegiatan pelatihan budidaya anggur yang diselenggarakan bersama Kementerian Pertanian sebagai upaya meningkatkan pengetahuan masyarakat mengenai teknik penanaman, perawatan, hingga proses pembibitan anggur yang baik dan benar. Peserta mendapatkan edukasi langsung mengenai cara budidaya anggur yang cocok untuk iklim tropis Indonesia.', 'article_1778221918.jpeg', 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58', '2026-05-07 23:31:59'),
(5, 8, 3, 'Pelatihan Bersama Himpunan Petani Sejahtera Mandiri Indonesia', 'pelatihan-bersama-himpunan-petani-sejahtera-mandiri-indonesia', 'Dokumentasi kegiatan pelatihan dan edukasi budidaya anggur bersama Himpunan Petani Sejahtera Mandiri Indonesia. Dalam kegiatan ini peserta mendapatkan pembelajaran mengenai pemilihan bibit unggul, teknik perawatan, pemupukan, serta pengembangan usaha pertanian berbasis tanaman buah.', 'article_1778221984.jpeg', 1, '2026-05-07 23:33:04', '2026-05-07 23:33:04', '2026-05-07 23:33:17'),
(6, 8, 3, 'Pelatihan Bersama Balai Penelitian Pertanian Jakarta Selatan', 'pelatihan-bersama-balai-penelitian-pertanian-jakarta-selatan', 'Kegiatan pelatihan dan diskusi budidaya anggur bersama Balai Penelitian Pertanian Jakarta Selatan sebagai bentuk pengembangan pengetahuan pertanian dan pembelajaran teknik budidaya tanaman buah yang efektif dan berkualitas.', 'article_1778222098.jpeg', 1, '2026-05-07 23:34:58', '2026-05-07 23:34:58', '2026-05-07 23:34:58'),
(7, 7, 3, 'Cara Merangsang Pembuahan Anggur', 'cara-merangsang-pembuahan-anggur', 'Agar tanaman anggur cepat berbuah, diperlukan teknik perawatan dan pemupukan yang tepat. Selain itu, tanaman juga harus berada dalam kondisi sehat dan cukup umur untuk berbuah.\r\n\r\nTips merangsang pembuahan:\r\n1. Lakukan pemangkasan rutin.\r\n2. Kurangi penyiraman beberapa hari sebelum pemangkasan.\r\n3. Gunakan pupuk tinggi fosfor dan kalium.\r\n4. Pastikan tanaman terkena sinar matahari penuh.\r\n5. Jaga tanaman dari serangan hama dan penyakit.\r\n\r\nDengan teknik yang benar, tanaman anggur dapat menghasilkan buah yang lebat dan manis.', NULL, 1, '2026-05-07 23:40:50', '2026-05-07 23:40:50', '2026-05-07 23:40:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('product','article') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Bibit Anggur Import', 'product', '2026-05-02 03:42:57', '2026-05-02 03:42:57'),
(2, 'Tanaman Buah Dalam Pot', 'product', '2026-05-02 03:42:57', '2026-05-07 23:11:32'),
(3, 'Media Tanam', 'product', '2026-05-02 03:42:57', '2026-05-02 03:42:57'),
(4, 'Pupuk Anggur', 'product', '2026-05-02 03:42:57', '2026-05-02 03:42:57'),
(5, 'Cara Menanam', 'article', '2026-05-02 03:42:57', '2026-05-02 03:42:57'),
(6, 'Perawatan', 'article', '2026-05-02 03:42:57', '2026-05-02 03:42:57'),
(7, 'Pembuahan', 'article', '2026-05-02 03:42:57', '2026-05-02 03:42:57'),
(8, 'Dokumentasi', 'article', '2026-05-02 03:42:58', '2026-05-02 03:42:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_01_000001_create_categories_table', 1),
(6, '2024_01_01_000002_create_products_table', 1),
(7, '2024_01_01_000003_create_carts_table', 1),
(8, '2024_01_01_000004_create_orders_table', 1),
(9, '2024_01_01_000005_create_order_items_table', 1),
(10, '2024_01_01_000006_create_services_table', 1),
(11, '2024_01_01_000007_create_trainings_table', 1),
(12, '2024_01_01_000008_create_training_registrations_table', 1),
(13, '2024_01_01_000009_create_articles_table', 1),
(14, '2024_01_01_000010_create_testimonials_table', 1),
(15, '2024_01_01_000011_create_contacts_table', 1),
(16, '2026_05_02_123416_add_payment_fields_to_services_and_trainings', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `status` enum('pending','paid','confirmed','rejected','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `virtual_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `total_amount`, `status`, `payment_method`, `virtual_account`, `payment_proof`, `notes`, `created_at`, `updated_at`) VALUES
(5, 6, 'ORD-20260508-8JVM', '125000.00', 'confirmed', 'Transfer BCA', '88884736956884', 'payment_ORD-20260508-8JVM_1778240241.png', 'Jl. Karet Sudirman No 14, RT 03/RW 07 Kel Kembangan', '2026-05-08 04:36:26', '2026-05-10 23:57:33'),
(6, 5, 'ORD-20260583-8JVM', '2500000.00', 'confirmed', 'Transfer BCA', '03398472829394', NULL, NULL, '2026-05-13 06:44:49', '2026-05-13 06:50:19'),
(250, 2, 'ORD-20260508-A1BX', '2500000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-08 02:15:00', '2026-05-08 02:15:00'),
(251, 9, 'ORD-20260509-C2DY', '1500000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-09 03:20:00', '2026-05-09 03:20:00'),
(252, 5, 'ORD-20260510-E3FZ', '3200000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-10 04:10:00', '2026-05-10 04:10:00'),
(253, 6, 'ORD-20260511-G4HX', '2750000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-11 06:00:00', '2026-05-11 06:00:00'),
(254, 7, 'ORD-20260512-I5JK', '1800000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-12 07:45:00', '2026-05-12 07:45:00'),
(255, 8, 'ORD-20260513-L6MN', '4200000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-13 08:30:00', '2026-05-13 08:30:00'),
(256, 9, 'ORD-20260514-O7PQ', '3600000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-14 03:00:00', '2026-05-14 03:00:00'),
(257, 10, 'ORD-20260515-R8ST', '2900000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-15 04:45:00', '2026-05-15 04:45:00'),
(258, 2, 'ORD-20260516-U9VW', '5100000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-16 07:10:00', '2026-05-16 07:10:00'),
(259, 9, 'ORD-20260517-X1YZ', '1700000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-05-17 09:20:00', '2026-05-17 09:20:00'),
(260, 5, 'ORD-20260601-B2CD', '3400000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-01 02:00:00', '2026-06-01 02:00:00'),
(261, 6, 'ORD-20260603-E4FG', '2800000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-03 03:30:00', '2026-06-03 03:30:00'),
(262, 7, 'ORD-20260605-H5IJ', '4300000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-05 05:00:00', '2026-06-05 05:00:00'),
(263, 8, 'ORD-20260607-K6LM', '2100000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-07 06:20:00', '2026-06-07 06:20:00'),
(264, 9, 'ORD-20260609-N7OP', '3700000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-09 08:00:00', '2026-06-09 08:00:00'),
(265, 10, 'ORD-20260611-Q8RS', '1950000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-11 09:10:00', '2026-06-11 09:10:00'),
(266, 2, 'ORD-20260613-T9UV', '4600000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-13 04:40:00', '2026-06-13 04:40:00'),
(267, 9, 'ORD-20260615-W1XY', '2500000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-15 07:50:00', '2026-06-15 07:50:00'),
(268, 5, 'ORD-20260618-Z2AB', '5200000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-18 02:25:00', '2026-06-18 02:25:00'),
(269, 6, 'ORD-20260620-C3DE', '3100000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-06-20 10:30:00', '2026-06-20 10:30:00'),
(270, 7, 'ORD-20260702-F4GH', '2800000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-02 03:00:00', '2026-07-02 03:00:00'),
(271, 8, 'ORD-20260704-I5JK', '3900000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-04 04:15:00', '2026-07-04 04:15:00'),
(272, 9, 'ORD-20260706-L6MN', '4700000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-06 06:45:00', '2026-07-06 06:45:00'),
(273, 10, 'ORD-20260708-O7PQ', '2300000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-08 08:20:00', '2026-07-08 08:20:00'),
(274, 2, 'ORD-20260710-R8ST', '5400000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-10 02:30:00', '2026-07-10 02:30:00'),
(275, 9, 'ORD-20260712-U9VW', '3200000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-12 05:10:00', '2026-07-12 05:10:00'),
(276, 5, 'ORD-20260715-X1YZ', '4100000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-15 07:00:00', '2026-07-15 07:00:00'),
(277, 6, 'ORD-20260718-A2BC', '2600000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-18 09:40:00', '2026-07-18 09:40:00'),
(278, 7, 'ORD-20260721-D3EF', '5800000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-21 03:50:00', '2026-07-21 03:50:00'),
(279, 8, 'ORD-20260725-G4HI', '3500000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-07-25 06:25:00', '2026-07-25 06:25:00'),
(280, 9, 'ORD-20260802-J5KL', '4200000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-02 02:10:00', '2026-08-02 02:10:00'),
(281, 10, 'ORD-20260805-M6NO', '3100000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-05 04:00:00', '2026-08-05 04:00:00'),
(282, 2, 'ORD-20260808-P7QR', '6000000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-08 07:30:00', '2026-08-08 07:30:00'),
(283, 9, 'ORD-20260811-S8TU', '2500000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-11 08:45:00', '2026-08-11 08:45:00'),
(284, 5, 'ORD-20260814-V9WX', '4900000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-14 03:15:00', '2026-08-14 03:15:00'),
(285, 6, 'ORD-20260818-Y1ZA', '3300000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-18 05:50:00', '2026-08-18 05:50:00'),
(286, 7, 'ORD-20260821-B2CD', '4600000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-21 09:10:00', '2026-08-21 09:10:00'),
(287, 8, 'ORD-20260824-E3FG', '2700000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-24 02:40:00', '2026-08-24 02:40:00'),
(288, 9, 'ORD-20260827-H4IJ', '5200000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-27 06:35:00', '2026-08-27 06:35:00'),
(289, 10, 'ORD-20260830-K5LM', '3800000.00', 'confirmed', NULL, NULL, NULL, NULL, '2026-08-30 10:00:00', '2026-08-30 10:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(5, 5, 17, 1, '125000.00', '2026-05-08 04:36:26', '2026-05-08 04:36:26'),
(6, 250, 14, 2, '1250000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(7, 250, 15, 1, '500000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(8, 251, 16, 3, '500000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(9, 252, 14, 1, '1250000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(10, 252, 17, 2, '975000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(11, 253, 18, 4, '500000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(12, 254, 19, 2, '900000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(13, 255, 14, 3, '1250000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(14, 256, 20, 5, '500000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(15, 257, 21, 2, '1100000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(16, 258, 22, 6, '500000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(17, 259, 14, 2, '1250000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(18, 260, 23, 3, '750000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(19, 261, 24, 2, '850000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(20, 262, 25, 4, '950000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(21, 263, 26, 2, '1200000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(22, 264, 27, 5, '650000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(23, 265, 28, 3, '150000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(24, 266, 29, 4, '200000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(25, 267, 30, 2, '2500000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(26, 268, 31, 1, '2800000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(27, 269, 32, 2, '3000000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(28, 270, 14, 3, '1250000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(29, 271, 15, 2, '500000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01'),
(30, 272, 16, 4, '500000.00', '2026-05-11 12:03:01', '2026-05-11 12:03:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `stock` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `stock`, `image`, `is_featured`, `created_at`, `updated_at`) VALUES
(8, 1, 'Bibit Anggur Import (Ukraina) Dixon', 'bibit-anggur-import-ukraina-dixon', 'Varietas anggur premium asal Ukraina dengan pertumbuhan cepat dan buah berukuran besar. Memiliki rasa manis segar serta cocok dibudidayakan di iklim tropis Indonesia.', '125000.00', 100, 'product_1778161787.jpeg', 0, '2026-05-02 03:42:58', '2026-05-08 00:23:25'),
(14, 1, 'Bibit Anggur Import (Portugal) Portuguese Dream', 'bibit-anggur-import-portugal-portuguese-dream', 'Anggur unggulan dengan cita rasa manis lembut dan tampilan buah yang cantik. Cocok untuk koleksi maupun budidaya rumahan.', '125000.00', 100, 'product_1778161851.jpeg', 0, '2026-05-07 06:50:51', '2026-05-08 00:23:34'),
(15, 1, 'Bibit Anggur Import (Ukraina) Donetsky', 'bibit-anggur-import-ukraina-donetsky', 'Varietas anggur produktif dengan buah berwarna menarik dan daging buah renyah. Memiliki daya adaptasi yang baik di dataran rendah.', '125000.00', 100, 'product_1778161901.jpeg', 0, '2026-05-07 06:51:41', '2026-05-08 00:23:49'),
(16, 1, 'Bibit Anggur Import (Amerika) Scarlett Royal', 'bibit-anggur-import-amerika-scarlett-royal', 'Anggur meja premium dengan warna merah keunguan yang elegan. Rasanya manis, renyah, dan banyak diminati pecinta anggur import.', '125000.00', 100, 'product_1778161940.jpeg', 0, '2026-05-07 06:52:20', '2026-05-08 00:24:00'),
(17, 1, 'Bibit Anggur Import (Ukraina) Cerny Crystal', 'bibit-anggur-import-ukraina-cerny-crystal', 'Memiliki tampilan buah yang bening mengilap dan rasa manis segar. Cocok untuk budidaya skala rumahan maupun kebun.', '125000.00', 99, 'product_1778162065.jpeg', 1, '2026-05-07 06:54:25', '2026-05-10 23:57:33'),
(18, 1, 'Bibit Anggur Import (Ukraina) Julian', 'bibit-anggur-import-ukraina-julian', 'Varietas unggulan dengan buah lonjong besar dan rasa manis pekat. Pertumbuhannya cepat dan mudah dirawat.', '125000.00', 50, 'product_1778162127.jpeg', 0, '2026-05-07 06:55:27', '2026-05-08 00:55:55'),
(19, 1, 'Bibit Anggur Import (Ukraina) Taldun', 'bibit-anggur-import-ukraina-taldun', 'Anggur berkualitas tinggi dengan produktivitas stabil dan buah berukuran besar. Cocok untuk pecinta anggur premium.', '125000.00', 50, 'product_1778162177.jpeg', 0, '2026-05-07 06:56:17', '2026-05-08 00:22:55'),
(20, 1, 'Bibit Anggur Import (Ukraina) GozV', 'bibit-anggur-import-ukraina-gozv', 'Varietas anggur import dengan rasa manis segar dan tekstur renyah. Banyak diminati karena tampilannya yang unik dan menarik.', '125000.00', 100, 'product_1778217059.jpeg', 1, '2026-05-07 22:10:59', '2026-05-08 00:56:10'),
(21, 1, 'Bibit Anggur Import (India) Basanti', 'bibit-anggur-import-india-basanti', 'Anggur dengan pertumbuhan subur dan buah bercita rasa manis ringan. Cocok untuk pemula yang ingin mulai budidaya anggur.', '125000.00', 50, 'product_1778217107.jpeg', 0, '2026-05-07 22:11:47', '2026-05-08 00:22:20'),
(22, 1, 'Bibit Anggur Import (Ukraina) Zhuraflonok', 'bibit-anggur-import-ukraina-zhuraflonok', 'Varietas langka dengan buah cantik dan produktivitas tinggi. Memiliki ketahanan yang cukup baik terhadap cuaca tropis.', '125000.00', 60, 'product_1778217145.jpeg', 0, '2026-05-07 22:12:25', '2026-05-08 00:25:41'),
(23, 1, 'Bibit Anggur Import (Ukraina) Ninel', 'bibit-anggur-import-ukraina-ninel', 'Anggur premium dengan rasa manis legit dan warna buah menarik. Cocok dijadikan tanaman koleksi maupun konsumsi.', '125000.00', 100, 'product_1778217196.jpeg', 0, '2026-05-07 22:13:16', '2026-05-08 00:21:54'),
(24, 1, 'Bibit Anggur Import (Ukraina) Carnival', 'bibit-anggur-import-ukraina-carnival', 'Varietas anggur dengan tampilan buah berwarna cerah dan rasa yang segar. Memberikan kesan mewah pada kebun rumah Anda.', '125000.00', 50, 'product_1778217281.jpeg', 0, '2026-05-07 22:14:41', '2026-05-07 22:24:57'),
(25, 1, 'Bibit Anggur Import (Ukraina) Beauty Kratsoka', 'bibit-anggur-import-ukraina-beauty-kratsoka', 'Anggur cantik dengan buah besar dan rasa manis alami. Salah satu varietas favorit untuk koleksi tanaman buah premium.', '125000.00', 50, 'product_1778217322.jpeg', 0, '2026-05-07 22:15:22', '2026-05-07 22:24:49'),
(26, 1, 'Bibit Anggur Import (Ukraina) Transfiguration', 'bibit-anggur-import-ukraina-transfiguration', 'Varietas terkenal dengan ukuran buah jumbo dan rasa manis tinggi. Memiliki nilai jual tinggi dan sangat cocok dibudidayakan.', '125000.00', 50, 'product_1778217357.jpeg', 0, '2026-05-07 22:15:57', '2026-05-08 00:06:05'),
(27, 1, 'Bibit Anggur Import (China) Linglong Finger', 'bibit-anggur-import-china-linglong-finger', 'Anggur unik berbentuk panjang menyerupai jari dengan rasa manis renyah. Sangat populer karena bentuknya yang eksotis dan menarik.', '125000.00', 50, 'product_1778217397.jpeg', 0, '2026-05-07 22:16:37', '2026-05-07 22:24:41'),
(28, 3, 'Media Tanam Anggur', 'media-tanam-anggur', 'Media tanam berkualitas tinggi yang diformulasikan khusus untuk menunjang pertumbuhan bibit anggur dan berbagai jenis tanaman buah maupun tanaman hias. Terbuat dari campuran bahan organik pilihan seperti pupuk kandang, sekam bakar, tanah lembang, dan kompos yang membantu menjaga kelembapan tanah, mempercepat pertumbuhan akar, serta meningkatkan kesuburan tanaman.\r\nCocok digunakan untuk:\r\n\r\nBibit anggur import\r\nTanaman buah\r\nTanaman hias\r\nPembibitan\r\nTabulampot\r\n\r\nKeunggulan:\r\n\r\nGembur dan subur\r\nKaya unsur hara\r\nMembantu akar tumbuh lebih cepat\r\nMenjaga kelembapan tanah\r\nSiap pakai tanpa perlu campuran tambahan', '35000.00', 50, 'product_1778219848.jpeg', 0, '2026-05-07 22:57:28', '2026-05-07 22:59:52'),
(29, 4, 'Pupuk Organik', 'pupuk-organik', 'Pupuk organik berkualitas yang membantu memenuhi kebutuhan nutrisi tanaman agar tumbuh lebih sehat, subur, dan produktif. Cocok digunakan untuk tanaman anggur, tanaman buah, maupun tanaman hias. Mengandung unsur hara alami yang membantu mempercepat pertumbuhan daun, batang, akar, hingga pembentukan buah.', '80000.00', 50, 'product_1778219971.jpeg', 0, '2026-05-07 22:59:31', '2026-05-07 22:59:31'),
(30, 2, 'TAMBULAMPOT Anggur Import Transfiguration', 'tambulampot-anggur-import-transfiguration', 'Tanaman buah anggur import varietas Transfiguration yang sudah ditanam dalam pot dan siap mempercantik halaman rumah maupun kebun Anda. Memiliki pertumbuhan yang kuat dengan buah berukuran besar, rasa manis segar, serta tampilan tandan yang cantik dan premium.\r\n\r\nKeunggulan:\r\nSudah ditanam dalam pot\r\nSiap rawat dan siap berbuah\r\nBuah besar dan manis\r\nCocok untuk iklim tropis\r\nPerawatan mudah', '2500000.00', 5, 'product_1778220662.jpeg', 1, '2026-05-07 23:11:02', '2026-05-07 23:11:02'),
(31, 2, 'TAMBULAMPOT Anggur Import GozV', 'tambulampot-anggur-import-gozv', 'Tanaman anggur import varietas GozV dalam pot dengan pertumbuhan sehat dan tampilan tanaman yang elegan. Memiliki buah dengan rasa manis segar dan cocok dibudidayakan di lingkungan rumah maupun kebun kecil.\r\n\r\nCocok untuk:\r\nHalaman rumah\r\nBalkon dan rooftop\r\nKebun mini\r\nPecinta tanaman buah import', '1500000.00', 5, 'product_1778220781.jpeg', 0, '2026-05-07 23:13:01', '2026-05-07 23:13:01'),
(32, 2, 'TAMBULAMPOT Pot Anggur Import Julian', 'tambulampot-pot-anggur-import-julian', 'Tanaman buah anggur import varietas Julian yang sudah ditanam dalam pot berkualitas dan siap menjadi tanaman hias sekaligus tanaman produktif di rumah Anda. Memiliki pertumbuhan yang baik dengan buah berwarna menarik dan rasa manis premium.\r\n\r\nCocok digunakan untuk:\r\nDekorasi taman\r\nBudidaya rumahan\r\nKoleksi tanaman buah\r\nMedia edukasi berkebun', '2500000.00', 5, 'product_1778220859.jpeg', 0, '2026-05-07 23:14:19', '2026-05-07 23:14:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_date` date NOT NULL,
  `visit_count` int NOT NULL DEFAULT '1',
  `total_price` decimal(12,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `virtual_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','confirmed','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `order_number`, `user_id`, `name`, `phone`, `address`, `visit_date`, `visit_count`, `total_price`, `payment_method`, `virtual_account`, `payment_proof`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(3, 'SVC-20260508-QYFE', 6, 'ash', '084526116726', 'Jl. Kembangan', '2026-05-21', 3, '750000.00', 'Transfer BRI', '77779768301702', 'payment_SVC-20260508-QYFE_1778242072.png', 'confirmed', NULL, '2026-05-08 05:07:25', '2026-05-10 23:56:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `name`, `content`, `rating`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Budi Santoso', 'Sangat puas dengan kualitasbibit anggur dari Kebun Anggur Jakarta Pusat. Bibit yang saya beli sehat dan sudah berbuah setelah 3 bulan. Recommended!', 5, 0, '2026-05-02 03:42:58', '2026-05-03 20:43:02'),
(2, NULL, 'Siti Rahayu', 'Layanan konsultasi gratis sangat membantu. Timnya ramah dan sabar menjawab semua pertanyaan saya tentang perawatan anggur. Sekarang kebun saya subur!', 5, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58'),
(3, NULL, 'Ahmad Wijaya', 'Sudah dua kali beli bibit di sini dan kualitasnya selalu oke. Pengiriman cepat dan packing aman. Akan terus belanja di sini.', 4, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58'),
(4, NULL, 'Dewi Lestari', 'Saya mengikuti pelatihan di Kebun Anggur Jakarta Pusat dan sangat informative. Materi mudah dipahami dan praktiknya langsung di kebun. Worth it!', 5, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58'),
(5, NULL, 'Hendra Kusuma', 'Tanamanku yang sebelumnya sering mati, setelah konsultasi dan menggunakan produk dari sini akhirnya bisa tumbuh dengan baik. Terima kasih!', 4, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_date` date NOT NULL,
  `price_per_person` decimal(12,2) NOT NULL DEFAULT '250000.00',
  `bonus_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1 bibit anggur',
  `max_participants` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `description`, `schedule_date`, `price_per_person`, `bonus_info`, `max_participants`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Workshop Menanam Anggur untuk Pemula', 'Pelajari dasar-dasar menanam anggur di rumah. Materi meliputi pemilihanbibit, persiapan media tanam, teknik penanaman, dan perawatan harian. Cocok untuk siapa saja yang ingin memulai berkebun anggur.', '2026-06-15', '250000.00', '1 bibit anggur Crimson Seedless', 20, NULL, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58'),
(2, 'Pelatihan Lanjutan: Perawatan dan Pembuahan', 'Pelatihan intensif untuk perawatan anggur agar berbuah lebat. Materi meliputi pemangkasan, pengendalian hama, pemberian pupuk, dan teknik pembuahan. Include praktik langsung di kebun.', '2026-07-20', '250000.00', '1 bibit anggur Thompson Seedless + Ebook Panduan', 15, NULL, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58'),
(3, 'Kelas Berkebun Organik: Tanaman Buah', 'Kelas komprehensif tentang berkebun organik untuk berbagai tanaman buah. Pelajari cara membuat pupuk organik, pestisida alami, dan teknik pertanian organik lainnya.', '2026-08-10', '300000.00', 'Pupuk organik 5kg + Bibit mangga', 25, NULL, 1, '2026-05-02 03:42:58', '2026-05-02 03:42:58'),
(4, 'Pelatihan menanam', 'rr', '2026-05-15', '250000.00', 'free 1 bibit', 20, NULL, 1, '2026-05-03 02:24:35', '2026-05-03 22:18:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `training_registrations`
--

CREATE TABLE `training_registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_count` int NOT NULL DEFAULT '1',
  `total_price` decimal(12,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `virtual_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `training_registrations`
--

INSERT INTO `training_registrations` (`id`, `order_number`, `training_id`, `user_id`, `name`, `phone`, `participant_count`, `total_price`, `payment_method`, `virtual_account`, `payment_proof`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 2, 2, 'Hafiz', '087711422199', 1, '250000.00', NULL, NULL, NULL, 'cancelled', '2026-05-02 05:16:32', '2026-05-03 00:00:12'),
(2, 'TRN-20260502-3BQD', 1, 2, 'Hafiz', '087711422199', 1, '250000.00', 'Transfer BRI', '77774563081525', 'payment_TRN-20260502-3BQD_1777725754.jpg', 'confirmed', '2026-05-02 05:42:25', '2026-05-02 23:44:50'),
(3, 'TRN-20260503-Z2MW', 2, 2, 'Hafizeewe', '087711422199', 2, '500000.00', 'Transfer BRI', '77779986435796', 'payment_TRN-20260503-Z2MW_1777791532.jpg', 'confirmed', '2026-05-02 23:58:46', '2026-05-03 00:00:03'),
(5, 'TRN-20260508-BKJ1', 2, 6, 'ash', '0823122328173', 2, '500000.00', 'Transfer BCA', '88889704931940', 'payment_TRN-20260508-BKJ1_1778240372.png', 'pending', '2026-05-08 04:39:11', '2026-05-08 04:39:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('customer','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Kebun Anggur', 'admin@kebun-anggur.com', NULL, '$2y$10$cQhJcCZVAlMLW/5f7/WCwesHuyrhLJ/ECJI7CAex6wsCQn63KtvGi', 'admin', '021-12345678', 'Jl. Kebun Anggur No. 1, Jakarta Pusat', NULL, '2026-05-02 03:42:57', '2026-05-02 03:42:57'),
(2, 'Hafiz', 'hafizabbas004@gmail.com', NULL, '$2y$10$92x/np7rXP9c7bkGjI4b.e6o.zDHLoysS8AsaTdZ5Hv.MpzRTfWDK', 'customer', NULL, NULL, NULL, '2026-05-02 04:41:48', '2026-05-02 04:41:48'),
(3, 'Luvine', 'luv@gmail.com', NULL, '$2y$10$ZDweujWZjKFYxojVV144seN0s98/w8v.Nvv77d7CFZgE/8wzs.fb.', 'admin', NULL, NULL, 'ux8J08PZn5cMzDoD3pup6quCGKX76hhKU1cj3ZUJOR6IpJ0EL36swlR07gh2', '2026-05-03 05:06:18', '2026-05-03 05:06:18'),
(5, 'zuxxy', 'zuxxy@gmail.com', NULL, '$2y$10$4MDfz75fvueBd9UUjVjVSuxCKaXSiJDexkiVcRWRw2rXrOsxxBsR6', 'customer', NULL, NULL, NULL, '2026-05-07 04:49:36', '2026-05-07 04:49:36'),
(6, 'ash', 'ash@gmail.com', NULL, '$2y$10$FVe6NwpoNNe6imrt5cmyDeDgJmy9oB2NhCjKxB96GYHom4v4H5U3O', 'customer', NULL, NULL, NULL, '2026-05-08 04:07:15', '2026-05-08 04:07:15'),
(7, 'vincent', 'vin@gmail.com', NULL, 'password', 'customer', '085423912483', 'Jl. Karet Raya', NULL, NULL, NULL),
(8, 'shafa', 'shafa2@gmail.com', NULL, 'password', 'customer', '085634233126', 'Jl. Ketapel No22', NULL, NULL, NULL),
(9, 'davinci', 'davinci@gmail.com', NULL, 'password', 'customer', '08533273823', 'Jl. Sawo', NULL, NULL, NULL),
(10, 'Abdul', 'abdul@gmail.com', NULL, 'password', 'customer', '0893827384928', 'Jl. Sawi No 12', NULL, NULL, NULL),
(11, 'izumi', 'izumi', NULL, 'password', 'customer', '0863847283', 'JL. KUPANG RAYA', NULL, NULL, NULL),
(12, 'Harry', 'harry@gmail.com', NULL, 'password', 'customer', '0863822737362', 'Jl. Laksamana muda', NULL, NULL, NULL),
(13, 'mayi', 'mayi@gmail.com', NULL, 'password', 'customer', '08374827328443', 'Jl. Merdeka raya', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_category_id_foreign` (`category_id`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_order_number_unique` (`order_number`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `training_registrations`
--
ALTER TABLE `training_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `training_registrations_order_number_unique` (`order_number`),
  ADD KEY `training_registrations_training_id_foreign` (`training_id`),
  ADD KEY `training_registrations_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `training_registrations`
--
ALTER TABLE `training_registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `training_registrations`
--
ALTER TABLE `training_registrations`
  ADD CONSTRAINT `training_registrations_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `training_registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
