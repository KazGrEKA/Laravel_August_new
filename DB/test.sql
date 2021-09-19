-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 13 2021 г., 10:30
-- Версия сервера: 10.6.4-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quia asperiores ut sapiente laborum.', 'Id non eos in facilis aut. Sit est veritatis possimus. Enim omnis cupiditate sit in.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(2, 'Exercitationem incidunt numquam non.', 'Laudantium sit laudantium quibusdam non quis excepturi aspernatur blanditiis. Nobis recusandae incidunt vel rerum voluptatem illum.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(3, 'Provident recusandae optio et at accusamus quisquam.', 'Laborum laboriosam adipisci alias ad at inventore nobis id. Est non voluptates corporis saepe quis possimus. Repudiandae vitae aut nam quo harum consequatur delectus qui.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(4, 'Dolorem aut saepe rerum corporis consequatur voluptates nulla eos iste quos.', 'Eveniet dolore tempora consequuntur atque. Ducimus qui neque rerum id ut. Nulla quisquam iure et quisquam in.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(5, 'Cupiditate sed placeat.', 'Optio quo corrupti fuga culpa sunt. Tempora aut facere eos explicabo est culpa. Laboriosam repellat est animi nostrum perspiciatis. Iure voluptas pariatur itaque exercitationem id.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(6, 'Quis corporis totam aut assumenda nihil.', 'Et ab qui corrupti eum maxime. Quisquam eum velit magni quos. Rerum et reprehenderit quaerat sunt. Officiis laboriosam voluptates iure ratione eos aut et itaque.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(7, 'Tempore ea molestias adipisci quaerat.', 'Id aut temporibus impedit provident inventore tempore quisquam maiores. Fugit dolorum sed voluptatum temporibus. Nemo rem rerum enim quas sunt et.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(8, 'Assumenda accusamus aliquid pariatur consequatur sapiente.', 'Quam est animi voluptatem temporibus molestiae minima. Iure est autem ipsa accusantium non ea consequatur.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(9, 'At vel quia ducimus suscipit.', 'Qui voluptatem aut est occaecati. Vel et quibusdam quia impedit est quam aut voluptatibus. Saepe aut molestiae iusto porro doloremque.', '2021-09-13 05:06:33', '2021-09-13 05:06:33'),
(10, 'Et natus velit consequuntur sunt doloribus iure.', 'Sed illo explicabo qui sint alias voluptatem. Doloribus ullam sunt repudiandae quidem. Aut velit qui in magnam est maiores aut.', '2021-09-13 05:06:33', '2021-09-13 05:06:33');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_11_163203_create_categories_table', 1),
(6, '2021_09_11_163243_create_news_table', 1),
(7, '2021_09_11_164510_add_status_field_in_news_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('DRAFT','PUBLISHED','BLOCKED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `image`, `author`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Asperiores omnis autem et.', NULL, 'Heidenreich', 'Voluptas vero quia dolores aspernatur. Numquam sunt dolorem id molestiae aliquam nam.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(2, 1, 'Blanditiis tenetur odio rem aut omnis aliquid corporis.', NULL, 'Dibbert', 'Voluptatem qui omnis ipsum facere. Culpa debitis omnis dolorum aut consequatur rerum. Totam ratione et eos quasi unde.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(3, 1, 'Voluptatem in fugit eum.', NULL, 'Sipes', 'Sit sapiente eum quo esse dignissimos vero eos. Sapiente ex dignissimos alias est. Et sint sunt ut voluptas. Doloremque omnis et autem rerum vel beatae.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(4, 1, 'Alias recusandae modi officiis iure doloribus.', NULL, 'Hansen', 'Voluptates dolorem alias cumque non facilis perferendis. Neque dolore corrupti blanditiis fugit molestiae est dolor.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(5, 1, 'Quidem voluptatem et ut accusantium consequatur voluptatum est vero qui doloremque dolores unde.', NULL, 'Steuber', 'Necessitatibus magni minima fugit. Quibusdam in ad aut. Itaque accusantium qui debitis nulla qui. Quo veniam architecto illum sunt.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(6, 1, 'Tempora sequi facere possimus molestiae totam sed fuga sint.', NULL, 'Shanahan', 'Doloribus earum iure vero deserunt adipisci. Nulla optio ullam quam occaecati rerum voluptas. Sed et accusantium ipsam eaque. Voluptatibus explicabo sed molestiae id dicta.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(7, 1, 'Rem nihil hic qui est tenetur.', NULL, 'Labadie', 'Est laudantium sit sint sed labore quia mollitia. Excepturi id et labore. Amet sit nostrum atque.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(8, 1, 'Aut et et.', NULL, 'Emmerich', 'Qui sit consectetur ex et fugit. At modi ut omnis porro. Odio perferendis repudiandae at qui aut. Neque aliquam fuga neque rerum eius non.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(9, 1, 'Voluptatum in qui deserunt praesentium voluptas.', NULL, 'Champlin', 'Eveniet unde quis ducimus quidem. Est expedita et sint beatae animi voluptatem voluptate. Cum molestias molestiae a neque rerum soluta.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT'),
(10, 1, 'Aliquam possimus laudantium aut voluptates quam accusantium quia laborum.', NULL, 'Littel', 'Labore ut corporis sint harum. Molestias eaque quos eos ex quo soluta et. Aliquid cumque maxime et voluptas.', '2021-09-13 05:06:33', '2021-09-13 05:06:33', 'DRAFT');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
