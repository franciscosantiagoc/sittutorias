-- DROP DATABASE sistutorias;
create database if not exists sistutorias ;
use sistutorias;


DROP TABLE IF EXISTS `Persona` ;

CREATE TABLE IF NOT EXISTS `Persona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `APaterno` VARCHAR(45) NULL,
  `AMaterno` VARCHAR(45) NULL,
  `FechaNac` DATE NULL,
  `Sexo` VARCHAR(2) NULL,
  `Correo` VARCHAR(50) NULL,
  `NTelefono` INT(12) NULL,
  `Direccion` VARCHAR(100) NULL,
  `Foto` VARCHAR(150) NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB;


DROP TABLE IF EXISTS `Areas` ;

CREATE TABLE IF NOT EXISTS `Areas` (
  `idAreas` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idAreas`))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `Trabajador` ;

CREATE TABLE IF NOT EXISTS `Trabajador` (
  `Matricula` VARCHAR(45) NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  `Roll` VARCHAR(25) NULL,
  `Areas_idAreas` INT NOT NULL,
  `contraseña` VARCHAR(16) NULL,
  `Estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Matricula`, `Persona_idPersona`),
  INDEX `fk_Trabajador_Persona_id` (`Persona_idPersona` ASC),
  INDEX `fk_Trabajador_Areas_id` (`Areas_idAreas` ASC),
  CONSTRAINT `fk_Trabajador_Persona`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_Areas`
    FOREIGN KEY (`Areas_idAreas`)
    REFERENCES `Areas` (`idAreas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


DROP TABLE IF EXISTS `Carrera` ;

CREATE TABLE IF NOT EXISTS `Carrera` (
  `idCarrera` VARCHAR(15) NOT NULL,
  `Areas_idAreas` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idCarrera`, `Areas_idAreas`),
  INDEX `fk_Carrera_Areas_id` (`Areas_idAreas` ASC),
  CONSTRAINT `fk_Carrera_Areas`
    FOREIGN KEY (`Areas_idAreas`)
    REFERENCES `Areas` (`idAreas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

DROP TABLE IF EXISTS `Periodo` ;

CREATE TABLE IF NOT EXISTS `Periodo` (
  `idPeriodo` INT NOT NULL,
  `fecha_inicio` DATE NULL,
  `Descripcion` VARCHAR(50) NULL,
  PRIMARY KEY (`idPeriodo`))
ENGINE = InnoDB;


DROP TABLE IF EXISTS `Tutorado` ;

CREATE TABLE IF NOT EXISTS `Tutorado` (
  `NControl` INT NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  `Carrera_idCarrera` varchar(15) NOT NULL,
  `contraseña` VARCHAR(45) NULL,
  `Periodo_idPeriodo` INT NOT NULL,
  PRIMARY KEY (`Persona_idPersona`, `NControl`),
  INDEX `fk_Tutorado_Persona_id` (`Persona_idPersona` ASC),
  INDEX `fk_Tutorado_Carrera_id` (`Carrera_idCarrera` ASC),
  INDEX `fk_Tutorado_Periodo_id` (`Periodo_idPeriodo` ASC),
  CONSTRAINT `fk_Tutorado_Persona`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Carrera`
    FOREIGN KEY (`Carrera_idCarrera`)
    REFERENCES `Carrera` (`idCarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Periodo`
    FOREIGN KEY (`Periodo_idPeriodo`)
    REFERENCES `Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

DROP TABLE IF EXISTS `Actividades` ;

CREATE TABLE IF NOT EXISTS `Actividades` (
  `idActividades` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(200) NULL,
  `Periodo` VARCHAR(45) NULL,
  PRIMARY KEY (`idActividades`))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `Actividades_Asignadas` ;

CREATE TABLE IF NOT EXISTS `Actividades_Asignadas` (
   
`Actividades_idActividades` INT NOT NULL,   
`Tutorado_NControl` INT NOT NULL,   
`Periodo_idPeriodo` INT NOT NULL,   
`Fecha_asig` DATE NULL,   
`fecha_elaboracion` DATE NULL,   
PRIMARY KEY (`Actividades_idActividades`, 
`Tutorado_NControl`),   
INDEX `fk_Actividades_has_Trabajor_Actividades_id` 
(`Actividades_idActividades` ASC),   
INDEX `fk_Actividades_Asignadas_Periodo_id` (`Periodo_idPeriodo` ASC),   
INDEX `fk_Actividades_Asignadas_Tutorado_id` (`Tutorado_NControl` ASC),   
CONSTRAINT `fk_Actividades_has_Trabajador_Actividades`     
FOREIGN KEY (`Actividades_idActividades`)     
REFERENCES `Actividades` (`idActividades`)     
ON DELETE NO ACTION     ON UPDATE NO ACTION,   
CONSTRAINT `fk_Actividades_Asignadas_Periodo`     
FOREIGN KEY (`Periodo_idPeriodo`)     
REFERENCES `Periodo` (`idPeriodo`)     
ON DELETE NO ACTION     ON UPDATE NO ACTION,   
CONSTRAINT `fk_Actividades_Asignadas_Tutorado`     
FOREIGN KEY (`Tutorado_NControl`)     
REFERENCES `Tutorado` (`NControl`)     
ON DELETE NO ACTION     ON UPDATE NO ACTION) 
ENGINE = InnoDB;


DROP TABLE IF EXISTS `Trabajador_Tutorados` ;

CREATE TABLE IF NOT EXISTS `Trabajador_Tutorados` (
  `Trabajador_Matricula` VARCHAR(45) NOT NULL,
  `Tutorado_NControl` INT(12) NOT NULL,
  `fecha_asig` DATE NULL,
  PRIMARY KEY (`Trabajador_Matricula`, `Tutorado_NControl`),
  INDEX `fk_Trabajador_has_Tutorado_Tutorado_NControl` (`Tutorado_NControl` ASC),
  INDEX `fk_Trabajador_has_Tutorado_Trabajador_Matricula` (`Trabajador_Matricula` ASC),
  CONSTRAINT `fk_Trabajador_has_Tutorado_Trabajador`
    FOREIGN KEY (`Trabajador_Matricula`)
    REFERENCES `Trabajador` (`Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_has_Tutorado_Tutorado`
    FOREIGN KEY (`Tutorado_NControl`)
    REFERENCES `Tutorado` (`NControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


DROP TABLE IF EXISTS `Bajas_Tutorados` ;

CREATE TABLE IF NOT EXISTS `Bajas_Tutorados` (
  `Tutorado_NControl` INT(12) NOT NULL,
  `Periodo_idPeriodo` INT NOT NULL,
  `Motivos` VARCHAR(45) NULL,
  INDEX `fk_Bajas_Tutorados_Tutorado_id` (`Tutorado_NControl` ASC),
  INDEX `fk_Bajas_Tutorados_Periodo_id` (`Periodo_idPeriodo` ASC),
  PRIMARY KEY (`Periodo_idPeriodo`, `Tutorado_NControl`),
  CONSTRAINT `fk_Bajas_Tutorados_Tutorado`
    FOREIGN KEY (`Tutorado_NControl`)
    REFERENCES `Tutorado` (`NControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bajas_Tutorados_Periodo`
    FOREIGN KEY (`Periodo_idPeriodo`)
    REFERENCES `Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


DROP TABLE IF EXISTS `SoliCambioT` ;

CREATE TABLE IF NOT EXISTS `SoliCambioT` (
  `idSoliCambioT` INT NOT NULL,
  `Periodo_idPeriodo` INT NOT NULL,
  `Trabajador_Matriculaanterior` VARCHAR(45) NULL,
  `Trabajador_Matriculanuevo` VARCHAR(45) NULL,
  `Tutorado_NControl` INT(12) NOT NULL,
  `fecha_solicitud` DATE NOT NULL,
  `estado` TINYINT NOT NULL,
  PRIMARY KEY (`idSoliCambioT`),
  INDEX `fk_SoliCambioT_Periodo_id` (`Periodo_idPeriodo` ASC),
  INDEX `fk_SoliCambioT_Trabajador_id` (`Trabajador_Matriculaanterior` ASC),
  INDEX `fk_SoliCambioT_Trabajador_id` (`Trabajador_Matriculanuevo` ASC),
  INDEX `fk_SoliCambioT_Tutorado_id` (`Tutorado_NControl` ASC),
  CONSTRAINT `fk_SoliCambioT_Periodo`
    FOREIGN KEY (`Periodo_idPeriodo`)
    REFERENCES `Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SoliCambioT_Trabajador`
    FOREIGN KEY (`Trabajador_Matriculaanterior`)
    REFERENCES `Trabajador` (`Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SoliCambioT_Trabajador`
    FOREIGN KEY (`Trabajador_Matriculanuevo`)
    REFERENCES `Trabajador` (`Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SoliCambioT_Tutorado`
    FOREIGN KEY (`Tutorado_NControl`)
    REFERENCES `Tutorado` (`NControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


DROP TABLE IF EXISTS `Mensajes` ;

CREATE TABLE IF NOT EXISTS `Mensajes` (
  `idMensajes` INT NOT NULL AUTO_INCREMENT,
  `Asunto` VARCHAR(50) NULL,
  `Mensaje` VARCHAR(500) NULL,
  `Fecha` DATE NULL,
  `idPersonaRemitente` INT UNSIGNED NOT NULL,
  `idPersonaDestinatario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idMensajes`),
  INDEX `fk_Mensajes_Persona_id` (`idPersonaRemitente` ASC),
  INDEX `fk_Mensajes_Persona_id` (`idPersonaDestinatario` ASC),
  CONSTRAINT `fk_Mensajes_Persona`
    FOREIGN KEY (`idPersonaRemitente`)
    REFERENCES `Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mensajes_Persona`
    FOREIGN KEY (`idPersonaDestinatario`)
    REFERENCES `Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;