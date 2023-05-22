-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 03:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_baju`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'Pakaian Bayi'),
(2, 'Pakaian Anak-Anak'),
(3, 'Pakaian Remaja'),
(4, 'Pakaian Dewasa'),
(5, 'Pakaian Pria'),
(6, 'Pakaian Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `price`, `id_category`) VALUES
(1, 'Baju Polo', '100.00', 1),
(2, 'Kemeja Putih', '80.00', 1),
(3, 'Celana Jeans', '120.00', 2),
(4, 'Baju Kaos', '60.00', 1),
(5, 'Jaket Kulit', '250.00', 1),
(6, 'Dress Hitam', '150.00', 2),
(7, 'Kaos Polos', '40.00', 1),
(8, 'Baju Renang', '90.00', 3),
(9, 'Hoodie Abu-abu', '80.00', 1),
(10, 'Celana Pendek', '70.00', 1),
(11, 'Gaun Pesta', '200.00', 2),
(12, 'Kaos Strip', '50.00', 1),
(13, 'Blouse Putih', '75.00', 2),
(14, 'Kemeja Denim', '95.00', 1),
(15, 'Legging Hitam', '45.00', 2),
(16, 'Sweater Biru', '85.00', 1),
(17, 'Rok Maxi', '110.00', 2),
(18, 'Baju Gym', '70.00', 3),
(19, 'Kemeja Batik', '120.00', 1),
(20, 'Cardigan Panjang', '95.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `statusbarang`
--

CREATE TABLE `statusbarang` (
  `id_status` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusbarang`
--

INSERT INTO `statusbarang` (`id_status`, `id_product`, `status`) VALUES
(1, 1, 'Ada'),
(2, 2, 'Ada'),
(3, 3, 'Habis'),
(4, 4, 'Ada'),
(5, 5, 'Habis'),
(6, 6, 'Restok'),
(7, 7, 'Ada'),
(8, 8, 'Restok'),
(9, 9, 'Ada'),
(10, 10, 'Ada'),
(11, 11, 'Habis'),
(12, 12, 'Ada'),
(13, 13, 'Restok'),
(14, 14, 'Ada'),
(15, 15, 'Restok'),
(16, 16, 'Habis'),
(17, 17, 'Ada'),
(18, 18, 'Restok'),
(19, 19, 'Ada'),
(20, 20, 'Habis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `statusbarang`
--
ALTER TABLE `statusbarang`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `statusbarang`
--
ALTER TABLE `statusbarang`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Constraints for table `statusbarang`
--
ALTER TABLE `statusbarang`
  ADD CONSTRAINT `statusbarang_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
