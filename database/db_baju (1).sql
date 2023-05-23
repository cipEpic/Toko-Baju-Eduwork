-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 06:56 PM
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
  `Image` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('available','restock','not_available') NOT NULL DEFAULT 'available',
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `Image`, `price`, `status`, `id_category`) VALUES
(1, 'Baju Polo', '', '100.00', 'available', 1),
(2, 'Kemeja Putih', '', '80.00', 'available', 1),
(3, 'Celana Jeans', '', '120.00', 'available', 2),
(4, 'Baju Kaos', '', '60.00', 'available', 1),
(5, 'Jaket Kulit', '', '250.00', 'available', 1),
(6, 'Dress Hitam', '', '150.00', 'available', 2),
(7, 'Kaos Polos', '', '40.00', 'available', 1),
(8, 'Baju Renang', '', '90.00', 'restock', 3),
(9, 'Hoodie Abu-abu', '', '80.00', 'available', 1),
(10, 'Celana Pendek', '', '70.00', 'available', 1),
(11, 'Gaun Pesta', '', '200.00', 'available', 2),
(12, 'Kaos Strip', '', '50.00', 'available', 1),
(13, 'Blouse Putih', '', '75.00', 'available', 2),
(14, 'Kemeja Denim', '', '95.00', 'available', 1),
(15, 'Legging Hitam', '', '45.00', 'available', 2),
(16, 'Sweater Biru', '', '85.00', 'available', 1),
(17, 'Rok Maxi', '', '110.00', 'available', 2),
(18, 'Baju Gym', '', '70.00', 'available', 3),
(19, 'Kemeja Batik', '', '120.00', 'available', 1),
(20, 'Cardigan Panjang', '', '95.00', 'available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `id_product`, `size_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 1),
(6, 3, 2),
(7, 4, 2),
(8, 4, 3),
(9, 5, 1),
(10, 5, 2),
(11, 6, 2),
(12, 6, 3),
(13, 7, 1),
(14, 7, 3),
(15, 8, 1),
(16, 8, 2),
(17, 9, 2),
(18, 9, 3),
(19, 10, 1),
(20, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

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
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

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
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
