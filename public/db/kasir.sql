-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 12:00 AM
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
(1, 1, 1, 4, 56000),
(2, 1, 5, 2, 10000),
(3, 1, 3, 2, 14000),
(4, 2, 4, 4, 40000),
(5, 2, 3, 1, 7000),
(6, 2, 6, 2, 14000),
(7, 3, 1, 2, 28000),
(8, 3, 2, 2, 10000),
(9, 3, 4, 2, 20000),
(10, 4, 1, 4, 56000),
(11, 4, 3, 1, 7000),
(12, 4, 5, 2, 10000),
(13, 4, 6, 1, 7000),
(14, 5, 1, 4, 56000),
(15, 5, 4, 4, 40000),
(16, 5, 5, 4, 20000),
(17, 5, 3, 4, 28000),
(18, 6, 2, 2, 10000),
(19, 7, 3, 4, 28000);

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
(2, 'Minuman'),
(3, 'Cemilan');

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
(1, 'Nasi Goreng', 'image-menu/jHsjb8mg7dZ78YftaZvx4TJJcGcTXObeOoVtVE9r.jpg', 1, 14000),
(2, 'Kopi Hitam', 'image-menu/VlORhzTdy8cOW1643oiNpfsmz45pF5otfmptGz6i.jpg', 2, 5000),
(3, 'Kopi capucino', 'image-menu/DTkPchropULCfwKCbB4dYNqLPjvSzX57ThmIvzTT.jpg', 2, 7000),
(4, 'Sosis Bakar', 'image-menu/0YejUWieHAu3umPOUmK2SS9gLpf87TiRWmRFGxW0.jpg', 3, 10000),
(5, 'susu', 'image-menu/ygPKRKh9bor95GE4QxK8jeCfRFX2bkI1hqVBkAux.jpg', 2, 5000),
(6, 'Kopi Mocacino', 'image-menu/PhCCwbwjYqY6vta1xg3iJz2wqYLfYyquFRsUEs5u.jpg', 2, 7000);

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
(1, '2022-03-16 20:30:29', 'Asep Dian', 100000),
(2, '2022-03-16 20:30:38', 'Nurfi', 70000),
(3, '2022-03-16 20:30:49', 'Indra Rusmana', 100000),
(4, '2022-03-16 20:31:02', 'Devi Mulyana', 100000),
(5, '2022-03-16 20:31:12', 'Iqbal Anugrah', 200000),
(6, '2022-03-16 20:31:24', 'Dida Fathan', 10000),
(7, '2022-03-16 20:31:36', 'Hilmi Aidzil', 30000);

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
(1, 'Admin', 'asepdian@gmail.com', '$2y$10$Y33zzSJMm4q4sOUr4qnjv.m0s/esvJx8nO1JycsZ8yyNPCC00zzxe', 'admin'),
(2, 'Kasir', 'dian@gmail.com', '$2y$10$TSeMfq129vjgiDkN.eGwL.abXgMeaguWeVItCWZu8dF0HKh53KC5u', 'kasir');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
