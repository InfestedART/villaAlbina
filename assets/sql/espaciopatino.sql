-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2019 a las 21:12:21
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `espaciopatino`
--
CREATE DATABASE IF NOT EXISTS `espaciopatino` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `espaciopatino`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `enlace` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `size` int(11) NOT NULL,
  `fecha` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `enlace`, `size`, `fecha`, `status`) VALUES
(1, 'uploads/agenda/agenda.pdf', 4201679, 'Abril 2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_adjunto`
--

DROP TABLE IF EXISTS `archivo_adjunto`;
CREATE TABLE `archivo_adjunto` (
  `id_archivo` int(11) NOT NULL,
  `archivo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `size` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `archivo_adjunto`
--

INSERT INTO `archivo_adjunto` (`id_archivo`, `archivo`, `size`, `id_post`) VALUES
(2, 'uploads/archivos/convocatorias-impulsarte-1-formulario31.pdf', '644981', 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `color_area` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `area`, `enlace`, `correo`, `color_area`, `status`, `id_content`) VALUES
(1, 'Dirección y Coordinación', 'direccion_y_coordinacion', 'info.dircor', 'rgb(84,33,90)', 1, NULL),
(2, 'Centros de Información y Documentación', 'centros_de_informacion_y_documentacion', 'info.cid', 'rgb(134,192,63)', 1, NULL),
(3, 'Centro de Acción Pedagógica (CAP)', 'centro_de_accion_pedagocia_(CAP)', 'info.cap', 'rgb(150,40,45)', 1, 9),
(4, 'Centro del cómic y la animación', 'centro_del_comic_y_la_animacion', 'info.comic', 'rgb(242,190,65)', 1, NULL),
(5, 'Teatro Doña Albina', 'teatro_dona_albina', 'info.teatro', 'rgb(242,150,29)', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_equipo`
--

DROP TABLE IF EXISTS `categoria_equipo`;
CREATE TABLE `categoria_equipo` (
  `id_categoria_equipo` int(11) NOT NULL,
  `categoria` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `status_categoria` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria_equipo`
--

INSERT INTO `categoria_equipo` (`id_categoria_equipo`, `categoria`, `status_categoria`) VALUES
(1, 'Dirección y Coordinación', 1),
(2, 'CEDOAL', 1),
(6, 'CAP', 1),
(7, 'Administración y Contabilidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_libro`
--

DROP TABLE IF EXISTS `categoria_libro`;
CREATE TABLE `categoria_libro` (
  `id_categoriaLibro` int(11) NOT NULL,
  `categoria` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `status_categoria` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria_libro`
--

INSERT INTO `categoria_libro` (`id_categoriaLibro`, `categoria`, `status_categoria`) VALUES
(1, 'Literatura', 1),
(2, 'Filosofía', 1),
(3, 'Artes', 1),
(4, 'Memorias', 1),
(5, 'Música', 1),
(6, 'Ecología', 1),
(7, 'Pedagogía', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complemento`
--

DROP TABLE IF EXISTS `complemento`;
CREATE TABLE `complemento` (
  `id_complemento` int(11) NOT NULL,
  `complemento` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_sidebar` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `icono` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `complemento`
--

INSERT INTO `complemento` (`id_complemento`, `complemento`, `nombre_sidebar`, `icono`) VALUES
(1, 'portada', 'Portadas', 'images');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

DROP TABLE IF EXISTS `contenido`;
CREATE TABLE `contenido` (
  `id_content` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `html` text COLLATE utf8_spanish2_ci NOT NULL,
  `mostrar` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_content`, `titulo`, `imagen`, `html`, `mostrar`) VALUES
(1, 'Nuestra Historia', 'uploads/subpagina/historia.jpg', '<p class="MsoNormal"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">El Espacio Sim&oacute;n I. Pati&ntilde;o (ESIP) inici&oacute; sus funciones en La Paz el 14 de septiembre de 1984 en la Av. 16 de Julio, El Prado, al lado del Edif. Alameda. Posteriormente, se traslad&oacute; a la calle Juan de la Riva, al Edif. Alborada. En 1993 aproximadamente volvi&oacute; al Prado, a la planta baja del Edif. Alameda. En esas primeras ubicaciones, el ESIP contaba simplemente con una oficina y una sala de exposiciones reducida. La capacidad de actividades en ese entonces era de una exposici&oacute;n al mes, con una conferencia o presentaci&oacute;n de libro. En los primeros tiempos, la programaci&oacute;n cultural del Espacio estuvo a cargo de la Direcci&oacute;n del Centro Pedag&oacute;gico y Cultural Sim&oacute;n I. Pati&ntilde;o de Cochabamba; en los a&ntilde;os sucesivos, a medida que fue ampliando sus &aacute;reas de trabajo y consolidando su presencia en la vida cultural de La Paz, el ESIP se convirti&oacute; en un centro aut&oacute;nomo con una direcci&oacute;n propia.</span></p>\n<p class="MsoNormal"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">En 1996, la Fundaci&oacute;n Sim&oacute;n I. Pati&ntilde;o inaugur&oacute; las instalaciones en el edificio Guayaquil, Avenida Ecuador, 2503, esquina Belisario Salinas, en el barrio de Sopocachi. Desde el 15 de mayo de 2006, habi&eacute;ndose ampliado el radio de acci&oacute;n del ESIP, se alquil&oacute; tambi&eacute;n un inmueble al que se denomin&oacute; &ldquo;Anexo del Espacio Pati&ntilde;o&rdquo;, situado sobre la Av. Ecuador, 2475. </span></p>\n<p class="MsoNormal"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">El 28 de septiembre de 2001 se cre&oacute; el Centro de Documentaci&oacute;n en Artes y Literaturas Latinoamericanas (CEDOAL), dos a&ntilde;os despu&eacute;s, el 29 de enero de 2003, abri&oacute; sus puertas el Caf&eacute; del C&oacute;mic, que luego se transform&oacute; en el Centro del C&oacute;mic, C+C Espacio. Desde el 2 de enero de 2008 funciona el Centro de Acci&oacute;n Pedag&oacute;gica (CAP) y el 1.&ordm; de octubre de 2013 se inaugur&oacute; el C-Musical, que originariamente se llam&oacute; Archivo Fonogr&aacute;fico del CEDOAL.</span></p>\n<p class="MsoNormal"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Actualmente, el Espacio Pati&ntilde;o funciona en su edificio propio, que cuenta tambi&eacute;n con una nueva &aacute;rea, el Teatro Do&ntilde;a Albina. El nuevo edificio, ubicado en la Av. Ecuador entre las calles Rosendo Guti&eacute;rrez y Quito, fue inaugurado oficialmente el 29 de noviembre de 2018.</span></p>\n<p>&nbsp;</p>\n<!-- [if gte mso 9]><xml>\n <o:OfficeDocumentSettings>\n  <o:AllowPNG/>\n </o:OfficeDocumentSettings>\n</xml><![endif]--><!-- [if gte mso 9]><xml>\n <w:WordDocument>\n  <w:View>Normal</w:View>\n  <w:Zoom>0</w:Zoom>\n  <w:TrackMoves/>\n  <w:TrackFormatting/>\n  <w:PunctuationKerning/>\n  <w:ValidateAgainstSchemas/>\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\n  <w:DoNotPromoteQF/>\n  <w:LidThemeOther>ES</w:LidThemeOther>\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\n  <w:Compatibility>\n   <w:BreakWrappedTables/>\n   <w:SnapToGridInCell/>\n   <w:WrapTextWithPunct/>\n   <w:UseAsianBreakRules/>\n   <w:DontGrowAutofit/>\n   <w:SplitPgBreakAndParaMark/>\n   <w:EnableOpenTypeKerning/>\n   <w:DontFlipMirrorIndents/>\n   <w:OverrideTableStyleHps/>\n  </w:Compatibility>\n  <m:mathPr>\n   <m:mathFont m:val="Cambria Math"/>\n   <m:brkBin m:val="before"/>\n   <m:brkBinSub m:val="&#45;-"/>\n   <m:smallFrac m:val="off"/>\n   <m:dispDef/>\n   <m:lMargin m:val="0"/>\n   <m:rMargin m:val="0"/>\n   <m:defJc m:val="centerGroup"/>\n   <m:wrapIndent m:val="1440"/>\n   <m:intLim m:val="subSup"/>\n   <m:naryLim m:val="undOvr"/>\n  </m:mathPr></w:WordDocument>\n</xml><![endif]--><!-- [if gte mso 9]><xml>\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"\n  DefSemiHidden="false" DefQFormat="false" DefPriority="99"\n  LatentStyleCount="371">\n  <w:LsdException Locked="false" Priority="0" QFormat="true" Name="Normal"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 1"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 2"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 3"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 4"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 5"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 6"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 7"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 8"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 9"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 6"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 7"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 8"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 9"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 1"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 2"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 3"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 4"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 5"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 6"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 7"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 8"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 9"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Normal Indent"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="footnote text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="annotation text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="header"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="footer"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index heading"/>\n  <w:LsdException Locked="false" Priority="35" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="caption"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="table of figures"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="envelope address"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="envelope return"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="footnote reference"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="annotation reference"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="line number"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="page number"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="endnote reference"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="endnote text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="table of authorities"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="macro"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="toa heading"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number 5"/>\n  <w:LsdException Locked="false" Priority="10" QFormat="true" Name="Title"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Closing"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Signature"/>\n  <w:LsdException Locked="false" Priority="1" SemiHidden="true"\n   UnhideWhenUsed="true" Name="Default Paragraph Font"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text Indent"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Message Header"/>\n  <w:LsdException Locked="false" Priority="11" QFormat="true" Name="Subtitle"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Salutation"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Date"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text First Indent"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text First Indent 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Note Heading"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text Indent 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text Indent 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Block Text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Hyperlink"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="FollowedHyperlink"/>\n  <w:LsdException Locked="false" Priority="22" QFormat="true" Name="Strong"/>\n  <w:LsdException Locked="false" Priority="20" QFormat="true" Name="Emphasis"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Document Map"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Plain Text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="E-mail Signature"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Top of Form"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Bottom of Form"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Normal (Web)"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Acronym"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Address"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Cite"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Code"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Definition"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Keyboard"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Preformatted"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Sample"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Typewriter"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Variable"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Normal Table"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="annotation subject"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="No List"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Outline List 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Outline List 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Outline List 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Simple 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Simple 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Simple 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Classic 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Classic 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Classic 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Classic 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Colorful 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Colorful 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Colorful 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 6"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 7"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 8"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 6"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 7"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 8"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table 3D effects 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table 3D effects 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table 3D effects 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Contemporary"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Elegant"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Professional"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Subtle 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Subtle 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Web 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Web 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Web 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Balloon Text"/>\n  <w:LsdException Locked="false" Priority="39" Name="Table Grid"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Theme"/>\n  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>\n  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>\n  <w:LsdException Locked="false" Priority="34" QFormat="true"\n   Name="List Paragraph"/>\n  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>\n  <w:LsdException Locked="false" Priority="30" QFormat="true"\n   Name="Intense Quote"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>\n  <w:LsdException Locked="false" Priority="19" QFormat="true"\n   Name="Subtle Emphasis"/>\n  <w:LsdException Locked="false" Priority="21" QFormat="true"\n   Name="Intense Emphasis"/>\n  <w:LsdException Locked="false" Priority="31" QFormat="true"\n   Name="Subtle Reference"/>\n  <w:LsdException Locked="false" Priority="32" QFormat="true"\n   Name="Intense Reference"/>\n  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>\n  <w:LsdException Locked="false" Priority="37" SemiHidden="true"\n   UnhideWhenUsed="true" Name="Bibliography"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>\n  <w:LsdException Locked="false" Priority="41" Name="Plain Table 1"/>\n  <w:LsdException Locked="false" Priority="42" Name="Plain Table 2"/>\n  <w:LsdException Locked="false" Priority="43" Name="Plain Table 3"/>\n  <w:LsdException Locked="false" Priority="44" Name="Plain Table 4"/>\n  <w:LsdException Locked="false" Priority="45" Name="Plain Table 5"/>\n  <w:LsdException Locked="false" Priority="40" Name="Grid Table Light"/>\n  <w:LsdException Locked="false" Priority="46" Name="Grid Table 1 Light"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark"/>\n  <w:LsdException Locked="false" Priority="51" Name="Grid Table 6 Colorful"/>\n  <w:LsdException Locked="false" Priority="52" Name="Grid Table 7 Colorful"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 1"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 1"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 1"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 1"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 1"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 1"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 2"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 2"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 2"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 2"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 2"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 2"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 3"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 3"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 3"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 3"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 3"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 3"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 4"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 4"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 4"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 4"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 4"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 4"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 5"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 5"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 5"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 5"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 5"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 5"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 6"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 6"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 6"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 6"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 6"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 6"/>\n  <w:LsdException Locked="false" Priority="46" Name="List Table 1 Light"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark"/>\n  <w:LsdException Locked="false" Priority="51" Name="List Table 6 Colorful"/>\n  <w:LsdException Locked="false" Priority="52" Name="List Table 7 Colorful"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 1"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 1"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 1"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 1"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 1"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 1"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 2"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 2"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 2"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 2"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 2"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 2"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 3"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 3"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 3"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 3"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 3"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 3"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 4"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 4"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 4"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 4"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 4"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 4"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 5"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 5"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 5"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 5"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 5"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 5"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 6"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 6"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 6"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 6"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 6"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 6"/>\n </w:LatentStyles>\n</xml><![endif]--><!-- [if gte mso 10]>\n<style>\n /* Style Definitions */\n table.MsoNormalTable\n  {mso-style-name:"Table Normal";\n mso-tstyle-rowband-size:0;\n  mso-tstyle-colband-size:0;\n  mso-style-noshow:yes;\n mso-style-priority:99;\n  mso-style-parent:"";\n  mso-padding-alt:0in 5.4pt 0in 5.4pt;\n  mso-para-margin-top:0in;\n  mso-para-margin-right:0in;\n  mso-para-margin-bottom:8.0pt;\n mso-para-margin-left:0in;\n line-height:107%;\n mso-pagination:widow-orphan;\n  font-size:11.0pt;\n font-family:"Calibri",sans-serif;\n mso-ascii-font-family:Calibri;\n  mso-ascii-theme-font:minor-latin;\n mso-hansi-font-family:Calibri;\n  mso-hansi-theme-font:minor-latin;\n mso-bidi-font-family:"Times New Roman";\n mso-bidi-theme-font:minor-bidi;\n mso-ansi-language:ES;}\n</style>\n<![endif]-->', 1);
INSERT INTO `contenido` (`id_content`, `titulo`, `imagen`, `html`, `mostrar`) VALUES
(2, 'Misión y Visión', 'uploads/subpagina/mision_vision.jpg', '<p><!-- [if gte mso 9]><xml>\n <o:OfficeDocumentSettings>\n  <o:AllowPNG/>\n </o:OfficeDocumentSettings>\n</xml><![endif]--><!-- [if gte mso 9]><xml>\n <w:WordDocument>\n  <w:View>Normal</w:View>\n  <w:Zoom>0</w:Zoom>\n  <w:TrackMoves/>\n  <w:TrackFormatting/>\n  <w:PunctuationKerning/>\n  <w:ValidateAgainstSchemas/>\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\n  <w:DoNotPromoteQF/>\n  <w:LidThemeOther>ES</w:LidThemeOther>\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\n  <w:Compatibility>\n   <w:BreakWrappedTables/>\n   <w:SnapToGridInCell/>\n   <w:WrapTextWithPunct/>\n   <w:UseAsianBreakRules/>\n   <w:DontGrowAutofit/>\n   <w:SplitPgBreakAndParaMark/>\n   <w:EnableOpenTypeKerning/>\n   <w:DontFlipMirrorIndents/>\n   <w:OverrideTableStyleHps/>\n  </w:Compatibility>\n  <m:mathPr>\n   <m:mathFont m:val="Cambria Math"/>\n   <m:brkBin m:val="before"/>\n   <m:brkBinSub m:val="&#45;-"/>\n   <m:smallFrac m:val="off"/>\n   <m:dispDef/>\n   <m:lMargin m:val="0"/>\n   <m:rMargin m:val="0"/>\n   <m:defJc m:val="centerGroup"/>\n   <m:wrapIndent m:val="1440"/>\n   <m:intLim m:val="subSup"/>\n   <m:naryLim m:val="undOvr"/>\n  </m:mathPr></w:WordDocument>\n</xml><![endif]--><!-- [if gte mso 9]><xml>\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"\n  DefSemiHidden="false" DefQFormat="false" DefPriority="99"\n  LatentStyleCount="371">\n  <w:LsdException Locked="false" Priority="0" QFormat="true" Name="Normal"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 1"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 2"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 3"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 4"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 5"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 6"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 7"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 8"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="heading 9"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 6"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 7"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 8"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index 9"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 1"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 2"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 3"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 4"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 5"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 6"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 7"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 8"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" Name="toc 9"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Normal Indent"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="footnote text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="annotation text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="header"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="footer"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="index heading"/>\n  <w:LsdException Locked="false" Priority="35" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="caption"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="table of figures"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="envelope address"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="envelope return"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="footnote reference"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="annotation reference"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="line number"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="page number"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="endnote reference"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="endnote text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="table of authorities"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="macro"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="toa heading"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Bullet 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Number 5"/>\n  <w:LsdException Locked="false" Priority="10" QFormat="true" Name="Title"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Closing"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Signature"/>\n  <w:LsdException Locked="false" Priority="1" SemiHidden="true"\n   UnhideWhenUsed="true" Name="Default Paragraph Font"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text Indent"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="List Continue 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Message Header"/>\n  <w:LsdException Locked="false" Priority="11" QFormat="true" Name="Subtitle"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Salutation"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Date"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text First Indent"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text First Indent 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Note Heading"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text Indent 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Body Text Indent 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Block Text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Hyperlink"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="FollowedHyperlink"/>\n  <w:LsdException Locked="false" Priority="22" QFormat="true" Name="Strong"/>\n  <w:LsdException Locked="false" Priority="20" QFormat="true" Name="Emphasis"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Document Map"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Plain Text"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="E-mail Signature"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Top of Form"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Bottom of Form"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Normal (Web)"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Acronym"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Address"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Cite"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Code"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Definition"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Keyboard"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Preformatted"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Sample"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Typewriter"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="HTML Variable"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Normal Table"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="annotation subject"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="No List"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Outline List 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Outline List 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Outline List 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Simple 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Simple 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Simple 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Classic 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Classic 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Classic 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Classic 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Colorful 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Colorful 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Colorful 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Columns 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 6"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 7"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Grid 8"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 4"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 5"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 6"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 7"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table List 8"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table 3D effects 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table 3D effects 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table 3D effects 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Contemporary"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Elegant"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Professional"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Subtle 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Subtle 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Web 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Web 2"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Web 3"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Balloon Text"/>\n  <w:LsdException Locked="false" Priority="39" Name="Table Grid"/>\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\n   Name="Table Theme"/>\n  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>\n  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>\n  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>\n  <w:LsdException Locked="false" Priority="34" QFormat="true"\n   Name="List Paragraph"/>\n  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>\n  <w:LsdException Locked="false" Priority="30" QFormat="true"\n   Name="Intense Quote"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>\n  <w:LsdException Locked="false" Priority="19" QFormat="true"\n   Name="Subtle Emphasis"/>\n  <w:LsdException Locked="false" Priority="21" QFormat="true"\n   Name="Intense Emphasis"/>\n  <w:LsdException Locked="false" Priority="31" QFormat="true"\n   Name="Subtle Reference"/>\n  <w:LsdException Locked="false" Priority="32" QFormat="true"\n   Name="Intense Reference"/>\n  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>\n  <w:LsdException Locked="false" Priority="37" SemiHidden="true"\n   UnhideWhenUsed="true" Name="Bibliography"/>\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\n   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>\n  <w:LsdException Locked="false" Priority="41" Name="Plain Table 1"/>\n  <w:LsdException Locked="false" Priority="42" Name="Plain Table 2"/>\n  <w:LsdException Locked="false" Priority="43" Name="Plain Table 3"/>\n  <w:LsdException Locked="false" Priority="44" Name="Plain Table 4"/>\n  <w:LsdException Locked="false" Priority="45" Name="Plain Table 5"/>\n  <w:LsdException Locked="false" Priority="40" Name="Grid Table Light"/>\n  <w:LsdException Locked="false" Priority="46" Name="Grid Table 1 Light"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark"/>\n  <w:LsdException Locked="false" Priority="51" Name="Grid Table 6 Colorful"/>\n  <w:LsdException Locked="false" Priority="52" Name="Grid Table 7 Colorful"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 1"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 1"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 1"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 1"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 1"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 1"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 2"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 2"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 2"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 2"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 2"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 2"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 3"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 3"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 3"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 3"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 3"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 3"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 4"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 4"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 4"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 4"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 4"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 4"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 5"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 5"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 5"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 5"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 5"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 5"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="Grid Table 1 Light Accent 6"/>\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 6"/>\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 6"/>\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 6"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="Grid Table 6 Colorful Accent 6"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="Grid Table 7 Colorful Accent 6"/>\n  <w:LsdException Locked="false" Priority="46" Name="List Table 1 Light"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark"/>\n  <w:LsdException Locked="false" Priority="51" Name="List Table 6 Colorful"/>\n  <w:LsdException Locked="false" Priority="52" Name="List Table 7 Colorful"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 1"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 1"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 1"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 1"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 1"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 1"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 2"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 2"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 2"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 2"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 2"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 2"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 3"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 3"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 3"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 3"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 3"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 3"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 4"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 4"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 4"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 4"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 4"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 4"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 5"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 5"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 5"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 5"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 5"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 5"/>\n  <w:LsdException Locked="false" Priority="46"\n   Name="List Table 1 Light Accent 6"/>\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 6"/>\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 6"/>\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 6"/>\n  <w:LsdException Locked="false" Priority="51"\n   Name="List Table 6 Colorful Accent 6"/>\n  <w:LsdException Locked="false" Priority="52"\n   Name="List Table 7 Colorful Accent 6"/>\n </w:LatentStyles>\n</xml><![endif]--><!-- [if gte mso 10]>\n<style>\n /* Style Definitions */\n table.MsoNormalTable\n {mso-style-name:"Table Normal";\n mso-tstyle-rowband-size:0;\n  mso-tstyle-colband-size:0;\n  mso-style-noshow:yes;\n mso-style-priority:99;\n  mso-style-parent:"";\n  mso-padding-alt:0in 5.4pt 0in 5.4pt;\n  mso-para-margin-top:0in;\n  mso-para-margin-right:0in;\n  mso-para-margin-bottom:8.0pt;\n mso-para-margin-left:0in;\n line-height:107%;\n mso-pagination:widow-orphan;\n  font-size:11.0pt;\n font-family:"Calibri",sans-serif;\n mso-ascii-font-family:Calibri;\n  mso-ascii-theme-font:minor-latin;\n mso-hansi-font-family:Calibri;\n  mso-hansi-theme-font:minor-latin;\n mso-bidi-font-family:"Times New Roman";\n mso-bidi-theme-font:minor-bidi;\n mso-ansi-language:ES;}\n</style>\n<![endif]--></p>\n<p class="MsoNormal"><strong style="mso-bidi-font-weight: normal;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Misi&oacute;n</span></strong></p>\n<p class="MsoNormal"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Nuestra misi&oacute;n es proyectar, ejecutar y promover, actividades culturales y de formaci&oacute;n desde un enfoque solidario, pluralista e integrador, de di&aacute;logo entre individuos, culturas e instituciones; atender a los usuarios y al p&uacute;blico con profesionalidad, amabilidad y esmero.</span></p>\n<p class="MsoNormal"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Partimos de la puesta en valor y difusi&oacute;n de diferentes manifestaciones culturales y de formaci&oacute;n, participando activamente en los procesos de investigaci&oacute;n, ense&ntilde;anza - aprendizaje, creaci&oacute;n, producci&oacute;n y difusi&oacute;n intelectual y art&iacute;stica, preservaci&oacute;n y conservaci&oacute;n del patrimonio documental, tangible e intangible, estudio y aplicaci&oacute;n de nuevas tecnolog&iacute;as.</span></p>\n<p class="MsoNormal"><strong style="mso-bidi-font-weight: normal;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Visi&oacute;n</span></strong></p>\n<p class="MsoNormal"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Establecer nuestra presencia como referente cultural y de formaci&oacute;n, incentivando la creatividad, la investigaci&oacute;n, el estudio y la aplicaci&oacute;n de nuevas tecnolog&iacute;as, junto a la preservaci&oacute;n del patrimonio y la memoria, promoviendo los valores humanos universales, la solidaridad y el di&aacute;logo entre culturas, participando en la construcci&oacute;n de ciudadanos innovadores, cr&iacute;ticos y proactivos.</span></p>', 1),
(3, 'Equipo de Trabajo', 'uploads/subpagina/equipo.jpg', '', 0),
(9, 'Centro de Acción Pedagógica (CAP)', 'uploads/areas/img_centro-de-accion-pedagogica-cap_18.jpg', '<p>El Centro de Acción Pedagógica CAP busca proyectar y concretar acciones de apoyo complementarias y/o alternativas a la educación formal; algunas de ellas orientadas al trabajo en aula de maestros y educadores, otras orientadas a la promoción de la lectura para niños y niñas.<br><br>A lo largo de los años, el CAP se ha convertido en un referente en el campo de la educación y la literatura infantil en Bolivia. Entre sus actividades se destacan las jornadas pedagógicas internacionales, los talleres con invitados internacionales, el taller de actualización educativa, el homenaje a pedagogos bolivianos, el fomento al libro álbum, los talleres de animación a la lectura para niños y niñas, y los talleres de creación artística dirigidos también al público infantil.</p>', 1);
INSERT INTO `contenido` (`id_content`, `titulo`, `imagen`, `html`, `mostrar`) VALUES
(10, 'Actividades', '', '<p><!-- [if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!-- [if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>ES</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"/>\r\n   <m:brkBin m:val="before"/>\r\n   <m:brkBinSub m:val="--"/>\r\n   <m:smallFrac m:val="off"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val="0"/>\r\n   <m:rMargin m:val="0"/>\r\n   <m:defJc m:val="centerGroup"/>\r\n   <m:wrapIndent m:val="1440"/>\r\n   <m:intLim m:val="subSup"/>\r\n   <m:naryLim m:val="undOvr"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!-- [if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"\r\n  DefSemiHidden="false" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="371">\r\n  <w:LsdException Locked="false" Priority="0" QFormat="true" Name="Normal"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 1"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="heading 2"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="heading 3"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="heading 4"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="heading 5"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="heading 6"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="heading 7"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="heading 8"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="heading 9"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 5"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 6"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 7"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 8"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index 9"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 1"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 2"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 3"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 4"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 5"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 6"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 7"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 8"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="toc 9"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Normal Indent"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="footnote text"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="annotation text"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="header"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="footer"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="index heading"/>\r\n  <w:LsdException Locked="false" Priority="35" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="caption"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="table of figures"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="envelope address"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="envelope return"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="footnote reference"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="annotation reference"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="line number"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="page number"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="endnote reference"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="endnote text"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="table of authorities"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="macro"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="toa heading"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Bullet"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Number"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List 5"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Bullet 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Bullet 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Bullet 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Bullet 5"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Number 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Number 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Number 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Number 5"/>\r\n  <w:LsdException Locked="false" Priority="10" QFormat="true" Name="Title"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Closing"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Signature"/>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="Default Paragraph Font"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Body Text"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Body Text Indent"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Continue"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Continue 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Continue 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Continue 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="List Continue 5"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Message Header"/>\r\n  <w:LsdException Locked="false" Priority="11" QFormat="true" Name="Subtitle"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Salutation"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Date"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Body Text First Indent"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Body Text First Indent 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Note Heading"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Body Text 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Body Text 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Body Text Indent 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Body Text Indent 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Block Text"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Hyperlink"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="FollowedHyperlink"/>\r\n  <w:LsdException Locked="false" Priority="22" QFormat="true" Name="Strong"/>\r\n  <w:LsdException Locked="false" Priority="20" QFormat="true" Name="Emphasis"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Document Map"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Plain Text"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="E-mail Signature"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Top of Form"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Bottom of Form"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Normal (Web)"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Acronym"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Address"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Cite"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Code"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Definition"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Keyboard"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Preformatted"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Sample"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Typewriter"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="HTML Variable"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Normal Table"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="annotation subject"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="No List"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Outline List 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Outline List 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Outline List 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Simple 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Simple 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Simple 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Classic 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Classic 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Classic 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Classic 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Colorful 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Colorful 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Colorful 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Columns 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Columns 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Columns 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Columns 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Columns 5"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Grid 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Grid 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Grid 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Grid 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Grid 5"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Grid 6"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Grid 7"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Grid 8"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table List 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table List 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table List 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table List 4"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table List 5"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table List 6"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table List 7"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table List 8"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table 3D effects 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table 3D effects 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table 3D effects 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Contemporary"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Elegant"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Professional"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Subtle 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Subtle 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Web 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Web 2"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Web 3"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Balloon Text"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="Table Grid"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"\r\n   Name="Table Theme"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>\r\n  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>\r\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>\r\n  <w:LsdException Locked="false" Priority="61" Name="Light List"/>\r\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>\r\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>\r\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>\r\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>\r\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>\r\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>\r\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>\r\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>\r\n  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>\r\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>\r\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>\r\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>\r\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>\r\n  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>\r\n  <w:LsdException Locked="false" Priority="34" QFormat="true"\r\n   Name="List Paragraph"/>\r\n  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>\r\n  <w:LsdException Locked="false" Priority="30" QFormat="true"\r\n   Name="Intense Quote"/>\r\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="19" QFormat="true"\r\n   Name="Subtle Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="21" QFormat="true"\r\n   Name="Intense Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="31" QFormat="true"\r\n   Name="Subtle Reference"/>\r\n  <w:LsdException Locked="false" Priority="32" QFormat="true"\r\n   Name="Intense Reference"/>\r\n  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>\r\n  <w:LsdException Locked="false" Priority="37" SemiHidden="true"\r\n   UnhideWhenUsed="true" Name="Bibliography"/>\r\n  <w:LsdException Locked="false" Priority="39" SemiHidden="true"\r\n   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>\r\n  <w:LsdException Locked="false" Priority="41" Name="Plain Table 1"/>\r\n  <w:LsdException Locked="false" Priority="42" Name="Plain Table 2"/>\r\n  <w:LsdException Locked="false" Priority="43" Name="Plain Table 3"/>\r\n  <w:LsdException Locked="false" Priority="44" Name="Plain Table 4"/>\r\n  <w:LsdException Locked="false" Priority="45" Name="Plain Table 5"/>\r\n  <w:LsdException Locked="false" Priority="40" Name="Grid Table Light"/>\r\n  <w:LsdException Locked="false" Priority="46" Name="Grid Table 1 Light"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark"/>\r\n  <w:LsdException Locked="false" Priority="51" Name="Grid Table 6 Colorful"/>\r\n  <w:LsdException Locked="false" Priority="52" Name="Grid Table 7 Colorful"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="Grid Table 1 Light Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="Grid Table 6 Colorful Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="Grid Table 7 Colorful Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="Grid Table 1 Light Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="Grid Table 6 Colorful Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="Grid Table 7 Colorful Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="Grid Table 1 Light Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="Grid Table 6 Colorful Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="Grid Table 7 Colorful Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="Grid Table 1 Light Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="Grid Table 6 Colorful Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="Grid Table 7 Colorful Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="Grid Table 1 Light Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="Grid Table 6 Colorful Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="Grid Table 7 Colorful Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="Grid Table 1 Light Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="Grid Table 6 Colorful Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="Grid Table 7 Colorful Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="46" Name="List Table 1 Light"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark"/>\r\n  <w:LsdException Locked="false" Priority="51" Name="List Table 6 Colorful"/>\r\n  <w:LsdException Locked="false" Priority="52" Name="List Table 7 Colorful"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="List Table 1 Light Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="List Table 6 Colorful Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="List Table 7 Colorful Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="List Table 1 Light Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="List Table 6 Colorful Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="List Table 7 Colorful Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="List Table 1 Light Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="List Table 6 Colorful Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="List Table 7 Colorful Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="List Table 1 Light Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="List Table 6 Colorful Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="List Table 7 Colorful Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="List Table 1 Light Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="List Table 6 Colorful Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="List Table 7 Colorful Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="46"\r\n   Name="List Table 1 Light Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="51"\r\n   Name="List Table 6 Colorful Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="52"\r\n   Name="List Table 7 Colorful Accent 6"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!-- [if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n {mso-style-name:"Table Normal";\r\n mso-tstyle-rowband-size:0;\r\n  mso-tstyle-colband-size:0;\r\n  mso-style-noshow:yes;\r\n mso-style-priority:99;\r\n  mso-style-parent:"";\r\n  mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n  mso-para-margin-top:0in;\r\n  mso-para-margin-right:0in;\r\n  mso-para-margin-bottom:8.0pt;\r\n mso-para-margin-left:0in;\r\n line-height:107%;\r\n mso-pagination:widow-orphan;\r\n  font-size:11.0pt;\r\n font-family:"Calibri",sans-serif;\r\n mso-ascii-font-family:Calibri;\r\n  mso-ascii-theme-font:minor-latin;\r\n mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;\r\n mso-bidi-font-family:"Times New Roman";\r\n mso-bidi-theme-font:minor-bidi;\r\n mso-ansi-language:ES;}\r\n</style>\r\n<![endif]--></p>\r\n<p class="MsoNormal"><strong style="mso-bidi-font-weight: normal;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Escuela de espectadores</span></strong></p>\r\n<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">La escuela de espectadores es un espacio de encuentro en el que las personas interesadas en las artes esc&eacute;nicas se re&uacute;nen para analizar obras de teatro en cartelera, con el objetivo de aprender y formarse como espectadores.</span></p>\r\n<p class="MsoNormal"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Las sesiones se realizan cada &uacute;ltimo lunes del mes, a las 19:00 h.</span></p>\r\n<p class="MsoNormal"><strong style="mso-bidi-font-weight: normal;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Encuentro de cine</span></strong></p>\r\n<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">El encuentro de cine es un evento bienal que tiene por objetivo, promover el di&aacute;logo entre cr&iacute;ticos y realizadores y de &eacute;stos con el p&uacute;blico, estableciendo un escenario de reflexi&oacute;n.</span></p>\r\n<p class="MsoNormal"><strong style="mso-bidi-font-weight: normal;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Protagonistas de la m&uacute;sica</span></strong></p>\r\n<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Se caracteriza por ser un encuentro dirigido por especialistas en materia musical, que cuenta en ocasiones con invitados especiales. Se desarrolla a partir de sesiones programadas en temas espec&iacute;ficos, como el jazz y la m&uacute;sica boliviana.</span></p>\r\n<p class="MsoNormal"><strong style="mso-bidi-font-weight: normal;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Presentaciones de libros</span></strong></p>\r\n<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">El objetivo principal es difundir y apoyar la producci&oacute;n literaria nacional y las investigaciones concluidas por los autores en las diferentes &aacute;reas del conocimiento.</span></p>\r\n<p class="MsoNormal"><strong style="mso-bidi-font-weight: normal;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Feria Internacional del Libro de La Paz</span></strong></p>\r\n<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">El CID en este evento organizado cada a&ntilde;o por la C&aacute;mara Departamental del Libro de La Paz, se hace cargo del stand de la Fundaci&oacute;n Sim&oacute;n I. Pati&ntilde;o, exponiendo y ofreciendo las publicaciones editadas por los diferentes centros en Bolivia.</span></p>\r\n<p class="MsoNormal"><strong style="mso-bidi-font-weight: normal;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Talleres te&oacute;rico-pr&aacute;cticos</span></strong></p>\r\n<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-bidi-font-family: Calibri; mso-bidi-theme-font: minor-latin;">Los talleres son dirigidos por expertos nacionales e internacionales, y tienen como objetivo principal la formaci&oacute;n y actualizaci&oacute;n en la diversidad de tem&aacute;ticas que caracteriza el CID. </span></p>', 1),
(11, 'Centro Hemerográfico Especializado', 'uploads/areas/6_CENTRO_HEMEROGRAFICO_web.jpg', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

DROP TABLE IF EXISTS `convocatoria`;
CREATE TABLE `convocatoria` (
  `id_post` int(11) NOT NULL,
  `fecha_limite` date NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`id_post`, `fecha_limite`, `descripcion`) VALUES
(49, '2019-06-28', 'Concurso libro álbum'),
(65, '2019-05-21', ''),
(66, '2019-05-17', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `defaults`
--

DROP TABLE IF EXISTS `defaults`;
CREATE TABLE `defaults` (
  `property` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `defaults`
--

INSERT INTO `defaults` (`property`, `value`) VALUES
('agenda_size', '4201679'),
('agenda_url', 'uploads/agenda.php'),
('api_key', '1n48pojr4gfamfuaj5s4zdnahxxrtnx92nsgp1wthmsxzz13'),
('primary_color', 'rgb(239, 125, 0)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `id_post` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `organizador` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rango` tinyint(1) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora` time NOT NULL,
  `lugar` varchar(140) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `info` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_post`, `id_area`, `organizador`, `rango`, `fecha_ini`, `fecha_fin`, `hora`, `lugar`, `descripcion`, `info`) VALUES
(39, 2, 'Espacio Simón I. Patiño', 1, '2019-02-06', '2019-06-05', '18:00:00', '5.° piso, aula 3', '¿Existe una diferencia entre autor y autora?, ¿qué representaciones de la masculinidad y de lo femenino existen en la literatura?, ¿qué otras figuraciones se pueden rastrear lejos de ese binarismo?, ¿es el género un rasgo de identidad o un estado pasajero por el que atraviesa un sujeto? Estas y más preguntas serán ampliadas en el quinto curso de teoría literaria.', 'Todos los miércoles\r\nEstudiantes Bs 350, artistas Bs 400 y profesionales Bs 500\r\nCupo limitado\r\n\r\nInformaciones e inscripciones:\r\nRecepción\r\nSopocachi, av. Ecuador\r\nentre c. Rosendo Gutiérrez y Quito.\r\nTels. 2413530 -2418249'),
(43, 1, ' Embajada de Italia, Espacio Simón I. Patiño y Sociedad Dante Alighieri, Comité de La Paz. Apoya: Re', 0, '2019-04-22', '2019-04-22', '19:30:00', 'Sala 2', 'a cargo de la Lic. Marisabel Villagómez Álvarez Plata', ''),
(48, 3, 'Espacio Simón I. Patiño', 0, '2019-04-01', '2019-04-24', '17:00:00', 'Espacio Simón I. Patiño', 'dictado por Iván Castro', ''),
(64, 1, 'Espacio Simón I. Patiño', 0, '2019-05-08', '2019-05-08', '19:30:00', 'Sala 2', 'La XVII versión del Festival de Historieta Viñetas con Altura presentará la cara femenina del mundo del cómic. ', 'Visita guiada de los artistas:\r\nJueves 16, 19:30 h\r\nVisitas: de lunes a viernes,\r\n09:30-12:30; 15:00-20:00 h '),
(77, 3, 'Espacio Simón I. Patiño', 1, '2019-03-01', '2019-11-01', '09:00:00', 'Informaciones CAP, Espacio Simón I. Patiño', 'El Espacio Simón I. Patiño, con el objetivo de fomentar la creación literaria y plástica de obras para niños/niñas y difundir el trabajo de los escritor@s e ilustrador@s de Bolivia, convoca al V Concurso Libro Álbum.', ''),
(78, 3, ' Espacio Simón I. Patiño', 1, '2019-05-03', '2019-05-31', '18:00:00', 'Lugar: Piso 5, aulas 1 y 2', 'a cargo de la Lic. Sussy Soto y el Lic. Alan Castro\r\n\r\nEl taller está dirigido a profesores de Educación Primaria Comunitaria Vocacional, 3.° a 6.° de escolaridad, de unidades educativas públicas de La Paz y El Alto, para promover el aprendizaje y práctica de estrategias que mejoren la comprensión lectora de sus estudiantes. Este año, con un nuevo paralelo coorganizado con Fe y Alegría.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_evento`
--

DROP TABLE IF EXISTS `fecha_evento`;
CREATE TABLE `fecha_evento` (
  `id_post` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `fecha_evento`
--

INSERT INTO `fecha_evento` (`id_post`, `fecha`) VALUES
(43, '2019-04-22'),
(48, '2019-04-01'),
(48, '2019-04-08'),
(48, '2019-04-17'),
(48, '2019-04-24'),
(64, '2019-05-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE `galeria` (
  `id_img` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `leyenda` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_img`, `imagen`, `leyenda`, `orden`, `id_post`) VALUES
(9, 'uploads/noticias/3enxoib72wp21.jpg', NULL, 1, 54),
(10, 'uploads/noticias/57503967_10162012423180599_2444481388137676800_n.jpg', NULL, 2, 54),
(11, 'uploads/noticias/Oracion.png', NULL, 3, 54),
(12, 'uploads/eventos/alejandra_lunik.jpg', 'Alejandra Lunik', 1, 58),
(13, 'uploads/eventos/alejandra_salvatierra.jpg', 'alejandra salvatierra', 2, 58),
(14, 'uploads/eventos/ana_medinacelli.jpg', 'Ana Medinacelli', 3, 58),
(15, 'uploads/eventos/avril_filomeno.jpg', 'Avril Filomeno', 4, 58),
(16, 'uploads/eventos/diana_caceres.jpg', 'Diana Caceres', 5, 58),
(18, 'uploads/eventos/Rosa_de_los_Vientos.png', 'asdasd', 1, 59),
(20, 'uploads/eventos/3enxoib72wp21.jpg', NULL, 2, 59),
(21, 'uploads/noticias/alejandra_lunik.jpg', 'Alejandra Lunik', 1, 62),
(22, 'uploads/noticias/alejandra_salvatierra.jpg', 'alejandra salvatierra', 2, 62),
(24, 'uploads/noticias/diana_cabrera.jpg', 'diana cabrera', 3, 62),
(25, 'uploads/eventos/pupy_herrera.jpg', 'Pupy Herrera', 1, 64),
(26, 'uploads/eventos/alejandra_lunik.jpg', 'Alejandra Lunik', 2, 64),
(27, 'uploads/eventos/avril_filomeno.jpg', 'Avril Filomeno', 3, 64),
(28, 'uploads/eventos/susana_villegas.jpg', 'Susana Villegas', 4, 64),
(29, 'uploads/eventos/alejandra_salvatierra.jpg', 'Alejandra Salvatierra', 5, 64),
(30, 'uploads/eventos/ana_medinacelli.jpg', 'Ana Medinacelli', 6, 64),
(31, 'uploads/eventos/diana_cabrera.jpg', 'Diana Cabrera', 7, 64),
(32, 'uploads/eventos/diana_caceres.jpg', 'Diana Caceres', 8, 64),
(33, 'uploads/eventos/roxan_torres.jpg', 'Roxán Torres', 9, 64),
(36, 'uploads/eventos/alejandra_lunik.jpg', 'aaaaa', 1, 67),
(37, 'uploads/eventos/ana_medinacelli.jpg', 'ssss', 2, 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_area`
--

DROP TABLE IF EXISTS `galeria_area`;
CREATE TABLE `galeria_area` (
  `id_img` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `leyenda` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_subarea`
--

DROP TABLE IF EXISTS `galeria_subarea`;
CREATE TABLE `galeria_subarea` (
  `id_img` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `leyenda` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `id_subarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `galeria_subarea`
--

INSERT INTO `galeria_subarea` (`id_img`, `imagen`, `leyenda`, `orden`, `id_subarea`) VALUES
(1, 'uploads/areas/9_ESCUELA-DE-ESPECTADORES-web.jpg', 'Escuela de Espectadores', 1, 20),
(3, 'uploads/areas/12_ENCUENTRO-DE-CINE-c-web.jpg', 'Encuentro de Cine', 2, 20),
(5, 'uploads/areas/14_PRES-LIBROS-LA-EQUIS-web.jpg', 'Presentacion de Libro', 3, 20),
(6, 'uploads/areas/16_FERIA-DEL-LIBRO-1-web.jpg', 'Feria del Libro', 4, 20),
(7, 'uploads/areas/18_TALLERES-TEORICO-PRACTICOS-RDA-1-web.jpg', 'Talleres Teórico-Prácticos', 5, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `html`
--

DROP TABLE IF EXISTS `html`;
CREATE TABLE `html` (
  `id_post` int(11) NOT NULL,
  `contenido` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `html`
--

INSERT INTO `html` (`id_post`, `contenido`) VALUES
(1, '“Nos estamos cargando de nueva energía, que queremos irradiar desde el nuevo Espacio Simón I. Patiño, que tiene ambientes más cómodos y mejores condiciones para acoger a nuestro público”, indicó la directora de la institución en La Paz, Michela Pentimalli.\r\n\r\nCon mayor impacto y un nuevo aire, el espacio busca encarar nuevos retos el próximo año. Entre ellos, poner en funcionamiento el teatro Doña    Albina -nombre en honor a la esposa de Simón Patiño-, que albergará obras teatrales, conciertos de música, danza y conferencias, entre otros.\r\n\r\nCon una capacidad para 180 personas, el teatro está casi listo para su inauguración, programada para los primeros meses del próximo año. Por ahora restan algunos detalles de su equipamiento, como la  iluminación.\r\n\r\n“En 2019 será el año en el que aprenderemos cómo gestionar un teatro y veremos la respuesta del público y los artistas. Este es nuestro gran proyecto y experiencia nueva”,  manifestó la directora.  Por ahora, el equipo trabaja en elaborar el protocolo del recinto.\r\n\r\nLo único establecido es que los lunes, martes y miércoles el espacio será reservado para actividades institucionales, el resto de los días estará disponible para los artistas de diferentes ramas. La administración del lugar estará a cargo de Noreen Guzmán, anunció la directora.\r\n\r\nEl espacio también dará marcha a un nuevo proyecto denominado “Huerto urbano”, dirigido a los niños, que estará articulado con el aula de animación a la lectura.  Responderá a las exigencias de la Ley 070 Avelino Siñani y Elizardo Pérez.\r\n\r\n“El ambiente para niños será un aula dedicada sólo a actividades infantiles de animación,  a la lectura o lúdicas  que organiza el Centro de Acción Pedagógica. En la terraza se instalará el huerto educativo, que servirá como una experiencia para los menores de edad, padres y maestros”, sostuvo Pentimalli.\r\n\r\nLa finalidad del proyecto es que esta experiencia se pueda replicar en las casas y colegios.  El curso comenzará en febrero y será anunciado mediante su página web y redes sociales. Por ahora se elabora el programa.\r\n\r\nLa nueva infraestructura del espacio (avenida Ecuador esquina calle Rosendo Gutiérrez) fue inaugurada el 29 de noviembre con dos muestras,  una de ellas ubicada en el hall, sobre la obra de los esposos Patiño.\r\n\r\nPor primera vez la fundación, inaugurada en 1931 , refleja la vida de uno de los barones del estaño. “Un lado importante de conocer”, según la directora.\r\n\r\nSe tiene previsto que el espacio esté abierto para unas 10 exposiciones en los próximos meses, la primera será del artista Alejandro Archondo, en abril.'),
(9, ''),
(21, 'En el receso de las V Jornadas Pedagógicas Internacionales, denominada “Reflexiones sobre el presente y futuro de la lectura”, dirigida a profesores, el conferencista Daniel Cassany se dio unos minutos para hablar con Página Siete sobre cómo incentivar a la lectura.\r\n\r\nEl Espacio Simón I. Patiño es el organizador del evento, que comenzó ayer y concluye hoy con la charla abierta La lectura del siglo XXI, que se llevará a cabo en la Universidad Católica Boliviana San Pablo, bloque D, quinto piso, a partir de las 19:00.\r\n\r\nEl español Cassany es licenciado en Filología Catalana, doctor en Letras y Ciencias de la Educación e investigador en Análisis del Discurso.\r\n\r\nCon más de 30 años de trayectoria, sostuvo que en la actualidad cada vez se lee y escribe más por la necesidad de comunicarse en comunidades letradas. Sin embargo, todavía se debe fortalecer el hábito de la lectura, lo que es “complejo” porque se lee en soportes diferentes.\r\n\r\nPara leer más, el experto dio cuatro consejos: el primero es divertirse con la lectura. “Debes buscar un libro que sea de tu interés, lo cual es muy fácil con la ayuda del internet”, aseguró.\r\n\r\nEl segundo consejo es leer entendiendo: “Lo importante es extraer el significado y relacionarlo con tu entorno”. La tercera recomendación es releer, lo que hace referencia a “no leer linealmente, sino buscar la información que te interesa y luego volver al punto donde se quedó en el texto”, detalló Cassany.\r\n\r\nPor último, el cuarto consejo consiste en hablar con otras personas sobre lo que se lee.\r\n\r\n“Para que los niños se interesen por la lectura básicamente hay que mostrarles un libro que les llame la atención. Entonces se les debe enseñar cómo pueden mejorar sus conocimientos y aprender más sobre ese tema”, indicó el conferencista.\r\n\r\nPrecisamente, este fue uno de los temas que el invitado dialogó con los maestros. Resaltó también que los cómics son una buena forma de llegar a los niños.\r\n\r\nEl profesional consideró que el futuro de la lectura y escritura, basándose en lo que sucede en España, está a través del internet, debido a las comodidades y ventajas que ofrece. “En mi país casi no quedan librerías”, acotó.\r\n\r\nTrayectoria\r\n\r\nDaniel Cassany publicó más de 12 monografías sobre escritura y enseñanza de la lengua, entre ellas Describir el escribir (1988), La cocina de la escritura (1996), Construir la escritura (1999), Tras las líneas (2006), Afilar el lapicero (2007), En_línea: leer y escribir en la red (2012); además de al menos 100 artículos científicos.'),
(22, 'Las comunidades aymaras, sus rituales y cotidianidad, así como el paisaje y el retrato caracterizan a la obra del pintor boliviano-lituano Juan Rimsa, maestro y amigo de grandes artistas nacionales entre 1937 y 1950, años entre los que residió en el país. El Espacio Patiño abrió sus salas de exposición con una retrospectiva sin precedentes, con más de 70 obras de colecciones públicas y privadas del país, además de material documental complementario.\n\nLa curadora de esta exposición es María Isabel Álvarez Plata, investigadora especialista en patrimonio, además de ser una profunda conocedora de la obra y de la trayectoria artística de Rimsa. Álvarez Plata ofreció visitas guiadas para adentrarse más en la vida y trabajos de este artista.\n\nJuan Rimsa (Kaunas, Lituania, 1903-Santa Mónica, California, 1978) fue  maestro de maestros. Con él se formaron en el Curso Superior de Bellas Artes, en Sucre, Gil Imaná, José Ostria y Josefina Reynolds; en su taller en La Paz, con Graciela Rodo Boulanger, María Esther Ballivián y Raúl Mariaca. Recorrió diferentes países de América, quedando prendado del paisaje boliviano y su gente.\n\nCecilio Guzmán de Rojas y Gregorio Reynolds fueron grandes amigos suyos, mientras que con la poeta Yolanda Bedregal tuvo una intensa historia de amor que se transformó en una amistad mantenida por correspondencia. Los retratos que hizo de la artista son célebres.\n\nRimsa se naturalizó boliviano y recibió el Cóndor de los Andes por sus méritos artísticos y por haber hecho conocer a Bolivia, a través de sus obras, en el exterior. Residió también en Argentina, Brasil y Tahití. Pasó sus últimos días en California, EEUU.\n\nEs por todo esto que la Fundación Simón I. Patiño escogió inaugurar las salas de exposición del nuevo edificio del Espacio Patiño —Ecuador, esquina Rosendo Gutiérrez— con un más que merecido homenaje.\n'),
(25, 'Entre los protagonistas de sus filmes están Jorge Ortiz, Daniela Gandarillas, Paloma Delaine y Jess Velarde.\r\n\r\nLa compilación incluye las producciones La montaña interior (2012); Arcano (2013); La piel del mar (2013); Raptus (2013); Chroma (2014); Sakramento (2016); La república de las ideas (2017) y 2025 profético (2018).\r\n\r\nEl crítico de cine Claudio Sánchez asegura que Torres es uno de los testigos y protagonistas más importantes de la producción de súper 8 en Bolivia. \r\n\r\n“Cineasta outsider, su obra atraviesa cuatro décadas de la historia del cine nacional, y su filmografía se enriquece con producciones realizadas en diferentes formatos. Torres inscribe su nombre como el primer cineasta en estrenar un largometraje digital boliviano, se trata de su película Alma y el viaje al mar, que en enero de 2003 fue presentada comercialmente en la sala Modesta Sanjinés de la Casa de la Cultura de La Paz”.'),
(30, ' \r\n<div>Página siete / <span open="" sans-serif;="" font-size:="" xss=removed>Alejandra Pau </span><br><br><h1 open="" sans-serif;="" line-height:="" em;="" letter-spacing:="" xss=removed class="titular">Amigos del muro: dibujar un personaje y hacerlo real</h1> \r\n</div> \r\n<div><br> \r\n</div> \r\n<div><span open="" xss=removed class="bajada">La arquitecta e historietista, Alexandra Ramirez, convierte a sus dibujos, puntada a puntada, en personajes tangibles. 30 de ellos serán los protagonistas de una exposición.</span> \r\n</div> \r\n<div><br> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed>Con cada puntada,  cada extremidad articulada, cada tela reciclada convertida en un cuerpo,  Alexandra Ramirez  Flores, hace  tangibles los personajes salidos de su libreta personal de dibujos en la que plasma a los habitantes de su imaginación... Los amigos del muro. </span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed>“Cada uno de los muñecos son personajes de una historia que empezó en 2004 (...)Se trata de la historia de Sandy,   una niña que tiene   un muro en su habitación,   una especie de portal  en el que ellos viven. Éste es el primer paso de un proyecto más grande: obtener fondos para hacer una serie animada en Stop Motion (técnica de animación)”, detalla la arquitecta e ilustradora, Alexandra Ramirez. </span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed>Sus  libretas contienen 243 bocetos y más de un centenar de diseños terminados;    de éstos,  30  piezas   formarán parte de una exposición que se inaugurará el 23 de enero  en el Espacio Simón I. Patiño.</span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed>Junto a la protagonista Sandy estarán personajes como Lizardo, Bruno, Roger, Felipe, Lio,  entre otros.</span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed>Durante la exposición denominada Amigos del Muro, se contará el inicio de  la historia  de los personajes que hoy habitan el mundo real. Es la cuarta muestra  que se realiza sobre ellos y será  el paso fundamental para que  la trama se cuente en otros formatos. </span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed>Junto a las piezas se exhibirán  cuadros originales pintados en acuarela y digitalmente. Se proyectarán audiovisuales en los que los personajes pueden moverse;  fotografías del proceso del desarrollo; y   pruebas de animación cuadro por cuadro.</span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed>Con ello, la artista boliviano-brasileña, que tiene una maestría en Animación 3D, transmitirá parte de su trabajo cuyo pilar es asumir el desafío de  hacer una pieza tridimensional a partir de un dibujo.</span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed>La  exposición es parte de un gran proyecto en el cual los personajes formarán parte de libros infantiles, una novela gráfica y, finalmente, una  serie animada en Stop Motion, esta última dirigida a adolescentes y adultos.</span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div><span open="" sans-serif;="" font-size:="" xss=removed><br></span> \r\n</div> \r\n<div> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed><span xss=removed>Sandy y el muro</span></p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>Sandy es una niña solitaria cuyos mejores amigos son Felipe y Roger. Ella piensa   que se está volviendo loca porque hay manchas en una de sus paredes que le hablan. Decide escucharlas y ellas replican “No te preocupes, somos tus amigos del muro. Queremos ayudarte, pero queremos salir de aquí”.</p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>“Para salir necesitan un contenedor, es decir, que Sandy haga un muñeco. Cada pequeña mancha es un ‘almita’ que de alguna manera se transforma en el muñeco que ella está cosiendo (...) Cada amigo del muro lleva un mensaje muy sutil sobre la violencia contra la niñez, porque cuando hablamos de ‘almitas’ nos  referimos   a la muerte”, explica la expositora.</p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed><br></p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed><span xss=removed><b>“Un  proyecto de vida”<br></b></span>Confeccionar cada  pieza puede tomar entre  tres semanas y  dos meses; todo el material que se utiliza para el armado es reciclado. La búsqueda de telas y texturas que se acerquen lo mejor posible al diseño que está  en papel es siempre un desafío.  </p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>“Yo lo llamo mucho: mi proyecto de vida”, dice Ramirez cuando admite que, aunque es una actividad creativa cuya  ejecución es  muy demandante,  nunca ha sido tan feliz al realizar un proyecto.  </p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>“Muchos de ellos surgen porque después de dibujarlos, mi mamá les ponía el nombre, ha sido la gran impulsora de todo esto. Por ello, la exposición está dedicada a ella”, destaca la animadora, que desde hace seis años es directora de la Asociación  de Viñetas con Altura. </p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>Su madre falleció hace tres años y una parte importante del proyecto se enfoca en reivindicar su apoyo, fundamental para que la artista decida hacer realidad este proyecto. Apoyo que estuvo con ella desde siempre, como aquella vez que la llevó al cine a ver El extraño Mundo de Jack (The Nightmare Before Christmas) de Tim Burton, director de cine que se convirtió en una inspiración para   ella.  </p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed> </p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>Con el tiempo ha ido perfeccionando las técnicas para armar la estructura y las  piezas cuyos detalles, que en su mayoría miden milímetros, tienen un alto nivel del complejidad.</p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>Cuando comenzó a coser las piezas, vender los muñecos le resultaba muy difícil porque no transmitían la historia  de la que eran parte. Hoy son indivisibles de este mundo imaginario que juega con la realidad,  que pretende sobrepasar  lo lúdico y  comunicar un concepto.</p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>Si bien la historia  es un tanto autobiográfica, ya que  Ramirez como Sandy cosen y le dan forma a  los personajes para hacerlos reales,  la parte más importante es la carga emotiva marcada por  la presencia de su madre en el proceso, ella la ayudó a crear muchas historias y bautizó a muchos personajes. </p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed>“Cuando alguien se lleva un Amigo del Muro, no está adquiriendo un juguete. Se trata del diseño de autor que se convierte en una pieza que  tiene un concepto, una historia, una carga emotiva. Son personajes poderosos, ellos son las estrellas de todo esto aunque, a veces, se los vea como  ‘monstritos’”, concluye Ramirez.</p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed><br></p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed><span xss=removed>Sobre la exposición  Amigos del muro</span></p> \r\n  <ul open="" sans-serif;="" font-size:="" xss=removed> \r\n    <li xss=removed><span xss=removed>Fecha y lugar </span>La exposición Amigos del Muro de la artista Alexandra Ramirez se inaugurará  el 23 de enero,  a las 19:30 horas, en la Sala Multifuncional del Espacio Simón I. Patiño. Dirección:  Avenida Ecuador #2503, esquina Belisario Salinas. Edificio Guayaquil, mezanine. Sopocachi. </li> \r\n    <li xss=removed><span xss=removed>Sobre la muestra </span>Las 30 piezas expuestas estarán en cúpulas de vidrio. Cada pieza cuesta entre 200 y 500 bolivianos. </li> \r\n    <li xss=removed><span xss=removed> En las redes </span>Para saber más sobre la exposición se puede ingresar a la página  en Facebook: Los Amigos del Muro.</li> \r\n  </ul> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed><br></p> \r\n  <p open="" sans-serif;="" font-size:="" xss=removed><br></p> \r\n</div>'),
(31, 'Los participantes se enfrentarán al micrófono para aprender a expresarse, según los organizadores. \r\n\r\nParte del programa implica que los asistentes adquirirán técnica vocal y lectura veloz, además de divertirse sincronizando su voz con la de sus personajes favoritos, desarrollando su capacidad de concentración de una forma amena y expresando emociones y sentimientos para lograr la interpretación actoral.\r\n\r\nEl taller será dictado por Habla Studios de La Paz, productora que hace años se dedica a la producción audiovisual. \r\n\r\nGanadora del concurso ‘Muéstranos tu arte’ (2017), organizado por el Espacio Simón I. Patiño, en la actualidad realiza prácticas preprofesionales de doblaje de películas live-action, series ánime, así como radionovelas, alcanzando más de un millón de visitas en su canal de YouTube. Demo: <a href=\'https://www.youtube.com/watch?v=Mxk6hQhWQGc\'>https://www.youtube.com/watch?v=Mxk6hQhWQGc</a>\r\n\r\nEl costo es de Bs 350, informaciones en el Espacio Patiño, teléfono 2410329 int. 221, celular 69735331.'),
(33, 'El objetivo de la V Jornadas Pedagógicas Internacionales es crear un espacio de encuentro, reflexión, diálogo y trabajo, entre las personas comprometidas con la educación regular y alternativa, sobre el presente y futuro de la lectura.\r\n\r\nDaniel Cassany es licenciado en Filología Catalana, doctor en Letras y Ciencias de la Educación e investigador en Análisis del discurso en la Universitat Pompeu Fabra (Barcelona). Ha publicado más de 12 monografías sobre escritura y enseñanza de la lengua como Describir el escribir (1988), La cocina de la escritura (1996), Construir la escritura (1999), Tras las líneas (2006), Afilar el lapicero (2007), En línea: leer y escribir en la red (2012) o Enseñar lengua (1993, en coautoría); además de unos 100 artículos científicos. Ha sido profesor invitado en instituciones de más de 25 países en Europa, América y Asia.\r\n'),
(39, '<p>&iquest;Existe una diferencia entre autor y autora?, &iquest;qu&eacute; representaciones de la masculinidad y de lo femenino existen en la literatura?, &iquest;qu&eacute; otras figuraciones se pueden rastrear lejos de ese binarismo?, &iquest;es el g&eacute;nero un rasgo de identidad o un estado pasajero por el que atraviesa un sujeto? Estas y m&aacute;s preguntas ser&aacute;n ampliadas en el quinto curso de teor&iacute;a literaria. No es requisito haber cursado las cuatro versiones anteriores ni ser literato, pero s&iacute; estar dispuesto a leer, pensar y debatir. M&oacute;nica Vel&aacute;squez Es doctora en Literatura Hispanoamericana por el Colegio de M&eacute;xico. Obtuvo una beca en el International Writing Program en Iowa (1997). En 2017 fue condecorada por la Rep&uacute;blica Francesa con la insignia de Caballero en la Orden de las Artes y las Letras. Producci&oacute;n intelectual Ha publicado los poemarios: Tres nombres para un lugar (1995); Fronteras de doble filo (1998); El viento de los n&aacute;ufragos (2005); Hija de Medea, Premio Nacional de Poes&iacute;a Yolanda Bedregal (2018), La sed donde bebes (2011) y Abdicar de lucidez (2016). Es editora de la Antolog&iacute;a de poes&iacute;a boliviana del siglo XX: Ordenar la danza (LOM Chile, 2004). Tambi&eacute;n es cr&iacute;tica literaria, ha publicado, entre otros, M&uacute;ltiples voces en la poes&iacute;a de Francisco Hern&aacute;ndez, Blanca Wieth&uuml;chter y Ra&uacute;l Zurita (El Colegio de M&eacute;xico, 2009), Demoniaco af&aacute;n (Plural-Pittsburgh, 2010), y la colecci&oacute;n de diez vol&uacute;menes sobre poes&iacute;a boliviana, La cr&iacute;tica y el poeta (UMSA, 2010-2016). Actualmente dicta c&aacute;tedra en la carrera de Literatura de la Universidad Mayor de San Andr&eacute;s y en la Universidad Cat&oacute;lica Boliviana.</p>'),
(43, 'La ciudad italiana de Matera ha sido elegida como Capital Europea de la Cultura para el año 2019. Cada año, dos ciudades europeas de dos países diferentes del continente tienen la posibilidad de presentar un programa especial de eventos y actividades culturales a partir de las cuales puedan desarrollar una nueva imagen de la ciudad. La Lic. Marisabel Villagómez Álvarez Plata ha estado en Matera para investigar la ciudad como ejemplo de arquitectura sostenible en el tiempo. Ella nos presentará una visión de Matera a través la perspectiva de los estudios del paisaje cultural. Después de la conferencia, el Restaurante Il Falco invitará una selección de postres de Matera y de la región de la Basilicata. '),
(48, ''),
(49, 'Es un libro en el que la imagen aporta un contenido propio, ocupando un espacio importante en la superficie de la página. Los textos se presentan de manera muy sintética. Las imágenes y los textos son interdependientes: las unas no pueden entenderse sin los otros y viceversa.\r\n\r\nEl libro álbum es una herramienta pedagógica porque el lector adquiere un rol constructivo y participa activa y recreativamente en la relación entre la lectura de imágenes y la lectura del contenido de la historia; realiza hipótesis, saca conjeturas y aporta conceptos.\r\n\r\nEl Espacio Simón I. Patiño, con el objetivo de fomentar la creación literaria y plástica de obras para niños/niñas y difundir el trabajo de los escritor@s e ilustrador@s de Bolivia, convoca al V Concurso Libro Álbum, con las siguientes bases:\r\n\r\n1.- Podrán participar escritor@s e ilustrador@s de nacionalidad boliviana o extranjer@s con dos años de residencia en el país, con una o más obras, en idioma español.\r\n2.- Las obras deberán ser inéditas y estarán dirigidas a niñas y niños entre los 7 y 10 años.\r\n3.- Podrán ser presentadas por uno o varios autores.\r\n4.- El tema y la técnica son libres.\r\n5.- El formato de la obra será de 33 x 22cm.\r\n6.- La extensión máxima de la obra será de 30 páginas.\r\n7.- La propuesta del libro álbum deberá presentarse en una maqueta física, que contenga la versión final del diseño, del texto, de los colores y de las ilustraciones (no se aceptará en sistema magnético).\r\n8.- Los datos personales del o los autores deberán ir en un sobre cerrado que contenga nombre, dirección, teléfono y correo electrónico. En el exterior del sobre deberá escribirse el título de la obra concursante y el o los seudónimos utilizados para firmarla, no se aceptarán anagramas.\r\n9.- Queda abierta la presente convocatoria a partir de su fecha de publicación hasta el viernes 1.º de noviembre de 2019. En los envíos por correo se considerará la fecha de remisión; no se recibirán propuestas posteriores a dicha fecha.\r\n10.- Los trabajos se recibirán en el Centro de Acción Pedagógica (CAP) del Espacio Simón I. Patiño, Sopocachi, av. Ecuador entre c. Rosendo Gutiérrez y Quito, tel. 2410329 int. 5, La Paz-Bolivia.\r\n11.- Para acceder a las bases de la convocatoria: http://www.espacio.fundacionpatino.org/convocatorias/v-concurso-libro-lbum/\r\n12.- El jurado estará compuesto por personas de reconocido prestigio en el área de la literatura infantil y juvenil, la ilustración y la pedagogía. La identidad de sus integrantes se mantendrá en secreto y se dará a conocer en la fecha de publicación de los resultados. Su fallo será inapelable. Así mismo, el premio podrá ser declarado desierto.\r\n13.- El premio, único e indivisible, consistirá en USD 1000 y la publicación de la obra.\r\n14.- La primera edición de la obra estará a cargo del Espacio Simón I. Patiño, que definirá la cantidad de ejemplares, la imprenta, las modalidades de impresión y seguimiento y las operaciones conexas.\r\n15.- La obra ganadora formará parte de la Colección libros álbum del Espacio Simón I. Patiño.\r\n16.- Los resultados se publicarán el viernes 6 de diciembre de 2019 en la página electrónica del Espacio Patiño.\r\n17.- El acto de premiación se realizará el viernes 13 de diciembre de 2019 en ambientes del Espacio Simón I. Patiño. En caso de que el ganador sea de otro departamento, se le cubrirá el pasaje para que pueda asistir a la premiación. En caso de que ganara un equipo, se cubrirá el pasaje de un representante.\r\n18.- Quedan excluidos de la presente convocatoria el personal del Espacio Simón I. Patiño y sus familiares directos.\r\n19.- Los ganadores de los concursos anteriores podrán participar pasada una versión.\r\n20.- Los trabajos serán devueltos a los autores en oficinas del CAP una vez publicados los resultados (los trabajos que no sean recogidos en el lapso de 2 meses serán destruidos.\r\n21.- Cualquier caso no considerado en las bases de la presente convocatoria será resuelto a criterio de los organizadores y del jurado.\r\n22.- La participación en el concurso implica la aceptación de todas las cláusulas de esta convocatoria.\r\n\r\nMás información:\r\nCentro de Acción Pedagógica (CAP)\r\ndel Espacio Simón I. Patiño\r\nSopocachi, av. Ecuador\r\nentre c. Rosendo Gutiérrez\r\ny Quito, piso 4\r\nTel. 2410329 int. 5\r\nLa Paz-Bolivia\r\n'),
(63, 'CONCIERTOS DE MÚSICA BARROCA REVIVEN LOS SIGLOS XVII Y XVIII\r\n\r\nEn la parroquia del Señor de la Exaltación se presenta hoy el Ensemble Donizetti, que interpretará música barroca italiana, como composiciones de Antonio Vivaldi y otras, con instrumentos antiguos de los siglos XVII y XVIII.\r\n\r\nBolivia vive el mes de abril con conciertos de ensambles y orquestas del exterior e interior del país. \r\nMientras en Santa Cruz, Tarija y parte de Sucre se desarrolla el XII Festival Internacional de Música Renacentista y Barroca Americana Misiones de Chiquitos, en La Paz se lleva adelante el Encuentro Musical Boliviano Europeo (EMBE).\r\nEl Ensemble Donizetti está entre los mejores elencos que visitan el país. Su participación se da gracias a los esfuerzos del Espacio Simón I. Patiño, la Sociedad Dante Alighieri y la Embajada de Italia en Bolivia. \r\nEs parte del Conservatorio de Bérgamo Gaetano Donizetti, bajo la dirección de Emannuele Besehi.\r\nAdemás del director se presentará el maestro Claudio Mondini con los músicos Piazzalunca Fabio, Roberto Ranieri, Giacomo Bramanti y Emilie Chigioni.\r\nMontini explicó la importancia de interpretar las composiciones con los instrumentos originales por las resonancias que adquiere la música. \r\n“Usaremos cuerdas de tripas para la música barroca. Hasta hace 100 años todavía se tocaba con las cuerdas de tripas, a principios del siglo XX se inicia la interpretación con las de acero. La diferencia es que el sonido es distinto, no se sostiene como con las primeras”, explicó.\r\nLos artistas brindaron ayer una clase maestra a los estudiantes del Conservatorio Plurinacional de Música en el marco del programa PentAnemos, en el que se comparó una pieza interpretada con cuerdas de tripa y con las de acero para identificar la calidad, fluidez y el ambiente que se crea.\r\nSi bien, el grupo expresó su felicidad y agradecimiento por participar en los conciertos programados en La Paz, comentaron que las condiciones climáticas, tanto en la sede de gobierno como en la ciudad de Santa Cruz, no son apropiadas para los instrumentos musicales.\r\n“Acá el problema es que es muy seco y las cuerdas de tripas son sensibles al ambiente, la altura provoca que se tensen más, y en Santa Cruz por efecto de la humedad es como si se les hubiese untado con aceite. Para nuestra presentación tocaremos con cuerdas de tripas cubiertas de acero, pero tocamos todavía con arcos barrocos”, señaló. \r\nBesehi comentó que el Conservatorio italiano tiene un laboratorio dedicado a la recuperación e investigación permanente de las creaciones que se realizaron durante el siglo XVII y parte del XVIII.\r\nRoberto Ranieri, otro de los integrantes, intérprete del violonchelo y del piano, comentó que el espíritu de la música barroca está en aquello que te permite sentir, son revelaciones más elevadas, sagradas, inspiradas en lo sacro y religioso, hay que saber entender y apreciar esas composiciones. \r\nEl domingo 22 se presentará Les Dames de la Musique y Katherine Claros en el templo de Santo Domingo a las 19.00. \r\nEl lunes 23, de Francia se presenta Les Passions en el Señor de la Exaltación y el martes estará Música Alchemica y la orquesta de San José de Chiquitos en San Francisco.'),
(64, 'PUPI HERRERA (Córdoba-Argentina, 1985)\r\n\r\nDibujante e ilustradora autodidacta, estudió arte en la Universidad Nacional de Córdoba (UNC). Coeditó la revista de historietas La Murciélaga entre 2009 y 2011, dibujó la tira Ponele entre 2011 y 2015, y sus ilustraciones e historietas fueron publicadas en Fierro, Orsai, Bonsai, Barcelona y la antología Enjambre de Editorial Norma. Como colorista trabajó en Dago de Robin Wood y Carlos Gómez, y Dugong y Manatí de Enrique Alcatena. Coordinó el ciclo de ilustración Obreros del Lápiz de la UNC en 2014 y 2015. En la actualidad se desempeña como tatuadora, dibujante freelance y profesora de dibujo y acuarela.\r\n\r\n\r\nALEJANDRA LUNIK (Alejandra Lubliner Gonik, Santiago de Chile, febrero de 1973)\r\n\r\nLunik es una historietista e ilustradora chilena afincada en Argentina. Se formó en la Escuela Nacional de Bellas Artes Manuel Belgrano y se dedica a la ilustración desde el año 1999. Ha publicado ilustraciones y cómics para revistas y libros de Argentina, España, México y Puerto Rico. Algunos de sus editores han sido: Editorial Atlántida; Ediciones Santillana; Clarín; La Nación; Edebé; Oxford University Press; Avante; Puerto de Palos; Kapelusz; La Urraca; SM Ediciones; Elle; Aique; Edebé. Entre sus muestras unipersonales se destacan las realizadas en la FB69 Galerie Münster, Alemania, The Girl Effecten el World Bank, Washington DC y en el Centro Cultural Recoleta -Espacio Historieta-, Buenos Aires. Se hizo popularmente conocida por su personaje de historieta Lola”(Revista Oh La La). “Lola” ha sido editado por Editorial Sudamericana y Editorial Lumen.\r\n\r\nLunik explica sobre su personaje: “No me apoyo en ella para manifestar el feminismo, si sale es porque pienso de determinada manera... soy antimachista” y denuncia que “la historia siempre fue discriminatoria con la idea de que las mujeres jugamos fuera. Entonces, quise hacerlas participar”.\r\n\r\n\r\nAVRIL FILOMENO\r\n\r\nNació en Lima, Perú, en 1976. Artista, ilustradora, fanzinera de historieta y artesana de la encuadernación. Fue parte de la Asociación Viñetas con Altura. Estudió en la Escuela de Bellas Artes de Lima, (Perú),  Asunción (Paraguay) y La Paz (Bolivia) donde se graduó con la especialidad de Pintura. Después de terminar la escuela, continuó su formación gráfica de manera particular en grabado, ilustración e  historieta. Sus ilustraciones de literatura infantil y poesía, así como sus historietas se encuentran en varios fanzines y revistas, publicadas y/o expuestas en Perú, Brasil, Chile, Bolivia, Canadá y Francia.\r\n\r\n\r\nSUSANA VILLEGAS ARROYO\r\n\r\nSusana Villegas nació en La Paz, Bolivia. Su afición por el dibujo comenzó a muy temprana edad y trabaja como dibujante e ilustradora desde los diecisiete años. Ha dedicado gran parte de su vida a  actividades artísticas como el dibujo, la historieta, la animación, la ilustración, la escultura, la pintura, etc. Todo su trabajo está afianzado en el academicismo. Desde el año 2004 combina los medios artísticos tradicionales con los digitales. Desde hace once años trabaja haciendo modelado y escultura digital, especialmente con el programa Brush.\r\n\r\n\r\nALEJANDRA SALVATIERRA\r\n\r\nIlustradora. Nació en Santa Cruz, Bolivia, pero creció en Italia, donde estudió Cómic e Ilustración en la Academia de Bellas Artes de Bologna. Fundadora del colectivo underground Canemarcio. Se manifiesta polifacética, llena de múltiples intereses y técnicas, además de muy unida a la tierra que la vio nacer.\r\n\r\n\r\nANA MEDINACELLI\r\n\r\nNació en Sucre, Bolivia, en 1989. Vive en Santa Cruz de la Sierra. Comunicadora, dibujante de cómics, gestora cultural, escritora, editora, presidenta de Young PEN Internacional (PEN, Poetas, Ensayistas y Novelistas). Brinda talleres de dibujo, cómics y poesía. Docente universitaria desde 2018 especializada en Metodología de la Investigación. Domadora de la Difusora/Editora Cultural Alternativa Loko: El Gato desde 2008, con más de 25 publicaciones editadas hasta hoy. Ha participado en tres libros de cómics hechos con autores bolivianos: Nekronomicon I (2013), II(2014), III (2015). También escribe poesía.\r\n\r\n\r\nDIANA VALERIA CABRERA MIRANDA\r\n\r\nIlustradora e historietista paceña. Estudió en la Academia Nacional de Bellas Artes Hernando Siles. Ha participado en diversos compilados de ilustración e historieta, ilustrando libros de cuento y novela  tanto para editoriales privadas e instituciones públicas. El año 2018 ganó el primer premio en el VII Concurso Municipal de Historieta de La Paz.\r\n\r\n\r\nDIANA CÁCERES ALCOREZA\r\n\r\nNació en La Paz, Bolivia, en 1992. Estudió dos años en la Academia Nacional de Bellas Artes para luego dedicarse al arte digital e historieta de manera autodidacta. En 2013 se unió al colectivo artístico de Manga Watashi Mo y comenzó a publicar de manera colectiva e individual mangas como su primera serie, Would You Be My Valentine? Ha recibido distinciones, a través de internet, en arte clásico, fotografía, ilustración plástica y digital, además de historieta. Actualmente sigue trabajando en ilustración y la creación de historietas como artista independiente y en el colectivo artístico Never Stop Trying con la artista Roxan Tórrez.\r\n\r\n\r\nROXAN TÓRREZ VILLCA\r\n\r\nNació en La Paz, Bolivia, en 1992. Docente en educación superior, estudió en la Academia de Bellas Arte. De forma autodidacta, aprendió la realización de historietas y arte digital a falta de instituciones  especializadas en dichos temas. A partir de 2013, junto con el colectivo de artistas Watashi Mo, realizó publicaciones colectivas e independientes, de distintos géneros y temáticas y tutoriales de dibujo. Organiza varios espacios de artistas, concursos de dibujo y varios proyectos junto con la artista Diana Cáceres en su colectivo artístico Never Stop Trying.'),
(65, 'La Paz: miércoles 15 de mayo de 2019\r\nLugar: Espacio Simón I. Patiño (aula 1, piso 5)\r\nSopocachi, av. Ecuador entre c. Rosendo Gutierrez y Quito\r\nTelf.: 2410329 int. 221 • Horas: 18:30\r\n\r\nCochabamba: jueves 16 de mayo de 2019\r\nLugar: Centro pedagógico y cultural Simón I. Patiño\r\nSala de cursillos\r\nAv. Potosí No. 1450\r\nTelf.: 4489666, 4280493 • Horas: 18:30\r\n\r\nSanta Cruz: viernes 17 de mayo de 2019\r\nLugar: Centro Simón I. Patiño- Santa Cruz\r\nCalle Independencia esq. Suárez de Figueroa No. 89\r\nTelfs: 3372425 / 3390151 • Horas: 18:30\r\n\r\nSucre: Lunes 21 de mayo de 2018\r\nLugar: Auditorio-Carrera de Idiomas\r\nFacultad de Humanidades y Ciencias de la Educación\r\nUniversidad San Francisco Xavier de Chuquisaca\r\nCalle Nicolás Ortiz Nro.182 • Hora: 18:30 '),
(66, 'CONVOCATORIA Y FORMULARIO IMPULSARTE\r\n\r\nDirigido a creadores escénicos independientes: directores, coreógrafos, compositores, dramaturgos, que cuenten con una trayectoria en la producción de las artes escénicas de mínimo cinco años, cuya obra postulante tenga un componente de investigación en contenido, proceso creativo y/o aspectos estéticos. En el marco del programa de apoyo a la producción de las artes escénicas, el ESIP brindará un descuento del 35'),
(77, '<div align="left">El Espacio Sim&oacute;n I. Pati&ntilde;o, con el objetivo de fomentar la creaci&oacute;n literaria y pl&aacute;stica de obras para ni&ntilde;os/ni&ntilde;as y difundir el trabajo de los escritor@s e ilustrador@s de Bolivia, convoca al V Concurso Libro &Aacute;lbum. M&aacute;s informaci&oacute;n en: <a href="http://espacio.fundacionpatino.org/convocatorias/v-concurso-libro.lbum/" target="_blank" rel="noopener">http://www.espacio.fundacionpatino.org/convocatorias/v-concurso-libro.lbum/</a><br /><br />Sopocachi, av. Ecuador entre c. Rosendo Gutierrez y Quito<br />cap@fundacionpatino.org</div>\r\n<div align="left">http://www.espacio.fundacionpatino.org/convocatorias/v-concurso-libro.lbum/</div>'),
(78, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_portada`
--

DROP TABLE IF EXISTS `imagen_portada`;
CREATE TABLE `imagen_portada` (
  `id_portada` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(24) COLLATE utf8_spanish2_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `heredar_color` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `imagen_portada`
--

INSERT INTO `imagen_portada` (`id_portada`, `imagen`, `color`, `id_area`, `heredar_color`, `orden`, `status`) VALUES
(1, 'portadas/portada1.jpg', 'rgb(18,37,158)', 1, 0, 4, 1),
(3, 'portadas/portada2.jpg', 'rgb(30,87,153)', 0, 0, 1, 1),
(4, 'portadas/portada3.jpg', '', 0, 0, 3, 1),
(5, 'portadas/portada4.jpg', 'rgb(0,134,84)', 3, 0, 2, 1),
(8, 'portadas/15SIMON.jpg', 'rgb(152,0,93)', 3, 1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `id_post` int(11) NOT NULL,
  `id_categoriaLibro` int(11) NOT NULL,
  `autor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `precio` float DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_post`, `id_categoriaLibro`, `autor`, `descripcion`, `precio`, `id_area`) VALUES
(2, 3, 'Espacio Simón I. Patiño / Cedoal', 'La Paz: Espacio Simón I. Patiño, 2016\r\n103 Pags.                   ', 40, NULL),
(3, 4, 'Centro Pedagógico y Cultural Simón I. Patiño', 'Cochabamba: Fundación Simón I. Patiño/ Centro Pedagógico y Cultural Simón I. Patiño, 2011\r\n1 CD                  ', 25, NULL),
(5, 6, 'Cadima, Mirta; Erika Fernández; Ulian F. López Zambrana', 'Santa Cruz: Centro de Ecología Difusión Simón I. Patiño, 2005\r\n396 páginas    ', 120, NULL),
(10, 4, 'Centro pedagógico y cultural Simón I. Patiño', 'Cochabamba: Fundación Simón I. Patiño/Centro pedagógico y cultural Simón I. Patiño,\r\n1 DVD              ', 25, NULL),
(11, 3, 'Espacio Simón I. Patiño', 'La Paz: Fundación Simón I. Patiño / Espacio\r\nSimón I. Patiño, 2001\r\n42 páginas', 20, NULL),
(34, 4, 'Espacio Simón I. Patiño', 'La paz: Fundación Simón I. Patiño / Espacio Simón I. Patiño, 2010\r\n1 DVD', 40, NULL),
(55, 3, 'Pentimalli, Michela; D\' Andrea, Ligia', 'La Paz: Fundación Simón I. Patiño /Espacio Simón I. Patiño, 2004\r\n155 páginas + CD ROM', 96, NULL),
(56, 3, 'Pentimalli, Michela et al.', 'La Paz: Fundación Simón I. Patiño /\r\nEspacio Simón I. Patiño, 2016\r\n378 páginas\r\nIncluye 1 DVD', 750, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id_post` int(11) NOT NULL,
  `enlace` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo_media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id_post`, `enlace`, `id_tipo_media`) VALUES
(71, 'https://www.youtube.com/embed/k76BgIb89-s', 1),
(72, 'https://e.issuu.com/embed.html?identifier=j60dqg3okhbj&embedType=script#0/10299286', 2),
(76, 'https://www.youtube.com/embed/Taj58WTKdWw', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembro_equipo`
--

DROP TABLE IF EXISTS `miembro_equipo`;
CREATE TABLE `miembro_equipo` (
  `id_post` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `cargo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `id_categoria_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `miembro_equipo`
--

INSERT INTO `miembro_equipo` (`id_post`, `nombre`, `cargo`, `descripcion`, `id_categoria_equipo`) VALUES
(4, 'Michela Pentimalli', 'Directora del Espacio Patiño', 'Está a cargo de la dirección del Espacio Patiño en su conjunto y de su personal. Proyecta y supervisa la ejecución de las propuestas, las actividades, y los productos intelectuales (libros, catálogos, videos, CDs) de las distintas áreas del Espacio Patiño. Planifica y organiza, además, las investigaciones y exposiciones de artes visuales e histórico documentales que se presentan en el Espacio.   ', 1),
(6, 'María Tapia', 'Coordinadora de actividades culturales y de secretaría', 'Articula la logística de las actividades planeadas por Dirección y las distintas áreas que conforman el Espacio. Coordina las relaciones con artistas, profesionales, consultores y medios de comunicación. Se ocupa también de las tareas de organización secretarial.                  ', 1),
(38, 'Eloisa Vargas', 'Responsable del Centro de Información y Documentación', 'Está a cargo de la gestión de los Centros de información y documentación y de las adquisiciones bibliográficas. Organiza actividades culturales de extensión. Así mismo, realiza el servicio especializado de asesoramiento bibliográfico a investigadores y la selección y la supervisión de las pasantías. ', 2),
(68, 'Gonzalo Cansay', ' Administrador del Espacio Simón I. Patiño', 'Es responsable del cumplimiento de las políticas y normas establecidas por la institución en la gestión financiera y del personal, además del cumplimiento de las obligaciones con entidades fiscalizadoras. Supervisa y coordina las actividades de mantenimiento de los activos fijos de la institución. ', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nombre_modelo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `seccion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `btn_adicional` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `metodo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `default_limit` int(11) NOT NULL DEFAULT '6',
  `uses_date` tinyint(1) NOT NULL DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `seccion`, `btn_adicional`, `model`, `metodo`, `default_limit`, `uses_date`, `id_tipo`) VALUES
(1, 'libro', 'seccion_libro', NULL, 'Libro_model', 'get_valid_libros', 6, 0, 2),
(2, 'noticia', 'seccion_noticia', NULL, 'Noticias_model', 'get_valid_noticias', 9, 0, 1),
(3, 'subpagina', 'seccion_subarea', NULL, 'Subpaginas_model', 'get_valid_subpaginas', 3, 0, 0),
(4, 'equipo', 'seccion_equipo', NULL, 'Equipo_model', 'get_valid_miembro', 1, 0, 3),
(5, 'evento', 'seccion_evento', 'descargar_agenda', 'Eventos_model', 'get_valid_eventos_futuros', 6, 1, 4),
(6, 'teatro', 'seccion_evento', NULL, 'Eventos_model', 'get_valid_obras', 6, 1, 4),
(7, 'convocatoria', 'seccion_convocatoria', NULL, 'Convocatorias_model', 'get_valid_convocatorias', 6, 1, 5),
(8, 'multimedia', 'seccion_multimedia', NULL, 'Media_model', 'get_valid_media', 2, 0, 6),
(9, 'area', 'seccion_area', NULL, 'Areas_model', 'get_valid_areas', 6, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE `noticia` (
  `id_post` int(11) NOT NULL,
  `fuente` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `resumen` text COLLATE utf8_spanish2_ci NOT NULL,
  `url` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_post`, `fuente`, `fecha`, `resumen`, `url`) VALUES
(1, 'Página Siete / Gabriela Alanoca C.  / La Paz', '2018-12-20', 'El próximo año el espacio albergará en sus dos salas de exposición 10 muestras, la primera se realizará en abril, mientras se pretende estrenar el teatro en el primer semestre.', 'noticia/Espacio Simón I. Patiño abrirá en 2019 el teatro Doña Albina'),
(9, 'Jackeline Rojas Heredia  / Cambio', '2018-05-03', 'En la galería del Espacio Simón I. Patiño se inauguró ayer la exposición Simbiosis: La imagen fotográfica en la escena teatral, de la artista costarricense Ana Muñoz, en el marco del XI Festival Internacional de Teatro de La Paz (Fitaz)', 'noticia/INAUGURAN EXPOSICIÓN DE FOTOS EN LA ESCENA TEATRAL'),
(21, 'PÁGINA SIETE / Gabriela Alanoca C.', '2018-08-14', 'El doctor Daniel Cassany llegó a La Paz para las V Jornadas Pedagógicas Internacionales. Entregó sus cuatro consejos para generar el hábito de la lectura.', 'noticia/Cassany: Divertirse con la lectura es una manera de incentivarla'),
(22, 'La Razón (Edición Impresa) / Miguel Vargas', '2018-12-18', 'El Espacio Patiño abrió su sala de exposiciones con una gran retrospectiva.', 'noticia/Juan Rimsa, de maestro maestros'),
(25, 'CAMBIO / Milenka Parisaca', '2018-07-18', 'En el Espacio Simón I. Patiño de la ciudad de La Paz se presentará este viernes un DVD con la filmografía de Diego Torres (2011-2018).  El evento empezará a las 19.00.', 'noticia/FILMOGRAFÍA DE TORRES EN LA CINEMATECA'),
(30, 'Página siete / Alejandra Pau ', '2018-01-06', 'La arquitecta e historietista, Alexandra Ramirez, convierte a sus dibujos, puntada a puntada, en personajes tangibles. 30 de ellos serán los protagonistas de una exposición.', 'noticia/Amigos del muro: dibujar un personaje y hacerlo real'),
(31, 'J.R.H / Cambio', '2018-06-07', 'En la sala multifuncional del anexo del Espacio Patiño se realizará el taller ‘Doblaje y técnica actoral vocal inicial’, a cargo de Jim López y Adrián Viveros, de Habla Studios, entre el lunes 11 y el jueves 14 de junio de 15.00 a 19.00.', 'noticia/ABREN TALLER DE DOBLAJE Y TÉCNICA ACTORAL'),
(33, 'EL DIARIO / La Paz ', '2018-08-12', 'Daniel Cassany hablará del presente y futuro de la lectura\r\n\r\nEl doctor en Letras y Ciencias de la Educación de España, Daniel Cassany, llega al país para reflexionar sobre el presente y futuro de la lectura. El evento se realizará en el auditorio del Espacio Patiño de la avenida Ecuador, Sopocachi.\r\n\r\nEl experto será parte de las V Jornadas Pedagógicas Internacionales que se realizarán los días 13 y 14 de agosto en La Paz. Según información proporcionada por la organización, el cupo es limitado', 'noticia/Daniel Cassany hablará del presente y futuro de la lectura'),
(63, 'CAMBIO / Jackeline  Rojas Heredia', '2019-04-20', 'En la parroquia del Señor de la Exaltación se presenta hoy el Ensemble Donizetti, que interpretará música barroca italiana, como composiciones de Antonio Vivaldi y otras, con instrumentos antiguos de los siglos XVII y XVIII.', 'noticia/CONCIERTOS DE MÚSICA BARROCA REVIVEN LOS SIGLOS XVII Y XVIII');

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
  `external_url` tinyint(1) NOT NULL DEFAULT '0',
  `enable_search` tinyint(1) NOT NULL DEFAULT '1',
  `search_by_cat` varchar(255) COLLATE utf8_spanish2_ci DEFAULT '0',
  `id_modelo` int(11) NOT NULL,
  `id_content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `titulo`, `enlace`, `color`, `status`, `orden`, `mostrar_navbar`, `mostrar_home`, `external_url`, `enable_search`, `search_by_cat`, `id_modelo`, `id_content`) VALUES
(1, 'Quiénes Somos', 'conocenos', 'rgb(0,13,97)', 1, 1, 1, 1, 0, 0, NULL, 3, NULL),
(2, 'Áreas', 'areas', '', 1, 4, 1, 1, 0, 1, NULL, 9, NULL),
(3, 'Agenda', 'agenda', 'rgb(112,0,0)', 1, 2, 1, 1, 0, 1, 'select_area', 5, NULL),
(6, 'Librería', 'libreria', 'rgb(118,0,97)', 1, 3, 1, 1, 0, 1, 'select_cat_libro', 1, NULL),
(7, 'Noticias', 'noticias', 'rgb(177,0, 0)', 1, 7, 1, 1, 0, 1, NULL, 2, NULL),
(8, 'Convocatorias', 'convocatorias', 'rgb(0,86, 25)', 1, 5, 1, 1, 0, 1, NULL, 7, NULL),
(10, 'Multimedia', 'multimedia', 'rgb(239,125,0)', 1, 8, 1, 1, 0, 1, NULL, 8, NULL),
(11, 'Teatro Doña Albina', 'teatro', 'rgb(245,147,54)', 1, 6, 1, 1, 0, 1, NULL, 6, NULL),
(12, 'Catálogo en Línea', 'http://opacespacio.fundacionpatino.org', 'rgb(239,125,0)', 1, 9, 1, 0, 1, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE `publicacion` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tipo` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_post`, `titulo`, `imagen`, `status`, `tipo`) VALUES
(1, 'Espacio Simón I. Patiño abrirá en 2019 el teatro Doña Albina', 'uploads/noticias/noticia1.jpg', 1, 1),
(2, '4o Encuentro de cine: el corto boliviano, hoy', 'uploads/libros/img_4o-encuentro-de-cine-el-corto-boliviano-hoy_137.jpg', 1, 2),
(3, 'Adolfo Cáceres Romero, Una Vida entre Libros', 'uploads/libros/img_adolfo-cceres-romero-una-vida-entre-libros_77.jpg', 1, 2),
(4, 'Michela Pentimalli', 'uploads/equipo/i_michela-pentimalli.jpg', 1, 3),
(5, 'Algas de Bolivia: con énfasis en el fitoplancton', 'uploads/libros/img_algas-de-bolivia-con-nfasis-en-el-fitoplancton_113.jpg', 1, 2),
(6, 'María Tapia', 'uploads/equipo/i_maria-tapia.jpg', 1, 3),
(9, 'INAUGURAN EXPOSICIÓN DE FOTOS EN LA ESCENA TEATRAL', 'uploads/noticias/img_inauguran-exposicion-de-fotos-en-la-escena-teatral_1756.jpg', 1, 1),
(10, 'Yolanda de américa: biografía de Yolanda Bedregal', 'uploads/libros/img_yolanda-de-amrica-biografa-de-yolanda-bedregal_98.jpg', 1, 2),
(11, 'Bolivia dibujo y artes gráficas: exposición permanente', 'uploads/libros/img_bolivia-dibujo-y-artes-graficas-exposicoin-permanente_63.jpg', 1, 2),
(21, 'Cassany: Divertirse con la lectura es una manera de incentivarla', 'uploads/noticias/img_cassany-divertirse-con-la-lectura-es-una-manera-de-incentivarla_190.jpg', 1, 1),
(22, 'Juan Rimsa, de maestro maestros', 'uploads/noticias/img_juan-rimsa-de-maestro-maestros_195.jpg', 1, 1),
(25, 'FILMOGRAFÍA DE TORRES EN LA CINEMATECA', 'uploads/noticias/img_filmografia-de-torres-en-la-cinemateca_186.jpg', 1, 1),
(30, 'Amigos del muro: dibujar un personaje y hacerlo real', 'uploads/noticias/img_amigos-del-muro-dibujar-un-personaje-y-hacerlo-real_145.jpg', 1, 1),
(31, 'ABREN TALLER DE DOBLAJE Y TÉCNICA ACTORAL', 'uploads/noticias/img_abren-taller-de-doblaje-y-tecnica-actoral_178.jpg', 1, 1),
(33, 'Daniel Cassany hablará del presente y futuro de la lectura', 'uploads/noticias/img_daniel-cassany-hablara-del-presente-y-futuro-de-la-lectura_189.jpg', 1, 1),
(34, 'Betshabé Salmón: precursora del pensamiento femenino en Bolivia', 'uploads/libros/img_betshab-salmn-precursora-del-pensamiento-femenino-en-bolivia_79.jpg', 1, 2),
(38, 'Eloisa Vargas', 'uploads/equipo/i_eloisa-vargas-_5.jpg', 1, 3),
(39, 'TALLER TEORÍA LITERARIA V Conduce: Mónica Velásquez', 'uploads/eventos/img_taller-teora-literaria-v-conduce-mnica-velsquez_1567.jpg', 1, 4),
(43, 'CONFERENCIA MATERA: HISTORIA DE UN IMAGINARIO', 'uploads/eventos/img_conferencia-matera-historia-de-un-imaginario-a-cargo-de-la-lic-marisabel-villagmez-lvarez-plata_1605.jpg', 1, 4),
(48, 'CONTINÚA EL TALLER DE DESARROLLO DE PROYECTOS MÓDULO I: GUION PARA ANIMACIÓN, HISTORIETA Y VIDEOJUEGOS', 'uploads/eventos/img_contina-el-taller-de-desarrollo-de-proyectos-mdulo-i-guion-para-animacin-historieta-y-videojuegos_1587.jpg', 1, 4),
(49, 'V Concurso Libro Álbum', 'uploads/convocatorias/concurso-libro-album_33.jpg', 1, 5),
(55, 'Arquitecturas hoy en Bolivia: prácticas y estéticas urbanas', 'uploads/libros/img_arquitecturas-hoy-en-bolivia-prcticas-y-estticas-urbanas_62.jpg', 1, 2),
(56, 'Bolivia. Lenguajes gráficos (Tomos I, II y III)', 'uploads/libros/img_bolivia-lenguajes-graficos_133.jpg', 1, 2),
(63, 'CONCIERTOS DE MÚSICA BARROCA REVIVEN LOS SIGLOS XVII Y XVIII', 'uploads/noticias/img_conciertos-de-musica-barroca-reviven-los-siglos-xvii-y-xviii_170.jpg', 1, 1),
(64, 'EL ESPACIO SIMÓN I. PATIÑO EN EL FESTIVAL INTERNACIONAL DE HISTORIETA VIÑETAS CON ALTURA 2019 - EXPOSICIÓN', 'uploads/eventos/img_el-espacio-simn-i-patio-en-el-festival-internacional-de-historieta-vietas-con-altura-2019-exposicin_1629.jpg', 1, 4),
(65, 'FUNDACIÓN UNIVERSITARIA SIMÓN I. PATIÑO BECAS DE POSTGRADO A SALAMANCA', '', 1, 5),
(66, 'Convocatoria y formulario IMPULSARTE', '', 1, 5),
(68, 'Gonzalo Cansay', 'uploads/equipo/i_gonzalo-cansay_16.jpg', 1, 3),
(71, 'testMedia', NULL, 1, 6),
(72, 'testMedia Issu', NULL, 0, 6),
(76, 'test#2', NULL, 1, 6),
(77, 'CONVOCATORIA LIBRO ÁLBUM', 'uploads/eventos/img_v-concurso-libro-lbum_33.jpg', 1, 4),
(78, 'CONTINÚAN LOS TALLERES PARA PROFESORES ESTRATEGIAS DIDÁCTICAS PARA LA LECTURA DE COMPRENSIÓN PARALELOS A y B (La Paz)', 'uploads/eventos/img_continan-los-talleres-para-profesores-estrategias-didcticas-para-la-lectura-de-comprensin-paralelos-a-y-b-la-paz-1614_1614.jpg', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subarea`
--

DROP TABLE IF EXISTS `subarea`;
CREATE TABLE `subarea` (
  `id_subarea` int(11) NOT NULL,
  `subarea` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_area` int(11) NOT NULL,
  `id_content` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subarea`
--

INSERT INTO `subarea` (`id_subarea`, `subarea`, `enlace`, `status`, `id_area`, `id_content`) VALUES
(1, 'Exposiciones', 'exposiciones', 1, 1, 0),
(2, 'Biblioteca de Niños', 'biblioteca_de_ninos', 1, 3, 0),
(3, 'Convocatorias', 'convocatorias', 1, 1, 0),
(4, 'Eventos y Actividades', 'eventos_y_actividades', 1, 4, 0),
(5, 'Eventos y Actividades', 'eventos_y_actividades', 1, 1, 0),
(6, 'CEDOAL', 'cedoal', 1, 2, 0),
(7, 'CE Musical', 'ce_musical', 1, 2, 0),
(8, 'Centro Hemerográfico Especializado', 'centro_hemerografico_especializado', 1, 2, 11),
(9, 'Huerto Educativo', 'huerto_educativo', 1, 3, 0),
(10, 'Proyectos Especiales', 'proyectos_especiales', 1, 3, 0),
(11, 'Convocatorias', 'convocatorias', 1, 3, 0),
(12, 'Pasantías', 'pasantias', 1, 3, 0),
(13, 'Cursos y Talleres', 'cursos_y_talleres', 1, 3, 0),
(14, 'Actividades', 'actividades', 1, 3, 0),
(15, 'Eventos y Actividades', 'eventos_y_actividades', 1, 5, 0),
(16, 'Convocatorias', 'convocatorias', 1, 5, 0),
(17, 'Cusos y Talleres', 'cursos_y_talleres', 1, 4, 0),
(18, 'Proyectos Especiales', 'proyectos_especiales', 1, 4, 0),
(19, 'Convocatorias', 'convocatorias', 1, 4, 0),
(20, 'Actividades', 'actividades', 1, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subpagina`
--

DROP TABLE IF EXISTS `subpagina`;
CREATE TABLE `subpagina` (
  `id_subpagina` int(11) NOT NULL,
  `subpagina` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_pagina` int(11) NOT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subpagina`
--

INSERT INTO `subpagina` (`id_subpagina`, `subpagina`, `enlace`, `status`, `id_pagina`, `id_modelo`, `id_content`) VALUES
(1, 'Nuestra Historia', 'historia', 1, 1, 0, 1),
(2, 'Nuestra Misión y Visión', 'mision_vision', 1, 1, 0, 2),
(3, 'Nuestro Equipo de Trabajo', 'equipo_trabajo', 1, 1, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_media`
--

DROP TABLE IF EXISTS `tipo_media`;
CREATE TABLE `tipo_media` (
  `id_tipo_media` int(11) NOT NULL,
  `tipo_media` varchar(300) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_media`
--

INSERT INTO `tipo_media` (`id_tipo_media`, `tipo_media`) VALUES
(1, 'youtube'),
(2, 'issuu'),
(3, 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_post`
--

DROP TABLE IF EXISTS `tipo_post`;
CREATE TABLE `tipo_post` (
  `id_tipo` int(11) NOT NULL,
  `tipo_post` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_sidebar` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `icono` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `sub_categoria` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_post`
--

INSERT INTO `tipo_post` (`id_tipo`, `tipo_post`, `nombre_sidebar`, `icono`, `sub_categoria`) VALUES
(1, 'noticia', 'Noticias', 'newspaper', 0),
(2, 'libro', 'Libreria', 'book', 1),
(3, 'equipo', 'Equipo', 'child', 1),
(4, 'evento', 'Eventos', 'calendar-alt', 0),
(5, 'convocatoria', 'Convocatorias', 'bullhorn', 0),
(6, 'media', 'Multimedia', 'video', 0),
(7, 'agenda', 'Agenda', 'calendar-plus', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `username` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`) VALUES
('admin', 'cfe6750c32a166100aadf04987cea6c8'),
('test', 'cc03e747a6afbbcbf8be7668acfebee5');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indices de la tabla `archivo_adjunto`
--
ALTER TABLE `archivo_adjunto`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `categoria_equipo`
--
ALTER TABLE `categoria_equipo`
  ADD PRIMARY KEY (`id_categoria_equipo`);

--
-- Indices de la tabla `categoria_libro`
--
ALTER TABLE `categoria_libro`
  ADD PRIMARY KEY (`id_categoriaLibro`);

--
-- Indices de la tabla `complemento`
--
ALTER TABLE `complemento`
  ADD PRIMARY KEY (`id_complemento`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_content`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `defaults`
--
ALTER TABLE `defaults`
  ADD PRIMARY KEY (`property`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `fecha_evento`
--
ALTER TABLE `fecha_evento`
  ADD PRIMARY KEY (`id_post`,`fecha`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `galeria_area`
--
ALTER TABLE `galeria_area`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `galeria_subarea`
--
ALTER TABLE `galeria_subarea`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `html`
--
ALTER TABLE `html`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `imagen_portada`
--
ALTER TABLE `imagen_portada`
  ADD PRIMARY KEY (`id_portada`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `miembro_equipo`
--
ALTER TABLE `miembro_equipo`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `subarea`
--
ALTER TABLE `subarea`
  ADD PRIMARY KEY (`id_subarea`);

--
-- Indices de la tabla `subpagina`
--
ALTER TABLE `subpagina`
  ADD PRIMARY KEY (`id_subpagina`);

--
-- Indices de la tabla `tipo_media`
--
ALTER TABLE `tipo_media`
  ADD PRIMARY KEY (`id_tipo_media`);

--
-- Indices de la tabla `tipo_post`
--
ALTER TABLE `tipo_post`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `archivo_adjunto`
--
ALTER TABLE `archivo_adjunto`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `categoria_equipo`
--
ALTER TABLE `categoria_equipo`
  MODIFY `id_categoria_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `categoria_libro`
--
ALTER TABLE `categoria_libro`
  MODIFY `id_categoriaLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `complemento`
--
ALTER TABLE `complemento`
  MODIFY `id_complemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `galeria_area`
--
ALTER TABLE `galeria_area`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `galeria_subarea`
--
ALTER TABLE `galeria_subarea`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `imagen_portada`
--
ALTER TABLE `imagen_portada`
  MODIFY `id_portada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `miembro_equipo`
--
ALTER TABLE `miembro_equipo`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `subpagina`
--
ALTER TABLE `subpagina`
  MODIFY `id_subpagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_media`
--
ALTER TABLE `tipo_media`
  MODIFY `id_tipo_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_post`
--
ALTER TABLE `tipo_post`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;