# DROP DATABASE db_mitra;
-- -----------------------------------------------------
-- Schema bbdd_app_web_compras_linea
-- -----------------------------------------------------
CREATE DATABASE db_mitra DEFAULT CHARACTER SET utf8 ;
USE db_mitra ;

-- -----------------------------------------------------
-- Table ROLES
-- -----------------------------------------------------
CREATE TABLE ROLES (
  rol_code INT(11) NOT NULL AUTO_INCREMENT,
  rol_name VARCHAR(45) NOT NULL,
  PRIMARY KEY (rol_code)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table USUARIOS

CREATE TABLE USERS (
  user_code INT(11) NOT NULL AUTO_INCREMENT,
  user_name VARCHAR(45) NOT NULL,
  user_last_name VARCHAR(45) NOT NULL,
  user_id INT(11) NOT NULL,
  user_mail VARCHAR(45) NOT NULL,
  user_phone INT(11) NOT NULL,
  user_password VARCHAR(200) NOT NULL,
  user_status INT(11) NOT NULL,
  rol_code INT(11) NOT NULL,  -- Agregar el campo para la relación con ROLES
  PRIMARY KEY (user_code),
  INDEX ind_users_code (user_code ASC),
  CONSTRAINT fk_users_roles
    FOREIGN KEY (rol_code)
    REFERENCES ROLES (rol_code)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- Table PRODUCCION

CREATE TABLE PRODUCTIONS (
  prod_code INT(11) NOT NULL AUTO_INCREMENT,
  prod_description VARCHAR(45) NOT NULL,
  prod_date INT(11) NOT NULL,
  prod_amount INT(100) NOT NULL,
  prod_id INT(11) NOT NULL,
  prod_name VARCHAR(45) NOT NULL,
  rol_code INT(11) NOT NULL,  -- Agregar el campo para la relación con ROLES
  PRIMARY KEY (prod_code),
  INDEX ind_prod_code (prod_code ASC),
  CONSTRAINT fk_productions_roles
    FOREIGN KEY (rol_code)
    REFERENCES ROLES (rol_code)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

 -- TABLE LABORES

 CREATE TABLE WORKS (
    work_id INT(11) NOT NULL AUTO_INCREMENT,
    work_asign VARCHAR(45) NOT NULL,
    rol_code INT(11) NOT NULL,
    PRIMARY KEY (work_id),
    INDEX ind_work_id (work_id ASC),
    CONSTRAINT fk_works_roles
     FOREIGN KEY (rol_code)
     REFERENCES ROLES (rol_code)
     ON DELETE NO ACTION
     ON UPDATE NO ACTION 
 ) ENGINE = InnoDB;

 -- TABLE INSUMOS

CREATE TABLE SUPPLIES (
    supplie_id INT(11) NOT NULL AUTO_INCREMENT,
    supplie_name VARCHAR(45) NOT NULL,
    supplie_date VARCHAR(45) NOT NULL,
    supplie_amount INT(11) NOT NULL,
    rol_code INT(11) NOT NULL,
    PRIMARY KEY (supplie_id),
    INDEX ind_supplie_id (supplie_id ASC),
    CONSTRAINT fk_supplies_roles
     FOREIGN KEY (rol_code)
     REFERENCES ROLES (rol_code)
     ON DELETE NO ACTION
     ON UPDATE NO ACTION 
 ) ENGINE = InnoDB;

 
