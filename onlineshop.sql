-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 30 2023 г., 23:27
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `onlineshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `price` int NOT NULL,
  `description` text NOT NULL,
  `img_src` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `description`, `img_src`) VALUES
(1, 'Джемпер', 1599, 'Вязанный, желтого цвета', 'джемпер.jpg'),
(2, 'Платье', 2999, 'Пляжное, на бретелях, красное', 'платье.jpg'),
(3, 'Джинсы', 3999, 'Черные, с повышенной талией', 'джинсы.jpg'),
(4, 'Топ', 1299, 'Черный, с горлом', 'топ.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `good_id` int NOT NULL,
  `user_id` int NOT NULL,
  `sum` int NOT NULL,
  `status` text NOT NULL,
  `timestamps` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `good_id`, `user_id`, `sum`, `status`, `timestamps`) VALUES
(78, 1, 10, 1599, 'paid', '2023-08-30 21:19:32'),
(79, 3, 10, 3999, 'paid', '2023-08-30 21:19:32'),
(80, 2, 10, 2999, 'in_cart', '2023-08-30 21:19:28'),
(81, 3, 10, 3999, 'in_cart', '2023-08-30 21:28:47'),
(82, 4, 10, 1299, 'in_cart', '2023-08-30 21:28:48'),
(83, 1, 10, 1599, 'in_cart', '2023-08-30 21:30:45'),
(84, 1, 11, 1599, 'paid', '2023-08-30 23:24:15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `login` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES
(1, 'Богдан', 'bogdan@mail.ru', '123'),
(3, 'Анна', 'anna@gmail.com', '$2y$10$V6VqvCWXiyspGxma71IFP.QdPMWMcDkEbKz4VG/4FeTbCYRLuGQGK'),
(5, 'Екатерина', 'ekaterina@rambler.ru', '$2y$10$6ge0cgxICf2IWmWyfigznODIlxxnfmpiKedGmw5vr2W9ysSkJrZ5y'),
(10, 'Екатерина', 'katya', '$2y$10$JYI8OuBg1giLRsTXNcCqNumrg1E/Rx8AnBwcawhHCUfMCc1fwUmeK'),
(11, 'Екатерина', 'ekaterina', '$2y$10$jYE4oAVheINeAjP7c0CkOeO0IxEj4fSI/YZXUC09Djbi8nv6BCvGi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
