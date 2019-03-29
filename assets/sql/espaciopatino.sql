-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-03-2019 a las 03:44:49
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
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `area`, `activa`) VALUES
(1, 'Exposiciones e Investigaciones', 1),
(2, 'Centros de Información y Documentación', 1),
(3, 'Centro de Acción Pedagógica CAP', 1),
(4, 'Centro del Cómic C+C Espacio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_equipo`
--

DROP TABLE IF EXISTS `categoria_equipo`;
CREATE TABLE `categoria_equipo` (
  `id_categoria_equipo` int(11) NOT NULL,
  `categoria` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_libro`
--

DROP TABLE IF EXISTS `categoria_libro`;
CREATE TABLE `categoria_libro` (
  `id_categoriaLibro` int(11) NOT NULL,
  `categoria` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria_libro`
--

INSERT INTO `categoria_libro` (`id_categoriaLibro`, `categoria`, `status`) VALUES
(1, 'Literatura', 1),
(2, 'Filosofía', 1),
(3, 'Artes', 1),
(4, 'Memorias', 1),
(5, 'Música', 1),
(6, 'Ecología', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

DROP TABLE IF EXISTS `contenido`;
CREATE TABLE `contenido` (
  `id_post` int(11) NOT NULL,
  `contenido` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_post`, `contenido`) VALUES
(1, '“Nos estamos cargando de nueva energía, que queremos irradiar desde el nuevo Espacio Simón I. Patiño, que tiene ambientes más cómodos y mejores condiciones para acoger a nuestro público”, indicó la directora de la institución en La Paz, Michela Pentimalli.\r\n\r\nCon mayor impacto y un nuevo aire, el espacio busca encarar nuevos retos el próximo año. Entre ellos, poner en funcionamiento el teatro Doña    Albina -nombre en honor a la esposa de Simón Patiño-, que albergará obras teatrales, conciertos de música, danza y conferencias, entre otros.\r\n\r\nCon una capacidad para 180 personas, el teatro está casi listo para su inauguración, programada para los primeros meses del próximo año. Por ahora restan algunos detalles de su equipamiento, como la  iluminación.\r\n\r\n“En 2019 será el año en el que aprenderemos cómo gestionar un teatro y veremos la respuesta del público y los artistas. Este es nuestro gran proyecto y experiencia nueva”,  manifestó la directora.  Por ahora, el equipo trabaja en elaborar el protocolo del recinto.\r\n\r\nLo único establecido es que los lunes, martes y miércoles el espacio será reservado para actividades institucionales, el resto de los días estará disponible para los artistas de diferentes ramas. La administración del lugar estará a cargo de Noreen Guzmán, anunció la directora.\r\n\r\nEl espacio también dará marcha a un nuevo proyecto denominado “Huerto urbano”, dirigido a los niños, que estará articulado con el aula de animación a la lectura.  Responderá a las exigencias de la Ley 070 Avelino Siñani y Elizardo Pérez.\r\n\r\n“El ambiente para niños será un aula dedicada sólo a actividades infantiles de animación,  a la lectura o lúdicas  que organiza el Centro de Acción Pedagógica. En la terraza se instalará el huerto educativo, que servirá como una experiencia para los menores de edad, padres y maestros”, sostuvo Pentimalli.\r\n\r\nLa finalidad del proyecto es que esta experiencia se pueda replicar en las casas y colegios.  El curso comenzará en febrero y será anunciado mediante su página web y redes sociales. Por ahora se elabora el programa.\r\n\r\nLa nueva infraestructura del espacio (avenida Ecuador esquina calle Rosendo Gutiérrez) fue inaugurada el 29 de noviembre con dos muestras,  una de ellas ubicada en el hall, sobre la obra de los esposos Patiño.\r\n\r\nPor primera vez la fundación, inaugurada en 1931 , refleja la vida de uno de los barones del estaño. “Un lado importante de conocer”, según la directora.\r\n\r\nSe tiene previsto que el espacio esté abierto para unas 10 exposiciones en los próximos meses, la primera será del artista Alejandro Archondo, en abril.'),
(9, ''),
(21, 'En el receso de las V Jornadas Pedagógicas Internacionales, denominada “Reflexiones sobre el presente y futuro de la lectura”, dirigida a profesores, el conferencista Daniel Cassany se dio unos minutos para hablar con Página Siete sobre cómo incentivar a la lectura.\r\n\r\nEl Espacio Simón I. Patiño es el organizador del evento, que comenzó ayer y concluye hoy con la charla abierta La lectura del siglo XXI, que se llevará a cabo en la Universidad Católica Boliviana San Pablo, bloque D, quinto piso, a partir de las 19:00.\r\n\r\nEl español Cassany es licenciado en Filología Catalana, doctor en Letras y Ciencias de la Educación e investigador en Análisis del Discurso.\r\n\r\nCon más de 30 años de trayectoria, sostuvo que en la actualidad cada vez se lee y escribe más por la necesidad de comunicarse en comunidades letradas. Sin embargo, todavía se debe fortalecer el hábito de la lectura, lo que es “complejo” porque se lee en soportes diferentes.\r\n\r\nPara leer más, el experto dio cuatro consejos: el primero es divertirse con la lectura. “Debes buscar un libro que sea de tu interés, lo cual es muy fácil con la ayuda del internet”, aseguró.\r\n\r\nEl segundo consejo es leer entendiendo: “Lo importante es extraer el significado y relacionarlo con tu entorno”. La tercera recomendación es releer, lo que hace referencia a “no leer linealmente, sino buscar la información que te interesa y luego volver al punto donde se quedó en el texto”, detalló Cassany.\r\n\r\nPor último, el cuarto consejo consiste en hablar con otras personas sobre lo que se lee.\r\n\r\n“Para que los niños se interesen por la lectura básicamente hay que mostrarles un libro que les llame la atención. Entonces se les debe enseñar cómo pueden mejorar sus conocimientos y aprender más sobre ese tema”, indicó el conferencista.\r\n\r\nPrecisamente, este fue uno de los temas que el invitado dialogó con los maestros. Resaltó también que los cómics son una buena forma de llegar a los niños.\r\n\r\nEl profesional consideró que el futuro de la lectura y escritura, basándose en lo que sucede en España, está a través del internet, debido a las comodidades y ventajas que ofrece. “En mi país casi no quedan librerías”, acotó.\r\n\r\nTrayectoria\r\n\r\nDaniel Cassany publicó más de 12 monografías sobre escritura y enseñanza de la lengua, entre ellas Describir el escribir (1988), La cocina de la escritura (1996), Construir la escritura (1999), Tras las líneas (2006), Afilar el lapicero (2007), En_línea: leer y escribir en la red (2012); además de al menos 100 artículos científicos.'),
(22, 'Las comunidades aymaras, sus rituales y cotidianidad, así como el paisaje y el retrato caracterizan a la obra del pintor boliviano-lituano Juan Rimsa, maestro y amigo de grandes artistas nacionales entre 1937 y 1950, años entre los que residió en el país. El Espacio Patiño abrió sus salas de exposición con una retrospectiva sin precedentes, con más de 70 obras de colecciones públicas y privadas del país, además de material documental complementario.\n\nLa curadora de esta exposición es María Isabel Álvarez Plata, investigadora especialista en patrimonio, además de ser una profunda conocedora de la obra y de la trayectoria artística de Rimsa. Álvarez Plata ofreció visitas guiadas para adentrarse más en la vida y trabajos de este artista.\n\nJuan Rimsa (Kaunas, Lituania, 1903-Santa Mónica, California, 1978) fue  maestro de maestros. Con él se formaron en el Curso Superior de Bellas Artes, en Sucre, Gil Imaná, José Ostria y Josefina Reynolds; en su taller en La Paz, con Graciela Rodo Boulanger, María Esther Ballivián y Raúl Mariaca. Recorrió diferentes países de América, quedando prendado del paisaje boliviano y su gente.\n\nCecilio Guzmán de Rojas y Gregorio Reynolds fueron grandes amigos suyos, mientras que con la poeta Yolanda Bedregal tuvo una intensa historia de amor que se transformó en una amistad mantenida por correspondencia. Los retratos que hizo de la artista son célebres.\n\nRimsa se naturalizó boliviano y recibió el Cóndor de los Andes por sus méritos artísticos y por haber hecho conocer a Bolivia, a través de sus obras, en el exterior. Residió también en Argentina, Brasil y Tahití. Pasó sus últimos días en California, EEUU.\n\nEs por todo esto que la Fundación Simón I. Patiño escogió inaugurar las salas de exposición del nuevo edificio del Espacio Patiño —Ecuador, esquina Rosendo Gutiérrez— con un más que merecido homenaje.\n'),
(24, 'contenido'),
(25, '\r\n\r\nEntre los protagonistas de sus filmes están Jorge Ortiz, Daniela Gandarillas, Paloma Delaine y Jess Velarde.\r\n\r\nLa compilación incluye las producciones La montaña interior (2012); Arcano (2013); La piel del mar (2013); Raptus (2013); Chroma (2014); Sakramento (2016); La república de las ideas (2017) y 2025 profético (2018).\r\n\r\nEl crítico de cine Claudio Sánchez asegura que Torres es uno de los testigos y protagonistas más importantes de la producción de súper 8 en Bolivia. \r\n\r\n“Cineasta outsider, su obra atraviesa cuatro décadas de la historia del cine nacional, y su filmografía se enriquece con producciones realizadas en diferentes formatos. Torres inscribe su nombre como el primer cineasta en estrenar un largometraje digital boliviano, se trata de su película Alma y el viaje al mar, que en enero de 2003 fue presentada comercialmente en la sala Modesta Sanjinés de la Casa de la Cultura de La Paz”.\r\n'),
(26, '111'),
(27, 'qqqqq'),
(28, 'aasddqweasd'),
(29, 'asdssff'),
(30, ' \r\n<div>Página siete / <span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Alejandra Pau </span><br><br><h1 open=\"\" sans-serif;=\"\" line-height:=\"\" em;=\"\" letter-spacing:=\"\" xss=removed class=\"titular\">Amigos del muro: dibujar un personaje y hacerlo real</h1> \r\n</div> \r\n<div><br> \r\n</div> \r\n<div><span open=\"\" xss=removed class=\"bajada\">La arquitecta e historietista, Alexandra Ramirez, convierte a sus dibujos, puntada a puntada, en personajes tangibles. 30 de ellos serán los protagonistas de una exposición.</span> \r\n</div> \r\n<div><br> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Con cada puntada,  cada extremidad articulada, cada tela reciclada convertida en un cuerpo,  Alexandra Ramirez  Flores, hace  tangibles los personajes salidos de su libreta personal de dibujos en la que plasma a los habitantes de su imaginación... Los amigos del muro. </span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Cada uno de los muñecos son personajes de una historia que empezó en 2004 (...)Se trata de la historia de Sandy,   una niña que tiene   un muro en su habitación,   una especie de portal  en el que ellos viven. Éste es el primer paso de un proyecto más grande: obtener fondos para hacer una serie animada en Stop Motion (técnica de animación)”, detalla la arquitecta e ilustradora, Alexandra Ramirez. </span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Sus  libretas contienen 243 bocetos y más de un centenar de diseños terminados;    de éstos,  30  piezas   formarán parte de una exposición que se inaugurará el 23 de enero  en el Espacio Simón I. Patiño.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Junto a la protagonista Sandy estarán personajes como Lizardo, Bruno, Roger, Felipe, Lio,  entre otros.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Durante la exposición denominada Amigos del Muro, se contará el inicio de  la historia  de los personajes que hoy habitan el mundo real. Es la cuarta muestra  que se realiza sobre ellos y será  el paso fundamental para que  la trama se cuente en otros formatos. </span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Junto a las piezas se exhibirán  cuadros originales pintados en acuarela y digitalmente. Se proyectarán audiovisuales en los que los personajes pueden moverse;  fotografías del proceso del desarrollo; y   pruebas de animación cuadro por cuadro.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Con ello, la artista boliviano-brasileña, que tiene una maestría en Animación 3D, transmitirá parte de su trabajo cuyo pilar es asumir el desafío de  hacer una pieza tridimensional a partir de un dibujo.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>La  exposición es parte de un gran proyecto en el cual los personajes formarán parte de libros infantiles, una novela gráfica y, finalmente, una  serie animada en Stop Motion, esta última dirigida a adolescentes y adultos.</span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div><span open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></span> \r\n</div> \r\n<div> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><span xss=removed>Sandy y el muro</span></p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Sandy es una niña solitaria cuyos mejores amigos son Felipe y Roger. Ella piensa   que se está volviendo loca porque hay manchas en una de sus paredes que le hablan. Decide escucharlas y ellas replican “No te preocupes, somos tus amigos del muro. Queremos ayudarte, pero queremos salir de aquí”.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Para salir necesitan un contenedor, es decir, que Sandy haga un muñeco. Cada pequeña mancha es un ‘almita’ que de alguna manera se transforma en el muñeco que ella está cosiendo (...) Cada amigo del muro lleva un mensaje muy sutil sobre la violencia contra la niñez, porque cuando hablamos de ‘almitas’ nos  referimos   a la muerte”, explica la expositora.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><span xss=removed><b>“Un  proyecto de vida”<br></b></span>Confeccionar cada  pieza puede tomar entre  tres semanas y  dos meses; todo el material que se utiliza para el armado es reciclado. La búsqueda de telas y texturas que se acerquen lo mejor posible al diseño que está  en papel es siempre un desafío.  </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Yo lo llamo mucho: mi proyecto de vida”, dice Ramirez cuando admite que, aunque es una actividad creativa cuya  ejecución es  muy demandante,  nunca ha sido tan feliz al realizar un proyecto.  </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Muchos de ellos surgen porque después de dibujarlos, mi mamá les ponía el nombre, ha sido la gran impulsora de todo esto. Por ello, la exposición está dedicada a ella”, destaca la animadora, que desde hace seis años es directora de la Asociación  de Viñetas con Altura. </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Su madre falleció hace tres años y una parte importante del proyecto se enfoca en reivindicar su apoyo, fundamental para que la artista decida hacer realidad este proyecto. Apoyo que estuvo con ella desde siempre, como aquella vez que la llevó al cine a ver El extraño Mundo de Jack (The Nightmare Before Christmas) de Tim Burton, director de cine que se convirtió en una inspiración para   ella.  </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed> </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Con el tiempo ha ido perfeccionando las técnicas para armar la estructura y las  piezas cuyos detalles, que en su mayoría miden milímetros, tienen un alto nivel del complejidad.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Cuando comenzó a coser las piezas, vender los muñecos le resultaba muy difícil porque no transmitían la historia  de la que eran parte. Hoy son indivisibles de este mundo imaginario que juega con la realidad,  que pretende sobrepasar  lo lúdico y  comunicar un concepto.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>Si bien la historia  es un tanto autobiográfica, ya que  Ramirez como Sandy cosen y le dan forma a  los personajes para hacerlos reales,  la parte más importante es la carga emotiva marcada por  la presencia de su madre en el proceso, ella la ayudó a crear muchas historias y bautizó a muchos personajes. </p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed>“Cuando alguien se lleva un Amigo del Muro, no está adquiriendo un juguete. Se trata del diseño de autor que se convierte en una pieza que  tiene un concepto, una historia, una carga emotiva. Son personajes poderosos, ellos son las estrellas de todo esto aunque, a veces, se los vea como  ‘monstritos’”, concluye Ramirez.</p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><span xss=removed>Sobre la exposición  Amigos del muro</span></p> \r\n  <ul open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed> \r\n    <li xss=removed><span xss=removed>Fecha y lugar </span>La exposición Amigos del Muro de la artista Alexandra Ramirez se inaugurará  el 23 de enero,  a las 19:30 horas, en la Sala Multifuncional del Espacio Simón I. Patiño. Dirección:  Avenida Ecuador #2503, esquina Belisario Salinas. Edificio Guayaquil, mezanine. Sopocachi. </li> \r\n    <li xss=removed><span xss=removed>Sobre la muestra </span>Las 30 piezas expuestas estarán en cúpulas de vidrio. Cada pieza cuesta entre 200 y 500 bolivianos. </li> \r\n    <li xss=removed><span xss=removed> En las redes </span>Para saber más sobre la exposición se puede ingresar a la página  en Facebook: Los Amigos del Muro.</li> \r\n  </ul> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></p> \r\n  <p open=\"\" sans-serif;=\"\" font-size:=\"\" xss=removed><br></p> \r\n</div>'),
(31, 'Los participantes se enfrentarán al micrófono para aprender a expresarse, según los organizadores. \r\n\r\nParte del programa implica que los asistentes adquirirán técnica vocal y lectura veloz, además de divertirse sincronizando su voz con la de sus personajes favoritos, desarrollando su capacidad de concentración de una forma amena y expresando emociones y sentimientos para lograr la interpretación actoral.\r\n\r\nEl taller será dictado por Habla Studios de La Paz, productora que hace años se dedica a la producción audiovisual. \r\n\r\nGanadora del concurso ‘Muéstranos tu arte’ (2017), organizado por el Espacio Simón I. Patiño, en la actualidad realiza prácticas preprofesionales de doblaje de películas live-action, series ánime, así como radionovelas, alcanzando más de un millón de visitas en su canal de YouTube. Demo: <a href=\'https://www.youtube.com/watch?v=Mxk6hQhWQGc\'>https://www.youtube.com/watch?v=Mxk6hQhWQGc</a>\r\n\r\nEl costo es de Bs 350, informaciones en el Espacio Patiño, teléfono 2410329 int. 221, celular 69735331.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
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
-- Estructura de tabla para la tabla `imagen_portada`
--

DROP TABLE IF EXISTS `imagen_portada`;
CREATE TABLE `imagen_portada` (
  `id_portada` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(24) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `imagen_portada`
--

INSERT INTO `imagen_portada` (`id_portada`, `imagen`, `color`, `status`) VALUES
(1, 'portadas/portada1.jpg', '', 1),
(3, 'portadas/portada2.jpg', 'rgba(30,87,153,1)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `id_categoriaLibro` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `precio` float DEFAULT NULL,
  `portada` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `id_categoriaLibro`, `titulo`, `autor`, `descripcion`, `precio`, `portada`, `status`, `id_area`) VALUES
(1, 3, '4o Encuentro de cine: el corto boliviano, hoy', 'Espacio Simón I. Patiño / Cedoal', 'La Paz: Espacio Simón I. Patiño, 2016\r\n103 Pags.                   ', 40, 'uploads/libros/img_4o-encuentro-de-cine-el-corto-boliviano-hoy_137.jpg', 1, NULL),
(3, 4, 'Adolfo Cáceres Romero, Una Vida entre Libros', 'Centro Pedagógico y Cultural Simón I. Patiño', 'Cochabamba: Fundación Simón I. Patiño/ Centro Pedagógico y Cultural Simón I. Patiño, 2011\r\n1 CD                  ', 25, 'uploads/libros/img_adolfo-cceres-romero-una-vida-entre-libros_77.jpg', 1, NULL),
(5, 6, 'Algas de Bolivia: con énfasis en el fitoplancton', 'Cadima, Mirta; Erika Fernández; Ulian F. López Zambrana', 'Santa Cruz: Centro de Ecología Difusión Simón I. Patiño, 2005\r\n396 páginas    ', 120, 'uploads/libros/img_algas-de-bolivia-con-nfasis-en-el-fitoplancton_113.jpg', 1, NULL),
(10, 4, 'Yolanda de américa: biografía de Yolanda Bedregal', 'Centro pedagógico y cultural Simón I. Patiño', 'Cochabamba: Fundación Simón I. Patiño/Centro pedagógico y cultural Simón I. Patiño,\r\n1 DVD              ', 25, 'uploads/libros/img_yolanda-de-amrica-biografa-de-yolanda-bedregal_98.jpg', 1, NULL),
(11, 3, 'Bolivia dibujo y artes gráficas: exposición permanente', 'Espacio Simón I. Patiño', 'La Paz: Fundación Simón I. Patiño / Espacio\r\nSimón I. Patiño, 2001\r\n42 páginas', 20, 'uploads/libros/img_bolivia-dibujo-y-artes-graficas-exposicoin-permanente_63.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembro_equipo`
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
-- Estructura de tabla para la tabla `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE `noticia` (
  `id_post` int(11) NOT NULL,
  `fuente` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `url` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_post`, `fuente`, `url`) VALUES
(1, 'Página Siete / Gabriela Alanoca C.  / La Paz', 'noticia/Espacio Simón I. Patiño abrirá en 2019 el teatro Doña Albina'),
(9, 'Jackeline Rojas Heredia  / Cambio', 'noticia/INAUGURAN EXPOSICIÓN DE FOTOS EN LA ESCENA TEATRAL'),
(21, 'PÁGINA SIETE / Gabriela Alanoca C.', 'noticia/Cassany: Divertirse con la lectura es una manera de incentivarla'),
(22, 'La Razón (Edición Impresa) / Miguel Vargas', 'noticia/Juan Rimsa, de maestro maestros'),
(25, 'CAMBIO / Milenka Parisaca', 'noticia/FILMOGRAFÍA DE TORRES EN LA CINEMATECA'),
(30, 'Página siete / Alejandra Pau ', 'noticia/Amigos del muro: dibujar un personaje y hacerlo real'),
(31, 'J.R.H / Cambio', 'noticia/ABREN TALLER DE DOBLAJE Y TÉCNICA ACTORAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

DROP TABLE IF EXISTS `pagina`;
CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `external` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `titulo`, `enlace`, `external`) VALUES
(1, 'Quiénes Somos', 'quienes_somos', 0),
(2, 'Áreas', 'areas', 0),
(3, 'Agenda', 'agenda', 0),
(4, 'Catálogo en línea', 'http://opacespacio.fundacionpatino.org/', 1),
(6, 'Librería', 'libreria', 0),
(7, 'Noticias', 'noticias', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE `publicacion` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `resumen` text COLLATE utf8_spanish2_ci,
  `imagen_destacada` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tipo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_post`, `titulo`, `fecha`, `resumen`, `imagen_destacada`, `status`, `tipo`) VALUES
(1, 'Espacio Simón I. Patiño abrirá en 2019 el teatro Doña Albina', '2018-12-20', 'El próximo año el espacio albergará en sus dos salas de exposición 10 muestras, la primera se realizará en abril, mientras se pretende estrenar el teatro en el primer semestre.', 'uploads/noticias/noticia1.jpg', 1, 'noticia'),
(9, 'INAUGURAN EXPOSICIÓN DE FOTOS EN LA ESCENA TEATRAL', '2018-05-03', ' En la galería del Espacio Simón I. Patiño se inauguró ayer la exposición Simbiosis: La imagen fotográfica en la escena teatral, de la artista costarricense Ana Muñoz, en el marco del XI Festival Internacional de Teatro de La Paz (Fitaz)\r\n                  ', 'uploads/noticias/img_inauguran-exposicion-de-fotos-en-la-escena-teatral_1756.jpg', 1, 'noticia'),
(21, 'Cassany: Divertirse con la lectura es una manera de incentivarla', '2018-08-14', 'El doctor Daniel Cassany llegó a La Paz para las V Jornadas Pedagógicas Internacionales. Entregó sus cuatro consejos para generar el hábito de la lectura.', 'uploads/noticias/img_cassany-divertirse-con-la-lectura-es-una-manera-de-incentivarla_190.jpg', 1, 'noticia'),
(22, 'Juan Rimsa, de maestro maestros', '2018-12-18', 'El Espacio Patiño abrió su sala de exposiciones con una gran retrospectiva.', 'uploads/noticias/img_juan-rimsa-de-maestro-maestros_195.jpg', 1, 'noticia'),
(25, 'FILMOGRAFÍA DE TORRES EN LA CINEMATECA', '2018-07-18', ' En el Espacio Simón I. Patiño de la ciudad de La Paz se presentará este viernes un DVD con la filmografía de Diego Torres (2011-2018).  El evento empezará a las 19.00.\r\nLa producción de Torres, poeta, ecologista y cineasta paceño, se caracterizó por ser en formato súper 8, blanco y negro, excepto Chroma, que fue rodada en cinta Ektachrome. ', 'uploads/noticias/img_filmografia-de-torres-en-la-cinemateca_186.jpg', 1, 'noticia'),
(30, 'Amigos del muro: dibujar un personaje y hacerlo real', '2018-01-06', 'La arquitecta e historietista, Alexandra Ramirez, convierte a sus dibujos, puntada a puntada, en personajes tangibles. 30 de ellos serán los protagonistas de una exposición.', 'uploads/noticias/img_amigos-del-muro-dibujar-un-personaje-y-hacerlo-real_145.jpg', 1, 'noticia'),
(31, 'ABREN TALLER DE DOBLAJE Y TÉCNICA ACTORAL', '2018-06-07', 'En la sala multifuncional del anexo del Espacio Patiño se realizará el taller ‘Doblaje y técnica actoral vocal inicial’, a cargo de Jim López y Adrián Viveros, de Habla Studios, entre el lunes 11 y el jueves 14 de junio de 15.00 a 19.00.', 'uploads/noticias/img_abren-taller-de-doblaje-y-tecnica-actoral_178.jpg', 1, 'noticia');

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
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
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
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `miembro_equipo`
--
ALTER TABLE `miembro_equipo`
  ADD PRIMARY KEY (`id_persona`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `categoria_equipo`
--
ALTER TABLE `categoria_equipo`
  MODIFY `id_categoria_equipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria_libro`
--
ALTER TABLE `categoria_libro`
  MODIFY `id_categoriaLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `imagen_portada`
--
ALTER TABLE `imagen_portada`
  MODIFY `id_portada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `miembro_equipo`
--
ALTER TABLE `miembro_equipo`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;