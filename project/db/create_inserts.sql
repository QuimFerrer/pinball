SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `pinballKit` ;
CREATE SCHEMA IF NOT EXISTS `pinballKit` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `pinballKit` ;

-- -----------------------------------------------------
-- Table `pinballKit`.`usuari`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`usuari` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`usuari` (
  `01_pk_idUsuari` INT NOT NULL ,
  `02_nomUsuari` VARCHAR(45) NULL ,
  `03_cognomUsuari` VARCHAR(45) NULL ,
  `04_loginUsuari` VARCHAR(45) NULL ,
  `05_pwdUsuari` VARCHAR(45) NULL ,
  `06_emailUsuari` VARCHAR(45) NULL ,
  `07_fotoUsuari` BLOB NULL ,
  `08_datAltaUsuari` DATETIME NULL ,
  `09_datModUsuari` DATETIME NULL ,
  `10_datBaixaUsuari` DATETIME NULL ,
  PRIMARY KEY (`01_pk_idUsuari`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`admin` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`admin` (
  `01_pk_idAdm` INT NOT NULL ,
  `02_faceAdm` VARCHAR(255) NULL ,
  `03_twitterAdm` VARCHAR(255) NULL ,
  `04_datAltaAdm` DATETIME NULL ,
  `05_datModAdm` DATETIME NULL ,
  `06_datBaixaAdm` DATETIME NULL ,
  PRIMARY KEY (`01_pk_idAdm`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`jugador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`jugador` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`jugador` (
  `01_pk_idJug` INT NOT NULL ,
  `02_faceJug` VARCHAR(255) NULL ,
  `03_twitterJug` VARCHAR(255) NULL ,
  `04_datAltaJug` DATETIME NULL ,
  `05_datModJug` DATETIME NULL ,
  `06_datBaixaJug` DATETIME NULL ,
  PRIMARY KEY (`01_pk_idJug`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`torneig`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`torneig` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`torneig` (
  `01_pk_idTorn` INT NOT NULL ,
  `02_pk_idJocTorn` INT NOT NULL ,
  `03_nomTorn` VARCHAR(45) NULL ,
  `04_premiTorn` DECIMAL(10) NULL ,
  `05_datIniTorn` DATE NULL ,
  `06_datFinTorn` DATE NULL ,
  `07_datAltaTorn` DATETIME NULL ,
  `08_datModTorn` DATETIME NULL ,
  `09_datBaixaTorn` VARCHAR(45) NULL ,
  PRIMARY KEY (`01_pk_idTorn`, `02_pk_idJocTorn`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`inscrit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`inscrit` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`inscrit` (
  `01_pk_idTornInsc` INT NOT NULL ,
  `02_pk_idJocInsc` INT NOT NULL ,
  `03_pk_idJugInsc` INT NOT NULL ,
  PRIMARY KEY (`01_pk_idTornInsc`, `03_pk_idJugInsc`, `02_pk_idJocInsc`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`maquina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`maquina` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`maquina` (
  `01_pk_idMaq` INT NOT NULL ,
  `02_macMaq` VARCHAR(20) NULL ,
  `03_propMaq` VARCHAR(45) NULL ,
  `04_credMaq` DECIMAL(10) NULL ,
  `05_totCredMaq` DECIMAL(10) NULL ,
  `06_datAltaMaq` DATETIME NULL ,
  `07_datModMaq` DATETIME NULL ,
  `08_datBaixaMaq` DATETIME NULL ,
  PRIMARY KEY (`01_pk_idMaq`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`ubicacio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`ubicacio` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`ubicacio` (
  `01_pk_idUbic` INT NOT NULL ,
  `02_pk_idMaqUbic` INT NOT NULL ,
  `02_empUbic` VARCHAR(45) NULL ,
  `03_dirUbic` VARCHAR(45) NULL ,
  `04_pobUbic` VARCHAR(45) NULL ,
  `05_cpUbic` VARCHAR(45) NULL ,
  `06_provUbic` VARCHAR(45) NULL ,
  `07_latUbic` VARCHAR(45) NULL ,
  `08_longUbic` VARCHAR(45) NULL ,
  `09_altUbic` VARCHAR(45) NULL ,
  `10_contUbic` VARCHAR(45) NULL ,
  `11_emailUbic` VARCHAR(45) NULL ,
  `12_telUbic` VARCHAR(15) NULL ,
  `13_mobUbic` VARCHAR(15) NULL ,
  `14_datAltaUbic` DATETIME NULL ,
  `15_datModUbic` DATETIME NULL ,
  `16_datBaixaUbic` DATETIME NULL ,
  PRIMARY KEY (`01_pk_idUbic`, `02_pk_idMaqUbic`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`joc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`joc` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`joc` (
  `01_pk_idJoc` INT NOT NULL ,
  `02_nomJoc` VARCHAR(45) NULL ,
  `03_numPartidesJugadesJoc` INT NULL ,
  `04_datAltaJoc` DATETIME NULL ,
  `05_datModJoc` DATETIME NULL ,
  `06_datBaixaJoc` DATETIME NULL ,
  PRIMARY KEY (`01_pk_idJoc`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`round`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`round` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`round` (
  `01_pk_idMaqRound` INT NOT NULL ,
  `02_pk_idJocRound` INT NOT NULL ,
  `03_pk_idJugRound` INT NOT NULL ,
  `04_pk_idRound` INT NOT NULL ,
  `05_fotoJugRound` BLOB NULL ,
  `06_puntsRound` INT NULL ,
  PRIMARY KEY (`01_pk_idMaqRound`, `02_pk_idJocRound`, `03_pk_idJugRound`, `04_pk_idRound`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`maqInstall`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`maqInstall` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`maqInstall` (
  `01_pk_idMaqInst` INT NOT NULL ,
  `02_pk_idJocInst` INT NOT NULL ,
  PRIMARY KEY (`01_pk_idMaqInst`, `02_pk_idJocInst`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`partida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`partida` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`partida` (
  `01_pk_idMaqPart` INT NOT NULL ,
  `02_pk_idJocPart` INT NOT NULL ,
  `03_pk_idJugPart` INT NOT NULL ,
  `04_dathorPart` DATETIME NULL ,
  `05_datAltPart` DATETIME NULL ,
  `06_datModPart` DATETIME NULL ,
  `07_datBaixaPart` DATETIME NULL ,
  PRIMARY KEY (`01_pk_idMaqPart`, `02_pk_idJocPart`, `03_pk_idJugPart`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pinballKit`.`torneigTePartida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pinballKit`.`torneigTePartida` ;

CREATE  TABLE IF NOT EXISTS `pinballKit`.`torneigTePartida` (
  `01_pk_idTornTTP` INT NOT NULL ,
  `02_pk_idMaqTTP` INT NOT NULL ,
  `03_pk_idJocTTP` INT NOT NULL ,
  `04_pk_idJugTTP` INT NOT NULL ,
  PRIMARY KEY (`01_pk_idTornTTP`, `02_pk_idMaqTTP`, `03_pk_idJocTTP`, `04_pk_idJugTTP`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`usuari`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`usuari` (`01_pk_idUsuari`, `02_nomUsuari`, `03_cognomUsuari`, `04_loginUsuari`, `05_pwdUsuari`, `06_emailUsuari`, `07_fotoUsuari`, `08_datAltaUsuari`, `09_datModUsuari`, `10_datBaixaUsuari`) VALUES ('2', 'joan', 'salas', 'joan', 'jsalas', 'jsalas@gmail.com', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`usuari` (`01_pk_idUsuari`, `02_nomUsuari`, `03_cognomUsuari`, `04_loginUsuari`, `05_pwdUsuari`, `06_emailUsuari`, `07_fotoUsuari`, `08_datAltaUsuari`, `09_datModUsuari`, `10_datBaixaUsuari`) VALUES ('3', 'josep', 'puig', 'josep', 'jpuig', 'jpuig@gmail.com', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`usuari` (`01_pk_idUsuari`, `02_nomUsuari`, `03_cognomUsuari`, `04_loginUsuari`, `05_pwdUsuari`, `06_emailUsuari`, `07_fotoUsuari`, `08_datAltaUsuari`, `09_datModUsuari`, `10_datBaixaUsuari`) VALUES ('4', 'miquel', 'roca', 'miquel', 'mroca', 'mroca@gmail.com', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`usuari` (`01_pk_idUsuari`, `02_nomUsuari`, `03_cognomUsuari`, `04_loginUsuari`, `05_pwdUsuari`, `06_emailUsuari`, `07_fotoUsuari`, `08_datAltaUsuari`, `09_datModUsuari`, `10_datBaixaUsuari`) VALUES ('1', 'adm', 'adm', 'adm', 'adm', 'admadm@gmail.com', NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`admin`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`admin` (`01_pk_idAdm`, `02_faceAdm`, `03_twitterAdm`, `04_datAltaAdm`, `05_datModAdm`, `06_datBaixaAdm`) VALUES ('1', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`jugador`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`jugador` (`01_pk_idJug`, `02_faceJug`, `03_twitterJug`, `04_datAltaJug`, `05_datModJug`, `06_datBaixaJug`) VALUES ('2', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`jugador` (`01_pk_idJug`, `02_faceJug`, `03_twitterJug`, `04_datAltaJug`, `05_datModJug`, `06_datBaixaJug`) VALUES ('3', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`jugador` (`01_pk_idJug`, `02_faceJug`, `03_twitterJug`, `04_datAltaJug`, `05_datModJug`, `06_datBaixaJug`) VALUES ('4', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`torneig`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`torneig` (`01_pk_idTorn`, `02_pk_idJocTorn`, `03_nomTorn`, `04_premiTorn`, `05_datIniTorn`, `06_datFinTorn`, `07_datAltaTorn`, `08_datModTorn`, `09_datBaixaTorn`) VALUES ('1000', '100', 'fifa 2014', '100', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`torneig` (`01_pk_idTorn`, `02_pk_idJocTorn`, `03_nomTorn`, `04_premiTorn`, `05_datIniTorn`, `06_datFinTorn`, `07_datAltaTorn`, `08_datModTorn`, `09_datBaixaTorn`) VALUES ('1001', '101', 'arcade 2014', '200', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`torneig` (`01_pk_idTorn`, `02_pk_idJocTorn`, `03_nomTorn`, `04_premiTorn`, `05_datIniTorn`, `06_datFinTorn`, `07_datAltaTorn`, `08_datModTorn`, `09_datBaixaTorn`) VALUES ('1002', '102', 'web 2014', '300', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`torneig` (`01_pk_idTorn`, `02_pk_idJocTorn`, `03_nomTorn`, `04_premiTorn`, `05_datIniTorn`, `06_datFinTorn`, `07_datAltaTorn`, `08_datModTorn`, `09_datBaixaTorn`) VALUES ('1003', '103', 'castles 2014', '400', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`torneig` (`01_pk_idTorn`, `02_pk_idJocTorn`, `03_nomTorn`, `04_premiTorn`, `05_datIniTorn`, `06_datFinTorn`, `07_datAltaTorn`, `08_datModTorn`, `09_datBaixaTorn`) VALUES ('1004', '104', 'webapp 2014', '500', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`torneig` (`01_pk_idTorn`, `02_pk_idJocTorn`, `03_nomTorn`, `04_premiTorn`, `05_datIniTorn`, `06_datFinTorn`, `07_datAltaTorn`, `08_datModTorn`, `09_datBaixaTorn`) VALUES ('1005', '100', 'mytorn 2014', '600', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`inscrit`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`inscrit` (`01_pk_idTornInsc`, `02_pk_idJocInsc`, `03_pk_idJugInsc`) VALUES ('1000', '100', '2');
INSERT INTO `pinballKit`.`inscrit` (`01_pk_idTornInsc`, `02_pk_idJocInsc`, `03_pk_idJugInsc`) VALUES ('1001', '101', '3');
INSERT INTO `pinballKit`.`inscrit` (`01_pk_idTornInsc`, `02_pk_idJocInsc`, `03_pk_idJugInsc`) VALUES ('1002', '102', '4');
INSERT INTO `pinballKit`.`inscrit` (`01_pk_idTornInsc`, `02_pk_idJocInsc`, `03_pk_idJugInsc`) VALUES ('1003', '103', '2');
INSERT INTO `pinballKit`.`inscrit` (`01_pk_idTornInsc`, `02_pk_idJocInsc`, `03_pk_idJugInsc`) VALUES ('1004', '104', '3');
INSERT INTO `pinballKit`.`inscrit` (`01_pk_idTornInsc`, `02_pk_idJocInsc`, `03_pk_idJugInsc`) VALUES ('1005', '100', '2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`maquina`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`maquina` (`01_pk_idMaq`, `02_macMaq`, `03_propMaq`, `04_credMaq`, `05_totCredMaq`, `06_datAltaMaq`, `07_datModMaq`, `08_datBaixaMaq`) VALUES ('10', NULL, 'josep guijosa', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`maquina` (`01_pk_idMaq`, `02_macMaq`, `03_propMaq`, `04_credMaq`, `05_totCredMaq`, `06_datAltaMaq`, `07_datModMaq`, `08_datBaixaMaq`) VALUES ('20', NULL, 'josep guijosa', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`maquina` (`01_pk_idMaq`, `02_macMaq`, `03_propMaq`, `04_credMaq`, `05_totCredMaq`, `06_datAltaMaq`, `07_datModMaq`, `08_datBaixaMaq`) VALUES ('30', NULL, 'joan farres', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`maquina` (`01_pk_idMaq`, `02_macMaq`, `03_propMaq`, `04_credMaq`, `05_totCredMaq`, `06_datAltaMaq`, `07_datModMaq`, `08_datBaixaMaq`) VALUES ('40', NULL, 'joan farres', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`maquina` (`01_pk_idMaq`, `02_macMaq`, `03_propMaq`, `04_credMaq`, `05_totCredMaq`, `06_datAltaMaq`, `07_datModMaq`, `08_datBaixaMaq`) VALUES ('50', NULL, 'miquel farres', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`ubicacio`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`ubicacio` (`01_pk_idUbic`, `02_pk_idMaqUbic`, `02_empUbic`, `03_dirUbic`, `04_pobUbic`, `05_cpUbic`, `06_provUbic`, `07_latUbic`, `08_longUbic`, `09_altUbic`, `10_contUbic`, `11_emailUbic`, `12_telUbic`, `13_mobUbic`, `14_datAltaUbic`, `15_datModUbic`, `16_datBaixaUbic`) VALUES ('1', '10', 'astic,sa', 'santa anna,23', 'sabadell', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`ubicacio` (`01_pk_idUbic`, `02_pk_idMaqUbic`, `02_empUbic`, `03_dirUbic`, `04_pobUbic`, `05_cpUbic`, `06_provUbic`, `07_latUbic`, `08_longUbic`, `09_altUbic`, `10_contUbic`, `11_emailUbic`, `12_telUbic`, `13_mobUbic`, `14_datAltaUbic`, `15_datModUbic`, `16_datBaixaUbic`) VALUES ('2', '20', 'astic,sa', 'santa anna,23', 'sabadell', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`ubicacio` (`01_pk_idUbic`, `02_pk_idMaqUbic`, `02_empUbic`, `03_dirUbic`, `04_pobUbic`, `05_cpUbic`, `06_provUbic`, `07_latUbic`, `08_longUbic`, `09_altUbic`, `10_contUbic`, `11_emailUbic`, `12_telUbic`, `13_mobUbic`, `14_datAltaUbic`, `15_datModUbic`, `16_datBaixaUbic`) VALUES ('3', '30', 'fermol,sl', 'robert,2', 'barcelona', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`ubicacio` (`01_pk_idUbic`, `02_pk_idMaqUbic`, `02_empUbic`, `03_dirUbic`, `04_pobUbic`, `05_cpUbic`, `06_provUbic`, `07_latUbic`, `08_longUbic`, `09_altUbic`, `10_contUbic`, `11_emailUbic`, `12_telUbic`, `13_mobUbic`, `14_datAltaUbic`, `15_datModUbic`, `16_datBaixaUbic`) VALUES ('4', '40', 'fermol,sl', 'robert,2', 'barcelona', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`ubicacio` (`01_pk_idUbic`, `02_pk_idMaqUbic`, `02_empUbic`, `03_dirUbic`, `04_pobUbic`, `05_cpUbic`, `06_provUbic`, `07_latUbic`, `08_longUbic`, `09_altUbic`, `10_contUbic`, `11_emailUbic`, `12_telUbic`, `13_mobUbic`, `14_datAltaUbic`, `15_datModUbic`, `16_datBaixaUbic`) VALUES ('5', '50', 'iol,sa', 'londres,90', 'mollet', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`joc`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`joc` (`01_pk_idJoc`, `02_nomJoc`, `03_numPartidesJugadesJoc`, `04_datAltaJoc`, `05_datModJoc`, `06_datBaixaJoc`) VALUES ('100', 'tetris', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`joc` (`01_pk_idJoc`, `02_nomJoc`, `03_numPartidesJugadesJoc`, `04_datAltaJoc`, `05_datModJoc`, `06_datBaixaJoc`) VALUES ('101', 'war3d', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`joc` (`01_pk_idJoc`, `02_nomJoc`, `03_numPartidesJugadesJoc`, `04_datAltaJoc`, `05_datModJoc`, `06_datBaixaJoc`) VALUES ('102', 'fhising', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`joc` (`01_pk_idJoc`, `02_nomJoc`, `03_numPartidesJugadesJoc`, `04_datAltaJoc`, `05_datModJoc`, `06_datBaixaJoc`) VALUES ('103', 'arcade', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `pinballKit`.`joc` (`01_pk_idJoc`, `02_nomJoc`, `03_numPartidesJugadesJoc`, `04_datAltaJoc`, `05_datModJoc`, `06_datBaixaJoc`) VALUES ('104', 'pacman', NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `pinballKit`.`maqInstall`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pinballKit`;
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('10', '100');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('10', '101');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('10', '102');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('20', '102');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('20', '103');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('20', '104');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('30', '101');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('30', '103');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('40', '100');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('40', '101');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('40', '102');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('40', '103');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('40', '104');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('50', '103');
INSERT INTO `pinballKit`.`maqInstall` (`01_pk_idMaqInst`, `02_pk_idJocInst`) VALUES ('50', '104');

COMMIT;
