-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 05:55 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(110) NOT NULL,
  `nama_obat` varchar(110) NOT NULL,
  `untuk_sakit` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id`, `kode_obat`, `nama_obat`, `untuk_sakit`, `harga`, `stok`) VALUES
(1, 'obt-01', 'obat 1', 'sakit', '10000', 101),
(2, 'obt-02', 'obat 2', 'sakit', '20000', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `syarat_daftar` varchar(100) NOT NULL,
  `status_pasien` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `keluhan`, `no_telp`, `syarat_daftar`, `status_pasien`, `tanggal_daftar`, `id_user`) VALUES
(1, 'deni', 'Jember', '2022-01-01', 'L', 'sakit', 2147483647, 'user_1655061738.jpeg', 0, '2022-06-01', 3),
(2, 'sindy', 'Jember', '2022-01-01', 'P', 'sakit', 2147483647, 'user_1655061738.jpeg', 1, '2022-06-01', 3),
(3, 'aaa', 'Jember', '2022-01-01', 'L', 'sakit', 2147483647, 'user_1655061738.jpeg', 2, '2022-05-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pasien`, `total`, `bayar`, `kembali`, `tanggal_transaksi`) VALUES
(21, 3, 1000, 2000, 1000, '2022-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `email`, `level`, `status_user`) VALUES
(1, 'dokter', 'dokter', '202cb962ac59075b964b07152d234b70', 'dokter@gmail.com', 'dokter', 1),
(2, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 'admin', 1),
(3, 'deni', 'deni', '43f41d127a81c54d4c8f5f93daeb7118', 'buhori100396@gmail.com', 'pasien', 0),
(4, 'sindy', 'sindy', '1daca5ec2fa24f3ee392b9f16afb5975', 'denih1360@gmail.com', 'pasien', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
