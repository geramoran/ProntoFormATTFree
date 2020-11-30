-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: prontoformatt
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (6,'Monterrey','Monterrey','Nuevo Leon'),(7,'laguna','Torreon','Coahuila'),(8,'uno','nuevo','hay');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogstatus`
--

DROP TABLE IF EXISTS `catalogstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalogstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogstatus`
--

LOCK TABLES `catalogstatus` WRITE;
/*!40000 ALTER TABLE `catalogstatus` DISABLE KEYS */;
INSERT INTO `catalogstatus` VALUES (1,'Recoleccion','Recoleccion - Remesa',NULL),(2,'Almacen','Unidad',NULL),(3,'En transito','Unidad',NULL),(4,'Entregado','Unidad',NULL),(5,'Cancelado','Unidad',NULL),(9,'Nuevo','mundo',NULL),(13,'En Almacen','Recoleccion - Almacen',NULL),(14,'May','dd','9'),(15,'En Recoleccion','Recoleccion - Remesa','6');
/*!40000 ALTER TABLE `catalogstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int NOT NULL,
  `city` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'managua','aaaaa','1','1',27000,'1','1',8713107796,'a@a.com'),(2,'alguna','aa','Ninguno','Ocampo #130 Sur',1000,'x','y',8713107796,''),(4,'Yo','uno','1','1',1,'1','1',8713107796,''),(5,'alpura','aaaa101010aa0','nadie','18 de bravos',31000,'Morelia','Michoacan',6193336633,''),(6,'aaaa','aaaa101010aa0','aaa','aaaaa',35000,'aaa','aaa',8713107796,''),(7,'mymya','MAMG920318SE3','yo','aaa',20000,'lerdo','durango',8712345678,''),(8,'maria','VAHS851224NW4','yo','yo',10000,'lerdo','Coahuila',871234578,''),(9,'sss','jhvgjh','72432','34238732',7423,'kjehkshdf','wejiowujer',2387498723,'3h24ui2gh3');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `area` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uduser_idx` (`user`),
  KEY `udarea_idx` (`area`),
  CONSTRAINT `udarea` FOREIGN KEY (`area`) REFERENCES `area` (`id`),
  CONSTRAINT `uduser` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (1,2,'2020-11-24 00:00:00',6),(2,2,'2020-11-24 00:00:00',6),(3,2,'2020-11-24 00:00:00',6),(4,2,'2020-11-24 00:00:00',6),(5,2,'2020-11-24 00:00:00',7),(6,1,'2020-11-30 00:00:00',6),(7,2,'2020-11-30 00:00:00',7),(8,2,'2020-11-30 00:00:00',7);
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `level` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level`
--

LOCK TABLES `level` WRITE;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` VALUES (1,'rack 1'),(2,'rack 2');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locate`
--

DROP TABLE IF EXISTS `locate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locate`
--

LOCK TABLES `locate` WRITE;
/*!40000 ALTER TABLE `locate` DISABLE KEYS */;
INSERT INTO `locate` VALUES (2,'a'),(3,'ubi'),(14,'cacion');
/*!40000 ALTER TABLE `locate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2020_11_09_210132_create_area_table',1),(2,'2020_11_09_210132_create_catalogstatus_table',1),(3,'2020_11_09_210132_create_client_table',1),(4,'2020_11_09_210132_create_delivery_table',1),(5,'2020_11_09_210132_create_level_table',1),(6,'2020_11_09_210132_create_locate_table',1),(7,'2020_11_09_210132_create_product_table',1),(8,'2020_11_09_210132_create_relplace_table',1),(9,'2020_11_09_210132_create_remesa_table',1),(10,'2020_11_09_210132_create_storage_table',1),(11,'2020_11_09_210132_create_unit_table',1),(12,'2020_11_09_210132_create_unitdelivery_table',1),(13,'2020_11_09_210132_create_user_table',1),(14,'2020_11_09_210132_create_userdetail_table',1),(15,'2020_11_09_210132_create_userpermissions_table',1),(16,'2020_11_09_210132_create_usertype_table',1),(17,'2020_11_09_210132_create_warehouse_table',1),(18,'2020_11_09_210133_add_foreign_keys_to_delivery_table',1),(19,'2020_11_09_210133_add_foreign_keys_to_product_table',1),(20,'2020_11_09_210133_add_foreign_keys_to_relplace_table',1),(21,'2020_11_09_210133_add_foreign_keys_to_remesa_table',1),(22,'2020_11_09_210133_add_foreign_keys_to_storage_table',1),(23,'2020_11_09_210133_add_foreign_keys_to_unit_table',1),(24,'2020_11_09_210133_add_foreign_keys_to_unitdelivery_table',1),(25,'2020_11_09_210133_add_foreign_keys_to_user_table',1),(26,'2020_11_09_210133_add_foreign_keys_to_userdetail_table',1),(27,'2020_11_09_210133_add_foreign_keys_to_userpermissions_table',1),(28,'2020_11_27_192330_create_area_table',0),(29,'2020_11_27_192330_create_catalogstatus_table',0),(30,'2020_11_27_192330_create_client_table',0),(31,'2020_11_27_192330_create_delivery_table',0),(32,'2020_11_27_192330_create_level_table',0),(33,'2020_11_27_192330_create_locate_table',0),(34,'2020_11_27_192330_create_product_table',0),(35,'2020_11_27_192330_create_relplace_table',0),(36,'2020_11_27_192330_create_remesa_table',0),(37,'2020_11_27_192330_create_storage_table',0),(38,'2020_11_27_192330_create_unit_table',0),(39,'2020_11_27_192330_create_unitdelivery_table',0),(40,'2020_11_27_192330_create_user_table',0),(41,'2020_11_27_192330_create_userdetail_table',0),(42,'2020_11_27_192330_create_userpermissions_table',0),(43,'2020_11_27_192330_create_usertype_table',0),(44,'2020_11_27_192330_create_warehouse_table',0),(45,'2020_11_27_192332_add_foreign_keys_to_delivery_table',0),(46,'2020_11_27_192332_add_foreign_keys_to_product_table',0),(47,'2020_11_27_192332_add_foreign_keys_to_relplace_table',0),(48,'2020_11_27_192332_add_foreign_keys_to_remesa_table',0),(49,'2020_11_27_192332_add_foreign_keys_to_storage_table',0),(50,'2020_11_27_192332_add_foreign_keys_to_unit_table',0),(51,'2020_11_27_192332_add_foreign_keys_to_unitdelivery_table',0),(52,'2020_11_27_192332_add_foreign_keys_to_user_table',0),(53,'2020_11_27_192332_add_foreign_keys_to_userdetail_table',0),(54,'2020_11_27_192332_add_foreign_keys_to_userpermissions_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` int NOT NULL,
  `costoEntrega` decimal(10,2) NOT NULL,
  `costoDevolucion` decimal(10,2) NOT NULL,
  `Peso` decimal(7,4) NOT NULL,
  `comisionEntrega` decimal(10,2) NOT NULL,
  `comisionDevolucion` decimal(10,2) NOT NULL,
  `tiempoCierre` int NOT NULL,
  `nivelServicio` int NOT NULL,
  `tieneCobro` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cliente_idx` (`client_id`),
  CONSTRAINT `cliente` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'niña',7,17000.00,14000.00,1.8400,2000.00,10000.00,10,30,0),(3,'mina',4,12.00,10.00,1.7500,12.00,11.00,5,60,0),(4,'mylag',2,20.00,20.00,20.0000,520.00,9.00,9,90,0),(10,'a',5,1200.00,1200.00,1.5000,120.00,120.00,2,50,0),(15,'aaaaaaa',6,1200.00,1200.00,1.5000,120.00,120.00,2,50,0),(20,'Rastreo',6,120.00,120.00,10.0000,20.00,10.00,15,69,0),(22,'kkkk',4,33.00,99.00,2.0000,22.00,22.00,2,1,0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relplace`
--

DROP TABLE IF EXISTS `relplace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relplace` (
  `id` int NOT NULL AUTO_INCREMENT,
  `locate_id` int DEFAULT NULL,
  `warehouse_id` int DEFAULT NULL,
  `level_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locate_idx` (`locate_id`),
  KEY `warehouse_idx` (`warehouse_id`),
  KEY `level_idx` (`level_id`),
  CONSTRAINT `level` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  CONSTRAINT `locate` FOREIGN KEY (`locate_id`) REFERENCES `locate` (`id`),
  CONSTRAINT `warehouse` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relplace`
--

LOCK TABLES `relplace` WRITE;
/*!40000 ALTER TABLE `relplace` DISABLE KEYS */;
INSERT INTO `relplace` VALUES (1,3,2,1),(4,2,3,2),(6,14,4,2);
/*!40000 ALTER TABLE `relplace` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remesa`
--

DROP TABLE IF EXISTS `remesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `remesa` (
  `remesa` int NOT NULL,
  `dateArrive` datetime NOT NULL,
  `dateClose` datetime NOT NULL,
  `client_id` int NOT NULL,
  `unitCount` int NOT NULL,
  `mountTot` decimal(7,2) DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`remesa`),
  KEY `rClient_idx` (`client_id`),
  KEY `rStatus_idx` (`status_id`),
  CONSTRAINT `rClient` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `rStatus` FOREIGN KEY (`status_id`) REFERENCES `catalogstatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remesa`
--

LOCK TABLES `remesa` WRITE;
/*!40000 ALTER TABLE `remesa` DISABLE KEYS */;
INSERT INTO `remesa` VALUES (202011230,'2020-11-23 00:00:00','2020-11-25 00:00:00',4,2,55.00,2),(202011231,'2020-11-23 00:00:00','2020-12-08 00:00:00',6,2,89.00,1),(202011232,'2020-11-23 00:00:00','2020-11-25 00:00:00',5,2,880.00,1),(202011243,'2020-11-24 00:00:00','2020-11-29 00:00:00',4,1,0.00,1),(202011244,'2020-11-24 00:00:00','2020-11-24 00:00:00',5,3,4451.00,2),(202011305,'2020-11-30 00:00:00','2020-12-02 00:00:00',6,3,34643.00,15);
/*!40000 ALTER TABLE `remesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage`
--

DROP TABLE IF EXISTS `storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `storage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `place` int NOT NULL,
  `unit` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wUnit_idx` (`unit`),
  KEY `wPlace_idx` (`place`),
  CONSTRAINT `wPlace` FOREIGN KEY (`place`) REFERENCES `relplace` (`id`),
  CONSTRAINT `wUnit` FOREIGN KEY (`unit`) REFERENCES `unit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage`
--

LOCK TABLES `storage` WRITE;
/*!40000 ALTER TABLE `storage` DISABLE KEYS */;
INSERT INTO `storage` VALUES (1,1,4),(2,1,5),(3,1,2),(4,1,3),(5,1,2),(6,1,3),(7,1,13),(8,4,14),(9,1,15);
/*!40000 ALTER TABLE `storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idstatus` int NOT NULL,
  `remesa` int NOT NULL,
  `barcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idProduct` int NOT NULL,
  `mount` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uStatus_idx` (`idstatus`),
  KEY `uRemesa_idx` (`remesa`),
  KEY `uProduct_idx` (`idProduct`),
  CONSTRAINT `uProduct` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  CONSTRAINT `uRemesa` FOREIGN KEY (`remesa`) REFERENCES `remesa` (`remesa`),
  CONSTRAINT `uStatus` FOREIGN KEY (`idstatus`) REFERENCES `catalogstatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (2,1,202011230,'42342',22,0.00),(3,1,202011230,'45343',22,55.00),(4,1,202011231,'3453458394058',20,23.00),(5,1,202011231,'23423427',20,66.00),(6,1,202011232,'94884',10,3.00),(7,1,202011232,'234234',10,877.00),(8,1,202011243,'22323421',3,0.00),(13,1,202011244,'555555',10,4.00),(14,1,202011244,'5555',10,3.00),(15,1,202011244,'5555',10,4444.00),(22,1,202011305,'3453453',15,66.00),(23,1,202011305,'34534333',15,44.00),(24,1,202011305,'555',15,34533.00);
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unitdelivery`
--

DROP TABLE IF EXISTS `unitdelivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unitdelivery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int NOT NULL,
  `delivery` int NOT NULL,
  `visitStatus` int NOT NULL,
  `reason` int DEFAULT NULL,
  `visitDate` datetime DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isMount` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `mount` float DEFAULT NULL,
  `count` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `udUnit_idx` (`unit`),
  KEY `udStatus_idx` (`visitStatus`),
  KEY `udReason_idx` (`reason`),
  KEY `udDelivery_idx` (`delivery`),
  CONSTRAINT `udDelivery` FOREIGN KEY (`delivery`) REFERENCES `delivery` (`id`),
  CONSTRAINT `udReason` FOREIGN KEY (`reason`) REFERENCES `catalogstatus` (`id`),
  CONSTRAINT `udStatus` FOREIGN KEY (`visitStatus`) REFERENCES `catalogstatus` (`id`),
  CONSTRAINT `udUnit` FOREIGN KEY (`unit`) REFERENCES `unit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unitdelivery`
--

LOCK TABLES `unitdelivery` WRITE;
/*!40000 ALTER TABLE `unitdelivery` DISABLE KEYS */;
INSERT INTO `unitdelivery` VALUES (1,14,2,2,NULL,NULL,NULL,'NO',NULL,NULL),(2,3,3,2,NULL,NULL,NULL,'NO',NULL,NULL),(3,13,5,2,NULL,NULL,NULL,'NO',NULL,NULL),(4,6,5,2,NULL,NULL,NULL,'NO',NULL,NULL),(5,24,6,2,NULL,NULL,NULL,'NO',NULL,NULL),(6,14,6,2,NULL,NULL,NULL,'NO',NULL,NULL),(7,24,8,2,NULL,NULL,NULL,'NO',3,2),(8,24,8,2,NULL,NULL,NULL,'NO',3,3),(9,24,8,2,NULL,NULL,NULL,'NO',1,1);
/*!40000 ALTER TABLE `unitdelivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usertype_id` int NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utype_idx` (`usertype_id`),
  CONSTRAINT `utype` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'aaaa','hola@hola.com','1234','2020-11-12 23:12:32',1,NULL),(2,'alfredo','alfredo@gmail.com','password','2020-11-13 00:11:42',5,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetail`
--

DROP TABLE IF EXISTS `userdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userdetail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iduser` int NOT NULL,
  `idprontoformAtt` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`iduser`),
  CONSTRAINT `user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetail`
--

LOCK TABLES `userdetail` WRITE;
/*!40000 ALTER TABLE `userdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `userdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpermissions`
--

DROP TABLE IF EXISTS `userpermissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userpermissions` (
  `iduser` int NOT NULL,
  `recoleccion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recibo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inventario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `despacho` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catalogos` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuarios` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manifiestos` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reportes` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `pUser_idx` (`iduser`),
  CONSTRAINT `pUser` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpermissions`
--

LOCK TABLES `userpermissions` WRITE;
/*!40000 ALTER TABLE `userpermissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `userpermissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` VALUES (1,'a'),(5,'Administrador'),(6,'Supervisor'),(7,'Almacenista'),(8,'Recolector'),(9,'Mensajero'),(10,'c');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouse` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse`
--

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;
INSERT INTO `warehouse` VALUES (2,'bodega'),(3,'otra bodega'),(4,'mas bodega'),(5,'una mas');
/*!40000 ALTER TABLE `warehouse` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-30 13:24:38
