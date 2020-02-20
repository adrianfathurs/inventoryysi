-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 04:37 PM
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
-- Database: `yayasanysiku`
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
  `ket_barang` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id_barang`, `bahan`, `cara_peroleh`, `tanggal_pengadaan`, `warna_barang`, `satuan`, `keadaan_barang`, `harga_satuan`, `tanggal_rusak`, `lokasi`, `ket_barang`) VALUES
(2, 'sintetis', 'pembelian', '0000-00-00', 'putih', 'set', 'Baik', 120000, NULL, 'TI', NULL),
(3, 'Polycarbonat', 'Ngepet', '0000-00-00', 'Hitam', 'Set', 'Keadaan Barang', 7500000, NULL, 'SD', NULL),
(4, 'Polycarbonat', 'Ngepet', '0000-00-00', 'Hitam', 'Set', 'Keadaan Barang', 7500000, NULL, 'SD', NULL),
(5, 'Besi', 'pembelian', '0000-00-00', 'Coklat', 'Set', 'Baik', 20000000, NULL, 'TI', NULL),
(6, 'Besi', 'pembelian', '0000-00-00', 'Coklat', 'Set', 'Baik', 20000000, NULL, 'TI', NULL),
(7, 'Plastik', 'ngepet', '0000-00-00', 'Hitam', 'Rol', 'Baik', 200000, NULL, 'TU', NULL),
(8, 'Kaca', 'Ngepet', '0000-00-00', 'Putih', 'Biji', 'Baik', 75000, NULL, 'TU', NULL),
(9, 'Plastik', 'Pembelian', '0000-00-00', 'Hitam', 'Set', 'Baik', 2000000, NULL, 'TU', NULL),
(10, 'Besi', 'Nggali', '0000-00-00', 'Kuning', 'Set', 'Baik', 90000000, NULL, 'TI', NULL),
(11, 'Besi', 'Nggali', '0000-00-00', 'Kuning', 'Set', 'Baik', 90000000, NULL, 'TI', NULL),
(12, 'Kuningan', 'pembelian', '0000-00-00', 'Hitam-Biru', 'Rol', 'Baik', 800000, NULL, 'TU', NULL),
(13, 'Polycarbonat', 'Pembelian', '0000-00-00', 'hijau', 'Set', 'Baik', 899000, NULL, 'TU', NULL),
(14, 'Polycarbonat', 'Pembelian', '0000-00-00', 'hijau', 'Set', 'Baik', 899000, NULL, 'TU', NULL),
(15, 'sintesis', 'pembelian', '2020-01-28', 'hijau', 'set', 'Rusak', 9000092, NULL, 'TI', NULL),
(16, 'sintesis', 'pembelian', '2020-01-28', 'hijau', 'set', 'Rusak', 9000092, NULL, 'TI', '  rol rusak                                  '),
(17, 'sintesis', 'pembelian', '2020-01-25', 'kuning', 'set', 'Baik', 6000000, NULL, 'TI', NULL),
(18, 'poly', 'pembelian', '2020-01-29', 'hitam', 'set', 'Baik', 1999923, NULL, 'TU', NULL),
(19, 'kain', 'pembelian', '2020-01-29', 'kuning', 'set', 'Baik', 120000, NULL, 'TI', NULL),
(20, 'Polycarbonat', 'pembelian', '2020-01-28', 'hitam', 'set', 'Baik', 120000, NULL, 'TI', NULL),
(21, 'plastik', 'pembelian', '2020-01-27', 'orange', 'set', 'Baik', 1230000, NULL, 'TU', NULL),
(22, 'plastik', 'pembelian', '2020-01-29', 'kuning', 'Set', 'Baik', 1233123, NULL, 'TI', NULL),
(23, 'plastik', 'pembelian', '2020-01-28', 'hijau', 'set', 'Baik', 1231231, NULL, 'TI', NULL),
(24, 'plastik', 'pembelian', '2020-01-27', 'kuning', 'set', 'Baik', 599999, NULL, 'TI', NULL),
(25, 'plastik', 'pembelian', '2020-01-20', 'biru', 'set', 'Baik', 699999, NULL, 'TI', NULL),
(26, 'olie', 'pembelian', '2020-01-21', 'hijau', 'set', 'Baik', 789003, NULL, 'TI', NULL),
(27, 'karbon', 'pembelian', '2020-01-14', 'hijau', 'set', 'Baik', 123231, NULL, 'TI', NULL),
(28, 'besi', 'pembelian', '2020-01-28', 'coklat', 'set', 'Baik', 799064, NULL, 'TU', NULL),
(29, 'kdfhksjd', 'pembelian', '2020-01-28', 'jfkd', 'set', 'Baik', 41413, NULL, 'TI', NULL),
(30, 'kdfhksjd', 'pembelian', '2020-01-28', 'jfkd', 'set', 'Baik', 41413, NULL, 'TI', NULL),
(31, 'fdshfj', 'pembelian', '2020-01-26', 'kuning', 'djhf', 'Baik', 342342, NULL, 'TI', NULL),
(32, 'fsdg', 'khdvkv', '2020-01-13', 'vkshdkvjd', 'kjshdvk', 'Baik', 3224, NULL, 'TU', NULL),
(33, 'fsf', 'pembelian', '2020-01-15', 'fdfsdf', 'Set', 'Baik', 3424343, NULL, 'TI', NULL),
(34, 'kuning', 'pembelian', '2020-01-28', 'hijau', 'set', 'Baik', 23321, NULL, 'TU', NULL),
(35, 'poly', 'pembelian', '2020-01-28', 'hijau', 'set', 'Baik', 500000, NULL, 'TU', NULL),
(36, 'bdsjas', 'pembelian', '2020-01-28', 'jfkds', 'set', 'Baik', 78905, NULL, 'TI', NULL),
(37, 'hikd', 'fjd', '2020-01-28', 'hiks', 'hfjsd', 'Baik', 231, NULL, 'TI', NULL),
(38, 'hikd', 'fjd', '2020-01-28', 'hiks', 'hfjsd', 'Baik', 231, NULL, 'TI', NULL),
(39, 'plastik', 'pembelian', '2020-01-28', 'hijau', 'set', 'Baik', 23432, NULL, 'TU', NULL),
(40, 'fnjkds', 'fdjsk', '2020-01-27', 'fndsjk', 'fmkdl', 'Baik', 23123, NULL, 'Ti', NULL),
(41, 'fbdsk', 'sklfnkd', '2020-01-28', 'fsdjk', 'fnsd', 'Baik', 43242, NULL, 'TI', NULL),
(42, 'fbsk', 'pembelian', '2020-01-01', 'hitam', 'set', 'Baik', 2313, NULL, 'TI', NULL),
(43, 'plastik', 'pembelian', '2020-01-08', 'hitam', 'fdsn', 'Baik', 2313, NULL, 'TI', NULL),
(44, 'fsjd', 'pembelian', '2020-01-02', 'hitam', 'fsd', 'Baik', 31231, NULL, 'TI', NULL),
(45, 'vfdkb', 'pembelian', '2020-01-09', 'vnjkdfn', 'set', 'Baik', 8394982, NULL, 'TI', NULL),
(46, 'nvsdnvjks', 'pembelian', '2020-01-02', 'skfskj', 'set', 'Baik', 31231, NULL, 'TI', NULL),
(47, 'kjsbjd', 'pembelian', '2020-01-01', 'dsifhsi', 'rol', 'Baik', 2312, NULL, 'IT', NULL),
(48, 'fsdkb', 'pembelian', '2020-01-10', 'fsdjk', 'fdskjf', 'Baik', 42342, NULL, 'TI', NULL),
(49, 'sefrei', 'jfkldjs', '2020-01-08', 'hijau', 'vjkdf', 'Baik', 322, NULL, 'TI', NULL),
(50, ' cds', 'dsjkb', '2020-01-16', 'cds', 'set', 'Baik', 3986, NULL, 'TI', NULL),
(51, 'dfjks', 'ufids', '2020-01-08', 'fdsnkl', 'fdsnk', 'Baik', 89789, NULL, 'TI', NULL),
(52, 'fdskn', 'vsdv', '0000-00-00', 'uisdhi', 'dsd', 'Baik', 31231, NULL, 'TI', NULL),
(53, 'f msd ', 'fsdkn', '2020-01-01', 'dsnfklsn', 'mksl', 'Baik', 342, NULL, 'TI', NULL),
(54, 'vs dvkvkls', 'lcnksl', '2020-01-09', 'vklds', 'klvsdlk', 'Baik', 43, NULL, 'TI', NULL),
(55, 'dskvn', 'kdslc', '2020-01-08', 'nxvns', 'vnkdsn', 'Baik', 32131, NULL, 'IT', NULL),
(56, 'nsldknf', 'prfke', '2020-01-10', 'fnsdl', 'set', 'Baik', 41241, NULL, 're', NULL),
(57, 'cbskb', 'cndskln', '2020-01-09', 'cnsdn', 'dsnk', 'Baik', 2312, NULL, 'TI', NULL),
(58, 'vdkjbvkd', 'pembelian', '2020-01-16', 'dksli', 'ckjsdbc', 'Baik', 3432, NULL, 'ti', NULL),
(59, 'ndsb', 'sdklnv', '2020-01-08', 'sdnk', 'fdksb', 'Baik', 241, NULL, 'TI', NULL),
(60, 'njsdk', 'vskdnv', '2020-01-02', 'vkdjs', 'vdlk', 'Baik', 28283, NULL, 'TI', NULL),
(61, 'Polycarbonat', 'pembelian', '2020-01-16', 'Hijau', 'set', 'Baik', 6778002, NULL, 'IT', NULL),
(62, 'Polycarbonat', 'pembelian', '2020-01-15', 'Hijau', 'set', 'Baik', 483782, NULL, 'IT', NULL),
(63, 'besi', 'Pembelian', '2020-01-16', 'kuning', 'Set', 'Baik', 8900049, NULL, 'TI', NULL),
(64, 'jdkbakj', 'djsakb', '2020-12-25', 'hdsaj', 'Set', 'Baik', 78978978, NULL, 'IT', NULL),
(65, 'jksdbs', 'pembelian', '2020-01-15', 'cjshcjs', 'set', 'Baik', 4535783, NULL, 'TU', NULL),
(66, 'vdskjhvkj', 'diuscsui', '2020-01-23', 'kjbvjkcx', 'set', 'Baik', 3123, NULL, 'TI', NULL),
(67, 'cjasbj', 'cjksbck', '2020-01-08', 'jcsbdj', 'nckasn', 'Baik', 8293289, NULL, 'TI', NULL),
(68, 'jkasbd', 'jksadjsk', '2020-01-14', 'dsjgds', 'khjask', 'Baik', 231876, NULL, 'TI', NULL),
(69, 'csdjkb', 'dhshksj', '2020-01-09', 'ckdshj', 'set', 'Baik', 3827, NULL, 'TI', NULL),
(70, 'Polycarbonat', 'Pembelian', '2020-01-17', 'Hijau', 'set', 'Baik', 6000000, NULL, 'TI', NULL),
(71, 'Besi', 'Pembelian', '2020-01-18', 'Putih', 'Set', 'Baik', 90000000, NULL, 'TU', NULL),
(72, 'Besi', 'Pembelian', '2020-01-24', 'Gold', 'Set', 'Baik', 20000000, NULL, 'TI', NULL),
(73, 'Polycarbonat', 'Pembelian', '2020-01-17', 'Kuning', 'Set', 'Baik', 90000000, NULL, 'TI', NULL),
(74, 'Polycarbonat', 'Pembelian', '2020-01-17', 'Gold', 'Set', 'Baik', 90000000, NULL, 'TU', NULL),
(75, 'Polycarbonat', 'Pembelian', '2020-01-22', 'Gold', 'Set', 'Baik', 90000000, NULL, 'TI', NULL),
(77, 'Polycarbonat', 'Pembelian', '2020-01-09', 'Hijau', 'Rol', 'Baik', 10000000, NULL, 'TI', NULL),
(87, 'cdskj', 'Pembelian', '2020-01-23', 'kjsdc', 'set', 'Baik', 8493, NULL, 'TI', NULL),
(89, 'Polycarbonat', 'pembelian', '2020-01-24', 'Hijau', 'set', 'RUSAK', 2233344, '2020-01-28', 'Ti', NULL),
(90, 'POLYCARBONAT', 'PEMBELIAN', '2020-01-15', 'HIJAU', 'ROL', 'RUSAK', 2000000, '2020-01-15', 'TI', 'kabel patah                               '),
(91, 'Polycarbonat', 'Pembelian', '2020-01-16', 'Putih', 'set', 'Baik', 90000000, NULL, 'TU', 'Paku meja kurang 1'),
(92, 'Plastik', 'Pembelian', '2019-12-17', 'Hijau', 'Set', 'Baik', 200000, NULL, 'IT', 'Masih Bagus'),
(93, 'Polycarbonat', 'Pembelian', '2017-03-01', 'Hijau', 'Set', 'Baik', 90000000, NULL, 'TI', 'BAGUS SEKALI'),
(94, 'Polycarbonat', 'Pembelian', '2017-03-01', 'Hitam', 'Set', 'Rusak', 100000, '2020-02-29', 'TI', 'Kurang Dingin'),
(95, 'Polycarbonat', 'Pembelian', '2020-02-15', 'Putih', 'Set', 'Rusak', 90000000, NULL, 'IT', 'Tembaga nya hilang'),
(96, 'Kertas', 'Pembelian', '2020-02-28', 'Putih', 'set', 'Baik', 800000, NULL, 'IT', 'Barang Masih Bagus');

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
(15, 89, 1, 1, 1, 20, 89),
(16, 90, 1, 1, 1, 20, 90),
(17, 91, 1, 1, 1, 20, 91),
(18, 92, 2, 1, 12, 19, 92),
(19, 94, 2, 1, 3, 17, 94),
(20, 95, 1, 1, 2, 20, 95),
(21, 96, 1, 1, 2, 20, 96);

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
  `lokasi_sebelum` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_data_transaksi`, `id_transaksi`, `id_barcode`, `tanggal_peletakan`, `lokasi_update`, `lokasi_sebelum`) VALUES
(1, 1, 15, '0000-00-00', 'SD', NULL),
(3, 2, 15, '0000-00-00', 'TI', NULL),
(5, 3, 15, '2020-01-28', 'TI', NULL),
(8, 5, 15, '2020-01-18', 'TI', NULL),
(11, 7, 15, '2020-01-15', 'TU', NULL),
(13, 8, 15, '2020-01-24', 'clshcsd', NULL),
(16, 10, 15, '2020-01-10', 'vdksvnsk', NULL),
(18, 11, 15, '2020-01-16', 'cdsk', NULL),
(21, 14, 15, '2020-01-04', 'cdskn', NULL),
(22, 15, 15, '2020-12-31', 'kjg', NULL),
(47, 39, 15, '2020-01-11', 'vldnsk', NULL),
(49, 40, 15, '2020-01-30', 'TU', NULL),
(51, 41, 15, '2020-01-18', 'TU', NULL),
(53, 42, 15, '2020-01-15', 'vdskvb', NULL),
(55, 43, 15, '2020-01-18', 'cksa', NULL),
(56, 44, 16, '2020-01-31', 'TU', NULL),
(57, 45, 16, '2020-01-08', 'TI', NULL),
(58, 45, 17, '2020-01-08', 'TI', NULL),
(59, 46, 15, '2020-02-07', 'TU', NULL),
(60, 46, 16, '2020-02-07', 'TU', NULL),
(61, 47, 16, '2020-02-26', 'TU', NULL),
(62, 48, 16, '2020-02-05', 'TU', NULL),
(63, 48, 17, '2020-02-05', 'TU', NULL),
(64, 49, 16, '2020-02-26', 'IT', NULL),
(65, 49, 17, '2020-02-26', 'IT', NULL),
(66, 50, 16, '2020-02-05', 'TI', NULL),
(67, 50, 17, '2020-02-05', 'TI', NULL),
(68, 51, 16, '2020-02-06', 'IT', NULL),
(69, 51, 17, '2020-02-06', 'IT', NULL),
(70, 52, 16, '2020-02-20', 'TI', NULL),
(71, 52, 17, '2020-02-20', 'TI', NULL),
(72, 53, 16, '2020-02-27', 'IT', NULL),
(73, 53, 17, '2020-02-27', 'IT', NULL),
(74, 54, 16, '2020-02-06', 'TI', NULL),
(75, 54, 17, '2020-02-06', 'TI', NULL),
(76, 55, 16, '2020-02-14', 'TU', NULL),
(77, 55, 17, '2020-02-14', 'TU', NULL),
(78, 56, 16, '2020-02-19', 'TU', NULL),
(79, 56, 17, '2020-02-19', 'TU', NULL),
(80, 57, 16, '2020-02-01', 'TI', NULL),
(81, 57, 17, '2020-02-01', 'TI', NULL),
(82, 61, 17, '2020-02-14', 'TI', NULL),
(83, 61, 18, '2020-02-14', 'TI', NULL),
(84, 62, 17, '2020-02-15', 'TU', 'TU'),
(85, 62, 18, '2020-02-15', 'TU', 'TI'),
(86, 63, 17, '2020-02-15', 'TU', 'IT'),
(87, 63, 18, '2020-02-15', 'TU', 'IT'),
(88, 64, 18, '2020-02-15', 'TU', 'TU'),
(89, 64, 19, '2020-02-15', 'TU', 'TI'),
(90, 65, 19, '2020-02-15', 'IT', 'TI'),
(91, 65, 20, '2020-02-15', 'IT', 'TU'),
(92, 66, 19, '2020-02-22', 'vdskvb', ''),
(93, 66, 20, '2020-02-22', 'vdskvb', ''),
(94, 67, 19, '2020-02-22', 'IT', ''),
(95, 67, 20, '2020-02-22', 'IT', ''),
(96, 68, 19, '2020-02-22', 'IT', 'IT'),
(97, 68, 20, '2020-02-22', 'IT', 'IT'),
(98, 69, 18, '2020-02-21', 'IT', 'IT'),
(99, 69, 19, '2020-02-21', 'IT', 'hkj'),
(100, 69, 20, '2020-02-21', 'IT', 'IT'),
(101, 70, 21, '2020-02-15', 'TI', 'TU'),
(102, 71, 21, '2020-02-15', 'TI', 'TI'),
(103, 72, 20, '2020-02-15', 'IT', ''),
(104, 72, 21, '2020-02-15', 'IT', ''),
(105, 73, 20, '2020-02-22', 'TI', 'IT'),
(106, 73, 21, '2020-02-22', 'TI', 'IT');

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
(2, 'HDMI', 'LENOVO', 'pb-3211423'),
(3, 'Laptop', 'Ideapad 310', 'DB-3215457'),
(5, 'Smarphone', 'OPPO', '885994004'),
(7, 'Rol Kabel', 'Kuningan', '77993775'),
(8, 'Lampu', 'Philip', '1238129'),
(9, 'Charger', 'ASUS', '87738921'),
(10, 'Smarphone', 'APPLE', '2311231'),
(12, 'HDMI', 'OPPO', 'AD-12917821'),
(13, 'Koper', 'Casio', '76474838'),
(15, 'mouse', 'logig', '773812'),
(17, 'keyboard', 'casio', '774995'),
(18, 'keyboard', 'isuzu', '4895y3'),
(19, 'tas', 'rei', '3242'),
(20, 'kfskdj', 'dls', '31231'),
(21, 'laptop', 'asus', '42342'),
(22, 'hape', 'asus', '2312'),
(24, 'kertas', 'sidgu', '11111111'),
(25, 'kipas', 'cosmo', '23131'),
(26, 'mouse', 'tifahh', '9832y49284'),
(28, 'kulkas', 'hikkk', '8574vf2342'),
(29, 'jkfhjfaf', 'fkdslfnklf', '41243543t'),
(31, 'dfsfadf', 'dfsfs', '75675765u'),
(32, 'kclhsdkclds', 'jdksfjks', '37862994y'),
(33, 'fkldskfls', 'ifjioer', '3423dfg'),
(34, 'fkldsnfkls', 'efefre', '34242nk4'),
(35, 'fsdfs', 'fsdfs', '89743hfdf'),
(36, 'kertas', 'jdksjk', '324j3r'),
(37, 'jkdsa', 'fnjkdsj', '859023u4'),
(40, 'kdsnvjks', 'fjdks', '34y3hjfks'),
(41, 'fdhs', 'fdskl', 'fsud67'),
(42, 'djksba', 'djksa', '3233kjn'),
(43, 'jkfsdfs', '2313', 'jdhkjs7'),
(44, 'dksa', 'dla', '23123d'),
(45, 'nlkds', 'vmdf ', '4832fere'),
(47, 'kldsf', 'dsjk', 'powjdw2'),
(48, 'sjkbd', 'dnskj', '74328gu'),
(49, 'cskcs', 'cksd', '2342d'),
(50, 'cdsklnc', ' cds', 'nckl32'),
(51, 'fndsklfn', 'fdsk', 'ds7df'),
(52, 'fdknlfns', 'fjskd', '2432rew'),
(53, 'sjk', 'fdmsnm', '423jfsf'),
(54, 'kvlmdv', 'vdk', 'vlsvn9'),
(55, 'cnkdsncs', 'vnkjdsv', '43242'),
(56, 'fsfsdf', 'ksadja', '893792fdsj'),
(57, 'fdsvskl', 'cs,d', 'cndsjk'),
(58, 'dskjs', 'cdsnkj', '342kj5'),
(59, 'kfldsnfk', 'fkds', '432kdj11'),
(60, 'klnklv', 'cmdsj', '34y2huds'),
(61, 'Laptop', 'Lenovo', '99014u45'),
(62, 'Laptop', 'ROG', '78382grw'),
(63, 'kulkas', 'uywgyu', '2e1hjg32'),
(64, 'kjdsjk', 'dkjaskj', 'dlknsa8'),
(65, 'chjdskchsjk', 'kcdsnk', '382678gud'),
(66, 'jksdfhks', 'jsdbkj', '4837289'),
(67, 'kcdsjkbcsjk', 'hjcsavhc', 'hiudw6e2'),
(68, 'jdabsjd', 'jxasbj', '38478hjdks'),
(69, 'dfkdsnfk', 'dsjkbdk', '348923hu'),
(70, 'Laptop', 'ASUS', '7788981yy'),
(71, 'Iphone x', 'Apple', '67hhu556'),
(72, 'Iphone XI', 'Aplle', '2093hrdc'),
(73, 'OPPO RENO', 'OPPO', '34278guewg'),
(74, 'VIVO', 'X5', 'fjk78321'),
(75, 'VIVO', 'XX1', '389448jjjd'),
(77, 'LAPTOP', 'LENOVO', '88uuof'),
(89, 'VIVO', 'VIVO', '83942yure'),
(90, 'Rol', 'Kuningan', '55tsgut7'),
(91, 'Meja', 'Informa', 'iio8890'),
(92, 'Gelas', 'Tupperware', 'oPJD890'),
(94, 'AC', 'Panasonic', '67hhu556ols'),
(95, 'HDMI', 'Samsung', '2093hrdcKi'),
(96, 'BUKU CODING', 'Erlangga', '7839jjfurte');

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
  `nama_penerima` varchar(64) NOT NULL,
  `nama_penyerah` varchar(64) NOT NULL,
  `tgl_peletakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttransaksi`
--

INSERT INTO `ttransaksi` (`Id_transaksi`, `jabatan_penerima`, `jabatan_penyerah`, `ket`, `lokasi_peletakan`, `nama_penerima`, `nama_penyerah`, `tgl_peletakan`) VALUES
(1, 'TU', 'it', 'MASIH BAGUS', 'SD', 'fathur', 'VAnyya', '0000-00-00'),
(2, 'KEPALA IT', 'CEO', 'Masih Bagus No lecet', 'TI', 'VANNYA', 'Adrian Fathur', '0000-00-00'),
(3, 'Kepala IT', 'KARYAWAN', 'MAsih bagus No lecet', 'TI', 'TUNU', 'TONO', '2020-01-28'),
(4, 'Programmer', 'Kepala IT', 'cacad', 'TU', 'Tata', 'Imam', '2020-01-09'),
(5, 'KEPALA IT', 'CEO', 'BAgus', 'TI', 'VANNYA', 'Imam', '2020-01-18'),
(6, 'Programmer', 'CEO', 'Mantap', 'TI', 'Tata', 'Imam', '2020-01-14'),
(7, 'flsd', 'dsklnfks', 'JOOSS', 'TU', 'fdsnkk', 'fklsdnflkskn', '2020-01-15'),
(8, 'cdskln', 'cklsd', 'joss', 'clshcsd', 'csdkln', 'vdklsnvlks', '2020-01-24'),
(9, 'cdsknk', 'cdskc', 'hihggd', 'kcdsl', 'cdksnl', 'ckdskc', '2020-01-08'),
(10, 'vdsnvkjs', ' vsdnvkds', 'jvndskvs', 'vdksvnsk', 'vkdsvnksjd', 'knskdbvjkds', '2020-01-10'),
(11, 'ckjds', 'dsjsb', 'cdsk', 'cdsk', 'cdskcbsjk', 'djksnjkvkdsnvjk', '2020-01-16'),
(12, 'vdksvns', 'dksnvdjs', 'vdsvjsk', 'vdskvb', 'vdskn', 'cdskncsk', '2020-01-11'),
(13, 'ckdsn', 'cdskhcs', 'cdcc', 'csdhc', 'cdsc', 'klsjcisjocisd', '2020-01-18'),
(14, 'cdsnk', 'cndsn', 'ckldscklsdlkc', 'cdskn', 'cdsjkbn', 'sklcnkldscdskln', '2020-01-04'),
(15, 'Programmer', 'ytey', 'well', 'kjg', 'iuo', 'fd', '2020-12-31'),
(16, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'uit', '2019-07-16'),
(17, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2019-08-18'),
(18, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(19, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(20, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(21, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(22, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(23, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(24, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(25, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(26, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(27, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(28, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(29, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(30, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(31, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(32, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(33, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(34, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(35, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(36, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(37, 'Programmer', 'CEO', 'Oke', 'TU', 'Tata', 'Imam', '2020-01-31'),
(38, 'cdsjk', 'cjds', 'cjkdsb', 'cjdsbn', 'cdsn', 'cnsdkc', '2020-01-08'),
(39, 'vkdnsvjk', 'vkndkvndf', 'KETJJSK', 'vldnsk', 'lfdnvkd', 'msklncs', '2020-01-11'),
(40, 'cdskcnds', 'cdsm', 'idsshia', 'TU', 'ckdsnckds', 'klcdskl', '2020-01-30'),
(41, 'Programmer', 'CEO', 'BAGUS BANGET', 'TU', 'Tata', 'Imam', '2020-01-18'),
(42, 'vdksvns', 'CEO', 'ksdvds', 'vdskvb', 'Tata', 'Adrian Fathur', '2020-01-15'),
(43, 'caskn', 'csaknc', 'sakjc', 'cksa', 'cksan', 'cksancka', '2020-01-18'),
(44, 'Kepala IT Support', 'CEO', NULL, 'TU', 'TATA', 'IMAM', '2020-01-31'),
(45, 'Programmer', 'CEO', NULL, 'TI', 'IMAM', 'TATA', '2020-01-08'),
(46, 'Programmer', 'Kepala IT', NULL, 'TU', 'Tata', 'Imam', '2020-02-07'),
(47, '{Direktur}', '{Guru Kelas}', NULL, 'TU', 'd8e7a282-3b47-11ea-b233-b42e9929de53', '484c0775-3b48-11ea-b233-b42e9929de53', '2020-02-26'),
(48, '{Staff IT}', '{Guru Kelas}', NULL, 'TU', 'Imam Prasetyo, S.Kom.', 'Johan Saifudin', '2020-02-05'),
(49, '{Direktur}', '{Guru Kelas}', 'Rol:kabel patah     Meja:Paku meja kurang 1', 'IT', 'Muhammad Prastyo', 'Johan Saifudin', '2020-02-26'),
(50, '{Guru Kelas}', '{Direktur}', 'Rol:kabel patah                               ,Meja:Paku meja kurang 1,', 'TI', 'Johan Saifudin', 'Muhammad Prastyo', '2020-02-05'),
(51, '{Staff IT}', '{Guru Kelas}', NULL, 'IT', 'Imam Prasetyo, S.Kom.', 'Johan Saifudin', '2020-02-06'),
(52, '{Guru Kelas}', '{Staff IT}', 'Rol:kabel patah                               ,Meja:Paku meja kurang 1,', 'TI', 'Johan Saifudin', 'Imam Prasetyo, S.Kom.', '2020-02-20'),
(53, '{Guru Kelas}', '{Staff IT}', 'Rol:kabel patah                               ,Meja:Paku meja kurang 1,', 'IT', 'Johan Saifudin', 'Imam Prasetyo, S.Kom.', '2020-02-27'),
(54, '{Direktur}', '{Guru Kelas}', 'Rol:kabel patah                               ,Meja:Paku meja kurang 1,', 'TI', 'Muhammad Prastyo', 'Johan Saifudin', '2020-02-06'),
(55, '{Guru Kelas}', '{Staff IT}', 'Rol:kabel patah                               ,Meja:Paku meja kurang 1,', 'TU', 'Johan Saifudin', 'Imam Prasetyo, S.Kom.', '2020-02-14'),
(56, '{Staff IT}', '{Guru Kelas}', 'Rol:kabel patah                               ,Meja:Paku meja kurang 1,', 'TU', 'Imam Prasetyo, S.Kom.', 'Johan Saifudin', '2020-02-19'),
(57, '{Direktur}', '{Staff IT}', 'Rol:kabel patah                               ,Meja:Paku meja kurang 1,', 'TI', 'Muhammad Prastyo', 'Imam Prasetyo, S.Kom.', '2020-02-01'),
(58, 'Direktur', 'Direktur', 'Meja:Paku meja kurang 1,Gelas:Masih Bagus,', 'TU', 'Muhammad Prastyo', 'Muhammad Prastyo', '2020-02-14'),
(59, 'Direktur', 'Direktur', 'Meja:Paku meja kurang 1,Gelas:Masih Bagus,', 'TU', 'Muhammad Prastyo', 'Muhammad Prastyo', '2020-02-14'),
(60, 'Direktur', 'Direktur', 'Meja:Paku meja kurang 1,Gelas:Masih Bagus,', 'TI', 'Muhammad Prastyo', 'Muhammad Prastyo', '2020-02-08'),
(61, 'Staff IT', 'Staff IT', 'Meja:Paku meja kurang 1,Gelas:Masih Bagus,', 'TI', 'Imam Prasetyo, S.Kom.', 'Imam Prasetyo, S.Kom.', '2020-02-14'),
(62, 'Staff IT', 'Staff IT', 'Meja:Paku meja kurang 1,Gelas:Masih Bagus,', 'TU', 'Imam Prasetyo, S.Kom.', 'Imam Prasetyo, S.Kom.', '2020-02-15'),
(63, 'Direktur', 'Guru Kelas', 'Meja:Paku meja kurang 1,Gelas:Masih Bagus,', 'TU', 'Muhammad Prastyo', 'Johan Saifudin', '2020-02-15'),
(64, 'Guru Kelas', 'Guru Kelas', 'Gelas:Masih Bagus,AC:BAGUS SEKALI,', 'TU', 'Johan Saifudin', 'Johan Saifudin', '2020-02-15'),
(65, 'Guru Kelas', 'Guru Kelas', 'HDMI:Tembaga nya hilang,AC:Kurang Dingin,', 'TUU', 'Johan Saifudin', 'Johan Saifudin', '2020-02-15'),
(66, 'Direktur', 'Guru Kelas', 'HDMI:Tembaga nya hilang,AC:Kurang Dingin,', 'vdskvb', 'Muhammad Prastyo', 'Johan Saifudin', '2020-02-19'),
(67, 'Staff IT', 'Staff IT', 'HDMI:Tembaga nya hilang,AC:Kurang Dingin,', 'IT', 'Imam Prasetyo, S.Kom.', 'Imam Prasetyo, S.Kom.', '2020-02-22'),
(68, 'Staff IT', 'Guru Kelas', 'HDMI:Tembaga nya hilang,AC:Kurang Dingin,', 'yu', 'Imam Prasetyo, S.Kom.', 'Johan Saifudin', '2020-02-22'),
(69, 'Staff IT', 'Staff IT', 'HDMI:Tembaga nya hilang,Gelas:Masih Bagus,AC:Kurang Dingin,', 'IT', 'Imam Prasetyo, S.Kom.', 'Imam Prasetyo, S.Kom.', '2020-02-21'),
(70, 'Guru Kelas', 'Guru Kelas', 'BUKU CODING:Barang Masih Bagus,', 'TI', 'Johan Saifudin', 'Johan Saifudin', '2020-02-15'),
(71, 'Guru Kelas', 'Guru Kelas', 'BUKU CODING:Barang Masih Bagus,', 'TI', 'Johan Saifudin', 'Johan Saifudin', '2020-02-15'),
(72, 'Staff IT', 'Guru Kelas', 'HDMI:Tembaga nya hilang,BUKU CODING:Barang Masih Bagus,', 'IT', 'Imam Prasetyo, S.Kom.', 'Johan Saifudin', '2020-02-15'),
(73, 'Direktur', 'Staff IT', 'HDMI:Tembaga nya hilang,BUKU CODING:Barang Masih Bagus,', 'TI', 'Muhammad Prastyo', 'Imam Prasetyo, S.Kom.', '2020-02-22');

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
  ADD KEY `fk_id_spesifikasi` (`id_spesifikasi`),
  ADD KEY `fk_id_barang` (`id_barang`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_data_transaksi`),
  ADD KEY `fk_id_barcode` (`id_barcode`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

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
-- Indexes for table `spesifikasi_barang`
--
ALTER TABLE `spesifikasi_barang`
  ADD PRIMARY KEY (`id_spesifikasi`),
  ADD UNIQUE KEY `no_pabrik` (`no_pabrik`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id_barcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_data_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spesifikasi_barang`
--
ALTER TABLE `spesifikasi_barang`
  MODIFY `id_spesifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
  MODIFY `Id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
  ADD CONSTRAINT `fk_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`),
  ADD CONSTRAINT `fk_id_spesifikasi` FOREIGN KEY (`id_spesifikasi`) REFERENCES `spesifikasi_barang` (`id_spesifikasi`);

--
-- Constraints for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD CONSTRAINT `fk_id_barcode` FOREIGN KEY (`id_barcode`) REFERENCES `barcode` (`id_barcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
