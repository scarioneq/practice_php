-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Май 15 2026 г., 12:43
-- Версия сервера: 10.7.8-MariaDB-1:10.7.8+maria~ubu2004
-- Версия PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `discipline`
--

CREATE TABLE `discipline` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `discipline`
--

INSERT INTO `discipline` (`id`, `name`) VALUES
(1, 'Базы данных'),
(2, 'Программирование на Python'),
(3, 'Веб-разработка'),
(4, 'Компьютерные сети'),
(5, 'Операционные системы');

-- --------------------------------------------------------

--
-- Структура таблицы `group_disciplines`
--

CREATE TABLE `group_disciplines` (
  `id` int(11) NOT NULL,
  `group_of_students_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `group_disciplines`
--

INSERT INTO `group_disciplines` (`id`, `group_of_students_id`, `discipline_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `group_of_students`
--

CREATE TABLE `group_of_students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `group_of_students`
--

INSERT INTO `group_of_students` (`id`, `name`) VALUES
(1, 'ИСП-101'),
(2, 'ИСП-102'),
(3, 'ИСП-201'),
(4, 'ИСП-202'),
(5, 'ИСП-301');

-- --------------------------------------------------------

--
-- Структура таблицы `registration_address`
--

CREATE TABLE `registration_address` (
  `id` int(11) NOT NULL,
  `index` varchar(20) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `flat` varchar(20) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `registration_address`
--

INSERT INTO `registration_address` (`id`, `index`, `region`, `city`, `flat`, `street`) VALUES
(1, '119002', 'Московская область', 'Москва', '15', 'ул. Арбат'),
(2, '190000', 'Ленинградская область', 'Санкт-Петербург', '22Б', 'Невский проспект'),
(3, '630099', 'Новосибирская область', 'Новосибирск', '8', 'Красный проспект'),
(4, '620014', 'Свердловская область', 'Екатеринбург', '54', 'ул. Ленина'),
(5, '420111', 'Республика Татарстан', 'Казань', '31', 'ул. Баумана'),
(6, '123', '21312', '321321', '3123', '312321'),
(7, '123', '21312', '321321', '3123', '312321'),
(8, '123', '21312', '321321', '3123', '312321'),
(9, '123123', '12312', '3213', '12312', '123123'),
(10, '123124', '21421', '412412', '124124', '4124124');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `patronymic` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `registration_address_id` int(11) DEFAULT NULL,
  `group_of_students_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `patronymic`, `gender`, `date_of_birth`, `registration_address_id`, `group_of_students_id`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 'Мужской', '2000-05-15', 1, 1),
(2, 'Мария', 'Петрова', 'Сергеевна', 'Женский', '2001-08-22', 2, 1),
(3, 'Алексей', 'Сидоров', 'Александрович', 'Мужской', '1999-12-10', 3, 2),
(4, 'Елена', 'Козлова', 'Дмитриевна', 'Женский', '2000-03-07', 4, 3),
(5, 'Дмитрий', 'Новиков', 'Михайлович', 'Мужской', '2001-11-30', 5, 4),
(6, '123', '123', '', 'female', '2026-04-16', 8, 2),
(7, '12312', '123', '', 'male', '2026-04-02', 9, 1),
(8, '213', '123', '', 'male', '2026-04-17', 10, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `is_admin`) VALUES
(4, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(6, 'user1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group_disciplines`
--
ALTER TABLE `group_disciplines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_group_discipline` (`group_of_students_id`,`discipline_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индексы таблицы `group_of_students`
--
ALTER TABLE `group_of_students`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `registration_address`
--
ALTER TABLE `registration_address`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_address_id` (`registration_address_id`),
  ADD KEY `group_of_students_id` (`group_of_students_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `group_disciplines`
--
ALTER TABLE `group_disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `group_of_students`
--
ALTER TABLE `group_of_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `registration_address`
--
ALTER TABLE `registration_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `group_disciplines`
--
ALTER TABLE `group_disciplines`
  ADD CONSTRAINT `group_disciplines_ibfk_1` FOREIGN KEY (`group_of_students_id`) REFERENCES `group_of_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_disciplines_ibfk_2` FOREIGN KEY (`discipline_id`) REFERENCES `discipline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`registration_address_id`) REFERENCES `registration_address` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`group_of_students_id`) REFERENCES `group_of_students` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Структура таблицы `grades`
--
CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `grade` int(1) NOT NULL CHECK (`grade` BETWEEN 2 AND 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `grades`
--
INSERT INTO `grades` (`id`, `student_id`, `discipline_id`, `grade`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 5),
(3, 2, 1, 3),
(4, 2, 2, 4),
(5, 3, 1, 5),
(6, 3, 3, 4),
(7, 4, 4, 3),
(8, 4, 5, 4),
(9, 5, 1, 4),
(10, 5, 3, 5);

--
-- Индексы таблицы `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `discipline_id` (`discipline_id`),
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`discipline_id`) REFERENCES `discipline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- AUTO_INCREMENT для таблицы `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
