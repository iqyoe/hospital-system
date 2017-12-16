-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 05:39 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allhealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesscontrol`
--

CREATE TABLE `accesscontrol` (
  `aksesid` varchar(4) NOT NULL,
  `profesi` varchar(15) NOT NULL,
  `adm` varchar(1) NOT NULL,
  `rec` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesscontrol`
--

INSERT INTO `accesscontrol` (`aksesid`, `profesi`, `adm`, `rec`) VALUES
('0000', 'godadmin', '1', '1'),
('0001', 'admin', '1', '0'),
('0002', 'umum', '0', '1'),
('0003', 'gigi', '0', '1'),
('0004', 'jantung', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `antrian` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `pasiennik` varchar(255) NOT NULL,
  `rsid` varchar(255) NOT NULL,
  `aksesid` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`antrian`, `hari`, `pasiennik`, `rsid`, `aksesid`, `keluhan`, `status`) VALUES
(1, '20171213', '3578200912960002', '1', '0002', '', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `pasiendata`
--

CREATE TABLE `pasiendata` (
  `pasiennik` varchar(16) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasiendata`
--

INSERT INTO `pasiendata` (`pasiennik`, `nama_pasien`, `ttl`, `jenis_kelamin`, `alamat`, `password`) VALUES
('3175100909970005', 'David', 'Jakarta-09-09-1997', 'L', 'Pondok Ranggon Cipayung 40', 'david'),
('3273111112960002', 'Muhammad Iqbal', 'Bandung-11-12-1996', 'L', 'Jalan Denki Selatan V', 'icuk'),
('3578200912960002', 'Samuel Anthony', 'Surabaya-9-12-1996', 'L', 'Surabaya', 'sam');

-- --------------------------------------------------------

--
-- Table structure for table `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `rsid` varchar(4) NOT NULL,
  `namars` varchar(150) NOT NULL,
  `umum` int(11) NOT NULL,
  `gigi` int(11) NOT NULL,
  `jantung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumahsakit`
--

INSERT INTO `rumahsakit` (`rsid`, `namars`, `umum`, `gigi`, `jantung`) VALUES
('0000', 'Blockchain', 0, 0, 0),
('0001', 'Rumah Sakit Hasan Sadikin', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `rsid` varchar(4) NOT NULL,
  `aksesid` varchar(4) NOT NULL,
  `staffid` varchar(4) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`rsid`, `aksesid`, `staffid`, `pwd`, `nama`, `telepon`) VALUES
('0000', '0000', '0000', 'superadmin', 'Super Admin', '000000000000'),
('0001', '0001', '0001', 'admin', 'Administrator', '087800011101'),
('0001', '0002', '0003', 'dokter', 'Dokter Umum', '081200011101'),
('0001', '0003', '0004', 'dokter', 'Dokter Gigi', '08123456789'),
('0001', '0004', '0005', 'jantung', 'Dokter Jantung', '08934512378');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesscontrol`
--
ALTER TABLE `accesscontrol`
  ADD PRIMARY KEY (`aksesid`),
  ADD UNIQUE KEY `aksesid` (`aksesid`);

--
-- Indexes for table `pasiendata`
--
ALTER TABLE `pasiendata`
  ADD PRIMARY KEY (`pasiennik`);

--
-- Indexes for table `rumahsakit`
--
ALTER TABLE `rumahsakit`
  ADD PRIMARY KEY (`rsid`),
  ADD UNIQUE KEY `rsid` (`rsid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`),
  ADD UNIQUE KEY `staffid` (`staffid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
