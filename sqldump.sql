-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BladeRunner
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `product` varchar(15) NOT NULL,
  `description` text,
  `bargain` text NOT NULL,
  `state` text NOT NULL,
  `amount` decimal(4,0) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `city` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1022 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1001,'BMW','Clean Title!\r\n100k miles.\r\nRed color','yes','used',2500,'2015-09-06 08:39:55','San Francisco'),(1002,'Table','6 feet long','yes','new',100,'2015-09-06 08:40:58','San Jose'),(1003,'Laptop','I3 \r\n6gb RAM','no','new',255,'2015-09-06 09:03:49','Los Gatos'),(1004,'Laptop','I3 \r\n6gb RAM','no','new',255,'2015-09-06 09:04:52','Los Gatos'),(1005,'Car','clean','yes','used',9999,'2015-09-07 00:56:18','Los Gatos'),(1006,'Microwave','100W, used for 2 years','no','used',26,'2015-09-07 02:42:01','San Francisco'),(1007,'Vacum Cleaner','Bought a month back. Unused','no','new',45,'2015-09-07 03:38:20','Fremont'),(1008,'Vacum Cleaner','Bought a month back. Unused','no','new',45,'2015-09-07 03:42:15','Fremont'),(1009,'Utensils','','yes','used',5,'2015-09-07 03:46:43','San Jose'),(1010,'juicer','All purpose','yes','used',50,'2015-09-07 03:49:23','Fremont'),(1012,'Pillows','','yes','used',22,'2015-09-07 03:55:17','San Jose'),(1013,'Basket','','yes','used',2,'2015-09-07 03:56:59','San Jose'),(1014,'Chair','Wooden','yes','used',25,'2015-09-07 04:00:48','San Jose'),(1015,'Table','rot Iron','yes','used',30,'2015-09-07 04:02:32','Fremont'),(1019,'Nike Shoes','Brand new. latest model','yes','new',120,'2015-09-07 06:01:05','San Francisco'),(1020,'Macbook Air','Intel i5\r\n16GB RAM\r\n256 SSD','yes','new',1000,'2015-09-07 06:08:18','San Francisco'),(1021,'Macbook Air','Intel i5\r\n16GB RAM\r\n256 SSD','yes','new',1000,'2015-09-07 06:08:46','San Francisco');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-06 23:21:57
