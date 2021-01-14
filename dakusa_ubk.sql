-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2019 at 02:23 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dakusa_ubk`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_tiket`
--

CREATE TABLE `backup_tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `nope` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_TF` int(12) NOT NULL,
  `kode_unik` varchar(3) NOT NULL,
  `status` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc_setoran`
--

CREATE TABLE `doc_setoran` (
  `tanggal` date NOT NULL,
  `jumlah` double NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc_transaksi_k`
--

CREATE TABLE `doc_transaksi_k` (
  `id_transaksi` int(11) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `penarikan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `status`) VALUES
('K0001', 'Kelas 1', 'Y'),
('K0002', 'Kelas 2', 'Y'),
('K0003', 'Kelas 3', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kotak_aspirasi`
--

CREATE TABLE `kotak_aspirasi` (
  `id_aspirasi` int(11) NOT NULL,
  `id_nasabah` varchar(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `nurut` int(11) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `orang_tua` varchar(50) DEFAULT NULL,
  `saldo` double NOT NULL,
  `emoney` double NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` enum('Y','T') NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`nurut`, `id_nasabah`, `no_rekening`, `username`, `password`, `nama`, `alamat`, `orang_tua`, `saldo`, `emoney`, `tempat_lahir`, `tanggal_lahir`, `id_kelas`, `level`, `status`, `id_session`) VALUES
(1, 'N000001', '161701001', '161701001', '81dc9bdb52d04dc20036dbd8313ed055', 'ADIKA NESTA PRATAMA', 'Perumahan Citra Bukit Indah ( Ciputra ) Blok Wf 03. No. 19', '', 0, 0, 'BALIKPAPAN', '0000-00-00', '', 'nasabah', 'Y', 'dr8qdc61tku40s8op6nffgr5q7'),
(2, 'N000002', '161701002', '161701002', 'b139e104214a08ae3f2ebcce149cdf6e', 'AFWIN HAQ MA\'AYISA', 'Jln. Mistar Cokro Kusumo ,Panjarbaru Selatan', '', 0, 0, 'BALIKPAPAN', '0000-00-00', '', 'nasabah', 'Y', ''),
(3, 'N000003', '161701003', '161701003', 'b139e104214a08ae3f2ebcce149cdf6e', 'CALVIN RAMADHAN', 'Jln. Ashofa No.56 RT.006/001 Kec.Kebon Jeruk Kel.Sukabumi Utara ,Jakarta Barat 11540', '', 0, 0, 'TRENGGALEK', '0000-00-00', '', 'nasabah', 'Y', ''),
(4, 'N000004', '161701004', '161701004', 'b139e104214a08ae3f2ebcce149cdf6e', 'DAFFA FAIZ ATHALLAH', 'jln. Praja Muda 2, Perum Kapri ,Sepinggan Baru ,Balikpapan Selatan ,Kalimantan Timur', '', 0, 0, 'BALIKPAPAN', '0000-00-00', '', 'nasabah', 'Y', ''),
(5, 'N000005', '161701005', '161701005', 'b139e104214a08ae3f2ebcce149cdf6e', 'FADIL HANAN MUSYAFFA', 'Jln. Mbeji Kec. Gandusari ,Kab.Trenggalek ,Jawa Timur', '', 0, 0, 'TRENGGALEK', '0000-00-00', '', 'nasabah', 'Y', ''),
(6, 'N000006', '161701006', '161701006', 'b139e104214a08ae3f2ebcce149cdf6e', 'FATIH RIJALUL HAQ', 'Perum Kopiri blok 2H 29 ,Kan. Penajam Puser Utara', '', 0, 0, 'BALIKPAPAN', '0000-00-00', '', 'nasabah', 'Y', ''),
(7, 'N000007', '161701007', '161701007', 'b139e104214a08ae3f2ebcce149cdf6e', 'FAUZAN SYAMIL ABDULLAH RIZQI', 'Pesantren Istana Mulia Anyer ,Kp Nangka Beruit ,Serang Banten.', '', 0, 0, 'BANTEN', '0000-00-00', '', 'nasabah', 'Y', ''),
(8, 'N000008', '161701008', '161701008', 'b139e104214a08ae3f2ebcce149cdf6e', 'FIRAS FAUQI AKMAL', 'Kampung Bambu ,Bojong Nangka ,Tanggerang', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(9, 'N000009', '161701009', '161701009', 'b139e104214a08ae3f2ebcce149cdf6e', 'HIFDZUL MALIK AMIR', 'Tanggerang, Karawaci Permai, Blok B22, No, 12, Rt 12,', '', 0, 0, 'BANTEN', '0000-00-00', '', 'nasabah', 'Y', ''),
(10, 'N000010', '161701010', '161701010', 'b139e104214a08ae3f2ebcce149cdf6e', 'HISYAM NAFI', 'Dsn. Duren ,Wonorejo Kec.Gandusari Kab. Tenggalek ,Jawa Timur', '', 0, 0, 'TRENGGALEK', '0000-00-00', '', 'nasabah', 'Y', ''),
(11, 'N000011', '161701011', '161701011', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. REZI PRATAMA', 'Muara Beliti, Musiramas, Sumatra selatan', '', 0, 0, 'PALEMBANG ', '0000-00-00', '', 'nasabah', 'Y', ''),
(12, 'N000012', '161701012', '161701012', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. TANZILLAL MEIDIYANSAH', 'Jln. Lintas Sumatra ,Kec.TPK ,Desa Rantau Bingin', '', 0, 0, 'PALEMBANG ', '0000-00-00', '', 'nasabah', 'Y', ''),
(13, 'N000013', '161701013', '161701013', 'b139e104214a08ae3f2ebcce149cdf6e', 'NASYAM MARFIN ABDILLA', 'Rangga Mekar Residence, Blok B, No 1, Bogor.', '', 0, 0, 'BOGOR', '0000-00-00', '', 'nasabah', 'Y', ''),
(14, 'N000014', '161701014', '161701014', 'b139e104214a08ae3f2ebcce149cdf6e', 'MAULUDHA FIOZAKI', 'Dusun Krajan ,desa Bogoran Kec. Kampok Kab. Trenggalek ,RT05/RW03 Prov Jawa Timur', '', 0, 0, 'TRENGGALEK', '0000-00-00', '', 'nasabah', 'Y', ''),
(15, 'N000015', '161701015', '161701015', 'b139e104214a08ae3f2ebcce149cdf6e', 'MOHAMMAD JIHADUDDIN AL-HANIF', 'Kec. Perak Kab. Jombang ,Jawa Timur', '', 0, 0, 'TRENGGALEK ', '0000-00-00', '', 'nasabah', 'Y', ''),
(16, 'N000016', '161701016', '161701016', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD KHAIRURAZAN MALIKI', 'Jln. Kawi-kawi Bawah No.A C12 ,Johar Baru ,Jakarta Pusat ,DKI Jakarta ,Kode Pos 10560', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(17, 'N000017', '161701017', '161701017', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD GHIFARI KHALIF', 'Jln. Raja Wali No.08 Pisangan Gerendau 15419', '', 0, 0, 'TANGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(18, 'N000018', '161701018', '161701018', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD LINTAR KAMIGAWA', 'Jawa Timur, Gandusari, Trenggalek, Desa Ngrayung', '', 0, 0, 'TRENGGALEK', '0000-00-00', '', 'nasabah', 'Y', ''),
(19, 'N000019', '161701019', '161701019', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD RAFFI RABBANI MUSTOFA', 'Ds Gandu Sari Kec.Gandu Sari Kab.Treanggalek', '', 0, 0, 'TRENGGALEK', '0000-00-00', '', 'nasabah', 'Y', ''),
(20, 'N000020', '161701020', '161701020', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD RAFI SEPTIAN', 'Perum. Binong Permai, Blok N4/18 Rt 07/ Rw 08', '', 0, 0, 'TANGGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(21, 'N000021', '161701021', '161701021', 'b139e104214a08ae3f2ebcce149cdf6e', 'REZZA FADHILLAH PUTRA', 'Lebak Wangi, Rt 05/ Rw 02, No 90 Parung Bogor, Jawa Barat', '', 0, 0, 'TANGGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(22, 'N000022', '161701022', '161701022', 'b139e104214a08ae3f2ebcce149cdf6e', 'JOHSEMARIO USOLIN', 'Jl. Hlayatan Gang 2 Malang, Kec Sukun Arjosari', '', 0, 0, 'MALANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(23, 'N000023', '171801023', '171801023', 'b139e104214a08ae3f2ebcce149cdf6e', 'ABDULLAH AZZAM AL MUZAINI', 'Jln. Pesantren RT 01 RW 05 No.55 A ,kreo Selatan ,Ciledug ,Tanggerang Selatan', '', 0, 0, 'TANGGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(24, 'N000024', '171801024', '171801024', 'b139e104214a08ae3f2ebcce149cdf6e', 'AHMAD FAIZ IKRAM KAMIL', 'Jl. Menteng Wadas Timur, No.7 Komplek The 7 Residence, Rt 02/Rw 09, Kelurahan Ps. Manggis, Kec.Setia', '', 0, 0, 'TANGGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(25, 'N000025', '171801025', '171801025', 'b139e104214a08ae3f2ebcce149cdf6e', 'ALWI ERDI MUSTHAFA', 'Jl. Kemuning Utan Kayu Utara, 38A, Rt 04/ Rw 07 ,Kec.Matraman ,Jakarta Timur', '', 0, 0, 'TANGGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(26, 'N000026', '171801026', '171801026', 'b139e104214a08ae3f2ebcce149cdf6e', 'ANANDA RAIHAN INDRA PUTRA', 'Bogor, Jawa Barat Komplek Minhabhakti, No 124', '', 0, 0, 'BOGOR', '0000-00-00', '', 'nasabah', 'Y', ''),
(27, 'N000027', '171801027', '171801027', 'b139e104214a08ae3f2ebcce149cdf6e', 'ASHABUL KAHFI JUNDUL ISLAM', 'Jln. Syahrun RT2/RW  ,Kec.Penajam ,Kel.Nipah-nipah ,Kabupaten PPU', '', 0, 0, 'BALIKPAPAN', '0000-00-00', '', 'nasabah', 'Y', ''),
(28, 'N000028', '171801028', '171801028', 'b139e104214a08ae3f2ebcce149cdf6e', 'ATMAM FIDI SYABANA', 'Jl. Alam Indah Iv, Komp, Medang Lestari', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(29, 'N000029', '171801029', '171801029', 'b139e104214a08ae3f2ebcce149cdf6e', 'AZHARI ZAKARIA', 'Balikpapan, Jl. Praja Mmuda II, No. 17', '', 0, 0, 'BALIKPAPAN', '0000-00-00', '', 'nasabah', 'Y', ''),
(30, 'N000030', '171801030', '171801030', 'b139e104214a08ae3f2ebcce149cdf6e', 'DERMAGANI MUKTIASA', 'Jl. Janur Hijau, Blok Kk21, Rw 5, Rt 10, Rawa Badak Utara, Kecamatan Koja, Jakarta Utara.', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(31, 'N000031', '171801031', '171801031', 'b139e104214a08ae3f2ebcce149cdf6e', 'DHARMA LUGINA FIRDAUS', 'Jln. Kabojaya Gg. Mahoni RT.05 ,Sangatta Utara ,Kutai Timur', '', 0, 0, 'BALIKPAPAN', '0000-00-00', '', 'nasabah', 'Y', ''),
(32, 'N000032', '171801032', '171801032', 'b139e104214a08ae3f2ebcce149cdf6e', 'DZAKWAN NIBRAS PRAYOGA', 'Jl. Cendang 2, Blok H 12, No. 11, Kelurahan Curug, Kabupaten Banten, Rt 04/Rw 15', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(33, 'N000033', '171801033', '171801033', 'b139e104214a08ae3f2ebcce149cdf6e', 'FAHRI ABDULLAH AZZAM', 'Komplek .Taman Asri, Jln. Bunga ,blok G ,No.14 ,Kec. Pelaihari ,Kab.Tanah Laut ,Prov. Kalimantan Sel', '', 0, 0, 'KALSEL', '0000-00-00', '', 'nasabah', 'Y', ''),
(34, 'N000034', '171801034', '171801034', 'b139e104214a08ae3f2ebcce149cdf6e', 'FAHRUL REDO', 'Muara Bliti, Musiramas, Sumsel', '', 0, 0, 'SUMATRA', '0000-00-00', '', 'nasabah', 'Y', ''),
(35, 'N000035', '171801035', '171801035', 'b139e104214a08ae3f2ebcce149cdf6e', 'MAULANA FAIZ RAMADHAN', 'Jln. Peninggaran Barat 3 No.112 ,Kebeyoran Lama ,Jakarta Selatan ,Kode Pos 11240', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(36, 'N000036', '171801036', '171801036', 'b139e104214a08ae3f2ebcce149cdf6e', 'FARIS RASYID MUBARAK', 'Jln. Peninggaran Barat 3 No.112 ,Kebeyoran Lama ,Jakarta Selatan ,Kode Pos 11240', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(37, 'N000037', '171801037', '171801037', 'b139e104214a08ae3f2ebcce149cdf6e', 'FARROS FADLURRACHMAN FALIH', 'Muara Enim, Sumatera Selatan', '', 0, 0, 'DEPOK', '0000-00-00', '', 'nasabah', 'Y', ''),
(38, 'N000038', '171801038', '171801038', 'b139e104214a08ae3f2ebcce149cdf6e', 'HAIDAR DZAKY SUMPENA', 'Perumahan BDS 1 ,C1/1 ,Balikpapan Selatan ,Kalimantan Timur ,Kode Pos 76114', '', 0, 0, 'BALIKPAPAN', '0000-00-00', '', 'nasabah', 'Y', ''),
(39, 'N000039', '171801039', '171801039', 'b139e104214a08ae3f2ebcce149cdf6e', 'HIMAN TAQY MUTAWWALI', 'Citayam, Desa Raga Jaya, Komplek Atsiri Permai, Jl. Kaca Piring I, No 29.', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(40, 'N000040', '171801040', '171801040', 'b139e104214a08ae3f2ebcce149cdf6e', 'LUTHFI SHATARA HARRIENDYO', 'Sentul City, Taman Victoria, Jl. Mahkota Putra, No 131, Babakan Madang, Bogor, Jawa Barat Indonesia.', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(41, 'N000041', '171801041', '171801041', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. EWALDO FAUZAN', 'Dsn Karang Tengah ,Ds. Sukorama Kec. Gandusari ,Kab .Trenggalek', '', 0, 0, 'TGLK', '0000-00-00', '', 'nasabah', 'Y', ''),
(42, 'N000042', '171801042', '171801042', 'b139e104214a08ae3f2ebcce149cdf6e', 'MIFTAHUDIN AL BUKHORI', 'RT 04/RW 02, Dsn. Bakalan, Ds. Surahan Kidul, Kec. Bandung, Kab. Tulungagung, Jawa Timur.', '', 0, 0, 'TGLK', '0000-00-00', '', 'nasabah', 'Y', ''),
(43, 'N000043', '171801043', '171801043', 'b139e104214a08ae3f2ebcce149cdf6e', 'MOCHAMAD ALVIEN SYACHPUTERA', 'Jl. Villa Randu II ,Cimanggu Permai I No.1', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(44, 'N000044', '171801044', '171801044', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD', 'Jln. Istana Kawaluyaan Indah XX', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(45, 'N000045', '171801045', '171801045', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD ABDUL HANNAN RABBANI', 'Lampung Selatan, Wai Hui Jati Agung Perumahan Olie Recidence', '', 0, 0, 'LMPG', '0000-00-00', '', 'nasabah', 'Y', ''),
(46, 'N000046', '171801046', '171801046', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD AL FATIH', 'Dusun Bendo ,Ds.Ngadirejo ,RT.11/RW,04 ,Kec.Pogalan ,Kab.Trenggalek ,Prov.Jawa Timur', '', 0, 0, 'TGLK', '0000-00-00', '', 'nasabah', 'Y', ''),
(47, 'N000047', '171801047', '171801047', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD AYYUB KHOIRULHADI', 'Jln. Padat Karya RT.05 No.77 ,Kec.Balikpapan Utara ,Kel.Muara papak Kode Pos 76125', '', 0, 0, 'BLKPPN', '0000-00-00', '', 'nasabah', 'Y', ''),
(48, 'N000048', '171801048', '171801048', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD FAHAR ADIYATMA', 'Desa Cakul, Kec. Dongko, Trenggalek, Jl. Dongko Panggul Rt 04/ Rw02, Karang Sudo, Jawa Timur', '', 0, 0, 'TGLK', '0000-00-00', '', 'nasabah', 'Y', ''),
(49, 'N000049', '171801049', '171801049', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD FARRAS HAFIDZ AULIA', 'Binong Permai Blok K 7135, Tanggerang', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(50, 'N000050', '171801050', '171801050', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD IHSAN MUSYAFFA', 'Desa Ngulan Kulon Rt 01/ Rw 01, Dsn. Wates, Pogalan, Trenggalek, Alumunium Mandiri Jaya, Kota Trengg', '', 0, 0, 'TGLK', '0000-00-00', '', 'nasabah', 'Y', ''),
(51, 'N000051', '171801051', '171801051', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD RIZQI AMBARDI', 'jakarta selatan ,kalibata Utara 5 Bappenas, D.12 Kec, Pancoran', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(52, 'N000052', '171801052', '171801052', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD SALMAN FARIS AL MUZAKKY', 'Jl. Tegal Gundil Indra Prasta II  Jln. Janaka 6 No.21 Bogor Utara.', '', 0, 0, 'BGR', '0000-00-00', '', 'nasabah', 'Y', ''),
(53, 'N000053', '171801053', '171801053', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD NAUFAL IMADUDDIEN', 'Perum Reni Jaya ,Jln.Sumatra 2 blok J2 No.2 RT.08/RW.006 Kel.Pomdok Benda ,Kec.Pamulang ,Tanggerang ', '', 0, 0, 'DEPOK', '0000-00-00', '', 'nasabah', 'Y', ''),
(54, 'N000054', '171801054', '171801054', 'b139e104214a08ae3f2ebcce149cdf6e', 'QAZY FAZLURRAHMAN ALBANA', 'Jln. Wonorejo RT.34 No.67 Kel. Gn. Samarinda Kec.Balikpapan Utara', '', 0, 0, 'BLKPPN', '0000-00-00', '', 'nasabah', 'Y', ''),
(55, 'N000055', '171801055', '171801055', 'b139e104214a08ae3f2ebcce149cdf6e', 'R. MUH. NADZRIEL NURYADDIN .H', 'Perum. Dasana Indah Blok Sm 8, No 11 A, Kec. Kelapa Dua, Tanggerang, Banten', '', 0, 0, 'BOGOR', '0000-00-00', '', 'nasabah', 'Y', ''),
(56, 'N000056', '171801056', '171801056', 'b139e104214a08ae3f2ebcce149cdf6e', 'RIDHO WILDAN ADITYA', 'Rsta, Blok 05, Rt 11/Rw 09, Lt.2, No 1, Kebon Kacang 9, Jakarta Pusat, Tanah Abang.', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(57, 'N000057', '171801057', '171801057', 'b139e104214a08ae3f2ebcce149cdf6e', 'SAYYAF SA\'DAN ALAM', 'Tanggerang, Kelapa Dua, Legok Permai Blok B1/D1', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(58, 'N000058', '171801058', '171801058', 'b139e104214a08ae3f2ebcce149cdf6e', 'SHIDQI AHMAD FARID', 'Jln. Utama Puri BSI ,Puri Rangkepan Jaya 2 blok F ,No.11 RT.05 / RW.17 ,Kel.Rangkepan Jaya ,Kec.Panc', '', 0, 0, 'DEPOK', '0000-00-00', '', 'nasabah', 'Y', ''),
(59, 'N000059', '171801059', '171801059', 'b139e104214a08ae3f2ebcce149cdf6e', 'SULAIMAN ABDUL AZIZ', 'Jl. Suryalaya Asri II, No. 31, Bandung', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(60, 'N000060', '171801060', '171801060', 'b139e104214a08ae3f2ebcce149cdf6e', 'THARIQ AFDHALU SUKRY', 'Jl. Kesatria, Gang Muktamar Komplek Geuceu,Banda Aceh, No 8', '', 0, 0, 'ACEH', '0000-00-00', '', 'nasabah', 'Y', ''),
(61, 'N000061', '171801061', '171801061', 'b139e104214a08ae3f2ebcce149cdf6e', 'WAHYUDA ADY PURNOMO', 'Balikpapan, Jl. Inpres 3, Gg Anggrek 2, No. 35, Rt17', '', 0, 0, 'BLKPPN', '0000-00-00', '', 'nasabah', 'Y', ''),
(62, 'N000062', '171801062', '171801062', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. SAIFUL AKBAR', 'Jln. MT Haryono ,Perumahan Wika Sawit Recidance ,Balikpapan kalimantan timur', '', 0, 0, 'BLKPPN', '0000-00-00', '', 'nasabah', 'Y', ''),
(63, 'N000063', '181901146', '181901146', 'b139e104214a08ae3f2ebcce149cdf6e', 'AZZAM JIDINASTI MARPAUNG', 'Jln. Pandean Lamper 1, Semarang ,Jawa Tengah', '', 0, 0, 'BLKPPN', '0000-00-00', '', 'nasabah', 'Y', ''),
(64, 'N000064', '171801063', '171801063', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. SULTHAN RAFI FADILAH', 'Jl. Raya Jakarta Bogor, Nanggewer, Peum Bumi Sentosa Blok C7/22', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(65, 'N000065', '171801064', '171801064', 'b139e104214a08ae3f2ebcce149cdf6e', 'NAJMI AQILA', 'Komplek Griya Jakarta ,Jln Gawo Blok D3 No.23 ,RT.06/RW.07 Pamulang ,Tanggerang selatan ,Indonesia', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(66, 'N000066', '171801066', '171801066', 'b139e104214a08ae3f2ebcce149cdf6e', 'ABDURRAHMAN NUR ALI', 'Komplek Kejaksaan Agung blok G No.10 Pasar Minggu Jakarta Selatan', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(67, 'N000067', '181901066', '181901066', 'b139e104214a08ae3f2ebcce149cdf6e', 'ABID YANEDI KADHAFI', 'Jl. Pangeran Jayakarta,No.29, Kec.Medan satria Summarecon ,Bekasi Barat', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(68, 'N000068', '181901067', '181901067', 'b139e104214a08ae3f2ebcce149cdf6e', 'ABIYYU UMAR THAYYIB', 'Jl. Usman Awi, Rt 05/Rw 01, Kel. Rangkapan Jaya Baru.', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(69, 'N000069', '181901068', '181901068', 'b139e104214a08ae3f2ebcce149cdf6e', 'AFIF DAIFULLOH', 'Jln. Mawar Padurenan 99.09 RT.04/ RW.08 No.177 ,Bekasi Timur', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(70, 'N000070', '181901069', '181901069', 'b139e104214a08ae3f2ebcce149cdf6e', 'AGUS GILANG AMANDA NAUFAL ANNAFIS', 'Sukorejo, Gandusari, Trenggalek, Jawa Timur', '', 0, 0, 'TGLK', '0000-00-00', '', 'nasabah', 'Y', ''),
(71, 'N000071', '181901070', '181901070', 'b139e104214a08ae3f2ebcce149cdf6e', 'AHMAD HAIDAR SUBHAN', 'Kedung Halang Tengah, Cilebut, Bogor', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(72, 'N000072', '181901071', '181901071', 'b139e104214a08ae3f2ebcce149cdf6e', 'AHMAD MIKAIL', 'Rt, 02, Rw 03, Blok Hk, No. 5 Puri Hrmoni, Cibinong, Bogor, Jawa Barat', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(73, 'N000073', '181901072', '181901072', 'b139e104214a08ae3f2ebcce149cdf6e', 'AHMAD NUR ZAIDAN', 'Griya Serdang Indah, Blok B9, No. 16, Rt 04/Rw 04, Serdang, Kramat Watu, Cilegon, Banten', '', 0, 0, 'TANGGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(74, 'N000074', '181901073', '181901073', 'b139e104214a08ae3f2ebcce149cdf6e', 'AHSAN RAMA EL GHANI', 'Jalan Pulo Mawar 1 Kec.Grogol Utara ,Kebayoran Lama RT.04 / RW 004 No.15 ,Jakarta selatan', '', 0, 0, 'TANGGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(75, 'N000075', '181901074', '181901074', 'b139e104214a08ae3f2ebcce149cdf6e', 'AKMA HAZIM ATMAJA', 'Komp. Griya Prima Asri, Jl. Dadali E 15/18, Ds. Bojongmalaka, Kec. Baleendah, Kab. Bandung, Kode Pos', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(76, 'N000076', '181901075', '181901075', 'b139e104214a08ae3f2ebcce149cdf6e', 'AL FATIH MUHAMMAD FAIZ', 'Jl. Laut Banda, Blok D1, No.4, Durensawit, Jakarta Timur, Jakarta', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(77, 'N000077', '181901076', '181901076', 'b139e104214a08ae3f2ebcce149cdf6e', 'ATHAYAFI AHMAD MUNANDHAR', 'Bogor, Jl. Sunting Komplek Bogor Nirwana Residence No. 143', '', 0, 0, 'BOGOR', '0000-00-00', '', 'nasabah', 'Y', ''),
(78, 'N000078', '181901077', '181901077', 'b139e104214a08ae3f2ebcce149cdf6e', 'AZMI LUKMANULHAKIM', 'Jl. Mutiara, No. 14, Eisarantenkulon Arcamanik Bandung', '', 0, 0, 'BANDUNG', '0000-00-00', '', 'nasabah', 'Y', ''),
(79, 'N000079', '181901078', '181901078', 'b139e104214a08ae3f2ebcce149cdf6e', 'BINTANG MUHAMMAD RAFLI BUDIYONO', 'Jl. Tjilik Riwut, Kalteng, Palangkaraya, Kecamatan Jekan Raya, Km 3,5, Perum. Polres, No. 20', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(80, 'N000080', '181901079', '181901079', 'b139e104214a08ae3f2ebcce149cdf6e', 'FAJRI FATHUR RAHMAN', 'Jawa Barat, Bogor Barat, Kel. Curug, Jl. Bogor Raya Permai, Blok Fd4/35a, Rt 01/ Rw 12, 1603', '', 0, 0, 'DEPOK', '0000-00-00', '', 'nasabah', 'Y', ''),
(81, 'N000081', '181901080', '181901080', 'b139e104214a08ae3f2ebcce149cdf6e', 'FAQIH HAIDAR DZAKY', 'Jln. Mahkota 10 Perumahan Mahkota Simprug ,Tanggerang ,Banten ,Indonesia', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(82, 'N000082', '181901081', '181901081', 'b139e104214a08ae3f2ebcce149cdf6e', 'FARGHALI MUHAMMAD SUBKI', 'Jl. Pahlawan, No. 45, Jakarta Barat', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(83, 'N000083', '181901082', '181901082', 'b139e104214a08ae3f2ebcce149cdf6e', 'FARHAN IRFAN HAKIM', 'Perum. Permata Depok Sektor Safir M7 No.5 Depok', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(84, 'N000084', '181901084', '181901084', 'b139e104214a08ae3f2ebcce149cdf6e', 'FARREL AKBAR BUDIMAN', 'Jl. Sawo, No. 1, Jatibening Pondokgede, Bekasi', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(85, 'N000085', '181901085', '181901085', 'b139e104214a08ae3f2ebcce149cdf6e', 'FATAHUL AMIEN', 'Jawa Barat, Bogor Barat, Kel. Curug, Jl. Bogor Raya Permai, Blok Fd4/35a, Rt 01/ Rw 12, 1603', '', 0, 0, 'TANGGERANG', '0000-00-00', '', 'nasabah', 'Y', ''),
(86, 'N000086', '181901086', '181901086', 'b139e104214a08ae3f2ebcce149cdf6e', 'FATH ABDURAHMAN ROBBANI', 'Jakarta Timur, Duren Sawit, Jln.Kelurahan II, Rt 04/ Rw 04, No.27', '', 0, 0, 'DEPOK', '0000-00-00', '', 'nasabah', 'Y', ''),
(87, 'N000087', '181901087', '181901087', 'b139e104214a08ae3f2ebcce149cdf6e', 'FATIH ABDURRAHMAN HIDAYATULLAH', 'Komplek Pharmindo Jln. Trowulan 5 Blok.T No.66 ,Melong ,Cimahi selatan', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(88, 'N000088', '181901088', '181901088', 'b139e104214a08ae3f2ebcce149cdf6e', 'FATIH ABDULLAH ALI YAHYA', 'Jl. Endelwis Raya Graha Melasti Blok FB1 No. 12A, RT.006/RW.14 Tambun Selatan, Bekasi.', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(89, 'N000089', '181901089', '181901089', 'b139e104214a08ae3f2ebcce149cdf6e', 'FAZA IBRAHIM', 'Jl. Raya Wigunatimur, No. 125', '', 0, 0, 'SURABAYA', '0000-00-00', '', 'nasabah', 'Y', ''),
(90, 'N000090', '181901090', '181901090', 'b139e104214a08ae3f2ebcce149cdf6e', 'GENDADIANTA HIBRIZI KUNCORO', 'Bogor, Jl. Sunting Komplek Bogor Nirwana Residence No. 143', '', 0, 0, 'BOGOR', '0000-00-00', '', 'nasabah', 'Y', ''),
(91, 'N000091', '181901091', '181901091', 'b139e104214a08ae3f2ebcce149cdf6e', 'GIGIH ASHRAF GHULAN NUGROHO', 'Puri Bojong Lestari 2 ,blok CN 03.04 RT16/RW17 ,Pabuaran ,Bojong Gede ,Bogor', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(92, 'N000092', '181901092', '181901092', 'b139e104214a08ae3f2ebcce149cdf6e', 'IBRAHIM MARDIKA', 'Perum Pesona Karawaci blok B2/12 ,Bojong nangka ,Kelapa Dua ,Tanggerang', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(93, 'N000093', '181901093', '181901093', 'b139e104214a08ae3f2ebcce149cdf6e', 'IHSAN FADHILAH', 'Kavling BBM Asri RT.03 RW.04', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(94, 'N000094', '181901094', '181901095', 'b139e104214a08ae3f2ebcce149cdf6e', 'IKAMAL ZAINI ALFI SALAM', 'Jln. Laut Jawa Raya H3-H6 Perum Mekar Perdana ,Abadi Jaya ,Depok Timur ,Jawa Barat 16417', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(95, 'N000095', '181901095', '181901095', 'b139e104214a08ae3f2ebcce149cdf6e', 'IRFANO FAQIH ATHALAH', 'Pamulan, Reni Jaya, Blok L4, No.1, Tanggerang', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(96, 'N000096', '181901096', '181901096', 'b139e104214a08ae3f2ebcce149cdf6e', 'IZZUDDIIN SYAAHID MABRURI', 'Jln. Keang Risin II, Komplek Griya Arafah, No. 143, Pisangan, Ciputat, Tangerang Selatan, Banten', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(97, 'N000097', '181901097', '181901097', 'b139e104214a08ae3f2ebcce149cdf6e', 'KHIAR ZAKI MAULANA', 'Jl. Asri Lestari, Rt 004, Rw 013, Blok A3/ C10, Pagedangan, Medang, Tanggerang, Banten, 15334', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(98, 'N000098', '181901098', '181901098', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. AKMAL AL- FATIH', 'Jl. Sultan Adam, Komp. Mandiri Permai Rt 34 , No 39', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(99, 'N000099', '181901099', '181901099', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. ICHSAN YUDA BAHARI ALIRESA', 'Jln. Beringin No.F5 Kec.Koja Kel.Rawa Badak Utara ,Kota Jakarta Utara  ', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(100, 'N000100', '181901100', '181901100', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. IKHSAN HAYKAL', 'Bogor, Jl. Raya Ciomas, Desa Pagelaran, Gg.Him Said 02/03', '', 0, 0, 'JAKARTA', '0000-00-00', '', 'nasabah', 'Y', ''),
(101, 'N000101', '181901101', '181901101', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. RAMADHAN AL FATIH', '', '', 0, 0, 'JKT', '0000-00-00', '', 'nasabah', 'Y', ''),
(102, 'N000102', '181901102', '181901102', 'b139e104214a08ae3f2ebcce149cdf6e', 'M. RAZIEQ ALBAR', 'Jln. Citandui No. 14 ,Planjan Kesugihan ,Cilacap ,Jawa Tengah', '', 0, 0, 'CLCP', '0000-00-00', '', 'nasabah', 'Y', ''),
(103, 'N000103', '181901103', '181901103', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD DIMAS NUGRAHA', 'Jln. Saweda Raya No.100 ,Depok', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(104, 'N000104', '181901104', '181901104', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD IQBAL ALFAHRIZAL', 'Komp. Griya Prima Asri, Jl. Elang D4/14, Ds. Bojongmalaka, Kec. Baleendah, Kab. Bandung, Kode Pos 40', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(105, 'N000105', '181901105', '181901105', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD ALEHANDRO NARENDRA PUTRA', 'Kp. Rawa Sawah, Rt 08, Rw 08, No. 4 Jakarta Pusat', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(106, 'N000106', '181901106', '181901106', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD AZZAM', 'Jl. Warakas 6, Gg 17, Rt02/ Rw05, No.104, Kel. Papanggo, Kec. Tanjung Priuk, Jakarta Utara', '', 0, 0, 'M', '0000-00-00', '', 'nasabah', 'Y', ''),
(107, 'N000107', '181901107', '181901107', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD FACHREZY', 'Jakarta Kec.Tomang Ujung Kamboja Utara ,Kota Bambu RT.007/RW.05 ,Palmerah ,Jakarta Selatan', '', 0, 0, 'A', '0000-00-00', '', 'nasabah', 'Y', ''),
(108, 'N000108', '181901108', '181901108', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD FADLAN ABUDURRAHMAN', 'Jl. Ikhlas, No. 66, Rt 05/ Rw 11, Curug, Tanah Baru, Beji, Depok', '', 0, 0, 'A', '0000-00-00', '', 'nasabah', 'Y', ''),
(109, 'N000109', '181901109', '181901109', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD FARHAN WIJAYANTO', 'Jln. Agung Barat 14 No.15 RT.04/RW.10 Komplek Sekneg ,Jakarta Utara Kode Pos 14350', '', 0, 0, 'A', '0000-00-00', '', 'nasabah', 'Y', ''),
(110, 'N000110', '181901110', '181901110', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD ILYAS ALYASA', 'Gg.Dayung 2 No 10 ,Sangatta Utara ,Kutim ,Kalimantan Timur ,Indonesia ,Kode Pos 75611', '', 0, 0, 'A', '0000-00-00', '', 'nasabah', 'Y', ''),
(111, 'N000111', '181901111', '181901111', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD KEVIN AMMAR', '', '', 0, 0, 'R', '0000-00-00', '', 'nasabah', 'Y', ''),
(112, 'N000112', '181901112', '181901112', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD NAUFALNADI PUTRA RASYA', 'Komplek Lipi Baranang Siang No.B8 Jln. Kantor Posi ,Bogor Timur', '', 0, 0, 'R', '0000-00-00', '', 'nasabah', 'Y', ''),
(113, 'N000113', '181901113', '181901113', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD NUR ALAM', 'Jl. Abdul Fatah, Km 6, Kolamrenang, Tirta Ciburial, Tenjolaya, Bogor, Jawa Barat', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', '48t5io45ghs7i76fn75239fjb7'),
(114, 'N000114', '181901114', '181901114', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD RAJA JIHADDIN ABED', 'Jl. Pagaleme, Kota Baru, Papua, Puncak Jaya', '', 0, 0, 'T', '0000-00-00', '', 'nasabah', 'Y', ''),
(115, 'N000115', '181901115', '181901115', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD RAFA AS SYIFA', 'Jl. Perdata 4, Blok B7, No 10, Komplek Pengayoman, Sukasari, Tanggerang, 15118.', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', 'u5ptsap4lspfrb4nvkrfqrep26'),
(116, 'N000116', '181901116', '181901116', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD RAFI YULIAN', 'Jl. Melati Raya, Rt 06/Rw 021, Blok 93, Bojong Gede, Bogor.', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', ''),
(117, 'N000117', '181901117', '181901117', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD RIFQI RAHMATULLAH', 'Jl. Pahlawan, RT,04/RW,04 No. 45, Jakarta Barat', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', ''),
(118, 'N000118', '181901118', '181901118', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD SYAFIQ RIZQ JIHAD', 'Jl. Riam kanan No.15 Duren Tiga ,Pancoran ,Jakarta Selatan', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', ''),
(119, 'N000119', '181901119', '181901119', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD WALIYULLAH', 'Jln. Juanda KOMPERTA Gunung simping No. 193', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', ''),
(120, 'N000120', '181901120', '181901120', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD YUSUF HABIBI', 'Jl. Ledjen Ibrahim Adjie No.167A RT 01/RW 04 ,Bogor Barat , Koata Bogor ,prov Jawa Barat', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', ''),
(121, 'N000121', '181901121', '181901121', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD ZIDAN AMRULLOH', 'Kab. Trenggalek, Kec Gandusari, Ds. Suko Rejo, Dsn Tugu , Rt 29/ Rw 14. Prov. Jawa Timur', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', ''),
(122, 'N000122', '181901122', '181901122', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD AFFAN RETSURADIK', 'Komp. Bogor Raya Permai, F C4/6, Bogor ,Jawa Barat.', '', 0, 0, 'P', '0000-00-00', '', 'nasabah', 'Y', ''),
(123, 'N000123', '181901123', '181901123', 'b139e104214a08ae3f2ebcce149cdf6e', 'MUHAMMAD RAKHA SYAHDA', 'Perum Grand Sawangan Regency ,H/3 ,RT 2 RW 3 ,jln Sulaiman <bedahan ,Sawangan ,Depok', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(124, 'N000124', '181901124', '181901124', 'b139e104214a08ae3f2ebcce149cdf6e', 'NABIL HISSAM MAMUR TANJUNG', 'Komplek Griya Jakarta ,Jln Gawo Blok D3 No.23 ,RT.06/RW.07 Pamulang ,Tanggerang selatan ,Indonesia', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(125, 'N000125', '181901125', '181901125', 'b139e104214a08ae3f2ebcce149cdf6e', 'NAJMA WAFEVA AHMADA', 'Trenggalek, Kampak, Sugihan', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(126, 'N000126', '181901126', '181901126', 'b139e104214a08ae3f2ebcce149cdf6e', 'NAQSYABANDI RAYNANDA', 'Perum Puri Nirwana 2 ,Blok P No 16 ,Jl. Ceri 2 Cibinong ,bogor ,Jawa Barat', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(127, 'N000127', '181901127', '181901127', 'b139e104214a08ae3f2ebcce149cdf6e', 'NAVADZ SYAIKHUL RADZAKANI', 'Jl. Baru Lengkonggudang , Rt 09/ Rw 04, Tongsel Serpong, Banten', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(128, 'N000128', '181901128', '181901128', 'b139e104214a08ae3f2ebcce149cdf6e', 'NUR FAIZI PRSETYO', 'Komplek Perumahan Pertamina Gs.201 ,Cilacap ,kel. Zidanegara', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(129, 'N000129', '181901129', '181901129', 'b139e104214a08ae3f2ebcce149cdf6e', 'QUTHB KAHFI', 'Perum Mutiara Depok blok HA-6 ,Jln. Tole Iskandar 66 ,RT.05 / RW.13 ,Depok ,Kode Pos 16412', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(130, 'N000130', '181901130', '181901130', 'b139e104214a08ae3f2ebcce149cdf6e', 'RAFIF GHIFARI', 'Pondok Pinang ,Jln. Haji Nurisan ,Kebayoran Lama ,Jakarta Selatan', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(131, 'N000131', '181901131', '181901131', 'b139e104214a08ae3f2ebcce149cdf6e', 'RENDRA BIMA PUTRA YASA', 'Jl. Juanda, Perum. Gamilir Indah, Blok 22, No 244', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(132, 'N000132', '181901132', '181901132', 'b139e104214a08ae3f2ebcce149cdf6e', 'REZA IQRONOR WAHYUDIN', 'Jl. Cimanggu Permai, Kavling Surya, Kel. Kedung Jaya, Kec. Tanah Sareal, Rt 04/ Rw 04, 16164 Bogor, ', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(133, 'N000133', '181901133', '181901133', 'b139e104214a08ae3f2ebcce149cdf6e', 'RIFQI AUNUR RAHMAN', 'Jl. Amil Abas, Rt 01/ Rw 01, No. 61, Tanggerang ,Banten', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(134, 'N000134', '181901134', '181901134', 'b139e104214a08ae3f2ebcce149cdf6e', 'SALMAN SAYYIDULHAQ', 'Perumahan Permata Depok Regency Cluster Jade 2 E3/10 ,Kel.Ratu Jaya Kec.Cipayung RT/RW 10/10. Kota D', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(135, 'N000135', '181901135', '181901135', 'b139e104214a08ae3f2ebcce149cdf6e', 'SAYYID NASHIF AR-RAFI', 'Komp, Bonecom, Kp. Caringan, Ds. Ragajaya, Bogong Gede , Bogor, Rt 03/ Rw 08', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(136, 'N000136', '181901136', '181901136', 'b139e104214a08ae3f2ebcce149cdf6e', 'SULTAN AMMAR JUNDANA', 'Jl. Haji Nurisan, Pondok Pinang, Kebayoran, No. 3', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(137, 'N000137', '181901137', '181901137', 'b139e104214a08ae3f2ebcce149cdf6e', 'SULTHAN RAYHAN WIDIYANTO', 'Kota Baru Residence, Blok P/8, Ciapus, Bogor, Jawa Barat', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(138, 'N000138', '181901138', '181901138', 'b139e104214a08ae3f2ebcce149cdf6e', 'SURYA PUTRA ARJUNA', 'Trenggalek, Durehan, Gandusari, Sukorejo, 66372, Jawa Timur', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(139, 'N000139', '181901139', '181901139', 'b139e104214a08ae3f2ebcce149cdf6e', 'UMAR HAMZAH AIDUTAMAM', 'Jln. Hj Som RT.05 RW.01 ,Belakang Mushollah Daarul Mubin ,Bintaro Sektor 9 ,Tanggerang Selatan', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(140, 'N000140', '181901140', '181901140', 'b139e104214a08ae3f2ebcce149cdf6e', 'VITO RACHMAN WAHYUDIN', 'Perum, Persada Depok Blok C1/8, Rt 5/ Rw 18, Cimpaeun, Depok', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(141, 'N000141', '181901141', '181901141', 'b139e104214a08ae3f2ebcce149cdf6e', 'YAHYA AULIYA', 'Perum. Mahkota Alam Perma, No 1-2, Blok B, Tanjung Pinang, Tanjung Pinang Timur, Kepulauan Riau', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', '3onr98udc591e1opgrfgtk0q73'),
(142, 'N000142', '181901142', '181901142', 'b139e104214a08ae3f2ebcce149cdf6e', 'YUSUF FEBRYAN IKHSAN', 'Jl. Mohamad Sanun, Perum Depok Alam Lestari, Depok, Jawa Barat', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', 'dg2o7dv3m7eo93e7hfnf4fepq5'),
(143, 'N000143', '181901143', '181901143', 'b139e104214a08ae3f2ebcce149cdf6e', 'ZAKI JULIAN ROSIDIN', 'Kec. Gandusari, Desa Sukorejo, Dsn Tugu, Rt 30/ Rw 14, Kab. Trenggalek', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', '2m3fdvt5roiao895s7sq1d2oi0'),
(144, 'N000144', '181901144', '181901144', 'b139e104214a08ae3f2ebcce149cdf6e', 'ZUFAR IMAM SYUHADA', 'Perum Bumi Pancoran Mas ,Jln. Takraw blok G8 ,Kel.Mampang ,Kec.Pancoram Mas ,Sawangan Depok ,Kode Po', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', ''),
(145, 'N000145', '181901145', '181901145', 'b139e104214a08ae3f2ebcce149cdf6e', 'ABDUL AZIZ AZZUMAR', 'Jln. Merpati Raya No.33 Sawah Lama ,Prapatan Duren ,Ciputat', '', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', '0lc4brhk0au4nb8vetf5ve46g4'),
(146, 'N000146', '181901147', '181901147', 'b139e104214a08ae3f2ebcce149cdf6e', 'DEVIS ABDUL FATTAH', '-', '-', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', '0lc4brhk0au4nb8vetf5ve46g4'),
(147, 'N000147', '181901148', '181901148', 'b139e104214a08ae3f2ebcce149cdf6e', 'RUSSEL ARRAYAN HIBATILLAH', '-', '-', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', '0lc4brhk0au4nb8vetf5ve46g4'),
(148, 'N000148', '181901149', '181901149', 'b139e104214a08ae3f2ebcce149cdf6e', 'MAYLAF FARREL PUTRO', '-', '-', 0, 0, '-', '0000-00-00', '', 'nasabah', 'Y', '0lc4brhk0au4nb8vetf5ve46g4');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `no_telp`, `username`, `password`, `level`, `status`, `id_session`) VALUES
('P0001', 'Muhammad irfan Ayyubi', '    ', '', 'root', '6be522523820e664e679c35e55de69c5', 'admin', 'Y', 'ms4cekp5emb3ev63q4b0hhgkq6'),
('P0003', 'M. Ali Imron', 'Umar bin Khotob ', '085853383750', 'khilafah', 'dbba5ade11843a64105ea6e940e14595', 'admin', 'Y', '6cc55a1fd6c22aff140b177ab5822972'),
('P0004', 'Kantin UBK Mart', 'Umar bin Khotob  ', '-', 'kantin', '202cb962ac59075b964b07152d234b70', 'kantin', 'Y', '1d587a0bc15ce6cab8107c9e6ffda4b3');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `nama_sekolah` varchar(200) NOT NULL,
  `kepala` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `situs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `nama_sekolah`, `kepala`, `alamat`, `telephone`, `situs`) VALUES
(1, 'Pesantren Umar Bin Khotob Plus', 'Purwanto Abdul Ghaffar', 'Tenjolaya Kab. Bogor     ', '-', 'https://ubkplus.info');

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id_piutang` int(11) NOT NULL,
  `nama_piutang` varchar(100) NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_kelas`
--

CREATE TABLE `setting_kelas` (
  `id_setting` int(11) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `nope` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_TF` int(12) NOT NULL,
  `kode_unik` varchar(3) NOT NULL,
  `status` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jml` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `debit` int(10) NOT NULL,
  `kredit` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_k`
--

CREATE TABLE `transaksi_k` (
  `id_transaksi` int(11) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `transaksi_k`
--
DELIMITER $$
CREATE TRIGGER `kurangi_emoney_saat_transaksi_di_kantin` AFTER INSERT ON `transaksi_k` FOR EACH ROW BEGIN

UPDATE nasabah SET emoney=emoney-NEW.jumlah WHERE id_nasabah=NEW.id_nasabah;
UPDATE transaksi_k_jml SET total=total+NEW.jumlah WHERE id=1;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_k_jml`
--

CREATE TABLE `transaksi_k_jml` (
  `id` int(11) NOT NULL,
  `total` double NOT NULL,
  `bayar` double NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_k_jml`
--

INSERT INTO `transaksi_k_jml` (`id`, `total`, `bayar`, `status`) VALUES
(1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `level`) VALUES
(4, 'Admin FQ', 'rul23@yahoo.co.id', '202cb962ac59075b964b07152d234b70', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kotak_aspirasi`
--
ALTER TABLE `kotak_aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`nurut`) USING BTREE;

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id_piutang`);

--
-- Indexes for table `setting_kelas`
--
ALTER TABLE `setting_kelas`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `transaksi_k`
--
ALTER TABLE `transaksi_k`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kotak_aspirasi`
--
ALTER TABLE `kotak_aspirasi`
  MODIFY `id_aspirasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `nurut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_kelas`
--
ALTER TABLE `setting_kelas`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `transaksi_k`
--
ALTER TABLE `transaksi_k`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
