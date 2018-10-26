-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2018 a las 15:38:14
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `daps_data`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuota10` int(11) DEFAULT NULL,
  `cuota1` int(11) DEFAULT NULL,
  `cuota2` int(11) DEFAULT NULL,
  `cuota3` int(11) DEFAULT NULL,
  `cuota4` int(11) DEFAULT NULL,
  `cuota5` int(11) DEFAULT NULL,
  `cuota6` int(11) DEFAULT NULL,
  `cuota7` int(11) DEFAULT NULL,
  `cuota8` int(11) DEFAULT NULL,
  `cuota9` int(11) DEFAULT NULL,
  `cuota11` int(11) DEFAULT NULL,
  `cuota12` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `cuota10`, `cuota1`, `cuota2`, `cuota3`, `cuota4`, `cuota5`, `cuota6`, `cuota7`, `cuota8`, `cuota9`, `cuota11`, `cuota12`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
