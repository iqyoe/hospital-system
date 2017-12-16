-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Nov 2017 pada 12.24
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `accesscontrol`
--

CREATE TABLE `accesscontrol` (
  `aksesid` varchar(4) NOT NULL,
  `profesi` varchar(15) NOT NULL,
  `adm` varchar(1) NOT NULL,
  `rec` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `accesscontrol`
--

INSERT INTO `accesscontrol` (`aksesid`, `profesi`, `adm`, `rec`) VALUES
('0000', 'godadmin', '1', '1'),
('0001', 'admin', '1', '0'),
('0002', 'dokter', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasiendata`
--

CREATE TABLE `pasiendata` (
  `pasiennik` varchar(16) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasiendata`
--

INSERT INTO `pasiendata` (`pasiennik`, `nama_pasien`, `ttl`, `jenis_kelamin`, `alamat`) VALUES
('3175100909970005', 'David', 'Jakarta-09-09-1997', 'L', 'Pondok Ranggon Cipayung'),
('3273111112960002', 'Muhammad Iqbal', 'Bandung-11-12-1996', 'L', 'Jalan Denki Selatan V'),
('3578200912960002', 'Samuel Anthony', 'Surabaya-9-12-1996', 'L', 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `rsid` varchar(4) NOT NULL,
  `namars` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`rsid`, `namars`) VALUES
('0000', 'Blockchain'),
('0001', 'Rumah Sakit Hasan Sadikin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
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
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`rsid`, `aksesid`, `staffid`, `pwd`, `nama`, `telepon`) VALUES
('0000', '0000', '0000', 'superadmin', 'Super Admin', '000000000000'),
('0001', '0001', '0001', 'admin', 'Administrator', '087800011101'),
('0001', '0002', '0003', 'dokter', 'Dokter', '081200011101');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
