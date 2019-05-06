-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2019 a las 04:32:02
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `espaciopatino`
--
CREATE DATABASE IF NOT EXISTS `espaciopatino` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `espaciopatino`;

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
  `color_area` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `area`, `color_area`, `status`) VALUES
(1, 'Dirección y Coordinación', 'rgba(84,33,90,1)', 1),
(2, 'Centros de Información y Documentación', 'rgba(134,192,63,1)', 1),
(3, 'Centro de Acción Pedagógica (CAP)', 'rgba(150,40,45,1)', 1),
(4, 'Centro del cómic y la animación', 'rgba(242,190,65,1)', 1),
(5, 'Teatro Doña Albina', 'rgba(242,150,29,1)', 1);

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
(1, 'Nuestra Historia', 'uploads/subpagina/historia.jpg', 'El Espacio Simón I. Patiño (ESIP) inició sus funciones en La Paz el 14 de septiembre de 1984 en la Av. 16 de Julio, El Prado, al lado del Edif. Alameda. Posteriormente, se trasladó a la calle Juan de la Riva, al Edif. Alborada. En 1993 aproximadamente volvió al Prado, a la planta baja del Edif. Alameda. En esas primeras ubicaciones, el ESIP contaba simplemente con una oficina y una sala de exposiciones reducida. La capacidad de actividades en ese entonces era de una exposición al mes, con una conferencia o presentación de libro. En los primeros tiempos, la programación cultural del Espacio estuvo a cargo de la Dirección del Centro Pedagógico y Cultural Simón I. Patiño de Cochabamba; en los años sucesivos, a medida que fue ampliando sus áreas de trabajo y consolidando su presencia en la vida cultural de La Paz, el ESIP se convirtió en un centro autónomo con una dirección propia.\r\n\r\nEn 1996, la Fundación Simón I. Patiño inauguró las actuales instalaciones, en el edificio Guayaquil, Avenida Ecuador No 2503, esquina Belisario Salinas, en el barrio de Sopocachi. Desde el 15 de mayo de 2006, habiéndose ampliado el radio de acción del ESIP, se alquila también un inmueble al que se ha denominado “Anexo del Espacio Patiño”, situado sobre la Av. Ecuador 2475.\r\nEl 28 de septiembre de 2001 se creó el Centro de Documentación en Artes y Literaturas Latinoamericanas (CEDOAL), dos años después, el 29 de enero de 2003, abrió sus puertas el Café del Cómic, que luego se transformó en el actual Centro del Cómic, C+C Espacio. Desde el 2 de enero de 2008 funciona el Centro de Acción Pedagógica (CAP) y el 1 de octubre de 2013 se inauguró el C-Musical, área que  originariamente se llamó Archivo Fonográfico del CEDOAL.\r\n\r\nActualmente, el Espacio Patiño viene llevando a cabo su proyecto más ambicioso, la construcción de un nuevo edificio que centralizará las áreas con las que cuenta. Esta nueva edificación estará ubicada sobre la avenida Ecuador esquina Rosendo Gutiérrez.', 1),
(2, 'Misión y Visión', 'uploads/subpagina/mision_vision.jpg', 'Misión\r\n\r\nNuestra misión es proyectar, ejecutar y promover, actividades culturales y de formación desde un enfoque solidario, pluralista e integrador, de diálogo entre individuos, culturas e instituciones; atender a los usuarios y al público con profesionalidad, amabilidad y esmero.\r\n\r\nPartimos de la puesta en valor y difusión de diferentes manifestaciones culturales y de formación, participando activamente en los procesos de investigación, enseñanza - aprendizaje, creación, producción y difusión intelectual y artística, preservación y conservación del patrimonio documental, tangible e intangible, estudio y aplicación de nuevas tecnologías.\r\n\r\nVisión\r\n\r\nEstablecer nuestra presencia como referente cultural y de formación, incentivando la creatividad, la investigación, el estudio y la aplicación de nuevas tecnologías, junto a la preservación del patrimonio y la memoria, promoviendo los valores humanos universales, la solidaridad y el diálogo entre culturas, participando en la construcción de ciudadanos innovadores, críticos y proactivos.\r\n\r\n', 1),
(3, 'Equipo de Trabajo', 'uploads/subpagina/equipo.jpg', '', 0),
(8, 'Teatro Doña Albina', 'uploads/subpagina/DSC_1289-20.jpg', 'contenido de prueba temporal', 1);

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
(39, 2, 'Espacio Simón I. Patiño', 1, '2019-02-06', '2019-06-05', '18:00:00', '5.° piso, aula 3', '', 'Todos los miércoles\r\nEstudiantes Bs 350, artistas Bs 400 y profesionales Bs 500\r\nCupo limitado\r\n\r\nInformaciones e inscripciones:\r\nRecepción\r\nSopocachi, av. Ecuador\r\nentre c. Rosendo Gutiérrez y Quito.\r\nTels. 2413530 -2418249'),
(43, 1, ' Embajada de Italia, Espacio Simón I. Patiño y Sociedad Dante Alighieri, Comité de La Paz. Apoya: Re', 0, '2019-04-22', '2019-04-22', '19:30:00', 'Sala 2', 'a cargo de la Lic. Marisabel Villagómez Álvarez Plata', ''),
(48, 3, 'Espacio Simón I. Patiño', 0, '2019-04-01', '2019-04-24', '17:00:00', 'Espacio Simón I. Patiño', 'dictado por Iván Castro', ''),
(64, 1, 'Espacio Simón I. Patiño', 0, '2019-05-08', '2019-05-08', '19:30:00', 'Sala 2', 'La XVII versión del Festival de Historieta Viñetas con Altura presentará la cara femenina del mundo del cómic. ', 'Visita guiada de los artistas:\r\nJueves 16, 19:30 h\r\nVisitas: de lunes a viernes,\r\n09:30-12:30; 15:00-20:00 h ');

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
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_img`, `imagen`, `leyenda`, `id_post`) VALUES
(9, 'uploads/noticias/3enxoib72wp21.jpg', NULL, 54),
(10, 'uploads/noticias/57503967_10162012423180599_2444481388137676800_n.jpg', NULL, 54),
(11, 'uploads/noticias/Oracion.png', NULL, 54),
(12, 'uploads/eventos/alejandra_lunik.jpg', 'Alejandra Lunik', 58),
(13, 'uploads/eventos/alejandra_salvatierra.jpg', 'alejandra salvatierra', 58),
(14, 'uploads/eventos/ana_medinacelli.jpg', 'Ana Medinacelli', 58),
(15, 'uploads/eventos/avril_filomeno.jpg', 'Avril Filomeno', 58),
(16, 'uploads/eventos/diana_caceres.jpg', 'Diana Caceres', 58),
(18, 'uploads/eventos/Rosa_de_los_Vientos.png', 'asdasd', 59),
(20, 'uploads/eventos/3enxoib72wp21.jpg', NULL, 59),
(21, 'uploads/noticias/alejandra_lunik.jpg', 'Alejandra Lunik', 62),
(22, 'uploads/noticias/alejandra_salvatierra.jpg', 'alejandra salvatierra', 62),
(24, 'uploads/noticias/diana_cabrera.jpg', 'diana cabrera', 62),
(25, 'uploads/eventos/pupy_herrera.jpg', 'Pupy Herrera', 64),
(26, 'uploads/eventos/alejandra_lunik.jpg', 'Alejandra Lunik', 64),
(27, 'uploads/eventos/avril_filomeno.jpg', 'Avril Filomeno', 64),
(28, 'uploads/eventos/susana_villegas.jpg', 'Susana Villegas', 64),
(29, 'uploads/eventos/alejandra_salvatierra.jpg', 'Alejandra Salvatierra', 64),
(30, 'uploads/eventos/ana_medinacelli.jpg', 'Ana Medinacelli', 64),
(31, 'uploads/eventos/diana_cabrera.jpg', 'Diana Cabrera', 64),
(32, 'uploads/eventos/diana_caceres.jpg', 'Diana Caceres', 64),
(33, 'uploads/eventos/roxan_torres.jpg', 'Roxán Torres', 64),
(36, 'uploads/eventos/alejandra_lunik.jpg', 'aaaaa', 67),
(37, 'uploads/eventos/ana_medinacelli.jpg', 'ssss', 67);

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
(30, ' \r\n<div>Página siete / <span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Alejandra Pau </span><br><br><h1 open=\"\" sans-serif;=\"\" line-height:=\"\" em;=\"\" letter-spacing:=\"\" xss=removed class=\"titular\">Amigos del muro: dibujar un personaje y hacerlo real</h1> \r\n</div> \r\n<div><br> \r\n</div> \r\n<div><span open=\"\" xss=removed class=\"bajada\">La arquitecta e historietista, Alexandra Ramirez, convierte a sus dibujos, puntada a puntada, en personajes tangibles. 30 de ellos serán los protagonistas de una exposición.</span> \r\n</div> \r\n<div><br> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Con cada puntada,  cada extremidad articulada, cada tela reciclada convertida en un cuerpo,  Alexandra Ramirez  Flores, hace  tangibles los personajes salidos de su libreta personal de dibujos en la que plasma a los habitantes de su imaginación... Los amigos del muro. </span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Cada uno de los muñecos son personajes de una historia que empezó en 2004 (...)Se trata de la historia de Sandy,   una niña que tiene   un muro en su habitación,   una especie de portal  en el que ellos viven. Éste es el primer paso de un proyecto más grande: obtener fondos para hacer una serie animada en Stop Motion (técnica de animación)”, detalla la arquitecta e ilustradora, Alexandra Ramirez. </span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Sus  libretas contienen 243 bocetos y más de un centenar de diseños terminados;    de éstos,  30  piezas   formarán parte de una exposición que se inaugurará el 23 de enero  en el Espacio Simón I. Patiño.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Junto a la protagonista Sandy estarán personajes como Lizardo, Bruno, Roger, Felipe, Lio,  entre otros.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Durante la exposición denominada Amigos del Muro, se contará el inicio de  la historia  de los personajes que hoy habitan el mundo real. Es la cuarta muestra  que se realiza sobre ellos y será  el paso fundamental para que  la trama se cuente en otros formatos. </span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Junto a las piezas se exhibirán  cuadros originales pintados en acuarela y digitalmente. Se proyectarán audiovisuales en los que los personajes pueden moverse;  fotografías del proceso del desarrollo; y   pruebas de animación cuadro por cuadro.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Con ello, la artista boliviano-brasileña, que tiene una maestría en Animación 3D, transmitirá parte de su trabajo cuyo pilar es asumir el desafío de  hacer una pieza tridimensional a partir de un dibujo.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>La  exposición es parte de un gran proyecto en el cual los personajes formarán parte de libros infantiles, una novela gráfica y, finalmente, una  serie animada en Stop Motion, esta última dirigida a adolescentes y adultos.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><span xss=removed>Sandy y el muro</span></p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Sandy es una niña solitaria cuyos mejores amigos son Felipe y Roger. Ella piensa   que se está volviendo loca porque hay manchas en una de sus paredes que le hablan. Decide escucharlas y ellas replican “No te preocupes, somos tus amigos del muro. Queremos ayudarte, pero queremos salir de aquí”.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Para salir necesitan un contenedor, es decir, que Sandy haga un muñeco. Cada pequeña mancha es un ‘almita’ que de alguna manera se transforma en el muñeco que ella está cosiendo (...) Cada amigo del muro lleva un mensaje muy sutil sobre la violencia contra la niñez, porque cuando hablamos de ‘almitas’ nos  referimos   a la muerte”, explica la expositora.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><span xss=removed><b>“Un  proyecto de vida”<br></b></span>Confeccionar cada  pieza puede tomar entre  tres semanas y  dos meses; todo el material que se utiliza para el armado es reciclado. La búsqueda de telas y texturas que se acerquen lo mejor posible al diseño que está  en papel es siempre un desafío.  </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Yo lo llamo mucho: mi proyecto de vida”, dice Ramirez cuando admite que, aunque es una actividad creativa cuya  ejecución es  muy demandante,  nunca ha sido tan feliz al realizar un proyecto.  </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Muchos de ellos surgen porque después de dibujarlos, mi mamá les ponía el nombre, ha sido la gran impulsora de todo esto. Por ello, la exposición está dedicada a ella”, destaca la animadora, que desde hace seis años es directora de la Asociación  de Viñetas con Altura. </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Su madre falleció hace tres años y una parte importante del proyecto se enfoca en reivindicar su apoyo, fundamental para que la artista decida hacer realidad este proyecto. Apoyo que estuvo con ella desde siempre, como aquella vez que la llevó al cine a ver El extraño Mundo de Jack (The Nightmare Before Christmas) de Tim Burton, director de cine que se convirtió en una inspiración para   ella.  </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed> </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Con el tiempo ha ido perfeccionando las técnicas para armar la estructura y las  piezas cuyos detalles, que en su mayoría miden milímetros, tienen un alto nivel del complejidad.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Cuando comenzó a coser las piezas, vender los muñecos le resultaba muy difícil porque no transmitían la historia  de la que eran parte. Hoy son indivisibles de este mundo imaginario que juega con la realidad,  que pretende sobrepasar  lo lúdico y  comunicar un concepto.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Si bien la historia  es un tanto autobiográfica, ya que  Ramirez como Sandy cosen y le dan forma a  los personajes para hacerlos reales,  la parte más importante es la carga emotiva marcada por  la presencia de su madre en el proceso, ella la ayudó a crear muchas historias y bautizó a muchos personajes. </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Cuando alguien se lleva un Amigo del Muro, no está adquiriendo un juguete. Se trata del diseño de autor que se convierte en una pieza que  tiene un concepto, una historia, una carga emotiva. Son personajes poderosos, ellos son las estrellas de todo esto aunque, a veces, se los vea como  ‘monstritos’”, concluye Ramirez.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><span xss=removed>Sobre la exposición  Amigos del muro</span></p> \r\n  <ul open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed> \r\n    <li xss=removed><span xss=removed>Fecha y lugar </span>La exposición Amigos del Muro de la artista Alexandra Ramirez se inaugurará  el 23 de enero,  a las 19:30 horas, en la Sala Multifuncional del Espacio Simón I. Patiño. Dirección:  Avenida Ecuador #2503, esquina Belisario Salinas. Edificio Guayaquil, mezanine. Sopocachi. </li> \r\n    <li xss=removed><span xss=removed>Sobre la muestra </span>Las 30 piezas expuestas estarán en cúpulas de vidrio. Cada pieza cuesta entre 200 y 500 bolivianos. </li> \r\n    <li xss=removed><span xss=removed> En las redes </span>Para saber más sobre la exposición se puede ingresar a la página  en Facebook: Los Amigos del Muro.</li> \r\n  </ul> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></p> \r\n</div>'),
(31, 'Los participantes se enfrentarán al micrófono para aprender a expresarse, según los organizadores. \r\n\r\nParte del programa implica que los asistentes adquirirán técnica vocal y lectura veloz, además de divertirse sincronizando su voz con la de sus personajes favoritos, desarrollando su capacidad de concentración de una forma amena y expresando emociones y sentimientos para lograr la interpretación actoral.\r\n\r\nEl taller será dictado por Habla Studios de La Paz, productora que hace años se dedica a la producción audiovisual. \r\n\r\nGanadora del concurso ‘Muéstranos tu arte’ (2017), organizado por el Espacio Simón I. Patiño, en la actualidad realiza prácticas preprofesionales de doblaje de películas live-action, series ánime, así como radionovelas, alcanzando más de un millón de visitas en su canal de YouTube. Demo: <a href=\'https://www.youtube.com/watch?v=Mxk6hQhWQGc\'>https://www.youtube.com/watch?v=Mxk6hQhWQGc</a>\r\n\r\nEl costo es de Bs 350, informaciones en el Espacio Patiño, teléfono 2410329 int. 221, celular 69735331.'),
(33, 'El objetivo de la V Jornadas Pedagógicas Internacionales es crear un espacio de encuentro, reflexión, diálogo y trabajo, entre las personas comprometidas con la educación regular y alternativa, sobre el presente y futuro de la lectura.\r\n\r\nDaniel Cassany es licenciado en Filología Catalana, doctor en Letras y Ciencias de la Educación e investigador en Análisis del discurso en la Universitat Pompeu Fabra (Barcelona). Ha publicado más de 12 monografías sobre escritura y enseñanza de la lengua como Describir el escribir (1988), La cocina de la escritura (1996), Construir la escritura (1999), Tras las líneas (2006), Afilar el lapicero (2007), En línea: leer y escribir en la red (2012) o Enseñar lengua (1993, en coautoría); además de unos 100 artículos científicos. Ha sido profesor invitado en instituciones de más de 25 países en Europa, América y Asia.\r\n'),
(39, '¿Existe una diferencia entre autor y autora?, ¿qué representaciones de la masculinidad y de lo femenino existen en la literatura?, ¿qué otras figuraciones se pueden rastrear lejos de ese binarismo?, ¿es el género un rasgo de identidad o un estado pasajero por el que atraviesa un sujeto? Estas y más preguntas serán ampliadas en el quinto curso de teoría literaria.\r\n\r\nNo es requisito haber cursado las cuatro versiones anteriores ni ser literato, pero sí estar dispuesto a leer, pensar y debatir.\r\n\r\nMónica Velásquez\r\nEs doctora en Literatura Hispanoamericana por el Colegio de México. Obtuvo una beca en el International Writing Program en Iowa (1997). En 2017 fue condecorada por la República Francesa con la insignia de Caballero en la Orden de las Artes y las Letras.\r\n\r\nProducción intelectual\r\nHa publicado los poemarios: Tres nombres para un lugar (1995); Fronteras de doble filo (1998); El viento de los náufragos (2005); Hija de Medea, Premio Nacional de Poesía Yolanda Bedregal (2018), La sed donde bebes (2011) y Abdicar de lucidez (2016).\r\n\r\nEs editora de la Antología de poesía boliviana del siglo XX: Ordenar la danza (LOM Chile, 2004).\r\n\r\nTambién es crítica literaria, ha publicado, entre otros, Múltiples voces en la poesía de Francisco Hernández, Blanca Wiethüchter y Raúl Zurita (El Colegio de México, 2009), Demoniaco afán (Plural-Pittsburgh, 2010), y la colección de diez volúmenes sobre poesía boliviana, La crítica y el poeta (UMSA, 2010-2016).\r\n\r\nActualmente dicta cátedra en la carrera de Literatura de la Universidad Mayor de San Andrés y en la Universidad Católica Boliviana.\r\n'),
(43, 'La ciudad italiana de Matera ha sido elegida como Capital Europea de la Cultura para el año 2019. Cada año, dos ciudades europeas de dos países diferentes del continente tienen la posibilidad de presentar un programa especial de eventos y actividades culturales a partir de las cuales puedan desarrollar una nueva imagen de la ciudad. La Lic. Marisabel Villagómez Álvarez Plata ha estado en Matera para investigar la ciudad como ejemplo de arquitectura sostenible en el tiempo. Ella nos presentará una visión de Matera a través la perspectiva de los estudios del paisaje cultural. Después de la conferencia, el Restaurante Il Falco invitará una selección de postres de Matera y de la región de la Basilicata. '),
(48, ''),
(49, 'Es un libro en el que la imagen aporta un contenido propio, ocupando un espacio importante en la superficie de la página. Los textos se presentan de manera muy sintética. Las imágenes y los textos son interdependientes: las unas no pueden entenderse sin los otros y viceversa.\r\n\r\nEl libro álbum es una herramienta pedagógica porque el lector adquiere un rol constructivo y participa activa y recreativamente en la relación entre la lectura de imágenes y la lectura del contenido de la historia; realiza hipótesis, saca conjeturas y aporta conceptos.\r\n\r\nEl Espacio Simón I. Patiño, con el objetivo de fomentar la creación literaria y plástica de obras para niños/niñas y difundir el trabajo de los escritor@s e ilustrador@s de Bolivia, convoca al V Concurso Libro Álbum, con las siguientes bases:\r\n\r\n1.- Podrán participar escritor@s e ilustrador@s de nacionalidad boliviana o extranjer@s con dos años de residencia en el país, con una o más obras, en idioma español.\r\n2.- Las obras deberán ser inéditas y estarán dirigidas a niñas y niños entre los 7 y 10 años.\r\n3.- Podrán ser presentadas por uno o varios autores.\r\n4.- El tema y la técnica son libres.\r\n5.- El formato de la obra será de 33 x 22cm.\r\n6.- La extensión máxima de la obra será de 30 páginas.\r\n7.- La propuesta del libro álbum deberá presentarse en una maqueta física, que contenga la versión final del diseño, del texto, de los colores y de las ilustraciones (no se aceptará en sistema magnético).\r\n8.- Los datos personales del o los autores deberán ir en un sobre cerrado que contenga nombre, dirección, teléfono y correo electrónico. En el exterior del sobre deberá escribirse el título de la obra concursante y el o los seudónimos utilizados para firmarla, no se aceptarán anagramas.\r\n9.- Queda abierta la presente convocatoria a partir de su fecha de publicación hasta el viernes 1.º de noviembre de 2019. En los envíos por correo se considerará la fecha de remisión; no se recibirán propuestas posteriores a dicha fecha.\r\n10.- Los trabajos se recibirán en el Centro de Acción Pedagógica (CAP) del Espacio Simón I. Patiño, Sopocachi, av. Ecuador entre c. Rosendo Gutiérrez y Quito, tel. 2410329 int. 5, La Paz-Bolivia.\r\n11.- Para acceder a las bases de la convocatoria: http://www.espacio.fundacionpatino.org/convocatorias/v-concurso-libro-lbum/\r\n12.- El jurado estará compuesto por personas de reconocido prestigio en el área de la literatura infantil y juvenil, la ilustración y la pedagogía. La identidad de sus integrantes se mantendrá en secreto y se dará a conocer en la fecha de publicación de los resultados. Su fallo será inapelable. Así mismo, el premio podrá ser declarado desierto.\r\n13.- El premio, único e indivisible, consistirá en USD 1000 y la publicación de la obra.\r\n14.- La primera edición de la obra estará a cargo del Espacio Simón I. Patiño, que definirá la cantidad de ejemplares, la imprenta, las modalidades de impresión y seguimiento y las operaciones conexas.\r\n15.- La obra ganadora formará parte de la Colección libros álbum del Espacio Simón I. Patiño.\r\n16.- Los resultados se publicarán el viernes 6 de diciembre de 2019 en la página electrónica del Espacio Patiño.\r\n17.- El acto de premiación se realizará el viernes 13 de diciembre de 2019 en ambientes del Espacio Simón I. Patiño. En caso de que el ganador sea de otro departamento, se le cubrirá el pasaje para que pueda asistir a la premiación. En caso de que ganara un equipo, se cubrirá el pasaje de un representante.\r\n18.- Quedan excluidos de la presente convocatoria el personal del Espacio Simón I. Patiño y sus familiares directos.\r\n19.- Los ganadores de los concursos anteriores podrán participar pasada una versión.\r\n20.- Los trabajos serán devueltos a los autores en oficinas del CAP una vez publicados los resultados (los trabajos que no sean recogidos en el lapso de 2 meses serán destruidos.\r\n21.- Cualquier caso no considerado en las bases de la presente convocatoria será resuelto a criterio de los organizadores y del jurado.\r\n22.- La participación en el concurso implica la aceptación de todas las cláusulas de esta convocatoria.\r\n\r\nMás información:\r\nCentro de Acción Pedagógica (CAP)\r\ndel Espacio Simón I. Patiño\r\nSopocachi, av. Ecuador\r\nentre c. Rosendo Gutiérrez\r\ny Quito, piso 4\r\nTel. 2410329 int. 5\r\nLa Paz-Bolivia\r\n'),
(63, 'CONCIERTOS DE MÚSICA BARROCA REVIVEN LOS SIGLOS XVII Y XVIII\r\n\r\nEn la parroquia del Señor de la Exaltación se presenta hoy el Ensemble Donizetti, que interpretará música barroca italiana, como composiciones de Antonio Vivaldi y otras, con instrumentos antiguos de los siglos XVII y XVIII.\r\n\r\nBolivia vive el mes de abril con conciertos de ensambles y orquestas del exterior e interior del país. \r\nMientras en Santa Cruz, Tarija y parte de Sucre se desarrolla el XII Festival Internacional de Música Renacentista y Barroca Americana Misiones de Chiquitos, en La Paz se lleva adelante el Encuentro Musical Boliviano Europeo (EMBE).\r\nEl Ensemble Donizetti está entre los mejores elencos que visitan el país. Su participación se da gracias a los esfuerzos del Espacio Simón I. Patiño, la Sociedad Dante Alighieri y la Embajada de Italia en Bolivia. \r\nEs parte del Conservatorio de Bérgamo Gaetano Donizetti, bajo la dirección de Emannuele Besehi.\r\nAdemás del director se presentará el maestro Claudio Mondini con los músicos Piazzalunca Fabio, Roberto Ranieri, Giacomo Bramanti y Emilie Chigioni.\r\nMontini explicó la importancia de interpretar las composiciones con los instrumentos originales por las resonancias que adquiere la música. \r\n“Usaremos cuerdas de tripas para la música barroca. Hasta hace 100 años todavía se tocaba con las cuerdas de tripas, a principios del siglo XX se inicia la interpretación con las de acero. La diferencia es que el sonido es distinto, no se sostiene como con las primeras”, explicó.\r\nLos artistas brindaron ayer una clase maestra a los estudiantes del Conservatorio Plurinacional de Música en el marco del programa PentAnemos, en el que se comparó una pieza interpretada con cuerdas de tripa y con las de acero para identificar la calidad, fluidez y el ambiente que se crea.\r\nSi bien, el grupo expresó su felicidad y agradecimiento por participar en los conciertos programados en La Paz, comentaron que las condiciones climáticas, tanto en la sede de gobierno como en la ciudad de Santa Cruz, no son apropiadas para los instrumentos musicales.\r\n“Acá el problema es que es muy seco y las cuerdas de tripas son sensibles al ambiente, la altura provoca que se tensen más, y en Santa Cruz por efecto de la humedad es como si se les hubiese untado con aceite. Para nuestra presentación tocaremos con cuerdas de tripas cubiertas de acero, pero tocamos todavía con arcos barrocos”, señaló. \r\nBesehi comentó que el Conservatorio italiano tiene un laboratorio dedicado a la recuperación e investigación permanente de las creaciones que se realizaron durante el siglo XVII y parte del XVIII.\r\nRoberto Ranieri, otro de los integrantes, intérprete del violonchelo y del piano, comentó que el espíritu de la música barroca está en aquello que te permite sentir, son revelaciones más elevadas, sagradas, inspiradas en lo sacro y religioso, hay que saber entender y apreciar esas composiciones. \r\nEl domingo 22 se presentará Les Dames de la Musique y Katherine Claros en el templo de Santo Domingo a las 19.00. \r\nEl lunes 23, de Francia se presenta Les Passions en el Señor de la Exaltación y el martes estará Música Alchemica y la orquesta de San José de Chiquitos en San Francisco.'),
(64, 'PUPI HERRERA (Córdoba-Argentina, 1985)\r\n\r\nDibujante e ilustradora autodidacta, estudió arte en la Universidad Nacional de Córdoba (UNC). Coeditó la revista de historietas La Murciélaga entre 2009 y 2011, dibujó la tira Ponele entre 2011 y 2015, y sus ilustraciones e historietas fueron publicadas en Fierro, Orsai, Bonsai, Barcelona y la antología Enjambre de Editorial Norma. Como colorista trabajó en Dago de Robin Wood y Carlos Gómez, y Dugong y Manatí de Enrique Alcatena. Coordinó el ciclo de ilustración Obreros del Lápiz de la UNC en 2014 y 2015. En la actualidad se desempeña como tatuadora, dibujante freelance y profesora de dibujo y acuarela.\r\n\r\n\r\nALEJANDRA LUNIK (Alejandra Lubliner Gonik, Santiago de Chile, febrero de 1973)\r\n\r\nLunik es una historietista e ilustradora chilena afincada en Argentina. Se formó en la Escuela Nacional de Bellas Artes Manuel Belgrano y se dedica a la ilustración desde el año 1999. Ha publicado ilustraciones y cómics para revistas y libros de Argentina, España, México y Puerto Rico. Algunos de sus editores han sido: Editorial Atlántida; Ediciones Santillana; Clarín; La Nación; Edebé; Oxford University Press; Avante; Puerto de Palos; Kapelusz; La Urraca; SM Ediciones; Elle; Aique; Edebé. Entre sus muestras unipersonales se destacan las realizadas en la FB69 Galerie Münster, Alemania, The Girl Effecten el World Bank, Washington DC y en el Centro Cultural Recoleta -Espacio Historieta-, Buenos Aires. Se hizo popularmente conocida por su personaje de historieta Lola”(Revista Oh La La). “Lola” ha sido editado por Editorial Sudamericana y Editorial Lumen.\r\n\r\nLunik explica sobre su personaje: “No me apoyo en ella para manifestar el feminismo, si sale es porque pienso de determinada manera... soy antimachista” y denuncia que “la historia siempre fue discriminatoria con la idea de que las mujeres jugamos fuera. Entonces, quise hacerlas participar”.\r\n\r\n\r\nAVRIL FILOMENO\r\n\r\nNació en Lima, Perú, en 1976. Artista, ilustradora, fanzinera de historieta y artesana de la encuadernación. Fue parte de la Asociación Viñetas con Altura. Estudió en la Escuela de Bellas Artes de Lima, (Perú),  Asunción (Paraguay) y La Paz (Bolivia) donde se graduó con la especialidad de Pintura. Después de terminar la escuela, continuó su formación gráfica de manera particular en grabado, ilustración e  historieta. Sus ilustraciones de literatura infantil y poesía, así como sus historietas se encuentran en varios fanzines y revistas, publicadas y/o expuestas en Perú, Brasil, Chile, Bolivia, Canadá y Francia.\r\n\r\n\r\nSUSANA VILLEGAS ARROYO\r\n\r\nSusana Villegas nació en La Paz, Bolivia. Su afición por el dibujo comenzó a muy temprana edad y trabaja como dibujante e ilustradora desde los diecisiete años. Ha dedicado gran parte de su vida a  actividades artísticas como el dibujo, la historieta, la animación, la ilustración, la escultura, la pintura, etc. Todo su trabajo está afianzado en el academicismo. Desde el año 2004 combina los medios artísticos tradicionales con los digitales. Desde hace once años trabaja haciendo modelado y escultura digital, especialmente con el programa Brush.\r\n\r\n\r\nALEJANDRA SALVATIERRA\r\n\r\nIlustradora. Nació en Santa Cruz, Bolivia, pero creció en Italia, donde estudió Cómic e Ilustración en la Academia de Bellas Artes de Bologna. Fundadora del colectivo underground Canemarcio. Se manifiesta polifacética, llena de múltiples intereses y técnicas, además de muy unida a la tierra que la vio nacer.\r\n\r\n\r\nANA MEDINACELLI\r\n\r\nNació en Sucre, Bolivia, en 1989. Vive en Santa Cruz de la Sierra. Comunicadora, dibujante de cómics, gestora cultural, escritora, editora, presidenta de Young PEN Internacional (PEN, Poetas, Ensayistas y Novelistas). Brinda talleres de dibujo, cómics y poesía. Docente universitaria desde 2018 especializada en Metodología de la Investigación. Domadora de la Difusora/Editora Cultural Alternativa Loko: El Gato desde 2008, con más de 25 publicaciones editadas hasta hoy. Ha participado en tres libros de cómics hechos con autores bolivianos: Nekronomicon I (2013), II(2014), III (2015). También escribe poesía.\r\n\r\n\r\nDIANA VALERIA CABRERA MIRANDA\r\n\r\nIlustradora e historietista paceña. Estudió en la Academia Nacional de Bellas Artes Hernando Siles. Ha participado en diversos compilados de ilustración e historieta, ilustrando libros de cuento y novela  tanto para editoriales privadas e instituciones públicas. El año 2018 ganó el primer premio en el VII Concurso Municipal de Historieta de La Paz.\r\n\r\n\r\nDIANA CÁCERES ALCOREZA\r\n\r\nNació en La Paz, Bolivia, en 1992. Estudió dos años en la Academia Nacional de Bellas Artes para luego dedicarse al arte digital e historieta de manera autodidacta. En 2013 se unió al colectivo artístico de Manga Watashi Mo y comenzó a publicar de manera colectiva e individual mangas como su primera serie, Would You Be My Valentine? Ha recibido distinciones, a través de internet, en arte clásico, fotografía, ilustración plástica y digital, además de historieta. Actualmente sigue trabajando en ilustración y la creación de historietas como artista independiente y en el colectivo artístico Never Stop Trying con la artista Roxan Tórrez.\r\n\r\n\r\nROXAN TÓRREZ VILLCA\r\n\r\nNació en La Paz, Bolivia, en 1992. Docente en educación superior, estudió en la Academia de Bellas Arte. De forma autodidacta, aprendió la realización de historietas y arte digital a falta de instituciones  especializadas en dichos temas. A partir de 2013, junto con el colectivo de artistas Watashi Mo, realizó publicaciones colectivas e independientes, de distintos géneros y temáticas y tutoriales de dibujo. Organiza varios espacios de artistas, concursos de dibujo y varios proyectos junto con la artista Diana Cáceres en su colectivo artístico Never Stop Trying.'),
(65, 'La Paz: miércoles 15 de mayo de 2019\r\nLugar: Espacio Simón I. Patiño (aula 1, piso 5)\r\nSopocachi, av. Ecuador entre c. Rosendo Gutierrez y Quito\r\nTelf.: 2410329 int. 221 • Horas: 18:30\r\n\r\nCochabamba: jueves 16 de mayo de 2019\r\nLugar: Centro pedagógico y cultural Simón I. Patiño\r\nSala de cursillos\r\nAv. Potosí No. 1450\r\nTelf.: 4489666, 4280493 • Horas: 18:30\r\n\r\nSanta Cruz: viernes 17 de mayo de 2019\r\nLugar: Centro Simón I. Patiño- Santa Cruz\r\nCalle Independencia esq. Suárez de Figueroa No. 89\r\nTelfs: 3372425 / 3390151 • Horas: 18:30\r\n\r\nSucre: Lunes 21 de mayo de 2018\r\nLugar: Auditorio-Carrera de Idiomas\r\nFacultad de Humanidades y Ciencias de la Educación\r\nUniversidad San Francisco Xavier de Chuquisaca\r\nCalle Nicolás Ortiz Nro.182 • Hora: 18:30 '),
(66, 'CONVOCATORIA Y FORMULARIO IMPULSARTE\r\n\r\nDirigido a creadores escénicos independientes: directores, coreógrafos, compositores, dramaturgos, que cuenten con una trayectoria en la producción de las artes escénicas de mínimo cinco años, cuya obra postulante tenga un componente de investigación en contenido, proceso creativo y/o aspectos estéticos. En el marco del programa de apoyo a la producción de las artes escénicas, el ESIP brindará un descuento del 35');

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
(1, 'portadas/portada1.jpg', 'rgba(18,37, 158, 1)', 1, 0, 4, 1),
(3, 'portadas/portada2.jpg', 'rgba(30,87,153,1)', 0, 0, 1, 1),
(4, 'portadas/portada3.jpg', '', 0, 0, 3, 1),
(5, 'portadas/portada4.jpg', 'rgba(0,134, 84, 1)', 3, 0, 2, 1),
(8, 'portadas/15SIMON.jpg', 'rgba(152,0,93,1)', 3, 1, 5, 1);

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
  `model` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `metodo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `default_limit` int(11) NOT NULL DEFAULT '6',
  `uses_date` tinyint(1) NOT NULL DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `seccion`, `model`, `metodo`, `default_limit`, `uses_date`, `id_tipo`) VALUES
(1, 'libro', 'seccion_libro', 'Libro_model', 'get_valid_libros', 6, 0, 2),
(2, 'noticia', 'seccion_noticia', 'Noticias_model', 'get_valid_noticias', 9, 0, 1),
(3, 'subpagina', 'seccion_subarea', 'Subpaginas_model', 'get_valid_subpaginas', 3, 0, 0),
(4, 'equipo', 'seccion_equipo', 'Equipo_model', 'get_valid_miembro', 1, 0, 3),
(5, 'evento', 'seccion_evento', 'Eventos_model', 'get_valid_eventos_futuros', 6, 1, 4),
(6, 'teatro', 'seccion_evento', 'Eventos_model', 'get_valid_obras', 6, 1, 4),
(7, 'convocatoria', 'seccion_convocatoria', 'Convocatorias_model', 'get_valid_convocatorias', 6, 1, 2);

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
  `id_area` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `titulo`, `enlace`, `color`, `status`, `orden`, `mostrar_navbar`, `mostrar_home`, `external_url`, `enable_search`, `id_area`, `id_modelo`, `id_content`) VALUES
(1, 'Quiénes Somos', 'conocenos', 'rgba(0,13, 97, 1)', 1, 1, 1, 1, 0, 0, 0, 3, NULL),
(2, 'Áreas', 'areas', '', 0, 0, 1, 1, 0, 1, 0, 0, NULL),
(3, 'Agenda', 'agenda', 'rgba(112,0, 0, 1)', 1, 2, 1, 1, 0, 1, 0, 5, NULL),
(6, 'Librería', 'libreria', 'rgba(118,0, 97, 1)', 1, 3, 1, 1, 0, 1, 0, 1, NULL),
(7, 'Noticias', 'noticias', 'rgba(177,0, 0, 1)', 1, 4, 1, 1, 0, 1, 0, 2, NULL),
(8, 'Convocatorias', 'convocatorias', 'rgba(0,86, 25, 1)', 1, 6, 1, 1, 0, 1, 0, 7, NULL),
(10, 'Multimedia', 'testpage', 'rgba(239,125, 0, 1)', 0, 0, 1, 1, 0, 1, 0, 3, NULL),
(11, 'Teatro Doña Albina', 'teatro', 'rgba(245,147, 54, 1)', 1, 5, 1, 1, 0, 1, 0, 6, NULL),
(12, 'Catálogo en Línea', 'http://opacespacio.fundacionpatino.org', 'rgba(239, 125, 0, 1)', 1, 7, 1, 0, 1, 0, 0, 0, NULL);

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
(68, 'Gonzalo Cansay', 'uploads/equipo/i_gonzalo-cansay_16.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subarea`
--

DROP TABLE IF EXISTS `subarea`;
CREATE TABLE `subarea` (
  `id_subarea` int(11) NOT NULL,
  `subarea` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subarea`
--

INSERT INTO `subarea` (`id_subarea`, `subarea`, `status`, `id_area`) VALUES
(1, 'Exposiciones', 1, 1),
(2, 'Biblioteca de Niños', 1, 3),
(3, 'Convocatorias', 1, 1),
(4, 'Eventos y Actividades', 1, 4),
(5, 'Eventos y Actividades', 1, 1),
(6, 'CEDOAL', 1, 2),
(7, 'CE Musical', 1, 2),
(8, 'Centro Hemerográfico Especializado', 1, 2),
(9, 'Huerto Educativo', 1, 3),
(10, 'Proyectos Especiales', 1, 3),
(11, 'Convocatorias', 1, 3),
(12, 'Pasantías', 1, 3),
(13, 'Cursos y Talleres', 1, 3),
(14, 'Actividades', 1, 3),
(15, 'Eventos y Actividades', 1, 5),
(16, 'Convocatorias', 1, 5),
(17, 'Cusos y Talleres', 1, 4),
(18, 'Proyectos Especiales', 1, 4),
(19, 'Convocatorias', 1, 4);

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
(4, 'evento', 'Eventos', 'calendar ', 0),
(5, 'convocatoria', 'Convocatorias', 'bullhorn', 0);

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
-- AUTO_INCREMENT de la tabla `archivo_adjunto`
--
ALTER TABLE `archivo_adjunto`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `imagen_portada`
--
ALTER TABLE `imagen_portada`
  MODIFY `id_portada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `miembro_equipo`
--
ALTER TABLE `miembro_equipo`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `subpagina`
--
ALTER TABLE `subpagina`
  MODIFY `id_subpagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_post`
--
ALTER TABLE `tipo_post`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;