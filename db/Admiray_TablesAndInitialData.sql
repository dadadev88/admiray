-- MySQL dump 10.13  Distrib 5.5.41, for linux2.6 (x86_64)
--
-- Host: localhost    Database: adminray
-- ------------------------------------------------------
-- Server version	5.5.41

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
-- Table structure for table `abonoventa`
--

DROP TABLE IF EXISTS `abonoventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonoventa` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cod_fact` varchar(20) NOT NULL,
  `cod_cli` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `abono` varchar(20) NOT NULL,
  `resta` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `cod_cli` varchar(12) NOT NULL COMMENT 'Cedula o RIF del cliente',
  `nom_cli` text NOT NULL COMMENT 'Nombre del cliente',
  `dire_cli` varchar(500) NOT NULL COMMENT 'Direccion del cliente',
  `telf_cli` varchar(12) NOT NULL COMMENT 'telefono del cliente',
  `email_cli` varchar(50) DEFAULT NULL COMMENT 'email del cliente',
  PRIMARY KEY (`cod_cli`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES
('v-11223344','Marcos Diaz','Aragua','0414-1122334','md@gmail.com'),
('v-22334455','Josefa Marquina','Guarico','0412-33221122','jm@gmail.com');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_ord_comp`
--

DROP TABLE IF EXISTS `det_ord_comp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `det_ord_comp` (
  `cod_det_ord_comp` int(10) NOT NULL COMMENT 'codi de detalle de orden de compra',
  `cod_pro` int(10) NOT NULL COMMENT 'codigo de producto',
  `cant` varchar(100) NOT NULL COMMENT 'cantidad de producto',
  `form_pago` int(10) DEFAULT NULL COMMENT 'forma de pago',
  KEY `det_ord_comp_FKIndex1` (`cant`),
  KEY `det_ord_comp_FKIndex2` (`cod_pro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `det_pre_comp`
--

DROP TABLE IF EXISTS `det_pre_comp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `det_pre_comp` (
  `cod_det_pre_comp` int(10) NOT NULL COMMENT 'codi de detalle de presupuesto de compra',
  `cod_pro` int(10) NOT NULL COMMENT 'codigo de producto',
  `des_pro` varchar(100) NOT NULL COMMENT 'descripcion de producto',
  `cant` int(10) NOT NULL COMMENT 'cantidad de producto',
  KEY `det_pre_comp_FKIndex1` (`des_pro`),
  KEY `det_pre_comp_FKIndex2` (`cod_pro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `det_recep`
--

DROP TABLE IF EXISTS `det_recep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `det_recep` (
  `cod_det_recep` int(10) NOT NULL,
  `cod_pro` int(10) NOT NULL,
  `cant_ent` int(10) NOT NULL,
  `c4` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `detalle_fac`
--

DROP TABLE IF EXISTS `detalle_fac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_fac` (
  `cod_det_fac` int(10) NOT NULL COMMENT 'codigo de detalle de factura',
  `cod_pro` varchar(10) NOT NULL COMMENT 'codigo de producto',
  `cantidad` int(10) NOT NULL COMMENT 'cantidad de producto',
  `costo` float NOT NULL COMMENT 'costo de producto'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `detalle_ped`
--

DROP TABLE IF EXISTS `detalle_ped`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_ped` (
  `cod_det_ped` int(10) NOT NULL,
  `cod_pro` int(10) NOT NULL,
  `cant` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `detalle_pre`
--

DROP TABLE IF EXISTS `detalle_pre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_pre` (
  `cod_det_pre` int(10) NOT NULL COMMENT 'codigo de detalle de presupuesto',
  `cod_pro` int(10) NOT NULL COMMENT 'codigo de producto',
  `cant` int(10) NOT NULL COMMENT 'cantidad de producto',
  `costo` float NOT NULL COMMENT 'costo de producto'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `cod_emp` int(10) NOT NULL AUTO_INCREMENT COMMENT 'cedula del empleado',
  `ced_emp` varchar(10) NOT NULL,
  `nom_emp` text NOT NULL COMMENT 'nombre del empleado',
  `email_emp` varchar(100) NOT NULL COMMENT 'direccion del empleado',
  `telf_emp` varchar(20) NOT NULL COMMENT 'telefono del empleado',
  `username` varchar(20) NOT NULL COMMENT 'User del empleado',
  `pass` varchar(20) NOT NULL COMMENT 'contraseña del empleado',
  `nivel` int(10) NOT NULL COMMENT 'nivel del empleado',
  PRIMARY KEY (`cod_emp`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES
(1,'V-00000000','admin','admin@email.com','0414-1234567','admin','1234',1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enc_ord_comp`
--

DROP TABLE IF EXISTS `enc_ord_comp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enc_ord_comp` (
  `cod_ord_comp` int(10) NOT NULL AUTO_INCREMENT COMMENT 'codigo de encabezado de orden de compra',
  `cod_prov` int(10) NOT NULL COMMENT 'codigo del proveedor',
  `fecha_ord_comp` varchar(20) NOT NULL COMMENT 'fecha de orden de compra',
  `cond_de_pag` varchar(20) DEFAULT NULL COMMENT 'condicion de pago de orden de compra',
  PRIMARY KEY (`cod_ord_comp`),
  KEY `enc_ord_comp_FKIndex1` (`cod_prov`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enc_pre_comp`
--

DROP TABLE IF EXISTS `enc_pre_comp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enc_pre_comp` (
  `cod_pre_comp` int(10) NOT NULL AUTO_INCREMENT COMMENT 'codigo de encabezado de presupuesto de compra',
  `cod_prov` int(10) NOT NULL COMMENT 'codigo de empleado',
  `fecha_pre_comp` varchar(20) NOT NULL COMMENT 'codigo de proveedor',
  PRIMARY KEY (`cod_pre_comp`),
  KEY `enc_pre_comp_FKIndex1` (`fecha_pre_comp`),
  KEY `enc_pre_comp_FKIndex2` (`cod_prov`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `encab_fac`
--

DROP TABLE IF EXISTS `encab_fac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encab_fac` (
  `cod_enc_fac` int(10) NOT NULL AUTO_INCREMENT COMMENT 'codigo encabezado de factura',
  `cod_cli` varchar(12) NOT NULL COMMENT 'codigo de cliente',
  `fec_enc_fac` varchar(20) DEFAULT NULL COMMENT 'fecha de factura',
  `cod_emp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_enc_fac`),
  KEY `encab_fac_FKIndex1` (`cod_cli`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `encab_ped`
--

DROP TABLE IF EXISTS `encab_ped`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encab_ped` (
  `cod_encab_ped` int(10) NOT NULL AUTO_INCREMENT,
  `cod_cli` varchar(12) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_encab_ped`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `encab_pre`
--

DROP TABLE IF EXISTS `encab_pre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encab_pre` (
  `cod_encab_pre` int(10) NOT NULL AUTO_INCREMENT COMMENT 'codigo de encabezado de presupuesto',
  `cod_cli` varchar(12) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_encab_pre`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `encab_recep`
--

DROP TABLE IF EXISTS `encab_recep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encab_recep` (
  `cod_encab_recep` int(10) NOT NULL AUTO_INCREMENT,
  `cod_prov` varchar(12) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_encab_recep`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `iva`
--

DROP TABLE IF EXISTS `iva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iva` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `porcentaje` varchar(5) NOT NULL,
  `inicio` varchar(20) NOT NULL,
  `fin` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iva`
--

LOCK TABLES `iva` WRITE;
/*!40000 ALTER TABLE `iva` DISABLE KEYS */;
INSERT INTO `iva` VALUES (1,'0.15','10/04/2009','30/04/2009'),(2,'0.12','01/05/2009','04/12/2020');
/*!40000 ALTER TABLE `iva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `por_cobrar`
--

DROP TABLE IF EXISTS `por_cobrar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `por_cobrar` (
  `cod` int(20) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(20) NOT NULL,
  `cod_fact` int(20) NOT NULL,
  `cod_cli` varchar(20) NOT NULL,
  `total` double NOT NULL,
  `resta` double NOT NULL,
  `c6` varchar(50) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `por_pagar`
--

DROP TABLE IF EXISTS `por_pagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `por_pagar` (
  `cod` int(50) NOT NULL AUTO_INCREMENT,
  `cod_ord` int(10) NOT NULL,
  `cod_prov` varchar(10) NOT NULL,
  `total` float NOT NULL,
  `resta` float NOT NULL,
  `c5` varchar(50) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `cod_pro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `des_pro` varchar(50) DEFAULT NULL,
  `pre_pro` float DEFAULT NULL,
  `cos_pro` float DEFAULT NULL,
  `can_pro` int(20) DEFAULT NULL,
  `stk_min` int(5) NOT NULL COMMENT 'stock minino del producto',
  `stk_max` int(10) DEFAULT NULL,
  PRIMARY KEY (`cod_pro`)
) ENGINE=MyISAM AUTO_INCREMENT=5853 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES
(205,'Mouse Genius',50,30,5,5,50),
(123,'Mouse Logitech',60,35,45,10,50),
(345,'CPU AMD',100,200,201,8,100),
(456,'CPU Intel',50.5,80,11,8,20),
(15,'PC',1500,2000,489,5,20),
(5852,'Tarjeta de video Gecforce 295Gtx',300.6,5000,102,6,20),
(2,'Impresora HP C3180',100,150,92,10,30);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `rif_prov` varchar(12) NOT NULL,
  `nom_prov` varchar(20) DEFAULT NULL,
  `direc_prov` varchar(500) DEFAULT NULL,
  `telf_prov` varchar(12) DEFAULT NULL,
  `perso_con_prov` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rif_prov`),
  KEY `rif_prov` (`rif_prov`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES
('369','Q&Q','USA','+111123124','Jhon Macartie','jhonm@gmail.com'),
('001122','Deltron','Lima','010202','Jose Arnaldo Marcano','jose@gmail'),
('365','RCA','Los teques','0212-3648525','Julio','rcalt@rca.com'),
('2588','Asrock','USA','0212-5852536','Kevin','asrockusa@gmail.com'),
('321','Nokia','Irlanda','0244-3215487','Juan','nokiaragua@gmail.com');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesiones`
--

DROP TABLE IF EXISTS `sesiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sesiones` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `entrada` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Table structure for table `tempo`
--

DROP TABLE IF EXISTS `tempo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tempo` (
  `c1` varchar(100) DEFAULT NULL,
  `c2` varchar(100) DEFAULT NULL,
  `c3` varchar(100) DEFAULT NULL,
  `c4` varchar(100) DEFAULT NULL,
  `c5` varchar(100) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-22 19:50:25
