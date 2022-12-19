-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 04:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dryport`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_container`
--

CREATE TABLE `tb_container` (
  `id` int(11) NOT NULL,
  `cn_number` varchar(11) NOT NULL,
  `size` int(3) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_container`
--

INSERT INTO `tb_container` (`id`, `cn_number`, `size`, `type`, `date`) VALUES
(5, 'COAU1234567', 20, 'Dry', '2022-12-16 01:10:00'),
(9, 'MEAU1234567', 40, 'Reefer', '2022-12-16 22:02:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_container`
--
ALTER TABLE `tb_container`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cn_number` (`cn_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_container`
--
ALTER TABLE `tb_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
