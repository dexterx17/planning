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
-------------------------------------------------------HASTA AQUI LA VERSION DEL SCRIPT EJECUTADA --------------------------------------
CREATE TABLE funciones
(
	ID			INT PRIMARY KEY,
	nombre		VARCHAR(25),
	descripcion	VARCHAR(300)
);

CREATE TABLE miembros
(
	ID			INT PRIMARY KEY,
	nombres			VARCHAR(50),
	nick			CHAR(15),
	telefono		CHAR(12),
	celular			CHAR(12),
	correo			VARCHAR(50)
);

CREATE TABLE funciones_miembro
(
	miembro			INT	REFERENCES miembros(ID),
	funcion			INT REFERENCES funciones(ID),
	fecha_registro	DATE,
	PRIMARY KEY(miembro,funcion)
);

CREATE TABLE equipos
(
	ID					INT PRIMARY KEY,
	proyecto			INT REFERENCES proyectos(ID),
	miembro				INT REFERENCES miembros(ID),
	tiempo_laborado		DOUBLE PRECISION
);

CREATE TABLE historias
(
    ID                    INT PRIMARY KEY,
    nombre                VARCHAR(200),
    tiempo_planificado    DOUBLE PRECISION,
    tiempo_real           DOUBLE PRECISION,
	estado				  VARCHAR(50),
    sprint                INT,
	proyecto			  INT,
	FOREIGN KEY(sprint,proyecto) REFERENCES sprints(numero,proyecto)
);


CREATE TABLE epopeyas
(
	ID 						INT PRIMARY KEY,
	nombre                  VARCHAR(200),
	tiempo_planificado    	DOUBLE PRECISION,
    tiempo_real           	DOUBLE PRECISION,
	estado				  	VARCHAR(50),
	actividad				INT REFERENCES epopeyas(ID),
	responsable				INT REFERENCES equipos(ID)
);

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


/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
/* *******************************************   SECUENCIAS       ************************************************** */
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */

CREATE SEQUENCE seq_owners
START WITH 1
INCREMENT BY 1
MINVALUE 1
MAXVALUE 99999999;

ALTER TABLE owners
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_owners');
	
CREATE SEQUENCE seq_proyectos
START WITH 1
INCREMENT BY 1
MINVALUE 1
MAXVALUE 99999999;

ALTER TABLE proyectos
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_proyectos');

	
CREATE SEQUENCE seq_miembros 
START WITH 1 
INCREMENT BY 1 
MINVALUE 1 
MAXVALUE 99999999;

ALTER TABLE miembros
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_miembros');

CREATE SEQUENCE seq_funciones
START WITH 1 
INCREMENT BY 1 
MINVALUE 1 
MAXVALUE 99999999;

ALTER TABLE funciones
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_funciones');
	
CREATE SEQUENCE seq_equipos
START WITH 1 
INCREMENT BY 1 
MINVALUE 1 
MAXVALUE 99999999;

ALTER TABLE equipos
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_equipos');	

CREATE SEQUENCE seq_actividades
START WITH 1 
INCREMENT BY 1 
MINVALUE 1 
MAXVALUE 99999999;

ALTER TABLE actividades
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_actividades');	

	
CREATE SEQUENCE seq_subactividades
START WITH 1 
INCREMENT BY 1 
MINVALUE 1 
MAXVALUE 99999999;

ALTER TABLE subactividades
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_subactividades');	

CREATE SEQUENCE seq_tipo_pruebas
START WITH 1 
INCREMENT BY 1 
MINVALUE 1 
MAXVALUE 999;

ALTER TABLE tipo_pruebas
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_tipo_pruebas');		
	
CREATE SEQUENCE seq_pruebas
START WITH 1 
INCREMENT BY 1 
MINVALUE 1 
MAXVALUE 999999999;

ALTER TABLE pruebas
	ALTER COLUMN ID
	SET DEFAULT NEXTVAL('seq_pruebas');	
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
/* **************************************   PROCEDIMIENTOS CRUD   ************************************************** */
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */

/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_insert_owner(
			VARCHAR(30),
			VARCHAR(30),
			CHAR(12),
			CHAR(12),
			VARCHAR(50),
			VARCHAR(100),
			VARCHAR(150)
		)			
 RETURNS void
	AS
	$body$
BEGIN
	INSERT INTO owners(nombres,apellidos,telefono,celular,correo,direccion,empresa)	
	VALUES($1,$2,$3,$4,$5,$6,$7);
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_insert_owner('Jaime','Santana','032820212','0983706086','jaimesantanal@hotmail.com','casita','HCPT');
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_update_owner(
			INT,
			VARCHAR(30),
			VARCHAR(30),
			CHAR(12),
			CHAR(12),
			VARCHAR(50),
			VARCHAR(100),
			VARCHAR(150)
		)			
 RETURNS void
	AS
	$body$
BEGIN
	UPDATE owners 
	SET nombres=$2,
		apellidos=$3,
		telefono=$4,
		celular=$5,
		correo=$6,
		direccion=$7,
		empresa=$8	
	WHERE ID = $1;
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_update_owner(1,'Marianela','Morejon','','','marianelamorejon@gmail.com','fisei','UTA');
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_delete_owner(
			INT
		)			
 RETURNS void
	AS
	$body$
BEGIN
	DELETE FROM owners
	WHERE ID = $1;
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_delete_owner(2);
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_insert_proyecto(
			VARCHAR(150),
			VARCHAR(500),
			DATE,
			DATE,
			DOUBLE PRECISION,
			INT
		)			
 RETURNS void
	AS
	$body$
BEGIN
	INSERT INTO Proyectos(nombre,descripcion,fecha_inicio,fecha_fin,presupuesto,owner)	
	VALUES($1,$2,$3,$4,$5,$6);
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_insert_proyecto('SISTEMA POSGRADO','Seguimiento de Egresados de la FISEI','06/05/2013','28/05/2013',0,1);
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_update_proyecto(
			INT,
			VARCHAR(150),
			VARCHAR(500),
			DATE,
			DATE,
			DOUBLE PRECISION,
			INT
		)			
 RETURNS void
	AS
	$body$
BEGIN
	UPDATE Proyectos 
	SET nombre=$2,
	descripcion=$3,
	fecha_inicio=$4,
	fecha_fin=$5,
	presupuesto=$6,
	owner=$7	
	where ID=$1;
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_update_proyecto(1,'SISTEMA POSGRADO FIS','Seguimiento de Egresados de la FISEI','06/05/2013','28/05/2013',0,1);
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_delete_proyecto(
			INT
		)			
 RETURNS void
	AS
	$body$
BEGIN
	DELETE FROM Proyectos 	
	where ID=$1;
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_delete_proyecto(2);
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_insert_miembro(
			VARCHAR(50),
			CHAR(15),
			CHAR(12),
			CHAR(12),
			VARCHAR(50)
		)			
 RETURNS void
	AS
	$body$
BEGIN
	INSERT INTO miembros(nombres,nick,telefono,celular,correo)	
	VALUES($1,$2,$3,$4,$5);
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_insert_miembro('Jaime Santana','Dexter','032820212','0983706086','jaimesantanal@hotmail.com');
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_update_miembro(
			INT,
			VARCHAR(50),
			CHAR(15),
			CHAR(12),
			CHAR(12),
			VARCHAR(50)
		)			
 RETURNS void
	AS
	$body$
BEGIN
	UPDATE miembros
	SET nombres=$2,
	nick=$3,
	telefono=$4,
	celular=$5,
	correo=$6	
	WHERE ID=$1;
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_update_miembro(1,'Jaime Santana L','Dexter','032820212','0983706086','jaimesantanal@hotmail.com');
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_delete_miembro(
			INT
		)			
 RETURNS void
	AS
	$body$
BEGIN
	DELETE FROM miembros
	WHERE ID=$1;
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_delete_miembro(1);
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_insert_funcion(
			VARCHAR(25),
			VARCHAR(300)
		)			
 RETURNS void
	AS
	$body$
BEGIN
	INSERT INTO funciones(nombre,descripcion)
	VALUES($1,$2);
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_insert_funcion('Senior Java','Programaci�n Avanzada en JAVA');
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_update_funcion(
			INT,
			VARCHAR(25),
			VARCHAR(300)
		)			
 RETURNS void
	AS
	$body$
BEGIN
	UPDATE funciones 
	SET nombre=$2,
	descripcion=$3
	WHERE ID=$1;
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_update_funcion(6,'Senior Java','Programaci�n Avanzada en JAVA');
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
CREATE OR REPLACE FUNCTION p_delete_funcion(
			INT
		)			
 RETURNS void
	AS
	$body$
BEGIN
	DELETE FROM funciones
	WHERE ID=$1;
END;
$body$
LANGUAGE 'plpgsql';
/* ***************************************************************************************************************** */
select p_delete_funcion(5);
/* ***************************************************************************************************************** */
/* ***************************************************************************************************************** */
