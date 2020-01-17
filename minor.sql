-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2020 at 07:47 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minor`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(15) NOT NULL,
  `u_lname` varchar(15) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_password`) VALUES
(18, 'Vaibhav', 'Patil', 'vnpatil@gmail.com', '$2y$10$TT8Lnq4s2CeWdqVX/5PVCOtesAsOzwxWkA2ydq4nRwKfmefrwerFu'),
(19, 'Hrushikesh', 'Dolas', 'hsdolas1@gmail.com', '$2y$10$mPtFKPGubkffEK/dinGBN.MOidwPnMfxr/XV9nJSat53TiarfpJqS'),
(20, 'suvarna', 'dolas', 'ssdolas@gmail.com', '$2y$10$FRkjE1RdHhTKPmIAIm8aIO4W0.1Bow78/arSctrJyuL5t79phRbQ.'),
(21, 'add', 'ask', 'aasdfsd@afs.adf', '$2y$10$IS/iyZ/E/zhDmhGJE3G/Lu2qM9HZdplgUg5wHurzmQGDFEGM4H252'),
(22, 'a', 'a', 'a@a.a', '$2y$10$XIVVPVf3zZc3PbrPL4sUZ.3azcp96PCXVqSozyslluCE/KqZJNz3W'),
(23, 'asd', 'asd', 'ads@gmail.com', '$2y$10$O6zSvbX0knL58h6dN5MKEOEXpUhGvpBLgmk9uX2iUpl8jVWPu/vnq'),
(24, 'asd', 'asdf', 'aa@aa.aa', '$2y$10$Lzd7Eq8bQxMot9lf7X6kdeOhVpF9tcypw2ibq5bUi.E2e4hgysTwi'),
(25, 'f', 'f', 'g@c.j', '$2y$10$LL2GueOTPHN2gV0JrfglK.RF2woNODRI3K5X6ILVeA7UaAI1armIW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
