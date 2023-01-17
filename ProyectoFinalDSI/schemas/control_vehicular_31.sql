/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100424 (10.4.24-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : control_vehicular_31

 Target Server Type    : MySQL
 Target Server Version : 100424 (10.4.24-MariaDB)
 File Encoding         : 65001

 Date: 11/01/2023 12:45:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for conductores
-- ----------------------------
DROP TABLE IF EXISTS `conductores`;
CREATE TABLE `conductores`  (
  `id` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_paterno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_materno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `domicilio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firma` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num_emergencia` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `donador` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `antiguedad` date NULL DEFAULT NULL,
  `grupo_sanguineo` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `restricciones` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of conductores
-- ----------------------------
INSERT INTO `conductores` VALUES (0, 'Jesus', 'García', 'Santiago', 'Queretaro', '2001-08-24', 'h', '/var/stuff.png', '44268754', 'on', '2021-09-21', 'A+', NULL);

-- ----------------------------
-- Table structure for cuentas
-- ----------------------------
DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas`  (
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL,
  `tries` smallint NULL DEFAULT 0,
  `blocked` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cuentas
-- ----------------------------
INSERT INTO `cuentas` VALUES ('ana', 'a1234', 'user', 1, 0, 0);
INSERT INTO `cuentas` VALUES ('juan', 'j1234', 'admin', 1, 0, 0);
INSERT INTO `cuentas` VALUES ('oscar', 'o1234', 'admin', 0, 0, 0);
INSERT INTO `cuentas` VALUES ('rosa', 'r1234', 'user', 1, 0, 1);

-- ----------------------------
-- Table structure for licencias
-- ----------------------------
DROP TABLE IF EXISTS `licencias`;
CREATE TABLE `licencias`  (
  `id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `atributo_desconocido` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `observacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_conductor` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_licencias_conductores_1`(`id_conductor` ASC) USING BTREE,
  CONSTRAINT `fk_licencias_conductores_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductores` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of licencias
-- ----------------------------
INSERT INTO `licencias` VALUES ('B889789456', 'A', '2021-09-21', '2026-09-21', '', NULL, 0);

-- ----------------------------
-- Table structure for multas
-- ----------------------------
DROP TABLE IF EXISTS `multas`;
CREATE TABLE `multas`  (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dia` tinyint NOT NULL,
  `mes` tinyint NOT NULL,
  `anio` tinyint NOT NULL,
  `hora` time NOT NULL,
  `reporte_seccion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_via` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kilometro` int NOT NULL,
  `direccion_sentido` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `municipio` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `referencia_lugar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `articulo_fundamento` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `motivo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `garantia_retenida` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `convenio` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `puesto_a_disposicion` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `calificacion_boleta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deposito_oficial` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `observaciones_personal_operativo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `observaciones_conductor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `numero_parte_accidente` int NULL DEFAULT NULL,
  `id_personal_operativo` int NOT NULL,
  `id_tarjeta_circulacion` int NULL DEFAULT NULL,
  `id_licencia` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_vehiculo` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_multas_vehiculos_1`(`id_vehiculo` ASC) USING BTREE,
  INDEX `fk_multas_licencias_1`(`id_licencia` ASC) USING BTREE,
  INDEX `fk_multas_tarjetas_circulacion_1`(`id_tarjeta_circulacion` ASC) USING BTREE,
  INDEX `fk_multas_oficiales_1`(`id_personal_operativo` ASC) USING BTREE,
  CONSTRAINT `fk_multas_licencias_1` FOREIGN KEY (`id_licencia`) REFERENCES `licencias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_multas_oficiales_1` FOREIGN KEY (`id_personal_operativo`) REFERENCES `oficiales` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_multas_tarjetas_circulacion_1` FOREIGN KEY (`id_tarjeta_circulacion`) REFERENCES `tarjetas_circulacion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_multas_vehiculos_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of multas
-- ----------------------------

-- ----------------------------
-- Table structure for oficiales
-- ----------------------------
DROP TABLE IF EXISTS `oficiales`;
CREATE TABLE `oficiales`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_paterno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_materno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `grupo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firma` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oficiales
-- ----------------------------
INSERT INTO `oficiales` VALUES (1, 'Walter', 'R', 'White', '12588F9', '/var/files/randomstuff/firmas/wwhite.png');
INSERT INTO `oficiales` VALUES (2, 'AAA', 'Perez', 'JHSHSH', 'SROUOSJGT', 'SU(RUGTOAERJ');
INSERT INTO `oficiales` VALUES (3, 'Prueba', '123456', '654321', '987654', '987321');
INSERT INTO `oficiales` VALUES (4, 'Prueba', '5', '6', '9', '8');
INSERT INTO `oficiales` VALUES (5, 'Prueba', '1', '2', '3', '4');

-- ----------------------------
-- Table structure for propietarios
-- ----------------------------
DROP TABLE IF EXISTS `propietarios`;
CREATE TABLE `propietarios`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_paterno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_materno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `localidad` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `municipio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rfc` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of propietarios
-- ----------------------------
INSERT INTO `propietarios` VALUES (1, 'Alejando', 'Portilla', 'Tapia', 'Jurica', 'Queretaro', 'AWFWA89498198');

-- ----------------------------
-- Table structure for tarjetas_circulacion
-- ----------------------------
DROP TABLE IF EXISTS `tarjetas_circulacion`;
CREATE TABLE `tarjetas_circulacion`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_servicio` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero_constancia_inscripcion` int NOT NULL,
  `servicio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `origen` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `folio` int NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `placa` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cve_vehicular` int NOT NULL,
  `uso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `operacion` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_operacion` date NOT NULL,
  `oficina_expendidora` int NOT NULL,
  `movimiento` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rfa` int NULL DEFAULT NULL,
  `id_vehiculo` int NOT NULL,
  `id_propietario` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tarjetas_circulacion_propietarios_1`(`id_propietario` ASC) USING BTREE,
  INDEX `fk_tarjetas_circulacion_vehiculos_1`(`id_vehiculo` ASC) USING BTREE,
  CONSTRAINT `fk_tarjetas_circulacion_propietarios_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tarjetas_circulacion_vehiculos_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tarjetas_circulacion
-- ----------------------------
INSERT INTO `tarjetas_circulacion` VALUES (4, 'Particular', 2147483647, '', 'Queretaro', 2147483647, '2027-02-15', 'MXE987AF', 2147483647, 'Particular', 'Renovación', '2022-02-15', 98763663, 'Renovación', 2147483647, 1, 1);

-- ----------------------------
-- Table structure for vehiculos
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE `vehiculos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `niv` int NOT NULL,
  `tipo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `marca` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modelo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero_serie` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clase` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_combustible` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `numero_cilindros` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `caballos_fuerza` int NOT NULL,
  `tipo_carroceria` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transmision` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `serie_motor` int NOT NULL,
  `capacidad` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vehiculos
-- ----------------------------
INSERT INTO `vehiculos` VALUES (1, 2147483647, 'Sedán', 'Honda', 'Corolla', '8978awad565', 'Particular', 'Gasolina', '4', 350, '?', 'Rojo', 'Automática', 2147483647, '');

-- ----------------------------
-- Table structure for verificaciones
-- ----------------------------
DROP TABLE IF EXISTS `verificaciones`;
CREATE TABLE `verificaciones`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `entidad_federativa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `municipio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `numero_centro_verificacion` int NOT NULL,
  `numero_linea_verificacion` tinyint NOT NULL,
  `id_tecnico_verificador` int NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `motivo_verificacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `folio_certificacion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `semestre` tinyint NULL DEFAULT NULL,
  `fecha_vencimiento` date NULL DEFAULT NULL,
  `id_tarjeta_circulacion` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_verificaciones_tarjetas_circulacion_1`(`id_tarjeta_circulacion` ASC) USING BTREE,
  CONSTRAINT `fk_verificaciones_tarjetas_circulacion_1` FOREIGN KEY (`id_tarjeta_circulacion`) REFERENCES `tarjetas_circulacion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of verificaciones
-- ----------------------------
INSERT INTO `verificaciones` VALUES (1, 'Queretaro', 'Queretaro', 21, 1, 3, '2022-10-24', '11:47:00', '00:23:00', 'Vencimiento', 'V78488AB89', 2, '2023-05-24', 4);

SET FOREIGN_KEY_CHECKS = 1;
