-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 03:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programming`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_explorer`
--

CREATE TABLE `file_explorer` (
  `id` int(11) NOT NULL,
  `filename` varchar(80) NOT NULL,
  `encryption_key` varchar(80) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_explorer`
--

INSERT INTO `file_explorer` (`id`, `filename`, `encryption_key`, `created_at`) VALUES
(9, '1667633424php.jpg', '123', '2022-11-05 15:30:24'),
(11, '1667638044note_icon2.png', '123', '2022-11-05 16:47:24'),
(12, '1667638062sample.txt', '123', '2022-11-05 16:47:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_explorer`
--
ALTER TABLE `file_explorer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_explorer`
--
ALTER TABLE `file_explorer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
