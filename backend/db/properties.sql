-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 08:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p4_product_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `bed` int(11) NOT NULL,
  `bath` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `type`, `name`, `price`, `bed`, `bath`, `city`, `img`) VALUES
(6, 'Trailer', 'Wander Home', 650, 1, 1, 'Auburn', 'tr1.jpg'),
(7, 'Trailer', 'Trailblazer', 670, 1, 1, 'Auburn', 'tr2.jpg'),
(8, 'Trailer', 'The Roaming', 550, 0, 1, 'Auburn', 'tr3.jpg'),
(9, 'Trailer', 'Nest', 630, 1, 1, 'Buford', 'tr4.jpg'),
(10, 'Trailer', 'Nomadic Haven', 800, 2, 1, 'Buford', 'tr5.jpg'),
(11, 'Townhouse', 'Preserve at Buford', 2500, 4, 3, 'Buford', 't1.jpg'),
(12, 'Townhouse', 'Station 85', 2100, 3, 2, 'Atlanta', 't2.jpg'),
(13, 'Townhouse', 'Town Ponce', 2300, 4, 2, 'Atlanta', 't3.jpg'),
(14, 'Townhouse', 'The Ivy Cross', 3600, 5, 4, 'Atlanta', 't4.jpg'),
(15, 'Townhouse', 'Outlook Auburn', 2100, 3, 2, 'Auburn', 't5.jpg'),
(16, 'Apartment', 'Auburn Flats', 1200, 1, 1, 'Auburn', 'a1.jpg'),
(17, 'Apartment', 'Wind Village', 1150, 0, 1, 'Buford', 'a2.jpg'),
(18, 'Apartment', 'The Greens', 1200, 2, 1, 'Auburn', 'a3.jpg'),
(19, 'Apartment', 'The Mark', 1300, 2, 2, 'Atlanta', 'a4.jpg'),
(20, 'Apartment', 'Together', 1000, 3, 2, 'Atlanta', 'a5.jpg'),
(21, 'Apartment', 'The Mark', 1500, 0, 1, 'Atlanta', 'a4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
