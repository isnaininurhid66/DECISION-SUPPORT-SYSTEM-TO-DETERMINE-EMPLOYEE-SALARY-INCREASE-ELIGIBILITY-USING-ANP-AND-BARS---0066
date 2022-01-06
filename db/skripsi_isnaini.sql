-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 08:23 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_isnaini`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(5) NOT NULL,
  `kode_alternatif` varchar(50) NOT NULL,
  `tgl` text NOT NULL,
  `jumlah_hadir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `kode_alternatif`, `tgl`, `jumlah_hadir`) VALUES
(1, 'KARYAWAN01', '15-04-1999', '25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `foto_user` text NOT NULL,
  `hak_akses` enum('admin','karyawan','manager') NOT NULL DEFAULT 'karyawan',
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `alamat_alternatif` text NOT NULL,
  `no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('plth','no','yes','adm') NOT NULL DEFAULT 'no',
  `keterangan` varchar(150) NOT NULL,
  `total` double NOT NULL,
  `rank` int(11) NOT NULL,
  `id_periode` int(3) NOT NULL,
  `tahun_masuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `username`, `password`, `nama_alternatif`, `foto_user`, `hak_akses`, `tempat_lahir`, `tanggal_lahir`, `alamat_alternatif`, `no`, `email`, `status`, `keterangan`, `total`, `rank`, `id_periode`, `tahun_masuk`) VALUES
('1', 'admin', 'admin', 'dwiki firmansyah 1', '', 'admin', '', '2021-10-13', 'KP poncol Bulak RT 0217  bekasi selatan', '', '', 'no', '', 1, 1, 1, ''),
('KARYAWAN01', 'anisa', 'anisa', 'Anisa Meliarini', '', 'karyawan', '', '', '', '', '', 'no', '', 0.55464064837534, 1, 1, '2021-12'),
('KARYAWAN02', 'fadil', 'fadil', 'Firman Fadhilah', '', 'karyawan', '', '', '', '', '', 'no', '', 0.21911567764064, 3, 1, ''),
('KARYAWAN03', 'dwij', 'dwij', 'Dwi juniarto', '', 'karyawan', '', '', '', '', '', 'no', '', 0.22624367398402, 2, 1, ''),
('USER01', 'dwiki2', 'dwiki2', 'Dwiki Firmansyah', '', 'manager', 'bekasi', '2021-12-09', 'kp poncol bulak rt02/17', '0812309010648', 'dtras.com@gmail.com', 'no', '', 0, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alt_krit`
--

CREATE TABLE `tb_alt_krit` (
  `kode_alternatif` varchar(16) NOT NULL,
  `kode_kriteria` varchar(16) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alt_krit`
--

INSERT INTO `tb_alt_krit` (`kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
('KARYAWAN01', 'C01', 0.45396825396825),
('KARYAWAN01', 'C02', 0.22539682539683),
('KARYAWAN01', 'C03', 0.32063492063492),
('KARYAWAN03', 'C01', 0.33333333333333),
('KARYAWAN03', 'C02', 0.33333333333333),
('KARYAWAN03', 'C03', 0.33333333333333);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kenaikan_gaji`
--

CREATE TABLE `tb_kenaikan_gaji` (
  `id_kg` int(5) NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `rank` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kenaikan_gaji`
--

INSERT INTO `tb_kenaikan_gaji` (`id_kg`, `nominal`, `ket`, `rank`) VALUES
(1, '1500000', 'Apabila anda mendapatkan rank 1 maka anda berhak mendaptakn kenaikan gaji sebesar', 1),
(2, '1000000', 'Apabila anda mendapatkan rank 2 maka anda berhak mendaptakn kenaikan gaji sebesar', 2),
(3, '500000', 'Apabila anda mendapatkan rank 3 maka anda berhak mendaptakn kenaikan gaji sebesar	', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `keterangan`) VALUES
('C03', 'Tanggung Jawab', ''),
('C01', 'Pencapaian Target / value dari Insentif', ''),
('C02', 'Disiplin / value dari Absensi', ''),
('C04', 'Leadership', ''),
('C05', 'Kepatuhan', ''),
('C06', 'Kejujuran', ''),
('C07', 'Motivasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_krit_alt`
--

CREATE TABLE `tb_krit_alt` (
  `kode_kriteria` varchar(16) NOT NULL,
  `kode_alternatif` varchar(16) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_krit_alt`
--

INSERT INTO `tb_krit_alt` (`kode_kriteria`, `kode_alternatif`, `nilai`) VALUES
('C01', 'KARYAWAN01', 0.69020251778872),
('C01', 'KARYAWAN02', 0.14915161466886),
('C01', 'KARYAWAN03', 0.16064586754242),
('C02', 'KARYAWAN01', 0.33333333333333),
('C02', 'KARYAWAN02', 0.33333333333333),
('C02', 'KARYAWAN03', 0.33333333333333),
('C06', 'KARYAWAN01', 0.33333333333333),
('C06', 'KARYAWAN02', 0.33333333333333),
('C06', 'KARYAWAN03', 0.33333333333333);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman_barang`
--

CREATE TABLE `tb_pengiriman_barang` (
  `id_pb` int(5) NOT NULL,
  `kode_alternatif` varchar(50) NOT NULL,
  `initial` varchar(20) NOT NULL,
  `kode` int(15) NOT NULL,
  `tgl_invoice` text NOT NULL,
  `fromm` varchar(50) NOT NULL,
  `too` text NOT NULL,
  `nopol` varchar(50) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `helper1` varchar(50) NOT NULL,
  `helper2` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `instv_driver` varchar(50) NOT NULL,
  `instv_helper1` varchar(50) NOT NULL,
  `instv_helper2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengiriman_barang`
--

INSERT INTO `tb_pengiriman_barang` (`id_pb`, `kode_alternatif`, `initial`, `kode`, `tgl_invoice`, `fromm`, `too`, `nopol`, `driver`, `helper1`, `helper2`, `rate`, `instv_driver`, `instv_helper1`, `instv_helper2`) VALUES
(2, 'KARYAWAN01', 'SJA', 2147483647, '2021-12-08', 'bekasi', 'jakarta', 'B 123 456', 'dwiki firmansyah 1', 'Gilang VK', 'Rama Vk 2', '0', '50000', '25000', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_periode`
--

CREATE TABLE `tb_periode` (
  `id` int(3) NOT NULL,
  `tahun` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_periode`
--

INSERT INTO `tb_periode` (`id`, `tahun`, `status`) VALUES
(1, '2019', '1'),
(2, '2020', '0'),
(3, '2021', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL,
  `kode1` varchar(16) DEFAULT NULL,
  `kode2` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`ID`, `kode1`, `kode2`, `kode_kriteria`, `nilai`) VALUES
(3751, 'KARYAWAN03', 'KARYAWAN01', 'C03', 1),
(3752, 'KARYAWAN03', 'KARYAWAN02', 'C03', 1),
(3753, 'KARYAWAN03', 'KARYAWAN03', 'C03', 1),
(3754, 'KARYAWAN01', 'KARYAWAN03', 'C03', 1),
(3755, 'KARYAWAN02', 'KARYAWAN03', 'C03', 1),
(3756, 'KARYAWAN01', 'KARYAWAN01', 'C04', 1),
(3757, 'KARYAWAN01', 'KARYAWAN02', 'C04', 1),
(3758, 'KARYAWAN01', 'KARYAWAN03', 'C04', 1),
(3759, 'KARYAWAN02', 'KARYAWAN01', 'C04', 1),
(3760, 'KARYAWAN02', 'KARYAWAN02', 'C04', 1),
(3761, 'KARYAWAN02', 'KARYAWAN03', 'C04', 1),
(3762, 'KARYAWAN03', 'KARYAWAN01', 'C04', 1),
(3763, 'KARYAWAN03', 'KARYAWAN02', 'C04', 1),
(3764, 'KARYAWAN03', 'KARYAWAN03', 'C04', 1),
(3765, 'KARYAWAN01', 'KARYAWAN01', 'C05', 1),
(3766, 'KARYAWAN01', 'KARYAWAN02', 'C05', 1),
(3767, 'KARYAWAN01', 'KARYAWAN03', 'C05', 1),
(3768, 'KARYAWAN02', 'KARYAWAN01', 'C05', 1),
(3769, 'KARYAWAN02', 'KARYAWAN02', 'C05', 1),
(3770, 'KARYAWAN02', 'KARYAWAN03', 'C05', 1),
(3771, 'KARYAWAN03', 'KARYAWAN01', 'C05', 1),
(3772, 'KARYAWAN03', 'KARYAWAN02', 'C05', 1),
(3773, 'KARYAWAN03', 'KARYAWAN03', 'C05', 1),
(3774, 'KARYAWAN01', 'KARYAWAN01', 'C06', 1),
(3775, 'KARYAWAN01', 'KARYAWAN02', 'C06', 1),
(3776, 'KARYAWAN01', 'KARYAWAN03', 'C06', 1),
(3777, 'KARYAWAN02', 'KARYAWAN01', 'C06', 1),
(3778, 'KARYAWAN02', 'KARYAWAN02', 'C06', 1),
(3779, 'KARYAWAN02', 'KARYAWAN03', 'C06', 1),
(3780, 'KARYAWAN03', 'KARYAWAN01', 'C06', 1),
(3781, 'KARYAWAN03', 'KARYAWAN02', 'C06', 1),
(3782, 'KARYAWAN03', 'KARYAWAN03', 'C06', 1),
(3783, 'KARYAWAN01', 'KARYAWAN01', 'C07', 1),
(3784, 'KARYAWAN01', 'KARYAWAN02', 'C07', 1),
(3785, 'KARYAWAN01', 'KARYAWAN03', 'C07', 1),
(3786, 'KARYAWAN02', 'KARYAWAN01', 'C07', 1),
(3787, 'KARYAWAN02', 'KARYAWAN02', 'C07', 1),
(3788, 'KARYAWAN02', 'KARYAWAN03', 'C07', 1),
(3789, 'KARYAWAN03', 'KARYAWAN01', 'C07', 1),
(3790, 'KARYAWAN03', 'KARYAWAN02', 'C07', 1),
(3791, 'KARYAWAN03', 'KARYAWAN03', 'C07', 1),
(3749, 'KARYAWAN01', 'KARYAWAN03', 'C02', 1),
(3748, 'KARYAWAN03', 'KARYAWAN03', 'C02', 1),
(3747, 'KARYAWAN03', 'KARYAWAN02', 'C02', 1),
(3746, 'KARYAWAN03', 'KARYAWAN01', 'C02', 1),
(3745, 'KARYAWAN02', 'KARYAWAN03', 'C01', 1),
(3729, 'KARYAWAN01', 'KARYAWAN01', 'C01', 1),
(3730, 'KARYAWAN01', 'KARYAWAN01', 'C02', 1),
(3731, 'KARYAWAN02', 'KARYAWAN01', 'C01', 0.2),
(3732, 'KARYAWAN02', 'KARYAWAN02', 'C01', 1),
(3733, 'KARYAWAN01', 'KARYAWAN02', 'C01', 5),
(3734, 'KARYAWAN02', 'KARYAWAN01', 'C02', 1),
(3735, 'KARYAWAN02', 'KARYAWAN02', 'C02', 1),
(3736, 'KARYAWAN01', 'KARYAWAN02', 'C02', 1),
(3737, 'KARYAWAN01', 'KARYAWAN01', 'C03', 1),
(3738, 'KARYAWAN01', 'KARYAWAN02', 'C03', 1),
(3739, 'KARYAWAN02', 'KARYAWAN01', 'C03', 1),
(3740, 'KARYAWAN02', 'KARYAWAN02', 'C03', 1),
(3741, 'KARYAWAN03', 'KARYAWAN01', 'C01', 0.25),
(3742, 'KARYAWAN03', 'KARYAWAN02', 'C01', 1),
(3743, 'KARYAWAN03', 'KARYAWAN03', 'C01', 1),
(3744, 'KARYAWAN01', 'KARYAWAN03', 'C01', 4),
(3750, 'KARYAWAN02', 'KARYAWAN03', 'C02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_kriteria`
--

CREATE TABLE `tb_rel_kriteria` (
  `ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode1` varchar(16) DEFAULT NULL,
  `kode2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_kriteria`
--

INSERT INTO `tb_rel_kriteria` (`ID`, `kode_alternatif`, `kode1`, `kode2`, `nilai`) VALUES
(428, 'KARYAWAN01', 'C01', 'C01', 1),
(429, 'KARYAWAN01', 'C01', 'C02', 3),
(431, 'KARYAWAN01', 'C02', 'C01', 0.3333333333333333),
(432, 'KARYAWAN01', 'C02', 'C02', 1),
(434, 'KARYAWAN02', 'C01', 'C01', 1),
(435, 'KARYAWAN02', 'C01', 'C02', 1),
(437, 'KARYAWAN02', 'C02', 'C01', 1),
(438, 'KARYAWAN02', 'C02', 'C02', 1),
(440, 'KARYAWAN01', 'C03', 'C01', 1),
(441, 'KARYAWAN01', 'C03', 'C02', 1),
(442, 'KARYAWAN01', 'C03', 'C03', 1),
(443, 'KARYAWAN01', 'C01', 'C03', 1),
(444, 'KARYAWAN01', 'C02', 'C03', 1),
(446, 'KARYAWAN02', 'C03', 'C01', 1),
(447, 'KARYAWAN02', 'C03', 'C02', 1),
(448, 'KARYAWAN02', 'C03', 'C03', 1),
(449, 'KARYAWAN02', 'C01', 'C03', 1),
(450, 'KARYAWAN02', 'C02', 'C03', 1),
(452, 'KARYAWAN03', 'C01', 'C01', 1),
(453, 'KARYAWAN03', 'C01', 'C02', 1),
(454, 'KARYAWAN03', 'C01', 'C03', 1),
(455, 'KARYAWAN03', 'C02', 'C01', 1),
(456, 'KARYAWAN03', 'C02', 'C02', 1),
(457, 'KARYAWAN03', 'C02', 'C03', 1),
(458, 'KARYAWAN03', 'C03', 'C01', 1),
(459, 'KARYAWAN03', 'C03', 'C02', 1),
(460, 'KARYAWAN03', 'C03', 'C03', 1),
(461, 'KARYAWAN01', 'C04', 'C01', 1),
(462, 'KARYAWAN01', 'C04', 'C02', 1),
(463, 'KARYAWAN01', 'C04', 'C03', 1),
(464, 'KARYAWAN01', 'C04', 'C04', 1),
(468, 'KARYAWAN01', 'C01', 'C04', 1),
(469, 'KARYAWAN01', 'C02', 'C04', 1),
(470, 'KARYAWAN01', 'C03', 'C04', 1),
(471, 'KARYAWAN02', 'C04', 'C01', 1),
(472, 'KARYAWAN02', 'C04', 'C02', 1),
(473, 'KARYAWAN02', 'C04', 'C03', 1),
(474, 'KARYAWAN02', 'C04', 'C04', 1),
(478, 'KARYAWAN02', 'C01', 'C04', 1),
(479, 'KARYAWAN02', 'C02', 'C04', 1),
(480, 'KARYAWAN02', 'C03', 'C04', 1),
(481, 'KARYAWAN03', 'C04', 'C01', 1),
(482, 'KARYAWAN03', 'C04', 'C02', 1),
(483, 'KARYAWAN03', 'C04', 'C03', 1),
(484, 'KARYAWAN03', 'C04', 'C04', 1),
(488, 'KARYAWAN03', 'C01', 'C04', 1),
(489, 'KARYAWAN03', 'C02', 'C04', 1),
(490, 'KARYAWAN03', 'C03', 'C04', 1),
(491, 'KARYAWAN01', 'C05', 'C01', 1),
(492, 'KARYAWAN01', 'C05', 'C02', 1),
(493, 'KARYAWAN01', 'C05', 'C03', 1),
(494, 'KARYAWAN01', 'C05', 'C04', 1),
(495, 'KARYAWAN01', 'C05', 'C05', 1),
(498, 'KARYAWAN01', 'C01', 'C05', 1),
(499, 'KARYAWAN01', 'C02', 'C05', 1),
(500, 'KARYAWAN01', 'C03', 'C05', 1),
(501, 'KARYAWAN01', 'C04', 'C05', 1),
(505, 'KARYAWAN02', 'C05', 'C01', 1),
(506, 'KARYAWAN02', 'C05', 'C02', 1),
(507, 'KARYAWAN02', 'C05', 'C03', 1),
(508, 'KARYAWAN02', 'C05', 'C04', 1),
(509, 'KARYAWAN02', 'C05', 'C05', 1),
(512, 'KARYAWAN02', 'C01', 'C05', 1),
(513, 'KARYAWAN02', 'C02', 'C05', 1),
(514, 'KARYAWAN02', 'C03', 'C05', 1),
(515, 'KARYAWAN02', 'C04', 'C05', 1),
(519, 'KARYAWAN03', 'C05', 'C01', 1),
(520, 'KARYAWAN03', 'C05', 'C02', 1),
(521, 'KARYAWAN03', 'C05', 'C03', 1),
(522, 'KARYAWAN03', 'C05', 'C04', 1),
(523, 'KARYAWAN03', 'C05', 'C05', 1),
(526, 'KARYAWAN03', 'C01', 'C05', 1),
(527, 'KARYAWAN03', 'C02', 'C05', 1),
(528, 'KARYAWAN03', 'C03', 'C05', 1),
(529, 'KARYAWAN03', 'C04', 'C05', 1),
(533, 'KARYAWAN01', 'C06', 'C01', 1),
(534, 'KARYAWAN01', 'C06', 'C02', 1),
(535, 'KARYAWAN01', 'C06', 'C03', 1),
(536, 'KARYAWAN01', 'C06', 'C04', 1),
(537, 'KARYAWAN01', 'C06', 'C05', 1),
(538, 'KARYAWAN01', 'C06', 'C06', 1),
(540, 'KARYAWAN01', 'C01', 'C06', 1),
(541, 'KARYAWAN01', 'C02', 'C06', 1),
(542, 'KARYAWAN01', 'C03', 'C06', 1),
(543, 'KARYAWAN01', 'C04', 'C06', 1),
(544, 'KARYAWAN01', 'C05', 'C06', 1),
(547, 'KARYAWAN02', 'C06', 'C01', 1),
(548, 'KARYAWAN02', 'C06', 'C02', 1),
(549, 'KARYAWAN02', 'C06', 'C03', 1),
(550, 'KARYAWAN02', 'C06', 'C04', 1),
(551, 'KARYAWAN02', 'C06', 'C05', 1),
(552, 'KARYAWAN02', 'C06', 'C06', 1),
(554, 'KARYAWAN02', 'C01', 'C06', 1),
(555, 'KARYAWAN02', 'C02', 'C06', 1),
(556, 'KARYAWAN02', 'C03', 'C06', 1),
(557, 'KARYAWAN02', 'C04', 'C06', 1),
(558, 'KARYAWAN02', 'C05', 'C06', 1),
(561, 'KARYAWAN03', 'C06', 'C01', 1),
(562, 'KARYAWAN03', 'C06', 'C02', 1),
(563, 'KARYAWAN03', 'C06', 'C03', 1),
(564, 'KARYAWAN03', 'C06', 'C04', 1),
(565, 'KARYAWAN03', 'C06', 'C05', 1),
(566, 'KARYAWAN03', 'C06', 'C06', 1),
(568, 'KARYAWAN03', 'C01', 'C06', 1),
(569, 'KARYAWAN03', 'C02', 'C06', 1),
(570, 'KARYAWAN03', 'C03', 'C06', 1),
(571, 'KARYAWAN03', 'C04', 'C06', 1),
(572, 'KARYAWAN03', 'C05', 'C06', 1),
(575, 'KARYAWAN01', 'C07', 'C01', 1),
(576, 'KARYAWAN01', 'C07', 'C02', 1),
(577, 'KARYAWAN01', 'C07', 'C03', 1),
(578, 'KARYAWAN01', 'C07', 'C04', 1),
(579, 'KARYAWAN01', 'C07', 'C05', 1),
(580, 'KARYAWAN01', 'C07', 'C06', 1),
(581, 'KARYAWAN01', 'C07', 'C07', 1),
(582, 'KARYAWAN01', 'C01', 'C07', 1),
(583, 'KARYAWAN01', 'C02', 'C07', 1),
(584, 'KARYAWAN01', 'C03', 'C07', 1),
(585, 'KARYAWAN01', 'C04', 'C07', 1),
(586, 'KARYAWAN01', 'C05', 'C07', 1),
(587, 'KARYAWAN01', 'C06', 'C07', 1),
(589, 'KARYAWAN02', 'C07', 'C01', 1),
(590, 'KARYAWAN02', 'C07', 'C02', 1),
(591, 'KARYAWAN02', 'C07', 'C03', 1),
(592, 'KARYAWAN02', 'C07', 'C04', 1),
(593, 'KARYAWAN02', 'C07', 'C05', 1),
(594, 'KARYAWAN02', 'C07', 'C06', 1),
(595, 'KARYAWAN02', 'C07', 'C07', 1),
(596, 'KARYAWAN02', 'C01', 'C07', 1),
(597, 'KARYAWAN02', 'C02', 'C07', 1),
(598, 'KARYAWAN02', 'C03', 'C07', 1),
(599, 'KARYAWAN02', 'C04', 'C07', 1),
(600, 'KARYAWAN02', 'C05', 'C07', 1),
(601, 'KARYAWAN02', 'C06', 'C07', 1),
(603, 'KARYAWAN03', 'C07', 'C01', 1),
(604, 'KARYAWAN03', 'C07', 'C02', 1),
(605, 'KARYAWAN03', 'C07', 'C03', 1),
(606, 'KARYAWAN03', 'C07', 'C04', 1),
(607, 'KARYAWAN03', 'C07', 'C05', 1),
(608, 'KARYAWAN03', 'C07', 'C06', 1),
(609, 'KARYAWAN03', 'C07', 'C07', 1),
(610, 'KARYAWAN03', 'C01', 'C07', 1),
(611, 'KARYAWAN03', 'C02', 'C07', 1),
(612, 'KARYAWAN03', 'C03', 'C07', 1),
(613, 'KARYAWAN03', 'C04', 'C07', 1),
(614, 'KARYAWAN03', 'C05', 'C07', 1),
(615, 'KARYAWAN03', 'C06', 'C07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria`
--

CREATE TABLE `tb_subkriteria` (
  `id_subkriteria` int(5) NOT NULL,
  `kode_kriteria` varchar(5) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subkriteria`
--

INSERT INTO `tb_subkriteria` (`id_subkriteria`, `kode_kriteria`, `nama_subkriteria`, `nilai`) VALUES
(10, 'C01', 'Pencapaian sangat kurang dari target yang sudah di', 1),
(11, 'C01', 'Pencapaian kurang dari target yang sudah ditetapka', 2),
(12, 'C01', 'Pencapaian mendekati target yang sudah di tetapkan', 3),
(13, 'C01', 'Pencapaian sesuai target yang sudah ditetapkan', 4),
(14, 'C01', 'Pencapaian melebihi target yang sudah ditetapkan', 5),
(15, 'C02', 'Sering datang terlambat dan absen tanpa alasan yan', 1),
(16, 'C02', 'Tingkat absensi > 10% dan datang kadang terlambat', 2),
(17, 'C02', 'Selalu hadir tetapi terkadang telambat dan sesekal', 3),
(18, 'C02', 'Selalu hadir tepat waktu dengan  tingkat absensi <', 4),
(19, 'C02', 'Secara konsisten selalu hadir tepat waktu dengan t', 5),
(20, 'C03', 'Sering kali tidak mengerjakan tugas yang diberikan', 1),
(21, 'C03', 'Tugas yang diberikan dikerjakan namun kerap kali t', 2),
(22, 'C03', 'Mengerjakan tugas yang diberikan terkadang terlamb', 3),
(23, 'C03', 'Selalu mengerjakan tugas yang diberikan dengan tep', 4),
(24, 'C03', 'Selalu mengerjakan tugas yang diberikan , mengumpu', 5),
(25, 'C04', 'Tidak mampu bertindak tegas dan tidak memihak', 1),
(26, 'C04', 'Kadang mudah dipengaruhi', 2),
(27, 'C04', 'Bersikap sedikit memihak namun masih dalam batasan', 3),
(28, 'C04', 'Bertindak tegas dan tidak memihak serta mampu meng', 4),
(29, 'C04', 'Bertindak tegas dan tidak memihak serta menjadi te', 5),
(30, 'C05', 'Sering melanggar aturan-aturan dan prosedur kerja ', 1),
(31, 'C05', 'Kadang-kadang melakukan pelanggaran atas aturan-at', 2),
(32, 'C05', 'Tidak menaati aturan-aturan dan prosedur kerja ser', 3),
(33, 'C05', 'Sesekali tidak menaati aturan-aturan dan prosedur ', 4),
(34, 'C05', 'Selalu menaati aturan-aturan dan prosedur kerja se', 5),
(35, 'C06', 'Sering melaporkan hasil kerjanya tidak sesuai deng', 1),
(36, 'C06', 'Terkadang hasil kerja yang dilaporkan pada atasany', 2),
(37, 'C06', 'Hasil kerja yang dilaporkan tidak sesuai dengan ke', 3),
(38, 'C06', 'Sesekali tidak melaporkan hasil kerjaanya kepada a', 4),
(39, 'C06', 'Selalu melaporkan hasil kerja kepada atasan menuru', 5),
(40, 'C07', 'Mengabaikan tugas yang diberikan', 1),
(41, 'C07', 'Membutuhkan dorongan tambahan agar melaksanakan tu', 2),
(42, 'C07', 'Mengerjakan tugas sesuai yang diharapkan ', 3),
(43, 'C07', 'Mengerjakan tugas lebih dari yang diharapkan ', 4),
(44, 'C07', 'Mengerjakan tugas dengan effort yang luar biasa de', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tb_alt_krit`
--
ALTER TABLE `tb_alt_krit`
  ADD PRIMARY KEY (`kode_alternatif`,`kode_kriteria`);

--
-- Indexes for table `tb_kenaikan_gaji`
--
ALTER TABLE `tb_kenaikan_gaji`
  ADD PRIMARY KEY (`id_kg`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_krit_alt`
--
ALTER TABLE `tb_krit_alt`
  ADD PRIMARY KEY (`kode_kriteria`,`kode_alternatif`);

--
-- Indexes for table `tb_pengiriman_barang`
--
ALTER TABLE `tb_pengiriman_barang`
  ADD PRIMARY KEY (`id_pb`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kenaikan_gaji`
--
ALTER TABLE `tb_kenaikan_gaji`
  MODIFY `id_kg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pengiriman_barang`
--
ALTER TABLE `tb_pengiriman_barang`
  MODIFY `id_pb` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3792;
--
-- AUTO_INCREMENT for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;
--
-- AUTO_INCREMENT for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
