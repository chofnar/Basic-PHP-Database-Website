-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: spital
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `consultatie`
--

DROP TABLE IF EXISTS `consultatie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultatie` (
  `idconsultatie` int NOT NULL AUTO_INCREMENT,
  `idpacient` int DEFAULT NULL,
  `idmedic` int DEFAULT NULL,
  `DataConsultatie` date DEFAULT NULL,
  `Diagnostic` varchar(45) DEFAULT NULL,
  `Tratament` varchar(500) DEFAULT NULL,
  `Reteta` varchar(1000) DEFAULT NULL,
  `Alte_Observatii` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idconsultatie`),
  KEY `fk_link_1_idx` (`idmedic`),
  KEY `fk_link_2_idx` (`idpacient`),
  CONSTRAINT `fk_link_1` FOREIGN KEY (`idmedic`) REFERENCES `medici` (`idmedic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_link_2` FOREIGN KEY (`idpacient`) REFERENCES `pacienti` (`idpacient`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultatie`
--

LOCK TABLES `consultatie` WRITE;
/*!40000 ALTER TABLE `consultatie` DISABLE KEYS */;
INSERT INTO `consultatie` VALUES (14,32,5,'2020-01-01','Healthy','Keep away form mother','-','This dude sings well'),(15,35,6,'2017-12-13','Possible paranormal affliction','Trying regular disenchantment','Salvia Divinorum infusion','His brother seems to make him feel better');
/*!40000 ALTER TABLE `consultatie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medici`
--

DROP TABLE IF EXISTS `medici`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medici` (
  `idmedic` int NOT NULL AUTO_INCREMENT,
  `Nume` varchar(45) DEFAULT NULL,
  `Prenume` varchar(45) DEFAULT NULL,
  `CNP` varchar(45) DEFAULT NULL,
  `Numar_Telefon` varchar(45) DEFAULT NULL,
  `Varsta` int DEFAULT NULL,
  `Sectie` varchar(45) DEFAULT NULL,
  `Grad` varchar(45) DEFAULT NULL,
  `Numar_Pager` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmedic`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medici`
--

LOCK TABLES `medici` WRITE;
/*!40000 ALTER TABLE `medici` DISABLE KEYS */;
INSERT INTO `medici` VALUES (5,'House','Gregory','1235142654126','43521543',25,'Diagnostics','Sef sectie','5235432'),(6,'Witch','Doctor','None','Doesnt use',243,'Alternative Medicine','Chief','Nope');
/*!40000 ALTER TABLE `medici` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacienti`
--

DROP TABLE IF EXISTS `pacienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pacienti` (
  `idpacient` int NOT NULL AUTO_INCREMENT,
  `Nume` varchar(45) DEFAULT NULL,
  `Prenume` varchar(45) DEFAULT NULL,
  `CNP` varchar(45) DEFAULT NULL,
  `Varsta` int DEFAULT NULL,
  `Adresa` varchar(45) DEFAULT NULL,
  `Numar_Telefon` varchar(45) DEFAULT NULL,
  `Alergii` varchar(200) DEFAULT NULL,
  `Afectiuni_Cronice` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idpacient`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacienti`
--

LOCK TABLES `pacienti` WRITE;
/*!40000 ALTER TABLE `pacienti` DISABLE KEYS */;
INSERT INTO `pacienti` VALUES (26,'Drake','Josh','13513652',25,'Westfield St #2','83756193586','Peanuts, Acetaminophen','Asthma'),(32,'Waters','Roger','4235234652',76,'Great Bookham','352651246','Bad music, his mom','None'),(33,'Smith','Winston','6246266',39,'Oceania','5234653262','None','Delusional, paranoic, tortured by a person named O Brien'),(34,'Jackson','Beskar','2742672',32,'Mandalore','462462','Imperials','Obsessively wants a lightsaber'),(35,'Winchester','Sam','24626124626',29,'USA, nomad','555141231413','Demons','Believes he is the sent of God');
/*!40000 ALTER TABLE `pacienti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-28 23:02:18
