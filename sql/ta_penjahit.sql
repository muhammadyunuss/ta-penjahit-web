-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.3
-- Generation Time: Nov 20, 2022 at 04:17 AM
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
  `nama_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letak_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok` double DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `nama_bahanbaku`, `letak_bahanbaku`, `harga_beli`, `harga_jual`, `stok`, `satuan`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'Batik', 'Kanan', 12000, 15000, 110, 'Lembar', 1, '2022-10-10 12:46:40', '2022-11-16 07:50:13'),
(2, 'Kancing', '-', 0, 0, 800, 'Pcs', 1, '2022-10-15 06:02:52', '2022-10-15 06:02:52'),
(3, 'Kain Satin', '-', 500000, 650000, 5, 'Meter', 1, '2022-11-12 13:50:39', '2022-11-12 13:50:39');

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
(1, 1, 2, 10, 2500, 25000, '2022-11-12 14:04:21', '2022-11-14 08:48:52'),
(2, 2, 2, 40, 3000, 120000, '2022-11-14 07:45:27', '2022-11-14 11:18:23');

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
(3, 3, 1, 5, NULL, 10, '2022-11-16 07:49:53', '2022-11-16 07:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan_model`
--

CREATE TABLE `detail_pemesanan_model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) DEFAULT NULL,
  `pemesanan_id` bigint(20) DEFAULT NULL,
  `jenis_model_id` bigint(20) DEFAULT NULL,
  `banyaknya` double DEFAULT NULL,
  `ongkos_jahit` double DEFAULT NULL,
  `tinggi_badan` double DEFAULT NULL,
  `berat_badan` double DEFAULT NULL,
  `ukuran_baju` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panjang_jas` double DEFAULT NULL,
  `lingkar_dada` double DEFAULT NULL,
  `lingkar_pinggang` double DEFAULT NULL,
  `lingkar_pinggul` double DEFAULT NULL,
  `lebar_bahu` double DEFAULT NULL,
  `lebar_punggung` double DEFAULT NULL,
  `panjang_lengan` double DEFAULT NULL,
  `lingkar_siku` double DEFAULT NULL,
  `lingkar_ujung_lengan` double DEFAULT NULL,
  `lingkar_kerong_lengan` double DEFAULT NULL,
  `ukuran_celana` double DEFAULT NULL,
  `panjang_celana` double DEFAULT NULL,
  `lingkar_parut` double DEFAULT NULL,
  `pesak` double DEFAULT NULL,
  `lingkar_paha` double DEFAULT NULL,
  `lingkar_lutut` double DEFAULT NULL,
  `lingkar_kaki` double DEFAULT NULL,
  `panjang_kebaya` double DEFAULT NULL,
  `panjang_dress` double DEFAULT NULL,
  `panjang_muka` double DEFAULT NULL,
  `panjang_belakang` double DEFAULT NULL,
  `bawah_tangan` double DEFAULT NULL,
  `lingkar_leher` double DEFAULT NULL,
  `cup_dada` double DEFAULT NULL,
  `turun_dada` double DEFAULT NULL,
  `panjang_rok` double DEFAULT NULL,
  `panjang_bawah` double DEFAULT NULL,
  `deskripsi_pemesanan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pemesanan_model`
--

INSERT INTO `detail_pemesanan_model` (`id`, `model_id`, `pemesanan_id`, `jenis_model_id`, `banyaknya`, `ongkos_jahit`, `tinggi_badan`, `berat_badan`, `ukuran_baju`, `panjang_jas`, `lingkar_dada`, `lingkar_pinggang`, `lingkar_pinggul`, `lebar_bahu`, `lebar_punggung`, `panjang_lengan`, `lingkar_siku`, `lingkar_ujung_lengan`, `lingkar_kerong_lengan`, `ukuran_celana`, `panjang_celana`, `lingkar_parut`, `pesak`, `lingkar_paha`, `lingkar_lutut`, `lingkar_kaki`, `panjang_kebaya`, `panjang_dress`, `panjang_muka`, `panjang_belakang`, `bawah_tangan`, `lingkar_leher`, `cup_dada`, `turun_dada`, `panjang_rok`, `panjang_bawah`, `deskripsi_pemesanan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, 3, 3, 23, 'S', 23, 23, 2, 32, 43, 4, 545, 45, 213, 656, 56, 56, 56, 56, 56, 5, 4544554544, 5, 4, 45, 45, 45, 45, 45, 45, 4, 55, 'Mantap Sekali', '2022-10-10 12:39:37', '2022-10-10 12:45:05'),
(2, 1, 1, 2, 3, 54, 54, 54, 'M', 545, 45, 45, 45, 45, 4, 5, 6, 76, 7878, 76, 5, 6, 7, 87, 87, 86, 7, 43, 78, 78, 787, 67, 6, 87, 878, 79, 'Wanita', '2022-10-10 12:47:31', '2022-10-10 12:47:42'),
(3, 1, 2, 1, 12, 454545, 45454, 545, 'L', 4545, 45, 45, 45, 45, 45, 45, 45, 45, 4, 54, 54, 54, 5, 45, 45, 45, 4, 54, 54, 54, 54, 5, 45, 45, 45, 454, NULL, '2022-10-18 10:24:55', '2022-10-18 10:24:55'),
(4, 3, 3, 1, 2, 150000, 0, 0, 'XL', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-11-12 13:48:55', '2022-11-12 13:48:55'),
(5, 2, 3, 2, 1, 400000, 0, 0, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-11-12 13:54:23', '2022-11-12 13:54:23');

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
(1, 'Pria', NULL, NULL),
(2, 'Wanita', NULL, NULL);

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
(1, 1, NULL, '20221119122800.jpg', 'Model ITS', '20000', 'model kampus', '2022-10-10 12:38:16', '2022-11-19 12:28:00'),
(2, 2, 1, '20221018144540.jpg', 'Kebaya Wanita', '500000', 'Minion', '2022-10-18 11:49:58', '2022-10-18 14:45:40'),
(3, 1, 1, '20221119123925.jpg', 'Jas Pria', '150000', 'Makan Jaman', '2022-10-18 14:08:55', '2022-11-19 12:39:25'),
(4, 1, NULL, '20221018142822.jpg', 'Kakek', '120000', 'Kakek', '2022-10-18 14:28:22', '2022-10-18 14:37:38');

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
(1, 'Parto', 'parto@gmail.com', '08213123123', 'JL. CIPTA MENANGGAL BLOK 67 F', '2022-10-10 10:23:19', '2022-10-10 10:23:19'),
(2, 'Kadek', 'kadek@gmail.com', '09213002919', 'JL. Cipta Menanggal Blok 67 G', '2022-10-10 10:24:01', '2022-10-10 10:24:09'),
(3, 'Diana', 'diana@gmail.com', '0876523456', 'surabaya', '2022-11-12 13:45:53', '2022-11-12 13:45:53');

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
(1, 1, 1, '2022-10-17', NULL, NULL, '2022-10-17 12:46:07', '2022-10-17 12:46:07'),
(2, 1, 1, '2022-11-12', 145000, 145000, '2022-11-12 14:04:09', '2022-11-14 11:32:03');

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
(1, 1, 1, NULL, NULL, NULL, '2022-10-10', 15000, NULL, NULL, '2022-10-10 12:37:14', '2022-10-10 12:47:01'),
(2, 2, 1, NULL, NULL, NULL, '2022-10-18', NULL, NULL, NULL, '2022-10-18 10:24:27', '2022-10-18 10:24:27'),
(3, 3, 1, NULL, NULL, NULL, '2022-11-18', 1230000, 1230000, 'Lunas', '2022-11-12 13:46:05', '2022-11-13 08:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opsi_pengambilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `alamat_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_pengiriman` double DEFAULT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'penjahit@gmail.com', '08213123', 'Penjahit', NULL, NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perencanaan_produksi`
--

INSERT INTO `perencanaan_produksi` (`id`, `proses_produksi_id`, `detail_pemesanan_model_id`, `tanggal_mulai`, `tanggal_selesai`, `gambar_pola`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2022-10-13', '2022-10-15', NULL, '2022-10-13 11:43:42', '2022-11-12 14:07:58'),
(4, 1, 2, '2022-10-15', '2022-10-22', NULL, '2022-10-13 11:44:37', '2022-10-15 09:14:48'),
(6, NULL, 2, NULL, NULL, NULL, '2022-10-15 11:11:09', '2022-10-15 11:11:09'),
(7, 3, 5, '2022-10-18', '2022-10-18', NULL, '2022-10-18 13:39:30', '2022-10-18 13:39:30');

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
(1, 'Pembuatan Kain Batik', '2022-10-10 11:54:08', '2022-10-10 12:12:34'),
(3, 'Pembuatan Pola Pakaian', '2022-10-15 05:45:10', '2022-10-15 05:45:10');

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
(1, 3, 7, 3, '2022-11-16', '2022-11-17', 'xx.jpg', 'bla bla', NULL, NULL),
(4, 3, 7, 3, '2022-11-19', '2022-11-19', '20221119121755.jpg', 'Bla Bla', '2022-11-19 12:17:55', '2022-11-19 12:17:55');

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
(1, 'Toko Batik', 'Jl Batik Nusantara', 'batik@gmail.com', '0821392010', '2022-10-10 12:46:20', '2022-10-10 12:46:20');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, '2022-10-10 10:20:19', '2022-10-10 10:20:19');

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
-- Structure for view `view_transaksi_pemesanan_model`
--
DROP TABLE IF EXISTS `view_transaksi_pemesanan_model`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_transaksi_pemesanan_model`  AS SELECT `detail_pemesanan_model`.`id` AS `id_detail_pemesanan_model`, `pemesanan`.`tanggal` AS `tanggal`, `pemesanan`.`pelanggan_id` AS `pelanggan_id`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `pemesanan`.`penjahit_id` AS `penjahit_id`, `penjahit`.`nama_penjahit` AS `nama_penjahit`, `detail_pemesanan_model`.`model_id` AS `model_id`, `model`.`nama_model` AS `nama_model`, `jenis_model`.`nama_jenismodel` AS `jenis_model`, `detail_pemesanan_model`.`banyaknya` AS `jumlah`, 'PCS' AS `satuan` FROM (((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `penjahit` on(`pemesanan`.`penjahit_id` = `penjahit`.`id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `jenis_model` on(`model`.`jenis_model` = `jenis_model`.`id`))  ;

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_model`
--
ALTER TABLE `jenis_model`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pembelian_bahanbaku`
--
ALTER TABLE `detail_pembelian_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_pemesanan_bahanbaku`
--
ALTER TABLE `detail_pemesanan_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pemesanan_model`
--
ALTER TABLE `detail_pemesanan_model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_model`
--
ALTER TABLE `jenis_model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian_bahanbaku`
--
ALTER TABLE `pembelian_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjahit`
--
ALTER TABLE `penjahit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perencanaan_produksi`
--
ALTER TABLE `perencanaan_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `realisasi_penjahit`
--
ALTER TABLE `realisasi_penjahit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realisasi_produksi`
--
ALTER TABLE `realisasi_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `retur_pemesanan`
--
ALTER TABLE `retur_pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;