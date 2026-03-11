-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2026 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoe-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `image`, `name`, `product_id`, `quantity`, `price`, `status`) VALUES
(54, 6, 'p2.webp', 'LEATHER SHOES', 2, 1, 7500, 0),
(55, 6, 'f3.webp', 'GAG-0042 TAN', 18, 1, 16199, 0),
(85, 5, 'p4.webp', 'MSL0053 PINK', 4, 6, 2000, 0),
(86, 5, 'p5.jpg', 'MSL0050 MAROON', 5, 4, 1750, 0),
(87, 5, 'p3.webp', 'LEATHER SHOES', 3, 4, 7999, 0),
(88, 5, 'p10.webp', 'HUNTER-108', 10, 1, 3250, 0),
(89, 10, 'p1.webp', 'RDM-9278 WHITE', 1, 1, 6750, 0);

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `parent_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `title`, `parent_id`, `status`) VALUES
(1, 'Home', 0, 1),
(3, 'Men', 0, 1),
(5, 'Sports Shoes', 3, 1),
(6, 'Formal Shoes', 3, 1),
(7, 'Casual Shoes', 3, 1),
(8, 'Sandals', 3, 1),
(9, 'Women', 0, 1),
(10, 'About', 0, 1),
(11, 'Contact', 0, 1),
(12, 'Sports Shoes', 9, 1),
(13, 'Sneakers', 9, 1),
(14, 'Court Shoes', 9, 1),
(15, 'Pumps', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `amount` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `amount`, `status`, `created_at`) VALUES
(55, 5, 'MSL0050 MAROON', 1750, 1, '2026-02-17 22:19:01.0'),
(56, 5, 'MSL0050 MAROON', 1750, 0, '2026-02-17 22:19:13.0'),
(57, 5, 'LEATHER SHOES', 15000, 0, '2026-02-17 22:20:24.0'),
(58, 5, 'RDM-9278 WHITE', 6750, 0, '2026-02-18 17:29:15.0'),
(59, 5, 'RDM-9278 WHITE', 6750, 0, '2026-02-19 00:07:02.0'),
(60, 5, '', 0, 0, '2026-02-19 00:17:35.0'),
(61, 5, 'RDM-9278 WHITE', 6750, 0, '2026-02-19 00:18:45.0'),
(62, 5, 'RDM-9278 WHITE', 6750, 0, '2026-02-19 11:45:56.0'),
(63, 5, 'RDM-9278 WHITE', 6750, 0, '2026-02-19 11:47:56.0'),
(64, 5, 'RDM-9278 WHITE', 6750, 0, '2026-02-19 16:19:37.0'),
(65, 5, 'MSL0053 PINK', 2000, 0, '2026-02-19 17:12:30.0'),
(66, 5, 'MSL0053 PINK', 2000, 0, '2026-02-19 17:12:37.0'),
(67, 5, 'LEATHER SHOES', 7999, 0, '2026-02-19 21:20:22.0'),
(68, 5, 'MSL0053 PINK', 2000, 0, '2026-02-21 11:21:56.0'),
(69, 5, '', 0, 0, '2026-02-21 14:42:03.0'),
(70, 5, 'LEATHER SHOES', 55993, 0, '2026-02-21 16:15:39.0'),
(71, 5, 'MSL0053 PINK', 10000, 0, '2026-02-21 16:25:39.0'),
(72, 5, 'MSL0050 MAROON', 7000, 0, '2026-02-21 23:01:04.0'),
(73, 5, 'MSL0053 PINK', 10000, 0, '2026-02-21 23:24:43.0'),
(74, 5, 'MSL0053 PINK', 10000, 0, '2026-02-21 23:25:07.0'),
(75, 5, 'MSL0053 PINK', 10000, 0, '2026-02-21 23:26:12.0'),
(76, 5, 'LEATHER SHOES', 31996, 0, '2026-02-21 23:26:54.0'),
(77, 5, 'LEATHER SHOES', 31996, 0, '2026-02-21 23:32:32.0'),
(78, 5, 'LEATHER SHOES', 31996, 0, '2026-02-22 10:52:29.0'),
(79, 5, 'LEATHER SHOES', 31996, 0, '2026-02-22 10:52:35.0'),
(80, 5, 'MSL0053 PINK', 12000, 0, '2026-02-22 10:54:42.0'),
(81, 5, 'HUNTER-108', 3250, 0, '2026-02-22 11:52:04.0'),
(82, 5, 'MSL0053 PINK', 12000, 0, '2026-02-24 15:10:36.0'),
(83, 10, 'RDM-9278 WHITE', 6750, 0, '2026-02-26 18:18:53.0');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`, `price`, `status`) VALUES
(51, 55, 5, 1, 1750, 0),
(52, 56, 5, 1, 1750, 0),
(53, 57, 2, 2, 7500, 0),
(54, 58, 1, 1, 6750, 0),
(55, 59, 1, 1, 6750, 0),
(56, 60, 1, 0, 6750, 0),
(57, 61, 1, 1, 6750, 0),
(58, 62, 1, 1, 6750, 0),
(59, 63, 1, 1, 6750, 0),
(60, 64, 1, 1, 6750, 0),
(61, 65, 4, 1, 2000, 0),
(62, 66, 4, 1, 2000, 0),
(63, 67, 3, 1, 7999, 0),
(64, 68, 4, 1, 2000, 0),
(65, 69, 1, 0, 6750, 0),
(66, 70, 3, 7, 7999, 0),
(67, 71, 4, 5, 2000, 0),
(68, 72, 5, 4, 1750, 0),
(69, 73, 4, 5, 2000, 0),
(70, 74, 4, 5, 2000, 0),
(71, 75, 4, 5, 2000, 0),
(72, 76, 3, 4, 7999, 0),
(73, 77, 3, 4, 7999, 0),
(74, 78, 3, 4, 7999, 0),
(75, 79, 3, 4, 7999, 0),
(76, 80, 4, 6, 2000, 0),
(77, 81, 10, 1, 3250, 0),
(78, 82, 4, 6, 2000, 0),
(79, 83, 1, 1, 6750, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `old_price` int(100) NOT NULL,
  `new_price` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `text`, `image`, `quantity`, `old_price`, `new_price`, `category_id`, `status`) VALUES
(1, 'RDM-9278 WHITE', 'Some sample text for this page.', 'p1.webp', 2, 13499, 6750, 5, 1),
(2, 'LEATHER SHOES', 'Some sample text for this page.', 'p2.webp', 1, 14999, 7500, 6, 1),
(3, 'LEATHER SHOES', 'Some sample text for this page.Some sample text for this page.Some sample text for this page.Some sample text for this page.Some sample text for this page.Some sample text for this page.', 'p3.webp', 1, 9999, 7999, 7, 1),
(4, 'MSL0053 PINK', 'Some sample text for this page.', 'p4.webp', 1, 3999, 2000, 14, 1),
(5, 'MSL0050 MAROON', 'Some sample text for this page.', 'p5.jpg', 1, 3499, 1750, 15, 1),
(6, 'HUNTER-105', 'Some sample text for this page.', 'p6.webp', 1, 6499, 3250, 12, 1),
(7, 'HUNTER-108', 'Some sample text for this page.', 'p7.webp', 1, 6499, 3250, 12, 1),
(8, 'HUNTER-105', 'Some sample text for this page.', 'p8.webp', 1, 6499, 3250, 12, 1),
(9, 'HUNTER-105', 'Some sample text for this page.', 'p9.jpg', 1, 6499, 3250, 12, 1),
(10, 'HUNTER-108', 'Some sample text for this page.', 'p10.webp', 1, 6499, 3250, 12, 1),
(11, 'RDM-9929 GREY', 'Some sample text for this page.', 's1.webp', 1, 14999, 13499, 5, 1),
(12, 'RDM-9929 COFFEE', 'Some sample text for this page.', 's2.webp', 1, 14999, 13499, 5, 1),
(13, 'RDM-9929 BLUE', 'Some sample text for this page.', 's3.webp', 1, 14999, 13499, 5, 1),
(14, 'RDM-9928 BEIGE', 'Some sample text for this page.', 's4.webp', 1, 14999, 13499, 5, 1),
(15, 'RDM-9928 BLACK', 'Some sample text for this page.', 's5.webp', 1, 14999, 13499, 5, 1),
(16, 'FCG-8108 BLACK', 'Some sample text for this page.', 'f1.webp', 1, 8999, 7999, 6, 1),
(17, 'FCG-8108', 'Some sample text for this page.', 'f2.webp', 1, 8999, 7999, 6, 1),
(18, 'GAG-0042 TAN', 'Some sample text for this page.', 'f3.webp', 1, 17999, 16199, 6, 1),
(19, 'GAG-0042 COFFEE', 'Some sample text for this page.', 'f4.webp', 1, 17999, 16199, 6, 1),
(20, 'GAG-0039 BROWN', 'Some sample text for this page.', 'f5.webp', 1, 17999, 16199, 6, 1),
(21, 'AIR-001 BLACK', 'Some sample text for this page.', 'c1.webp', 1, 9999, 7999, 7, 1),
(22, 'AIR-001 BROWN', 'Some sample text for this page.', 'c2.webp', 1, 9999, 7999, 7, 1),
(23, 'AIR-002 TAN', 'Some sample text for this page.', 'c3.webp', 1, 9999, 8999, 7, 1),
(24, 'AIR-003 BLACK', 'Some sample text for this page.', 'c4.webp', 1, 9999, 8999, 7, 1),
(25, 'AIR-003 MUSTARD', 'Some sample text for this page.', 'c5.webp', 1, 9999, 8999, 7, 1),
(26, 'LEATHER SANDAL', 'Some sample text for this page.', 'san1.webp', 1, 5499, 2750, 8, 1),
(27, 'LEATHER SANDAL', 'Some sample text for this page.', 'san2.webp', 1, 5499, 2750, 8, 1),
(28, 'LEATHER SANDAL', 'Some sample text for this page.', 'san3.webp', 1, 5499, 2750, 8, 1),
(29, 'LEATHER SANDAL', 'Some sample text for this page.', 'san4.webp', 1, 5499, 2750, 8, 1),
(30, 'LEATHER SANDAL', 'Some sample text for this page.', 'san5.webp', 1, 5499, 2750, 8, 1),
(31, 'AVL0001 GREEN', 'Some sample text for this page.', 'ws1.webp', 1, 5499, 2750, 13, 1),
(32, 'AVL0001 PINK', 'Some sample text for this page.', 'ws2.webp', 1, 5499, 2750, 13, 1),
(33, 'AVL0002 GREY', 'Some sample text for this page.', 'ws3.webp', 1, 5499, 2750, 13, 1),
(34, 'AVL-0002 BEIGE', 'Some sample text for this page.', 'ws4.webp', 1, 5499, 2750, 13, 1),
(35, 'CRYSTAL WHITE', 'Some sample text for this page.', 'ws5.webp', 1, 7499, 3750, 13, 1),
(36, 'BFL0024 GREEN', 'Some sample text for this page.', 'wc1.webp', 1, 5999, 4999, 14, 1),
(37, 'BFL0024 BLACK', 'Some sample text for this page.', 'wc2.webp', 1, 5999, 4999, 14, 1),
(38, 'BFL0023 GOLDEN', 'Some sample text for this page.', 'wc3.webp', 1, 5999, 4999, 14, 1),
(39, 'BFL0023 BLACK', 'Some sample text for this page.', 'wc4.webp', 1, 5999, 4999, 14, 1),
(40, 'AML-0015 CHOCO', 'Some sample text for this page.', 'wc5.webp', 1, 4999, 3999, 14, 1),
(41, 'MML-0001 MAROON', 'Some sample text for this page.', 'wp1.webp', 1, 4999, 3999, 15, 1),
(42, 'MML-0001 BLACK', 'Some sample text for this page.', 'wp2.webp', 1, 4999, 3999, 15, 1),
(43, 'FSL-0011 BEIGE', 'Some sample text for this page.', 'wp3.webp', 1, 4999, 3999, 15, 1),
(44, 'FSL-0011 OLIVE', 'Some sample text for this page.', 'wp4.webp', 1, 4999, 3999, 15, 1),
(45, 'FSL-0012 PINK', 'Some sample text for this page.', 'wp5.webp', 1, 4999, 3999, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `status`) VALUES
(1, 1, 'p1.webp', 1),
(2, 1, 'p1-2.webp', 1),
(5, 2, 'p2.webp', 1),
(6, 2, 'p2-1.webp', 1),
(9, 3, 'p3.webp', 1),
(10, 3, 'p3-1.webp', 1),
(13, 4, 'p4.webp', 1),
(14, 4, 'p4-1.webp', 1),
(17, 5, 'p5.jpg', 1),
(18, 5, 'p5-1.webp', 1),
(21, 6, 'p6.webp', 1),
(22, 6, 'p6-1.webp', 1),
(25, 7, 'p7.webp', 1),
(26, 7, 'p7-1.webp', 1),
(27, 8, 'p8.webp', 1),
(28, 8, 'p8-1.webp', 1),
(31, 9, 'p9.jpg', 1),
(32, 9, 'p9-1.webp', 1),
(33, 10, 'p10.webp', 1),
(34, 10, 'p10-1.webp', 1),
(35, 11, 's1.webp', 1),
(36, 11, 's1-1.webp', 1),
(37, 12, 's2.webp', 1),
(38, 12, 's2-2.webp', 1),
(39, 13, 's3.webp', 1),
(40, 13, 's3-3.webp', 1),
(41, 14, 's4.webp', 1),
(42, 14, 's4-4.webp', 1),
(43, 15, 's5.webp', 1),
(44, 15, 's5-5.webp', 1),
(45, 16, 'f1.webp', 1),
(46, 16, 'f1-1.webp', 1),
(47, 17, 'f2.webp', 1),
(48, 17, 'f2-2.webp', 1),
(49, 18, 'f3.webp', 1),
(50, 18, 'f3-3.webp', 1),
(51, 19, 'f4.webp', 1),
(52, 19, 'f4-4.webp', 1),
(53, 20, 'f5.webp', 1),
(54, 20, 'f5-5.webp', 1),
(55, 21, 'c1.webp', 1),
(56, 21, 'c1-1.webp', 1),
(57, 22, 'c2.webp', 1),
(58, 22, 'c2-2.webp', 1),
(59, 23, 'c3.webp', 1),
(60, 23, 'c3-3.webp', 1),
(61, 24, 'c4.webp', 1),
(62, 24, 'c4-4.webp', 1),
(63, 25, 'c5.webp', 1),
(64, 25, 'c5-5.webp', 1),
(65, 26, 'san1.webp', 1),
(66, 26, 'san1-1.webp', 1),
(67, 27, 'san2.webp', 1),
(68, 27, 'san2-2.webp', 1),
(69, 28, 'san3.webp', 1),
(70, 28, 'san3-3.webp', 1),
(71, 29, 'san4.webp', 1),
(72, 29, 'san4-4.webp', 1),
(73, 30, 'san5.webp', 1),
(74, 30, 'san5-5.webp', 1),
(75, 31, 'ws1.webp', 1),
(76, 31, 'ws1-1.webp', 1),
(77, 32, 'ws2.webp', 1),
(78, 32, 'ws2-2.webp', 1),
(79, 33, 'ws3.webp', 1),
(80, 33, 'ws3-3.webp', 1),
(81, 34, 'ws4.webp', 1),
(82, 34, 'ws4-4.webp', 1),
(83, 35, 'ws5.webp', 1),
(84, 35, 'ws5-5.webp', 1),
(85, 36, 'wc1.webp', 1),
(86, 36, 'wc1-1.webp', 1),
(87, 37, 'wc2.webp', 1),
(88, 37, 'wc2-2.webp', 1),
(89, 38, 'wc3.webp', 1),
(90, 38, 'wc3-3.webp', 1),
(91, 39, 'wc4.webp', 1),
(92, 39, 'wc4-4.webp', 1),
(93, 40, 'wc5.webp', 1),
(94, 40, 'wc5-5.webp', 1),
(95, 41, 'wp1.webp', 1),
(96, 41, 'wp1-1.webp', 1),
(97, 42, 'wp2.webp', 1),
(98, 42, 'wp2-2.webp', 1),
(99, 43, 'wp3.webp', 1),
(100, 43, 'wp3-3.webp', 1),
(101, 44, 'wp4.webp', 1),
(102, 44, 'wp4-4.webp', 1),
(103, 45, 'wp5.webp', 1),
(104, 45, 'wp5-5.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `status`, `created_at`) VALUES
(1, 'slider1.webp', 1, '2026-01-23 15:39:59'),
(2, 'slider2.webp', 1, '2026-01-23 15:39:59'),
(3, 'slider3.webp', 1, '2026-01-23 15:39:59'),
(4, 'slider4.webp', 1, '2026-01-23 15:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmpassword` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `confirmpassword`, `role`, `status`) VALUES
(1, 'Muzammil Islam', 'muzammil@gmail.com', '123', '123', 0, 1),
(2, 'fahad khan', 'fahad@gmail.com', '$2y$10$Chrs5pJaQdKPshd1hFyuh.EJU4HC2hDrRWNxYHgsnBKgzJDmsv8l2', '$$2y$10$bK1HdzBklVqBJK85R/LxyuBcapybM8mHeFN8wCP5FC9.2UBMnKrBC', 0, 0),
(3, 'Mudassir Awan', 'mudassir@gmail.com', '$2y$10$REnURaIyngltEMRssCRsOeLz2dLdIE3HQ6aP0zYZ/5Iorvta0T6A2', '$$2y$10$zEAXKUVrudV1ZEzKgqaFkeUCL4Ifk6gmHrF.mgFVig5Lf2xI2b/A6', 0, 0),
(4, 'Mudassir', 'mudassir1@gmail.com', '$2y$10$Rnb/mWA.P8wT.NM.7kPqCu78Qa4/TqXn4sef3XLb9kMCHkwUQNcqy', '$$2y$10$b/Q9zvUe9hd1EwV9PVjiQeZbs.Qrwr.pVSoeeRyOBp4bolbEeae0i', 0, 0),
(5, 'Muzammil', 'muzammil1@gmail.com', '$2y$10$Wy7XcGrEMn6icvnbG.SCi.eW5ExiklUxC6u7dPkbHg90TWpNlw8he', '$$2y$10$pu5vKWDTqu975Z8P0oiqiO/Etph9XjrEAuCEYksHoakmgXw.d58qu', 1, 0),
(6, 'Muzammil', 'muzammil2@gmail.com', '$2y$10$Z4I07W5oaMcGJFtj8LgJxe3I1nkVJxCefQkbUEUSf2WJ4BN5VsuVu', '$$2y$10$XlyN9KwcTkPRlZHwApgNLOTnhFVY5UTcm0QWPk8BTxe6v1hRTEe26', 0, 0),
(7, 'Muzammil', 'muzammil3@gmail.com', '$2y$10$8.4PRiRo.llaOxYbejCWhePsu5g0hqAOiSGiUSvTlSdwJ3WfgFA46', '$$2y$10$boTtSrToXtpJ4eX9VnJ.bO4AyvBSxRqJwRT.Z/7DpTMTP6rlOQzqa', 0, 0),
(8, 'fahad khan', 'fahad1@gmail.com', '$2y$10$rV7R9E.3AcPgbA3qrwXqeOZ/os/kwza/tDXsEO4YENm0Is8E2Kjyq', '$$2y$10$7QCHNtKnF.G6VZGrn4p1ROIcxY5yONk25Pqj0RsjR20rZaCYXtR8q', 0, 0),
(9, 'Muzammil', 'muzammil0@gmail.com', '$2y$10$9EN.faNWHXdpiFmsFnbcUegS12ExiXFw6Cy9hV08MUlYv1odoCSvi', '$$2y$10$UJD/OKq75mjN.QHytkY7Fu1cfP8XjjNFvgXe3Hmpao1bcr0Uj3C/u', 0, 0),
(10, 'fahad khan', 'fahad2@gmail.com', '$2y$10$HA.JEWWUT7eSRSKjMCxZeOxtOXHEVp12lzmXhzDJ4IYmMNacYkfe2', '$$2y$10$zDaVK650QI/m28bFKVSnb.ILXQj9GKFZHaI67bcYZgdGSsLZ/Ieoi', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
