-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 02:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investasi_emas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_keuangan`
--

CREATE TABLE `tujuan_keuangan` (
  `id_tujuan_keuangan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_tujuan` varchar(50) NOT NULL,
  `waktu_tujuan` date NOT NULL,
  `periode_beli_emas` int(11) NOT NULL,
  `jumlah_emas_sekarang` int(11) NOT NULL,
  `jumlah_emas_tujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tujuan_keuangan`
--

INSERT INTO `tujuan_keuangan` (`id_tujuan_keuangan`, `id_user`, `nama_tujuan`, `waktu_tujuan`, `periode_beli_emas`, `jumlah_emas_sekarang`, `jumlah_emas_tujuan`) VALUES
(1, 1, 'Biaya Pernikahan', '2030-06-20', 1, 20, 70);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`) VALUES
(1, 'maulana', 'maulana@gmail.com', '123'),
(2, 'asiah', 'asiah@gmail.com', '$2y$10$/Y2yaz66nsRpV6Iktqi2Nei8NVbCok3gGFkE.W7RM1zqFtlEfKEW6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tujuan_keuangan`
--
ALTER TABLE `tujuan_keuangan`
  ADD PRIMARY KEY (`id_tujuan_keuangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tujuan_keuangan`
--
ALTER TABLE `tujuan_keuangan`
  MODIFY `id_tujuan_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tujuan_keuangan`
--
ALTER TABLE `tujuan_keuangan`
  ADD CONSTRAINT `tujuan_keuangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
