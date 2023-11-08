-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 09:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Redmi'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Oneplus');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Mobile'),
(2, 'Cover'),
(3, 'Charger');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `date_ordered` datetime NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `customer_email`, `phone`, `customer_address`, `total_price`, `date_ordered`, `payment_method`) VALUES
(47, 'Deepral shakya', 'shakyadeepral44@gmail.com', 9810112522, 'Imadol, Lalitpur', '217200.00', '0000-00-00 00:00:00', 'cod'),
(48, 'Dipson Maharjan', 'dipson@gmail.com', 9841066537, 'ktm', '36300.00', '0000-00-00 00:00:00', 'netbanking');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(89, 1, 2, 'Samsung Galaxy S22 5G', 110000, 'Released 2022, February 25\r\n167g / 168g (mmWave), 7.6mm thickness\r\nAndroid 12, up to Android 13, One UI 5\r\n128GB/256GB storage, no card slot', '1669774214_samsung-galaxy.jpg', ''),
(90, 3, 1, 'Charger adapter for Xiaomi Redmi Note 11 Pro', 375, 'charger adapter for Xiaomi Redmi Note 11 Pro Max Original charger Like Wall Charger | Mobile Charger | Fast Charger | Android USB Charger With 1 Meter USB Type C Charging Data Cable (3.1 amp , VB , Black)', '1669778823_redmicharger.jpg', ''),
(92, 3, 2, 'Adaptive Fast Charger for Samsung Galaxy S22', 1200, 'S22+ S22 Ultra S21 S20 FE S20+ S10 S9 S8+ A20 A21 A51 A71 A11 A01 A9 A10e A12 A32 Note 22/20 Ultra, Quick Charge 3.0 Wall Charger Type C Fast Charging Cable', '1669786533_samsungcharger.jpg', ''),
(93, 1, 3, 'Apple iPhone 13 Pro 128GB', 100000, '6.1-inch Super Retina XDR display with ProMotion for a faster, more responsive feel\r\n\r\nCinematic mode adds shallow depth of field and shifts focus automatically in your videos \r\n\r\nPro camera system with new 12MP Telephoto, Wide, and Ultra Wide cameras; LiDAR Scanner; \r\n\r\n6x optical zoom range; macro photography; Photographic Styles, ProRes video, Smart HDR 4, Night mode, Apple ProRAW, 4K Dolby Vision HDR recording \r\n\r\n12MP TrueDepth front camera with Night mode, 4K Dolby Vision HDR recording \r\n\r\nA15 Bionic chip for lightning-fast performance \r\n\r\nUp to 22 hours of video playback\r\n\r\nDurable design with Ceramic Shield \r\n\r\nIndustry-leading IP68 water resistance\r\n\r\niOS 15 packs new features to do more with iPhone than ever before \r\n\r\nSupports MagSafe accessories for easy attach and faster wireless charging', '1669952359_iphone.jpg', ''),
(94, 1, 1, 'Xiaomi Redmi Note 11 Pro', 35000, 'Released 2021, November 01\r\n207g, 8.3mm thickness\r\nAndroid 11, MIUI 12.5\r\n128GB/256GB storage, no card slot', '1671165473_1669288774_redmi.jpg', ''),
(96, 2, 2, 'Samsung Galaxy S22 5G Cover', 1300, 'Built in Screen Protector Military Grade Hard Rugged Cover Heavy Duty Armor Galaxy S22 Phone Cases with Metal Ring Kickstand Shockproof', '1671167576_samsungcover.jpg', ''),
(97, 2, 3, 'Moshi Arx Clear (MagSafe) for iPhone 13 Pro', 5800, 'Military-grade drop protection (MIL-STD-810G, SGS-certified)\r\n\r\nDurable: hybrid construction using hard and soft polymers\r\n\r\nRaised, accented buttons and precision camera cut out\r\n\r\nDurable surface coating to resist scratches\r\n\r\nRaised bezel protects your touchscreen when laid flat\r\n\r\nMagSafe compatible for fast, wireless charging', '1671168178_iphonecover.jpg', ''),
(98, 3, 3, 'APPLE 60W MAGSAFE POWER ADAPTER', 1400, 'The 60 Watt MagSafe Power Adapter features a magnetic DC connector that ensures your power cable will disconnect if it experiences undue strain and helps prevent fraying or weakening of the cables over time. In addition, the magnetic DC helps guide the plug into the system for a quick and secure connection.                                ', 'iphonecharger.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`) VALUES
(7, 'b', 'b@gmail.com', '92eb5ffee6ae2fec3ad71c777531578f'),
(10, 'deepral', 'shakyadeepral44@gmail.com', '5edce506037f1135ff280ed633341bf5'),
(12, 'siriya', 'siriya44@gmail.com', '77d6f1c047309dc051bf75e86e6c1639'),
(13, 'Lia', 'Lia1@gmail.com', 'eae61f0edaeab4bc53da35d3458acd67'),
(15, 'dipson', 'dipson@gmail.com', 'a73bb2654e75dd0449078254e29b7ac8'),
(16, 'hello', 'hello@gmail.com', '5d41402abc4b2a76b9719d911017c592');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
