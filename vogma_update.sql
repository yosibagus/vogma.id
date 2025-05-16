-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2025 at 01:41 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

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
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` bigint UNSIGNED NOT NULL,
  `url_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_start_event` date NOT NULL,
  `tgl_end_event` date NOT NULL,
  `lokasi_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_event` decimal(10,2) DEFAULT NULL,
  `deskripsi_event` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `benner_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_vote` int DEFAULT NULL,
  `penyelenggara_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `url_event`, `nama_event`, `tgl_start_event`, `tgl_end_event`, `lokasi_event`, `harga_event`, `deskripsi_event`, `benner_event`, `max_vote`, `penyelenggara_id`, `created_at`, `updated_at`) VALUES
(4, 'pemilihan-duta-batik-sumenep-2025', 'Pemilihan Duta Batik Sumenep 2025', '2025-05-16', '2025-05-17', 'Gedung Campaka Uniba Madura', '2000.00', 'Dukung finalis favorit kamu sekarang juga!', 'upload/benner/1747380146_6822d1d069d4f_organizer_68230a426a5b120250513160050.png', 5, 1, '2025-05-14 22:10:25', '2025-05-16 00:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `event_kandidat`
--

CREATE TABLE `event_kandidat` (
  `id_kandidat` bigint UNSIGNED NOT NULL,
  `no_kandidat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kandidat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kandidat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_kandidat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `biografi_kandidat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `event_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_kandidat`
--

INSERT INTO `event_kandidat` (`id_kandidat`, `no_kandidat`, `nama_kandidat`, `foto_kandidat`, `deskripsi_kandidat`, `biografi_kandidat`, `event_id`, `created_at`, `updated_at`) VALUES
(2, '2', 'Jaya Hardiansyah', 'upload/foto kandidat/1747381923_1.jpeg', 'Oke', 'oke', 4, '2025-05-16 00:21:07', '2025-05-16 00:52:03'),
(3, '1', 'Niko Wiliam', 'upload/foto kandidat/1747382102_2.jpeg', 'ok', 'ok', 4, '2025-05-16 00:21:31', '2025-05-16 00:55:02'),
(4, '3', 'Faris Romadi', 'upload/foto kandidat/1747381987_3.jpeg', 'Ba', 'ba', 4, '2025-05-16 00:33:57', '2025-05-16 00:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `event_votes`
--

CREATE TABLE `event_votes` (
  `id_vote` bigint UNSIGNED NOT NULL,
  `token_vote` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kandidat_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `kuantitas_vote` int NOT NULL,
  `total_harga_vote` decimal(10,2) DEFAULT NULL,
  `status_vote` enum('ok','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan_voters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_votes`
--

INSERT INTO `event_votes` (`id_vote`, `token_vote`, `kandidat_id`, `event_id`, `kuantitas_vote`, `total_harga_vote`, `status_vote`, `pesan_voters`, `created_at`, `updated_at`) VALUES
(1, '68272b41de298', 3, 4, 3, '6000.00', 'ok', NULL, '2025-05-16 12:10:41', '2025-05-16 12:10:41'),
(2, '6827316c80d7b', 3, 4, 3, '6000.00', 'ok', NULL, '2025-05-16 12:37:00', '2025-05-16 12:37:00'),
(3, '6827379c1aab6', 2, 4, 7, '14000.00', 'ok', NULL, '2025-05-16 13:03:24', '2025-05-16 13:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `event_votes_detail`
--

CREATE TABLE `event_votes_detail` (
  `id_detail` int NOT NULL,
  `token_vote` varchar(20) NOT NULL,
  `event_id` int NOT NULL,
  `nama_voters` varchar(50) NOT NULL,
  `nohp_voters` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_voters` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `biaya_layanan` varchar(10) NOT NULL,
  `total_pembayaran` varchar(20) NOT NULL,
  `snap_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `metode_pembayaran` varchar(15) NOT NULL,
  `kode_pembayaran` text NOT NULL,
  `kardaluarsa_pembayaran` timestamp NULL DEFAULT NULL,
  `status_pembayaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event_votes_detail`
--

INSERT INTO `event_votes_detail` (`id_detail`, `token_vote`, `event_id`, `nama_voters`, `nohp_voters`, `email_voters`, `total_harga`, `biaya_layanan`, `total_pembayaran`, `snap_token`, `metode_pembayaran`, `kode_pembayaran`, `kardaluarsa_pembayaran`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, '68272b41de298', 4, 'Bagus', '017283762873', 'yosibagusdsd@gmail.com', '6000', '42', '6042', NULL, 'qris', 'https://api.sandbox.midtrans.com/v2/qris/a5e1c8d8-6feb-497b-95d2-21aceef8e28b/qr-code', '2025-05-16 12:25:38', NULL, '2025-05-16 12:10:42', '2025-05-16 12:10:42'),
(2, '6827316c80d7b', 4, 'Yosi', '0818023623', 'yosibagusdsd@gmail.com', '6000', '42', '6042', NULL, 'qris', 'https://api.sandbox.midtrans.com/v2/qris/7d3369b8-eb8f-4383-8548-3b363072dbc9/qr-code', '2025-05-16 12:51:58', NULL, '2025-05-16 12:37:02', '2025-05-16 12:37:02'),
(3, '6827379c1aab6', 4, 'Yosi', '0818023623', 'yosibagusdsd@gmail.com', '14000', '98', '14098', NULL, 'qris', 'https://api.sandbox.midtrans.com/v2/qris/b5de6176-a822-416b-8feb-0f6e6af21d75/qr-code', '2025-05-16 13:18:22', NULL, '2025-05-16 13:03:26', '2025-05-16 13:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyelenggara`
--

CREATE TABLE `penyelenggara` (
  `id_penyelenggara` bigint UNSIGNED NOT NULL,
  `nama_penyelenggara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_penyelenggara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_penyelenggara` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nohp_penyelenggara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_penyelenggara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyelenggara`
--

INSERT INTO `penyelenggara` (`id_penyelenggara`, `nama_penyelenggara`, `logo_penyelenggara`, `alamat_penyelenggara`, `nohp_penyelenggara`, `email_penyelenggara`, `dokumen_ktp`, `dokumen_npwp`, `created_at`, `updated_at`) VALUES
(1, 'Vogma ID', 'upload/logo_penyelenggara/1747380454_logo.png', 'Batuan Sumenep', '081807058847', 'yosibagusdsd@gmail.com', NULL, NULL, '2025-05-14 22:04:36', '2025-05-16 00:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','penyelenggara') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'penyelenggara',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rionaldi', 'rionaldisaputra82@gmail.com', NULL, '$2y$12$aGMx.2EtB0.NJfg.hUQ50uGlklaMrWpgvKQ2cCA3z6x.I2ucIX2H2', 'admin', NULL, '2025-05-10 22:40:41', '2025-05-11 00:31:41'),
(17, 'Rio', 'dyy@gmail.com', NULL, '$2y$12$/CYN0Cq9p.4AK7d8HLXm7.CdTbY3j7CtMbimpfNMDiLPVI9JfZD9K', 'penyelenggara', NULL, '2025-05-13 23:19:16', '2025-05-13 23:19:16'),
(18, 'dyy', 'rafi@agromarts.com', NULL, '$2y$12$9rmzlgAb0/262IXPq6Pg5ezJOW03V2tbwd7p6LRabhCLYXbSUD0Vq', 'penyelenggara', NULL, '2025-05-13 23:19:30', '2025-05-13 23:19:30'),
(20, 'Rafi', 'rafi@agromarxszts.com', NULL, '$2y$12$fBGk7TBJRntJ9frJL49zKu4qqwgV43FmBfR/y8KURywHZAf5uBbQe', 'penyelenggara', NULL, '2025-05-14 09:30:32', '2025-05-14 09:30:32'),
(21, 'mugtafi', 'mug@gmail.com', NULL, '$2y$12$I2tdnG8gBYRtL9oD78nyUe89DBynEV5wqxuF4nPryd4cDx7/J6S5y', 'penyelenggara', NULL, '2025-05-14 09:30:58', '2025-05-14 09:30:58'),
(22, 'Admin User', 'admin@example.com', '2025-05-14 22:00:03', '$2y$12$IiPCD8CQm3zQcqyZJwdyBO/n4KwkBPdX/z9fUaWFX7/55zssxb1JG', 'admin', 'epULoTdIRY', '2025-05-14 22:00:03', '2025-05-14 22:00:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `event_kandidat`
--
ALTER TABLE `event_kandidat`
  ADD PRIMARY KEY (`id_kandidat`),
  ADD KEY `event_kandidat_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_votes`
--
ALTER TABLE `event_votes`
  ADD PRIMARY KEY (`id_vote`);

--
-- Indexes for table `event_votes_detail`
--
ALTER TABLE `event_votes_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
  ADD PRIMARY KEY (`id_penyelenggara`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_kandidat`
--
ALTER TABLE `event_kandidat`
  MODIFY `id_kandidat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_votes`
--
ALTER TABLE `event_votes`
  MODIFY `id_vote` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_votes_detail`
--
ALTER TABLE `event_votes_detail`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
  MODIFY `id_penyelenggara` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_kandidat`
--
ALTER TABLE `event_kandidat`
  ADD CONSTRAINT `event_kandidat_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event` (`id_event`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
