-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 01:21 PM
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
-- Database: `sekolahteladan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id_barang` int(11) NOT NULL,
  `bahan` varchar(32) NOT NULL,
  `cara_peroleh` varchar(32) NOT NULL,
  `tanggal_pengadaan` date NOT NULL,
  `warna_barang` varchar(32) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `keadaan_barang` varchar(32) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `tanggal_rusak` date DEFAULT NULL,
  `lokasi` varchar(32) NOT NULL,
  `lokasi_detail` varchar(128) NOT NULL,
  `ket_barang` varchar(128) DEFAULT NULL,
  `pemilik` varchar(128) NOT NULL,
  `foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id_barang`, `bahan`, `cara_peroleh`, `tanggal_pengadaan`, `warna_barang`, `satuan`, `keadaan_barang`, `harga_satuan`, `tanggal_rusak`, `lokasi`, `lokasi_detail`, `ket_barang`, `pemilik`, `foto`) VALUES
(1, 'Kayu', 'Pembelian', '2020-02-12', 'Merah', 'Set', 'Baik', 2000, '0000-00-00', 'SD', 'Kantor TU', 'Masih Bagus', 'SD', 'meja4.jpg');

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
(1, 1, 1, 1, 2, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id_data_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barcode` int(11) NOT NULL,
  `tanggal_peletakan` date NOT NULL,
  `lokasi_update` varchar(64) DEFAULT NULL,
  `lokasi_sebelum` varchar(64) DEFAULT NULL,
  `lokasi_detail_update` varchar(128) DEFAULT NULL,
  `lokasi_detail_sebelum` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_data_transaksi`, `id_transaksi`, `id_barcode`, `tanggal_peletakan`, `lokasi_update`, `lokasi_sebelum`, `lokasi_detail_update`, `lokasi_detail_sebelum`) VALUES
(1, 1, 1, '2020-02-26', 'SD', 'TK', 'Kelas 1C', 'Kelas B1'),
(2, 2, 1, '2020-03-22', 'SD', 'SD', 'Kantor TU', 'Kelas 1C');

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
-- Table structure for table `detail_ruangan`
--

CREATE TABLE `detail_ruangan` (
  `id_detail_ruangan` int(11) NOT NULL,
  `detail_nama_ruangan` varchar(128) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_ruangan`
--

INSERT INTO `detail_ruangan` (`id_detail_ruangan`, `detail_nama_ruangan`, `id_lokasi`) VALUES
(1, 'Kelas 1A', 2),
(2, 'Kelas 1B', 2),
(3, 'Kelas 1C', 2),
(4, 'Kelas 2A', 2),
(5, 'Kelas 2B', 2),
(6, 'Kelas 2C', 2),
(7, 'Kelas 3A', 2),
(8, 'Kelas 3B', 2),
(9, 'Kelas 3C', 2),
(10, 'Kelas 4A', 2),
(11, 'Kelas 4B', 2),
(12, 'Kelas 4C', 2),
(13, 'Kelas 5A', 2),
(14, 'Kelas 5B', 2),
(15, 'Kelas 5C', 2),
(16, 'Kelas 6A', 2),
(17, 'Kelas 6B', 2),
(18, 'Kelas 6C', 2),
(19, 'Kantor Guru', 2),
(20, 'Kantor Kepala Sekolah', 2),
(21, 'Kantor TU', 2),
(22, 'Kantor IT', 1),
(23, 'Kelas A1', 3),
(24, 'Kelas A2', 3),
(25, 'Kelas A3', 3),
(26, 'Kelas B1', 3),
(27, 'Kelas B2', 3),
(28, 'Kelas B3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(36) NOT NULL,
  `akun_id` varchar(36) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `niy` varchar(17) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `is_active` char(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `akun_id`, `nama`, `niy`, `nama_divisi`, `nama_jabatan`, `is_active`, `created_at`, `updated_at`) VALUES
('484c0775-3b48-11ea-b233-b42e9929de53', '484b59f1-3b48-11ea-b233-b42e9929de53', 'Johan Saifudin', '02 01 1019 090752', 'SD Teladan', 'Guru Kelas', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('52f4f0c6-3b48-11ea-b233-b42e9929de53', '52f49ae0-3b48-11ea-b233-b42e9929de53', 'Imam Prasetyo, S.Kom.', '02 01 1019 210989', 'Divisi IT', 'Staff IT', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('d8e7a282-3b47-11ea-b233-b42e9929de53', 'd8e75512-3b47-11ea-b233-b42e9929de53', 'Muhammad Prastyo', '02 01 1016 210989', 'Operasional', 'Direktur', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_akun`
--

CREATE TABLE `karyawan_akun` (
  `akun_id` varchar(36) NOT NULL,
  `akun_username` varchar(20) NOT NULL,
  `akun_password` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` char(1) NOT NULL DEFAULT '1',
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_akun`
--

INSERT INTO `karyawan_akun` (`akun_id`, `akun_username`, `akun_password`, `created_at`, `updated_at`, `is_active`, `status`) VALUES
('484b59f1-3b48-11ea-b233-b42e9929de53', '0100201', '$2y$10$5cE.WGMT0ELRMsvOot0TZOUgVAdT0YigtF7OjzTMAA0qlWovJ7w1u', '2020-01-30 14:22:05', '2020-01-30 14:22:05', '1', '1'),
('52f49ae0-3b48-11ea-b233-b42e9929de53', '0100301', '$2y$10$5cE.WGMT0ELRMsvOot0TZOUgVAdT0YigtF7OjzTMAA0qlWovJ7w1u', '2020-01-30 14:25:45', '2020-01-30 14:25:45', '1', '2'),
('d8e75512-3b47-11ea-b233-b42e9929de53', '0100101', '$2y$10$5cE.WGMT0ELRMsvOot0TZOUgVAdT0YigtF7OjzTMAA0qlWovJ7w1u', '2020-01-30 14:26:40', '2020-01-30 14:26:40', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(1, 'YSI'),
(2, 'SD'),
(3, 'TK');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `instansi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `instansi`) VALUES
(1, 'YSI'),
(2, 'SD'),
(3, 'Tk');

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
(1, 'Meja Ngaji', 'Informa', 'MK1423A');

-- --------------------------------------------------------

--
-- Table structure for table `ttransaksi`
--

CREATE TABLE `ttransaksi` (
  `Id_transaksi` int(11) NOT NULL,
  `jabatan_penerima` varchar(64) NOT NULL,
  `jabatan_penyerah` varchar(64) NOT NULL,
  `ket` varchar(512) DEFAULT NULL,
  `lokasi_peletakan` varchar(64) NOT NULL,
  `lokasi_detail` varchar(128) NOT NULL,
  `nama_penerima` varchar(64) NOT NULL,
  `nama_penyerah` varchar(64) NOT NULL,
  `tgl_peletakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttransaksi`
--

INSERT INTO `ttransaksi` (`Id_transaksi`, `jabatan_penerima`, `jabatan_penyerah`, `ket`, `lokasi_peletakan`, `lokasi_detail`, `nama_penerima`, `nama_penyerah`, `tgl_peletakan`) VALUES
(1, 'Guru Kelas', 'Staff IT', 'Meja Ngaji:Masih Bagus,', 'SD', 'Kelas 1A', 'Johan Saifudin', 'Imam Prasetyo, S.Kom.', '2020-02-26'),
(2, 'Direktur', 'Guru Kelas', 'Meja Ngaji:Masih Bagus,', 'SD', 'Kantor TU', 'Muhammad Prastyo', 'Johan Saifudin', '2020-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `yayasan`
--

CREATE TABLE `yayasan` (
  `id_yayasan` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `nama_yayasan` varchar(32) NOT NULL,
  `kabupaten` varchar(32) NOT NULL,
  `provinsi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan`
--

INSERT INTO `yayasan` (`id_yayasan`, `nama`, `nama_yayasan`, `kabupaten`, `provinsi`) VALUES
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
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_spesifikasi` (`id_spesifikasi`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_data_transaksi`),
  ADD KEY `id_barcode` (`id_barcode`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `detail_ruangan`
--
ALTER TABLE `detail_ruangan`
  ADD PRIMARY KEY (`id_detail_ruangan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `karyawan_akun`
--
ALTER TABLE `karyawan_akun`
  ADD PRIMARY KEY (`akun_id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `spesifikasi_barang`
--
ALTER TABLE `spesifikasi_barang`
  ADD PRIMARY KEY (`id_spesifikasi`);

--
-- Indexes for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
  ADD PRIMARY KEY (`Id_transaksi`);

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
  MODIFY `id_data_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_ruangan`
--
ALTER TABLE `detail_ruangan`
  MODIFY `id_detail_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spesifikasi_barang`
--
ALTER TABLE `spesifikasi_barang`
  MODIFY `id_spesifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
  MODIFY `Id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `barcode_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`),
  ADD CONSTRAINT `barcode_ibfk_2` FOREIGN KEY (`id_spesifikasi`) REFERENCES `spesifikasi_barang` (`id_spesifikasi`);

--
-- Constraints for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD CONSTRAINT `data_transaksi_ibfk_1` FOREIGN KEY (`id_barcode`) REFERENCES `barcode` (`id_barcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
