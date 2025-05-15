-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Bulan Mei 2025 pada 01.14
-- Versi server: 8.0.30
-- Versi PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vogma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` bigint UNSIGNED NOT NULL,
  `url_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_start_event` date NOT NULL,
  `tgl_end_event` date NOT NULL,
  `lokasi_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_event` decimal(10,2) DEFAULT NULL,
  `deskripsi_event` text COLLATE utf8mb4_unicode_ci,
  `benner_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_vote` int DEFAULT NULL,
  `penyelenggara_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `url_event`, `nama_event`, `tgl_start_event`, `tgl_end_event`, `lokasi_event`, `harga_event`, `deskripsi_event`, `benner_event`, `max_vote`, `penyelenggara_id`, `created_at`, `updated_at`) VALUES
(17, 'dsvsdvds', 'duta ddyy', '2025-05-14', '2025-05-22', 'batuan', 3232.00, NULL, 'banners/1747239889_wallpaperflare.com_wallpaper.jpg', 2321, 17, '2025-05-14 09:24:49', '2025-05-14 09:24:49'),
(18, 'asasadsa', 'Duta Uniba', '2025-05-14', '2025-05-16', 'batuan', 342.00, NULL, 'banners/1747240135_WhatsApp Image 2025-04-22 at 08.40.47.jpeg', 34242, 2, '2025-05-14 09:28:55', '2025-05-14 09:28:55'),
(19, 'adfwefdasfd', 'racing', '2025-05-15', '2025-05-30', 'batuan', NULL, NULL, NULL, 566, 21, '2025-05-14 09:32:13', '2025-05-14 09:32:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_kandidat`
--

CREATE TABLE `event_kandidat` (
  `id_kandidat` bigint UNSIGNED NOT NULL,
  `no_kandidat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_kandidat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_kandidat` text COLLATE utf8mb4_unicode_ci,
  `biografi_kandidat` text COLLATE utf8mb4_unicode_ci,
  `event_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event_kandidat`
--

INSERT INTO `event_kandidat` (`id_kandidat`, `no_kandidat`, `foto_kandidat`, `deskripsi_kandidat`, `biografi_kandidat`, `event_id`, `created_at`, `updated_at`) VALUES
(25, '01', 'uploads/kandidat/1747239907_Gambar WhatsApp 2024-11-21 pukul 16.25.43_7319c9e6.jpg', 'vhgngh', 'nhgggggggg', 17, '2025-05-14 09:25:07', '2025-05-14 09:25:07'),
(26, '65756', NULL, 'sdcvdsfd', 'sdcsd', 18, '2025-05-14 09:29:35', '2025-05-14 09:29:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_votes`
--

CREATE TABLE `event_votes` (
  `id_vote` bigint UNSIGNED NOT NULL,
  `token_vote` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kandidat_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `kuantitas_vote` int NOT NULL,
  `total_harga_vote` decimal(10,2) DEFAULT NULL,
  `nama_voters` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_voters` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan_voters` text COLLATE utf8mb4_unicode_ci,
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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2025_05_11_033922_create_penyelenggara_table', 1),
(12, '2025_05_11_033935_create_event_table', 1),
(13, '2025_05_11_034011_create_event_kandidat_table', 1);

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
-- Struktur dari tabel `penyelenggara`
--

CREATE TABLE `penyelenggara` (
  `id_penyelenggara` bigint UNSIGNED NOT NULL,
  `nama_penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_penyelenggara` text COLLATE utf8mb4_unicode_ci,
  `nohp_penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyelenggara`
--

INSERT INTO `penyelenggara` (`id_penyelenggara`, `nama_penyelenggara`, `logo_penyelenggara`, `alamat_penyelenggara`, `nohp_penyelenggara`, `email_penyelenggara`, `dokumen_ktp`, `dokumen_npwp`, `created_at`, `updated_at`) VALUES
(2, 'yosi bagus sadar rasuli', 'data_penyelenggara/8fScU3Za1hEOC3Y0JL56oXGkTpVrJdYEYfIhe6VS.jpg', 'kalianget', '087456', 'rio@gmail.com', NULL, NULL, '2025-05-14 09:28:22', '2025-05-14 09:28:22'),
(17, 'dssad', 'data_penyelenggara/iSiKBKXJP2CPPktqIjBbxbdXx92gpluWVqKD1P9K.jpg', 'dasd', '32432', 'yosi@gmail.com', NULL, NULL, '2025-05-14 09:21:54', '2025-05-14 09:21:54'),
(18, 'jeki serrrr', 'data_penyelenggara/PrB4OjA62JrbD4K0Qj2CNaxxp2jDJPeLDalZcPRj.jpg', 'sumenep', '324324', 'rio@gmail.com', NULL, NULL, '2025-05-14 09:22:44', '2025-05-14 09:22:44'),
(21, 'dsdfsd', NULL, 'dfdsf', '23424', 'yosi@gmail.com', NULL, NULL, '2025-05-14 09:31:37', '2025-05-14 09:31:37');

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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','penyelenggara') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'penyelenggara',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rionaldi', 'rionaldisaputra82@gmail.com', NULL, '$2y$12$aGMx.2EtB0.NJfg.hUQ50uGlklaMrWpgvKQ2cCA3z6x.I2ucIX2H2', 'admin', NULL, '2025-05-10 22:40:41', '2025-05-11 00:31:41'),
(17, 'Rio', 'dyy@gmail.com', NULL, '$2y$12$/CYN0Cq9p.4AK7d8HLXm7.CdTbY3j7CtMbimpfNMDiLPVI9JfZD9K', 'penyelenggara', NULL, '2025-05-13 23:19:16', '2025-05-13 23:19:16'),
(18, 'dyy', 'rafi@agromarts.com', NULL, '$2y$12$9rmzlgAb0/262IXPq6Pg5ezJOW03V2tbwd7p6LRabhCLYXbSUD0Vq', 'penyelenggara', NULL, '2025-05-13 23:19:30', '2025-05-13 23:19:30'),
(20, 'Rafi', 'rafi@agromarxszts.com', NULL, '$2y$12$fBGk7TBJRntJ9frJL49zKu4qqwgV43FmBfR/y8KURywHZAf5uBbQe', 'penyelenggara', NULL, '2025-05-14 09:30:32', '2025-05-14 09:30:32'),
(21, 'mugtafi', 'mug@gmail.com', NULL, '$2y$12$I2tdnG8gBYRtL9oD78nyUe89DBynEV5wqxuF4nPryd4cDx7/J6S5y', 'penyelenggara', NULL, '2025-05-14 09:30:58', '2025-05-14 09:30:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `event_penyelenggara_id_foreign` (`penyelenggara_id`);

--
-- Indeks untuk tabel `event_kandidat`
--
ALTER TABLE `event_kandidat`
  ADD PRIMARY KEY (`id_kandidat`),
  ADD KEY `event_kandidat_event_id_foreign` (`event_id`);

--
-- Indeks untuk tabel `event_votes`
--
ALTER TABLE `event_votes`
  ADD PRIMARY KEY (`id_vote`);

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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penyelenggara`
--
ALTER TABLE `penyelenggara`
  ADD PRIMARY KEY (`id_penyelenggara`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `event_kandidat`
--
ALTER TABLE `event_kandidat`
  MODIFY `id_kandidat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `event_votes`
--
ALTER TABLE `event_votes`
  MODIFY `id_vote` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `penyelenggara`
--
ALTER TABLE `penyelenggara`
  MODIFY `id_penyelenggara` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_penyelenggara_id_foreign` FOREIGN KEY (`penyelenggara_id`) REFERENCES `penyelenggara` (`id_penyelenggara`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `event_kandidat`
--
ALTER TABLE `event_kandidat`
  ADD CONSTRAINT `event_kandidat_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event` (`id_event`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
