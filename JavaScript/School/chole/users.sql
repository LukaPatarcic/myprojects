-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2016 at 07:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=130 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `position`, `salary`) VALUES
(1, 'Billy Silly', 'programmer', 10006),
(2, 'Kate Bush', 'programmer', 10004),
(3, 'Marcus Katowize', 'admin', 100054),
(4, 'Ivan Kozacev', 'project manager', 100),
(5, 'Marko Markowich', 'boss', 1000),
(6, 'Markos Baikso', 'programmer', 1000),
(7, 'Dark Angel', 'programmer', 1000),
(8, 'John Smith', 'programmer', 1000),
(9, 'vts', 'it manager', 1000),
(10, 'Big monster', 'boss', 1000),
(11, 'Big monster', 'boss', 1000),
(28, 'vts6', 'boss', 1000),
(29, 'vts6', 'boss', 1000),
(30, 'vts6', 'boss', 1000),
(74, 'mar', 'admin', 0),
(75, 'VTS VTS', 'programmer', 0),
(76, 'VTS VTS', 'programmer', 0),
(77, 'VTS VTS', 'programmer', 0),
(78, 'VTS VTS', 'programmer', 0),
(79, 'VTS VTS', 'programmer', 0),
(80, 'VTS VTS', 'programmer', 0),
(81, 'VTS VTS', 'programmer', 0),
(82, 'VTS VTS', 'programmer', 0),
(83, 'VTS VTS', 'programmer', 0),
(84, 'VTS VTS', 'programmer', 0),
(85, 'VTS VTS', 'programmer', 0),
(86, 'VTS VTS', 'programmer', 0),
(87, 'VTS VTS', 'programmer', 0),
(88, 'VTS VTS', 'programmer', 0),
(89, 'VTS VTS', 'programmer', 0),
(90, 'VTS VTS', 'programmer', 0),
(91, 'VTS VTS', 'programmer', 0),
(92, 'vts', 'vts', 0),
(93, 'vts', 'vts', 0),
(94, 'vts', 'vts', 0),
(95, 'vts', 'vts', 0),
(96, 'vts', 'vts', 0),
(97, 'vts', 'vts', 0),
(98, 'vts', 'vts', 0),
(99, 'vts', 'vts', 0),
(100, 'vts', 'vts', 0),
(101, 'vts', 'vts', 0),
(102, 'vts', 'vts', 0),
(103, 'vts', 'vts', 0),
(104, 'vts', 'vts', 0),
(105, 'vts', 'vts', 0),
(106, 'vts', 'vts', 0),
(107, 'nikola', 'nikola', 0),
(108, 'nikola', 'nikola', 0),
(109, 'nikola', 'nikola', 0),
(110, 'nikola', 'nikola', 0),
(111, 'nikola', 'nikola', 0),
(112, 'nikola', 'nikola', 0),
(113, 'nikola', 'nikola', 0),
(114, 'nikola', 'nikola', 0),
(115, 'nikola', 'nikola', 0),
(116, 'nikola', 'nikola', 0),
(117, 'nikola', 'nikola', 0),
(118, 'nikola', 'nikola', 0),
(119, 'nikola', 'nikola', 0),
(120, 'nikola', 'nikola', 0),
(121, 'nikola', 'nikola', 0),
(122, 'vts', 'vts', 0),
(123, '12', '22', 0),
(124, '12', '22', 0),
(125, '12', '22', 0),
(126, '12', '22', 0),
(127, '1', '1', 0),
(128, '4', '455', 0),
(129, 'ee', 'ee', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
