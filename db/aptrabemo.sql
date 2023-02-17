-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2023 at 03:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptrabemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` bigint(20) UNSIGNED NOT NULL,
  `id_penjualan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_produk` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` decimal(6,2) NOT NULL,
  `harga_jual` float(16,2) DEFAULT NULL,
  `sub_total` float(16,2) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `keterangan_order` varchar(255) DEFAULT NULL,
  `komplain` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_produk`, `jumlah`, `diskon`, `harga_jual`, `sub_total`, `satuan`, `keterangan_order`, `komplain`, `created_at`) VALUES
(1, 1, 1, 3, '0.00', 3000.00, 9000.00, 'pcs', 'oke', 'permennya tidak enak', '2023-02-07 17:37:21'),
(2, 1, 2, 5, '0.00', 3000.00, 15000.00, 'pcs', 'oke', NULL, '2023-02-07 17:37:21'),
(3, 3, 2, 1, '0.00', 3000.00, 3000.00, NULL, NULL, NULL, '2023-02-07 17:37:21'),
(4, 5, 1, 1, '0.00', 3000.00, 3000.00, NULL, NULL, NULL, '2023-02-14 20:33:05'),
(5, 5, 2, 1, '0.00', 3000.00, 3000.00, NULL, NULL, NULL, '2023-02-14 20:33:05'),
(6, 6, 2, 1, '0.00', 3000.00, 3000.00, NULL, NULL, NULL, '2023-02-14 20:35:42'),
(7, 7, 1, 1, '0.00', 3000.00, 3000.00, NULL, NULL, NULL, '2023-02-14 20:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` bigint(20) UNSIGNED NOT NULL,
  `id_target` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `role_pengirim` varchar(255) DEFAULT NULL,
  `id_pengirim` bigint(20) UNSIGNED DEFAULT NULL,
  `role_penerima` varchar(255) DEFAULT NULL,
  `id_penerima` bigint(20) UNSIGNED DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `is_read` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_target`, `judul`, `keterangan`, `role_pengirim`, `id_pengirim`, `role_penerima`, `id_penerima`, `kategori`, `is_read`, `created_at`) VALUES
(1, 1, 'Pesanan Masuk', 'Produk Anda ada yang memesan', 'pembeli', 4, 'pedagang', 2, 'pemesanan', 0, '2023-02-14 20:33:05'),
(2, 2, 'Pesanan Masuk', 'Produk Anda ada yang memesan', 'pembeli', 4, 'pedagang', 2, 'pemesanan', 0, '2023-02-14 20:33:05'),
(3, 1, 'Pesanan Masuk', 'Produk Permen Milkita  ada yang memesan, silahkan cek menu pemesanan Anda', 'pembeli', 4, 'pedagang', 2, 'pemesanan', 0, '2023-02-14 20:35:42'),
(4, 1, 'Pesanan Masuk', 'Produk Permen Milkita ada yang memesan, silahkan cek menu pemesanan Anda', 'pembeli', 4, 'pedagang', 2, 'pemesanan', 0, '2023-02-14 20:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) DEFAULT NULL,
  `id_pembeli` bigint(20) UNSIGNED NOT NULL,
  `id_toko` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kurir` bigint(20) UNSIGNED DEFAULT NULL,
  `servis` varchar(255) NOT NULL,
  `ongkir` float(16,2) NOT NULL,
  `keterangan` text NOT NULL,
  `proses` int(11) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_canceled` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_transaksi`, `id_pembeli`, `id_toko`, `id_kurir`, `servis`, `ongkir`, `keterangan`, `proses`, `waktu_transaksi`, `is_canceled`) VALUES
(1, 'TRX-001', 4, 1, NULL, 'Reguler', 0.00, 'Gratis Ongkir', 1, '2023-02-06 19:03:54', 0),
(2, 'TRX-002', 4, 1, NULL, 'Reguler', 0.00, 'oke', 1, '2023-02-06 19:03:54', 0),
(3, 'D80E671F74A5DA5D2659', 4, 1, NULL, 'Reguler', 0.00, '', 1, '2023-02-07 13:39:19', 0),
(4, '6E5AB3504A8120F94E22', 4, 1, NULL, 'Reguler', 0.00, '', 1, '2023-02-14 20:32:15', 0),
(5, 'F158AAB38674BE2E1C69', 4, 1, NULL, 'Reguler', 0.00, '', 1, '2023-02-14 20:33:05', 0),
(6, '23B269F2F0417F38E221', 4, 1, NULL, 'Reguler', 0.00, '', 1, '2023-02-14 20:35:42', 0),
(7, '5F577FCE85233DCC6208', 4, 1, NULL, 'Reguler', 0.00, '', 1, '2023-02-14 20:37:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_perusahaan` bigint(20) DEFAULT NULL,
  `id_toko` bigint(20) DEFAULT NULL,
  `id_kategori` bigint(20) DEFAULT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga_beli` float(16,2) DEFAULT NULL,
  `harga_reseller` float(16,2) DEFAULT NULL,
  `harga_konsumen` float(16,2) DEFAULT NULL,
  `berat` double(9,2) NOT NULL,
  `satuan_berat` varchar(25) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `tentang_produk` text NOT NULL,
  `keterangan` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `tag` varchar(255) DEFAULT NULL,
  `dilihat` int(11) NOT NULL DEFAULT 0,
  `disukai` int(11) DEFAULT 0,
  `minimum` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_perusahaan`, `id_toko`, `id_kategori`, `nama_produk`, `satuan`, `harga_beli`, `harga_reseller`, `harga_konsumen`, `berat`, `satuan_berat`, `gambar_produk`, `tentang_produk`, `keterangan`, `is_active`, `tag`, `dilihat`, `disukai`, `minimum`, `stok`, `created_at`) VALUES
(1, NULL, 1, NULL, 'Permen Milkita', 'pcs', 1000.00, NULL, 3000.00, 200.00, '', 'gambar-produk/permen-milkita.jpg', '1 buah Permen Milkita = 1 gelas susu, terdapat 4 varian rasa\r\nCoklat, Strawberry, melon dan susu', 'Perlu dilakukan restock', 1, 'permen, snack', 0, 0, NULL, 54, '2023-02-04 18:54:28'),
(2, NULL, 1, NULL, 'Permen Mahal', 'pcs', 1000.00, NULL, 3000.00, 90.00, '', 'gambar-produk/permen-milkita1.jpg', 'Permen enak', 'barang bagus', 1, 'permen, anak-anak, manis', 0, 0, NULL, 97, '2023-02-06 16:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `suplai`
--

CREATE TABLE `suplai` (
  `id_suplai` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED DEFAULT NULL,
  `id_toko` bigint(20) UNSIGNED DEFAULT NULL,
  `nomor_kuitansi` varchar(255) DEFAULT NULL,
  `harga_total` float(16,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `waktu_transaksi` timestamp NULL DEFAULT NULL,
  `penyuplai` varchar(255) DEFAULT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplai`
--

INSERT INTO `suplai` (`id_suplai`, `id_produk`, `id_toko`, `nomor_kuitansi`, `harga_total`, `jumlah`, `satuan`, `nama_pegawai`, `bukti`, `waktu_transaksi`, `penyuplai`, `catatan`, `created_at`) VALUES
(1, 1, 1, 'asd', 10000.00, 10, 'pcs', 'doni', NULL, '2023-02-14 22:33:00', 'PT. Sanur', 'oke', '2023-02-14 15:33:49'),
(2, 1, 1, 'asd1', 22000.00, 11, 'pcs', 'doni', '', '2023-02-14 23:10:00', 'PT. Sanur', 'oke', '2023-02-14 16:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` bigint(20) NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `deskripsi_toko` text NOT NULL,
  `gambar_toko` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `id_user`, `nama_toko`, `deskripsi_toko`, `gambar_toko`, `created_at`) VALUES
(1, 2, 'Toko Permen', 'Toko milik Pedagang1 yang menjual permen', 'gambar-toko/toko.jpg', '2023-02-04 11:02:18'),
(2, 2, 'Sayur Pak Aman', 'Jualan sayur', 'gambar-toko/Aptrabemo_logo2.png', '2023-02-14 23:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `link_map` varchar(255) DEFAULT NULL,
  `role` enum('pedagang','pembeli','admin') DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `jenis_kelamin`, `nomor_telepon`, `foto`, `alamat`, `link_map`, `role`, `is_active`, `created_at`) VALUES
(1, 'admin', '$2y$10$kWO6KpHnYDwQncfB8YW1u.eMZ6FOcWBBLFGQn0SuC5BStYpIj.G96', 'admin@email.com', 'admin', 'Laki-laki', '081111111111', 'foto-profil/user.png', 'bandung', 'https://goo.gl/maps/qqZCfWoE4srEAjMt9', 'admin', 1, '2023-02-04 07:56:19'),
(2, 'pedagang1', '$2y$10$kWO6KpHnYDwQncfB8YW1u.eMZ6FOcWBBLFGQn0SuC5BStYpIj.G96', 'pedagang1@email.com', 'pedagang satu', 'Laki-laki', '081111111111', 'foto-profil/user.png', 'bandung', 'https://goo.gl/maps/qqZCfWoE4srEAjMt9', 'pedagang', 1, '2023-02-04 07:56:19'),
(3, 'pedagang2', '$2y$10$kWO6KpHnYDwQncfB8YW1u.eMZ6FOcWBBLFGQn0SuC5BStYpIj.G96', 'pedagang2@email.com', 'pedagang dua', 'Perempuan', '081111111111', 'foto-profil/user.png', 'bandung', 'https://goo.gl/maps/qqZCfWoE4srEAjMt9', 'pedagang', 1, '2023-02-04 07:56:19'),
(4, 'pembeli1', '$2y$10$kWO6KpHnYDwQncfB8YW1u.eMZ6FOcWBBLFGQn0SuC5BStYpIj.G96', 'pembeli1@email.com', 'pembeli satu', 'Perempuan', '081111111111', 'foto-profil/user.png', 'bandung', 'https://goo.gl/maps/qqZCfWoE4srEAjMt9', 'pembeli', 1, '2023-02-04 07:56:19'),
(5, 'pembeli2', '$2y$10$kWO6KpHnYDwQncfB8YW1u.eMZ6FOcWBBLFGQn0SuC5BStYpIj.G96', 'pembeli2@email.com', 'pembeli dua', 'Laki-laki', '081111111111', 'foto-profil/user.png', 'bandung', 'https://goo.gl/maps/qqZCfWoE4srEAjMt9', 'pembeli', 1, '2023-02-04 07:56:19'),
(6, 'ermapedagang', '$2y$10$QurMj1hg0cwZg7/i/oGoPOQZIJrHXHNctH7O91Ox2DvS5TdMnIJIC', 'ermapedagang@gmail.com', 'Erma Sulviana', 'Perempuan', '081346856997', 'foto-profil/Aptrabemo_logo9.png', 'Bandung', 'gmaps.com', 'pedagang', NULL, '2023-02-14 22:48:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `suplai`
--
ALTER TABLE `suplai`
  ADD PRIMARY KEY (`id_suplai`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suplai`
--
ALTER TABLE `suplai`
  MODIFY `id_suplai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
