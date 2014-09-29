-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: winopt
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `Output_Reference`
--

CREATE DATABASE IF NOT EXISTS winopt;

USE winopt;

DROP TABLE IF EXISTS `Output_Reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Output_Reference` (
  `input_uuid` varchar(80) NOT NULL,
  `output_uuid` varchar(80) NOT NULL,
  PRIMARY KEY (`input_uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Output_Reference`
--

LOCK TABLES `Output_Reference` WRITE;
/*!40000 ALTER TABLE `Output_Reference` DISABLE KEYS */;
/*!40000 ALTER TABLE `Output_Reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Simulations`
--

DROP TABLE IF EXISTS `Simulations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Simulations` (
  `uuid` varchar(80) NOT NULL DEFAULT '',
  `location` varchar(40) DEFAULT NULL,
  `length` float(25,10) DEFAULT NULL,
  `breadth` float(25,10) DEFAULT NULL,
  `area` float(30,10) DEFAULT NULL,
  `ac_system` int(11) DEFAULT NULL,
  `aa_fixed` float(25,10) DEFAULT NULL,
  `aa_var_ini` float(25,10) DEFAULT NULL,
  `aa_var_min` float(25,10) DEFAULT NULL,
  `aa_var_max` float(25,10) DEFAULT NULL,
  `aa_var_step` float(25,10) DEFAULT NULL,
  `wwr_fixed` float(25,10) DEFAULT NULL,
  `wwr_var_diff` varchar(10) DEFAULT NULL,
  `wwr_var_ini` float(25,10) DEFAULT NULL,
  `wwr_var_min` float(25,10) DEFAULT NULL,
  `wwr_var_max` float(25,10) DEFAULT NULL,
  `wwr_var_step` float(25,10) DEFAULT NULL,
  `od_fixed` float(25,10) DEFAULT NULL,
  `od_var_ini` float(25,10) DEFAULT NULL,
  `od_var_min` float(25,10) DEFAULT NULL,
  `od_var_max` float(25,10) DEFAULT NULL,
  `od_var_step` float(25,10) DEFAULT NULL,
  `ar_fixed` float(25,10) DEFAULT NULL,
  `ar_var_ini` float(25,10) DEFAULT NULL,
  `ar_var_min` float(25,10) DEFAULT NULL,
  `ar_var_max` float(25,10) DEFAULT NULL,
  `ar_var_step` float(25,10) DEFAULT NULL,
  `wt1` int(11) DEFAULT NULL,
  `wt2` int(11) DEFAULT NULL,
  `wt3` int(11) DEFAULT NULL,
  `wt4` int(11) DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Simulations`
--

LOCK TABLES `Simulations` WRITE;
/*!40000 ALTER TABLE `Simulations` DISABLE KEYS */;
/*!40000 ALTER TABLE `Simulations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-20  8:21:25
