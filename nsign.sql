-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 20 2017 г., 19:14
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nsign`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `name`) VALUES
(1, 'Жареная картошка'),
(2, 'Суп солянка'),
(3, 'Суп вермишелевый'),
(4, 'Зелёные щи с крапивой'),
(5, 'Винегрет '),
(6, 'Лазанья'),
(7, 'Жаркое в горшочках');

-- --------------------------------------------------------

--
-- Структура таблицы `dish_ingredients`
--

CREATE TABLE `dish_ingredients` (
  `dish_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dish_ingredients`
--

INSERT INTO `dish_ingredients` (`dish_id`, `ingredient_id`) VALUES
(19, 2),
(19, 9),
(19, 11),
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(2, 1),
(2, 9),
(2, 15),
(5, 1),
(5, 4),
(5, 6),
(5, 14),
(5, 16),
(7, 1),
(7, 3),
(7, 4),
(7, 5),
(6, 2),
(6, 4),
(6, 5),
(6, 11),
(6, 13),
(6, 18),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 10),
(4, 11),
(4, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isHidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `isHidden`) VALUES
(1, 'Картофель', 0),
(2, 'Лук репчатый', 0),
(3, 'Чеснок', 0),
(4, 'Соль ', 0),
(5, 'Перец ', 0),
(6, 'Масло растительное ', 0),
(7, 'Курица ', 0),
(8, 'Шампиньоны ', 0),
(9, 'Капуста квашеная ', 0),
(10, 'Морковь ', 0),
(11, 'Зелень ', 0),
(12, 'Маслины ', 0),
(13, 'Томатная паста ', 0),
(14, 'Свекла', 0),
(15, 'Огурец ', 0),
(16, 'Зеленый горошек', 0),
(17, 'Сливки', 0),
(18, 'Листы лазаньи', 0),
(19, 'Крапива', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
