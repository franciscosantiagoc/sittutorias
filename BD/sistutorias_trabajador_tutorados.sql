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
-- Table structure for table `trabajador_tutorados`
--

DROP TABLE IF EXISTS `trabajador_tutorados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajador_tutorados` (
  `Trabajador_Matricula` varchar(45) NOT NULL,
  `Tutorado_NControl` int(11) NOT NULL,
  `fecha_asig` date DEFAULT NULL,
  PRIMARY KEY (`Trabajador_Matricula`,`Tutorado_NControl`),
  KEY `fk_Trabajador_has_Tutorado_Tutorado1_idx` (`Tutorado_NControl`),
  KEY `fk_Trabajador_has_Tutorado_Trabajador1_idx` (`Trabajador_Matricula`),
  CONSTRAINT `fk_Trabajador_has_Tutorado_Trabajador1` FOREIGN KEY (`Trabajador_Matricula`) REFERENCES `trabajador` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_has_Tutorado_Tutorado1` FOREIGN KEY (`Tutorado_NControl`) REFERENCES `tutorado` (`NControl`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador_tutorados`
--

LOCK TABLES `trabajador_tutorados` WRITE;
/*!40000 ALTER TABLE `trabajador_tutorados` DISABLE KEYS */;
INSERT INTO `trabajador_tutorados` VALUES ('29956',16190359,'2021-07-21'),('38721',16190437,'2021-07-21'),('96850',17190458,'2021-11-08'),('96850',17190664,'2021-03-14'),('99173',17190605,'2021-10-15'),('99173',17190857,'2021-07-28');
/*!40000 ALTER TABLE `trabajador_tutorados` ENABLE KEYS */;
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
