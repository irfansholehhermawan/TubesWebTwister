-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 09:15 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_twister`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_berobat`
--

CREATE TABLE IF NOT EXISTS `t_berobat` (
`id_berobat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_berobat` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_berobat`
--

INSERT INTO `t_berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `tgl_berobat`, `status`) VALUES
(3, 50, 6, '0000-00-00', 'Sudah'),
(4, 51, 6, '0000-00-00', 'Sudah'),
(6, 1, 5, '0000-00-00', 'Belum'),
(7, 44, 5, '0000-00-00', 'Belum'),
(8, 44, 4, '0000-00-00', 'Belum'),
(9, 48, 6, '0000-00-00', 'Sudah'),
(10, 48, 5, '0000-00-00', 'Belum'),
(11, 50, 4, '0000-00-00', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `t_diagnosa`
--

CREATE TABLE IF NOT EXISTS `t_diagnosa` (
`id_diagnosa` int(11) NOT NULL,
  `data_keluhan` text NOT NULL,
  `data_diagnosa` text NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_diagnosa`
--

INSERT INTO `t_diagnosa` (`id_diagnosa`, `data_keluhan`, `data_diagnosa`, `tgl_diagnosa`, `id_dokter`, `id_pasien`) VALUES
(1, 'Panas, Dingin', 'Gigi keropos', '2017-04-22', 6, 50),
(2, 'Sakit Giigi', 'Skit Gigi', '2017-04-22', 6, 51),
(3, 'gigi nyeri', 'Sakit Gigi', '2017-04-22', 6, 48),
(4, 'Pusing', 'THT', '2017-04-22', 4, 50);

-- --------------------------------------------------------

--
-- Table structure for table `t_dokter`
--

CREATE TABLE IF NOT EXISTS `t_dokter` (
`id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `spesialis_dokter` varchar(50) NOT NULL,
  `tgllahir_dokter` date NOT NULL,
  `alamat_dokter` text NOT NULL,
  `notelp_dokter` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dokter`
--

INSERT INTO `t_dokter` (`id_dokter`, `nama_dokter`, `spesialis_dokter`, `tgllahir_dokter`, `alamat_dokter`, `notelp_dokter`) VALUES
(1, 'Dr. Hendra Ridwan', 'Kulit', '1980-08-01', 'Komp. Margahayu Raya Jl. Pluto Raya 89 Blok C No. 32 Kel. Margasari Kec. Buah Batu Bandung 40286', '081321395140'),
(4, 'Dr. Agus Firmansyah', 'THT', '1977-03-01', 'Komp. Batu Raden Jl. Batu Jaya VII No. 4 Bandung', '085624761675'),
(5, 'Dr. Adi Wijaya', 'Jantung', '1981-12-12', 'Komp. Buah Batu Regency Blok C No. 45 Bandung', '081321764857'),
(6, 'Dr. Sholeh Hermawan', 'Gigi', '1984-10-22', 'Jl. Cijagra No. 84 Bandung', '087798766789');

-- --------------------------------------------------------

--
-- Table structure for table `t_medis`
--

CREATE TABLE IF NOT EXISTS `t_medis` (
`id_item_medis` int(11) NOT NULL,
  `nama_item_medis` varchar(30) NOT NULL,
  `kuantitas_item_medis` int(11) NOT NULL,
  `tanggal_kadaluarsa_item_medis` date NOT NULL,
  `harga_jual_item_medis` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_medis`
--

INSERT INTO `t_medis` (`id_item_medis`, `nama_item_medis`, `kuantitas_item_medis`, `tanggal_kadaluarsa_item_medis`, `harga_jual_item_medis`) VALUES
(1, 'Infus 500ml', 112, '2018-03-14', 24000),
(4, 'Tabung Oksigen 35kg', 83, '2018-05-09', 359000),
(5, 'Perban (Roll)', 122, '2020-04-21', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `t_obat`
--

CREATE TABLE IF NOT EXISTS `t_obat` (
`id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(15) NOT NULL,
  `tglkadaluarsa_obat` date NOT NULL,
  `hargajual_obat` int(11) NOT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_obat`
--

INSERT INTO `t_obat` (`id_obat`, `nama_obat`, `jenis_obat`, `tglkadaluarsa_obat`, `hargajual_obat`, `stok_obat`) VALUES
(3, 'Paracetamol', 'Tablet', '2020-06-30', 1500, 287),
(4, 'Eritromisin', 'Sirup', '2018-08-08', 18000, 60),
(5, 'Cetrizin', 'Kapsul', '2019-06-23', 1500, 600),
(8, 'Sulfasalazine', 'Tablet', '2019-02-26', 2300, 230),
(10, 'Flumetason', 'Kapsul', '2018-04-30', 5000, 400),
(11, 'Amphitarine', 'Pil', '2018-03-02', 1950, 160),
(12, 'Chloritine', 'Kapsul', '2019-11-28', 2350, 210),
(13, 'Felizerine', 'Tablet', '2017-11-07', 950, 132);

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien`
--

CREATE TABLE IF NOT EXISTS `t_pasien` (
`id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(35) NOT NULL,
  `jeniskelamin_pasien` varchar(15) NOT NULL,
  `tmptlahir_pasien` varchar(20) NOT NULL,
  `tgllahir_pasien` date NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `goldar_pasien` varchar(2) NOT NULL,
  `notelp_pasien` varchar(13) NOT NULL,
  `usia_pasien` int(3) NOT NULL,
  `statuspernikahan_pasien` varchar(15) NOT NULL,
  `pekerjaan_pasien` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pasien`
--

INSERT INTO `t_pasien` (`id_pasien`, `nama_pasien`, `jeniskelamin_pasien`, `tmptlahir_pasien`, `tgllahir_pasien`, `alamat_pasien`, `goldar_pasien`, `notelp_pasien`, `usia_pasien`, `statuspernikahan_pasien`, `pekerjaan_pasien`) VALUES
(1, 'Risty Zhakia', 'Perempuan', 'Bandung', '1996-05-24', 'Jl. Buah Batu No. 217 Bandung', 'O', '081321395999', 21, 'Belum Menikah', 'Lain-lain'),
(14, 'Meyda Sefira', 'Perempuan', 'Palembang', '1992-04-27', 'Jl. R.E. Martadinata No. 218 Bandung', 'AB', '08575457677', 24, 'Menikah', 'Wiraswasta'),
(44, 'Shafira Elhazima', 'Perempuan', 'Sumedang', '1998-07-30', 'Komp. Buah Batu Regency Blok D3 No. 1 Bandung', 'B', '087824660356', 18, 'Belum Menikah', 'Lain-lain'),
(48, 'Hilda Florissa', 'Perempuan', 'Surabaya', '1992-02-12', 'Jl. Buah Batu No. 217 Bandung', 'A', '085720201122', 25, 'Belum Menikah', 'Pegawai Swasta'),
(50, 'Anjas', 'Laki-laki', 'Purwokerto', '1997-04-17', 'Purwokerto', 'AB', '081318045315', 20, 'Menikah', 'Wiraswasta'),
(51, 'Hanifa', 'Perempuan', 'Mojokerto', '1997-10-14', 'Mojokerto', 'B', '089967524168', 19, 'Belum Menikah', 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `username_user` varchar(20) NOT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `level_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`username_user`, `password_user`, `level_user`) VALUES
('1', 'e15f849d84745e80106b74097a501059', 'dokter'),
('4', 'fdf169558242ee051cca1479770ebac3', 'dokter'),
('5', 'c46335eb267e2e1cde5b017acb4cd799', 'dokter'),
('6', 'ac9b4e0b6a21758534db2a6324d34a54', 'dokter'),
('cheryl', 'abaebd4b81a6f982ccdfc52dda1823dd', 'pendaftaran'),
('miftah', 'abaebd4b81a6f982ccdfc52dda1823dd', 'pendaftaran'),
('vanessa', '282bbbfb69da08d03ff4bcf34a94bc53', 'logistik'),
('winda', '282bbbfb69da08d03ff4bcf34a94bc53', 'logistik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_berobat`
--
ALTER TABLE `t_berobat`
 ADD PRIMARY KEY (`id_berobat`), ADD KEY `id_pasien` (`id_pasien`), ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
 ADD PRIMARY KEY (`id_diagnosa`), ADD KEY `id_dokter` (`id_dokter`), ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `t_dokter`
--
ALTER TABLE `t_dokter`
 ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `t_medis`
--
ALTER TABLE `t_medis`
 ADD PRIMARY KEY (`id_item_medis`);

--
-- Indexes for table `t_obat`
--
ALTER TABLE `t_obat`
 ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `t_pasien`
--
ALTER TABLE `t_pasien`
 ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`username_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_berobat`
--
ALTER TABLE `t_berobat`
MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_dokter`
--
ALTER TABLE `t_dokter`
MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_medis`
--
ALTER TABLE `t_medis`
MODIFY `id_item_medis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_obat`
--
ALTER TABLE `t_obat`
MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_pasien`
--
ALTER TABLE `t_pasien`
MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_berobat`
--
ALTER TABLE `t_berobat`
ADD CONSTRAINT `t_berobat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `t_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `t_berobat_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `t_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
ADD CONSTRAINT `fk_dokter_diagnosa` FOREIGN KEY (`id_dokter`) REFERENCES `t_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_pasien_diagnosa` FOREIGN KEY (`id_pasien`) REFERENCES `t_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
