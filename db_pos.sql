-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 05:16 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `satuan`, `stok`, `harga_beli`, `harga_jual`, `profit`) VALUES
('1235545679', 'Minuman Kaleng Coca-Cola 400Ml', 'PCS', 68, 4500, 6000, 1500),
('2012435002001', 'Mie Instan Indomie Ayam Goreng Aceh', 'PCS', 114, 2100, 2500, 400),
('2012435002002', 'Mizone', 'PCS', 46, 4500, 6000, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_distributor`
--

CREATE TABLE `tb_distributor` (
  `id_distributor` char(6) NOT NULL,
  `nama_distributor` varchar(80) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota_asal` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telpon` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_distributor`
--

INSERT INTO `tb_distributor` (`id_distributor`, `nama_distributor`, `alamat`, `kota_asal`, `email`, `telpon`) VALUES
('DS002', 'TRI ALIKA', 'JL. LETJEND HARUN SOHAR NO. 1788 KEBUN BUNGA', 'MEDAN', 'trialika.paper@gmail.com', '0218220173'),
('DS003', 'SUPRA PRIMATAMA PERKASA', 'JL. TENDEAN', 'JAKARTA', 'supra.prima@yahoo.com', '02198354231');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `telpon`, `email`) VALUES
('100001012', 'Ahmad Dahlan', 'Jl. Muhmmadiyah Malang', '85456135', 'ahmad_dahlan@yahoo.com'),
('100001013', 'Susilo Bambang Yudhoyono', 'Pacitan nganjuk, jawa timur', '081265545423', 'sby.juara@gmail.com'),
('100001014', 'AHMAD SAYUTI', 'BOJONG KASO', '0218239905', 'sayuti.ahmad.malik@gmail.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `kode_penjualan`, `kode_barcode`, `jumlah`, `total`, `tgl_penjualan`, `id_pelanggan`) VALUES
(205, 'PJ-3564937562', '1235545679', 3, 18000, '2018-10-27', 100001014),
(206, 'PJ-3564937562', '2012435002001', 1, 2500, '2018-10-27', 100001014),
(207, 'PJ-0844315796', '1235545679', 1, 6000, '2018-10-27', 100001012),
(208, 'PJ-0844315796', '2012435002001', 1, 2500, '2018-10-27', 100001012),
(209, 'PJ-0844315796', '2012435002002', 4, 24000, '2018-10-27', 100001012),
(210, 'PJ-3564937563', '2012435002001', 1, 2500, '2018-10-26', 100001014);

--
-- Triggers `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang 
SET stok = stok - NEW.jumlah
WHERE kode_barcode = NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `kode_penjualan` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`kode_penjualan`, `bayar`, `kembali`, `diskon`, `potongan`, `total_b`) VALUES
('PJ-0844315796', 50000, 17500, 0, 0, 32500),
('PJ-3564937562', 15000, 4750, 50, 10250, 10250);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama_petugas` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `nama_petugas`, `password`, `level`, `foto`) VALUES
(3, 'admin', 'taufik', 'admin', 'admin', 'avatar.png'),
(4, 'kasir', 'Syamil Azzahrawi', 'kasir', 'kasir', 'Tulips.jpg'),
(5, 'moohat', 'topik', '234242', 'admin', 'Screenshot_1.png'),
(7, 'akainu', 'borsalino akainu', 'kasir', 'kasir', 'Penguins.jpg'),
(8, 'law', 'trafagar D law', 'admin', 'admin', 'avatar04.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barcode`);

--
-- Indexes for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD UNIQUE KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
