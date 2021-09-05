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
-- Table structure for table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividades` (
  `idActividades` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Semestrerealizacion_sug` int(11) DEFAULT NULL,
  `Semestre_obligatorio` tinyint(4) NOT NULL DEFAULT '0',
  `Fecha_registro` date DEFAULT NULL,
  `URLFormato` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idActividades`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades`
--

LOCK TABLES `actividades` WRITE;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` VALUES (3016,'Análisis Foda','Descripcion',4,0,'2018-08-27','directory/formats/AnalisisFoda.pdf'),(3774,'Ficha de identificación del tutorado','Descripcion',1,0,'2018-08-24','directory/formats/Fichadeidentificacióndeltutorado.pdf'),(3875,' Encuesta habilidades de estudio','Descripcion',5,0,'2018-08-28','directory/formats/Encuestahabilidadesdeestudio.pdf'),(4939,'Formato de entrevista','Descripcion',2,0,'2018-08-25','directory/formats/Formatodeentrevista.pdf'),(6009,'Test de asertividad','Descripcion',7,0,'2018-08-30','directory/formats/testdeasertividad.pdf'),(8123,'Linea de vida','Descripcion',3,0,'2018-08-26','directory/formats/Lineadevida.pdf'),(8595,'Test de Autoestima','Descripcion',6,0,'2018-08-29','directory/formats/TestdeAutoestima.pdf'),(34245,'Kardes 1er Semetre','Envio de kardex',4,1,'2021-08-11','/directory/formats/34245_Kardes 1er Semetre.pdf'),(354654,'Kardex inicial','envio de kardex',2,1,'2021-08-11','/directory/formats/354654_Kardex inicial.pdf');
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;
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
