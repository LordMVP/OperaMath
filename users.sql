-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2017 a las 06:47:29
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
(12345678, 'pedro', 'perez', '321', 'masculino', 'pedro@gmail.com', '$2y$10$p9yhvI8z7cnSfECEBxai9uUKBvX7ftrCYXtf9d.xOsWXHbQqv/nIq', 'Estudiante', 'masculino.png', 'ltsEo10VF1O1jPqNoIwRkq03rqn71mCeVh5PldNR4fAu7wku3BEbMSytL16c', '2016-09-16 03:01:09', '2017-09-12 21:03:24'),
(1069747147, 'Fredy', 'Vega', '320568', 'masculino', 'fredyvega43@gmail.com', '$2y$10$XyR360fudql8y26SXqs6x.MwEENKq91y8khrrCVCt61fXbe2AvfTC', 'Administrador', 'masculino.png', 'W55rTZ6pXQFn4G2udJZ8JSu9p0tatM1nOEKlgZlCnL4sDZHbzWwfZKLTmUGf', '2017-04-30 05:21:23', '2017-12-12 10:23:03'),
(1069747589, 'Carlos', 'Cardenas', '35698546', 'masculino', 'carlos@gmail.com', '$2y$10$Dz3X6u6A/nV4GrpMPUlxn.uzIxW9AwQbGVKxSPor0j/HVc1na2I9S', 'Estudiante', 'masculino.png', 'GX8rl29ZQZON20I7VgOsDs8atfngcno11lZnNxRE58mZHgyhRjSQ4oXB3ni2', '2016-09-16 03:30:29', '2017-05-07 04:08:41'),
(1069747753, 'Administrador', 'Principal', '3202305689', 'masculino', 'administrador@gmail.com', '$2y$10$eXbz/3EzFShxuGWblbnNvOyEnW6H/WU/FVnRpfWWpbFm0hIdKeBu6', 'Administrador', 'masculino.png', 'iI6TvT7qStAs0BdScWseCoKU07mm55fwAyum1DZUy5VwQEiUBwWKNKzzmbpO', '2017-04-30 02:15:08', '2017-09-16 07:04:53');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1069747754;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
