-- MySQL dump 10.13  Distrib 5.5.47, for Win32 (x86)
--
-- Host: localhost    Database: statworld
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `Code` char(3) NOT NULL,
  `Name` varchar(52) NOT NULL,
  `Continent` varchar(20) DEFAULT NULL,
  `Region` varchar(26) DEFAULT NULL,
  `SurfaceArea` decimal(10,2) DEFAULT NULL,
  `indepYear` int(4) DEFAULT NULL,
  `Population` int(11) DEFAULT NULL,
  `LifeExpectancy` decimal(3,1) DEFAULT NULL,
  `GNP` decimal(10,2) DEFAULT NULL,
  `GNPOld` decimal(10,2) DEFAULT NULL,
  `LocalName` varchar(45) DEFAULT NULL,
  `GovernmentForm` varchar(45) DEFAULT NULL,
  `HeadOfState` varchar(60) DEFAULT NULL,
  `Capital` int(11) DEFAULT NULL,
  `Code2` char(2) DEFAULT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_language`
--

DROP TABLE IF EXISTS `country_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_language` (
  `id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `offical` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_language`
--

LOCK TABLES `country_language` WRITE;
/*!40000 ALTER TABLE `country_language` DISABLE KEYS */;
INSERT INTO `country_language` VALUES (109,'Balochi',0),(109,'Dari',1),(109,'Pashto',1),(109,'Turkmenian',0),(109,'Uzbek',0),(110,'Armenian',1),(110,'Azerbaijani',0),(111,'Armenian',0),(111,'Azerbaijani',1),(111,'Lezgian',0),(111,'Russian',0);
/*!40000 ALTER TABLE `country_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countrylist`
--

DROP TABLE IF EXISTS `countrylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countrylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `continent` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countrylist`
--

LOCK TABLES `countrylist` WRITE;
/*!40000 ALTER TABLE `countrylist` DISABLE KEYS */;
INSERT INTO `countrylist` VALUES (1,'Antarctica','Antarctica'),(2,'French Southern territories','Antarctica'),(3,'Bouvet Island','Antarctica'),(4,'Heard Island and McDonald Islands','Antarctica'),(5,'South Georgia and the South Sandwich Islands','Antarctica'),(6,'China','Asia'),(7,'Japan','Asia'),(8,'Korea','Asia'),(9,'Mongolia','Asia'),(10,'Russia','Asia'),(11,'Myanmar','Asia'),(12,'Brunei','Asia'),(13,'Cambodia','Asia'),(14,'East Timor','Asia'),(15,'Indonesia','Asia'),(16,'Laos','Asia'),(17,'Malaysia','Asia'),(18,'Philippines','Asia'),(19,'Singapore','Asia'),(20,'Thailand','Asia'),(21,'Vietnam','Asia'),(22,'Bangladesh','Asia'),(23,'Bhutan','Asia'),(24,'India','Asia'),(25,'Maldives','Asia'),(26,'Nepal','Asia'),(27,'Pakistan','Asia'),(28,'Sri Lanka','Asia'),(29,'Kazakhstan','Asia'),(30,'Kyrgyzstan','Asia'),(31,'Tajikistan','Asia'),(32,'Turkmenistan','Asia'),(33,'Uzbekistan','Asia'),(35,'Finland','Europe'),(36,'Sweden','Europe'),(37,'Norway','Europe'),(38,'Iceland','Europe'),(39,'Denmark Faroe Islands','Europe'),(40,'Estonia','Europe'),(41,'Latvia','Europe'),(42,'Lithuania','Europe'),(43,'Belarus','Europe'),(44,'Russia','Europe'),(45,'Ukraine','Europe'),(46,'Moldova','Europe'),(47,'Egypt','Africa'),(48,'Sudan','Africa'),(49,'Libya','Africa'),(50,'Tunisia','Africa'),(51,'Algeria','Africa'),(52,'Morocco','Africa'),(53,'Azores','Africa'),(54,'Madeira','Africa'),(55,'Bahamas','North America'),(56,'Belize','North America'),(57,'United States','North America'),(58,'Barbados','North America'),(59,'Canada','North America'),(60,'Costa Rica','North America'),(61,'Cuba','North America'),(62,'Salvador','North America'),(63,'Grenada','North America'),(64,'Guatemala','North America'),(65,'Honduras','North America'),(66,'Haiti','North America'),(67,'Jamaica','North America'),(68,'Saint Lucia','North America'),(69,'Mexico','North America'),(70,'Nicaragua','North America'),(71,'Panama','North America'),(72,'Dominica','North America'),(73,'Saint Vincent','North America'),(74,'Grenadines','North America'),(75,'Trinidad','North America'),(76,'Tobage','North America'),(77,'Antigua','North America'),(78,'Barbuda','North America'),(79,'Santa','North America'),(80,'Nevis','North America'),(81,'Colombia','South America'),(82,'Venezuela','South America'),(83,'Guyana','South America'),(84,'Suriname','South America'),(85,'Ecuador','South America'),(86,'Peru','South America'),(87,'Brazil','South America'),(88,'Bolivia','South America'),(89,'Chile','South America'),(90,'Paraguay','South America'),(91,'Uruguay','South America'),(92,'Argentina','South America'),(93,'French Guiana','South America'),(94,'Australia','Oceania'),(95,'the Republic of Nauru','Oceania'),(96,'the Republic of Vanuatu','Oceania'),(97,'the Republic of the Marshall Islands','Oceania'),(98,'the Kingdom of Tonga','Oceania'),(99,'New Zealand','Oceania'),(100,'Tuvalu','Oceania'),(101,'the Republic of Kiribati','Oceania'),(102,'the Solomon Islands','Oceania'),(103,'the Republic of Fiji','Oceania'),(104,'Samoa','Oceania'),(105,'Papua New Guinea','Oceania'),(106,'the Republic of Palau','Oceania'),(107,'Fiji','Oceania'),(108,'Micronesie West Asia Commonwealth','Oceania'),(109,'Afghanistan','Asia'),(110,'Armenia','Asia'),(111,'Azerbaijan','Asia');
/*!40000 ALTER TABLE `countrylist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-27 14:43:11
