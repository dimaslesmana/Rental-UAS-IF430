-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 07:14 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pemweb_lec`
--
CREATE DATABASE IF NOT EXISTS `uas_pemweb_lec` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `uas_pemweb_lec`;

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `duration_in_days` int(11) NOT NULL,
  `status` enum('sedang_dikirim','sudah_dikirim','siap_di_pickup','selesai') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `image` mediumtext NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `price`, `quantity`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Playstation 1', 10000, 10, 'Konsol generasi pertama yang diciptakan oleh Sony lalu diluncurkan pada tahun 1994.', 'ps-1.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(2, 'Playstation 2', 20000, 10, 'Konsol generasi kedua yang diciptakan oleh Sony lalu diluncurkan di Tokyo pada tahun 2000.', 'ps-2.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(3, 'Playstation 3', 30000, 10, 'Konsol generasi ketiga yang terbit pada tahun 2006 di Jepang dengan membawa beberapa pembaruan seperti grafis lebih baik dan kontroler DualShock 3.', 'ps-3.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(4, 'Playstation 4', 40000, 10, 'Konsol generasi keempat di tahun 2013 oleh Sony yang sudah mendukung full HD.', 'ps-4.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(5, 'Playstation 5', 50000, 10, 'Konsol terbaru dari Sony pada generasi kelima pada tahun 2020 dengan prosesor dan GPU custom dari AMD.', 'ps-5.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(6, 'Xbox 360', 30000, 10, 'Konsol yang diperkenalkan secara resmi pada tahun 2005 milik Microsoft, konsol pertama yang dapat memutar film HD-DVD.', 'xbox-360.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(7, 'Xbox 360 S', 30000, 10, 'Konsol dengan model kedua dari Xbox 360 yang diperkenalkan secara resmi pada tahun 2010.', 'xbox-360-s.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(8, 'Xbox 360 E', 30000, 10, 'Konsol dengan model ketiga dan terakhir dari Xbox 360 yang muncul pada tahun 2013.', 'xbox-360-e.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(9, 'Xbox One', 40000, 10, 'Konsol generasi ketiga yang diumumkan pada tahun 2013, dan menjadi penerus dari Xbox 360.', 'xbox-one.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(10, 'Xbox One S', 40000, 10, 'Konsol yang dibuat untuk melanjutkan model dari Xbox one, dan diterbitkan pada tahun 2016.', 'xbox-one-s.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(11, 'Xbox One X', 45000, 10, 'Sama seperti One S, Xbox X merupakan model lanjutan dari Xbox One namun versi lebih mahal yang terbit pada tahun 2017.', 'xbox-one-x.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(12, 'Xbox Series X', 50000, 10, 'Konsol Xbox generasi terbaru yaitu keempat yang rilis pada tahun 2020.', 'xbox-series-x.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(13, 'Xbox Series S', 45000, 10, 'Konsol Xbox generasi keempat yang dibuat lebih rendah dari Xbox series X.', 'xbox-series-s.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(14, 'Nintendo 2DS', 20000, 10, 'Konsol yang diproduksi oleh Nintendo pada tahun 2013, yang merupakan versi entry-level dari Nintendo 3DS.', 'nintendo-2ds.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(15, 'Nintendo 3DS', 15000, 10, 'Konsol dari Nintendo yang terbit pada tahun 2010 sebagai penerus dari Nintendo DS.', 'nintendo-3ds.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(16, 'Nintendo Switch', 50000, 10, 'Konsol video game yang dikembangkan oleh Nintendo dan dirilis pada tahun 2017. Konsol ini merupakan perangkat protabel yang disambungkan dengan kontroler Joy-Con.', 'nintendo-switch.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(17, 'Nintendo Switch Lite', 45000, 10, 'Konsole yang rilis pada tahun 2019 yang dikembangkan oleh Sony. Berbeda dengan Nintendo Switch yang portable, console ini tidak portable seperti kakaknya.', 'nintendo-switch-lite.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(18, 'Nintendo Wii', 20000, 10, 'Konsol permainan video kelima dari Nintendo yang mana penerus dari Nintendo GameCube dengan inovasi utamanya yaitu kontroler (joystick).', 'nintendo-wii.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(19, 'Nintendo Wii U', 25000, 10, 'Konsol penerus dari Wii yang dikembangkan oleh Nintendo dan dirilis pada akhir tahun 2012.', 'nintendo-wii-U.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL),
(20, 'Nintendo NES Classic Edition', 20000, 10, 'Konsol replika mini dari NES yang dikembangkan oleh Nintendo dan dirilis pada tahun 2016.', 'nintendo-nes.png', '2021-06-11 00:09:49', '2021-06-11 00:09:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `role_id` char(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `uid`, `role_id`, `name`, `email`, `password`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, '408muU6DYpFT', 'R0001', 'Admin', 'admin@umn.ac.id', '$2y$10$zTaQOWPQG37g25IkDwiqk.EVq7iOLp/Cy1Z1NssVYC1I1fE1KFHgW', 'Jl. Alamat Admin', '6201234567890', '2021-06-11 00:13:50', '2021-06-11 00:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_carts`
--

CREATE TABLE `user_carts` (
  `id` int(11) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` char(5) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`) VALUES
('R0001', 'Admin'),
('R0002', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_carts`
--
ALTER TABLE `user_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_carts`
--
ALTER TABLE `user_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `user_accounts` (`email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD CONSTRAINT `user_accounts_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_carts`
--
ALTER TABLE `user_carts`
  ADD CONSTRAINT `user_carts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_accounts` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
