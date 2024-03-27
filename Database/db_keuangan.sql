-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 10:29 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Namaadmin` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Namaadmin`, `Username`, `Password`) VALUES
('admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `id` int(11) NOT NULL,
  `Kodepenyakit` varchar(250) NOT NULL,
  `Kodegejala` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basispengetahuan`
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
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `Kodegejala` int(10) NOT NULL,
  `Namagejala` varchar(250) NOT NULL,
  `Nilaidensitas` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
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
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `nik` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `jk` text NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nik`, `nama`, `jk`, `alamat`, `telp`, `keluhan`) VALUES
('32432', 'asdsa', '324543543654', '324543543654', '324543543654', 'zxcxzcxzcz');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','Superuser','User','Dokter') NOT NULL,
  `gambar` text NOT NULL,
  `jenis_kelamin` varchar(55) NOT NULL,
  `usia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `alamat`, `username`, `password`, `level`, `gambar`, `jenis_kelamin`, `usia`) VALUES
('A01', 'Natalia', 'Denai', 'Natalia', 'natalia', 'Admin', 'gambar_admin/admin-settings-male.png', 'Perempuan', 22),
('D4681', 'petugassatu', 'semalingkar ', 'petugassatu', 'petugassatu', 'User', 'gambar_admin/icon.png', '', 0),
('D01', 'Dokter1', 'Simalingkar', 'Dokter1', '123', 'Dokter', '', 'Pria', 45);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `No` int(11) NOT NULL,
  `Kodepenyakit` varchar(10) NOT NULL,
  `Namapenyakit` varchar(100) NOT NULL,
  `Solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`No`, `Kodepenyakit`, `Namapenyakit`, `Solusi`) VALUES
(2, '2', 'Abses Periodontal Kronis', '-'),
(1, '1', 'Abses Periodontal Akut', '-');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `ttd` text NOT NULL,
  `dollar` varchar(155) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `ttd`, `dollar`, `gambar`) VALUES
(1, 'asd', '14400', 'gambar_admin/ttd.png');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `antrian` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` decimal(13,0) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `namapenyakit` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`antrian`, `nama`, `nohp`, `nilai`, `namapenyakit`) VALUES
('A01', 'sadas', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kaskeluar`
--

CREATE TABLE `tb_kaskeluar` (
  `id_trx` int(11) NOT NULL,
  `nomor_trx` varchar(25) NOT NULL,
  `keperluan` varchar(55) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah_keluar` varchar(25) NOT NULL,
  `keterangan_keluar` varchar(25) NOT NULL,
  `id_user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kaskeluar`
--

INSERT INTO `tb_kaskeluar` (`id_trx`, `nomor_trx`, `keperluan`, `tgl_keluar`, `jumlah_keluar`, `keterangan_keluar`, `id_user`) VALUES
(4, 'KK001', 'bayar obat', '2022-05-28', '432432432', 'bayar tagihan obat', '34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasmasuk`
--

CREATE TABLE `tb_kasmasuk` (
  `id_trx` int(11) NOT NULL,
  `nomor_trx` varchar(25) NOT NULL,
  `nama_penyetor` varchar(55) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah` varchar(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kasmasuk`
--

INSERT INTO `tb_kasmasuk` (`id_trx`, `nomor_trx`, `nama_penyetor`, `tgl_masuk`, `jumlah`, `keterangan`, `id_user`) VALUES
(3, 'KM001', 'petugassatu', '2022-05-28', '30000', 'pemasukan bayar berobat', '34'),
(4, 'KM002', 'petugassatu', '2022-05-28', '60000', 'BAYAR OBAT ', '34'),
(5, 'KM003', 'petugassatu', '2022-06-13', '70000', 'bayar berobat', '34'),
(6, 'KM004', 'Paula', '2022-03-06', '600000', 'bayar berobat', '34');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `nama` varchar(250) NOT NULL,
  `nilai` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`nama`, `nilai`) VALUES
('11', '0.3'),
('1', '0.5992'),
('21', '0.1008');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`Kodegejala`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`antrian`);

--
-- Indexes for table `tb_kaskeluar`
--
ALTER TABLE `tb_kaskeluar`
  ADD PRIMARY KEY (`id_trx`);

--
-- Indexes for table `tb_kasmasuk`
--
ALTER TABLE `tb_kasmasuk`
  ADD PRIMARY KEY (`id_trx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kaskeluar`
--
ALTER TABLE `tb_kaskeluar`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kasmasuk`
--
ALTER TABLE `tb_kasmasuk`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
