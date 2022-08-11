-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 04:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `product_id`, `user_id`) VALUES
(1, '12', '50'),
(2, '12', '50'),
(3, '11', '50'),
(4, '12', '50'),
(6, '11', '50'),
(7, '12', '44'),
(8, '16', '44'),
(9, '15', '44'),
(10, '20', '44'),
(11, '20', '44'),
(12, '25', '30');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `byEmail` varchar(255) NOT NULL,
  `toEmail` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `name`, `byEmail`, `toEmail`, `msg`, `time`) VALUES
(16, 'CourierBD', 'wajed@gmail.com', 'admin@gmail.com', ' Hellow User', '2022-04-17 07:44:10'),
(17, 'CourierBD', 'wajed@gmail.com', 'admin@gmail.com', ' Hellow User', '2022-04-17 07:45:06'),
(22, 'CourierBD', 'admin@gmail.com', 'wajed@gmail.com', ' Hellow User', '2022-04-17 07:47:50'),
(23, 'abcde', 'abcde@gmail.com', 'admin@gmail.com', 'hellow admin', '2022-04-17 08:19:17'),
(25, 'CourierBD', 'admin@gmail.com', 'abcde@gmail.com', 'Hellow user', '2022-04-17 08:43:01'),
(26, 'CourierBD', 'admin@gmail.com', 'abcde@gmail.com', 'new', '2022-04-17 08:43:07'),
(28, 'CourierBD', 'admin@gmail.com', 'wajed@gmail.com', 'Thank you', '2022-05-16 05:40:43'),
(29, 'CourierBD', 'admin@gmail.com', 'wajed@gmail.com', 'Thank you', '2022-05-16 05:41:35'),
(30, 'abcdef', 'abcdef@gmail.com', 'admin@gmail.com', 'good', '2022-05-16 06:00:03'),
(31, 'CourierBD', 'admin@gmail.com', 'abcdef@gmail.com', 'thank you', '2022-05-16 06:00:58'),
(32, 'jashim khan', 'jashim123@gmail.com', 'admin@gmail.com', 'Good', '2022-05-16 06:44:38'),
(33, 'CourierBD', 'admin@gmail.com', 'jashim123@gmail.com', 'Thank You', '2022-05-16 06:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `coveragemaps`
--

CREATE TABLE `coveragemaps` (
  `id` int(55) NOT NULL,
  `area` varchar(222) NOT NULL,
  `location` varchar(222) NOT NULL,
  `status` int(55) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coveragemaps`
--

INSERT INTO `coveragemaps` (`id`, `area`, `location`, `status`) VALUES
(1, 'Sylhet', 'Sylhet City', 1),
(2, 'Dhaka', 'Dhaka City', 1),
(3, 'Chattogram', 'Chattogram City', 1),
(4, 'Khulna', 'Khulna City', 1),
(5, 'Borishal', 'Borishal City', 1),
(6, 'Rangpur', 'Rangpur City', 1),
(7, 'Rajshahi', 'Rajshahi City', 1),
(8, 'Mymenshingh', 'Mymenshingh City', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PackageID` int(11) DEFAULT NULL,
  `ProviderID` int(11) NOT NULL,
  `size` int(8) NOT NULL,
  `status` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `stamp` varchar(255) NOT NULL,
  `box` varchar(255) NOT NULL,
  `wraping` varchar(255) NOT NULL,
  `send_address` text NOT NULL,
  `receiving_address` text NOT NULL,
  `price` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL DEFAULT 'pending',
  `delivery` text DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `PackageID`, `ProviderID`, `size`, `status`, `height`, `width`, `postal_code`, `stamp`, `box`, `wraping`, `send_address`, `receiving_address`, `price`, `payment`, `delivery`) VALUES
(20, 44, 10, 44, 1, 'Light', 10, 6, 3100, 'false', 'false', 'false', 'Sylhet, Bangladesh', 'Dh, Bangladesh', 1000, 'paid', 'shipped'),
(22, 44, 9, 44, 2, 'Heavy', 30, 22, 3100, 'false', 'false', 'false', 'Chattogram, Bangladesh', '151/ Metali, 2nd Floor,Raynagar', 500, 'paid', 'pending'),
(24, 44, 10, 44, 2, 'Light', 7, 3, 3100, 'false', 'false', 'false', 'Rangpur, Bangladesh', '151/ Metali, 2nd Floor,Raynagar', 1000, 'paid', 'delivered'),
(30, 44, 31, 44, 2, 'Heavy', 5, 12, 3100, 'true', 'false', 'false', 'Dhaka, Bangladesh', '151/ Metali, 2nd Floor,Raynagar', 625, 'paid', 'pending'),
(31, 30, 31, 44, 2, 'Heavy', 54, 45, 3100, 'false', 'true', 'false', '12hadsg', '151/ Metali, 2nd Floor,Raynagar', 625, 'pending', 'pending'),
(34, 44, 31, 44, 2, 'Heavy', 5, 45, 3100, 'false', 'true', 'false', 'dhaka', '151/ Metali, 2nd Floor,Raynagar', 625, 'pending', 'pending'),
(35, 30, 38, 44, 2, 'Heavy', 12, 8, 3100, 'true', 'false', 'false', '152 Dhaka', '151/ Metali, 2nd Floor,Raynagar', 225, 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `PackageID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `packageName` varchar(200) NOT NULL,
  `from` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `height` varchar(200) NOT NULL,
  `width` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`PackageID`, `UserID`, `packageName`, `from`, `price`, `image`, `to`, `weight`, `height`, `width`) VALUES
(38, 44, 'Parcel-01 Sundarban', 'Jassore', 225, 'image/fmkr40.jpeg', 'Sylhet', '2kg', '12inch', '8inch'),
(39, 44, 'Parcel-02 Sundarban', 'Sylhet', 125, 'image/FMKRA6_2_32.jpg', 'Dhaka', '1kg', '4inch', '8inch'),
(41, 44, 'Parcel-03 Sundarban', 'Sylhet', 225, 'image/FMKR12_1_32.jpg', 'Chattogram', '5kg', '15inch', '28inch'),
(42, 44, 'Parcel-04 Sundarban', 'Dhaka', 185, 'image/FMKRCU_22.jpg', 'Sylhet', '2kg', '10inch', '14inch'),
(43, 44, 'Parcel-05 Sundarban', 'Rajshahi', 150, 'image/rmkr01_retouch.jpg', 'Sylhet', '1kg', '10inch', '6inch'),
(44, 44, 'Parcel-06 Sundarban', 'Jassore', 225, 'image/rmkr01_retouch.jpg', 'Dhaka', '2.5kg', '12inch', '14inch');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `length` varchar(110) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(350) NOT NULL,
  `image` varchar(360) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `size`, `width`, `length`, `category`, `price`, `description`, `image`, `time`) VALUES
(23, 'CourierBD Postal Box-01', '1', '420 ', '116', 'Box', '15', 'Large Mailing box, ideal size for posting our Large Magnetic Gift Box, which keeps your items perfectly safe in transit. Add our tape for extra security.', 'assets/img/product/fmkr40.jpeg', '09:06:am 03-06-2022'),
(24, 'CourierBD Postal Box-02', '1', '175', '90', 'Box', '25', '1-piece Flat-Packed corrugated postal box in a natural colour- perfect to protect your delicate items in the post.', 'assets/img/product/FMKR16_1_32.jpg', '09:06:am 03-06-2022'),
(25, 'CourierBD Postal Box-03', '1', '255', '47', 'Box', '8', 'CourierBD corrugated and perforated wrap mailing boxes are the quickest and most convenient way to wrap products such as recipe books, pet supplies, wall art, stationery, and much more.', 'assets/img/product/fmkr64.jpeg', '09:06:am 03-06-2022');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `Report_by` int(11) DEFAULT NULL,
  `Report_to` int(11) DEFAULT NULL,
  `report` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`ReportID`, `Report_by`, `Report_to`, `report`, `image`) VALUES
(8, 44, 44, 'sssssss', ''),
(9, 44, 44, '11111111111111', ''),
(10, 44, 44, '11111111111111111111111', ''),
(14, 47, 44, 'packaging error', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `package_id` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `review` varchar(300) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `package_id`, `rating`, `review`, `date`) VALUES
(1, '10', '10', '3', 'Thanks', '11/11/2022'),
(5, '', '9', '3', 'Thanks', '05:05:pm 23-05-2022'),
(12, '44', '9', '1', 'Good', '05:05:pm 26-05-2022'),
(14, '44', '9', '5', 'Very Good', '10:05:am 27-05-2022'),
(15, '30', '29', '4', 'Very Good', '07:05:pm 27-05-2022'),
(16, '44', '31', '5', 'Very Good', '10:05:am 28-05-2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(7) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `full_name` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `birthday` date DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `username`, `user_pass`, `timestamp`, `full_name`, `user_type`, `birthday`, `mobile`, `address`, `image`) VALUES
(30, 'tomalkrishnadas', '$2y$10$jJo/BVrKQvFtWLdUEbhxN.5QJYzSm/nmOfPX0jH.0Df/zdNbmXxeu', '2022-03-21 13:07:52', 'Tomal Krishna Das', 'admin', '1999-03-08', '01771111111', 'Osmaninagar, Sylhet', ''),
(43, 'admin', '$2y$10$8be98qNpyYf6k/O3iVqRTuWmDhiJ.Wrd8bIhWWxcsozs9fX.ncHAi', '2022-04-04 15:41:36', 'Admin', 'admin', '2022-04-02', '012345678', 'adminadminadmin', 'Picture 001.jpg'),
(44, 'Sundarban', '$2y$10$EzeB2UEciiOa2.Fp2oibXu1dMlk36KRyngK4MbTGy10t7CZTu.REu', '2022-04-04 15:43:09', 'Sundarban', 'provider', '2022-04-29', '1111111111111', 'SundarbanSundarbanSundarban', 'logo.png'),
(45, 'wazed1010', '$2y$10$2rF6Ib8pJ9aK823WguyBv.92fule4stFj5xZNeLvf.MF91ASaArD.', '2022-04-06 11:57:38', 'Wazed Chowdhary', 'provider', '1999-01-01', '+8801738140058', 'Dhaka', 'WIN_20190406_12_43_47_Pro.jpg'),
(46, 'wazed2018', '$2y$10$nPFuzRwf7GYcO3IK3pgHEu.OPaaaMSq.2t0MW.3ZPGGvtwgXAPB8S', '2022-04-06 12:13:54', 'Wazedehsan', 'user', '1998-03-25', '+8801738140058', '0x1e6d2FAd0c59d9Aa270685dDE25434657F369246', 'logo.png'),
(47, 'jashim khan', '$2y$10$HzmQL7nd3zhsbgSoyjNlcOpBTZSz/DS/1RZDp5CxF97DR6anymiDO', '2022-04-06 12:33:02', 'jashim ', 'user', '1999-11-03', '01723456787', 'sylhet,', 'logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `coveragemaps`
--
ALTER TABLE `coveragemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `orders_ibfk_1` (`UserID`),
  ADD KEY `orders_ibfk_2` (`PackageID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`PackageID`),
  ADD KEY `packages_ibfk_1` (`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `reports_ibfk_1` (`Report_by`),
  ADD KEY `reports_ibfk_2` (`Report_to`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `coveragemaps`
--
ALTER TABLE `coveragemaps`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
