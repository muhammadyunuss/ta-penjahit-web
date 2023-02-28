-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.3
-- Generation Time: Feb 28, 2023 at 02:20 PM
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


CREATE TABLE `detail_pemesanan_model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) DEFAULT NULL,
  `pemesanan_id` bigint(20) DEFAULT NULL,
  `jenis_model_id` bigint(20) DEFAULT NULL,
  `banyaknya` double DEFAULT NULL,
  `ongkos_jahit` double DEFAULT NULL,
  `nama_model_detail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_gambar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_pemesanan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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


CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `jasa_ekspedisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jasa_ekspedisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `jenis_model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenismodel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jenis_model` (`id`, `nama_jenismodel`, `created_at`, `updated_at`) VALUES
(1, 'Unisex', NULL, NULL);

CREATE TABLE `kolom_rak` (
  `id` bigint(20) NOT NULL,
  `nama_rak` varchar(255) NOT NULL,
  `nama_kolom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `letak_bahan_baku` (
  `nama_letak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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


CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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


CREATE TABLE `pengambilan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) NOT NULL,
  `jasa_ekspedisi_id` bigint(20) NOT NULL,
  `opsi_pengambilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `alamat_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_pengiriman` double DEFAULT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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


CREATE TABLE `perencanaan_produksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proses_produksi_id` bigint(20) DEFAULT NULL,
  `detail_pemesanan_model_id` bigint(20) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `gambar_pola` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepala_penjahit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `proses_produksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_prosesproduksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `realisasi_penjahit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `realisasi_produksi_id` bigint(20) DEFAULT NULL,
  `penjahit_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `email`, `nomor_telepon`, `created_at`, `updated_at`) VALUES
(1, 'Toko Batik', 'Jl Batik Nusantara', 'batik@gmail.com', '0821392010', '2022-10-10 12:46:20', '2022-10-10 12:46:20');

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previledge` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Penjahit, Pemilik, Kepala_Penjahit',
  `id_penjahit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `previledge`, `id_penjahit`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Admin', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(2, 'pemilik', 'pemilik@pemilik.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Pemilik', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(3, 'kepala', 'kepala@kepala.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Kepala', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(4, 'Penjahit', 'penjahit@penjahit.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Penjahit', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(5, 'Finishing', 'finishing@finishing.com', NULL, '$2y$10$CkaE7WZar2jLhrS2CIrBKOpEnfIfwxUOC4x//g0CNZwtsEQZ20nGa', NULL, 'Finishing', 1, '2022-10-10 10:20:19', '2022-10-10 10:20:19'),
(6, 'Velma Hatfield', 'nocekyqizu@mailinator.com', NULL, '$2y$10$vJZsR2S/szpx5HUWryMq2uiLSeQi0PWd9UQqni42B33cDaieVgD8q', NULL, 'Penjahit', 1, '2023-02-24 07:53:07', '2023-02-24 07:53:07');

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

CREATE TABLE `view_tanggungan_pesanan` (
`id` bigint(20) unsigned
,`penjahit_id` bigint(20)
,`nama_pelanggan` varchar(255)
,`nama_model` varchar(255)
,`tanggal_selesai` date
);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_laporan_daftar_tanggungan_produksi_jahit`  AS   (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`pemesanan`.`tanggal` AS `tanggal_selesai`,`model`.`nama_model` AS `nama_model`,`detail_pemesanan_model`.`nama_model_detail` AS `nama_model_detail`,`detail_pemesanan_model`.`banyaknya` AS `jumlah`,`proses_produksi`.`nama_prosesproduksi` AS `nama_prosesproduksi`,`realisasi_produksi`.`tanggal_selesai` AS `realisasi_tanggal_selesai` from ((((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `perencanaan_produksi` on(`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`)) join `realisasi_produksi` on(`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`)) join `proses_produksi` on(`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`)) where `proses_produksi`.`id` < 8) union all (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`pemesanan`.`tanggal` AS `tanggal_selesai`,`model`.`nama_model` AS `nama_model`,`detail_pemesanan_model`.`nama_model_detail` AS `nama_model_detail`,`detail_pemesanan_model`.`banyaknya` AS `jumlah`,`proses_produksi`.`nama_prosesproduksi` AS `nama_prosesproduksi`,`realisasi_produksi`.`tanggal_selesai` AS `tanggal_selesai` from ((((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `perencanaan_produksi` on(`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`)) join `realisasi_produksi` on(`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`)) join `proses_produksi` on(`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`)) where `pemesanan`.`pengambilan_id` is null)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_tanggungan_pesanan`
--
DROP TABLE IF EXISTS `view_tanggungan_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_tanggungan_pesanan`  AS   (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`model`.`nama_model` AS `nama_model`,`realisasi_produksi`.`tanggal_selesai` AS `tanggal_selesai` from ((((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `perencanaan_produksi` on(`detail_pemesanan_model`.`id` = `perencanaan_produksi`.`id`)) join `realisasi_produksi` on(`perencanaan_produksi`.`id` = `realisasi_produksi`.`perencanaan_produksi_id`)) join `proses_produksi` on(`realisasi_produksi`.`proses_produksi_id` = `proses_produksi`.`id`)) where `proses_produksi`.`id` < 8) union all (select `pemesanan`.`id` AS `id`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`model`.`nama_model` AS `nama_model`,`pemesanan`.`tanggal` AS `tanggal_selesai` from (((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) where `pemesanan`.`pengambilan_id` is null)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_pemesanan_model`
--
DROP TABLE IF EXISTS `view_transaksi_pemesanan_model`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_transaksi_pemesanan_model`  AS SELECT `detail_pemesanan_model`.`id` AS `id_detail_pemesanan_model`, `pemesanan`.`tanggal` AS `tanggal`, `pemesanan`.`pelanggan_id` AS `pelanggan_id`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `pemesanan`.`penjahit_id` AS `penjahit_id`, `penjahit`.`nama_penjahit` AS `nama_penjahit`, `detail_pemesanan_model`.`model_id` AS `model_id`, `model`.`nama_model` AS `nama_model`, `jenis_model`.`nama_jenismodel` AS `jenis_model`, `detail_pemesanan_model`.`banyaknya` AS `jumlah`, 'PCS' AS `satuan` FROM (((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `penjahit` on(`pemesanan`.`penjahit_id` = `penjahit`.`id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `jenis_model` on(`model`.`jenis_model` = `jenis_model`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_ukuran`
--
DROP TABLE IF EXISTS `view_ukuran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_ukuran`  AS SELECT `p`.`id` AS `id_pemesanan`, `pm`.`id` AS `id_pemesanan_model`, `uk`.`id` AS `id_ukuran`, `plg`.`nama_pelanggan` AS `nama_pelanggan`, `p`.`tanggal` AS `tanggal`, `m`.`nama_model` AS `nama_model`, `uk`.`ukuran_baju` AS `ukuran_baju`, `uk`.`deskripsi_ukuran` AS `deskripsi_ukuran` FROM ((((`pemesanan` `p` join `detail_pemesanan_model` `pm` on(`p`.`id` = `pm`.`pemesanan_id`)) join `detail_pemesanan_model_ukuran` `uk` on(`pm`.`id` = `uk`.`detail_pemesanan_model_id`)) join `pelanggan` `plg` on(`p`.`pelanggan_id` = `plg`.`id`)) join `model` `m` on(`pm`.`model_id` = `m`.`id`))  ;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_pembelian_bahanbaku`
--
ALTER TABLE `detail_pembelian_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_pemesanan_bahanbaku`
--
ALTER TABLE `detail_pemesanan_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_pemesanan_model`
--
ALTER TABLE `detail_pemesanan_model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail_pemesanan_model_ukuran`
--
ALTER TABLE `detail_pemesanan_model_ukuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian_bahanbaku`
--
ALTER TABLE `pembelian_bahanbaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjahit`
--
ALTER TABLE `penjahit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perencanaan_produksi`
--
ALTER TABLE `perencanaan_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `realisasi_penjahit`
--
ALTER TABLE `realisasi_penjahit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realisasi_produksi`
--
ALTER TABLE `realisasi_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
