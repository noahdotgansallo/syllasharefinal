-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2013 at 01:21 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `syllasharenew`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classid`, `userid`) VALUES
(1, 1, 2),
(2, 8, 2),
(3, 2, 2),
(4, 22, 2),
(5, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
(1, 'Comparative Cultures'),
(2, 'Physics'),
(3, 'Greek I'),
(4, 'Greek II'),
(5, 'Greek III'),
(6, 'Greek IV'),
(7, 'Spanish I'),
(8, 'Spanish II'),
(9, 'Spanish III'),
(10, 'Spanish IV'),
(11, 'Spanish V'),
(12, 'Algebra II/Trigonometry Adv'),
(13, 'Geometry'),
(14, 'Geometry Accelerated'),
(15, 'Senior Studio'),
(16, 'Latin I'),
(17, 'Latin II'),
(18, 'Latin III'),
(19, 'Latin IV'),
(20, 'Latin V'),
(21, 'Latin History'),
(22, 'English 9'),
(23, 'English 10'),
(24, 'English 11'),
(25, 'English 12'),
(26, 'Ancient and Medieval Civilizations'),
(27, 'United States History'),
(28, 'Europe and the World'),
(29, 'Intermediate Algebra'),
(30, 'Algebra II'),
(31, 'Functions and Trigonometry'),
(32, 'Precalculus'),
(33, 'Differential Calculus'),
(34, 'Calculus'),
(35, 'Integral Calculus'),
(36, 'French I'),
(37, 'French II'),
(38, 'French III'),
(39, 'French IV'),
(40, 'French V'),
(41, 'Biology'),
(42, 'Chemistry'),
(43, 'Advanced Chemistry'),
(44, 'Advanced Physics'),
(45, 'Advanced Biology'),
(46, 'Environmental Science'),
(47, 'World Religions');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poster` int(11) NOT NULL,
  `pageid` int(11) NOT NULL,
  `content` varchar(600) DEFAULT NULL,
  `timeposted` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `poster`, `pageid`, `content`, `timeposted`) VALUES
(1, 2, 1, 'hey', '2013-11-30 12:53:30'),
(2, 2, 1, 'fdsa', '2013-11-30 13:06:08'),
(3, 2, 1, 'asdf', '2013-11-30 13:06:36'),
(4, 2, 1, 'fdsa', '2013-11-30 13:06:46'),
(5, 2, 1, 'asdfdsa', '2013-11-30 13:07:12'),
(6, 2, 1, 'asdfdsa', '2013-11-30 13:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(36) NOT NULL,
  `activated` int(1) NOT NULL DEFAULT '0',
  `code` int(8) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `activated`, `code`, `grade`) VALUES
(2, 'Elliot', 'Anderson', 'anderson.elliot3@gmail.com', 'f57feec6a5efe1485742caee367967a7', 1, 67652201, 9);
