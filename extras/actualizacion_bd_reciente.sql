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
CREATE DATABASE IF NOT EXISTS `sistutorias` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistutorias`;

-- Volcando estructura para tabla sistutorias.actividades
CREATE TABLE IF NOT EXISTS `actividades` (
  `idActividades` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Semestrerealizacion_sug` int(11) DEFAULT NULL,
  `Fecha_registro` date DEFAULT NULL,
  `URLFormato` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idActividades`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.actividades_asignadas
CREATE TABLE IF NOT EXISTS `actividades_asignadas` (
  `Actividades_idActividades` int(11) NOT NULL,
  `Tutorado_NControl` int(11) NOT NULL,
  `fecha_elaboracion` date NOT NULL,
  `calif_actividad` int(11) DEFAULT NULL,
  `Estatus` varchar(20) NOT NULL,
  PRIMARY KEY (`Actividades_idActividades`,`Tutorado_NControl`),
  KEY `fk_Actividades_has_Trabajador_Actividades1_idx` (`Actividades_idActividades`),
  KEY `fk_Actividades_Asignadas_Tutorado1_idx` (`Tutorado_NControl`),
  CONSTRAINT `fk_Actividades_has_Trabajador_Actividades1` FOREIGN KEY (`Actividades_idActividades`) REFERENCES `actividades` (`idActividades`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `idAreas` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAreas`),
  UNIQUE KEY `idAreas` (`idAreas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.bajas_tutorados
CREATE TABLE IF NOT EXISTS `bajas_tutorados` (
  `idBaja` int(11) NOT NULL,
  `Tutorado_NControl` int(11) NOT NULL,
  `Fecha_baja` date DEFAULT NULL,
  PRIMARY KEY (`idBaja`),
  KEY `fk_Bajas_Tutorados_Tutorado1_idx` (`Tutorado_NControl`),
  CONSTRAINT `fk_Bajas_Tutorados_Tutorado1` FOREIGN KEY (`Tutorado_NControl`) REFERENCES `tutorado` (`NControl`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.carrera
CREATE TABLE IF NOT EXISTS `carrera` (
  `idCarrera` varchar(15) NOT NULL,
  `Areas_idAreas` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCarrera`,`Areas_idAreas`),
  KEY `fk_Carrera_Areas1_idx` (`Areas_idAreas`),
  CONSTRAINT `fk_Carrera_Areas1` FOREIGN KEY (`Areas_idAreas`) REFERENCES `areas` (`idAreas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.generacion
CREATE TABLE IF NOT EXISTS `generacion` (
  `idGeneracion` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`idGeneracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.mensajes
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.persona
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
  `Foto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idPersona`),
  UNIQUE KEY `idPersona` (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.solicitudes
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.trabajador
CREATE TABLE IF NOT EXISTS `trabajador` (
  `Matricula` varchar(45) NOT NULL,
  `Persona_idPersona` int(10) unsigned NOT NULL,
  `Roll` varchar(25) NOT NULL,
  `Areas_idAreas` int(11) NOT NULL,
  `contraseña` varchar(16) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Disponibilidad` varchar(45) DEFAULT NULL,
  `Disp_Def` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Matricula`,`Persona_idPersona`),
  UNIQUE KEY `Persona_idPersona` (`Persona_idPersona`),
  KEY `fk_Trabajador_Persona_idx` (`Persona_idPersona`),
  KEY `fk_Trabajador_Areas1_idx` (`Areas_idAreas`),
  CONSTRAINT `fk_Trabajador_Areas1` FOREIGN KEY (`Areas_idAreas`) REFERENCES `areas` (`idAreas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_Persona` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.trabajador_tutorados
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.tutorado
CREATE TABLE IF NOT EXISTS `tutorado` (
  `NControl` int(11) NOT NULL,
  `Persona_idPersona` int(10) unsigned NOT NULL,
  `Carrera_idCarrera` varchar(15) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `Generacion_idGeneracion` int(11) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `Permisos` varchar(45) DEFAULT NULL,
  `Trabajador_Per` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Persona_idPersona`,`NControl`),
  UNIQUE KEY `NControl` (`NControl`),
  UNIQUE KEY `Persona_idPersona` (`Persona_idPersona`),
  KEY `fk_Tutorado_Carrera1` (`Carrera_idCarrera`),
  KEY `fk_Tutorado_Generacion1` (`Generacion_idGeneracion`),
  CONSTRAINT `fk_Tutorado_Carrera1` FOREIGN KEY (`Carrera_idCarrera`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Generacion1` FOREIGN KEY (`Generacion_idGeneracion`) REFERENCES `generacion` (`idGeneracion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sistutorias.tutorado_privilegios
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

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
