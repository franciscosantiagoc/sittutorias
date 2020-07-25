
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
-- Table `sistutorias`.`Generacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Generacion` (
  `idGeneracion` INT NOT NULL,
  `fecha_inicio` DATE NULL,
  `fecha_fin` DATE NULL,
  PRIMARY KEY (`idGeneracion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Tutorado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Tutorado` (
  `NControl` INT NOT NULL UNIQUE,
  `Persona_idPersona` INT UNSIGNED NOT NULL UNIQUE,
  `Carrera_idCarrera` VARCHAR(15) NOT NULL,
  `contrasena` VARCHAR(45) NULL,
  `Generacion_idGeneracion` INT NOT NULL,
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
  CONSTRAINT `fk_Tutorado_Generacion1`
    FOREIGN KEY (`Generacion_idGeneracion`)
    REFERENCES `sistutorias`.`Generacion` (`idGeneracion`)
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
  `Semestrerealizacion_sug` INT NULL,
  `Fecha_asig` DATE NULL,
  `URLFormato` VARCHAR(200) NULL,
  PRIMARY KEY (`idActividades`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Actividades_Asignadas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Actividades_Asignadas` (
  `Actividades_idActividades` INT NOT NULL,
  `Tutorado_NControl` INT NOT NULL,
  `fecha_elaboracion` DATE NULL,
  PRIMARY KEY (`Actividades_idActividades`, `Tutorado_NControl`),
  INDEX `fk_Actividades_has_Trabajador_Actividades1_idx` (`Actividades_idActividades` ASC) ,
  INDEX `fk_Actividades_Asignadas_Tutorado1_idx` (`Tutorado_NControl` ASC),
  CONSTRAINT `fk_Actividades_has_Trabajador_Actividades1`
    FOREIGN KEY (`Actividades_idActividades`)
    REFERENCES `sistutorias`.`Actividades` (`idActividades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`Trabajador_Tutorados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`Trabajador_Tutorados` (
  `Trabajador_Matricula` VARCHAR(45) NOT NULL,
  `Tutorado_NControl` INT NOT NULL,
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
  `idBaja` INT NOT NULL,
  `Tutorado_NControl` INT NOT NULL,
  `Motivos` VARCHAR(45) NULL,
  `Fecha_baja` DATE NULL,
  INDEX `fk_Bajas_Tutorados_Tutorado1_idx` (`Tutorado_NControl` ASC),
  PRIMARY KEY (`idBaja`),
  CONSTRAINT `fk_Bajas_Tutorados_Tutorado1`
    FOREIGN KEY (`Tutorado_NControl`)
    REFERENCES `sistutorias`.`Tutorado` (`NControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistutorias`.`SoliCambioT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistutorias`.`SoliCambioT` (
  `idSoliCambioT` INT NOT NULL,
  `Trabajador_Matriculaanterior` VARCHAR(45) NULL,
  `Trabajador_Matriculanuevo` VARCHAR(45) NULL,
  `Tutorado_NControl` INT NOT NULL,
  `fecha_solicitud` DATE NOT NULL,
  `estado` TINYINT NOT NULL,
  PRIMARY KEY (`idSoliCambioT`),
  INDEX `fk_SoliCambioT_Trabajador1_idx` (`Trabajador_Matriculaanterior` ASC),
  INDEX `fk_SoliCambioT_Trabajador2_idx` (`Trabajador_Matriculanuevo` ASC),
  INDEX `fk_SoliCambioT_Tutorado1_idx` (`Tutorado_NControl` ASC),
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
  `Estado` VARCHAR (15) NOT NULL,
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



-- -----------------------------------------------------
--INSERCION DE DATOS DE Persona
-- -----------------------------------------------------
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Usmar Isacc','Miguel','Lopez','1999/10/16','M','LopezMiguelUs@gmail.com','9717995120','direccion prueba','Ixtepec','/directory/img-person/UsmarIsaccMiguel.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Giovanni Alexander','Morales','Lopez','1999/04/11','M','LopezMoralesGi@gmail.com','9714324512','direccion prueba','Ixtaltepec','/directory/img-person/GiovanniAlexanderMorales.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Roel','Morales','Orozco','1998/05/06','M','OrozcoMoralesRo@gmail.com','9714860957','direccion prueba','Juchitán','/directory/img-person/RoelMorales.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Karina','Nuñez','Silva','1999/05/07','F','SilvaNuñezKa@gmail.com','9712623032','direccion prueba','Ixtepec','/directory/img-person/KarinaNuñez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Kenia','Orozco','Cruz','1999/10/31','F','CruzOrozcoKe@gmail.com','9712793311','direccion prueba','Salina Cruz','/directory/img-person/KeniaOrozco.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Dennis Sabas','Orozco','Bautista','1999/01/23','F','BautistaOrozcoDe@gmail.com','9713721570','direccion prueba','Juchitán','/directory/img-person/DennisSabasOrozco.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Carlos Roberto','Ortiz','Matus','1999/05/17','M','MatusOrtizCa@gmail.com','9718332712','direccion prueba','Salina Cruz','/directory/img-person/CarlosRobertoOrtiz.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Isis Yamile','Altamirano','Solano','1998/05/03','F','SolanoAltamiranoIs@gmail.com','9718259758','direccion prueba','Ixtepec','/directory/img-person/IsisYamileAltamirano.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Fátima','Antinio','Sanchez','1999/01/08','F','SanchezAntinioFá@gmail.com','9716330120','direccion prueba','Juchitán','/directory/img-person/FátimaAntinio.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Itzury Alejandra','Aquino','Cruz','1999/12/27','F','CruzAquinoIt@gmail.com','9716802586','direccion prueba','Chicapa','/directory/img-person/ItzuryAlejandraAquino.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Vicente','Aquino','Regalado','1999/10/11','M','RegaladoAquinoVi@gmail.com','9712106115','direccion prueba','Juchitán','/directory/img-person/VicenteAquino.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Baudel','Aranjo','Benitez','1999/12/03','M','BenitezAranjoBa@gmail.com','9717592062','direccion prueba','Espinal','/directory/img-person/BaudelAranjo.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Yosmar Manuel','Avedaño','Morales','1999/11/14','M','MoralesAvedañoYo@gmail.com','9716019661','direccion prueba','Ixtaltepec','/directory/img-person/YosmarManuelAvedaño.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Brian','Benefield','Morales','1999/07/26','M','MoralesBenefieldBr@gmail.com','9714772466','direccion prueba','Unión Hidalgo','/directory/img-person/BrianBenefield.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Kevin Gabriel','Zarate','Velasquez','1998/07/08','M','VelasquezZarateKe@gmail.com','9712498199','direccion prueba','Chicapa','/directory/img-person/KevinGabrielZarate.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Jesus Antonio','Zarate','Villalobos','1999/04/23','M','VillalobosZarateJe@gmail.com','9716213801','direccion prueba','Juchitán','/directory/img-person/JesusAntonioZarate.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Clarissa','Zavala','Jiménez','1999/09/01','F','JiménezZavalaCl@gmail.com','9715339317','direccion prueba','Chicapa','/directory/img-person/ClarissaZavala.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Alba Beatriz','Aguilar','Ulises','1999/06/03','F','UlisesAguilarAl@gmail.com','9714414298','direccion prueba','Ixtepec','/directory/img-person/AlbaBeatrizAguilar.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Luis','Fuentes','de Jesus','1999/12/21','M','de JesusFuentesLu@gmail.com','9713345356','direccion prueba','Espinal','/directory/img-person/LuisFuentes.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Maytor','Revuelta','Rosado','1999/11/27','M','RosadoRevueltaMa@gmail.com','9713195036','direccion prueba','Juchitán','/directory/img-person/MaytorRevuelta.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Jorge','Robles','Luis','1999/04/27','M','LuisRoblesJo@gmail.com','9714341427','direccion prueba','Tehuantepec','/directory/img-person/JorgeRobles.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Sergio','Rodas','Escobar','1998/11/27','M','EscobarRodasSe@gmail.com','9713849923','direccion prueba','Unión Hidalgo','/directory/img-person/SergioRodas.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Brisa Donaji','Ruiz','Sanchez','1999/01/08','F','SanchezRuizBr@gmail.com','9716521066','direccion prueba','Ixtaltepec','/directory/img-person/BrisaDonajiRuiz.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Jair Michael','Ruiz','Vicente','1999/10/12','M','VicenteRuizJa@gmail.com','9715469345','direccion prueba','Tehuantepec','/directory/img-person/JairMichaelRuiz.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('José Guillermo','Gonzales','Lopez','1999/01/22','M','LopezGonzalesJo@gmail.com','9711561046','direccion prueba','Juchitán','/directory/img-person/JoséGuillermoGonzales.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Francisco','Santiago','de la Cruz','1998/10/29','M','CruzSantiagoFr@gmail.com','9711744464','direccion prueba','Juchitán','/directory/img-person/FranciscoSantiago.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Luis Alberto','Robles','Parada','1998/04/03','M','ParadaRoblesLu@gmail.com','9719614394','direccion prueba','Tehuantepec','/directory/img-person/Luis AlbertoRobles.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Juan Carlos','Fernández','Piñon','1998/04/03','M','PiñonFernándezJu@gmail.com','9715787642','direccion prueba','Ixtepec','/directory/img-person/Juan CarlosFernández.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Emanuel','Enríquez','Couder','1998/11/30','M','CouderEnríquezEm@gmail.com','9719665488','direccion prueba','Guevea','/directory/img-person/EmanuelEnríquez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Humberto','Toledo','Fuentes','1998/06/23','M','FuentesToledoHu@gmail.com','9718507158','direccion prueba','Ixtepec','/directory/img-person/HumbertoToledo.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Magda Guadalupe','Toledo','Jiménez','1999/09/16','F','JiménezToledoMa@gmail.com','9713483929','direccion prueba','Juchitán','/directory/img-person/MagdaGuadalupeToledo.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('David Zarif','Toledo','Pastelin','1999/10/14','M','PastelinToledoDa@gmail.com','9713978343','direccion prueba','Ixtepec','/directory/img-person/DavidZarifToledo.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Martha Iris','Toral','Hernandez','1999/01/23','F','HernandezToralMa@gmail.com','9711798052','direccion prueba','Tehuantepec','/directory/img-person/MarthaIrisToral.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Jose','Toral','Morales','1998/02/25','M','MoralesToralJo@gmail.com','9715967501','direccion prueba','Salina Cruz','/directory/img-person/JoseToral.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Carolina','Trujillo','Jiménez','1998/05/13','F','JiménezTrujilloCa@gmail.com','9717263162','direccion prueba','Ixtepec','/directory/img-person/CarolinaTrujillo.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Dalia Cenorina','Noriega','Alvarez','1999/07/18','F','AlvarezNoriegaDa@gmail.com','9713281854','direccion prueba','Ixtepec','/directory/img-person/DaliaCenorinaNoriega.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Daniel','Olivarez','Fuentes','1998/10/20','M','FuentesOlivarezDa@gmail.com','9711295750','direccion prueba','Tehuantepec','/directory/img-person/DanielOlivarez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Daniel','Ordaz','Morales','1998/03/24','M','MoralesOrdazDa@gmail.com','9717658594','direccion prueba','Ixtepec','/directory/img-person/DanielOrdaz.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Marco Antonio','Ordaz','Orozco','1999/04/26','M','OrozcoOrdazMa@gmail.com','9716012469','direccion prueba','Chicapa','/directory/img-person/MarcoAntonioOrdaz.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Jorge Antonio','Palomec','Lopez','1998/11/08','M','LopezPalomecJo@gmail.com','9712152501','direccion prueba','Tehuantepec','/directory/img-person/JorgeAntonioPalomec.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Pedro Alberto','Perez','Martínez','1999/03/14','M','MartínezPerezPe@gmail.com','9715094524','direccion prueba','Ixtepec','/directory/img-person/PedroAlbertoPerez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Elías','Ramírez','Lugo','1999/05/12','M','LugoRamírezEl@gmail.com','9716779058','direccion prueba','Juchitán','/directory/img-person/ElíasRamírez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Sergio Manuel','Ramos','Jose','1999/01/17','M','JoseRamosSe@gmail.com','9718404624','direccion prueba','Juchitán','/directory/img-person/SergioManuelRamos.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Carlos','Rasgado','López','1999/08/18','M','LópezRasgadoCa@gmail.com','9718326392','direccion prueba','Chicapa','/directory/img-person/CarlosRasgado.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('llliane Monserrat','Ruíz','Nuñez','1999/09/20','F','NuñezRuízll@gmail.com','9713854313','direccion prueba','Salina Cruz','/directory/img-person/lllianeMonserratRuíz.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Arnulfo','Ruíz','Sánchez','1999/06/17','M','SánchezRuízAr@gmail.com','9712820548','direccion prueba','Espinal','/directory/img-person/ArnulfoRuíz.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Esmeralda Yolotzin','Jiménez','Toledo','1999/04/28','F','ToledoJiménezEs@gmail.com','9711441871','direccion prueba','Unión Hidalgo','/directory/img-person/EsmeraldaYolotzinJiménez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Luis Alberto','Laureano','García','1999/07/17','M','GarcíaLaureanoLu@gmail.com','9714388238','direccion prueba','Salina Cruz','/directory/img-person/LuisAlbertoLaureano.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Edwin','López','Hernandez','1997/11/08','M','HernandezLópezEd@gmail.com','9715202809','direccion prueba','Unión Hidalgo','/directory/img-person/EdwinLópez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Kevin','López','López','1999/12/07','M','LópezLópezKe@gmail.com','9718406718','direccion prueba','Juchitán','/directory/img-person/KevinLópez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Rey David','López','López','1999/11/02','M','LópezLópezRe@gmail.com','9715018270','direccion prueba','Ixtepec','/directory/img-person/ReyDavidLópez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Vladimir Orion','López','Matus','1997/08/13','M','MatusLópezVl@gmail.com','9712271009','direccion prueba','Unión Hidalgo','/directory/img-person/VladimirOrionLópez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Patricia Dhamar','Martínez','Chicaty','1999/07/25','F','ChicatyMartínezPa@gmail.com','9719884435','direccion prueba','Ixtaltepec','/directory/img-person/PatriciaDhamarMartínez.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Guadalupe','Matus','Martínez','1998/03/16','F','MartínezMatusGu@gmail.com','9714017985','direccion prueba','Espinal','/directory/img-person/GuadalupeMatus.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('Jose Ismael','Matus','Ordaz','1999/05/14','M','OrdazMatusJo@gmail.com','9716540706','direccion prueba','Unión Hidalgo','/directory/img-person/JoseIsmaelMatus.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('VERA ALEXANDRO','ARAGON','REYES','1984-08-26','M','REYESARAGONVE@gmail.com','9718920270','direccion de prueba','Chicapa','/directory/img-person/VERAALEXANDROREYES.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('LORENA','PERALTA','GONZALEZ','1962-09-11','F','GONZALEZPERALTALO@gmail.com','9719384559','direccion de prueba','Espinal','/directory/img-person/LORENAGONZALEZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('LEONEL ADELFO','MEDINA','ALEGRIA','1971-05-10','M','ALEGRIAMEDINALE@gmail.com','9714692850','direccion de prueba','Ixtaltepec','/directory/img-person/LEONELADELFOALEGRIA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('BIENVENIDO ANGEL','UICAB','AYALA','1981-01-24','M','AYALAUICABBI@gmail.com','9716470322','direccion de prueba','Chicapa','/directory/img-person/BIENVENIDOANGELAYALA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('SAYONARA','OROZCO','ALVAREZ','1977-10-20','F','ALVAREZOROZCOSA@gmail.com','9711671138','direccion de prueba','Salina cruz','/directory/img-person/SAYONARAALVAREZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('VERONICA','OROZCO','NOLASCO','1990-12-01','F','NOLASCOOROZCOVE@gmail.com','9719199594','direccion de prueba','Salina cruz','/directory/img-person/VERONICANOLASCO.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('ALBINO','LOPEZ','LOPEZ','1962-01-24','M','LOPEZLOPEZAL@gmail.com','9714472540','direccion de prueba','Salina cruz','/directory/img-person/ALBINOLOPEZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('GICELA ALICIA','GOMEZ','PINEDA','1969-03-15','F','PINEDAGOMEZGI@gmail.com','9717024457','direccion de prueba','Chicapa','/directory/img-person/GICELAALICIAPINEDA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('IRMA FLOR','LOPEZ','GUERRA','1973-02-09','F','GUERRALOPEZIR@gmail.com','9713287678','direccion de prueba','Chicapa','/directory/img-person/IRMAFLORGUERRA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('MARIA DEL ROSARIO','NUÑEZ','LOPEZ','1970-07-20','F','LOPEZNUÑEZMA@gmail.com','9718557052','direccion de prueba','Espinal','/directory/img-person/MARIADELROSARIOLOPEZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('JOSE FELICIANO','LOPEZ','PERALES','1969-05-14','M','PERALESLOPEZJO@gmail.com','9716187488','direccion de prueba','Ixtaltepec','/directory/img-person/JOSEFELICIANOPERALES.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('MARIBEL','CASTILLEJOS','TOLEDO','1975-07-12','F','TOLEDOCASTILLEJOSMA@gmail.com','9712378043','direccion de prueba','Tehuantepec','/directory/img-person/MARIBELTOLEDO.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('JAVIER EDUARDO','ECHEVERRIA','ORTIZ','1960-10-01','M','ORTIZECHEVERRIAJA@gmail.com','9716397301','direccion de prueba','Ixtaltepec','/directory/img-person/JAVIEREDUARDOORTIZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('LUCIANO','TOLEDO','CRUZ','1977-04-09','M','CRUZTOLEDOLU@gmail.com','9714904778','direccion de prueba','Ixtepec','/directory/img-person/LUCIANOCRUZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('GASTON','DEHESA','VALENCIA','1981-07-04','M','VALENCIADEHESAGA@gmail.com','9714183592','direccion de prueba','Espinal','/directory/img-person/GASTONVALENCIA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('JOSE MANUEL','CASTILLEJOS','GONZALEZ','1981-06-07','M','GONZALEZCASTILLEJOSJO@gmail.com','9714704422','direccion de prueba','Ixtepec','/directory/img-person/JOSEMANUELGONZALEZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('JORGE','MARANTO','IGLECIAS','1968-09-29','M','IGLECIASMARANTOJO@gmail.com','9719707889','direccion de prueba','Ixtepec','/directory/img-person/JORGEIGLECIAS.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('JUVENAL','RASGADO','SANCHEZ','1969-01-30','M','SANCHEZRASGADOJU@gmail.com','9711701459','direccion de prueba','Juchitán','/directory/img-person/JUVENALSANCHEZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('MARIANO','BLAS','SANCHEZ','1984-06-24','M','SANCHEZBLASMA@gmail.com','9711902494','direccion de prueba','Chicapa','/directory/img-person/MARIANOSANCHEZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('JOSE ANTONIO','LOPEZ','POSADA','1961-09-13','M','POSADALOPEZJO@gmail.com','9717607379','direccion de prueba','Chicapa','/directory/img-person/JOSEANTONIOPOSADA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('JESUS','LOPEZ','CHIRINOS','1978-07-29','M','CHIRINOSLOPEZJE@gmail.com','9715715806','direccion de prueba','Espinal','/directory/img-person/JESUSCHIRINOS.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('ALEIDA','OROZCO','SANCHEZ','1983-10-04','F','SANCHEZOROZCOAL@gmail.com','9713945180','direccion de prueba','Espinal','/directory/img-person/ALEIDASANCHEZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('MARIO','NUÑEZ','CORDOVA','1969-12-07','M','CORDOVANUÑEZMA@gmail.com','9711885289','direccion de prueba','Juchitán','/directory/img-person/MARIOCORDOVA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('MARIA ISABEL','GOMEZ','VALDIVIESO','1968-10-10','F','VALDIVIESOGOMEZMA@gmail.com','9716011990','direccion de prueba','Tehuantepec','/directory/img-person/MARIAISABELVALDIVIESO.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('ANGEL','OLIVARES','PEREZ','1980-10-21','M','PEREZOLIVARESAN@gmail.com','9716192621','direccion de prueba','Ixtepec','/directory/img-person/ANGELPEREZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('IRMA','QUIÑONES','PINEDA','1967-04-30','F','PINEDAQUIÑONESIR@gmail.com','9718683195','direccion de prueba','Tehuantepec','/directory/img-person/IRMAPINEDA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('IVAN','RUIZ','SANCHEZ','1989-04-29','M','SANCHEZRUIZIV@gmail.com','9719497746','direccion de prueba','Juchitán','/directory/img-person/IVANSANCHEZ.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('FLAVIO AQUILES','RUIZ','CELAYA','1976-04-21','M','CELAYARUIZFL@gmail.com','9715067184','direccion de prueba','Ixtepec','/directory/img-person/FLAVIOAQUILESCELAYA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('ALBERTO','RAMIREZ','REGALADO','1980-10-21','M','REGALADORAMIREZAL@gmail.com','9718583372','direccion de prueba','Unión Hidalgo','/directory/img-person/ALBERTOREGALADO.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('DANIEL','GARCIA','OROZCO','1964-12-08','M','OROZCOGARCIADA@gmail.com','9716232169','direccion de prueba','Salina cruz','/directory/img-person/DANIELOROZCO.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('RUBEN','MEDINA','VARELA','1984-03-31','M','VARELAMEDINARU@gmail.com','9719987378','direccion de prueba','Unión Hidalgo','/directory/img-person/RUBENVARELA.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('RANULFO','RIVERA','CASTILLO','1975-09-25','M','CASTILLORIVERARA@gmail.com','9712325600','direccion de prueba','Unión Hidalgo','/directory/img-person/RANULFOCASTILLO.jpg');
INSERT INTO persona (Nombre,APaterno,AMaterno,FechaNac,Sexo,Correo,NTelefono,Direccion,Ciudad,Foto) VALUES ('VICTOR MANUEL','JIMÉNEZ','CRUZ','1957-06-11','M','CRUZJIMÉNEZVI@gmail.com','9715765171','direccion de prueba','Juchitán','/directory/img-person/VICTORMANUELJIMENEZ.jpg');



-- -----------------------------------------------------
--INSERCION DE DATOS DE AREA
-- -----------------------------------------------------
INSERT INTO areas (idAreas,Nombre,Descripcion) values (31462,'Arquitectura y construcción','Ejemplo de descripción');
INSERT INTO areas (idAreas,Nombre,Descripcion) values (27313,'Contabilidad y Gestión de Impuestos','Ejemplo de descripción');
INSERT INTO areas (idAreas,Nombre,Descripcion) values (48193,'Ingeniería y Tecnología','Ejemplo de descripción');
INSERT INTO areas (idAreas,Nombre,Descripcion) values (52767,'Administración y Gestión de Empresas','Ejemplo de descripción');
INSERT INTO areas (idAreas,Nombre,Descripcion) values (33604,'Informática','Ejemplo de descripción');

-- -----------------------------------------------------
--INSERCION DE DATOS DE TRABAJADOR
-- -----------------------------------------------------
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('21147',56,'Docentes',48193,'21147','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('18828',57,'Docentes',48193,'18828','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('107639',58,'Docentes',48193,'107639','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('71179',59,'Docentes',48193,'71179','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('47818',60,'Docentes',48193,'47818','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('96451',61,'Docentes',48193,'96451','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('8026',62,'Docentes',48193,'8026','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('107776',63,'Docentes',48193,'107776','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('43231',64,'Docentes',48193,'43231','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('93510',65,'Docentes',48193,'93510','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('81823',66,'Docentes',48193,'81823','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('1114',67,'Coordinador De Carrera',48193,'1114','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('19703',68,'Docentes',48193,'19703','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('96850',69,'Docentes',48193,'96850','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('103910',70,'Docentes',48193,'103910','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('69113',71,'Docentes',48193,'69113','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('2265',72,'Docentes',48193,'2265','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('85748',73,'Docentes',48193,'85748','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('14636',74,'Docentes',48193,'14636','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('96163',75,'Docentes',48193,'96163','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('85067',76,'Docentes',48193,'85067','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('45957',77,'Docentes',48193,'45957','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('52000',78,'Docentes',48193,'52000','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('74899',79,'Docentes',48193,'74899','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('45356',80,'Docentes',48193,'45356','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('106482',81,'Docentes',48193,'106482','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('78949',82,'Coordinador De Area',48193,'78949','Inactivo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('90699',83,'Docentes',48193,'90699','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('29956',84,'Docentes',48193,'29956','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('38721',85,'Docentes',48193,'38721','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('59341',86,'Docentes',48193,'59341','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('99173',87,'Docentes',48193,'99173','Activo');
INSERT INTO trabajador (Matricula, Persona_idPersona,Roll,Areas_idAreas, contraseña, Estado) values ('22406',88,'Admin',48193,'22406','Inactivo');


-- -----------------------------------------------------
--INSERCION DE DATOS DE CARRERA
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('46813',31462,'Arquitectura');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('50467',27313,'Contador Público');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('45262',31462,'Ingeniería Civil');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('74816',48193,'Ingeniería Eléctrica');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('19819',48193,'Ingeniería Electromecánica');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('45504',52767,'Ingeniería en Gestión Empresarial');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('68352',48193,'Ingeniería en Sistemas Computacionales');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('39281',48193,'Ingeniería Industrial');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('73529',33604,'Ingeniería Informática');
INSERT INTO carrera (idCarrera,Areas_idAreas,Nombre) values ('22768',48193,'Ingeniería Mecánica');
-- -----------------------------------------------------


-- -----------------------------------------------------
--INSERCION DE DATOS DE GENERACION
-- -----------------------------------------------------
INSERT INTO generacion (idGeneracion, Fecha_inicio,Fecha_Fin) values (416,'2016-08-12','2021-07-20');
INSERT INTO generacion (idGeneracion, Fecha_inicio,Fecha_Fin) values (478,'2017-08-12','2022-07-20');
INSERT INTO generacion (idGeneracion, Fecha_inicio,Fecha_Fin) values (721,'2018-08-12','2023-07-20');
INSERT INTO generacion (idGeneracion, Fecha_inicio,Fecha_Fin) values (161,'2019-08-12','2024-07-20');
INSERT INTO generacion (idGeneracion, Fecha_inicio,Fecha_Fin) values (952,'2020-08-12','2025-07-20');


-- -----------------------------------------------------
--INSERCION DE DATOS DE TUTORADO
-- -----------------------------------------------------
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190857,1,'68352','17190857',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190605,2,'68352','17190605',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190664,3,'68352','17190664',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190458,4,'68352','17190458',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190856,5,'68352','17190856',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190573,6,'68352','17190573',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190536,7,'68352','17190536',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190849,8,'68352','17190849',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190615,9,'68352','17190615',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190722,10,'68352','17190722',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190815,11,'68352','17190815',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190867,12,'68352','17190867',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190810,13,'68352','17190810',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190836,14,'68352','17190836',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190577,15,'68352','17190577',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190461,16,'68352','17190461',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190790,17,'68352','17190790',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190019,18,'68352','17190019',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190005,19,'68352','17190005',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190574,20,'68352','17190574',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190575,21,'68352','17190575',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190521,22,'68352','17190521',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190476,23,'68352','17190476',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190459,24,'68352','17190459',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (17190775,25,'68352','17190775',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (16190437,26,'68352','16190437',416);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (16190359,27,'68352','16190359',416);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (16190439,28,'68352','16190439',416);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (16190417,29,'68352','16190417',416);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (16190331,30,'68352','16190331',416);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190684,31,'68352','18190684',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190887,32,'68352','18190887',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190588,33,'68352','18190588',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190832,34,'68352','18190832',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190854,35,'68352','18190854',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190867,36,'46813','18190867',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190776,37,'46813','18190776',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190712,38,'46813','18190712',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190522,39,'46813','18190522',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190666,40,'50467','18190666',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190791,41,'50467','18190791',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190611,42,'45262','18190611',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190568,43,'45262','18190568',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190767,44,'74816','18190767',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190667,45,'74816','18190667',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190491,46,'19819','18190491',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190580,47,'45504','18190580',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190534,48,'68352','18190534',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190853,49,'39281','18190853',721);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190707,50,'73529','18190707',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190863,51,'22768','18190863',478);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190774,52,'22768','18190774',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190495,53,'19819','18190495',161);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190665,54,'45504','18190665',952);
INSERT INTO tutorado (NControl,Persona_idPersona,Carrera_idCarrera,contrasena,Generacion_idGeneracion) values (18190763,55,'19819','18190763',952);


-- -----------------------------------------------------
--INSERCION DE DATOS DE ACTIVIDADES
-- -----------------------------------------------------
INSERT INTO actividades(idActividades, Nombre, Descripcion, Semestrerealizacion_sug, Fecha_asig, URLFormato) values (3774,'Ficha de identificación del tutorado','Descripcion',1,'2018-08-24','tutorias/directory/formats/Ficha de identificación del tutorado.pdf');
INSERT INTO actividades(idActividades, Nombre, Descripcion, Semestrerealizacion_sug, Fecha_asig, URLFormato) values (4939,'Formato de entrevista','Descripcion',2,'2018-08-25','tutorias/directory/formats/Formato de entrevista.pdf');
INSERT INTO actividades(idActividades, Nombre, Descripcion, Semestrerealizacion_sug, Fecha_asig, URLFormato) values (8123,'Linea de vida','Descripcion',3,'2018-08-26','tutorias/directory/formats/Linea de vida.pdf');
INSERT INTO actividades(idActividades, Nombre, Descripcion, Semestrerealizacion_sug, Fecha_asig, URLFormato) values (3016,'Análisis Foda','Descripcion',4,'2018-08-27','tutorias/directory/formats/Análisis Foda.pdf');
INSERT INTO actividades(idActividades, Nombre, Descripcion, Semestrerealizacion_sug, Fecha_asig, URLFormato) values (3875,' Encuesta habilidades de estudio','Descripcion',5,'2018-08-28','tutorias/directory/formats/ Encuesta habilidades de estudio.pdf');
INSERT INTO actividades(idActividades, Nombre, Descripcion, Semestrerealizacion_sug, Fecha_asig, URLFormato) values (8595,'Test de Autoestima','Descripcion',6,'2018-08-29','tutorias/directory/formats/Test de Autoestima.pdf');
INSERT INTO actividades(idActividades, Nombre, Descripcion, Semestrerealizacion_sug, Fecha_asig, URLFormato) values (6009,'est de asertividad','Descripcion',7,'2018-08-30','tutorias/directory/formats/est de asertividad.pdf');


-- -----------------------------------------------------
--INSERCION DE DATOS DE MENSAJES
-- -----------------------------------------------------
INSERT INTO mensajes (idMensajes,Asunto,Mensaje,Fecha,Estado,idPersonaRemitente,idPersonaDestinatario) values (1,'Corrección de datos','Necesitas actualizar','2020-10-12',False,67,73);
INSERT INTO mensajes (idMensajes,Asunto,Mensaje,Fecha,Estado,idPersonaRemitente,idPersonaDestinatario) values (2,'Solicitud de constancia','Datos faltantes en el documento','2020-12-12',True,67,20);
INSERT INTO mensajes (idMensajes,Asunto,Mensaje,Fecha,Estado,idPersonaRemitente,idPersonaDestinatario) values (3,'Tramite de constancia','Falta dirección','2020-08-02',True,60,31);
INSERT INTO mensajes (idMensajes,Asunto,Mensaje,Fecha,Estado,idPersonaRemitente,idPersonaDestinatario) values (4,'Verificación de actividad foda','Falta dato de la fortaleza','2020-05-09',True,81,46);
INSERT INTO mensajes (idMensajes,Asunto,Mensaje,Fecha,Estado,idPersonaRemitente,idPersonaDestinatario) values (5,'Verificación de actividad linea de vida','Agregar el nombre del alumno','2020-04-14',False,75,30);

