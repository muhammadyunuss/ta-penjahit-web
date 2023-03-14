-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.2
-- Generation Time: Mar 14, 2023 at 11:41 AM
-- Server version: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- PHP Version: 8.0.24

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

CREATE TABLE `bahan_baku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_bahan_baku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok` double DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `kolom_rak_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `kode_bahan_baku`, `nama_bahanbaku`, `harga_beli`, `harga_jual`, `stok`, `satuan`, `supplier_id`, `kolom_rak_id`, `created_at`, `updated_at`) VALUES
(6, 'BL-123-12', 'kain balenciaga', 92000, NULL, 90, 'meter', 2, 4, '2023-03-02 01:24:17', '2023-03-08 19:07:22'),
(9, 'AG-123-12', 'kain alberto', 85000, NULL, 20, 'meter', 4, 6, '2023-03-02 20:57:07', '2023-03-14 11:38:48'),
(11, 'RC-123-12', 'kain richmond', 80000, NULL, 85, 'meter', 3, 7, '2023-03-02 20:58:23', '2023-03-08 19:08:36'),
(13, 'DI-123-12', 'kain dior', 100000, NULL, 90, 'meter', 2, 8, '2023-03-02 20:58:47', '2023-03-02 21:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_bahanbaku`
--

CREATE TABLE `detail_pembelian_bahanbaku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bahan_baku_id` bigint(20) DEFAULT NULL,
  `pembelian_bahanbaku_id` bigint(20) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pembelian_bahanbaku`
--

INSERT INTO `detail_pembelian_bahanbaku` (`id`, `bahan_baku_id`, `pembelian_bahanbaku_id`, `jumlah`, `harga_beli`, `subtotal`, `created_at`, `updated_at`) VALUES
(13, 6, 8, 45, 90000, 4050000, '2023-03-02 01:28:55', '2023-03-02 01:28:55'),
(14, 13, 9, 90, 100000, 9000000, '2023-03-02 21:00:51', '2023-03-02 21:00:51'),
(15, 11, 10, 45, 85000, 3825000, '2023-03-02 21:01:38', '2023-03-02 21:01:38'),
(16, 11, 11, 40, 80000, 3200000, '2023-03-02 21:07:41', '2023-03-08 19:08:36'),
(17, 6, 14, 45, 92000, 4140000, '2023-03-02 22:49:45', '2023-03-02 22:49:45'),
(18, 6, 16, 2, 92000, 184000, '2023-03-06 18:44:34', '2023-03-06 18:44:34'),
(19, 6, 16, 8, 92000, 736000, '2023-03-06 19:26:51', '2023-03-06 19:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan_bahanbaku`
--

CREATE TABLE `detail_pemesanan_bahanbaku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` int(11) DEFAULT NULL,
  `bahan_baku_id` bigint(20) DEFAULT NULL,
  `detail_pemesanan_model_id` bigint(20) DEFAULT NULL,
  `ongkos_jahit` double DEFAULT NULL,
  `jumlah_terpakai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemesanan_bahanbaku`
--

INSERT INTO `detail_pemesanan_bahanbaku` (`id`, `pemesanan_id`, `bahan_baku_id`, `detail_pemesanan_model_id`, `ongkos_jahit`, `jumlah_terpakai`, `created_at`, `updated_at`) VALUES
(7, 16, 6, NULL, NULL, NULL, '2023-03-02 01:37:29', '2023-03-02 01:37:29'),
(9, 19, 6, NULL, NULL, NULL, '2023-03-02 18:26:17', '2023-03-02 18:26:17'),
(10, 20, 6, NULL, NULL, NULL, '2023-03-03 00:10:16', '2023-03-03 00:10:16'),
(11, 21, 13, NULL, NULL, NULL, '2023-03-03 00:11:09', '2023-03-03 00:11:09'),
(12, 22, 11, NULL, NULL, NULL, '2023-03-03 00:12:46', '2023-03-03 00:12:46'),
(13, 23, 13, NULL, NULL, NULL, '2023-03-03 00:17:49', '2023-03-03 00:17:49'),
(14, 24, 6, NULL, NULL, NULL, '2023-03-03 00:37:58', '2023-03-03 00:37:58'),
(15, 25, 9, NULL, NULL, NULL, '2023-03-03 09:09:33', '2023-03-03 09:09:33'),
(16, 25, 6, 22, NULL, 10, '2023-03-03 09:44:35', '2023-03-03 09:47:06'),
(18, 26, 6, 24, NULL, NULL, '2023-03-03 09:56:37', '2023-03-03 09:56:37'),
(19, 26, 13, 23, NULL, NULL, '2023-03-03 09:56:45', '2023-03-03 09:56:45'),
(20, 24, 9, 21, NULL, 15, '2023-03-03 09:44:35', '2023-03-14 11:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan_model`
--

CREATE TABLE `detail_pemesanan_model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) DEFAULT NULL,
  `pemesanan_id` bigint(20) DEFAULT NULL,
  `jenis_model_id` bigint(20) DEFAULT 1,
  `banyaknya` double DEFAULT NULL,
  `ongkos_jahit` double DEFAULT NULL,
  `nama_model_detail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_gambar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_pemesanan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemesanan_model`
--

INSERT INTO `detail_pemesanan_model` (`id`, `model_id`, `pemesanan_id`, `jenis_model_id`, `banyaknya`, `ongkos_jahit`, `nama_model_detail`, `file_gambar`, `deskripsi_pemesanan`, `created_at`, `updated_at`) VALUES
(17, 9, 20, 1, 3, 1000000, '-', NULL, NULL, '2023-03-03 00:00:51', '2023-03-03 00:00:51'),
(18, 11, 21, 1, 5, 1000000, '-', NULL, NULL, '2023-03-03 00:11:01', '2023-03-03 00:11:01'),
(19, 12, 22, 1, 3, 1200000, '-', NULL, NULL, '2023-03-03 00:12:32', '2023-03-03 00:12:32'),
(20, 9, 23, 1, 10, 1000000, '-', NULL, NULL, '2023-03-03 00:17:35', '2023-03-03 00:17:35'),
(21, 11, 24, 1, 5, 1000000, '-', NULL, NULL, '2023-03-03 00:32:59', '2023-03-03 00:32:59'),
(22, 9, 25, 1, 2, 1000000, '-', NULL, NULL, '2023-03-03 09:09:01', '2023-03-03 09:09:01'),
(23, 9, 26, 1, 2, 1000000, '-', NULL, NULL, '2023-03-03 09:56:07', '2023-03-03 09:56:07'),
(24, 11, 26, 1, 1, 1000000, '-', NULL, NULL, '2023-03-03 09:56:17', '2023-03-03 09:56:17'),
(25, 13, 28, 1, 1, 1000000, 'pegawai bca darmo', '20230303171828.png', NULL, '2023-03-03 10:18:28', '2023-03-03 10:18:28'),
(26, 9, 29, 1, 2, 1000000, 'MODEL JAS MODERN', NULL, '-', '2023-03-08 18:46:54', '2023-03-08 18:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan_model_ukuran`
--

CREATE TABLE `detail_pemesanan_model_ukuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail_pemesanan_model_id` bigint(20) DEFAULT NULL,
  `tinggi_badan` double DEFAULT NULL,
  `berat_badan` double DEFAULT NULL,
  `ukuran_baju` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_baju_dengan_ukuran_yg_sama` int(11) NOT NULL,
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
  `deskripsi_ukuran` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemesanan_model_ukuran`
--

INSERT INTO `detail_pemesanan_model_ukuran` (`id`, `detail_pemesanan_model_id`, `tinggi_badan`, `berat_badan`, `ukuran_baju`, `jumlah_baju_dengan_ukuran_yg_sama`, `panjang_atasan`, `lingkar_dada`, `lingkar_perut_atasan`, `lingkar_pinggul_atasan`, `lebar_bahu`, `panjang_tangan`, `lingkar_siku`, `lingkar_pergelangan`, `kerah`, `ukuran_celana`, `panjang_celana`, `lingkar_perut_celana`, `pesak`, `lingkar_pinggul_celana`, `lingkar_paha`, `lingkar_lutut`, `lingkar_bawah`, `deskripsi_ukuran`, `created_at`, `updated_at`) VALUES
(13, 15, NULL, NULL, 'S', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 01:39:06', '2023-03-02 01:39:06'),
(14, 15, NULL, NULL, 'XL', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 01:39:34', '2023-03-02 01:39:34'),
(15, 17, NULL, NULL, 'L', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 00:09:13', '2023-03-03 00:09:13'),
(16, 18, NULL, NULL, 'M', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 00:11:30', '2023-03-03 00:11:30'),
(17, 18, NULL, NULL, 'L', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 00:11:40', '2023-03-03 00:11:40'),
(18, 19, NULL, NULL, 'L', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 00:13:06', '2023-03-03 00:13:06'),
(19, 20, NULL, NULL, 'M', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 00:18:04', '2023-03-03 00:18:04'),
(20, 20, NULL, NULL, 'L', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 00:18:23', '2023-03-03 00:18:23'),
(21, 21, NULL, NULL, 'M', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 00:42:32', '2023-03-03 00:42:32'),
(22, 21, NULL, NULL, 'L', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 00:42:42', '2023-03-03 00:42:42'),
(23, 25, NULL, NULL, 'S', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 10:18:38', '2023-03-03 10:18:38'),
(24, 26, NULL, NULL, 'M', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 18:59:50', '2023-03-08 18:59:50');

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
-- Table structure for table `jasa_ekspedisi`
--

CREATE TABLE `jasa_ekspedisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jasa_ekspedisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_model`
--

CREATE TABLE `jenis_model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenismodel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_model`
--

INSERT INTO `jenis_model` (`id`, `nama_jenismodel`, `created_at`, `updated_at`) VALUES
(1, 'Unisex', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kolom_rak`
--

CREATE TABLE `kolom_rak` (
  `id` bigint(20) NOT NULL,
  `nama_rak` varchar(255) NOT NULL,
  `nama_kolom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kolom_rak`
--

INSERT INTO `kolom_rak` (`id`, `nama_rak`, `nama_kolom`, `created_at`, `updated_at`) VALUES
(4, 'Rak 1', 'Col no 1', '2023-03-02 01:23:19', '2023-03-02 01:23:19'),
(5, 'Rak 1', 'Col no 2', '2023-03-02 01:23:25', '2023-03-02 01:23:25'),
(6, 'Rak 2', 'Col no 1', '2023-03-02 20:52:54', '2023-03-02 20:52:54'),
(8, 'Rak 1', 'Col no 3', '2023-03-02 20:53:08', '2023-03-02 20:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `letak_bahan_baku`
--

CREATE TABLE `letak_bahan_baku` (
  `nama_letak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_model` bigint(20) DEFAULT NULL,
  `pelanggan_id` bigint(20) DEFAULT NULL,
  `foto_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ongkos_jahit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `jenis_model`, `pelanggan_id`, `foto_model`, `nama_model`, `ongkos_jahit`, `deskripsi_model`, `created_at`, `updated_at`) VALUES
(9, 1, NULL, '20230302083217.png', 'JAS PENGANTIN PRIA HITAM', '1000000', '-', '2023-03-02 01:32:17', '2023-03-02 01:32:17'),
(11, 1, NULL, '20230303064833.png', 'JAS PENGANTIN PRIA PUTIH', '1000000', NULL, '2023-03-02 23:48:33', '2023-03-02 23:48:33'),
(12, 1, NULL, '20230303065405.png', 'Jas dan Celana Formal Hitam', '1200000', NULL, '2023-03-02 23:54:05', '2023-03-02 23:54:05'),
(13, 1, NULL, NULL, 'model pelanggan', NULL, NULL, '2023-03-02 23:55:41', '2023-03-02 23:55:41');

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
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `email`, `no_telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(6, 'Rafli', 'rafly@gmail.com', '081234567777', 'sidoarjo', '2023-03-02 01:34:25', '2023-03-02 01:34:25'),
(7, 'dani', 'dani@gmail.com', '08123456777', 'surabaya', '2023-03-02 23:59:18', '2023-03-02 23:59:32'),
(8, 'aldo', 'aldo@gmail.com', '081234567777', 'wiyung', '2023-03-02 23:59:46', '2023-03-02 23:59:46'),
(9, 'andi', 'andi@gmail.com', '08123456777', 'jl jojoran', '2023-03-03 00:00:02', '2023-03-03 00:00:02'),
(10, 'azhar', 'andi@gmail.com', '081234567778', 'Jl Kembang Jepun no 2', '2023-03-03 09:08:39', '2023-03-03 09:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_bahanbaku`
--

CREATE TABLE `pembelian_bahanbaku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `penjahit_id` bigint(20) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_bahanbaku`
--

INSERT INTO `pembelian_bahanbaku` (`id`, `supplier_id`, `penjahit_id`, `tanggal_beli`, `bayar`, `total`, `created_at`, `updated_at`) VALUES
(8, 2, 1, '2023-03-02', 4050000, 4050000, '2023-03-02 01:28:43', '2023-03-02 01:29:04'),
(9, 2, 1, '2023-03-01', 9000000, 9000000, '2023-03-02 21:00:35', '2023-03-02 21:01:02'),
(10, 3, 1, '2023-02-28', 3825000, 3825000, '2023-03-02 21:01:27', '2023-03-02 21:02:03'),
(11, 3, 1, '2023-02-24', 3600000, 3600000, '2023-03-02 21:07:28', '2023-03-02 21:13:03'),
(14, 2, 1, '2023-03-03', 4140000, 4140000, '2023-03-02 21:22:13', '2023-03-02 22:50:02'),
(15, 3, 1, '2023-03-07', NULL, NULL, '2023-03-06 18:10:31', '2023-03-06 18:10:31'),
(16, 2, 2, '2023-03-06', NULL, NULL, '2023-03-06 18:30:20', '2023-03-06 18:30:20'),
(17, 2, 1, '2023-03-09', NULL, NULL, '2023-03-08 18:38:51', '2023-03-08 18:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) DEFAULT NULL,
  `penjahit_id` bigint(20) DEFAULT NULL,
  `proses_produksi_id` bigint(20) DEFAULT NULL,
  `pengambilan_id` bigint(20) DEFAULT NULL,
  `perencanaan_produksi_id` bigint(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_ongkos` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Lunas, Bayar Sebagian',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `pelanggan_id`, `penjahit_id`, `proses_produksi_id`, `pengambilan_id`, `perencanaan_produksi_id`, `tanggal`, `total_ongkos`, `bayar`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(20, 6, 1, NULL, NULL, NULL, '2023-02-24', 3000000, 1500000, 'Bayar Sebagian', '2023-03-03 00:00:35', '2023-03-03 00:10:10'),
(21, 7, 1, NULL, NULL, NULL, '2023-03-10', 5000000, 2500000, 'Bayar Sebagian', '2023-03-03 00:10:47', '2023-03-03 00:11:21'),
(22, 8, 1, NULL, NULL, NULL, '2023-03-17', 3600000, 1800000, 'Bayar Sebagian', '2023-03-03 00:12:21', '2023-03-03 00:12:53'),
(23, 9, 1, NULL, NULL, NULL, '2023-03-24', 10000000, 5000000, 'Bayar Sebagian', '2023-03-03 00:17:15', '2023-03-03 00:18:46'),
(24, 6, 1, NULL, NULL, NULL, '2023-03-31', 5000000, 5000000, 'Lunas', '2023-03-03 00:24:00', '2023-03-03 00:39:15'),
(25, 10, 1, NULL, NULL, NULL, '2023-03-24', NULL, NULL, NULL, '2023-03-03 09:08:52', '2023-03-03 09:08:52'),
(26, 6, 1, NULL, NULL, NULL, '2023-03-10', NULL, NULL, NULL, '2023-03-03 09:55:57', '2023-03-03 09:55:57'),
(27, 7, 1, NULL, NULL, NULL, '2023-03-22', NULL, NULL, NULL, '2023-03-03 10:05:48', '2023-03-03 10:05:48'),
(28, 10, 1, NULL, NULL, NULL, '2023-03-25', NULL, NULL, NULL, '2023-03-03 10:17:56', '2023-03-03 10:17:56'),
(29, 10, 1, NULL, NULL, NULL, '2023-03-30', NULL, NULL, NULL, '2023-03-08 18:36:12', '2023-03-08 18:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) NOT NULL,
  `jasa_ekspedisi_id` bigint(20) DEFAULT NULL,
  `opsi_pengambilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `alamat_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_pengiriman` double DEFAULT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengambilan`
--

INSERT INTO `pengambilan` (`id`, `pemesanan_id`, `jasa_ekspedisi_id`, `opsi_pengambilan`, `tanggal`, `alamat_pengiriman`, `biaya_pengiriman`, `no_resi`, `created_at`, `updated_at`) VALUES
(6, 24, NULL, 'Ambil', '2023-03-31', NULL, NULL, NULL, '2023-03-05 18:52:21', '2023-03-05 18:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `penjahit`
--

CREATE TABLE `penjahit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_penjahit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `perencanaan_produksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proses_produksi_id` bigint(20) DEFAULT NULL,
  `detail_pemesanan_model_id` bigint(20) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `gambar_pola` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepala_penjahit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perencanaan_produksi`
--

INSERT INTO `perencanaan_produksi` (`id`, `proses_produksi_id`, `detail_pemesanan_model_id`, `tanggal_mulai`, `tanggal_selesai`, `gambar_pola`, `kepala_penjahit`, `created_at`, `updated_at`, `user_id`) VALUES
(12, 8, 21, '2023-03-28', '2023-03-30', NULL, 'kepala', '2023-03-03 01:01:39', '2023-03-03 01:01:39', NULL),
(13, 2, 21, '2023-03-06', '2023-03-27', NULL, 'kepala', '2023-03-03 01:02:29', '2023-03-03 01:02:29', NULL),
(14, 1, 21, '2023-03-03', '2023-03-03', NULL, 'kepala', '2023-03-03 01:14:45', '2023-03-03 01:14:45', NULL),
(15, 2, 17, '2023-03-03', '2023-03-03', NULL, 'kepala', '2023-03-03 07:15:42', '2023-03-03 07:15:59', NULL),
(16, 1, 19, '2023-03-03', '2023-03-03', NULL, NULL, '2023-03-03 08:10:47', '2023-03-03 08:10:47', 3);

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
-- Table structure for table `proses_produksi`
--

CREATE TABLE `proses_produksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_prosesproduksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proses_produksi`
--

INSERT INTO `proses_produksi` (`id`, `nama_prosesproduksi`, `created_at`, `updated_at`) VALUES
(1, 'Pemotongan Kain', '2023-03-02 01:40:25', '2023-03-02 01:40:25'),
(2, 'Jahit Pakaian Atasan', '2023-03-02 01:40:32', '2023-03-02 01:40:32'),
(3, 'Jahit Celana', '2023-03-02 01:40:57', '2023-03-02 01:40:57'),
(8, 'Finishing', '2023-03-02 01:41:03', '2023-03-02 01:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_penjahit`
--

CREATE TABLE `realisasi_penjahit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `realisasi_produksi_id` bigint(20) DEFAULT NULL,
  `penjahit_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_produksi`
--

CREATE TABLE `realisasi_produksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) DEFAULT NULL,
  `perencanaan_produksi_id` bigint(20) DEFAULT NULL,
  `proses_produksi_id` bigint(20) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `realisasi_produksi`
--

INSERT INTO `realisasi_produksi` (`id`, `pemesanan_id`, `perencanaan_produksi_id`, `proses_produksi_id`, `tanggal_mulai`, `tanggal_selesai`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(6, 16, 1, 1, '2023-03-03', '2023-03-04', '20230303013607.png', NULL, '2023-03-02 18:36:07', '2023-03-02 18:36:21'),
(7, 16, 9, 1, '2023-03-03', '2023-03-03', '20230303013803.png', NULL, '2023-03-02 18:38:03', '2023-03-02 18:38:03'),
(8, 24, 14, 1, '2023-03-03', '2023-03-03', NULL, NULL, '2023-03-03 01:17:47', '2023-03-03 01:17:47'),
(9, 24, 13, 2, '2023-03-06', '2023-03-27', NULL, NULL, '2023-03-03 01:18:33', '2023-03-03 01:18:33'),
(10, 24, 12, 8, '2023-03-28', '2023-03-31', NULL, NULL, '2023-03-03 01:18:48', '2023-03-03 01:18:48'),
(11, 24, 14, 1, NULL, NULL, NULL, NULL, '2023-03-03 08:03:19', '2023-03-03 08:03:19'),
(12, 20, 15, 2, '2023-03-03', '2023-03-03', NULL, NULL, '2023-03-03 08:05:22', '2023-03-03 08:05:22'),
(13, 22, 1, 1, '2023-03-03', '2023-03-04', NULL, NULL, '2023-03-03 08:13:43', '2023-03-03 08:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `retur_pemesanan`
--

CREATE TABLE `retur_pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `email`, `nomor_telepon`, `created_at`, `updated_at`) VALUES
(2, 'Toko Alpha', 'Jl Kembang Jepun', 'tokoalpha@gmail.com', '0812345678', '2023-03-02 01:23:59', '2023-03-02 01:23:59'),
(3, 'Toko Beta', 'Jl Kembang Jepun', 'tokobeta@gmail.com', '0312345678', '2023-03-02 20:51:10', '2023-03-02 20:51:10'),
(4, 'toko carli', 'Jl Kembang Jepun no 2', 'tokocarli@gmail.com', '0851234567', '2023-03-02 20:51:27', '2023-03-02 20:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previledge` enum('Penjahit','Pemilik','Kepala','Admin','Finishing') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penjahit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `previledge`, `id_penjahit`, `created_at`, `updated_at`) VALUES
(1, 'maul', 'maul@gmail.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Admin', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(2, 'pemilik', 'pemilik@pemilik.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Pemilik', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(3, 'lana', 'kepala@kepala.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Kepala', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(4, 'Penjahit', 'penjahit@penjahit.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Penjahit', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(5, 'Finishing', 'finishing@finishing.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Finishing', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(6, 'Velma Hatfield', 'nocekyqizu@mailinator.com', NULL, '$2y$10$vJZsR2S/szpx5HUWryMq2uiLSeQi0PWd9UQqni42B33cDaieVgD8q', NULL, 'Admin', 1, '2023-02-24 07:53:07', '2023-02-24 07:53:07'),
(9, 'Andi', 'andi@gmail.com', NULL, '$2y$10$0UbTjOsTOw9.YCYvVXVLlOu0JPh1VO.d4afSMlHU/dqy/E7Jsn2Hi', NULL, 'Admin', 2, '2023-03-06 18:27:58', '2023-03-06 18:27:58');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_daftar_tanggungan_produksi_jahit`
-- (See below for the actual view)
--
CREATE TABLE `view_laporan_daftar_tanggungan_produksi_jahit` (
`id` bigint(20) unsigned
,`penjahit_id` bigint(20)
,`nama_pelanggan` varchar(255)
,`tanggal_selesai` date
,`nama_model` varchar(255)
,`nama_model_detail` varchar(100)
,`jumlah` double
,`nama_prosesproduksi` varchar(255)
,`realisasi_tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pemesanan_belum_finish`
-- (See below for the actual view)
--
CREATE TABLE `view_pemesanan_belum_finish` (
`id` bigint(20) unsigned
,`penjahit_id` bigint(20)
,`nama_pelanggan` varchar(255)
,`nama_model` varchar(255)
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tanggungan_pesanan`
-- (See below for the actual view)
--
CREATE TABLE `view_tanggungan_pesanan` (
`id` bigint(20) unsigned
,`penjahit_id` bigint(20)
,`nama_pelanggan` varchar(255)
,`nama_model` varchar(255)
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_pemesanan_model`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi_pemesanan_model` (
`id_detail_pemesanan_model` bigint(20) unsigned
,`tanggal` date
,`pelanggan_id` bigint(20)
,`nama_pelanggan` varchar(255)
,`penjahit_id` bigint(20)
,`nama_penjahit` varchar(255)
,`model_id` bigint(20)
,`nama_model` varchar(255)
,`jenis_model` varchar(255)
,`jumlah` double
,`satuan` varchar(3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ukuran`
-- (See below for the actual view)
--
CREATE TABLE `view_ukuran` (
`id_pemesanan` bigint(20) unsigned
,`id_pemesanan_model` bigint(20) unsigned
,`id_ukuran` bigint(20) unsigned
,`nama_pelanggan` varchar(255)
,`tanggal` date
,`nama_model` varchar(255)
,`ukuran_baju` varchar(255)
,`deskripsi_ukuran` text
);

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_daftar_tanggungan_produksi_jahit`
--
DROP TABLE IF EXISTS `view_laporan_daftar_tanggungan_produksi_jahit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_daftar_tanggungan_produksi_jahit`  AS   (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`pemesanan`.`tanggal` AS `tanggal_selesai`,`model`.`nama_model` AS `nama_model`,`detail_pemesanan_model`.`nama_model_detail` AS `nama_model_detail`,`detail_pemesanan_model`.`banyaknya` AS `jumlah`,`proses_produksi`.`nama_prosesproduksi` AS `nama_prosesproduksi`,`realisasi_produksi`.`tanggal_selesai` AS `realisasi_tanggal_selesai` from ((((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `perencanaan_produksi` on(`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`)) join `realisasi_produksi` on(`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`)) join `proses_produksi` on(`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`)) where `proses_produksi`.`id` < 8) union all (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`pemesanan`.`tanggal` AS `tanggal_selesai`,`model`.`nama_model` AS `nama_model`,`detail_pemesanan_model`.`nama_model_detail` AS `nama_model_detail`,`detail_pemesanan_model`.`banyaknya` AS `jumlah`,`proses_produksi`.`nama_prosesproduksi` AS `nama_prosesproduksi`,`realisasi_produksi`.`tanggal_selesai` AS `tanggal_selesai` from ((((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `perencanaan_produksi` on(`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`)) join `realisasi_produksi` on(`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`)) join `proses_produksi` on(`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`)) where `pemesanan`.`pengambilan_id` is null)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_pemesanan_belum_finish`
--
DROP TABLE IF EXISTS `view_pemesanan_belum_finish`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pemesanan_belum_finish`  AS   (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`model`.`nama_model` AS `nama_model`,`realisasi_produksi`.`tanggal_selesai` AS `tanggal_selesai` from ((((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `perencanaan_produksi` on(`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`)) join `realisasi_produksi` on(`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`)) join `proses_produksi` on(`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`)) where `proses_produksi`.`id` < 8) union all (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`model`.`nama_model` AS `nama_model`,`pemesanan`.`tanggal` AS `tanggal_selesai` from (((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) where `pemesanan`.`pengambilan_id` is null)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_tanggungan_pesanan`
--
DROP TABLE IF EXISTS `view_tanggungan_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tanggungan_pesanan`  AS   (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`model`.`nama_model` AS `nama_model`,`realisasi_produksi`.`tanggal_selesai` AS `tanggal_selesai` from ((((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `perencanaan_produksi` on(`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`)) join `realisasi_produksi` on(`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`)) join `proses_produksi` on(`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`)) where `proses_produksi`.`id` < 8) union all (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`model`.`nama_model` AS `nama_model`,`pemesanan`.`tanggal` AS `tanggal_selesai` from (((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) where `pemesanan`.`pengambilan_id` is null)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_pemesanan_model`
--
DROP TABLE IF EXISTS `view_transaksi_pemesanan_model`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_pemesanan_model`  AS SELECT `detail_pemesanan_model`.`id` AS `id_detail_pemesanan_model`, `pemesanan`.`tanggal` AS `tanggal`, `pemesanan`.`pelanggan_id` AS `pelanggan_id`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `pemesanan`.`penjahit_id` AS `penjahit_id`, `penjahit`.`nama_penjahit` AS `nama_penjahit`, `detail_pemesanan_model`.`model_id` AS `model_id`, `model`.`nama_model` AS `nama_model`, `jenis_model`.`nama_jenismodel` AS `jenis_model`, `detail_pemesanan_model`.`banyaknya` AS `jumlah`, 'PCS' AS `satuan` FROM (((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `penjahit` on(`pemesanan`.`penjahit_id` = `penjahit`.`id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `jenis_model` on(`model`.`jenis_model` = `jenis_model`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_ukuran`
--
DROP TABLE IF EXISTS `view_ukuran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ukuran`  AS SELECT `p`.`id` AS `id_pemesanan`, `pm`.`id` AS `id_pemesanan_model`, `uk`.`id` AS `id_ukuran`, `plg`.`nama_pelanggan` AS `nama_pelanggan`, `p`.`tanggal` AS `tanggal`, `m`.`nama_model` AS `nama_model`, `uk`.`ukuran_baju` AS `ukuran_baju`, `uk`.`deskripsi_ukuran` AS `deskripsi_ukuran` FROM ((((`pemesanan` `p` join `detail_pemesanan_model` `pm` on(`p`.`id` = `pm`.`pemesanan_id`)) join `detail_pemesanan_model_ukuran` `uk` on(`pm`.`id` = `uk`.`detail_pemesanan_model_id`)) join `pelanggan` `plg` on(`p`.`pelanggan_id` = `plg`.`id`)) join `model` `m` on(`pm`.`model_id` = `m`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pembelian_bahanbaku`
--
ALTER TABLE `detail_pembelian_bahanbaku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pemesanan_bahanbaku`
--
ALTER TABLE `detail_pemesanan_bahanbaku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pemesanan_model`
--
ALTER TABLE `detail_pemesanan_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pemesanan_model_ukuran`
--
ALTER TABLE `detail_pemesanan_model_ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jasa_ekspedisi`
--
ALTER TABLE `jasa_ekspedisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_model`
--
ALTER TABLE `jenis_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kolom_rak`
--
ALTER TABLE `kolom_rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letak_bahan_baku`
--
ALTER TABLE `letak_bahan_baku`
  ADD PRIMARY KEY (`nama_letak`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_bahanbaku`
--
ALTER TABLE `pembelian_bahanbaku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjahit`
--
ALTER TABLE `penjahit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perencanaan_produksi`
--
ALTER TABLE `perencanaan_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realisasi_penjahit`
--
ALTER TABLE `realisasi_penjahit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realisasi_produksi`
--
ALTER TABLE `realisasi_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_pemesanan`
--
ALTER TABLE `retur_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
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
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_pembelian_bahanbaku`
--
ALTER TABLE `detail_pembelian_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_pemesanan_bahanbaku`
--
ALTER TABLE `detail_pemesanan_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_pemesanan_model`
--
ALTER TABLE `detail_pemesanan_model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `detail_pemesanan_model_ukuran`
--
ALTER TABLE `detail_pemesanan_model_ukuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jasa_ekspedisi`
--
ALTER TABLE `jasa_ekspedisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_model`
--
ALTER TABLE `jenis_model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kolom_rak`
--
ALTER TABLE `kolom_rak`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian_bahanbaku`
--
ALTER TABLE `pembelian_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penjahit`
--
ALTER TABLE `penjahit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perencanaan_produksi`
--
ALTER TABLE `perencanaan_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `realisasi_penjahit`
--
ALTER TABLE `realisasi_penjahit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realisasi_produksi`
--
ALTER TABLE `realisasi_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `retur_pemesanan`
--
ALTER TABLE `retur_pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
