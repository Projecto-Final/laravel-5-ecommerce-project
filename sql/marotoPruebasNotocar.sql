-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2015 a las 21:00:33
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(10) unsigned NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localizacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio_venta` double NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `vendido` tinyint(1) NOT NULL,
  `fecha_venda` date NOT NULL,
  `precio_inicial` double NOT NULL,
  `incremento_precio` double NOT NULL,
  `puja_mayor` double NOT NULL,
  `subastador_id` int(10) unsigned NOT NULL,
  `subcategoria_id` int(10) unsigned NOT NULL,
  `comprador_id` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre_producto`, `modelo`, `estado`, `descripcion`, `localizacion`, `precio_venta`, `fecha_inicio`, `fecha_final`, `vendido`, `fecha_venda`, `precio_inicial`, `incremento_precio`, `puja_mayor`, `subastador_id`, `subcategoria_id`, `comprador_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jojo''s bizarre adventure: all star battle', 'Juegazo', 'Optimo', 'Juego de poses', 'La Llagosta', 1200, '2015-05-07', '2015-07-07', 0, '0000-00-00', 20, 60, 20, 1, 1, 2, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(2, 'maroto', 'hombre', 'peinado', 'flequillo op', 'La Llagosta', 1222, '2015-05-07', '2015-06-01', 0, '2015-05-15', 200, 100, 300, 1, 18, 2, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(3, 'Silla de Oficina Neo', 'Neo', 'Optimo', 'Silla de oficina roja', 'Canovellas', 120, '2015-04-07', '2015-05-23', 0, '2015-05-23', 100, 2, 120, 2, 11, 1, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tecnologia', 'Artículos de ayer y hoy a precios irresistibles.', NULL, '2015-05-14 10:32:20', '2015-05-14 10:32:20'),
(2, 'Ropa', 'Artículos de moda, de todo tipo, 60,70, 80 y 90, hasta la actualidad.', NULL, '2015-05-14 10:32:20', '2015-05-14 10:32:20'),
(3, 'Libros', 'Los mejores precios, clásicos de la literatura, best sellers, entre otros.', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(4, 'Muebles', 'Todo tipo de tendencias en muebles, contemporáneos, modernos, clásicos, west y mucho mas.', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(5, 'Jugetes', 'Quien ha dicho juguetes? echa un vistazo, encuentra el regalo ideal.', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(6, 'Otros', 'Si nos falta alguna categoría,es posible que puedas encontrar lo que buscas en esta sección.', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_pujas`
--

CREATE TABLE IF NOT EXISTS `configuracion_pujas` (
  `id` int(10) unsigned NOT NULL,
  `puja_maxima` double(8,2) NOT NULL,
  `articulo_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `superada` tinyint(1) NOT NULL,
  `fecha_config` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `configuracion_pujas`
--

INSERT INTO `configuracion_pujas` (`id`, `puja_maxima`, `articulo_id`, `usuario_id`, `superada`, `fecha_config`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 200.00, 1, 3, 0, '2015-05-07', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `direccion`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '3F&M', 'C/ Stand, La Llagosta', NULL, '2015-05-14 10:32:20', '2015-05-14 10:32:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escalas`
--

CREATE TABLE IF NOT EXISTS `escalas` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `escalas`
--

INSERT INTO `escalas` (`id`, `descripcion`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nefasto', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(2, 'tolerable', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(3, 'optimo', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(4, 'bueno', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(5, 'perfecto', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `articulo_id` int(10) unsigned NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liniasms`
--

CREATE TABLE IF NOT EXISTS `liniasms` (
  `id` int(10) unsigned NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `mensaje_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `liniasms`
--

INSERT INTO `liniasms` (`id`, `texto`, `fecha`, `mensaje_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hola, cuando procedo a realizar el envió y que tipo prefieres?', '2015-05-23', 1, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(2, 'Pues, cuando antes puedas por favor, el envió lo preferiría contra-reembolso, por nacex!', '2015-05-23', 2, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(10) unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emisor_id` int(10) unsigned NOT NULL,
  `receptor_id` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `titulo`, `emisor_id`, `receptor_id`, `fecha`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Texto decente, aquí', 2, 3, '0000-00-00', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(2, 'Texto decente, aquí 2', 1, 2, '0000-00-00', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21');

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
('2009_05_04_110000_create_Empresas_table', 1),
('2010_05_04_120909_create_usuarios_table', 1),
('2010_06_04_120737_create_categorias_table', 1),
('2010_07_04_120752_create_subcategorias_table', 1),
('2010_08_04_120704_create_articulos_table', 1),
('2015_05_04_120000_create_Escalas_table', 1),
('2015_05_04_120718_create_mensajes_table', 1),
('2015_05_04_120809_create_valoracions_table', 1),
('2015_05_04_120841_create_configuracion_pujas_table', 1),
('2015_05_04_120842_create_pujas_table', 1),
('2015_05_04_120856_create_imagenes_table', 1),
('2015_05_04_120908_create_liniasMs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas`
--

CREATE TABLE IF NOT EXISTS `pujas` (
  `id` int(10) unsigned NOT NULL,
  `cantidad` double(8,2) NOT NULL,
  `superada` tinyint(1) NOT NULL,
  `confpuja_id` int(10) unsigned NOT NULL,
  `articulo_id` int(10) unsigned NOT NULL,
  `pujador_id` int(10) unsigned NOT NULL,
  `fecha_puja` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pujas`
--

INSERT INTO `pujas` (`id`, `cantidad`, `superada`, `confpuja_id`, `articulo_id`, `pujador_id`, `fecha_puja`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 300.00, 0, 0, 2, 2, '2015-05-07', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(2, 120.00, 0, 0, 3, 1, '2015-05-12', NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `nombre`, `descripcion`, `categoria_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Videojuegos', 'Encuentra todo tipo de juegos, a precios de escándalo.', 1, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(2, 'Moviles', 'Encuentra reliquias del siglo pasado, o actualiza tu actual móvil a precios de vértigo.e', 1, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(3, 'Electrodomésticos', 'Electrodomésticos de todo tipo, neveras, lavavajillas, microondas y muchos mas.', 1, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(4, 'Complementos', 'El regalo ideal, dale una buena sorpresa con el complemento ideal.', 2, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(5, 'Ropa de vestir', 'Todas las marcas, con precios que cuestan de creer.', 2, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(6, 'Lenceria', 'Te sientes atrevido, entra y mira nuestra gama de ropa interior.', 2, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(7, 'Literatura', 'Clasicos y novedades.', 3, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(8, 'Comics/Mangas', 'Te falta un tomo para terminar la colección? aquí lo encontraras, tu alma freak te lo pide.', 3, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(9, 'Poesia', 'Para los mas románticos, dedícale un buen poema a esa amada persona.', 3, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(10, 'Otros', 'Biografías, diccionarios, manuales y otros géneros.', 3, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(11, 'Interior', 'Todo tipo de tendencias para decorar tu hogar o local.', 4, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(12, 'Exterior', 'Todo tipo de tendencias para decorar tu patio, o tu terraza.', 4, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(13, 'Coleccionables', 'Te gusta coleccionar cartas, fichas, tapas, amplia tu colección aun mas.', 5, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(14, 'Figuras de accion', 'Tus personajes preferidos, hulk, batman, iron man, i muchos otros, aquí te esperan.', 5, NULL, '2015-05-14 10:32:21', '2015-05-14 10:32:21'),
(15, 'Rompecabezas', 'Un buen rompecabezas, vale todo el tiempo del mundo.', 5, NULL, '2015-05-14 10:32:22', '2015-05-14 10:32:22'),
(16, 'Antigüedades para restaurar', 'Te gusta restaurar viejos utensilios, o objetos del pasado, encuentra lo que buscas aquí.', 6, NULL, '2015-05-14 10:32:22', '2015-05-14 10:32:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen_perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen_background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reputacion` double(8,2) NOT NULL,
  `permisos` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `direccion`, `imagen_perfil`, `imagen_background`, `reputacion`, `permisos`, `email`, `password`, `username`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'sky', 'jojo.jpg', 'jojo.jpg', 5.00, 1, 'admin@admin.com', '$2y$10$voBlAU7cstn25cTkDEuDVuNV09Uk2n7TEmWmBgtQ9.RYaDmmd8r1G', 'admin', '2HmAbSZwIBKB7uxo8n13kHxkGpvpmpVESVZT3WIAulpxV7YqEqXB3PUlp6oV', '2015-05-14 10:32:20', '2015-05-14 15:58:58'),
(2, 'Usuario', 'Technician', 'C/ cadaques, La Llagosta', '', '', 1.00, 0, 'user@user.com', '$2y$10$/.YIbq87ln6ESjWP7HTszese4lyaYNdXyigdLjiRzjbZoBVKDoAxe', 'Mr.Salami', 'pCaBTlNbAb4VugEGle3MJZhhCa87R6o2yMlSeAJXSUO35Mbck46MNd7OFenf', '2015-05-14 10:32:20', '2015-05-14 16:00:22'),
(3, 'Usuaria', 'Tehnician', 'C/ serrucho, Canovelles', '', '', 1.00, 0, 'asdf@user.com', '$2y$10$s2ngL027JBK515sIv.1GEuL0tOYKgE3nvEM8Q2xdEP70r5K/l61B2', 'Twilight', 'WYRZZdrJobwWPPwUzTsW2g85eTq244bKzxPDJ3asu2QmffZWFDVxZJJeUovi', '2015-05-14 10:32:20', '2015-05-14 16:34:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracions`
--

CREATE TABLE IF NOT EXISTS `valoracions` (
  `id` int(10) unsigned NOT NULL,
  `texto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `valorado_id` int(10) unsigned NOT NULL,
  `validante_id` int(10) unsigned NOT NULL,
  `puntuacion` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `valoracions`
--

INSERT INTO `valoracions` (`id`, `texto`, `valorado_id`, `validante_id`, `puntuacion`, `fecha`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Perfecto, te doy mis dies', 3, 2, 5, '2015-05-23', NULL, '2015-05-14 10:32:22', '2015-05-14 10:32:22'),
(2, 'me gustas tu', 1, 2, 4, '2015-05-15', NULL, '2015-05-13 22:00:00', '2015-05-13 22:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`), ADD KEY `articulos_subastador_id_foreign` (`subastador_id`), ADD KEY `articulos_subcategoria_id_foreign` (`subcategoria_id`), ADD KEY `articulos_comprador_id_foreign` (`comprador_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion_pujas`
--
ALTER TABLE `configuracion_pujas`
  ADD PRIMARY KEY (`id`), ADD KEY `configuracion_pujas_articulo_id_foreign` (`articulo_id`), ADD KEY `configuracion_pujas_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `escalas`
--
ALTER TABLE `escalas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`), ADD KEY `imagenes_articulo_id_foreign` (`articulo_id`);

--
-- Indices de la tabla `liniasms`
--
ALTER TABLE `liniasms`
  ADD PRIMARY KEY (`id`), ADD KEY `liniasms_mensaje_id_foreign` (`mensaje_id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`), ADD KEY `mensajes_emisor_id_foreign` (`emisor_id`), ADD KEY `mensajes_receptor_id_foreign` (`receptor_id`);

--
-- Indices de la tabla `pujas`
--
ALTER TABLE `pujas`
  ADD PRIMARY KEY (`id`), ADD KEY `pujas_confpuja_id_foreign` (`confpuja_id`), ADD KEY `pujas_articulo_id_foreign` (`articulo_id`), ADD KEY `pujas_pujador_id_foreign` (`pujador_id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`), ADD KEY `subcategorias_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuarios_email_unique` (`email`), ADD UNIQUE KEY `usuarios_username_unique` (`username`);

--
-- Indices de la tabla `valoracions`
--
ALTER TABLE `valoracions`
  ADD PRIMARY KEY (`id`), ADD KEY `valoracions_valorado_id_foreign` (`valorado_id`), ADD KEY `valoracions_validante_id_foreign` (`validante_id`), ADD KEY `valoracions_puntuacion_foreign` (`puntuacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `configuracion_pujas`
--
ALTER TABLE `configuracion_pujas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `escalas`
--
ALTER TABLE `escalas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `liniasms`
--
ALTER TABLE `liniasms`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pujas`
--
ALTER TABLE `pujas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `valoracions`
--
ALTER TABLE `valoracions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
ADD CONSTRAINT `articulos_comprador_id_foreign` FOREIGN KEY (`comprador_id`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `articulos_subastador_id_foreign` FOREIGN KEY (`subastador_id`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `articulos_subcategoria_id_foreign` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`);

--
-- Filtros para la tabla `configuracion_pujas`
--
ALTER TABLE `configuracion_pujas`
ADD CONSTRAINT `configuracion_pujas_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`),
ADD CONSTRAINT `configuracion_pujas_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
ADD CONSTRAINT `imagenes_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`);

--
-- Filtros para la tabla `liniasms`
--
ALTER TABLE `liniasms`
ADD CONSTRAINT `liniasms_mensaje_id_foreign` FOREIGN KEY (`mensaje_id`) REFERENCES `mensajes` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
ADD CONSTRAINT `mensajes_emisor_id_foreign` FOREIGN KEY (`emisor_id`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `mensajes_receptor_id_foreign` FOREIGN KEY (`receptor_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pujas`
--
ALTER TABLE `pujas`
ADD CONSTRAINT `pujas_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`),
ADD CONSTRAINT `pujas_confpuja_id_foreign` FOREIGN KEY (`confpuja_id`) REFERENCES `configuracion_pujas` (`id`),
ADD CONSTRAINT `pujas_pujador_id_foreign` FOREIGN KEY (`pujador_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
ADD CONSTRAINT `subcategorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `valoracions`
--
ALTER TABLE `valoracions`
ADD CONSTRAINT `valoracions_puntuacion_foreign` FOREIGN KEY (`puntuacion`) REFERENCES `escalas` (`id`),
ADD CONSTRAINT `valoracions_validante_id_foreign` FOREIGN KEY (`validante_id`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `valoracions_valorado_id_foreign` FOREIGN KEY (`valorado_id`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
