-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: planificacion
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
-- Table structure for table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividades` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `tiempo_planificado` double DEFAULT NULL,
  `tiempo_real` double DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `proyecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades`
--

LOCK TABLES `actividades` WRITE;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` VALUES (1,'Sesion de usuario','',0,0,'',2),(2,'Master page FORM','Diseno de secciones que debe tener un pagina de formulario',0,0,'',2),(3,'implementar WYSWIG para formularios','',0,0,'',2),(4,'Implementar bloques ordenados','los bloques html con la clase \"block\" son drag and drop para reordenarse',0,0,'',2),(5,'Implementar administrador de Backlog','',0,0,'',2),(6,'Enlazar a BDD de empleados HGPT','Se debe poder filtrar los responsables y jefes inmediatos',0,0,'',4),(7,'Correciones matrices POA','Implementar correciones ',0,0,'',4),(8,'Cerrar la planificacion con observaciones generales','',0,0,'',4),(9,'CRUD Proyectos','',0,0,'',1),(10,'CRUD People','',0,0,'',1),(11,'CRUD Sprints','',0,0,'',1),(12,'CRUD Backlog','',0,0,'',1),(13,'CRUD Kanban','',0,0,'',1);
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_tarea`
--

DROP TABLE IF EXISTS `estado_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_tarea` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_tarea`
--

LOCK TABLES `estado_tarea` WRITE;
/*!40000 ALTER TABLE `estado_tarea` DISABLE KEYS */;
INSERT INTO `estado_tarea` VALUES (1,'TO DO'),(2,'DOING'),(3,'DONE');
/*!40000 ALTER TABLE `estado_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `geocoding`
--

DROP TABLE IF EXISTS `geocoding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geocoding` (
  `address` varchar(255) NOT NULL DEFAULT '',
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  PRIMARY KEY (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geocoding`
--

LOCK TABLES `geocoding` WRITE;
/*!40000 ALTER TABLE `geocoding` DISABLE KEYS */;
/*!40000 ALTER TABLE `geocoding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(30) DEFAULT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `empresa` varchar(150) DEFAULT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'dexter','Jaime','Santana','','','','jaimesantanal@hotmail.com',NULL,-1.24033,-78.6285),(2,'nataly','Nalaty','Armas','','0995629151','','sanu_23gi@yahoo.es',NULL,-1.25135,-78.6393);
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(50) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `presupuesto` double DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (1,'Planning','Monitoreo y seguimiento',' Te ayudara con la planificacion de actividades y seguimiento de las mismas','0000-00-00','0000-00-00',0,0),(2,'Terminales interactivas','Sistema interactivo','Este conformado por ','0000-00-00','0000-00-00',0,0),(3,'Test','Yest','','0000-00-00','0000-00-00',0,0),(4,'rrnn','GeoPortal de Recursos Naturales de Tungurahua','','0000-00-00','0000-00-00',0,0);
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sprints`
--

DROP TABLE IF EXISTS `sprints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sprints` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` varchar(300) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `horas_planificadas` int(11) DEFAULT NULL,
  `porcentaje_valido` int(11) DEFAULT NULL,
  `proyecto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`,`proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sprints`
--

LOCK TABLES `sprints` WRITE;
/*!40000 ALTER TABLE `sprints` DISABLE KEYS */;
INSERT INTO `sprints` VALUES (1,'Estructura basica que permite agregar proyectos y crear su BACKLOG','0000-00-00','0000-00-00',0,0,1);
/*!40000 ALTER TABLE `sprints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `tiempo_planificado` double DEFAULT NULL,
  `tiempo_real` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `actividad` (`actividad`),
  CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES (1,'Formulario Login','Vista para solicitar usuario y contrasena',0,0,0,1),(2,'Formularioa registro','Vista para solicitar la info basica de un usuario',0,0,0,1),(3,'Cerrar sesion','cerrar sesion y redireccionar al index',0,0,0,1),(4,'Disenio estructura general Paginas Maestras','En este tipode vistas por lo general esta un listado de elementos y se pueden realizar operaciones basicas',0,0,0,2),(5,'Buscar en la web el plugin open source mas potente','Buscar un plugin con soporte para tablas, imagenes, etc',0,0,0,3),(6,'Errores en nuevo','El evento onclick se enlaza dos veces',0,0,0,7),(7,'verificar el campo dias','No permite modificar con el + y -',0,0,0,7),(8,'Agregrar dos campos en monitoreo','un campo de observaciones y otro demedios de verificacion para cada actividad',0,0,0,7),(9,'Colores de alerta de porcentajes','Semaforo de avacnce Rojo, tomate y verde',0,0,0,7),(10,'Agregar proyecto','',2,2,3,9),(11,'Editar proyecto','',1,1,1,9),(12,'Bloque de listado de proyecto','Bloque HTML con info del proyecto',0,0,0,9),(13,'Actualizar informacion de usuario','',0,0,0,10),(14,'Invitar usuarios','',0,0,0,10),(15,'Agregar en el admin de configuraciones generales los Tipos de Usuarios','',0,0,0,10),(16,'Agregar sprint','',0,0,0,11),(17,'Pagina de perfil de usario','',0,0,0,10),(18,'Editar sprint','',0,0,0,11),(19,'Terminar sprint','',0,0,0,11),(20,'Iniciar sesion','',0,0,0,10),(21,'Cerrar sesion','',0,0,0,10),(22,'Agregar actividades','',0,0,0,12),(23,'Editar actividades','',0,0,0,12),(24,'Eliminar actividades','',0,0,0,12),(25,'Agregar tareas a actividades','',0,0,0,12),(26,'Editar tareas de actividades','',0,0,0,12),(27,'Eliminar tareas de actividades','',0,0,0,12),(28,'Configurar kanban de proyecto','',0,0,0,13),(29,'Asignar tareas actividades a sprint','',0,0,0,11);
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-25 22:15:46
