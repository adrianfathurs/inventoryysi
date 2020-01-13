-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 01:47 PM
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
  `tanggal_pengadaan` date NOT NULL,
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
(1, 'polycarbonat', 'pembelian', '0000-00-00', 'Hitam', 'set', 'baik', 100000, NULL, 'TI'),
(2, 'sintetis', 'pembelian', '0000-00-00', 'putih', 'set', 'Baik', 120000, NULL, 'TI'),
(3, 'Polycarbonat', 'Ngepet', '0000-00-00', 'Hitam', 'Set', 'Keadaan Barang', 7500000, NULL, 'SD'),
(4, 'Polycarbonat', 'Ngepet', '0000-00-00', 'Hitam', 'Set', 'Keadaan Barang', 7500000, NULL, 'SD'),
(5, 'Besi', 'pembelian', '0000-00-00', 'Coklat', 'Set', 'Baik', 20000000, NULL, 'TI'),
(6, 'Besi', 'pembelian', '0000-00-00', 'Coklat', 'Set', 'Baik', 20000000, NULL, 'TI'),
(7, 'Plastik', 'ngepet', '0000-00-00', 'Hitam', 'Rol', 'Baik', 200000, NULL, 'TU'),
(8, 'Kaca', 'Ngepet', '0000-00-00', 'Putih', 'Biji', 'Baik', 75000, NULL, 'TU'),
(9, 'Plastik', 'Pembelian', '0000-00-00', 'Hitam', 'Set', 'Baik', 2000000, NULL, 'TU'),
(10, 'Besi', 'Nggali', '0000-00-00', 'Kuning', 'Set', 'Baik', 90000000, NULL, 'TI'),
(11, 'Besi', 'Nggali', '0000-00-00', 'Kuning', 'Set', 'Baik', 90000000, NULL, 'TI'),
(12, 'Kuningan', 'pembelian', '0000-00-00', 'Hitam-Biru', 'Rol', 'Baik', 800000, NULL, 'TU'),
(13, 'Polycarbonat', 'Pembelian', '0000-00-00', 'hijau', 'Set', 'Baik', 899000, NULL, 'TU'),
(14, 'Polycarbonat', 'Pembelian', '0000-00-00', 'hijau', 'Set', 'Baik', 899000, NULL, 'TU'),
(15, 'sintesis', 'pembelian', '2020-01-28', 'hijau', 'set', 'Rusak', 9000092, NULL, 'TI'),
(16, 'sintesis', 'pembelian', '2020-01-28', 'hijau', 'set', 'Rusak', 9000092, NULL, 'TI'),
(17, 'sintesis', 'pembelian', '2020-01-25', 'kuning', 'set', 'Baik', 6000000, NULL, 'TI'),
(18, 'poly', 'pembelian', '2020-01-29', 'hitam', 'set', 'Baik', 1999923, NULL, 'TU'),
(19, 'kain', 'pembelian', '2020-01-29', 'kuning', 'set', 'Baik', 120000, NULL, 'TI'),
(20, 'Polycarbonat', 'pembelian', '2020-01-28', 'hitam', 'set', 'Baik', 120000, NULL, 'TI'),
(21, 'plastik', 'pembelian', '2020-01-27', 'orange', 'set', 'Baik', 1230000, NULL, 'TU'),
(22, 'plastik', 'pembelian', '2020-01-29', 'kuning', 'Set', 'Baik', 1233123, NULL, 'TI'),
(23, 'plastik', 'pembelian', '2020-01-28', 'hijau', 'set', 'Baik', 1231231, NULL, 'TI'),
(24, 'plastik', 'pembelian', '2020-01-27', 'kuning', 'set', 'Baik', 599999, NULL, 'TI'),
(25, 'plastik', 'pembelian', '2020-01-20', 'biru', 'set', 'Baik', 699999, NULL, 'TI'),
(26, 'olie', 'pembelian', '2020-01-21', 'hijau', 'set', 'Baik', 789003, NULL, 'TI'),
(27, 'karbon', 'pembelian', '2020-01-14', 'hijau', 'set', 'Baik', 123231, NULL, 'TI'),
(28, 'besi', 'pembelian', '2020-01-28', 'coklat', 'set', 'Baik', 799064, NULL, 'TU'),
(29, 'kdfhksjd', 'pembelian', '2020-01-28', 'jfkd', 'set', 'Baik', 41413, NULL, 'TI'),
(30, 'kdfhksjd', 'pembelian', '2020-01-28', 'jfkd', 'set', 'Baik', 41413, NULL, 'TI'),
(31, 'fdshfj', 'pembelian', '2020-01-26', 'kuning', 'djhf', 'Baik', 342342, NULL, 'TI'),
(32, 'fsdg', 'khdvkv', '2020-01-13', 'vkshdkvjd', 'kjshdvk', 'Baik', 3224, NULL, 'TU'),
(33, 'fsf', 'pembelian', '2020-01-15', 'fdfsdf', 'Set', 'Baik', 3424343, NULL, 'TI'),
(34, 'kuning', 'pembelian', '2020-01-28', 'hijau', 'set', 'Baik', 23321, NULL, 'TU'),
(35, 'poly', 'pembelian', '2020-01-28', 'hijau', 'set', 'Baik', 500000, NULL, 'TU'),
(36, 'bdsjas', 'pembelian', '2020-01-28', 'jfkds', 'set', 'Baik', 78905, NULL, 'TI'),
(37, 'hikd', 'fjd', '2020-01-28', 'hiks', 'hfjsd', 'Baik', 231, NULL, 'TI'),
(38, 'hikd', 'fjd', '2020-01-28', 'hiks', 'hfjsd', 'Baik', 231, NULL, 'TI'),
(39, 'plastik', 'pembelian', '2020-01-28', 'hijau', 'set', 'Baik', 23432, NULL, 'TU'),
(40, 'fnjkds', 'fdjsk', '2020-01-27', 'fndsjk', 'fmkdl', 'Baik', 23123, NULL, 'Ti'),
(41, 'fbdsk', 'sklfnkd', '2020-01-28', 'fsdjk', 'fnsd', 'Baik', 43242, NULL, 'TI'),
(42, 'fbsk', 'pembelian', '2020-01-01', 'hitam', 'set', 'Baik', 2313, NULL, 'TI'),
(43, 'plastik', 'pembelian', '2020-01-08', 'hitam', 'fdsn', 'Baik', 2313, NULL, 'TI'),
(44, 'fsjd', 'pembelian', '2020-01-02', 'hitam', 'fsd', 'Baik', 31231, NULL, 'TI'),
(45, 'vfdkb', 'pembelian', '2020-01-09', 'vnjkdfn', 'set', 'Baik', 8394982, NULL, 'TI'),
(46, 'nvsdnvjks', 'pembelian', '2020-01-02', 'skfskj', 'set', 'Baik', 31231, NULL, 'TI'),
(47, 'kjsbjd', 'pembelian', '2020-01-01', 'dsifhsi', 'rol', 'Baik', 2312, NULL, 'IT'),
(48, 'fsdkb', 'pembelian', '2020-01-10', 'fsdjk', 'fdskjf', 'Baik', 42342, NULL, 'TI'),
(49, 'sefrei', 'jfkldjs', '2020-01-08', 'hijau', 'vjkdf', 'Baik', 322, NULL, 'TI'),
(50, ' cds', 'dsjkb', '2020-01-16', 'cds', 'set', 'Baik', 3986, NULL, 'TI'),
(51, 'dfjks', 'ufids', '2020-01-08', 'fdsnkl', 'fdsnk', 'Baik', 89789, NULL, 'TI'),
(52, 'fdskn', 'vsdv', '0000-00-00', 'uisdhi', 'dsd', 'Baik', 31231, NULL, 'TI'),
(53, 'f msd ', 'fsdkn', '2020-01-01', 'dsnfklsn', 'mksl', 'Baik', 342, NULL, 'TI'),
(54, 'vs dvkvkls', 'lcnksl', '2020-01-09', 'vklds', 'klvsdlk', 'Baik', 43, NULL, 'TI'),
(55, 'dskvn', 'kdslc', '2020-01-08', 'nxvns', 'vnkdsn', 'Baik', 32131, NULL, 'IT'),
(56, 'nsldknf', 'prfke', '2020-01-10', 'fnsdl', 'set', 'Baik', 41241, NULL, 're'),
(57, 'cbskb', 'cndskln', '2020-01-09', 'cnsdn', 'dsnk', 'Baik', 2312, NULL, 'TI'),
(58, 'vdkjbvkd', 'pembelian', '2020-01-16', 'dksli', 'ckjsdbc', 'Baik', 3432, NULL, 'ti'),
(59, 'ndsb', 'sdklnv', '2020-01-08', 'sdnk', 'fdksb', 'Baik', 241, NULL, 'TI'),
(60, 'njsdk', 'vskdnv', '2020-01-02', 'vkdjs', 'vdlk', 'Baik', 28283, NULL, 'TI'),
(61, 'Polycarbonat', 'pembelian', '2020-01-16', 'Hijau', 'set', 'Baik', 6778002, NULL, 'IT'),
(62, 'Polycarbonat', 'pembelian', '2020-01-15', 'Hijau', 'set', 'Baik', 483782, NULL, 'IT'),
(63, 'besi', 'Pembelian', '2020-01-16', 'kuning', 'Set', 'Baik', 8900049, NULL, 'TI'),
(64, 'jdkbakj', 'djsakb', '2020-12-25', 'hdsaj', 'Set', 'Baik', 78978978, NULL, 'IT'),
(65, 'jksdbs', 'pembelian', '2020-01-15', 'cjshcjs', 'set', 'Baik', 4535783, NULL, 'TU'),
(66, 'vdskjhvkj', 'diuscsui', '2020-01-23', 'kjbvjkcx', 'set', 'Baik', 3123, NULL, 'TI'),
(67, 'cjasbj', 'cjksbck', '2020-01-08', 'jcsbdj', 'nckasn', 'Baik', 8293289, NULL, 'TI'),
(68, 'jkasbd', 'jksadjsk', '2020-01-14', 'dsjgds', 'khjask', 'Baik', 231876, NULL, 'TI'),
(69, 'csdjkb', 'dhshksj', '2020-01-09', 'ckdshj', 'set', 'Baik', 3827, NULL, 'TI');

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
(1, 'Laptop', 'ASUS', 'A455LF-WX158D'),
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
(69, 'dfkdsnfk', 'dsjkbdk', '348923hu');

-- --------------------------------------------------------

--
-- Table structure for table `ttransaksi`
--

CREATE TABLE `ttransaksi` (
  `Id_transaksi` int(11) NOT NULL,
  `jabatan_penerima` varchar(64) NOT NULL,
  `jabatan_penyerah` varchar(64) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `lokasi_peletakan` varchar(64) NOT NULL,
  `nama_penerima` varchar(64) NOT NULL,
  `nama_penyerah` varchar(64) NOT NULL,
  `tgl_peletakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `fk_id_barcode` (`id_barcode`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
  MODIFY `id_spesifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
  MODIFY `Id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_id_barcode` FOREIGN KEY (`id_barcode`) REFERENCES `barcode` (`id_barcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
