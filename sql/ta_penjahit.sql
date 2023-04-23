-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2023 at 03:27 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_penjahit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

DROP TABLE IF EXISTS `bahan_baku`;
CREATE TABLE IF NOT EXISTS `bahan_baku` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_bahan_baku` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bahanbaku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok` double DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_bahanbaku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lebar` float NOT NULL,
  `warna_kain` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint DEFAULT NULL,
  `kolom_rak_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `kode_bahan_baku`, `nama_bahanbaku`, `harga_beli`, `harga_jual`, `stok`, `satuan`, `foto_bahanbaku`, `lebar`, `warna_kain`, `supplier_id`, `kolom_rak_id`, `created_at`, `updated_at`) VALUES
(18, 'B', 'kain balenciaga', 95000, NULL, 23.5, 'meter', '20230419112310.png', 12, 'Merah', 6, 12, '2023-03-21 06:20:49', '2023-04-19 04:25:06'),
(19, 'D', 'kain dior', 97000, NULL, 45, 'meter', '', 0, '', 6, 13, '2023-03-21 06:22:37', '2023-03-30 18:20:49'),
(20, 'R', 'kain richmond', 120000, NULL, 47, 'meter', '', 0, '', 9, 15, '2023-03-21 06:22:53', '2023-03-30 17:29:50'),
(22, 'AG', 'kain alberto giovinco', 100000, NULL, 20.5, 'meter', '20230419112230.png', 14, 'Kuning', 11, 16, '2023-03-30 16:08:34', '2023-04-19 04:22:30'),
(23, 'BV', 'kain bulgari', 85000, NULL, 45, 'meter', '20230419112431.jpg', 11, 'Hijau', 13, 17, '2023-03-30 16:10:28', '2023-04-19 04:24:31'),
(24, 'C', 'kain chanel', 90000, NULL, 30, 'meter', '', 0, '', 14, 20, '2023-03-31 00:26:57', '2023-03-31 00:36:15'),
(25, 'Kancing', 'Kancing', 500, NULL, 100, 'biji', '', 0, '', 14, 20, '2023-03-31 00:26:57', '2023-03-31 00:36:15'),
(26, 'RL', 'Resleting', 500, NULL, 100, 'biji', '', 0, '', 14, 20, '2023-03-31 00:26:57', '2023-03-31 00:36:15'),
(27, 'Harum nobis excepteu', 'Commodi in asperiore', 5, NULL, NULL, 'Pariatur Est sed n', '20230418161943.png', 12, 'Commodi voluptate et', 6, 20, '2023-04-18 09:19:43', '2023-04-19 03:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `bom_model`
--

DROP TABLE IF EXISTS `bom_model`;
CREATE TABLE IF NOT EXISTS `bom_model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model_id` int NOT NULL,
  `bom_standart_ukuran_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bom_model`
--

INSERT INTO `bom_model` (`id`, `model_id`, `bom_standart_ukuran_id`, `created_at`, `updated_at`) VALUES
(1, 18, 1, '2023-04-21 07:42:50', '2023-04-21 07:42:50'),
(2, 18, 1, '2023-04-21 13:36:59', '2023-04-21 13:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `bom_model_detail`
--

DROP TABLE IF EXISTS `bom_model_detail`;
CREATE TABLE IF NOT EXISTS `bom_model_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bom_id` int NOT NULL,
  `bahanbaku_id` int NOT NULL,
  `jumlah` double NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bom_model_detail`
--

INSERT INTO `bom_model_detail` (`id`, `bom_id`, `bahanbaku_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 5, '2023-04-22 05:14:04', '2023-04-23 01:29:31'),
(2, 1, 19, 3, '2023-04-22 07:30:24', '2023-04-23 01:29:23'),
(3, 1, 18, 3, '2023-04-23 01:29:54', '2023-04-23 01:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `bom_standart_ukuran`
--

DROP TABLE IF EXISTS `bom_standart_ukuran`;
CREATE TABLE IF NOT EXISTS `bom_standart_ukuran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(5) NOT NULL,
  `lebar_kain` double NOT NULL COMMENT 'meter',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bom_standart_ukuran`
--

INSERT INTO `bom_standart_ukuran` (`id`, `ukuran`, `lebar_kain`) VALUES
(1, 'S', 3),
(2, 'M', 3),
(3, 'L', 3.5),
(4, 'XL', 4),
(5, 'XXL', 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_bahanbaku`
--

DROP TABLE IF EXISTS `detail_pembelian_bahanbaku`;
CREATE TABLE IF NOT EXISTS `detail_pembelian_bahanbaku` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bahan_baku_id` bigint DEFAULT NULL,
  `pembelian_bahanbaku_id` bigint DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pembelian_bahanbaku`
--

INSERT INTO `detail_pembelian_bahanbaku` (`id`, `bahan_baku_id`, `pembelian_bahanbaku_id`, `jumlah`, `harga_beli`, `subtotal`, `created_at`, `updated_at`) VALUES
(23, 18, 21, 45, 90000, 4050000, '2023-03-21 06:53:33', '2023-03-21 06:54:00'),
(24, 19, 21, 45, 97000, 4365000, '2023-03-21 07:01:03', '2023-03-21 07:02:18'),
(25, 20, 22, 45, 110000, 4950000, '2023-03-28 02:56:27', '2023-03-28 05:56:33'),
(26, 20, 22, 7, 100000, 700000, '2023-03-28 21:04:24', '2023-03-28 21:04:24'),
(33, 22, 29, 25, 100000, 2500000, '2023-03-30 16:15:28', '2023-03-30 16:15:28'),
(34, 23, 30, 45, 85000, 3825000, '2023-03-30 16:22:26', '2023-03-30 16:22:26'),
(35, 18, 31, 10, 90000, 900000, '2023-03-30 16:35:30', '2023-03-30 16:35:30'),
(37, 24, 33, 20, 90000, 1800000, '2023-03-31 00:35:22', '2023-03-31 00:35:22'),
(38, 24, 34, 10, 90000, 900000, '2023-03-31 00:36:15', '2023-03-31 00:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan_bahanbaku`
--

DROP TABLE IF EXISTS `detail_pemesanan_bahanbaku`;
CREATE TABLE IF NOT EXISTS `detail_pemesanan_bahanbaku` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemesanan_id` int DEFAULT NULL,
  `bahan_baku_id` bigint DEFAULT NULL,
  `detail_pemesanan_model_id` bigint DEFAULT NULL,
  `ongkos_jahit` double DEFAULT NULL,
  `jumlah_terpakai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemesanan_bahanbaku`
--

INSERT INTO `detail_pemesanan_bahanbaku` (`id`, `pemesanan_id`, `bahan_baku_id`, `detail_pemesanan_model_id`, `ongkos_jahit`, `jumlah_terpakai`, `created_at`, `updated_at`) VALUES
(30, 33, 19, 31, NULL, 20, '2023-03-22 19:35:02', '2023-03-28 23:22:08'),
(31, 33, 0, 0, NULL, 1, '2023-03-22 19:35:39', '2023-03-22 19:35:39'),
(32, 34, 19, 32, NULL, NULL, '2023-03-22 20:56:20', '2023-03-22 20:56:20'),
(38, 45, 18, 37, NULL, 6, '2023-03-29 22:19:44', '2023-03-30 21:18:45'),
(39, 46, 18, 38, NULL, 5.5, '2023-03-30 10:34:07', '2023-03-30 03:37:40'),
(40, 47, 20, 39, NULL, 5, '2023-03-31 00:21:23', '2023-03-30 17:29:50'),
(41, 48, 22, 40, NULL, 4.5, '2023-03-31 03:57:10', '2023-03-30 21:18:16'),
(42, 49, 20, 41, NULL, NULL, '2023-03-31 04:15:20', '2023-03-31 04:15:20'),
(43, 50, 18, 42, NULL, NULL, '2023-03-31 05:40:22', '2023-03-31 05:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan_model`
--

DROP TABLE IF EXISTS `detail_pemesanan_model`;
CREATE TABLE IF NOT EXISTS `detail_pemesanan_model` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_id` bigint DEFAULT NULL,
  `pemesanan_id` bigint DEFAULT NULL,
  `jenis_model_id` bigint DEFAULT '1',
  `banyaknya` double DEFAULT NULL,
  `ongkos_jahit` double DEFAULT NULL,
  `nama_model_detail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_gambar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deskripsi_pemesanan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemesanan_model`
--

INSERT INTO `detail_pemesanan_model` (`id`, `model_id`, `pemesanan_id`, `jenis_model_id`, `banyaknya`, `ongkos_jahit`, `nama_model_detail`, `file_gambar`, `deskripsi_pemesanan`, `created_at`, `updated_at`) VALUES
(31, 17, 33, 1, 10, 1000000, 'pegawai bca darmo', '20230322051607.png', NULL, '2023-03-21 22:16:07', '2023-03-21 22:16:07'),
(37, 18, 45, 1, 5, 1000000, '-', NULL, NULL, '2023-03-29 22:19:34', '2023-03-29 22:19:34'),
(38, 18, 46, 1, 5, 1000000, '-', NULL, NULL, '2023-03-30 10:33:30', '2023-03-30 10:33:30'),
(39, 18, 47, 1, 5, 1000000, '-', NULL, NULL, '2023-03-31 00:20:29', '2023-03-31 00:20:29'),
(40, 19, 48, 1, 3, 1000000, '-', NULL, NULL, '2023-03-31 03:56:55', '2023-03-31 03:56:55'),
(41, 18, 49, 1, 3, 900000, '-', NULL, NULL, '2023-03-31 04:14:57', '2023-03-31 04:14:57'),
(42, 20, 50, 1, 5, 1200000, '-', NULL, NULL, '2023-03-31 05:40:05', '2023-03-31 05:40:05'),
(43, 18, 33, 1, 2, 1000000, '-', NULL, NULL, '2023-04-18 05:23:02', '2023-04-18 05:23:02'),
(44, 20, 33, 1, 10, 1200000, '-', NULL, NULL, '2023-04-23 03:26:20', '2023-04-23 03:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan_model_ukuran`
--

DROP TABLE IF EXISTS `detail_pemesanan_model_ukuran`;
CREATE TABLE IF NOT EXISTS `detail_pemesanan_model_ukuran` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `detail_pemesanan_model_id` bigint DEFAULT NULL,
  `tinggi_badan` double DEFAULT NULL,
  `berat_badan` double DEFAULT NULL,
  `ukuran_baju` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_baju_dengan_ukuran_yg_sama` int NOT NULL,
  `panjang_atasan` double DEFAULT NULL,
  `lingkar_dada` double DEFAULT NULL,
  `lingkar_perut_atasan` double DEFAULT NULL,
  `lingkar_pinggul_atasan` double DEFAULT NULL,
  `lebar_bahu` double DEFAULT NULL,
  `panjang_tangan` double DEFAULT NULL,
  `lingkar_siku` double DEFAULT NULL,
  `lingkar_pergelangan` double DEFAULT NULL,
  `kerah` double DEFAULT NULL,
  `ukuran_celana` double DEFAULT NULL,
  `panjang_celana` double DEFAULT NULL,
  `lingkar_perut_celana` double DEFAULT NULL,
  `pesak` double DEFAULT NULL,
  `lingkar_pinggul_celana` double DEFAULT NULL,
  `lingkar_paha` double DEFAULT NULL,
  `lingkar_lutut` double DEFAULT NULL,
  `lingkar_bawah` double DEFAULT NULL,
  `deskripsi_ukuran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bom_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemesanan_model_ukuran`
--

INSERT INTO `detail_pemesanan_model_ukuran` (`id`, `detail_pemesanan_model_id`, `tinggi_badan`, `berat_badan`, `ukuran_baju`, `jumlah_baju_dengan_ukuran_yg_sama`, `panjang_atasan`, `lingkar_dada`, `lingkar_perut_atasan`, `lingkar_pinggul_atasan`, `lebar_bahu`, `panjang_tangan`, `lingkar_siku`, `lingkar_pergelangan`, `kerah`, `ukuran_celana`, `panjang_celana`, `lingkar_perut_celana`, `pesak`, `lingkar_pinggul_celana`, `lingkar_paha`, `lingkar_lutut`, `lingkar_bawah`, `deskripsi_ukuran`, `bom_id`, `created_at`, `updated_at`) VALUES
(27, 31, NULL, NULL, 'M', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-21 22:30:01', '2023-03-21 22:30:01'),
(28, 31, NULL, NULL, 'L', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-21 22:42:42', '2023-03-21 22:42:42'),
(29, 35, 180, 70, 'M', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-23 04:25:29', '2023-03-23 04:40:39'),
(30, 36, NULL, NULL, 'M', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-23 04:57:03', '2023-03-23 04:57:03'),
(31, 36, NULL, NULL, 'L', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-23 05:00:01', '2023-03-23 05:00:01'),
(32, 35, NULL, NULL, NULL, 1, 7.5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-29 05:35:48', '2023-03-29 05:35:48'),
(33, 37, NULL, NULL, 'M', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-29 22:20:09', '2023-03-29 22:20:09'),
(34, 37, NULL, NULL, 'L', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-29 22:20:21', '2023-03-29 22:20:21'),
(35, 38, NULL, NULL, 'L', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-30 10:34:43', '2023-03-30 10:34:43'),
(36, 38, NULL, NULL, 'XL', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-30 10:34:54', '2023-03-30 10:34:54'),
(37, 39, NULL, NULL, 'M', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-31 00:23:46', '2023-03-31 00:23:46'),
(38, 39, NULL, NULL, 'L', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-31 00:24:14', '2023-03-31 00:24:14'),
(39, 40, NULL, NULL, 'M', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-31 03:57:49', '2023-03-31 03:57:49'),
(40, 41, NULL, NULL, 'S', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-31 04:16:10', '2023-03-31 04:16:10'),
(41, 42, NULL, NULL, 'L', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-31 05:41:00', '2023-03-31 05:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jasa_ekspedisi`
--

DROP TABLE IF EXISTS `jasa_ekspedisi`;
CREATE TABLE IF NOT EXISTS `jasa_ekspedisi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jasa_ekspedisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jasa_ekspedisi`
--

INSERT INTO `jasa_ekspedisi` (`id`, `jasa_ekspedisi`, `created_at`, `updated_at`) VALUES
(2, 'JNT', '2023-03-30 17:48:27', '2023-03-30 17:48:27'),
(3, 'JNE', '2023-03-30 17:48:32', '2023-03-30 17:48:32'),
(4, 'Sicepat', '2023-03-30 17:48:37', '2023-03-30 17:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_model`
--

DROP TABLE IF EXISTS `jenis_model`;
CREATE TABLE IF NOT EXISTS `jenis_model` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_jenismodel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_model`
--

INSERT INTO `jenis_model` (`id`, `nama_jenismodel`, `created_at`, `updated_at`) VALUES
(1, 'Unisex', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kolom_rak`
--

DROP TABLE IF EXISTS `kolom_rak`;
CREATE TABLE IF NOT EXISTS `kolom_rak` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(255) NOT NULL,
  `nama_kolom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kolom_rak`
--

INSERT INTO `kolom_rak` (`id`, `nama_rak`, `nama_kolom`, `created_at`, `updated_at`) VALUES
(12, 'Rak 1', 'Col no 1', '2023-03-21 06:06:28', '2023-03-21 06:06:28'),
(13, 'Rak 1', 'Col no 2', '2023-03-21 06:06:34', '2023-03-21 06:06:34'),
(15, 'Rak 1', 'Col no 3', '2023-03-21 06:07:12', '2023-03-21 06:07:12'),
(16, 'Rak 2', 'Col no 1', '2023-03-21 06:07:25', '2023-03-21 06:07:25'),
(17, 'Rak 2', 'Col no 2', '2023-03-21 06:07:32', '2023-03-21 06:07:32'),
(18, 'Rak 2', 'Col no 3', '2023-03-21 13:07:47', '2023-03-21 06:07:47'),
(20, 'Rak 3', 'Col no 1', '2023-03-31 00:15:03', '2023-03-31 00:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `letak_bahan_baku`
--

DROP TABLE IF EXISTS `letak_bahan_baku`;
CREATE TABLE IF NOT EXISTS `letak_bahan_baku` (
  `nama_letak` varchar(100) NOT NULL,
  PRIMARY KEY (`nama_letak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_20_125807_create_suppliers_table', 1),
(6, '2022_09_20_132010_create_bahan_bakus_table', 1),
(7, '2022_09_20_135502_create_penjahits_table', 1),
(8, '2022_09_20_141725_create_pelanggans_table', 1),
(9, '2022_09_21_122513_create_detail_pemesanan_bahanbaku', 1),
(10, '2022_09_21_122749_create_pembelian_bahanbaku', 1),
(11, '2022_09_21_124553_create_detail_pemesanan_model', 1),
(12, '2022_09_21_124631_create_jenis_model', 1),
(13, '2022_09_21_124717_create_model', 1),
(14, '2022_09_21_124907_create_pemesanan', 1),
(15, '2022_09_21_125852_create_realisasi_produksi', 1),
(16, '2022_09_21_130238_create_perencanaan_produksi', 1),
(17, '2022_09_21_130530_create_pengambilan', 1),
(18, '2022_09_21_130934_create_retur_pemesanan', 1),
(19, '2022_09_21_131240_create_realisasi_penjahit', 1),
(20, '2022_09_21_131318_create_proses_produksi', 1),
(21, '2022_10_05_095003_create_detail_pembelian_bahanbaku', 1),
(24, '2022_10_13_112851_add_detail_pemesanan_model_id_to_perencanaan_produksi_table', 2),
(25, '2022_10_15_092236_add_detail_pemesanan_model_id_to_detail_pemesanan_bahanbaku', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis_model` bigint DEFAULT NULL,
  `pelanggan_id` bigint DEFAULT NULL,
  `foto_model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ongkos_jahit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `jenis_model`, `pelanggan_id`, `foto_model`, `nama_model`, `ongkos_jahit`, `deskripsi_model`, `created_at`, `updated_at`) VALUES
(17, 1, NULL, NULL, 'model pelanggan', NULL, NULL, '2023-03-21 22:00:37', '2023-03-28 03:01:54'),
(18, 1, NULL, '20230322050130.png', 'JAS PENGANTIN PRIA PUTIH', '1000000', NULL, '2023-03-21 22:01:08', '2023-03-21 22:01:30'),
(19, 1, NULL, '20230322050439.png', 'JAS PENGANTIN PRIA HITAM', '1000000', NULL, '2023-03-21 22:04:39', '2023-03-21 22:04:39'),
(20, 1, NULL, '20230331000529.png', 'Jas dan Celana Formal Putih', '1200000', NULL, '2023-03-30 17:05:29', '2023-03-30 17:05:29'),
(21, 1, NULL, '20230331073713.png', 'Jas dan Celana Formal Hitam', '1200000', NULL, '2023-03-31 00:37:13', '2023-03-31 00:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `email`, `no_telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(15, 'Rafli', 'rafly@gmail.com', '08113111862', NULL, '2023-03-21 22:12:51', '2023-03-28 19:05:11'),
(16, 'aldo', 'aldo@gmail.com', '08512345678', 'wiyung', '2023-03-21 22:14:25', '2023-03-21 22:14:25'),
(17, 'farrell', 'farrell@gmail.com', '08512345678', 'surabaya', '2023-03-30 17:06:09', '2023-03-30 17:06:09'),
(18, 'andi', 'andi@gmail.com', '08198765432', 'jl jojoran', '2023-03-30 17:16:13', '2023-03-30 17:16:13'),
(19, 'azhar', 'azhar@gmail.com', '0851234678', 'surabaya', '2023-03-30 17:17:36', '2023-03-30 17:17:36'),
(20, 'dani', 'danimaulanaazhar@gmail.com', '08113111862', 'surabaya', '2023-03-31 00:38:05', '2023-03-31 00:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_bahanbaku`
--

DROP TABLE IF EXISTS `pembelian_bahanbaku`;
CREATE TABLE IF NOT EXISTS `pembelian_bahanbaku` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` bigint DEFAULT NULL,
  `penjahit_id` bigint DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_bahanbaku`
--

INSERT INTO `pembelian_bahanbaku` (`id`, `supplier_id`, `penjahit_id`, `tanggal_beli`, `bayar`, `total`, `created_at`, `updated_at`) VALUES
(21, 6, 1, '2023-03-21', 8415000, 8415000, '2023-03-21 06:33:38', '2023-03-21 07:01:13'),
(22, 9, 1, '2023-03-28', 5000000, 5650000, '2023-03-28 02:51:36', '2023-03-28 21:05:05'),
(29, 11, 1, '2023-03-13', 2500000, 2500000, '2023-03-30 16:15:07', '2023-03-30 16:15:44'),
(30, 13, 1, '2023-03-14', 3825000, 3825000, '2023-03-30 16:21:31', '2023-03-30 16:22:42'),
(31, 6, 1, '2023-03-20', 900000, 900000, '2023-03-30 16:35:13', '2023-03-30 16:36:49'),
(33, 14, 1, '2023-03-31', 1800000, 1800000, '2023-03-31 00:27:42', '2023-03-31 00:35:36'),
(34, 14, 1, '2023-03-31', NULL, NULL, '2023-03-31 00:36:06', '2023-03-31 00:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pelanggan_id` bigint DEFAULT NULL,
  `penjahit_id` bigint DEFAULT NULL,
  `proses_produksi_id` bigint DEFAULT NULL,
  `pengambilan_id` bigint DEFAULT NULL,
  `perencanaan_produksi_id` bigint DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_ongkos` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `status_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Lunas, Bayar Sebagian',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `pelanggan_id`, `penjahit_id`, `proses_produksi_id`, `pengambilan_id`, `perencanaan_produksi_id`, `tanggal`, `total_ongkos`, `bayar`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(33, 15, 1, NULL, NULL, NULL, '2023-04-05', 10000000, 10000000, 'Lunas', '2023-03-21 22:15:06', '2023-03-23 06:07:07'),
(45, 15, 1, NULL, NULL, NULL, '2023-04-27', 5000000, 5000000, 'Lunas', '2023-03-29 22:19:16', '2023-03-29 22:19:56'),
(46, 16, 1, NULL, NULL, NULL, '2023-04-25', 5000000, 2500000, 'Bayar Sebagian', '2023-03-30 10:33:02', '2023-03-30 10:34:30'),
(47, 17, 1, NULL, NULL, NULL, '2023-04-12', 5000000, 5000000, 'Lunas', '2023-03-31 00:18:59', '2023-03-31 00:49:21'),
(48, 18, 1, NULL, NULL, NULL, '2023-04-17', 3000000, 3000000, 'Lunas', '2023-03-31 03:56:42', '2023-03-31 04:06:49'),
(49, 18, 1, NULL, NULL, NULL, '2023-04-17', 2700000, 2700000, 'Lunas', '2023-03-31 04:14:42', '2023-03-31 04:15:41'),
(50, 19, 1, NULL, NULL, NULL, '2023-04-21', 6000000, 3000000, 'Bayar Sebagian', '2023-03-31 05:39:50', '2023-03-31 05:40:35'),
(51, 20, 1, NULL, NULL, NULL, '2023-04-24', NULL, NULL, NULL, '2023-03-31 07:38:45', '2023-03-31 07:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

DROP TABLE IF EXISTS `pengambilan`;
CREATE TABLE IF NOT EXISTS `pengambilan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemesanan_id` bigint NOT NULL,
  `jasa_ekspedisi_id` bigint DEFAULT NULL,
  `opsi_pengambilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `alamat_pengiriman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_pengiriman` double DEFAULT NULL,
  `no_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengambilan`
--

INSERT INTO `pengambilan` (`id`, `pemesanan_id`, `jasa_ekspedisi_id`, `opsi_pengambilan`, `tanggal`, `alamat_pengiriman`, `biaya_pengiriman`, `no_resi`, `created_at`, `updated_at`) VALUES
(7, 33, NULL, 'Ambil', '2023-04-05', NULL, NULL, NULL, '2023-03-22 23:01:00', '2023-03-22 23:01:00'),
(8, 47, NULL, 'Ambil', '2023-04-13', NULL, NULL, NULL, '2023-03-30 17:50:34', '2023-03-30 17:50:34'),
(9, 45, 2, 'Kirim', '2023-03-27', 'Jl. Raya Juanda Sidoarjo', 10000, '12345678', '2023-03-30 17:51:40', '2023-03-30 17:51:40'),
(10, 48, NULL, 'Ambil', '2023-04-17', NULL, NULL, NULL, '2023-03-30 21:07:15', '2023-03-30 21:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `penjahit`
--

DROP TABLE IF EXISTS `penjahit`;
CREATE TABLE IF NOT EXISTS `penjahit` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_penjahit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjahit`
--

INSERT INTO `penjahit` (`id`, `email`, `no_telepon`, `nama_penjahit`, `password`, `created_at`, `updated_at`) VALUES
(1, 'maul@gmail.com', '08213123', 'maul', NULL, NULL, NULL),
(2, 'andi@gmail.com', '086445678', 'Andi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_produksi`
--

DROP TABLE IF EXISTS `perencanaan_produksi`;
CREATE TABLE IF NOT EXISTS `perencanaan_produksi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `proses_produksi_id` bigint DEFAULT NULL,
  `detail_pemesanan_model_id` bigint DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `gambar_pola` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepala_penjahit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perencanaan_produksi`
--

INSERT INTO `perencanaan_produksi` (`id`, `proses_produksi_id`, `detail_pemesanan_model_id`, `tanggal_mulai`, `tanggal_selesai`, `gambar_pola`, `kepala_penjahit`, `created_at`, `updated_at`, `user_id`) VALUES
(20, 13, 31, '2023-03-22', '2023-03-22', NULL, NULL, '2023-03-21 22:59:50', '2023-03-21 22:59:50', 3),
(22, 17, 31, '2023-04-04', '2023-04-05', NULL, NULL, '2023-03-22 19:30:36', '2023-03-22 19:30:36', 6),
(24, 15, 31, '2023-03-24', '2023-04-03', NULL, NULL, '2023-03-22 22:52:47', '2023-03-22 22:52:47', 3),
(31, 13, 37, '2023-03-30', '2023-03-30', NULL, NULL, '2023-03-29 15:21:10', '2023-03-29 15:21:10', 3),
(32, 17, 37, '2023-04-25', '2023-04-27', NULL, NULL, '2023-03-29 15:21:40', '2023-03-29 22:10:25', 5),
(34, 15, 37, '2023-03-31', '2023-04-24', NULL, NULL, '2023-03-29 22:09:08', '2023-03-29 22:09:08', 3),
(35, 13, 38, '2023-03-30', '2023-03-30', NULL, NULL, '2023-03-30 03:35:43', '2023-03-30 03:35:43', 3),
(36, 15, 38, '2023-03-31', '2023-04-17', NULL, NULL, '2023-03-30 03:36:29', '2023-03-30 03:36:29', 3),
(37, 17, 38, '2023-04-18', '2023-04-20', NULL, NULL, '2023-03-30 03:37:07', '2023-03-30 03:37:07', 9),
(38, 13, 39, '2023-03-31', '2023-03-31', NULL, NULL, '2023-03-30 17:26:33', '2023-03-30 17:26:33', 3),
(39, 15, 39, '2023-04-03', '2023-04-10', NULL, NULL, '2023-03-30 17:27:37', '2023-03-30 17:27:37', 5),
(40, 17, 39, '2023-04-11', '2023-04-12', NULL, NULL, '2023-03-30 17:28:26', '2023-03-30 17:28:26', 6),
(41, 13, 40, '2023-03-31', '2023-03-31', NULL, NULL, '2023-03-30 20:58:57', '2023-03-30 20:58:57', 3),
(42, 15, 40, '2023-04-03', '2023-03-15', NULL, NULL, '2023-03-30 20:59:22', '2023-03-30 20:59:22', 6),
(43, 17, 40, '2023-04-12', '2023-04-14', NULL, NULL, '2023-03-30 20:59:49', '2023-03-30 20:59:49', 5),
(44, 13, 41, '2023-03-31', '2023-03-31', NULL, NULL, '2023-03-30 21:16:43', '2023-03-30 21:16:43', 3),
(45, 15, 41, '2023-04-03', '2023-04-12', NULL, NULL, '2023-03-30 21:17:07', '2023-03-30 21:17:07', 6),
(46, 17, 41, '2023-04-13', '2023-04-14', NULL, NULL, '2023-03-30 21:17:32', '2023-03-30 21:17:32', 5);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proses_produksi`
--

DROP TABLE IF EXISTS `proses_produksi`;
CREATE TABLE IF NOT EXISTS `proses_produksi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_prosesproduksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proses_produksi`
--

INSERT INTO `proses_produksi` (`id`, `nama_prosesproduksi`, `created_at`, `updated_at`) VALUES
(13, 'Pemotongan Kain', '2023-03-21 22:55:18', '2023-03-21 22:55:18'),
(15, 'Jahit Pakaian Atasan', '2023-03-21 22:56:18', '2023-03-21 22:56:18'),
(16, 'Jahit Celana', '2023-03-21 22:56:28', '2023-03-21 22:56:28'),
(17, 'Finishing', '2023-03-21 22:56:34', '2023-03-21 22:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_penjahit`
--

DROP TABLE IF EXISTS `realisasi_penjahit`;
CREATE TABLE IF NOT EXISTS `realisasi_penjahit` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `realisasi_produksi_id` bigint DEFAULT NULL,
  `penjahit_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_produksi`
--

DROP TABLE IF EXISTS `realisasi_produksi`;
CREATE TABLE IF NOT EXISTS `realisasi_produksi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemesanan_id` bigint DEFAULT NULL,
  `perencanaan_produksi_id` bigint DEFAULT NULL,
  `proses_produksi_id` bigint DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `realisasi_produksi`
--

INSERT INTO `realisasi_produksi` (`id`, `pemesanan_id`, `perencanaan_produksi_id`, `proses_produksi_id`, `tanggal_mulai`, `tanggal_selesai`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(21, 45, 31, 13, '2023-03-30', '2023-03-30', NULL, NULL, '2023-03-29 15:23:14', '2023-03-29 15:23:14'),
(23, 33, 20, 13, '2023-03-22', '2023-03-22', NULL, NULL, '2023-03-29 15:54:44', '2023-03-29 15:54:44'),
(24, 33, 24, 15, '2023-03-23', '2023-04-03', NULL, NULL, '2023-03-29 15:55:30', '2023-03-29 15:55:30'),
(25, 33, 22, 17, '2023-04-04', '2023-04-05', NULL, NULL, '2023-03-29 15:57:19', '2023-03-29 15:57:19'),
(26, 45, 34, 15, '2023-03-31', '2023-04-25', NULL, NULL, '2023-03-29 22:15:54', '2023-03-29 22:15:54'),
(27, 46, 35, 13, '2023-03-30', '2023-03-31', NULL, NULL, '2023-03-30 03:38:01', '2023-03-30 03:38:01'),
(28, 46, 36, 15, '2023-04-01', '2023-04-14', NULL, NULL, '2023-03-30 03:38:33', '2023-03-30 03:38:33'),
(29, 47, 38, 13, '2023-03-31', '2023-03-31', NULL, NULL, '2023-03-30 17:32:29', '2023-03-30 17:32:29'),
(30, 47, 39, 15, '2023-04-01', '2023-04-10', NULL, NULL, '2023-03-30 17:33:09', '2023-03-30 17:33:09'),
(31, 47, 40, 17, '2023-04-11', '2023-04-12', NULL, NULL, '2023-03-30 17:34:32', '2023-03-30 17:34:32'),
(32, 48, 41, 13, '2023-03-31', '2023-03-31', NULL, NULL, '2023-03-30 21:01:40', '2023-03-30 21:01:40'),
(33, 48, 42, 15, '2023-04-03', '2023-04-11', NULL, NULL, '2023-03-30 21:02:11', '2023-03-30 21:02:11'),
(34, 48, 43, 17, '2023-04-12', '2023-04-14', NULL, NULL, '2023-03-30 21:02:47', '2023-03-30 21:02:47'),
(35, 49, 44, 13, '2023-03-31', '2023-03-31', NULL, NULL, '2023-03-30 21:19:13', '2023-03-30 21:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `retur_pemesanan`
--

DROP TABLE IF EXISTS `retur_pemesanan`;
CREATE TABLE IF NOT EXISTS `retur_pemesanan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemesanan_id` bigint DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `email`, `nomor_telepon`, `created_at`, `updated_at`) VALUES
(6, 'Toko Alpha', 'Jl Kembang Jepun', 'tokoalpha@gmail.com', '0812345678', '2023-03-21 06:08:12', '2023-03-21 06:08:12'),
(9, 'Toko Beta', 'pasar atum', 'tokobeta@gmail.com', '0851234567', '2023-03-21 06:11:58', '2023-03-21 06:11:58'),
(11, 'toko carli', 'sidoarjo', 'tokocarli@gmail.com', '08127484885', '2023-03-21 06:12:37', '2023-03-21 06:12:37'),
(13, 'Toko Delta', 'pasar atum', 'tokodelta@gmail.com', '0821345678', '2023-03-30 15:59:41', '2023-03-30 16:00:15'),
(14, 'Toko Eka', 'surabaya', 'tokoeka@gmail.com', '0851234587', '2023-03-31 00:22:06', '2023-03-31 00:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previledge` enum('Penjahit','Pemilik','Kepala','Admin','Finishing') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penjahit` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `previledge`, `id_penjahit`, `created_at`, `updated_at`) VALUES
(1, 'maul', 'admin@admin.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Admin', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(2, 'atam', 'pemilik@pemilik.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Pemilik', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(3, 'lana', 'kepala@kepala.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Kepala', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(4, 'agung', 'penjahit@penjahit.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Penjahit', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(5, 'mus', 'mus@gmail.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Finishing', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(6, 'aben', 'aben@gmail.com', NULL, '$2y$10$vJZsR2S/szpx5HUWryMq2uiLSeQi0PWd9UQqni42B33cDaieVgD8q', NULL, 'Kepala', 1, '2023-02-24 07:53:07', '2023-02-24 07:53:07'),
(9, 'john', 'john@gmail.com', NULL, '$2y$10$0UbTjOsTOw9.YCYvVXVLlOu0JPh1VO.d4afSMlHU/dqy/E7Jsn2Hi', NULL, 'Kepala', 2, '2023-03-06 18:27:58', '2023-03-06 18:27:58');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_daftar_tanggungan_produksi_jahit`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit`;
CREATE TABLE IF NOT EXISTS `view_laporan_daftar_tanggungan_produksi_jahit` (
`id` bigint unsigned
,`id_proses_produksi` bigint unsigned
,`jumlah` double
,`nama_model` varchar(255)
,`nama_model_detail` varchar(100)
,`nama_pelanggan` varchar(255)
,`nama_prosesproduksi` varchar(255)
,`penjahit_id` bigint
,`realisasi_tanggal_selesai` date
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_daftar_tanggungan_produksi_jahit_group`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit_group`;
CREATE TABLE IF NOT EXISTS `view_laporan_daftar_tanggungan_produksi_jahit_group` (
`id` bigint unsigned
,`id_proses_produksi` bigint unsigned
,`jumlah` double
,`nama_model` varchar(255)
,`nama_model_detail` varchar(100)
,`nama_pelanggan` varchar(255)
,`penjahit_id` bigint
,`realisasi_tanggal_selesai` date
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_daftar_tanggungan_produksi_jahit_group2`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit_group2`;
CREATE TABLE IF NOT EXISTS `view_laporan_daftar_tanggungan_produksi_jahit_group2` (
`id` bigint unsigned
,`id_proses_produksi` bigint unsigned
,`jumlah` double
,`nama_model` varchar(255)
,`nama_model_detail` varchar(100)
,`nama_pelanggan` varchar(255)
,`penjahit_id` bigint
,`realisasi_tanggal_selesai` date
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pemesanan_belum_finish`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_pemesanan_belum_finish`;
CREATE TABLE IF NOT EXISTS `view_pemesanan_belum_finish` (
`id` bigint unsigned
,`nama_model` varchar(255)
,`nama_pelanggan` varchar(255)
,`penjahit_id` bigint
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tanggungan_pesanan`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_tanggungan_pesanan`;
CREATE TABLE IF NOT EXISTS `view_tanggungan_pesanan` (
`id` bigint unsigned
,`nama_model` varchar(255)
,`nama_pelanggan` varchar(255)
,`penjahit_id` bigint
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_pemesanan_model`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_transaksi_pemesanan_model`;
CREATE TABLE IF NOT EXISTS `view_transaksi_pemesanan_model` (
`id_detail_pemesanan_model` bigint unsigned
,`jenis_model` varchar(255)
,`jumlah` double
,`model_id` bigint
,`nama_model` varchar(255)
,`nama_pelanggan` varchar(255)
,`nama_penjahit` varchar(255)
,`pelanggan_id` bigint
,`penjahit_id` bigint
,`satuan` varchar(3)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ukuran`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_ukuran`;
CREATE TABLE IF NOT EXISTS `view_ukuran` (
`deskripsi_ukuran` text
,`id_pemesanan` bigint unsigned
,`id_pemesanan_model` bigint unsigned
,`id_ukuran` bigint unsigned
,`nama_model` varchar(255)
,`nama_pelanggan` varchar(255)
,`tanggal` date
,`ukuran_baju` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_daftar_tanggungan_produksi_jahit`
--
DROP TABLE IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit`;

DROP VIEW IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_daftar_tanggungan_produksi_jahit`  AS SELECT `pemesanan`.`id` AS `id`, `pemesanan`.`penjahit_id` AS `penjahit_id`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `model`.`nama_model` AS `nama_model`, `pemesanan`.`tanggal` AS `tanggal_selesai`, `detail_pemesanan_model`.`nama_model_detail` AS `nama_model_detail`, `detail_pemesanan_model`.`banyaknya` AS `jumlah`, `proses_produksi`.`id` AS `id_proses_produksi`, `proses_produksi`.`nama_prosesproduksi` AS `nama_prosesproduksi`, `realisasi_produksi`.`tanggal_selesai` AS `realisasi_tanggal_selesai` FROM ((((((`pemesanan` join `pelanggan` on((`pemesanan`.`pelanggan_id` = `pelanggan`.`id`))) join `detail_pemesanan_model` on((`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`))) join `model` on((`detail_pemesanan_model`.`model_id` = `model`.`id`))) join `perencanaan_produksi` on((`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`detail_pemesanan_model_id`))) join `realisasi_produksi` on((`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`))) join `proses_produksi` on((`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`))) WHERE (`proses_produksi`.`nama_prosesproduksi` <> 'Finishing') ORDER BY `realisasi_produksi`.`tanggal_selesai` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_daftar_tanggungan_produksi_jahit_group`
--
DROP TABLE IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit_group`;

DROP VIEW IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit_group`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_daftar_tanggungan_produksi_jahit_group`  AS SELECT `view_laporan_daftar_tanggungan_produksi_jahit`.`id` AS `id`, `view_laporan_daftar_tanggungan_produksi_jahit`.`penjahit_id` AS `penjahit_id`, `view_laporan_daftar_tanggungan_produksi_jahit`.`nama_pelanggan` AS `nama_pelanggan`, `view_laporan_daftar_tanggungan_produksi_jahit`.`nama_model` AS `nama_model`, `view_laporan_daftar_tanggungan_produksi_jahit`.`tanggal_selesai` AS `tanggal_selesai`, `view_laporan_daftar_tanggungan_produksi_jahit`.`nama_model_detail` AS `nama_model_detail`, `view_laporan_daftar_tanggungan_produksi_jahit`.`jumlah` AS `jumlah`, max(`view_laporan_daftar_tanggungan_produksi_jahit`.`id_proses_produksi`) AS `id_proses_produksi`, `view_laporan_daftar_tanggungan_produksi_jahit`.`realisasi_tanggal_selesai` AS `realisasi_tanggal_selesai` FROM `view_laporan_daftar_tanggungan_produksi_jahit` GROUP BY `view_laporan_daftar_tanggungan_produksi_jahit`.`id``id`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_daftar_tanggungan_produksi_jahit_group2`
--
DROP TABLE IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit_group2`;

DROP VIEW IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit_group2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_daftar_tanggungan_produksi_jahit_group2`  AS SELECT `view_laporan_daftar_tanggungan_produksi_jahit`.`id` AS `id`, `view_laporan_daftar_tanggungan_produksi_jahit`.`penjahit_id` AS `penjahit_id`, `view_laporan_daftar_tanggungan_produksi_jahit`.`nama_pelanggan` AS `nama_pelanggan`, `view_laporan_daftar_tanggungan_produksi_jahit`.`nama_model` AS `nama_model`, `view_laporan_daftar_tanggungan_produksi_jahit`.`tanggal_selesai` AS `tanggal_selesai`, `view_laporan_daftar_tanggungan_produksi_jahit`.`nama_model_detail` AS `nama_model_detail`, `view_laporan_daftar_tanggungan_produksi_jahit`.`jumlah` AS `jumlah`, max(`view_laporan_daftar_tanggungan_produksi_jahit`.`id_proses_produksi`) AS `id_proses_produksi`, max(`view_laporan_daftar_tanggungan_produksi_jahit`.`realisasi_tanggal_selesai`) AS `realisasi_tanggal_selesai` FROM `view_laporan_daftar_tanggungan_produksi_jahit` GROUP BY `view_laporan_daftar_tanggungan_produksi_jahit`.`id``id`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_pemesanan_belum_finish`
--
DROP TABLE IF EXISTS `view_pemesanan_belum_finish`;

DROP VIEW IF EXISTS `view_pemesanan_belum_finish`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pemesanan_belum_finish`  AS SELECT `pemesanan`.`id` AS `id`, `pemesanan`.`penjahit_id` AS `penjahit_id`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `model`.`nama_model` AS `nama_model`, `realisasi_produksi`.`tanggal_selesai` AS `tanggal_selesai` FROM ((((((`pemesanan` join `pelanggan` on((`pemesanan`.`pelanggan_id` = `pelanggan`.`id`))) join `detail_pemesanan_model` on((`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`))) join `model` on((`detail_pemesanan_model`.`model_id` = `model`.`id`))) join `perencanaan_produksi` on((`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`))) join `realisasi_produksi` on((`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`))) join `proses_produksi` on((`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`))) WHERE (`proses_produksi`.`id` < 8) union all select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`model`.`nama_model` AS `nama_model`,`pemesanan`.`tanggal` AS `tanggal_selesai` from (((`pemesanan` join `pelanggan` on((`pemesanan`.`pelanggan_id` = `pelanggan`.`id`))) join `detail_pemesanan_model` on((`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`))) join `model` on((`detail_pemesanan_model`.`model_id` = `model`.`id`))) where (`pemesanan`.`pengambilan_id` is null)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_tanggungan_pesanan`
--
DROP TABLE IF EXISTS `view_tanggungan_pesanan`;

DROP VIEW IF EXISTS `view_tanggungan_pesanan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tanggungan_pesanan`  AS SELECT `pemesanan`.`id` AS `id`, `pemesanan`.`penjahit_id` AS `penjahit_id`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `model`.`nama_model` AS `nama_model`, `realisasi_produksi`.`tanggal_selesai` AS `tanggal_selesai` FROM ((((((`pemesanan` join `pelanggan` on((`pemesanan`.`pelanggan_id` = `pelanggan`.`id`))) join `detail_pemesanan_model` on((`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`))) join `model` on((`detail_pemesanan_model`.`model_id` = `model`.`id`))) join `perencanaan_produksi` on((`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`))) join `realisasi_produksi` on((`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`))) join `proses_produksi` on((`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`))) WHERE (`proses_produksi`.`id` < 8) union all select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`model`.`nama_model` AS `nama_model`,`pemesanan`.`tanggal` AS `tanggal_selesai` from (((`pemesanan` join `pelanggan` on((`pemesanan`.`pelanggan_id` = `pelanggan`.`id`))) join `detail_pemesanan_model` on((`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`))) join `model` on((`detail_pemesanan_model`.`model_id` = `model`.`id`))) where (`pemesanan`.`pengambilan_id` is null)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_pemesanan_model`
--
DROP TABLE IF EXISTS `view_transaksi_pemesanan_model`;

DROP VIEW IF EXISTS `view_transaksi_pemesanan_model`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_pemesanan_model`  AS SELECT `detail_pemesanan_model`.`id` AS `id_detail_pemesanan_model`, `pemesanan`.`tanggal` AS `tanggal`, `pemesanan`.`pelanggan_id` AS `pelanggan_id`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `pemesanan`.`penjahit_id` AS `penjahit_id`, `penjahit`.`nama_penjahit` AS `nama_penjahit`, `detail_pemesanan_model`.`model_id` AS `model_id`, `model`.`nama_model` AS `nama_model`, `jenis_model`.`nama_jenismodel` AS `jenis_model`, `detail_pemesanan_model`.`banyaknya` AS `jumlah`, 'PCS' AS `satuan` FROM (((((`pemesanan` join `pelanggan` on((`pemesanan`.`pelanggan_id` = `pelanggan`.`id`))) join `detail_pemesanan_model` on((`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`))) join `penjahit` on((`pemesanan`.`penjahit_id` = `penjahit`.`id`))) join `model` on((`detail_pemesanan_model`.`model_id` = `model`.`id`))) join `jenis_model` on((`model`.`jenis_model` = `jenis_model`.`id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_ukuran`
--
DROP TABLE IF EXISTS `view_ukuran`;

DROP VIEW IF EXISTS `view_ukuran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ukuran`  AS SELECT `p`.`id` AS `id_pemesanan`, `pm`.`id` AS `id_pemesanan_model`, `uk`.`id` AS `id_ukuran`, `plg`.`nama_pelanggan` AS `nama_pelanggan`, `p`.`tanggal` AS `tanggal`, `m`.`nama_model` AS `nama_model`, `uk`.`ukuran_baju` AS `ukuran_baju`, `uk`.`deskripsi_ukuran` AS `deskripsi_ukuran` FROM ((((`pemesanan` `p` join `detail_pemesanan_model` `pm` on((`p`.`id` = `pm`.`pemesanan_id`))) join `detail_pemesanan_model_ukuran` `uk` on((`pm`.`id` = `uk`.`detail_pemesanan_model_id`))) join `pelanggan` `plg` on((`p`.`pelanggan_id` = `plg`.`id`))) join `model` `m` on((`pm`.`model_id` = `m`.`id`)))  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
