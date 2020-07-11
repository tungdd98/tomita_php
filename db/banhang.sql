-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 09:05 PM
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
-- Database: `banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `author_id`, `name`, `description`, `content`, `img`) VALUES
(7, 2, 'Game thủ Trung Quốc hack GPS để trà trộn chơi Pokemon Go tại Nhật', '<p>(D&acirc;n tr&iacute;) - Game thủ Pokemon Go tại Nhật Bản đ&atilde; v&ocirc; c&ugrave;ng bức xức khi ph&aacute;t hiện ra c&oacute; nhiều người chơi tại c&aacute;c nước l&aacute;ng giềng, đặc biệt l&agrave; Trung Quốc đang sử dụng phần mềm hack GPS để đăng nhập v&agrave;o tr&ograve; chơi, thậm ch&iacute; chiếm c&aacute;c ph&ograve;ng tập gym ảo với Pokemon cấp độ cao.</p>\r\n', '<p>(D&acirc;n tr&iacute;) - Game thủ Pokemon Go tại Nhật Bản đ&atilde; v&ocirc; c&ugrave;ng bức xức khi ph&aacute;t hiện ra c&oacute; nhiều người chơi tại c&aacute;c nước l&aacute;ng giềng, đặc biệt l&agrave; Trung Quốc đang sử dụng phần mềm hack GPS để đăng nhập v&agrave;o tr&ograve; chơi, thậm ch&iacute; chiếm c&aacute;c ph&ograve;ng tập gym ảo với Pokemon cấp độ cao.&nbsp; (D&acirc;n tr&iacute;) - Game thủ Pokemon Go tại Nhật Bản đ&atilde; v&ocirc; c&ugrave;ng bức xức khi ph&aacute;t hiện ra c&oacute; nhiều người chơi tại c&aacute;c nước l&aacute;ng giềng, đặc biệt l&agrave; Trung Quốc đang sử dụng phần mềm hack GPS để đăng nhập v&agrave;o tr&ograve; chơi, thậm ch&iacute; chiếm c&aacute;c ph&ograve;ng tập gym ảo với Pokemon cấp độ cao.&nbsp; (D&acirc;n tr&iacute;) - Game thủ Pokemon Go tại Nhật Bản đ&atilde; v&ocirc; c&ugrave;ng bức xức khi ph&aacute;t hiện ra c&oacute; nhiều người chơi tại c&aacute;c nước l&aacute;ng giềng, đặc biệt l&agrave; Trung Quốc đang sử dụng phần mềm hack GPS để đăng nhập v&agrave;o tr&ograve; chơi, thậm ch&iacute; chiếm c&aacute;c ph&ograve;ng tập gym ảo với Pokemon cấp độ cao.</p>\r\n', '1554191182reviews.jpg'),
(15, 4, 'Thay vì mua iPhone X, 50 triệu đồng có thể mua được những gì?', '<p>(D&acirc;n tr&iacute;) - Một số nh&agrave; b&aacute;n lẻ đ&atilde; cho đặt gạch iPhone X với gi&aacute; l&ecirc;n đến 50 triệu đồng d&agrave;nh cho phi&ecirc;n bản 256 GB. Đ&acirc;y thực sự l&agrave; một số tiền cực lớn d&agrave;nh cho một chiếc điện thoại th&ocirc;ng minh. Với 50 triệu đồng, người d&ugrave;ng c&oacute; thể mua được rất nhiều thứ thay v&igrave; mua iPhone X.</p>\r\n', '<p>(D&acirc;n tr&iacute;) - Một số nh&agrave; b&aacute;n lẻ đ&atilde; cho đặt gạch iPhone X với gi&aacute; l&ecirc;n đến 50 triệu đồng d&agrave;nh cho phi&ecirc;n bản 256 GB. Đ&acirc;y thực sự l&agrave; một số tiền cực lớn d&agrave;nh cho một chiếc điện thoại th&ocirc;ng minh. Với 50 triệu đồng, người d&ugrave;ng c&oacute; thể mua được rất nhiều thứ thay v&igrave; mua iPhone X.</p>\r\n\r\n<p>(D&acirc;n tr&iacute;) - Một số nh&agrave; b&aacute;n lẻ đ&atilde; cho đặt gạch iPhone X với gi&aacute; l&ecirc;n đến 50 triệu đồng d&agrave;nh cho phi&ecirc;n bản 256 GB. Đ&acirc;y thực sự l&agrave; một số tiền cực lớn d&agrave;nh cho một chiếc điện thoại th&ocirc;ng minh. Với 50 triệu đồng, người d&ugrave;ng c&oacute; thể mua được rất nhiều thứ thay v&igrave; mua iPhone X.</p>\r\n\r\n<p>(D&acirc;n tr&iacute;) - Một số nh&agrave; b&aacute;n lẻ đ&atilde; cho đặt gạch iPhone X với gi&aacute; l&ecirc;n đến 50 triệu đồng d&agrave;nh cho phi&ecirc;n bản 256 GB. Đ&acirc;y thực sự l&agrave; một số tiền cực lớn d&agrave;nh cho một chiếc điện thoại th&ocirc;ng minh. Với 50 triệu đồng, người d&ugrave;ng c&oacute; thể mua được rất nhiều thứ thay v&igrave; mua iPhone X.</p>\r\n\r\n<p>(D&acirc;n tr&iacute;) - Một số nh&agrave; b&aacute;n lẻ đ&atilde; cho đặt gạch iPhone X với gi&aacute; l&ecirc;n đến 50 triệu đồng d&agrave;nh cho phi&ecirc;n bản 256 GB. Đ&acirc;y thực sự l&agrave; một số tiền cực lớn d&agrave;nh cho một chiếc điện thoại th&ocirc;ng minh. Với 50 triệu đồng, người d&ugrave;ng c&oacute; thể mua được rất nhiều thứ thay v&igrave; mua iPhone X.</p>\r\n', '1554191126chicago.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `rule` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `fullname`, `rule`) VALUES
(1, 'admin@mail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn A', 0),
(2, 'admin1@mail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn B', 0),
(3, 'tungdd98@gmail.com', '202cb962ac59075b964b07152d234b70', 'tungdd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
