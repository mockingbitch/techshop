-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2021 at 04:44 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `adminUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL,
  `adminName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminAvatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vkey` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `verified` int(11) DEFAULT NULL,
  `createdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `adminUser`, `adminPass`, `permission`, `adminName`, `adminAvatar`, `vkey`, `verified`, `createdate`) VALUES
(21, 'phongtq1@smartosc.com', '9f48495bb4b98ac37a1a72c7e6490c7a', 1, 'Phong Tráº§n', NULL, 'ab84b0fc31f881f082cd8e9e41ceb7b0', NULL, NULL),
(22, 'phong11@gmail.com', '9f48495bb4b98ac37a1a72c7e6490c7a', 2, 'Tráº§n Quang Phong', NULL, 'b7c4f983d9ebf6402d9aaed18572f7c9', NULL, NULL),
(23, 'phong123@gmail.com', '9f48495bb4b98ac37a1a72c7e6490c7a', 2, 'Phong Tráº§n', NULL, 'b6d828ff105f75dcdfdb08cf7bb2cc88', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminprofile`
--

CREATE TABLE `tbl_adminprofile` (
  `id` int(11) NOT NULL,
  `adminUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(50) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_adminprofile`
--

INSERT INTO `tbl_adminprofile` (`id`, `adminUser`, `adminName`, `phone`, `address`, `description`, `website`, `github`, `facebook`, `twitter`, `instagram`, `img`) VALUES
(14, 'phongtq1@smartosc.com', 'Phong Trần', 1234567891, '250 Kim Giang HN', 'Back-end developer', 'techshop.test', 'https://mockingbitch.github.io', 'https://facebook.com/jarvis.ejr', 'jarvis', 'jarvis.ejr', '72d91bc481.jpg'),
(15, 'phong11@gmail.com', 'Tráº§n Quang Phong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'phong123@gmail.com', 'Phong Tráº§n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandid` int(11) NOT NULL,
  `brandName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `brandDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `brandSlug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandid`, `brandName`, `brandDescription`, `brandSlug`, `status`) VALUES
(2, 'Iphone', 'TÃ¡o', 'iphone', 1),
(3, 'Samsung', 'sÃ m sung', 'samsung', 1),
(4, 'Nokia', 'No Kia', 'nokia', 1),
(5, 'LG', 'eo j', 'lg', 1),
(6, 'Dell Alien Da Ware', 'Ä‘eo', 'dell-alien-da-ware', 1),
(7, 'Asus Republic of Gamers', 'a sÃºt', 'asus-republic-of-gamers', 1),
(8, 'Acer', 'Ã¢y cy', 'acer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cateid` int(11) NOT NULL,
  `categoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categoryDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `categorySlug` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cateid`, `categoryName`, `categoryDescription`, `status`, `categorySlug`) VALUES
(1, 'Tablet', 'MÃ¡y tÃ­nh báº£ng', 1, 'tablet'),
(2, 'Phá»¥ kiá»‡n', 'Tai nghe, á»‘p Ä‘iá»‡n thoáº¡i cÃ¡c kiá»ƒu con Ä‘Ã  Ä‘iá»ƒu', 1, 'phu-kien'),
(3, 'MÃ¡y tÃ­nh', 'Laptop', 1, 'may-tinh'),
(4, 'Äiá»‡n thoáº¡i', 'smartPhong', 1, 'dien-thoai'),
(6, 'Smart Watch', 'Smart What the Fuck?', 1, 'smart-watch');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `cartid` int(11) NOT NULL,
  `customername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addressdetail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `cartcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`cartid`, `customername`, `email`, `city`, `addressdetail`, `sdt`, `note`, `date`, `status`, `subtotal`, `cartcode`) VALUES
(1, 'Phong Tr?n Quang', 'phong@gmail.com', 'HN', 'Ã¢', '0123654789', '', NULL, 1, 18000000, '914433'),
(3, 'Phong Tr?n Quang', 'phong@gmail.com', 'HN', 'asfgag', '129492523', 'asfasdgfaszd', NULL, 1, 4000000, '478637'),
(4, 'Phong Tr?n Quang', 'phong@gmail.com', 'as', 'asaf', '0123654789', 'asf', NULL, 1, 26000000, '169510'),
(5, 'Phong Tr?n Quang', 'phong@gmail.com', 'asgsdh', 'afa', '0123654789', '', NULL, 1, 26000000, '763323');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetail`
--

CREATE TABLE `tbl_orderdetail` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cartcode` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_orderdetail`
--

INSERT INTO `tbl_orderdetail` (`id`, `productName`, `productQuantity`, `productPrice`, `subtotal`, `img`, `cartcode`) VALUES
(7, 'Samsung galaxy s10', 1, 6000000, 6000000, '22dbcba4c0.jpg', 914433),
(8, 'Poco X3 Pro', 1, 1000000, 7000000, '7d345bcaa0.jpg', 914433),
(9, 'Iphone 11', 1, 11000000, 18000000, 'fc511b87f8.jpg', 914433),
(10, 'Samsung galaxy s10', 1, 6000000, 6000000, '22dbcba4c0.jpg', 923819),
(11, 'Poco X3 Pro', 1, 1000000, 7000000, '7d345bcaa0.jpg', 923819),
(12, 'Iphone 11', 1, 11000000, 18000000, 'fc511b87f8.jpg', 923819),
(13, 'Google Pixel 4', 1, 4000000, 4000000, '97dbf35997.jpg', 478637),
(14, 'Google Pixel 4', 1, 4000000, 4000000, '97dbf35997.jpg', 929725),
(15, 'Iphone 11', 1, 11000000, 15000000, 'bc658d5f0c.jpg', 929725),
(16, 'Iphone 11', 1, 11000000, 26000000, 'fc511b87f8.jpg', 929725),
(17, 'Google Pixel 4', 1, 4000000, 4000000, '97dbf35997.jpg', 169510),
(18, 'Iphone 11', 1, 11000000, 15000000, 'bc658d5f0c.jpg', 169510),
(19, 'Iphone 11', 1, 11000000, 26000000, 'fc511b87f8.jpg', 169510),
(20, 'Google Pixel 4', 1, 4000000, 4000000, '97dbf35997.jpg', 763323),
(21, 'Iphone 11', 1, 11000000, 15000000, 'bc658d5f0c.jpg', 763323),
(22, 'Iphone 11', 1, 11000000, 26000000, 'fc511b87f8.jpg', 763323);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productid` int(11) NOT NULL,
  `productName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cateid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `productDescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` int(255) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productSlug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productName`, `cateid`, `brandid`, `productDescription`, `content`, `productPrice`, `productQuantity`, `img`, `productSlug`) VALUES
(3, 'Asus ROG', 3, 7, 'Asus ROG', '&lt;p&gt;Asus ROG&lt;/p&gt;', 3000000, 3, '7a9f4eb210.jpg', 'asus-rog'),
(4, 'Poco X3 Pro', 4, 5, 'Poco X3 Pro', '&lt;p&gt;Poco X3 Pro&lt;/p&gt;', 1000000, 23, '7d345bcaa0.jpg', 'poco-x3-pro'),
(5, 'Iphone 11', 4, 2, 'Iphone 11', '&lt;p&gt;Iphone 11&lt;/p&gt;', 11000000, 62, 'fc511b87f8.jpg', 'iphone-11'),
(6, 'Iphone 11', 4, 2, 'Iphone 11', '&lt;p&gt;Iphone 11&lt;/p&gt;', 11000000, 62, 'bc658d5f0c.jpg', 'iphone-11'),
(7, 'Google Pixel 4', 4, 5, 'Google Pixel 4', '&lt;p&gt;Google Pixel 4&lt;/p&gt;', 4000000, 22, '97dbf35997.jpg', 'google-pixel-4'),
(8, 'Samsung galaxy s10', 4, 3, 'Samsung galaxy s10', '&lt;p&gt;Samsung galaxy s10&lt;/p&gt;', 6000000, 64, '22dbcba4c0.jpg', 'samsung-galaxy-s10'),
(9, 'Iphone 13 Pro Max', 4, 4, 'Iphone 13 Pro Max', '&lt;p&gt;Iphone 13 Pro Max&lt;/p&gt;', 20000000, 1, '54afc9ad31.jpg', 'iphone-13-pro-max');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchaseorder`
--

CREATE TABLE `tbl_purchaseorder` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addressdetail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `cartid` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_purchaseorder`
--

INSERT INTO `tbl_purchaseorder` (`username`, `email`, `city`, `addressdetail`, `sdt`, `note`, `cartid`, `date`, `status`, `subtotal`) VALUES
('phong', 'phong@gmail.com', 'HN', 'Ã¢', '1234198741092', 'a', 1, NULL, 1, NULL),
('phong', 'phong@gmail.com', 'HN', 'Ã¢', '1234198741092', 'a', 1, NULL, 1, NULL),
('phong', 'phong@gmail.com', 'HN', 'Ã¢', '1234198741092', 'as', 1, NULL, 1, NULL),
('phong', 'phong@gmail.com', 'HN', 'Ã¢', '1234198741092', 'as', 1, NULL, 1, NULL),
('phong', 'phong@gmail.com', 'HN', 'Ã¢', '1234198741092', 'as', 1, NULL, 1, NULL),
('phong jarvis', 'jarvis.ejr@gmail.com', 'HN', 'ae', '124128i4', 'qrq', 1, NULL, 1, NULL),
('phong jarvis', 'phong@gmail.com', 'HN', 'Ã¢', '1234124', '12', 1, NULL, 1, NULL),
('phong jarvis', 'phong@gmail.com', 'HN', 'Ã¢', '1234124', '12', 1, NULL, 1, NULL),
('phong jarvis', 'phong@gmail.com', 'HN', 'Ã¢', '1234124', '12', 1, NULL, 1, NULL),
('phong jarvis', 'phong@gmail.com', 'HN', 'Ã¢', '1234124', '12', 1, NULL, 1, NULL),
('phong jarvis', 'q@gmail.com', 'HN', 'sdf', '123523905', 'sdakl;f', 1, NULL, 1, 20000000),
('phong jarvis', 'q@gmail.com', 'HN', 'sdf', '123523905', 'sdakl;f', 1, NULL, 1, 20000000),
('phong jarvis', 'q@gmail.com', 'HN', 'sdf', '123523905', 'sdakl;f', 1, NULL, 1, 20000000),
('phong jarvis', 'q@gmail.com', 'HN', 'sdf', '123523905', 'sdakl;f', 1, NULL, 1, 20000000),
('phong jarvis', 'phong@gmail.com', 'HN', 'Ã¢', '1234198741092', '1', 1, NULL, 1, 20000000),
('phong jarvis', 'phong@gmail.com', 'HN', 'Ã¢', '1234198741092', '1', 1, NULL, 1, 20000000),
('feng', 'admin@gmail.com', 'Ã ', 'Ã ', '35', 'qá»­', 1, NULL, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usermail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `usermail`, `password`, `phone`, `address`, `fullname`) VALUES
(1, 'phong', 'phong@gmail.com', '9f48495bb4b98ac37a1a72c7e6490c7a', '0123654789', '250 HN', 'Phong Trần Quang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_adminprofile`
--
ALTER TABLE `tbl_adminprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cateid`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_adminprofile`
--
ALTER TABLE `tbl_adminprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
