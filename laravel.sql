-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 02 2024 г., 21:22
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
-- База данных: `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` bigint NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(2, 'Кат 1'),
(3, 'Кат 2');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` bigint UNSIGNED NOT NULL,
  `id_category` bigint UNSIGNED NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `price_product` int NOT NULL,
  `country_product` varchar(255) NOT NULL,
  `year_product` int NOT NULL,
  `model_product` varchar(255) NOT NULL,
  `count_product` int NOT NULL,
  `path_product` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `name_product`, `price_product`, `country_product`, `year_product`, `model_product`, `count_product`, `path_product`) VALUES
(4, 2, 'Название', 5345, 'Россия', 532454, '423павпва', 5, 'assets/img/products/BidjkxC6GVCUsQ8t.jpg'),
(5, 3, 'Название2', 534, 'Россия', 2001, 'fsdfsd', 76, 'assets/img/products/0uf3IbWckkWat1Xp.jpg'),
(6, 2, 'Название3', 123, 'Казахстан', 65421, 'Модель 3', 34, 'assets/img/products/6neNjeJ2B3JBt5ck.jpg'),
(7, 3, 'Название4', 63, 'Россия', 2004, 'Модель 4', 1, 'assets/img/products/jMc0pYHPrGgDvtY7.jpg'),
(8, 2, 'Название5', 897, 'Казахстан', 532, 'Модель 5', 12, 'assets/img/products/d4MDaoTRvRKjYCTV.jpg'),
(9, 2, 'Название6', 6666, 'Канада', 2006, '123666', 6, 'assets/img/products/urUwL9CtaYmFi82t.jpg'),
(10, 3, 'Название7', 777, 'Канада', 2007, 'Модель 7', 7, 'assets/img/products/ccnhx7d5PnDibXcc.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `is_admin` bit(1) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `login`, `password`, `created_at`, `updated_at`) VALUES
(1, b'1', 'max', 'max@max.com', 'fgdfgdf', '$2y$10$m1TebeTIQmsUEn2cyoWeGeokCzMv7pWXZh/Nu/M2yMMqXGjYwBjbW', '2024-10-02 10:53:41', '2024-10-02 10:53:41');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
