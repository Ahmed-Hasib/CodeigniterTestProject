-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 06:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `entry_date`) VALUES
(32, 'Apple', '2023-04-02 21:48:41'),
(33, 'Google', '2023-04-02 21:48:49'),
(34, 'Samsung', '2023-04-02 22:09:27'),
(35, 'Microsoft', '2023-04-02 22:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `brand_id`, `model_id`, `name`, `entry_date`) VALUES
(26, 32, 24, 'Iphone4s', '2023-04-02 22:11:47'),
(27, 32, 24, 'Iphone5s', '2023-04-02 22:11:58'),
(28, 32, 25, 'AppleWatchPro', '2023-04-02 22:12:18'),
(29, 32, 26, 'MacbookPro2022', '2023-04-02 22:12:36'),
(30, 33, 27, 'GooglePixel3', '2023-04-02 22:12:50'),
(31, 33, 28, 'GoogleWatch', '2023-04-02 22:13:09'),
(32, 34, 30, 'SamsungGalaxyS8', '2023-04-02 22:13:26'),
(33, 34, 29, 'Note20Ultra5G', '2023-04-02 22:13:46'),
(34, 35, 31, 'NewStudio2022', '2023-04-02 22:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `name`, `entry_date`) VALUES
(24, 32, 'Iphone', '2023-04-02 22:09:39'),
(25, 32, 'Watch', '2023-04-02 22:09:48'),
(26, 32, 'Macbook', '2023-04-02 22:09:58'),
(27, 33, 'SmartPhone', '2023-04-02 22:10:13'),
(28, 33, 'Gwatch', '2023-04-02 22:10:25'),
(29, 32, 'NoteSeries', '2023-04-02 22:10:50'),
(30, 34, 'Galaxy', '2023-04-02 22:11:03'),
(31, 35, 'MicrosoftStudio', '2023-04-02 22:23:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
