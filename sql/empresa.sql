-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2015 a las 15:37:07
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `article_category_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `language_id`, `position`, `user_id`, `user_id_edited`, `article_category_id`, `title`, `slug`, `introduction`, `content`, `source`, `picture`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, 1, 'qui earum ipsam', NULL, 'Voluptatem tempore neque praesentium. Voluptas nam eveniet dignissimos ad et. Similique fugit vitae quia provident.', 'Molestiae et dolor quasi culpa enim. Est modi incidunt molestiae saepe aut numquam aut. Et dolore dolor aut omnis ut et debitis. Aut itaque doloremque similique repudiandae qui inventore. Itaque dolores ipsa omnis consequatur. Suscipit sint consequatur ut temporibus dolorem. Ullam quaerat culpa voluptates qui fugit quibusdam nemo. Natus exercitationem ut rerum velit sed. Voluptatem neque error voluptatem neque non tempora unde. Modi quo nihil ex maiores accusamus. Et sint sint accusamus ipsa quia illum quibusdam. Odit minus ea voluptatem eaque quia architecto deserunt culpa.', NULL, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(2, 1, NULL, 1, NULL, 1, 'repudiandae tempore quis', NULL, 'Officiis aliquam odio sed vitae harum enim. Architecto iusto eum numquam est distinctio et dolore ea. Neque rerum non enim dicta natus vel. Suscipit nihil eveniet sapiente odit fugit voluptate perferendis.', 'Repudiandae sit hic cum similique quod vero. Incidunt voluptate fuga consectetur. Culpa et debitis distinctio corporis corrupti possimus magni. Laudantium voluptate cupiditate ex blanditiis tempore nesciunt. Qui ex similique exercitationem suscipit. Ratione fugit nihil iure vel exercitationem. Officiis asperiores et perferendis et voluptatum aut rerum. Asperiores sapiente eveniet eius id. Aliquam eos at vel magnam cupiditate. Enim dolor id vero aspernatur qui nihil.', NULL, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(3, 2, NULL, 1, NULL, 1, 'dolore fugiat sunt', NULL, 'Voluptatem rerum autem iusto beatae non. Et consequatur ducimus excepturi molestiae omnis porro illum. Velit voluptatum sint nihil autem voluptas consequatur.', 'Nobis natus ipsam iure quo ex veritatis veniam. Quisquam non voluptates ut qui excepturi. Enim labore quia hic. Possimus impedit repellat voluptas ipsam vel. Harum ut et modi fuga. Et quaerat sed impedit quia sed tenetur. Id autem repellendus consectetur porro aut nemo consequatur. Ad amet quibusdam animi cumque ut in omnis asperiores. Qui molestias laudantium praesentium necessitatibus soluta. Ea aliquam corporis sunt neque accusantium. Iste tempore esse veritatis quaerat.', NULL, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(4, 1, NULL, 1, NULL, 2, 'ut aut debitis', NULL, 'Voluptatum repellat dignissimos aut blanditiis. Et aut id et temporibus vitae ipsa. Voluptatem aut qui eius maiores voluptatum. Sequi eos rerum dolorem rem qui.', 'In aut officia amet sequi. Voluptas et odio voluptatem. Nemo dolor beatae quidem doloribus totam sapiente omnis. Dolores omnis harum quas sint. Libero itaque alias in. Dolores officia quod et delectus. Velit praesentium optio labore magni tempora fugit voluptatem nostrum. Voluptate ipsam numquam pariatur est repudiandae ipsam. Dolor quisquam reprehenderit qui enim dolor. Dolores eligendi dolores autem et cupiditate. Facere maiores velit perferendis et veritatis aut.', NULL, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_categories`
--

CREATE TABLE IF NOT EXISTS `article_categories` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `article_categories`
--

INSERT INTO `article_categories` (`id`, `language_id`, `position`, `user_id`, `user_id_edited`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 2, NULL, 'culpa omnis ut', NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(2, 1, NULL, 2, NULL, 'aliquid tempore eaque', NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(3, 3, NULL, 1, NULL, 'soluta nobis quaerat', NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(4, 2, NULL, 2, NULL, 'harum distinctio molestias', NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(5, 3, NULL, 1, NULL, 'corporis repellendus magni', NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
`id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id`, `position`, `name`, `lang_code`, `icon`, `user_id`, `user_id_edited`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'English', 'en', 'icon_flag_gb.gif', NULL, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29', NULL),
(2, NULL, 'Српски', 'sr', 'icon_flag_sr.gif', NULL, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29', NULL),
(3, NULL, 'Bosanski', 'bs', 'icon_flag_bs.gif', NULL, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29', NULL),
(4, NULL, 'POllla', 'e2q1e22e', '', 1, NULL, '2015-04-28 11:23:24', '2015-04-28 11:23:24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_18_195027_create_languages_table', 1),
('2014_10_18_225005_create_article_categories_table', 1),
('2014_10_18_225505_create_articles_table', 1),
('2014_10_18_225928_create_photo_albums_table', 1),
('2014_10_18_230227_create_video_albums_table', 1),
('2014_10_18_231619_create_photos_table', 1),
('2014_10_18_232019_create_videos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `slider` tinyint(1) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `photo_album_id` int(10) unsigned DEFAULT NULL,
  `album_cover` tinyint(1) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id`, `language_id`, `position`, `slider`, `filename`, `name`, `description`, `photo_album_id`, `album_cover`, `user_id`, `user_id_edited`, `created_at`, `updated_at`) VALUES
(3, 1, 0, 0, 'C:\\xampp\\htdocs\\laravel\\public/appfiles/photoalbum\\c307994cc08c408d4910f36b624da538.jpg', 'vel', 'Inventore ea eum qui sunt ut. Voluptatem quas enim ut atque doloremque id omnis. Officiis nulla expedita sed nihil.', 1, 1, 3, NULL, '2015-04-28 11:18:30', '2015-04-28 11:18:30'),
(5, 3, 0, 0, 'C:\\xampp\\htdocs\\laravel\\public/appfiles/photoalbum\\60006903ac21c85282c592ab9c829752.jpg', 'consequuntur', 'Repellendus atque magni totam praesentium dignissimos nulla ut. Fuga quia illum eius et. Iusto et fugit sunt soluta eum alias.', 1, 1, 1, NULL, '2015-04-28 11:18:31', '2015-04-28 11:18:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo_albums`
--

CREATE TABLE IF NOT EXISTS `photo_albums` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `folder_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `photo_albums`
--

INSERT INTO `photo_albums` (`id`, `language_id`, `position`, `name`, `description`, `folder_id`, `user_id`, `user_id_edited`, `created_at`, `updated_at`) VALUES
(1, 1, 964, 'ut voluptates quam', 'Magni et rerum ducimus et quae quisquam. Saepe nobis voluptas dolores et maiores. Mollitia non alias culpa.', '', 2, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(3, 2, 7147342, 'atque quos eius', 'Ea quo laborum culpa nihil dolorem voluptas pariatur. Voluptate ratione voluptas sed. Perspiciatis aut qui ut.', '', 1, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(4, 3, 93287, 'rem deserunt rerum', 'Qui est necessitatibus molestiae aut cum. Maxime ducimus aut magnam aut ut vero at. Veniam voluptatibus quo quas nulla est accusantium.', '', 3, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `confirmation_code`, `confirmed`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin_user', 'admin@admin.com', '$2y$10$lZCrE8RdT6JXxTG0H6JxmO6EbEstSpDkdlBSU0TThoPOT5vOjKVfm', '1601c4cb7104b9db1f08ead9daac5fac', 1, 1, 'yxajH8GcrU1NAGVGTjAtS6h7bn8jKZM1Dq30cnjzeRvZF7BAWN0dvnH9N5yc', '2015-04-28 11:18:28', '2015-04-28 11:19:15'),
(2, 'Test User', 'test_user', 'user@user.com', '$2y$10$kRYkO34Fh6QToKJ6IFqXhO0QJjGKWfLWkDfqV3kVtZjsCkE99KV8a', '6be9a77fdfa8e4a8c30f64cda4f79a59', 1, 0, NULL, '2015-04-28 11:18:28', '2015-04-28 11:18:28'),
(3, 'Dr. Mireya Moen', 'oernser', 'merl.wiegand@lebsack.org', 'ut', '538fd5826b5552624392b2d645b13a4c', 0, 0, NULL, '2015-04-28 11:18:28', '2015-04-28 11:18:28'),
(4, 'Clemens Jenkins IV', 'luna32', 'kgraham@yahoo.com', 'tempore', '538fd5826b5552624392b2d645b13a4c', 1, 0, NULL, '2015-04-28 11:18:28', '2015-04-28 11:18:28'),
(5, 'Santa Gleason', 'sallie.medhurst', 'destinee.lindgren@hotmail.com', 'eum', '538fd5826b5552624392b2d645b13a4c', 0, 0, NULL, '2015-04-28 11:18:28', '2015-04-28 11:18:28'),
(6, 'Remington Cole', 'vskiles', 'kemmer.ismael@hotmail.com', 'facere', '538fd5826b5552624392b2d645b13a4c', 1, 0, NULL, '2015-04-28 11:18:28', '2015-04-28 11:18:28'),
(7, 'Garett Howell', 'greyson.gutmann', 'collins.alexis@bode.com', 'excepturi', '538fd5826b5552624392b2d645b13a4c', 0, 0, NULL, '2015-04-28 11:18:28', '2015-04-28 11:18:28'),
(8, 'Dr. Brennan Stanton I', 'rempel.sebastian', 'cummings.newton@strackebreitenberg.org', 'adipisci', '538fd5826b5552624392b2d645b13a4c', 1, 0, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(9, 'Prof. Rosetta Volkman', 'modesta31', 'daugherty.ambrose@schusterlang.com', 'commodi', '538fd5826b5552624392b2d645b13a4c', 0, 0, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(10, 'Keagan Zemlak', 'rheidenreich', 'zena54@hotmail.com', 'asperiores', '538fd5826b5552624392b2d645b13a4c', 0, 0, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(11, 'Mafalda Windler MD', 'pouros.victor', 'emertz@gmail.com', 'dolore', '538fd5826b5552624392b2d645b13a4c', 0, 0, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29'),
(12, 'Humberto Luettgen', 'hdaniel', 'eldred34@mantekshlerin.com', 'deleniti', '538fd5826b5552624392b2d645b13a4c', 1, 0, NULL, '2015-04-28 11:18:29', '2015-04-28 11:18:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_album_id` int(10) unsigned DEFAULT NULL,
  `album_cover` tinyint(1) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `language_id`, `position`, `filename`, `name`, `description`, `youtube`, `video_album_id`, `album_cover`, `user_id`, `user_id_edited`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'C:\\xampp\\htdocs\\laravel\\public/appfiles/videoalbum\\74120a672496520089637c6ed0656942.jpg', 'ut', 'Quibusdam et et nihil veritatis reprehenderit vel vel. Dolor in optio laboriosam quos et.', 'https://www.youtube.com/watch?v=FIZ_gDOrzGk', 1, 1, 3, NULL, '2015-04-28 11:18:31', '2015-04-28 11:18:31'),
(2, 2, 1, 'C:\\xampp\\htdocs\\laravel\\public/appfiles/videoalbum\\09498242c2e72c62a59bd0f909e550b4.jpg', 'ex', 'Architecto blanditiis quae sequi. Aut tempora tenetur placeat molestias enim. Sint reiciendis occaecati sunt ipsum. Sapiente exercitationem quia pariatur praesentium occaecati cum aperiam sit.', 'https://www.youtube.com/watch?v=FIZ_gDOrzGk', 2, 0, 2, NULL, '2015-04-28 11:18:32', '2015-04-28 11:18:32'),
(3, 3, 0, 'C:\\xampp\\htdocs\\laravel\\public/appfiles/videoalbum\\7ba1a7600a7956edd5f38885e9e2cd43.jpg', 'ut', 'Ab eaque illum dolore quaerat. A eaque nisi quo eum id dolore nisi. Distinctio dolor nobis quia facilis. Aliquam excepturi consequuntur omnis autem impedit nihil aut.', 'https://www.youtube.com/watch?v=FIZ_gDOrzGk', 2, 1, 1, NULL, '2015-04-28 11:18:32', '2015-04-28 11:18:32'),
(4, 3, 1, 'C:\\xampp\\htdocs\\laravel\\public/appfiles/videoalbum\\aec956cba5846b5f567603d719133ead.jpg', 'maxime', 'Voluptates aut et vitae recusandae ut. Illo aut ad est et quis rerum. Aut voluptas harum nulla sequi distinctio est. Sunt soluta perferendis quos porro eos esse.', 'https://www.youtube.com/watch?v=FIZ_gDOrzGk', 3, 0, 1, NULL, '2015-04-28 11:18:32', '2015-04-28 11:18:32'),
(5, 3, 0, 'C:\\xampp\\htdocs\\laravel\\public/appfiles/videoalbum\\c6109e55dd1e2ea1e985785da1b6caad.jpg', 'maxime', 'Quibusdam eligendi temporibus et. Ut consectetur aut velit placeat. Rerum praesentium aspernatur consectetur id. Maxime soluta ipsam pariatur id iure voluptatem et dignissimos. Molestiae aliquam minus ut eos dicta et.', 'https://www.youtube.com/watch?v=FIZ_gDOrzGk', 2, 0, 2, NULL, '2015-04-28 11:18:33', '2015-04-28 11:18:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video_albums`
--

CREATE TABLE IF NOT EXISTS `video_albums` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `folder_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `video_albums`
--

INSERT INTO `video_albums` (`id`, `language_id`, `position`, `name`, `description`, `folder_id`, `user_id`, `user_id_edited`, `created_at`, `updated_at`) VALUES
(1, 2, 3749, 'reprehenderit ut incidunt', 'Error qui velit beatae accusamus. Tenetur in aut numquam voluptatum in ut pariatur. Reprehenderit occaecati natus et autem rerum assumenda et natus. Dolor amet id velit amet perspiciatis.', '', 2, NULL, '2015-04-28 11:18:31', '2015-04-28 11:18:31'),
(2, 3, 3290, 'quas nihil iste', 'Expedita aliquid aliquid culpa accusantium placeat. Eveniet reprehenderit nihil et aut est nihil qui tempore. Hic ea voluptatem ex. Cupiditate a voluptatum quae exercitationem quibusdam accusamus.', '', 2, NULL, '2015-04-28 11:18:31', '2015-04-28 11:18:31'),
(3, 2, 2826141, 'quidem sed commodi', 'Et officiis voluptatem voluptas odit provident repellat. Est tempora praesentium voluptas est odit non est. Quia aperiam maiores sed et.', '', 3, NULL, '2015-04-28 11:18:31', '2015-04-28 11:18:31'),
(4, 2, 995136123, 'asperiores quaerat repudiandae', 'Quisquam consectetur veritatis consequuntur itaque ipsum quibusdam minima. Quis beatae assumenda molestias eligendi sint modi nesciunt. Ullam tenetur accusamus necessitatibus est. Rerum repudiandae aperiam nemo praesentium accusamus dolore. Quos sint cum animi sunt.', '', 2, NULL, '2015-04-28 11:18:31', '2015-04-28 11:18:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`), ADD KEY `articles_language_id_foreign` (`language_id`), ADD KEY `articles_user_id_foreign` (`user_id`), ADD KEY `articles_user_id_edited_foreign` (`user_id_edited`), ADD KEY `articles_article_category_id_foreign` (`article_category_id`);

--
-- Indices de la tabla `article_categories`
--
ALTER TABLE `article_categories`
 ADD PRIMARY KEY (`id`), ADD KEY `article_categories_language_id_foreign` (`language_id`), ADD KEY `article_categories_user_id_foreign` (`user_id`), ADD KEY `article_categories_user_id_edited_foreign` (`user_id_edited`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `languages_name_unique` (`name`), ADD UNIQUE KEY `languages_lang_code_unique` (`lang_code`), ADD KEY `languages_user_id_foreign` (`user_id`), ADD KEY `languages_user_id_edited_foreign` (`user_id_edited`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
 ADD PRIMARY KEY (`id`), ADD KEY `photos_language_id_foreign` (`language_id`), ADD KEY `photos_photo_album_id_foreign` (`photo_album_id`), ADD KEY `photos_user_id_foreign` (`user_id`), ADD KEY `photos_user_id_edited_foreign` (`user_id_edited`);

--
-- Indices de la tabla `photo_albums`
--
ALTER TABLE `photo_albums`
 ADD PRIMARY KEY (`id`), ADD KEY `photo_albums_language_id_foreign` (`language_id`), ADD KEY `photo_albums_user_id_foreign` (`user_id`), ADD KEY `photo_albums_user_id_edited_foreign` (`user_id_edited`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`id`), ADD KEY `videos_language_id_foreign` (`language_id`), ADD KEY `videos_video_album_id_foreign` (`video_album_id`), ADD KEY `videos_user_id_foreign` (`user_id`), ADD KEY `videos_user_id_edited_foreign` (`user_id_edited`);

--
-- Indices de la tabla `video_albums`
--
ALTER TABLE `video_albums`
 ADD PRIMARY KEY (`id`), ADD KEY `video_albums_language_id_foreign` (`language_id`), ADD KEY `video_albums_user_id_foreign` (`user_id`), ADD KEY `video_albums_user_id_edited_foreign` (`user_id_edited`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `article_categories`
--
ALTER TABLE `article_categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `photo_albums`
--
ALTER TABLE `photo_albums`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `video_albums`
--
ALTER TABLE `video_albums`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
ADD CONSTRAINT `articles_article_category_id_foreign` FOREIGN KEY (`article_category_id`) REFERENCES `article_categories` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `articles_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
ADD CONSTRAINT `articles_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `article_categories`
--
ALTER TABLE `article_categories`
ADD CONSTRAINT `article_categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
ADD CONSTRAINT `article_categories_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `article_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `languages`
--
ALTER TABLE `languages`
ADD CONSTRAINT `languages_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `photos`
--
ALTER TABLE `photos`
ADD CONSTRAINT `photos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
ADD CONSTRAINT `photos_photo_album_id_foreign` FOREIGN KEY (`photo_album_id`) REFERENCES `photo_albums` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `photos_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `photo_albums`
--
ALTER TABLE `photo_albums`
ADD CONSTRAINT `photo_albums_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
ADD CONSTRAINT `photo_albums_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `photo_albums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
ADD CONSTRAINT `videos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
ADD CONSTRAINT `videos_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `videos_video_album_id_foreign` FOREIGN KEY (`video_album_id`) REFERENCES `video_albums` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `video_albums`
--
ALTER TABLE `video_albums`
ADD CONSTRAINT `video_albums_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
ADD CONSTRAINT `video_albums_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `video_albums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
