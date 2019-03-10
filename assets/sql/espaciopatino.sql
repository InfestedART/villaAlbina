﻿-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2019 at 07:33 PM
-- Server version: 5.7.17-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `espaciopatino`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `activa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `area`
--

TRUNCATE TABLE `area`;
-- --------------------------------------------------------

--
-- Table structure for table `categoria_equipo`
--

DROP TABLE IF EXISTS `categoria_equipo`;
CREATE TABLE `categoria_equipo` (
  `id_categoria_equipo` int(11) NOT NULL,
  `categoria` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `categoria_equipo`
--

TRUNCATE TABLE `categoria_equipo`;
-- --------------------------------------------------------

--
-- Table structure for table `categoria_libro`
--

DROP TABLE IF EXISTS `categoria_libro`;
CREATE TABLE `categoria_libro` (
  `id_categoraLibro` int(11) NOT NULL,
  `categoria` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `categoria_libro`
--

TRUNCATE TABLE `categoria_libro`;
-- --------------------------------------------------------

--
-- Table structure for table `contenido`
--

DROP TABLE IF EXISTS `contenido`;
CREATE TABLE `contenido` (
  `id_post` int(11) NOT NULL,
  `contenido` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `contenido`
--

TRUNCATE TABLE `contenido`;
-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `id_post` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `organizador` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `hora` time NOT NULL,
  `fecha_fin` date NOT NULL,
  `costo` float NOT NULL,
  `lugar` varchar(140) COLLATE utf8_spanish2_ci NOT NULL,
  `ubicacion` text COLLATE utf8_spanish2_ci NOT NULL,
  `info` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `evento`
--

TRUNCATE TABLE `evento`;
-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `id_categoriaLibro` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float DEFAULT NULL,
  `autor` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` int(11) DEFAULT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `libro`
--

TRUNCATE TABLE `libro`;
-- --------------------------------------------------------

--
-- Table structure for table `miembro_equipo`
--

DROP TABLE IF EXISTS `miembro_equipo`;
CREATE TABLE `miembro_equipo` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `cargo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `imagen` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_categoriaEquipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `miembro_equipo`
--

TRUNCATE TABLE `miembro_equipo`;
-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE `noticia` (
  `id_post` int(11) NOT NULL,
  `fuente` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `url` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `noticia`
--

TRUNCATE TABLE `noticia`;
--
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`id_post`, `fuente`, `url`) VALUES
(1, 'Página Siete / Gabriela Alanoca C.  / La Paz', 'noticia/noticia1'),
(9, 'Jackeline Rojas Heredia  / Cambio', 'noticia/INAUGURAN EXPOSICIÓN DE FOTOS EN LA ESCENA TEATRAL'),
(14, 'El Diario / Cultural', 'noticia/Nuevo espacio cultural de Fundación Simón I. Patiño'),
(21, 'PÁGINA SIETE / Gabriela Alanoca C.', 'noticia/Cassany: Divertirse con la lectura es una manera de incentivarla'),
(22, 'La Razón (Edición Impresa) / Miguel Vargas', 'noticia/Juan Rimsa, de maestro maestros'),
(24, 'Página Siete / Milen Saavedra  / La Paz', 'noticia/noticia sin imagen');

-- --------------------------------------------------------

--
-- Table structure for table `pagina`
--

DROP TABLE IF EXISTS `pagina`;
CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `pagina`
--

TRUNCATE TABLE `pagina`;
--
-- Dumping data for table `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `titulo`) VALUES
(1, 'Quiénes Somos'),
(2, 'Áreas'),
(3, 'Agenda'),
(4, 'Catálogo en línea'),
(6, 'Librería');

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE `publicacion` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `resumen` text COLLATE utf8_spanish2_ci,
  `imagen_destacada` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `publicacion`
--

TRUNCATE TABLE `publicacion`;
--
-- Dumping data for table `publicacion`
--

INSERT INTO `publicacion` (`id_post`, `titulo`, `fecha`, `resumen`, `imagen_destacada`, `tipo`) VALUES
(1, 'Espacio Simón I. Patiño abrirá en 2019 el teatro Doña Albina', '2018-12-20', 'El próximo año el espacio albergará en sus dos salas de exposición 10 muestras, la primera se realizará en abril, mientras se pretende estrenar el teatro en el primer semestre.', 'img/noticias/noticia1.jpg', 'noticia'),
(9, 'INAUGURAN EXPOSICIÓN DE FOTOS EN LA ESCENA TEATRAL', '2018-05-03', ' En la galería del Espacio Simón I. Patiño se inauguró ayer la exposición Simbiosis: La imagen fotográfica en la escena teatral, de la artista costarricense Ana Muñoz, en el marco del XI Festival Internacional de Teatro de La Paz (Fitaz)\r\n                  ', 'uploads/img_inauguran-exposicion-de-fotos-en-la-escena-teatral_1756.jpg', 'noticia'),
(14, 'Nuevo espacio cultural de Fundación Simón I. Patiño', '2018-05-03', ' asdasd\r\n                  ', 'uploads/Rosa_de_los_Vientos2.png', 'noticia'),
(18, 'Nuevo espacio cultural de Fundación Simón I. Patiño', '2018-05-03', ' asdasd\r\n                  ', 'uploads/', 'noticia'),
(19, 'Nuevo espacio cultural de Fundación Simón I. Patiño', '2018-05-03', ' asdasd\r\n                  ', 'uploads/', 'noticia'),
(20, 'Nuevo espacio cultural de Fundación Simón I. Patiño', '2018-05-03', ' asdasd\r\n                  ', 'uploads/', 'noticia'),
(21, 'Cassany: Divertirse con la lectura es una manera de incentivarla', '2018-08-14', 'El doctor Daniel Cassany llegó a La Paz para las V Jornadas Pedagógicas Internacionales. Entregó sus cuatro consejos para generar el hábito de la lectura.', 'uploads/img_cassany-divertirse-con-la-lectura-es-una-manera-de-incentivarla_190.jpg', 'noticia'),
(22, 'Juan Rimsa, de maestro maestros', '2018-12-18', 'El Espacio Patiño abrió su sala de exposiciones con una gran retrospectiva.', 'uploads/img_juan-rimsa-de-maestro-maestros_195.jpg', 'noticia'),
(24, 'noticia sin imagen', '2019-03-02', ' \r\n                  ', '', 'noticia');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `username` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncate table before insert `usuarios`
--

TRUNCATE TABLE `usuarios`;
--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`) VALUES
('admin', 'cfe6750c32a166100aadf04987cea6c8'),
('test', 'cc03e747a6afbbcbf8be7668acfebee5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `categoria_equipo`
--
ALTER TABLE `categoria_equipo`
  ADD PRIMARY KEY (`id_categoria_equipo`);

--
-- Indexes for table `categoria_libro`
--
ALTER TABLE `categoria_libro`
  ADD PRIMARY KEY (`id_categoraLibro`);

--
-- Indexes for table `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indexes for table `miembro_equipo`
--
ALTER TABLE `miembro_equipo`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`);

--
-- Indexes for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria_equipo`
--
ALTER TABLE `categoria_equipo`
  MODIFY `id_categoria_equipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `miembro_equipo`
--
ALTER TABLE `miembro_equipo`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;