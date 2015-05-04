-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2015 a las 17:43:36
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
  `puja_mayor` double NOT NULL,
  `id_subastador` int(10) unsigned NOT NULL,
  `id_subcategoria` int(10) unsigned NOT NULL,
  `id_comprador` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_pujas`
--

CREATE TABLE IF NOT EXISTS `configuracion_pujas` (
`id` int(10) unsigned NOT NULL,
  `puja_maxima` double(8,2) NOT NULL,
  `id_articulo` int(10) unsigned NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `superada` tinyint(1) NOT NULL,
  `fecha_config` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
`id` int(10) unsigned NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_articulo` int(10) unsigned NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liniasms`
--

CREATE TABLE IF NOT EXISTS `liniasms` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_mensaje` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
`id` int(10) unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_emisor` int(10) unsigned NOT NULL,
  `id_receptor` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
('2015_05_04_120829_create_configuracion_pujas_table', 1),
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
  `id_articulo` int(10) unsigned NOT NULL,
  `id_pujador` int(10) unsigned NOT NULL,
  `fecha_puja` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reputacion` int(11) NOT NULL,
  `permisos` int(11) NOT NULL,
  `contrasena` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracions`
--

CREATE TABLE IF NOT EXISTS `valoracions` (
`id` int(10) unsigned NOT NULL,
  `texto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_valorado` int(10) unsigned NOT NULL,
  `id_validante` int(10) unsigned NOT NULL,
  `puntuacion` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
 ADD PRIMARY KEY (`id`), ADD KEY `articulos_id_subastador_foreign` (`id_subastador`), ADD KEY `articulos_id_subcategoria_foreign` (`id_subcategoria`), ADD KEY `articulos_id_comprador_foreign` (`id_comprador`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion_pujas`
--
ALTER TABLE `configuracion_pujas`
 ADD PRIMARY KEY (`id`), ADD KEY `configuracion_pujas_id_articulo_foreign` (`id_articulo`), ADD KEY `configuracion_pujas_id_usuario_foreign` (`id_usuario`);

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
 ADD PRIMARY KEY (`id`), ADD KEY `imagenes_id_articulo_foreign` (`id_articulo`);

--
-- Indices de la tabla `liniasms`
--
ALTER TABLE `liniasms`
 ADD PRIMARY KEY (`id`), ADD KEY `liniasms_id_mensaje_foreign` (`id_mensaje`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
 ADD PRIMARY KEY (`id`), ADD KEY `mensajes_id_emisor_foreign` (`id_emisor`), ADD KEY `mensajes_id_receptor_foreign` (`id_receptor`);

--
-- Indices de la tabla `pujas`
--
ALTER TABLE `pujas`
 ADD PRIMARY KEY (`id`), ADD KEY `pujas_id_articulo_foreign` (`id_articulo`), ADD KEY `pujas_id_pujador_foreign` (`id_pujador`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
 ADD PRIMARY KEY (`id`), ADD KEY `subcategorias_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuarios_username_unique` (`username`);

--
-- Indices de la tabla `valoracions`
--
ALTER TABLE `valoracions`
 ADD PRIMARY KEY (`id`), ADD KEY `valoracions_id_valorado_foreign` (`id_valorado`), ADD KEY `valoracions_id_validante_foreign` (`id_validante`), ADD KEY `valoracions_puntuacion_foreign` (`puntuacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `configuracion_pujas`
--
ALTER TABLE `configuracion_pujas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `escalas`
--
ALTER TABLE `escalas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `liniasms`
--
ALTER TABLE `liniasms`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pujas`
--
ALTER TABLE `pujas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `valoracions`
--
ALTER TABLE `valoracions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
ADD CONSTRAINT `articulos_id_comprador_foreign` FOREIGN KEY (`id_comprador`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `articulos_id_subastador_foreign` FOREIGN KEY (`id_subastador`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `articulos_id_subcategoria_foreign` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id`);

--
-- Filtros para la tabla `configuracion_pujas`
--
ALTER TABLE `configuracion_pujas`
ADD CONSTRAINT `configuracion_pujas_id_articulo_foreign` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`),
ADD CONSTRAINT `configuracion_pujas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
ADD CONSTRAINT `imagenes_id_articulo_foreign` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`);

--
-- Filtros para la tabla `liniasms`
--
ALTER TABLE `liniasms`
ADD CONSTRAINT `liniasms_id_mensaje_foreign` FOREIGN KEY (`id_mensaje`) REFERENCES `mensajes` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
ADD CONSTRAINT `mensajes_id_emisor_foreign` FOREIGN KEY (`id_emisor`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `mensajes_id_receptor_foreign` FOREIGN KEY (`id_receptor`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pujas`
--
ALTER TABLE `pujas`
ADD CONSTRAINT `pujas_id_articulo_foreign` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`),
ADD CONSTRAINT `pujas_id_pujador_foreign` FOREIGN KEY (`id_pujador`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
ADD CONSTRAINT `subcategorias_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `valoracions`
--
ALTER TABLE `valoracions`
ADD CONSTRAINT `valoracions_id_validante_foreign` FOREIGN KEY (`id_validante`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `valoracions_id_valorado_foreign` FOREIGN KEY (`id_valorado`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `valoracions_puntuacion_foreign` FOREIGN KEY (`puntuacion`) REFERENCES `escalas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
