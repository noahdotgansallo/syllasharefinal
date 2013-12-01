-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2013 at 08:03 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `class`;
DROP TABLE IF EXISTS `classes`;
DROP TABLE IF EXISTS `down`;
DROP TABLE IF EXISTS `forumcomment`;
DROP TABLE IF EXISTS `forumposts`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `up`;
DROP TABLE IF EXISTS `users`;
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
-- Table structure for table `down`
--

CREATE TABLE `down` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `forumcomment`
--

CREATE TABLE `forumcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `timecomment` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `forumcomment`
--

INSERT INTO `forumcomment` (`id`, `userid`, `postid`, `content`, `timecomment`) VALUES
(1, 2, 2, 'idrk nigga', '2013-11-30 18:40:19'),
(2, 2, 2, 'sucks to suck', '2013-11-30 18:40:47'),
(3, 2, 2, 'yeah your life sucks', '2013-11-30 18:41:14'),
(4, 2, 2, 'you should probably pay attention in class', '2013-11-30 18:41:22'),
(5, 2, 2, 'http://www.dailywritingtips.com/compliment-vs-complement/', '2013-11-30 18:41:40'),
(6, 2, 8, 'be more specific', '2013-11-30 18:47:21'),
(7, 2, 1, 'asdf', '2013-11-30 19:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `forumposts`
--

CREATE TABLE `forumposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poster` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `timeposted` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `forumposts`
--

INSERT INTO `forumposts` (`id`, `poster`, `classid`, `question`, `content`, `timeposted`) VALUES
(1, 2, 12, 'I need help with the webassign', 'I forgot how to do the gravity problem.', '2013-11-30 17:28:14'),
(2, 2, 12, 'Compliment Vs Complement', 'I know the two definitions of the words, I just forget which one is which. Somebody please help.', '2013-11-30 18:20:46'),
(3, 2, 12, 'fhaha', 'hfdsjal', '2013-11-30 18:45:15'),
(4, 2, 12, 'fhaha', 'hfdsjal', '2013-11-30 18:45:22'),
(5, 2, 12, 'You suck', 'you suck', '2013-11-30 18:45:33'),
(6, 2, 12, 'fdsafdsa', 'asdfdsa', '2013-11-30 18:46:27'),
(7, 2, 12, 'fdsafdsa', 'asdfdsa', '2013-11-30 18:46:31'),
(8, 2, 12, 'asfkds', 'asdfa', '2013-11-30 18:47:13'),
(9, 2, 12, 'cmon man', 'cmon man', '2013-11-30 18:48:01'),
(10, 2, 8, 'What does Hola mean?', 'it makes no sense', '2013-11-30 18:50:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `poster`, `pageid`, `content`, `timeposted`) VALUES
(1, 2, 1, 'hey', '2013-11-30 12:53:30'),
(2, 2, 1, 'fdsa', '2013-11-30 13:06:08'),
(3, 2, 1, 'asdf', '2013-11-30 13:06:36'),
(4, 2, 1, 'fdsa', '2013-11-30 13:06:46'),
(5, 2, 1, 'asdfdsa', '2013-11-30 13:07:12'),
(6, 2, 1, 'asdfdsa', '2013-11-30 13:07:14'),
(7, 2, 12, 'yo chaunz homework be page 101-123', '2013-11-30 16:59:11'),
(8, 2, 12, 'oh word', '2013-11-30 16:59:17'),
(9, 2, 22, 'The homework is on the syllabus', '2013-11-30 18:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `up`
--

CREATE TABLE `up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `up`
--

INSERT INTO `up` (`id`, `userid`, `postid`) VALUES
(8, 2, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `activated`, `code`, `grade`) VALUES
(2, 'Elliot', 'Anderson', 'anderson.elliot3@gmail.com', 'f57feec6a5efe1485742caee367967a7', 1, 67652201, 9),
(3, 'Adam', 'Anderson', 'syllashare@gmail.com', 'f57feec6a5efe1485742caee367967a7', 1, 63983803, 10);
