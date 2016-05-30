-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: lakshmi
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Logs`
--

DROP TABLE IF EXISTS `Logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Logs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userAgent` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `pattern` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Email` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Logs`
--

LOCK TABLES `Logs` WRITE;
/*!40000 ALTER TABLE `Logs` DISABLE KEYS */;
INSERT INTO `Logs` VALUES (1,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-28 10:29:17','lprasanna537@gmail.com','2016-05-28 10:29:17'),(2,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-28 10:34:02','lprasanna537@gmail.com','2016-05-28 10:34:02'),(3,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 04:45:41','lprasanna537@gmail.com','2016-05-29 04:45:41'),(4,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 06:42:20','lprasanna537@gmail.com','2016-05-29 06:42:20'),(5,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 06:42:32','lprasanna537@gmail.com','2016-05-29 06:42:32'),(6,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 06:45:24','lprasanna537@gmail.com','2016-05-29 06:45:24'),(7,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 06:45:29','lprasanna537@gmail.com','2016-05-29 06:45:29'),(8,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 06:56:04','lprasanna537@gmail.com','2016-05-29 06:56:04'),(9,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 07:00:46','lprasanna537@gmail.com','2016-05-29 07:00:46'),(10,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 08:03:06','lprasanna537@gmail.com','2016-05-29 08:03:06'),(11,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 10:17:49','lakshmi.nadella@karmanya.co.in','2016-05-29 10:17:49'),(12,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 10:18:38','lakshmi.nadella@karmanya.co.in','2016-05-29 10:18:38'),(13,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 10:28:48','lakshmi.nadella@karmanya.co.in','2016-05-29 10:28:48'),(14,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 10:32:24','lakshmi.nadella@karmanya.co.in','2016-05-29 10:32:24'),(15,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 10:41:31','lakshmi.nadella@karmanya.co.in','2016-05-29 10:41:31'),(16,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 12:45:33','lprasanna537@gmail.com','2016-05-29 12:45:33'),(17,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-29 15:11:26','lprasanna537@gmail.com','2016-05-29 15:11:26'),(18,'{\"userAgent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/48.0.2564.116 Safari\\/537.36\",\"name\":\"Google Chrome\",\"version\":\"48.0.2564.116\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Chrome|other)[\\/ ]+(?<version>[','192.168.100.1','Google Chrome','48.0.2564.116','linux','','2016-05-30 03:58:22','lprasanna537@gmail.com','2016-05-30 03:58:22');
/*!40000 ALTER TABLE `Logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-30 11:45:06
