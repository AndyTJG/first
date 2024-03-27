-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2022 pada 13.38
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abses`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Namaadmin` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Namaadmin`, `Username`, `Password`) VALUES
('admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `id` int(11) NOT NULL,
  `Kodepenyakit` varchar(250) NOT NULL,
  `Kodegejala` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basispengetahuan`
--

INSERT INTO `basispengetahuan` (`id`, `Kodepenyakit`, `Kodegejala`) VALUES
(22, '1', '7'),
(9, '1', '3'),
(8, '1', '1'),
(7, '1', '7'),
(6, '1', '6'),
(5, '1', '5'),
(4, '1', '3'),
(3, '1', '4'),
(2, '1', '2'),
(1, '1', '1'),
(39, '2', '8'),
(40, '2', '9'),
(41, '2', '10'),
(42, '2', '11'),
(43, '2', '12'),
(44, '2', '13'),
(45, '2', '14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `Kodegejala` int(10) NOT NULL,
  `Namagejala` varchar(250) NOT NULL,
  `Nilaidensitas` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`Kodegejala`, `Namagejala`, `Nilaidensitas`) VALUES
(7, 'Kesulitan saat berbicara', '0.3'),
(6, 'Ketidaknyamanan saat mengunyah', '0.4'),
(5, 'Warna gusi kemerahan', '0.6'),
(4, 'Gingiva tampak mengkilap ', '0.4'),
(3, 'Gusi berbentuk seperti kubah', '0.3'),
(2, 'Gigi sensitif terhadap perkusi dan mobility', '0.5'),
(1, 'Rasa sakit yang hebat', '0.6'),
(8, 'Bau Mulut', '0.2'),
(9, 'Pembengkakan yang terdapat pus (nanah)', '0.6'),
(10, 'Pembengkakan yang terjadi dengan cepat', '0.6'),
(11, 'Gigi mengalami kegoyangan', '0.4'),
(12, 'Dehidrasi', '0.2'),
(13, 'Demam', '0.2'),
(14, 'Sulit Menelan', '0.3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `No` int(11) NOT NULL,
  `Kodepenyakit` varchar(10) NOT NULL,
  `Namapenyakit` varchar(100) NOT NULL,
  `Solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`No`, `Kodepenyakit`, `Namapenyakit`, `Solusi`) VALUES
(2, '2', 'Abses Periodontal Kronis', '-'),
(1, '1', 'Abses Periodontal Akut', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `nama` varchar(100) NOT NULL,
  `nohp` decimal(13,0) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `namapenyakit` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`nama`, `nohp`, `nilai`, `namapenyakit`) VALUES
('tika', '87865435546', '49', ' Abses Periodontal Akut'),
('Tika', '47644674', '49', ' Abses Periodontal Akut'),
('aldk', '0', '59.92', ' Abses Periodontal Akut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `nama` varchar(250) NOT NULL,
  `nilai` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`nama`, `nilai`) VALUES
('11', '0.3'),
('1', '0.5992'),
('21', '0.1008');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indeks untuk tabel `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`Kodegejala`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
