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
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carBoot` int(11) NOT NULL,
  `nbPlaces` int(11) NOT NULL,
  `gearBox` varchar(10) NOT NULL,
  `nbDoors` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `archived` tinyint(1) NOT NULL,
  `pathImg` varchar(100) NOT NULL,
  `id_brandCar` int(11) NOT NULL,
  `id_modelCar` int(11) NOT NULL,
  `id_categoryCar` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `car_brandCar_FK` (`id_brandCar`),
  KEY `car_modelCar0_FK` (`id_modelCar`),
  KEY `car_categoryCar1_FK` (`id_categoryCar`),
  CONSTRAINT `car_brandCar_FK` FOREIGN KEY (`id_brandCar`) REFERENCES `brandcar` (`id`),
  CONSTRAINT `car_categoryCar1_FK` FOREIGN KEY (`id_categoryCar`) REFERENCES `categorycar` (`id`),
  CONSTRAINT `car_modelCar0_FK` FOREIGN KEY (`id_modelCar`) REFERENCES `modelcar` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
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
