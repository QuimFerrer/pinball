SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `u555588791_pinba` ;
CREATE SCHEMA IF NOT EXISTS `u555588791_pinba` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `u555588791_pinba` ;

-- -----------------------------------------------------
-- Table `u555588791_pinba`.`usuari`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`usuari` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`usuari` (
  `_01_pk_idUsuari` INT NOT NULL ,
  `_02_nomUsuari` VARCHAR(45) NULL ,
  `_03_cognomUsuari` VARCHAR(45) NULL ,
  `_04_loginUsuari` VARCHAR(45) NULL ,
  `_05_pwdUsuari` VARCHAR(45) NULL ,
  `_06_emailUsuari` VARCHAR(45) NULL ,
  `_07_fotoUsuari` BLOB NULL ,
  `_08_datAltaUsuari` DATETIME NULL ,
  `_09_datModUsuari` DATETIME NULL ,
  `_10_datBaixaUsuari` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idUsuari`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`admin` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`admin` (
  `_01_pk_idAdm` INT NOT NULL ,
  `_02_faceAdm` VARCHAR(255) NULL ,
  `_03_twitterAdm` VARCHAR(255) NULL ,
  `_04_datAltaAdm` DATETIME NULL ,
  `_05_datModAdm` DATETIME NULL ,
  `_06_datBaixaAdm` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idAdm`) ,
  CONSTRAINT `fk_admin_usuari1`
    FOREIGN KEY (`_01_pk_idAdm` )
    REFERENCES `u555588791_pinba`.`usuari` (`_01_pk_idUsuari` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`jugador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`jugador` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`jugador` (
  `_01_pk_idJug` INT NOT NULL ,
  `_02_faceJug` VARCHAR(255) NULL ,
  `_03_twitterJug` VARCHAR(255) NULL ,
  `_04_datAltaJug` DATETIME NULL ,
  `_05_datModJug` DATETIME NULL ,
  `_06_datBaixaJug` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idJug`) ,
  CONSTRAINT `fk_jugador_usuari`
    FOREIGN KEY (`_01_pk_idJug` )
    REFERENCES `u555588791_pinba`.`usuari` (`_01_pk_idUsuari` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`joc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`joc` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`joc` (
  `_01_pk_idJoc` INT NOT NULL ,
  `_02_nomJoc` VARCHAR(45) NULL ,
  `_03_numPartidesJugadesJoc` INT NULL ,
  `_04_datAltaJoc` DATETIME NULL ,
  `_05_datModJoc` DATETIME NULL ,
  `_06_datBaixaJoc` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idJoc`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`torneig`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`torneig` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`torneig` (
  `_01_pk_idTorn` INT NOT NULL ,
  `_02_pk_idJocTorn` INT NOT NULL ,
  `_03_nomTorn` VARCHAR(45) NULL ,
  `_04_premiTorn` DECIMAL(10) NULL ,
  `_05_datIniTorn` DATE NULL ,
  `_06_datFinTorn` DATE NULL ,
  `_07_datAltaTorn` DATETIME NULL ,
  `_08_datModTorn` DATETIME NULL ,
  `_09_datBaixaTorn` VARCHAR(45) NULL ,
  PRIMARY KEY (`_01_pk_idTorn`, `_02_pk_idJocTorn`) ,
  INDEX `torneig_2_joc` (`_02_pk_idJocTorn` ASC) ,
  CONSTRAINT `torneig_2_joc`
    FOREIGN KEY (`_02_pk_idJocTorn` )
    REFERENCES `u555588791_pinba`.`joc` (`_01_pk_idJoc` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`inscrit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`inscrit` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`inscrit` (
  `_01_pk_idTornInsc` INT NOT NULL ,
  `_02_pk_idJocInsc` INT NOT NULL ,
  `_03_pk_idJugInsc` INT NOT NULL ,
  PRIMARY KEY (`_01_pk_idTornInsc`, `_03_pk_idJugInsc`, `_02_pk_idJocInsc`) ,
  INDEX `fk_torneig_has_jugador_jugador1` (`_03_pk_idJugInsc` ASC) ,
  CONSTRAINT `fk_torneig_has_jugador_torneig1`
    FOREIGN KEY (`_01_pk_idTornInsc` , `_02_pk_idJocInsc` )
    REFERENCES `u555588791_pinba`.`torneig` (`_01_pk_idTorn` , `_02_pk_idJocTorn` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_torneig_has_jugador_jugador1`
    FOREIGN KEY (`_03_pk_idJugInsc` )
    REFERENCES `u555588791_pinba`.`jugador` (`_01_pk_idJug` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`maquina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`maquina` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`maquina` (
  `_01_pk_idMaq` INT NOT NULL ,
  `_02_macMaq` VARCHAR(20) NULL ,
  `_03_propMaq` VARCHAR(45) NULL ,
  `_04_credMaq` DECIMAL(10) NULL ,
  `_05_totCredMaq` DECIMAL(10) NULL ,
  `_06_datAltaMaq` DATETIME NULL ,
  `_07_datModMaq` DATETIME NULL ,
  `_08_datBaixaMaq` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idMaq`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`ubicacio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`ubicacio` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`ubicacio` (
  `_01_pk_idUbic` INT NOT NULL ,
  `_02_pk_idMaqUbic` INT NOT NULL ,
  `_03_empUbic` VARCHAR(45) NULL ,
  `_04_dirUbic` VARCHAR(45) NULL ,
  `_05_pobUbic` VARCHAR(45) NULL ,
  `_06_cpUbic` VARCHAR(45) NULL ,
  `_07_provUbic` VARCHAR(45) NULL ,
  `_08_latUbic` VARCHAR(45) NULL ,
  `_09_longUbic` VARCHAR(45) NULL ,
  `_10_altUbic` VARCHAR(45) NULL ,
  `_11_contUbic` VARCHAR(45) NULL ,
  `_12_emailUbic` VARCHAR(45) NULL ,
  `_13_telUbic` VARCHAR(15) NULL ,
  `_14_mobUbic` VARCHAR(15) NULL ,
  `_15_datAltaUbic` DATETIME NULL ,
  `_16_datModUbic` DATETIME NULL ,
  `_17_datBaixaUbic` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idUbic`, `_02_pk_idMaqUbic`) ,
  INDEX `fk_ubicacio_maquina1` (`_02_pk_idMaqUbic` ASC) ,
  CONSTRAINT `fk_ubicacio_maquina1`
    FOREIGN KEY (`_02_pk_idMaqUbic` )
    REFERENCES `u555588791_pinba`.`maquina` (`_01_pk_idMaq` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`round`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`round` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`round` (
  `_01_pk_idMaqRound` INT NOT NULL ,
  `_02_pk_idJocRound` INT NOT NULL ,
  `_03_pk_idJugRound` INT NOT NULL ,
  `_04_pk_idRound` INT NOT NULL ,
  `_05_fotoJugRound` BLOB NULL ,
  `_06_puntsRound` INT NULL ,
  PRIMARY KEY (`_01_pk_idMaqRound`, `_02_pk_idJocRound`, `_03_pk_idJugRound`, `_04_pk_idRound`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`maqInstall`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`maqInstall` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`maqInstall` (
  `_01_pk_idMaqInst` INT NOT NULL ,
  `_02_pk_idJocInst` INT NOT NULL ,
  PRIMARY KEY (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) ,
  INDEX `fk_maquina_has_juego_juego1` (`_02_pk_idJocInst` ASC) ,
  CONSTRAINT `fk_maquina_has_juego_maquina1`
    FOREIGN KEY (`_01_pk_idMaqInst` )
    REFERENCES `u555588791_pinba`.`maquina` (`_01_pk_idMaq` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_maquina_has_juego_juego1`
    FOREIGN KEY (`_02_pk_idJocInst` )
    REFERENCES `u555588791_pinba`.`joc` (`_01_pk_idJoc` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`partida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`partida` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`partida` (
  `_01_pk_idMaqPart` INT NOT NULL ,
  `_02_pk_idJocPart` INT NOT NULL ,
  `_03_pk_idJugPart` INT NOT NULL ,
  `_04_dathorPart` DATETIME NULL ,
  `_05_datAltPart` DATETIME NULL ,
  `_06_datModPart` DATETIME NULL ,
  `_07_datBaixaPart` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`) ,
  INDEX `partida_2_round` (`_01_pk_idMaqPart` ASC, `_02_pk_idJocPart` ASC, `_03_pk_idJugPart` ASC) ,
  INDEX `partida_2_maquina` (`_01_pk_idMaqPart` ASC) ,
  INDEX `partida_2_joc` (`_02_pk_idJocPart` ASC) ,
  INDEX `partida_2_jugador` (`_03_pk_idJugPart` ASC) ,
  CONSTRAINT `partida_2_round`
    FOREIGN KEY (`_01_pk_idMaqPart` , `_02_pk_idJocPart` , `_03_pk_idJugPart` )
    REFERENCES `u555588791_pinba`.`round` (`_01_pk_idMaqRound` , `_02_pk_idJocRound` , `_03_pk_idJugRound` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `partida_2_maquina`
    FOREIGN KEY (`_01_pk_idMaqPart` )
    REFERENCES `u555588791_pinba`.`maquina` (`_01_pk_idMaq` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `partida_2_joc`
    FOREIGN KEY (`_02_pk_idJocPart` )
    REFERENCES `u555588791_pinba`.`joc` (`_01_pk_idJoc` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `partida_2_jugador`
    FOREIGN KEY (`_03_pk_idJugPart` )
    REFERENCES `u555588791_pinba`.`jugador` (`_01_pk_idJug` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`torneigTePartida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`torneigTePartida` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`torneigTePartida` (
  `_01_pk_idTornTTP` INT NOT NULL ,
  `_02_pk_idMaqTTP` INT NOT NULL ,
  `_03_pk_idJocTTP` INT NOT NULL ,
  `_04_pk_idJugTTP` INT NOT NULL ,
  PRIMARY KEY (`_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) ,
  INDEX `TTP_2_partida` (`_02_pk_idMaqTTP` ASC, `_03_pk_idJocTTP` ASC, `_04_pk_idJugTTP` ASC) ,
  INDEX `TTP_2_torneig` (`_01_pk_idTornTTP` ASC, `_03_pk_idJocTTP` ASC) ,
  CONSTRAINT `TTP_2_partida`
    FOREIGN KEY (`_02_pk_idMaqTTP` , `_03_pk_idJocTTP` , `_04_pk_idJugTTP` )
    REFERENCES `u555588791_pinba`.`partida` (`_01_pk_idMaqPart` , `_02_pk_idJocPart` , `_03_pk_idJugPart` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `TTP_2_torneig`
    FOREIGN KEY (`_01_pk_idTornTTP` , `_03_pk_idJocTTP` )
    REFERENCES `u555588791_pinba`.`torneig` (`_01_pk_idTorn` , `_02_pk_idJocTorn` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`usuari`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`) VALUES ('2', 'joan', 'salas', 'joan', 'jsalas', 'jsalas@gmail.com', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`) VALUES ('3', 'josep', 'puig', 'josep', 'jpuig', 'jpuig@gmail.com', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`) VALUES ('4', 'miquel', 'roca', 'miquel', 'mroca', 'mroca@gmail.com', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`) VALUES ('1', 'adm', 'adm', 'adm', 'adm', 'admadm@gmail.com', NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`admin`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`admin` (`_01_pk_idAdm`, `_02_faceAdm`, `_03_twitterAdm`, `_04_datAltaAdm`, `_05_datModAdm`, `_06_datBaixaAdm`) VALUES ('1', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`jugador`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`jugador` (`_01_pk_idJug`, `_02_faceJug`, `_03_twitterJug`, `_04_datAltaJug`, `_05_datModJug`, `_06_datBaixaJug`) VALUES ('2', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`jugador` (`_01_pk_idJug`, `_02_faceJug`, `_03_twitterJug`, `_04_datAltaJug`, `_05_datModJug`, `_06_datBaixaJug`) VALUES ('3', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`jugador` (`_01_pk_idJug`, `_02_faceJug`, `_03_twitterJug`, `_04_datAltaJug`, `_05_datModJug`, `_06_datBaixaJug`) VALUES ('4', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`joc`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_numPartidesJugadesJoc`, `_04_datAltaJoc`, `_05_datModJoc`, `_06_datBaixaJoc`) VALUES ('100', 'tetris', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_numPartidesJugadesJoc`, `_04_datAltaJoc`, `_05_datModJoc`, `_06_datBaixaJoc`) VALUES ('101', 'war3d', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_numPartidesJugadesJoc`, `_04_datAltaJoc`, `_05_datModJoc`, `_06_datBaixaJoc`) VALUES ('102', 'fhising', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_numPartidesJugadesJoc`, `_04_datAltaJoc`, `_05_datModJoc`, `_06_datBaixaJoc`) VALUES ('103', 'arcade', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_numPartidesJugadesJoc`, `_04_datAltaJoc`, `_05_datModJoc`, `_06_datBaixaJoc`) VALUES ('104', 'pacman', NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`torneig`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1000', '100', 'fifa 2014', '100', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1001', '101', 'arcade 2014', '200', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1002', '102', 'web 2014', '300', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1003', '103', 'castles 2014', '400', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1004', '104', 'webapp 2014', '500', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1005', '100', 'mytorn 2014', '600', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`inscrit`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`inscrit` (`_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`) VALUES ('1000', '100', '2');
INSERT INTO `u555588791_pinba`.`inscrit` (`_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`) VALUES ('1001', '101', '3');
INSERT INTO `u555588791_pinba`.`inscrit` (`_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`) VALUES ('1002', '102', '4');
INSERT INTO `u555588791_pinba`.`inscrit` (`_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`) VALUES ('1003', '103', '2');
INSERT INTO `u555588791_pinba`.`inscrit` (`_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`) VALUES ('1004', '104', '3');
INSERT INTO `u555588791_pinba`.`inscrit` (`_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`) VALUES ('1005', '100', '2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`maquina`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('10', NULL, 'josep guijosa', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('20', NULL, 'josep guijosa', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('30', NULL, 'joan farres', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('40', NULL, 'joan farres', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('50', NULL, 'miquel farres', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`ubicacio`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_pk_idMaqUbic`, `_03_empUbic`, `_04_dirUbic`, `_05_pobUbic`, `_06_cpUbic`, `_07_provUbic`, `_08_latUbic`, `_09_longUbic`, `_10_altUbic`, `_11_contUbic`, `_12_emailUbic`, `_13_telUbic`, `_14_mobUbic`, `_15_datAltaUbic`, `_16_datModUbic`, `_17_datBaixaUbic`) VALUES ('1', '10', 'astic,sa', 'santa anna,23', 'sabadell', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_pk_idMaqUbic`, `_03_empUbic`, `_04_dirUbic`, `_05_pobUbic`, `_06_cpUbic`, `_07_provUbic`, `_08_latUbic`, `_09_longUbic`, `_10_altUbic`, `_11_contUbic`, `_12_emailUbic`, `_13_telUbic`, `_14_mobUbic`, `_15_datAltaUbic`, `_16_datModUbic`, `_17_datBaixaUbic`) VALUES ('2', '20', 'astic,sa', 'santa anna,23', 'sabadell', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_pk_idMaqUbic`, `_03_empUbic`, `_04_dirUbic`, `_05_pobUbic`, `_06_cpUbic`, `_07_provUbic`, `_08_latUbic`, `_09_longUbic`, `_10_altUbic`, `_11_contUbic`, `_12_emailUbic`, `_13_telUbic`, `_14_mobUbic`, `_15_datAltaUbic`, `_16_datModUbic`, `_17_datBaixaUbic`) VALUES ('3', '30', 'fermol,sl', 'robert,2', 'barcelona', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_pk_idMaqUbic`, `_03_empUbic`, `_04_dirUbic`, `_05_pobUbic`, `_06_cpUbic`, `_07_provUbic`, `_08_latUbic`, `_09_longUbic`, `_10_altUbic`, `_11_contUbic`, `_12_emailUbic`, `_13_telUbic`, `_14_mobUbic`, `_15_datAltaUbic`, `_16_datModUbic`, `_17_datBaixaUbic`) VALUES ('4', '40', 'fermol,sl', 'robert,2', 'barcelona', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_pk_idMaqUbic`, `_03_empUbic`, `_04_dirUbic`, `_05_pobUbic`, `_06_cpUbic`, `_07_provUbic`, `_08_latUbic`, `_09_longUbic`, `_10_altUbic`, `_11_contUbic`, `_12_emailUbic`, `_13_telUbic`, `_14_mobUbic`, `_15_datAltaUbic`, `_16_datModUbic`, `_17_datBaixaUbic`) VALUES ('5', '50', 'iol,sa', 'londres,90', 'mollet', NULL, 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`maqInstall`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('10', '100');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('10', '101');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('10', '102');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('20', '102');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('20', '103');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('20', '104');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('30', '101');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('30', '103');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('40', '100');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('40', '101');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('40', '102');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('40', '103');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('40', '104');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('50', '103');
INSERT INTO `u555588791_pinba`.`maqInstall` (`_01_pk_idMaqInst`, `_02_pk_idJocInst`) VALUES ('50', '104');

COMMIT;
