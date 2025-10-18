-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: webkd_002
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_id` varchar(12) NOT NULL DEFAULT '',
  `full_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hash` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `admin_status_status_id` int unsigned NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_id_UNIQUE` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airline`
--

DROP TABLE IF EXISTS `airline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airline` (
  `airline_id` int unsigned NOT NULL AUTO_INCREMENT,
  `airline` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`airline_id`),
  UNIQUE KEY `airline_id_UNIQUE` (`airline_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airline`
--

LOCK TABLES `airline` WRITE;
/*!40000 ALTER TABLE `airline` DISABLE KEYS */;
INSERT INTO `airline` VALUES (1,'Air India'),(2,'Sri Lanka'),(3,'Emrates'),(4,'Other');
/*!40000 ALTER TABLE `airline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package` (
  `package_id` varchar(12) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `hour_price` int DEFAULT NULL,
  `walking_time` varchar(45) DEFAULT NULL,
  `bottom_text` longtext,
  `more_info` longtext,
  `point_form` longtext,
  PRIMARY KEY (`package_id`),
  UNIQUE KEY `package_id_UNIQUE` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` VALUES ('knJ8Ur0N5h7g','basic',10,'1-4','this is the bottom text for the basic package','no more info for this package','\"this is the first bullet point\\r\\nthis is the second bullet point\\r\\nthis is the third bullet point\\r\\nthis is the last ballet point\"');
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking`
--

DROP TABLE IF EXISTS `parking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parking` (
  `parking_id` varchar(12) NOT NULL,
  `arrival` varchar(50) DEFAULT NULL,
  `exitDetails` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `parking_status_status_id` int unsigned NOT NULL,
  `package_package_id` varchar(12) NOT NULL,
  `travel_travel_id` varchar(12) NOT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `user_user_id` varchar(12) NOT NULL,
  `full_amount` varchar(45) DEFAULT NULL,
  `date_time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`parking_id`),
  KEY `fk_parking_parking_status1_idx` (`parking_status_status_id`),
  KEY `fk_parking_package1_idx` (`package_package_id`),
  KEY `fk_parking_travel1_idx` (`travel_travel_id`),
  KEY `fk_parking_user1_idx` (`user_user_id`),
  CONSTRAINT `fk_parking_package1` FOREIGN KEY (`package_package_id`) REFERENCES `package` (`package_id`),
  CONSTRAINT `fk_parking_parking_status1` FOREIGN KEY (`parking_status_status_id`) REFERENCES `parking_status` (`status_id`),
  CONSTRAINT `fk_parking_travel1` FOREIGN KEY (`travel_travel_id`) REFERENCES `travel` (`travel_id`),
  CONSTRAINT `fk_parking_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking`
--

LOCK TABLES `parking` WRITE;
/*!40000 ALTER TABLE `parking` DISABLE KEYS */;
INSERT INTO `parking` VALUES ('8aKThD3MjbcH','2024-04-17 08:22:00','2024-04-21 08:22:00',1,'knJ8Ur0N5h7g','wBUYExHGgAMs',NULL,'6616e71854db','960','2024-04-17 08:36:31'),('AFJBse9oAPwY','2024-04-14 12:48:00','2024-04-22 13:48:00',3,'knJ8Ur0N5h7g','wvROqupGoYlB','pi_3P5h7cP7kwkkfUHH0TJrGbvp','6616e71854db','1930',NULL),('cyWmoZHwTHtW','2024-04-14 12:48:00','2024-04-22 13:48:00',4,'knJ8Ur0N5h7g','KaZTMS1F2rzR',NULL,'6616e71854db','1930',NULL),('HYf6yjzyJhmM','2024-04-17 17:50:00','2024-05-08 17:50:00',1,'knJ8Ur0N5h7g','M8sZle4DUwgW',NULL,'6616e71854db','5040',NULL),('RdmTSMTwrBw1','2024-04-30 16:13:00','2024-05-07 15:14:00',5,'knJ8Ur0N5h7g','HiP2pE5mtGpX',NULL,'6616e71854db','1670',NULL),('Tg7tZsP3xBlZ','2024-04-17 17:50:00','2024-05-08 17:50:00',1,'knJ8Ur0N5h7g','93T4JgwCibnp',NULL,'6616e71854db','5040',NULL),('xrJ4xYlXtpDI','2024-04-17 08:22:00','2024-04-21 08:22:00',1,'knJ8Ur0N5h7g','3G1CR5b4PvsF',NULL,'6616e71854db','960','2024-04-17 08:36:25'),('ZdzgKAcfu2A6','2024-04-24 00:54:00','2024-04-29 00:54:00',1,'knJ8Ur0N5h7g','y9DlHB6LZIGU',NULL,'6616e71854db','1200','2024-04-15 06:25:42'),('ZNQbTDGt9THz','2024-04-15 11:55:00','2024-04-23 04:50:00',1,'knJ8Ur0N5h7g','REHWZESoxz6v',NULL,'6616e71854db','1850',NULL);
/*!40000 ALTER TABLE `parking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking_status`
--

DROP TABLE IF EXISTS `parking_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parking_status` (
  `status_id` int unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`status_id`),
  UNIQUE KEY `status_id_UNIQUE` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking_status`
--

LOCK TABLES `parking_status` WRITE;
/*!40000 ALTER TABLE `parking_status` DISABLE KEYS */;
INSERT INTO `parking_status` VALUES (1,'Pending'),(2,'Approved'),(3,'Cancel_admin'),(4,'Cancel_user'),(5,'Completed');
/*!40000 ALTER TABLE `parking_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reason`
--

DROP TABLE IF EXISTS `reason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reason` (
  `reason_id` int unsigned NOT NULL AUTO_INCREMENT,
  `reason` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`reason_id`),
  UNIQUE KEY `reason_UNIQUE` (`reason_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reason`
--

LOCK TABLES `reason` WRITE;
/*!40000 ALTER TABLE `reason` DISABLE KEYS */;
INSERT INTO `reason` VALUES (1,'leisure '),(2,'business ');
/*!40000 ALTER TABLE `reason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `title`
--

DROP TABLE IF EXISTS `title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `title` (
  `title_id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`title_id`),
  UNIQUE KEY `title_id_UNIQUE` (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title`
--

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;
INSERT INTO `title` VALUES (1,'null'),(2,'Mr'),(3,'Miss'),(4,'Mrs'),(5,'Ms'),(6,'Dr');
/*!40000 ALTER TABLE `title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travel`
--

DROP TABLE IF EXISTS `travel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `travel` (
  `travel_id` varchar(12) NOT NULL,
  `registation_number` varchar(45) DEFAULT NULL,
  `flight_number` varchar(45) DEFAULT NULL,
  `airline_airline_id` int unsigned NOT NULL,
  `reason_reason_id` int unsigned NOT NULL,
  PRIMARY KEY (`travel_id`),
  UNIQUE KEY `travel_id_UNIQUE` (`travel_id`),
  KEY `fk_travel_airline1_idx` (`airline_airline_id`),
  KEY `fk_travel_reason1_idx` (`reason_reason_id`),
  CONSTRAINT `fk_travel_airline1` FOREIGN KEY (`airline_airline_id`) REFERENCES `airline` (`airline_id`),
  CONSTRAINT `fk_travel_reason1` FOREIGN KEY (`reason_reason_id`) REFERENCES `reason` (`reason_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travel`
--

LOCK TABLES `travel` WRITE;
/*!40000 ALTER TABLE `travel` DISABLE KEYS */;
INSERT INTO `travel` VALUES ('3G1CR5b4PvsF','819','793',3,1),('93T4JgwCibnp','564','',1,1),('HiP2pE5mtGpX','361',NULL,1,1),('KaZTMS1F2rzR','490',NULL,1,1),('M8sZle4DUwgW','564','670',1,1),('REHWZESoxz6v','564',NULL,1,1),('wBUYExHGgAMs','819','793',3,1),('wvROqupGoYlB','490',NULL,1,1),('y9DlHB6LZIGU','564','',1,1);
/*!40000 ALTER TABLE `travel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `title_title_id` int unsigned NOT NULL,
  `user_status_status_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_title_idx` (`title_title_id`),
  KEY `fk_user_user_status1_idx` (`user_status_status_id`),
  CONSTRAINT `fk_user_title` FOREIGN KEY (`title_title_id`) REFERENCES `title` (`title_id`),
  CONSTRAINT `fk_user_user_status1` FOREIGN KEY (`user_status_status_id`) REFERENCES `user_status` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('6616e71854db','kaviska525@gmail.com','45a0931aea8b649a29d822252b79b5abb21934070dbbaf6f236ed6ff70c9df6f','Basil Harrell','Chen','+1 (885) 406-4789','Quae esse exercitat',3,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`status_id`),
  UNIQUE KEY `status_id_UNIQUE` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_status`
--

LOCK TABLES `user_status` WRITE;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` VALUES (1,'active'),(2,'deactive'),(3,'blocked');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-17 12:24:52
