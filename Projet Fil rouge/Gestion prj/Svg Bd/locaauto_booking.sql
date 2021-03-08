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
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` datetime DEFAULT NULL,
  `startEnd` datetime DEFAULT NULL,
  `price` float NOT NULL,
  `typeBooking` varchar(15) NOT NULL,
  `id_agRecovering` int(11) NOT NULL,
  `nbKm` int(11) DEFAULT NULL,
  `archived` tinyint(1) NOT NULL,
  `id_stateBooking` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_parkCar` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Booking_stateBooking_FK` (`id_stateBooking`),
  KEY `Booking_customer0_FK` (`id_customer`),
  KEY `Booking_parkCar1_FK` (`id_parkCar`),
  CONSTRAINT `Booking_customer0_FK` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  CONSTRAINT `Booking_parkCar1_FK` FOREIGN KEY (`id_parkCar`) REFERENCES `parkcar` (`id`),
  CONSTRAINT `Booking_stateBooking_FK` FOREIGN KEY (`id_stateBooking`) REFERENCES `statebooking` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-08 12:27:49
