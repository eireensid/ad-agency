-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 31 2021 г., 20:52
-- Версия сервера: 10.1.40-MariaDB
-- Версия PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ad-agency`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `date`, `title`, `description`) VALUES
(1, '2020-10-15', 'Акции на размещение баннерного панно 20% до конца июля', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.'),
(2, '2020-10-10', 'Мы работаем в обычном режиме с 15 июня!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.'),
(3, '2020-10-08', 'Как правильно подобрать рекламный канал?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.'),
(4, '2020-10-14', 'Акции на размещение баннерного панно 20% до конца июля', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.'),
(5, '2020-10-09', 'Мы работаем в обычном режиме с 15 июня!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.'),
(6, '2020-10-07', 'Как правильно подобрать рекламный канал?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.'),
(7, '2020-10-13', 'Акции на размещение баннерного панно 20% до конца июля', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.'),
(8, '2020-10-08', 'Мы работаем в обычном режиме с 15 июня!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.'),
(9, '2020-10-06', 'Как правильно подобрать рекламный канал?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget condimentum felis.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
