-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 01:15 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fnx_journals`
--
CREATE DATABASE IF NOT EXISTS `fnx_journals` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fnx_journals`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `slug` varchar(512) NOT NULL,
  `shortDescription` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`(255),`slug`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `shortDescription`, `content`, `price`) VALUES
(1, 'Healthy dish you can preapare quickly', 'healthy-dish-you-can-preapare-quickly', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est.', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.', 5),
(2, 'Healthy dish you can preapare quickly 2', 'healthy-dish-you-can-preapare-quickly-2', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est.', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.', 0),
(3, 'Healthy dish you can preapare quickly 3', 'healthy-dish-you-can-preapare-quickly-3', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est.', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.', 4.5),
(4, 'Healthy dish you can preapare quickly 4', 'healthy-dish-you-can-preapare-quickly-4', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est.', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.', 3),
(5, 'Healthy dish you can preapare quickly 5', 'healthy-dish-you-can-preapare-quickly-5', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est.', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.', 1),
(6, 'Healthy dish you can preapare quickly 6', 'healthy-dish-you-can-preapare-quickly-6', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est.', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.', 7),
(7, 'Healthy dish you can preapare quickly 7', 'healthy-dish-you-can-preapare-quickly-7', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est.', 'Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.', 7.35);

-- --------------------------------------------------------

--
-- Table structure for table `articles2authors`
--

DROP TABLE IF EXISTS `articles2authors`;
CREATE TABLE IF NOT EXISTS `articles2authors` (
  `articleId` int(11) NOT NULL,
  `authorId` int(11) NOT NULL,
  PRIMARY KEY (`articleId`,`authorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles2authors`
--

INSERT INTO `articles2authors` (`articleId`, `authorId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(3, 2),
(4, 1),
(5, 4),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `articles2tags`
--

DROP TABLE IF EXISTS `articles2tags`;
CREATE TABLE IF NOT EXISTS `articles2tags` (
  `articleId` int(11) NOT NULL,
  `tagId` int(11) NOT NULL,
  PRIMARY KEY (`articleId`,`tagId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles2tags`
--

INSERT INTO `articles2tags` (`articleId`, `tagId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 5),
(2, 6),
(3, 1),
(4, 2),
(4, 5),
(5, 3),
(5, 4),
(5, 6),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `slug` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `firstName`, `lastName`, `slug`) VALUES
(1, 'Ernest', 'Hemingway', 'ernest-hemingway'),
(2, 'Mark', 'Twain', 'mark-twain'),
(3, 'Stephen', 'King', 'stephen-king'),
(4, 'Charles', 'Dickens', 'charles-dickens');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Historia', 'historia'),
(2, 'Informatyka', 'informatyka'),
(3, 'Sport', 'sport'),
(4, 'Hobby', 'hobby'),
(5, 'Biznes, finanse', 'biznes--finanse'),
(6, 'Nauki przyrodnicze', 'nauki-przyrodnicze');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`) VALUES
(1, 'Jazda konna', 'jazda-konna'),
(2, 'Php', 'php'),
(3, 'Baseball', 'baseball'),
(4, 'Fotografia', 'fotografia'),
(5, 'Jquery', 'jquery'),
(6, 'Html5', 'html5');
