-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 11:57 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qwpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applybuyerrequest`
--

CREATE TABLE `applybuyerrequest` (
  `applyRequest_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `budget` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `buyerRequest_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyerrequest`
--

CREATE TABLE `buyerrequest` (
  `buyerRequest_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `serviceCategory_name` varchar(20) NOT NULL,
  `service_name` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `budget` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `payment_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `complete_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_price` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `gig_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `serviceCategory_name` varchar(200) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `gig_title` varchar(200) NOT NULL,
  `gig_description` varchar(10) NOT NULL,
  `gig_price` int(10) NOT NULL,
  `gig_duration` int(10) NOT NULL,
  `gig_picture` longtext NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `user_id` int(11) NOT NULL,
  `language` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `order_price` int(10) NOT NULL,
  `order_duration` int(10) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `complete_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `buyer_id` int(10) NOT NULL,
  `freelancer_id` int(10) NOT NULL,
  `gig_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servicecategories`
--

CREATE TABLE `servicecategories` (
  `serviceCategory_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `serviceCategory_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `serviceCategory_id` int(11) NOT NULL,
  `service_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `user_id` int(11) NOT NULL,
  `skill` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `profile_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `picture` longtext,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `applybuyerrequest`
--
ALTER TABLE `applybuyerrequest`
  ADD KEY `buyerRequest_id` (`buyerRequest_id`),
  ADD KEY `freelancer_id` (`freelancer_id`);

--
-- Indexes for table `buyerrequest`
--
ALTER TABLE `buyerrequest`
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `freelancer_id` (`freelancer_id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`user_id`,`language`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `freelancer_id` (`freelancer_id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `gig_id` (`gig_id`);

--
-- Indexes for table `servicecategories`
--
ALTER TABLE `servicecategories`
  ADD UNIQUE KEY `serviceCategory_name` (`serviceCategory_name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD UNIQUE KEY `service_name` (`service_name`),
  ADD KEY `serviceCategory_id` (`serviceCategory_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`user_id`,`skill`);

--
-- Indexes for table `user`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD KEY `user_id` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applybuyerrequest`
--
ALTER TABLE `applybuyerrequest`
  ADD CONSTRAINT `applybuyerrequest_ibfk_1` FOREIGN KEY (`buyerRequest_id`) REFERENCES `buyerrequest` (`buyerRequest_id`),
  ADD CONSTRAINT `applybuyerrequest_ibfk_2` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `buyerrequest`
--
ALTER TABLE `buyerrequest`
  ADD CONSTRAINT `buyerrequest_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `earnings`
--
ALTER TABLE `earnings`
  ADD CONSTRAINT `earnings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `earnings_ibfk_2` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `gigs`
--
ALTER TABLE `gigs`
  ADD CONSTRAINT `gigs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `language_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`gig_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`serviceCategory_id`) REFERENCES `servicecategories` (`serviceCategory_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
