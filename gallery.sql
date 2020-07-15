-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2020 a las 15:14:28
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gallery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `enabled` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `password`, `enabled`, `created`) VALUES
(6, 'juan', 'jperez@mail.com', 'a94652aa97c7211ba8954dd15a3cf838', 1, '2020-06-17 12:07:34'),
(8, 'fede', 'fede@yahoo.es', '7d11810cf99c74a1f3fa22c3879ea39d', 1, '2020-06-17 12:46:08'),
(9, 'jcarlos', 'jcarlos@mail.com', 'a94652aa97c7211ba8954dd15a3cf838', 1, '2020-06-18 13:09:50'),
(11, 'chacho', 'chacho@chacho.es', '496c84fb22e82d68fad9e5fe8e89d03d', 1, '2020-07-15 14:07:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `size` int(11) NOT NULL,
  `text` text NOT NULL,
  `enabled` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `author_id`, `name`, `file`, `size`, `text`, `enabled`, `created`) VALUES
(20, 8, 'The blue lagoon', 'the-blue-lagoon-islandia_f0ae7287.jpg', 289181, ' El lago azul de Islandia', 1, '2020-06-17 12:46:43'),
(21, 6, '', 'reykjavik_6638389c.jpg', 899501, '', 0, '2020-06-18 20:28:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
