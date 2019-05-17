-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Час створення: Квт 18 2019 р., 02:02
-- Версія сервера: 5.6.25
-- Версія PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `user9`
--

-- --------------------------------------------------------

--
-- Структура таблиці `task5`
--

CREATE TABLE IF NOT EXISTS `task5` (
  `key` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп даних таблиці `task5`
--

INSERT INTO `task5` (`key`, `value`) VALUES
('eee', 'rrrrrr'),
('tttt', 'yyyyy');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `task5`
--
ALTER TABLE `task5`
  ADD PRIMARY KEY (`key`),
  ADD UNIQUE KEY `index_key` (`key`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
