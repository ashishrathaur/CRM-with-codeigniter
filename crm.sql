-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2019 at 04:58 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `email`) VALUES
(1, 'ashish', '12345678', 'ashishr@zopsoft.com');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceId` int(11) NOT NULL,
  `serviceName` varchar(100) NOT NULL,
  `serviceValidity` varchar(100) NOT NULL,
  `serviceAmount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `serviceName`, `serviceValidity`, `serviceAmount`) VALUES
(3, 'Domain', '2 Year', '10000'),
(4, 'Hosting', '', ''),
(5, 'Accounts', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `subscriberName` varchar(100) NOT NULL,
  `subscriberPhone` varchar(100) NOT NULL,
  `subscriberEmail` varchar(100) NOT NULL,
  `subscriberAddress` text NOT NULL,
  `productId` int(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productValidity` varchar(100) NOT NULL,
  `productAmount` varchar(150) NOT NULL,
  `subscriptionDate` varchar(100) NOT NULL,
  `renewalsDate` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pay_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `user_id`, `subscriberName`, `subscriberPhone`, `subscriberEmail`, `subscriberAddress`, `productId`, `productName`, `productValidity`, `productAmount`, `subscriptionDate`, `renewalsDate`, `status`, `pay_status`) VALUES
(26, 11, 'Rahul', '9919791238', 'ashishr@gmail.com', 'Palam Vihar', 4, 'Hosting', '2 month', '12000', '1549670400', '1552089600', 'Active', 'Paid'),
(27, 12, 'Ashish R', '9876543210', 'ashishr@zopsoft.com', 'Rajpur', 5, 'Accounts', '2 month', '1200', '1550188800', '1555286400', 'Active', 'Paid'),
(28, 13, 'Gagan koli', '9876543210', 'ggn@zopsoft.com', 'Delhi', 4, 'Hosting', '2 month', '12000', '1550016000', '1555113600', 'Active', 'Paid'),
(29, 13, 'Gagan koli', '9876543210', 'ggn@zopsoft.com', 'Delhi', 5, 'Accounts', '3 month', '12000', '1549929600', '1557619200', 'Active', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `phone`, `user_email`, `password`, `address`, `regDate`) VALUES
(11, 'Rahul', '9919791238', 'ashishr@gmail.com', '12345678', 'Palam Vihar', '2019-02-07 07:21:07'),
(12, 'Ashish R', '9876543210', 'ashishr@zopsoft.com', '123456789', 'Rajpur', '2019-02-08 11:22:38'),
(13, 'Gagan koli', '9876543210', 'ggn@zopsoft.com', '123456789', 'Delhi', '2019-02-08 11:23:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
