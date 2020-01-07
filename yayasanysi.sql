-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 05:09 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yayasanysi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id_barang` int(11) NOT NULL,
  `bahan` varchar(32) NOT NULL,
  `cara_peroleh` varchar(32) NOT NULL,
  `tanggal_pengadaan` int(11) NOT NULL,
  `warna_barang` varchar(32) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `keadaan_barang` varchar(32) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `tanggal_rusak` int(11) DEFAULT NULL,
  `lokasi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id_barang`, `bahan`, `cara_peroleh`, `tanggal_pengadaan`, `warna_barang`, `satuan`, `keadaan_barang`, `harga_satuan`, `tanggal_rusak`, `lokasi`) VALUES
(1, 'polycarbonat', 'pembelian', 1574065522, 'Hitam', 'set', 'baik', 100000, NULL, 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id_barcode` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_yayasan` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_spesifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id_barcode`, `id_barang`, `id_departement`, `id_yayasan`, `bulan`, `tahun`, `id_spesifikasi`) VALUES
(1, 1, 1, 1, 2, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id_data_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barcode` int(11) NOT NULL,
  `tanggal_peletakan` int(11) NOT NULL,
  `lokasi_update` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `nama_departement` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id_departement`, `nama_departement`) VALUES
(1, 'IT'),
(2, 'TU');

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi_barang`
--

CREATE TABLE `spesifikasi_barang` (
  `id_spesifikasi` int(11) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `merk` varchar(32) NOT NULL,
  `no_pabrik` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesifikasi_barang`
--

INSERT INTO `spesifikasi_barang` (`id_spesifikasi`, `nama_barang`, `merk`, `no_pabrik`) VALUES
(1, 'Laptop', 'ASUS', 'A455LF-WX158D');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_penyerah` varchar(32) NOT NULL,
  `jabatan_penyerah` varchar(32) NOT NULL,
  `nama_penerima` varchar(32) NOT NULL,
  `jabatan_penerima` varchar(32) NOT NULL,
  `tgl_peletakan` int(11) NOT NULL,
  `lokasi_peletakan` varchar(32) NOT NULL,
  `ket` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_penyerah`, `jabatan_penyerah`, `nama_penerima`, `jabatan_penerima`, `tgl_peletakan`, `lokasi_peletakan`, `ket`) VALUES
(2, 'IMAM', 'Kepala IT', 'TATA', 'Staff IT', 0, '', 'barang diterima dengan kondisi baik');

-- --------------------------------------------------------

--
-- Table structure for table `yayasan`
--

CREATE TABLE `yayasan` (
  `id_yayasan` int(11) NOT NULL,
  `kode_nama` varchar(32) NOT NULL,
  `nama_yayasan` varchar(32) NOT NULL,
  `kabupaten` varchar(32) NOT NULL,
  `provinsi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan`
--

INSERT INTO `yayasan` (`id_yayasan`, `kode_nama`, `nama_yayasan`, `kabupaten`, `provinsi`) VALUES
(1, 'YSI', 'Yayasan Sinai Indonesia', 'Sleman', 'D.I.Yogyakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id_barcode`),
  ADD KEY `fk_id_barang` (`id_barang`),
  ADD KEY `fk_id_spesifikasi` (`id_spesifikasi`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_data_transaksi`),
  ADD KEY `fk_id_barcode` (`id_barcode`),
  ADD KEY `fk_id_ttransaksi` (`id_transaksi`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `spesifikasi_barang`
--
ALTER TABLE `spesifikasi_barang`
  ADD PRIMARY KEY (`id_spesifikasi`),
  ADD UNIQUE KEY `no_pabrik` (`no_pabrik`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `yayasan`
--
ALTER TABLE `yayasan`
  ADD PRIMARY KEY (`id_yayasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id_barcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_data_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spesifikasi_barang`
--
ALTER TABLE `spesifikasi_barang`
  MODIFY `id_spesifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yayasan`
--
ALTER TABLE `yayasan`
  MODIFY `id_yayasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barcode`
--
ALTER TABLE `barcode`
  ADD CONSTRAINT `fk_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_id_spesifikasi` FOREIGN KEY (`id_spesifikasi`) REFERENCES `spesifikasi_barang` (`id_spesifikasi`);

--
-- Constraints for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD CONSTRAINT `fk_id_barcode` FOREIGN KEY (`id_barcode`) REFERENCES `barcode` (`id_barcode`),
  ADD CONSTRAINT `fk_id_ttransaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
