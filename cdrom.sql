-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 30 2020 г., 08:08
-- Версия сервера: 5.7.22
-- Версия PHP: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cdrom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `klient`
--

CREATE TABLE `klient` (
  `family` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `patronymic` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_klient` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `klient`
--

INSERT INTO `klient` (`family`, `name`, `patronymic`, `phone`, `birth_date`, `id_klient`) VALUES
('Flashkin', 'Gleb', 'Aleksandrovith', '444222', '10.10.2000', 1),
('Borzova', 'Elena', 'Sergeevna', '10431777', '07.03.1900', 4),
('Бугундяев', 'Лашман', 'Ярбекович', '31293791222', '10101928', 9),
('qwerty', 'qaz', 'wsx', '8909432984', '10.10.2010', 86);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `title` varchar(200) NOT NULL,
  `article` text NOT NULL,
  `postname` varchar(100) NOT NULL,
  `id_posts` int(11) NOT NULL,
  `keywords` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`title`, `article`, `postname`, `id_posts`, `keywords`, `description`) VALUES
('Тестовая запись', 'Проверка вывода', 'Тестовая запись', 1, NULL, ''),
('qwerty', 'Test blog', 'qwerty', 4, NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `favicon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `login` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log` varchar(255) DEFAULT NULL,
  `role` varchar(15) NOT NULL,
  `ban` varchar(3) DEFAULT NULL,
  `userpic` varchar(255) DEFAULT NULL,
  `reg_date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`login`, `password`, `user_id`, `log`, `role`, `ban`, `userpic`, `reg_date`) VALUES
('administrator', '$2y$10$S8a/WHQhtKD8z7efegfDkO5fnBi6emHjnrQl3kj2w0EVhTsYelvA2', 49, 'IP: 127.0.0.1, Дата: Thu Jul 23 14:54:50 UTC 2020', 'admin', '', 'img/userpics/beavis.png', '01-07-2020'),
('newadmin', '$2y$10$BVKOyOYch2WeI3/c.t09hOyPeB/Dc4WFBnOsp1ZaUYvrteSYBIVOG', 51, 'IP: 127.0.0.1, Дата: Wed Jun 17 06:27:06 UTC 2020', 'user', '', NULL, ''),
('wewewe', '$2y$10$mTxg1hqFxyy7BbQyRF.LR.QPx21av1/4AwiW61X/RUdJGxLeOp5/m', 55, 'IP: 127.0.0.1, Дата: Thu Jun 18 10:49:59 UTC 2020', 'admin', '', NULL, ''),
('user1', '$2y$10$EHDH7hY100XjdRPfgNCzpuOAeUy4glenimQ2Jz5xfQcuWv5MkQlQq', 56, 'IP: 127.0.0.1, Дата: Sat Jun 20 08:58:59 UTC 2020', 'user', '', NULL, ''),
('chebyrek', '$2y$10$gDTFOl6dI2wiqKm7NSBDHudUpVmR4HmyE1s/W7sFbuOKcbWl6dPV.', 57, NULL, 'user', NULL, NULL, '-2007'),
('chebyrek2', '$2y$10$1iGeZnRR7bH5.DwtBJG1K.3dvaUU7W7mb/qJaYFWM67eSCYtUZFc6', 58, NULL, 'user', NULL, NULL, '-2007'),
('chebyrek3', '$2y$10$Mus.t0foXnrziOx6qFOIK./sU/.nHEmFMC13y5iQjo.hDt4zvpIIa', 59, NULL, 'user', NULL, NULL, '-2007'),
('chebyrek777', '$2y$10$Sd.vaD6HNEcemYn8TnwgLuPhO28PYiSJT057eUUwnAzPmGAkB1ah.', 60, NULL, 'user', NULL, NULL, '-2007'),
('chebyrek4000', '$2y$10$Awphu4mTGHIOGYCuDr.a/.psZdXHcCtjTNUvl62uZft8uQsddsUoO', 61, NULL, 'user', NULL, NULL, '-2007'),
('chebyrek999', '$2y$10$IHAZFWZAgsDmcfyNtb6o7e2K1uI9ba47oF7FIh0nLn1qzKUCujyL.', 62, NULL, 'user', NULL, NULL, '-2007'),
('chebyrek230', '$2y$10$vfTGQhRnG2jLX2lX3CiPhecsFONFYJys3n7KMczJ5JRj0/1aeydvG', 63, NULL, 'user', NULL, NULL, '-2007'),
('supadmin', '$2y$10$S196aLFsqqrMCR.499sZIO1zjQwM.3gfrT7p//E1i3DT1fCaIPdlq', 64, NULL, 'admin', NULL, NULL, '-2007');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klient`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `idpost` (`id_posts`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klient` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id_posts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
