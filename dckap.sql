-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 03:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dckap`
--

-- --------------------------------------------------------

--
-- Table structure for table `dc_address`
--

CREATE TABLE `dc_address` (
  `address_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dc_cart`
--

CREATE TABLE `dc_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dc_orders`
--

CREATE TABLE `dc_orders` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(1000) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dc_products`
--

CREATE TABLE `dc_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `product_image` varchar(1000) NOT NULL,
  `price` varchar(100) NOT NULL,
  `product_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dc_products`
--

INSERT INTO `dc_products` (`product_id`, `product_name`, `short_description`, `description`, `product_image`, `price`, `product_status`, `created_date`) VALUES
(1, 'apple ipad', 'Two sizes. Two industry-leading displays.The 11\" display gives you an immersive and portable experience. And the 12.9\" XDR display is a stunning and expansive way to view HDR content.', 'Two sizes. Two industry-leading displays.The 11\" display gives you an immersive and portable experience. And the 12.9\" XDR display is a stunning and expansive way to view HDR content.', 'iTab.PNG', '71900', 'Active', '2021-05-20 08:28:33'),
(2, 'iphone11', 'Two sizes. Two industry-leading displays.The 11\" display gives you an immersive and portable experience. And the 12.9\" XDR display is a stunning and expansive way to view HDR content.', 'Two sizes. Two industry-leading displays.The 11\" display gives you an immersive and portable experience. And the 12.9\" XDR display is a stunning and expansive way to view HDR content.', 'iPhone6.PNG', '120000', 'Active', '2021-05-20 08:29:18'),
(3, 'Macbook', 'MacBook — our most powerful notebooks featuring fast processors, incredible graphics, Touch Bar, and a spectacular Retina display.', 'MacBook — our most powerful notebooks featuring fast processors, incredible graphics, Touch Bar, and a spectacular Retina display.', 'macbook.PNG', '85000', 'Active', '2021-05-20 08:32:16'),
(4, 'macbook pro', 'MacBook Pro — our most powerful notebooks featuring fast processors, incredible graphics, Touch Bar, and a spectacular Retina display.', 'MacBook Pro — our most powerful notebooks featuring fast processors, incredible graphics, Touch Bar, and a spectacular Retina display.', 'macpro.PNG', '65000', 'Active', '2021-05-20 08:32:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dc_address`
--
ALTER TABLE `dc_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `dc_cart`
--
ALTER TABLE `dc_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `dc_orders`
--
ALTER TABLE `dc_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `dc_products`
--
ALTER TABLE `dc_products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dc_address`
--
ALTER TABLE `dc_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `dc_cart`
--
ALTER TABLE `dc_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dc_orders`
--
ALTER TABLE `dc_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dc_products`
--
ALTER TABLE `dc_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
