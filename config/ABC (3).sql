-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Квт 20 2017 р., 23:50
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
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Структура таблиці `cat_option`
--

CREATE TABLE IF NOT EXISTS `cat_option` (
  `id` int(11) NOT NULL,
  `incat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `cat_option`
--

INSERT INTO `cat_option` (`id`, `incat_id`, `product_id`, `value`) VALUES
(136, 7, 40, '111'),
(137, 8, 40, '123213213'),
(138, 7, 41, '1112'),
(139, 8, 41, '21312'),
(140, 9, 42, '131232114324');

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
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `in_category`
--

INSERT INTO `in_category` (`id`, `category_id`, `name`) VALUES
(7, 68, 'Вес'),
(8, 68, 'Длина'),
(9, 67, 'Плотность');

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
-- Структура таблиці `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL,
  `size_product` int(11) NOT NULL,
  `size_md` int(11) NOT NULL,
  `size_sm` int(11) NOT NULL,
  `size_xs` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `options`
--

INSERT INTO `options` (`id`, `size_product`, `size_md`, `size_sm`, `size_xs`) VALUES
(1, 12, 3, 4, 12);

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` date NOT NULL,
  `qty` int(11) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8 DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`id`, `created_at`, `update_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(14, '2017-04-18 12:11:46', '2017-04-18', 1, 12312, '1', '1', '2', '3', '4');

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(28, 14, 38, 'weqw', 12312, 1, 12312);

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `content` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `label`, `content`) VALUES
(1, 'about', 'О магазине', 'О магазине', '<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4</td>\r\n			<td>4</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;'),
(2, 'contacts', 'Контакты', 'Контакты', 'фывфывфы'),
(3, 'privet', 'Андрей привет', 'Cool', '<p>asdsadsafsaadfdsafsda</p>\r\n\r\n<p>f</p>\r\n\r\n<p>sadf</p>\r\n\r\n<p>dsa</p>\r\n\r\n<p>fdsa</p>\r\n\r\n<p>f</p>\r\n\r\n<p>d</p>\r\n');

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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf16;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `price`, `price_promo`, `photo`, `brand`, `width`) VALUES
(40, 68, 'Очки', '<p>1231232</p>\r\n', 1, 2, 'upload/00.jpg', '3', 0),
(41, 68, '123', '<p>123</p>\r\n', 123, 123, 'upload/00.jpg', '123', 0),
(42, 67, '1', '<p>2</p>\r\n', 1, 3, 'upload/00.jpg', '2', 0);

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

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '$2y$13$q89Yn8/lj0i8xg13qeOdUOaMZsCRKFSSheJxn03hrGe3Jj4Pixdp.', '_wa9G-Hh88yY9apuc6eJZYZBLrecKc-_'),
(2, 'oleg', '$2y$13$q89Yn8/lj0i8xg13qeOdUOaMZsCRKFSSheJxn03hrGe3Jj4Pixdp.', 'BDw8SALNABK_LNpnqysYF_RIb3sfwlNs');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `cat_option`
--
ALTER TABLE `cat_option`
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
-- Індекси таблиці `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

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
-- Індекси таблиці `pages`
--
ALTER TABLE `pages`
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
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT для таблиці `cat_option`
--
ALTER TABLE `cat_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблиці `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблиці `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблиці `qwe`
--
ALTER TABLE `qwe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
