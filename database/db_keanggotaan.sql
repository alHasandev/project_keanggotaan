-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2019 pada 05.36
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keanggotaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `nik` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`nik`, `password`) VALUES
(111111, '$2y$10$0sNWl8dknguH1DFRPQkLEO2z6zAEa8p8Ss29zBGepm4zABv/jzWL6'),
(222222, '$2y$10$p.aR9A44vO3rZDj77jzPQOiTCSIwktYS/W5vHmHKnfKvT8kYxukEq'),
(333333, '$2y$10$KfZaEhV7Y1tnHkHlBqDdmeFUwUCovHOsKQx3DVo/VRNyO/QgsCiUG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapping`
--

CREATE TABLE `mapping` (
  `nik` int(11) NOT NULL,
  `id_posisi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapping`
--

INSERT INTO `mapping` (`nik`, `id_posisi`) VALUES
(111111, '1'),
(222222, '2'),
(333333, '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `nik` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`nik`, `nama`, `email`, `alamat`) VALUES
(111111, 'saya admin', 'admin@seven.com', 'jalan palamban'),
(222222, 'ini ketua', 'ketua@gmail.com', 'jalan palauan'),
(333333, 'ini sekretariat', 'sekre@seven.com', 'Jl. Pelambaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `nik` int(11) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `riwayat_pelatihan` text NOT NULL,
  `sertifikat_dimiliki` text NOT NULL,
  `riwayat_project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `nama_posisi`) VALUES
(1, 'admin'),
(2, 'ketua'),
(3, 'sekretariat'),
(4, 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `mapping`
--
ALTER TABLE `mapping`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16630431;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16630428;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
