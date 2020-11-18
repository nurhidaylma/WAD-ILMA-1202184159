-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 05:13 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wad_modul3_ilma`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_table`
--

CREATE TABLE `event_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `mulai` time DEFAULT NULL,
  `berakhir` time DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `benefit` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_table`
--

INSERT INTO `event_table` (`id`, `name`, `deskripsi`, `gambar`, `kategori`, `tanggal`, `mulai`, `berakhir`, `tempat`, `harga`, `benefit`) VALUES
(15, 'EAD', 'iya coba', '1510377239_gambar.png', 'online', '2020-11-18', '13:45:00', '13:45:00', 'iya', 200, 'snack,sertifikat'),
(16, 'Open Mind ESD Laboratory', 'Halo guys ada info penting nih, besok ESD Laboratory Open Mind loh!! Jangan sampe ketinggalan yah!', '2102550702_gambar.png', 'online', '2020-11-13', '19:00:00', '14:00:00', 'Zoom Meeting', 10000, 'sertifikat,souvenir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_table`
--
ALTER TABLE `event_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
