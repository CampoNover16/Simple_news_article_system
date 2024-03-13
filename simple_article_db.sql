-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2024 at 02:10 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `created`) VALUES
(1, 'Example title 1', 'Example text 1', '2024-03-13 02:08:21'),
(2, 'Example news', 'Example news text', '2024-03-13 02:08:44'),
(3, 'Example news 2', 'Example news text 2', '2024-03-13 02:09:04'),
(4, 'Example title 2', 'Example text 2', '2024-03-13 02:09:36'),
(5, 'Example title 3', 'Example text 3', '2024-03-13 02:09:57');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `news_authors`
--

INSERT INTO `news_authors` (`id`, `news_id`, `author_id`, `created`) VALUES
(1, 1, 1, '2024-03-13 02:08:21'),
(2, 1, 2, '2024-03-13 02:08:21'),
(3, 2, 5, '2024-03-13 02:08:44'),
(4, 2, 7, '2024-03-13 02:08:44'),
(5, 2, 9, '2024-03-13 02:08:44'),
(6, 3, 1, '2024-03-13 02:09:04'),
(7, 3, 2, '2024-03-13 02:09:04'),
(8, 3, 3, '2024-03-13 02:09:04'),
(9, 3, 4, '2024-03-13 02:09:04'),
(10, 3, 5, '2024-03-13 02:09:04'),
(11, 3, 6, '2024-03-13 02:09:04'),
(12, 3, 7, '2024-03-13 02:09:04'),
(13, 3, 8, '2024-03-13 02:09:04'),
(14, 3, 9, '2024-03-13 02:09:04'),
(15, 3, 10, '2024-03-13 02:09:04'),
(16, 4, 5, '2024-03-13 02:09:36'),
(17, 4, 6, '2024-03-13 02:09:36'),
(18, 5, 1, '2024-03-13 02:09:57'),
(19, 5, 10, '2024-03-13 02:09:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
