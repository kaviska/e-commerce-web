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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airline`
--

LOCK TABLES `airline` WRITE;
/*!40000 ALTER TABLE `airline` DISABLE KEYS */;
INSERT INTO `airline` VALUES (1,'srilanka'),(2,'other');
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
  PRIMARY KEY (`parking_id`),
  KEY `fk_parking_parking_status1_idx` (`parking_status_status_id`),
  KEY `fk_parking_package1_idx` (`package_package_id`),
  KEY `fk_parking_travel1_idx` (`travel_travel_id`),
  CONSTRAINT `fk_parking_package1` FOREIGN KEY (`package_package_id`) REFERENCES `package` (`package_id`),
  CONSTRAINT `fk_parking_parking_status1` FOREIGN KEY (`parking_status_status_id`) REFERENCES `parking_status` (`status_id`),
  CONSTRAINT `fk_parking_travel1` FOREIGN KEY (`travel_travel_id`) REFERENCES `travel` (`travel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking`
--

LOCK TABLES `parking` WRITE;
/*!40000 ALTER TABLE `parking` DISABLE KEYS */;
INSERT INTO `parking` VALUES ('FaXSGZoQ7IXL','2024-04-17 21:51:00','2024-04-30 21:53:00',1,'knJ8Ur0N5h7g','2VnfL3nZ7RjE',NULL),('gcG7LYeZF6Jg','2024-04-17 21:51:00','2024-04-30 21:53:00',1,'knJ8Ur0N5h7g','SyZ0W6XGUpWD',NULL),('Q40agfvcplep',NULL,NULL,1,'knJ8Ur0N5h7g','mC876JKZKQpB',NULL),('TwNEZmr0sJ6l','2024-04-17 21:51:00','2024-04-30 21:53:00',1,'knJ8Ur0N5h7g','xm4lkXoBsBdS',NULL),('Uwgy4zh3QG9z','2024-04-17 21:51:00','2024-04-30 21:53:00',1,'knJ8Ur0N5h7g','B0LT2X5WW9qd',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title`
--

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;
INSERT INTO `title` VALUES (1,'null'),(2,NULL),(3,'mr'),(4,'mr'),(5,'mr');
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
INSERT INTO `travel` VALUES ('2VnfL3nZ7RjE','377',1,1),('7g0A1arVGfbt','377',1,1),('B0LT2X5WW9qd','377',1,1),('DjWriEJ9C2VE','377',1,1),('hpEUk6f2JWw8','377',1,1),('mC876JKZKQpB','377',1,1),('nx6gH2oYMlyw','377',1,1),('SyZ0W6XGUpWD','377',1,1),('tXR0HNMjxreu','377',1,1),('u2maDUD1ee7n','377',1,1),('xm4lkXoBsBdS','377',1,1),('xvos2GepY7Nm','377',1,1);
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
INSERT INTO `user` VALUES ('6614c910e939','kaviska525@gmmail.com','45a0931aea8b649a29d822252b79b5abb21934070dbbaf6f236ed6ff70c9df6f',NULL,NULL,NULL,NULL,1,1),('6614cab3ba29','kggaviska525@gmmail.com','45a0931aea8b649a29d822252b79b5abb21934070dbbaf6f236ed6ff70c9df6f',NULL,NULL,NULL,NULL,1,1),('6614cdf0db92','kggaviska525@geeddmmail.com','45a0931aea8b649a29d822252b79b5abb21934070dbbaf6f236ed6ff70c9df6f',NULL,NULL,NULL,NULL,1,1),('6614cdf8a45f','kddddgaviska525@geeddmmail.com','45a0931aea8b649a29d822252b79b5abb21934070dbbaf6f236ed6ff70c9df6f',NULL,NULL,NULL,NULL,1,1),('6616e71854db','kaviska525@gmail.com','45a0931aea8b649a29d822252b79b5abb21934070dbbaf6f236ed6ff70c9df6f','Jolie Baird','Kerr','+1 (611) 561-3183','Qui consequatur exer',1,1);
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

-- Dump completed on 2024-04-13 11:15:36
