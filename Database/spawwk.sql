-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 11:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spawwk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` varchar(20) NOT NULL,
  `item` varchar(40) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `item`, `harga`, `stock`) VALUES
('BRG-2020-0001', 'ubah barang 1', 123, 123);

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` varchar(20) NOT NULL,
  `jasa` varchar(50) NOT NULL,
  `biaya` int(10) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `komisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `jasa`, `biaya`, `kategori`, `jenis`, `komisi`) VALUES
('JS-2020-0001', 'ubah jasa 1', 123, 'kategori 1', 'jenis 1', 12);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `id_level` int(11) DEFAULT NULL COMMENT '1: admin, 2: kasir, 3:pelanggan',
  `nama_karyawan` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `notelp_karyawan` varchar(16) DEFAULT NULL,
  `branch` int(2) NOT NULL COMMENT '1 : toko 1, 2: toko 2',
  `alamat_karyawan` text DEFAULT NULL,
  `photo_karyawan` varchar(100) DEFAULT NULL,
  `status_karyawan` int(11) NOT NULL COMMENT '1: aktif, 2: non aktif',
  `created` varchar(10) NOT NULL,
  `updated` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `NIP`, `id_level`, `nama_karyawan`, `email`, `password`, `notelp_karyawan`, `branch`, `alamat_karyawan`, `photo_karyawan`, `status_karyawan`, `created`, `updated`) VALUES
(67, 'dasfda', 1, 'Shoichi Inaba', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 0, '', NULL, 1, '', '29-07-2020'),
(75, '', 2, 'Agus', 'agus@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '4653 7374 53__', 0, 'gehdnxn', NULL, 1, '', '29-07-2020');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) NOT NULL,
  `salary` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `salary`) VALUES
(1, 'admin', NULL),
(2, 'kasir', NULL),
(3, 'member', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` bigint(13) NOT NULL,
  `kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `telp`, `kelompok`) VALUES
('PEL-2020-0002', 'ubah pelanggan 2', 'alamat 2', 123, 1),
('PEL-2020-0003', 'ubah pelanggan 3', 'alamat 3', 321, 2),
('PEL-2020-0004', 'pelanggan 4', 'alamat 4', 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `terapis`
--

CREATE TABLE `terapis` (
  `id_terapis` varchar(11) NOT NULL,
  `nama_terapis` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `tlp` bigint(13) NOT NULL,
  `setatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terapis`
--

INSERT INTO `terapis` (`id_terapis`, `nama_terapis`, `alamat`, `tlp`, `setatus`) VALUES
('TRP_001', 'Tomiko Van', 'JL MANDASIA I/288 RT 06 RW 01', 896544454, 1),
('TRP_002', 'Yuri Masuda', 'JANGLI TLAWAH RT 09 RW 05', 8965444686, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `terapis`
--
ALTER TABLE `terapis`
  ADD PRIMARY KEY (`id_terapis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
