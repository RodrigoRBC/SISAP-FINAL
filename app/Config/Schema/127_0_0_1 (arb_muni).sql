-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-04-2019 a las 20:05:05
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arb_muni`
--
DROP DATABASE IF EXISTS `arb_muni`;
CREATE DATABASE IF NOT EXISTS `arb_muni` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `arb_muni`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `paramenu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=472 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`, `paramenu`) VALUES
(1, NULL, '', NULL, 'controllers', 1, 152, 0),
(2, 1, '', NULL, 'Secorganizations', 2, 23, 0),
(3, 1, '', NULL, 'Secaccesses', 24, 39, 0),
(4, 1, '', NULL, 'Acos', 40, 49, 0),
(5, 2, '', NULL, 'menuseguridad', 3, 4, 1),
(6, 3, '', NULL, 'listaccess', 25, 26, 1),
(7, 4, '', NULL, 'index', 41, 42, 1),
(8, 4, '', NULL, 'editar', 43, 44, 0),
(9, 2, '', NULL, 'index', 5, 6, 1),
(10, 2, '', NULL, 'edit', 7, 8, 0),
(11, 2, '', NULL, 'view', 9, 10, 0),
(12, 2, '', NULL, 'add', 11, 12, 0),
(13, 2, '', NULL, 'logisticaindex', 13, 14, 0),
(14, 2, '', NULL, 'logisticaedit', 15, 16, 0),
(15, 2, '', NULL, 'delete', 17, 18, 0),
(16, 2, '', NULL, 'mostrarroles', 19, 20, 0),
(17, 2, '', NULL, 'mostrarsucursales', 21, 22, 0),
(18, 4, '', NULL, 'agregar', 45, 46, 0),
(19, 4, '', NULL, 'eliminar', 47, 48, 0),
(20, 3, '', NULL, 'permiso', 27, 28, 0),
(21, 3, '', NULL, 'listapermisos', 29, 30, 0),
(22, 3, '', NULL, 'accederpermiso', 31, 32, 0),
(23, 3, '', NULL, 'permitir', 33, 34, 0),
(24, 3, '', NULL, 'denegarpermiso', 35, 36, 0),
(25, 3, '', NULL, 'cancelar', 37, 38, 0),
(26, 1, '', NULL, 'Secprojects', 50, 69, 0),
(27, 26, '', NULL, 'index', 51, 52, 1),
(28, 1, '', NULL, 'Secroles', 70, 81, 0),
(29, 28, '', NULL, 'index', 71, 72, 1),
(30, 1, '', NULL, 'Secpeople', 82, 107, 0),
(31, 30, '', NULL, 'index', 83, 84, 1),
(32, 1, '', NULL, 'Secassigns', 108, 129, 0),
(33, 32, '', NULL, 'index', 109, 110, 1),
(34, 1, '', NULL, 'Secconfigurations', 130, 133, 0),
(35, 34, '', NULL, 'configuration', 131, 132, 1),
(49, 1, '', NULL, 'Secprograms', 134, 151, 0),
(50, 49, '', NULL, 'add', 135, 136, 0),
(51, 49, '', NULL, 'listprograms', 137, 138, 0),
(52, 49, '', NULL, 'index', 139, 140, 0),
(53, 49, '', NULL, 'view', 141, 142, 0),
(54, 49, '', NULL, 'edit', 143, 144, 0),
(55, 49, '', NULL, 'delete', 145, 146, 0),
(56, 49, '', NULL, 'down', 147, 148, 0),
(57, 49, '', NULL, 'up', 149, 150, 0),
(77, 32, '', NULL, 'edit', 111, 112, 0),
(100, 30, '', NULL, 'add', 85, 86, 0),
(101, 30, '', NULL, 'edit', 87, 88, 0),
(102, 28, '', NULL, 'add', 73, 74, 0),
(103, 28, '', NULL, 'edit', 75, 76, 0),
(104, 26, '', NULL, 'add', 53, 54, 0),
(105, 26, '', NULL, 'edit', 55, 56, 0),
(106, 32, '', NULL, 'add', 113, 114, 0),
(107, 30, '', NULL, 'modificarpasswordusuario', 89, 90, 0),
(116, 30, '', NULL, 'delete', 91, 92, 0),
(117, 32, '', NULL, 'delete', 115, 116, 0),
(123, 32, '', NULL, 'view', 117, 118, 0),
(124, 26, '', NULL, 'delete', 57, 58, 0),
(125, 26, '', NULL, 'view', 59, 60, 0),
(126, 28, '', NULL, 'delete', 77, 78, 0),
(127, 28, '', NULL, 'view', 79, 80, 0),
(128, 30, '', NULL, 'view', 93, 94, 0),
(227, 26, '', NULL, 'asignarmarcas', 61, 62, 1),
(228, 26, '', NULL, 'asignar', 63, 64, 0),
(266, 30, '', NULL, 'asignar', 95, 96, 0),
(267, 32, '', NULL, 'indextecnicos', 119, 120, 1),
(291, 32, '', NULL, 'indexevaluacion', 121, 122, 1),
(328, 30, '', NULL, 'indexdocentes', 97, 98, 1),
(329, 30, '', NULL, 'adddocente', 99, 100, 0),
(330, 30, '', NULL, 'editdocente', 101, 102, 0),
(331, 32, '', NULL, 'indexdocentes', 123, 124, 1),
(332, 32, '', NULL, 'adddocente', 125, 126, 0),
(333, 32, '', NULL, 'editdocente', 127, 128, 0),
(410, 30, '', NULL, 'addintegranteco', 103, 104, 0),
(463, 26, '', NULL, 'indexobservaciones', 65, 66, 1),
(464, 26, '', NULL, 'oficiopdf', 67, 68, 0),
(471, 30, '', NULL, 'modifiedpassworduser', 105, 106, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbpeople`
--

DROP TABLE IF EXISTS `arbpeople`;
CREATE TABLE IF NOT EXISTS `arbpeople` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arbubigeo_id` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `names` varchar(89) NOT NULL,
  `first_surname` varchar(89) NOT NULL,
  `second_surname` varchar(89) NOT NULL,
  `status` char(2) CHARACTER SET utf8 NOT NULL DEFAULT 'AC',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  KEY `arbubigeo_id` (`arbubigeo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbpeople_arbrates`
--

DROP TABLE IF EXISTS `arbpeople_arbrates`;
CREATE TABLE IF NOT EXISTS `arbpeople_arbrates` (
  `arbperson_id` int(11) NOT NULL,
  `arbrate_id` int(11) NOT NULL,
  `arbitration_rate` decimal(5,2) NOT NULL,
  `payment_status` varchar(13) NOT NULL,
  `payment_date` date NOT NULL,
  `document` varchar(144) DEFAULT NULL,
  `status` char(2) NOT NULL DEFAULT 'AC',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`arbperson_id`,`arbrate_id`),
  KEY `arbrate_key` (`arbrate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbrates`
--

DROP TABLE IF EXISTS `arbrates`;
CREATE TABLE IF NOT EXISTS `arbrates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_cost` decimal(5,2) NOT NULL,
  `number_of_inhabitants` int(5) NOT NULL,
  `year_and_month` char(6) CHARACTER SET utf8 NOT NULL DEFAULT '201901',
  `monthly_rate` decimal(5,2) NOT NULL,
  `status` char(2) CHARACTER SET utf8 NOT NULL DEFAULT 'AC',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbubigeos`
--

DROP TABLE IF EXISTS `arbubigeos`;
CREATE TABLE IF NOT EXISTS `arbubigeos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(6) CHARACTER SET utf8 NOT NULL,
  `district` varchar(89) NOT NULL,
  `province` varchar(89) NOT NULL,
  `department` varchar(89) NOT NULL,
  `status` char(2) CHARACTER SET utf8 NOT NULL DEFAULT 'AC',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Secrole', 1, 'Administrador', 1, 4),
(2, 1, 'Secassign', 1, 'admin', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` int(11) NOT NULL DEFAULT '0',
  `_read` int(11) NOT NULL DEFAULT '0',
  `_update` int(11) NOT NULL DEFAULT '0',
  `_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `aro_id` (`aro_id`) USING BTREE,
  KEY `aco_id` (`aco_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 2, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secassigns`
--

DROP TABLE IF EXISTS `secassigns`;
CREATE TABLE IF NOT EXISTS `secassigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secperson_id` int(11) NOT NULL,
  `secproject_id` int(11) NOT NULL,
  `secrole_id` int(11) NOT NULL,
  `status` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT 'AC',
  `fixticio` varchar(100) DEFAULT '56f5fed3174896660bfebe23cc29070b930e30ca',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `secassigns_secproject_id_fkey` (`secproject_id`) USING BTREE,
  KEY `secassigns_secrole_id_fkey` (`secrole_id`) USING BTREE,
  KEY `secperson_id` (`secperson_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `secassigns`
--

INSERT INTO `secassigns` (`id`, `secperson_id`, `secproject_id`, `secrole_id`, `status`, `fixticio`) VALUES
(1, 1, 1, 1, 'AC', '56f5fed3174896660bfebe23cc29070b930e30ca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secconfigurations`
--

DROP TABLE IF EXISTS `secconfigurations`;
CREATE TABLE IF NOT EXISTS `secconfigurations` (
  `id` int(11) NOT NULL,
  `minpasswordlength` int(11) NOT NULL DEFAULT '0',
  `passwordtimelife` int(11) NOT NULL DEFAULT '0',
  `previouspasswordlimit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `secconfigurations`
--

INSERT INTO `secconfigurations` (`id`, `minpasswordlength`, `passwordtimelife`, `previouspasswordlimit`) VALUES
(1, 5, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secorganizations`
--

DROP TABLE IF EXISTS `secorganizations`;
CREATE TABLE IF NOT EXISTS `secorganizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) CHARACTER SET latin1 NOT NULL,
  `name` varchar(60) CHARACTER SET latin1 NOT NULL,
  `type` int(11) NOT NULL,
  `thema` varchar(20) CHARACTER SET latin1 NOT NULL,
  `photo1` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `photo2` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `text1` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `text2` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT 'AC',
  `address` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `phono` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `ruc` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `secorganizations`
--

INSERT INTO `secorganizations` (`id`, `code`, `name`, `type`, `thema`, `photo1`, `photo2`, `text1`, `text2`, `status`, `address`, `phono`, `ruc`) VALUES
(1, '', 'FACULTAD DE CIENCIAS ADMINISTRATIVAS', 1, '', 'logo.png', '', '', NULL, 'AC', 'Av. Universitaria', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secpasswords`
--

DROP TABLE IF EXISTS `secpasswords`;
CREATE TABLE IF NOT EXISTS `secpasswords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secperson_id` int(11) NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 NOT NULL,
  `creationdatetime` date DEFAULT NULL,
  `status` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `secpasswords_secperson_id_fkey` (`secperson_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `secpasswords`
--

INSERT INTO `secpasswords` (`id`, `secperson_id`, `password`, `creationdatetime`, `status`) VALUES
(1, 2, 'c59591856cccd38724577a61d87e080e354a731a', '2016-07-27', 'DE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secpeople`
--

DROP TABLE IF EXISTS `secpeople`;
CREATE TABLE IF NOT EXISTS `secpeople` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) CHARACTER SET latin1 NOT NULL,
  `appaterno` varchar(60) CHARACTER SET latin1 NOT NULL,
  `apmaterno` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `privelege` int(11) DEFAULT NULL,
  `username` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `language` varchar(20) CHARACTER SET latin1 NOT NULL,
  `status` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT 'AC',
  `creationdate` date DEFAULT NULL,
  `expirationdate` date DEFAULT NULL,
  `password` varchar(250) CHARACTER SET latin1 DEFAULT '202cb962ac59075b964b07152d234b70',
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `planificar` int(11) NOT NULL DEFAULT '1',
  `generated` tinyint(4) DEFAULT NULL,
  `secproject_id` int(11) DEFAULT NULL,
  `regimen` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `secpeople`
--

INSERT INTO `secpeople` (`id`, `firstname`, `appaterno`, `apmaterno`, `privelege`, `username`, `language`, `status`, `creationdate`, `expirationdate`, `password`, `email`, `planificar`, `generated`, `secproject_id`, `regimen`) VALUES
(1, 'admin', 'admin', 'admin', 1, 'admin', 'spa', 'AC', NULL, NULL, '52640890442556b8b157153eb26cfce0564422aa', 'aduran@chiusac.com', 0, 0, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secprograms`
--

DROP TABLE IF EXISTS `secprograms`;
CREATE TABLE IF NOT EXISTS `secprograms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `etiqueta` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `aro_id` (`aro_id`) USING BTREE,
  KEY `aco_id` (`aco_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `secprograms`
--

INSERT INTO `secprograms` (`id`, `aro_id`, `aco_id`, `parent_id`, `lft`, `rght`, `etiqueta`) VALUES
(1, 1, NULL, NULL, 1, 4, 'Acciones'),
(2, 1, NULL, NULL, 5, 18, 'Seguridad'),
(3, 1, NULL, NULL, 19, 22, 'Gestion de Menus y Permisos'),
(4, 1, 7, 7, 2, 3, 'Lista de Acciones'),
(6, 1, 6, 6, 20, 21, 'Menus y Permisos'),
(39, 1, 9, 2, 6, 7, 'Organizaciones'),
(40, 1, 27, 2, 8, 9, 'Sucursales'),
(41, 1, 31, 2, 10, 11, 'Personas'),
(42, 1, 29, 2, 12, 13, 'Roles'),
(43, 1, 33, 2, 14, 15, 'Asignaciones'),
(44, 1, 35, 2, 16, 17, 'ConfiguraciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secprojects`
--

DROP TABLE IF EXISTS `secprojects`;
CREATE TABLE IF NOT EXISTS `secprojects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secorganization_id` int(11) NOT NULL,
  `code` varchar(5) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `photo1` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `photo2` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `text1` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `text2` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT 'AC',
  `address` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `phono` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `secprojects_secorganization_id_fkey` (`secorganization_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `secprojects`
--

INSERT INTO `secprojects` (`id`, `secorganization_id`, `code`, `name`, `photo1`, `photo2`, `text1`, `text2`, `status`, `address`, `phono`) VALUES
(1, 1, 'P035', ' ESCUELA PROFESIONAL DE CIENCIAS ADMINISTRATIVAS', '', '', '', '', 'AC', 'Jr cayhuaynita', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secroles`
--

DROP TABLE IF EXISTS `secroles`;
CREATE TABLE IF NOT EXISTS `secroles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secorganization_id` int(11) NOT NULL,
  `code` varchar(5) CHARACTER SET latin1 NOT NULL,
  `name` varchar(60) CHARACTER SET latin1 NOT NULL,
  `status` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `secroles_secorganization_id_fkey` (`secorganization_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `secroles`
--

INSERT INTO `secroles` (`id`, `secorganization_id`, `code`, `name`, `status`) VALUES
(1, 1, 'admin', 'Administrador', 'AC');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD CONSTRAINT `aros_acos_ibfk_1` FOREIGN KEY (`aro_id`) REFERENCES `aros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `aros_acos_ibfk_2` FOREIGN KEY (`aco_id`) REFERENCES `acos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
