-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 09 2023 г., 09:21
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testovoye_zadaniye_php_backend`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `PRODUCT_ID` varchar(255) DEFAULT NULL,
  `PRODUCT_NAME` varchar(255) DEFAULT NULL,
  `PRODUCT_PRICE` decimal(9,2) DEFAULT NULL,
  `PRODUCT_ARTICLE` text,
  `PRODUCT_QUANTITY` int DEFAULT NULL,
  `DATE_CREATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_ARTICLE`, `PRODUCT_QUANTITY`, `DATE_CREATE`, `STATUS`) VALUES
(1, '1', 'ldsfko', '100.00', 'Product 1 Article', 13, '2023-04-09 06:04:08', 0),
(2, '2', 'Product 2', '200.00', 'Product 2 Article', 5, '2023-04-09 06:04:15', 1),
(3, '3', 'Product 3', '300.00', 'Product 3 Article', 3, '2023-04-09 06:04:16', 0),
(4, '4', 'Product 4', '400.00', 'Product 4 Article', 4, '2023-04-09 06:04:07', 0),
(5, '5', 'Product 5', '500.00', 'Product 5 Article', 7, '2023-04-09 06:04:07', 1),
(6, '6', 'Product 6', '100.00', 'Product 6 Article', 6, '2023-04-09 06:04:07', 1),
(7, '7', 'Product 7', '100.00', 'Product 7 Article', 7, '2023-04-09 06:04:17', 1),
(8, '1', 'Product 1', '100.00', 'Product 1 Article', 4, '2023-04-09 06:04:07', 0),
(9, '1', 'Product 1', '100.00', 'Product 1 Article', 3, '2023-04-09 06:04:07', 0),
(10, '1', 'Product 1', '100.00', 'Product 1 Article', 2, '2023-04-09 06:04:07', 0),
(11, '1', 'Product 1', '100.00', 'Product 1 Article', 6, '2023-04-09 06:04:07', 1),
(12, '1', 'Product 1', '100.00', 'Product 1 Article', 2, '2023-04-09 06:04:15', 0),
(13, '1', 'Product 1', '100.00', 'Product 1 Article', 2, '2023-04-09 06:04:12', 0),
(14, '1', 'Product 1', '100.00', 'Product 1 Article', 2, '2023-04-09 06:04:11', 0),
(15, '1', 'Product 1', '100.00', 'Product 1 Article', 2, '2023-04-09 06:04:10', 1),
(16, '1', 'Product 1', '100.00', 'Product 1 Article', 2, '2023-04-09 06:04:09', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
