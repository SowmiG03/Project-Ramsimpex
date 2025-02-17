-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2025 at 04:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rams_impex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `email`, `password`, `created_at`, `reset_token`, `reset_expires`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$D6klGqxuJn05gfZN5cuojOgjlKIbFZeOM9ROTmRLNB3tSuo9ADwq.', '2024-12-23 12:28:26', NULL, NULL),
(2, 'keerthi', 'keerthanav1910@gmail.com', '$2y$10$hht5dr5OHjq17Skd/7CXpemVV0L4XkIhvDvQNn7KJSblnPgpJORfC', '2024-12-24 10:43:00', 'b09ecc11821843034356c6ad7a6929c3cfb181837be4bea7ff782b125d1dbeb3', '2025-01-04 17:24:18'),
(3, 'sowmiya', 'sowmianandh542003@gmail.com', '$2y$10$FKnUKJvJKfm3xme2B4XO9urZWgM8jO67T.g/cH9FQG4doND0oncGC', '2024-12-26 05:27:37', 'e2350d158b4245d125c2aefce69ba56b15bd7f4e0732c61fd376b581f01e2b30', '2025-01-01 07:52:32'),
(5, 'Akash', 'akashazhagesan12@gmail.com', '$2y$10$hqyUa2w/9apQ3KEZIseuDeWj/7HhabUnrNkBMZW1voTWG4.sfRLSC', '2024-12-31 10:21:47', '4a62a6a85787d829559660cc144d2d24ef9d13b11d95e6dced5e699cdcbb202c', '2025-01-04 17:23:29'),
(7, 'viji', 'vijayalakshmi112001@gmail.com', '$2y$10$p28ywwToOqPrBlFuJ4GXG.WG5IDk8DvT/dpdEuSmZfJjibw5LNHTG', '2025-01-20 05:53:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_photo` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `quotes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_photo`, `keywords`, `quotes`, `created_at`, `updated_at`) VALUES
(1, 'Rayon', 'uploads/products/11.jpeg', 'rayon,raw material', 'dasdsds', '2025-01-02 05:01:30', '2025-01-20 05:06:55'),
(2, 'Wool', 'uploads/products/10.jpeg', 'beautiful material,wool,raw material', 'Quality is our first preference ', '2025-01-06 16:11:33', '2025-01-20 05:07:14'),
(3, 'Cotton', 'uploads/products/5.jpeg', 'beautiful coton,raw material ', 'NIce product', '2025-01-10 12:06:29', '2025-01-20 05:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `subproducts`
--

CREATE TABLE `subproducts` (
  `subproduct_id` int(11) NOT NULL,
  `subproduct_name` varchar(255) NOT NULL,
  `subproduct_photo` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `quotes` text DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videoes`
--

CREATE TABLE `videoes` (
  `video_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videoes`
--

INSERT INTO `videoes` (`video_id`, `title`, `url`) VALUES
(1, 'index video', 'https://www.youtube.com/embed/zpOULjyy-n8?rel=0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subproducts`
--
ALTER TABLE `subproducts`
  ADD PRIMARY KEY (`subproduct_id`),
  ADD KEY `subproducts_ibfk_1` (`product_id`);

--
-- Indexes for table `videoes`
--
ALTER TABLE `videoes`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subproducts`
--
ALTER TABLE `subproducts`
  MODIFY `subproduct_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videoes`
--
ALTER TABLE `videoes`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subproducts`
--
ALTER TABLE `subproducts`
  ADD CONSTRAINT `subproducts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
