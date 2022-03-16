-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 06:17 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `transaksi_id`, `menu_id`, `jumlah`, `subtotal`) VALUES
(1, 1, 2, 4, 56000),
(2, 1, 7, 2, 20000),
(3, 1, 8, 2, 14000),
(4, 2, 2, 4, 56000),
(5, 2, 2, 4, 56000),
(6, 2, 7, 4, 40000),
(7, 3, 2, 2, 28000),
(8, 3, 8, 2, 14000),
(9, 4, 2, 2, 28000),
(10, 4, 7, 2, 20000),
(11, 4, 8, 2, 14000),
(12, 6, 2, 4, 56000),
(13, 6, 8, 2, 14000),
(14, 6, 7, 4, 40000),
(15, 5, 2, 2, 28000),
(16, 5, 2, 4, 56000),
(17, 5, 7, 4, 40000),
(18, 5, 8, 4, 28000),
(19, 5, 9, 4, 20000),
(20, 7, 2, 2, 28000),
(21, 7, 7, 2, 20000),
(22, 7, 8, 2, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(3, 'cemilan');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `gambar`, `kategori_id`, `harga`) VALUES
(2, 'Nasi Goreng', 'image-menu/707hQytUVSKz4EgxT95MtsVoILPyPwGOrSOLDM3K.jpg', 1, 14000),
(7, 'Sosis Bakar', 'image-menu/ybxpl0zavNaNbmGGywRK2gf7yDIaqaWLDrM9fWPP.jpg', 3, 10000),
(8, 'Kopi capucino', 'image-menu/hmzdue2we8giP16PPfMNhCvMXRNiWJDE2d91Opte.jpg', 2, 7000),
(9, 'Kopi Hitam', 'image-menu/L2di7NppxYKChoBZ8T5zWh8O4J06Q0SCZd9SRYyg.jpg', 1, 5000),
(10, 'Kopi', 'image-menu/HoEFNYDlySru2IqIiEyV1tyrobXkj1lzV2rdzbTT.jpg', 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_pemesan` varchar(50) NOT NULL,
  `cash` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `nama_pemesan`, `cash`) VALUES
(1, '2022-03-12 13:59:16', 'Indra Rusmana', 100000),
(2, '2022-03-12 14:05:42', 'Asep Dian', 160000),
(3, '2022-03-12 14:06:52', 'dayen', 50000),
(4, '2022-03-12 14:09:58', 'Asep Dian', 70000),
(5, '2022-03-12 14:29:18', 'Asep Dian', 200000),
(6, '2022-03-12 16:41:37', 'Iman Kasep', 150000),
(7, '2022-03-13 00:29:50', 'Dede Rahmawati', 100000),
(8, '2022-03-13 10:50:21', 'Asep Dian', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('kasir','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Asep Dian', 'asepdian@gmail.com', '$2y$10$Y33zzSJMm4q4sOUr4qnjv.m0s/esvJx8nO1JycsZ8yyNPCC00zzxe', 'admin'),
(2, 'dian', 'dian@gmail.com', '$2y$10$TSeMfq129vjgiDkN.eGwL.abXgMeaguWeVItCWZu8dF0HKh53KC5u', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
