-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2015 at 05:57 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php-simple-blog`
--
CREATE DATABASE IF NOT EXISTS `php-simple-blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `php-simple-blog`;

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
`id` int(11) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `key`, `value`) VALUES
(1, 'title', '%author%''s Blog'),
(2, 'lang', 'en-US'),
(3, 'keywords', 'blog'),
(4, 'description', '%author%''s blog'),
(5, 'author', 'Default'),
(6, 'header_background', 'SeaGreen'),
(7, 'header_font', ''),
(8, 'header_font_size', ''),
(9, 'panel_background', 'Tan'),
(10, 'content_background', ''),
(11, 'page_background', 'beige'),
(12, 'footer_background', 'SeaGreen'),
(13, 'footer_font', ''),
(14, 'footer_font_size', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`), ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
