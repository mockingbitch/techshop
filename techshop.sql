-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2021 at 09:36 AM
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
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(4, 'Nokia', 'No Kia', 'nokia', 0),
(5, 'LG', 'eo j', 'lg', 1),
(6, 'Dell Alien Da Ware', 'Ä‘eo', 'dell-alien-da-ware', 1),
(7, 'Asus Republic of Gamers', 'a sÃºt', 'asus-republic-of-gamers', 1),
(8, 'Acer', 'Ã¢y cy', 'acer', 0);

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
(2, 'Iphone 13 Pro Max', 4, 2, '1232', '11212', 130000000, 20, 'e762a9a17f.', 'iphone-13-pro-max'),
(3, 'Asus ROG', 3, 7, 'Asus ROG', '&lt;p&gt;Asus ROG&lt;/p&gt;', 3000000, 3, '7a9f4eb210.jpg', 'asus-rog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
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
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
