-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 08:56 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `level_admin` int(11) NOT NULL,
  `tanggal_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username`, `password`, `email_admin`, `level_admin`, `tanggal_buat`) VALUES
('ADM0001', 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', 1, '2022-07-11'),
('ADM0002', 'mardoni efendi', 'mardoni', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'mardoni@gmail.com', 1, '2022-07-07'),
('ADM0003', 'Kasir pos 2', 'kasir2', '8691e4fc53b99da544ce86e22acba62d13352eff', 'kasirpos2@gmail.com', 2, '2022-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kd_jadwal` varchar(50) NOT NULL,
  `kode_kapal` varchar(50) NOT NULL,
  `kode_tujuan` varchar(50) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `harga_dewasa` int(15) NOT NULL,
  `harga_anak` int(15) NOT NULL,
  `jml_kursi` int(11) NOT NULL,
  `jml_kursi_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kode_kapal`, `kode_tujuan`, `kode_kelas`, `jam_berangkat`, `tgl_berangkat`, `harga_dewasa`, `harga_anak`, `jml_kursi`, `jml_kursi_pesan`) VALUES
('J0001', 'KAP004', 'TJ002', 'KEL00001', '09:00:00', '2022-07-11', 150000, 135000, 50, 45),
('J0002', 'KAP004', 'TJ002', 'KEL00002', '09:00:00', '2022-07-11', 185000, 165000, 25, 21),
('J0003', 'KAP001', 'TJ001', 'KEL00001', '08:00:00', '2022-07-11', 150000, 135000, 50, 50),
('J0004', 'KAP004', 'TJ002', 'KEL00002', '14:30:00', '2022-08-02', 185000, 165000, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kapal`
--

CREATE TABLE `tbl_kapal` (
  `kd_kapal` varchar(50) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kapal`
--

INSERT INTO `tbl_kapal` (`kd_kapal`, `nama_kapal`) VALUES
('KAP001', 'Kapal Ferry A'),
('KAP002', 'Kapal Ferry B'),
('KAP003', 'Kapal Ferry C'),
('KAP004', 'Kapal Ferry Sentosa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kd_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kelas_harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kd_kelas`, `nama_kelas`, `kelas_harga`) VALUES
('KEL00001', 'Ekonomi', 50000),
('KEL00002', 'Eksekutif', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `kd_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`kd_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `kd_order` varchar(50) NOT NULL,
  `kode_jadwal` varchar(50) NOT NULL,
  `nama_order` varchar(250) NOT NULL,
  `umur` int(11) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`kd_order`, `kode_jadwal`, `nama_order`, `umur`, `no_hp`, `tgl_berangkat`, `tgl_pesan`) VALUES
('ORD00003', 'J0001', 'mario vani', 45, '081234567890', '2022-07-11', '2022-08-04'),
('ORD00004', 'J0001', 'mardoni efendi', 45, '081234567890', '2022-07-11', '2022-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `kd_tiket` varchar(50) NOT NULL,
  `kode_order` varchar(50) NOT NULL,
  `total_bayar` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`kd_tiket`, `kode_order`, `total_bayar`) VALUES
('TORD00001J000120220711', 'ORD00001', 150000),
('TORD00002J000220220711', 'ORD00002', 165000),
('TORD00003J000120220711', 'ORD00003', 150000),
('TORD00004J000120220711', 'ORD00004', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tujuan`
--

CREATE TABLE `tbl_tujuan` (
  `kd_tujuan` varchar(50) NOT NULL,
  `kota_tujuan` varchar(255) NOT NULL,
  `nama_pelabuhan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tujuan`
--

INSERT INTO `tbl_tujuan` (`kd_tujuan`, `kota_tujuan`, `nama_pelabuhan`) VALUES
('TJ001', 'Kota A', 'Pelabuhan A'),
('TJ002', 'Kota B', 'Pelabuhan C'),
('TJ003', 'Kota C', 'Pelabuhan ABCD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indexes for table `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  ADD PRIMARY KEY (`kd_kapal`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`kd_level`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`kd_order`);

--
-- Indexes for table `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`kd_tiket`);

--
-- Indexes for table `tbl_tujuan`
--
ALTER TABLE `tbl_tujuan`
  ADD PRIMARY KEY (`kd_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `kd_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
