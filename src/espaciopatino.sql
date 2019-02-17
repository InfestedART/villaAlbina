-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2019 at 05:16 AM
-- Server version: 5.7.17-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espaciopatino`
--
CREATE DATABASE IF NOT EXISTS `espaciopatino` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `espaciopatino`;

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

-- --------------------------------------------------------

--
-- Table structure for table `categoria_equipo`
--

DROP TABLE IF EXISTS `categoria_equipo`;
CREATE TABLE `categoria_equipo` (
  `id_categoria_equipo` int(11) NOT NULL,
  `categoria` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoria_libro`
--

DROP TABLE IF EXISTS `categoria_libro`;
CREATE TABLE `categoria_libro` (
  `id_categoraLibro` int(11) NOT NULL,
  `categoria` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contenido`
--

DROP TABLE IF EXISTS `contenido`;
CREATE TABLE `contenido` (
  `id_post` int(11) NOT NULL,
  `contenido` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  `imagen_destacada` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`) VALUES
('admin', '$2y$10$2QpnyVxb/G/LI1k6X7xII.Vm1uqCPOJKXGdEAHDzOL.0rx/PJ/r2K'),
('test', '$2y$10$B.DR.SaGASR3pQqi/2wlRe44vSXZ7.XH0dSrqR/6a3bic1Q0ufeXq');

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
-- AUTO_INCREMENT for table `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
