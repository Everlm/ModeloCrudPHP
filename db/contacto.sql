-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-11-2014 a las 14:17:35
-- Versión del servidor: 5.1.36
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `contacto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(30) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `id_departamento_idx` (`id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `ciudad`, `id_departamento`) VALUES
(1, 'Fonseca', 1),
(2, 'Riohacha', 1),
(3, 'Valledupar', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_de_contacto`
--

CREATE TABLE IF NOT EXISTS `datos_de_contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `id_documento` int(11) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo_sangre` varchar(10) NOT NULL,
  `clave_acceso` varchar(20) NOT NULL,
  `id_navegador` int(11) NOT NULL,
  `rango_conocimiento` varchar(10) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  PRIMARY KEY (`id_contacto`),
  KEY `id_documento_idx` (`id_documento`),
  KEY `id_navegador_idx` (`id_navegador`),
  KEY `id_ciudad_idx` (`id_ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `datos_de_contacto`
--

INSERT INTO `datos_de_contacto` (`id_contacto`, `id_documento`, `identificacion`, `nombre`, `fecha_nacimiento`, `tipo_sangre`, `clave_acceso`, `id_navegador`, `rango_conocimiento`, `id_ciudad`) VALUES
(2, 1, '1120745700', 'jeffri', '1991-11-29', '+b', '1234', 1, '5', 1),
(3, 2, '321938473', 'jessica', '2014-11-19', '+o', 'erdf', 2, '8', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(45) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento`) VALUES
(1, 'Guajira'),
(2, 'Cesar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navegador_favorito`
--

CREATE TABLE IF NOT EXISTS `navegador_favorito` (
  `id_navegador` int(11) NOT NULL AUTO_INCREMENT,
  `navegador` varchar(45) NOT NULL,
  PRIMARY KEY (`id_navegador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `navegador_favorito`
--

INSERT INTO `navegador_favorito` (`id_navegador`, `navegador`) VALUES
(1, 'Chrome'),
(2, 'Mozilla'),
(3, 'Safari');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_documento`
--

CREATE TABLE IF NOT EXISTS `tipo_de_documento` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(30) NOT NULL,
  PRIMARY KEY (`id_documento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `tipo_de_documento`
--

INSERT INTO `tipo_de_documento` (`id_documento`, `tipo_documento`) VALUES
(1, 'Cedula'),
(2, 'T. Identificacion');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_de_contacto`
--
ALTER TABLE `datos_de_contacto`
  ADD CONSTRAINT `id_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_documento` FOREIGN KEY (`id_documento`) REFERENCES `tipo_de_documento` (`id_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_navegador` FOREIGN KEY (`id_navegador`) REFERENCES `navegador_favorito` (`id_navegador`) ON DELETE NO ACTION ON UPDATE NO ACTION;
