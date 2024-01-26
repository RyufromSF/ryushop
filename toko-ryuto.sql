-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 06:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko-ryuto`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` enum('makanan','minuman','','') NOT NULL,
  `stok` int(10) UNSIGNED NOT NULL,
  `harga_beli` int(10) UNSIGNED NOT NULL,
  `harga_jual` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `kategori`, `stok`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 'Koala march', 'makanan', 8, 12000, 13000, '2024-01-25 01:05:12', '2024-01-26 02:12:06'),
(2, 'Chocobi', 'makanan', 10, 7000, 8000, '2024-01-25 01:05:12', '2024-01-26 02:41:33'),
(3, 'Fanta', 'minuman', 9, 5000, 6000, '2024-01-25 01:05:12', '2024-01-26 02:42:30'),
(4, 'Pocari Sweat', 'minuman', 8, 7000, 8000, '2024-01-25 01:05:12', '2024-01-26 02:12:53'),
(5, 'Taro', 'makanan', 3, 1000, 2000, '2024-01-25 01:05:12', '2024-01-26 02:12:57'),
(8, 'Aqua', 'makanan', 1, 9876543, 234568, '2024-01-26 02:50:05', NULL),
(9, 'soda', 'minuman', 123, 3211, 112000, '2024-01-26 02:50:25', NULL),
(10, 'Minuman', 'makanan', 90, 213, 321, '2024-01-26 02:50:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `total_harga` int(10) UNSIGNED NOT NULL,
  `id_staff` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_barang`, `jumlah`, `total_harga`, `id_staff`, `created_at`, `Updated_at`) VALUES
(1, 1, 10, 120000, 1, '2024-01-25 01:09:34', '2024-01-25 01:11:24'),
(2, 2, 10, 60000, 2, '2024-01-25 01:09:34', '2024-01-25 01:11:32'),
(3, 3, 10, 20000, 3, '2024-01-25 01:09:34', '2024-01-25 01:11:50'),
(4, 4, 10, 70000, 4, '2024-01-25 01:09:34', '2024-01-25 01:11:58'),
(5, 5, 10, 10000, 4, '2024-01-25 01:09:34', '2024-01-25 07:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `total_harga` int(10) UNSIGNED NOT NULL,
  `id_staff` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_barang`, `jumlah`, `total_harga`, `id_staff`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 24000, 1, '2024-01-25 01:14:23', NULL),
(2, 2, 1, 6000, 2, '2024-01-25 01:14:23', NULL),
(3, 3, 3, 6000, 3, '2024-01-25 01:14:23', NULL),
(4, 4, 2, 14000, 4, '2024-01-25 01:14:23', NULL),
(5, 5, 7, 7000, 4, '2024-01-25 01:14:23', '2024-01-25 07:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','keuangan','logistik','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Ryuto', '$2a$12$yY.mhKqxo2FwgN6ED7QjD.E7ZiN2pvWpxZU1aIkvvtY73iRkNCPga', 'admin', '2024-01-25 00:58:51', NULL),
(2, 'Donatello', '$2a$12$vqDUuQUEdbvjmwGoEcReqeoUWZK6BUftqkEvbLMlGTtpocUwXnIyi', 'keuangan', '2024-01-25 01:00:20', NULL),
(3, 'Michaelangelo', '$2a$12$rjvnbuFDQJNtIILjta1NsuNoU5i1FIiaF8aDYhcKDX7gfvUytdFwq', 'keuangan', '2024-01-25 01:00:20', NULL),
(4, 'leonardo', '$2a$12$Z3gREwXA7Ik986iF5/HFte.LCOXy9epGSlV.WyyaNHim6amD6PcDy', 'logistik', '2024-01-25 01:01:16', NULL),
(6, 'Shredderk', '$2y$10$CT7fjKwz0h9Z6LQnvW13fOhp3Z4zC1QBJSnUUs8nrcyYVB.IDbZyS', 'admin', '2024-01-25 07:20:34', '2024-01-25 07:36:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff` (`id_staff`),
  ADD KEY `penjualan_ibfk_1` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `user` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
