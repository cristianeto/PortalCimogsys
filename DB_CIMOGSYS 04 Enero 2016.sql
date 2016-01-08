-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-01-2016 a las 22:52:32
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `DB_CIMOGSYS`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_gestion`
--

CREATE TABLE IF NOT EXISTS `area_gestion` (
  `id_area_gestion` int(11) NOT NULL,
  `nombre_area_gestion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_area_gestion` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `color_area_gestion` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `centro_area_gestion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area_gestion`
--

INSERT INTO `area_gestion` (`id_area_gestion`, `nombre_area_gestion`, `descripcion_area_gestion`, `color_area_gestion`, `centro_area_gestion`) VALUES
(1, 'Dirección', 'Departamento de Dirección', '#365277', 3),
(2, 'Proyectos', 'Departamento de Proyectos', '#c85c5e', 3),
(3, 'Diseño', 'Departamento de diseño', '#c85c5e', 3),
(4, 'Desarrollo de Software', 'Departamento de Desarrollo de Software', '#537ea0', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE IF NOT EXISTS `beneficiarios` (
  `id_beneficiarios` int(11) NOT NULL,
  `nombre_beneficiarios` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_beneficiarios` text COLLATE utf8_spanish_ci,
  `centro_beneficiarios` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`id_beneficiarios`, `nombre_beneficiarios`, `descripcion_beneficiarios`, `centro_beneficiarios`) VALUES
(1, 'FADE', 'Beneficiario Facultad de Administración de Empresas', 3),
(2, 'FIE', 'Beneficiario de la Facultad de Informática y Electrónica', 3),
(3, 'IPEC', 'Beneficiario Instituto de Pstgrado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE IF NOT EXISTS `centro` (
  `id_centro` int(11) NOT NULL,
  `nombre_centro` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `logo_centro` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_centro` text COLLATE utf8_spanish_ci,
  `mision_centro` text COLLATE utf8_spanish_ci,
  `vision_centro` text COLLATE utf8_spanish_ci,
  `telefono_centro` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion_centro` text COLLATE utf8_spanish_ci,
  `codigo_postal_centro` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `objetivo_general_centro` text COLLATE utf8_spanish_ci,
  `quienes_somos_centro` text COLLATE utf8_spanish_ci,
  `img_centro` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`id_centro`, `nombre_centro`, `logo_centro`, `descripcion_centro`, `mision_centro`, `vision_centro`, `telefono_centro`, `direccion_centro`, `codigo_postal_centro`, `objetivo_general_centro`, `quienes_somos_centro`, `img_centro`) VALUES
(3, 'CIMOGSYSS', 'headerLogo.png', 'Centro de Investigaci&oacute;n en Modelos de Gesti&oacute;n y Sistemas Inform&aacute;ticos pertenecientes a FADE FIE de la ESPOCH', 'Realizar, fomentar y promocionar la gesti&oacute;n acad&eacute;mica-t&eacute;cnico-administrativa de la investigaci&oacute;n cient&iacute;fica y tecnol&oacute;gica en el &aacute;rea de la Gesti&oacute;n y sistematizaci&oacute;n de modelos, procurando la eficiencia en los procesos administrativos y de gesti&oacute;n para la creaci&oacute;n de valor de nuestros principales actores; con el compromiso, la asesor&iacute;a y capacitaci&oacute;n de los investigadores (docentes o estudiantes) de la Escuela Superior Polit&eacute;cnica de Chimborazo.', 'Consolidarse como uno de los principales centros de investigaci&oacute;n de excelencia en modelos de gesti&oacute;n y sistematizaci&oacute;n del Ecuador. El cual se caracterizar&aacute; por desarrollar productos de gesti&oacute;n y herramientas inform&aacute;ticas para la gesti&oacute;n, contribuyendo de esta manera al mejoramiento de los sectores p&uacute;blicos y privados para el desarrollo del pa&iacute;s. ', '(593) 32998-200 Ext. 318', 'Panamericana Sur  Km. 1 1/2', 'EC06155', 'Desarrollar el modelo de gesti&oacute;n de procesos para las Universidades y Escuelas Polit&eacute;cnicas.', 'Investigaci&oacute;n en desarrollo de modelo de gesti&oacute;n para las Universidades y Escuelas Polit&eacute;cnicas, para organizaciones p&uacute;blico privadas, manejo de imagen corporativa, y los objetivos declarados en los grupos de investigaci&oacute;n que la constituyen: &ldquo;Grupo de Investigaci&oacute;n en Modelos y Sistemas de Gesti&oacute;n IMSG&rdquo; de la FADE; &ldquo;Grupo de Investigaci&oacute;n e Interacci&oacute;n en Tecnolog&iacute;as de la Comunicaci&oacute;n IITC&rdquo; de la FIE.', 'woman-with-hair-up-staring-at-computer.jpg'),
(4, 'espoch', 'FASUTO.jpg', '', '', '', '', '', '', '', '', 'fasutocopia.jpg'),
(5, 'Cristian', 'fondo.jpg', 'descricion centro cristianeto', 'mision es de generar', 'vision es de obtener', '099288', 'Pedro Vicente Maldonado', 'ECU060', 'OBjetivo General', 'Somos un grupo de investigadorss...', 'Cristianeto 2015-11-24 a las 8.49.10.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE IF NOT EXISTS `informe` (
  `id_informe` int(11) NOT NULL,
  `descripcion_informe` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_informe` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'unique',
  `archivo_informe` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_entrega_informe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_informe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`id_informe`, `descripcion_informe`, `codigo_informe`, `archivo_informe`, `fecha_entrega_informe`, `fecha_modificacion_informe`, `usuario_id_usuario`) VALUES
(1, 'descripcionde', 'id-infr-2', '1_archivoInforme.pdf', '2015-11-26 21:57:05', '2015-12-16 17:56:13', 3),
(2, 'Descripcion del informe de actividades de la semana del 16 al 21 de noviembre del 2015', 'id-2', '2_archivoInforme.PDF', '2015-11-27 17:43:04', '2015-12-16 17:32:14', 3),
(3, 'Informe de actividades', 'Inf-Cri-1', '3_archivoInforme.pdf', '2015-11-27 17:45:08', '2015-11-27 17:45:08', 2),
(4, 'asdasd', 'Inf-Cri-1', '4_archivoInforme.pdf', '2015-11-27 17:45:21', '2015-11-27 17:45:21', 2),
(5, 'DEscripcion del identifiacador', 'id-uni-3', '5_archivoInforme.pdf', '2015-12-01 13:55:02', '2015-12-01 13:55:02', 3),
(6, 'aasd', 'asdq1', '6_archivoInforme.pdf', '2015-12-16 18:10:20', '2015-12-16 18:10:20', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion`
--

CREATE TABLE IF NOT EXISTS `linea_investigacion` (
  `id_linea_investigacion` int(11) NOT NULL,
  `descripcion_linea_investigacion` text COLLATE utf8_spanish_ci NOT NULL,
  `centro_linea_investigacion` int(11) NOT NULL,
  `tipo_linea_investigacion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea_investigacion`
--

INSERT INTO `linea_investigacion` (`id_linea_investigacion`, `descripcion_linea_investigacion`, `centro_linea_investigacion`, `tipo_linea_investigacion`) VALUES
(1, 'Programa para el desarrollo de modelos de gestión por procesos', 3, 1),
(2, 'Programa para el desarrollo de planificación estratégica', 3, 1),
(3, 'Programa de sistemas de gestión de la calidad', 3, 2),
(4, 'Programa de sistemas de gestión de la planificación estratégica', 3, 2),
(5, 'Programa de Balanced Scorecard', 3, 2),
(6, 'Programa de sistemas de gestión de acreditación', 3, 2),
(7, 'Programa para el desarrollo de aplicaciones de software, hardware y telecomunicaciones para planificación 		territorial', 3, 3),
(8, 'Programa para el desarrollo de aplicaciones de software y hardware en apoyo a personas con capacidades 		especiales', 3, 3),
(9, 'Programa para el desarrollo de aplicaciones de software para procesos de gestión y administración pública y 		privada', 3, 3),
(10, 'Programa de diseño, comunicación y cultura', 3, 3),
(11, 'Programa de diseño, comunicación y cultura', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id_multimedia` int(11) NOT NULL,
  `enlace_multimedia` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_multimedia` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_multimedia` int(11) NOT NULL,
  `noticia_multimedia` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`id_multimedia`, `enlace_multimedia`, `descripcion_multimedia`, `tipo_multimedia`, `noticia_multimedia`) VALUES
(2, 'http://fb.com/multimedia', 'es un enlace a fabeook de multimedia', 1, 6),
(3, 'http://enlace.com.es', 'nueva descrip', 4, 6),
(4, 'http://revista.vistazo.com.ec', 'De izquierda a derecha: Juan Carlos D&iacute;az, Jorge Marti&iacute;nez, Cristian Guam&aacute;', 1, 6),
(6, 'enlace multimedia', 'ola soy nuevo multimedia', 3, 6),
(7, 'http://enlace.es', 'El d&iacute;a en que yo me vaya', 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `contenido_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publicacion_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion_noticia` timestamp NULL DEFAULT NULL,
  `enlace_noticia` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `area_gestion_notica` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `titulo_noticia`, `contenido_noticia`, `fecha_publicacion_noticia`, `fecha_actualizacion_noticia`, `enlace_noticia`, `area_gestion_notica`) VALUES
(6, 'titulo de nueva noticia', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,', '2015-11-19 14:33:15', NULL, 'http://martes.es', 4),
(8, 'Implementación del sistema de gestión de procesos del IPEC', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the', '2015-11-19 15:27:31', '0000-00-00 00:00:00', 'bmajsdkjqweoqwe', 4),
(9, 'Titulo de Diseño', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt', '2015-11-23 13:39:48', NULL, 'enlace de la noticas https://www.notiDiseno.org', 3),
(10, 'Lanzamiento del Portal Cimogsys', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate', '2016-01-04 20:43:12', '0000-00-00 00:00:00', 'http://cantares.es', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE IF NOT EXISTS `objetivos` (
  `id_objetivos` int(11) NOT NULL,
  `descripcion_objetivos` text COLLATE utf8_spanish_ci NOT NULL,
  `centro_objetivos` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id_objetivos`, `descripcion_objetivos`, `centro_objetivos`) VALUES
(1, 'Investigar las teorías sobre gestión de procesos y sus modelos.', 3),
(2, 'Determinar el modelo más adecuado para las Universidades y Escuelas Politécnicas del país.', 3),
(3, 'Desarrollar el modelo de Gestión de Procesos genérico acorde a los requerimientos legales para las universidades y escuelas politécnicas.', 3),
(4, 'Implementar del Modelo de Gestión por Procesos en la Facultad de Administración de Empresas de la Espoch', 3),
(5, 'Implementar del modelo de Gestión de la Información en la Facultad de Administración de Empresas de la Espoch.', 3),
(6, 'Implementar del Modelo de Gestión por Procesos en la Facultad de Informática y Electrónica de la Espoch', 3),
(7, 'Implementar del modelo de Gestión de la Información en la Facultad de Informática y Electrónica de la Espoch.', 3),
(8, 'Implementar del Modelo de Gestión por Procesos en el Instituto de Posgrados y Educación Continua de la Espoch ', 3),
(9, 'Implementar del Modelo de Gestión por Procesos en las dependencias y unidades académicas de la Espoch', 3),
(10, 'Implementar del modelo de Gestión de la Información en las dependencias y unidades académicas de la Espoch', 3),
(11, 'Publicar artículos científicos del trabajo realizado en revistas indexadas', 3),
(12, 'Publicar libros', 3),
(13, 'Realizar eventos de trasferencia de conocimiento', 3),
(14, 'Realizar ponencias sobre la investigación', 3),
(15, 'Realizar capacitaciones', 3),
(16, 'Realizar cursos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id_proyectos` int(11) NOT NULL,
  `nombre_proyectos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `enlace_proyectos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_proyectos` text COLLATE utf8_spanish_ci,
  `imagen_banner_proyectos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_min_proyectos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `area_gestion_proyectos` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyectos`, `nombre_proyectos`, `enlace_proyectos`, `descripcion_proyectos`, `imagen_banner_proyectos`, `imagen_min_proyectos`, `area_gestion_proyectos`) VALUES
(1, 'SGC FADE', 'http://sgc.fade.cimogsys.com/', 'Proyecto Gesti&oacute;n por procesos en la Facultad de Administraci&oacute;n de Empresas de la Espoch y Sistema de Gesti&oacute;n de la Informaci&oacute;n', '5.jpeg', 'footerFade.png', 1),
(2, 'Portal FIE', 'http://fie.cimogsys.com/', 'Proyecto Gestión por Procesos en la Facultad de Informática y Electrónica de la Espoch y Sistema Gestión de la Información.', 'bike_chase-wallpaper-2560x1600.jpg', 'footerFie.png', 1),
(3, 'Portal IPEC', 'http://ipec.cimogsys.com/', 'Proyecto Gestión por Procesos en el Instituto de Posgrados y Educación Continua de la Espoch y Sistema de Gestión de la Información', 'usuario1.jpg', 'footerIpec.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE IF NOT EXISTS `redes_sociales` (
  `id_redes_sociales` int(11) NOT NULL,
  `nombre_redes_sociales` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `enlace_redes_sociales` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_redes_sociales` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `centro_redes_sociales` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `redes_sociales`
--

INSERT INTO `redes_sociales` (`id_redes_sociales`, `nombre_redes_sociales`, `enlace_redes_sociales`, `usuario_redes_sociales`, `centro_redes_sociales`) VALUES
(1, 'twitter', 'https://twitter.com/Centro_Cimogsys', '@Centro_Cimogsys', 3),
(2, 'Facebook', 'https://www.facebook.com/cimogsys', 'usuario_facebook', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_linea_investigacion`
--

CREATE TABLE IF NOT EXISTS `tipo_linea_investigacion` (
  `id_tipo_linea_investigacion` int(11) NOT NULL,
  `descripcion_tipo_linea_investigacion` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_linea_investigacion`
--

INSERT INTO `tipo_linea_investigacion` (`id_tipo_linea_investigacion`, `descripcion_tipo_linea_investigacion`) VALUES
(1, 'Modelos de Gestión, y específicamente en los siguientes programas'),
(2, 'Sistemas de Gestión'),
(3, 'Tecnologías de la información, comunicación y procesos industriales, y específicamente en los siguientes programas'),
(4, 'Arte, Cultura y Patrimonio, y específicamente en el siguiente programa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_multimedia`
--

CREATE TABLE IF NOT EXISTS `tipo_multimedia` (
  `id_tipo_multimedia` int(11) NOT NULL,
  `descripcion_tipo_multimedia` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_multimedia`
--

INSERT INTO `tipo_multimedia` (`id_tipo_multimedia`, `descripcion_tipo_multimedia`) VALUES
(1, 'Imagen'),
(2, 'Video'),
(3, 'Gif'),
(4, 'Audio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion_tipo_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion_tipo_usuario`) VALUES
(1, 'Proyectista'),
(2, 'Practicante'),
(3, 'Tesista'),
(4, 'Director'),
(5, 'Pasante'),
(6, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `ci_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nick_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'UNIQUE',
  `nombres_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(110) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usuario` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_usuario` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `genero_usuario` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `img_formal_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `img_informal_usuario` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento_usuario` date DEFAULT NULL,
  `area_gestion_usuario` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `estado_usuario` int(11) NOT NULL,
  `disponible_usuario` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='	';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `ci_usuario`, `nick_usuario`, `nombres_usuario`, `apellidos_usuario`, `password`, `correo_usuario`, `telefono_usuario`, `genero_usuario`, `img_formal_usuario`, `img_informal_usuario`, `fecha_nacimiento_usuario`, `area_gestion_usuario`, `tipo_usuario`, `estado_usuario`, `disponible_usuario`, `remember_token`) VALUES
(2, '0000000002', 'giova', 'Giovanny', 'Alarcón', '123456', 'ingiovannyalarcon@hotmail.com', '2977988', 'H', '2_imgFormal.png', '2_imgInformal.png', '1989-12-10', 1, 2, 1, 0, NULL),
(3, '0000000003', 'xavi', 'Xavier', 'Centeno', '123456', 'xcenteno@hotmail.com', '0231123', 'H', '3_imgFormal.png', '3_imgInformal.png', '1990-12-11', 2, 2, 1, 0, NULL),
(4, '0000000004', 'gaba', 'Gabriela', 'Baldeón', '123456', 'gbaldeon@hotmail.com', '2966678', 'M', '4_imgFormal.png', '4_imgInformal.png', '1991-07-12', 3, 1, 1, 0, NULL),
(6, '0000000006', 'aymara', 'Erika', 'Razo', '123456', 'erikarazo@hotmail.com', '2222222', 'M', '6_imgFormal.png', '6_imgInformal.png', '1992-10-12', 3, 2, 1, 0, NULL),
(7, '0600000009', 'fasuto', 'Fausto Danilo', 'Cevallos Mu&ntilde;oz', '$2y$10$vjcrx1Zubjj3eX9.1JXqFOPzNrrgxmB1C9gFljfHpVD/ZZUHJAj1.', 'faustocevallos@outlook.com', '0999999999', 'H', '7_imgFormal.png', '7_imgInformal.png', '1991-02-05', 4, 6, 1, 0, 'vq1Cuy5dOryRjQ2g2wJ2VYDWsSeCeecqTtY76rpzYx4p0r0RxqqujIrG5BjG'),
(8, '0603997305', 'cristianeto', 'Cristian Geovanny', 'Guam&aacute;n Bet&uacute;n', '$2y$10$PtobScPit.zTdTqvNVm6ROAw6oiUGOAK087hJK/jCbvhnocae/QCu', 'cristian.guaman@espoch.edu.ec', '2966844', 'H', '8_imgFormal.png', '8_imgInformal.png', '1990-02-05', 4, 6, 1, 0, 'eaiqezcfebj1YUeaN76j24uvmcyATGHIIwTYZpk5JlPBNuJXh12ErIkBeEEs');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_gestion`
--
ALTER TABLE `area_gestion`
  ADD PRIMARY KEY (`id_area_gestion`),
  ADD KEY `fk_area_gestion_centro1_idx` (`centro_area_gestion`);

--
-- Indices de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`id_beneficiarios`),
  ADD KEY `fk_beneficiario_centro1_idx` (`centro_beneficiarios`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`id_centro`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id_informe`),
  ADD KEY `fk_informes_usuario1_idx` (`usuario_id_usuario`);

--
-- Indices de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  ADD PRIMARY KEY (`id_linea_investigacion`),
  ADD KEY `fk_detalle_linea_investigacion_centro1_idx` (`centro_linea_investigacion`),
  ADD KEY `fk_detalle_linea_investigacion_linea_investigacion1_idx` (`tipo_linea_investigacion`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id_multimedia`),
  ADD KEY `fk_multimedia_tipo_multimedia1_idx` (`tipo_multimedia`),
  ADD KEY `fk_multimedia_noticia1_idx` (`noticia_multimedia`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_noticia_area_gestion1_idx` (`area_gestion_notica`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id_objetivos`),
  ADD KEY `fk_objetivos_centro1_idx` (`centro_objetivos`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyectos`),
  ADD KEY `fk_proyetos_area_gestion1_idx` (`area_gestion_proyectos`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id_redes_sociales`),
  ADD KEY `fk_redes_sociales_centro1_idx` (`centro_redes_sociales`);

--
-- Indices de la tabla `tipo_linea_investigacion`
--
ALTER TABLE `tipo_linea_investigacion`
  ADD PRIMARY KEY (`id_tipo_linea_investigacion`);

--
-- Indices de la tabla `tipo_multimedia`
--
ALTER TABLE `tipo_multimedia`
  ADD PRIMARY KEY (`id_tipo_multimedia`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_area_gestion1_idx` (`area_gestion_usuario`),
  ADD KEY `fk_usuario_tipo_usuario1_idx` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_gestion`
--
ALTER TABLE `area_gestion`
  MODIFY `id_area_gestion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `id_beneficiarios` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `centro`
--
ALTER TABLE `centro`
  MODIFY `id_centro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  MODIFY `id_linea_investigacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id_multimedia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_objetivos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyectos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id_redes_sociales` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_linea_investigacion`
--
ALTER TABLE `tipo_linea_investigacion`
  MODIFY `id_tipo_linea_investigacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_multimedia`
--
ALTER TABLE `tipo_multimedia`
  MODIFY `id_tipo_multimedia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area_gestion`
--
ALTER TABLE `area_gestion`
  ADD CONSTRAINT `fk_area_gestion_centro1` FOREIGN KEY (`centro_area_gestion`) REFERENCES `centro` (`id_centro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD CONSTRAINT `fk_beneficiario_centro1` FOREIGN KEY (`centro_beneficiarios`) REFERENCES `centro` (`id_centro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `fk_informes_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  ADD CONSTRAINT `fk_detalle_linea_investigacion_centro1` FOREIGN KEY (`centro_linea_investigacion`) REFERENCES `centro` (`id_centro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_linea_investigacion_linea_investigacion1` FOREIGN KEY (`tipo_linea_investigacion`) REFERENCES `tipo_linea_investigacion` (`id_tipo_linea_investigacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `fk_multimedia_noticia1` FOREIGN KEY (`noticia_multimedia`) REFERENCES `noticia` (`id_noticia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_multimedia_tipo_multimedia1` FOREIGN KEY (`tipo_multimedia`) REFERENCES `tipo_multimedia` (`id_tipo_multimedia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_area_gestion1` FOREIGN KEY (`area_gestion_notica`) REFERENCES `area_gestion` (`id_area_gestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD CONSTRAINT `fk_objetivos_centro1` FOREIGN KEY (`centro_objetivos`) REFERENCES `centro` (`id_centro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_proyetos_area_gestion1` FOREIGN KEY (`area_gestion_proyectos`) REFERENCES `area_gestion` (`id_area_gestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD CONSTRAINT `fk_redes_sociales_centro1` FOREIGN KEY (`centro_redes_sociales`) REFERENCES `centro` (`id_centro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_area_gestion1` FOREIGN KEY (`area_gestion_usuario`) REFERENCES `area_gestion` (`id_area_gestion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
