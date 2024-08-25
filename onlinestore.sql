-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 25 2024 г., 15:30
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `onlinestore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_topic` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `img`, `content`, `id_topic`) VALUES
(15, 'Зимние ботинки', '110', '1706239348_обувьЖ.jpg', 'Натуральная кожа 100%, шерсть, утепленные', 11),
(16, 'Ботинки мужские зимние', '74', '1706239501_обувьМ.jpg', 'Экокожа, искусственный мех', 11),
(17, 'Туфли лодочки', '96', '1706285709_1706285307_s-l300.jpg', 'Экокожа, цвет бежевый; ванильно-бежевый; нюдовый', 11),
(18, 'Туфли натуральная кожа', '145', '1706239763_обувьМтуфли.jpg', 'Натуральная кожа, материал подошвы обуви ТЭП (термоэластопласт)', 11),
(19, 'Классический костюм двойка', '400', '1706240876_kostyum.jpg', 'Бренд RIERA, Состав: шерсть, вискоза, полиамид, лайкра', 16),
(20, 'Платье вечернее стильное', '87', '1706285690_1706241149_платьеБелое.jpg', 'Бренд SAETOVA, Состав: эластан 3%, вискоза 27%, полиэстер 70%\r\nЦвет: айвори; молочный; белый', 15),
(21, 'Штаны спортивные джоггеры', '23', '1706241304_брюкиЖспорт.jpg', 'Бренд RayanTex 37\r\nСостав: 62%хл, 30% ПЭ, 8% лайкра\r\nЦвет: Изумрудный', 13),
(22, 'Рубашка классическая с длинным рукавом', '55', '1706241397_рубашкаМбелая.jpg', 'Бренд Jeytun\r\nСостав: хлопок, 100% хлопок', 14),
(23, 'Джинсы прямые с высокой посадкой рванные', '120', '1706241533_ДжинсыЖ.jpg', 'Бренд MANICHY\r\nСостав: Хлопок 100%\r\nЦвет: Голубой\r\nСезон: Лето; демисезон; круглогодичный', 12),
(24, 'Рубашка в клетку', '30', '1706241692_рубашкаЖ.jpg', 'Бренд IVCREATIVE\r\nСостав: Хлопок 100%\r\nЦвет: Пудровый; светлое какао; светло-бежевый;', 14),
(25, 'Брюки классические прямые черные', '95', '1706241768_брюкиМоф.jpg', 'Бренд GOOD AVINA\r\nСостав: Хлопок, хлопок 95%, полиэстер 5%', 13),
(26, 'Платье вечернее', '135', '1706241986_платьеЖелтое.jpg', 'Бренд Karolinavog\r\nСостав: Вискоза 60%, полиэстер 35%, лайкра 5%\r\nЦвет: Желтый', 15),
(27, 'Куртка зимняя', '174', '1706242101_курткаЖ.jpg', 'Бренд Aesthetic brand\r\nСостав:Материал верха: 100% полиэстер, материал подклада: 100% полиэстер, наполнитель: 100% холлофайбер\r\nЦвет: Бежевый; ванильно-бежевый', 17),
(28, 'Рубашка классическая', '56', '1706242209_рубашкаМ.jpg', 'Бренд OSSBORN\r\nСостав: Хлопок, стрейч\r\nЦвет: Темно-синий', 14),
(29, 'Брюки бананы классические', '52', '1706242285_БрюкиЖоф.jpg', 'Бренд FABBY\r\nСостав: Вискоза, полиэстер\r\nЦвет: Черный', 13),
(30, 'Куртка демисезонная утепленная', '135', '1706242382_курткаМ.jpg', 'Бренд Luzhilu\r\nСостав: Полиэстер, холлофайбер\r\nЦвет: Черный матовый; глубокий черный; черный графит', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(11, 'Обувь', 'Ботинки, туфли, сапоги, кроссовки'),
(12, 'Джинсы', 'Мужские, женские, детские'),
(13, 'Брюки', 'Мужские, женские, детские'),
(14, 'Рубашки', 'Рукав длинный, короткий.\r\nЖенские, мужские'),
(15, 'Платья', 'Летние, вечерние, длинные, короткие'),
(16, 'Костюмы', 'Женские, мужские, детские, карнавальные, официальные'),
(17, 'Куртки', 'Мужские, женские, ветровки, зимние, осенние');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `userroot` tinyint NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `userroot`, `username`, `email`, `password`, `adres`) VALUES
(11, 1, 'Admin', 'ad@min.1111', '$2y$10$mvWyWHIMiUOxv2mRztM4W.eOeS1G3X0ecgB7pgx9uPg1OxBkU3gou', 'admin1111'),
(13, 0, 'TestUser', 'user@mail.ru', '$2y$10$gGeInf8IU/zvnlftM4iftOjKNvXmEUs2.ep.uYAM46T8jdOBdNG2C', 'Пароль: 12345'),
(15, 0, 'Андрей', 'AndreykaXXX@inbox.ru', '$2y$10$Qbd6zlgNwx5ub5/BmNZiYOv.zP1L/cTQF1pJqNj6G4qutK.z8JAZa', 'пр-т Независимости д.45 кв.105'),
(16, 0, 'fghjk', '22111998@inbox.ru', '$2y$10$K.JLgO5mynfkjmW6xVK7ju033DQr4UCk/UER3vQrmLa7OVSDHJx.a', 'fghjkl');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
