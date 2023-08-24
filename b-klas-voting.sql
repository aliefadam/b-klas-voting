-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Waktu pembuatan: 24 Agu 2023 pada 13.41
=======
-- Waktu pembuatan: 23 Agu 2023 pada 23.41
>>>>>>> main
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
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$gd1/IzPoZ3EFE3CII6I0C.z1TDlGrgc0vmVdr/docXIeJlD9a8vkS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penampilan`
--

CREATE TABLE `penampilan` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `total_skor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

<<<<<<< HEAD
--
-- Dumping data untuk tabel `penampilan`
--

INSERT INTO `penampilan` (`id`, `id_peserta`, `total_skor`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 3, 0),
(6, 4, 0),
(7, 1, 0),
(8, 4, 0),
(9, 1, 0),
(10, 2, 0),
(11, 3, 0),
(12, 3, 0),
(13, 2, 0),
(14, 1, 0),
(15, 4, 0),
(16, 3, 0),
(17, 1, 0),
(18, 2, 0),
(19, 4, 0),
(20, 4, 0),
(21, 1, 0),
(22, 2, 0),
(23, 3, 0),
(24, 2, 0);

=======
>>>>>>> main
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

<<<<<<< HEAD
INSERT INTO `peserta` (`id`, `nama`, `dawis`, `penampilan`, `foto`, `status`) VALUES
(1, 'Alief adam', 21, 'Reog', '230824102413.jpg', 'Belum ditampilkan'),
(2, 'Baim', 24, 'Testing', '230824105809.jpg', 'Sedang ditampilkan'),
(3, 'Ardian Monang', 7, 'Dolanan Ilmu Magic', '230824113716.png', 'Belum ditampilkan'),
(4, 'ssss', 12, 'sssss', '230824122001.png', 'Belum ditampilkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

=======
>>>>>>> main
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
<<<<<<< HEAD

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`) VALUES
(1, 'Penonton'),
(2, 'Penonton 2'),
(3, 'Penonton 3'),
(4, 'Penonton 4');
=======
>>>>>>> main

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penampilan`
--
ALTER TABLE `penampilan`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> main

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> main

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> main
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
