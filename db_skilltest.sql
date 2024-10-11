-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 11:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skilltest`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_date_created` date NOT NULL,
  `company_business` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_date_created`, `company_business`) VALUES
(2, 'AutoStore AS', '1996-01-01', 'Automated Warehousing solutions'),
(3, 'Cegal AS', '2005-01-01', 'Software, design, marketing'),
(5, 'APPEX', '2011-01-01', 'Software, design, marketing'),
(6, 'EDx AS', '2012-02-01', 'Online training'),
(7, 'Mc Donalds AS', '2019-08-02', 'Resturant and Fast Food'),
(8, 'New Horizon', '2024-10-10', 'Event Management and Catering'),
(9, 'Haugesund Bibliotek ', '2017-06-09', 'Library'),
(10, 'NAV', '1980-01-01', 'State Welfare Agency'),
(11, 'Staten Vegvesen', '1980-01-01', 'State Traffic Agency'),
(12, 'Sabi Sushi', '2024-10-09', 'Resturant and Fast Food'),
(15, 'Bento Sushi', '2021-09-06', 'Food'),
(18, 'Mobile Tech LLC', '2024-10-03', 'Mobile Repairing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_joining_date` date NOT NULL,
  `company_id` int(11) NOT NULL COMMENT 'foreign key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='employee details child table';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_joining_date`, `company_id`) VALUES
(2, 'Jane Doenalds @ Auto Store', '2023-10-18', 2),
(11, 'John@Bibliotek', '2019-05-09', 9),
(12, 'Jane@Bibliotek', '2016-06-09', 9),
(13, 'Jason@AutoStore', '2024-10-02', 2),
(17, 'Jason Doe', '2024-10-23', 18);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2801;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
