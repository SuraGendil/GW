-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 10:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gw`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `pass_admin` varchar(50) DEFAULT NULL,
  `moto_admin` varchar(50) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_jenis_kelamin` int(11) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `nama_admin`, `pass_admin`, `moto_admin`, `id_role`, `id_jenis_kelamin`, `kontak`) VALUES
(1, 'GW_01', 'GW123', 'I dont\'t believe you', 4, 2, '088199121128');

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_kelamin`
--

CREATE TABLE `t_jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jenis_kelamin`
--

INSERT INTO `t_jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_produk`
--

CREATE TABLE `t_jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL,
  `nama_jenis_produk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jenis_produk`
--

INSERT INTO `t_jenis_produk` (`id_jenis_produk`, `nama_jenis_produk`) VALUES
(1, 'Game'),
(2, 'Pulsa'),
(3, 'APK');

-- --------------------------------------------------------

--
-- Table structure for table `t_metode_pembayaran`
--

CREATE TABLE `t_metode_pembayaran` (
  `id_metode_pembayaran` int(11) NOT NULL,
  `nama_metode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_metode_pembayaran`
--

INSERT INTO `t_metode_pembayaran` (`id_metode_pembayaran`, `nama_metode`) VALUES
(1, 'Tranfer Bank'),
(2, 'QR code'),
(3, 'Virtual Account'),
(4, 'M - Banking'),
(5, 'Supermarket');

-- --------------------------------------------------------

--
-- Table structure for table `t_nominal`
--

CREATE TABLE `t_nominal` (
  `id_nominal` int(11) NOT NULL,
  `nama_nominal` varchar(50) DEFAULT NULL,
  `harga_nominal` decimal(12,2) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_nominal`
--

INSERT INTO `t_nominal` (`id_nominal`, `nama_nominal`, `harga_nominal`, `id_produk`) VALUES
(1, '300 dm', '500000000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_pembeli`
--

CREATE TABLE `t_pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `no_pembeli` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pembeli`
--

INSERT INTO `t_pembeli` (`id_pembeli`, `no_pembeli`) VALUES
(1, '18313432');

-- --------------------------------------------------------

--
-- Table structure for table `t_pembelian`
--

CREATE TABLE `t_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_nominal` int(11) DEFAULT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `id_metode_pembelian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pembelian`
--

INSERT INTO `t_pembelian` (`id_pembelian`, `id_nominal`, `id_pembeli`, `id_metode_pembelian`) VALUES
(1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) DEFAULT '',
  `id_jenis_produk` int(11) DEFAULT NULL,
  `foto_produk` varchar(50) DEFAULT '',
  `terjual_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `nama_produk`, `id_jenis_produk`, `foto_produk`, `terjual_produk`) VALUES
(1, 'moblie legends', 1, 'ml.jpg', 1000),
(2, 'Genshin Impact', 1, 'gi.jpg', 1),
(3, 'Dota 2', 1, 'dt2.jpg', 500),
(4, 'Honkai Impact', 1, 'hi.jpg', 10),
(5, 'Disney +++', 3, 'dy.jpg', 23),
(6, 'Netflix', 3, 'nf.jpg', 0),
(7, 'Smartfren', 2, 'sf.jpg', 121),
(8, 'Telkomsel', 2, 'tf.jpg', 213),
(9, 'Axis', 2, 'ax.jpg', 8),
(10, 'Indosar', 2, 'in.jpg', 6),
(11, 'XL', 2, 'xl.jpg', 21),
(12, 'Minecraft', 1, 'mc.jpg', 99);

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `Role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id_role`, `Role`) VALUES
(1, 'Leader'),
(2, 'Admin'),
(3, 'Customer'),
(4, 'Penyusup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `Role` (`id_role`),
  ADD KEY `Jenis Kelamin` (`id_jenis_kelamin`);

--
-- Indexes for table `t_jenis_kelamin`
--
ALTER TABLE `t_jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `t_jenis_produk`
--
ALTER TABLE `t_jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indexes for table `t_metode_pembayaran`
--
ALTER TABLE `t_metode_pembayaran`
  ADD PRIMARY KEY (`id_metode_pembayaran`);

--
-- Indexes for table `t_nominal`
--
ALTER TABLE `t_nominal`
  ADD PRIMARY KEY (`id_nominal`),
  ADD KEY `Produk` (`id_produk`);

--
-- Indexes for table `t_pembeli`
--
ALTER TABLE `t_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `t_pembelian`
--
ALTER TABLE `t_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `Pembeli` (`id_pembeli`),
  ADD KEY `Metode Pembelian` (`id_metode_pembelian`),
  ADD KEY `Nominal` (`id_nominal`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `Jenis Produk` (`id_jenis_produk`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_jenis_kelamin`
--
ALTER TABLE `t_jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_jenis_produk`
--
ALTER TABLE `t_jenis_produk`
  MODIFY `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_metode_pembayaran`
--
ALTER TABLE `t_metode_pembayaran`
  MODIFY `id_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_nominal`
--
ALTER TABLE `t_nominal`
  MODIFY `id_nominal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_pembeli`
--
ALTER TABLE `t_pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_pembelian`
--
ALTER TABLE `t_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD CONSTRAINT `Jenis Kelamin` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `t_jenis_kelamin` (`id_jenis_kelamin`),
  ADD CONSTRAINT `Role` FOREIGN KEY (`id_role`) REFERENCES `t_role` (`id_role`);

--
-- Constraints for table `t_nominal`
--
ALTER TABLE `t_nominal`
  ADD CONSTRAINT `Produk` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`);

--
-- Constraints for table `t_pembelian`
--
ALTER TABLE `t_pembelian`
  ADD CONSTRAINT `Metode Pembelian` FOREIGN KEY (`id_metode_pembelian`) REFERENCES `t_metode_pembayaran` (`id_metode_pembayaran`),
  ADD CONSTRAINT `Nominal` FOREIGN KEY (`id_nominal`) REFERENCES `t_nominal` (`id_nominal`),
  ADD CONSTRAINT `Pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `t_pembeli` (`id_pembeli`);

--
-- Constraints for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD CONSTRAINT `Jenis Produk` FOREIGN KEY (`id_jenis_produk`) REFERENCES `t_jenis_produk` (`id_jenis_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
