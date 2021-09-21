-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: sistutorias
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajador` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES ('103910',70,'Docente',48193,'103910','Activo','1',''),('106482',81,'Docente',48193,'106482','Activo','1',''),('107639',58,'Docente',48193,'107639','Activo','0',''),('107776',63,'Docente',48193,'107776','Activo','1',''),('1114',67,'Coordinador de Carrera',48193,'1114','Activo','1',''),('14636',74,'Docente',48193,'14636','Activo','0',''),('15427810',141,'Coordinador de Area',33604,'c0RvM0xJQWZQU1lwajh1WDZ4TUtWZz09','Inactivo','1',''),('18720421',142,'Coordinador de Area',52767,'Q25DTWhyNlhxNzNjYmgra1pZdUsvZz09','Inactivo','0',''),('18828',57,'Docente',48193,'18828','Activo','1',''),('19703',68,'Docente',48193,'19703','Activo','1',''),('21147',56,'Docente',48193,'21147','Activo','1',''),('22406',88,'Admin',48193,'22406','Inactivo','1',''),('2265',72,'Docente',48193,'2265','Activo','0',''),('29956',84,'Docente',48193,'29956','Activo','1',''),('38721',85,'Docente',48193,'38721','Activo','1',''),('43231',64,'Docente',48193,'43231','Activo','0',''),('45356',80,'Docente',48193,'45356','Activo','1',''),('45957',77,'Docente',48193,'45957','Activo','1',''),('47818',60,'Docente',48193,'47818','Activo','1',''),('52000',78,'Docente',48193,'52000','Activo','0',''),('59341',86,'Docente',48193,'59341','Activo','1',''),('69113',71,'Docente',48193,'69113','Activo','1',''),('71179',59,'Docente',48193,'71179','Activo','1',''),('74899',79,'Docente',48193,'74899','Activo','1',''),('78949',82,'Coordinador de Area',48193,'78949','Activo','0',''),('8026',62,'Docente',48193,'8026','Activo','1',''),('81823',66,'Docente',48193,'81823','Activo','1',''),('85067',76,'Docente',48193,'85067','Activo','1',''),('85748',73,'Docente',48193,'85748','Activo','1',''),('90699',83,'Docente',48193,'90699','Activo','0',''),('93510',65,'Docente',48193,'93510','Activo','1',''),('96163',75,'Docente',48193,'96163','Activo','1',''),('96451',61,'Docente',48193,'96451','Activo','0',''),('96850',69,'Docente',48193,'96850','Activo','1',''),('99173',87,'Docente',48193,'99173','Activo','0','');
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-20 20:50:51
