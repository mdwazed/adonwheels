-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2018 at 10:19 AM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adonwhee_maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_request`
--

CREATE TABLE `ad_request` (
  `req_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `from_month` char(10) CHARACTER SET utf8 NOT NULL,
  `contract_signed_on` date DEFAULT NULL,
  `pending` tinyint(1) NOT NULL DEFAULT '1',
  `admin_remarks` text CHARACTER SET utf8,
  `requested_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_request`
--

INSERT INTO `ad_request` (`req_id`, `car_id`, `owner_id`, `requester_id`, `from_month`, `contract_signed_on`, `pending`, `admin_remarks`, `requested_on`) VALUES
(13, 70, 16, 12, '', NULL, 1, '', '2017-09-27 18:47:17'),
(14, 73, 30, 10, '', NULL, 1, NULL, '2017-09-27 19:06:48'),
(15, 63, 10, 10, '', NULL, 1, NULL, '2017-09-28 03:07:11'),
(16, 73, 30, 12, '', NULL, 1, NULL, '2017-09-28 16:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `owner_id` char(10) NOT NULL,
  `car_model` char(50) NOT NULL,
  `car_make` char(50) NOT NULL,
  `car_make_year` char(50) NOT NULL,
  `car_color` char(20) NOT NULL,
  `car_location` char(255) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `reg_number` char(50) NOT NULL,
  `space_door` char(50) NOT NULL,
  `space_rear` char(50) NOT NULL,
  `min_price` int(11) NOT NULL,
  `parking_day` char(50) NOT NULL,
  `parking_night` char(50) NOT NULL,
  `day_run` int(11) NOT NULL,
  `week_run` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `owner_id`, `car_model`, `car_make`, `car_make_year`, `car_color`, `car_location`, `longitude`, `latitude`, `reg_number`, `space_door`, `space_rear`, `min_price`, `parking_day`, `parking_night`, `day_run`, `week_run`, `added_on`) VALUES
(63, '10', 'honda insight', 'toyota', '2005', 'white', 'Darmstadt, Germany', 8.65119, 49.8728, '175908', '900', '3600', 40, 'road_side', 'road_side', 50, 300, '2017-09-27 13:47:30'),
(67, '11', 'toyota corolla', 'toyota_lexas', '2017', 'red', 'Darmstadt, Germany', 8.65119, 49.8728, '8636484', '900', '200', 100, 'garrage', 'garrage', 50, 100, '2017-09-27 13:47:30'),
(70, '16', 'Toyota corolla', 'Toyota', '1998', 'brown', 'Frankfurt, Germany', 8.68213, 50.1109, '8636484', '900', '200', 40, 'garrage', 'garrage', 400, 1000, '2017-09-27 13:47:30'),
(71, '21', 'Toyota avalon', 'toyota', '2016', 'silver', 'Dieburg, Germany', 8.8445, 49.9011, '000999000', '900', '3600', 100, 'garrage', 'garrage', 100, 400, '2017-09-27 13:47:30'),
(72, '29', 'Honda oddessey', 'Honda', '2016', 'grey', 'Dieburg, Germany', 8.8445, 49.9011, '175908', '900', '3600', 40, 'garrage', 'garrage', 200, 1000, '2017-09-27 13:47:30'),
(73, '30', 'Chevy travarse', 'Chevrolet', '2009', 'black', 'Fort Leavenworth, Leavenworth, KS, United States', -94.9201, 39.3616, '175908', '900', '3600', 100, 'garrage', 'garrage', 100, 400, '2017-09-27 13:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `id` int(11) NOT NULL,
  `owner_id` char(10) NOT NULL,
  `image_name` char(20) NOT NULL,
  `remarks` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`id`, `owner_id`, `image_name`, `remarks`) VALUES
(5, '10', '10sQXvO.jpg', 'no remarks'),
(6, '10', '10xwnel.png', 'no remarks'),
(7, '10', '10MOqir.jpg', 'no remarks'),
(8, '11', '112izfr.jpg', 'no remarks'),
(9, '11', '11Swq2E.png', 'no remarks'),
(10, '16', '167XBt8.jpg', 'no remarks'),
(11, '16', '166HE3m.png', 'no remarks');

-- --------------------------------------------------------

--
-- Table structure for table `sticker_on_car`
--

CREATE TABLE `sticker_on_car` (
  `id` int(11) NOT NULL,
  `car_owner_id` char(10) NOT NULL,
  `no_of_sticker` tinyint(4) NOT NULL,
  `place_of_sticker` varchar(20) NOT NULL,
  `height_of_sticker` smallint(6) NOT NULL,
  `width_of_sticker` smallint(6) NOT NULL,
  `unit_price_of_sticker` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sticker_on_car`
--

INSERT INTO `sticker_on_car` (`id`, `car_owner_id`, `no_of_sticker`, `place_of_sticker`, `height_of_sticker`, `width_of_sticker`, `unit_price_of_sticker`) VALUES
(40, '10', 1, 'Front', 10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `last_name` char(50) NOT NULL,
  `first_name` char(50) NOT NULL,
  `user_email` char(50) NOT NULL,
  `password` char(40) NOT NULL,
  `user_address` char(255) NOT NULL,
  `user_city` char(50) NOT NULL,
  `country` char(50) NOT NULL,
  `user_zip` char(10) NOT NULL,
  `user_tel` char(20) NOT NULL,
  `user_type` char(2) NOT NULL,
  `activation_code` char(20) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `registered_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `user_email`, `password`, `user_address`, `user_city`, `country`, `user_zip`, `user_tel`, `user_type`, `activation_code`, `email_verified`, `registered_on`) VALUES
(10, 'Ali', 'Mohammad Wazed', 'mdwazed@abc.com', '827ccb0eea8a706c4c34a16891f84e7b', '31/6, shahibag, Savar', 'Dhaka', 'Bangladesh', '1340', '12345678', '1', NULL, 1, '2017-09-27 13:46:23'),
(11, 'provider', 'vehicle', 'car_provider@abc.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Esselborn str 6', 'Darmstadt', 'germany', '64289', '', '', NULL, 0, '2017-09-27 13:46:23'),
(12, 'advertiser', 'no first name', 'advertiser@abc.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Esselborn str 6', 'Darmstadt', 'Germany', '64289', '123456', '2', NULL, 1, '2017-09-27 13:46:23'),
(15, 'wazed', 'Aleeza', 'aleeza@abc.com', '827ccb0eea8a706c4c34a16891f84e7b', '4th artillery rd, fort leavenworth', 'leavenworth', 'usa', '66027', '1234567890', '1', NULL, 1, '2017-09-27 13:46:23'),
(16, 'tabassum', 'tasnuva', 'tabassum@abc.com', '827ccb0eea8a706c4c34a16891f84e7b', '804, 4th arty rd, fort leavenworth', 'leavenworth', 'United States', '66027', '7665645465', '1', NULL, 0, '2017-09-27 13:46:23'),
(30, 'Früchtenicht', 'Harald', 'harald.fruechtenicht@googlemail.com', 'e70a43a8662381c3b9f76cd95a27d52c', '23 zuckar st', 'Deiburg', 'Germany', '64807', '12345678', '1', NULL, 1, '2017-09-27 13:46:23'),
(31, 'Admin', 'Admin', 'admin@abc.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Esselborn str 6', 'Darmstadt', 'Germany', '12345', '12345678', '3', NULL, 1, '2017-09-27 16:08:48'),
(36, 'Ali', 'Mohammad Wazed', 'mdwazed@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '31/6, shahibag, Savar', 'Dhaka', 'Bangladesh', '1340', '01769009009', '1', 'q1PO9Xxc3knCN5m8', 1, '2017-09-28 19:14:58'),
(41, 'Ali', 'Mohammad', 'mdwazed@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Esselborn str 6', 'Darmstadt', 'Germany', '64289', '+4915774086763', '1', 'g0dDeh8lB3k9AqxE', 1, '2018-04-16 02:58:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_request`
--
ALTER TABLE `ad_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sticker_on_car`
--
ALTER TABLE `sticker_on_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_request`
--
ALTER TABLE `ad_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sticker_on_car`
--
ALTER TABLE `sticker_on_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
