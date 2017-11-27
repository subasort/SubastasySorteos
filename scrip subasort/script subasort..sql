CREATE DATABASE  IF NOT EXISTS `subasort` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `subasort`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: subasort
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `id_cuen` int(11) NOT NULL AUTO_INCREMENT,
  `id_usu` int(11) DEFAULT NULL,
  `contraseña_cuen` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cuen` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cuen`),
  KEY `id_usu` (`id_usu`),
  KEY `tipo_cuen` (`tipo_cuen`),
  CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`),
  CONSTRAINT `cuenta_ibfk_2` FOREIGN KEY (`tipo_cuen`) REFERENCES `tipo` (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ganador`
--

DROP TABLE IF EXISTS `ganador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ganador` (
  `id_gan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_gan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ganador`
--

LOCK TABLES `ganador` WRITE;
/*!40000 ALTER TABLE `ganador` DISABLE KEYS */;
/*!40000 ALTER TABLE `ganador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricion_sort`
--

DROP TABLE IF EXISTS `inscricion_sort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricion_sort` (
  `id_ins_sort` int(11) NOT NULL AUTO_INCREMENT,
  `id_sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ins_sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricion_sort`
--

LOCK TABLES `inscricion_sort` WRITE;
/*!40000 ALTER TABLE `inscricion_sort` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscricion_sort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricion_sub`
--

DROP TABLE IF EXISTS `inscricion_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricion_sub` (
  `id_ins_sub` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ins_sub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricion_sub`
--

LOCK TABLES `inscricion_sub` WRITE;
/*!40000 ALTER TABLE `inscricion_sub` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscricion_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscripcion_sort`
--

DROP TABLE IF EXISTS `inscripcion_sort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscripcion_sort` (
  `id_insc_sort` int(11) NOT NULL AUTO_INCREMENT,
  `id_sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_insc_sort`),
  KEY `id_sort` (`id_sort`),
  CONSTRAINT `inscripcion_sort_ibfk_1` FOREIGN KEY (`id_sort`) REFERENCES `sorteos` (`id_sor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripcion_sort`
--

LOCK TABLES `inscripcion_sort` WRITE;
/*!40000 ALTER TABLE `inscripcion_sort` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripcion_sort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscripcion_sub`
--

DROP TABLE IF EXISTS `inscripcion_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscripcion_sub` (
  `id_insc_sub` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub` int(11) DEFAULT NULL,
  `id_sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_insc_sub`),
  KEY `id_sub` (`id_sub`),
  CONSTRAINT `inscripcion_sub_ibfk_1` FOREIGN KEY (`id_sub`) REFERENCES `subastas` (`id_sub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripcion_sub`
--

LOCK TABLES `inscripcion_sub` WRITE;
/*!40000 ALTER TABLE `inscripcion_sub` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripcion_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_pro` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `precio_compra_pro` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sorteos`
--

DROP TABLE IF EXISTS `sorteos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sorteos` (
  `id_sor` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto_sort` int(11) DEFAULT NULL,
  `id_ganador_sort` int(11) DEFAULT NULL,
  `fecha_sort` date NOT NULL,
  `mon_min_sort` double(6,6) NOT NULL,
  PRIMARY KEY (`id_sor`),
  KEY `id_producto_sort` (`id_producto_sort`),
  KEY `id_ganador_sort` (`id_ganador_sort`),
  CONSTRAINT `sorteos_ibfk_1` FOREIGN KEY (`id_producto_sort`) REFERENCES `productos` (`id_pro`),
  CONSTRAINT `sorteos_ibfk_2` FOREIGN KEY (`id_ganador_sort`) REFERENCES `ganador` (`id_gan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sorteos`
--

LOCK TABLES `sorteos` WRITE;
/*!40000 ALTER TABLE `sorteos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sorteos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subastas`
--

DROP TABLE IF EXISTS `subastas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subastas` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto_sub` int(11) DEFAULT NULL,
  `id_ganador_sub` int(11) DEFAULT NULL,
  `fecha_sub` date NOT NULL,
  `precio_boleto` double(6,6) NOT NULL,
  PRIMARY KEY (`id_sub`),
  KEY `id_producto_sub` (`id_producto_sub`),
  KEY `id_ganador_sub` (`id_ganador_sub`),
  CONSTRAINT `subastas_ibfk_1` FOREIGN KEY (`id_producto_sub`) REFERENCES `productos` (`id_pro`),
  CONSTRAINT `subastas_ibfk_2` FOREIGN KEY (`id_ganador_sub`) REFERENCES `ganador` (`id_gan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subastas`
--

LOCK TABLES `subastas` WRITE;
/*!40000 ALTER TABLE `subastas` DISABLE KEYS */;
/*!40000 ALTER TABLE `subastas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_usu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ci_usu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_usu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_usu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo_usu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'subasort'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-26 19:16:51
