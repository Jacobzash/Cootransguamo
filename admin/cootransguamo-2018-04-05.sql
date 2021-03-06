-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: 127.0.0.1
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `asignar`
--

DROP TABLE IF EXISTS `asignar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignar` (
  `id_asignar` int(10) NOT NULL AUTO_INCREMENT,
  `num_interno_vehiculo` int(10) NOT NULL,
  `id_conductor` int(10) NOT NULL,
  PRIMARY KEY (`id_asignar`),
  KEY `num_interno_vehiculo` (`num_interno_vehiculo`),
  KEY `id_conductor` (`id_conductor`),
  CONSTRAINT `asignar_ibfk_2` FOREIGN KEY (`num_interno_vehiculo`) REFERENCES `vehiculos` (`num_interno_vehiculo`),
  CONSTRAINT `asignar_ibfk_3` FOREIGN KEY (`id_conductor`) REFERENCES `conductores` (`id_conductor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignar`
--

LOCK TABLES `asignar` WRITE;
/*!40000 ALTER TABLE `asignar` DISABLE KEYS */;
INSERT INTO `asignar` (`id_asignar`, `num_interno_vehiculo`, `id_conductor`) VALUES (1,2,2);
/*!40000 ALTER TABLE `asignar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(3) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(2) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id_categoria`, `categoria`, `descripcion`) VALUES (1,'A1','(antes categor??a 1): Apropiada para conducir motocicletas de cilindraje igual o menor a 125 c.c'),(2,'A2','(antes categor??a 2): Para motocicletas, motociclos y mototriciclos (moto taxis)  de cilindrajes superiores a 125 c.c.'),(3,'B1','(antes categor??a 3): Autom??viles, motocarros, camperos, camionetas, veh??culos cuatromotor y microbuses de servicio particular.'),(4,'B2','(antes categor??a 5): camiones, buses y busetas de servicio particular.'),(5,'B3','(antes categor??a 6): Aplica para veh??culos articulados o tractocamiones.'),(6,'C1','(Categor??a 4 p??blico): Especializado en autom??viles, motocarros, cuatrimotor, camperos, camionetas y microbuses de servicio p??blico.'),(7,'C2','(antes categor??a C2 p??blico): para  conducir camiones r??gidos, buses y busetas de servicio p??blico. Equivale a la antigua categor??a 5.'),(8,'C3','(antes categor??a 6 p??blico): Aplica para veh??culos articulados de servicio p??blico.');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conductores`
--

DROP TABLE IF EXISTS `conductores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conductores` (
  `id_conductor` int(10) NOT NULL AUTO_INCREMENT,
  `documento_conductor` int(20) NOT NULL,
  `nombres_conductor` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos_conductor` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion_conductor` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular_conductor` bigint(15) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `licencia_conductor` int(20) NOT NULL,
  `vigencia_licencia` date NOT NULL,
  `id_categoria` int(3) NOT NULL,
  `id_estado` int(2) NOT NULL,
  `id_tipo_usuario` int(10) NOT NULL,
  PRIMARY KEY (`id_conductor`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_estado` (`id_estado`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `conductores_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`id_tipo_usuario`),
  CONSTRAINT `conductores_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `conductores_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conductores`
--

LOCK TABLES `conductores` WRITE;
/*!40000 ALTER TABLE `conductores` DISABLE KEYS */;
INSERT INTO `conductores` (`id_conductor`, `documento_conductor`, `nombres_conductor`, `apellidos_conductor`, `direccion_conductor`, `celular_conductor`, `email`, `password`, `licencia_conductor`, `vigencia_licencia`, `id_categoria`, `id_estado`, `id_tipo_usuario`) VALUES (1,1212,'jorge','lozano','calle 12',1234,'jorge@hotmail.com','12345',12345,'2018-03-26',7,1,2),(2,1313,'Jairo','Sanchez','Cra 5',3100987654,'jairo@hotmail.com','12345',223344,'2018-04-08',6,1,2);
/*!40000 ALTER TABLE `conductores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratar`
--

DROP TABLE IF EXISTS `contratar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratar` (
  `id_contratar` int(10) NOT NULL AUTO_INCREMENT,
  `id_conductor` int(10) NOT NULL,
  `id_propietario` int(10) NOT NULL,
  PRIMARY KEY (`id_contratar`),
  KEY `id_conductor` (`id_conductor`),
  KEY `id_propietario` (`id_propietario`),
  CONSTRAINT `contratar_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductores` (`id_conductor`),
  CONSTRAINT `contratar_ibfk_2` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id_propietario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratar`
--

LOCK TABLES `contratar` WRITE;
/*!40000 ALTER TABLE `contratar` DISABLE KEYS */;
INSERT INTO `contratar` (`id_contratar`, `id_conductor`, `id_propietario`) VALUES (1,2,2);
/*!40000 ALTER TABLE `contratar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` (`id_departamento`, `departamento`) VALUES (1,'Amazonas'),(2,'Antioquia'),(3,'Arauca'),(4,'Atl??ntico'),(5,'Bol??var'),(6,'Boyac??'),(7,'Caldas'),(8,'Caquet??'),(9,'Casanare'),(10,'Cauca'),(11,'Cesar'),(12,'Choc??'),(13,'C??rdoba'),(14,'Cundinamarca'),(15,'G??ainia'),(16,'Guaviare'),(17,'Huila'),(18,'La Guajira'),(19,'Magdalena'),(20,'Meta'),(21,'Nari??o'),(22,'Norte de Santander'),(23,'Putumayo'),(24,'Quindo'),(25,'Risaralda'),(26,'San Andr??s y Providencia'),(27,'Santander'),(28,'Sucre'),(29,'Tolima'),(30,'Valle del Cauca'),(31,'Vaup??s'),(32,'Vichada');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_rodamiento`
--

DROP TABLE IF EXISTS `detalle_rodamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_rodamiento` (
  `id_detalle_rodamiento` int(10) NOT NULL AUTO_INCREMENT,
  `id_rodamiento` int(10) NOT NULL,
  `horario` time NOT NULL,
  `dia1` int(5) NOT NULL,
  `dia2` int(5) NOT NULL,
  `dia3` int(5) NOT NULL,
  `dia4` int(5) NOT NULL,
  `dia5` int(5) NOT NULL,
  `dia6` int(5) NOT NULL,
  `dia7` int(5) NOT NULL,
  `dia8` int(5) NOT NULL,
  `dia9` int(5) NOT NULL,
  `dia10` int(5) NOT NULL,
  `dia11` int(5) NOT NULL,
  `dia12` int(5) NOT NULL,
  `dia13` int(5) NOT NULL,
  `dia14` int(5) NOT NULL,
  `dia15` int(5) NOT NULL,
  `dia16` int(5) NOT NULL,
  `dia17` int(5) NOT NULL,
  `dia18` int(5) NOT NULL,
  `dia19` int(5) NOT NULL,
  `dia20` int(5) NOT NULL,
  `dia21` int(5) NOT NULL,
  `dia22` int(5) NOT NULL,
  `dia23` int(5) NOT NULL,
  `dia24` int(5) NOT NULL,
  `dia25` int(5) NOT NULL,
  `dia26` int(5) NOT NULL,
  `dia27` int(5) NOT NULL,
  `dia28` int(5) NOT NULL,
  `dia29` int(5) DEFAULT NULL,
  `dia30` int(5) DEFAULT NULL,
  `dia31` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_rodamiento`),
  KEY `id_rodamiento` (`id_rodamiento`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_rodamiento`
--

LOCK TABLES `detalle_rodamiento` WRITE;
/*!40000 ALTER TABLE `detalle_rodamiento` DISABLE KEYS */;
INSERT INTO `detalle_rodamiento` (`id_detalle_rodamiento`, `id_rodamiento`, `horario`, `dia1`, `dia2`, `dia3`, `dia4`, `dia5`, `dia6`, `dia7`, `dia8`, `dia9`, `dia10`, `dia11`, `dia12`, `dia13`, `dia14`, `dia15`, `dia16`, `dia17`, `dia18`, `dia19`, `dia20`, `dia21`, `dia22`, `dia23`, `dia24`, `dia25`, `dia26`, `dia27`, `dia28`, `dia29`, `dia30`, `dia31`) VALUES (1,1,'05:00:00',225,63,159,225,16,225,61,151,61,61,151,151,63,179,245,63,151,16,235,172,16,172,151,225,63,63,179,159,124,179,172),(2,1,'05:10:00',16,245,225,159,225,172,245,245,63,16,251,172,33,124,251,33,33,124,235,124,63,172,138,245,16,159,251,235,245,63,159),(3,1,'05:20:00',235,225,235,124,172,33,124,63,235,245,138,172,225,245,245,124,138,251,33,251,63,33,16,61,63,179,251,61,151,124,225),(4,1,'05:30:00',63,138,138,124,225,172,172,159,251,225,245,124,138,16,16,235,63,251,63,251,138,225,179,251,124,159,63,138,151,172,245),(5,1,'05:40:00',235,225,138,251,33,151,124,124,179,159,172,159,179,33,251,138,235,61,16,151,138,124,235,124,225,245,151,63,61,245,61),(6,1,'05:50:00',16,159,179,61,138,172,245,138,151,225,61,251,225,159,235,33,245,159,63,251,159,159,159,61,63,124,172,245,235,179,63),(7,1,'06:00:00',61,138,61,124,16,245,124,159,124,33,33,251,172,245,61,179,179,138,124,151,61,235,245,63,159,16,235,179,159,138,179),(8,1,'06:10:00',138,251,179,159,16,33,16,63,151,33,138,251,138,159,33,61,16,16,124,16,124,63,251,124,235,235,245,124,16,251,61),(9,1,'06:20:00',245,172,225,245,124,159,251,179,63,33,251,138,16,33,245,33,16,63,245,251,235,61,251,151,33,63,245,138,33,151,33),(10,1,'06:30:00',225,245,159,245,61,61,235,16,159,179,138,138,159,138,179,235,138,138,124,33,151,172,151,63,151,179,235,63,245,235,63),(11,1,'06:40:00',245,245,33,179,179,251,63,138,225,124,251,225,159,235,251,251,61,245,235,124,61,159,63,159,172,245,63,33,172,16,235),(12,1,'06:50:00',179,124,159,124,245,61,151,235,159,251,33,63,138,245,179,151,245,179,63,172,61,16,159,251,172,33,16,179,63,235,159),(13,1,'07:00:00',245,225,179,245,172,245,251,245,225,172,124,225,159,63,16,63,235,138,245,225,151,124,235,63,251,61,63,33,159,16,235),(14,1,'07:10:00',61,61,251,124,235,16,225,235,138,225,33,235,235,159,159,138,124,179,33,61,225,63,151,124,245,225,16,138,172,33,33),(15,1,'07:20:00',16,235,159,172,179,159,245,179,235,151,225,61,63,179,172,251,235,179,16,245,63,251,225,16,172,138,138,138,179,138,124),(16,1,'07:30:00',159,124,179,179,33,138,151,245,172,16,159,245,179,33,225,138,63,251,124,33,33,159,33,124,138,63,225,138,63,33,235),(17,1,'07:40:00',16,16,61,138,245,172,16,159,245,16,251,33,16,63,159,63,151,124,124,235,235,172,138,172,235,179,172,179,251,172,124),(18,1,'07:50:00',61,245,251,172,151,251,245,159,16,63,225,16,33,251,63,235,225,235,225,172,124,172,61,172,179,33,251,138,33,61,172),(19,1,'08:00:00',124,16,61,251,124,179,251,16,225,138,61,61,138,235,172,225,16,124,251,33,225,61,124,33,225,245,159,63,245,235,159),(20,1,'08:10:00',251,16,16,61,138,63,151,138,235,245,251,16,235,63,179,225,172,33,179,138,179,33,16,63,16,172,245,138,225,235,235),(21,1,'08:20:00',251,138,172,151,179,179,179,225,159,16,33,61,61,179,63,33,179,33,63,151,63,235,245,245,16,16,245,151,245,61,61),(22,1,'08:30:00',151,16,33,138,251,124,33,251,124,63,124,225,138,225,172,235,138,138,251,251,124,151,225,235,159,172,159,33,16,138,179),(23,1,'08:40:00',124,235,179,16,124,138,138,63,16,151,179,159,151,245,138,63,159,159,16,225,124,61,235,235,33,159,33,16,172,179,33),(24,1,'08:50:00',235,124,63,61,225,179,151,225,245,151,225,124,63,245,63,172,61,33,124,179,172,33,138,33,179,33,151,235,225,63,61),(25,1,'09:00:00',179,251,225,63,172,16,124,179,179,159,124,179,124,61,61,138,235,179,124,172,124,245,138,245,225,151,16,225,16,225,61),(26,1,'09:10:00',251,151,63,16,245,251,235,63,151,159,225,179,251,251,225,179,151,225,124,151,172,124,159,225,63,225,225,179,151,63,172),(27,1,'09:20:00',124,63,245,151,225,251,159,124,159,63,159,235,235,159,159,138,61,159,225,63,245,245,225,16,61,151,251,63,245,63,138),(28,1,'09:30:00',33,63,172,251,63,33,235,251,16,251,251,33,61,61,172,33,63,245,138,151,61,33,138,159,138,251,138,245,235,124,124),(29,1,'09:40:00',151,33,245,61,16,251,63,61,172,61,235,159,235,179,63,225,172,235,159,159,33,251,61,159,245,225,16,179,16,138,235),(30,1,'09:50:00',151,16,251,179,33,235,33,33,159,124,16,61,151,138,124,225,33,124,124,16,61,251,33,245,33,151,159,251,16,33,16),(31,1,'10:00:00',172,245,251,138,63,179,225,138,225,245,172,61,172,151,61,159,159,33,235,33,172,124,235,225,179,245,63,63,124,179,16),(32,1,'10:10:00',61,16,33,225,245,235,61,251,245,179,172,159,225,172,251,179,172,138,179,138,159,179,61,33,124,172,251,63,179,235,159),(33,1,'10:20:00',245,225,225,63,172,138,235,61,251,245,16,179,245,138,159,179,33,61,225,225,63,33,33,225,33,138,245,124,16,138,33),(34,1,'10:30:00',151,159,63,151,245,16,251,179,235,138,138,151,179,61,138,235,33,33,245,251,151,138,251,235,235,63,235,61,61,245,61),(35,1,'10:40:00',151,61,124,61,33,159,61,235,33,235,251,172,245,63,61,251,159,33,172,138,225,172,251,251,225,172,16,225,61,159,235),(36,1,'10:50:00',225,61,235,235,151,63,251,61,33,61,33,179,159,245,151,16,235,138,16,245,172,172,33,63,151,16,63,33,63,225,225),(37,1,'11:00:00',138,235,245,63,245,16,63,124,179,151,61,61,251,159,151,235,251,124,179,151,124,251,179,61,33,225,172,124,172,235,16),(38,1,'11:10:00',16,61,16,138,235,151,61,16,16,124,172,251,225,138,172,151,225,61,124,61,124,33,151,159,61,138,159,235,63,245,138),(39,1,'11:20:00',225,225,16,159,179,235,151,16,151,124,159,138,172,251,245,151,138,179,124,251,63,225,159,172,33,61,245,151,16,251,225),(40,1,'11:30:00',63,33,172,61,225,33,61,251,251,138,124,251,251,245,251,159,61,245,33,245,63,138,151,124,179,124,138,225,63,16,63),(41,1,'11:40:00',124,63,61,172,172,225,138,235,245,124,16,245,63,63,61,16,63,172,138,251,33,159,16,124,172,251,16,235,225,138,33),(42,1,'11:50:00',159,16,251,235,33,151,63,16,63,235,33,245,124,245,151,225,245,151,124,179,179,33,245,16,61,124,245,16,225,138,172),(43,1,'12:00:00',159,151,245,138,159,179,251,225,172,61,61,138,61,245,251,124,172,63,61,159,151,245,159,159,124,159,63,245,61,61,172),(44,1,'12:10:00',63,61,159,159,61,63,138,251,235,179,179,16,179,124,251,151,251,159,33,63,33,225,138,159,138,138,225,61,151,159,245),(45,1,'12:20:00',138,16,61,124,225,172,16,235,235,172,225,63,251,61,235,16,16,33,235,33,172,151,63,151,179,245,172,151,179,235,61),(46,1,'12:30:00',251,151,63,151,225,225,61,33,159,63,179,61,179,61,251,61,251,61,245,245,159,16,138,16,235,172,235,138,245,251,63),(47,1,'12:40:00',16,245,172,61,151,225,124,235,235,159,235,245,225,124,251,61,245,124,33,63,63,235,172,225,124,245,225,225,16,63,172),(48,1,'12:50:00',235,245,16,151,124,245,33,138,138,235,251,159,172,61,235,63,172,151,251,61,225,172,225,225,16,33,33,63,138,61,159),(49,1,'13:00:00',151,172,33,33,16,63,225,179,138,251,245,159,172,16,151,235,16,172,138,251,251,172,124,16,151,245,172,172,61,225,124),(50,1,'13:10:00',159,251,235,16,151,16,16,138,159,251,16,251,33,235,159,225,16,138,172,159,61,245,61,235,16,245,63,172,245,151,225),(51,1,'13:20:00',172,63,63,124,138,151,151,245,138,235,179,63,63,179,151,151,16,33,61,159,172,151,63,63,245,151,16,33,33,172,159),(52,1,'13:30:00',151,124,179,63,16,16,151,16,235,251,159,159,138,245,33,16,159,179,159,151,124,61,138,33,138,172,124,61,61,235,124),(53,1,'13:40:00',245,172,159,235,33,179,251,179,138,159,63,235,172,16,172,61,225,179,172,151,151,159,61,151,251,245,33,251,235,245,151),(54,1,'13:50:00',159,33,61,179,151,179,63,33,63,61,179,251,61,124,151,33,235,33,63,33,151,225,179,151,61,179,159,63,63,251,16),(55,1,'14:00:00',61,172,33,151,124,61,245,159,61,151,225,251,225,138,245,33,179,151,63,124,251,251,61,61,225,61,235,138,63,33,138),(56,1,'14:10:00',33,16,159,61,245,251,124,16,235,159,235,61,251,179,63,159,124,138,251,225,251,33,225,251,16,245,225,225,33,159,61),(57,1,'14:20:00',151,225,63,159,63,245,159,172,172,138,225,151,61,235,61,235,138,33,225,245,33,63,235,251,159,245,245,245,172,63,63),(58,1,'14:30:00',225,138,138,16,235,138,124,138,33,172,235,16,179,16,172,179,16,61,245,16,16,235,151,63,172,63,235,151,124,225,172),(59,1,'14:40:00',225,61,16,124,138,124,61,245,245,124,33,16,61,16,16,235,63,61,33,159,225,235,235,245,124,16,159,251,63,225,151),(60,1,'14:50:00',33,124,138,159,151,179,61,16,225,159,16,235,245,124,225,151,159,138,245,235,61,151,251,235,33,33,124,245,179,124,179),(61,1,'15:00:00',151,159,124,124,33,151,63,235,235,138,159,63,61,251,63,172,124,33,61,124,179,138,63,16,172,251,179,138,245,63,225),(62,1,'15:10:00',151,151,235,172,16,245,61,225,63,251,16,159,61,16,245,179,245,251,179,172,225,225,61,151,225,251,33,63,151,16,172),(63,1,'15:20:00',124,63,33,63,138,124,138,245,172,179,63,251,138,172,16,235,124,16,16,61,16,138,33,225,235,159,235,172,124,225,151),(64,1,'15:30:00',61,61,235,124,179,235,138,138,138,225,61,172,138,124,33,61,225,245,172,16,159,33,225,245,172,124,159,33,151,179,235),(65,1,'15:40:00',63,124,179,235,61,172,124,172,172,251,33,225,124,138,179,245,235,245,172,61,61,225,159,225,235,61,172,16,251,63,172),(66,1,'15:50:00',16,179,179,172,251,61,124,225,172,225,159,235,124,33,245,172,16,245,251,61,245,61,16,225,151,225,63,235,61,235,245),(67,1,'16:00:00',179,251,172,63,179,251,225,151,16,159,245,138,235,172,225,179,151,33,159,172,172,61,245,16,172,124,151,16,151,151,16),(68,1,'16:10:00',124,245,151,16,61,33,225,151,138,235,159,33,16,63,151,63,179,16,16,16,235,225,16,124,245,33,172,245,61,124,172),(69,1,'16:20:00',63,251,245,151,151,225,159,235,251,172,245,159,61,124,245,33,225,245,235,159,16,151,138,235,179,16,63,179,16,235,61),(70,1,'16:30:00',245,159,251,63,245,245,138,245,138,179,159,61,16,179,159,16,124,235,159,225,151,63,124,179,235,245,245,138,225,33,138),(71,1,'16:40:00',16,235,63,138,179,179,179,124,33,151,172,235,63,33,172,151,124,33,179,172,124,172,16,172,172,235,16,33,16,179,138),(72,1,'16:50:00',245,124,124,61,172,16,251,159,235,235,124,235,179,16,124,235,159,251,138,225,235,225,138,33,251,16,251,151,245,33,16),(73,1,'17:00:00',251,251,179,225,151,245,179,151,124,63,63,33,179,245,159,151,235,172,251,179,33,235,33,138,251,179,138,159,172,124,124),(74,1,'17:10:00',172,225,151,63,159,159,225,251,138,159,172,16,138,138,179,159,235,151,151,61,172,225,179,63,245,172,33,235,63,33,159),(75,1,'17:20:00',138,159,159,151,33,159,159,124,124,61,151,159,61,245,124,33,138,138,151,33,172,245,245,138,245,235,124,63,225,151,61),(76,1,'17:30:00',61,61,61,251,225,245,225,63,225,151,33,179,225,63,251,159,245,63,61,245,16,16,61,151,172,138,151,225,172,179,151),(77,1,'17:40:00',33,172,159,251,245,33,245,179,33,151,63,124,172,159,172,225,138,33,159,16,159,138,33,151,16,251,16,235,179,16,61),(78,1,'17:50:00',235,159,16,245,245,179,172,159,245,179,235,251,251,172,159,251,16,251,172,61,138,151,245,235,235,151,251,138,33,245,61),(79,1,'18:00:00',63,63,138,225,61,151,225,16,63,251,33,33,225,124,159,33,235,138,16,225,235,124,235,235,124,124,179,159,16,172,179),(80,1,'18:10:00',235,138,138,138,63,138,245,251,235,245,63,138,225,172,151,235,235,225,225,251,225,151,179,251,33,245,179,251,16,124,33),(81,1,'18:20:00',179,151,151,179,63,124,245,61,159,245,225,225,245,151,16,159,63,251,251,124,16,159,245,179,16,251,151,251,63,16,159),(82,1,'18:30:00',63,179,172,251,151,151,151,225,225,151,159,159,179,151,16,172,245,245,16,33,124,225,225,124,251,124,63,172,172,124,225),(83,1,'18:40:00',159,225,151,63,124,179,124,225,61,172,225,33,179,33,179,124,138,61,63,151,138,172,245,124,16,63,124,179,179,179,33),(84,1,'18:50:00',151,159,33,179,179,151,172,225,172,172,159,61,138,172,172,151,138,251,61,124,61,159,225,63,61,124,172,33,63,172,225),(85,1,'19:00:00',61,245,63,124,124,124,159,33,61,172,172,225,225,159,172,63,33,251,61,172,151,151,179,33,124,151,245,63,235,138,138),(86,1,'19:10:00',138,151,16,61,235,124,251,33,225,172,61,63,138,172,179,251,33,63,16,124,251,235,124,179,63,172,251,179,16,124,16),(87,1,'19:20:00',159,33,235,138,124,225,172,138,138,124,172,33,172,225,138,16,235,63,33,151,245,172,16,225,124,33,138,179,235,138,138),(88,1,'19:30:00',63,245,63,179,251,179,235,251,151,225,225,61,235,138,16,179,245,16,151,251,124,159,124,159,251,245,245,235,16,16,61),(89,1,'19:40:00',159,225,159,151,225,159,63,138,235,138,245,225,251,225,138,16,124,179,16,251,245,251,33,251,251,16,138,33,138,138,124),(90,1,'19:50:00',172,179,151,63,151,16,159,179,33,33,179,235,138,16,251,33,63,159,235,124,172,124,124,245,61,179,61,225,151,138,151),(91,1,'20:00:00',124,124,159,225,159,33,251,61,61,179,245,124,124,159,61,16,138,159,251,138,245,179,179,225,245,159,179,245,16,235,33),(92,1,'20:10:00',124,159,245,138,151,63,138,225,172,124,33,16,33,124,159,172,251,179,33,159,245,151,151,179,151,235,16,235,172,159,124),(93,1,'20:20:00',235,179,172,225,245,225,251,61,33,172,179,33,33,16,172,33,235,61,172,138,159,63,172,61,159,61,138,151,61,33,63),(94,1,'20:30:00',179,235,33,159,172,16,172,159,124,235,245,235,179,235,61,172,235,63,63,138,16,33,172,138,61,124,235,245,124,33,124),(95,1,'20:40:00',61,235,16,251,225,235,225,124,159,159,61,251,33,179,225,245,179,16,235,16,172,33,225,138,151,151,33,124,16,151,225),(96,1,'20:50:00',159,172,63,33,159,138,138,16,251,179,225,151,63,251,235,172,33,225,16,251,16,151,124,63,245,124,61,33,245,61,159),(97,1,'21:10:00',16,159,138,235,63,33,245,225,251,159,159,251,63,251,235,245,124,138,235,172,225,245,138,63,251,245,235,16,138,235,245),(98,1,'21:10:00',172,235,172,138,159,179,33,16,151,16,63,159,235,61,251,172,251,16,151,16,16,151,33,138,225,61,151,138,245,172,172),(99,1,'21:20:00',151,225,245,251,124,33,245,159,245,33,245,33,235,172,33,245,245,225,179,33,33,225,63,61,151,159,179,179,138,179,61),(100,1,'21:30:00',225,16,33,179,172,159,63,179,124,251,179,251,61,61,61,251,16,172,159,151,251,172,245,179,33,245,245,124,151,159,138);
/*!40000 ALTER TABLE `detalle_rodamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_rutas`
--

DROP TABLE IF EXISTS `detalle_rutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_rutas` (
  `id_detalle_rutas` int(10) NOT NULL AUTO_INCREMENT,
  `id_rutas` int(10) NOT NULL,
  `horario` time NOT NULL,
  `id_estado` int(10) NOT NULL,
  PRIMARY KEY (`id_detalle_rutas`),
  KEY `id_rutas` (`id_rutas`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `detalle_rutas_ibfk_1` FOREIGN KEY (`id_rutas`) REFERENCES `rutas` (`id_rutas`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_rutas`
--

LOCK TABLES `detalle_rutas` WRITE;
/*!40000 ALTER TABLE `detalle_rutas` DISABLE KEYS */;
INSERT INTO `detalle_rutas` (`id_detalle_rutas`, `id_rutas`, `horario`, `id_estado`) VALUES (1,1,'05:00:00',1),(2,1,'05:30:00',1),(3,1,'06:00:00',1),(4,1,'06:30:00',1),(5,1,'07:00:00',1),(6,1,'07:30:00',1),(7,1,'08:00:00',1),(8,1,'08:30:00',1),(9,1,'09:00:00',1),(10,1,'09:30:00',1),(11,1,'10:00:00',1),(12,1,'10:30:00',1),(13,1,'11:00:00',1),(14,1,'11:30:00',1),(15,1,'12:00:00',1),(16,1,'12:30:00',1),(17,1,'13:00:00',1),(18,1,'13:30:00',1),(19,1,'14:00:00',1),(20,1,'14:30:00',1),(21,1,'15:00:00',1),(22,1,'15:30:00',1),(23,1,'16:00:00',1),(24,1,'16:30:00',1),(25,1,'17:00:00',1),(26,2,'05:00:00',1),(27,2,'05:30:00',1),(28,2,'06:00:00',1),(29,2,'06:30:00',1),(30,2,'07:00:00',1),(31,2,'07:30:00',1),(32,2,'08:00:00',1),(33,2,'08:30:00',1),(34,2,'09:00:00',1),(35,2,'09:30:00',1),(36,2,'10:00:00',1),(37,2,'10:30:00',1),(38,2,'11:00:00',1),(39,2,'11:30:00',1),(40,2,'12:00:00',1),(41,2,'12:30:00',1),(42,2,'13:00:00',1),(43,2,'13:30:00',1),(44,2,'14:00:00',1),(45,2,'14:30:00',1),(46,2,'15:00:00',1),(47,2,'15:30:00',1),(48,2,'16:00:00',1),(49,2,'16:30:00',1),(50,2,'17:00:00',1),(51,3,'06:00:00',1),(52,4,'07:00:00',1),(53,5,'06:00:00',1),(54,5,'08:00:00',1),(55,5,'18:00:00',1),(56,6,'08:00:00',1),(57,6,'10:00:00',1),(58,6,'19:00:00',1),(59,7,'06:00:00',1),(60,7,'06:30:00',1),(61,7,'07:30:00',1),(62,7,'08:00:00',1),(63,7,'09:00:00',1),(64,7,'09:30:00',1),(65,7,'10:00:00',1),(66,7,'11:00:00',1),(67,7,'13:00:00',1),(68,7,'14:00:00',1),(69,7,'15:00:00',1),(70,7,'17:00:00',1),(72,8,'06:00:00',1),(73,8,'06:30:00',1),(74,8,'07:30:00',1),(75,8,'08:00:00',1),(76,8,'09:00:00',1),(77,8,'09:30:00',1),(78,8,'10:00:00',1),(79,8,'11:00:00',1),(80,8,'13:00:00',1),(81,8,'14:00:00',1),(82,8,'15:00:00',1),(83,8,'17:00:00',1),(84,8,'18:00:00',1),(85,9,'05:00:00',1),(86,9,'05:10:00',1),(87,9,'05:20:00',1),(88,9,'05:30:00',1),(89,9,'05:40:00',1),(90,9,'05:50:00',1),(91,9,'06:00:00',1),(92,9,'06:10:00',1),(93,9,'06:20:00',1),(94,9,'06:30:00',1),(95,9,'06:40:00',1),(96,9,'06:50:00',1),(97,9,'07:00:00',1),(98,9,'07:10:00',1),(99,9,'07:20:00',1),(100,9,'07:30:00',1),(101,9,'07:40:00',1),(102,9,'07:50:00',1),(103,9,'08:00:00',1),(104,9,'08:10:00',1),(105,9,'08:20:00',1),(106,9,'08:30:00',1),(107,9,'08:40:00',1),(108,9,'08:50:00',1),(109,9,'09:00:00',1),(110,9,'09:10:00',1),(111,9,'09:20:00',1),(112,9,'09:30:00',1),(113,9,'09:40:00',1),(114,9,'09:50:00',1),(115,9,'10:00:00',1),(116,9,'10:10:00',1),(117,9,'10:20:00',1),(118,9,'10:30:00',1),(119,9,'10:40:00',1),(120,9,'10:50:00',1),(121,9,'11:00:00',1),(122,9,'11:10:00',1),(123,9,'11:20:00',1),(124,9,'11:30:00',1),(125,9,'11:40:00',1),(126,9,'11:50:00',1),(127,9,'12:00:00',1),(128,9,'12:10:00',1),(129,9,'12:20:00',1),(130,9,'12:30:00',1),(131,9,'12:40:00',1),(132,9,'12:50:00',1),(133,9,'13:00:00',1),(134,9,'13:10:00',1),(135,9,'13:20:00',1),(136,9,'13:30:00',1),(137,9,'13:40:00',1),(138,9,'13:50:00',1),(139,9,'14:00:00',1),(140,9,'14:10:00',1),(141,9,'14:20:00',1),(142,9,'14:30:00',1),(143,9,'14:40:00',1),(144,9,'14:50:00',1),(145,9,'15:00:00',1),(146,9,'15:10:00',1),(147,9,'15:20:00',1),(148,9,'15:30:00',1),(149,9,'15:40:00',1),(150,9,'15:50:00',1),(151,9,'16:00:00',1),(152,9,'16:10:00',1),(153,9,'16:20:00',1),(154,9,'16:30:00',1),(155,9,'16:40:00',1),(156,9,'16:50:00',1),(157,9,'17:00:00',1),(158,9,'17:10:00',1),(159,9,'17:20:00',1),(160,9,'17:30:00',1),(161,9,'17:40:00',1),(162,9,'17:50:00',1),(163,9,'18:00:00',1),(164,9,'18:10:00',1),(165,9,'18:20:00',1),(166,9,'18:30:00',1),(167,9,'18:40:00',1),(168,9,'18:50:00',1),(169,9,'19:00:00',1),(170,9,'19:10:00',1),(171,9,'19:20:00',1),(172,9,'19:30:00',1),(173,9,'19:40:00',1),(174,9,'19:50:00',1),(175,9,'20:00:00',1),(176,9,'20:10:00',1),(177,9,'20:20:00',1),(178,9,'20:30:00',1),(179,9,'20:40:00',1),(180,9,'20:50:00',1),(181,9,'21:10:00',1),(182,9,'21:10:00',1),(183,9,'21:20:00',1),(184,9,'21:30:00',1);
/*!40000 ALTER TABLE `detalle_rutas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(2) NOT NULL AUTO_INCREMENT,
  `estado` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id_estado`, `estado`) VALUES (1,'Activo'),(2,'Inactivo');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) NOT NULL,
  `municipio` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `id_departamento` (`id_departamento`),
  CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=1103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` (`id_municipio`, `id_departamento`, `municipio`) VALUES (1,1,'Leticia'),(2,1,'Puerto Nari??o'),(3,2,'Abejorral'),(4,2,'Abriaqu??'),(5,2,'Alejandria'),(6,2,'Amag??'),(7,2,'Amalfi'),(8,2,'Andes'),(9,2,'Angel??polis'),(10,2,'Angostura'),(11,2,'Anor??'),(12,2,'Anz??'),(13,2,'Apartad??'),(14,2,'Arboletes'),(15,2,'Argelia'),(16,2,'Armenia'),(17,2,'Barbosa'),(18,2,'Bello'),(19,2,'Belmira'),(20,2,'Betania'),(21,2,'Betulia'),(22,2,'Bol??var'),(23,2,'Brice??o'),(24,2,'Bur??tica'),(25,2,'Caicedo'),(26,2,'Caldas'),(27,2,'Campamento'),(28,2,'Caracol??'),(29,2,'Caramanta'),(30,2,'Carepa'),(31,2,'Carmen de Viboral'),(32,2,'Carolina'),(33,2,'Caucasia'),(34,2,'Ca??asgordas'),(35,2,'Chigorod??'),(36,2,'Cisneros'),(37,2,'Cocorn??'),(38,2,'Concepci??n'),(39,2,'Concordia'),(40,2,'Copacabana'),(41,2,'C??ceres'),(42,2,'Dabeiba'),(43,2,'Don Mat??as'),(44,2,'Eb??jico'),(45,2,'El Bagre'),(46,2,'Entrerr??os'),(47,2,'Envigado'),(48,2,'Fredonia'),(49,2,'Frontino'),(50,2,'Giraldo'),(51,2,'Girardota'),(52,2,'Granada'),(53,2,'Guadalupe'),(54,2,'Guarne'),(55,2,'Guatap??'),(56,2,'G??mez Plata'),(57,2,'Heliconia'),(58,2,'Hispania'),(59,2,'Itag????'),(60,2,'Ituango'),(61,2,'Jard??n'),(62,2,'Jeric??'),(63,2,'La Ceja'),(64,2,'La Estrella'),(65,2,'La Pintada'),(66,2,'La Uni??n'),(67,2,'Liborina'),(68,2,'Maceo'),(69,2,'Marinilla'),(70,2,'Medell??n'),(71,2,'Montebello'),(72,2,'Murind??'),(73,2,'Mutat??'),(74,2,'Nari??o'),(75,2,'Nech??'),(76,2,'Necocl??'),(77,2,'Olaya'),(78,2,'Peque'),(79,2,'Pe??ol'),(80,2,'Pueblorrico'),(81,2,'Puerto Berr??o'),(82,2,'Puerto Nare'),(83,2,'Puerto Triunfo'),(84,2,'Remedios'),(85,2,'Retiro'),(86,2,'R??onegro'),(87,2,'Sabanalarga'),(88,2,'Sabaneta'),(89,2,'Salgar'),(90,2,'San Andr??s de Cuerqu??a'),(91,2,'San Carlos'),(92,2,'San Francisco'),(93,2,'San Jer??nimo'),(94,2,'San Jos?? de Monta??a'),(95,2,'San Juan de Urab??'),(96,2,'San Lu??s'),(97,2,'San Pedro'),(98,2,'San Pedro de Urab??'),(99,2,'San Rafael'),(100,2,'San Roque'),(101,2,'San Vicente'),(102,2,'Santa B??rbara'),(103,2,'Santa F?? de Antioquia'),(104,2,'Santa Rosa de Osos'),(105,2,'Santo Domingo'),(106,2,'Santuario'),(107,2,'Segovia'),(108,2,'Sons??n'),(109,2,'Sopetr??n'),(110,2,'Taraz??'),(111,2,'Tarso'),(112,2,'Titirib??'),(113,2,'Toledo'),(114,2,'Turbo'),(115,2,'T??mesis'),(116,2,'Uramita'),(117,2,'Urrao'),(118,2,'Valdivia'),(119,2,'Valparaiso'),(120,2,'Vegach??'),(121,2,'Venecia'),(122,2,'Vig??a del Fuerte'),(123,2,'Yal??'),(124,2,'Yarumal'),(125,2,'Yolomb??'),(126,2,'Yond?? (Casabe)'),(127,2,'Zaragoza'),(128,3,'Arauca'),(129,3,'Arauquita'),(130,3,'Cravo Norte'),(131,3,'Fort??l'),(132,3,'Puerto Rond??n'),(133,3,'Saravena'),(134,3,'Tame'),(135,4,'Baranoa'),(136,4,'Barranquilla'),(137,4,'Campo de la Cruz'),(138,4,'Candelaria'),(139,4,'Galapa'),(140,4,'Juan de Acosta'),(141,4,'Luruaco'),(142,4,'Malambo'),(143,4,'Manat??'),(144,4,'Palmar de Varela'),(145,4,'Piojo'),(146,4,'Polonuevo'),(147,4,'Ponedera'),(148,4,'Puerto Colombia'),(149,4,'Repel??n'),(150,4,'Sabanagrande'),(151,4,'Sabanalarga'),(152,4,'Santa Luc??a'),(153,4,'Santo Tom??s'),(154,4,'Soledad'),(155,4,'Suan'),(156,4,'Tubar??'),(157,4,'Usiacuri'),(158,5,'Ach??'),(159,5,'Altos del Rosario'),(160,5,'Arenal'),(161,5,'Arjona'),(162,5,'Arroyohondo'),(163,5,'Barranco de Loba'),(164,5,'Calamar'),(165,5,'Cantagallo'),(166,5,'Cartagena'),(167,5,'Cicuco'),(168,5,'Clemencia'),(169,5,'C??rdoba'),(170,5,'El Carmen de Bol??var'),(171,5,'El Guamo'),(172,5,'El Pe??on'),(173,5,'Hatillo de Loba'),(174,5,'Magangu??'),(175,5,'Mahates'),(176,5,'Margarita'),(177,5,'Mar??a la Baja'),(178,5,'Momp??s'),(179,5,'Montecristo'),(180,5,'Morales'),(181,5,'Noros??'),(182,5,'Pinillos'),(183,5,'Regidor'),(184,5,'R??o Viejo'),(185,5,'San Cristobal'),(186,5,'San Estanislao'),(187,5,'San Fernando'),(188,5,'San Jacinto'),(189,5,'San Jacinto del Cauca'),(190,5,'San Juan de Nepomuceno'),(191,5,'San Mart??n de Loba'),(192,5,'San Pablo'),(193,5,'Santa Catalina'),(194,5,'Santa Rosa '),(195,5,'Santa Rosa del Sur'),(196,5,'Simit??'),(197,5,'Soplaviento'),(198,5,'Talaigua Nuevo'),(199,5,'Tiquisio (Puerto Rico)'),(200,5,'Turbaco'),(201,5,'Turban??'),(202,5,'Villanueva'),(203,5,'Zambrano'),(204,6,'Almeida'),(205,6,'Aquitania'),(206,6,'Arcabuco'),(207,6,'Bel??n'),(208,6,'Berbeo'),(209,6,'Beteitiva'),(210,6,'Boavita'),(211,6,'Boyac??'),(212,6,'Brice??o'),(213,6,'Buenavista'),(214,6,'Busbanza'),(215,6,'Caldas'),(216,6,'Campohermoso'),(217,6,'Cerinza'),(218,6,'Chinavita'),(219,6,'Chiquinquir??'),(220,6,'Chiscas'),(221,6,'Chita'),(222,6,'Chitaraque'),(223,6,'Chivat??'),(224,6,'Ch??quiza'),(225,6,'Ch??vor'),(226,6,'Ci??naga'),(227,6,'Coper'),(228,6,'Corrales'),(229,6,'Covarach??a'),(230,6,'Cubar??'),(231,6,'Cucaita'),(232,6,'Cuitiva'),(233,6,'C??mbita'),(234,6,'Duitama'),(235,6,'El Cocuy'),(236,6,'El Espino'),(237,6,'Firavitoba'),(238,6,'Floresta'),(239,6,'Gachantiv??'),(240,6,'Garagoa'),(241,6,'Guacamayas'),(242,6,'Guateque'),(243,6,'Guayat??'),(244,6,'Guic??n'),(245,6,'G??meza'),(246,6,'Iz??'),(247,6,'Jenesano'),(248,6,'Jeric??'),(249,6,'La Capilla'),(250,6,'La Uvita'),(251,6,'La Victoria'),(252,6,'Labranzagrande'),(253,6,'Macanal'),(254,6,'Marip??'),(255,6,'Miraflores'),(256,6,'Mongua'),(257,6,'Mongu??'),(258,6,'Moniquir??'),(259,6,'Motavita'),(260,6,'Muzo'),(261,6,'Nobsa'),(262,6,'Nuevo Col??n'),(263,6,'Oicat??'),(264,6,'Otanche'),(265,6,'Pachavita'),(266,6,'Paipa'),(267,6,'Pajarito'),(268,6,'Panqueba'),(269,6,'Pauna'),(270,6,'Paya'),(271,6,'Paz de R??o'),(272,6,'Pesca'),(273,6,'Pisva'),(274,6,'Puerto Boyac??'),(275,6,'P??ez'),(276,6,'Quipama'),(277,6,'Ramiriqu??'),(278,6,'Rond??n'),(279,6,'R??quira'),(280,6,'Saboy??'),(281,6,'Samac??'),(282,6,'San Eduardo'),(283,6,'San Jos?? de Pare'),(284,6,'San Lu??s de Gaceno'),(285,6,'San Mateo'),(286,6,'San Miguel de Sema'),(287,6,'San Pablo de Borbur'),(288,6,'Santa Mar??a'),(289,6,'Santa Rosa de Viterbo'),(290,6,'Santa Sof??a'),(291,6,'Santana'),(292,6,'Sativanorte'),(293,6,'Sativasur'),(294,6,'Siachoque'),(295,6,'Soat??'),(296,6,'Socha'),(297,6,'Socot??'),(298,6,'Sogamoso'),(299,6,'Somondoco'),(300,6,'Sora'),(301,6,'Sorac??'),(302,6,'Sotaquir??'),(303,6,'Susac??n'),(304,6,'Sutamarch??n'),(305,6,'Sutatenza'),(306,6,'S??chica'),(307,6,'Tasco'),(308,6,'Tenza'),(309,6,'Tiban??'),(310,6,'Tibasosa'),(311,6,'Tinjac??'),(312,6,'Tipacoque'),(313,6,'Toca'),(314,6,'Togu??'),(315,6,'Topag??'),(316,6,'Tota'),(317,6,'Tunja'),(318,6,'Tunungua'),(319,6,'Turmequ??'),(320,6,'Tuta'),(321,6,'Tutas??'),(322,6,'Ventaquemada'),(323,6,'Villa de Leiva'),(324,6,'Viracach??'),(325,6,'Zetaquir??'),(326,6,'??mbita'),(327,7,'Aguadas'),(328,7,'Anserma'),(329,7,'Aranzazu'),(330,7,'Belalc??zar'),(331,7,'Chinchin??'),(332,7,'Filadelfia'),(333,7,'La Dorada'),(334,7,'La Merced'),(335,7,'La Victoria'),(336,7,'Manizales'),(337,7,'Manzanares'),(338,7,'Marmato'),(339,7,'Marquetalia'),(340,7,'Marulanda'),(341,7,'Neira'),(342,7,'Norcasia'),(343,7,'Palestina'),(344,7,'Pensilvania'),(345,7,'P??cora'),(346,7,'Risaralda'),(347,7,'R??o Sucio'),(348,7,'Salamina'),(349,7,'Saman??'),(350,7,'San Jos??'),(351,7,'Sup??a'),(352,7,'Villamar??a'),(353,7,'Viterbo'),(354,8,'Albania'),(355,8,'Bel??n de los Andaqu??es'),(356,8,'Cartagena del Chair??'),(357,8,'Curillo'),(358,8,'El Doncello'),(359,8,'El Paujil'),(360,8,'Florencia'),(361,8,'La Monta??ita'),(362,8,'Mil??n'),(363,8,'Morelia'),(364,8,'Puerto Rico'),(365,8,'San Jos?? del Fragua'),(366,8,'San Vicente del Cagu??n'),(367,8,'Solano'),(368,8,'Solita'),(369,8,'Valparaiso'),(370,9,'Aguazul'),(371,9,'Ch??meza'),(372,9,'Hato Corozal'),(373,9,'La Salina'),(374,9,'Man??'),(375,9,'Monterrey'),(376,9,'Nunch??a'),(377,9,'Orocu??'),(378,9,'Paz de Ariporo'),(379,9,'Pore'),(380,9,'Recetor'),(381,9,'Sabanalarga'),(382,9,'San Lu??s de Palenque'),(383,9,'S??cama'),(384,9,'Tauramena'),(385,9,'Trinidad'),(386,9,'T??mara'),(387,9,'Villanueva'),(388,9,'Yopal'),(389,10,'Almaguer'),(390,10,'Argelia'),(391,10,'Balboa'),(392,10,'Bol??var'),(393,10,'Buenos Aires'),(394,10,'Cajib??o'),(395,10,'Caldono'),(396,10,'Caloto'),(397,10,'Corinto'),(398,10,'El Tambo'),(399,10,'Florencia'),(400,10,'Guachen??'),(401,10,'Guap??'),(402,10,'Inz??'),(403,10,'Jambal??'),(404,10,'La Sierra'),(405,10,'La Vega'),(406,10,'L??pez (Micay)'),(407,10,'Mercaderes'),(408,10,'Miranda'),(409,10,'Morales'),(410,10,'Padilla'),(411,10,'Pat??a (El Bordo)'),(412,10,'Piamonte'),(413,10,'Piendam??'),(414,10,'Popay??n'),(415,10,'Puerto Tejada'),(416,10,'Purac?? (Coconuco)'),(417,10,'P??ez (Belalcazar)'),(418,10,'Rosas'),(419,10,'San Sebasti??n'),(420,10,'Santa Rosa'),(421,10,'Santander de Quilichao'),(422,10,'Silvia'),(423,10,'Sotara (Paispamba)'),(424,10,'Sucre'),(425,10,'Su??rez'),(426,10,'Timbiqu??'),(427,10,'Timb??o'),(428,10,'Torib??o'),(429,10,'Totor??'),(430,10,'Villa Rica'),(431,11,'Aguachica'),(432,11,'Agust??n Codazzi'),(433,11,'Astrea'),(434,11,'Becerr??l'),(435,11,'Bosconia'),(436,11,'Chimichagua'),(437,11,'Chiriguan??'),(438,11,'Curuman??'),(439,11,'El Copey'),(440,11,'El Paso'),(441,11,'Gamarra'),(442,11,'Gonzalez'),(443,11,'La Gloria'),(444,11,'La Jagua de Ibirico'),(445,11,'La Paz (Robles)'),(446,11,'Manaure Balc??n del Cesar'),(447,11,'Pailitas'),(448,11,'Pelaya'),(449,11,'Pueblo Bello'),(450,11,'R??o de oro'),(451,11,'San Alberto'),(452,11,'San Diego'),(453,11,'San Mart??n'),(454,11,'Tamalameque'),(455,11,'Valledupar'),(456,12,'Acand??'),(457,12,'Alto Baud?? (Pie de Pato)'),(458,12,'Atrato (Yuto)'),(459,12,'Bagad??'),(460,12,'Bah??a Solano (M??tis)'),(461,12,'Bajo Baud?? (Pizarro)'),(462,12,'Bel??n de Bajir??'),(463,12,'Bojay?? (Bellavista)'),(464,12,'Cant??n de San Pablo'),(465,12,'Carmen del Dari??n (CURBARAD??)'),(466,12,'Condoto'),(467,12,'C??rtegui'),(468,12,'El Carmen de Atrato'),(469,12,'Istmina'),(470,12,'Jurad??'),(471,12,'Llor??'),(472,12,'Medio Atrato'),(473,12,'Medio Baud??'),(474,12,'Medio San Juan (ANDAGOYA)'),(475,12,'Novita'),(476,12,'Nuqu??'),(477,12,'Quibd??'),(478,12,'R??o Ir??'),(479,12,'R??o Quito'),(480,12,'R??osucio'),(481,12,'San Jos?? del Palmar'),(482,12,'Santa Genoveva de Docorod??'),(483,12,'Sip??'),(484,12,'Tad??'),(485,12,'Ungu??a'),(486,12,'Uni??n Panamericana (??NIMAS)'),(487,13,'Ayapel'),(488,13,'Buenavista'),(489,13,'Canalete'),(490,13,'Ceret??'),(491,13,'Chim??'),(492,13,'Chin??'),(493,13,'Ci??naga de Oro'),(494,13,'Cotorra'),(495,13,'La Apartada y La Frontera'),(496,13,'Lorica'),(497,13,'Los C??rdobas'),(498,13,'Momil'),(499,13,'Montel??bano'),(500,13,'Monteria'),(501,13,'Mo??itos'),(502,13,'Planeta Rica'),(503,13,'Pueblo Nuevo'),(504,13,'Puerto Escondido'),(505,13,'Puerto Libertador'),(506,13,'Pur??sima'),(507,13,'Sahag??n'),(508,13,'San Andr??s Sotavento'),(509,13,'San Antero'),(510,13,'San Bernardo del Viento'),(511,13,'San Carlos'),(512,13,'San Jos?? de Ur??'),(513,13,'San Pelayo'),(514,13,'Tierralta'),(515,13,'Tuch??n'),(516,13,'Valencia'),(517,14,'Agua de Dios'),(518,14,'Alb??n'),(519,14,'Anapoima'),(520,14,'Anolaima'),(521,14,'Apulo'),(522,14,'Arbel??ez'),(523,14,'Beltr??n'),(524,14,'Bituima'),(525,14,'Bogot?? D.C.'),(526,14,'Bojac??'),(527,14,'Cabrera'),(528,14,'Cachipay'),(529,14,'Cajic??'),(530,14,'Caparrap??'),(531,14,'Carmen de Carupa'),(532,14,'Chaguan??'),(533,14,'Chipaque'),(534,14,'Choach??'),(535,14,'Chocont??'),(536,14,'Ch??a'),(537,14,'Cogua'),(538,14,'Cota'),(539,14,'Cucunub??'),(540,14,'C??queza'),(541,14,'El Colegio'),(542,14,'El Pe????n'),(543,14,'El Rosal'),(544,14,'Facatativ??'),(545,14,'Fosca'),(546,14,'Funza'),(547,14,'Fusagasug??'),(548,14,'F??meque'),(549,14,'F??quene'),(550,14,'Gachal??'),(551,14,'Gachancip??'),(552,14,'Gachet??'),(553,14,'Gama'),(554,14,'Girardot'),(555,14,'Granada'),(556,14,'Guachet??'),(557,14,'Guaduas'),(558,14,'Guasca'),(559,14,'Guataqu??'),(560,14,'Guatavita'),(561,14,'Guayabal de Siquima'),(562,14,'Guayabetal'),(563,14,'Guti??rrez'),(564,14,'Jerusal??n'),(565,14,'Jun??n'),(566,14,'La Calera'),(567,14,'La Mesa'),(568,14,'La Palma'),(569,14,'La Pe??a'),(570,14,'La Vega'),(571,14,'Lenguazaque'),(572,14,'Machet??'),(573,14,'Madrid'),(574,14,'Manta'),(575,14,'Medina'),(576,14,'Mosquera'),(577,14,'Nari??o'),(578,14,'Nemoc??n'),(579,14,'Nilo'),(580,14,'Nimaima'),(581,14,'Nocaima'),(582,14,'Pacho'),(583,14,'Paime'),(584,14,'Pandi'),(585,14,'Paratebueno'),(586,14,'Pasca'),(587,14,'Puerto Salgar'),(588,14,'Pul??'),(589,14,'Quebradanegra'),(590,14,'Quetame'),(591,14,'Quipile'),(592,14,'Ricaurte'),(593,14,'San Antonio de Tequendama'),(594,14,'San Bernardo'),(595,14,'San Cayetano'),(596,14,'San Francisco'),(597,14,'San Juan de R??o Seco'),(598,14,'Sasaima'),(599,14,'Sesquil??'),(600,14,'Sibat??'),(601,14,'Silvania'),(602,14,'Simijaca'),(603,14,'Soacha'),(604,14,'Sop??'),(605,14,'Subachoque'),(606,14,'Suesca'),(607,14,'Supat??'),(608,14,'Susa'),(609,14,'Sutatausa'),(610,14,'Tabio'),(611,14,'Tausa'),(612,14,'Tena'),(613,14,'Tenjo'),(614,14,'Tibacuy'),(615,14,'Tibirita'),(616,14,'Tocaima'),(617,14,'Tocancip??'),(618,14,'Topaip??'),(619,14,'Ubal??'),(620,14,'Ubaque'),(621,14,'Ubat??'),(622,14,'Une'),(623,14,'Venecia (Ospina P??rez)'),(624,14,'Vergara'),(625,14,'Viani'),(626,14,'Villag??mez'),(627,14,'Villapinz??n'),(628,14,'Villeta'),(629,14,'Viot??'),(630,14,'Yacop??'),(631,14,'Zipac??n'),(632,14,'Zipaquir??'),(633,14,'??tica'),(634,15,'In??rida'),(635,16,'Calamar'),(636,16,'El Retorno'),(637,16,'Miraflores'),(638,16,'San Jos?? del Guaviare'),(639,17,'Acevedo'),(640,17,'Agrado'),(641,17,'Aipe'),(642,17,'Algeciras'),(643,17,'Altamira'),(644,17,'Baraya'),(645,17,'Campoalegre'),(646,17,'Colombia'),(647,17,'El??as'),(648,17,'Garz??n'),(649,17,'Gigante'),(650,17,'Guadalupe'),(651,17,'Hobo'),(652,17,'Isnos'),(653,17,'La Argentina'),(654,17,'La Plata'),(655,17,'Neiva'),(656,17,'N??taga'),(657,17,'Oporapa'),(658,17,'Paicol'),(659,17,'Palermo'),(660,17,'Palestina'),(661,17,'Pital'),(662,17,'Pitalito'),(663,17,'Rivera'),(664,17,'Saladoblanco'),(665,17,'San Agust??n'),(666,17,'Santa Mar??a'),(667,17,'Suaza'),(668,17,'Tarqui'),(669,17,'Tello'),(670,17,'Teruel'),(671,17,'Tesalia'),(672,17,'Timan??'),(673,17,'Villavieja'),(674,17,'Yaguar??'),(675,17,'??quira'),(676,18,'Albania'),(677,18,'Barrancas'),(678,18,'Dibulla'),(679,18,'Distracci??n'),(680,18,'El Molino'),(681,18,'Fonseca'),(682,18,'Hatonuevo'),(683,18,'La Jagua del Pilar'),(684,18,'Maicao'),(685,18,'Manaure'),(686,18,'Riohacha'),(687,18,'San Juan del Cesar'),(688,18,'Uribia'),(689,18,'Urumita'),(690,18,'Villanueva'),(691,19,'Algarrobo'),(692,19,'Aracataca'),(693,19,'Ariguan?? (El Dif??cil)'),(694,19,'Cerro San Antonio'),(695,19,'Chivolo'),(696,19,'Ci??naga'),(697,19,'Concordia'),(698,19,'El Banco'),(699,19,'El Pi??on'),(700,19,'El Ret??n'),(701,19,'Fundaci??n'),(702,19,'Guamal'),(703,19,'Nueva Granada'),(704,19,'Pedraza'),(705,19,'Piji??o'),(706,19,'Pivijay'),(707,19,'Plato'),(708,19,'Puebloviejo'),(709,19,'Remolino'),(710,19,'Sabanas de San Angel (SAN ANGEL)'),(711,19,'Salamina'),(712,19,'San Sebasti??n de Buenavista'),(713,19,'San Zen??n'),(714,19,'Santa Ana'),(715,19,'Santa B??rbara de Pinto'),(716,19,'Santa Marta'),(717,19,'Sitionuevo'),(718,19,'Tenerife'),(719,19,'Zapay??n (PUNTA DE PIEDRAS)'),(720,19,'Zona Bananera (PRADO - SEVILLA)'),(721,20,'Acac??as'),(722,20,'Barranca de Up??a'),(723,20,'Cabuyaro'),(724,20,'Castilla la Nueva'),(725,20,'Cubarral'),(726,20,'Cumaral'),(727,20,'El Calvario'),(728,20,'El Castillo'),(729,20,'El Dorado'),(730,20,'Fuente de Oro'),(731,20,'Granada'),(732,20,'Guamal'),(733,20,'La Macarena'),(734,20,'Lejan??as'),(735,20,'Mapiripan'),(736,20,'Mesetas'),(737,20,'Puerto Concordia'),(738,20,'Puerto Gait??n'),(739,20,'Puerto Lleras'),(740,20,'Puerto L??pez'),(741,20,'Puerto Rico'),(742,20,'Restrepo'),(743,20,'San Carlos de Guaroa'),(744,20,'San Juan de Arama'),(745,20,'San Juanito'),(746,20,'San Mart??n'),(747,20,'Uribe'),(748,20,'Villavicencio'),(749,20,'Vista Hermosa'),(750,21,'Alb??n (San Jos??)'),(751,21,'Aldana'),(752,21,'Ancuya'),(753,21,'Arboleda (Berruecos)'),(754,21,'Barbacoas'),(755,21,'Bel??n'),(756,21,'Buesaco'),(757,21,'Chachagu??'),(758,21,'Col??n (G??nova)'),(759,21,'Consaca'),(760,21,'Contadero'),(761,21,'Cuaspud (Carlosama)'),(762,21,'Cumbal'),(763,21,'Cumbitara'),(764,21,'C??rdoba'),(765,21,'El Charco'),(766,21,'El Pe??ol'),(767,21,'El Rosario'),(768,21,'El Tabl??n de G??mez'),(769,21,'El Tambo'),(770,21,'Francisco Pizarro'),(771,21,'Funes'),(772,21,'Guachav??s'),(773,21,'Guachucal'),(774,21,'Guaitarilla'),(775,21,'Gualmat??n'),(776,21,'Iles'),(777,21,'Im??es'),(778,21,'Ipiales'),(779,21,'La Cruz'),(780,21,'La Florida'),(781,21,'La Llanada'),(782,21,'La Tola'),(783,21,'La Uni??n'),(784,21,'Leiva'),(785,21,'Linares'),(786,21,'Mag??i (Pay??n)'),(787,21,'Mallama (Piedrancha)'),(788,21,'Mosquera'),(789,21,'Nari??o'),(790,21,'Olaya Herrera'),(791,21,'Ospina'),(792,21,'Policarpa'),(793,21,'Potos??'),(794,21,'Providencia'),(795,21,'Puerres'),(796,21,'Pupiales'),(797,21,'Ricaurte'),(798,21,'Roberto Pay??n (San Jos??)'),(799,21,'Samaniego'),(800,21,'San Bernardo'),(801,21,'San Juan de Pasto'),(802,21,'San Lorenzo'),(803,21,'San Pablo'),(804,21,'San Pedro de Cartago'),(805,21,'Sandon??'),(806,21,'Santa B??rbara (Iscuand??)'),(807,21,'Sapuyes'),(808,21,'Sotomayor (Los Andes)'),(809,21,'Taminango'),(810,21,'Tangua'),(811,21,'Tumaco'),(812,21,'T??querres'),(813,21,'Yacuanquer'),(814,22,'Arboledas'),(815,22,'Bochalema'),(816,22,'Bucarasica'),(817,22,'Chin??cota'),(818,22,'Chitag??'),(819,22,'Convenci??n'),(820,22,'Cucutilla'),(821,22,'C??chira'),(822,22,'C??cota'),(823,22,'C??cuta'),(824,22,'Durania'),(825,22,'El Carmen'),(826,22,'El Tarra'),(827,22,'El Zulia'),(828,22,'Gramalote'),(829,22,'Hacar??'),(830,22,'Herr??n'),(831,22,'La Esperanza'),(832,22,'La Playa'),(833,22,'Labateca'),(834,22,'Los Patios'),(835,22,'Lourdes'),(836,22,'Mutiscua'),(837,22,'Oca??a'),(838,22,'Pamplona'),(839,22,'Pamplonita'),(840,22,'Puerto Santander'),(841,22,'Ragonvalia'),(842,22,'Salazar'),(843,22,'San Calixto'),(844,22,'San Cayetano'),(845,22,'Santiago'),(846,22,'Sardinata'),(847,22,'Silos'),(848,22,'Teorama'),(849,22,'Tib??'),(850,22,'Toledo'),(851,22,'Villa Caro'),(852,22,'Villa del Rosario'),(853,22,'??brego'),(854,23,'Col??n'),(855,23,'Mocoa'),(856,23,'Orito'),(857,23,'Puerto As??s'),(858,23,'Puerto Caicedo'),(859,23,'Puerto Guzm??n'),(860,23,'Puerto Legu??zamo'),(861,23,'San Francisco'),(862,23,'San Miguel'),(863,23,'Santiago'),(864,23,'Sibundoy'),(865,23,'Valle del Guamuez'),(866,23,'Villagarz??n'),(867,24,'Armenia'),(868,24,'Buenavista'),(869,24,'Calarc??'),(870,24,'Circasia'),(871,24,'Cordob??'),(872,24,'Filandia'),(873,24,'G??nova'),(874,24,'La Tebaida'),(875,24,'Montenegro'),(876,24,'Pijao'),(877,24,'Quimbaya'),(878,24,'Salento'),(879,25,'Ap??a'),(880,25,'Balboa'),(881,25,'Bel??n de Umbr??a'),(882,25,'Dos Quebradas'),(883,25,'Gu??tica'),(884,25,'La Celia'),(885,25,'La Virginia'),(886,25,'Marsella'),(887,25,'Mistrat??'),(888,25,'Pereira'),(889,25,'Pueblo Rico'),(890,25,'Quinch??a'),(891,25,'Santa Rosa de Cabal'),(892,25,'Santuario'),(893,26,'Providencia'),(894,27,'Aguada'),(895,27,'Albania'),(896,27,'Aratoca'),(897,27,'Barbosa'),(898,27,'Barichara'),(899,27,'Barrancabermeja'),(900,27,'Betulia'),(901,27,'Bol??var'),(902,27,'Bucaramanga'),(903,27,'Cabrera'),(904,27,'California'),(905,27,'Capitanejo'),(906,27,'Carcas??'),(907,27,'Cepita'),(908,27,'Cerrito'),(909,27,'Charal??'),(910,27,'Charta'),(911,27,'Chima'),(912,27,'Chipat??'),(913,27,'Cimitarra'),(914,27,'Concepci??n'),(915,27,'Confines'),(916,27,'Contrataci??n'),(917,27,'Coromoro'),(918,27,'Curit??'),(919,27,'El Carmen'),(920,27,'El Guacamayo'),(921,27,'El Pe??on'),(922,27,'El Play??n'),(923,27,'Encino'),(924,27,'Enciso'),(925,27,'Floridablanca'),(926,27,'Flori??n'),(927,27,'Gal??n'),(928,27,'Gir??n'),(929,27,'Guaca'),(930,27,'Guadalupe'),(931,27,'Guapota'),(932,27,'Guavat??'),(933,27,'Guepsa'),(934,27,'G??mbita'),(935,27,'Hato'),(936,27,'Jes??s Mar??a'),(937,27,'Jord??n'),(938,27,'La Belleza'),(939,27,'La Paz'),(940,27,'Land??zuri'),(941,27,'Lebrija'),(942,27,'Los Santos'),(943,27,'Macaravita'),(944,27,'Matanza'),(945,27,'Mogotes'),(946,27,'Molagavita'),(947,27,'M??laga'),(948,27,'Ocamonte'),(949,27,'Oiba'),(950,27,'Onzaga'),(951,27,'Palmar'),(952,27,'Palmas del Socorro'),(953,27,'Pie de Cuesta'),(954,27,'Pinchote'),(955,27,'Puente Nacional'),(956,27,'Puerto Parra'),(957,27,'Puerto Wilches'),(958,27,'P??ramo'),(959,27,'Rio Negro'),(960,27,'Sabana de Torres'),(961,27,'San Andr??s'),(962,27,'San Benito'),(963,27,'San G??l'),(964,27,'San Joaqu??n'),(965,27,'San Jos?? de Miranda'),(966,27,'San Miguel'),(967,27,'San Vicente del Chucur??'),(968,27,'Santa B??rbara'),(969,27,'Santa Helena del Op??n'),(970,27,'Simacota'),(971,27,'Socorro'),(972,27,'Suaita'),(973,27,'Sucre'),(974,27,'Surat??'),(975,27,'Tona'),(976,27,'Valle de San Jos??'),(977,27,'Vetas'),(978,27,'Villanueva'),(979,27,'V??lez'),(980,27,'Zapatoca'),(981,28,'Buenavista'),(982,28,'Caimito'),(983,28,'Chal??n'),(984,28,'Colos?? (Ricaurte)'),(985,28,'Corozal'),(986,28,'Cove??as'),(987,28,'El Roble'),(988,28,'Galeras (Nueva Granada)'),(989,28,'Guaranda'),(990,28,'La Uni??n'),(991,28,'Los Palmitos'),(992,28,'Majagual'),(993,28,'Morroa'),(994,28,'Ovejas'),(995,28,'Palmito'),(996,28,'Sampu??s'),(997,28,'San Benito Abad'),(998,28,'San Juan de Betulia'),(999,28,'San Marcos'),(1000,28,'San Onofre'),(1001,28,'San Pedro'),(1002,28,'Sincelejo'),(1003,28,'Sinc??'),(1004,28,'Sucre'),(1005,28,'Tol??'),(1006,28,'Tol?? Viejo'),(1007,29,'Alpujarra'),(1008,29,'Alvarado'),(1009,29,'Ambalema'),(1010,29,'Anzo??tegui'),(1011,29,'Armero (Guayabal)'),(1012,29,'Ataco'),(1013,29,'Cajamarca'),(1014,29,'Carmen de Apical??'),(1015,29,'Casabianca'),(1016,29,'Chaparral'),(1017,29,'Coello'),(1018,29,'Coyaima'),(1019,29,'Cunday'),(1020,29,'Dolores'),(1021,29,'Espinal'),(1022,29,'Falan'),(1023,29,'Flandes'),(1024,29,'Fresno'),(1025,29,'Guamo'),(1026,29,'Herveo'),(1027,29,'Honda'),(1028,29,'Ibagu??'),(1029,29,'Icononzo'),(1030,29,'L??rida'),(1031,29,'L??bano'),(1032,29,'Mariquita'),(1033,29,'Melgar'),(1034,29,'Murillo'),(1035,29,'Natagaima'),(1036,29,'Ortega'),(1037,29,'Palocabildo'),(1038,29,'Piedras'),(1039,29,'Planadas'),(1040,29,'Prado'),(1041,29,'Purificaci??n'),(1042,29,'Rioblanco'),(1043,29,'Roncesvalles'),(1044,29,'Rovira'),(1045,29,'Salda??a'),(1046,29,'San Antonio'),(1047,29,'San Luis'),(1048,29,'Santa Isabel'),(1049,29,'Su??rez'),(1050,29,'Valle de San Juan'),(1051,29,'Venadillo'),(1052,29,'Villahermosa'),(1053,29,'Villarrica'),(1054,30,'Alcal??'),(1055,30,'Andaluc??a'),(1056,30,'Ansermanuevo'),(1057,30,'Argelia'),(1058,30,'Bol??var'),(1059,30,'Buenaventura'),(1060,30,'Buga'),(1061,30,'Bugalagrande'),(1062,30,'Caicedonia'),(1063,30,'Calima (Dari??n)'),(1064,30,'Cal??'),(1065,30,'Candelaria'),(1066,30,'Cartago'),(1067,30,'Dagua'),(1068,30,'El Cairo'),(1069,30,'El Cerrito'),(1070,30,'El Dovio'),(1071,30,'El ??guila'),(1072,30,'Florida'),(1073,30,'Ginebra'),(1074,30,'Guacar??'),(1075,30,'Jamund??'),(1076,30,'La Cumbre'),(1077,30,'La Uni??n'),(1078,30,'La Victoria'),(1079,30,'Obando'),(1080,30,'Palmira'),(1081,30,'Pradera'),(1082,30,'Restrepo'),(1083,30,'Riofr??o'),(1084,30,'Roldanillo'),(1085,30,'San Pedro'),(1086,30,'Sevilla'),(1087,30,'Toro'),(1088,30,'Trujillo'),(1089,30,'Tul??a'),(1090,30,'Ulloa'),(1091,30,'Versalles'),(1092,30,'Vijes'),(1093,30,'Yotoco'),(1094,30,'Yumbo'),(1095,30,'Zarzal'),(1096,31,'Carur??'),(1097,31,'Mit??'),(1098,31,'Taraira'),(1099,32,'Cumaribo'),(1100,32,'La Primavera'),(1101,32,'Puerto Carre??o'),(1102,32,'Santa Rosal??a');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poseer`
--

DROP TABLE IF EXISTS `poseer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poseer` (
  `id_poseer` int(10) NOT NULL AUTO_INCREMENT,
  `id_propietario` int(10) NOT NULL,
  `num_interno_vehiculo` int(10) NOT NULL,
  PRIMARY KEY (`id_poseer`),
  KEY `id_propietario` (`id_propietario`),
  KEY `num_interno_vehiculo` (`num_interno_vehiculo`),
  CONSTRAINT `poseer_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id_propietario`),
  CONSTRAINT `poseer_ibfk_2` FOREIGN KEY (`num_interno_vehiculo`) REFERENCES `vehiculos` (`num_interno_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poseer`
--

LOCK TABLES `poseer` WRITE;
/*!40000 ALTER TABLE `poseer` DISABLE KEYS */;
INSERT INTO `poseer` (`id_poseer`, `id_propietario`, `num_interno_vehiculo`) VALUES (1,2,2);
/*!40000 ALTER TABLE `poseer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietarios`
--

DROP TABLE IF EXISTS `propietarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propietarios` (
  `id_propietario` int(10) NOT NULL AUTO_INCREMENT,
  `documento_propietario` int(20) NOT NULL,
  `nombres_propietario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos_propietario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion_propietario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular_propietario` bigint(15) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_estado` int(2) NOT NULL,
  `id_tipo_usuario` int(10) NOT NULL,
  PRIMARY KEY (`id_propietario`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `propietarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`id_tipo_usuario`),
  CONSTRAINT `propietarios_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietarios`
--

LOCK TABLES `propietarios` WRITE;
/*!40000 ALTER TABLE `propietarios` DISABLE KEYS */;
INSERT INTO `propietarios` (`id_propietario`, `documento_propietario`, `nombres_propietario`, `apellidos_propietario`, `direccion_propietario`, `celular_propietario`, `email`, `password`, `id_estado`, `id_tipo_usuario`) VALUES (2,12345,'carlos ','suarez','barrio libertador',123456,'carlos@hotmail.com','12345',1,3),(3,1105345678,'jorge ','lopez','calle 3',3221234567,'jorge.lopez@hotmail.com','12345',1,3);
/*!40000 ALTER TABLE `propietarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rodamientos`
--

DROP TABLE IF EXISTS `rodamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rodamientos` (
  `id_rodamiento` int(10) NOT NULL AUTO_INCREMENT,
  `id_rutas` int(10) NOT NULL,
  `mes_rodamiento` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `semestre_rodamiento` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `a??o_rodamiento` int(4) NOT NULL,
  PRIMARY KEY (`id_rodamiento`),
  KEY `id_rutas` (`id_rutas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rodamientos`
--

LOCK TABLES `rodamientos` WRITE;
/*!40000 ALTER TABLE `rodamientos` DISABLE KEYS */;
INSERT INTO `rodamientos` (`id_rodamiento`, `id_rutas`, `mes_rodamiento`, `semestre_rodamiento`, `a??o_rodamiento`) VALUES (1,9,'Enero','A',2018);
/*!40000 ALTER TABLE `rodamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas`
--

DROP TABLE IF EXISTS `rutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutas` (
  `id_rutas` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_ruta` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ciudad_origen` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ciudad_destino` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_estado` int(2) NOT NULL,
  PRIMARY KEY (`id_rutas`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `rutas_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas`
--

LOCK TABLES `rutas` WRITE;
/*!40000 ALTER TABLE `rutas` DISABLE KEYS */;
INSERT INTO `rutas` (`id_rutas`, `nombre_ruta`, `ciudad_origen`, `ciudad_destino`, `id_estado`) VALUES (1,'Guamo-Ibague','Guamo','Ibagu??',1),(2,'Ibague-Guamo','Ibagu??','Guamo',1),(3,'Guamo-Girardot','Guamo','Girardot',1),(4,'Girardot-Guamo','Girardot','Guamo',1),(5,'Guamo-Purificacion','Guamo','Purificaci??n',1),(6,'Purificacion-Guamo','Purificaci??n','Guamo',1),(7,'Guamo-San Luis','Guamo','San Luis',1),(8,'San Luis-Guamo','San Luis','Guamo',1),(9,'Guamo-Espinal','Guamo','Espinal',1);
/*!40000 ALTER TABLE `rutas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas_vehiculos`
--

DROP TABLE IF EXISTS `rutas_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutas_vehiculos` (
  `id_rutas_vehiculos` int(10) NOT NULL AUTO_INCREMENT,
  `id_rutas` int(10) NOT NULL,
  `num_interno_vehiculo` int(10) NOT NULL,
  PRIMARY KEY (`id_rutas_vehiculos`),
  KEY `id_rutas` (`id_rutas`),
  KEY `num_interno_vehiculo` (`num_interno_vehiculo`),
  CONSTRAINT `rutas_vehiculos_ibfk_1` FOREIGN KEY (`id_rutas`) REFERENCES `rutas` (`id_rutas`),
  CONSTRAINT `rutas_vehiculos_ibfk_2` FOREIGN KEY (`num_interno_vehiculo`) REFERENCES `vehiculos` (`num_interno_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas_vehiculos`
--

LOCK TABLES `rutas_vehiculos` WRITE;
/*!40000 ALTER TABLE `rutas_vehiculos` DISABLE KEYS */;
INSERT INTO `rutas_vehiculos` (`id_rutas_vehiculos`, `id_rutas`, `num_interno_vehiculo`) VALUES (1,7,2),(2,8,2),(3,7,105),(4,8,105),(5,7,246),(6,8,246),(7,7,121),(8,8,121),(9,7,185),(10,8,185),(11,7,134),(12,8,134),(13,1,124),(14,2,124),(15,3,124),(16,4,124),(17,5,124),(18,6,124),(19,9,124),(20,1,251),(21,2,251),(22,3,251),(23,4,251),(24,5,251),(25,6,251),(26,9,251),(27,1,33),(28,2,33),(29,3,33),(30,4,33),(31,5,33),(32,6,33),(33,9,33),(34,1,225),(35,2,225),(36,3,225),(37,4,225),(38,5,225),(39,6,225),(40,9,225),(41,1,16),(42,2,16),(43,3,16),(44,4,16),(45,5,16),(46,6,16),(47,9,16),(48,1,235),(49,2,235),(50,3,235),(51,4,235),(52,5,235),(53,6,235),(54,9,235),(55,1,138),(56,2,138),(57,3,138),(58,4,138),(59,5,138),(60,6,138),(61,9,138),(62,1,159),(63,2,159),(64,3,159),(65,4,159),(66,5,159),(67,6,159),(68,9,159),(69,1,179),(70,2,179),(71,3,179),(72,4,179),(73,5,179),(74,6,179),(75,9,179),(76,1,172),(77,2,172),(78,3,172),(79,4,172),(80,5,172),(81,6,172),(82,9,172),(83,1,63),(84,2,63),(85,3,63),(86,4,63),(87,5,63),(88,6,63),(89,9,63),(90,1,61),(91,2,61),(92,3,61),(93,4,61),(94,5,61),(95,6,61),(96,9,61),(97,1,245),(98,2,245),(99,3,245),(100,4,245),(101,5,245),(102,6,245),(103,9,245),(104,1,151),(105,2,151),(106,3,151),(107,4,151),(108,5,151),(109,6,151),(110,9,151);
/*!40000 ALTER TABLE `rutas_vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taquilleros`
--

DROP TABLE IF EXISTS `taquilleros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taquilleros` (
  `id_taquillero` int(10) NOT NULL AUTO_INCREMENT,
  `documento_taquillero` int(20) NOT NULL,
  `nombres_taquillero` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos_taquillero` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion_taquillero` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular_taquillero` bigint(15) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_estado` int(2) NOT NULL,
  `id_tipo_usuario` int(10) NOT NULL,
  PRIMARY KEY (`id_taquillero`),
  KEY `id_estado` (`id_estado`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `taquilleros_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `taquilleros_ibfk_2` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taquilleros`
--

LOCK TABLES `taquilleros` WRITE;
/*!40000 ALTER TABLE `taquilleros` DISABLE KEYS */;
INSERT INTO `taquilleros` (`id_taquillero`, `documento_taquillero`, `nombres_taquillero`, `apellidos_taquillero`, `direccion_taquillero`, `celular_taquillero`, `email`, `password`, `id_estado`, `id_tipo_usuario`) VALUES (1,1212,'Carlos Alberto','Medina Rojas','calle 20 # 20-34',3221234567,'carlosmedina@hotmail.com','12345',1,4),(2,1313,'Rodolfo','Gutierrez Suarez','Calle 4 # 12',3214567890,'rodolfo@hotmail.com','12345',1,4);
/*!40000 ALTER TABLE `taquilleros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuarios`
--

DROP TABLE IF EXISTS `tipo_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuarios` (
  `id_tipo_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuarios`
--

LOCK TABLES `tipo_usuarios` WRITE;
/*!40000 ALTER TABLE `tipo_usuarios` DISABLE KEYS */;
INSERT INTO `tipo_usuarios` (`id_tipo_usuario`, `tipo_usuario`) VALUES (1,'Administrador'),(2,'Conductor'),(3,'Propietario'),(4,'Taquillero');
/*!40000 ALTER TABLE `tipo_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_vehiculo`
--

DROP TABLE IF EXISTS `tipo_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_vehiculo` (
  `id_tipo_vehiculo` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_vehiculo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_vehiculo`
--

LOCK TABLES `tipo_vehiculo` WRITE;
/*!40000 ALTER TABLE `tipo_vehiculo` DISABLE KEYS */;
INSERT INTO `tipo_vehiculo` (`id_tipo_vehiculo`, `tipo_vehiculo`) VALUES (1,'Buseta'),(2,'Van'),(3,'Bus');
/*!40000 ALTER TABLE `tipo_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `documento_usuario` int(20) NOT NULL,
  `nombres_usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos_usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion_usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular_usuario` bigint(15) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_estado` int(2) NOT NULL,
  `id_tipo_usuario` int(10) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`id_tipo_usuario`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `documento_usuario`, `nombres_usuario`, `apellidos_usuario`, `direccion_usuario`, `celular_usuario`, `email`, `password`, `id_estado`, `id_tipo_usuario`) VALUES (1,12345,'jose ','morales ','calle 3 ',123456,'jose@hotmail.com','12345',1,1),(2,1212,'Carlos Alberto','Medina Rojas','calle 20 # 20-34',12345678,'carlosmedina@hotmail.com','12345',1,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculos` (
  `num_interno_vehiculo` int(10) NOT NULL,
  `placa_vehiculo` varchar(6) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_tipo_vehiculo` int(10) NOT NULL,
  `modelo_vehiculo` int(4) NOT NULL,
  `cilindraje_vehiculo` int(6) NOT NULL,
  `num_motor_vehiculo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `marca_vehiculo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clase_vehiculo` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `capacidad_vehiculo` int(2) NOT NULL,
  `vin_vehiculo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `soat_vehiculo` int(20) NOT NULL,
  `vigencia_soat` date NOT NULL,
  `tecno_vehiculo` int(20) NOT NULL,
  `vigencia_tecno` date NOT NULL,
  `licencia_transito_vehiculo` int(20) NOT NULL,
  `vigencia_licencia` date NOT NULL,
  `id_estado` int(2) NOT NULL,
  PRIMARY KEY (`num_interno_vehiculo`),
  KEY `id_tipo_vehiculo` (`id_tipo_vehiculo`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_tipo_vehiculo`) REFERENCES `tipo_vehiculo` (`id_tipo_vehiculo`),
  CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` (`num_interno_vehiculo`, `placa_vehiculo`, `id_tipo_vehiculo`, `modelo_vehiculo`, `cilindraje_vehiculo`, `num_motor_vehiculo`, `marca_vehiculo`, `clase_vehiculo`, `capacidad_vehiculo`, `vin_vehiculo`, `soat_vehiculo`, `vigencia_soat`, `tecno_vehiculo`, `vigencia_tecno`, `licencia_transito_vehiculo`, `vigencia_licencia`, `id_estado`) VALUES (2,'qwe123',1,2015,4000,'121212','Volskwagen','ejecutiva',20,'12314',131313123,'2018-04-03',4234242,'2018-04-03',3131313,'2018-04-03',1),(16,'hds456',2,2015,3000,'24898294','chevrolet','ejecutiva',20,'4083204',289234,'2018-05-10',4204024,'2018-04-12',48248,'2018-05-02',1),(33,'ghf654',2,2015,3000,'98988','Nissan','ejecutiva',20,'55543',323123,'2018-05-03',76777,'2018-04-19',55677,'2018-04-19',1),(61,'dfs343',1,2015,4000,'34334','Nissan','ejecutiva',30,'43534345',544545,'2018-05-18',343434,'2018-05-10',4353435,'2018-06-08',1),(63,'bbg556',2,2015,3500,'554656','Volkswagen','ejecutiva',20,'433354',21223123,'2018-05-24',34355345,'2018-04-19',2131233,'2018-05-18',1),(105,'rty456',2,2016,3500,'422424','chevrolet','ejecutiva',20,'4424',31313,'2018-04-04',33133,'2018-04-04',453535,'2018-04-04',1),(121,'teq342',2,2015,3000,'56333','volkswagen','ejecutiva',20,'6643',2335,'2018-04-05',34235,'2018-04-05',45453,'2018-04-05',1),(124,'pli973',2,2015,3000,'3434324','chevrolet','ejecutiva',20,'4455',3223,'2018-04-04',34455,'2018-04-05',223444,'2018-04-12',1),(134,'lkj934',1,2016,4000,'7877','Nissan','ejecutiva',30,'887787',673434,'2018-06-10',43434,'2018-05-12',332435,'2018-08-21',1),(138,'cvb390',2,2015,3000,'4234234','Nissan','ejecutiva',20,'322342',34242,'2018-05-17',524332,'2018-04-20',2323455,'2018-05-10',1),(151,'fgf554',1,2016,3000,'54646456','Nissan','ejecutiva',30,'345345',4353435,'2018-05-17',564566,'2018-05-17',2332334,'2018-06-05',1),(159,'bfs529',1,2014,4000,'423424','Nissan','ejecutiva',30,'34534',32456,'2018-05-03',2323576,'2018-04-13',232367,'2018-04-19',1),(172,'ffh583',1,2014,3000,'43345','Nissan','ejecutiva',20,'535455',6676878,'2018-05-10',787868,'2018-05-04',323344,'2018-05-18',1),(179,'mse234',2,2015,3000,'455445','chevrolet','ejecutiva',20,'435345',34234,'2018-05-04',56556,'2018-05-11',12323,'2018-05-11',1),(185,'ijh932',1,2014,4000,'66789','Nissan','ejecutiva',30,'56564',342366,'2018-04-04',4242,'2018-06-04',55555,'2018-05-05',1),(225,'asd123',1,2014,3500,'993942','chevrolet','ejecutiva',30,'92939',3039394,'2018-05-17',93033,'2018-04-12',32424,'2018-04-19',1),(235,'wed562',3,2014,5000,'23423','Volvo','ejecutiva',40,'9309301',130203,'2018-05-17',92039013,'2018-05-02',8398392,'2018-05-10',1),(245,'hjn564',2,2015,4000,'543434','Nissan','ejecutiva',20,'4322',23234,'2018-05-04',454554,'2018-05-17',2147483647,'2018-05-24',1),(246,'uio890',3,2014,5000,'45452313','Nissan','ejecutiva',40,'556565',2313,'2018-04-04',342424,'2018-04-04',3242424,'2018-04-05',1),(251,'hbg787',3,2015,5000,'45345','Nissan','ejecutiva',40,'5554',45353,'2018-03-02',3453,'2018-03-15',534343,'2018-04-12',1);
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cootransguamo'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-05 16:49:10
