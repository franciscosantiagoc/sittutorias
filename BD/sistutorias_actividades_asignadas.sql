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
-- Table structure for table `actividades_asignadas`
--

DROP TABLE IF EXISTS `actividades_asignadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividades_asignadas` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades_asignadas`
--

LOCK TABLES `actividades_asignadas` WRITE;
/*!40000 ALTER TABLE `actividades_asignadas` DISABLE KEYS */;
INSERT INTO `actividades_asignadas` VALUES (3016,16190437,'/directory/Activitiesdelivered/3016_16190437.pdf','2021-08-07','Validado','8',NULL),(3016,17190521,'/directory/Activitiesdelivered/3016_17190521.pdf','2021-08-18','En espera',NULL,NULL),(3774,16190331,'/directory/Activitiesdelivered/3774_16190331.pdf','2021-08-18','En espera',NULL,NULL),(3774,16190437,'/directory/Activitiesdelivered/3774_16190437.pdf','2021-08-17','En espera',NULL,NULL),(3774,17190521,'/directory/Activitiesdelivered/3774_17190521.pdf','2021-08-18','En espera',NULL,NULL),(3774,17190573,'/directory/Activitiesdelivered/3774_17190573.pdf','2021-08-18','En espera',NULL,NULL),(3774,17190857,'/directory/Activitiesdelivered/3774_17190857.pdf','2021-08-16','Validado','5',NULL),(3875,16190417,'/directory/Activitiesdelivered/3875_16190417.pdf','2021-08-18','En espera',NULL,NULL),(3875,16190437,'/directory/Activitiesdelivered/3875_16190437.pdf','2021-08-07','Validado','9',NULL),(3875,17190573,'/directory/Activitiesdelivered/3875_17190573.pdf','2021-08-18','En espera',NULL,NULL),(4939,16190331,'/directory/Activitiesdelivered/4939_16190331.pdf','2021-08-18','En espera',NULL,NULL),(4939,16190437,'/directory/Activitiesdelivered/4939_16190437.pdf','2021-08-17','Validado','5',NULL),(6009,16190331,'/directory/Activitiesdelivered/6009_16190331.pdf','2021-08-18','En espera',NULL,NULL),(8595,16190417,'/directory/Activitiesdelivered/8595_16190417.pdf','2021-08-18','En espera',NULL,NULL),(34245,16190331,'/directory/Activitiesdelivered/34245_16190331.pdf','2021-08-18','En espera',NULL,NULL),(34245,16190417,'/directory/Activitiesdelivered/34245_16190417.pdf','2021-08-18','En espera',NULL,NULL),(34245,17190521,'/directory/Activitiesdelivered/34245_17190521.pdf','2021-08-18','En espera',NULL,NULL),(34245,17190573,'/directory/Activitiesdelivered/34245_17190573.pdf','2021-08-18','En espera',NULL,NULL),(354654,16190417,'/directory/Activitiesdelivered/354654_16190417.pdf','2021-08-18','En espera',NULL,NULL),(354654,16190437,'/directory/Activitiesdelivered/354654_16190437.pdf','2021-08-12','Validado','9',NULL),(354654,17190521,'/directory/Activitiesdelivered/354654_17190521.pdf','2021-08-18','En espera',NULL,NULL),(354654,17190573,'/directory/Activitiesdelivered/354654_17190573.pdf','2021-08-18','En espera',NULL,NULL);
/*!40000 ALTER TABLE `actividades_asignadas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-04 22:40:11
