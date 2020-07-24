
-- DROP DATABASE `sistutorias`;
CREATE DATABASE IF NOT EXISTS `sistutorias`;
USE `sistutorias` ;

-- -----------------------------------------------------
-- Table `sistutorsysias`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Persona` (
  `idPersona` INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  `Nombre` VARCHAR(45) NULL,
  `APaterno` VARCHAR(45) NULL,
  `AMaterno` VARCHAR(45) NULL,
  `FechaNac` date default NULL,
  `Sexo` VARCHAR(2) NULL,
  `Correo` VARCHAR(50) NULL,
  `NTelefono` VARCHAR(13) NULL,
  `Direccion` VARCHAR(100) NULL,
  `Ciudad` VARCHAR(100) NULL,
  `Foto` VARCHAR(150) NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Areas`
-- -----------------------------------------------------	
CREATE TABLE IF NOT EXISTS `sistutorias`.`Areas` (
  `idAreas` INT NOT NULL UNIQUE,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idAreas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Trabajador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Trabajador` (
  `Matricula` VARCHAR(45) NOT NULL,
  `Persona_idPersona` INT UNSIGNED NOT NULL UNIQUE,
  `Roll` VARCHAR(25) NULL,
  `Areas_idAreas` INT NOT NULL,
  `contraseña` VARCHAR(16) NULL,
  `Estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Matricula`, `Persona_idPersona`),
  INDEX `fk_Trabajador_Persona_idx` (`Persona_idPersona` ASC),
  INDEX `fk_Trabajador_Areas1_idx` (`Areas_idAreas` ASC),
  CONSTRAINT `fk_Trabajador_Persona`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `sistutorias`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_Areas1`
    FOREIGN KEY (`Areas_idAreas`)
    REFERENCES `sistutorias`.`Areas` (`idAreas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Carrera` (
  `idCarrera` VARCHAR(15) NOT NULL,
  `Areas_idAreas` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idCarrera`, `Areas_idAreas`),
  INDEX `fk_Carrera_Areas1_idx` (`Areas_idAreas` ASC),
  CONSTRAINT `fk_Carrera_Areas1`
    FOREIGN KEY (`Areas_idAreas`)
    REFERENCES `sistutorias`.`Areas` (`idAreas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Periodo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Periodo` (
  `idPeriodo` INT NOT NULL,
  `fecha_inicio` DATE NULL,
  `Descripcion` VARCHAR(50) NULL,
  PRIMARY KEY (`idPeriodo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Tutorado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Tutorado` (
  `NControl` INT(12) NOT NULL UNIQUE,
  `Persona_idPersona` INT UNSIGNED NOT NULL UNIQUE,
  `Carrera_idCarrera` VARCHAR(15) NOT NULL,
  `contrasena` VARCHAR(45) NULL,
  `Periodo_idPeriodo` INT NOT NULL,
  PRIMARY KEY (`Persona_idPersona`, `NControl`),
  CONSTRAINT `fk_Tutorado_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `sistutorias`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Carrera1`
    FOREIGN KEY (`Carrera_idCarrera`)
    REFERENCES `sistutorias`.`Carrera` (`idCarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorado_Periodo1`
    FOREIGN KEY (`Periodo_idPeriodo`)
    REFERENCES `sistutorias`.`Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Actividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Actividades` (
  `idActividades` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(200) NULL,
  PRIMARY KEY (`idActividades`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Actividades_Asignadas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Actividades_Asignadas` (
  `Actividades_idActividades` INT NOT NULL,
  `Tutorado_NControl` INT(12) NOT NULL,
  `Periodo_idPeriodo` INT NOT NULL,
  `Fecha_asig` DATE NULL,
  `fecha_elaboracion` DATE NULL,
  PRIMARY KEY (`Actividades_idActividades`, `Tutorado_NControl`),
  INDEX `fk_Actividades_has_Trabajador_Actividades1_idx` (`Actividades_idActividades` ASC) ,
  INDEX `fk_Actividades_Asignadas_Periodo1_idx` (`Periodo_idPeriodo` ASC),
  INDEX `fk_Actividades_Asignadas_Tutorado1_idx` (`Tutorado_NControl` ASC),
  CONSTRAINT `fk_Actividades_has_Trabajador_Actividades1`
    FOREIGN KEY (`Actividades_idActividades`)
    REFERENCES `sistutorias`.`Actividades` (`idActividades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Actividades_Asignadas_Periodo1`
    FOREIGN KEY (`Periodo_idPeriodo`)
    REFERENCES `sistutorias`.`Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Actividades_Asignadas_Tutorado1`
    FOREIGN KEY (`Tutorado_NControl`)
    REFERENCES `sistutorias`.`Tutorado` (`NControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Trabajador_Tutorados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Trabajador_Tutorados` (
  `Trabajador_Matricula` VARCHAR(45) NOT NULL,
  `Tutorado_NControl` INT(12) NOT NULL,
  `fecha_asig` DATE NULL,
  PRIMARY KEY (`Trabajador_Matricula`, `Tutorado_NControl`),
  INDEX `fk_Trabajador_has_Tutorado_Tutorado1_idx` (`Tutorado_NControl` ASC),
  INDEX `fk_Trabajador_has_Tutorado_Trabajador1_idx` (`Trabajador_Matricula` ASC),
  CONSTRAINT `fk_Trabajador_has_Tutorado_Trabajador1`
    FOREIGN KEY (`Trabajador_Matricula`)
    REFERENCES `sistutorias`.`Trabajador` (`Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_has_Tutorado_Tutorado1`
    FOREIGN KEY (`Tutorado_NControl`)
    REFERENCES `sistutorias`.`Tutorado` (`NControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Bajas_Tutorados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Bajas_Tutorados` (
  `Tutorado_NControl` INT(12) NOT NULL,
  `Periodo_idPeriodo` INT NOT NULL,
  `Motivos` VARCHAR(45) NULL,
  INDEX `fk_Bajas_Tutorados_Tutorado1_idx` (`Tutorado_NControl` ASC),
  INDEX `fk_Bajas_Tutorados_Periodo1_idx` (`Periodo_idPeriodo` ASC),
  PRIMARY KEY (`Periodo_idPeriodo`, `Tutorado_NControl`),
  CONSTRAINT `fk_Bajas_Tutorados_Tutorado1`
    FOREIGN KEY (`Tutorado_NControl`)
    REFERENCES `sistutorias`.`Tutorado` (`NControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bajas_Tutorados_Periodo1`
    FOREIGN KEY (`Periodo_idPeriodo`)
    REFERENCES `sistutorias`.`Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`SoliCambioT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`SoliCambioT` (
  `idSoliCambioT` INT NOT NULL,
  `Periodo_idPeriodo` INT NOT NULL,
  `Trabajador_Matriculaanterior` VARCHAR(45) NULL,
  `Trabajador_Matriculanuevo` VARCHAR(45) NULL,
  `Tutorado_NControl` INT(12) NOT NULL,
  `fecha_solicitud` DATE NOT NULL,
  `estado` TINYINT NOT NULL,
  PRIMARY KEY (`idSoliCambioT`),
  INDEX `fk_SoliCambioT_Periodo1_idx` (`Periodo_idPeriodo` ASC),
  INDEX `fk_SoliCambioT_Trabajador1_idx` (`Trabajador_Matriculaanterior` ASC),
  INDEX `fk_SoliCambioT_Trabajador2_idx` (`Trabajador_Matriculanuevo` ASC),
  INDEX `fk_SoliCambioT_Tutorado1_idx` (`Tutorado_NControl` ASC),
  CONSTRAINT `fk_SoliCambioT_Periodo1`
    FOREIGN KEY (`Periodo_idPeriodo`)
    REFERENCES `sistutorias`.`Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SoliCambioT_Trabajador1`
    FOREIGN KEY (`Trabajador_Matriculaanterior`)
    REFERENCES `sistutorias`.`Trabajador` (`Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SoliCambioT_Trabajador2`
    FOREIGN KEY (`Trabajador_Matriculanuevo`)
    REFERENCES `sistutorias`.`Trabajador` (`Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SoliCambioT_Tutorado1`
    FOREIGN KEY (`Tutorado_NControl`)
    REFERENCES `sistutorias`.`Tutorado` (`NControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Mensajes` (
  `idMensajes` INT NOT NULL AUTO_INCREMENT,
  `Asunto` VARCHAR(50) NULL,
  `Mensaje` VARCHAR(500) NULL,
  `Fecha` DATE NULL,
  `Estado` BOOLEAN NOT NULL,
  `idPersonaRemitente` INT UNSIGNED NOT NULL,
  `idPersonaDestinatario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idMensajes`),
  INDEX `fk_Mensajes_Persona1_idx` (`idPersonaRemitente` ASC),
  INDEX `fk_Mensajes_Persona2_idx` (`idPersonaDestinatario` ASC),
  CONSTRAINT `fk_Mensajes_Persona1`
    FOREIGN KEY (`idPersonaRemitente`)
    REFERENCES `sistutorias`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mensajes_Persona2`
    FOREIGN KEY (`idPersonaDestinatario`)
    REFERENCES `sistutorias`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;