-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2024 at 10:58 PM
-- Wersja serwera: 8.2.0
-- Wersja PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_article_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Emily Smith'),
(2, 'James Johnson'),
(3, 'Sophia Williams'),
(4, 'Alexander Brown'),
(5, 'Olivia Jones'),
(6, 'William Davis'),
(7, 'Charlotte Taylor'),
(8, 'Benjamin Martinez'),
(9, 'Ava Anderson'),
(10, 'Samuel Wilson');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news_authors`
--

DROP TABLE IF EXISTS `news_authors`;
CREATE TABLE IF NOT EXISTS `news_authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `news_id` int NOT NULL,
  `author_id` int NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
