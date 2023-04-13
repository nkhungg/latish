-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 10:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latish`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `ctm_id` varchar(12) NOT NULL,
  `prd_id` varchar(12) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('paid','waiting','processing') DEFAULT 'processing',
  `time` datetime DEFAULT curtime(),
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `ctm_id`, `prd_id`, `total`, `status`, `time`, `address`) VALUES
(8, '012345678910', '1', 130000, 'waiting', '2023-04-13 05:52:15', NULL),
(9, '012345678910', '4', 400000, 'paid', '2023-04-13 06:58:36', NULL),
(10, '012345678910', '1', 130000, 'processing', '2023-04-13 08:33:55', 'ktx'),
(11, '012345678910', '10', 200000, 'waiting', '2023-04-13 09:07:38', 'ktx'),
(12, '012345678910', '4', 400000, 'processing', '2023-04-13 09:07:41', 'ktx'),
(13, '012345678910', '7', 120000, 'waiting', '2023-04-13 09:07:45', 'ktx'),
(14, '012345678910', '10', 200000, 'processing', '2023-04-13 09:50:09', 'ktx'),
(15, '012345678910', '4', 400000, 'waiting', '2023-04-13 14:38:50', 'ktx');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `phone_no` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `receiver`, `phone_no`, `address`) VALUES
(10, 'Nguyen Van A', '1324531255', 'ktx'),
(11, 'Nguyen Van A', '1324531255', 'ktx');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
('1', 'aoquan'),
('2', 'dientu'),
('3', 'giadung'),
('4', 'hoctap'),
('5', 'sach'),
('6', 'giaydep');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone_no`, `address`, `password`) VALUES
('012345345041', 'Nguyen Khanh Hung', '0987654621', 'ktx', 'abc'),
('012345678012', 'Nguyen Khanh Hung', '0987654121', 'ktx', 'abc'),
('012345678910', 'Nguyen Khanh Hung', '0987654321', 'ktx', 'abc'),
('012345691041', 'Nguyen Khanh Hung', '0987614321', 'ktx', 'abc'),
('012345891011', 'Nguyen Khanh Hung', '0987634321', 'ktx', 'abc'),
('012347895011', 'Nguyen Khanh Hung', '0987684321', 'ktx', 'abc'),
('012377891011', 'Nguyen Khanh Hung', '0987154321', 'ktx', 'abc'),
('012562891011', 'Nguyen Khanh Hung', '0947654321', 'ktx', 'abc'),
('034577891011', 'Nguyen Khanh Hung', '0988654321', 'ktx', 'abc'),
('097654331813', 'Hung', '0917246145', 'hue', 'abc'),
('234568891011', 'Nguyen Khanh Hung', '0981654321', 'ktx', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(10) NOT NULL,
  `seller_id` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `status` enum('sold','in stock') DEFAULT 'in stock',
  `img` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `seller_id`, `name`, `category_id`, `price`, `status`, `img`, `description`) VALUES
('1', '154561806323', 'Ao thun local brand', '1', '130000', 'in stock', 'ao1.png', 'Ao thun mua he local brand; Size: XL'),
('10', '154561878323', 'Quan kaki hiphop', '1', '200000', 'in stock', 'quan2.png', 'Quan thung kaki danh cho dan choi; Size: L'),
('11', '154516180323', 'Tu lanh Panasonic cu', '3', '1200000', 'sold', 'giadung2.png', 'Tu lanh Panasonic chinh hang cu'),
('2', '154561807323', 'Ao khoac chong nang', '1', '80000', 'sold', 'ao2.png', 'Ao chong nang bao ve tia UV; Size: M'),
('3', '154561753823', 'Quan jeans', '1', '180000', 'in stock', 'quan1.png', 'Quan jeans bo sat; Size: XL'),
('4', '154561753823', 'Giay Bitis', '6', '400000', 'in stock', 'giay1.png', 'Giay Bitis Hunter; Size: 43'),
('5', '154561812323', 'Chuot Logitech G304', '2', '600000', 'in stock', 'dientu1.png', 'Chuot khong day chinh hang Logitech G304; Thong so ky thuat:...'),
('6', '154516180323', 'Noi com dien gia re', '3', '400000', 'in stock', 'giadung1.png', 'Noi com dien da su dung duoc 1 nam muon ban lai cho cac ban sinh vien co nhu cau.'),
('7', '154561812323', 'Bo truyen Conan cu', '5', '120000', 'in stock', 'sach1.png', 'Bo truyen Conan tap 1 - 10.'),
('8', '154561878323', 'Mat biec', '5', '50000', 'sold', 'sach2.png', 'Truyen Mat biec cua Nguyen Nhat Anh'),
('9', '154561807323', 'Ban phim co AKKO', '2', '1000000', 'in stock', 'dientu2.png', 'Ban phim co AKKO chinh hang da su dung 6 thang');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `phone_no`, `address`) VALUES
('154516180323', 'Anh Khoa', '3512561274', 'binh duong'),
('154561753823', 'Khanh Hung', '3512665274', 'hue'),
('154561806323', 'Tri', '3512565364', 'da nang'),
('154561807323', 'Tran Khoa', '3512565274', 'tphcm'),
('154561812323', 'Khung', '3512565278', 'ha noi'),
('154561878323', 'Dung', '3512565223', 'quang ninh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_ibfk_1` (`ctm_id`),
  ADD KEY `bill_ibfk_2` (`prd_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`,`seller_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_ibfk_2` (`category_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`ctm_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`prd_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
