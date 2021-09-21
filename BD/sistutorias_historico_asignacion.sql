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
-- Table structure for table `historico_asignacion`
--

DROP TABLE IF EXISTS `historico_asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historico_asignacion` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_asignacion`
--

LOCK TABLES `historico_asignacion` WRITE;
/*!40000 ALTER TABLE `historico_asignacion` DISABLE KEYS */;
INSERT INTO `historico_asignacion` VALUES ('138202116190437',16190437,'99173','2021-08-13'),('1727138202116190437',16190437,'29956','2021-08-13'),('1736138202116190437',16190437,'29956','2021-08-13'),('1749138202116190437',16190437,'93510','2021-08-13'),('194959202116190437',16190437,'45356','2021-09-05'),('195759202116190437',16190437,'38721','2021-09-05');
/*!40000 ALTER TABLE `historico_asignacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-20 20:50:50
