-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-11-2020 a las 00:28:31
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `con_acc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_ctrl` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '''''',
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '''''',
  `carrera` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '''''',
  `num_tel` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '''''',
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '''''',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `num_ctrl`, `nombre`, `carrera`, `num_tel`, `email`) VALUES
(1, '16580899', 'jorge', 'Ingeniería Electromecánica', '8994143480', 'jorgev537@gmail.com'),
(2, '16580856', 'Jesus perez', 'Ingeniería Petrolera', '8991538566', 'jesus@gmail.com'),
(3, '16580253', 'toÃ±o', 'Ingeniería Electromecánica', '8991534785', 'jorgev537@gmail.com'),
(4, '16580253', 'toÃ±o', 'Toky', '8991534785', 'jorgev537@gmail.com'),
(5, '16580253', 'toÃ±o', 'Toky', '8991534785', 'jorgev537@gmail.com'),
(6, '165802532', 'eee', 'Toky', '8991534785', 'jorgev53@gma.com'),
(7, '16580586', 'pepe', 'Phnom Penh', '8991534785', 'baldazogza98@gmail.com'),
(8, '16580586', 'eeedd', 'USA', '8991534785', 'j-e-vw@hotmail.com'),
(9, '16580253', 'toÃ±o', 'Ingenierï¿½a Industrial', '8991534785', 'jorgev537@gmail.com'),
(10, '16580253', 'toÃ±o', 'Ingenierï¿½a Industrial', '8991534785', 'jorgev537@gmail.com'),
(11, '16580253', 'toÃ±o', 'Ingenierï¿½a Industrial', '8991534785', 'jorgev537@gmail.com'),
(12, '16580253', 'toÃ±o', 'Ingenierï¿½a Industrial', '8991534785', 'jorgev537@gmail.com'),
(13, '16580253', 'toÃ±o', 'Ingenierï¿½a Industrial', '8991534785', 'jorgev537@gmail.com'),
(14, '16580253', 'toÃ±o', 'Ingenierï¿½a Industrial', '8991534785', 'jorgev537@gmail.com'),
(15, '16580586', 'toÃ±o', 'Ingenierï¿½a Electromecï¿½nica', '8991534785', 'jorgev537@gmail.com'),
(16, '16580586', 'toÃ±o', 'Ingenierï¿½a Electromecï¿½nica', '8991534785', 'jorgev537@gmail.com'),
(17, '16580253', 'toÃ±o', 'Arquitectura', '8991534785', 'jorgev537@gmail.com'),
(18, '16580253', 'toño', 'Arquitectura', '8991534785', 'jorgev537@gmail.com'),
(19, '16580253', 'toño', 'Ingeniería en Tecnologías de la Información y Comunicaciones', '8991534785', 'jorgev537@gmail.com'),
(20, '16580253', 'toño', 'Ingeniería en Tecnologías de la Información y Comunicaciones', '8991534785', 'jorgev537@gmail.com'),
(21, '16580586', 'toño', 'Ingeniería Electrónica', '8994143480', 'jorgev537@gmail.com'),
(22, '16580254', 'toño', 'Administración', '8994143480', 'j-e-vw@hotmail.com'),
(23, '16580854', 'Jorge Eduardo Villeda Walle', 'Ingeniería en Tecnologías de la Información y Comunicaciones', '8994143480', 'jorgev537@gmail.com'),
(25, '16580864', 'Jorge Eduardo Villeda Walle', 'Arquitectura', '8994143480', 'jorgev537@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `carrera`) VALUES
(1, 'Arquitectura'),
(2, 'Administración'),
(3, 'Ingeniería Civil'),
(4, 'Ingeniería Electrónica'),
(5, 'Ingeniería Electromecánica'),
(6, 'Ingeniería en Gestión Empresarial'),
(7, 'Ingeniería Industrial'),
(8, 'Ingeniería Mecatrónica'),
(9, 'Ingeniería Petrolera'),
(10, 'Ingeniería en Tecnologías de la Información y Comunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_ent_sal`
--

DROP TABLE IF EXISTS `reg_ent_sal`;
CREATE TABLE IF NOT EXISTS `reg_ent_sal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_ctrl` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `carrera` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `fecha_sal` datetime DEFAULT NULL,
  `nom_usa` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `tipo_usuario`) VALUES
(1, 'admin', 'admin', 'administrador', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
