-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 11 2023 г., 21:19
-- Версия сервера: 10.5.17-MariaDB
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel02`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Категория 3', 'kategoriya-3', '2022-08-13 07:35:33', '2022-08-13 07:35:33'),
(7, 'Категория 4', 'kategoriya-4', '2022-08-13 14:41:54', '2022-08-13 14:41:54'),
(8, 'Экономика', 'ekonomika', '2022-09-03 14:51:18', '2022-09-03 14:51:18');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2022_08_12_182829_create_categories_table', 1),
(10, '2022_08_12_182913_create_tags_table', 1),
(11, '2022_08_12_182924_create_posts_table', 1),
(12, '2022_08_12_183038_create_post_tag_table', 1),
(13, '2022_08_23_220758_alter_table_users_add_isadmin', 2),
(14, '2022_10_06_192001_alter_table_posts_add_title_index', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `content`, `category_id`, `views`, `thumbnail`, `created_at`, `updated_at`) VALUES
(2, 'Статья 1', 'statya-1', '<p>010101</p>', '<figure class=\"image image-style-align-left\"><img src=\"/02-baseLaravel/public/uploads/ckfinder/files/2022-08-24_21-38-22.jpg\"></figure><p>Test 010101</p>', 7, 1, NULL, '2022-08-14 08:53:46', '2022-11-04 06:59:25'),
(7, 'Статья 3', 'statya-3', '333', 'Txt 333', 3, 1, 'images/2022-08-14/8rofAOtq8H9ER848XWj3N64QsaquYikp9rDSZg3u.jpg', '2022-08-14 12:22:19', '2022-10-06 09:41:15'),
(8, 'Статья 4', 'statya-4', '444', 'Txt 444', 7, 0, 'images/2022-08-14/EfwfyLkvXqYwR655TPHqsRCVUrvTZ7VHI6PxEC49.jpg', '2022-08-14 12:31:18', '2022-08-14 12:31:18'),
(9, 'Статья 5', 'statya-5', '555', 'Txt 555', 7, 2, 'images/2022-08-14/frt6qF5pJV2UpTFAE8i7svK0O2nolPRBPDUHKnPQ.jpg', '2022-08-14 12:42:13', '2022-10-06 14:49:42'),
(11, 'Отблеск молнии на МКС', 'otblesk-molnii-na-mks', '<p><strong>На снимке астронавта Челла Линдгрена</strong> — запечатлён настолько мощный удар молнии на Земле, что отблеск от неё достиг солнечных панелей Международной космической станции.&nbsp;</p>', '<p><strong>Отблеск молнии на МКС</strong><br><br>На снимке астронавта Челла Линдгрена — запечатлён настолько мощный удар молнии на Земле, что отблеск от неё достиг солнечных панелей Международной космической станции. Как прокомментировал это явление сам Челл: \"от удара такой мощнейшей молнии на Земле — освещаются даже солнечные батареи на МКС\".<br><br>Второй потрясающий момент на фото — часть прекрасной галактики Млечный Путь, выделяющейся на фоне черноты бесконечного космоса.&nbsp;</p><figure class=\"image image-style-align-left\"><img src=\"/02-baseLaravel/public/uploads/ckfinder/images/111/rbVVlRjlL_k.jpg\"></figure>', 7, 8, 'images/2022-08-25/RO413Vx1J5ZCzrmDIdSJigOL6pgXZIXaGxPxN1l2.jpg', '2022-08-25 16:16:49', '2022-10-05 07:40:07'),
(12, 'Сотни тысяч спасенных жизней', 'sotni-tysyach-spasennyh-zhizney', '<p><strong>СОТНИ ТЫСЯЧ СПАСЕННЫХ ЖИЗНЕЙ</strong> ― МЕДИЦИНСКОМУ РАДИОЛОГИЧЕСКОМУ НАУЧНОМУ ЦЕНТРУ В ОБНИНСКЕ 60 ЛЕТ</p>', '<p><strong>СОТНИ ТЫСЯЧ СПАСЕННЫХ ЖИЗНЕЙ</strong> ― МЕДИЦИНСКОМУ РАДИОЛОГИЧЕСКОМУ НАУЧНОМУ ЦЕНТРУ В ОБНИНСКЕ 60 ЛЕТ<br>60 лет для радиологии ― это совсем немного, но это та наука, которая в комплексе с другими методами в перспективе поможет победить рак. Об этом «Научная Россия» говорила с академиком, генеральным директором «НМИЦ Радиологии» Андреем Дмитриевичем Каприным на празднике в Обнинске, посвященном 60-летнему юбилею Медицинского радиологического научного центра имени А.Ф. Цыба. Торжество прошло 2 сентября.</p><figure class=\"image image-style-align-left\"><img src=\"/02-baseLaravel/public/uploads/ckfinder/images/111/O5BLx_K2oK0.jpg\"></figure>', 3, 11, 'images/2022-09-03/tEpJNTn0PdA5P79xLkcAb6TB3oQgG6Qxo5n6Qo7x.jpg', '2022-09-03 14:48:58', '2022-11-04 07:03:24'),
(13, 'Сколько мы заработали на акциях за август 2022 года?', 'skolko-my-zarabotali-na-akciyah-za-avgust-2022-goda', '<p><strong>Сколько мы заработали на акциях за август 2022 года?</strong></p><p>Российский фондовый рынок в августе продемонстрировал положительную динамику на фоне корпоративных событий.</p>', '<figure class=\"image image-style-align-left\"><img src=\"https://vk.com/emoji/e/f09f92bc.png\" alt=\"💼\"></figure><p>Сколько мы заработали на акциях за август 2022 года?</p><p>Российский фондовый рынок в августе продемонстрировал положительную динамику на фоне корпоративных событий.</p><p>В частности, рынок оживился после публикации сильных финансовых результатов Татнефти и ФосАгро за I пол. 2022 г. Далее череда рекомендаций промежуточных дивидендов вселила надежду в инвесторов, что в свою очередь привело к росту российских акций.</p><figure class=\"image image-style-align-left\"><img src=\"/02-baseLaravel/public/uploads/ckfinder/images/111/nnqh_Dqlc3I.jpg\"></figure>', 8, 12, 'images/2022-09-03/P4Z588Ugt5YVzTvX7WxCq4lQjs0wXRS8GfbG33pT.jpg', '2022-09-03 14:51:00', '2022-11-04 06:14:44');

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_tag`
--

INSERT INTO `post_tag` (`id`, `tag_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, NULL),
(2, 3, 3, NULL, NULL),
(3, 4, 3, NULL, NULL),
(4, 2, 4, '2022-08-14 08:56:53', '2022-08-14 08:56:53'),
(5, 4, 4, '2022-08-14 08:56:53', '2022-08-14 08:56:53'),
(7, 3, 5, '2022-08-14 12:21:15', '2022-08-14 12:21:15'),
(9, 2, 7, '2022-08-14 12:22:19', '2022-08-14 12:22:19'),
(10, 4, 7, '2022-08-14 12:22:19', '2022-08-14 12:22:19'),
(11, 2, 8, '2022-08-14 12:31:18', '2022-08-14 12:31:18'),
(12, 4, 8, '2022-08-14 12:31:18', '2022-08-14 12:31:18'),
(13, 2, 9, '2022-08-14 12:42:13', '2022-08-14 12:42:13'),
(17, 4, 11, '2022-08-25 16:16:49', '2022-08-25 16:16:49'),
(19, 5, 12, '2022-09-03 14:49:26', '2022-09-03 14:49:26'),
(20, 4, 13, '2022-09-03 14:51:00', '2022-09-03 14:51:00'),
(21, 5, 11, '2022-09-04 03:06:09', '2022-09-04 03:06:09');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Тег 1', 'teg-1', '2022-08-13 13:43:37', '2022-08-13 13:45:10'),
(4, 'Тег 3', 'teg-3', '2022-08-13 13:45:05', '2022-08-13 13:45:05'),
(5, 'Космос', 'kosmos', '2022-09-03 14:49:11', '2022-09-03 14:49:11');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(2, 'admin', 'admin@tes.ru', NULL, '$2y$10$12YE3ZbeRjSQiazS6Bx.2uLylK7w5z0e1tBfwthI5i9fcpguCWrQe', NULL, '2022-08-23 17:25:24', '2022-08-23 17:25:24', 1),
(3, 'user', 'user@test.ru', NULL, '$2y$10$.6GU8Wn6QV170N5JXn3a6eVwraclGKa/GpW7LEVqSXLdSO8gKvnj.', NULL, '2022-08-23 17:28:28', '2022-08-23 17:28:28', 0),
(4, 'test', 'test1@ya.ru', NULL, '$2y$10$xU7ngduU3i/XVpoxBhXJSOBqeeAZDAhvC9n/aH5BjqxsOs/KXG.t.', NULL, '2022-08-24 10:35:01', '2022-08-24 10:35:01', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_title_index` (`title`);

--
-- Индексы таблицы `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
