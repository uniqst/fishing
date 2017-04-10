-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Квт 10 2017 р., 22:34
-- Версія сервера: 5.6.29
-- Версія PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `ABC`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`) VALUES
(47, 0, 'Экипировка'),
(46, 0, 'Аксесуары'),
(45, 0, 'Шнуры и лески'),
(44, 0, 'Оснастка'),
(43, 0, 'Приманки'),
(42, 0, 'Удилища'),
(41, 0, 'Катушки'),
(48, 0, 'Прикормка и бойлы'),
(49, 41, 'Передний фрикцион'),
(50, 41, 'Задний фрикцион'),
(51, 41, 'Карповые с бейтраннером'),
(52, 42, 'Спиннинги'),
(53, 42, 'Спиннинги'),
(54, 42, 'Фидеры и Пикеры'),
(55, 42, 'Карповые'),
(56, 43, 'Воблеры'),
(57, 43, 'Блесна'),
(58, 43, 'Балансиры'),
(59, 44, 'Застежки и фурнитура'),
(60, 44, 'Поводки для хищника'),
(61, 44, 'Крючки и тройники'),
(62, 45, 'Шнуры'),
(63, 45, 'Леска'),
(64, 46, 'Сумки, чехлы и рюкзаки'),
(65, 46, 'Ящики и коробки'),
(66, 46, 'Рыболовный инструмент'),
(67, 47, 'Головные уборы'),
(68, 47, 'Очки'),
(69, 47, 'Регланы и футболки'),
(70, 48, 'Бойлы'),
(71, 48, 'Пеллетс'),
(72, 48, 'Прикормки');

-- --------------------------------------------------------

--
-- Структура таблиці `ewq`
--

CREATE TABLE IF NOT EXISTS `ewq` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `ewq`
--

INSERT INTO `ewq` (`id`, `brand`) VALUES
(4, 'йцуцй');

-- --------------------------------------------------------

--
-- Структура таблиці `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `in_category`
--

CREATE TABLE IF NOT EXISTS `in_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `in_category`
--

INSERT INTO `in_category` (`id`, `category_id`, `name`, `value`) VALUES
(1, 46, 'Вес', '12'),
(2, 46, 'Длина', '199');

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1491507353),
('m140622_111540_create_image_table', 1491507356),
('m140622_111545_add_name_to_image_table', 1491507356);

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `qty` int(11) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8 DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`id`, `created_at`, `update_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(11, '2017-04-05 22:15:59', '2017-04-05 22:15:59', 4, 710, '1', '1', '2', '3', '4'),
(13, '2017-04-07 17:52:52', '2017-04-07 17:52:52', 1, 123, '1', 'Андрей', 'galifax94@gmail.com', '0635389533', 'adsdsadsad');

-- --------------------------------------------------------

--
-- Структура таблиці `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) unsigned NOT NULL,
  `order_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(27, 13, 25, '123', 123, 1, 123),
(26, 12, 4, 'dsadw', 123, 3, 369),
(25, 12, 3, 'wqewq', 123, 2, 246),
(24, 12, 1, 'Вудкаw', 232, 20, 4640),
(23, 11, 3, 'wqewq', 123, 1, 123),
(22, 11, 4, 'dsadw', 123, 1, 123),
(21, 11, 1, 'Вудкаw', 232, 2, 464);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `price_promo` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `width` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf16;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `price`, `price_promo`, `photo`, `brand`, `width`) VALUES
(35, 47, 'qweqw', '<p>wqewq</p>\r\n', 123, 1, 'upload/00.jpg', '2', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `qwe`
--

CREATE TABLE IF NOT EXISTS `qwe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `qwe`
--

INSERT INTO `qwe` (`id`, `name`) VALUES
(5, 'йййй');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `ewq`
--
ALTER TABLE `ewq`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `in_category`
--
ALTER TABLE `in_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `qwe`
--
ALTER TABLE `qwe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT для таблиці `ewq`
--
ALTER TABLE `ewq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `in_category`
--
ALTER TABLE `in_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблиці `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблиці `qwe`
--
ALTER TABLE `qwe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
