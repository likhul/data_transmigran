-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2026 pada 04.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_transmigran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `slug`, `konten`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'gotong royong', 'gotong-royong', '<p>hahahahaah dhvvbk uvh&nbsp; gf fg fvuif&nbsp; f7- 0g gyo&nbsp; gh0ggogn 8b pcgcfhvjbhkn cghjkl</p>', '1775030632_Screenshot 2025-10-15 194152 - Copy - Copy.png', 1, '2026-04-01 01:03:52', '2026-04-01 21:30:10'),
(3, 'gotong royong', 'gotong-royong', '<p>dxgfchgvjhbkasjln.</p>', '1776051143_gotong-royong.png', 1, '2026-04-12 20:32:26', '2026-04-12 20:32:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-berita_terbaru', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:17:\"App\\Models\\Berita\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"beritas\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:5:\"judul\";s:13:\"gotong royong\";s:4:\"slug\";s:13:\"gotong-royong\";s:6:\"konten\";s:25:\"<p>dxgfchgvjhbkasjln.</p>\";s:6:\"gambar\";s:28:\"1776051143_gotong-royong.png\";s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2026-04-13 03:32:26\";s:10:\"updated_at\";s:19:\"2026-04-13 03:32:26\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:5:\"judul\";s:13:\"gotong royong\";s:4:\"slug\";s:13:\"gotong-royong\";s:6:\"konten\";s:25:\"<p>dxgfchgvjhbkasjln.</p>\";s:6:\"gambar\";s:28:\"1776051143_gotong-royong.png\";s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2026-04-13 03:32:26\";s:10:\"updated_at\";s:19:\"2026-04-13 03:32:26\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:5:\"judul\";i:1;s:4:\"slug\";i:2;s:6:\"konten\";i:3;s:6:\"gambar\";i:4;s:7:\"user_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:17:\"App\\Models\\Berita\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"beritas\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:5:\"judul\";s:13:\"gotong royong\";s:4:\"slug\";s:13:\"gotong-royong\";s:6:\"konten\";s:101:\"<p>hahahahaah dhvvbk uvh&nbsp; gf fg fvuif&nbsp; f7- 0g gyo&nbsp; gh0ggogn 8b pcgcfhvjbhkn cghjkl</p>\";s:6:\"gambar\";s:57:\"1775030632_Screenshot 2025-10-15 194152 - Copy - Copy.png\";s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2026-04-01 08:03:52\";s:10:\"updated_at\";s:19:\"2026-04-02 04:30:10\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:5:\"judul\";s:13:\"gotong royong\";s:4:\"slug\";s:13:\"gotong-royong\";s:6:\"konten\";s:101:\"<p>hahahahaah dhvvbk uvh&nbsp; gf fg fvuif&nbsp; f7- 0g gyo&nbsp; gh0ggogn 8b pcgcfhvjbhkn cghjkl</p>\";s:6:\"gambar\";s:57:\"1775030632_Screenshot 2025-10-15 194152 - Copy - Copy.png\";s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2026-04-01 08:03:52\";s:10:\"updated_at\";s:19:\"2026-04-02 04:30:10\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:5:\"judul\";i:1;s:4:\"slug\";i:2;s:6:\"konten\";i:3;s:6:\"gambar\";i:4;s:7:\"user_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1776057030),
('laravel-cache-direktori_uptd_page_1', 'O:42:\"Illuminate\\Pagination\\LengthAwarePaginator\":12:{s:8:\"\0*\0items\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:17:{s:2:\"id\";i:1;s:16:\"tahun_penyerahan\";s:4:\"1990\";s:12:\"kabupaten_id\";i:8;s:12:\"kecamatan_id\";i:1;s:8:\"nama_upt\";s:16:\"Batang Sumai III\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:4333;s:9:\"jiwa_awal\";i:4444;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:5555;s:9:\"jiwa_baru\";i:6666;s:16:\"no_ba_penyerahan\";s:7:\"24r4424\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:20:49\";s:10:\"updated_at\";s:19:\"2026-04-01 10:12:20\";}s:11:\"\0*\0original\";a:17:{s:2:\"id\";i:1;s:16:\"tahun_penyerahan\";s:4:\"1990\";s:12:\"kabupaten_id\";i:8;s:12:\"kecamatan_id\";i:1;s:8:\"nama_upt\";s:16:\"Batang Sumai III\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:4333;s:9:\"jiwa_awal\";i:4444;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:5555;s:9:\"jiwa_baru\";i:6666;s:16:\"no_ba_penyerahan\";s:7:\"24r4424\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:20:49\";s:10:\"updated_at\";s:19:\"2026-04-01 10:12:20\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:9:\"kabupaten\";O:20:\"App\\Models\\Kabupaten\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kabupatens\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:2:\"id\";i:8;s:14:\"nama_kabupaten\";s:4:\"Tebo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:4:{s:2:\"id\";i:8;s:14:\"nama_kabupaten\";s:4:\"Tebo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:1:{i:0;s:14:\"nama_kabupaten\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"kecamatan\";O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:1;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:12:\"Rantau Rasau\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:1;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:12:\"Rantau Rasau\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:17:{s:2:\"id\";i:2;s:16:\"tahun_penyerahan\";s:4:\"1980\";s:12:\"kabupaten_id\";i:7;s:12:\"kecamatan_id\";i:29;s:8:\"nama_upt\";s:8:\"Metagoal\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:2222;s:9:\"jiwa_awal\";i:3333;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:3333;s:9:\"jiwa_baru\";i:4444;s:16:\"no_ba_penyerahan\";s:6:\"12ss22\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:36:22\";s:10:\"updated_at\";s:19:\"2026-04-01 07:06:37\";}s:11:\"\0*\0original\";a:17:{s:2:\"id\";i:2;s:16:\"tahun_penyerahan\";s:4:\"1980\";s:12:\"kabupaten_id\";i:7;s:12:\"kecamatan_id\";i:29;s:8:\"nama_upt\";s:8:\"Metagoal\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:2222;s:9:\"jiwa_awal\";i:3333;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:3333;s:9:\"jiwa_baru\";i:4444;s:16:\"no_ba_penyerahan\";s:6:\"12ss22\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:36:22\";s:10:\"updated_at\";s:19:\"2026-04-01 07:06:37\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:9:\"kabupaten\";O:20:\"App\\Models\\Kabupaten\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kabupatens\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:2:\"id\";i:7;s:14:\"nama_kabupaten\";s:11:\"Batang hari\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:4:{s:2:\"id\";i:7;s:14:\"nama_kabupaten\";s:11:\"Batang hari\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:1:{i:0;s:14:\"nama_kabupaten\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"kecamatan\";O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:29;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:11:\"Bathin XXIV\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:29;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:11:\"Bathin XXIV\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:17:{s:2:\"id\";i:3;s:16:\"tahun_penyerahan\";s:4:\"1990\";s:12:\"kabupaten_id\";i:6;s:12:\"kecamatan_id\";i:22;s:8:\"nama_upt\";s:8:\"Petaling\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:3334;s:9:\"jiwa_awal\";i:5555;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:5555;s:9:\"jiwa_baru\";i:6666;s:16:\"no_ba_penyerahan\";s:2:\"22\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"6\";s:10:\"created_at\";s:19:\"2026-04-02 04:37:14\";s:10:\"updated_at\";s:19:\"2026-04-02 04:37:14\";}s:11:\"\0*\0original\";a:17:{s:2:\"id\";i:3;s:16:\"tahun_penyerahan\";s:4:\"1990\";s:12:\"kabupaten_id\";i:6;s:12:\"kecamatan_id\";i:22;s:8:\"nama_upt\";s:8:\"Petaling\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:3334;s:9:\"jiwa_awal\";i:5555;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:5555;s:9:\"jiwa_baru\";i:6666;s:16:\"no_ba_penyerahan\";s:2:\"22\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"6\";s:10:\"created_at\";s:19:\"2026-04-02 04:37:14\";s:10:\"updated_at\";s:19:\"2026-04-02 04:37:14\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:9:\"kabupaten\";O:20:\"App\\Models\\Kabupaten\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kabupatens\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:2:\"id\";i:6;s:14:\"nama_kabupaten\";s:11:\"Muaro Jambi\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:4:{s:2:\"id\";i:6;s:14:\"nama_kabupaten\";s:11:\"Muaro Jambi\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:1:{i:0;s:14:\"nama_kabupaten\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"kecamatan\";O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:22;s:12:\"kabupaten_id\";i:6;s:14:\"nama_kecamatan\";s:10:\"Kumpeh Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:22;s:12:\"kabupaten_id\";i:6;s:14:\"nama_kecamatan\";s:10:\"Kumpeh Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:17:{s:2:\"id\";i:4;s:16:\"tahun_penyerahan\";s:4:\"2000\";s:12:\"kabupaten_id\";i:3;s:12:\"kecamatan_id\";i:10;s:8:\"nama_upt\";s:11:\"Dusun Danau\";s:16:\"waktu_penempatan\";s:4:\"2001\";s:7:\"kk_awal\";i:4444;s:9:\"jiwa_awal\";i:5555;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:10:\"bungo baru\";s:7:\"kk_baru\";i:5555;s:9:\"jiwa_baru\";i:6666;s:16:\"no_ba_penyerahan\";s:3:\"222\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-08 03:26:30\";s:10:\"updated_at\";s:19:\"2026-04-08 03:26:30\";}s:11:\"\0*\0original\";a:17:{s:2:\"id\";i:4;s:16:\"tahun_penyerahan\";s:4:\"2000\";s:12:\"kabupaten_id\";i:3;s:12:\"kecamatan_id\";i:10;s:8:\"nama_upt\";s:11:\"Dusun Danau\";s:16:\"waktu_penempatan\";s:4:\"2001\";s:7:\"kk_awal\";i:4444;s:9:\"jiwa_awal\";i:5555;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:10:\"bungo baru\";s:7:\"kk_baru\";i:5555;s:9:\"jiwa_baru\";i:6666;s:16:\"no_ba_penyerahan\";s:3:\"222\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-08 03:26:30\";s:10:\"updated_at\";s:19:\"2026-04-08 03:26:30\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:9:\"kabupaten\";O:20:\"App\\Models\\Kabupaten\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kabupatens\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:2:\"id\";i:3;s:14:\"nama_kabupaten\";s:5:\"Bungo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:4:{s:2:\"id\";i:3;s:14:\"nama_kabupaten\";s:5:\"Bungo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:1:{i:0;s:14:\"nama_kabupaten\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"kecamatan\";O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:10;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:11:\"Muaro Bungo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:10;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:11:\"Muaro Bungo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"\0*\0perPage\";i:6;s:14:\"\0*\0currentPage\";i:1;s:7:\"\0*\0path\";s:36:\"http://127.0.0.1:8000/direktori-uptd\";s:8:\"\0*\0query\";a:0:{}s:11:\"\0*\0fragment\";N;s:11:\"\0*\0pageName\";s:4:\"page\";s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:10:\"onEachSide\";i:3;s:10:\"\0*\0options\";a:2:{s:4:\"path\";s:36:\"http://127.0.0.1:8000/direktori-uptd\";s:8:\"pageName\";s:4:\"page\";}s:8:\"\0*\0total\";i:4;s:11:\"\0*\0lastPage\";i:1;}', 1776072541),
('laravel-cache-galeri_terbaru', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:17:\"App\\Models\\Galeri\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"galeris\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:3;s:5:\"judul\";s:13:\"gotong royong\";s:4:\"foto\";s:43:\"1776051158_Screenshot 2025-05-24 135211.png\";s:10:\"created_at\";s:19:\"2026-04-13 03:32:38\";s:10:\"updated_at\";s:19:\"2026-04-13 03:32:38\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:3;s:5:\"judul\";s:13:\"gotong royong\";s:4:\"foto\";s:43:\"1776051158_Screenshot 2025-05-24 135211.png\";s:10:\"created_at\";s:19:\"2026-04-13 03:32:38\";s:10:\"updated_at\";s:19:\"2026-04-13 03:32:38\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}i:1;O:17:\"App\\Models\\Galeri\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"galeris\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:2;s:5:\"judul\";s:10:\"hvhvghbkjn\";s:4:\"foto\";s:43:\"1775035277_Screenshot 2025-10-15 202154.png\";s:10:\"created_at\";s:19:\"2026-04-01 09:21:17\";s:10:\"updated_at\";s:19:\"2026-04-01 09:21:17\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:2;s:5:\"judul\";s:10:\"hvhvghbkjn\";s:4:\"foto\";s:43:\"1775035277_Screenshot 2025-10-15 202154.png\";s:10:\"created_at\";s:19:\"2026-04-01 09:21:17\";s:10:\"updated_at\";s:19:\"2026-04-01 09:21:17\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1776057053),
('laravel-cache-pengurus_list', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:5:{i:0;O:19:\"App\\Models\\Pengurus\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"penguruses\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:4:\"nama\";s:13:\"Solikhul Hadi\";s:5:\"gelar\";s:5:\"S.Kom\";s:7:\"jabatan\";s:15:\"Kaur Tata Usaha\";s:4:\"foto\";s:50:\"1775029183_Screenshot 2025-10-15 194152 - Copy.png\";s:6:\"urutan\";i:1;s:10:\"created_at\";s:19:\"2026-04-01 07:39:43\";s:10:\"updated_at\";s:19:\"2026-04-01 07:39:43\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:4:\"nama\";s:13:\"Solikhul Hadi\";s:5:\"gelar\";s:5:\"S.Kom\";s:7:\"jabatan\";s:15:\"Kaur Tata Usaha\";s:4:\"foto\";s:50:\"1775029183_Screenshot 2025-10-15 194152 - Copy.png\";s:6:\"urutan\";i:1;s:10:\"created_at\";s:19:\"2026-04-01 07:39:43\";s:10:\"updated_at\";s:19:\"2026-04-01 07:39:43\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"nama\";i:1;s:5:\"gelar\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Pengurus\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"penguruses\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:4:\"nama\";s:6:\"likhul\";s:5:\"gelar\";s:5:\"S.Kom\";s:7:\"jabatan\";s:11:\"Kepala Desa\";s:4:\"foto\";s:43:\"1775029203_Screenshot 2025-10-25 204540.png\";s:6:\"urutan\";i:2;s:10:\"created_at\";s:19:\"2026-04-01 07:40:03\";s:10:\"updated_at\";s:19:\"2026-04-01 07:40:03\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:4:\"nama\";s:6:\"likhul\";s:5:\"gelar\";s:5:\"S.Kom\";s:7:\"jabatan\";s:11:\"Kepala Desa\";s:4:\"foto\";s:43:\"1775029203_Screenshot 2025-10-25 204540.png\";s:6:\"urutan\";i:2;s:10:\"created_at\";s:19:\"2026-04-01 07:40:03\";s:10:\"updated_at\";s:19:\"2026-04-01 07:40:03\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"nama\";i:1;s:5:\"gelar\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Pengurus\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"penguruses\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:4:\"nama\";s:13:\"Solikhul Hadi\";s:5:\"gelar\";s:4:\"S.Si\";s:7:\"jabatan\";s:10:\"Sekretaris\";s:4:\"foto\";s:43:\"1775150545_Screenshot 2025-10-15 202154.png\";s:6:\"urutan\";i:3;s:10:\"created_at\";s:19:\"2026-04-02 17:22:25\";s:10:\"updated_at\";s:19:\"2026-04-02 17:22:25\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:4:\"nama\";s:13:\"Solikhul Hadi\";s:5:\"gelar\";s:4:\"S.Si\";s:7:\"jabatan\";s:10:\"Sekretaris\";s:4:\"foto\";s:43:\"1775150545_Screenshot 2025-10-15 202154.png\";s:6:\"urutan\";i:3;s:10:\"created_at\";s:19:\"2026-04-02 17:22:25\";s:10:\"updated_at\";s:19:\"2026-04-02 17:22:25\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"nama\";i:1;s:5:\"gelar\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Pengurus\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"penguruses\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:4;s:4:\"nama\";s:6:\"likhul\";s:5:\"gelar\";s:4:\"S.Si\";s:7:\"jabatan\";s:15:\"Sekretaris Desa\";s:4:\"foto\";s:43:\"1775150563_Screenshot 2025-10-30 205258.png\";s:6:\"urutan\";i:4;s:10:\"created_at\";s:19:\"2026-04-02 17:22:43\";s:10:\"updated_at\";s:19:\"2026-04-02 17:22:43\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:4;s:4:\"nama\";s:6:\"likhul\";s:5:\"gelar\";s:4:\"S.Si\";s:7:\"jabatan\";s:15:\"Sekretaris Desa\";s:4:\"foto\";s:43:\"1775150563_Screenshot 2025-10-30 205258.png\";s:6:\"urutan\";i:4;s:10:\"created_at\";s:19:\"2026-04-02 17:22:43\";s:10:\"updated_at\";s:19:\"2026-04-02 17:22:43\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"nama\";i:1;s:5:\"gelar\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:19:\"App\\Models\\Pengurus\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"penguruses\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:5;s:4:\"nama\";s:13:\"Solikhul Hadi\";s:5:\"gelar\";s:4:\"M.si\";s:7:\"jabatan\";s:12:\"Kepala Dinas\";s:4:\"foto\";s:43:\"1775150591_Screenshot 2025-11-03 164900.png\";s:6:\"urutan\";i:5;s:10:\"created_at\";s:19:\"2026-04-02 17:23:11\";s:10:\"updated_at\";s:19:\"2026-04-02 17:23:11\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:5;s:4:\"nama\";s:13:\"Solikhul Hadi\";s:5:\"gelar\";s:4:\"M.si\";s:7:\"jabatan\";s:12:\"Kepala Dinas\";s:4:\"foto\";s:43:\"1775150591_Screenshot 2025-11-03 164900.png\";s:6:\"urutan\";i:5;s:10:\"created_at\";s:19:\"2026-04-02 17:23:11\";s:10:\"updated_at\";s:19:\"2026-04-02 17:23:11\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"nama\";i:1;s:5:\"gelar\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1776058830),
('laravel-cache-profil_web', 'O:20:\"App\\Models\\ProfilWeb\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:11:\"profil_webs\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:1;s:13:\"nama_instansi\";s:41:\"Dinas Tenaga Kerja dan Transmigrasi Jambi\";s:11:\"google_maps\";s:432:\"<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.343495290997!2d103.57785539999999!3d-1.6206897999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258977d7dc1ed3%3A0x33fcfd305a7e1a98!2sDisnakertrans%20Provinsi%20Jambi!5e1!3m2!1sid!2sid!4v1775035350853!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\";s:4:\"logo\";N;s:5:\"email\";N;s:7:\"telepon\";N;s:6:\"alamat\";N;s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 09:22:46\";s:13:\"judul_website\";s:14:\"SI-Trans Jambi\";s:17:\"deskripsi_singkat\";s:29:\"Sistem Informasi Transmigrasi\";s:12:\"logo_website\";s:19:\"1775030143_logo.png\";s:15:\"favicon_website\";s:22:\"1775030300_favicon.png\";s:13:\"alamat_kantor\";s:12:\"jl.pekanbaru\";s:13:\"nomor_telepon\";s:12:\"082278934353\";s:13:\"link_facebook\";N;s:14:\"link_instagram\";N;s:12:\"link_youtube\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:1;s:13:\"nama_instansi\";s:41:\"Dinas Tenaga Kerja dan Transmigrasi Jambi\";s:11:\"google_maps\";s:432:\"<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.343495290997!2d103.57785539999999!3d-1.6206897999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258977d7dc1ed3%3A0x33fcfd305a7e1a98!2sDisnakertrans%20Provinsi%20Jambi!5e1!3m2!1sid!2sid!4v1775035350853!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\";s:4:\"logo\";N;s:5:\"email\";N;s:7:\"telepon\";N;s:6:\"alamat\";N;s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 09:22:46\";s:13:\"judul_website\";s:14:\"SI-Trans Jambi\";s:17:\"deskripsi_singkat\";s:29:\"Sistem Informasi Transmigrasi\";s:12:\"logo_website\";s:19:\"1775030143_logo.png\";s:15:\"favicon_website\";s:22:\"1775030300_favicon.png\";s:13:\"alamat_kantor\";s:12:\"jl.pekanbaru\";s:13:\"nomor_telepon\";s:12:\"082278934353\";s:13:\"link_facebook\";N;s:14:\"link_instagram\";N;s:12:\"link_youtube\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}', 1776137190);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-statistik_full_dashboard', 'a:14:{s:9:\"statistik\";a:5:{s:11:\"transmigran\";s:5:\"24442\";s:2:\"kk\";s:5:\"19998\";s:4:\"uptd\";i:4;s:9:\"kabupaten\";i:10;s:9:\"kecamatan\";i:34;}s:14:\"kabupaten_list\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:10:{i:0;a:4:{s:4:\"nama\";s:20:\"Tanjung Jabung Timur\";s:4:\"jiwa\";i:0;s:2:\"kk\";i:0;s:10:\"total_uptd\";i:0;}i:1;a:4:{s:4:\"nama\";s:20:\"Tanjung Jabung Barat\";s:4:\"jiwa\";i:0;s:2:\"kk\";i:0;s:10:\"total_uptd\";i:0;}i:2;a:4:{s:4:\"nama\";s:5:\"Bungo\";s:4:\"jiwa\";i:6666;s:2:\"kk\";i:5555;s:10:\"total_uptd\";i:1;}i:3;a:4:{s:4:\"nama\";s:8:\"Merangin\";s:4:\"jiwa\";i:0;s:2:\"kk\";i:0;s:10:\"total_uptd\";i:0;}i:4;a:4:{s:4:\"nama\";s:10:\"Sarolangun\";s:4:\"jiwa\";i:0;s:2:\"kk\";i:0;s:10:\"total_uptd\";i:0;}i:5;a:4:{s:4:\"nama\";s:11:\"Muaro Jambi\";s:4:\"jiwa\";i:6666;s:2:\"kk\";i:5555;s:10:\"total_uptd\";i:1;}i:6;a:4:{s:4:\"nama\";s:11:\"Batang hari\";s:4:\"jiwa\";i:4444;s:2:\"kk\";i:3333;s:10:\"total_uptd\";i:1;}i:7;a:4:{s:4:\"nama\";s:4:\"Tebo\";s:4:\"jiwa\";i:6666;s:2:\"kk\";i:5555;s:10:\"total_uptd\";i:1;}i:8;a:4:{s:4:\"nama\";s:7:\"Kerinci\";s:4:\"jiwa\";i:0;s:2:\"kk\";i:0;s:10:\"total_uptd\";i:0;}i:9;a:4:{s:4:\"nama\";s:12:\"Sungai Penuh\";s:4:\"jiwa\";i:0;s:2:\"kk\";i:0;s:10:\"total_uptd\";i:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:14:\"kecamatan_list\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:34:{i:0;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:12:\"Rantau Rasau\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";s:4:\"6666\";s:8:\"total_kk\";s:4:\"5555\";s:8:\"jml_uptd\";i:1;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:12:\"Rantau Rasau\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";s:4:\"6666\";s:8:\"total_kk\";s:4:\"5555\";s:8:\"jml_uptd\";i:1;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:7:\"Dendang\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:7:\"Dendang\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:11:\"Muara Sabak\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:11:\"Muara Sabak\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:4;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:9:\"Mendahara\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:4;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:9:\"Mendahara\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:5;s:12:\"kabupaten_id\";i:2;s:14:\"nama_kecamatan\";s:11:\"Tungkal Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:5;s:12:\"kabupaten_id\";i:2;s:14:\"nama_kecamatan\";s:11:\"Tungkal Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:5;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:6;s:12:\"kabupaten_id\";i:2;s:14:\"nama_kecamatan\";s:16:\"Pembantu Merlung\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:6;s:12:\"kabupaten_id\";i:2;s:14:\"nama_kecamatan\";s:16:\"Pembantu Merlung\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:6;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:7;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:7:\"Jujuhan\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:7;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:7:\"Jujuhan\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:7;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:8;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:7:\"Pelepat\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:8;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:7:\"Pelepat\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:8;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:9;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:5:\"Tabir\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:9;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:5:\"Tabir\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:9;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:10;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:11:\"Muaro Bungo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";s:4:\"6666\";s:8:\"total_kk\";s:4:\"5555\";s:8:\"jml_uptd\";i:1;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:10;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:11:\"Muaro Bungo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";s:4:\"6666\";s:8:\"total_kk\";s:4:\"5555\";s:8:\"jml_uptd\";i:1;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:10;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:11;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:12:\"Tanah Tumbuh\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:11;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:12:\"Tanah Tumbuh\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:11;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:12;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:13:\"Rantau Pandan\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:12;s:12:\"kabupaten_id\";i:3;s:14:\"nama_kecamatan\";s:13:\"Rantau Pandan\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:12;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:13;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:8:\"Pemenang\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:13;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:8:\"Pemenang\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:13;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:14;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:6:\"Bangko\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:14;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:6:\"Bangko\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:14;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:15;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:5:\"Tabir\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:15;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:5:\"Tabir\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:15;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:16;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:12:\"Sei. Bengkal\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:16;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:12:\"Sei. Bengkal\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:16;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:17;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:10:\"Muaro Siau\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:17;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:10:\"Muaro Siau\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:17;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:18;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:11:\"Nalo Gedang\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:18;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:11:\"Nalo Gedang\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:18;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:19;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:11:\"Muaro Bungo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:19;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:11:\"Muaro Bungo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:19;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:20;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:9:\"Tabir Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:20;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:9:\"Tabir Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:20;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:21;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:21;s:12:\"kabupaten_id\";i:4;s:14:\"nama_kecamatan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:21;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:22;s:12:\"kabupaten_id\";i:6;s:14:\"nama_kecamatan\";s:10:\"Kumpeh Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";s:4:\"6666\";s:8:\"total_kk\";s:4:\"5555\";s:8:\"jml_uptd\";i:1;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:22;s:12:\"kabupaten_id\";i:6;s:14:\"nama_kecamatan\";s:10:\"Kumpeh Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";s:4:\"6666\";s:8:\"total_kk\";s:4:\"5555\";s:8:\"jml_uptd\";i:1;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:22;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:23;s:12:\"kabupaten_id\";i:6;s:14:\"nama_kecamatan\";s:12:\"Sungai Bahar\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:23;s:12:\"kabupaten_id\";i:6;s:14:\"nama_kecamatan\";s:12:\"Sungai Bahar\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:23;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:24;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:10:\"Batin XXIV\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:24;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:10:\"Batin XXIV\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:24;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:25;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:7:\"Mestong\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:25;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:7:\"Mestong\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:25;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:26;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:12:\"Muara Bulian\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:26;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:12:\"Muara Bulian\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:26;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:27;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:8:\"Pemayung\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:27;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:8:\"Pemayung\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:27;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:28;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:6:\"Mersam\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:28;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:6:\"Mersam\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:28;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:29;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:11:\"Bathin XXIV\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";s:4:\"4444\";s:8:\"total_kk\";s:4:\"3333\";s:8:\"jml_uptd\";i:1;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:29;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:11:\"Bathin XXIV\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";s:4:\"4444\";s:8:\"total_kk\";s:4:\"3333\";s:8:\"jml_uptd\";i:1;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:29;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:30;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:9:\"Maro Sebo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:30;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:9:\"Maro Sebo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:30;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:31;s:12:\"kabupaten_id\";i:8;s:14:\"nama_kecamatan\";s:12:\"Rimbo Bujang\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:31;s:12:\"kabupaten_id\";i:8;s:14:\"nama_kecamatan\";s:12:\"Rimbo Bujang\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:31;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:32;s:12:\"kabupaten_id\";i:8;s:14:\"nama_kecamatan\";s:8:\"Tebo Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:32;s:12:\"kabupaten_id\";i:8;s:14:\"nama_kecamatan\";s:8:\"Tebo Ulu\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:32;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:33;s:12:\"kabupaten_id\";i:8;s:14:\"nama_kecamatan\";s:9:\"Tuju Koto\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:33;s:12:\"kabupaten_id\";i:8;s:14:\"nama_kecamatan\";s:9:\"Tuju Koto\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:33;O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:42;s:12:\"kabupaten_id\";i:2;s:14:\"nama_kecamatan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-08 03:54:50\";s:10:\"updated_at\";s:19:\"2026-04-08 03:54:50\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:42;s:12:\"kabupaten_id\";i:2;s:14:\"nama_kecamatan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-08 03:54:50\";s:10:\"updated_at\";s:19:\"2026-04-08 03:54:50\";s:10:\"total_jiwa\";N;s:8:\"total_kk\";N;s:8:\"jml_uptd\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:9:\"uptd_list\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:8:\"nama_upt\";s:16:\"Batang Sumai III\";s:9:\"jiwa_baru\";i:6666;s:7:\"kk_baru\";i:5555;s:16:\"tahun_penyerahan\";s:4:\"1990\";}s:11:\"\0*\0original\";a:4:{s:8:\"nama_upt\";s:16:\"Batang Sumai III\";s:9:\"jiwa_baru\";i:6666;s:7:\"kk_baru\";i:5555;s:16:\"tahun_penyerahan\";s:4:\"1990\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:8:\"nama_upt\";s:8:\"Metagoal\";s:9:\"jiwa_baru\";i:4444;s:7:\"kk_baru\";i:3333;s:16:\"tahun_penyerahan\";s:4:\"1980\";}s:11:\"\0*\0original\";a:4:{s:8:\"nama_upt\";s:8:\"Metagoal\";s:9:\"jiwa_baru\";i:4444;s:7:\"kk_baru\";i:3333;s:16:\"tahun_penyerahan\";s:4:\"1980\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:8:\"nama_upt\";s:8:\"Petaling\";s:9:\"jiwa_baru\";i:6666;s:7:\"kk_baru\";i:5555;s:16:\"tahun_penyerahan\";s:4:\"1990\";}s:11:\"\0*\0original\";a:4:{s:8:\"nama_upt\";s:8:\"Petaling\";s:9:\"jiwa_baru\";i:6666;s:7:\"kk_baru\";i:5555;s:16:\"tahun_penyerahan\";s:4:\"1990\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:8:\"nama_upt\";s:11:\"Dusun Danau\";s:9:\"jiwa_baru\";i:6666;s:7:\"kk_baru\";i:5555;s:16:\"tahun_penyerahan\";s:4:\"2000\";}s:11:\"\0*\0original\";a:4:{s:8:\"nama_upt\";s:11:\"Dusun Danau\";s:9:\"jiwa_baru\";i:6666;s:7:\"kk_baru\";i:5555;s:16:\"tahun_penyerahan\";s:4:\"2000\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:6:\"labels\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:3:{i:0;s:8:\"Thn 1980\";i:1;s:8:\"Thn 1990\";i:2;s:8:\"Thn 2000\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:6:\"totals\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:3:{i:0;s:4:\"4444\";i:1;s:5:\"13332\";i:2;s:4:\"6666\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:13:\"trenKabupaten\";a:10:{s:20:\"Tanjung Jabung Timur\";a:3:{i:0;i:0;i:1;i:0;i:2;i:0;}s:20:\"Tanjung Jabung Barat\";a:3:{i:0;i:0;i:1;i:0;i:2;i:0;}s:5:\"Bungo\";a:3:{i:0;i:0;i:1;i:0;i:2;s:4:\"6666\";}s:8:\"Merangin\";a:3:{i:0;i:0;i:1;i:0;i:2;i:0;}s:10:\"Sarolangun\";a:3:{i:0;i:0;i:1;i:0;i:2;i:0;}s:11:\"Muaro Jambi\";a:3:{i:0;i:0;i:1;s:4:\"6666\";i:2;i:0;}s:11:\"Batang hari\";a:3:{i:0;s:4:\"4444\";i:1;i:0;i:2;i:0;}s:4:\"Tebo\";a:3:{i:0;i:0;i:1;s:4:\"6666\";i:2;i:0;}s:7:\"Kerinci\";a:3:{i:0;i:0;i:1;i:0;i:2;i:0;}s:12:\"Sungai Penuh\";a:3:{i:0;i:0;i:1;i:0;i:2;i:0;}}s:9:\"kabLabels\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:10:{i:0;s:20:\"Tanjung Jabung Timur\";i:1;s:20:\"Tanjung Jabung Barat\";i:2;s:5:\"Bungo\";i:3;s:8:\"Merangin\";i:4;s:10:\"Sarolangun\";i:5;s:11:\"Muaro Jambi\";i:6;s:11:\"Batang hari\";i:7;s:4:\"Tebo\";i:8;s:7:\"Kerinci\";i:9;s:12:\"Sungai Penuh\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:9:\"kabTotals\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:10:{i:0;N;i:1;N;i:2;s:4:\"6666\";i:3;N;i:4;N;i:5;s:4:\"6666\";i:6;s:4:\"4444\";i:7;s:4:\"6666\";i:8;N;i:9;N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:11:\"kabKkTotals\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:10:{i:0;N;i:1;N;i:2;s:4:\"5555\";i:3;N;i:4;N;i:5;s:4:\"5555\";i:6;s:4:\"3333\";i:7;s:4:\"5555\";i:8;N;i:9;N;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"uptdLabels\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;s:16:\"Batang Sumai III\";i:1;s:8:\"Petaling\";i:2;s:11:\"Dusun Danau\";i:3;s:8:\"Metagoal\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"uptdTotals\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;i:6666;i:1;i:6666;i:2;i:6666;i:3;i:4444;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:9:\"eraLabels\";a:3:{i:0;s:10:\"Era 1980an\";i:1;s:10:\"Era 1990an\";i:2;s:10:\"Era 2000an\";}s:9:\"eraTotals\";a:3:{i:0;i:1;i:1;i:2;i:2;i:1;}}', 1776137344);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-uptd_detail_1', 'O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:17:{s:2:\"id\";i:1;s:16:\"tahun_penyerahan\";s:4:\"1990\";s:12:\"kabupaten_id\";i:8;s:12:\"kecamatan_id\";i:1;s:8:\"nama_upt\";s:16:\"Batang Sumai III\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:4333;s:9:\"jiwa_awal\";i:4444;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:5555;s:9:\"jiwa_baru\";i:6666;s:16:\"no_ba_penyerahan\";s:7:\"24r4424\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:20:49\";s:10:\"updated_at\";s:19:\"2026-04-01 10:12:20\";}s:11:\"\0*\0original\";a:17:{s:2:\"id\";i:1;s:16:\"tahun_penyerahan\";s:4:\"1990\";s:12:\"kabupaten_id\";i:8;s:12:\"kecamatan_id\";i:1;s:8:\"nama_upt\";s:16:\"Batang Sumai III\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:4333;s:9:\"jiwa_awal\";i:4444;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:5555;s:9:\"jiwa_baru\";i:6666;s:16:\"no_ba_penyerahan\";s:7:\"24r4424\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:20:49\";s:10:\"updated_at\";s:19:\"2026-04-01 10:12:20\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:9:\"kabupaten\";O:20:\"App\\Models\\Kabupaten\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kabupatens\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:2:\"id\";i:8;s:14:\"nama_kabupaten\";s:4:\"Tebo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:4:{s:2:\"id\";i:8;s:14:\"nama_kabupaten\";s:4:\"Tebo\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:1:{i:0;s:14:\"nama_kabupaten\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"kecamatan\";O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:1;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:12:\"Rantau Rasau\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:1;s:12:\"kabupaten_id\";i:1;s:14:\"nama_kecamatan\";s:12:\"Rantau Rasau\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1776142034),
('laravel-cache-uptd_detail_2', 'O:15:\"App\\Models\\Uptd\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"uptds\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:17:{s:2:\"id\";i:2;s:16:\"tahun_penyerahan\";s:4:\"1980\";s:12:\"kabupaten_id\";i:7;s:12:\"kecamatan_id\";i:29;s:8:\"nama_upt\";s:8:\"Metagoal\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:2222;s:9:\"jiwa_awal\";i:3333;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:3333;s:9:\"jiwa_baru\";i:4444;s:16:\"no_ba_penyerahan\";s:6:\"12ss22\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:36:22\";s:10:\"updated_at\";s:19:\"2026-04-01 07:06:37\";}s:11:\"\0*\0original\";a:17:{s:2:\"id\";i:2;s:16:\"tahun_penyerahan\";s:4:\"1980\";s:12:\"kabupaten_id\";i:7;s:12:\"kecamatan_id\";i:29;s:8:\"nama_upt\";s:8:\"Metagoal\";s:16:\"waktu_penempatan\";s:4:\"1997\";s:7:\"kk_awal\";i:2222;s:9:\"jiwa_awal\";i:3333;s:11:\"status_desa\";s:3:\"DEF\";s:14:\"nama_desa_baru\";s:7:\"kuamang\";s:7:\"kk_baru\";i:3333;s:9:\"jiwa_baru\";i:4444;s:16:\"no_ba_penyerahan\";s:6:\"12ss22\";s:4:\"pola\";s:2:\"TU\";s:12:\"permasalahan\";s:1:\"-\";s:10:\"created_at\";s:19:\"2026-04-01 03:36:22\";s:10:\"updated_at\";s:19:\"2026-04-01 07:06:37\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:9:\"kabupaten\";O:20:\"App\\Models\\Kabupaten\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kabupatens\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:2:\"id\";i:7;s:14:\"nama_kabupaten\";s:11:\"Batang hari\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:4:{s:2:\"id\";i:7;s:14:\"nama_kabupaten\";s:11:\"Batang hari\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:1:{i:0;s:14:\"nama_kabupaten\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"kecamatan\";O:20:\"App\\Models\\Kecamatan\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"kecamatans\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:29;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:11:\"Bathin XXIV\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:29;s:12:\"kabupaten_id\";i:7;s:14:\"nama_kecamatan\";s:11:\"Bathin XXIV\";s:10:\"created_at\";s:19:\"2026-04-01 03:09:32\";s:10:\"updated_at\";s:19:\"2026-04-01 03:09:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:14:\"nama_kecamatan\";i:1;s:12:\"kabupaten_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:16:\"tahun_penyerahan\";i:1;s:12:\"kabupaten_id\";i:2;s:12:\"kecamatan_id\";i:3;s:8:\"nama_upt\";i:4;s:16:\"waktu_penempatan\";i:5;s:7:\"kk_awal\";i:6;s:9:\"jiwa_awal\";i:7;s:11:\"status_desa\";i:8;s:14:\"nama_desa_baru\";i:9;s:7:\"kk_baru\";i:10;s:9:\"jiwa_baru\";i:11;s:16:\"no_ba_penyerahan\";i:12;s:4:\"pola\";i:13;s:12:\"permasalahan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1776142011);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeris`
--

CREATE TABLE `galeris` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeris`
--

INSERT INTO `galeris` (`id`, `judul`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'hvhvghbkjn', '1775035277_Screenshot 2025-10-15 202154.png', '2026-04-01 02:21:17', '2026-04-01 02:21:17'),
(3, 'gotong royong', '1776051158_Screenshot 2025-05-24 135211.png', '2026-04-12 20:32:38', '2026-04-12 20:32:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupatens`
--

CREATE TABLE `kabupatens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kabupaten` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kabupatens`
--

INSERT INTO `kabupatens` (`id`, `nama_kabupaten`, `created_at`, `updated_at`) VALUES
(1, 'Tanjung Jabung Timur', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(2, 'Tanjung Jabung Barat', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(3, 'Bungo', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(4, 'Merangin', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(5, 'Sarolangun', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(6, 'Muaro Jambi', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(7, 'Batang hari', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(8, 'Tebo', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(9, 'Kerinci', '2026-04-01 00:10:32', '2026-04-01 00:10:32'),
(10, 'Sungai Penuh', '2026-04-01 20:27:16', '2026-04-01 20:27:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `kabupaten_id`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rantau Rasau', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(2, 1, 'Dendang', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(3, 1, 'Muara Sabak', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(4, 1, 'Mendahara', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(5, 2, 'Tungkal Ulu', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(6, 2, 'Pembantu Merlung', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(7, 3, 'Jujuhan', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(8, 3, 'Pelepat', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(9, 3, 'Tabir', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(10, 3, 'Muaro Bungo', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(11, 3, 'Tanah Tumbuh', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(12, 3, 'Rantau Pandan', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(13, 4, 'Pemenang', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(14, 4, 'Bangko', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(15, 4, 'Tabir', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(16, 4, 'Sei. Bengkal', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(17, 4, 'Muaro Siau', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(18, 4, 'Nalo Gedang', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(19, 4, 'Muaro Bungo', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(20, 4, 'Tabir Ulu', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(21, 4, '-', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(22, 6, 'Kumpeh Ulu', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(23, 6, 'Sungai Bahar', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(24, 7, 'Batin XXIV', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(25, 7, 'Mestong', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(26, 7, 'Muara Bulian', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(27, 7, 'Pemayung', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(28, 7, 'Mersam', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(29, 7, 'Bathin XXIV', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(30, 7, 'Maro Sebo', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(31, 8, 'Rimbo Bujang', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(32, 8, 'Tebo Ulu', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(33, 8, 'Tuju Koto', '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(42, 2, '-', '2026-04-07 20:54:50', '2026-04-07 20:54:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `modul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `user_id`, `aksi`, `modul`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tambah', 'Kabupaten', 'Tambah data Kabupaten: Kerincia', '2026-04-01 21:08:22', '2026-04-01 21:08:22'),
(2, 1, 'Tambah', 'Kabupaten', 'Tambah data Kabupaten: Kerincia', '2026-04-01 21:08:22', '2026-04-01 21:08:22'),
(3, 1, 'Tambah', 'Kecamatan', 'Tambah data Kecamatan: a', '2026-04-01 21:08:48', '2026-04-01 21:08:48'),
(4, 1, 'Tambah', 'Kecamatan', 'Tambah data Kecamatan: a', '2026-04-01 21:08:48', '2026-04-01 21:08:48'),
(5, 1, 'Hapus', 'MasterUptd', 'Hapus data MasterUptd: ID: 174', '2026-04-01 21:22:16', '2026-04-01 21:22:16'),
(6, 1, 'Tambah', 'Berita', 'Tambah data Berita: Jadwal Pelayanan Kantor Desa Simpang Sungai Duren', '2026-04-01 21:23:05', '2026-04-01 21:23:05'),
(7, 1, 'Edit', 'Berita', 'Edit data Berita: gotong royong', '2026-04-01 21:30:10', '2026-04-01 21:30:10'),
(8, 1, 'Hapus', 'Kecamatan', 'Hapus data Kecamatan: a', '2026-04-01 21:35:37', '2026-04-01 21:35:37'),
(9, 1, 'Hapus', 'Kabupaten', 'Hapus data Kabupaten: Kerincia', '2026-04-01 21:35:54', '2026-04-01 21:35:54'),
(10, 1, 'Hapus', 'Kecamatan', 'Hapus data Kecamatan: rantau jua', '2026-04-01 21:36:03', '2026-04-01 21:36:03'),
(11, 1, 'Hapus', 'Kecamatan', 'Hapus data Kecamatan: rantau jua', '2026-04-01 21:36:10', '2026-04-01 21:36:10'),
(12, 1, 'Hapus', 'Kecamatan', 'Hapus data Kecamatan: rantau jua', '2026-04-01 21:36:13', '2026-04-01 21:36:13'),
(13, 1, 'Hapus', 'Kecamatan', 'Hapus data Kecamatan: rantau jua', '2026-04-01 21:36:17', '2026-04-01 21:36:17'),
(14, 1, 'Hapus', 'Kecamatan', 'Hapus data Kecamatan: rantau jua', '2026-04-01 21:36:20', '2026-04-01 21:36:20'),
(15, 1, 'Hapus', 'Kecamatan', 'Hapus data Kecamatan: rantau jua', '2026-04-01 21:36:23', '2026-04-01 21:36:23'),
(16, 1, 'Tambah', 'Uptd', 'Tambah data Uptd: Petaling', '2026-04-01 21:37:14', '2026-04-01 21:37:14'),
(17, 1, 'Tambah', 'Data UPTD', 'Menambahkan data penyerahan UPT: Petaling', '2026-04-01 21:37:14', '2026-04-01 21:37:14'),
(18, 1, 'Tambah', 'MasterUptd', 'Tambah data MasterUptd: ID: 175', '2026-04-01 21:37:39', '2026-04-01 21:37:39'),
(19, 1, 'Tambah', 'Kabupaten', 'Tambah data Kabupaten: Kerincia', '2026-04-01 21:37:49', '2026-04-01 21:37:49'),
(20, 1, 'Hapus', 'Kabupaten', 'Hapus data Kabupaten: Kerincia', '2026-04-01 21:37:58', '2026-04-01 21:37:58'),
(21, 1, 'Tambah', 'Kecamatan', 'Tambah data Kecamatan: rantau jua', '2026-04-01 21:38:15', '2026-04-01 21:38:15'),
(22, 1, 'Hapus', 'Kecamatan', 'Hapus data Kecamatan: rantau jua', '2026-04-01 21:38:23', '2026-04-01 21:38:23'),
(23, 1, 'Tambah', 'Pengurus', 'Tambah data Pengurus: Solikhul Hadi', '2026-04-02 10:22:25', '2026-04-02 10:22:25'),
(24, 1, 'Tambah', 'Pengurus', 'Tambah data Pengurus: likhul', '2026-04-02 10:22:43', '2026-04-02 10:22:43'),
(25, 1, 'Tambah', 'Pengurus', 'Tambah data Pengurus: Solikhul Hadi', '2026-04-02 10:23:11', '2026-04-02 10:23:11'),
(26, 1, 'Hapus', 'MasterUptd', 'Hapus data MasterUptd: ID: 175', '2026-04-07 19:39:29', '2026-04-07 19:39:29'),
(27, 1, 'Tambah', 'Uptd', 'Tambah data Uptd: Dusun Danau', '2026-04-07 20:26:30', '2026-04-07 20:26:30'),
(28, 1, 'Tambah', 'Data UPTD', 'Menambahkan data penyerahan UPT: Dusun Danau', '2026-04-07 20:26:30', '2026-04-07 20:26:30'),
(29, 1, 'Tambah', 'Kecamatan', 'Tambah data Kecamatan: -', '2026-04-07 20:54:50', '2026-04-07 20:54:50'),
(30, 1, 'Tambah', 'Berita', 'Tambah data Berita: gotong royong', '2026-04-12 20:32:26', '2026-04-12 20:32:26'),
(31, 1, 'Tambah', 'Galeri', 'Tambah data Galeri: gotong royong', '2026-04-12 20:32:38', '2026-04-12 20:32:38'),
(32, 1, 'Hapus', 'Berita', 'Hapus data Berita: Jadwal Pelayanan Kantor Desa Simpang Sungai Duren', '2026-04-12 20:33:37', '2026-04-12 20:33:37'),
(33, 1, 'Hapus', 'Galeri', 'Hapus data Galeri: a', '2026-04-12 21:40:49', '2026-04-12 21:40:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_uptds`
--

CREATE TABLE `master_uptds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_uptd` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_uptds`
--

INSERT INTO `master_uptds` (`id`, `kecamatan_id`, `nama_uptd`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rantau Rasau I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(2, 1, 'Rantau Rasau II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(3, 1, 'Rantau Rasau III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(4, 1, 'Rantau Rasau IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(5, 1, 'Rantau Rasau V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(6, 1, 'Rantau Rasau VI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(7, 1, 'Rantau Rasau VII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(8, 2, 'Dendang I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(9, 2, 'Dendang II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(10, 2, 'Dendang III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(11, 2, 'Dendang IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(12, 2, 'Dendang V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(13, 3, 'Lambur I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(14, 3, 'Lambur II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(15, 3, 'Pamusiran', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(16, 3, 'Lagan Ulu I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(17, 3, 'Lagan Ulu II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(18, 3, 'Lagan Ulu III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(19, 3, 'Lagan Simpang Pandan', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(20, 4, 'Simpang Pandan I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(21, 4, 'Simpang Pandan II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(22, 4, 'Simpang Pandan III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(23, 5, 'Tebing Tinggi I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(24, 5, 'Tebing Tinggi II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(25, 5, 'Merlung V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(26, 5, 'Merlung VI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(27, 5, 'Merlung VII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(28, 5, 'Merlung VIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(29, 5, 'Merlung IX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(30, 5, 'Suban', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(31, 6, 'Merlung I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(32, 6, 'Merlung II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(33, 6, 'Merlung III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(34, 6, 'Merlung IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(35, 7, 'Jujuhan Blok E', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(36, 7, 'Jujuhan Blok FG', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(37, 8, 'Kuamang Kuning I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(38, 8, 'Kuamang Kuning III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(39, 8, 'Kuamang Kuning IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(40, 8, 'Kuamang Kuning V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(41, 8, 'Kuamang Kuning VI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(42, 8, 'Kuamang Kuning VII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(43, 8, 'Kuamang Kuning X', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(44, 8, 'Kuamang Kuning XIV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(45, 8, 'Kuamang Kuning XV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(46, 8, 'Kuamang Kuning XVI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(47, 8, 'Kuamang Kuning XVII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(48, 8, 'Kuamang Kuning XIX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(49, 8, 'Pelepat II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(50, 9, 'Kuamang Kuning VIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(51, 9, 'Kuamang Kuning IX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(52, 10, 'Dusun Danau', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(53, 11, 'Jujuhan I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(54, 11, 'Jujuhan II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(55, 11, 'Desa Datar', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(56, 11, 'Jujuhan III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(57, 11, 'Jujuhan IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(58, 11, 'Jujuhan V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(59, 12, 'Desa Pelepat', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(60, 12, 'Rantau Pandan I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(61, 12, 'Rantau Pandan II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(62, 12, 'Rantau Pandan III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(63, 12, 'Rantau Pandan IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(64, 12, 'Rantau Pandan V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(65, 13, 'Pemenang I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(66, 13, 'Pemenang II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(67, 13, 'Pemenang III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(68, 13, 'Pemenang IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(69, 13, 'Pemenang VI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(70, 13, 'Pemenang VII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(71, 13, 'Pemenang VIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(72, 13, 'Pemenang IX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(73, 13, 'Kubang Ujo I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(74, 13, 'Kubang Ujo II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(75, 13, 'Kubang Ujo III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(76, 14, 'Pemenang V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(77, 14, 'Pemenang X', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(78, 14, 'Pemenang XI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(79, 14, 'Pemenang XII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(80, 14, 'Tiang Pumpung', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(81, 15, 'Hitam Ulu I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(82, 15, 'Hitam Ulu II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(83, 15, 'Hitam Ulu III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(84, 15, 'Hitam Ulu IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(85, 15, 'Hitam Ulu IX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(86, 16, 'Hitam Ulu V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(87, 16, 'Hitam Ulu VI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(88, 17, 'Baru Nalo', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(89, 17, 'Pulau Bayur', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(90, 18, 'Nalo Gedang', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(91, 19, 'Kuamang Kuning XI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(92, 19, 'Kuamang Kuning XII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(93, 19, 'Kuamang Kuning XIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(94, 20, 'Batang Kibul I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(95, 20, 'Batang Kibul II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(96, 21, 'Pulau Tebakar', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(97, 22, 'Kumpeh Ulu I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(98, 22, 'Kumpeh Ulu II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(99, 22, 'Petaling', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(100, 22, 'Sungai Gelam I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(101, 22, 'Sungai Gelam II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(102, 22, 'Sungai Gelam III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(103, 22, 'Arang-Arang', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(104, 22, 'G. Karya/ Jebus/ Sei Aur', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(105, 23, 'Sungai Bahar I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(106, 23, 'Sungai Bahar II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(107, 23, 'Sungai Bahar III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(108, 23, 'Sungai Bahar IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(109, 23, 'Sungai Bahar V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(110, 23, 'Sungai Bahar VI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(111, 23, 'Sungai Bahar VII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(112, 23, 'Sungai Bahar VIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(113, 23, 'Sungai Bahar IX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(114, 23, 'Sungai Bahar X', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(115, 23, 'Sungai Bahar XI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(116, 23, 'Sungai Bahar XII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(117, 23, 'Sungai Bahar XIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(118, 23, 'Sungai Bahar XIV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(119, 23, 'Sungai Bahar XV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(120, 23, 'Sungai Bahar XVI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(121, 23, 'Sungai Bahar XVII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(122, 23, 'Sungai Bahar XVIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(123, 23, 'Sungai Bahar XIX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(124, 23, 'Sungai Bahar XX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(125, 23, 'Sungai Bahar XXI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(126, 23, 'Sungai Bahar XXII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(127, 23, 'Rawa Pudak', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(128, 24, 'Durian Luncuk I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(129, 24, 'Durian Luncuk II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(130, 24, 'Durian Luncuk VII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(131, 25, 'Kilangan I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(132, 25, 'Kilangan II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(133, 26, 'Muara Bulian I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(134, 26, 'Muara Bulian III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(135, 26, 'Muara Bulian IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(136, 27, 'Muara Bulian II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(137, 27, 'Muara Bulian V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(138, 28, 'Mersam I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(139, 28, 'Mersam II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(140, 28, 'Mersam III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(141, 28, 'Mersam IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(142, 29, 'Metagoal', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(143, 30, 'Tebing Jaya I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(144, 30, 'Tebing Jaya II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(145, 30, 'Tebing Jaya III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(146, 30, 'Tebing Jaya IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(147, 31, 'Rimbo Bujang I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(148, 31, 'Rimbo Bujang II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(149, 31, 'Rimbo Bujang III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(150, 31, 'Rimbo Bujang IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(151, 31, 'Rimbo Bujang V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(152, 31, 'Rimbo Bujang VI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(153, 31, 'Rimbo Bujang VII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(154, 31, 'Rimbo Bujang VIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(155, 31, 'Rimbo Bujang IX', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(156, 31, 'Rimbo Bujang X', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(157, 31, 'Rimbo Bujang XI', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(158, 31, 'Rimbo Bujang XII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(159, 31, 'Rimbo Bujang XV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(160, 31, 'Alai Ilir Blok A', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(161, 31, 'Alai Ilir Blok BC', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(162, 31, 'Alai Ilir Blok D', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(163, 31, 'Alai Ilir Blok E', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(164, 31, 'Alai Ilir Blok F', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(165, 32, 'Batang Sumai I', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(166, 32, 'Batang Sumai II', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(167, 32, 'Batang Sumai III', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(168, 32, 'Batang Sumai IV', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(169, 32, 'Sungai Karang', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(170, 32, 'Hitam Ulu VIII', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(171, 32, 'Batang Sumai V', '2026-03-31 20:09:33', '2026-03-31 20:09:33'),
(172, 33, 'Hitam Ulu VII', '2026-03-31 20:09:33', '2026-03-31 20:09:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_26_040037_create_admins_table', 1),
(5, '2026_02_26_040038_create_kabupatens_table', 1),
(6, '2026_02_26_040038_create_transmigrans_table', 1),
(7, '2026_03_05_045433_add_role_to_users_table', 1),
(8, '2026_03_05_051144_create_log_aktivitas_table', 1),
(9, '2026_03_10_034536_create_penguruses_table', 1),
(10, '2026_03_30_031025_create_beritas_table', 1),
(11, '2026_03_30_042840_create_galeris_table', 1),
(12, '2026_03_31_020057_create_kecamatans_table', 1),
(13, '2026_03_31_022526_create_master_uptds_table', 1),
(14, '2026_03_31_090000_create_uptds_table', 1),
(15, '2026_03_31_090001_create_profil_webs_table', 1),
(16, '2026_04_01_075106_add_missing_columns_to_profil_webs_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguruses`
--

CREATE TABLE `penguruses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gelar` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penguruses`
--

INSERT INTO `penguruses` (`id`, `nama`, `gelar`, `jabatan`, `foto`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Solikhul Hadi', 'S.Kom', 'Kaur Tata Usaha', '1775029183_Screenshot 2025-10-15 194152 - Copy.png', 1, '2026-04-01 00:39:43', '2026-04-01 00:39:43'),
(2, 'likhul', 'S.Kom', 'Kepala Desa', '1775029203_Screenshot 2025-10-25 204540.png', 2, '2026-04-01 00:40:03', '2026-04-01 00:40:03'),
(3, 'Solikhul Hadi', 'S.Si', 'Sekretaris', '1775150545_Screenshot 2025-10-15 202154.png', 3, '2026-04-02 10:22:25', '2026-04-02 10:22:25'),
(4, 'likhul', 'S.Si', 'Sekretaris Desa', '1775150563_Screenshot 2025-10-30 205258.png', 4, '2026-04-02 10:22:43', '2026-04-02 10:22:43'),
(5, 'Solikhul Hadi', 'M.si', 'Kepala Dinas', '1775150591_Screenshot 2025-11-03 164900.png', 5, '2026-04-02 10:23:11', '2026-04-02 10:23:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_webs`
--

CREATE TABLE `profil_webs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `google_maps` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `judul_website` varchar(255) DEFAULT NULL,
  `deskripsi_singkat` text DEFAULT NULL,
  `logo_website` varchar(255) DEFAULT NULL,
  `favicon_website` varchar(255) DEFAULT NULL,
  `alamat_kantor` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `link_facebook` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil_webs`
--

INSERT INTO `profil_webs` (`id`, `nama_instansi`, `google_maps`, `logo`, `email`, `telepon`, `alamat`, `created_at`, `updated_at`, `judul_website`, `deskripsi_singkat`, `logo_website`, `favicon_website`, `alamat_kantor`, `nomor_telepon`, `link_facebook`, `link_instagram`, `link_youtube`) VALUES
(1, 'Dinas Tenaga Kerja dan Transmigrasi Jambi', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.343495290997!2d103.57785539999999!3d-1.6206897999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258977d7dc1ed3%3A0x33fcfd305a7e1a98!2sDisnakertrans%20Provinsi%20Jambi!5e1!3m2!1sid!2sid!4v1775035350853!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL, NULL, '2026-03-31 20:09:32', '2026-04-01 02:22:46', 'SI-Trans Jambi', 'Sistem Informasi Transmigrasi', '1775030143_logo.png', '1775030300_favicon.png', 'jl.pekanbaru', '082278934353', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transmigrans`
--

CREATE TABLE `transmigrans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kepala_keluarga` varchar(255) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `asal_daerah` varchar(255) NOT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_penempatan` year(4) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uptds`
--

CREATE TABLE `uptds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_penyerahan` year(4) NOT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_upt` varchar(255) NOT NULL,
  `waktu_penempatan` varchar(255) NOT NULL,
  `kk_awal` int(11) NOT NULL,
  `jiwa_awal` int(11) NOT NULL,
  `status_desa` enum('SEM','DEF') NOT NULL,
  `nama_desa_baru` varchar(255) NOT NULL,
  `kk_baru` int(11) NOT NULL,
  `jiwa_baru` int(11) NOT NULL,
  `no_ba_penyerahan` varchar(255) NOT NULL,
  `pola` varchar(255) DEFAULT NULL,
  `permasalahan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `uptds`
--

INSERT INTO `uptds` (`id`, `tahun_penyerahan`, `kabupaten_id`, `kecamatan_id`, `nama_upt`, `waktu_penempatan`, `kk_awal`, `jiwa_awal`, `status_desa`, `nama_desa_baru`, `kk_baru`, `jiwa_baru`, `no_ba_penyerahan`, `pola`, `permasalahan`, `created_at`, `updated_at`) VALUES
(1, '1990', 8, 1, 'Batang Sumai III', '1997', 4333, 4444, 'DEF', 'kuamang', 5555, 6666, '24r4424', 'TU', '-', '2026-03-31 20:20:49', '2026-04-01 03:12:20'),
(2, '1980', 7, 29, 'Metagoal', '1997', 2222, 3333, 'DEF', 'kuamang', 3333, 4444, '12ss22', 'TU', '-', '2026-03-31 20:36:22', '2026-04-01 00:06:37'),
(3, '1990', 6, 22, 'Petaling', '1997', 3334, 5555, 'DEF', 'kuamang', 5555, 6666, '22', 'TU', '6', '2026-04-01 21:37:14', '2026-04-01 21:37:14'),
(4, '2000', 3, 10, 'Dusun Danau', '2001', 4444, 5555, 'DEF', 'bungo baru', 5555, 6666, '222', 'TU', '-', '2026-04-07 20:26:30', '2026-04-07 20:26:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('superadmin','admin') NOT NULL DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', 'superadmin', NULL, '$2y$12$ZN2/k5YyGraHBWqSKrOo5efeClHcDYB20kfQCCov09ZiJS7zNrp.a', NULL, '2026-03-31 20:09:32', '2026-03-31 20:09:32'),
(3, 'admin 1', 'likhulhadi141@gmail.com', 'admin', NULL, '$2y$12$Vsx6f2MQ9hNv4ReD5a0iZOO9Tl287i833fhyN7YwCv0kvoWRWlnu6', NULL, '2026-04-01 19:48:54', '2026-04-01 19:48:54'),
(4, 'admin2', 'likhulhad@gmail.com', 'superadmin', NULL, '$2y$12$obtOv49ZIQMNL4PmMOVg0edFnMQ8kCd6FkoGAsC6TaegYa.4tIGp2', NULL, '2026-04-01 20:26:42', '2026-04-01 20:26:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beritas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatans_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_aktivitas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `master_uptds`
--
ALTER TABLE `master_uptds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_uptds_kecamatan_id_foreign` (`kecamatan_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penguruses`
--
ALTER TABLE `penguruses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_webs`
--
ALTER TABLE `profil_webs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transmigrans`
--
ALTER TABLE `transmigrans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transmigrans_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indeks untuk tabel `uptds`
--
ALTER TABLE `uptds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uptds_kabupaten_id_foreign` (`kabupaten_id`),
  ADD KEY `uptds_kecamatan_id_foreign` (`kecamatan_id`);

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
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kabupatens`
--
ALTER TABLE `kabupatens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `master_uptds`
--
ALTER TABLE `master_uptds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `penguruses`
--
ALTER TABLE `penguruses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `profil_webs`
--
ALTER TABLE `profil_webs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transmigrans`
--
ALTER TABLE `transmigrans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uptds`
--
ALTER TABLE `uptds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `beritas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD CONSTRAINT `kecamatans_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_uptds`
--
ALTER TABLE `master_uptds`
  ADD CONSTRAINT `master_uptds_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transmigrans`
--
ALTER TABLE `transmigrans`
  ADD CONSTRAINT `transmigrans_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`);

--
-- Ketidakleluasaan untuk tabel `uptds`
--
ALTER TABLE `uptds`
  ADD CONSTRAINT `uptds_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uptds_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
