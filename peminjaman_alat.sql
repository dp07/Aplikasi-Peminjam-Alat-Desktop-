-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Nov 2020 pada 08.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman_alat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id` int(11) NOT NULL,
  `kode_alat` varchar(255) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id`, `kode_alat`, `nama_alat`, `jumlah`) VALUES
(2, 'OB01', 'Obeng', 100),
(3, 'JS02', 'Jangka Sorong', 123),
(5, 'JS04', 'Jangka Sorong', 200),
(6, 'JS03', 'Jangka Sorong', 100),
(7, 'KI02', 'Kunci Inggris', 66);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nis_user` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `kode_alat` varchar(255) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nis_user`, `nama_user`, `kode_alat`, `nama_alat`, `jumlah`, `tanggal`) VALUES
(19, '1235', 'Dybala', 'KI02', 'Kunci Inggris', 34, '2020/21/11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `angkatan` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `angkatan`, `hp`) VALUES
(7, '1234786', 'Ronaldo', 'XI TKR 3', '2020-04-20', '081234566543'),
(8, '1235', 'Dybala', 'XI TKR 3', '2020-11-20', '081234323213'),
(9, '666688', 'Jovic', 'XI TKR 3', '2020-11-20', '08124321234'),
(10, '46114170290', 'Ronaldo', 'XI TKR 3', '2020-11-20', '522'),
(11, '4611417024', 'Justin', 'XI TKR 3', '2020-11-21', '222'),
(12, '4611417025', 'Justin', 'XI TKR 3', '2020-11-28', '234777'),
(13, '6660', 'Dybala', 'XI TKR 3', '2020-11-11', '2233'),
(14, '46114170257', 'Ronaldo', 'XI TKR 3', '2020-11-10', '157571'),
(15, '6664', 'Justin', 'XI TKR 3', '2020-11-20', '123'),
(16, '4556', 'Dany Pradana', 'XI TKR 3', '2020-11-18', '097982792'),
(17, '6666', 'Jovic', 'XI TKR 3', '2020-11-21', '3244');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
