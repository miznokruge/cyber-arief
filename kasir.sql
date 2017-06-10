-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 03:06 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`, `email`) VALUES
(1, 'arief', '123', 'admin', 'arief@gmail.com'),
(8, 'asd', 'admin', 'user', 'ariefbrekele11@ymail.com'),
(9, 'akbar', '123', 'user', 'admin@gmail.com'),
(10, 'rania', '123', 'user', 'rania@gmail.com'),
(11, 'rania rania', '123aaaaaa', 'user', 'admin@gmail.com'),
(12, 'emil', '123', 'user', 'emil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_brg`
--

CREATE TABLE `kategori_brg` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_brg`
--

INSERT INTO `kategori_brg` (`id_kategori`, `nama_kategori`) VALUES
(10, 'handpone'),
(11, 'aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `master_brg`
--

CREATE TABLE `master_brg` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `harga` varchar(1000) NOT NULL,
  `stock` int(100) NOT NULL,
  `tgl_beli` varchar(30) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `dibeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_brg`
--

INSERT INTO `master_brg` (`id_barang`, `nama_barang`, `id_kategori`, `merk`, `harga`, `stock`, `tgl_beli`, `kode_barang`, `status`, `dibeli`) VALUES
(4, 'OPPO F10000', 10, 'OPPO', '1000000000', 0, '29/Apr/2017-,22:32:07 pm', 'PPPP', 0, 0),
(5, 'JBL earphone', 11, 'JBL', '200000', 17, '08/May/2017-,14:50:33 pm', 'PO98', 1, 2),
(7, 'S8+', 10, 'SAMSUNG', '20000000', 6, '11/May/2017-,9:03:28 am', 'UBAH', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaksi` int(11) NOT NULL,
  `total_harga` int(150) NOT NULL,
  `nama_pembeli` varchar(150) NOT NULL,
  `norek` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `pembayaran` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaksi`, `total_harga`, `nama_pembeli`, `norek`, `alamat`, `pembayaran`) VALUES
(46, 0, '', '', '', ''),
(47, 0, '', '', '', ''),
(48, 0, '', '', '', ''),
(49, 0, '', '', '', ''),
(50, 0, '', '', '', ''),
(51, 0, '', '', '', ''),
(52, 0, '', '', '', ''),
(53, 0, '', '', '', ''),
(54, 0, '', '', '', ''),
(55, 0, '', '', '', ''),
(56, 0, '', '', '', ''),
(57, 2000246, '', '', '', ''),
(58, 2000246, '', '', '', ''),
(59, 3000369, '', '', '', ''),
(60, 3000369, '', '', '', ''),
(61, 1000123, '', '', '', ''),
(62, 1000123, '', '', '', ''),
(63, 1000123, '', '', '', ''),
(64, 101245, '', '', '', ''),
(65, 123, '', '', '', ''),
(66, 0, '', '', '', ''),
(67, 123, '', '', '', ''),
(68, 0, '', '', '', ''),
(69, 0, '', '', '', ''),
(70, 123, '', '', '', ''),
(71, 0, '', '', '', ''),
(72, 1000123, '', '', '', ''),
(73, 123, '', '', '', ''),
(74, 202121, '', '', '', ''),
(75, 1000246, '', '', '', ''),
(76, 369, '', '', '', ''),
(77, 101122, '', '', '', ''),
(78, 202244, '', '', '', ''),
(79, 1000123, '', '', '', ''),
(80, 100999, '', '', '', ''),
(81, 100999, '', '', '', ''),
(82, 1101122, '', '', '', ''),
(83, 0, '', '', '', ''),
(84, 1000123, '', '', '', ''),
(85, 200000, '', '', '', ''),
(86, 1000000000, '', '', '', ''),
(87, 20000000, '', '', '', ''),
(88, 400000, '', '', '', ''),
(89, 0, '', '', '', ''),
(90, 20000000, '', '', '', ''),
(91, 0, 'eca', '123', '123', 'debit'),
(92, 0, 'arief', '123', '123', 'cash'),
(93, 20200000, 'eca', '123', '123', 'cash'),
(94, 0, '', '', '', ''),
(95, 200000, 'eca', '', '', 'debit'),
(96, 200000, '', '', '', ''),
(97, 200000, '', '', '', ''),
(98, 200000, '', '', '', 'debit'),
(99, 20400000, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `qty`, `jumlah_harga`) VALUES
(40, 46, 6, 1, 1000123),
(41, 47, 4, 1, 123),
(42, 47, 5, 1, 100999),
(43, 47, 6, 1, 1000123),
(44, 48, 5, 3, 302997),
(45, 48, 6, 1, 1000123),
(46, 49, 5, 1, 100999),
(47, 49, 6, 1, 1000123),
(48, 50, 5, 2, 201998),
(49, 50, 6, 2, 2000246),
(50, 53, 5, 1, 100999),
(51, 53, 6, 3, 3000369),
(52, 54, 4, 1, 123),
(53, 55, 6, 1, 1000123),
(54, 56, 5, 1, 100999),
(55, 56, 6, 1, 1000123),
(56, 57, 6, 2, 2000246),
(57, 59, 6, 1, 1000123),
(58, 61, 6, 1, 1000123),
(59, 62, 6, 1, 1000123),
(60, 63, 6, 1, 1000123),
(61, 64, 4, 2, 246),
(62, 64, 5, 1, 100999),
(63, 67, 4, 105, 12915),
(64, 70, 4, 1, 123),
(65, 72, 6, 1, 1000123),
(66, 74, 4, 1, 123),
(67, 74, 5, 2, 201998),
(68, 75, 4, 1, 123),
(69, 75, 6, 1, 1000123),
(70, 76, 4, 1, 123),
(71, 77, 4, 1, 123),
(72, 77, 5, 1, 100999),
(73, 78, 4, 2, 246),
(74, 78, 5, 2, 201998),
(75, 79, 7, 1, 1000123),
(76, 80, 5, 1, 100999),
(77, 81, 5, 1, 100999),
(78, 82, 5, 1, 100999),
(79, 82, 7, 1, 1000123),
(80, 84, 7, 1, 1000123),
(81, 85, 5, 1, 200000),
(82, 86, 4, 1, 1000000000),
(83, 87, 7, 1, 20000000),
(84, 88, 5, 2, 400000),
(85, 90, 7, 1, 20000000),
(86, 93, 5, 1, 200000),
(87, 93, 7, 1, 20000000),
(88, 95, 5, 1, 200000),
(89, 96, 5, 1, 200000),
(90, 97, 5, 1, 200000),
(91, 98, 5, 2, 400000),
(92, 99, 5, 2, 400000),
(93, 99, 7, 1, 20000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori_brg`
--
ALTER TABLE `kategori_brg`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `master_brg`
--
ALTER TABLE `master_brg`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kategori_brg`
--
ALTER TABLE `kategori_brg`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `master_brg`
--
ALTER TABLE `master_brg`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
