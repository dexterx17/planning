-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: planificacion
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
  `sprint` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `creador` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades`
--

LOCK TABLES `actividades` WRITE;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` VALUES (1,'Sesion de usuario','',0,0,'1',2,NULL,NULL,7),(2,'Master page FORM','Diseno de secciones que debe tener un pagina de formulario',0,0,'1',2,NULL,NULL,7),(3,'implementar WYSWIG para formularios','',0,0,'1',2,NULL,NULL,7),(4,'Implementar bloques ordenados','los bloques html con la clase \"block\" son drag and drop para reordenarse',0,0,'1',2,NULL,NULL,7),(5,'Implementar administrador de Backlog','',0,0,'1',2,NULL,NULL,7),(6,'Enlazar a BDD de empleados HGPT','Se debe poder filtrar los responsables y jefes inmediatos',1,1,'1',4,6,NULL,7),(7,'Correciones matrices POA','Implementar correciones ',6,5,'1',4,6,NULL,7),(8,'Cerrar la planificacion con observaciones generales','',4,0,'1',4,6,NULL,7),(9,'CRUD Proyectos','',12,8,'3',1,1,1,7),(10,'CRUD People','',4,4,'3',1,1,3,7),(11,'CRUD Sprints','',3,2,'3',1,1,4,7),(12,'CRUD Backlog','',9,9,'3',1,1,2,7),(13,'CRUD Kanban','',3,0,'1',1,21,5,7),(14,'Nuevo proyecto Android','Configuración inicial de proyeto en Android Studio',2,1,'1',11,2,1,7),(15,'BDD Sqlite3','Creación e implementación de la conexión con la bdd',3,2,'1',11,2,2,7),(16,'DataBaseHelpers para acceso a SQlite','Clases para el mantenimiento de las tablas',14,8,'1',11,2,3,7),(17,'Modelos para mapeo de datos','Clases para el mapeo de las tablas',8,6,'1',11,2,4,7),(18,'RESTClient Sincronización de Datos','Pasos necesarios para realizar las llamadas de sincronización de datos',8,4,'1',11,5,1,7),(19,'Configuraciones Generales APP (Shared Preferences)','Clases y vistas para configurar los parametros generales de la app',2,2,'1',11,5,2,7),(20,'Inicio de sesión','Clases y vistas para logeo y control de acceso en la APP',6,3,'1',11,2,5,7),(21,'Pantalla inicial y menu principal','',3,1,'1',11,5,3,7),(22,'Listado clientes','Clases y vistas para  la pantalla inicial de clientes',8,7,'1',11,5,4,7),(23,'Eventos de internet','Clase y mensajes para informar de conexion o desconexion',1,0,'1',11,0,10,7),(24,'Listado de productos','',7,8,'1',11,5,5,7),(29,'Agregar y editar Cliente','',7,8,'1',11,5,6,7),(30,'Listado de pedidos','',11,5,'1',11,0,13,7),(31,'Agregar y Editar pedidos','',13,5,'1',11,0,14,7),(32,'REST Service','Servicio web que provea los datos de la base.central',10,0,'1',11,0,15,7),(33,'Sincronización de Datos','',5,0,'1',11,0,16,7),(34,'Chat','Aplicar correciones a chat',6,0,'1',4,6,NULL,7),(35,'Presupuesto y abonos','Crear una seccion para registrar los ingresos y egresos que produce el proyecto',6,0,'1',1,21,6,7),(36,'Asignacion de usuario a tarea','',1,0,'1',1,21,7,7),(37,'Actualizar libreria de Mongo https://github.com/vesparny/cimongo-codeigniter-mongodb-library','',1,0,'1',4,0,NULL,7),(38,'Wiki','',5,0,'1',1,0,8,7),(39,'CRUD Grupos','',4,1,'1',1,21,9,7),(40,'Primera','Agregando nuevo texto',3,0,'1',13,0,NULL,7),(51,'sera','',1,0,'1',13,0,NULL,7),(52,'PARECE 2','ASDFDSFasfa',1,1,'2',13,22,NULL,7),(53,'Recopilacion de informacion geografica de Tungurahua','Aspectos geograficos de la provincia que  pueden ser aprendidos  \"facilmente\"',7,0,'1',12,0,1,7),(54,'Recopilacion de informacion turistica de Tungurahua','Aspectos y Lugares turisticos que deben ser conocidos',5,0,'1',12,0,2,7);
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER before_actividades_insert
BEFORE INSERT ON actividades
FOR EACH ROW
BEGIN
SET NEW.orden=(SELECT ifnull((select max(orden)+1 from actividades where proyecto=NEW.proyecto),1));

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `columna_tablero`
--

DROP TABLE IF EXISTS `columna_tablero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `columna_tablero` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `proyecto` (`proyecto`),
  KEY `estado` (`estado`),
  CONSTRAINT `columna_tablero_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`ID`),
  CONSTRAINT `columna_tablero_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estado_tarea` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `columna_tablero`
--

LOCK TABLES `columna_tablero` WRITE;
/*!40000 ALTER TABLE `columna_tablero` DISABLE KEYS */;
INSERT INTO `columna_tablero` VALUES (1,1,'TODO','Tareas por realizar',1),(2,1,'DOING','Tareas en ejecución',2),(3,1,'TESTING','Tareas en fase de verificación',2),(4,1,'DONE','Tareas completadas',3),(5,13,'TODO','Tareas por realizar',1),(6,11,'TODO','Tareas por realizar',1);
/*!40000 ALTER TABLE `columna_tablero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` int(11) DEFAULT NULL,
  `referencia` int(11) DEFAULT NULL,
  `tabla` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `people` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo_proyecto`
--

DROP TABLE IF EXISTS `equipo_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo_proyecto` (
  `ID` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL,
  `miembro` int(10) unsigned NOT NULL,
  `fecha_integracion` date NOT NULL,
  `grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`,`miembro`,`proyecto`),
  UNIQUE KEY `u_ep` (`miembro`,`proyecto`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `equipo_proyecto_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`ID`),
  CONSTRAINT `equipo_proyecto_ibfk_2` FOREIGN KEY (`miembro`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo_proyecto`
--

LOCK TABLES `equipo_proyecto` WRITE;
/*!40000 ALTER TABLE `equipo_proyecto` DISABLE KEYS */;
INSERT INTO `equipo_proyecto` VALUES (1,11,7,'2015-01-09',NULL),(2,11,8,'2015-01-09',NULL),(3,1,7,'2015-01-09',NULL),(4,2,7,'2015-01-09',NULL),(5,2,10,'2015-01-09',NULL),(6,1,9,'2015-01-10',NULL),(7,13,9,'2015-01-10',NULL),(8,13,1,'2015-01-21',NULL);
/*!40000 ALTER TABLE `equipo_proyecto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER before_ep_insert
BEFORE INSERT ON equipo_proyecto
FOR EACH ROW
BEGIN
SET NEW.ID=(SELECT ifnull((select max(ID)+1 from equipo_proyecto),1));

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `estado_actividades`
--

DROP TABLE IF EXISTS `estado_actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_actividades` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `lang` varchar(5) DEFAULT 'es',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_actividades`
--

LOCK TABLES `estado_actividades` WRITE;
/*!40000 ALTER TABLE `estado_actividades` DISABLE KEYS */;
INSERT INTO `estado_actividades` VALUES (1,'Nueva','es'),(2,'Lista para estimación','es'),(3,'Lista para sprint','es'),(4,'Por hacer','es'),(5,'En progreso','es'),(6,'Realizada','es'),(7,'Sprint completado','es');
/*!40000 ALTER TABLE `estado_actividades` ENABLE KEYS */;
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
-- Table structure for table `gcm_users`
--

DROP TABLE IF EXISTS `gcm_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gcm_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gcm_regid` text,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gcm_users`
--

LOCK TABLES `gcm_users` WRITE;
/*!40000 ALTER TABLE `gcm_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `gcm_users` ENABLE KEYS */;
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
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'team','Equipo de trabajo'),(3,'Owners','Dueños de Producto'),(4,'ScrumMaster','Gestióna y Apoya al proyecto'),(5,'Registrado','Usuario registrado');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs_rest`
--

DROP TABLE IF EXISTS `logs_rest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs_rest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs_rest`
--

LOCK TABLES `logs_rest` WRITE;
/*!40000 ALTER TABLE `logs_rest` DISABLE KEYS */;
INSERT INTO `logs_rest` VALUES (1,'WSRest/actividades','get',NULL,'','127.0.0.1',1423802043,0.0605171,1),(2,'WSRest/actividades/proyecto/1','get','a:1:{s:8:\"proyecto\";s:1:\"1\";}','','127.0.0.1',1423802049,0.0630519,1),(3,'WSRest/actividades/proyecto/1','get','a:1:{s:8:\"proyecto\";s:1:\"1\";}','','127.0.0.1',1423810226,0.0691261,1);
/*!40000 ALTER TABLE `logs_rest` ENABLE KEYS */;
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
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'dexter','Jaime','Santana','032822406','0983706086','','jaimesantanal@hotmail.com',NULL,-1.24033,-78.6285,'356a192b7913b04c54574d18c28d46e6395428ab.jpeg'),(2,'nataly','Nalaty','Armas','','0995629151','','sanu_23gi@yahoo.es',NULL,-1.25135,-78.6393,NULL);
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuesto`
--

DROP TABLE IF EXISTS `presupuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuesto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  `descripcion` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` char(1) NOT NULL,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `presupuesto_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuesto`
--

LOCK TABLES `presupuesto` WRITE;
/*!40000 ALTER TABLE `presupuesto` DISABLE KEYS */;
INSERT INTO `presupuesto` VALUES (1,60,'Adelanto a progamador','2015-01-13 01:01:00','E',11);
/*!40000 ALTER TABLE `presupuesto` ENABLE KEYS */;
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
  `owner` int(10) unsigned DEFAULT NULL,
  `visibilidad` int(11) DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nick` (`nick`),
  KEY `owner` (`owner`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (1,'Planning','Monitoreo y seguimiento',' Te ayudara con la planificacion de actividades y seguimiento de las mismas','2014-09-07','2015-08-07',0,7,1),(2,'Terminales interactivas','Sistema interactivo','Este conformado por ','2014-12-01','2015-06-30',0,7,2),(4,'rrnn','GeoPortal de Recursos Naturales de Tungurahua','','2015-01-01','2015-12-04',0,7,1),(11,'Mayorga','Sistema de Pedidos','App Android y Web Service en PHP','2014-12-05','2015-01-30',0,7,1),(12,'¿Conoces el Ecuador?','Diviertete conociendo el Ecuador','APP con información turística de cada provincia categorizada en gastronomia, cultura, lugares, historia','2015-02-01','2015-12-31',0,7,3),(13,'tested','tested','','0000-00-00','0000-00-00',0,7,1);
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recursos`
--

DROP TABLE IF EXISTS `recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recursos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `recurso` varchar(250) NOT NULL,
  `descripcion` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `costo` double DEFAULT NULL,
  `estado` char(1) NOT NULL,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `recursos_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recursos`
--

LOCK TABLES `recursos` WRITE;
/*!40000 ALTER TABLE `recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `recursos` ENABLE KEYS */;
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
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`,`proyecto`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `sprints_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sprints`
--

LOCK TABLES `sprints` WRITE;
/*!40000 ALTER TABLE `sprints` DISABLE KEYS */;
INSERT INTO `sprints` VALUES (1,'Estructura basica que permite agregar proyectos y crear su BACKLOG','2015-01-01','2015-01-12',0,0,1,1),(2,'Implementar la BDD, la conexion y la estrucutra básica de la APP','2014-12-12','2014-12-22',20,0,11,1),(5,'Listado de vendedores, clientes y productos','2015-01-23','2015-01-04',0,0,11,2),(6,'Iniciar el año con pie derecho','2014-12-28','2015-01-05',0,0,4,NULL),(21,'Control de Flujo de tareas y asignación de usuarios','2015-04-21','2015-01-31',0,0,1,NULL),(22,'Listado de vendedores, clientes y productos','2015-02-06','2015-02-21',0,0,13,1);
/*!40000 ALTER TABLE `sprints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarea_responsables`
--

DROP TABLE IF EXISTS `tarea_responsables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarea_responsables` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tarea` int(11) NOT NULL,
  `responsable` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarea_responsables`
--

LOCK TABLES `tarea_responsables` WRITE;
/*!40000 ALTER TABLE `tarea_responsables` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarea_responsables` ENABLE KEYS */;
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
  `orden` int(11) DEFAULT NULL,
  `creador` int(10) unsigned DEFAULT NULL,
  `columna` int(11) DEFAULT NULL,
  `responsable` int(10) unsigned DEFAULT NULL,
  `fecha_fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `actividad` (`actividad`),
  CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES (1,'Formulario Login','Vista para solicitar usuario y contrasena',0,0,1,1,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(2,'Formularioa registro','Vista para solicitar la info basica de un usuario',0,0,1,1,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(4,'Disenio estructura general Paginas Maestras','En este tipode vistas por lo general esta un listado de elementos y se pueden realizar operaciones basicas',0,0,1,2,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(5,'Buscar en la web el plugin open source mas potente','Buscar un plugin con soporte para tablas, imagenes, etc',0,0,1,3,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(6,'Errores en nuevo','El evento onclick se enlaza dos veces',1,1,3,7,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(7,'verificar el campo dias','No permite modificar con el + y -',1,1,3,7,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(9,'Colores de alerta de porcentajes','Semaforo de avacnce Rojo, tomate y verde',0,0,1,7,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(10,'Agregar proyecto','',2,2,3,9,NULL,7,4,7,'0000-00-00 00:00:00'),(11,'Editar PROYECTO','',1,2,3,9,NULL,7,4,7,'0000-00-00 00:00:00'),(13,'Actualizar informacion de usuario','',0,0,3,10,NULL,7,4,NULL,'0000-00-00 00:00:00'),(14,'Invitar usuarios','',0,0,3,10,NULL,7,4,NULL,'0000-00-00 00:00:00'),(16,'Agregar sprint','',1,1,3,11,NULL,7,4,NULL,'0000-00-00 00:00:00'),(17,'Pagina de perfil de usario','',1,1,3,10,NULL,7,4,NULL,'0000-00-00 00:00:00'),(18,'Editar sprint','',1,0,3,11,NULL,7,4,NULL,'0000-00-00 00:00:00'),(19,'Terminar sprint','',0,0,3,11,NULL,7,4,NULL,'0000-00-00 00:00:00'),(20,'Iniciar sesion','',1,1,3,10,NULL,7,4,NULL,'0000-00-00 00:00:00'),(21,'Cerrar sesion','',1,1,3,10,NULL,7,4,NULL,'0000-00-00 00:00:00'),(22,'Agregar actividades','',1,1,3,12,NULL,7,NULL,7,'0000-00-00 00:00:00'),(23,'Editar actividades','',1,0,3,12,NULL,7,NULL,9,'0000-00-00 00:00:00'),(24,'Eliminar actividades','',1,1,3,12,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(25,'Agregar tareas a actividades','',1,1,3,12,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(26,'Editar tareas de actividades','',1,1,3,12,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(27,'Eliminar tareas de actividades','',1,1,3,12,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(28,'Configurar kanban de proyecto','',0,0,3,13,NULL,7,4,NULL,'0000-00-00 00:00:00'),(29,'Asignar tareas actividades a sprint','',1,1,3,11,NULL,7,4,NULL,'0000-00-00 00:00:00'),(30,'Eliminar proyectos','Eliminar proyectos con POPUP de confirmacion',1,1,3,9,NULL,7,4,NULL,'0000-00-00 00:00:00'),(31,'Refrescar listado de tareas luego de algun evento sobre alguna tarea','',1,1,3,12,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(34,'Actualizar listado cuando se realiza una operacion','',4,1,3,9,NULL,7,4,NULL,'0000-00-00 00:00:00'),(36,'GIT control de versiones','Inicializar y publicar repositorio en bitbucket',1,1,3,14,1,7,NULL,NULL,'0000-00-00 00:00:00'),(37,'Añadiendo librerias de soporte','instalar y agregar v4 support library y v7 appcompat library',1,0,3,14,2,7,NULL,NULL,'0000-00-00 00:00:00'),(38,'DBHelper para conexión y creación de la bdd','',1,1,3,15,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(39,'Implementación de OnCreate del DBHelper','Script para tablas de Cliente, Producto, Vendedor, Pedido, Pedido_item',1,0,3,15,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(40,'IBdd (Interfaz para DBHelpers heredados)','Se implementan metodos generalizados para el acceso a los datos mediantes los DBHelpers',1,1,3,15,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(41,'VendedoresDB::IBdd','DBHelper que implementa abrir(), cerrar(), get(), isValid()',2,0,3,16,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(42,'ProductosDB::IBdd','DBHelper que implementa abrir(), cerrar(), get(), getList(), updateStock()',2,0,3,16,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(43,'ClientesDB::IBdd','DBHelper que implementa abrir(), cerrar(), get(), getList(), updateCredito()',2,0,3,16,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(44,'PedidosDB::IBdd','DBHelper que implementa abrir(), cerrar(), get(), getList(),add(),edit(),delete()',3,3,3,16,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(45,'PedidoItemDB::IBdd','DBHelper que implementa abrir(), cerrar(), get(), getList(),add(),edit(),delete()',3,3,3,16,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(46,'Vendedor::Model','Clase vendedor',1,1,3,17,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(47,'Cliente::Model','Clase cliente',1,1,3,17,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(48,'Producto::Model','Clase Producto',1,1,3,17,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(49,'Pedido::Model','Clase Pedido',1,1,3,17,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(50,'PedidoItem::Model','Clase PedidoItem',1,1,3,17,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(51,'RestClient','Clase que realiza las operaciones de sincronizacion con el webserver',2,2,3,18,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(52,'Función JSONObject:get(url,params)','Realiza una petición GET al webserver y retorna los datos en un Objeto JSON para luego mapearlo a un Modelo',1,1,3,18,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(53,'Función JSONArray:get(url,params)','Realiza una petición GET al webserver y retorna los datos en un array JSON para luego mapearlo a una lista de algun Modelo',1,1,3,18,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(54,'Función Boolean:post(url,Model)','Realiza una petición POST al webserver y envia los datos en un Objeto JSON para actualizarlo',1,0,1,18,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(55,'Función int:post(url,List<Model>)','Realiza una petición POST al webserver y envia los datos en un array JSON para actualizar',1,0,1,18,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(56,'Función Boolean:put(url,Model)','Realiza una petición PUT al webserver y envia los datos en un Objeto JSON para insertarlo',1,0,1,18,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(57,'Función int:put(url,List<Model>)','Realiza una petición PUT al webserver y envia los datos en un array JSON para insertarlos',1,0,1,18,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(58,'Clase Model','Clase para generalizar las operaciones con las tablas mapeadas',1,0,3,17,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(59,'Preferencias::PreferenceActivity','Clase para cargar la vista de SP',1,1,3,19,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(60,'preferencias.xml','Vista de preferencias',1,1,3,19,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(61,'Login::Activity','Controlador para inicio de sesión',1,1,3,20,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(62,'login.xml','Vista con los inputs para usuario y password',1,1,3,20,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(63,'Función Boolean:autentificar(user,pass)','Realiza la llamada a VendedoresDB para verificar el acceso y aumenta en 1 el contador de accesos en caso erroneo',1,1,3,20,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(64,'Función void:bloqueParcial()','Lee el numero de intentos permitidos de SP y bloque por el tiempo definido en SP',1,0,1,20,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(65,'Función void:bloqueoTemporal()','solo definido ... Por implementar',1,0,1,20,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(66,'Inicial::ActionBarActivity','Clase para cargar la vista inicial ',0,0,1,21,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(67,'inicia.xml','Vista para pantalla de inicio',1,0,3,21,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(69,'addMenuGeneral()','Clientes, Pedidos, Productos, Salir',1,0,1,21,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(70,'salir()','Cerrar cerrar y salir de la App',1,1,3,21,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(71,'onItemMenuSelected()','',0,0,1,21,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(72,'Clientes::ActionBarActivity','',1,1,3,22,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(73,'main_clientes.xml','Listado emclientes',1,1,3,22,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(74,'row_cliente.xml','',1,1,3,22,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(76,'menu_clientes.xml','',1,1,3,22,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(79,'ClientesFragment::ListFragment','Carga la vista del cliente y un boton al final para poder anadir un pedido de ese cliente',2,3,3,22,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(80,'Network','public static boolean WifiConnected;',1,0,3,23,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(81,'TipoClienteDB::IBdd','Tipos de clientes de la tabla TIPO_EMPRESA',1,1,3,16,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(82,'Campo para # de sucursal en la tablet','',0,0,1,19,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(83,'TipoIdentificacionDB','',1,1,3,16,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(84,'TipoCliente','',1,1,3,17,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(85,'TipoIdentificacion','',1,0,3,17,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(86,'Productos::ActionBarActivity','',1,1,3,24,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(87,'productos_fragment.xml','ListView de produtcos',1,1,3,24,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(88,'producto_listrow.xml','',1,1,3,24,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(89,'ProductosFragment::ListFragment','Clases para manipular lista de productos',1,1,3,24,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(90,'Buscar productos','Filtrar ListView por nombre de producto',2,2,3,24,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(91,'Sincronizar','Realizar una petición al RESTAsyn y verificiar si hay actualizaciones',1,2,3,24,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(92,'ClienteFragment::Fragment','',2,3,3,29,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(93,'Cliente_fragment.xml','',1,1,3,29,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(94,'Menu_cliente.xml','',1,1,3,29,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(95,'Añadir cliente','',1,1,3,29,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(96,'Editar Cliente','',1,1,3,29,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(97,'Pedidos::ActionBarActivity','',1,2,1,30,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(98,'pedidos_fragment.xml','ListView para pedidos',2,2,1,30,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(99,'PedidosFragment::ListFragment','',2,0,1,30,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(100,'main_menu_pedidos.xml','Menu para listado de pedidos',1,1,3,30,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(101,'pedido_listrow.xml','',1,0,1,30,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(102,'Buscar pedidos','',1,0,1,30,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(103,'Sincronizar','',3,0,1,30,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(104,'PedidoFragment::Fragment','',2,1,2,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(105,'pedido_fragment.xml','',2,1,2,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(106,'Agregar Pedido','',2,0,1,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(107,'Añadir producto a pedido','',2,1,2,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(108,'Quitar producto de pedido','',1,0,1,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(109,'Editar Pedido','',2,0,1,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(110,'menu_pedido.xml','',1,2,3,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(111,'Sincronizar Vendedores','Se verifica si hay cambios en la tabla Vendedores y se los actualiza',1,0,3,20,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(112,'Agregar vendedor a cliente agregado','',1,1,3,29,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(113,'cambiar nombres por IDS de POAS anteriores','',1,1,3,6,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(114,'Añadir el listado de actividades no planificadas','',1,0,3,8,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(115,'Generar informe de monitoreo concluido','',1,0,1,8,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(116,'Vista de chat general','',1,0,1,34,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(117,'Listado de usuario conectados','',1,0,1,34,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(118,'Notificación de mensaje recibido','',1,0,1,34,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(119,'Notificación de usuario conectado','',1,0,1,34,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(120,'Mantener sesión al actualizar página','',2,0,1,34,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(121,'Agregar miembro a proyecto','',1,1,3,10,NULL,7,4,NULL,'0000-00-00 00:00:00'),(122,'Cargar listado de actividades de sprint selecciondado','',0,0,3,13,NULL,7,4,NULL,'0000-00-00 00:00:00'),(123,'Cargar columnas de tablero','',1,0,3,13,NULL,7,4,NULL,'0000-00-00 00:00:00'),(124,'Bloque de tarea dropable','',1,0,3,13,NULL,7,4,NULL,'0000-00-00 00:00:00'),(125,'Capacidad de arrastrar bloques entre columnas','',1,0,2,13,NULL,7,3,7,'0000-00-00 00:00:00'),(126,'Corregir grafica de barras en vista de plan de manejo','',1,1,3,7,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(127,'Dividir por componente las actividaeds en la pestaña matriz','',1,0,1,7,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(128,'Registringir acceso a vistas de cada usuario','',2,2,3,7,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(129,'SQL para ingresos y egresos','',1,0,3,35,NULL,7,4,NULL,'0000-00-00 00:00:00'),(130,'Listado de abonos','',1,0,3,35,NULL,7,4,NULL,'0000-00-00 00:00:00'),(131,'Agregar Abono','',1,0,3,35,NULL,7,4,NULL,'0000-00-00 00:00:00'),(132,'Editar Abono','',1,0,3,35,NULL,7,4,NULL,'0000-00-00 00:00:00'),(133,'Eliminar abono','',1,0,1,35,NULL,7,1,NULL,'0000-00-00 00:00:00'),(134,'SQL para registrar historial de tareas cumplidas por usuario','',0,0,1,36,NULL,7,NULL,7,'0000-00-00 00:00:00'),(135,'Desactivar boton editar actividad cuando se haya cerrado el monitoreo','',1,0,3,8,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(136,'Impedir cerrar monitoreo si existen actividades sin completar su monitoreo','',1,0,1,8,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(137,'Crear variable global para ocultar tareas por estado','',1,1,3,12,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(152,'SQL para almacenar paginas, jerarquias y propietarios de WIKI','',1,0,1,38,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(153,'Campo de visibilidad para proyecto(privado, solo amigos, publico)','',1,1,3,9,NULL,7,4,NULL,'0000-00-00 00:00:00'),(154,'Listar tareas pendientes en perfil','',1,0,2,36,NULL,7,NULL,7,'0000-00-00 00:00:00'),(155,'Nueva pagina de wiki','',1,0,1,38,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(156,'Editar pagina de wiki','',1,0,1,38,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(157,'Listar proyectos visibles para usuario','',1,1,3,9,NULL,7,4,7,'0000-00-00 00:00:00'),(158,'Agregar grupo','',1,1,3,39,2,7,4,NULL,'0000-00-00 00:00:00'),(159,'Editar Grupo','',1,0,3,39,3,7,4,NULL,'0000-00-00 00:00:00'),(160,'Lista de Grupos','',1,0,3,39,4,7,4,NULL,'0000-00-00 00:00:00'),(161,'Eliminar grupo','Verificar si no existen usuario pertenecientes a ese grupo primero',1,0,1,39,5,7,1,NULL,'0000-00-00 00:00:00'),(162,'Eliminar página de wiki','',1,0,1,38,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(172,'Sincronizar Clientes','',2,0,1,22,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(173,'Actualizar bloque de BACKLOG al Agregar o Editar actividad','',1,2,3,12,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(176,'otritaasdf','adf',1,1,2,52,NULL,7,NULL,9,'0000-00-00 00:00:00'),(177,'unita 2','',0,0,1,52,NULL,7,NULL,1,'0000-00-00 00:00:00'),(178,'Listado de productos agregados','',0,0,1,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(179,'Calculo de totales','',0,0,1,31,NULL,7,NULL,8,'0000-00-00 00:00:00'),(180,'Editar producto agregado','',1,0,1,31,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(181,'Tabla para guardar los eventos que deben sincronizarse','',2,0,1,33,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(182,'EventosDB::DBHelper','',1,0,1,33,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(183,'Evento::Model','',1,0,1,33,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(184,'Ejecutar sincronización cuando el dispositivo tenga internet','',1,0,1,33,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(185,'Página de wiki personal','',1,0,1,38,NULL,7,NULL,NULL,'0000-00-00 00:00:00'),(186,'Formulario de Abonos','',1,0,3,35,NULL,7,4,NULL,'0000-00-00 00:00:00'),(187,'tested','',1,0,1,40,NULL,7,NULL,1,'0000-00-00 00:00:00'),(188,'testing','adf',2,0,1,40,NULL,1,NULL,1,'0000-00-00 00:00:00'),(189,'Listado de cantones con informacion basica','Nombre, poblacion, fecha  xreacion, cabecera cantonal',2,0,1,53,NULL,7,NULL,0,'0000-00-00 00:00:00'),(190,'Listado de parroquias por canton con info basica','Nombre, canton, poblacion',1,0,1,53,NULL,7,NULL,0,'0000-00-00 00:00:00'),(191,'Listado de rios principales','Nombre, origen, largo',2,0,1,53,NULL,7,NULL,0,'0000-00-00 00:00:00'),(192,'Elevaciones importantes','Nombre, altura, alias',2,0,1,53,NULL,7,NULL,0,'0000-00-00 00:00:00'),(193,'Listado de iglesias','Nombre, imagen, canton, parroquia, fecja de creacion',2,0,1,54,NULL,7,NULL,0,'0000-00-00 00:00:00'),(194,'Listado de museos','Nombre, ubicacion, canton, parroquia, elementos de exposicion',2,0,1,54,NULL,7,NULL,0,'0000-00-00 00:00:00'),(195,'listado de zoologicos','Nombre, lugar, tipo, dias y horario de atenciom',1,0,1,54,NULL,7,NULL,0,'0000-00-00 00:00:00'),(196,'df','dd',1,0,3,9,NULL,7,4,0,'0000-00-00 00:00:00'),(197,'dsf','',1,0,3,9,NULL,7,4,0,'0000-00-00 00:00:00'),(198,'afds','',1,0,1,51,NULL,7,NULL,9,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_tareas_insert
AFTER INSERT ON tareas
FOR EACH ROW
BEGIN
 SELECT SUM(T.tiempo_planificado) into @TP
 FROM tareas T
 WHERE T.actividad=NEW.actividad;
 SELECT SUM(T.tiempo_real) into @TR
 FROM tareas T
 WHERE T.actividad=NEW.actividad;

 UPDATE actividades 
 SET tiempo_planificado = @TP,
 tiempo_real = @TR
 WHERE ID=NEW.actividad;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_tareas_update
AFTER UPDATE ON tareas
FOR EACH ROW
BEGIN
 SELECT SUM(T.tiempo_planificado) into @TP
 FROM tareas T
 WHERE T.actividad=NEW.actividad;
 SELECT SUM(T.tiempo_real) into @TR
 FROM tareas T
 WHERE T.actividad=NEW.actividad;

 UPDATE actividades 
 SET tiempo_planificado = @TP,
 tiempo_real = @TR
 WHERE ID=NEW.actividad;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER after_tareas_delete
AFTER DELETE ON tareas
FOR EACH ROW
BEGIN
 SELECT SUM(T.tiempo_planificado) into @TP
 FROM tareas T
 WHERE T.actividad=OLD.actividad;
 SELECT SUM(T.tiempo_real) into @TR
 FROM tareas T
 WHERE T.actividad=OLD.actividad;

 UPDATE actividades 
 SET tiempo_planificado = @TP,
 tiempo_real = @TR
 WHERE ID=OLD.actividad;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,'vgyys3nJDN56hoOvbA9vwe',1268889823,1422264954,1,'Admin','istrator','ADMIN','0',NULL,NULL,'356a192b7913b04c54574d18c28d46e6395428ab.jpg'),(7,'127.0.0.1','jaime santana','$2y$08$dLF9F./ho9h2R/f7LJ/rOuBMgXEIx3HvTFVTylwrbO6/RNwMEa.Nu',NULL,'dexterx17@hotmail.com',NULL,'kaOId5CQRH.VjXDrFtz2q.0c1fedfe1b9ee9c9e9',1422326246,'wqbam455zoynUWakdtYWFO',1420735570,1423905183,1,'Jaime','Santana','DENUX','0983706086',-1.23947,-78.629,'902ba3cda1883801594b6e1b452790cc53948fda.jpeg'),(8,'127.0.0.1','danilo nuela','$2y$08$8AuOvy6eJNBFswecA4.G0ed8Nl5EAXL0l872kXH0s7eXPQFxnpGHO',NULL,'danilo.nuela@gmail.com',NULL,NULL,NULL,NULL,1420777603,NULL,1,'Danilo','Nuela','...','0998945229',NULL,NULL,NULL),(9,'127.0.0.1','nataly armas','$2y$08$n8BAssiBcizqb4NJlDOz9OKxwfbIyglc3f61rVqF4eKDs39xpiOja',NULL,'sanu_23gi@yahoo.es',NULL,NULL,NULL,NULL,1420795647,1420895963,1,'Nataly','Armas','DENUX','0995629151',-1.2514,-78.6397,NULL),(10,'127.0.0.1','cristian gallardo','$2y$08$uNbq2saYZkHnH1N617/pb.ioiJ8nbFsaqyK5PmAQCCZ7l0WxUQSo.',NULL,'cmgallardop@gmail.com',NULL,NULL,NULL,NULL,1420830783,1422091346,1,'Cristian','Gallardo','BITSTECHNOLOGIES','0987768245',-1.27136,-78.6264,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,1,2),(24,7,1),(25,7,2),(26,7,4),(18,8,2),(19,8,5),(27,9,2),(28,9,5),(29,10,2),(30,10,5);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wiki_page`
--

DROP TABLE IF EXISTS `wiki_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wiki_page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `contenido` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creador` int(10) unsigned DEFAULT NULL,
  `proyecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `creador` (`creador`),
  CONSTRAINT `wiki_page_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wiki_page`
--

LOCK TABLES `wiki_page` WRITE;
/*!40000 ALTER TABLE `wiki_page` DISABLE KEYS */;
INSERT INTO `wiki_page` VALUES (1,'Generar documentación de clases con grunt-phpdocumentor','1) inicializar npm en raiz de proyecto (crea archivo package.json)<br><blockquote><i><b>npm init</b></i><br></blockquote>2) instar plugin de grunt en la raiz del proyecto <br><blockquote><b><i>npm install grunt-phpdocumentor --save-dev</i></b><br></blockquote>3)Crear archivo Gruntfile.js en la raíz del proyecto.<br><blockquote>module.exports = function (grunt){<br><blockquote>grunt.initConfig({<br><blockquote>phpdocumentor:{<br><blockquote>dist:{<br><blockquote>directory:[\'./application/controllers\',\'./application/models\',\'./application/helpers\'],<br>target:\'docs\'<br></blockquote>}<br></blockquote>}<br></blockquote>});<br>//Carga el plugin phpdocumentor<br>grunt.loadNpmTasks(\'grunt-phpdocumentor\');<br>//Registra el plugin, para luego invocarlo solamente con \"grunt documentar\"<br>grunt.registerTask(\'documentar\',[\'phpdocumentor\']);<br></blockquote>}<br></blockquote>','2015-02-14 03:25:44',7,11);
/*!40000 ALTER TABLE `wiki_page` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-14  4:16:16
