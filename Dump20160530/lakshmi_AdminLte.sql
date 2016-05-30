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
-- Table structure for table `AdminLte`
--

DROP TABLE IF EXISTS `AdminLte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AdminLte` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(45) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(45) NOT NULL,
  `State` varchar(45) NOT NULL,
  `PhoneNumber` varchar(45) NOT NULL,
  `EmailId` varchar(255) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `CreditCardNumber` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `EmailId_UNIQUE` (`EmailId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AdminLte`
--

LOCK TABLES `AdminLte` WRITE;
/*!40000 ALTER TABLE `AdminLte` DISABLE KEYS */;
INSERT INTO `AdminLte` VALUES (1,'aruna kumari','arunodaya colony\r\nmadhapur','Hyderabad','Telangana','9533801100','lprasanna537@gmail.com','4162245dca440d8e0b75a09e03c32fe8','eyJpdiI6ImdYSXo2VCs4WXNxbzZZcDdCVERZT0E9PSIsInZhbHVlIjoiWkVGWGtjeGhLMmxuekNqd21Pck5YUT09IiwibWFjIjoiOGZjM2ZhMTc5N2Y2MGQwZWMwMDZhMzE0Y2Q5ODkzZjYyMTJiMDk1Y2MxYjBiOWI1MzcyOGQzOGI1YjQxNDQ1NSJ9'),(2,'lakshmi prasanna','vrnagar\r\nkavali','nellore','Andhra pradesh','9014141086','lakshmi.nadella@karmanya.co.in','ea265e289dd498126518a87fd4bb8b55','eyJpdiI6Ikw0SGtaM01rV1dcL0t3XC9kR2g3UTFPQT09IiwidmFsdWUiOiJDZmhRN3d3WUtrZFZ5VWJsUHREcjFRVmE5SkxzemM4K2IwbGY4djk4RStzPSIsIm1hYyI6IjQ1ZTcxY2IwMDM5OTNlYjkyMmE3MTg5NTllZDQ4NDkyYzEyNWIyZWM4ODc0MDA3NmExZDExN2YyZTU1Mjc1NzAifQ==');
/*!40000 ALTER TABLE `AdminLte` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-30 11:45:07
