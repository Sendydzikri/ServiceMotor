-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2020 pada 15.38
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicemotor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `nomor` int(11) NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_nomor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sukucadang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mekanik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(255) NOT NULL,
  `merk_motor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`nomor`, `id_transaksi`, `id_user`, `tgl_transaksi`, `nama_customer`, `plat_nomor`, `id_sukucadang`, `nama_mekanik`, `harga`, `merk_motor`, `status`) VALUES
(1, 'TR-12-28-uae8', '11', '2020-12-28', 'Adrian', 'A ZE3KL', '1', 'Udin', 20000, 'Yamaha', 'selesai'),
(5, 'TR-12-28-uae8', '11', '2020-12-28', 'Adrian', 'A ZE3KL', '2', 'Udin', 10000, 'Yamaha', 'selesai'),
(6, 'TR-12-28-uae8', '11', '2020-12-28', 'Adrian', 'A ZE3KL', '2', 'Udin', 10000, 'Yamaha', 'selesai'),
(7, 'TR-12-28-uae8', '11', '2020-12-28', 'Adrian', 'A ZE3KL', '1', 'Udin', 20000, 'Yamaha', 'selesai'),
(8, 'TR-12-29 -lJjR', '11', '2020-12-29', 'Andre', 'B 22ZKL', '2', 'Udin', 10000, 'Honda', 'selesai'),
(10, 'TR-12-29 -FPAn', '11', '2020-12-29', 'Andre', 'B 22ZKL', '1', 'Udin', 20000, 'Honda', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_sukucadang`
--

CREATE TABLE `dt_sukucadang` (
  `id_sukucadang` int(255) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dt_sukucadang`
--

INSERT INTO `dt_sukucadang` (`id_sukucadang`, `nama`, `harga`, `stock`) VALUES
(1, 'Oli', 20000, 6),
(2, 'kampas rem', 10000, 40),
(3, 'Softbreaker', 500000, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_transaksi`
--

CREATE TABLE `dt_transaksi` (
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_nomor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_cust` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_motor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dt_transaksi`
--

INSERT INTO `dt_transaksi` (`id_transaksi`, `tgl_transaksi`, `nama_customer`, `plat_nomor`, `nohp_cust`, `merk_motor`, `keluhan`, `status`) VALUES
('TR-12-28-uae8', '2020-12-28', 'Adrian', 'A ZE3KL', '089629710886', 'Yamaha', 'Rem Blong', 'selesai'),
('TR-12-29 -FPAn', '2020-12-29', 'Andre', 'B 22ZKL', '2312311232', 'Honda', 'Rem blong', 'proses'),
('TR-12-29 -lJjR', '2020-12-29', 'Andre', 'B 22ZKL', '0894332432', 'Honda', 'Rem blong', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_12_28_111229_dt_sukucadang', 2),
(4, '2020_12_28_111305_detail_transaksi', 2),
(5, '2020_12_28_111318_dt_transaksi', 2),
(6, '2020_12_28_111331_user', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
(2, 'Sendy Dzikri Ferdiansyah', 'sendyf', 'pass', 'manager'),
(4, 'Mahmudin', 'mahmud', 'pass', 'Cashier');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `dt_sukucadang`
--
ALTER TABLE `dt_sukucadang`
  ADD PRIMARY KEY (`id_sukucadang`);

--
-- Indeks untuk tabel `dt_transaksi`
--
ALTER TABLE `dt_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dt_sukucadang`
--
ALTER TABLE `dt_sukucadang`
  MODIFY `id_sukucadang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
