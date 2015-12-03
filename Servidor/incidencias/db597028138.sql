-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: db597028138.db.1and1.com
-- Tiempo de generación: 30-11-2015 a las 18:56:28
-- Versión del servidor: 5.5.46-0+deb7u1-log
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db597028138`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT ,
  `numero` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `idtipo` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `estado` enum('ABIERTA','CERRADA','EN PROCESO') COLLATE latin1_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL,
  `persona_detecta` int(11) NOT NULL,
  `prioridad` enum('1','2','3','4','5') COLLATE latin1_spanish_ci NOT NULL DEFAULT '3',
  `fecha_fin` datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `numero`, `idtipo`, `descripcion`, `ubicacion`, `fecha_alta`, `estado`, `idusuario`, `persona_detecta`, `prioridad`, `fecha_fin`) VALUES
(45, '20140922140453', '1', 'Altavoces en PDC aula 204', '', '2014-09-22 14:04:53', 'CERRADA', 1, 1, '1', '0000-00-00 00:00:00'),
(64, '20140925112800', '9', 'Instalar cerrojo con llave amaestrada en los cajones de mesa profe\n103, 204, 205, 206, 209', '', '2014-09-25 11:28:00', 'CERRADA', 1, 1, '1', '0000-00-00 00:00:00');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`, `descripcion`, `nivel`) VALUES
(1, 'ADM', 'ADMNISTRADOR', 0),
(2, 'TIC', 'COORDINADOR TIC', 0),
(3, 'PROFE', 'PROFESOR', 0),
(8, 'SECRE', 'SECRETARIO', 0),
(6, 'peque', 'Super root', 0),
(9, 'CONS', 'Consergeria', 0),
(10, 'PROJECTES', 'PER A DONAR D''ALTA MÒDULS DE PROJECTE', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_incidencias`
--

CREATE TABLE `tipos_incidencias` (
  `idtipo` int(11) NOT NULL,
  `codigo_tipo` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

CREATE TABLE `tipos_incidencias_usuario`(
 `idtipo` int(11) NOT NULL,
 `idusuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `tipos_incidencias_usuario` (`idtipo`,`idusuario`)VALUES
(1,1),
(2,1),
(11,1),
(9,1),
(8,1),
(12,1),
(14,1),
(15,1),
(16,1),
(17,1),
(20,1),
(19,1);

--
-- Volcado de datos para la tabla `tipos_incidencias`
--

INSERT INTO `tipos_incidencias` (`idtipo`, `codigo_tipo`, `descripcion`) VALUES
(1, 'INF', 'INFORMATICA'),
(2, 'MOBIL', 'MOBILIARIO'),
(11, 'OBR', 'OBRER'),
(10, 'FERR', 'FERRER'),
(9, 'FUS', 'FUSTERIA'),
(8, 'ELECT', 'ELÉCTRICA'),
(12, 'CRIS', 'CRISTALLERIA'),
(14, 'PERS', 'PERSIANERIA-CORTINATGES'),
(15, 'PINT', 'PINTURA'),
(16, 'CONS', 'CONSERGERIA - DIVERSOS'),
(17, 'FONT', 'FONTANERIA'),
(20, 'prueb', 'pruebas'),
(19, 'COMPR', 'COMPRAS MATERIAL INFORMATICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL UNIQUE ,
  `clave` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `idrol` tinyint(4) NOT NULL,
  `email2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `logo` VARCHAR(45)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO usuarios(id, email, clave, nombre, idrol, email2, logo) VALUES (1, '2daw', 'amGSmuzYw4sTMOcgcgdv6DOcy+VlwVbPmrn3JwdOeimwKdVh69wMMzcTFEGja3tfgQZ99k+bhJQ/uOzJZ6/Q+A==', '2daw', 1, '', null);
INSERT INTO usuarios(id, email, clave, nombre, idrol, email2, logo) VALUES (2, 'sergiosanchis@hotmail.com', '3HvchnWfs/VRxR0oBoqKrr0tbYqFgB1x8MaF6DTIbifBtXkr+FQ/FVFMsgAdMycw+8XPTJf+AI00cSuXBSFXiA==', 'Sergio Sanchis Climent', 1, '', null);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tipos_incidencias`
--
ALTER TABLE `tipos_incidencias`
  ADD PRIMARY KEY (`idtipo`);

ALTER TABLE `tipos_incidencias_usuario`
  ADD PRIMARY KEY (`idtipo`, `idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tipos_incidencias`
--
ALTER TABLE `tipos_incidencias`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
