-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 15 2016 г., 15:38
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myproject_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Home'),
(2, 'entertainment'),
(3, 'work'),
(4, 'travel'),
(5, 'nature');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `created` varchar(45) NOT NULL,
  `ip_adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `message`, `created`, `ip_adress`) VALUES
(1, 'alexandr', 'alexandr-i@i.ua', 'ghffhgfh', '2016-07-15 13:36:59', ''),
(2, 'alexandr', 'alexandr-i@i.ua', 'test', '2016-07-15 13:48:26', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `image`, `status`, `category_id`) VALUES
(5, 'Nunc Consectetur', 'Description - Nunc Consectetur', '180.00', '', 1, 4),
(6, 'Donec Vitae Massa', 'Description - Donec Vitae Massa', '240.00', '', 1, 1),
(7, 'Fusce Dignissim Neque', 'Description - Fusce Dignissim Neque', '340.00', '', 0, 2),
(8, 'Mauris Adipiscing Enim', 'Description - Mauris Adipiscing Enim', '480.50', '', 0, 2),
(9, 'Quisque Tincidunt', 'Description - Quisque Tincidunt', '180.00', '', 1, 5),
(10, 'Aliquam Malesuada', 'Description - Aliquam Malesuada', '470.00', '', 1, 4),
(11, 'Sed Eleifend Tortor', 'Description - Sed Eleifend Tortor', '780.00', '', 1, 3),
(12, 'Integer tincidunt', 'Description - Integer tincidunt', '350.00', '', 1, 2),
(13, 'Enim Mauris', 'Description - Enim Mauris', '356.00', '', 1, 2),
(14, 'Adipiscing Fusce Dignissim Neque', 'Description - Adipiscing Fusce Dignissim Neque', '758.22', '', 1, 1),
(15, 'Dignissim Nunc Consectetur', 'Description - Dignissim Nunc Consectetur', '25879.00', '', 1, 4),
(16, 'Nunc Quisque Tincidunt', 'Description - Nunc Quisque Tincidunt', '999.99', '', 1, 4),
(17, 'Integer Aliquam Malesuada', 'Description - Integer Aliquam Malesuada', '4786.00', '', 1, 3),
(18, 'Malesuada Integer tincidunt', 'Description - Malesuada Integer tincidunt', '478.00', '', 1, 1),
(19, 'Adipiscing Sed Eleifend Tortor', 'Description - Adipiscing Sed Eleifend Tortor', '158.00', '', 1, 2),
(20, 'Tortor Mauris Adipiscing Enim', 'Description - Tortor Mauris Adipiscing Enim', '580.00', '', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` char(32) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `status`) VALUES
(1, 'admin@mvc.com', 'admin', '1d43a95f76d1da7b3c39597ecf00121e', 1),
(2, 'qwerty@mvc.com', 'qwerty', 'cd1356fb884979945ffaa9d8437d354c', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `price` (`price`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
