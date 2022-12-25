-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2022 pada 03.21
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`) VALUES
(7, 'febryan', 'oi@gmail.com', '$2y$10$XITlp.F1g4g8yZ.mD6zTT./3ELRhGsITEmeQt01h/pDWdLO7y3p6m', 'user'),
(8, 'user', 'oi@gmail.com', '$2y$10$1NrKQx.Ww/QV1zSCporFieQ8Oxtse0SH6TV6aQP2D5VYwGGSNQ5ky', 'user'),
(10, '111', 'namaku@mail.com', '$2y$10$lexp0vyMEOC64pkBS70EI.hjAtNAS7I7XV69OlMwRLBoyj3n1QrGG', 'user'),
(11, 'hai', 'hai', '$2y$10$OCGxn/KlE677NQaybkFE5.XQuqLZIH.m3DimpdyqQW.WD2bHDgqN2', 'user'),
(12, 'admin', 'admin@gmail.com', '$2y$10$YUZ3vAVLRhY6uFJUq7oWw.CDAMsrHQeUTOniGR88soYE2NgOLcqnK', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
