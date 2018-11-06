-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.14 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para binventario
DROP DATABASE IF EXISTS `binventario`;
CREATE DATABASE IF NOT EXISTS `binventario` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `binventario`;

-- Volcando estructura para tabla binventario.especialidades
DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE IF NOT EXISTS `especialidades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `status` varchar(40) NOT NULL,
  `agregado` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla binventario.especialidades: ~3 rows (aproximadamente)
DELETE FROM `especialidades`;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` (`codigo`, `name`, `status`, `agregado`) VALUES
	(1, 'Pediatria', '1', 2),
	(2, 'Cardiologia', '1', 13),
	(3, 'Oncologia', '5', 12);
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;

-- Volcando estructura para tabla binventario.medicamentos
DROP TABLE IF EXISTS `medicamentos`;
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `codigo` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_compra` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `created_user` (`created_user`),
  KEY `updated_user` (`updated_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla binventario.medicamentos: ~4 rows (aproximadamente)
DELETE FROM `medicamentos`;
/*!40000 ALTER TABLE `medicamentos` DISABLE KEYS */;
INSERT INTO `medicamentos` (`codigo`, `nombre`, `precio_compra`, `precio_venta`, `unidad`, `stock`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
	('B000362', 'Dulvanex', 100, 0, 'cajas', 79, 1, '2017-07-24 11:43:20', 3, '2018-10-26 11:30:10'),
	('B000363', 'Controlip', 280, 50, 'cajas', 218, 1, '2017-07-24 11:56:58', 3, '2018-10-26 10:17:46'),
	('B000364', 'Quetiazic', 25, 50, 'cajas', 32, 1, '2017-07-24 21:59:48', 1, '2018-10-26 11:16:53'),
	('B000365', 'test samuel 2', 20, 3, 'Unidades', 17, 3, '2018-10-22 15:28:19', 3, '2018-10-23 15:27:13');
/*!40000 ALTER TABLE `medicamentos` ENABLE KEYS */;

-- Volcando estructura para tabla binventario.medicos
DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `codigo_especialidad` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_medicos_especialidades` (`codigo_especialidad`),
  CONSTRAINT `FK_medicos_especialidades` FOREIGN KEY (`codigo_especialidad`) REFERENCES `especialidades` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla binventario.medicos: ~3 rows (aproximadamente)
DELETE FROM `medicos`;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` (`codigo`, `nombres`, `apellidos`, `telefono`, `direccion`, `email`, `codigo_especialidad`) VALUES
	(2, 'kelly', 'Reyna', '96969696', 'Garzota 35', 'kellreyna@gmail.com', 2),
	(3, 'Luggi', 'Puga', '85858585', 'Samanes 2', 'lpuga@gmail.com', 1),
	(4, 'Gerardo', 'Pilay Murillo', '45454545', 'Guasmo Sur', 'gpilay@gmail.com', 3);
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;

-- Volcando estructura para tabla binventario.pacientes
DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `genero` set('F','M') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla binventario.pacientes: ~5 rows (aproximadamente)
DELETE FROM `pacientes`;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `fecha_nacimiento`, `telefono`, `direccion`, `email`, `genero`) VALUES
	(1, 'Jose', 'Lara', '1989-10-23', '042480700', 'Manta - Manabis', 'jlara@gmail.com', 'M'),
	(2, 'Kerly', 'Macias', '2018-10-01', '55555', 'Guasmo', 'jmacias@gmail.com', 'F'),
	(3, 'Daniel', 'Pilay MuÃ±oz', '2018-10-26', '5555', 'dasdas', 'dpilay@gmail.com', 'M'),
	(4, 'Lucas', 'Mite', '2018-10-26', '6666', 'asdas', 'lmite@gmail.com', 'M'),
	(5, 'Damaris', 'Quinto Millares', '2018-10-17', '2222', 'sdasdas', 'dquinto@gmail.com', 'F');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;

-- Volcando estructura para tabla binventario.transaccion_medicamentos
DROP TABLE IF EXISTS `transaccion_medicamentos`;
CREATE TABLE IF NOT EXISTS `transaccion_medicamentos` (
  `codigo_transaccion` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `numero` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo_transaccion` varchar(50) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo_transaccion`),
  KEY `id_barang` (`codigo`),
  KEY `created_user` (`created_user`),
  KEY `FK_transaccion_medicamentos_pacientes` (`id_paciente`),
  CONSTRAINT `FK_transaccion_medicamentos_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla binventario.transaccion_medicamentos: ~10 rows (aproximadamente)
DELETE FROM `transaccion_medicamentos`;
/*!40000 ALTER TABLE `transaccion_medicamentos` DISABLE KEYS */;
INSERT INTO `transaccion_medicamentos` (`codigo_transaccion`, `fecha`, `codigo`, `numero`, `created_user`, `created_date`, `tipo_transaccion`, `id_paciente`, `comentario`) VALUES
	('TM-2017-0000003', '2017-07-26', 'B000364', 5, 1, '2018-10-26 08:43:45', 'Salida', 1, 'sdas'),
	('TM-2017-0000008', '2018-10-26', 'B000362', 1, 3, '2018-10-26 09:32:57', 'Salida', 2, 'dsfasd'),
	('TM-2018-0000004', '2018-10-22', 'B000362', 2, 3, '2018-10-26 08:43:45', 'Salida', 1, 'sdas'),
	('TM-2018-0000005', '2018-10-23', 'B000362', 2, 3, '2018-10-26 08:43:45', 'Salida', 1, 'sdas'),
	('TM-2018-0000006', '2018-10-23', 'B000362', 20, 3, '2018-10-26 08:43:45', 'Salida', 1, 'sdas'),
	('TM-2018-0000007', '2018-10-23', 'B000363', 1, 3, '2018-10-26 08:43:45', 'Salida', 1, 'sdas'),
	('TM-2018-0000008', '2018-10-26', 'B000362', 1, 3, '2018-10-26 09:37:40', 'Salida', 4, 'Por temas de la Garganta2'),
	('TM-2018-0000014', '2018-10-26', 'B000362', 2, 3, '2018-10-26 11:12:30', 'Entrada', NULL, NULL),
	('TM-2018-0000015', '2018-10-26', 'B000364', 2, 3, '2018-10-26 11:16:52', 'Entrada', NULL, NULL),
	('TM-2018-0000016', '2018-10-26', 'B000362', 3, 3, '2018-10-26 14:40:58', 'Salida', 3, 'test de salida de medicamentos 54SDF65S4D6F5S4DF65S4 S6D5F4S6D5F4 6 65S4DF6S5DF4 SDFSDFSF SDFS SDFSDF SF');
/*!40000 ALTER TABLE `transaccion_medicamentos` ENABLE KEYS */;

-- Volcando estructura para tabla binventario.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permisos_acceso` enum('Super Admin','Gerente','Almacen') NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`permisos_acceso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla binventario.usuarios: ~3 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_user`, `username`, `name_user`, `password`, `email`, `telefono`, `foto`, `permisos_acceso`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Sistemas Webs', '21232f297a57a5a743894a0e4a801fc3', 'info@sist.com', '7025', 'user-default.png', 'Super Admin', 'activo', '2017-04-01 03:15:15', '2017-07-25 18:35:23'),
	(2, 'juan', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juab@juan.com', '12000', NULL, 'Almacen', 'activo', '2017-07-25 17:34:03', '2018-10-26 09:42:35'),
	(3, 'spilay', 'Samuel Pilay MuÃ±oz', 'f5660920aa70502ccf63169752290196', '', '', '0.jpg', 'Super Admin', 'activo', '2018-10-22 15:27:04', '2018-10-23 11:45:04');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
