-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 22, 2018 at 12:51 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nico_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `authorId` varchar(255) NOT NULL,
  `article_title` text NOT NULL,
  `article_full_text` text NOT NULL,
  `article_created_date` varchar(255) NOT NULL,
  `article_last_update` varchar(255) NOT NULL,
  `article_display` varchar(255) NOT NULL,
  `article_order` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`authorId`, `article_title`, `article_full_text`, `article_created_date`, `article_last_update`, `article_display`, `article_order`) VALUES
('john', 'Hello world', '<p>Hello this is my article ;)</p>', '2018-12-21', '2018-12-21', 'yes', 'order'),
('john', 'this is my third article', '<p>Notice this <b>Bold </b>text and this <i>italic </i>one</p>', '2018-12-23', '2018-12-23', 'yes', 'order'),
('agnes', 'Shakesphere', '<p>To <u><b>be </b></u>or not to be</p>', '2018-12-20', '2018-12-20', 'yes', 'order');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` varchar(255) NOT NULL,
  `Full_Name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_Number` varchar(255) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `UserType` varchar(255) NOT NULL,
  `AccessTime` varchar(255) NOT NULL,
  `profile_Image` text NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `Full_Name`, `email`, `phone_Number`, `User_Name`, `Password`, `UserType`, `AccessTime`, `profile_Image`, `Address`) VALUES
('00001', 'Nicodemus Opon', 'root@gmail.com', '0727584688', 'root', '123', 'super_user', '100', 'profile.png', 'Nairobi, Kenya'),
('56895', 'mark doe', 'mark@gmail.com', '707584688', 'mark', '123', 'admin', '100', 'profile.png', 'Nairobi, Kenya'),
('34983', 'john doe mwangi', 'john@gmail.com', '0723573456', 'john', '123', 'author', '100', 'profile.png', 'nairobi west'),
('73919', 'jane otieno', 'jotieno@gmail.com', '0733445566', 'jane', '123', 'admin', '100', 'profile.png', 'Nakuru'),
('52764', 'agnes chitira', 'achitira@gmail.com', '07654534', 'agnes', '123', 'author', '100', 'profile.png', 'Nairobi, Kenya');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
