-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-02-2020 a las 01:35:32
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `villaalbina`
--

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
  `color_area` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartelera`
--

DROP TABLE IF EXISTS `cartelera`;
CREATE TABLE `cartelera` (
  `id_cartelera` int(11) NOT NULL,
  `enlace` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `size` int(11) NOT NULL,
  `fecha` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_libro`
--

DROP TABLE IF EXISTS `categoria_libro`;
CREATE TABLE `categoria_libro` (
  `id_categoriaLibro` int(11) NOT NULL,
  `categoria` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_libro`
--

INSERT INTO `categoria_libro` (`id_categoriaLibro`, `categoria`, `status`) VALUES
(1, 'Literatura', 1),
(2, 'Filosofía', 1),
(3, 'Artes', 1),
(4, 'Memorias', 1),
(5, 'Música', 1),
(6, 'Ecología', 1),
(7, 'Investigaciones Fitoecogenéticas', 1),
(8, 'Ecopedagogía', 1),
(9, 'Literatura infantil', 1),
(10, 'Cómic', 1),
(11, 'Pedagogía', 1),
(12, 'DVD', 1),
(13, 'Revista', 1);

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
  `leyenda` varchar(400) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `html` text COLLATE utf8_spanish2_ci NOT NULL,
  `mostrar` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_content`, `titulo`, `imagen`, `leyenda`, `html`, `mostrar`) VALUES
(1, 'Inauguración', 'uploads/subpagina/inauguracion_1.jpg', '', '<p>El proyecto para convertir Villa Albina en una Casa Museo atiende a las necesidades tur&iacute;sticas de la regi&oacute;n y as&iacute; lo comprendieron los miembros del Consejo Directivo de la Fundaci&oacute;n Sim&oacute;n Pati&ntilde;o, tanto en Ginebra como en Bolivia, que confiaron y dieron su apoyo para regalarle a Cochabamba la belleza de Villa Albina, de la casa y sus jardines que, con tanta devoci&oacute;n, fueron cuidados desde el a&ntilde;o 1964, cuando los herederos de los esposos Pati&ntilde;o donaron la propiedad en favor de la Fundaci&oacute;n Universitaria Sim&oacute;n I. Pati&ntilde;o.<br /><br />La Casa Museo Villa Albina se inaugur&oacute; el 10 de mayo de 2019. Cada uno de los espacios fueron cuidadosamente preparados para su exposici&oacute;n, los muebles y enseres personales que dej&oacute; la familia revelan un valor que va m&aacute;s all&aacute; de su materialidad, pues muestran la historia evocada de la vida de Do&ntilde;a Albina y de sus hijos que, tambi&eacute;n con sus propias familias, habitaron la casa. Donde originalmente era el sal&oacute;n de juegos, se ha habilitado una Sala de Exposiciones permanente que ofrece muestras itinerantes dedicadas a la familia Pati&ntilde;o Rodr&iacute;guez.<br /><br />El recorrido en su totalidad, es una experiencia inmersiva en la que los visitantes podr&aacute;n disfrutar el lugar donde Do&ntilde;a Albina y sus hijos compartieron momentos de familia y ser testigos de su fascinaci&oacute;n por la naturaleza, as&iacute; como por la belleza de los objetos y muebles que adornan la casa. <br /><br />&ldquo;No son los muros, ni el techo ni el piso que dan car&aacute;cter a la casa, sino los seres que la hacen viva con su conversaci&oacute;n, sus risas y sus amores&hellip;&rdquo; (Ernesto S&aacute;bato)<br /><br /></p>', 1),
(2, 'Historia y Arquitectura', 'uploads/subpagina/Captura_de_pantalla.png', '', '<p>Villa Albina, se erige imponente y sobria en medio de la maravillosa campi&ntilde;a cochabambina, a los pies de la cordillera del Tunari; es la casa de campo de los esposos Pati&ntilde;o, Sim&oacute;n y Albina.<br /><br />Sim&oacute;n I. Pati&ntilde;o, amante de su patria y de su familia, fue el m&aacute;s grande industrial sudamericano de su generaci&oacute;n, recibi&oacute; por parte de la prensa internacional el nombre de El Rey del Esta&ntilde;o. A principios del Siglo XX, Don Sim&oacute;n orden&oacute; la elaboraci&oacute;n de los primeros planos para la construcci&oacute;n de Villa Albina y alrededor de esta propiedad, una hacienda agr&iacute;cola y ganadera con un nivel de tecnolog&iacute;a muy elevado, que incluye la construcci&oacute;n del Dique de San Francisco, cuyas aguas del lago artificial permit&iacute;an el riego de los cultivos y la generaci&oacute;n de energ&iacute;a hidroel&eacute;ctrica. La central el&eacute;ctrica, se encuentra edificada en el lugar donde actualmente funciona el Parque Ecotur&iacute;stico de Pairumani.<br /><br />En medio de la Hacienda Pairumani, Villa Albina, con casi cien a&ntilde;os de antig&uuml;edad, mantiene intacta la elegancia con la que fue dise&ntilde;ada por el Arquitecto franc&eacute;s Jos&eacute; Turigas, con algunas modificaciones del Arquitecto boliviano Max Franz y edificada por el constructor franc&eacute;s Francisco Nardin. La arquitectura de la edificaci&oacute;n respeta el estilo mediterr&aacute;neo imperante en la &eacute;poca; se compone de un patio principal y otro secundario llamado tambi&eacute;n de servicio. El ingreso a la casa, por el ala norte, conduce a un patio central cuadrangular, en el que una fuente de agua, hecha en piedra, complementa el conjunto que se caracteriza por su luminosidad y tranquilidad.<br /><br />Sus jardines ocupan cerca de 16 hect&aacute;reas, embellecidos con especies arb&oacute;reas nativas e introducidas, como araucarias y magnolias. Uno de los principales responsables del dise&ntilde;o y cuidado de los jardines fue el subdirector del jard&iacute;n Bot&aacute;nico de Santiago de Chile, Sr. Pereira. Al lado este se puede apreciar un espejo de agua con reminiscencias orientales, que le otorgan un aspecto se&ntilde;orial y rom&aacute;ntico cuyo dise&ntilde;o pertenece al japon&eacute;s, Sr. Tanabe.&nbsp; En el parque fueron colocadas dos esculturas hechas en m&aacute;rmol con motivos neocl&aacute;sicos, obras del escultor franc&eacute;s F. Cavaroc. <br /><br />En el interior de la casa, el dise&ntilde;o mantiene un ambicioso y lujoso estilo decorativo denominado Art Dec&oacute;, muy de moda en el Par&iacute;s de principios de Siglo XX.&nbsp; Los ambientes son acogedores, decorados con pesadas cortinas, alfombras persas, l&aacute;mparas de alabastro o cristal de roca. Los empapelados de las paredes, denominados Vieneses, aportan una sensaci&oacute;n alegre y colorida en cada habitaci&oacute;n.&nbsp; En la planta baja est&aacute;n ubicados varios salones de recepci&oacute;n y salas de juego; el comedor principal y la sala de baile. La planta superior fue construida para las &aacute;reas privadas de la casa, dormitorios, ba&ntilde;os y lugares de reposo. Las habitaciones est&aacute;n equipadas con variedad divanes y biombos adem&aacute;s de objetos personales que se exponen a manera de recrear la vida cotidiana de la familia.<br /><br /></p>', 1),
(3, 'Visitas Guiadas', 'uploads/subpagina/IMG_0002.JPG', '', '<p>El recorrido al Museo Villa Albina dura una hora y comprende un tour guiado en espa&ntilde;ol por las habitaciones de la casa, donde tambi&eacute;n se exponen elementos pertenecientes a la familia Pati&ntilde;o-Rodr&iacute;guez. En la planta baja est&aacute;s ubicados los salones de recepci&oacute;n, mientras que en el segundo piso fue construido para las &aacute;reas privadas de la familia, dormitorios y lugares de reposo. El conjunto entero, es decir la casa y los objetos que la habitan, recrean el esp&iacute;titu de quienes vivieron en ella, Do&ntilde;a Albina, sus hijos y sus nietos.</p>\r\n<p>Parte importante del recorrido es la visita a la&nbsp; <a href=\"agenda\">Sala de Exposiciones</a> y por supuesto, el paseo por cuenta propia por los jardines de Villa Albina, hasta la hora de cierre.</p>', 1),
(4, 'El Legado', 'uploads/subpagina/110pat_54-VA(D7)_2716(48x41,5).jpg', '', '<p>En 1931 Don Sim&oacute;n I. Pati&ntilde;o crea la Fundaci&oacute;n Universitaria Sim&oacute;n I. Pati&ntilde;o con el objetivo de favorecer la formaci&oacute;n de profesionales bolivianos. Los herederos de la familia, crean en 1958 la Fundaci&oacute;n Sim&oacute;n I. Pati&ntilde;o con sede en la ciudad de Ginebra, Suiza. Desde 1968 ambas Fundaciones trabajan por el bienestar de la poblaci&oacute;n boliviana a trav&eacute;s de Centros especializados que abordan los aspectos de la salud y nutrici&oacute;n infantil, la seguridad alimentaria, la agroecolog&iacute;a, la educaci&oacute;n, la cultura, la educaci&oacute;n ambiental y la formaci&oacute;n profesional a trav&eacute;s de becas de post grado. <a href=\"https://www.fundacionpatino.org/quienes-somos/\">Quienes Somos</a></p>', 1),
(5, 'Sesion de Fotografia', 'uploads/subpagina/matriqui_nusta_y_lia.JPG', NULL, '<p>Se permiten sesiones de fotograf&iacute;as y videos en los jardines de Villa Albina de acuerdo a un tarifario.<br />El requisito es formalizar una reserva y realizar el pago anticipado con un m&iacute;nimo de 48 horas de actelaci&oacute;n a la actividad. A trav&eacute;s de nuestros canales de informaci&oacute;n o llenando el formulario de reserva, obtendr&aacute; informaci&oacute;n sobre los precios y la forma de pago.</p>', 1),
(6, 'Horario de Atencion', 'uploads/subpagina/relojparahorarios.png', '', '<p>La oficina de administracion de la Casa Museo Villa Albina est&aacute; abierta de lunes a viernes de Hrs. 07:30 a Hrs. 15:30.</p>', 1),
(7, 'Sala de Exposiciones', 'uploads/subpagina/110pat_54-VA(D7)_2716(48x41,5).jpg', '', '<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\"><strong style=\"mso-bidi-font-weight: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin;\">&ldquo;Don Sim&oacute;n y Do&ntilde;a Albina. Horizontes Compartidos&rdquo;</span></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\">&nbsp;</p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\"><strong style=\"mso-bidi-font-weight: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin;\">&nbsp;</span></strong><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin;\">La exposici&oacute;n ha sido preparada por las curadoras Michela Pentimalli y Jaqueline Calatayud para la inauguraci&oacute;n de las actividades del nuevo edificio del Espacio Sim&oacute;n I. Pati&ntilde;o de La Paz, en noviembre de 2018.<span style=\"mso-spacerun: yes;\">&nbsp; </span><em style=\"mso-bidi-font-style: normal;\">&ldquo;Don Sim&oacute;n y Do&ntilde;a Albina. Horizontes Compartidos&rdquo;</em> inaugura tambi&eacute;n las actividades de la Casa Museo Villa Albina y est&aacute; vigente desde mayo de 2019 en la Sala de Exposiciones que se visita durante el recorrido por la Casa.</span></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\">&nbsp;</p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: center; line-height: normal;\" align=\"center\"><strong style=\"mso-bidi-font-weight: normal;\"><em style=\"mso-bidi-font-style: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">DON SIM&Oacute;N Y DO&Ntilde;A ALBINA</span></em></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: center; line-height: normal;\" align=\"center\"><strong style=\"mso-bidi-font-weight: normal;\"><em style=\"mso-bidi-font-style: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">HORIZONTES COMPARTIDOS</span></em></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: center; line-height: normal;\" align=\"center\">&nbsp;</p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\"><strong style=\"mso-bidi-font-weight: normal;\"><em style=\"mso-bidi-font-style: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">La exposici&oacute;n est&aacute; conformada por un conjunto de documentos, fotograf&iacute;as y videos, de valor hist&oacute;rico documental, que muestran facetas distintas de la familia Pati&ntilde;o, m&aacute;s all&aacute; de las actividades empresariales: la sociabilidad cotidiana y el entorno arquitect&oacute;nico y art&iacute;stico; el profundo inter&eacute;s por la formaci&oacute;n profesional de los j&oacute;venes; por la salud, especialmente infantil; por el desarrollo agropecuario de Bolivia. Horizontes compartidos: desaf&iacute;os que exig&iacute;an la respuesta de acciones concretas, como, por ejemplo, la creaci&oacute;n de la Fundaci&oacute;n Universitaria Sim&oacute;n I. Pati&ntilde;o, de la Hacienda Pairumani, o del Hospital Albina R. de Pati&ntilde;o. La exposici&oacute;n resalta particularmente la solidaridad patri&oacute;tica en momentos de crisis, como en la Guerra del Chaco, y destaca actos de devoci&oacute;n y filantrop&iacute;a.</span></em></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\"><strong style=\"mso-bidi-font-weight: normal;\"><em style=\"mso-bidi-font-style: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">&nbsp;Al recorrer la muestra, el visitante se acercar&aacute; as&iacute; a la sensibilidad, al pensamiento y a las acciones, de los esposos Pati&ntilde;o, unidos por un proyecto de vida.</span></em></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: right; line-height: normal;\" align=\"right\"><strong style=\"mso-bidi-font-weight: normal;\"><em style=\"mso-bidi-font-style: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">&nbsp; <br /></span></em></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: right; line-height: normal;\" align=\"right\"><strong style=\"mso-bidi-font-weight: normal;\"><em style=\"mso-bidi-font-style: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">Michela Pentimalli</span></em></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: right; line-height: normal;\" align=\"right\"><strong style=\"mso-bidi-font-weight: normal;\"><em style=\"mso-bidi-font-style: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">Jaqueline Calatayud</span></em></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: right; line-height: normal;\" align=\"right\"><strong style=\"mso-bidi-font-weight: normal;\"><em style=\"mso-bidi-font-style: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">Curadoras de la exposici&oacute;n</span></em></strong></p>\n<p>&nbsp;</p>', 1),
(8, 'Horario', 'uploads/subpagina/IMG_20190526_104427.jpg', NULL, '<p><span style=\"font-size: 14pt;\"><strong>De martes a viernes:</strong></span><br /><span style=\"font-size: 14pt;\">Hrs. 14:00 - 14:30 - 15:00</span><br /><span style=\"font-size: 14pt;\"><strong>S&aacute;bado</strong></span><br /><span style=\"font-size: 14pt;\">Hrs. 9:30 - 10:00 - 10:30 - 11:00</span><br /><span style=\"font-size: 14pt;\"><strong>Domingo</strong></span><br /><span style=\"font-size: 14pt;\">Hrs. 10:00 - 10:30 - 11:00</span><br /><br /><span style=\"font-size: 14pt;\">CERRADO Lunes y feriados departamentales y nacionales</span></p>', 1),
(9, 'Entradas', '', NULL, '<p><span style=\"font-size: 14pt;\">La entrada incluye la visita guiada por la casa, el ingreso a la Sala de exposiciones y el paseo por cuenta propua por los jardines de Villa Albina. Est&aacute;n a la venta en boleter&iacute;a 15 minutos antes de la hora de apertura.</span><br /><br /><span style=\"font-size: 14pt;\"><strong>Ingreso</strong> Bs. 10.-</span><br /><span style=\"font-size: 14pt;\"><strong>Menores de 12 a&ntilde;os</strong> Bs. 5.-</span><br /><span style=\"font-size: 14pt;\"><strong>Delegaciones de estudiantes</strong> Bs. 5.-</span></p>', 1),
(10, 'VISITAS GUIADAS PARA GRUPOS O DELEGACIONES', 'uploads/subpagina/visitas.jpg', '', '<p>Nuestro deseo es atender a las delegaciones de acuerdo a sus requerimientos a fin de brindarles comodidad. Agrupaciones, Unidades Educativas y Universidades, acompa&ntilde;ados por sus respectivos profesores, podr&aacute;n visitar la Casa Museo Villa Albina con el &uacute;nico requisito de formalizar una reserva con un m&iacute;nimo de 48 horas de antelaci&oacute;n, llenando el <a href=\"visitas_guiadas?active=formulario_de_reserva_para_grupos\">formulario de reserva</a> en esta pagina o a trav&eacute;s de cualquiera de nuestros canales de informaci&oacute;n.</p>', 1),
(11, 'Doña Albina', 'uploads/subpagina/113pat_62-VA(D7)_2691(13,5x19,5).jpg', 'Albina Rodríguez de Patiño <br>  Positivo sobre papel fotográfico <br> Fotografía: J. Johannessen', '<p>Albina Rodr&iacute;guez Ocampo naci&oacute; en Oruro en el a&ntilde;o 1873, en el seno de una respetada familia de aquella ciudad. En 1889 se casa con Sim&oacute;n I. Pati&ntilde;o quien ser&iacute;a su gran compa&ntilde;ero de vida. Juntos fueron padres de Ren&eacute;, Antenor, Graziella, Elena y Luz Mila Pati&ntilde;o Rodr&iacute;guez.<br /><br />Do&ntilde;a Albina acompa&ntilde;&oacute; la escalada hacia el &eacute;xito empresarial de Don Sim&oacute;n, camino que estuvo lleno de dificultades y que las enfrentar&iacute;an juntos. C.F. Geddes en &ldquo;<em>Pati&ntilde;o Rey del Esta&ntilde;o</em>&rdquo;, relata en uno de los pasajes m&aacute;s conmovedores de la historia de la familia que, dejando la comodidad de su casa en Oruro, en 1899 Albina se traslada a Unc&iacute;a para vivir con su esposo, acompa&ntilde;&aacute;ndolo en el d&iacute;a a d&iacute;a de las minas. Fue fundamental su apoyo cuando en momentos de crisis, para poder mantener la explotaci&oacute;n de la mina, Do&ntilde;a Albina vendi&oacute; sus pocas joyas, los muebles de la casa y algunos objetos caseros en Oruro, para pagar salarios atrasados y otros gastos que demandaba el mantenimiento del peque&ntilde;o campamento de La Salvadora. &ldquo;<em>Pati&ntilde;o qued&oacute; hondamente conmovido por esa heroica resoluci&oacute;n de &ldquo;quemar las naves&rdquo;, demostrativa de la absoluta confianza de su esposa y de que las palabras de la ceremonia nupcial, &ldquo;para bien o para mal&rdquo;, no eran vanas. De all&iacute; en adelante, tendr&iacute;an que hundirse o salir a flote juntos</em>&rdquo;. En muestra de su agradecimiento, Don Sim&oacute;n le ofreci&oacute; construirle un palacio alg&uacute;n d&iacute;a.<br /><br />Do&ntilde;a Albina y sus cinco hijos, a&uacute;n muy peque&ntilde;os, llegaron a Unc&iacute;a a habitar una peque&ntilde;a casita de piedra situada a unos 200 metros de la mina La Salvadora. &ldquo;<em>Todo cambi&oacute; desde el arribo de Do&ntilde;a Albina. La terrible soledad hab&iacute;a llegado a su fin. Ella llev&oacute; un nuevo esp&iacute;ritu al campamento; no tard&oacute; en ganarse el respeto de los trabajadores mineros y cuando su esposo ten&iacute;a que ausentarse, ella era el capataz indiscutido que pod&iacute;a adoptar las decisiones necesarias. Todo aquello debi&oacute; de haber significado un tremendo cambio para la joven. A&ntilde;os m&aacute;s tarde, al hablar de su vida en el peque&ntilde;o campamento, Do&ntilde;a Albina jam&aacute;s mencionaba las dificultades y privaciones.</em>&rdquo; Relata Geddes.<br /><br />J&oacute;venes a&uacute;n, los esposos Pati&ntilde;o y sus hijos realizaron un viaje de vacaciones a Cochabamba y fueron invitados a pasar un d&iacute;a de campo en Vinto, bajo un huerto de a&ntilde;osos olivos. Don Sim&oacute;n, al ver que su esposa estaba encantada con el clima y el paisaje de Pairumani, le ofrece construirle, alg&uacute;n d&iacute;a, una casa de campo en la zona. Una promesa de amor y de profundo agradecimiento que se har&iacute;a realidad en 1917 con el inicio de los trabajos de construcci&oacute;n de la Hacienda Pairumani y de Villa Albina, la edificaci&oacute;n central de la propiedad.<br /><br />Cuando el &eacute;xito de la Mina La Salvadora transform&oacute; la vida de los Pati&ntilde;o y trajo a su vez desarrollo tecnol&oacute;gico y de infraestructura a los centros mineros, Don Sim&oacute;n hizo construir un hospital en Catavi y otro en Unc&iacute;a que llevaron el nombre de Do&ntilde;a Albina, en homenaje a su constante preocupaci&oacute;n por la salud de los ni&ntilde;os. Tambi&eacute;n en 1912 los esposos financiaron la construcci&oacute;n del pabell&oacute;n infantil del Hospital Viedma en Cochabamba y en 1964, luego de la muerte de Don Sim&oacute;n y Do&ntilde;a Albina, la Fundaci&oacute;n Pati&ntilde;o contin&uacute;o con la labor filantr&oacute;pica de los esposos financiando la construcci&oacute;n del Hospital Infantil Albina Rodr&iacute;guez de Pati&ntilde;o. <br /><br />Albina Pati&ntilde;o fue adem&aacute;s una mujer devota y muestra de ello es el impulso que le dio a varios proyectos que aportaron a la Iglesia Cat&oacute;lica, por ejemplo la construcci&oacute;n de templos en los Centros Mineros y donaciones entre las que destacan el &oacute;rgano de la Catedral Potosina, la torre de la Catedral de Oruro y el Santo Sepulcro donado a la Iglesia de la Compa&ntilde;&iacute;a de Jes&uacute;s, en Cochabamba. En 1950 fue distinguida por el gobierno boliviano con la condecoraci&oacute;n del C&oacute;ndor de los Andes por sus actos en beneficio de la Patria y sus donaciones en favor de la cultura nacional. <br /><br />Luego de la muerte de Don Sim&oacute;n en 1947, Do&ntilde;a Albina vivi&oacute; en Cochabamba, en la casa que su esposo hab&iacute;a construido para ella en las faldas del Tunari, en Pairumani. <strong>Villa Albina</strong> es el testimonio de aquella promesa de amor hecha a&ntilde;os atr&aacute;s, es el abrazo de Don Sim&oacute;n a su Albina, cobij&aacute;ndola hasta su retorno a Europa y su deceso en Par&iacute;s en el a&ntilde;o 1953. <br /><br />Los restos de Don Sim&oacute;n y Do&ntilde;a Albina reposan en el Mausoleo familiar ubicado tambi&eacute;n en Pairumani. <br /><br /></p>', 1);
INSERT INTO `contenido` (`id_content`, `titulo`, `imagen`, `leyenda`, `html`, `mostrar`) VALUES
(12, 'Sala de Exposiciones', 'uploads/subpagina/DSCN0026.JPG', '', '<p><!-- [if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:RelyOnVML/>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!-- [if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>ES-BO</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"--\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!-- [if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"false\"\r\n  DefSemiHidden=\"false\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"371\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 5\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 6\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 7\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 8\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Normal Indent\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"footnote text\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"annotation text\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"header\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"footer\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"index heading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"table of figures\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"envelope address\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"envelope return\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"footnote reference\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"annotation reference\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"line number\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"page number\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"endnote reference\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"endnote text\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"table of authorities\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"macro\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"toa heading\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Bullet\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Number\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List 5\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Bullet 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Bullet 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Bullet 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Bullet 5\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Number 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Number 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Number 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Number 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Closing\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Signature\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Body Text\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Body Text Indent\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Continue\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Continue 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Continue 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Continue 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"List Continue 5\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Message Header\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Salutation\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Date\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Body Text First Indent\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Body Text First Indent 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Note Heading\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Body Text 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Body Text 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Body Text Indent 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Body Text Indent 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Block Text\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Hyperlink\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"FollowedHyperlink\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Document Map\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Plain Text\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"E-mail Signature\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Top of Form\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Bottom of Form\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Normal (Web)\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Acronym\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Address\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Cite\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Code\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Definition\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Keyboard\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Preformatted\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Sample\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Typewriter\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"HTML Variable\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Normal Table\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"annotation subject\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"No List\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Outline List 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Outline List 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Outline List 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Simple 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Simple 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Simple 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Classic 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Classic 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Classic 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Classic 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Colorful 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Colorful 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Colorful 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Columns 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Columns 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Columns 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Columns 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Columns 5\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Grid 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Grid 5\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Grid 6\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Grid 7\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Grid 8\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table List 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table List 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table List 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table List 4\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table List 5\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table List 6\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table List 7\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table List 8\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table 3D effects 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table 3D effects 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table 3D effects 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Contemporary\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Elegant\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Professional\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Subtle 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Subtle 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Web 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Web 2\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Web 3\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Balloon Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"\r\n   Name=\"Table Theme\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" SemiHidden=\"true\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" QFormat=\"true\"\r\n   Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" QFormat=\"true\"\r\n   Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" QFormat=\"true\"\r\n   Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" QFormat=\"true\"\r\n   Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" QFormat=\"true\"\r\n   Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" QFormat=\"true\"\r\n   Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"\r\n   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"41\" Name=\"Plain Table 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"42\" Name=\"Plain Table 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"43\" Name=\"Plain Table 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"44\" Name=\"Plain Table 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"45\" Name=\"Plain Table 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"40\" Name=\"Grid Table Light\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\" Name=\"Grid Table 1 Light\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"Grid Table 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"Grid Table 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"Grid Table 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"Grid Table 5 Dark\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\" Name=\"Grid Table 6 Colorful\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\" Name=\"Grid Table 7 Colorful\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"Grid Table 1 Light Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"Grid Table 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"Grid Table 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"Grid Table 4 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"Grid Table 5 Dark Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"Grid Table 6 Colorful Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"Grid Table 7 Colorful Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"Grid Table 1 Light Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"Grid Table 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"Grid Table 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"Grid Table 4 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"Grid Table 5 Dark Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"Grid Table 6 Colorful Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"Grid Table 7 Colorful Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"Grid Table 1 Light Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"Grid Table 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"Grid Table 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"Grid Table 4 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"Grid Table 5 Dark Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"Grid Table 6 Colorful Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"Grid Table 7 Colorful Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"Grid Table 1 Light Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"Grid Table 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"Grid Table 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"Grid Table 4 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"Grid Table 5 Dark Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"Grid Table 6 Colorful Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"Grid Table 7 Colorful Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"Grid Table 1 Light Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"Grid Table 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"Grid Table 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"Grid Table 4 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"Grid Table 5 Dark Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"Grid Table 6 Colorful Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"Grid Table 7 Colorful Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"Grid Table 1 Light Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"Grid Table 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"Grid Table 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"Grid Table 4 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"Grid Table 5 Dark Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"Grid Table 6 Colorful Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"Grid Table 7 Colorful Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\" Name=\"List Table 1 Light\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"List Table 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"List Table 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"List Table 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"List Table 5 Dark\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\" Name=\"List Table 6 Colorful\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\" Name=\"List Table 7 Colorful\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"List Table 1 Light Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"List Table 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"List Table 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"List Table 4 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"List Table 5 Dark Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"List Table 6 Colorful Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"List Table 7 Colorful Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"List Table 1 Light Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"List Table 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"List Table 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"List Table 4 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"List Table 5 Dark Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"List Table 6 Colorful Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"List Table 7 Colorful Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"List Table 1 Light Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"List Table 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"List Table 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"List Table 4 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"List Table 5 Dark Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"List Table 6 Colorful Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"List Table 7 Colorful Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"List Table 1 Light Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"List Table 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"List Table 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"List Table 4 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"List Table 5 Dark Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"List Table 6 Colorful Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"List Table 7 Colorful Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"List Table 1 Light Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"List Table 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"List Table 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"List Table 4 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"List Table 5 Dark Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"List Table 6 Colorful Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"List Table 7 Colorful Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"46\"\r\n   Name=\"List Table 1 Light Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"47\" Name=\"List Table 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"48\" Name=\"List Table 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"49\" Name=\"List Table 4 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"50\" Name=\"List Table 5 Dark Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"51\"\r\n   Name=\"List Table 6 Colorful Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"52\"\r\n   Name=\"List Table 7 Colorful Accent 6\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!-- [if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n {mso-style-name:\"Table Normal\";\r\n mso-tstyle-rowband-size:0;\r\n  mso-tstyle-colband-size:0;\r\n  mso-style-noshow:yes;\r\n mso-style-priority:99;\r\n  mso-style-parent:\"\";\r\n  mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n  mso-para-margin-top:0in;\r\n  mso-para-margin-right:0in;\r\n  mso-para-margin-bottom:10.0pt;\r\n  mso-para-margin-left:0in;\r\n line-height:115%;\r\n mso-pagination:widow-orphan;\r\n  font-size:11.0pt;\r\n font-family:\"Calibri\",sans-serif;\r\n mso-ascii-font-family:Calibri;\r\n  mso-ascii-theme-font:minor-latin;\r\n mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;\r\n mso-bidi-font-family:\"Times New Roman\";\r\n mso-bidi-theme-font:minor-bidi;\r\n mso-ansi-language:ES-BO;}\r\n</style>\r\n<![endif]--></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin;\">La Sala de Exposiciones se inaugura junto con la Casa Museo Villa Albina, en mayo de 2019. Dedicada a la difusi&oacute;n de muestras de artes gr&aacute;ficas y audiovisuales, est&aacute; ubicada donde originalmente fue el Sal&oacute;n de Juegos de la casa. <br /></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: normal;\"><span lang=\"ES-BO\" style=\"font-size: 12.0pt; font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin;\">La visita a la Sala de Exposiciones se realiza durante el recorrido guiado por la Casa. Actualmente est&aacute; vigente la muestra <em style=\"mso-bidi-font-style: normal;\"><a href=\"agenda\">&ldquo;Don Sim&oacute;n y Do&ntilde;a Albina. Horizontes Compartidos&rdquo;</a></em> </span></p>', 1),
(13, 'Recomendaciones', 'uploads/subpagina/maleta.png', NULL, '<p>Con el fin de mantener un ambiente adecuado para la visita, le recomendamos tomar en cuenta nuestros horarios de apertura y cierre.</p>\r\n<ul>\r\n<li>Procure no utilizar el m&oacute;vil y p&oacute;ngalo en modo silencion durante la visita.</li>\r\n<li>No est&aacute; permitido el ingreso con alimentos, bebidas y mascotas.</li>\r\n<li>No est&aacute;n permitidas las fotograf&iacute;as en el interior de la casa.</li>\r\n</ul>', 1),
(14, 'Actividades Culturales', '', '', '', 1),
(15, 'Formulario de Reserva para sesión de fotografía y video', '', '', '', 1),
(16, 'Formulario de Contacto', '', '', '<p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; text-align: center;\"><span lang=\"ES\" style=\"font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\'; mso-ansi-language: ES;\">Casa Museo Villa Albina</span></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; text-align: center;\"><span lang=\"ES-BO\" style=\"font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\';\">Tel&eacute;fono 4010470 &ndash; Int. 219</span></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; text-align: center;\"><span style=\"font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-ansi-language: EN-US;\">Email: </span><span lang=\"ES-BO\"><a href=\"mailto:museo.villaalbina@fundacionpatino.org\"><span lang=\"EN-US\" style=\"font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\'; color: windowtext; mso-ansi-language: EN-US;\">museo.villaalbina@fundacionpatino.org</span></a></span></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; text-align: center;\"><span style=\"font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\'; mso-ansi-language: EN-US;\">S&iacute;guenos en <a href=\'https://www.facebook.com/MuseoVillaAlbina/\' >Facebook </a></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; text-align: center;\"><strong style=\"mso-bidi-font-weight: normal;\"><span lang=\"ES\" style=\"font-family: \'Cambria\',serif; mso-ascii-theme-font: major-latin; mso-hansi-theme-font: major-latin; mso-bidi-font-family: \'Times New Roman\'; mso-ansi-language: ES;\">Cochabamba - Bolivia</span></strong></p>', 1),
(17, 'Librería Boutique', '', '', '<p>Puede adquirir estas publicaciones en el Museo Villa Albina</p>', 1),
(18, 'Formulario de Reserva para Grupos', '', '', '', 1),
(19, 'Direccion', '', NULL, '<p>Villa Albina está ubicada en Pairumani, Municipio de Vinto, a 23 kilómetros desde el centro de la ciudad de Cochabamba.</p>\n<p>Para llegar en transporte público, se recomienda tomar el Minibus 211 (bandera roja) de la Plaza Bolivar en la provincia de Quillacollo.</p>', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

DROP TABLE IF EXISTS `convocatoria`;
CREATE TABLE `convocatoria` (
  `id_post` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `fecha_limite` date NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
('primary_color', '#B76B68');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `id_post` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `organizador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `rango` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora` varchar(355) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `repetir` tinyint(1) NOT NULL DEFAULT '1',
  `info` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_evento`
--

DROP TABLE IF EXISTS `fecha_evento`;
CREATE TABLE `fecha_evento` (
  `id_post` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE `galeria` (
  `id_img` int(11) NOT NULL,
  `imagen` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `leyenda` varchar(300) NOT NULL,
  `orden` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_img`, `imagen`, `leyenda`, `orden`, `id_post`) VALUES
(1, 'uploads/noticias/clg_2806.jpg', 'ACOGEDOR La sala de lectura de la familia Patiño. | DANIEL JAMES', 1, 7),
(2, 'uploads/noticias/clg_7483.jpg', 'La mansión de la Hacienda Pairumani, los interiores deslumbran. | DANIEL JAMES', 1, 4),
(3, 'uploads/noticias/clg_7545.jpg', 'Los interiores deslumbran. | DANIEL JAMES', 2, 4),
(4, 'uploads/noticias/clg_2815.jpg', 'ATRACTIVO | DANIEL JAMES', 2, 7),
(5, 'uploads/noticias/clg_2784.jpg', 'Atractivo El dormitorio principal de los esposos Patiño tiene un lavamanos y muebles para la recreación. | DANIEL JAMES', 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_area`
--

DROP TABLE IF EXISTS `galeria_area`;
CREATE TABLE `galeria_area` (
  `id_img` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `leyenda` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '1',
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
  `leyenda` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '1',
  `id_subarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_subpagina`
--

DROP TABLE IF EXISTS `galeria_subpagina`;
CREATE TABLE `galeria_subpagina` (
  `id_img` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `leyenda` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `id_subpagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `galeria_subpagina`
--

INSERT INTO `galeria_subpagina` (`id_img`, `imagen`, `leyenda`, `orden`, `id_subpagina`) VALUES
(1, 'uploads/subpagina/Captura_de_pantalla_2019-12-04.png', '', 1, 1),
(2, 'uploads/subpagina/concierto-de-piano-y-violin-a-cargo-de-sachiko-sakuma-piano-y-gabriel-revollo-violin_1297.jpg', '', 2, 1),
(3, 'uploads/subpagina/FUENTE_2.JPG', '', 1, 2),
(4, 'uploads/subpagina/DSC00194.JPG', '', 2, 2),
(5, 'uploads/subpagina/IMG_0009.JPG', '', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `html`
--

DROP TABLE IF EXISTS `html`;
CREATE TABLE `html` (
  `id_post` int(11) NOT NULL,
  `contenido` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `html`
--

INSERT INTO `html` (`id_post`, `contenido`) VALUES
(4, '<p class=\"rtejustify\">Un asomo de las iniciativas sociales o patri&oacute;ticas de los esposos Pati&ntilde;o Rodr&iacute;guez: Sim&oacute;n y Albina, y la vida cotidiana de una de las familias m&aacute;s pr&oacute;speras e industriosas de la historia de Bolivia est&aacute;n accesibles al p&uacute;blico desde ayer, con la inauguraci&oacute;n de la exposici&oacute;n de fotograf&iacute;as y documentos &ldquo;Don Sim&oacute;n y do&ntilde;a Albina, horizontes compartidos&rdquo; y la reapertura del Museo Villa Albina, en la Hacienda Pairumani.</p>\r\n<p class=\"rtejustify\">La exposici&oacute;n muestra facetas de la vida p&uacute;blica y de diversos afanes no empresariales de los Pati&ntilde;o Rodr&iacute;guez. El museo &mdash;completado con la apertura al p&uacute;blico del &aacute;rea familiar, el primer piso de la mansi&oacute;n&mdash; exhibe el exquisito gusto de la familia.</p>\r\n<p class=\"rtejustify\">Lujo, sin duda, pero elegancia, sobriedad y un saber vivir raro en esas &eacute;pocas, primeras d&eacute;cadas del siglo XX, y aun en &eacute;sta, maravillan al visitante de esas habitaciones: dormitorios, vestidores, salas: de t&eacute;, de juegos, de lectura, de billar&hellip; todo es un regalo para la vista y la sensibilidad est&eacute;tica.</p>\r\n<p class=\"rtejustify\">&ldquo;Poco tiempo despu&eacute;s de su matrimonio, los esposos Pati&ntilde;o pasaron un d&iacute;a de campo en Pairumani bajo un huerto de a&ntilde;osos olivos, do&ntilde;a Albina qued&oacute; prendada del lugar y don Sim&oacute;n le ofreci&oacute; comprarle un d&iacute;a una casa de campo en la zona. A&ntilde;os despu&eacute;s, &eacute;l cumpli&oacute; su promesa, compr&oacute; la propiedad con el olivar y mand&oacute; construir una villa que lleva el nombre de su esposa. Es por este motivo que Villa Albina es considerada una promesa de amor.</p>\r\n<p class=\"rtejustify\">En 1917 se iniciaron las obras de la Hacienda Pairumani, Sim&oacute;n I. Pati&ntilde;o hizo construir una peque&ntilde;a ciudadela que comprend&iacute;a, adem&aacute;s del edificio principal: Villa Albina, una granja lechera con moderna tecnolog&iacute;a para la &eacute;poca y ganado de raza, numerosas casas para el personal, talleres, posta sanitaria, &aacute;reas sociales y una escuela para los hijos de sus trabajadores y los pobladores del lugar.&nbsp; Para dotar de energ&iacute;a el&eacute;ctrica a todo el complejo, se construy&oacute; un dique y se cre&oacute; la laguna artificial San Francisco en la base del Tunari y adem&aacute;s un acueducto&rdquo;, rememor&oacute; Teresa &Aacute;vila, directora del Centro de Investigaciones Fitoecogen&eacute;ticas de Pairumani, en el acto inaugural, de ese lugar, ahora abierto al p&uacute;blico.</p>\r\n<p>Link<br /><a href=\"http://190.129.90.36/cambio3/?q=node/67657\">https://www.lostiempos.com/tendencias/interesante/20190511/villa-albina-escenario-vida-patino-rodriguez</a></p>\r\n<p>&nbsp;</p>'),
(1, ''),
(8, '<p style=\"text-align: justify;\">Arropado por un grupo de olivos que todav&iacute;a persisten a pesar del tiempo, en la campi&ntilde;a de Pairumani del municipio de Vinto, en Cochabamba, Sim&oacute;n I. Pati&ntilde;o prometi&oacute; a su esposa Albina comprar un terreno y construirle una casa en aquel sitio que tanto hab&iacute;a deslumbrado a la dama. A&ntilde;os despu&eacute;s, se erigi&oacute; una imponente infraestructura que muestra, en cada detalle, el gran amor que el empresario sent&iacute;a por su compa&ntilde;era de vida.</p>\r\n<p style=\"text-align: justify;\">Villa Albina es el nombre del peque&ntilde;o para&iacute;so que Pati&ntilde;o mand&oacute; a edificar para Albina Rodr&iacute;guez Ocampo en 1917. Se ubica a 17 kil&oacute;metros de la capital valluna, en las faldas del majestuoso Tunari.</p>\r\n<p style=\"text-align: justify;\">Cuentan que poco tiempo despu&eacute;s de la boda de Sim&oacute;n y Albina, en 1889, fueron invitados a pasar un tiempo en el valle de Vinto y ella qued&oacute; maravillada con el sitio. Su esposo prometi&oacute; comprar un terreno y erigir una casa de campo all&iacute;, el compromiso fue honrado a&ntilde;os despu&eacute;s, cuando logr&oacute; acumular fortuna. La obra fue encargada, en Europa, al arquitecto Jos&eacute; Turigas y al constructor Francisco Nardin, ambos franceses. En Bolivia, el arquitecto Max Franz hizo algunas modificaciones al dise&ntilde;o de la casa principal, ubicada al centro de las 16 hect&aacute;reas de terreno que don Sim&oacute;n compr&oacute; en la campi&ntilde;a.</p>\r\n<p style=\"text-align: justify;\">En el sitio se levant&oacute; una granja lechera, viviendas para obreros y una escuela para los hijos de &eacute;stos. Cerca del Tunari se mont&oacute; un generador de energ&iacute;a el&eacute;ctrica que funcion&oacute; con el agua de una laguna y as&iacute; dieron lumbre a toda la hacienda.</p>\r\n<p style=\"text-align: justify;\">En 1947, la casa estuvo lista para ser habitada y la familia Pati&ntilde;o Rodr&iacute;guez, que permaneci&oacute; en Europa un tiempo, decidi&oacute; ocuparla. De camino a Bolivia, al valle cochabambino, Sim&oacute;n enferm&oacute; y tuvieron que quedarse en Buenos Aires, Argentina, donde &eacute;l falleci&oacute; un 20 de abril. Los restos llegaron a Villa Albina, la hacienda que Sim&oacute;n construy&oacute; con mucho amor, y all&iacute; la familia vivi&oacute; el luto.</p>\r\n<p style=\"text-align: justify;\">La casa principal cuenta con un patio central y un peque&ntilde;o patio auxiliar en el ala izquierda, donde se ubicaba la cocina, la bodega de alimentos, el lavado y los cuartos de la servidumbre, que ahora sirven de oficinas al Centro de Investigaciones Fitoecogen&eacute;ticas Pairumani.</p>\r\n<p style=\"text-align: justify;\">Profundo esplendor. Pasillos de frondosos &aacute;rboles y jardines conducen a la estructura. Antes, se llegaba a caballo o en carruajes y una vez entrando a la casa, las visitas o la familia ten&iacute;an el paso obligado por la &ldquo;sala bastonera&rdquo;, ubicada a la mano derecha y donde existe un guardarropas, repisas para dejar los sombreros y colgadores para sombrillas, adem&aacute;s de un lavamanos para el aseo y espejos.</p>\r\n<p style=\"text-align: justify;\">&ldquo;Entraban a la casa y, adem&aacute;s de asearse y sacarse el polvo del camino, dejaban sus cosas ac&aacute;&rdquo;, describe Eduardo Rojas, el gu&iacute;a de la Villa que acompa&ntilde;a a las actuales visitas en un recorrido que fue inaugurado en semanas pasadas, luego de la revitalizaci&oacute;n de la morada y apertura de nuevos ambientes que muestran la cotidianidad de la vida en la hacienda, ahora convertida en museo.</p>\r\n<p style=\"text-align: justify;\">El sonido del agua inunda la casa: proviene de una fuente en el patio central, cuyos chorros hacen apacible la estad&iacute;a. La sala contigua a la bastonera, que antes sirvi&oacute; para conferencias y reuniones de negocios, hoy sirve a la exhibici&oacute;n denominada Don Sim&oacute;n y Do&ntilde;a Albina, horizontes compartido, que muestra la labor filantr&oacute;pica que emprendi&oacute; la pareja.</p>\r\n<p style=\"text-align: justify;\">Fotograf&iacute;as de la &eacute;poca, documentos y un video de 10 minutos relatan el trabajo de los Pati&ntilde;o Rodr&iacute;guez que no solo favoreci&oacute; econ&oacute;micamente a la familia, sino tambi&eacute;n a regiones de Oruro y Cochabamba donde erigieron infraestructuras destinadas a la salud, educaci&oacute;n y sistema bancario, entre otras, que hoy son utilizadas por universidades o como museos.</p>\r\n<p style=\"text-align: justify;\">&ldquo;Al recorrer la muestra, el visitante se acercar&aacute; as&iacute; a la sensibilidad, al pensamiento y a las acciones de los esposos Pati&ntilde;o, unidos por un proyecto de vida&rdquo;, aseguran Michela Pentimalli y Jacqueline Calatayud, curadoras de la exposici&oacute;n que estar&aacute; abierta hasta diciembre.</p>\r\n<p style=\"text-align: justify;\">En el sitio es imposible no apreciar los detalles en muebles, paredes, pisos e iluminaci&oacute;n. Una muestra son las figuras talladas en madera de hombres en diferentes situaciones, que yacen en el espaldar de sillones ubicados en la parte alta de la sala y donde se sentaban quienes dirig&iacute;an las reuniones. &ldquo;Hab&iacute;a 80 sillas que fueron retiradas para la exposici&oacute;n&rdquo;, dice Rojas, que recuerda que el sitio fue usado para una reuni&oacute;n de presidentes durante la gesti&oacute;n de Gonzalo S&aacute;nchez de Lozada.</p>\r\n<p style=\"text-align: justify;\">La sala de billar &mdash;decorada en tonos burdeo y marfil, con empapelados de estilo &ldquo;vien&eacute;s&rdquo; y l&aacute;mparas de alabastro&mdash; tiene una mesa de billar que fue tra&iacute;da desde Hamburgo, con tan solo tres carambolas. Seg&uacute;n las costumbres de la &eacute;poca, &eacute;sta serv&iacute;a para distraer a los varones, mientras las damas pod&iacute;an departir en la sala de t&eacute;. Este &uacute;ltimo, que tiene una capacidad para 10 personas, posee una peculiar l&aacute;mpara con bordados en los que resaltan ramos de flores, las iniciales de los nombres de Albina y sus tres hijos, adem&aacute;s del escudo nacional.</p>\r\n<p style=\"text-align: justify;\">Si alguna dama requer&iacute;a arreglar su imagen, ten&iacute;a a disposici&oacute;n el tocador, contiguo al sal&oacute;n de t&eacute;, acondicionado para tal menester y a continuaci&oacute;n est&aacute; el escritorio de Do&ntilde;a Albina. Resaltan los muebles, tallados y hechos de madera de estilo Luis XV y Luis XVI. All&iacute; Albina atend&iacute;a los pormenores del manejo de la hacienda. Junto a esta sala est&aacute; el escritorio de Sim&oacute;n, al fondo se ven fotograf&iacute;as de la pareja, y en el medio un &ldquo;escritorio estilo Napole&oacute;n con cortinas; es decir, abres una cortina y sale un mueble para escribir&rdquo;, detalla el gu&iacute;a.</p>\r\n<p style=\"text-align: justify;\">No pod&iacute;a faltar una sala de juegos de mesa y de fumadores. Una l&aacute;mpara hecha en cuerno de alce llama la atenci&oacute;n y si se mira con detenimiento, se divisar&aacute;n las iniciales del nombre de la amada de Pati&ntilde;o, que marcan cada mueble y particularidades del sitio. Tambi&eacute;n est&aacute; el comedor, con la vajilla puesta en la larga mesa, esperando a los comensales.</p>\r\n<p style=\"text-align: justify;\">El baile tambi&eacute;n tiene un sitio especial en la casona porque se dispuso un sal&oacute;n para este prop&oacute;sito, donde un tocadiscos de la &eacute;poca parece aguardar a que alguien coloque un vinilo y as&iacute; empezar la fiesta.</p>\r\n<p style=\"text-align: justify;\">Ambientes y muebles fueron decorados al estilo Art Dec&oacute;, de principios del siglo XX. Los colores que distinguen a cada sitio siguieron los gustos de cada miembro de la familia, todos transmiten alegr&iacute;a y, como era caracter&iacute;stico en la &eacute;poca, las paredes est&aacute;n cubiertas por empapelados que combinan colores con el tapiz de pisos y tono de las cortinas.</p>\r\n<p style=\"text-align: justify;\">L&aacute;mparas hechas de cristal de roca y en m&aacute;rmol de alabastro ayudan a iluminar las diferentes habitaciones. La conexi&oacute;n de agua en los cuartos que as&iacute; lo requer&iacute;an, como los dormitorios, que est&aacute;n ubicados en el primer piso de la residencia, y los ba&ntilde;os entre los dormitorios que tambi&eacute;n cuentan con un calef&oacute;n para disfrutar de una ducha con agua caliente.</p>\r\n<p style=\"text-align: justify;\">Unas escalinatas conducen al visitante hasta las habitaciones que solo eran concurridas por la familia. La primera habitaci&oacute;n es la de Ren&eacute;, el hijo mayor de la pareja. Al lado se ubica el dormitorio de Antenor donde llama la atenci&oacute;n el color palo de rosa en paredes y pisos y los muebles estilo Imperio. &ldquo;Parece femenino y es m&aacute;s grande que el de Ren&eacute;&rdquo;, indaga Eduardo, pues cabe la posibilidad de una equivocaci&oacute;n en la disposici&oacute;n de las habitaciones porque seg&uacute;n las costumbres de la &eacute;poca, las mujeres contaban con dormitorios m&aacute;s grandes, con divanes, espejos, grandes roperos y vestidores en medio de ellas. En la casa, dos cuartos, el de Ren&eacute; y Elena, son m&aacute;s peque&ntilde;os. En el cuarto de ella resalta un guindo sobrio, que parecer&iacute;a destinado a Antenor. A continuaci&oacute;n&nbsp; est&aacute; el cuarto de Luzmila.</p>\r\n<p style=\"text-align: justify;\">En la habitaci&oacute;n de Sim&oacute;n y Albina, la m&aacute;s grande de todas, yace una cama doble, separada por un velador. Un ventilador Siemens se ubica en una de las mesitas de noche, junto al div&aacute;n. Dos roperos inmensos dan paso al dormitorio de Grazziela, donde resaltan las paredes en tumbo y verde pacay, llenas de flores.</p>\r\n<p style=\"text-align: justify;\">Las prendas y calzados que las ni&ntilde;as se pondr&iacute;an a diario se lucen en las habitaciones como si esperaran por ellas.</p>\r\n<p style=\"text-align: justify;\">La sala de estar guarda los reconocimientos a la familia; tambi&eacute;n est&aacute; la sala de reposo o descanso, amoblada con piezas de mimbre y con balcones con vista a los jardines. Al lado, la sala de lectura.</p>\r\n<p style=\"text-align: justify;\">Cada rinc&oacute;n de la casa transmite paz y, durante el recorrido, uno puede imaginar la vida que la esposa y los hijos de Sim&oacute;n tuvieron durante los a&ntilde;os que vivieron en la inmensa infraestructura.</p>\r\n<p style=\"text-align: justify;\">El sitio estuvo cerrado por a&ntilde;os, pero mantuvo la vida y presencia intacta de cada habitante. Los miembros de la Fundaci&oacute;n Sim&oacute;n I. Pati&ntilde;o, creada en 1931 y guardianes de los bienes desde 1964, lo conservaron en el tiempo. Ahora, estos sitios escondidos a la vista de los visitantes son expuestos de martes a domingo.</p>\r\n<p style=\"text-align: justify;\">De martes a viernes se puede ingresar de 14.00 a 16.00. El s&aacute;bado, de 09.30 a 12.00 y en domingo, de 10.00 a 12.00. El ingreso cuesta Bs 10 para mayores y Bs 5 para ni&ntilde;os. Delegaciones estudiantiles deber&aacute;n concertar la visita con anterioridad.</p>\r\n<p>Para llegar hasta la Villa se pueden tomar el trufi 211, con bandera roja, cerca de la plaza Bol&iacute;var, en Quillacollo, en la parada de veh&iacute;culos a Vinto. En este punto se puede iniciar una gran aventura por la vida de la c&eacute;lebre familia Pati&ntilde;o.</p>\r\n<p>&nbsp;</p>\r\n<p>Link <a href=\"http://m.la-razon.com/suplementos/escape/Villa-Albina-dia-Patino-escape_03159883992\">http://m.la-razon.com/suplementos/escape/Villa-Albina-dia-Patino-escape_03159883992</a></p>'),
(5, '<div class=\"body\">\r\n<div class=\"field field-name-field-opinion-cuerpo field-type-text-with-summary field-label-hidden view-mode-full\">\r\n<div class=\"field-items\">\r\n<div class=\"field-item even\">\r\n<p class=\"rtejustify\">No recuerdo cu&aacute;ndo fuimos con mis pap&aacute;s y mi hermana, adem&aacute;s de unos amigos que ven&iacute;an del exterior, a conocer Villa Albina, pero hay algo que perdura en mi memoria y es el aroma de la madera de roble impregnado en mi nariz.&nbsp; Hace pocos d&iacute;as volv&iacute; a sentir ese olor y a vivir la magia que se despleg&oacute; nuevamente ante mis ojos.</p>\r\n<p class=\"rtejustify\">La Fundaci&oacute;n Sim&oacute;n I. Pati&ntilde;o ha decidido abrir las puertas de este hermoso lugar para que el p&uacute;blico lo pueda disfrutar. As&iacute; como en aquel entonces me deleit&eacute; con el aroma de la madera y mi mam&aacute; record&oacute; con cari&ntilde;o el espejo de agua que se encuentra cerca de la construcci&oacute;n principal, los muebles de &eacute;poca cargados de nostalgia y otros lugares para (re)conocer.</p>\r\n<p class=\"rtejustify\">Es encomiable la decisi&oacute;n tomada por la Fundaci&oacute;n ya que con esto se genera un espacio tur&iacute;stico m&aacute;s, para propios y extra&ntilde;os y por suerte y para suerte de muchos turistas, Cochabamba ya no ser&aacute; tan s&oacute;lo La Cancha o un galp&oacute;n de chicharr&oacute;n;&nbsp; sino que podr&aacute;n visitar una gema arquitect&oacute;nica y un jard&iacute;n plet&oacute;rico de &aacute;rboles centenarios, con especies tra&iacute;das del exterior por el paisajista chileno al que le fue encomendado el dise&ntilde;o de este ed&eacute;n.</p>\r\n<p class=\"rtejustify\">All&iacute; podr&aacute;n caminar cerca a los olivares, sentir la brisa que baja del Tunari y contemplar el paisaje, tambi&eacute;n se sentir&aacute;n en armon&iacute;a con la naturaleza, respirando aire puro, sintiendo el contacto del calor con su piel y por unos instantes retroceder&aacute;n m&aacute;s de un siglo y observar&aacute;n c&oacute;mo se vivi&oacute; en esa &eacute;poca.</p>\r\n<p class=\"rtejustify\">Ir&aacute;n al pasado para intentar entender c&oacute;mo se pod&iacute;a vivir en ese tiempo sin televisor, radio, celulares o redes sociales.&nbsp; Hoy ser&iacute;a impensable tratar de vivir de esa manera.&nbsp; Hace una centuria era de lo m&aacute;s com&uacute;n.&nbsp; Las salas de lectura junto a otras salas de esparcimiento eran los lugares preferidos de los habitantes de la Villa que iban a pasar ah&iacute; unas semanas lejos de la ciudad.</p>\r\n<p class=\"rtejustify\">Quiz&aacute;s dentro de 100 a&ntilde;os (si es que quedan en pie los departamentos y casas en las que habitamos hoy) alg&uacute;n visitante se sorprenda al ver la pantalla plana, el computador port&aacute;til o la cocina que funcionaba a gas domiciliario.&nbsp; Probablemente le parezca tecnolog&iacute;a muy anticuada o llamativa.</p>\r\n<p class=\"rtejustify\">O considere que era lujo impensable, en el a&ntilde;o 2119, tener una ducha e imagine que los usuarios eran unos locos por hacer correr agua potable para llevarse desechos e impurezas; qui&eacute;n sabe tal vez en una centuria tener una ducha o darse una ducha sea algo tan s&oacute;lo para inscribir en los anales de la historia.</p>\r\n<p class=\"rtejustify\">Hoy por hoy vale la pena escaparse de la ciudad y visitar Villa Albina y aplaudir la infatigable labor que viene desarrollando la Fundaci&oacute;n Pati&ntilde;o a favor de Bolivia, de la educaci&oacute;n, la medicina y la investigaci&oacute;n.</p>\r\n<p class=\"rtejustify\">&nbsp;</p>\r\n<p class=\"rtejustify\"><em><strong>La autora es mag&iacute;ster en comunicaci&oacute;n social y periodista</strong></em></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<h1><span style=\"font-family: helvetica, arial, sans-serif; font-size: 12pt;\">&ldquo;La Fiesta Imposible&rdquo; en Espacio Sim&oacute;n I. Pati&ntilde;o</span></h1>\r\n<div class=\"nota_txt\">\r\n<p>El poeta orure&ntilde;o Ren&eacute; Antezana presentar&aacute; su libro &ldquo;La Fiesta Imposible&rdquo;, Obra Po&eacute;tica 1979-2017, impreso por Editorial 3600 y ser&aacute; comentado por los escritores Edwin Guzm&aacute;n Ortiz y Vadik Barr&oacute;n. El acto se realizar&aacute; el 11 de junio, a partir de las 19:00 horas, en la Sala 2 del Espacio Sim&oacute;n I. Pati&ntilde;o.</p>\r\n<p>La Fiesta Imposible re&uacute;ne seis libros publicados: Imaginario (1979), Memoria de los cuatro vientos (1985), Premio Nacional &Uacute;nico de Poes&iacute;a de la Universidad T&eacute;cnica de Oruro, El labrador insomne (1988), Segundo Premio Nacional de Poes&iacute;a de la Casa de la Cultura de Cochabamba, La flecha del tiempo (1992), Premio Nacional de Poes&iacute;a &ldquo;Franz Tamayo&rdquo;, Viento verbal (1998), Cielo subterr&aacute;neo (2007), y uno in&eacute;dito: C&iacute;rculo del devenir (2017).</p>\r\n<p>A decir de Edwin Guzm&aacute;n: &ldquo;Una obra po&eacute;tica es la cartograf&iacute;a de un esp&iacute;ritu, el itinerario y la historia particular del poeta. Es a su vez el testimonio de una conciencia abierta a lo incontable. No lo es menos la consumaci&oacute;n de una escritura, la b&uacute;squeda intensa por desentra&ntilde;ar los sentidos que fluyen del mundo&rdquo;.</p>\r\n<p>Asimismo, refiri&eacute;ndose a la obra de Antezana, dijo: &ldquo;los poemas transitan del mon&oacute;logo confesional a la reflexi&oacute;n sobre la palabra po&eacute;tica, del cuerpo amoroso al espacio familiar, del barrio a la comarca, de la lectura a la fiesta, del altiplano a la ciudad, del solar nativo al pa&iacute;s, de la cosmovisi&oacute;n al universo; su palabra se adentra reflexivamente a lo largo y ancho de estos escenarios imbric&aacute;ndolos bajo una mirada totalizadora. M&aacute;s que simplemente estar, en su poes&iacute;a son&rdquo;.</p>\r\n</div>'),
(7, '<p>Villa Albina es m&aacute;s que una ruta tur&iacute;stica, es una promesa de amor que contiene infinidad de detalles. En un recorrido por este palacio,los ojos no tienen descanso, se mueven de arriba a abajo y giran sin pararpara apreciar pintorescas alfombras,ver elegantes e imponentes l&aacute;mparas antiguas y tocar con la mirada los empapelados vieneses en las paredes. Una impresi&oacute;n que, sin duda, quedar&aacute;en el tiempo al contemplar llamativos objetos personales de la familia Pati&ntilde;o.</p>\r\n<p>Villa Albina, esa promesa de amor que hizo Sim&oacute;n I. Pati&ntilde;o a su esposa, ha sido sin duda un regalo para los cochabambinos. Ahora, aumenta su atractivo y valor, ya que se habilitar&aacute; el segundo piso de la misma, &aacute;rea que muestra la vida familiar, &iacute;ntima y privada de quien fue el &ldquo;Rey del Esta&ntilde;o&rdquo;. La mansi&oacute;n abri&oacute; sus puertas a la revista Oh! antes de la apertura oficial, que est&aacute; prevista para el 11 de mayo. Luego de realizar el recorrido, constatamos que sin duda ser&aacute; un nuevo destino tur&iacute;stico que visitar tanto para personas del interior como del exterior del pa&iacute;s.</p>\r\n<p>Conocido como el &ldquo;Bar&oacute;n del Esta&ntilde;o&rdquo;, Sim&oacute;n I. Pati&ntilde;o es uno de los personajes m&aacute;s importantes en la historia nacional e internacional. Un hombre patriota, visionario y adelantado para su &eacute;poca, cuyo legado contin&uacute;a vigente gracias a sus aportes para el desarrollo del pa&iacute;s en agricultura, salud, fitogen&eacute;tica, educaci&oacute;n y cultura, por mencionar algunas ramas.</p>\r\n<p>&ldquo;Queremos mostrar la vida familiar, de quienes ten&iacute;an la alegr&iacute;a de vivir juntos&rdquo;, explica a la revista Oh!, Teresa &Aacute;vila, directora del Centro de Investigaciones Fitoecogen&eacute;ticas Pairumani.</p>\r\n<p>Se&ntilde;ala adem&aacute;s que a Sim&oacute;n I. Pati&ntilde;o siempre se lo conoci&oacute; desde la parte industrial y de negocios, pero nunca desde una perspectiva familiar. &ldquo;Una familia que ha hecho mucho por Bolivia&rdquo;, agrega.</p>\r\n<p>Tambi&eacute;n estar&aacute; abierta al p&uacute;blico la exposici&oacute;n &ldquo;Don Sim&oacute;n y Do&ntilde;a Albina, horizontes compartidos&rdquo;, la cual est&aacute; conformada por un conjunto de documentos, fotograf&iacute;as y videos de valor hist&oacute;rico documental que muestran distintas facetas de la familia, m&aacute;s all&aacute; de las actividades empresariales.</p>\r\n<p>Por otra parte, &Aacute;vila asegura que Vinto y Cochabamba necesitan m&aacute;s lugares tur&iacute;sticos. &ldquo;Queremos ofrecerle eso al p&uacute;blico, que sea una visita m&aacute;s completa. Dar un regalo a la regi&oacute;n para que se incrementen las opciones tur&iacute;sticas&rdquo;, a&ntilde;ade.</p>\r\n<p>Villa Albina, residencia de los esposos Pati&ntilde;o, es una promesa de amor que &eacute;l le hizo a Albina, al quedar encantada con el valle y el lugar. Pairumani y la villa a&uacute;n emanan esta magia, luego de pasar m&aacute;s de media hora en carreteras para llegar al lugar, el entorno cambia dr&aacute;sticamente y uno se sumerge en una atm&oacute;sfera de naturaleza revitalizante que lo transporta a d&eacute;cadas atr&aacute;s.</p>\r\n<p>Una casa llena de vida y de peque&ntilde;os detalles. En el segundo piso, compuesto por 14 habitaciones (que incluyen ba&ntilde;os y otras salas adem&aacute;s de los dormitorios), uno puede apreciar objetos personales de los esposos Pati&ntilde;o y de sus cinco hijos: Ren&eacute;, Antenor, Graziella, Elena y Luz Mila.</p>\r\n<p>Uno puede observar los atuendos, tacones y maquillaje de do&ntilde;a Albina y sus hijas. Revistas y peri&oacute;dicos de la d&eacute;cada, adem&aacute;s de objetos que llaman la atenci&oacute;n como ventiladores y extinguidores de la &eacute;poca, por mencionar algunos. Todo qued&oacute; como si fuese ayer que la familia viv&iacute;a all&iacute;. Sin duda, un preciado regalo que puede ser disfrutado por todos, no s&oacute;lo por expertos en arquitectura, historia, decoraci&oacute;n y moda.</p>\r\n<p>Para los amantes de las antig&uuml;edades, ser&aacute; muy preciado contemplar sus reflejos en espejos que pertenecieron a la familia y que est&aacute;n cargados de mucha historia.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>SOBRE EL ESTILO Y DECORACI&Oacute;N</strong></p>\r\n<p>La villa se compone de un patio central y un peque&ntilde;o patio auxiliar rodeado de p&oacute;rticos al estilo de las edificaciones mediterr&aacute;neas, una tendencia caracter&iacute;stica de fines del siglo XIX y principios del XX. Todo el terreno amurallado consta de 16 hect&aacute;reas.</p>\r\n<p>&Aacute;vila explica que los ambientes est&aacute;n decorados con atractivos muebles correspondientes al art d&eacute;co, un movimiento de dise&ntilde;o popular ecl&eacute;ctico de principios del siglo XX. En su conjunto es acogedor y produce una sensaci&oacute;n de alegr&iacute;a. Especialmente por los colores de los empapelados de las paredes, que en este periodo eran denominados empapelados vieneses. Los tapices de los muebles de los dormitorios tambi&eacute;n son reflejo de ello.</p>\r\n<p>Destaca adem&aacute;s que muchos de los muebles que fueron movidoshan sido puestos en su lugar para recuperar el esplendor de esa &eacute;poca. Todos los objetos de decoraci&oacute;n son originales y pertenec&iacute;an a la familia.</p>\r\n<p>La arquitecta restauradora Andrea V&iacute;a se&ntilde;ala que los muebles son estilo Luis XV y Luis XVI y los de los dormitorios son tipo imperio, con marqueter&iacute;a en madera pero que culminan con m&aacute;rmol en la parte superior. Las l&aacute;mparas tambi&eacute;n son de m&aacute;rmol de carrara y cristal de roca.</p>\r\n<p>V&iacute;a asegura que en esa &eacute;poca se decoraban las habitaciones de acuerdo al gusto de los hijos, es por ello que cada una tiene su propia personalidad.</p>\r\n<p>Sobre la habitaci&oacute;n matrimonial a&ntilde;ade que los muebles son tallados en roble y es un espacio m&aacute;s lujoso. La experta destaca que por ejemplo en los dormitorios hay &aacute;rea de lavado y de limpieza, aspectos adelantados a la &eacute;poca, adem&aacute;s Pati&ntilde;o se encarg&oacute; de abastecer de agua y de energ&iacute;a el&eacute;ctrica a su casa de campo.</p>\r\n<p>Manifiesta tambi&eacute;n que las habitaciones no eran concebidas solamente como lugares de reposo y descanso, sino tambi&eacute;n como espacios de reuni&oacute;n y esparcimiento. Los ba&ntilde;os tambi&eacute;n fueron pensados como un lugar de aseo y recreo.</p>\r\n<p>&ldquo;La casa jam&aacute;s ha sido tocada. Est&aacute; en perfecto estado de conservaci&oacute;n, tal cual fue construida y concebida por la familia. La gente va a conocer c&oacute;mo ellos viv&iacute;an. S&oacute;lo se ha modificado el &aacute;rea de servicio para las oficinas&rdquo;, asegura la arquitecta restauradora.</p>\r\n<p>&Aacute;vila y V&iacute;a destacan el trabajo del personal que ha cuidado durante todos estos a&ntilde;os Villa Albina, entre ellos el conserje, Eduardo Rojas.</p>\r\n<p>En la planta baja est&aacute;n ubicados los salones de recepci&oacute;n, una sala de billar, el comedor principal, el sal&oacute;n de baile, la sala para tomar t&eacute;, la sala de fumadores y el escritorio de Pati&ntilde;o.</p>\r\n<p>Los jardines de Villa Albina son amplios y est&aacute;n embellecidos con especies arb&oacute;reas nativas e introducidas, algunas de ellas muy raras en el pa&iacute;s, como las colecciones de varias especies de araucarias, encinos y magnolias. En el parque hay dos esculturas de m&aacute;rmol con motivos neocl&aacute;sicos, obras del escultor franc&eacute;s F. Cavaroc.</p>\r\n<p>Al visitar este nuevo piso son muchas las preguntas e inquietudes que surgen sobre la forma de vida familiar e incluso sobre la historia detr&aacute;s de los objetos. En estas p&aacute;ginas no dimos m&aacute;s detalles, los cuales est&aacute;n reservados para el d&iacute;a de la apertura. Adem&aacute;s, es mejor que uno los contemple y aprecie por s&iacute; mismo a que se lo cuenten.</p>\r\n<p><strong>VISITAS</strong></p>\r\n<p>Martes a viernes de 14:00 a 16:00</p>\r\n<p>S&aacute;bado: 9:30 a 12:00</p>\r\n<p>Domingo: 10:00 a 12:00</p>\r\n<p>Ingreso: Bs 10</p>\r\n<p>Ni&ntilde;os y grupos de estudiantes: Bs 5</p>\r\n<p>No habr&aacute; atenci&oacute;n lunes ni feriados.</p>\r\n<p>Para llegar en transporte p&uacute;blico, los interesados pueden tomar el trufi 211 (banderita roja) de la plaza Bol&iacute;var de Quillacollo (de donde salen los trufis a Vinto). La movilidad los dejar&aacute; a una cuadra.</p>\r\n<p>Para mayor informaci&oacute;n contactarse al tel&eacute;fono 4010470.</p>\r\n<p class=\"rteindent1\"><strong>APUNTES HIST&Oacute;RICOS</strong></p>\r\n<p class=\"rteindent1\">El a&ntilde;o 1889, Sim&oacute;n I. Pati&ntilde;o se cas&oacute; con quien ser&iacute;a su gran compa&ntilde;era, Albina Rodr&iacute;guez Ocampo. Juntos fueron padres de Ren&eacute;, Antenor, Graziella, Elena y Luz Mila.</p>\r\n<p class=\"rteindent1\">En 1917, empez&oacute; la construcci&oacute;n de la casa, con el nombre de Villa Albina. La edificaci&oacute;n fue realizada mientras la familia pasaba un periodo en Europa, lugar en que se iniciaron los primeros planos. Esta obra fue dise&ntilde;ada por el arquitecto Jos&eacute; Turigas, a la que el arquitecto constructor Max Franz hizo algunas modificaciones, y la cooperaci&oacute;n del arquitecto Francisco Nardin.</p>\r\n<p class=\"rteindent1\">Cuando la familia estaba de camino a Bolivia para fijar su residencia en Pairumani, Pati&ntilde;o se enferm&oacute;, por lo que tuvieron que quedarse en Buenos Aires (Argentina), donde falleci&oacute; el 20 de abril de 1947. Despu&eacute;s del deceso del conocido &ldquo;Bar&oacute;n del Esta&ntilde;o&rdquo;, do&ntilde;a Albina y sus hijos volvieron a Bolivia y trasladaron sus restos a su morada final, Pairumani.</p>\r\n<p class=\"rteindent1\">En 1964, los herederos de la casa donaron Villa Albina a la Fundaci&oacute;n Pati&ntilde;o.</p>\r\n<p class=\"rteindent1\">La familia completa ha apostado a dicha fundaci&oacute;n.</p>\r\n<p class=\"rteindent1\">&nbsp;</p>\r\n<p class=\"rteindent1\">Link. <a href=\"https://www.lostiempos.com/oh/actualidad/20190506/villa-albina-abren-tesoro-mejor-guardado\">https://www.lostiempos.com/oh/actualidad/20190506/villa-albina-abren-tesoro-mejor-guardado</a></p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_portada`
--

DROP TABLE IF EXISTS `imagen_portada`;
CREATE TABLE `imagen_portada` (
  `id_portada` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(24) COLLATE utf8_spanish2_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `imagen_portada`
--

INSERT INTO `imagen_portada` (`id_portada`, `imagen`, `color`, `orden`, `status`) VALUES
(1, 'portadas/DSC00194.JPG', 'rgb(196,171,138)', 1, 1),
(2, 'portadas/DSC00205.JPG', 'rgb(196,171,138)', 2, 1),
(3, 'portadas/FUENTE_2.JPG', 'rgb(196,171,138)', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `id_post` int(11) NOT NULL DEFAULT '0',
  `id_categoriaLibro` int(11) NOT NULL,
  `autor` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `editorial` varchar(355) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `paginas` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_post`, `id_categoriaLibro`, `autor`, `descripcion`, `precio`, `editorial`, `paginas`, `year`) VALUES
(2, 4, 'Fundacion Simón I. Patiño', 'Fundacion Simón I. Patiño; Universidad Técnica de Oruro. La Paz: Espacio Simón I. Patiño, 2015 2.ed.', 250, '', 368, 0),
(3, 12, '', '', 40, '', 0, 0),
(6, 13, '', 'Año 10, No.40. Edición noviembre de 2018. Centro Cultural de la Feria del Desempolvado.\r\nFundacion Simón I. Patiño. Oruro - Bolivia', 30, '', 0, 0),
(10, 1, 'Geddes F. Charles', '', 60, 'Ginebra: Patiño', 411, 1984);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id_post` int(11) NOT NULL,
  `enlace` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `id_tipo_media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id_post`, `enlace`, `orden`, `id_tipo_media`) VALUES
(9, 'https://www.youtube.com/embed/HppOkD89ntQ', 1, 1);

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
  `orden` int(11) NOT NULL,
  `id_categoria_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  `mostrar_subpagina` tinyint(1) NOT NULL DEFAULT '0',
  `model` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `metodo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `default_limit` int(11) NOT NULL DEFAULT '6',
  `uses_date` tinyint(1) NOT NULL DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `seccion`, `btn_adicional`, `mostrar_subpagina`, `model`, `metodo`, `default_limit`, `uses_date`, `id_tipo`) VALUES
(1, 'libro', 'seccion_libro', NULL, 1, 'Libro_model', 'get_valid_libros', 4, 0, 2),
(2, 'noticia', 'seccion_noticia', NULL, 0, 'Noticias_model', 'get_valid_noticias', 12, 0, 1),
(3, 'subpagina', 'seccion_subarea', NULL, 0, 'Subpaginas_model', 'get_home_subpaginas', 3, 0, 0),
(4, 'formulario', 'seccion_form', NULL, 0, NULL, 'get_form', 1, 0, 0),
(5, 'direccion', 'seccion_direccion', NULL, 1, NULL, 'get_direccion', 1, 0, 0),
(6, 'multimedia', 'seccion_multimedia', NULL, 0, 'Media_model', 'get_valid_media', 3, 0, 3);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra_teatro`
--

DROP TABLE IF EXISTS `obra_teatro`;
CREATE TABLE `obra_teatro` (
  `id_post` int(11) NOT NULL,
  `organizador` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `rango` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar` varchar(355) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `repetir` tinyint(1) NOT NULL DEFAULT '0',
  `info` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  `new_window` tinyint(1) NOT NULL DEFAULT '0',
  `enable_search` tinyint(1) NOT NULL DEFAULT '1',
  `search_by_cat` varchar(255) COLLATE utf8_spanish2_ci DEFAULT '0',
  `id_modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `titulo`, `enlace`, `color`, `status`, `orden`, `mostrar_navbar`, `mostrar_home`, `external_url`, `new_window`, `enable_search`, `search_by_cat`, `id_modelo`) VALUES
(1, 'Agenda', 'agenda', 'rgb(165,52,61)', 1, 3, 1, 1, 0, 0, 1, NULL, 3),
(2, 'Librería', 'libreria', 'rgb(118,0,97)', 0, 0, 1, 1, 0, 0, 1, 'select_cat_libro', 1),
(3, 'Museo', 'museo', 'rgb(165,52,61)', 1, 1, 1, 1, 0, 0, 1, NULL, 3),
(4, 'Visitas Guiadas', 'visitas_guiadas', 'rgb(165,52,61)', 1, 2, 1, 1, 0, 0, 1, '0', 3),
(5, 'Fundación Simon I Patiño', 'fundacion', 'rgb(165,52,61)', 1, 4, 1, 1, 0, 0, 1, '0', 3),
(6, 'Servicios', 'servicios', 'rgb(165,52,61)', 1, 6, 1, 1, 0, 0, 1, '0', 3),
(7, 'Contacto', 'contacto', 'rgb(165,52,61)', 1, 7, 1, 1, 0, 0, 1, '0', 3),
(8, 'Noticias', 'noticias', 'rgb(165,52,61)', 1, 5, 1, 1, 0, 0, 1, '0', 2),
(9, 'Multimedia', 'multimedia', 'rgb(165,52,61)', 0, 0, 1, 1, 0, 0, 1, '0', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE `publicacion` (
  `id_post` int(11) NOT NULL,
  `titulo` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `leyenda` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tipo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_post`, `titulo`, `imagen`, `leyenda`, `status`, `tipo`) VALUES
(4, ' Villa Albina, el escenario de la vida de los Patiño Rodríguez', 'uploads/noticias/clg_6800.jpg', ' La mansión de la Hacienda Pairumani se erige imponente y sobrio en medio de la maravillosa campiña. | DANIEL JAMES', 1, 1),
(1, 'El rostro escondido de Villa Albina abre sus puertas hoy', 'uploads/noticias/2019N289975.jpg', '', 1, 1),
(3, 'Don Simón y Doña Albina. Horizontes Compartidos', 'uploads/libros/DVD-VIDEO-EXPOSICION.jpg', NULL, 1, 2),
(6, 'Historias de Oruro', 'uploads/libros/DSCN0114.JPG', NULL, 1, 2),
(7, ' Villa Albina, abren el tesoro mejor guardado', 'uploads/noticias/clg_3235.jpg', 'IMPONENTE Villa Albina capta la atención de los visitantes desde que ingresan al lugar. Es una imponente edificación en medio de una exuberante naturaleza. | DANIEL JAMES', 1, 1),
(2, 'Fotografías para la historia. Simon I. Patiño: Estaño y Vida Cotidiana, 1900 - 1930', 'uploads/libros/libro2.jpg', NULL, 1, 2),
(5, ' De nuevo la magia', '', '', 1, 1),
(8, ' Villa Albina, el día a día de los Patiño ', 'uploads/noticias/ubicada-medio-propiedad-rodeada-olivos_LRZIMA20190604_0015_7.jpg', '  Una vista de la casa que está ubicada en el medio de la propiedad, rodeada de olivos.', 1, 1),
(9, 'VIDEO DE PRUEBA', NULL, NULL, 1, 6),
(10, 'Patiño: Rey del Estaño', 'uploads/libros/GEDDES.jpg', NULL, 1, 2);

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
  `mostrar_componente` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  `id_content` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subpagina`
--

DROP TABLE IF EXISTS `subpagina`;
CREATE TABLE `subpagina` (
  `id_subpagina` int(11) NOT NULL,
  `subpagina` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `vertical` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_pagina` int(11) NOT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subpagina`
--

INSERT INTO `subpagina` (`id_subpagina`, `subpagina`, `enlace`, `vertical`, `status`, `id_pagina`, `id_modelo`, `id_content`) VALUES
(1, 'Inauguración', 'inauguracion', 0, 1, 3, 0, 1),
(2, 'Historia y Arquitectura', 'historia_y_arquitectura', 0, 1, 3, 0, 2),
(3, 'Visitas Guiadas', 'visitas_guiadas', 0, 1, 4, 0, 3),
(4, 'El Legado', 'el_legado', 0, 1, 5, 0, 4),
(5, 'Sesion de Fotografia y Video', 'sesion_de_fotografia', 0, 1, 6, 0, 5),
(6, 'Horario de Atencion', 'horario_de_atencion', 1, 1, 7, 0, 6),
(7, 'Sala de Exposiciones', 'test_', 0, 1, 1, 0, 7),
(8, 'Horario', 'horario', 0, 1, 4, 0, 8),
(9, 'Entradas', 'notra_prueba', 0, 1, 4, 0, 9),
(10, 'VISITAS GUIADAS PARA GRUPOS O DELEGACIONES', 'visitas_guiadas_para_grupos_o_delegaciones', 0, 1, 4, 0, 10),
(11, 'Doña Albina', 'dona_albina', 0, 1, 3, 0, 11),
(12, 'Sala de Exposiciones', 'sala_de_exposiciones', 0, 1, 3, 0, 12),
(13, 'Librería Boutique', 'libreria_boutique', 0, 1, 3, 1, 17),
(14, 'Recomendaciones', 'recomendaciones', 0, 1, 4, 0, 13),
(15, 'Formulario de Reserva para Grupos', 'formulario_de_reserva_para_grupos', 0, 1, 4, 4, 18),
(16, 'Actividades Culturales', 'actividades_culturales', 0, 0, 1, 0, 14),
(17, 'Formulario de Reserva para sesión de fotografía y video', 'formulario_de_reserva_para_sesion_de_fotografia_y_video', 0, 1, 6, 4, 15),
(18, 'Dirección', 'direccion', 0, 1, 7, 5, 19),
(19, 'Formulario de Contacto', 'formulario_de_contacto', 0, 1, 7, 4, 16);

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
(3, 'media', 'Multimedia', 'video', 0);

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
('test', 'cc03e747a6afbbcbf8be7668acfebee5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

DROP TABLE IF EXISTS `visitas`;
CREATE TABLE `visitas` (
  `userip` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `timestamp` datetime NOT NULL,
  `visita` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`userip`, `timestamp`, `visita`) VALUES
('::1', '2020-02-03 22:46:35', 37);

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
-- Indices de la tabla `cartelera`
--
ALTER TABLE `cartelera`
  ADD PRIMARY KEY (`id_cartelera`);

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
-- Indices de la tabla `galeria_subpagina`
--
ALTER TABLE `galeria_subpagina`
  ADD PRIMARY KEY (`id_img`,`imagen`);

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
-- Indices de la tabla `obra_teatro`
--
ALTER TABLE `obra_teatro`
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
  ADD PRIMARY KEY (`id_post`),
  ADD UNIQUE KEY `id_post` (`id_post`);

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
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`userip`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `archivo_adjunto`
--
ALTER TABLE `archivo_adjunto`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cartelera`
--
ALTER TABLE `cartelera`
  MODIFY `id_cartelera` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria_equipo`
--
ALTER TABLE `categoria_equipo`
  MODIFY `id_categoria_equipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria_libro`
--
ALTER TABLE `categoria_libro`
  MODIFY `id_categoriaLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `complemento`
--
ALTER TABLE `complemento`
  MODIFY `id_complemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `galeria_area`
--
ALTER TABLE `galeria_area`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `galeria_subarea`
--
ALTER TABLE `galeria_subarea`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `galeria_subpagina`
--
ALTER TABLE `galeria_subpagina`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `html`
--
ALTER TABLE `html`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2135;
--
-- AUTO_INCREMENT de la tabla `imagen_portada`
--
ALTER TABLE `imagen_portada`
  MODIFY `id_portada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `miembro_equipo`
--
ALTER TABLE `miembro_equipo`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2135;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subpagina`
--
ALTER TABLE `subpagina`
  MODIFY `id_subpagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tipo_media`
--
ALTER TABLE `tipo_media`
  MODIFY `id_tipo_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_post`
--
ALTER TABLE `tipo_post`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;