-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 09:57 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akurin`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_iku`
--

CREATE TABLE `detail_iku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_iku` bigint(20) UNSIGNED NOT NULL,
  `tahun` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `pihak_satu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pihak_dua` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ditetapkan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_iku`
--

INSERT INTO `detail_iku` (`id`, `id_iku`, `tahun`, `target`, `pihak_satu`, `pihak_dua`, `tanggal_ditetapkan`, `created_at`, `updated_at`) VALUES
(1, 1, 2020, 90, 'Drs. H. ZEIN AHSAN, MH	', 'ISRIZAL ANWAR, S.Ag., M.Hum.', '2022-01-13', NULL, '2023-02-21 01:17:32'),
(2, 1, 2021, 70, 'Drs. H. ZEIN AHSAN, MH', 'ISRIZAL ANWAR, S.Ag., M.Hum.', '2022-01-13', NULL, '2023-01-27 02:15:42'),
(3, 1, 2022, 90, 'Drs. H. ZEIN', 'ISRIZAL ANWAR, S.Ag., M.Hum.', '2022-01-13', NULL, '2023-02-21 01:02:30'),
(4, 1, 2023, 95, 'Drs. H. ZEIN AHSAN, MH	', 'ISRIZAL ANWAR, S.Ag., M.Hum.', '2022-01-13', NULL, NULL),
(5, 1, 2024, 95, 'Drs. H. ZEIN AHSAN, MH', 'ISRIZAL ANWAR, S.Ag., M.Hum.', '2023-01-30', NULL, '2023-01-29 22:33:11'),
(22, 7, 2020, 90, 'annisa', 'ni', '2023-02-21', '2023-02-20 23:21:05', '2023-02-21 00:56:55'),
(23, 1, 2021, 90, NULL, NULL, NULL, '2023-02-21 00:56:32', '2023-02-21 00:56:32'),
(24, 1, 2025, 90, NULL, NULL, NULL, '2023-02-21 01:06:06', '2023-02-21 01:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iku`
--

CREATE TABLE `iku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sasaran` bigint(20) UNSIGNED NOT NULL,
  `jenis` enum('u','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_iku` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iku`
--

INSERT INTO `iku` (`id`, `id_sasaran`, `jenis`, `isi_iku`, `penanggung_jawab`, `sumber_data`, `created_at`, `updated_at`) VALUES
(1, 1, 'u', 'Persentase perkara yang diselesaikan tepat waktu', 'Panitera', 'laporan', NULL, '2023-02-21 00:55:15'),
(3, 1, 'u', 'afskfn', 'panitera', 'laporan', '2023-01-24 20:48:57', '2023-01-27 02:37:55'),
(7, 1, 'u', 'aaaaaa', 'aaaaaaaaaa', 'laporan', '2023-01-30 20:36:20', '2023-01-30 20:36:39'),
(8, 1, 'u', 'qq', 'panitera', 'laporan', '2023-02-14 00:30:39', '2023-02-14 00:30:39'),
(9, 2, 'u', 'bagus', 'ss', 'laporan', '2023-02-15 20:55:00', '2023-02-15 20:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `input_iku`
--

CREATE TABLE `input_iku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_iku` bigint(20) UNSIGNED NOT NULL,
  `ket_input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `input_iku`
--

INSERT INTO `input_iku` (`id`, `id_iku`, `ket_input`, `created_at`, `updated_at`) VALUES
(1, 3, 'Jumlah kasus', NULL, NULL),
(2, 3, 'jumlah', '2023-02-07 01:52:44', '2023-02-07 01:52:44'),
(9, 7, 'jumlah perkara', '2023-02-08 20:35:14', '2023-02-08 20:35:14'),
(10, 7, 'jumlah perkara', '2023-02-08 20:35:39', '2023-02-08 20:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(69, '2014_10_12_000000_create_users_table', 1),
(70, '2014_10_12_100000_create_password_resets_table', 1),
(71, '2019_08_19_000000_create_failed_jobs_table', 1),
(72, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(73, '2023_01_18_070615_create_tujuan_table', 1),
(74, '2023_01_18_073212_create_sasaran_table', 1),
(75, '2023_01_18_075649_create_iku_table', 1),
(76, '2023_01_18_080714_create_detail_iku_table', 1),
(77, '2023_01_18_081129_create_pengukuran_table', 1),
(78, '2023_01_18_081400_create_input_iku_table', 1),
(82, '2023_01_20_032725_add_periode_to_sasaran_table', 2),
(83, '2023_01_20_033926_add_periode_to_sasaran_table', 3),
(84, '2023_01_20_035051_add_target_to_iku_table', 4),
(85, '2023_01_20_035645_add_target_to_iku_table', 5),
(86, '2023_01_20_232306_alter_table_detail_iku_change_tahun', 6),
(87, '2023_01_24_081908_add_sumber_data_to_iku_table', 7),
(88, '2023_01_31_041743_add_bulan_to_pengukuran_table', 8),
(89, '2023_02_06_021035_add_nip_to_users_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengukuran`
--

CREATE TABLE `pengukuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `bulan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_satu` int(11) NOT NULL,
  `input_dua` int(11) NOT NULL,
  `sumber_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `realisasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `capaian` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengukuran`
--

INSERT INTO `pengukuran` (`id`, `id_detail`, `bulan`, `input_satu`, `input_dua`, `sumber_data`, `realisasi`, `capaian`, `created_at`, `updated_at`) VALUES
(1, 1, 'Januari', 50, 60, 'Laporan Bulanan dan Laporan Tahunan', '83', '92', NULL, '2023-02-21 01:17:40'),
(7, 3, 'Juli', 77, 80, 'laporan', '96', '107', '2023-01-31 23:40:25', '2023-01-31 23:40:25'),
(8, 5, 'Januari', 77, 77, 'laporan', '100', '105', '2023-02-05 19:16:04', '2023-02-05 19:16:04'),
(9, 1, 'Februari', 80, 90, 'laporan', '89', '111', '2023-02-06 00:49:43', '2023-02-06 00:49:43'),
(10, 1, 'Maret', 80, 90, 'laporan', '89', '111', '2023-02-06 00:49:52', '2023-02-06 00:49:52'),
(11, 1, 'April', 80, 80, 'laporan', '100', '125', '2023-02-08 21:29:05', '2023-02-08 21:29:05'),
(12, 1, 'Mei', 85, 80, 'laporan', '106', '133', '2023-02-08 21:29:15', '2023-02-08 21:29:15'),
(13, 1, 'Juni', 90, 70, 'laporan', '129', '161', '2023-02-08 21:29:26', '2023-02-13 23:34:16'),
(18, 1, 'Juli', 79, 77, 'laporan', '103', '129', '2023-02-08 22:05:14', '2023-02-20 22:08:57'),
(19, 1, 'Agustus', 79, 77, 'laporan', '103', '129', '2023-02-08 22:05:24', '2023-02-08 22:05:24'),
(20, 1, 'September', 90, 77, 'laporan', '117', '146', '2023-02-08 22:05:32', '2023-02-08 22:05:32'),
(26, 24, 'Januari', 77, 100, 'laporan', '77', '86', '2023-02-21 01:20:38', '2023-02-21 01:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sasaran`
--

CREATE TABLE `sasaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tujuan` bigint(20) UNSIGNED NOT NULL,
  `isi_sasaran` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sasaran`
--

INSERT INTO `sasaran` (`id`, `id_tujuan`, `isi_sasaran`, `periode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mewujudkan peradilan yang pasti, transparan dan akuntabel', '2020-2024', NULL, NULL),
(2, 1, 'abcd', '2020-2024', NULL, NULL),
(3, 1, 'Meningkatkan efektivitas pengelolaan penyelesaian perkara', '2020-2024', NULL, NULL),
(4, 1, 'Meningkatnya akses peradilan bagi masyarakat miskin dan terpinggirkan', '2020-2024', NULL, NULL),
(5, 1, 'Meningkatnya kepatuhan terhadap putusan pengadilan', '2020-2024', NULL, NULL),
(6, 2, 'Terlaksananya dukungan pelaksanaan tugas Pengadilan Agama Bukittiggi', '2020-2024', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isi_tujuan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id`, `isi_tujuan`, `created_at`, `updated_at`) VALUES
(1, 'Terwujudnya kepercayaan publik atas layanan peradilan melalui proses peradilan yang pasti, transparan dan akuntabel', NULL, NULL),
(2, 'Terwujudnya Dukungan pelaksanaan tugas Pengadilan Agama Bukittinggi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nip`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'annisa', 'annisa@gmail.com', '12345', NULL, '$2y$10$oM.yBF2O7Gx7Fi24HCTMZuYy/8shJ4EqbRPvCCvZiS0X1sqFVZSHq', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_iku`
--
ALTER TABLE `detail_iku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_iku_id_iku_foreign` (`id_iku`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `iku`
--
ALTER TABLE `iku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iku_id_sasaran_foreign` (`id_sasaran`);

--
-- Indexes for table `input_iku`
--
ALTER TABLE `input_iku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_iku_id_iku_foreign` (`id_iku`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengukuran_id_detail_foreign` (`id_detail`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sasaran`
--
ALTER TABLE `sasaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sasaran_id_tujuan_foreign` (`id_tujuan`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `detail_iku`
--
ALTER TABLE `detail_iku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iku`
--
ALTER TABLE `iku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `input_iku`
--
ALTER TABLE `input_iku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `pengukuran`
--
ALTER TABLE `pengukuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sasaran`
--
ALTER TABLE `sasaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_iku`
--
ALTER TABLE `detail_iku`
  ADD CONSTRAINT `detail_iku_id_iku_foreign` FOREIGN KEY (`id_iku`) REFERENCES `iku` (`id`);

--
-- Constraints for table `iku`
--
ALTER TABLE `iku`
  ADD CONSTRAINT `iku_id_sasaran_foreign` FOREIGN KEY (`id_sasaran`) REFERENCES `sasaran` (`id`);

--
-- Constraints for table `input_iku`
--
ALTER TABLE `input_iku`
  ADD CONSTRAINT `input_iku_id_iku_foreign` FOREIGN KEY (`id_iku`) REFERENCES `iku` (`id`);

--
-- Constraints for table `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD CONSTRAINT `pengukuran_id_detail_foreign` FOREIGN KEY (`id_detail`) REFERENCES `detail_iku` (`id`);

--
-- Constraints for table `sasaran`
--
ALTER TABLE `sasaran`
  ADD CONSTRAINT `sasaran_id_tujuan_foreign` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
