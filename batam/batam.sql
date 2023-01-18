-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2022 pada 09.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `level_admin` int(11) NOT NULL,
  `tanggal_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username`, `password`, `foto`, `email_admin`, `level_admin`, `tanggal_buat`) VALUES
('ADM0001', 'Administrator', 'admin', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11.jpeg', 'admin@gmail.com', 1, '2022-07-11'),
('ADM0002', 'mardoni efendi', 'mardoni', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Screenshot_(169)1.png', 'mardoni@gmail.com', 1, '2022-07-07'),
('ADM0003', 'Kasir pos 1', 'kasir1', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '1.jpeg', 'kasirpos1@gmail.com', 2, '2022-07-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kd_jadwal` varchar(50) NOT NULL,
  `kode_kapal` varchar(50) NOT NULL,
  `kode_tujuan` varchar(50) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `harga_dewasa` int(15) NOT NULL,
  `harga_anak` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kode_kapal`, `kode_tujuan`, `kode_kelas`, `jam_berangkat`, `tgl_berangkat`, `harga_dewasa`, `harga_anak`) VALUES
('J0001', 'KAP004', 'TJ002', 'KEL00001', '09:00:00', '2022-07-11', 150000, 135000),
('J0002', 'KAP004', 'TJ002', 'KEL00002', '09:00:00', '2022-07-11', 185000, 165000),
('J0003', 'KAP001', 'TJ001', 'KEL00001', '08:00:00', '2022-07-11', 150000, 135000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal`
--

CREATE TABLE `tbl_kapal` (
  `kd_kapal` varchar(50) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kapal`
--

INSERT INTO `tbl_kapal` (`kd_kapal`, `nama_kapal`) VALUES
('KAP001', 'Kapal Ferry A'),
('KAP002', 'Kapal Ferry B'),
('KAP003', 'Kapal Ferry C'),
('KAP004', 'Kapal Ferry Sentosa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kd_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kelas_harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kd_kelas`, `nama_kelas`, `kelas_harga`) VALUES
('KEL00001', 'Ekonomi', 50000),
('KEL00002', 'Eksekutif', 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `kd_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`kd_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `kd_order` varchar(50) NOT NULL,
  `nama_order` varchar(250) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat_order` varchar(250) NOT NULL,
  `kota_order` varchar(250) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `kode_tujuan_order` varchar(100) NOT NULL,
  `tgl_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`kd_order`, `nama_order`, `umur`, `alamat_order`, `kota_order`, `no_hp`, `tgl_berangkat`, `kode_tujuan_order`, `tgl_pesan`) VALUES
('ORD00006', 'siok', 22, 'bungus teluk kabung', 'padang', '081276425368', '2022-07-11', 'J0003', '2022-07-10'),
('ORD00007', 'mardoni efendi', 24, '', '', '', '2022-07-10', 'J0002', '2022-07-10'),
('ORD00008', 'widya wardah hamdani', 22, 'Koto Baru', 'Kabupaten Sijunjung', '081218081645', '2022-07-10', 'J0002', '2022-07-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `kd_tiket` varchar(50) NOT NULL,
  `kode_order` varchar(50) NOT NULL,
  `total_bayar` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`kd_tiket`, `kode_order`, `total_bayar`) VALUES
('TORD00006J000320220711', 'ORD00006', 150000),
('TORD00007J000220220711', 'ORD00007', 185000),
('TORD00008J000220220711', 'ORD00008', 185000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tujuan`
--

CREATE TABLE `tbl_tujuan` (
  `kd_tujuan` varchar(50) NOT NULL,
  `kota_tujuan` varchar(255) NOT NULL,
  `nama_pelabuhan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tujuan`
--

INSERT INTO `tbl_tujuan` (`kd_tujuan`, `kota_tujuan`, `nama_pelabuhan`) VALUES
('TJ001', 'Kota A', 'Pelabuhan A'),
('TJ002', 'Kota B', 'Pelabuhan C'),
('TJ003', 'Kota C', 'Pelabuhan ABCD');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indeks untuk tabel `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  ADD PRIMARY KEY (`kd_kapal`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`kd_level`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`kd_order`);

--
-- Indeks untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`kd_tiket`);

--
-- Indeks untuk tabel `tbl_tujuan`
--
ALTER TABLE `tbl_tujuan`
  ADD PRIMARY KEY (`kd_tujuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `kd_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
