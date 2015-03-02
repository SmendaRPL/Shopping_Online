-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2015 at 04:33 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE IF NOT EXISTS `tblbarang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` float NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`id_barang`, `nama_barang`, `deskripsi`, `kategori`, `jumlah`, `harga`, `foto`) VALUES
('A123', 'Color Ijo', 'Tersedia dalam tiga warna hitam, coklat, putih	\r\n		', 'Celana', 5, 200000, '1423187566875.png'),
('B01', 'T-Shirt', 'Tersedia dalam 2 warna yaitu hitam dan putih', 'Baju', 24, 75000, '1423182188314.png'),
('BP01', 'Backpack Sekolah', 'Tersedia dalam dua model angry bird dan angry dog', 'Backpack', 4, 140000, '1423188631301.png'),
('C-01', 'Celana Panjang', 'Tersedia dalam dua warna hitam dan biru', 'Celana', 8, 100000, '1423187638361.png'),
('J-01', 'Jaket Jeans', 'Jaket Jeans tersedia dalam 2 warna hitam dan biru', 'Jaket', 7, 250000, '1423182779571.png'),
('J-02', 'Jaket Parasut', 'Tersedia dalam dua warna hitam dan biru', 'Jaket', 10, 250000, '1423184074853.png'),
('J-03', 'Jaket Kulit', 'Tersedia dalam dua warna hitam dan putih	\r\n		', 'Jaket', 10, 100000, '1423184756772.png'),
('K-01', 'Jaket Lengan Panjang', 'Kemeja tersedia dalam dua warna hitam dan putih', 'Jaket', 10, 110, '1423184838151.png'),
('K-02', 'Kemeja Lengan Pendek', 'Kemeja tersedia dalam 3 warna, hitam, putih, dan merah', 'Kemeja', 12, 120000, '1423182323528.png'),
('S-01', 'Sweater MCMXLV', 'Tersedia dalam dua warna hitam dan putih', 'Sweater', 7, 250000, '1423187601407.png'),
('SB-01', 'Snapback MCMXLV', 'Tersedia dalam dua warna hitam dan merah', 'Snapback', 3, 750000, '1423212862618.png'),
('SND-01', 'Sandal Santai', 'Tersedia dalam dua warna putih dan hijau', 'Sandal', 8, 100000, '1423188600400.png'),
('SPT-01', 'Sepatu Cats', 'Tersedia dalam dua warna hitam dan putih', 'Sepatu', 10, 210000, '1423186046135.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE IF NOT EXISTS `tblkategori` (
  `kategori` varchar(100) NOT NULL,
  `keterangan_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`kategori`, `keterangan_kategori`) VALUES
('Baju', 'Size S,M,L,dan XL'),
('Kemeja', 'Size S,M,L,dan XL'),
('Jaket', 'Size M,L,dan XL'),
('Sweater', 'Size S,M,dan L'),
('Celana', 'Size 28,29,30,31,dan 32'),
('Sepatu', 'Size 38,39,40,41,42,43,dan 44'),
('Sandal', 'Size 8,9,10,11,dan 12'),
('Backpack', 'Size S,M,dan L'),
('Snapback', 'Size S,M,dan L');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
