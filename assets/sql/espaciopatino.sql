-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-04-2019 a las 23:51:32
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `espaciopatino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

DROP TABLE IF EXISTS `pagina`;
CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL,
  `mostrar_navbar` tinyint(1) NOT NULL DEFAULT '1',
  `mostrar_home` tinyint(1) NOT NULL DEFAULT '1',
  `id_area` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `titulo`, `enlace`, `color`, `status`, `orden`, `mostrar_navbar`, `mostrar_home`, `id_area`, `id_modelo`, `id_content`) VALUES
(1, 'Quiénes Somos', 'conocenos', 'rgba(0,13, 97, 1)', 1, 1, 1, 1, 0, 3, NULL),
(2, 'Áreas', 'areas', '', 0, 0, 1, 1, 0, 0, NULL),
(3, 'Agenda', 'agenda', 'rgba(112,0, 0, 1)', 1, 4, 1, 1, 0, 5, NULL),
(6, 'Librería', 'libreria', 'rgba(118,0, 97, 1)', 1, 2, 1, 1, 0, 1, NULL),
(7, 'Noticias', 'noticias', 'rgba(177,0, 0, 1)', 1, 3, 1, 1, 0, 2, NULL),
(8, 'Convocatorias', 'categorias', 'rgba(0,86, 25, 1)', 0, 0, 1, 1, 0, 0, NULL),
(10, 'Multimedia', 'testpage', 'rgba(239,125, 0, 1)', 0, 0, 1, 1, 0, 3, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;