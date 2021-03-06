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
  `FullName` varchar(45) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `PhoneNumber` varchar(45) DEFAULT NULL,
  `EmailId` varchar(255) NOT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `CreditCardNumber` varchar(255) DEFAULT NULL,
  `Token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `EmailId_UNIQUE` (`EmailId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AdminLte`
--

LOCK TABLES `AdminLte` WRITE;
/*!40000 ALTER TABLE `AdminLte` DISABLE KEYS */;
INSERT INTO `AdminLte` VALUES (1,'aruna kumari','arunodaya colony\nmadhapur','Hyderabad','Telangana','9533801100','lprasanna537@gmail.com','c2bcfbbb73bec61ced5a15cf988faec1','eyJpdiI6IlhkXC9HTWVPVEVRRTBscnpWN2lZZytBPT0iLCJ2YWx1ZSI6InFoTW1pNGw0bG84ODhsTHB6a1J2dmc9PSIsIm1hYyI6ImZmYzY4MDIwNjdkN2I4MmFmN2RlNDMwNmY0ZTU3NThkZWI2YzZhZGU5MGZkNzRiNDg2ZDQxYjQ1NTMxZTMwMjcifQ==','103754095488005550061'),(2,'yuva shree','kothapet','Hyderabad','Telangana','9533801100','yuvashree.b@karmanya.co.in','fdc06eab67a2f422a018ff346389409f','eyJpdiI6IlpVSFo1ejBaN1BpYjBseUhrd09UWEE9PSIsInZhbHVlIjoiWVJGVUowanRcL0ZFRjBLWFRoSk5UK0E9PSIsIm1hYyI6IjY4MzM4MDRmYzUxZTgwMDU4NjU2YmEzMmY2MTQzY2Q4MzY3NjEwMzcxMThmMjQxNzczYTE2ZGNjMGI3NWYyZDEifQ==',NULL),(3,NULL,NULL,NULL,NULL,NULL,'',NULL,'eyJpdiI6Ik45OE10d2xZVjhweXVVdzJoc3JzMFE9PSIsInZhbHVlIjoib25URzVhUHA0UXhOcTdRVlNlTDZsQT09IiwibWFjIjoiNmNmZDY4MjYyODkwODgxZjk2OTlkNzg1Y2E3YjgxYjE2ODNmMzE3OGYyMzc2ZmY4MzdjNWYxNjhhYzQyZjA5MCJ9','1742303022683495'),(4,'Lakshmi Prasanna','vrnagar\nkavali','nellore','ap','9533801100','lakshmiprasanna.nadendla@gmail.com','2fccdf9077c6b07255761310fdcdf7c5','eyJpdiI6Im5GVFd1YjJoMWN6U1pQVnVoUk0yK0E9PSIsInZhbHVlIjoiaU5aZjh5YmdpeUdYM1VENWVIWnJpdz09IiwibWFjIjoiYTRiZDhlZGIzNWRiNjMyMjZjMDUxNDBlNzYzMGNlNTZhZTFjYmRjODU4OWIxMmUzNDk4YjYzMTk4ZTA0N2NhYSJ9','1742303022683495');
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

-- Dump completed on 2016-06-06 19:15:39
