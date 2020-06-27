-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2020 г., 23:09
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `categories` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `body` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `categories`, `body`) VALUES
(3, 7, '3rd task-ku', 'CTO', 'thiiiiird task!'),
(4, 1, '4th task', 'CEO', 'fourth task, this is'),
(36, 8, 'Backend dev', 'Backend', 'I am backend developer of this site , so I will add tasks for other frontend and backend developers'),
(37, 8, 'Qobulxon, please make an \"about us\" page', 'Backend', 'We should introduce ourselves to new comers'),
(38, 9, 'Frontend dev', 'Frontend', 'My name is Qobilxon and this is my first post'),
(39, 9, 'Ok,I\'ll do it after deadline!', 'Frontend', 'I am frontend developer of this site , so I will tasks for other frontend and backend developers'),
(40, 10, 'My first task', 'HR', 'This is my task'),
(50, 10, 'Attendane of Qobulxon', 'HR', 'Dear Qobulxon. Your attendance is less than 50%. We give you last chance to be part of our team. This month you should finish the project and show your attendance !'),
(58, 10, 'This is new Task for backenders', 'Backend', 'Add search function to allposts page'),
(59, 14, 'MySql work', 'Team Lead', 'Dilmurod, please work on MySql for examples'),
(60, 24, 'Meeting with front-end guys', 'Frontend', 'Hello guys, my name is Timur Alpin. I am new UI/UX designer on the team and I would like to meet with front-end  developers'),
(61, 16, 'Today is the meeting', 'CFO', 'Today is the meeting between head of finance, head legal and also accountants and legal people'),
(62, 2, 'New marketing goal', 'Head Marketing', 'Our new goal in marketing is improving our targetted marketing and decrease money for ads'),
(63, 3, 'Improving our severs', 'Backend', 'We should buy new server storage and improve SQL seraching'),
(64, 12, 'New payment method', 'CEO', 'Our new goal is adding new payment method. Because guys from Click are increasing their taxes. Task for all devs, heads of finance and legal'),
(65, 13, 'Anlayze of payment methods', 'Analytics', 'After our research we faound that Payme is the best payment method for or standars and their popularity is big enough to replace Click and it is increasing rapidly. We suggest to use this system'),
(66, 14, 'Deadline for adding Payme', 'CFO', 'We agreed terms with Payme. Ony thing adding it we ageed to finish work for end of the month');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `city`) VALUES
(1, 'John Doe', 'JohnDoe@gmail.com', '1212112fsd', '998987654321', 'Tashkent'),
(2, 'Marria White', 'marr@wat.com', 'mriaWhite1', '998976565655', 'New-York'),
(3, 'Mary Johnson', 'maryjohnson@yahoo.com', 'maryyyy123', '998946255225', 'Iowa'),
(7, 'Abdullo Ruziev', 'Abdullo@gmail.com', '$2y$10$GFUHnQxJJyPNWjc/vFUL9erL327aZy6ErkBK9cMM.TGCn9hgVtgUq', '998946279448', 'Tashkent'),
(8, 'Dilmurod Ruziev', 'dilmurodr00@gmail.com', '$2y$10$X4pDMIcF3msFLQaZlJ2NEufHBCKzDaSIGqif2/Peg7KHDKxaUXLxq', '998946279448', 'Tashkent '),
(9, 'Qobulxon Solixonov', 'qsolixonov@aa.com', '$2y$10$/Eo1o.fC3JXWxZ.dIH.lW.KgN1qZLLZ6/paM68lPXGgB4mn4rKG9.', '998987654321', 'Tashkent'),
(10, 'Kurt Cobain', 'nirvan@4ever.com', '$2y$10$l601Jmg03ov22E.iO3B98OZNYEKmGwhWM0dJwBqpSECUyQBhIvqsu', '998941234567', 'Tashkent'),
(12, 'Aziz Kurbanov', 'azizkurbanov01@gmail.com', '$2y$10$WvqUbbUXrHb4528Pq83k3.iHDAjODGSCeEZgxQfSc8hyF11dXit9u', '998998873245', 'Samarkand'),
(13, 'Sevara Azizova', 'sevaraziz89@gmail.com', '$2y$10$VdM9mB4YrqbEIya3y/JJ1ek2QpeOAVhf.gwubZocxQxrJ6ZN4Qdm6', '998901216599', 'Yangiyul'),
(14, 'Behruz Azamboev', 'behruz95@gmail.com', '$2y$10$E7HzCKg9ZL3JKyAfvVZ0oecLErxUEWmUGC7AIN/Va/28.sPJQdi5G', '998937654422', 'Kukand'),
(15, 'Nargiza Jumatova', 'nargiz99@mail.ru', '$2y$10$bdslqrkzmwREKtoYYTxWAuhVsQVDJKqlFbxjWagGdZ3nVmQJcEoae', '998973215665', 'Tashkent'),
(16, 'Nafisa Ergasheva', 'nafis85@mail.ru', '$2y$10$OO0pLVNJ5Rf/E04BwUkYcuN5Bd4MQKg8j3C4TB7wJjplN08dgER5G', '998917775335', 'Tashkent'),
(24, 'Timur Alpin', 'alpTimur@gmail.com', '$2y$10$s42DfWTvcfGkM0Ek1DRMQ.WCaSBU63q2EsLmpskBQej/vhNY.xHiO', '998946549889', 'Tashkent');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
