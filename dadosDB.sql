-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: alatechmachines
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Dumping data for table `armazenamentos`
--

LOCK TABLES `armazenamentos` WRITE;
/*!40000 ALTER TABLE `armazenamentos` DISABLE KEYS */;
INSERT INTO `armazenamentos` VALUES (1,'hdd ',NULL,1,'HDD','500','SATA'),(2,'SSD',NULL,2,'SSD','200','M2');
/*!40000 ALTER TABLE `armazenamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fontes`
--

LOCK TABLES `fontes` WRITE;
/*!40000 ALTER TABLE `fontes` DISABLE KEYS */;
INSERT INTO `fontes` VALUES (1,'corsair w500',NULL,1,500,'bronze'),(2,'corsair',NULL,1,300,'ouro'),(3,'corsair',NULL,1,700,NULL);
/*!40000 ALTER TABLE `fontes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `maquinas`
--

LOCK TABLES `maquinas` WRITE;
/*!40000 ALTER TABLE `maquinas` DISABLE KEYS */;
/*!40000 ALTER TABLE `maquinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'corsair'),(2,'hyperx');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `memorias_ram`
--

LOCK TABLES `memorias_ram` WRITE;
/*!40000 ALTER TABLE `memorias_ram` DISABLE KEYS */;
INSERT INTO `memorias_ram` VALUES (1,'fury',NULL,2,NULL,'ddr4','2200w'),(2,'beasty',NULL,2,NULL,'ddr5','3000w');
/*!40000 ALTER TABLE `memorias_ram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `placas_mae`
--

LOCK TABLES `placas_mae` WRITE;
/*!40000 ALTER TABLE `placas_mae` DISABLE KEYS */;
INSERT INTO `placas_mae` VALUES (1,'gigabyte',NULL,1,'LG1151','ddr4',2,50,4,1,1),(2,'intel',NULL,1,'LG1155','ddr5',4,NULL,2,0,1);
/*!40000 ALTER TABLE `placas_mae` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `placasvideo`
--

LOCK TABLES `placasvideo` WRITE;
/*!40000 ALTER TABLE `placasvideo` DISABLE KEYS */;
INSERT INTO `placasvideo` VALUES (1,'gtx 1050',NULL,1,'4','gddr5',400,0);
/*!40000 ALTER TABLE `placasvideo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `processadores`
--

LOCK TABLES `processadores` WRITE;
/*!40000 ALTER TABLE `processadores` DISABLE KEYS */;
INSERT INTO `processadores` VALUES (1,'i5 ',NULL,1,'lg1151',6,'2200','3000','2',200);
/*!40000 ALTER TABLE `processadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-23 22:47:27
