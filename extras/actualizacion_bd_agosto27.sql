-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para sistutorias
DROP DATABASE IF EXISTS `sistutorias`;
CREATE DATABASE IF NOT EXISTS `sistutorias` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistutorias`;

-- Volcando estructura para tabla sistutorias.actividades
DROP TABLE IF EXISTS `actividades`;
CREATE TABLE IF NOT EXISTS `actividades` (
  `idActividades` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Semestrerealizacion_sug` int(11) DEFAULT NULL,
  `Semestre_obligatorio` tinyint(4) NOT NULL DEFAULT '0',
  `Fecha_registro` date DEFAULT NULL,
  `URLFormato` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idActividades`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.actividades: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` (`idActividades`, `Nombre`, `Descripcion`, `Semestrerealizacion_sug`, `Semestre_obligatorio`, `Fecha_registro`, `URLFormato`) VALUES
	(3016, 'Análisis Foda', 'Descripcion', 4, 0, '2018-08-27', 'directory/formats/AnalisisFoda.pdf'),
	(3774, 'Ficha de identificación del tutorado', 'Descripcion', 1, 0, '2018-08-24', 'directory/formats/Fichadeidentificacióndeltutorado.pdf'),
	(3875, ' Encuesta habilidades de estudio', 'Descripcion', 5, 0, '2018-08-28', 'directory/formats/Encuestahabilidadesdeestudio.pdf'),
	(4939, 'Formato de entrevista', 'Descripcion', 2, 0, '2018-08-25', 'directory/formats/Formatodeentrevista.pdf'),
	(6009, 'Test de asertividad', 'Descripcion', 7, 0, '2018-08-30', 'directory/formats/testdeasertividad.pdf'),
	(8123, 'Linea de vida', 'Descripcion', 3, 0, '2018-08-26', 'directory/formats/Lineadevida.pdf'),
	(8595, 'Test de Autoestima', 'Descripcion', 6, 0, '2018-08-29', 'directory/formats/TestdeAutoestima.pdf'),
	(34245, 'Kardes 1er Semetre', 'Envio de kardex', 4, 1, '2021-08-11', '/directory/formats/34245_Kardes 1er Semetre.pdf'),
	(354654, 'Kardex inicial', 'envio de kardex', 2, 1, '2021-08-11', '/directory/formats/354654_Kardex inicial.pdf');
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.actividades_asignadas
DROP TABLE IF EXISTS `actividades_asignadas`;
CREATE TABLE IF NOT EXISTS `actividades_asignadas` (
  `Actividades_idActividades` int(11) NOT NULL,
  `Tutorado_NControl` int(11) NOT NULL,
  `URLFile` varchar(50) NOT NULL DEFAULT '',
  `Fecha` date DEFAULT NULL,
  `Estatus` varchar(20) NOT NULL,
  `Puntuacion` varchar(50) DEFAULT NULL,
  `Comentarios` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Actividades_idActividades`,`Tutorado_NControl`),
  KEY `fk_Actividades_has_Trabajador_Actividades1_idx` (`Actividades_idActividades`),
  KEY `fk_Actividades_Asignadas_Tutorado1_idx` (`Tutorado_NControl`),
  CONSTRAINT `fk_Actividades_has_Trabajador_Actividades1` FOREIGN KEY (`Actividades_idActividades`) REFERENCES `actividades` (`idActividades`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.actividades_asignadas: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `actividades_asignadas` DISABLE KEYS */;
INSERT INTO `actividades_asignadas` (`Actividades_idActividades`, `Tutorado_NControl`, `URLFile`, `Fecha`, `Estatus`, `Puntuacion`, `Comentarios`) VALUES
	(3016, 16190437, '/directory/Activitiesdelivered/3016_16190437.pdf', '2021-08-07', 'Validado', '8', NULL),
	(3016, 17190521, '/directory/Activitiesdelivered/3016_17190521.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(3774, 16190331, '/directory/Activitiesdelivered/3774_16190331.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(3774, 16190437, '/directory/Activitiesdelivered/3774_16190437.pdf', '2021-08-17', 'En espera', NULL, NULL),
	(3774, 17190521, '/directory/Activitiesdelivered/3774_17190521.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(3774, 17190573, '/directory/Activitiesdelivered/3774_17190573.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(3774, 17190857, '/directory/Activitiesdelivered/3774_17190857.pdf', '2021-08-16', 'Validado', '5', NULL),
	(3875, 16190417, '/directory/Activitiesdelivered/3875_16190417.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(3875, 16190437, '/directory/Activitiesdelivered/3875_16190437.pdf', '2021-08-07', 'Validado', '9', NULL),
	(3875, 17190573, '/directory/Activitiesdelivered/3875_17190573.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(4939, 16190331, '/directory/Activitiesdelivered/4939_16190331.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(4939, 16190437, '/directory/Activitiesdelivered/4939_16190437.pdf', '2021-08-17', 'Validado', '5', NULL),
	(6009, 16190331, '/directory/Activitiesdelivered/6009_16190331.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(8595, 16190417, '/directory/Activitiesdelivered/8595_16190417.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(34245, 16190331, '/directory/Activitiesdelivered/34245_16190331.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(34245, 16190417, '/directory/Activitiesdelivered/34245_16190417.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(34245, 17190521, '/directory/Activitiesdelivered/34245_17190521.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(34245, 17190573, '/directory/Activitiesdelivered/34245_17190573.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(354654, 16190417, '/directory/Activitiesdelivered/354654_16190417.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(354654, 16190437, '/directory/Activitiesdelivered/354654_16190437.pdf', '2021-08-12', 'Validado', '9', NULL),
	(354654, 17190521, '/directory/Activitiesdelivered/354654_17190521.pdf', '2021-08-18', 'En espera', NULL, NULL),
	(354654, 17190573, '/directory/Activitiesdelivered/354654_17190573.pdf', '2021-08-18', 'En espera', NULL, NULL);
/*!40000 ALTER TABLE `actividades_asignadas` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.areas
DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `idAreas` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAreas`),
  UNIQUE KEY `idAreas` (`idAreas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.areas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` (`idAreas`, `Nombre`, `Descripcion`) VALUES
	(27313, 'Contabilidad y Gestión de Impuestos', 'Ejemplo de descripción'),
	(31462, 'Arquitectura y construcción', 'Ejemplo de descripción'),
	(33604, 'Informática', 'Ejemplo de descripción'),
	(48193, 'Ingeniería y Tecnología', 'Ejemplo de descripción'),
	(52767, 'Administración y Gestión de Empresas', 'Ejemplo de descripción');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.bajas_tutorados
DROP TABLE IF EXISTS `bajas_tutorados`;
CREATE TABLE IF NOT EXISTS `bajas_tutorados` (
  `idBaja` int(11) NOT NULL,
  `Tutorado_NControl` int(11) NOT NULL,
  `Fecha_baja` date DEFAULT NULL,
  PRIMARY KEY (`idBaja`),
  KEY `fk_Bajas_Tutorados_Tutorado1_idx` (`Tutorado_NControl`),
  CONSTRAINT `fk_Bajas_Tutorados_Tutorado1` FOREIGN KEY (`Tutorado_NControl`) REFERENCES `tutorado` (`NControl`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.bajas_tutorados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `bajas_tutorados` DISABLE KEYS */;
/*!40000 ALTER TABLE `bajas_tutorados` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.carrera
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `idCarrera` varchar(15) NOT NULL,
  `Areas_idAreas` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCarrera`,`Areas_idAreas`),
  KEY `fk_Carrera_Areas1_idx` (`Areas_idAreas`),
  CONSTRAINT `fk_Carrera_Areas1` FOREIGN KEY (`Areas_idAreas`) REFERENCES `areas` (`idAreas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.carrera: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` (`idCarrera`, `Areas_idAreas`, `Nombre`) VALUES
	('19819', 48193, 'Ingeniería Electromecánica'),
	('22768', 48193, 'Ingeniería Mecánica'),
	('39281', 48193, 'Ingeniería Industrial'),
	('45262', 31462, 'Ingeniería Civil'),
	('45504', 52767, 'Ingeniería en Gestión Empresarial'),
	('46813', 31462, 'Arquitectura'),
	('50467', 27313, 'Contador Público'),
	('68352', 48193, 'Ingeniería en Sistemas Computacionales'),
	('73529', 33604, 'Ingeniería Informática'),
	('74816', 48193, 'Ingeniería Eléctrica');
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.generacion
DROP TABLE IF EXISTS `generacion`;
CREATE TABLE IF NOT EXISTS `generacion` (
  `idGeneracion` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`idGeneracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.generacion: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `generacion` DISABLE KEYS */;
INSERT INTO `generacion` (`idGeneracion`, `fecha_inicio`, `fecha_fin`) VALUES
	(161, '2019-08-12', '2024-07-20'),
	(416, '2016-08-12', '2021-07-20'),
	(478, '2017-08-12', '2022-07-20'),
	(721, '2018-08-12', '2023-07-20'),
	(952, '2020-08-12', '2025-07-20');
/*!40000 ALTER TABLE `generacion` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.historico_asignacion
DROP TABLE IF EXISTS `historico_asignacion`;
CREATE TABLE IF NOT EXISTS `historico_asignacion` (
  `idHistorico` varchar(50) NOT NULL,
  `Tutorado_NControl` int(11) NOT NULL,
  `Trabajador_Matricula` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idHistorico`),
  KEY `FK_historico_asignacion_tutorado` (`Tutorado_NControl`),
  KEY `FK_historico_asignacion_trabajador` (`Trabajador_Matricula`),
  CONSTRAINT `FK_historico_asignacion_trabajador` FOREIGN KEY (`Trabajador_Matricula`) REFERENCES `trabajador` (`Matricula`) ON DELETE NO ACTION,
  CONSTRAINT `FK_historico_asignacion_tutorado` FOREIGN KEY (`Tutorado_NControl`) REFERENCES `tutorado` (`NControl`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.historico_asignacion: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `historico_asignacion` DISABLE KEYS */;
INSERT INTO `historico_asignacion` (`idHistorico`, `Tutorado_NControl`, `Trabajador_Matricula`, `Fecha`) VALUES
	('138202116190437', 16190437, '99173', '2021-08-13'),
	('1727138202116190437', 16190437, '29956', '2021-08-13'),
	('1736138202116190437', 16190437, '29956', '2021-08-13'),
	('1749138202116190437', 16190437, '93510', '2021-08-13');
/*!40000 ALTER TABLE `historico_asignacion` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.mensajes
DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE IF NOT EXISTS `mensajes` (
  `idMensajes` int(11) NOT NULL AUTO_INCREMENT,
  `Asunto` varchar(50) DEFAULT NULL,
  `Mensaje` varchar(500) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Estado` varchar(15) NOT NULL,
  `idPersonaRemitente` int(10) unsigned NOT NULL,
  `idPersonaDestinatario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idMensajes`),
  KEY `fk_Mensajes_Persona1_idx` (`idPersonaRemitente`),
  KEY `fk_Mensajes_Persona2_idx` (`idPersonaDestinatario`),
  CONSTRAINT `fk_Mensajes_Persona1` FOREIGN KEY (`idPersonaRemitente`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mensajes_Persona2` FOREIGN KEY (`idPersonaDestinatario`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.mensajes: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` (`idMensajes`, `Asunto`, `Mensaje`, `Fecha`, `Estado`, `idPersonaRemitente`, `idPersonaDestinatario`) VALUES
	(1, 'Corrección de datos', 'Necesitas actualizar', '2020-10-12', '0', 67, 73),
	(2, 'Solicitud de constancia', 'Datos faltantes en el documento', '2020-12-12', '1', 67, 20),
	(3, 'Tramite de constancia', 'Falta dirección', '2020-08-02', '1', 60, 31),
	(4, 'Verificación de actividad foda', 'Falta dato de la fortaleza', '2020-05-09', '1', 81, 46),
	(5, 'Verificación de actividad linea de vida', 'Agregar el nombre del alumno', '2020-04-14', '0', 75, 30);
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.notificaciones
DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `idNotif` varchar(50) NOT NULL,
  `Destinatario` varchar(20) NOT NULL,
  `Mensaje` varchar(200) NOT NULL,
  `Fecha` date NOT NULL,
  `Leido` tinyint(4) NOT NULL,
  PRIMARY KEY (`idNotif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.notificaciones: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` (`idNotif`, `Destinatario`, `Mensaje`, `Fecha`, `Leido`) VALUES
	('22082101455916190437', '16190437', 'Se ha validado tu actividad analisis foda', '2021-08-22', 1);
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.persona
DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `APaterno` varchar(45) DEFAULT NULL,
  `AMaterno` varchar(45) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `Sexo` varchar(2) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `NTelefono` varchar(13) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Foto` varchar(150) DEFAULT '/directory/img-person/default.png',
  PRIMARY KEY (`idPersona`),
  UNIQUE KEY `idPersona` (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.persona: ~114 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`idPersona`, `Nombre`, `APaterno`, `AMaterno`, `FechaNac`, `Sexo`, `Correo`, `NTelefono`, `Direccion`, `Foto`) VALUES
	(1, 'Usmar Isacc', 'Miguel', 'Lopez', '1999-10-16', 'M', 'LopezMiguelUs@gmail.com', '9717995120', 'direccion prueba', '/directory/img-person/UsmarIsaccMiguel.jpg'),
	(2, 'Giovanni Alexander', 'Morales', 'Lopez', '1999-04-11', 'M', 'LopezMoralesGi@gmail.com', '9714324512', 'direccion prueba', '/directory/img-person/GiovanniAlexanderMorales.jpg'),
	(3, 'Roel', 'Morales', 'Orozco', '1998-05-06', 'M', 'OrozcoMoralesRo@gmail.com', '9714860957', 'direccion prueba', '/directory/img-person/RoelMorales.jpg'),
	(4, 'Karina', 'Nuñez', 'Silva', '1999-05-07', 'F', 'SilvaNuñezKa@gmail.com', '9712623032', 'direccion prueba', '/directory/img-person/KarinaNuñez.jpg'),
	(5, 'Kenia', 'Orozco', 'Cruz', '1999-10-31', 'F', 'CruzOrozcoKe@gmail.com', '9712793311', 'direccion prueba', '/directory/img-person/KeniaOrozco.jpg'),
	(6, 'Dennis Sabas', 'Orozco', 'Bautista', '1999-01-23', 'F', 'BautistaOrozcoDe@gmail.com', '9713721570', 'direccion prueba', '/directory/img-person/DennisSabasOrozco.jpg'),
	(7, 'Carlos Roberto', 'Ortiz', 'Matus', '1999-05-17', 'M', 'MatusOrtizCa@gmail.com', '9718332712', 'direccion prueba', '/directory/img-person/CarlosRobertoOrtiz.jpg'),
	(8, 'Isis Yamile', 'Altamirano', 'Solano', '1998-05-03', 'F', 'SolanoAltamiranoIs@gmail.com', '9718259758', 'direccion prueba', '/directory/img-person/IsisYamileAltamirano.jpg'),
	(9, 'Fátima', 'Antinio', 'Sanchez', '1999-01-08', 'F', 'SanchezAntinioFá@gmail.com', '9716330120', 'direccion prueba', '/directory/img-person/FátimaAntinio.jpg'),
	(10, 'Itzury Alejandra', 'Aquino', 'Cruz', '1999-12-27', 'F', 'CruzAquinoIt@gmail.com', '9716802586', 'direccion prueba', '/directory/img-person/ItzuryAlejandraAquino.jpg'),
	(11, 'Vicente', 'Aquino', 'Regalado', '1999-10-11', 'M', 'RegaladoAquinoVi@gmail.com', '9712106115', 'direccion prueba', '/directory/img-person/VicenteAquino.jpg'),
	(12, 'Baudel', 'Aranjo', 'Benitez', '1999-12-03', 'M', 'BenitezAranjoBa@gmail.com', '9717592062', 'direccion prueba', '/directory/img-person/BaudelAranjo.jpg'),
	(13, 'Yosmar Manuel', 'Avedaño', 'Morales', '1999-11-14', 'M', 'MoralesAvedañoYo@gmail.com', '9716019661', 'direccion prueba', '/directory/img-person/YosmarManuelAvedaño.jpg'),
	(14, 'Brian', 'Benefield', 'Morales', '1999-07-26', 'M', 'MoralesBenefieldBr@gmail.com', '9714772466', 'direccion prueba', '/directory/img-person/BrianBenefield.jpg'),
	(15, 'Kevin Gabriel', 'Zarate', 'Velasquez', '1998-07-08', 'M', 'VelasquezZarateKe@gmail.com', '9712498199', 'direccion prueba', '/directory/img-person/KevinGabrielZarate.jpg'),
	(16, 'Jesus Antonio', 'Zarate', 'Villalobos', '1999-04-23', 'M', 'VillalobosZarateJe@gmail.com', '9716213801', 'direccion prueba', '/directory/img-person/JesusAntonioZarate.jpg'),
	(17, 'Clarissa', 'Zavala', 'Jiménez', '1999-09-01', 'F', 'JiménezZavalaCl@gmail.com', '9715339317', 'direccion prueba', '/directory/img-person/ClarissaZavala.jpg'),
	(18, 'Alba Beatriz', 'Aguilar', 'Ulises', '1999-06-03', 'F', 'UlisesAguilarAl@gmail.com', '9714414298', 'direccion prueba', '/directory/img-person/AlbaBeatrizAguilar.jpg'),
	(19, 'Luis', 'Fuentes', 'de Jesus', '1999-12-21', 'M', 'de JesusFuentesLu@gmail.com', '9713345356', 'direccion prueba', '/directory/img-person/LuisFuentes.jpg'),
	(20, 'Maytor', 'Revuelta', 'Rosado', '1999-11-27', 'M', 'RosadoRevueltaMa@gmail.com', '9713195036', 'direccion prueba', '/directory/img-person/MaytorRevuelta.jpg'),
	(21, 'Jorge', 'Robles', 'Luis', '1999-04-27', 'M', 'LuisRoblesJo@gmail.com', '9714341427', 'direccion prueba', '/directory/img-person/JorgeRobles.jpg'),
	(22, 'Sergio', 'Rodas', 'Escobar', '1998-11-27', 'M', 'EscobarRodasSe@gmail.com', '9713849923', 'direccion prueba', '/directory/img-person/SergioRodas.jpg'),
	(23, 'Brisa Donaji', 'Ruiz', 'Sanchez', '1999-01-08', 'F', 'SanchezRuizBr@gmail.com', '9716521066', 'direccion prueba', '/directory/img-person/BrisaDonajiRuiz.jpg'),
	(24, 'Jair Michael', 'Ruiz', 'Vicente', '1999-10-12', 'M', 'VicenteRuizJa@gmail.com', '9715469345', 'direccion prueba', '/directory/img-person/JairMichaelRuiz.jpg'),
	(25, 'José Guillermo', 'Gonzales', 'Lopez', '1999-01-22', 'M', 'LopezGonzalesJo@gmail.com', '9711561046', 'direccion prueba', '/directory/img-person/JoséGuillermoGonzales.jpg'),
	(26, 'Francisco', 'Santiago', 'de la Cruz', '1998-10-29', 'M', 'CruzSantiagoFr@gmail.com', '9711379445', 'direccion prueba', '/directory/img-person/Francisco_16190437.jpg'),
	(27, 'Luis Alberto', 'Robles', 'Parada', '1998-04-03', 'M', 'ParadaRoblesLu@gmail.com', '9719614394', 'direccion prueba', '/directory/img-person/LuisAlbertoRobles.jpg '),
	(28, 'Juan Carlos', 'Fernández', 'Piñon', '1998-04-03', 'M', 'PiñonFernándezJu@gmail.com', '9715787642', 'direccion prueba', '/directory/img-person/Juan CarlosFernández.jpg'),
	(29, 'Emanuel', 'Enríquez', 'Couder', '1998-11-30', 'M', 'CouderEnríquezEm@gmail.com', '9719665488', 'direccion prueba', '/directory/img-person/EmanuelEnríquez.jpg'),
	(30, 'Humberto', 'Toledo', 'Fuentes', '1998-06-23', 'M', 'FuentesToledoHu@gmail.com', '9718507158', 'direccion prueba', '/directory/img-person/HumbertoToledo.jpg'),
	(31, 'Magda Guadalupe', 'Toledo', 'Jiménez', '1999-09-16', 'F', 'JiménezToledoMa@gmail.com', '9713483929', 'direccion prueba', '/directory/img-person/MagdaGuadalupeToledo.jpg'),
	(32, 'David Zarif', 'Toledo', 'Pastelin', '1999-10-14', 'M', 'PastelinToledoDa@gmail.com', '9713978343', 'direccion prueba', '/directory/img-person/DavidZarifToledo.jpg'),
	(33, 'Martha Iris', 'Toral', 'Hernandez', '1999-01-23', 'F', 'HernandezToralMa@gmail.com', '9711798052', 'direccion prueba', '/directory/img-person/MarthaIrisToral.jpg'),
	(34, 'Jose', 'Toral', 'Morales', '1998-02-25', 'M', 'MoralesToralJo@gmail.com', '9715967501', 'direccion prueba', '/directory/img-person/JoseToral.jpg'),
	(35, 'Carolina', 'Trujillo', 'Jiménez', '1998-05-13', 'F', 'JiménezTrujilloCa@gmail.com', '9717263162', 'direccion prueba', '/directory/img-person/CarolinaTrujillo.jpg'),
	(36, 'Dalia Cenorina', 'Noriega', 'Alvarez', '1999-07-18', 'F', 'AlvarezNoriegaDa@gmail.com', '9713281854', 'direccion prueba', '/directory/img-person/DaliaCenorinaNoriega.jpg'),
	(37, 'Daniel', 'Olivarez', 'Fuentes', '1998-10-20', 'M', 'FuentesOlivarezDa@gmail.com', '9711295750', 'direccion prueba', '/directory/img-person/DanielOlivarez.jpg'),
	(38, 'Daniel', 'Ordaz', 'Morales', '1998-03-24', 'M', 'MoralesOrdazDa@gmail.com', '9717658594', 'direccion prueba', '/directory/img-person/DanielOrdaz.jpg'),
	(39, 'Marco Antonio', 'Ordaz', 'Orozco', '1999-04-26', 'M', 'OrozcoOrdazMa@gmail.com', '9716012469', 'direccion prueba', '/directory/img-person/MarcoAntonioOrdaz.jpg'),
	(40, 'Jorge Antonio', 'Palomec', 'Lopez', '1998-11-08', 'M', 'LopezPalomecJo@gmail.com', '9712152501', 'direccion prueba', '/directory/img-person/JorgeAntonioPalomec.jpg'),
	(41, 'Pedro Alberto', 'Perez', 'Martínez', '1999-03-14', 'M', 'MartínezPerezPe@gmail.com', '9715094524', 'direccion prueba', '/directory/img-person/PedroAlbertoPerez.jpg'),
	(42, 'Elías', 'Ramírez', 'Lugo', '1999-05-12', 'M', 'LugoRamírezEl@gmail.com', '9716779058', 'direccion prueba', '/directory/img-person/ElíasRamírez.jpg'),
	(43, 'Sergio Manuel', 'Ramos', 'Jose', '1999-01-17', 'M', 'JoseRamosSe@gmail.com', '9718404624', 'direccion prueba', '/directory/img-person/SergioManuelRamos.jpg'),
	(44, 'Carlos', 'Rasgado', 'López', '1999-08-18', 'M', 'LópezRasgadoCa@gmail.com', '9718326392', 'direccion prueba', '/directory/img-person/CarlosRasgado.jpg'),
	(45, 'llliane Monserrat', 'Ruíz', 'Nuñez', '1999-09-20', 'F', 'NuñezRuízll@gmail.com', '9713854313', 'direccion prueba', '/directory/img-person/lllianeMonserratRuíz.jpg'),
	(46, 'Arnulfo', 'Ruíz', 'Sánchez', '1999-06-17', 'M', 'SánchezRuízAr@gmail.com', '9712820548', 'direccion prueba', '/directory/img-person/ArnulfoRuíz.jpg'),
	(47, 'Esmeralda Yolotzin', 'Jiménez', 'Toledo', '1999-04-28', 'F', 'ToledoJiménezEs@gmail.com', '9711441871', 'direccion prueba', '/directory/img-person/EsmeraldaYolotzinJiménez.jpg'),
	(48, 'Luis Alberto', 'Laureano', 'García', '1999-07-17', 'M', 'GarcíaLaureanoLu@gmail.com', '9714388238', 'direccion prueba', '/directory/img-person/LuisAlbertoLaureano.jpg'),
	(49, 'Edwin', 'López', 'Hernandez', '1997-11-08', 'M', 'HernandezLópezEd@gmail.com', '9715202809', 'direccion prueba', '/directory/img-person/EdwinLópez.jpg'),
	(50, 'Kevin', 'López', 'López', '1999-12-07', 'M', 'LópezLópezKe@gmail.com', '9718406718', 'direccion prueba', '/directory/img-person/KevinLópez.jpg'),
	(51, 'Rey David', 'López', 'López', '1999-11-02', 'M', 'LópezLópezRe@gmail.com', '9715018270', 'direccion prueba', '/directory/img-person/ReyDavidLópez.jpg'),
	(52, 'Vladimir Orion', 'López', 'Matus', '1997-08-13', 'M', 'MatusLópezVl@gmail.com', '9712271009', 'direccion prueba', '/directory/img-person/VladimirOrionLópez.jpg'),
	(53, 'Patricia Dhamar', 'Martínez', 'Chicaty', '1999-07-25', 'F', 'ChicatyMartínezPa@gmail.com', '9719884435', 'direccion prueba', '/directory/img-person/PatriciaDhamarMartínez.jpg'),
	(54, 'Guadalupe', 'Matus', 'Martínez', '1998-03-16', 'F', 'MartínezMatusGu@gmail.com', '9714017985', 'direccion prueba', '/directory/img-person/GuadalupeMatus.jpg'),
	(55, 'Jose Ismael', 'Matus', 'Ordaz', '1999-05-14', 'M', 'OrdazMatusJo@gmail.com', '9716540706', 'direccion prueba', '/directory/img-person/JoseIsmaelMatus.jpg'),
	(56, 'VERA ALEXANDRO', 'ARAGON', 'REYES', '1984-08-26', 'M', 'REYESARAGONVE@gmail.com', '9718920270', 'direccion de prueba', '/directory/img-person/VERAALEXANDROREYES.jpg'),
	(57, 'LORENA', 'PERALTA', 'GONZALEZ', '1962-09-11', 'F', 'GONZALEZPERALTALO@gmail.com', '9719384559', 'direccion de prueba', '/directory/img-person/LORENAGONZALEZ.jpg'),
	(58, 'LEONEL ADELFO', 'MEDINA', 'ALEGRIA', '1971-05-10', 'M', 'ALEGRIAMEDINALE@gmail.com', '9714692850', 'direccion de prueba', '/directory/img-person/LEONELADELFOALEGRIA.jpg'),
	(59, 'BIENVENIDO ANGEL', 'UICAB', 'AYALA', '1981-01-24', 'M', 'AYALAUICABBI@gmail.com', '9716470322', 'direccion de prueba', '/directory/img-person/BIENVENIDOANGELAYALA.jpg'),
	(60, 'SAYONARA', 'OROZCO', 'ALVAREZ', '1977-10-20', 'F', 'ALVAREZOROZCOSA@gmail.com', '9711671138', 'direccion de prueba', '/directory/img-person/SAYONARAALVAREZ.jpg'),
	(61, 'VERONICA', 'OROZCO', 'NOLASCO', '1990-12-01', 'F', 'NOLASCOOROZCOVE@gmail.com', '9719199594', 'direccion de prueba', '/directory/img-person/VERONICANOLASCO.jpg'),
	(62, 'ALBINO', 'LOPEZ', 'LOPEZ', '1962-01-24', 'M', 'LOPEZLOPEZAL@gmail.com', '9714472540', 'direccion de prueba', '/directory/img-person/ALBINOLOPEZ.jpg'),
	(63, 'GICELA ALICIA', 'GOMEZ', 'PINEDA', '1969-03-15', 'F', 'PINEDAGOMEZGI@gmail.com', '9717024457', 'direccion de prueba', '/directory/img-person/GICELAALICIAPINEDA.jpg'),
	(64, 'IRMA FLOR', 'LOPEZ', 'GUERRA', '1973-02-09', 'F', 'GUERRALOPEZIR@gmail.com', '9713287678', 'direccion de prueba', '/directory/img-person/IRMAFLORGUERRA.jpg'),
	(65, 'MARIA DEL ROSARIO', 'NUÑEZ', 'LOPEZ', '1970-07-20', 'F', 'LOPEZNUÑEZMA@gmail.com', '9718557052', 'direccion de prueba', '/directory/img-person/MARIADELROSARIOLOPEZ.jpg'),
	(66, 'JOSE FELICIANO', 'LOPEZ', 'PERALES', '1969-05-14', 'M', 'PERALESLOPEZJO@gmail.com', '9716187488', 'direccion de prueba', '/directory/img-person/JOSEFELICIANOPERALES.jpg'),
	(67, 'MARIBEL', 'CASTILLEJOS', 'TOLEDO', '1975-07-12', 'F', 'TOLEDOCASTILLEJOSMA@gmail.com', '9712378043', 'direccion de prueba', '/directory/img-person/MARIBELTOLEDO.jpg'),
	(68, 'JAVIER EDUARDO', 'ECHEVERRIA', 'ORTIZ', '1960-10-01', 'M', 'ORTIZECHEVERRIAJA@gmail.com', '9716397301', 'direccion de prueba', '/directory/img-person/JAVIEREDUARDOORTIZ.jpg'),
	(69, 'LUCIANO', 'TOLEDO', 'CRUZ', '1977-04-09', 'M', 'CRUZTOLEDOLU@gmail.com', '9714904778', 'direccion de prueba', '/directory/img-person/LUCIANOCRUZ.jpg'),
	(70, 'GASTON', 'DEHESA', 'VALENCIA', '1981-07-04', 'M', 'VALENCIADEHESAGA@gmail.com', '9714183592', 'direccion de prueba', '/directory/img-person/GASTONVALENCIA.jpg'),
	(71, 'JOSE MANUEL', 'CASTILLEJOS', 'GONZALEZ', '1981-06-07', 'M', 'GONZALEZCASTILLEJOSJO@gmail.com', '9714704422', 'direccion de prueba', '/directory/img-person/JOSEMANUELGONZALEZ.jpg'),
	(72, 'JORGE', 'MARANTO', 'IGLECIAS', '1968-09-29', 'M', 'IGLECIASMARANTOJO@gmail.com', '9719707889', 'direccion de prueba', '/directory/img-person/JORGEIGLECIAS.jpg'),
	(73, 'JUVENAL', 'RASGADO', 'SANCHEZ', '1969-01-30', 'M', 'SANCHEZRASGADOJU@gmail.com', '9711701459', 'direccion de prueba', '/directory/img-person/JUVENALSANCHEZ.png'),
	(74, 'MARIANO', 'BLAS', 'SANCHEZ', '1984-06-24', 'M', 'SANCHEZBLASMA@gmail.com', '9711902494', 'direccion de prueba', '/directory/img-person/MARIANOSANCHEZ.jpg'),
	(75, 'JOSE ANTONIO', 'LOPEZ', 'POSADA', '1961-09-13', 'M', 'POSADALOPEZJO@gmail.com', '9717607379', 'direccion de prueba', '/directory/img-person/JOSEANTONIOPOSADA.jpg'),
	(76, 'JESUS', 'LOPEZ', 'CHIRINOS', '1978-07-29', 'M', 'CHIRINOSLOPEZJE@gmail.com', '9715715806', 'direccion de prueba', '/directory/img-person/JESUSCHIRINOS.jpg'),
	(77, 'ALEIDA', 'OROZCO', 'SANCHEZ', '1983-10-04', 'F', 'SANCHEZOROZCOAL@gmail.com', '9713945180', 'direccion de prueba', '/directory/img-person/ALEIDASANCHEZ.jpg'),
	(78, 'MARIO', 'NUÑEZ', 'CORDOVA', '1969-12-07', 'M', 'CORDOVANUÑEZMA@gmail.com', '9711885289', 'direccion de prueba', '/directory/img-person/MARIOCORDOVA.jpg'),
	(79, 'MARIA ISABEL', 'GOMEZ', 'VALDIVIESO', '1968-10-10', 'F', 'VALDIVIESOGOMEZMA@gmail.com', '9716011990', 'direccion de prueba', '/directory/img-person/MARIAISABELVALDIVIESO.jpg'),
	(80, 'ANGEL', 'OLIVARES', 'PEREZ', '1980-10-21', 'M', 'PEREZOLIVARESAN@gmail.com', '9716192621', 'direccion de prueba', '/directory/img-person/ANGELPEREZ.jpg'),
	(81, 'IRMA', 'QUIÑONES', 'PINEDA', '1967-04-30', 'F', 'PINEDAQUIÑONESIR@gmail.com', '9718683195', 'direccion de prueba', '/directory/img-person/IRMAPINEDA.jpg'),
	(82, 'IVAN', 'RUIZ', 'SANCHEZ', '1989-04-29', 'M', 'SANCHEZRUIZIV@gmail.com', '9719497746', 'direccion de prueba', '/directory/img-person/IVANSANCHEZ.jpg'),
	(83, 'FLAVIO AQUILES', 'RUIZ', 'CELAYA', '1976-04-21', 'M', 'CELAYARUIZFL@gmail.com', '9715067184', 'direccion de prueba', '/directory/img-person/FLAVIOAQUILESCELAYA.jpg'),
	(84, 'ALBERTO', 'RAMIREZ', 'REGALADO', '1980-10-21', 'M', 'REGALADORAMIREZAL@gmail.com', '9718583372', 'direccion de prueba', '/directory/img-person/ALBERTOREGALADO.jpg'),
	(85, 'DANIEL', 'GARCIA', 'OROZCO', '1964-12-08', 'M', 'OROZCOGARCIADA@gmail.com', '9716232169', 'direccion de prueba', '/directory/img-person/DANIELOROZCO.jpg'),
	(86, 'RUBEN', 'MEDINA', 'VARELA', '1984-03-31', 'M', 'VARELAMEDINARU@gmail.com', '9719987378', 'direccion de prueba', '/directory/img-person/RUBENVARELA.jpg'),
	(87, 'RANULFO', 'RIVERA', 'CASTILLO', '1975-09-25', 'M', 'CASTILLORIVERARA@gmail.com', '9712325600', 'direccion de prueba', '/directory/img-person/RANULFOCASTILLO.jpg'),
	(88, 'VICTOR MANUEL', 'JIMÉNEZ', 'CRUZ', '1957-06-11', 'M', 'CRUZJIMÉNEZVI@gmail.com', '9715765171', 'direccion de prueba', '/directory/img-person/VICTORMANUELJIMENEZ.jpg'),
	(89, 'Rosamarai', 'Orozco', 'Medrano', '1997-12-11', 'F', 'rosa_medrano@gmail.com', '9717157444', 'Chicapa de Castro', '/directory/img-person/default.png'),
	(90, 'Rufino', 'Lopez', 'Valdivieso', '1999-07-05', 'M', 'rufino.lopez@prueba.com', '9711151696', 'Gustavo juchitán', '/directory/img-person/default.png'),
	(91, 'Francisco', 'Santiago', 'Valdivieso', '2000-07-06', 'M', 'francisco.valdivieso@gmail.com', '971138451', 'Col Gustavo Juchitan', '/directory/img-person/default.png'),
	(92, 'Shunaxhi', 'Jimenez', 'Jimenez', '1997-12-12', 'F', 'shunaxhi.jimenez@gmail.com', '971234564', 'Septima', '/directory/img-person/default.png'),
	(98, 'ZAIR JAACIEL', 'GUERRA', 'RUIZ', '2012-12-12', 'M', 'zair jaaciel.ruiz@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(99, 'ROGELIO', 'RASGADO', 'SANCHEZ', '2012-12-12', 'M', 'rogelio.sanchez@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(100, 'REY DAVID', 'SALINAS', 'SANTIAGO', '2012-12-12', 'M', 'rey david.santiago@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(101, 'JOSE DAVID', 'LAZARO', 'ZARATE', '2012-12-12', 'M', 'jose david.zarate@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(102, 'RICARDO', 'ROCHA', 'GALLEGOS', '2012-12-12', 'M', 'ricardo.rocha@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(103, 'JHOAN ANTONIO', 'ROJAS', 'LOPEZ', '2012-12-12', 'M', 'jhoan antonio.rojas@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(120, 'Oscar', 'Gallegos', 'Gomez', '2012-12-12', 'M', 'oscar.gallegos@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(121, 'Adriana', 'Lopez', 'Gomez', '2012-12-12', 'F', 'adriana.lopez@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(122, 'Noe de Jesus', 'Lopez', 'Matus', '2012-12-12', 'M', 'noe de jesus.lopez@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(123, 'Lazaro de Jesus', 'Sánchez', 'Gómez', '2012-12-12', 'M', 'lazaro de jesus.sánchez@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(124, 'Alejandro', 'Sánchez', 'López', '2012-12-12', 'M', 'alejandro.sánchez@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(125, 'Mariana', 'Sánchez', 'Martínez', '2012-12-12', 'F', 'mariana.sánchez@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(126, 'Gerardo', 'Santiago', 'Santiago', '2012-12-12', 'M', 'gerardo.santiago@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(127, 'Hector Manuel', 'Santos', 'Bautista', '2012-12-12', 'M', 'hector manuel.santos@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(128, 'Carlos Adiel', 'Sosa', 'García', '2012-12-12', 'M', 'carlos adiel.sosa@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(129, 'Jose Guadalupe', 'Teran', 'Antonio', '2012-12-12', 'M', 'jose guadalupe.teran@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(130, 'Andrea', 'Toledo', 'Villatorio', '2012-12-12', 'F', 'andrea.toledo@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(131, 'Rosalinda', 'Valdivieso', 'Gallegos', '2012-12-12', 'F', 'rosalinda.valdivieso@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(132, 'Victor Fernando', 'Valdiviezo', 'García', '2012-12-12', 'M', 'victor fernando.valdiviezo@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(133, 'Jose David', 'Villalobos', 'Nicolas', '2012-12-12', 'M', 'jose david.villalobos@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(134, 'Israel de Jesús', 'Vásquez', 'Sánchez', '2012-12-12', 'M', 'israel de jesús.vásquez@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(135, 'Emmanuel', 'Zarate', 'Orozco', '2012-12-12', 'M', 'emmanuel.zarate@gmail.com', '00000000', 'Juchitán Oaxaca', '/directory/img-person/default.png'),
	(136, 'Benito', 'Lopez', 'Sanchez', '1998-05-03', 'M', 'benito.sanchez@gmail.com', '971125454', 'Juchitán', ''),
	(137, 'Jose', 'lopez', 'Jimenes', '2002-02-04', 'M', 'jose.lopez.jimenes@gmail.com', '9711254631', 'col. Martires juchitan aoxaca', ''),
	(138, 'Daniela', 'Robles', 'Parada', '1991-04-06', 'F', 'daniela.robles@gmail.com', '9211453142', 'oaxaca mexico', ''),
	(139, 'Rogelio', 'Matus', 'Sanchez', '1990-10-02', 'M', 'rogelio@gmail.com', '9712354689', 'oaxac', ''),
	(140, 'Yuridia', 'Jimenez', 'Regalado', '1987-09-01', 'F', 'yuri.regalado@gmail.com', '9511234681', 'Oaxaca', ''),
	(141, 'Yuridia', 'Sanchez', 'Lopez', '1981-10-07', 'F', 'yuridia.sanchez@gmail.com', '9712345412', 'oaxaca', ''),
	(142, 'Carlos', 'Jimenez', 'Vasquez', '1989-03-01', 'M', 'carlos.vasquez@gmail.com', '9711241536', 'Juchitan', '');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.solicitudes
DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `idSolicitud` int(11) NOT NULL,
  `tipo_solicitud` varchar(150) NOT NULL DEFAULT '',
  `Trabajador_Matriculaanterior` varchar(45) DEFAULT NULL,
  `Trabajador_Matriculanuevo` varchar(45) DEFAULT NULL,
  `Tutorado_NControl` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `fk_SoliCambioT_Trabajador1_idx` (`Trabajador_Matriculaanterior`),
  KEY `fk_SoliCambioT_Trabajador2_idx` (`Trabajador_Matriculanuevo`),
  KEY `fk_SoliCambioT_Tutorado1_idx` (`Tutorado_NControl`),
  CONSTRAINT `fk_SoliCambioT_Trabajador1` FOREIGN KEY (`Trabajador_Matriculaanterior`) REFERENCES `trabajador` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SoliCambioT_Trabajador2` FOREIGN KEY (`Trabajador_Matriculanuevo`) REFERENCES `trabajador` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SoliCambioT_Tutorado1` FOREIGN KEY (`Tutorado_NControl`) REFERENCES `tutorado` (`NControl`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.solicitudes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` (`idSolicitud`, `tipo_solicitud`, `Trabajador_Matriculaanterior`, `Trabajador_Matriculanuevo`, `Tutorado_NControl`, `fecha_solicitud`, `estado`) VALUES
	(1, 'Cambio de Tutor', NULL, NULL, 16190437, '2021-05-15', 0);
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.trabajador
DROP TABLE IF EXISTS `trabajador`;
CREATE TABLE IF NOT EXISTS `trabajador` (
  `Matricula` varchar(45) NOT NULL,
  `Persona_idPersona` int(10) unsigned NOT NULL,
  `Roll` varchar(25) NOT NULL,
  `Areas_idAreas` int(11) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `Estado` varchar(45) NOT NULL COMMENT 'Cuenta activa o inactiva',
  `Disponibilidad` char(1) DEFAULT '1' COMMENT 'tutor activo o inactivo',
  `Disp_Def` varchar(45) DEFAULT NULL COMMENT 'inactividad definida por coordinador',
  PRIMARY KEY (`Matricula`,`Persona_idPersona`),
  UNIQUE KEY `Persona_idPersona` (`Persona_idPersona`),
  KEY `fk_Trabajador_Persona_idx` (`Persona_idPersona`),
  KEY `fk_Trabajador_Areas1_idx` (`Areas_idAreas`),
  CONSTRAINT `fk_Trabajador_Areas1` FOREIGN KEY (`Areas_idAreas`) REFERENCES `areas` (`idAreas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_Persona` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.trabajador: ~33 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` (`Matricula`, `Persona_idPersona`, `Roll`, `Areas_idAreas`, `contraseña`, `Estado`, `Disponibilidad`, `Disp_Def`) VALUES
	('103910', 70, 'Docente', 48193, '103910', 'Activo', '1', ''),
	('106482', 81, 'Docente', 48193, '106482', 'Activo', '1', ''),
	('107639', 58, 'Docente', 48193, '107639', 'Activo', '0', ''),
	('107776', 63, 'Docente', 48193, '107776', 'Activo', '1', ''),
	('1114', 67, 'Coordinador de Carrera', 48193, '1114', 'Activo', '1', ''),
	('14636', 74, 'Docente', 48193, '14636', 'Activo', '0', ''),
	('15427810', 141, 'Coordinador de Area', 33604, 'c0RvM0xJQWZQU1lwajh1WDZ4TUtWZz09', 'Inactivo', '1', ''),
	('18720421', 142, 'Coordinador de Area', 52767, 'Q25DTWhyNlhxNzNjYmgra1pZdUsvZz09', 'Inactivo', '0', ''),
	('18828', 57, 'Docente', 48193, '18828', 'Activo', '1', ''),
	('19703', 68, 'Docente', 48193, '19703', 'Activo', '1', ''),
	('21147', 56, 'Docente', 48193, '21147', 'Activo', '1', ''),
	('22406', 88, 'Admin', 48193, '22406', 'Inactivo', '1', ''),
	('2265', 72, 'Docente', 48193, '2265', 'Activo', '0', ''),
	('29956', 84, 'Docente', 48193, '29956', 'Activo', '1', ''),
	('38721', 85, 'Docente', 48193, '38721', 'Activo', '1', ''),
	('43231', 64, 'Docente', 48193, '43231', 'Activo', '0', ''),
	('45356', 80, 'Docente', 48193, '45356', 'Activo', '1', ''),
	('45957', 77, 'Docente', 48193, '45957', 'Activo', '1', ''),
	('47818', 60, 'Docente', 48193, '47818', 'Activo', '1', ''),
	('52000', 78, 'Docente', 48193, '52000', 'Activo', '0', ''),
	('59341', 86, 'Docente', 48193, '59341', 'Activo', '1', ''),
	('69113', 71, 'Docente', 48193, '69113', 'Activo', '1', ''),
	('71179', 59, 'Docente', 48193, '71179', 'Activo', '1', ''),
	('74899', 79, 'Docente', 48193, '74899', 'Activo', '1', ''),
	('78949', 82, 'Coordinador de Area', 48193, '78949', 'Activo', '0', ''),
	('8026', 62, 'Docente', 48193, '8026', 'Activo', '1', ''),
	('81823', 66, 'Docente', 48193, '81823', 'Activo', '1', ''),
	('85067', 76, 'Docente', 48193, '85067', 'Activo', '1', ''),
	('85748', 73, 'Docente', 48193, '85748', 'Activo', '1', ''),
	('90699', 83, 'Docente', 48193, '90699', 'Activo', '0', ''),
	('93510', 65, 'Docente', 48193, '93510', 'Activo', '1', ''),
	('96163', 75, 'Docente', 48193, '96163', 'Activo', '1', ''),
	('96451', 61, 'Docente', 48193, '96451', 'Activo', '0', ''),
	('96850', 69, 'Docente', 48193, '96850', 'Activo', '1', ''),
	('99173', 87, 'Docente', 48193, '99173', 'Activo', '0', '');
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.trabajador_tutorados
DROP TABLE IF EXISTS `trabajador_tutorados`;
CREATE TABLE IF NOT EXISTS `trabajador_tutorados` (
  `Trabajador_Matricula` varchar(45) NOT NULL,
  `Tutorado_NControl` int(11) NOT NULL,
  `fecha_asig` date DEFAULT NULL,
  PRIMARY KEY (`Trabajador_Matricula`,`Tutorado_NControl`),
  KEY `fk_Trabajador_has_Tutorado_Tutorado1_idx` (`Tutorado_NControl`),
  KEY `fk_Trabajador_has_Tutorado_Trabajador1_idx` (`Trabajador_Matricula`),
  CONSTRAINT `fk_Trabajador_has_Tutorado_Trabajador1` FOREIGN KEY (`Trabajador_Matricula`) REFERENCES `trabajador` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_has_Tutorado_Tutorado1` FOREIGN KEY (`Tutorado_NControl`) REFERENCES `tutorado` (`NControl`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.trabajador_tutorados: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajador_tutorados` DISABLE KEYS */;
INSERT INTO `trabajador_tutorados` (`Trabajador_Matricula`, `Tutorado_NControl`, `fecha_asig`) VALUES
	('29956', 16190359, '2021-07-21'),
	('96850', 17190458, '2021-11-08'),
	('96850', 17190664, '2021-03-14'),
	('99173', 16190437, '2021-07-21'),
	('99173', 17190605, '2021-10-15'),
	('99173', 17190857, '2021-07-28');
/*!40000 ALTER TABLE `trabajador_tutorados` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.tutorado
DROP TABLE IF EXISTS `tutorado`;
CREATE TABLE IF NOT EXISTS `tutorado` (
  `NControl` int(11) NOT NULL,
  `Persona_idPersona` int(10) unsigned NOT NULL,
  `Carrera_idCarrera` varchar(15) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `Generacion_idGeneracion` int(11) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`Persona_idPersona`,`NControl`),
  UNIQUE KEY `NControl` (`NControl`),
  UNIQUE KEY `Persona_idPersona` (`Persona_idPersona`),
  KEY `fk_Tutorado_Carrera1` (`Carrera_idCarrera`),
  KEY `fk_Tutorado_Generacion1` (`Generacion_idGeneracion`),
  CONSTRAINT `fk_Tutorado_Carrera1` FOREIGN KEY (`Carrera_idCarrera`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Generacion1` FOREIGN KEY (`Generacion_idGeneracion`) REFERENCES `generacion` (`idGeneracion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.tutorado: ~80 rows (aproximadamente)
/*!40000 ALTER TABLE `tutorado` DISABLE KEYS */;
INSERT INTO `tutorado` (`NControl`, `Persona_idPersona`, `Carrera_idCarrera`, `contraseña`, `Generacion_idGeneracion`, `Estado`) VALUES
	(17190857, 1, '68352', '17190857', 478, ''),
	(17190605, 2, '68352', '17190605', 478, ''),
	(17190664, 3, '68352', '17190664', 478, ''),
	(17190458, 4, '68352', '17190458', 478, ''),
	(17190856, 5, '68352', '17190856', 478, ''),
	(17190573, 6, '68352', '17190573', 721, ''),
	(17190536, 7, '68352', '17190536', 721, ''),
	(17190849, 8, '68352', '17190849', 721, ''),
	(17190615, 9, '68352', '17190615', 721, ''),
	(17190722, 10, '68352', '17190722', 721, ''),
	(17190815, 11, '68352', '17190815', 161, ''),
	(17190867, 12, '68352', '17190867', 161, ''),
	(17190810, 13, '68352', '17190810', 161, ''),
	(17190836, 14, '68352', '17190836', 721, ''),
	(17190577, 15, '68352', '17190577', 721, ''),
	(17190461, 16, '68352', '17190461', 721, ''),
	(17190790, 17, '68352', '17190790', 952, ''),
	(17190019, 18, '68352', '17190019', 952, ''),
	(17190005, 19, '68352', '17190005', 952, ''),
	(17190574, 20, '68352', '17190574', 161, ''),
	(17190575, 21, '68352', '17190575', 161, ''),
	(17190521, 22, '68352', '17190521', 478, ''),
	(17190476, 23, '68352', '17190476', 478, ''),
	(17190459, 24, '68352', '17190459', 952, ''),
	(17190775, 25, '68352', '17190775', 952, ''),
	(16190437, 26, '68352', 'fcostgo98', 721, ''),
	(16190359, 27, '68352', '16190359', 416, ''),
	(16190439, 28, '68352', '16190439', 416, ''),
	(16190417, 29, '68352', '16190417', 416, ''),
	(16190331, 30, '68352', '16190331', 416, ''),
	(18190684, 31, '68352', '18190684', 478, ''),
	(18190887, 32, '68352', '18190887', 721, ''),
	(18190588, 33, '68352', '18190588', 161, ''),
	(18190832, 34, '68352', '18190832', 952, ''),
	(18190854, 35, '68352', '18190854', 721, ''),
	(18190867, 36, '46813', '18190867', 721, ''),
	(18190776, 37, '46813', '18190776', 721, ''),
	(18190712, 38, '46813', '18190712', 161, ''),
	(18190522, 39, '46813', '18190522', 952, ''),
	(18190666, 40, '50467', '18190666', 952, ''),
	(18190791, 41, '50467', '18190791', 952, ''),
	(18190611, 42, '45262', '18190611', 478, ''),
	(18190568, 43, '45262', '18190568', 478, ''),
	(18190767, 44, '74816', '18190767', 952, ''),
	(18190667, 45, '74816', '18190667', 952, ''),
	(18190491, 46, '19819', '18190491', 721, ''),
	(18190580, 47, '45504', '18190580', 952, ''),
	(18190534, 48, '68352', '18190534', 952, ''),
	(18190853, 49, '39281', '18190853', 721, ''),
	(18190707, 50, '73529', '18190707', 478, ''),
	(18190863, 51, '22768', '18190863', 478, ''),
	(18190774, 52, '22768', '18190774', 161, ''),
	(18190495, 53, '19819', '18190495', 161, ''),
	(18190665, 54, '45504', '18190665', 952, ''),
	(18190763, 55, '19819', '18190763', 952, ''),
	(16190427, 89, '68352', '16190427', 721, 'Inactivo'),
	(19190437, 90, '68352', 'YTlWZExEK1lzcU5yUWpNbHZBTjZCdz09', 721, 'Inactivo'),
	(19190432, 92, '68352', 'dER3cXAyMkJFczlvdDFIZ1hoSXdZdz09', 721, 'Inactivo'),
	(19190738, 98, '68352', 'cGxmZmRNZ3BNeUhydW1VTmY0MzVjZz09', 721, 'Inactivo'),
	(19190464, 99, '68352', 'ak5uaFVnTWJIaTBuYWdrQUdML0F6Zz09', 721, 'Inactivo'),
	(19190594, 100, '68352', 'U1dMcG5lUHF0YUdRZFVCOVZ1dHNqQT09', 721, 'Inactivo'),
	(19190551, 101, '68352', 'eHVuR2tvQ2Mxay94SHZGMmVYeE5GQT09', 721, 'Inactivo'),
	(19190626, 102, '68352', 'WDVhZ3Bua3JYVVpTcW1SL0NNbjErQT09', 721, 'Inactivo'),
	(19190657, 103, '68352', 'aXRqNGxVbXJmR2JzeUNMSlRqbHpRQT09', 721, 'Inactivo'),
	(18190842, 120, '68352', 'QnNjV3hkZTZ1S1RPT3psZURXUlBOdz09', 952, 'Inactivo'),
	(18190834, 121, '68352', 'dzNnQ0l1aG5YK1p6M2VVb1lQY0grQT09', 952, 'Inactivo'),
	(18190583, 122, '68352', 'SVllQzFoQXMxZDZLT3dtRTkxS3A4QT09', 952, 'Inactivo'),
	(18190523, 123, '68352', 'cXVuMFNOQkJ4TE9mOFRpTEZWWkxRZz09', 952, 'Inactivo'),
	(18190657, 124, '68352', 'dUtsbmlzL2dSc3FkTm9taGZaYjAxZz09', 952, 'Inactivo'),
	(18190565, 125, '68352', 'M0FidGpXRVJsS25GeWlvb2N2WVRxUT09', 952, 'Inactivo'),
	(18190862, 126, '68352', 'b3hOUW1VcTZtN1JnRFBqeHBKZDVaZz09', 952, 'Inactivo'),
	(18190672, 127, '68352', 'cXhTaXFMeHY0VTZDQ3Jtb1NaeUowZz09', 952, 'Inactivo'),
	(18190658, 128, '68352', 'T2lpUjZScXNUMDU4VWFNOE1acjl1dz09', 952, 'Inactivo'),
	(18190610, 129, '68352', 'Sk40ZWVLMUwvMWlUUTJsZm1OaFc1dz09', 952, 'Inactivo'),
	(18190871, 130, '68352', 'SFhLcjhhSE1OQlVWODV6YkdVL09Rdz09', 952, 'Inactivo'),
	(18190796, 131, '68352', 'anl1UlQzOXJDc3hDK0ovT2laV1lrdz09', 952, 'Inactivo'),
	(18190527, 132, '68352', 'YnhGZEZIL055NnFFOFliRnJIM255QT09', 952, 'Inactivo'),
	(18190849, 133, '68352', 'Tk4zZkk0SHE1cngvMVZGencwZENoZz09', 952, 'Inactivo'),
	(18190668, 134, '68352', 'L3FvZlJ1RG9PMkl6eG5KTHN3V1BjUT09', 952, 'Inactivo'),
	(18190872, 135, '68352', 'YlVGZDJoRnlWazJGNjl1MEtyVGNkZz09', 952, 'Inactivo'),
	(20210421, 137, '68352', '20210421', 952, 'Inactivo');
/*!40000 ALTER TABLE `tutorado` ENABLE KEYS */;

-- Volcando estructura para tabla sistutorias.tutorado_privilegios
DROP TABLE IF EXISTS `tutorado_privilegios`;
CREATE TABLE IF NOT EXISTS `tutorado_privilegios` (
  `Tutorado_NControl` int(12) NOT NULL,
  `Trabajador_Matricula` varchar(45) NOT NULL,
  `Privilegios` varchar(10) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  PRIMARY KEY (`Tutorado_NControl`,`Trabajador_Matricula`),
  KEY `fk_Tutorado_Privilegios_Trabajador1` (`Trabajador_Matricula`),
  CONSTRAINT `fk_Tutorado_Privilegios_Trabajador1` FOREIGN KEY (`Trabajador_Matricula`) REFERENCES `trabajador` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Privilegios_Tutorado1` FOREIGN KEY (`Tutorado_NControl`) REFERENCES `tutorado` (`NControl`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistutorias.tutorado_privilegios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tutorado_privilegios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tutorado_privilegios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
