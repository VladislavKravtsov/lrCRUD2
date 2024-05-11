-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 06 2023 г., 19:28
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wood_family`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `cname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `cname`) VALUES
(1, 'Крутой заказчик'),
(2, 'Серьезный заказчик'),
(3, 'Хмурый заказчик'),
(4, 'Подозрительный заказчик'),
(5, 'Суперский заказчик');

-- --------------------------------------------------------

--
-- Структура таблицы `deals`
--

CREATE TABLE `deals` (
  `id` int(11) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `customer` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `deals`
--

INSERT INTO `deals` (`id`, `img_path`, `adress`, `customer`, `description`, `cost`) VALUES
(1, 'customers/pes1.jpg', 'Ул. Ненастоящая 1', 1, 'Песик', 1000),
(2, 'customers/pes2.jpg', 'Ул. Ненастоящая 2', 2, 'Ого песик', 54612),
(3, 'customers/pes3.jpg', 'Ул. Ненастоящая 3', 3, 'Прикольно песик ', 5352),
(4, 'customers/pes4.jpg', 'Ул. Ненастоящая 4', 4, 'Вау песик', 5345),
(5, 'customers/pes5.jpg', 'Ул. Ненастоящая 5', 5, 'Ого песик', 5345),
(6, 'customers/pes6.jpg', 'Ул. Ненастоящая 6', 1, 'Хаха песик', 3513),
(7, 'customers/pes15.jpg', 'Ул. Ненастоящая 7', 2, 'Загадочный песик', 0),
(8, 'customers/pes8.jpg', 'Ул. Ненастоящая 8', 3, 'Смешной очень песик', 5272),
(9, 'customers/pes9.jpg', 'Ул. Ненастоящая 9', 4, 'Веселый песик', 4689),
(10, 'customers/pes10.jpg', 'Ул. Ненастоящая 10', 5, 'Прикольный песик', 1311),
(11, 'customers/pes11.jpg', 'Ул. Ненастоящая 11', 1, 'Гениальный песик', 6246),
(12, 'customers/pes12.jpg', 'Ул. Ненастоящая 12', 2, 'Солидный песик', 5135),
(13, 'customers/pes13.jpg', 'Ул. Ненастоящая 13', 3, 'Грациозный песик', 4364),
(14, 'customers/pes14.jpg', 'Ул. Ненастоящая 14', 4, 'Великолепный песик', 5212),
(15, 'customers/pes15.jpg', 'Ул. Ненастоящая 15', 5, 'Сногсшибательный песик', 3626),
(16, 'customers/pes3.jpg', 'Ул. Ненастоящая 16', 1, 'Увлекательный песик', 1612),
(17, 'customers/pes17.jpg', 'Ул. Ненастоящая 17', 2, 'Крутой песик', 6236),
(18, 'customers/pes18.jfif', 'Ул. Ненастоящая 18', 3, 'Очень маленький песик ', 6666),
(19, 'customers/pes19.jpg', 'Ул. Ненастоящая 19', 4, 'Маленький песик 12', 4643),
(20, 'customers/pes20.jpg', 'Ул. Ненастоящая 20', 5, 'Маленький песик 1', 1124);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
