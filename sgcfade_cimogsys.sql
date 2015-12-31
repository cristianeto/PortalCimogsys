-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2015 a las 08:17:04
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sgcfade_cimogsys`
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area_gestion`
--

INSERT INTO `area_gestion` (`id_area_gestion`, `nombre_area_gestion`, `descripcion_area_gestion`, `color_area_gestion`, `centro_area_gestion`) VALUES
(4, 'Sistemas', 'Sistemas', 'rojo', 3),
(5, 'Dise&ntilde;o', 'Dise&ntilde;o', 'rosa', 3),
(6, 'Proyectos', 'Proyectos', 'rosa', 4),
(7, 'Gestion', 'Gestion', 'rosa', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE IF NOT EXISTS `beneficiarios` (
  `id_beneficiarios` int(11) NOT NULL,
  `nombre_beneficiarios` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_beneficiarios` text COLLATE utf8_spanish_ci,
  `centro_beneficiarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`id_centro`, `nombre_centro`, `logo_centro`, `descripcion_centro`, `mision_centro`, `vision_centro`, `telefono_centro`, `direccion_centro`, `codigo_postal_centro`, `objetivo_general_centro`, `quienes_somos_centro`, `img_centro`) VALUES
(3, 'cimogsys', 'icono.png', '', '', '', '', '', '', '', '', 'iconocopia.png'),
(4, 'espoch', 'FASUTO.jpg', '', '', '', '', '', '', '', '', 'fasutocopia.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE IF NOT EXISTS `informes` (
  `id_informes` int(11) NOT NULL,
  `descripcion_informe` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_informe` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `enlace_informe` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_entrega_informe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_modificacion_informe` timestamp NULL DEFAULT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion`
--

CREATE TABLE IF NOT EXISTS `linea_investigacion` (
  `id_linea_investigacion` int(11) NOT NULL,
  `descripcion_linea_investigacion` text COLLATE utf8_spanish_ci NOT NULL,
  `centro_linea_investigacion` int(11) NOT NULL,
  `tipo_linea_investigacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id_multimedia` int(11) NOT NULL,
  `enlace_multimedia` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_mulitimedia` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_multimedia` int(11) NOT NULL,
  `noticia_multimedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `contenido_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publicacion_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actualizacion_noticia` timestamp NULL DEFAULT NULL,
  `enlace_notica` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `area_gestion_notica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE IF NOT EXISTS `objetivos` (
  `id_objetivos` int(11) NOT NULL,
  `descripcion_objetivos` text COLLATE utf8_spanish_ci NOT NULL,
  `centro_objetivos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_linea_investigacion`
--

CREATE TABLE IF NOT EXISTS `tipo_linea_investigacion` (
  `id_tipo_linea_investigacion` int(11) NOT NULL,
  `descripcion_tipo_linea_investigacion` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_multimedia`
--

CREATE TABLE IF NOT EXISTS `tipo_multimedia` (
  `id_tipo_multimedia` int(11) NOT NULL,
  `descripcion_tipo_multimedia` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion_tipo_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `ci_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombres_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usuario` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_usuario` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `genero_usuario` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `img_formal_usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `img_informal_usuario` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento_usuario` date DEFAULT NULL,
  `area_gestion_usuario` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `estado_usuario` int(11) NOT NULL,
  `disponible_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='	';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_gestion`
--
ALTER TABLE `area_gestion`
  ADD PRIMARY KEY (`id_area_gestion`), ADD KEY `fk_area_gestion_centro1_idx` (`centro_area_gestion`);

--
-- Indices de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`id_beneficiarios`), ADD KEY `fk_beneficiario_centro1_idx` (`centro_beneficiarios`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`id_centro`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id_informes`), ADD KEY `fk_informes_usuario1_idx` (`usuario_id_usuario`);

--
-- Indices de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  ADD PRIMARY KEY (`id_linea_investigacion`), ADD KEY `fk_detalle_linea_investigacion_centro1_idx` (`centro_linea_investigacion`), ADD KEY `fk_detalle_linea_investigacion_linea_investigacion1_idx` (`tipo_linea_investigacion`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id_multimedia`), ADD KEY `fk_multimedia_tipo_multimedia1_idx` (`tipo_multimedia`), ADD KEY `fk_multimedia_noticia1_idx` (`noticia_multimedia`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`), ADD KEY `fk_noticia_area_gestion1_idx` (`area_gestion_notica`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id_objetivos`), ADD KEY `fk_objetivos_centro1_idx` (`centro_objetivos`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyectos`), ADD KEY `fk_proyetos_area_gestion1_idx` (`area_gestion_proyectos`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id_redes_sociales`), ADD KEY `fk_redes_sociales_centro1_idx` (`centro_redes_sociales`);

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
  ADD PRIMARY KEY (`id_usuario`), ADD KEY `fk_usuario_area_gestion1_idx` (`area_gestion_usuario`), ADD KEY `fk_usuario_tipo_usuario1_idx` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_gestion`
--
ALTER TABLE `area_gestion`
  MODIFY `id_area_gestion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `id_beneficiarios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `centro`
--
ALTER TABLE `centro`
  MODIFY `id_centro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id_informes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  MODIFY `id_linea_investigacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id_multimedia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_objetivos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyectos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id_redes_sociales` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_linea_investigacion`
--
ALTER TABLE `tipo_linea_investigacion`
  MODIFY `id_tipo_linea_investigacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_multimedia`
--
ALTER TABLE `tipo_multimedia`
  MODIFY `id_tipo_multimedia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
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
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
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
