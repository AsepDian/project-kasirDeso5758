-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 04:12 AM
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
  `harga` double DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `transaksi_id`, `menu_id`, `harga`, `jumlah`, `subtotal`) VALUES
(9, 5, 8, NULL, 2, 20000),
(10, 6, 8, NULL, 2, 20000),
(11, 6, 9, NULL, 2, 14000),
(14, 7, 8, NULL, 2, 20000),
(15, 7, 8, NULL, 2, 20000),
(17, 9, 8, 10000, 2, 20000),
(18, 10, 9, 7000, 2, 14000),
(19, 11, 8, 10000, 2, 20000);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `log_laporan` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN 
INSERT INTO laporan
SET tanggal = (SELECT tanggal FROM transaksi WHERE id=NEW.transaksi_id),
nama_menu = (SELECT nama_menu FROM menu WHERE id = NEW.menu_id),
harga = (SELECT harga FROM menu WHERE id=NEW.menu_id),
jumlah = (SELECT jumlah FROM detail_transaksi WHERE id=NEW.id),
total = (SELECT subtotal FROM detail_transaksi WHERE id=NEW.id);
END
$$
DELIMITER ;

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
(2, 'Minuman'),
(3, 'Cemilan');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `tanggal`, `nama_menu`, `harga`, `jumlah`, `total`) VALUES
(1, '2022-03-24 08:13:28', 'Sosis Bakar', 20000, 2, 40000),
(2, '2022-03-24 08:13:28', 'Sosis Bakar', 20000, 2, 40000),
(3, '2022-03-24 08:20:26', 'Kopi Capucino', 6000, 2, 12000),
(4, '2022-03-24 08:55:49', 'Sosis Bakar', 10000, 2, 20000),
(5, '2022-03-24 09:41:28', 'Pop Ice', 7000, 2, 14000),
(6, '2022-03-24 09:41:28', 'Sosis Bakar', 10000, 2, 20000);

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
(8, 'Sosis Bakar', 'image-menu/AImbj3c19q6akRcgFM4sfHe1PJPELRRPUDOcIKcL.jpg', 3, 10000),
(9, 'Pop Ice', 'image-menu/cAhPGHUFVfhVMUClsixqUF32838pjeoGZAUOY4On.jpg', 2, 7000),
(13, 'kopi', 'image-menu/Vb35IOyRYQ09XcySCLi77erRGKJU6gdMQDbdc4st.jpg', 2, 5000),
(17, 'Kopi Capucino', 'image-menu/XZ5308HpNgM96mkueSroUUINBvPUQ2qD3emV5QcM.jpg', 2, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `cash` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_pemesan`, `tanggal`, `cash`) VALUES
(5, 'Asep Dian', '2022-03-23 14:55:56', 100000),
(6, 'Diann', '2022-03-23 14:56:16', 100000),
(7, 'Diann', '2022-03-24 08:13:28', 80000),
(8, 'Erwin', '2022-03-24 08:20:26', 15000),
(9, 'Radit', '2022-03-24 08:55:49', 20000),
(10, 'Diann', '2022-03-24 09:41:28', 20000),
(11, 'Diann', '2022-03-24 09:41:28', 20000);

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
(1, 'Admin', 'asepdian@gmail.com', '$2y$10$PUYH/5.5/o3dgVfIEx7jfOd9F.8HN6ZoIJU3WHTYmI2NPHgkE2Zoa', 'admin'),
(2, 'Kasir', 'dian@gmail.com', '$2y$10$.dFiU11z8HObeRqbhsxwgOwujcACI7tvURaJAbis1RSU3Qn1I7fGC', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
