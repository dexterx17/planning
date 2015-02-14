CREATE TABLE people
(
	ID   INT   AUTO_INCREMENT,
	nick  VARCHAR(30) UNIQUE,
	nombres VARCHAR(30),
	apellidos   VARCHAR(30),
	telefono    VARCHAR(50),
	celular     VARCHAR(50),
	direccion   VARCHAR(100),
	email    VARCHAR(100),
	empresa     VARCHAR(150),
	PRIMARY KEY(ID)
);
ALTER TABLE people ADD COLUMN latitud float DEFAULT NULL;
ALTER TABLE people ADD COLUMN longitud float DEFAULT NULL;
ALTER TABLE people ADD COLUMN imagen VARCHAR(255);
CREATE TABLE proyectos
(
	ID    INT    AUTO_INCREMENT,
	nick    VARCHAR(50)    UNIQUE,
	nombre    VARCHAR(150),
	descripcion    VARCHAR(500),
	fecha_inicio    DATE,
	fecha_fin    DATE,
	presupuesto    DOUBLE PRECISION,
	owner    INT    REFERENCES people(ID),
	PRIMARY KEY(ID)
);

CREATE TABLE sprints
(
	numero			 INT AUTO_INCREMENT,
	objetivo			VARCHAR(300),
	fecha_inicio	         DATE,
	fecha_fin		 DATE,
	horas_planificadas       INT,
	porcentaje_valido        INT,
	proyecto		INT REFERENCES proyectos(ID),
	PRIMARY KEY(numero,proyecto)
);

CREATE TABLE actividades
(
    ID                    INT PRIMARY KEY AUTO_INCREMENT,
    nombre                VARCHAR(200),
    descripcion           TEXT,
    tiempo_planificado    DOUBLE PRECISION,
    tiempo_real           DOUBLE PRECISION,
	estado				  VARCHAR(50),
 	proyecto			  INT,
	FOREIGN KEY (proyecto) REFERENCES proyectos(ID)
);

ALTER TABLE actividades ADD COLUMN tipo INT;

CREATE TABLE estado_tarea
(
    ID      INT PRIMARY KEY AUTO_INCREMENT,
    nombre  VARCHAR(50)
);
INSERT INTO estado_tarea(nombre) VALUES('TO DO'),('DOING'),('DONE');
CREATE TABLE tareas
(
    ID                    INT PRIMARY KEY AUTO_INCREMENT,
    nombre                VARCHAR(200),
    descripcion           TEXT,
    tiempo_planificado    DOUBLE PRECISION,
    tiempo_real           DOUBLE PRECISION,
    estado		  VARCHAR(50),
    actividad			  INT,
 FOREIGN KEY (actividad) REFERENCES actividades(ID)
);
ALTER TABLE tareas MODIFY COLUMN estado INT;

CREATE TABLE IF NOT EXISTS `geocoding` (
	`address` varchar(255) NOT NULL DEFAULT '',
	`latitude` float DEFAULT NULL,
	`longitude` float DEFAULT NULL,
	PRIMARY KEY (`address`)
);

CREATE TABLE actividades_sprint
(
	
);

ALTER TABLE actividades ADD COLUMN sprint INT;

CREATE TABLE estado_actividades
(
    ID      INT PRIMARY KEY AUTO_INCREMENT,
    nombre  VARCHAR(50)
);
INSERT INTO estado_actividades(nombre) VALUES('Nueva'),('Lista para estimación'),('Lista para sprint'),('Por hacer'),('En progreso'),('Realizada'),('Sprint completado');

ALTER TABLE sprints ADD COLUMN num INT;

/**
* Genera un nuevo Número de sprint
**/
DELIMITER //
DROP TRIGGER IF EXISTS before_sprint_insert; //
CREATE TRIGGER before_sprint_insert
BEFORE INSERT ON sprints
FOR EACH ROW 
BEGIN 
 SELECT COUNT(*) INTO @cantidad
 FROM sprints S
 WHERE S.proyecto = NEW.proyecto; 
 SET NEW.num=@cantidad+1;
END; //
DELIMITER ;

/**
* Actualiza los tiempos planificado y real de la actidad, sumando los tiempos de cada tarea
**/
DELIMITER //
DROP TRIGGER IF EXISTS after_tareas_insert; //
CREATE TRIGGER after_tareas_insert
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

END; //
DELIMITER ;

/**
* Actualiza los tiempos planificado y real de la actidad, sumando los tiempos de cada tarea
**/
DELIMITER //
DROP TRIGGER IF EXISTS after_tareas_update; //
CREATE TRIGGER after_tareas_update
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

END; //
DELIMITER ;

/**
* Actualiza los tiempos planificado y real de la actidad, sumando los tiempos de cada tarea
**/
DELIMITER //
DROP TRIGGER IF EXISTS after_tareas_delete; //
CREATE TRIGGER after_tareas_delete
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

END; //
DELIMITER ;

/* campo para ordenar actividades en Backlog */
ALTER TABLE actividades ADD COLUMN orden INT;

/* campo para ordenar tareas en cada actividad */
ALTER TABLE tareas ADD COLUMN orden INT;

/* campo para visibilidad de proyectos, por defecto privado(1) */
ALTER TABLE proyectos ADD COLUMN visibilidad INT DEFAULT 1;

ALTER TABLE users ADD COLUMN latitud float DEFAULT NULL;
ALTER TABLE users ADD COLUMN longitud float DEFAULT NULL;
ALTER TABLE users ADD COLUMN imagen VARCHAR(255);

CREATE TABLE equipo_proyecto 
( 
 	ID INT NOT NULL,
 	proyecto INT NOT NULL,
 	miembro INT unsigned NOT NULL,
 	fecha_integracion DATE NOT NULL,
  	grupo INT
);

ALTER TABLE equipo_proyecto
ADD FOREIGN KEY (proyecto) REFERENCES proyectos(ID);

ALTER TABLE equipo_proyecto 
ADD FOREIGN KEY (miembro) REFERENCES users(id);

ALTER TABLE equipo_proyecto
ADD PRIMARY KEY(ID,miembro,proyecto);

ALTER TABLE equipo_proyecto
ADD UNIQUE u_ep(miembro,proyecto);

/**
* gENERA UN NUEVO CODIGO PARA LA TABLA
**/
DELIMITER //
DROP TRIGGER IF EXISTS before_ep_insert; //
CREATE TRIGGER before_ep_insert
BEFORE INSERT ON equipo_proyecto
FOR EACH ROW
BEGIN
SET NEW.ID=(SELECT ifnull((select max(ID)+1 from equipo_proyecto),1));

END; //
DELIMITER ;

/* Cambio de tipo de columna para FK de users */
ALTER TABLE proyectos MODIFY COLUMN owner INT  unsigned;
/* Referencia para ID de creador del proyecto */
ALTER TABLE proyectos 
ADD FOREIGN KEY (owner) REFERENCES users(id);

/* FK de proyecto es sprint */
ALTER TABLE sprints 
ADD FOREIGN KEY (proyecto) REFERENCES proyectos(ID);

/**
* Asigna el nuevo orden a la actividad asignada al backlog
**/
DELIMITER //
DROP TRIGGER IF EXISTS before_actividades_insert; //
CREATE TRIGGER before_actividades_insert
BEFORE INSERT ON actividades
FOR EACH ROW
BEGIN
SET NEW.orden=(SELECT ifnull((select max(orden)+1 from actividades where proyecto=NEW.proyecto),1));

END; //
DELIMITER ;

CREATE TABLE columna_tablero
(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	proyecto INT NOT NULL,
	nombre VARCHAR(100) NOT NULL,
	descripcion TEXT,
	estado INT NOT NULL,
	FOREIGN KEY (proyecto) REFERENCES proyectos(ID),
	FOREIGN KEY (estado) REFERENCES estado_tarea(ID)
);

ALTER TABLE tareas ADD COLUMN creador INT unsigned;
ALTER TABLE actividades ADD COLUMN creador INT unsigned;


CREATE TABLE tarea_responsables
(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	tarea INT NOT NULL,
	responsable INT unsigned NOT NULL
);

ALTER TABLE tareas ADD COLUMN columna INT;

CREATE TABLE presupuesto
(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	valor double precision NOT NULL,
	descripcion	 TEXT,
	fecha TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,
	tipo CHAR(1) NOT NULL,
	proyecto INT NOT NULL,
	FOREIGN KEY(proyecto) REFERENCES proyectos(ID)
);

ALTER TABLE tareas ADD COLUMN responsable INT unsigned;


CREATE TABLE recursos
(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	recurso VARCHAR(250) NOT NULL,
	descripcion	 TEXT,
	fecha TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,
	costo double precision ,
	estado CHAR(1) NOT NULL,
	proyecto INT NOT NULL,
	FOREIGN KEY(proyecto) REFERENCES proyectos(ID)
);

CREATE TABLE IF NOT EXISTS gcm_users (
  ID int(11) NOT NULL AUTO_INCREMENT,
  gcm_regid text,
  name varchar(50) NOT NULL,
  email varchar(255) NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

/** Campo para registrar cuando se culmino una tarea **/
ALTER TABLE tareas
ADD COLUMN fecha_fin TIMESTAMP;

CREATE TABLE wiki_page
(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	titulo VARCHAR(250),
	contenido TEXT,
	fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	creador INT unsigned,
	proyecto INT,
	FOREIGN KEY (creador) REFERENCES users(id)
);


CREATE TABLE logs_rest (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `uri` varchar(255) NOT NULL,
	  `method` varchar(6) NOT NULL,
	  `params` text DEFAULT NULL,
	  `api_key` varchar(40) NOT NULL,
	  `ip_address` varchar(45) NOT NULL,
	  `time` int(11) NOT NULL,
	  `rtime` float DEFAULT NULL,
	  `authorized` tinyint(1) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-------------------------------------------------------HASTA AQUI LA VERSION DEL SCRIPT EJECUTADA --------------------------------------

CREATE TABLE tipo_pruebas
(
	ID			INT PRIMARY KEY,
	tipo		VARCHAR(25),
	descripcion	VARCHAR(300)	
);

CREATE TABLE pruebas
(
	ID						INT PRIMARY KEY,
	tipo					INT REFERENCES tipo_pruebas(ID),
	descripcion				VARCHAR(500),
	tiempo_planificado    	DOUBLE PRECISION,
    tiempo_real           	DOUBLE PRECISION,
	actividad				INT
);

/** ----------------------------------- QUERYS ---------------------------------------- **/
SELECT SUM(T.tiempo_planificado)
FROM tareas T, actividades A
WHERE T.actividad=A.ID
GROUP BY T.actividad, A.proyecto;

SELECT SUM(T.tiempo_planificado), SUM(T.tiempo_real), A.proyecto
FROM tareas T, actividades A
WHERE T.actividad=A.ID
GROUP BY A.proyecto;