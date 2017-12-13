-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2017 a las 09:29:59
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `operamath`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `ejer_id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `respuesta` varchar(20) NOT NULL,
  `ejer_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`ejer_id`, `tipo`, `respuesta`, `ejer_nombre`) VALUES
(1, 'suma', '3', 'Ejercicio 1'),
(2, 'suma', '5', 'Ejercicio 2'),
(3, 'suma', '4', 'Ejercicio 3'),
(4, 'suma', '7', 'Ejercicio 4'),
(5, 'suma', '6', 'Ejercicio 5'),
(6, 'resta', '1', 'Ejercicio 1'),
(7, 'resta', '2', 'Ejercicio 2'),
(8, 'resta', '3', 'Ejercicio 3'),
(9, 'resta', '3', 'Ejercicio 4'),
(10, 'resta', '9', 'Ejercicio 5'),
(11, 'multiplicacion', '6', 'Ejercicio 1'),
(12, 'multiplicacion', '6', 'Ejercicio 2'),
(13, 'multiplicacion', '8', 'Ejercicio 3'),
(14, 'multiplicacion', '10', 'Ejercicio 4'),
(15, 'multiplicacion', '12', 'Ejercicio 5'),
(16, 'division', '3', 'Ejercicio 1'),
(17, 'division', '4', 'Ejercicio 2'),
(18, 'division', '5', 'Ejercicio 3'),
(19, 'division', '5', 'Ejercicio 4'),
(20, 'division', '3', 'Ejercicio 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `imga_id` bigint(20) UNSIGNED NOT NULL,
  `imag_nombre` varchar(50) NOT NULL,
  `imag_ruta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `resp_id` bigint(20) UNSIGNED NOT NULL,
  `id` int(30) NOT NULL,
  `ejer_id` int(30) NOT NULL,
  `respuesta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`resp_id`, `id`, `ejer_id`, `respuesta`) VALUES
(2, 1069747754, 1, '1'),
(3, 1069747754, 2, '8'),
(4, 1069747754, 3, '4'),
(5, 1069747754, 4, '12'),
(6, 1069747754, 5, '9'),
(7, 1069747754, 1, '1'),
(8, 1069747754, 2, '10'),
(9, 1069747754, 3, '7'),
(10, 1069747754, 4, '7'),
(11, 1069747754, 5, '9'),
(12, 1069747754, 1, '1'),
(13, 1069747754, 2, '8'),
(14, 1069747754, 3, '1'),
(15, 1069747754, 4, '7'),
(16, 1069747754, 5, '6'),
(17, 1069747754, 1, '1'),
(18, 1069747754, 2, '2'),
(19, 1069747754, 3, '7'),
(20, 1069747754, 4, '12'),
(21, 1069747754, 5, '6'),
(22, 1069747754, 6, '1'),
(23, 1069747754, 7, '2'),
(24, 1069747754, 8, '3'),
(25, 1069747754, 9, '3'),
(26, 1069747754, 10, '9'),
(27, 1069747754, 11, '6'),
(28, 1069747754, 12, '9'),
(29, 1069747754, 13, '8'),
(30, 1069747754, 14, '10'),
(31, 1069747754, 15, '12'),
(32, 1069747754, 16, '3'),
(33, 1069747754, 17, '4'),
(34, 1069747754, 18, '5'),
(35, 1069747754, 19, '5'),
(36, 1069747754, 20, '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genero` enum('masculino','femenino') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('Administrador','Estudiante') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Estudiante',
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `telefono`, `genero`, `email`, `password`, `tipo`, `imagen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1069747147, 'Fredy', 'Vega', '320568', 'masculino', 'fredyvega43@gmail.com', '$2y$10$XyR360fudql8y26SXqs6x.MwEENKq91y8khrrCVCt61fXbe2AvfTC', 'Administrador', 'masculino.png', 'YHUZ5mafjlQ8zchN38AXoLFpk1zhS91LfMUkqUit6cXOvBDtmGCm4OxDkYnV', '2017-04-30 05:21:23', '2017-12-13 09:52:00'),
(1069747589, 'Pedro Pablo', 'Fernandez', '35698546', 'masculino', 'pedropablo@gmail.com', '$2y$10$w/Zrcjk7h5I4rD0ZxVw8.unaY1qMF/ZgZioRT22d5ymCpFe.HxMQO', 'Estudiante', 'masculino.png', 'nBP3wuOCJ3SO6oa3pmWnpy1k5F71oOHm6PltkYvPnKlQqBMHL5us9ZrXuw7q', '2016-09-16 03:30:29', '2017-12-13 09:36:49'),
(1069747753, 'Administrador', 'Principal', '3202305689', 'masculino', 'administrador@gmail.com', '$2y$10$eXbz/3EzFShxuGWblbnNvOyEnW6H/WU/FVnRpfWWpbFm0hIdKeBu6', 'Administrador', 'masculino.png', 'iI6TvT7qStAs0BdScWseCoKU07mm55fwAyum1DZUy5VwQEiUBwWKNKzzmbpO', '2017-04-30 02:15:08', '2017-09-16 07:04:53'),
(1069747754, 'karen', 'cano', '320568', 'femenino', 'karen.cano@uptc.edu.co', '$2y$10$XyR360fudql8y26SXqs6x.MwEENKq91y8khrrCVCt61fXbe2AvfTC', 'Administrador', 'femenino.png', 'B6mUsG9sgqQrcw0o08VwDYHPgAbrY6DyEcNKg0cO0kQcpLm801vZJklcxm5S', '2017-04-30 05:21:23', '2017-12-13 13:29:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`ejer_id`),
  ADD UNIQUE KEY `ejer_id` (`ejer_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`imga_id`),
  ADD UNIQUE KEY `imga_id` (`imga_id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`resp_id`),
  ADD UNIQUE KEY `resp_id` (`resp_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `ejer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `imga_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `resp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1069747756;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
