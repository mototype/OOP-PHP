-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 10:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `client`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `first_name`, `second_name`, `last_name`, `note`, `email`, `is_active`) VALUES
(1, 'Martin', 'Angelov', 'Petkov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae diam non purus consequat pharetra. Mauris non rutrum dolor, quis laoreet nisi. Vestibulum fringilla, metus at iaculis malesuada, purus nulla euismod ipsum, eu fermentum tortor lorem vel elit. Cras venenatis, ipsum maximus sollicitudin porta, odio orci venenatis tortor, eu aliquet libero risus eget nisl. Vestibulum ornare neque nec elit venenatis semper. Cras in libero quis urna aliquet tempor ac ornare urna. Maecenas id enim facilisis, posuere erat quis, mattis est. Nulla tincidunt velit sed augue feugiat pulvinar.', 'mt.petkov@yahoo.com', 1),
(2, 'Georgi', '', 'Linkov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae diam non purus consequat pharetra. Mauris non rutrum dolor, quis laoreet nisi. Vestibulum fringilla, metus at iaculis malesuada, purus nulla euismod ipsum, eu fermentum tortor lorem vel elit. Cras venenatis, ipsum maximus sollicitudin porta, odio orci venenatis tortor, eu aliquet libero risus eget nisl. Vestibulum ornare neque nec elit venenatis semper. Cras in libero quis urna aliquet tempor ac ornare urna. Maecenas id enim facilisis, posuere erat quis, mattis est. Nulla tincidunt velit sed augue feugiat pulvinar.', 'georgi.linkov@studiox.bg', 1),
(3, 'Deian', '', 'Petkov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae diam non purus consequat pharetra. Mauris non rutrum dolor, quis laoreet nisi. Vestibulum fringilla, metus at iaculis malesuada, purus nulla euismod ipsum, eu fermentum tortor lorem vel elit. Cras venenatis, ipsum maximus sollicitudin porta, odio orci venenatis tortor, eu aliquet libero risus eget nisl. Vestibulum ornare neque nec elit venenatis semper. Cras in libero quis urna aliquet tempor ac ornare urna. Maecenas id enim facilisis, posuere erat quis, mattis est. Nulla tincidunt velit sed augue feugiat pulvinar.', 'deian.petkov@studiox.bg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `is_active` (`is_active`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
