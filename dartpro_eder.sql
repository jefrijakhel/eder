-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2019 pada 11.40
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
(1, 'meja1', '+meja1', '1', 0, 'gigih', 'gigihgemilang22@gmail.com', '085722578537', 'TSnuxnuwbrJOHkIkqNOJVsQ8DAYQU', '2019-07-01 20:40:48', '2019-07-01 20:40:48'),
(2, 'meja2', '+meja2', '2', 0, '', '', '', '', '2019-07-07 17:00:00', '2019-07-07 17:00:00'),
(3, 'meja3', '+meja3', '3', 0, NULL, NULL, NULL, 'aGhs1JLt162qPYT0MXv7KfjHJGkZNG', '2019-07-07 18:19:47', '2019-07-07 18:19:47'),
(4, 'meja4', '+meja4', '4', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:24', '2019-07-07 18:21:24'),
(5, 'meja5', '+meja5', '5', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:24', '2019-07-07 18:21:24'),
(6, 'meja6', '+meja6', '6', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25'),
(7, 'meja7', '+meja7', '7', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25'),
(8, 'meja8', '+meja8', '8', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25'),
(9, 'meja9', '+meja9', '9', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25'),
(10, 'meja10', '+meja10', '10', 0, NULL, NULL, NULL, '', '2019-07-07 18:21:25', '2019-07-07 18:21:25');

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
(1, 'ice coffee', 'Kopi Tubruk', 'Kopi Tubruk', 'minuman', 15000, 'elther', '2019-07-01 20:05:39', '2019-07-01 20:05:39'),
(2, 'hot coffee', 'Bowl 1', 'Chicken Popcorn Scramble egg, Vegie', 'makanan', 25000, 'elther', '2019-07-01 20:07:43', '2019-07-01 20:07:43');

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
(4, 'By2Mma2LEuc0E0UNYPFL7kGbKSaIh', 25000, 2, 'gopay', 'gigih', '2019-07-09 09:33:08', '2019-07-09 09:33:08');

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
(4, 'nNeQImaeNVLrlIvnaugrf0A25wu4aI', 1, 2, 1, 'Notes Bowl 1', 'Duds', 'imaduddinhariss@gmail.com', '081210113977', 'close', '2019-07-02 11:32:40', '2019-07-02 07:19:54', '2019-07-02 11:32:40'),
(5, 'nNeQImaeNVLrlIvnaugrf0A25wu4aI', 1, 2, 2, 'pesan lagi', 'duds', 'imaduddinhariss@gmail.com', '081210113977', 'close', NULL, '2019-07-02 10:11:52', '2019-07-02 10:11:52'),
(6, '7hlnKOOQ2Lt7R0AMSyLNgsKsUYFKJt', 2, 2, 3, '', 'Bambang', 'bambang@gmail.com', '123123123', 'close', NULL, '2019-07-09 09:15:23', '2019-07-09 09:15:23'),
(7, 'By2Mma2LEuc0E0UNYPFL7kGbKSaIh', 2, 2, 1, 'pedes', 'gigih', 'gigihgemilang22@gmail.com', '08593932', 'close', NULL, '2019-07-09 09:32:53', '2019-07-09 09:32:53');

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
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

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
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
