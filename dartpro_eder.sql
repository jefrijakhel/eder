-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2019 pada 01.36
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dartpro_eder`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `nama_bahan_baku` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `nama_bahan_baku`, `jumlah`, `satuan`, `created_at`, `deleted_at`) VALUES
(1, 'Cabe Merah', 1000, 'ons', '2019-07-21 16:11:20', '2019-07-21 16:11:20'),
(2, 'Daging', 20, 'kilogram', '2019-07-21 16:26:25', '2019-07-21 16:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `belanja`
--

CREATE TABLE `belanja` (
  `id_belanja` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `permintaan_biaya` bigint(20) NOT NULL,
  `biaya_fix` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `belanja`
--

INSERT INTO `belanja` (`id_belanja`, `deskripsi`, `permintaan_biaya`, `biaya_fix`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Belanja Mingguan', 800000, 600000, 'disetujui', '2019-07-21 16:53:00', '2019-07-21 16:53:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `meja` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_detail_belanja` int(11) NOT NULL,
  `id_belanja` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_kisaran` int(11) NOT NULL,
  `harga_fix` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_belanja`
--

INSERT INTO `detail_belanja` (`id_detail_belanja`, `id_belanja`, `id_bahan_baku`, `jumlah`, `harga_kisaran`, `harga_fix`, `created_at`, `updated_at`) VALUES
(0, 7, 2, 10, 800000, 60000, '2019-07-21 16:53:00', '2019-07-21 16:53:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penggajian`
--

CREATE TABLE `detail_penggajian` (
  `id_detail_penggajian` int(11) NOT NULL,
  `id_penggajian` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `punishment` int(11) NOT NULL,
  `detail_punishment` text NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penggajian`
--

INSERT INTO `detail_penggajian` (`id_detail_penggajian`, `id_penggajian`, `id_employee`, `punishment`, `detail_punishment`, `total_gaji`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 300000, 'tidak masuk 3 hari tanpa keterangan', 2700000, '2019-07-21 11:11:35', '2019-07-21 11:11:35'),
(2, 2, 2, 0, '', 3000000, '2019-07-21 11:11:35', '2019-07-21 11:11:35'),
(3, 2, 3, 0, '', 3000000, '2019-07-21 11:11:35', '2019-07-21 11:11:35'),
(4, 2, 4, 0, '', 2500000, '2019-07-21 11:11:35', '2019-07-21 11:11:35'),
(5, 2, 5, 0, '', 2500000, '2019-07-21 11:11:35', '2019-07-21 11:11:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `posisi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`id_employee`, `nama`, `posisi`, `created_at`, `updated_at`) VALUES
(1, 'Wahyu Triatmojo', 1, '2019-07-21 06:43:51', '2019-07-21 06:43:51'),
(2, 'Sukma Ayu', 1, '2019-07-21 06:44:03', '2019-07-21 06:44:03'),
(3, 'Indah Permata', 2, '2019-07-21 06:44:15', '2019-07-21 06:44:15'),
(4, 'Budi Trianto', 3, '2019-07-21 06:45:00', '2019-07-21 06:45:00'),
(5, 'Asep Hendro', 3, '2019-07-21 06:45:00', '2019-07-21 06:45:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `nilai` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_pertanyaan`, `pertanyaan`, `nilai`, `created_at`, `deleted_at`) VALUES
(1, 0, 'Bagaimana makanan di Kafe Elther?', '3', '2019-07-21 19:19:38', '2019-07-21 19:19:38'),
(2, 1, 'Bagaimana suasana di Kafe Elther?', '3', '2019-07-21 19:19:38', '2019-07-21 19:19:38'),
(3, 2, 'Bagaimana pelayanan di Kafe Elther?', '4', '2019-07-21 19:19:38', '2019-07-21 19:19:38'),
(4, 3, 'Komentar', 'Pelayanan oke', '2019-07-23 21:30:15', '2019-07-23 21:30:15'),
(5, 0, 'Bagaimana makanan di Kafe Elther?', '5', '2019-07-23 23:35:46', '2019-07-23 23:35:46'),
(6, 1, 'Bagaimana suasana di Kafe Elther?', '5', '2019-07-23 23:35:46', '2019-07-23 23:35:46'),
(7, 2, 'Bagaimana pelayanan di Kafe Elther?', '4', '2019-07-23 23:35:46', '2019-07-23 23:35:46'),
(8, 3, 'Komentar', 'Enaaak', '2019-07-23 23:35:46', '2019-07-23 23:35:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompopsisi`
--

CREATE TABLE `kompopsisi` (
  `id_komposisi` int(11) NOT NULL,
  `id_bahan_baku` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_bahan_baku` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_meja` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `nama_customer` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `active_transaction` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `username`, `password`, `no_meja`, `status`, `nama_customer`, `email`, `no_hp`, `active_transaction`, `created_at`, `updated_at`) VALUES
(1, 'meja1', '+meja1', '1', 1, 'Bambang', 'bambang@gmail.com', '1082801209', 'pA0wV6Esi68UimHh6ed8h0vcu41N1a', '2019-07-01 20:40:48', '2019-07-01 20:40:48'),
(2, 'meja2', '+meja2', '2', 0, '', '', '', '', '2019-07-07 17:00:00', '2019-07-07 17:00:00'),
(3, 'meja3', '+meja3', '3', 0, '', '', '', '', '2019-07-07 18:19:47', '2019-07-07 18:19:47'),
(4, 'meja4', '+meja4', '4', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:24', '2019-07-07 18:21:24'),
(5, 'meja5', '+meja5', '5', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:24', '2019-07-07 18:21:24'),
(6, 'meja6', '+meja6', '6', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25'),
(7, 'meja7', '+meja7', '7', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25'),
(8, 'meja8', '+meja8', '8', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25'),
(9, 'meja9', '+meja9', '9', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25'),
(10, 'meja10', '+meja10', '10', 0, '', '', '', '', '2019-07-07 18:21:25', '2019-07-07 18:21:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sub_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `sub_menu`, `nama_menu`, `deskripsi_menu`, `jenis_menu`, `harga_menu`, `vendor`, `created_at`, `updated_at`) VALUES
(1, 'hot coffee', 'Kopi Tubruk', '-', 'minuman', 15000, 'elther', '2019-07-01 20:05:39', '2019-07-01 20:05:39'),
(2, 'hot coffee', 'Americano', '-', 'minuman', 20000, 'elther', '2019-07-01 20:07:43', '2019-07-01 20:07:43'),
(3, 'hot coffee', 'Espresso', '-', 'minuman', 15000, 'Elther', '2019-07-21 19:28:54', '2019-07-21 19:28:54'),
(4, 'ice coffee', 'Milk Americano', '-', 'minuman', 25000, 'elther', '2019-07-01 20:05:39', '2019-07-01 20:05:39'),
(5, 'hot coffee', 'Black Vietnam', '-', 'minuman', 20000, 'elther', '2019-07-01 20:07:43', '2019-07-01 20:07:43'),
(6, 'hot coffee', 'Mokapot', '-', 'minuman', 25000, 'Elther', '2019-07-21 19:28:54', '2019-07-21 19:28:54'),
(7, 'ice coffee', 'v60', '-', 'minuman', 25000, 'elther', '2019-07-01 20:05:39', '2019-07-01 20:05:39'),
(8, 'hot coffee', 'Milk Vietnam', '-', 'minuman', 25000, 'elther', '2019-07-01 20:07:43', '2019-07-01 20:07:43'),
(9, 'hot coffee', 'Long Black', '-', 'minuman', 20000, 'Elther', '2019-07-21 19:28:54', '2019-07-21 19:28:54'),
(10, 'ice coffee', 'Cappucino', '-', 'minuman', 27000, 'elther', '2019-07-01 20:05:39', '2019-07-01 20:05:39'),
(11, 'hot coffee', 'Latte', '-', 'minuman', 27000, 'elther', '2019-07-01 20:07:43', '2019-07-01 20:07:43'),
(12, 'hot coffee', 'Espresso', '-', 'minuman', 15000, 'Elther', '2019-07-21 19:28:54', '2019-07-21 19:28:54'),
(14, 'hot coffee', 'Bowl 1', 'Chicken Popcorn Scramble egg, Vegie', 'makanan', 25000, 'elther', '2019-07-01 20:07:43', '2019-07-01 20:07:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `total` bigint(20) NOT NULL,
  `meja` int(11) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_payment`, `id_transaksi`, `total`, `meja`, `metode`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'nNeQImaeNVLrlIvnaugrf0A25wu4aI', 90000, 1, 'cash', 'duds', '2019-07-07 23:46:49', '2019-07-07 23:46:49'),
(3, '7hlnKOOQ2Lt7R0AMSyLNgsKsUYFKJt', 75000, 2, 'cash', 'Bambang', '2019-07-09 09:16:29', '2019-07-09 09:16:29'),
(4, 'By2Mma2LEuc0E0UNYPFL7kGbKSaIh', 25000, 2, 'gopay', 'gigih', '2019-07-09 09:33:08', '2019-07-09 09:33:08'),
(5, 'TSnuxnuwbrJOHkIkqNOJVsQ8DAYQU', 0, 1, 'cash', 'gigih', '2019-07-14 07:28:32', '2019-07-14 07:28:32'),
(6, 'Tb6wP2MElIOblQjhbKhv995KeJAYD4', 25000, 1, 'ovo', 'dudung', '2019-07-14 07:30:58', '2019-07-14 07:30:58'),
(7, 'qlxX09qF9u3GnnLGWdYavrjQA6OdDZ', 50000, 1, 'cash', 'Duds', '2019-07-21 18:12:25', '2019-07-21 18:12:25'),
(8, 'pA0wV6Esi68UimHh6ed8h0vcu41N1a', 85000, 1, 'cash', 'Bambang', '2019-07-23 23:09:45', '2019-07-23 23:09:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `jenis_pengeluaran` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `deskripsi`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 'penggajian', 'Penggajian untuk bulan 10', 13700000, '2019-07-21 11:11:35', '2019-07-21 11:11:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(50) NOT NULL,
  `gaji` int(11) NOT NULL,
  `craeted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `nama_posisi`, `gaji`, `craeted_at`, `updated_at`) VALUES
(1, 'dapur', 3000000, '2019-07-21 06:42:18', '2019-07-21 06:42:18'),
(2, 'kasir', 3000000, '2019-07-21 06:42:33', '2019-07-21 06:42:33'),
(3, 'pelayan', 2500000, '2019-07-21 06:43:03', '2019-07-21 06:43:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `transaksi_fk` varchar(50) NOT NULL,
  `meja` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `notes` text NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `estimated_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `transaksi_fk`, `meja`, `id_menu`, `qty`, `notes`, `nama_customer`, `email`, `no_hp`, `status`, `estimated_time`, `created_at`, `updated_at`) VALUES
(3, 'nNeQImaeNVLrlIvnaugrf0A25wu4aI', 1, 1, 1, '', 'Duds', 'imaduddinhariss@gmail.com', '081210113977', 'close', '2019-07-02 11:24:26', '2019-07-02 07:19:54', '2019-07-02 11:24:26'),
(4, 'nNeQImaeNVLrlIvnaugrf0A25wu4aI', 1, 2, 1, 'Notes Bowl 1', 'Duds', 'imaduddinhariss@gmail.com', '081210113977', 'close', '2019-07-21 15:44:19', '2019-07-02 07:19:54', '2019-07-21 15:44:19'),
(5, 'nNeQImaeNVLrlIvnaugrf0A25wu4aI', 1, 2, 2, 'pesan lagi', 'duds', 'imaduddinhariss@gmail.com', '081210113977', 'close', NULL, '2019-07-02 10:11:52', '2019-07-02 10:11:52'),
(6, '7hlnKOOQ2Lt7R0AMSyLNgsKsUYFKJt', 2, 2, 3, '', 'Bambang', 'bambang@gmail.com', '123123123', 'close', NULL, '2019-07-09 09:15:23', '2019-07-09 09:15:23'),
(7, 'By2Mma2LEuc0E0UNYPFL7kGbKSaIh', 2, 2, 1, 'pedes', 'gigih', 'gigihgemilang22@gmail.com', '08593932', 'close', NULL, '2019-07-09 09:32:53', '2019-07-09 09:32:53'),
(8, 'Tb6wP2MElIOblQjhbKhv995KeJAYD4', 1, 2, 1, '123fasdf', 'dudung', 'dudung@gmail.com', '0812801208', 'close', NULL, '2019-07-14 07:30:53', '2019-07-14 07:30:53'),
(9, 'qlxX09qF9u3GnnLGWdYavrjQA6OdDZ', 1, 2, 2, '', 'Duds', 'duds@gmail.com', '129012929', 'close', '2019-07-21 18:25:08', '2019-07-21 17:56:51', '2019-07-21 18:25:08'),
(10, 'pA0wV6Esi68UimHh6ed8h0vcu41N1a', 1, 14, 1, '', 'Bambang', 'bambang@gmail.com', '1082801209', 'close', '2019-07-23 09:38:29', '2019-07-23 09:21:23', '2019-07-23 09:38:29'),
(11, 'pA0wV6Esi68UimHh6ed8h0vcu41N1a', 1, 1, 1, '', 'Bambang', 'bambang@gmail.com', '1082801209', 'close', NULL, '2019-07-23 09:49:05', '2019-07-23 09:49:05'),
(12, 'pA0wV6Esi68UimHh6ed8h0vcu41N1a', 1, 1, 1, '', 'Bambang', 'bambang@gmail.com', '1082801209', 'close', '2019-07-23 10:12:48', '2019-07-23 09:49:43', '2019-07-23 10:12:48'),
(13, 'pA0wV6Esi68UimHh6ed8h0vcu41N1a', 1, 14, 1, '', 'Bambang', 'bambang@gmail.com', '1082801209', 'close', NULL, '2019-07-23 09:54:23', '2019-07-23 09:54:23'),
(14, 'pA0wV6Esi68UimHh6ed8h0vcu41N1a', 1, 1, 2, 'gula 2 sendok', 'Bambang', 'bambang@gmail.com', '1082801209', 'close', NULL, '2019-07-23 22:23:16', '2019-07-23 22:23:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `privillege` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `privillege`, `created_at`, `updated_at`) VALUES
(1, 'kasir', '+kasir', 'kasir', '2019-07-02 08:50:47', '2019-07-02 08:50:47'),
(2, 'dapur', '+dapur', 'dapur', '2019-07-02 08:50:47', '2019-07-02 08:50:47'),
(3, 'manager', '+manager', 'manager', '2019-07-02 08:51:07', '2019-07-02 08:51:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indeks untuk tabel `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id_belanja`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `detail_penggajian`
--
ALTER TABLE `detail_penggajian`
  ADD PRIMARY KEY (`id_detail_penggajian`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indeks untuk tabel `kompopsisi`
--
ALTER TABLE `kompopsisi`
  ADD PRIMARY KEY (`id_komposisi`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`),
  ADD UNIQUE KEY `no_meja` (`no_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `belanja`
--
ALTER TABLE `belanja`
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_penggajian`
--
ALTER TABLE `detail_penggajian`
  MODIFY `id_detail_penggajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kompopsisi`
--
ALTER TABLE `kompopsisi`
  MODIFY `id_komposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
