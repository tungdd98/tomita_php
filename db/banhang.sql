-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 13, 2020 lúc 08:19 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clothes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `content`, `author`, `thumbnail`, `created_at`) VALUES
(2, 'Tin tức 33', '<p>Tin tức 3</p>\r\n', '<p>Tin tức 3</p>\r\n', 'Tin tức 3', '1594663585lawn_forest_mountains_144578_1920x1080.jpg', '2020-07-13 18:06:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`) VALUES
(1, 'Phụ kiện', 0, '2020-07-11 05:52:07'),
(2, 'Quần áo', 0, '2020-07-11 05:52:07'),
(5, 'Áo nỉ', 2, '2020-07-11 06:58:41'),
(9, 'Quần joggers', 2, '2020-07-11 07:00:11'),
(11, 'Giày dép', 0, '2020-07-11 07:00:11'),
(15, 'Áo sơ mi', 2, '2020-07-11 08:08:03'),
(16, 'Đánh rănggg', 1, '2020-07-11 10:48:41'),
(17, 'Quần yếm', 0, '2020-07-12 14:20:12'),
(18, 'Quần yếm', 0, '2020-07-12 14:20:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `imports`
--

CREATE TABLE `imports` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `imports`
--

INSERT INTO `imports` (`id`, `product_id`, `quantity`, `created_at`) VALUES
(5, 6, 1000, '2020-07-13 16:53:20'),
(6, 6, 10, '2020-07-13 16:53:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `total` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total`, `created_at`) VALUES
(1, 1, 0, 500, '2020-07-12 06:41:48'),
(2, 1, 0, 500, '2020-07-12 06:42:59'),
(3, 1, 0, 500, '2020-07-12 06:43:44'),
(4, 1, 0, 196, '2020-07-12 06:48:23'),
(5, 1, 0, 196, '2020-07-12 06:48:54'),
(6, 1, 0, 0, '2020-07-12 06:49:16'),
(7, 1, 0, 18, '2020-07-12 06:54:13'),
(8, 1, 0, 196, '2020-07-12 06:54:54'),
(9, 1, 0, 0, '2020-07-12 14:02:50'),
(10, 1, 0, 0, '2020-07-12 14:04:29'),
(11, 1, 0, 0, '2020-07-12 14:06:12'),
(12, 1, 1, 0, '2020-07-12 16:35:09'),
(13, 1, 1, 0, '2020-07-12 16:34:51'),
(14, 1, 0, 196000, '2020-07-12 14:08:19'),
(15, 1, 3, 196000, '2020-07-12 16:38:45'),
(16, 1, 0, 196000, '2020-07-12 14:12:02'),
(17, 1, 2, 196000, '2020-07-12 19:02:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `number`, `product_id`, `size`, `created_at`) VALUES
(1, 0, 0, 0, NULL, '2020-07-12 06:54:13'),
(2, 0, 1, 6, NULL, '2020-07-12 06:54:54'),
(3, 0, 3, 6, NULL, '2020-07-12 14:02:50'),
(4, 0, 3, 6, NULL, '2020-07-12 14:04:29'),
(5, 0, 2, 6, NULL, '2020-07-12 14:06:34'),
(6, 0, 2, 6, NULL, '2020-07-12 14:07:26'),
(7, 0, 2, 6, NULL, '2020-07-12 14:08:19'),
(8, 0, 3, 6, NULL, '2020-07-12 14:11:21'),
(9, 16, 3, 6, NULL, '2020-07-12 14:12:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `description`, `content`, `price`, `sale`, `quantity`, `thumbnail`, `images`, `created_at`) VALUES
(2, 15, 'Kẹo lạc', '<p>Kẹo lạc</p>\r\n', '<p>Kẹo lạc</p>\r\n', 20000, 10, 0, '', '', '2020-07-11 10:06:03'),
(4, 16, 'Kẹo dâu tây', '<p>Kẹo</p>\r\n', '<p>Kẹo</p>\r\n', 0, 0, 0, '1594462207mo-hinh-mvc.jpg', '', '2020-07-11 10:10:07'),
(5, 16, '123', '', '', 0, 0, 0, '', '[\"cat_minimalism_vector_wire_102411_1920x1080.jpg\",\"lawn_forest_mountains_144578_1920x1080.jpg\"]', '2020-07-11 10:37:49'),
(6, 15, 'Kẹo lạc đàaa', '<p>Kẹo lạc đ&agrave;</p>\r\n', '<p>Kẹo lạc đ&agrave;</p>\r\n', 200000, 2, 1010, '1594464465form_stone_light_85071_1920x1080.jpg', '[\"lawn_forest_mountains_144578_1920x1080.jpg\",\"smoke_triangle_lilac_85490_1920x1080.jpg\"]', '2020-07-11 10:47:45'),
(7, 16, 'Thêm nè', '                                                            ', '                                                        ', 0, 0, 0, '15946605202560x1440-px-illustration-lift-off-minimalism-rocket-1346989-wallhere.com.jpg', '[\"15946605202560x1440-px-illustration-lift-off-minimalism-rocket-1346989-wallhere.com.jpg\",\"\"]', '2020-07-13 17:15:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`) VALUES
(1, 7, 2),
(2, 7, 3),
(3, 7, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `created_at`) VALUES
(1, 'M', '2020-07-13 16:59:48'),
(2, 'L', '2020-07-13 16:59:48'),
(3, 'S', '2020-07-13 16:59:48'),
(4, '30', '2020-07-13 16:59:48'),
(5, '31', '2020-07-13 16:59:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `address`, `thumbnail`, `rule`, `created_at`) VALUES
(1, 'tungdd98@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đặng Đức Tùnggg', '0973793711', 'số 44 ngõ 421 phường Xuân Đỉnhggg', '1594567240cat_minimalism_vector_wire_102411_1920x1080.jpg', 1, '2020-07-12 16:46:22'),
(3, 'tungdd@gmail.com', '202cb962ac59075b964b07152d234b70', 'Tùng', '123', '123', NULL, 0, '2020-07-12 16:51:29'),
(4, 'tungdd99@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đặng Đức Tùng', NULL, NULL, NULL, 0, '2020-07-12 18:55:25'),
(5, 'tungdd97@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đặng Đức Tùng', NULL, NULL, NULL, 0, '2020-07-12 18:55:51'),
(6, 'tungdd96@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đặng Đức Tùng', NULL, NULL, NULL, 0, '2020-07-12 18:56:27'),
(7, 'tungdd95@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đặng Đức Tùng', NULL, NULL, NULL, 0, '2020-07-12 18:56:57'),
(8, 'tungdd94@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đặng Đức Tùng', NULL, NULL, NULL, 0, '2020-07-12 18:58:48'),
(9, 'tungdd2k3@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đặng Đức Tùng', NULL, NULL, NULL, 0, '2020-07-12 19:00:24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `imports_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
