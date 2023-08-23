-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2023 pada 15.00
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b-klas-voting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penampilan`
--

CREATE TABLE `penampilan` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `total_skor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penampilan`
--

INSERT INTO `penampilan` (`id`, `id_peserta`, `total_skor`) VALUES
(8, 10, 0),
(9, 11, 0),
(10, 13, 0),
(11, 12, 0),
(12, 14, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `Skor` int(11) NOT NULL,
  `Komentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `dawis` int(11) NOT NULL,
  `penampilan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `dawis`, `penampilan`, `foto`, `status`) VALUES
(10, 'Alief adam', 5, 'Penampilan Tari Remo', '230822105427.jpg', 'Sudah ditampilkan'),
(11, 'Ardian Monang', 7, 'Atraksi Sembur Api', '230822110814.jpg', 'Sudah ditampilkan'),
(14, 'Alief Adam', 5, 'Stand Up Comedi - Roasting Pemerintah', '230822025809.jpg', 'Sedang ditampilkan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penampilan`
--
ALTER TABLE `penampilan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penampilan`
--
ALTER TABLE `penampilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
