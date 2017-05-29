-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql104.eshost.com.ar
-- Generation Time: May 28, 2017 at 11:54 PM
-- Server version: 5.6.35-81.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eshos_18419746_lizsalon`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(100) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `estado` set('activo','inactivo','pendiente','') NOT NULL DEFAULT 'pendiente',
  `img_banner` varchar(700) NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10004 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `titulo`, `descripcion`, `estado`, `img_banner`) VALUES
(10001, 'Peluqueria', 'Cortes de cabello para dama', 'activo', 'curso_peluquerosup.jpg'),
(10002, 'Peluqueria', 'tintes para cabello', 'activo', 'Servicios-Auxiliares-Peluqueria-Online.jpg'),
(10003, 'FANNY MASAJES', 'Realizamos todo tipo de masaje', 'activo', 'masaje-general.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_citas`
--

CREATE TABLE IF NOT EXISTS `tabla_citas` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `dia_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `servicios` set('seleccionar','corte dama','corte caballero','tintes','cepillados','repolarizacion','rayitos','manicure/pedicure','maquillaje artistico','maquillaje dia/noche','limpieza natural piel') NOT NULL DEFAULT 'seleccionar',
  `cliente` varchar(400) NOT NULL,
  `estado` set('pendiente','atendido','cancelado','') NOT NULL DEFAULT 'pendiente',
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cita`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tabla_citas`
--

INSERT INTO `tabla_citas` (`id_cita`, `dia_cita`, `hora_cita`, `servicios`, `cliente`, `estado`, `ip`) VALUES
(18, '2016-10-26', '14:35:00', 'limpieza natural piel', 'daniel alexander merchan cermeño', 'pendiente', '191.102.114.110'),
(17, '2016-10-26', '13:30:00', 'corte caballero', 'daniel alexander merchan cermeño', 'pendiente', '191.102.114.110'),
(15, '2016-10-06', '12:00:00', 'maquillaje dia/noche', 'daniel alexander merchan cermeño', 'pendiente', '191.111.173.172'),
(14, '2016-10-21', '13:30:00', 'corte caballero', 'daniel alexander merchan cermeño', 'pendiente', '191.102.114.78');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_usuarios`
--

CREATE TABLE IF NOT EXISTS `tabla_usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `e_mail` varchar(200) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` set('usuario','admin','','') NOT NULL DEFAULT 'usuario',
  `img_perfil` varchar(700) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `cedula` (`cedula`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1003 ;

--
-- Dumping data for table `tabla_usuarios`
--

INSERT INTO `tabla_usuarios` (`id_user`, `nombre`, `apellido`, `cedula`, `direccion`, `celular`, `e_mail`, `usuario`, `password`, `rol`, `img_perfil`, `ip`) VALUES
(1001, 'daniel alexander', 'merchan cermeño', '', '', '3195043590', 'merchusmix@gmail.com', 'merchusmix', '12345', 'admin', '', '::1'),
(1002, 'daniel alexander', 'merchan cermeño', '', '', '3195043590', 'merchusmix@hotmail.com', 'merchussoft', '12345', 'usuario', '', '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
