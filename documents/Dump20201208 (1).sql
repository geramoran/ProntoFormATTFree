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
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (6,'Monterrey','Monterrey','Nuevo Leon'),(7,'laguna','Torreon','Coahuila'),(8,'uno','nuevo','hay'),(9,'1','ESTADO DE MEXICO','TULTITLAN'),(12,'Mazatlan','Mazatlan','Sinaloa'),(13,'Mazatlan','Mazatlan','Sinaloa');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogstatus`
--

DROP TABLE IF EXISTS `catalogstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalogstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int NOT NULL,
  `city` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'managua','aaaaa','1','1',27000,'1','1',8713107796,'a@a.com'),(2,'alguna','aa','Ninguno','Ocampo #130 Sur',1000,'x','y',8713107796,''),(4,'Yo','uno','1','1',1,'1','1',8713107796,''),(5,'alpura','aaaa101010aa0','nadie','18 de bravos',31000,'Morelia','Michoacan',6193336633,''),(6,'aaaa','aaaa101010aa0','aaa','aaaaa',35000,'aaa','aaa',8713107796,''),(7,'mymya','MAMG920318SE3','yo','aaa',20000,'lerdo','durango',8712345678,''),(8,'maria','VAHS851224NW4','yo','yo',10000,'lerdo','Coahuila',871234578,''),(9,'sss','jhvgjh','72432','34238732',7423,'kjehkshdf','wejiowujer',2387498723,'3h24ui2gh3'),(10,'AT&T COMUNICACIONES','ADF02836','MAURICIO MARTINEZ GONZALEZ','RIO LERMA 232',6500,'CDMX','CUAUHTEMOC',8127333848,'alfredodls91@gmail.com');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliverys`
--

DROP TABLE IF EXISTS `deliverys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deliverys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `areas_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uduser_idx` (`user`),
  KEY `udarea_idx` (`areas_id`),
  CONSTRAINT `udarea` FOREIGN KEY (`areas_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `uduser` FOREIGN KEY (`user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliverys`
--

LOCK TABLES `deliverys` WRITE;
/*!40000 ALTER TABLE `deliverys` DISABLE KEYS */;
INSERT INTO `deliverys` VALUES (9,1,'2020-12-02 00:00:00',6),(10,2,'2020-12-02 00:00:00',6);
/*!40000 ALTER TABLE `deliverys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `levels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'rack 1'),(2,'rack 2');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locates`
--

DROP TABLE IF EXISTS `locates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locates`
--

LOCK TABLES `locates` WRITE;
/*!40000 ALTER TABLE `locates` DISABLE KEYS */;
INSERT INTO `locates` VALUES (2,'a'),(3,'ubi'),(14,'cacion');
/*!40000 ALTER TABLE `locates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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
  CONSTRAINT `cliente` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'niña',7,17000.00,14000.00,1.8400,2000.00,10000.00,10,30,0),(3,'mina',4,12.00,10.00,1.7500,12.00,11.00,5,60,0),(4,'mylag',2,20.00,20.00,20.0000,520.00,9.00,9,90,0),(10,'a',5,1200.00,1200.00,1.5000,120.00,120.00,2,50,0),(15,'aaaaaaa',6,1200.00,1200.00,1.5000,120.00,120.00,2,50,0),(20,'Rastreo',6,120.00,120.00,10.0000,20.00,10.00,15,69,0),(22,'kkkk',4,33.00,99.00,2.0000,22.00,22.00,2,1,0),(23,'ASD AZUL',10,68.00,89.00,0.9000,20.00,7.00,23,85,0),(24,'COD',10,120.00,89.00,0.9000,20.00,7.00,23,85,0),(26,'TRANSFERENCIAS DE 1 A 15',10,70.00,0.00,0.9000,20.00,7.00,23,85,0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prontoforms`
--

DROP TABLE IF EXISTS `prontoforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prontoforms` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PRONTOFORM_USER` varchar(30) DEFAULT NULL,
  `FOLIO` text,
  `MONTOACOBRAR` varchar(10) DEFAULT NULL,
  `SEENTREGO` varchar(30) DEFAULT NULL,
  `NOMBREDEQUIENRECIBE` varchar(30) DEFAULT NULL,
  `FOTOCONTRATO1` varchar(255) DEFAULT NULL,
  `FOTOCONTRATO2` varchar(255) DEFAULT NULL,
  `FOTOCONTRATO3` varchar(255) DEFAULT NULL,
  `FOTOCONTRATO4` varchar(255) DEFAULT NULL,
  `FOTOCONTRATO5` varchar(255) DEFAULT NULL,
  `FOTOCONTRATO6` varchar(255) DEFAULT NULL,
  `FOTOCONTRATO7` varchar(255) DEFAULT NULL,
  `FOTODEINEFRONTAL` varchar(255) DEFAULT NULL,
  `FOTOINEREVERSO` varchar(255) DEFAULT NULL,
  `FIRMA` varchar(255) DEFAULT NULL,
  `FOTODEFACHADA` varchar(255) DEFAULT NULL,
  `FECHAYHORA` datetime DEFAULT NULL,
  `LOCALIZACIONGPS` longtext,
  `MOTIVODENORECIBIR` varchar(30) DEFAULT NULL,
  `HORAYFECHADEREAGENDA` json DEFAULT NULL,
  `REFERENCENUMBER` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prontoforms`
--

LOCK TABLES `prontoforms` WRITE;
/*!40000 ALTER TABLE `prontoforms` DISABLE KEYS */;
INSERT INTO `prontoforms` VALUES (1,'klyns.27',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'klyns.27','1222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'klyns.27','1222','120',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'klyns.27','1222','120','SI','yo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-07 17:26:02',NULL,NULL,NULL,NULL),(5,'klyns.27','1222','120','SI','yo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-07 17:26:02',NULL,NULL,NULL,NULL),(6,'klyns.27','1222','120','SI','yo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-07 17:26:02','{\"latitude\":25.521649,\"longitude\":-103.3825289,\"altitude\":1100.2}',NULL,NULL,NULL);
/*!40000 ALTER TABLE `prontoforms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relplaces`
--

DROP TABLE IF EXISTS `relplaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relplaces` (
  `id` int NOT NULL AUTO_INCREMENT,
  `locate_id` int DEFAULT NULL,
  `warehouse_id` int DEFAULT NULL,
  `level_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locate_idx` (`locate_id`),
  KEY `warehouse_idx` (`warehouse_id`),
  KEY `level_idx` (`level_id`),
  CONSTRAINT `level` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  CONSTRAINT `locate` FOREIGN KEY (`locate_id`) REFERENCES `locates` (`id`),
  CONSTRAINT `warehouse` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relplaces`
--

LOCK TABLES `relplaces` WRITE;
/*!40000 ALTER TABLE `relplaces` DISABLE KEYS */;
INSERT INTO `relplaces` VALUES (1,3,2,1),(4,2,3,2),(6,14,4,2);
/*!40000 ALTER TABLE `relplaces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remesas`
--

DROP TABLE IF EXISTS `remesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `remesas` (
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
  CONSTRAINT `rClient` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `rStatus` FOREIGN KEY (`status_id`) REFERENCES `catalogstatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remesas`
--

LOCK TABLES `remesas` WRITE;
/*!40000 ALTER TABLE `remesas` DISABLE KEYS */;
INSERT INTO `remesas` VALUES (202011230,'2020-11-23 00:00:00','2020-11-25 00:00:00',4,2,55.00,2),(202011231,'2020-11-23 00:00:00','2020-12-08 00:00:00',6,2,89.00,2),(202011232,'2020-11-23 00:00:00','2020-11-25 00:00:00',5,2,880.00,1),(202011243,'2020-11-24 00:00:00','2020-11-29 00:00:00',4,1,0.00,1),(202011244,'2020-11-24 00:00:00','2020-11-24 00:00:00',5,3,4451.00,2),(202011305,'2020-11-30 00:00:00','2020-12-02 00:00:00',6,3,34643.00,15),(202012020,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,0,0.00,1),(202012021,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,0,0.00,1),(202012022,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,1,2.00,1),(202012023,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,1,2.00,1),(202012024,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,1,2.00,1),(202012025,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,1,5.00,1),(202012026,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,0,0.00,1),(202012027,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,0,0.00,1),(202012028,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,0,0.00,1),(202012029,'2020-12-02 00:00:00','2020-12-25 00:00:00',10,0,0.00,1),(2020120310,'2020-12-03 00:00:00','2020-12-26 00:00:00',10,4,0.00,1),(2020120311,'2020-12-03 00:00:00','2020-12-26 00:00:00',10,4,1100.00,1),(2020120312,'2020-12-03 00:00:00','2020-12-26 00:00:00',10,2,0.00,1);
/*!40000 ALTER TABLE `remesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL,
  `recoleccion` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `recibo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `inventario` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `despacho` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `catalogos` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuarios` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `manifiestos` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reportes` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `pUser_idx` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storages`
--

DROP TABLE IF EXISTS `storages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `storages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `place` int NOT NULL,
  `unit` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wUnit_idx` (`unit`),
  KEY `wPlace_idx` (`place`),
  CONSTRAINT `wPlace` FOREIGN KEY (`place`) REFERENCES `relplaces` (`id`),
  CONSTRAINT `wUnit` FOREIGN KEY (`unit`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storages`
--

LOCK TABLES `storages` WRITE;
/*!40000 ALTER TABLE `storages` DISABLE KEYS */;
INSERT INTO `storages` VALUES (1,1,4),(2,1,5),(3,1,2),(4,1,3),(5,1,2),(6,1,3),(7,1,13),(8,4,14),(9,1,15),(10,6,4),(11,1,5);
/*!40000 ALTER TABLE `storages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unitdeliverys`
--

DROP TABLE IF EXISTS `unitdeliverys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unitdeliverys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int NOT NULL,
  `delivery` int NOT NULL,
  `visitStatus` int NOT NULL,
  `reason` int DEFAULT NULL,
  `visitDate` datetime DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `isMount` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mount` float DEFAULT NULL,
  `count` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `udUnit_idx` (`unit`),
  KEY `udStatus_idx` (`visitStatus`),
  KEY `udReason_idx` (`reason`),
  KEY `udDelivery_idx` (`delivery`),
  CONSTRAINT `udDelivery` FOREIGN KEY (`delivery`) REFERENCES `deliverys` (`id`),
  CONSTRAINT `udReason` FOREIGN KEY (`reason`) REFERENCES `catalogstatus` (`id`),
  CONSTRAINT `udStatus` FOREIGN KEY (`visitStatus`) REFERENCES `catalogstatus` (`id`),
  CONSTRAINT `udUnit` FOREIGN KEY (`unit`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unitdeliverys`
--

LOCK TABLES `unitdeliverys` WRITE;
/*!40000 ALTER TABLE `unitdeliverys` DISABLE KEYS */;
INSERT INTO `unitdeliverys` VALUES (1,14,9,2,NULL,NULL,NULL,'NO',120,2),(2,24,9,2,NULL,NULL,NULL,'NO',2,2),(3,24,10,2,NULL,NULL,NULL,'NO',2,3);
/*!40000 ALTER TABLE `unitdeliverys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `units` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idstatus` int NOT NULL,
  `remesa` int NOT NULL,
  `barcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idProduct` int NOT NULL,
  `mount` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uStatus_idx` (`idstatus`),
  KEY `uRemesa_idx` (`remesa`),
  KEY `uProduct_idx` (`idProduct`),
  CONSTRAINT `uProduct` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`),
  CONSTRAINT `uRemesa` FOREIGN KEY (`remesa`) REFERENCES `remesas` (`remesa`),
  CONSTRAINT `uStatus` FOREIGN KEY (`idstatus`) REFERENCES `catalogstatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (2,1,202011230,'42342',22,0.00),(3,1,202011230,'45343',22,55.00),(4,1,202011231,'3453458394058',20,23.00),(5,1,202011231,'23423427',20,66.00),(6,1,202011232,'94884',10,3.00),(7,1,202011232,'234234',10,877.00),(8,1,202011243,'22323421',3,0.00),(13,1,202011244,'555555',10,4.00),(14,1,202011244,'5555',10,3.00),(15,1,202011244,'5555',10,4444.00),(22,1,202011305,'3453453',15,66.00),(23,1,202011305,'34534333',15,44.00),(24,1,202011305,'555',15,34533.00),(25,1,202012025,'555',26,5.00),(26,1,2020120310,'MEX 1714211446CCI',26,0.00),(27,1,2020120310,'MEX 1714264341CCI',26,0.00),(28,1,2020120310,'MEX 1714345852CCI',26,0.00),(29,1,2020120310,'MEX 1714375735CCI',26,0.00),(30,1,2020120311,'MEX 1712881752CCI',24,100.00),(31,1,2020120311,'MEX 1714530791CCI',24,200.00),(32,1,2020120311,'MEX 1714561644CCI',24,300.00),(33,1,2020120311,'MEX 1711541998CCI',24,500.00),(34,1,2020120312,'MEX 1713124097CCI',26,0.00),(35,1,2020120312,'MEX 1713365306CCI',26,0.00);
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `roles_id` int DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `idprontoformAtt` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'aaaa','hola@hola.com','1234','2020-11-12 23:12:32',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'alfredo','alfredo@gmail.com','password','2020-11-13 00:11:42',5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES (2,'bodega'),(3,'otra bodega'),(4,'mas bodega'),(5,'una mas');
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-08 21:09:50
