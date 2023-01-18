-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 03:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `control_vehicular_31`
--

-- --------------------------------------------------------

--
-- Table structure for table `conductores`
--

CREATE TABLE `conductores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(20) NOT NULL,
  `apellido_materno` varchar(20) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `firma` varchar(100) NOT NULL,
  `num_emergencia` varchar(10) NOT NULL,
  `donador` varchar(5) NOT NULL,
  `antiguedad` date DEFAULT NULL,
  `grupo_sanguineo` varchar(5) DEFAULT NULL,
  `restricciones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conductores`
--

INSERT INTO `conductores` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `domicilio`, `fecha_nacimiento`, `sexo`, `firma`, `num_emergencia`, `donador`, `antiguedad`, `grupo_sanguineo`, `restricciones`) VALUES
(0, 'Jesus', 'García', 'Santiago', 'Queretaro', '2001-08-24', 'h', '/var/stuff.png', '44268754', 'on', '2021-09-21', 'A+', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL,
  `tries` smallint(6) DEFAULT 0,
  `blocked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`username`, `password`, `role`, `status`, `tries`, `blocked`) VALUES
('ana', 'a1234', 'user', 1, 0, 0),
('juan', 'j1234', 'admin', 1, 0, 0),
('oscar', 'o1234', 'admin', 0, 0, 0),
('rosa', 'r1234', 'user', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `licencias`
--

CREATE TABLE `licencias` (
  `id` varchar(10) NOT NULL,
  `tipo` char(1) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `atributo_desconocido` varchar(10) NOT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  `id_conductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `licencias`
--

INSERT INTO `licencias` (`id`, `tipo`, `fecha_expedicion`, `fecha_vencimiento`, `atributo_desconocido`, `observacion`, `id_conductor`) VALUES
('B889789456', 'A', '2021-09-21', '2026-09-21', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `multas`
--

CREATE TABLE `multas` (
  `id` varchar(20) NOT NULL,
  `dia` tinyint(4) NOT NULL,
  `mes` tinyint(4) NOT NULL,
  `anio` tinyint(4) NOT NULL,
  `hora` time NOT NULL,
  `reporte_seccion` varchar(30) NOT NULL,
  `nombre_via` varchar(50) NOT NULL,
  `kilometro` int(11) NOT NULL,
  `direccion_sentido` varchar(10) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `referencia_lugar` varchar(50) NOT NULL,
  `articulo_fundamento` varchar(10) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `garantia_retenida` varchar(30) NOT NULL,
  `convenio` varchar(2) NOT NULL,
  `puesto_a_disposicion` varchar(2) NOT NULL,
  `calificacion_boleta` varchar(100) DEFAULT NULL,
  `deposito_oficial` varchar(50) DEFAULT NULL,
  `observaciones_personal_operativo` varchar(100) DEFAULT NULL,
  `observaciones_conductor` varchar(100) DEFAULT NULL,
  `numero_parte_accidente` int(11) DEFAULT NULL,
  `id_personal_operativo` int(11) NOT NULL,
  `id_tarjeta_circulacion` int(11) DEFAULT NULL,
  `id_licencia` varchar(10) DEFAULT NULL,
  `id_vehiculo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oficiales`
--

CREATE TABLE `oficiales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `firma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oficiales`
--

INSERT INTO `oficiales` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `grupo`, `firma`) VALUES
(1, 'Walter', 'R', 'White', '12588F9', '/var/files/randomstuff/firmas/wwhite.png'),
(2, 'AAA', 'Perez', 'JHSHSH', 'SROUOSJGT', 'SU(RUGTOAERJ'),
(3, 'Prueba', '123456', '654321', '987654', '987321'),
(4, 'Prueba', '5', '6', '9', '8'),
(5, 'Prueba', '1', '2', '3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `propietarios`
--

CREATE TABLE `propietarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `rfc` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propietarios`
--

INSERT INTO `propietarios` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `localidad`, `municipio`, `rfc`) VALUES
(1, 'Alejando', 'Portilla', 'Tapia', 'Jurica', 'Queretaro', 'AWFWA89498198');

-- --------------------------------------------------------

--
-- Table structure for table `tarjetas_circulacion`
--

CREATE TABLE `tarjetas_circulacion` (
  `id` int(11) NOT NULL,
  `tipo_servicio` varchar(20) NOT NULL,
  `numero_constancia_inscripcion` int(11) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `origen` varchar(15) NOT NULL,
  `folio` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `placa` varchar(10) NOT NULL,
  `cve_vehicular` int(11) NOT NULL,
  `uso` varchar(50) NOT NULL,
  `operacion` varchar(15) NOT NULL,
  `fecha_operacion` date NOT NULL,
  `oficina_expendidora` int(11) NOT NULL,
  `movimiento` varchar(20) NOT NULL,
  `rfa` int(11) DEFAULT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarjetas_circulacion`
--

INSERT INTO `tarjetas_circulacion` (`id`, `tipo_servicio`, `numero_constancia_inscripcion`, `servicio`, `origen`, `folio`, `fecha_vencimiento`, `placa`, `cve_vehicular`, `uso`, `operacion`, `fecha_operacion`, `oficina_expendidora`, `movimiento`, `rfa`, `id_vehiculo`, `id_propietario`) VALUES
(4, 'Particular', 2147483647, '', 'Queretaro', 2147483647, '2027-02-15', 'MXE987AF', 2147483647, 'Particular', 'Renovación', '2022-02-15', 98763663, 'Renovación', 2147483647, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `niv` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `numero_serie` varchar(30) NOT NULL,
  `clase` varchar(30) NOT NULL,
  `tipo_combustible` varchar(30) DEFAULT NULL,
  `numero_cilindros` varchar(30) DEFAULT NULL,
  `caballos_fuerza` int(11) NOT NULL,
  `tipo_carroceria` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `transmision` varchar(30) NOT NULL,
  `serie_motor` int(11) NOT NULL,
  `capacidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `niv`, `tipo`, `marca`, `modelo`, `numero_serie`, `clase`, `tipo_combustible`, `numero_cilindros`, `caballos_fuerza`, `tipo_carroceria`, `color`, `transmision`, `serie_motor`, `capacidad`) VALUES
(1, 2147483647, 'Sedán', 'Honda', 'Corolla', '8978awad565', 'Particular', 'Gasolina', '4', 350, '?', 'Rojo', 'Automática', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `verificaciones`
--

CREATE TABLE `verificaciones` (
  `id` int(11) NOT NULL,
  `entidad_federativa` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `numero_centro_verificacion` int(11) NOT NULL,
  `numero_linea_verificacion` tinyint(4) NOT NULL,
  `id_tecnico_verificador` int(11) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `motivo_verificacion` varchar(100) NOT NULL,
  `folio_certificacion` varchar(10) DEFAULT NULL,
  `semestre` tinyint(4) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `id_tarjeta_circulacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verificaciones`
--

INSERT INTO `verificaciones` (`id`, `entidad_federativa`, `municipio`, `numero_centro_verificacion`, `numero_linea_verificacion`, `id_tecnico_verificador`, `fecha_expedicion`, `hora_entrada`, `hora_salida`, `motivo_verificacion`, `folio_certificacion`, `semestre`, `fecha_vencimiento`, `id_tarjeta_circulacion`) VALUES
(1, 'Queretaro', 'Queretaro', 21, 1, 3, '2022-10-24', '11:47:00', '00:23:00', 'Vencimiento', 'V78488AB89', 2, '2023-05-24', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_licencias_conductores_1` (`id_conductor`);

--
-- Indexes for table `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_multas_vehiculos_1` (`id_vehiculo`),
  ADD KEY `fk_multas_licencias_1` (`id_licencia`),
  ADD KEY `fk_multas_tarjetas_circulacion_1` (`id_tarjeta_circulacion`),
  ADD KEY `fk_multas_oficiales_1` (`id_personal_operativo`);

--
-- Indexes for table `oficiales`
--
ALTER TABLE `oficiales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarjetas_circulacion`
--
ALTER TABLE `tarjetas_circulacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tarjetas_circulacion_propietarios_1` (`id_propietario`),
  ADD KEY `fk_tarjetas_circulacion_vehiculos_1` (`id_vehiculo`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_verificaciones_tarjetas_circulacion_1` (`id_tarjeta_circulacion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oficiales`
--
ALTER TABLE `oficiales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tarjetas_circulacion`
--
ALTER TABLE `tarjetas_circulacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verificaciones`
--
ALTER TABLE `verificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `fk_licencias_conductores_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductores` (`id`);

--
-- Constraints for table `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `fk_multas_licencias_1` FOREIGN KEY (`id_licencia`) REFERENCES `licencias` (`id`),
  ADD CONSTRAINT `fk_multas_oficiales_1` FOREIGN KEY (`id_personal_operativo`) REFERENCES `oficiales` (`id`),
  ADD CONSTRAINT `fk_multas_tarjetas_circulacion_1` FOREIGN KEY (`id_tarjeta_circulacion`) REFERENCES `tarjetas_circulacion` (`id`),
  ADD CONSTRAINT `fk_multas_vehiculos_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`);

--
-- Constraints for table `tarjetas_circulacion`
--
ALTER TABLE `tarjetas_circulacion`
  ADD CONSTRAINT `fk_tarjetas_circulacion_propietarios_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id`),
  ADD CONSTRAINT `fk_tarjetas_circulacion_vehiculos_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`);

--
-- Constraints for table `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD CONSTRAINT `fk_verificaciones_tarjetas_circulacion_1` FOREIGN KEY (`id_tarjeta_circulacion`) REFERENCES `tarjetas_circulacion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
