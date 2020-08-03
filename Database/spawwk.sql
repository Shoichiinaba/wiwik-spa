-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Agu 2020 pada 14.13
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` varchar(15) NOT NULL,
  `item` varchar(40) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `item`, `harga`, `stock`) VALUES
('BRG-2020-0001', 'Sabun', 5000, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` varchar(15) NOT NULL,
  `jasa` varchar(50) NOT NULL,
  `biaya` int(10) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `komisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `jasa`, `biaya`, `kategori`, `jenis`, `komisi`) VALUES
('JS-2020-0001', 'Treadment', 100000, 'UmuM', 'Spa', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
  `alamat_karyawan` text,
  `photo_karyawan` varchar(100) DEFAULT NULL,
  `status_karyawan` int(11) NOT NULL COMMENT '1: aktif, 2: non aktif',
  `created` varchar(10) NOT NULL,
  `updated` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `NIP`, `id_level`, `nama_karyawan`, `email`, `password`, `notelp_karyawan`, `branch`, `alamat_karyawan`, `photo_karyawan`, `status_karyawan`, `created`, `updated`) VALUES
(67, 'dasfda', 1, 'Shoichi Inaba', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 0, '', NULL, 1, '', '29-07-2020'),
(75, '', 2, 'Agus', 'agus@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '4653 7374 53__', 0, 'gehdnxn', NULL, 1, '', '29-07-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) NOT NULL,
  `salary` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `salary`) VALUES
(1, 'admin', NULL),
(2, 'kasir', NULL),
(3, 'member', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` bigint(13) NOT NULL,
  `kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `telp`, `kelompok`) VALUES
('PEL-2020-0001', 'Kirun', 'Semarang', 674848, 1),
('PEL-2020-0002', 'Nasirin', 'Demak', 6858579, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `terapis`
--

CREATE TABLE `terapis` (
  `id_terapis` varchar(15) NOT NULL,
  `nama_terapis` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `tlp` bigint(13) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `setatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `terapis`
--

INSERT INTO `terapis` (`id_terapis`, `nama_terapis`, `alamat`, `tlp`, `foto`, `setatus`) VALUES
('TRPS-2020-0001', 'Tomiko Van', 'JANGLI TLAWAH RT 09 RW 05', 897767766500, 'default.png', 1),
('TRPS-2020-0002', 'Yuri Masuda', 'Semarang', 9899489804876, 'default.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(40) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_karyawan` varchar(30) NOT NULL,
  `id_pelanggan` varchar(40) NOT NULL,
  `id_terapis` varchar(30) NOT NULL,
  `id_jasa` varchar(20) NOT NULL,
  `harga_jasa` int(11) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `komisi` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `dibuat` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `id_karyawan`, `id_pelanggan`, `id_terapis`, `id_jasa`, `harga_jasa`, `id_barang`, `harga_barang`, `qty`, `total_harga`, `komisi`, `cash`, `dibuat`) VALUES
('STR-2020-0001', '2020-08-03', '67', 'PEL-2020-0001', 'TRPS-2020-0002', 'TRPS-2020-0002', 50000, 'BRG-2020-0001', 5000, 1, 45000, 10000, 50000, '2020-08-03 18:09:38');

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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
