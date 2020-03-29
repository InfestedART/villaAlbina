-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-03-2020 a las 22:31:47
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `villaalbina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE `noticia` (
  `id_post` int(11) NOT NULL,
  `fuente` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `resumen` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_post`, `fuente`, `fecha`, `resumen`) VALUES
(1, 'Opinión', '2019-05-10', 'El rostro escondido de Villa Albina abre sus puertas hoy'),
(4, 'Norman Chinchilla para Los Tiempos', '2019-05-11', 'La mansión de la Hacienda Pairumani se erige  imponente y sobria en medio de la maravillosa campiña, a los pies de la cordillera del Tunari. Los interiores deslumbran.'),
(5, ' Mónica Briancon Messinger para Los Tiempos', '2019-06-08', 'No recuerdo cuándo fuimos con mis papás y mi hermana, además de unos amigos que venían del exterior, a conocer Villa Albina, pero hay algo que perdura en mi memoria y es el aroma de la madera de roble impregnado en mi nariz.  Hace pocos días volví a sentir ese olor y a vivir la magia que se desplegó nuevamente ante mis ojos.'),
(7, 'Adriana Trigo para Los Tiempos', '2019-05-06', 'Villa Albina es más que una ruta turística, es una promesa de amor que contiene infinidad de detalles. En un recorrido por este palacio,los ojos no tienen descanso, se mueven de arriba a abajo y giran sin pararpara apreciar pintorescas alfombras,ver elegantes e imponentes lámparas antiguas y tocar con la mirada los empapelados vieneses en las paredes. Una impresión que, sin duda, quedaráen el tiempo al contemplar llamativos objetos personales de la familia Patiño.'),
(8, 'María Angélica Melgarejo para Pagina Siete', '2019-06-04', ' La hacienda del Barón del Estaño se halla en el valle de Pairumani, a 17 kilómetros de la ciudad de Cochabamba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;