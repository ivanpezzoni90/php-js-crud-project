-- MySQL dump 10.13  Distrib 5.7.16, for Win64 (x86_64)
--
-- Host: localhost    Database: eleva
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `impianti`
--

DROP TABLE IF EXISTS `impianti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impianti` (
  `impianti_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `indirizzo` varchar(200) DEFAULT NULL,
  `latitudine` varchar(45) DEFAULT NULL,
  `longitudine` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`impianti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impianti`
--

LOCK TABLES `impianti` WRITE;
/*!40000 ALTER TABLE `impianti` DISABLE KEYS */;
INSERT INTO `impianti` VALUES (10,'Casa','Via Olona  58  Barona  Albuzzano PV  Italia','45.2098745','9.277626499999997'),(11,'AgTech','Via Fratelli Cuzio  Pavia  PV  Italia','45.19600740000001','9.152569699999958'),(12,'Eleva','Via Rotta  37  Rotta  Travaco Siccomario PV  Italia','45.1639646','9.146244000000024'),(13,'Spazio Musica','Via Faruffini  5  27100 Pavia PV  Italia','45.18269853366','9.164389371871948'),(14,'Collegio Ghislieri','Monumento di Papa Pio V  Piazza Collegio Ghislieri  27100 Pavia PV  Italia','45.186517318300176','9.161691069602966'),(15,'Universita di Pavia','Corso Str. Nuova  65  27100 Pavia PV  Italia','45.186717702895464','9.15610134601593'),(16,'Castello di Belgioioso','SP234  5  27011 Belgioioso PV  Italia','45.160101968354155','9.312286376953125'),(17,'Ponte della Becca','SP617  11  27040 Linarolo PV  Italia','45.13724848710459','9.22550518261221');
/*!40000 ALTER TABLE `impianti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legm_persone_impianti`
--

DROP TABLE IF EXISTS `legm_persone_impianti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legm_persone_impianti` (
  `impianti_id` int(11) NOT NULL,
  `persone_id` int(11) NOT NULL,
  PRIMARY KEY (`persone_id`,`impianti_id`),
  KEY `impianti_id` (`impianti_id`),
  CONSTRAINT `legm_persone_impianti_ibfk_1` FOREIGN KEY (`impianti_id`) REFERENCES `impianti` (`impianti_id`),
  CONSTRAINT `legm_persone_impianti_ibfk_2` FOREIGN KEY (`persone_id`) REFERENCES `persone` (`persone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legm_persone_impianti`
--

LOCK TABLES `legm_persone_impianti` WRITE;
/*!40000 ALTER TABLE `legm_persone_impianti` DISABLE KEYS */;
INSERT INTO `legm_persone_impianti` VALUES (10,9),(11,9),(12,11),(13,10),(13,12),(14,10),(14,12),(15,10),(15,11),(15,12),(16,13);
/*!40000 ALTER TABLE `legm_persone_impianti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persone`
--

DROP TABLE IF EXISTS `persone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persone` (
  `persone_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cognome` varchar(45) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `ruolo` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`persone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persone`
--

LOCK TABLES `persone` WRITE;
/*!40000 ALTER TABLE `persone` DISABLE KEYS */;
INSERT INTO `persone` VALUES (9,'Ivan','Pezzoni','1990-05-23','supervisore','ivan.pezzoni90@gmail.com'),(10,'Mario','Rossi','1980-06-05','addetto','mario.rossi@gmail.com'),(11,'Luigi','Bianchi','1960-05-20','supervisore','luigi.bianchi@gmail.com'),(12,'Lucia','Brambilla','1950-10-13','addetto','lucia.b@alice.it'),(13,'Laura','Ferrari','1980-04-20','addetto','laura.f@alice.it');
/*!40000 ALTER TABLE `persone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'eleva'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-23 15:46:22
