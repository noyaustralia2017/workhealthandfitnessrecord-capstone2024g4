-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2024 at 11:55 AM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workheal_wp_7tsei`
--

-- --------------------------------------------------------

--
-- Table structure for table `seminar_preprod2`
--

CREATE TABLE `seminar_preprod2` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sem_date` date NOT NULL,
  `course` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seminar_preprod2`
--

INSERT INTO `seminar_preprod2` (`id`, `user_id`, `sem_date`, `course`) VALUES
(1, 3, '2024-03-11', 'Smoke Free'),
(2, 3, '2024-03-05', 'Manual Handling'),
(3, 4, '2024-01-31', 'Smoke Free'),
(4, 3, '2024-03-29', 'Integral Training');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seminar_preprod2`
--
ALTER TABLE `seminar_preprod2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seminar_preprod2`
--
ALTER TABLE `seminar_preprod2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
