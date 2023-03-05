-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 06:45 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_adam`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` varchar(10) NOT NULL DEFAULT '',
  `id_supplier` varchar(10) DEFAULT NULL,
  `nmbrg` varchar(25) DEFAULT NULL,
  `jenis_barang` varchar(10) DEFAULT NULL,
  `sn` varchar(10) DEFAULT NULL,
  `no_batch` varchar(7) DEFAULT NULL,
  `cabang` varchar(11) DEFAULT NULL,
  `jml_brg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `id_supplier`, `nmbrg`, `jenis_barang`, `sn`, `no_batch`, `cabang`, `jml_brg`) VALUES
('BRG-001', 'S-001', 'Barang 1', 'Botol', '123', '235', 'Tangerang', 0),
('BRG-002', 'S-001', 'Barang 2', 'Botol', '123', '234', 'Tangerang', 2);

-- --------------------------------------------------------

--
-- Table structure for table `brgklr`
--

CREATE TABLE `brgklr` (
  `id` int(11) NOT NULL,
  `id_brgklr` varchar(10) NOT NULL DEFAULT '',
  `no_do` varchar(10) DEFAULT NULL,
  `no_pck` varchar(10) DEFAULT NULL,
  `id_brg` varchar(10) DEFAULT NULL,
  `jml_brgklr` int(11) DEFAULT NULL,
  `tglklr` date DEFAULT NULL,
  `id_user` int(1) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brgklr`
--

INSERT INTO `brgklr` (`id`, `id_brgklr`, `no_do`, `no_pck`, `id_brg`, `jml_brgklr`, `tglklr`, `id_user`, `status`) VALUES
(3, 'BRGKLR-001', '202005001', '202005001', 'BRG-001', 1, '2020-05-29', 1, 'Tambah'),
(4, 'BRGKLR-001', '202005001', '202005001', 'BRG-002', 1, '2020-05-29', 1, 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `brgmsk`
--

CREATE TABLE `brgmsk` (
  `id` int(11) NOT NULL,
  `id_brgmsk` varchar(10) NOT NULL DEFAULT '',
  `no_do` varchar(10) DEFAULT NULL,
  `no_sj` varchar(10) DEFAULT NULL,
  `id_brg` varchar(10) DEFAULT NULL,
  `jml_brgmsk` varchar(10) DEFAULT NULL,
  `tglmsk` date DEFAULT NULL,
  `id_user` int(1) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brgmsk`
--

INSERT INTO `brgmsk` (`id`, `id_brgmsk`, `no_do`, `no_sj`, `id_brg`, `jml_brgmsk`, `tglmsk`, `id_user`, `status`) VALUES
(17, 'BRGMSK-001', '202005001', '202005001', 'BRG-001', '2', '2020-05-29', 1, 'Tambah'),
(18, 'BRGMSK-001', '202005001', '202005001', 'BRG-002', '2', '2020-05-29', 1, 'Tambah');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` varchar(1) NOT NULL DEFAULT '',
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `level` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `level`) VALUES
('1', 'gudang', 'gudang', '1'),
('2', 'bahan', 'bahan', '2'),
('3', 'logistik', 'logistik', '3');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL DEFAULT '',
  `nmsupplier` varchar(25) DEFAULT NULL,
  `cabang` varchar(11) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nmsupplier`, `cabang`, `alamat`) VALUES
('S-001', 'supplier 1', 'Tangerang', 'Tangerang'),
('S-002', 'supplier 2', 'Jakarta', 'Jakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `brgklr`
--
ALTER TABLE `brgklr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brgmsk`
--
ALTER TABLE `brgmsk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brgklr`
--
ALTER TABLE `brgklr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brgmsk`
--
ALTER TABLE `brgmsk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
