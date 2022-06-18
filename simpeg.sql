-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 07:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `role`) VALUES
('1329010001', '$2y$10$TwFUnueVyU3XrteSk7OoLuv/Yh0RD8QqldBvVR8M/gGsGrmpOgcZK', 'pegawai'),
('1329010002', '$2y$10$eXpm55oYbKKburWN0WS1lO2DM6ANIBt90pZPRSmZxBIG5QgjpFC3G', 'pegawai'),
('1329010004', '$2y$10$JslWPtT0gixJLiFzQiESQeDixLlELgHhxxhtvXyrrpFVHfFZ75pny', 'pegawai'),
('1329010006', '$2y$10$SJPc21jw/Js.SqH0Rj./HuBgogx0I0stTM18G2N/a.ERAELiIY9/W', 'pegawai'),
('admin', '$2y$10$hehGBCI76TJGnnJWn9uPzuBhHgHSj0PqGUGJkZZO.quVqM/qqC88y', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(2) NOT NULL,
  `tanggal_mulai_cuti` date NOT NULL,
  `tanggal_akhir_cuti` date NOT NULL,
  `alasan_cuti` varchar(200) NOT NULL,
  `nip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `tanggal_mulai_cuti`, `tanggal_akhir_cuti`, `alasan_cuti`, `nip`) VALUES
(1, '2022-05-05', '2022-05-12', 'Sakit', 1329010001);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_gaji`
--

CREATE TABLE `jabatan_gaji` (
  `id_jabatan_gaji` int(2) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji_pokok` int(10) NOT NULL,
  `gaji_lembur` int(10) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan_gaji`
--

INSERT INTO `jabatan_gaji` (`id_jabatan_gaji`, `nama_jabatan`, `gaji_pokok`, `gaji_lembur`, `tanggal_mulai`, `tanggal_akhir`) VALUES
(4, 'Security', 3000000, 500000, '2022-06-03', '2023-07-03'),
(5, 'Security', 3000000, 500000, '2022-06-03', '2023-07-03'),
(6, 'Staff IT', 10000000, 700000, '2022-06-03', '2023-06-03'),
(7, 'Staff Marketing', 4000000, 500000, '2022-06-03', '2022-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` int(10) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `status_pegawai` varchar(10) NOT NULL,
  `id_jabatan_gaji` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `tempat_lahir`, `tgl_lahir`, `jk`, `no_hp`, `email`, `alamat`, `status_pegawai`, `id_jabatan_gaji`) VALUES
(1329010001, 'Fulan Fulani', 'Amsterdam', '2000-05-01', 'Laki-laki', '081234567890', 'fulanfulini@gmail.com', 'Jl. Terang Bulan No. 1090', 'Aktif', 7),
(1329010002, 'Kayla Atsila Ivanka', 'Palembang', '2003-01-29', 'Perempuan', '082312566464', 'ikaylaatsila.ka@gmail.com', 'Jl. Ki Marogan No. 2098 RT. 35 RW. 7 Kel. Kemang Agung Kec. Kertapati', 'Aktif', 0),
(1329010004, 'Alberto Ernesto', 'Mexico', '1990-06-06', 'Laki-laki', '0811111111', 'alberto@gmail.com', 'Mexico City', 'Aktif', 4),
(1329010006, 'Kayla', 'Palembang', '2022-06-03', 'Perempuan', '082312566464', 'ikaylaatsila.ka@gmail.com', 'Jl. Ki Marogan No. 2098 RT. 35 RW. 7 Kel. Kemang Agung Kec. Kertapati', 'Aktif', 6);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `jam_presensi` time(6) NOT NULL,
  `tanggal_presensi` date NOT NULL,
  `nip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `jam_presensi`, `tanggal_presensi`, `nip`) VALUES
(1, '06:25:47.000000', '2022-05-02', 1329010001),
(2, '06:10:09.000000', '2022-05-03', 1329010001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `jabatan_gaji`
--
ALTER TABLE `jabatan_gaji`
  ADD PRIMARY KEY (`id_jabatan_gaji`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan_gaji`
--
ALTER TABLE `jabatan_gaji`
  MODIFY `id_jabatan_gaji` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `nip` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1329010007;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
