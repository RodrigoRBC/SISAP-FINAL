/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100135
 Source Host           : localhost:3306
 Source Schema         : seguridad210

 Target Server Type    : MySQL
 Target Server Version : 100135
 File Encoding         : 65001

 Date: 12/03/2019 11:56:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for acos
-- ----------------------------
DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL,
  `model` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `foreign_key` int(11) NULL DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `lft` int(11) NULL DEFAULT NULL,
  `rght` int(11) NULL DEFAULT NULL,
  `paramenu` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 472 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of acos
-- ----------------------------
INSERT INTO `acos` VALUES (1, NULL, '', NULL, 'controllers', 1, 152, 0);
INSERT INTO `acos` VALUES (2, 1, '', NULL, 'Secorganizations', 2, 23, 0);
INSERT INTO `acos` VALUES (3, 1, '', NULL, 'Secaccesses', 24, 39, 0);
INSERT INTO `acos` VALUES (4, 1, '', NULL, 'Acos', 40, 49, 0);
INSERT INTO `acos` VALUES (5, 2, '', NULL, 'menuseguridad', 3, 4, 1);
INSERT INTO `acos` VALUES (6, 3, '', NULL, 'listaccess', 25, 26, 1);
INSERT INTO `acos` VALUES (7, 4, '', NULL, 'index', 41, 42, 1);
INSERT INTO `acos` VALUES (8, 4, '', NULL, 'editar', 43, 44, 0);
INSERT INTO `acos` VALUES (9, 2, '', NULL, 'index', 5, 6, 1);
INSERT INTO `acos` VALUES (10, 2, '', NULL, 'edit', 7, 8, 0);
INSERT INTO `acos` VALUES (11, 2, '', NULL, 'view', 9, 10, 0);
INSERT INTO `acos` VALUES (12, 2, '', NULL, 'add', 11, 12, 0);
INSERT INTO `acos` VALUES (13, 2, '', NULL, 'logisticaindex', 13, 14, 0);
INSERT INTO `acos` VALUES (14, 2, '', NULL, 'logisticaedit', 15, 16, 0);
INSERT INTO `acos` VALUES (15, 2, '', NULL, 'delete', 17, 18, 0);
INSERT INTO `acos` VALUES (16, 2, '', NULL, 'mostrarroles', 19, 20, 0);
INSERT INTO `acos` VALUES (17, 2, '', NULL, 'mostrarsucursales', 21, 22, 0);
INSERT INTO `acos` VALUES (18, 4, '', NULL, 'agregar', 45, 46, 0);
INSERT INTO `acos` VALUES (19, 4, '', NULL, 'eliminar', 47, 48, 0);
INSERT INTO `acos` VALUES (20, 3, '', NULL, 'permiso', 27, 28, 0);
INSERT INTO `acos` VALUES (21, 3, '', NULL, 'listapermisos', 29, 30, 0);
INSERT INTO `acos` VALUES (22, 3, '', NULL, 'accederpermiso', 31, 32, 0);
INSERT INTO `acos` VALUES (23, 3, '', NULL, 'permitir', 33, 34, 0);
INSERT INTO `acos` VALUES (24, 3, '', NULL, 'denegarpermiso', 35, 36, 0);
INSERT INTO `acos` VALUES (25, 3, '', NULL, 'cancelar', 37, 38, 0);
INSERT INTO `acos` VALUES (26, 1, '', NULL, 'Secprojects', 50, 69, 0);
INSERT INTO `acos` VALUES (27, 26, '', NULL, 'index', 51, 52, 1);
INSERT INTO `acos` VALUES (28, 1, '', NULL, 'Secroles', 70, 81, 0);
INSERT INTO `acos` VALUES (29, 28, '', NULL, 'index', 71, 72, 1);
INSERT INTO `acos` VALUES (30, 1, '', NULL, 'Secpeople', 82, 107, 0);
INSERT INTO `acos` VALUES (31, 30, '', NULL, 'index', 83, 84, 1);
INSERT INTO `acos` VALUES (32, 1, '', NULL, 'Secassigns', 108, 129, 0);
INSERT INTO `acos` VALUES (33, 32, '', NULL, 'index', 109, 110, 1);
INSERT INTO `acos` VALUES (34, 1, '', NULL, 'Secconfigurations', 130, 133, 0);
INSERT INTO `acos` VALUES (35, 34, '', NULL, 'configuration', 131, 132, 1);
INSERT INTO `acos` VALUES (49, 1, '', NULL, 'Secprograms', 134, 151, 0);
INSERT INTO `acos` VALUES (50, 49, '', NULL, 'add', 135, 136, 0);
INSERT INTO `acos` VALUES (51, 49, '', NULL, 'listprograms', 137, 138, 0);
INSERT INTO `acos` VALUES (52, 49, '', NULL, 'index', 139, 140, 0);
INSERT INTO `acos` VALUES (53, 49, '', NULL, 'view', 141, 142, 0);
INSERT INTO `acos` VALUES (54, 49, '', NULL, 'edit', 143, 144, 0);
INSERT INTO `acos` VALUES (55, 49, '', NULL, 'delete', 145, 146, 0);
INSERT INTO `acos` VALUES (56, 49, '', NULL, 'down', 147, 148, 0);
INSERT INTO `acos` VALUES (57, 49, '', NULL, 'up', 149, 150, 0);
INSERT INTO `acos` VALUES (77, 32, '', NULL, 'edit', 111, 112, 0);
INSERT INTO `acos` VALUES (100, 30, '', NULL, 'add', 85, 86, 0);
INSERT INTO `acos` VALUES (101, 30, '', NULL, 'edit', 87, 88, 0);
INSERT INTO `acos` VALUES (102, 28, '', NULL, 'add', 73, 74, 0);
INSERT INTO `acos` VALUES (103, 28, '', NULL, 'edit', 75, 76, 0);
INSERT INTO `acos` VALUES (104, 26, '', NULL, 'add', 53, 54, 0);
INSERT INTO `acos` VALUES (105, 26, '', NULL, 'edit', 55, 56, 0);
INSERT INTO `acos` VALUES (106, 32, '', NULL, 'add', 113, 114, 0);
INSERT INTO `acos` VALUES (107, 30, '', NULL, 'modificarpasswordusuario', 89, 90, 0);
INSERT INTO `acos` VALUES (116, 30, '', NULL, 'delete', 91, 92, 0);
INSERT INTO `acos` VALUES (117, 32, '', NULL, 'delete', 115, 116, 0);
INSERT INTO `acos` VALUES (123, 32, '', NULL, 'view', 117, 118, 0);
INSERT INTO `acos` VALUES (124, 26, '', NULL, 'delete', 57, 58, 0);
INSERT INTO `acos` VALUES (125, 26, '', NULL, 'view', 59, 60, 0);
INSERT INTO `acos` VALUES (126, 28, '', NULL, 'delete', 77, 78, 0);
INSERT INTO `acos` VALUES (127, 28, '', NULL, 'view', 79, 80, 0);
INSERT INTO `acos` VALUES (128, 30, '', NULL, 'view', 93, 94, 0);
INSERT INTO `acos` VALUES (227, 26, '', NULL, 'asignarmarcas', 61, 62, 1);
INSERT INTO `acos` VALUES (228, 26, '', NULL, 'asignar', 63, 64, 0);
INSERT INTO `acos` VALUES (266, 30, '', NULL, 'asignar', 95, 96, 0);
INSERT INTO `acos` VALUES (267, 32, '', NULL, 'indextecnicos', 119, 120, 1);
INSERT INTO `acos` VALUES (291, 32, '', NULL, 'indexevaluacion', 121, 122, 1);
INSERT INTO `acos` VALUES (328, 30, '', NULL, 'indexdocentes', 97, 98, 1);
INSERT INTO `acos` VALUES (329, 30, '', NULL, 'adddocente', 99, 100, 0);
INSERT INTO `acos` VALUES (330, 30, '', NULL, 'editdocente', 101, 102, 0);
INSERT INTO `acos` VALUES (331, 32, '', NULL, 'indexdocentes', 123, 124, 1);
INSERT INTO `acos` VALUES (332, 32, '', NULL, 'adddocente', 125, 126, 0);
INSERT INTO `acos` VALUES (333, 32, '', NULL, 'editdocente', 127, 128, 0);
INSERT INTO `acos` VALUES (410, 30, '', NULL, 'addintegranteco', 103, 104, 0);
INSERT INTO `acos` VALUES (463, 26, '', NULL, 'indexobservaciones', 65, 66, 1);
INSERT INTO `acos` VALUES (464, 26, '', NULL, 'oficiopdf', 67, 68, 0);
INSERT INTO `acos` VALUES (471, 30, '', NULL, 'modifiedpassworduser', 105, 106, 0);

-- ----------------------------
-- Table structure for aros
-- ----------------------------
DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL,
  `model` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `foreign_key` int(11) NULL DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `lft` int(11) NULL DEFAULT NULL,
  `rght` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of aros
-- ----------------------------
INSERT INTO `aros` VALUES (1, NULL, 'Secrole', 1, 'Administrador', 1, 4);
INSERT INTO `aros` VALUES (2, 1, 'Secassign', 1, 'admin', 2, 3);

-- ----------------------------
-- Table structure for aros_acos
-- ----------------------------
DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` int(11) NOT NULL DEFAULT 0,
  `_read` int(11) NOT NULL DEFAULT 0,
  `_update` int(11) NOT NULL DEFAULT 0,
  `_delete` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `aro_id`(`aro_id`) USING BTREE,
  INDEX `aco_id`(`aco_id`) USING BTREE,
  CONSTRAINT `aros_acos_ibfk_1` FOREIGN KEY (`aro_id`) REFERENCES `aros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `aros_acos_ibfk_2` FOREIGN KEY (`aco_id`) REFERENCES `acos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of aros_acos
-- ----------------------------
INSERT INTO `aros_acos` VALUES (1, 2, 1, 1, 1, 1, 1);

-- ----------------------------
-- Table structure for secassigns
-- ----------------------------
DROP TABLE IF EXISTS `secassigns`;
CREATE TABLE `secassigns`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secperson_id` int(11) NOT NULL,
  `secproject_id` int(11) NOT NULL,
  `secrole_id` int(11) NOT NULL,
  `status` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'AC',
  `fixticio` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '56f5fed3174896660bfebe23cc29070b930e30ca',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `secassigns_secproject_id_fkey`(`secproject_id`) USING BTREE,
  INDEX `secassigns_secrole_id_fkey`(`secrole_id`) USING BTREE,
  INDEX `secperson_id`(`secperson_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of secassigns
-- ----------------------------
INSERT INTO `secassigns` VALUES (1, 1, 1, 1, 'AC', '56f5fed3174896660bfebe23cc29070b930e30ca');

-- ----------------------------
-- Table structure for secconfigurations
-- ----------------------------
DROP TABLE IF EXISTS `secconfigurations`;
CREATE TABLE `secconfigurations`  (
  `id` int(11) NOT NULL,
  `minpasswordlength` int(11) NOT NULL DEFAULT 0,
  `passwordtimelife` int(11) NOT NULL DEFAULT 0,
  `previouspasswordlimit` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of secconfigurations
-- ----------------------------
INSERT INTO `secconfigurations` VALUES (1, 5, 5, 1);

-- ----------------------------
-- Table structure for secorganizations
-- ----------------------------
DROP TABLE IF EXISTS `secorganizations`;
CREATE TABLE `secorganizations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `thema` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `photo1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `photo2` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `text1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `text2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'AC',
  `address` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phono` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ruc` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of secorganizations
-- ----------------------------
INSERT INTO `secorganizations` VALUES (1, '', 'FACULTAD DE CIENCIAS ADMINISTRATIVAS', 1, '', 'logo.png', '', '', NULL, 'AC', 'Av. Universitaria', '', NULL);

-- ----------------------------
-- Table structure for secpasswords
-- ----------------------------
DROP TABLE IF EXISTS `secpasswords`;
CREATE TABLE `secpasswords`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secperson_id` int(11) NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creationdatetime` date NULL DEFAULT NULL,
  `status` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `secpasswords_secperson_id_fkey`(`secperson_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of secpasswords
-- ----------------------------
INSERT INTO `secpasswords` VALUES (1, 2, 'c59591856cccd38724577a61d87e080e354a731a', '2016-07-27', 'DE');

-- ----------------------------
-- Table structure for secpeople
-- ----------------------------
DROP TABLE IF EXISTS `secpeople`;
CREATE TABLE `secpeople`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `appaterno` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apmaterno` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `privelege` int(11) NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `language` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'AC',
  `creationdate` date NULL DEFAULT NULL,
  `expirationdate` date NULL DEFAULT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '202cb962ac59075b964b07152d234b70',
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `planificar` int(11) NOT NULL DEFAULT 1,
  `generated` tinyint(4) NULL DEFAULT NULL,
  `secproject_id` int(11) NULL DEFAULT NULL,
  `regimen` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of secpeople
-- ----------------------------
INSERT INTO `secpeople` VALUES (1, 'admin', 'admin', 'admin', 1, 'admin', 'spa', 'AC', NULL, NULL, '52640890442556b8b157153eb26cfce0564422aa', 'aduran@chiusac.com', 0, 0, NULL, '');

-- ----------------------------
-- Table structure for secprograms
-- ----------------------------
DROP TABLE IF EXISTS `secprograms`;
CREATE TABLE `secprograms`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `lft` int(11) NULL DEFAULT NULL,
  `rght` int(11) NULL DEFAULT NULL,
  `etiqueta` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `aro_id`(`aro_id`) USING BTREE,
  INDEX `aco_id`(`aco_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of secprograms
-- ----------------------------
INSERT INTO `secprograms` VALUES (1, 1, NULL, NULL, 1, 4, 'Acciones');
INSERT INTO `secprograms` VALUES (2, 1, NULL, NULL, 5, 18, 'Seguridad');
INSERT INTO `secprograms` VALUES (3, 1, NULL, NULL, 19, 22, 'Gestion de Menus y Permisos');
INSERT INTO `secprograms` VALUES (4, 1, 7, 7, 2, 3, 'Lista de Acciones');
INSERT INTO `secprograms` VALUES (6, 1, 6, 6, 20, 21, 'Menus y Permisos');
INSERT INTO `secprograms` VALUES (39, 1, 9, 2, 6, 7, 'Organizaciones');
INSERT INTO `secprograms` VALUES (40, 1, 27, 2, 8, 9, 'Sucursales');
INSERT INTO `secprograms` VALUES (41, 1, 31, 2, 10, 11, 'Personas');
INSERT INTO `secprograms` VALUES (42, 1, 29, 2, 12, 13, 'Roles');
INSERT INTO `secprograms` VALUES (43, 1, 33, 2, 14, 15, 'Asignaciones');
INSERT INTO `secprograms` VALUES (44, 1, 35, 2, 16, 17, 'Configuración');

-- ----------------------------
-- Table structure for secprojects
-- ----------------------------
DROP TABLE IF EXISTS `secprojects`;
CREATE TABLE `secprojects`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secorganization_id` int(11) NOT NULL,
  `code` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `photo1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `photo2` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `text1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `text2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'AC',
  `address` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phono` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `secprojects_secorganization_id_fkey`(`secorganization_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of secprojects
-- ----------------------------
INSERT INTO `secprojects` VALUES (1, 1, 'P035', ' ESCUELA PROFESIONAL DE CIENCIAS ADMINISTRATIVAS', '', '', '', '', 'AC', 'Jr cayhuaynita', NULL);

-- ----------------------------
-- Table structure for secroles
-- ----------------------------
DROP TABLE IF EXISTS `secroles`;
CREATE TABLE `secroles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secorganization_id` int(11) NOT NULL,
  `code` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `secroles_secorganization_id_fkey`(`secorganization_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of secroles
-- ----------------------------
INSERT INTO `secroles` VALUES (1, 1, 'admin', 'Administrador', 'AC');

SET FOREIGN_KEY_CHECKS = 1;
