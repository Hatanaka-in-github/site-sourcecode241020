-- MySQL dump 10.13  Distrib 8.0.26, for macos11 (x86_64)
--
-- Host: localhost    Database: Database_rds
-- ------------------------------------------------------
-- Server version	8.0.28

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `process_progress`
--

DROP TABLE IF EXISTS `process_progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `process_progress` (
  `AUTO_ID` int NOT NULL AUTO_INCREMENT,
  `入力日` varchar(30) DEFAULT NULL,
  `品名` varchar(15) DEFAULT NULL,
  `品番` varchar(15) DEFAULT NULL,
  `数量` int DEFAULT '0',
  `発工程` text,
  `受工程` varchar(15) DEFAULT NULL,
  `損品数` int DEFAULT '0',
  `保留数` int DEFAULT '0',
  `備考` text,
  `入力者` varchar(30) DEFAULT NULL,
  `出庫数` int DEFAULT '0',
  `exe_flg` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`AUTO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_progress`
--

LOCK TABLES `process_progress` WRITE;
/*!40000 ALTER TABLE `process_progress` DISABLE KEYS */;
INSERT INTO `process_progress` VALUES (1,'2023-05-13T16:39:48','A','2',20,'/入荷/','/4/',0,0,'5','5',0,0),(2,'2023-05-13T16:39:48','A','2',0,NULL,'/入荷/',5,5,NULL,'5',0,0),(3,'2023-05-13T16:39:48','A','2',-30,NULL,'/入荷/',0,0,NULL,'5',30,2),(4,'2023-05-13T16:55:42','A','2',100,'/入荷/','/4/',0,0,'7','5',0,0),(5,'2023-05-13T16:55:42','A','2',0,NULL,'/入荷/',5,5,NULL,'5',0,0),(6,'2023-05-13T16:55:42','A','2',-110,NULL,'/入荷/',0,0,NULL,'5',110,2),(7,'2023-05-13T16:56:50','A','2',100,'/入荷/','/2/',0,0,'7','5',0,0),(8,'2023-05-13T16:56:50','A','2',0,NULL,'/入荷/',5,5,NULL,'5',0,0),(9,'2023-05-13T16:56:50','A','2',-110,NULL,'/入荷/',0,0,NULL,'5',110,2);
/*!40000 ALTER TABLE `process_progress` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-13 22:32:52
