-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 05:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_dana_bos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_dana_bos`
--

CREATE TABLE `tb_data_dana_bos` (
  `id_bos` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `no_kode` varchar(5) DEFAULT NULL,
  `no_bukti` varchar(15) DEFAULT NULL,
  `uraian` varchar(150) NOT NULL,
  `penerimaan` bigint(100) NOT NULL,
  `pengeluaran` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data_dana_bos`
--

INSERT INTO `tb_data_dana_bos` (`id_bos`, `jenis_id`, `tanggal`, `no_kode`, `no_bukti`, `uraian`, `penerimaan`, `pengeluaran`) VALUES
(6, 1, '2021-07-16 08:32:09', '2', '12/III/2021', 'Gatau bang', 900000, 0),
(7, 1, '2021-07-16 08:32:39', '', '', 'Gatau bang', 50000, 0),
(8, 1, '2021-07-16 08:32:51', '4', '10/III/2021', 'Gatau', 0, 50000),
(9, 1, '2021-07-16 10:25:16', '2', '12/III/2021', 'Gatau', 0, 75000),
(10, 1, '2021-07-16 10:25:38', '3', '15/III/2021', 'Gatau', 0, 175000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_jenis_bos`
--

CREATE TABLE `tb_data_jenis_bos` (
  `id_jenis` int(11) NOT NULL,
  `nama_bos` varchar(50) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data_jenis_bos`
--

INSERT INTO `tb_data_jenis_bos` (`id_jenis`, `nama_bos`, `keterangan`) VALUES
(1, 'Uang Kas', 'Data Dana Uang Kas Umum'),
(2, 'Pembantu Kas Tunai', 'Data Dana Pembantu Kas Tunai'),
(3, 'Pembantu Bank', 'Data Dana Pembantu Bank');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-14 03:54:40', '2021-07-14 03:54:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data_dana_bos`
--
ALTER TABLE `tb_data_dana_bos`
  ADD PRIMARY KEY (`id_bos`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indexes for table `tb_data_jenis_bos`
--
ALTER TABLE `tb_data_jenis_bos`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data_dana_bos`
--
ALTER TABLE `tb_data_dana_bos`
  MODIFY `id_bos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_data_jenis_bos`
--
ALTER TABLE `tb_data_jenis_bos`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_data_dana_bos`
--
ALTER TABLE `tb_data_dana_bos`
  ADD CONSTRAINT `tb_data_dana_bos_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `tb_data_jenis_bos` (`id_jenis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
