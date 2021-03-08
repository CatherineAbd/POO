CREATE DATABASE  IF NOT EXISTS `locaauto` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `locaauto`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: locaauto
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `parkcar`
--

DROP TABLE IF EXISTS `parkcar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `parkcar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbKm` int(11) NOT NULL,
  `archived` tinyint(1) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `id_agency` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parkCar_color_FK` (`id_color`),
  KEY `parkCar_car0_FK` (`id_car`),
  KEY `parkCar_agency1_FK` (`id_agency`),
  CONSTRAINT `parkCar_agency1_FK` FOREIGN KEY (`id_agency`) REFERENCES `agency` (`id`),
  CONSTRAINT `parkCar_car0_FK` FOREIGN KEY (`id_car`) REFERENCES `car` (`id`),
  CONSTRAINT `parkCar_color_FK` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parkcar`
--

LOCK TABLES `parkcar` WRITE;
/*!40000 ALTER TABLE `parkcar` DISABLE KEYS */;
/*!40000 ALTER TABLE `parkcar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-08 12:27:48
