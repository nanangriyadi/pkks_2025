-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2025 at 03:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkks-2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `description` text NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int NOT NULL,
  `file_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `file_path` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `file_type` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `file_category` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'pdf',
  `is_pdf` tinyint NOT NULL,
  `is_video` tinyint NOT NULL,
  `file_size` int NOT NULL,
  `description` text COLLATE latin1_general_ci,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `file_name`, `file_path`, `file_type`, `file_category`, `is_pdf`, `is_video`, `file_size`, `description`, `uploaded_at`) VALUES
(4, '1742420839_05d66a055926c5a75112.pdf', 'uploads/portfolios/1742420839_05d66a055926c5a75112.pdf', 'application/pdf', 'pdf', 0, 0, 84737, 'asakjsansansjansjkasjanskasjkasajksjkasaasasasasa', '2025-03-19 14:47:19'),
(6, '1742498954_ed11688d3543f2ba6bbd.pdf', 'uploads/portfolios/1742498954_ed11688d3543f2ba6bbd.pdf', 'application/pdf', 'pdf', 0, 0, 698096, 'aasasa', '2025-03-20 12:29:14'),
(7, '1742500347_0f87374f6665bca4978d.mp4', 'uploads/portfolios/1742500347_0f87374f6665bca4978d.mp4', 'video/mp4', 'pdf', 0, 0, 1310191, 'qwqwq', '2025-03-20 12:52:27'),
(8, '1742621352_487f5aa26e9f3804c2de.pdf', 'uploads/portfolios/1742621352_487f5aa26e9f3804c2de.pdf', 'application/pdf', 'pdf', 0, 0, 82502, 'xsasdasdas', '2025-03-21 22:29:12'),
(12, '1742657646_ea61bc3ccd658aa5990d.pdf', 'uploads/1742657646_ea61bc3ccd658aa5990d.pdf', 'application/pdf', 'pdf', 0, 0, 189, 'puguh', '2025-03-22 08:34:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
