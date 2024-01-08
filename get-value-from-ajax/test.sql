-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 08:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`) VALUES
(1, 'Bogura'),
(2, 'Dinajpur'),
(3, 'Rangpur'),
(4, 'Magura'),
(5, 'Jossor'),
(6, 'Dhaka'),
(7, 'Pabna'),
(8, 'Sylhet'),
(9, 'Noakhali'),
(10, 'Chattogram'),
(11, 'Potuakhali'),
(12, 'Gazipur'),
(13, 'VOla');

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `pin_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `city_id`, `pin_code`) VALUES
(4, 1, '12345'),
(5, 1, '12345'),
(6, 2, '1234'),
(7, 3, '123'),
(8, 4, '123456'),
(9, 1, '12345'),
(10, 2, '1234'),
(11, 3, '123'),
(12, 4, '6666'),
(13, 5, '4445'),
(14, 6, '1905'),
(15, 7, '1805'),
(16, 8, '1705'),
(17, 9, '1505'),
(18, 10, '1305'),
(19, 11, '1205'),
(20, 12, '123454556');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `age` int(11) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_name`, `phone_no`, `age`, `date_of_birth`) VALUES
(1, 'Rasheda', '077264764', 20, '2024-01-09'),
(2, 'tyyrwur', '975483658', 48, '2024-01-26'),
(3, 'Rasheda', '975483658', 20, '2024-01-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD CONSTRAINT `pincodes_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
