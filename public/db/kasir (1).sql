-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 05:38 AM
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
(1, 16, 19, 14000, 3, 42000),
(2, 16, 9, 7000, 3, 21000),
(7, 17, 17, 10000, 3, 30000),
(11, 18, 19, 14000, 2, 28000),
(12, 18, 21, 10000, 1, 10000),
(13, 18, 17, 10000, 2, 20000);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `del_laporan` AFTER DELETE ON `detail_transaksi` FOR EACH ROW BEGIN
DELETE FROM laporan WHERE id=old.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `laporan_log` AFTER DELETE ON `detail_transaksi` FOR EACH ROW BEGIN
DELETE FROM laporan WHERE id=old.id;
END
$$
DELIMITER ;
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
DELIMITER $$
CREATE TRIGGER `up_laporan` AFTER UPDATE ON `detail_transaksi` FOR EACH ROW BEGIN
UPDATE laporan
SET jumlah = NEW.jumlah, total=NEW.subtotal WHERE id=old.id;
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
(3, 'Cemilan'),
(8, 'Makanan');

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
(7, '2022-03-26 08:44:32', 'Nasi Goreng', 14000, 2, 28000),
(11, '2022-03-26 10:23:59', 'Sosis Bakar', 10000, 2, 20000),
(12, '2022-03-26 10:23:59', 'Nasi Goreng', 14000, 1, 10000),
(13, '2022-03-26 10:23:59', 'Nasi Goreng', 14000, 2, 28000),
(14, '2022-03-26 10:23:59', 'Sosis Bakar', 10000, 2, 20000),
(15, '2022-03-26 10:23:59', 'Kopi Capucino', 10000, 2, 20000);

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
(9, 'Pop Ice', 'image-menu/cAhPGHUFVfhVMUClsixqUF32838pjeoGZAUOY4On.jpg', 2, 7000),
(17, 'Kopi Capucino', 'image-menu/XZ5308HpNgM96mkueSroUUINBvPUQ2qD3emV5QcM.jpg', 2, 10000),
(19, 'Nasi Goreng', 'image-menu/SRhbqMyA7F53RKrJVoqP3fTpyagVAvvAYjgYaj8H.jpg', 8, 14000),
(21, 'Sosis Bakar', 'image-menu/JLvddOCiyVqpW8lXbpRjTisa3H7MRlftjWRVcVVX.jpg', 3, 10000),
(22, 'Kwetiau', 'image-menu/5gE2slq9LaAZzCXM3SJng1kjT1EIpzWOLZnMK54V.jpg', 8, 10000);

--
-- Triggers `menu`
--
DELIMITER $$
CREATE TRIGGER `up_menu` AFTER DELETE ON `menu` FOR EACH ROW BEGIN
UPDATE detail_transaksi SET menu_id="null" WHERE menu_id=id;
END
$$
DELIMITER ;

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
(16, 'Diann', '2022-03-26 08:08:01', 100000),
(17, 'Sahlan', '2022-03-26 08:44:32', 20000),
(18, 'Asep Dian', '2022-03-26 10:23:59', 60000);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
