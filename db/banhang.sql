-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 05:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`) VALUES
(1, 'Phụ kiện', 0, '2020-07-11 05:52:07'),
(2, 'Quần áo', 0, '2020-07-11 05:52:07'),
(5, 'Áo nỉ', 2, '2020-07-11 06:58:41'),
(9, 'Quần joggers', 2, '2020-07-11 07:00:11'),
(11, 'Giày dép', 0, '2020-07-11 07:00:11'),
(15, 'Áo sơ mi', 2, '2020-07-11 08:08:03'),
(16, 'Đánh rănggg', 1, '2020-07-11 10:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `price` float DEFAULT 0,
  `sale` float DEFAULT 0,
  `quantity` int(11) DEFAULT 0,
  `thumbnail` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `description`, `content`, `price`, `sale`, `quantity`, `thumbnail`, `images`, `created_at`) VALUES
(1, 2, 'Áo nỉ Bò Sữa', 'ÁO NỈ KHÔNG MŨ NAM LOOSE BROKEN FINGER', 'ÁO NỈ KHÔNG MŨ NAM LOOSE BROKEN FINGER', 100000, 10, 100, 'sanpham1.jpg', NULL, '2020-07-11 08:41:34'),
(2, 15, 'Kẹo lạc', '<p>Kẹo lạc</p>\r\n', '<p>Kẹo lạc</p>\r\n', 20000, 10, 100, '', '', '2020-07-11 10:06:03'),
(4, 16, 'Kẹo dâu tây', '<p>Kẹo</p>\r\n', '<p>Kẹo</p>\r\n', 0, 0, 0, '1594462207mo-hinh-mvc.jpg', '', '2020-07-11 10:10:07'),
(5, 16, '123', '', '', 0, 0, 0, '', '[\"cat_minimalism_vector_wire_102411_1920x1080.jpg\",\"lawn_forest_mountains_144578_1920x1080.jpg\"]', '2020-07-11 10:37:49'),
(6, 15, 'Kẹo lạc đàaa', '<p>Kẹo lạc đ&agrave;</p>\r\n', '<p>Kẹo lạc đ&agrave;</p>\r\n', 200000, 2, 100, '1594464465form_stone_light_85071_1920x1080.jpg', '[\"lawn_forest_mountains_144578_1920x1080.jpg\",\"smoke_triangle_lilac_85490_1920x1080.jpg\"]', '2020-07-11 10:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `rule` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `address`, `thumbnail`, `rule`, `created_at`) VALUES
(1, 'tungdd98@gmail.com', '202cb962ac59075b964b07152d234b70', 'tungdd', NULL, NULL, NULL, 1, '2020-07-11 11:05:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
