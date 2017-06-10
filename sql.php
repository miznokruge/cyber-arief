-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`, `email`) VALUES
(1,	'arief',	'123',	'admin',	'arief@gmail.com'),
(8,	'asd',	'admin',	'user',	'ariefbrekele11@ymail.com'),
(9,	'akbar',	'123',	'user',	'admin@gmail.com'),
(10,	'rania',	'123',	'user',	'rania@gmail.com'),
(11,	'rania rania',	'123aaaaaa',	'user',	'admin@gmail.com'),
(12,	'emil',	'123',	'user',	'emil@gmail.com');

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`id`, `name`, `phone`, `address`) VALUES
(1,	'Arief',	NULL,	NULL),
(2,	'Eldwin',	NULL,	NULL),
(3,	'MIzno',	NULL,	NULL);

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `goods` (`id`, `name`, `price`) VALUES
(1,	'Sabun Mandi LIfebuoy 12*',	'30000'),
(2,	'Indomie Ayam Goreng',	'3400');

DROP TABLE IF EXISTS `kategori_brg`;
CREATE TABLE `kategori_brg` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori_brg` (`id_kategori`, `nama_kategori`) VALUES
(10,	'handpone'),
(11,	'aksesoris');

DROP TABLE IF EXISTS `master_brg`;
CREATE TABLE `master_brg` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `harga` varchar(1000) NOT NULL,
  `stock` int(100) NOT NULL,
  `tgl_beli` varchar(30) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `dibeli` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `master_brg` (`id_barang`, `nama_barang`, `id_kategori`, `merk`, `harga`, `stock`, `tgl_beli`, `kode_barang`, `status`, `dibeli`) VALUES
(4,	'OPPO F10000',	10,	'OPPO',	'1000000000',	0,	'29/Apr/2017-,22:32:07 pm',	'PPPP',	0,	0),
(5,	'JBL earphone',	11,	'JBL',	'200000',	17,	'08/May/2017-,14:50:33 pm',	'PO98',	1,	2),
(7,	'S8+',	10,	'SAMSUNG',	'20000000',	6,	'11/May/2017-,9:03:28 am',	'UBAH',	0,	0);

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `sales_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payments_sales1` (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_sales_customer` (`customer_id`),
  CONSTRAINT `fk_sales_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sales` (`id`, `no`, `date`, `customer_id`, `status`) VALUES
(1,	'Culpa ea explicabo Placeat dolor aperiam accu',	'10-Jul-1994',	3,	0);

DROP TABLE IF EXISTS `sales_detail`;
CREATE TABLE `sales_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sales_has_barang_barang1` (`barang_id`),
  KEY `fk_sales_has_barang_sales1` (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sales_detail` (`id`, `sales_id`, `barang_id`, `qty`, `price`) VALUES
(1,	0,	2,	'824',	'911'),
(2,	1,	2,	'54',	'221'),
(3,	1,	2,	'816',	'571'),
(4,	1,	2,	'818',	'9000'),
(5,	1,	1,	'2',	'4000');

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `total_harga` int(150) NOT NULL,
  `nama_pembeli` varchar(150) NOT NULL,
  `norek` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `pembayaran` varchar(150) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transactions` (`id_transaksi`, `total_harga`, `nama_pembeli`, `norek`, `alamat`, `pembayaran`) VALUES
(46,	0,	'',	'',	'',	''),
(47,	0,	'',	'',	'',	''),
(48,	0,	'',	'',	'',	''),
(49,	0,	'',	'',	'',	''),
(50,	0,	'',	'',	'',	''),
(51,	0,	'',	'',	'',	''),
(52,	0,	'',	'',	'',	''),
(53,	0,	'',	'',	'',	''),
(54,	0,	'',	'',	'',	''),
(55,	0,	'',	'',	'',	''),
(56,	0,	'',	'',	'',	''),
(57,	2000246,	'',	'',	'',	''),
(58,	2000246,	'',	'',	'',	''),
(59,	3000369,	'',	'',	'',	''),
(60,	3000369,	'',	'',	'',	''),
(61,	1000123,	'',	'',	'',	''),
(62,	1000123,	'',	'',	'',	''),
(63,	1000123,	'',	'',	'',	''),
(64,	101245,	'',	'',	'',	''),
(65,	123,	'',	'',	'',	''),
(66,	0,	'',	'',	'',	''),
(67,	123,	'',	'',	'',	''),
(68,	0,	'',	'',	'',	''),
(69,	0,	'',	'',	'',	''),
(70,	123,	'',	'',	'',	''),
(71,	0,	'',	'',	'',	''),
(72,	1000123,	'',	'',	'',	''),
(73,	123,	'',	'',	'',	''),
(74,	202121,	'',	'',	'',	''),
(75,	1000246,	'',	'',	'',	''),
(76,	369,	'',	'',	'',	''),
(77,	101122,	'',	'',	'',	''),
(78,	202244,	'',	'',	'',	''),
(79,	1000123,	'',	'',	'',	''),
(80,	100999,	'',	'',	'',	''),
(81,	100999,	'',	'',	'',	''),
(82,	1101122,	'',	'',	'',	''),
(83,	0,	'',	'',	'',	''),
(84,	1000123,	'',	'',	'',	''),
(85,	200000,	'',	'',	'',	''),
(86,	1000000000,	'',	'',	'',	''),
(87,	20000000,	'',	'',	'',	''),
(88,	400000,	'',	'',	'',	''),
(89,	0,	'',	'',	'',	''),
(90,	20000000,	'',	'',	'',	''),
(91,	0,	'eca',	'123',	'123',	'debit'),
(92,	0,	'arief',	'123',	'123',	'cash'),
(93,	20200000,	'eca',	'123',	'123',	'cash'),
(94,	0,	'',	'',	'',	''),
(95,	200000,	'eca',	'',	'',	'debit'),
(96,	200000,	'',	'',	'',	''),
(97,	200000,	'',	'',	'',	''),
(98,	200000,	'',	'',	'',	'debit'),
(99,	20400000,	'',	'',	'',	'');

DROP TABLE IF EXISTS `transaction_details`;
CREATE TABLE `transaction_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah_harga` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `qty`, `jumlah_harga`) VALUES
(40,	46,	6,	1,	1000123),
(41,	47,	4,	1,	123),
(42,	47,	5,	1,	100999),
(43,	47,	6,	1,	1000123),
(44,	48,	5,	3,	302997),
(45,	48,	6,	1,	1000123),
(46,	49,	5,	1,	100999),
(47,	49,	6,	1,	1000123),
(48,	50,	5,	2,	201998),
(49,	50,	6,	2,	2000246),
(50,	53,	5,	1,	100999),
(51,	53,	6,	3,	3000369),
(52,	54,	4,	1,	123),
(53,	55,	6,	1,	1000123),
(54,	56,	5,	1,	100999),
(55,	56,	6,	1,	1000123),
(56,	57,	6,	2,	2000246),
(57,	59,	6,	1,	1000123),
(58,	61,	6,	1,	1000123),
(59,	62,	6,	1,	1000123),
(60,	63,	6,	1,	1000123),
(61,	64,	4,	2,	246),
(62,	64,	5,	1,	100999),
(63,	67,	4,	105,	12915),
(64,	70,	4,	1,	123),
(65,	72,	6,	1,	1000123),
(66,	74,	4,	1,	123),
(67,	74,	5,	2,	201998),
(68,	75,	4,	1,	123),
(69,	75,	6,	1,	1000123),
(70,	76,	4,	1,	123),
(71,	77,	4,	1,	123),
(72,	77,	5,	1,	100999),
(73,	78,	4,	2,	246),
(74,	78,	5,	2,	201998),
(75,	79,	7,	1,	1000123),
(76,	80,	5,	1,	100999),
(77,	81,	5,	1,	100999),
(78,	82,	5,	1,	100999),
(79,	82,	7,	1,	1000123),
(80,	84,	7,	1,	1000123),
(81,	85,	5,	1,	200000),
(82,	86,	4,	1,	1000000000),
(83,	87,	7,	1,	20000000),
(84,	88,	5,	2,	400000),
(85,	90,	7,	1,	20000000),
(86,	93,	5,	1,	200000),
(87,	93,	7,	1,	20000000),
(88,	95,	5,	1,	200000),
(89,	96,	5,	1,	200000),
(90,	97,	5,	1,	200000),
(91,	98,	5,	2,	400000),
(92,	99,	5,	2,	400000),
(93,	99,	7,	1,	20000000);

-- 2017-05-28 05:52:15