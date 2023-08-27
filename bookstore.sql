
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

--
-- База данных: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bookstore`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_parent` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `cat_name`, `cat_parent`) VALUES
(1, 'Кулинария', NULL),
(2, 'Техника и информатика', NULL),
(3, 'Художественная литература', NULL),
(4, 'Детектив. Триллер', 3),
(6, 'Романтический детектив', 4),
(7, 'Исторический детектив', 4),
(8, 'Иронический детектив', 4),
(9, 'Боевики', 4),
(10, 'Энергетика. Промышленность', 2),
(11, 'Программирование', 2),
(12, 'Информатика', 2),
(13, 'Приключения', 3),
(14, 'Фантастика', 13),
(15, 'Фэнтези', 13),
(16, 'Гарри Поттер', 14),
(17, 'не Гарри Поттер', 14),
(18, 'Джон Уик', 9);


--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);


--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

