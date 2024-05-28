-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Rafli', 'raflidaffapratama', '$2y$10$ovCwRoOHrsxQCBExi7NSCuPUD0Gv8UIBM15Ty7ou2tcsrOuOIGeWK', 'admin'),
(2, 'Belva', 'belva', '$2y$10$JKAl72Y/XBQqBtZS0ne5Q.sNPerhEzKdpkFPgZcw7zC84jwgN.IiW', 'pegawai'),
(3, 'Ulfa', 'ulfa', '$2y$10$7vMHCja.Vz2FPPDdgdgdfO0mfTwmWleoPvdsfjor/YfZQIg91HF0u', 'pegawai'),
(4, 'Irfan', 'irfan', '$2y$10$/xzqvelWuyA2iCsuBzvvu.g17uEJ9RVMmHec5htH1fnT9fdK7FE2S', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `nama`, `jenis`, `kondisi`, `jumlah`, `deskripsi`, `gambar`) VALUES
(20, 'Printer', 'Peralatan Kantor', 'Baik', 1, 'Epson L110 merupakan printer yang menggunakan sistem CIS atau Ink tank, sehingga tidak perlu menggunakan cartridge dan dalam pengisian tintanya cukup isi ulang. Printer ini diproduksi oleh merk Epson yang menjadi salah satu produsen ternama yang memproduk', 'epsonl110.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_permintaan` int(11) NOT NULL,
  `nama_aset` varchar(100) DEFAULT NULL,
  `jenis_aset` varchar(100) DEFAULT NULL,
  `permasalahan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_permintaan`, `nama_aset`, `jenis_aset`, `permasalahan`, `tanggal`, `id`) VALUES
(14, 'Printer', 'Peralatan Kantor', 'Tidak bisa digunakan untuk print', '2024-05-28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `id_aset` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `alasan`, `id`, `id_aset`) VALUES
(1, 'sadads', 2, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id` (`id`),
  ADD KEY `id_aset` (`id_aset`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `akun` (`id`);

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `akun` (`id`),
  ADD CONSTRAINT `permintaan_ibfk_2` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
