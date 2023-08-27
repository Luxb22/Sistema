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
-- -----------------------------------------------------
CREATE TABLE USERS (
  rol_code INT(11) NOT NULL,
  user_code INT(11) NOT NULL,
  user_name VARCHAR(45) NOT NULL,
  user_last_name VARCHAR(45) NOT NULL,
  user_id VARCHAR(45) NOT NULL,
  user_mail VARCHAR(45) NOT NULL,
  user_phone VARCHAR(45) NOT NULL,
  user_password VARCHAR(200) NOT NULL,
  user_status TINYINT(4) NOT NULL,
  PRIMARY KEY (user_code),
  INDEX ind_users_roles (rol_code ASC),
  CONSTRAINT fk_users_roles
    FOREIGN KEY (rol_code)
    REFERENCES ROLES (rol_code)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;