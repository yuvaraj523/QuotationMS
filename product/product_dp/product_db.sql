-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 06:13 PM
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
-- Database: `product_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `s.no` int(11) NOT NULL,
  `product_image` varchar(225) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_description` text NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `price_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `s.no`, `product_image`, `product_name`, `product_description`, `product_category`, `keyword`, `price_amount`) VALUES
(11, 0, 'undraw_portfolio_feedback_6r17.svg', 'muruga', 'vvv', 'cri', 'mvs', 10000.00),
(12, 0, 'undraw_portfolio_feedback_6r17.svg', 'muruga', 'mmm', 'flowmore', 'pumps', 1000000.00),
(13, 0, 'undraw_mobile_web_-2-g8b.svg', 'muruga', 'vvv', 'general', 'pumps', 1245.00),
(14, 0, 'undraw_drone_surveillance_kjjg.svg', 'muruga', 'mmm', 'flowmore', 'p', 1000000.00),
(23, 0, 'undraw_drone_surveillance_kjjg.svg', 'muruga', 'vvv', 'flowmore', 'hjpi', 23456.00),
(24, 0, 'undraw_website_ij0l.png', 'velava', 'mmm', 'cri', 'p', 100.00),
(44, 0, 'undraw_portfolio_feedback_6r17.svg', 'muruga', 'vel', 'cri', 'pumps', 10000.00),
(46, 0, 'undraw_portfolio_feedback_6r17.svg', 'muruga', 'vel mmmm', 'cri', 'pumps', 10000.00),
(47, 0, 'undraw_undraw_undraw_undraw_undraw_undraw_undraw_undraw_undraw_undraw_undraw_selectoption_y9cm_mx7w_-2-_vjsk_js62_gghb_35qw_um1m_-1-_cqnl_5lof_-1-_4dfu_-1-_et2a.svg', 'muruga', 'vvv', 'cri', 'pumps', 10000.00),
(48, 0, 'download.png', 'muruga', 'vel mmmm', 'cri', 'pumps', 10000.00),
(52, 0, 'undraw_mobile_testing_re_w7yb.svg', 'yuva', 'fghjkl', 'cri', 'p', 100.00),
(53, 0, 'undraw_Login_re_4vu2.png', 'dfghjkl', '123', 'general', 'hjkl;\'', 1000.00),
(54, 0, 'undraw_portfolio_feedback_6r17.svg', 'muruga', 'mmm', 'cri', 'vel', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'Admin@gmail.com', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `site_title` varchar(225) NOT NULL,
  `admin_email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
