SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `u555588791_pinba` ;
CREATE SCHEMA IF NOT EXISTS `u555588791_pinba` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `u555588791_pinba` ;

-- -----------------------------------------------------
-- Table `u555588791_pinba`.`usuari`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`usuari` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`usuari` (
  `_01_pk_idUsuari` INT NOT NULL AUTO_INCREMENT ,
  `_02_nomUsuari` VARCHAR(45) NOT NULL ,
  `_03_cognomUsuari` VARCHAR(45) NOT NULL ,
  `_04_loginUsuari` VARCHAR(45) NOT NULL ,
  `_05_pwdUsuari` VARCHAR(45) NOT NULL ,
  `_06_emailUsuari` VARCHAR(45) NOT NULL ,
  `_07_fotoUsuari` VARCHAR(45) NULL ,
  `_08_datAltaUsuari` DATETIME NULL ,
  `_09_datModUsuari` DATETIME NULL ,
  `_10_datBaixaUsuari` DATETIME NULL ,
  `_11_activacioUsuari` VARCHAR(32) NOT NULL ,
  `_12_estatUsuari` TINYINT(1)  NOT NULL ,
  PRIMARY KEY (`_01_pk_idUsuari`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`admin` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`admin` (
  `_00_pk_idAdm_auto` INT NOT NULL AUTO_INCREMENT ,
  `_01_pk_idAdm` INT NOT NULL ,
  `_02_faceAdm` VARCHAR(255) NULL ,
  `_03_twitterAdm` VARCHAR(255) NULL ,
  `_04_datAltaAdm` DATETIME NULL ,
  `_05_datModAdm` DATETIME NULL ,
  `_06_datBaixaAdm` DATETIME NULL ,
  PRIMARY KEY (`_00_pk_idAdm_auto`, `_01_pk_idAdm`) ,
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
  `_00_pk_idJug_auto` INT NOT NULL AUTO_INCREMENT ,
  `_01_pk_idJug` INT NOT NULL ,
  `_02_faceJug` VARCHAR(255) NULL ,
  `_03_twitterJug` VARCHAR(255) NULL ,
  `_04_datAltaJug` DATETIME NULL ,
  `_05_datModJug` DATETIME NULL ,
  `_06_datBaixaJug` DATETIME NULL ,
  PRIMARY KEY (`_00_pk_idJug_auto`, `_01_pk_idJug`) ,
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
  `_01_pk_idJoc` INT NOT NULL AUTO_INCREMENT ,
  `_02_nomJoc` VARCHAR(45) NULL ,
  `_03_descJoc` MEDIUMTEXT NULL ,
  `_04_imgJoc` VARCHAR(45) NULL ,
  `_05_numPartidesJugadesJoc` INT NULL ,
  `_06_datAltaJoc` DATETIME NULL ,
  `_07_datModJoc` DATETIME NULL ,
  `_08_datBaixaJoc` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idJoc`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`torneig`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`torneig` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`torneig` (
  `_01_pk_idTorn` INT NOT NULL AUTO_INCREMENT ,
  `_02_pk_idJocTorn` INT NOT NULL ,
  `_03_nomTorn` VARCHAR(45) NULL ,
  `_04_premiTorn` DECIMAL(10) NULL ,
  `_05_datIniTorn` DATE NULL ,
  `_06_datFinTorn` DATE NULL ,
  `_07_datAltaTorn` DATETIME NULL ,
  `_08_datModTorn` DATETIME NULL ,
  `_09_datBaixaTorn` DATETIME NULL ,
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
  `_00_pk_idInsc_auto` INT NOT NULL AUTO_INCREMENT ,
  `_01_pk_idTornInsc` INT NOT NULL ,
  `_02_pk_idJocInsc` INT NOT NULL ,
  `_03_pk_idJugInsc` INT NOT NULL ,
  `_04_datAltaInsc` DATETIME NULL ,
  `_05_datModInsc` DATETIME NULL ,
  `_06_datBaixaInsc` DATETIME NULL ,
  PRIMARY KEY (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`) ,
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
  `_01_pk_idMaq` INT NOT NULL AUTO_INCREMENT ,
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
  `_01_pk_idUbic` INT NOT NULL AUTO_INCREMENT ,
  `_02_empUbic` VARCHAR(45) NULL ,
  `_03_dirUbic` VARCHAR(45) NULL ,
  `_04_pobUbic` VARCHAR(45) NULL ,
  `_05_cpUbic` VARCHAR(8) NULL ,
  `_06_provUbic` VARCHAR(45) NULL ,
  `_07_latUbic` VARCHAR(5) NULL ,
  `_08_longUbic` VARCHAR(5) NULL ,
  `_09_altUbic` VARCHAR(5) NULL ,
  `_10_contUbic` VARCHAR(45) NULL ,
  `_11_emailUbic` VARCHAR(45) NULL ,
  `_12_telUbic` VARCHAR(15) NULL ,
  `_13_mobUbic` VARCHAR(15) NULL ,
  `_14_datAltaUbic` DATETIME NULL ,
  `_15_datModUbic` DATETIME NULL ,
  `_16_datBaixaUbic` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idUbic`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`ronda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`ronda` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`ronda` (
  `_01_pk_idMaqRonda` INT NOT NULL ,
  `_02_pk_idJocRonda` INT NOT NULL ,
  `_03_pk_idJugRonda` INT NOT NULL ,
  `_04_pk_idDatHoraPartRonda` DATETIME NOT NULL ,
  `_05_pk_idRonda` INT NOT NULL ,
  `_06_fotoJugRonda` VARCHAR(45) NULL ,
  `_07_puntsRonda` VARCHAR(45) NULL ,
  `_08_datModRonda` DATETIME NULL ,
  `_09_datBaixaRonda` DATETIME NULL ,
  PRIMARY KEY (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`maqInstall`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`maqInstall` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`maqInstall` (
  `_00_pk_idMaqInst_auto` INT NOT NULL AUTO_INCREMENT ,
  `_01_pk_idMaqInst` INT NOT NULL ,
  `_02_pk_idJocInst` INT NOT NULL ,
  `_03_numPartidesJugadesMaqInst` INT NULL ,
  `_04_credJocMaqInst` INT NULL ,
  `_05_totCredJocMaqInst` INT NULL ,
  `_06_datAltaMaqInst` DATETIME NULL ,
  `_07_datModMaqInst` DATETIME NULL ,
  `_08_datBaixaMaqInst` DATETIME NULL ,
  PRIMARY KEY (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`) ,
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
  `_00_pk_idPart_auto` INT NOT NULL AUTO_INCREMENT ,
  `_01_pk_idMaqPart` INT NOT NULL ,
  `_02_pk_idJocPart` INT NOT NULL ,
  `_03_pk_idJugPart` INT NOT NULL ,
  `_04_pk_idDatHoraPart` DATETIME NOT NULL ,
  `_05_datModPart` DATETIME NULL ,
  `_06_datBaixaPart` DATETIME NULL ,
  PRIMARY KEY (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`) ,
  INDEX `partida_2_ronda` (`_01_pk_idMaqPart` ASC, `_02_pk_idJocPart` ASC, `_03_pk_idJugPart` ASC, `_04_pk_idDatHoraPart` ASC) ,
  INDEX `partida_2_maquina` (`_01_pk_idMaqPart` ASC) ,
  INDEX `partida_2_joc` (`_02_pk_idJocPart` ASC) ,
  INDEX `partida_2_jugador` (`_03_pk_idJugPart` ASC) ,
  CONSTRAINT `partida_2_ronda`
    FOREIGN KEY (`_01_pk_idMaqPart` , `_02_pk_idJocPart` , `_03_pk_idJugPart` , `_04_pk_idDatHoraPart` )
    REFERENCES `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda` , `_02_pk_idJocRonda` , `_03_pk_idJugRonda` , `_04_pk_idDatHoraPartRonda` )
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
  `_00_pk_idTTP_auto` INT NOT NULL AUTO_INCREMENT ,
  `_01_pk_idTornTTP` INT NOT NULL ,
  `_02_pk_idMaqTTP` INT NOT NULL ,
  `_03_pk_idJocTTP` INT NOT NULL ,
  `_04_pk_idJugTTP` INT NOT NULL ,
  PRIMARY KEY (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) ,
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


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`productes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`productes` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`productes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(45) NULL ,
  `descripcio` MEDIUMTEXT NULL ,
  `preu` FLOAT NULL ,
  `foto` VARCHAR(45) NULL ,
  `datAltaPro` DATETIME NULL ,
  `datModPro` DATETIME NULL ,
  `datBaixaPro` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`ubicacioTeMaquina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`ubicacioTeMaquina` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`ubicacioTeMaquina` (
  `_00_pk_idUTM_auto` INT NOT NULL AUTO_INCREMENT ,
  `_01_pk_idUbicUTM` INT NOT NULL ,
  `_02_pk_idMaqUTM` INT NOT NULL ,
  `_03_datAltaUTM` DATETIME NULL ,
  `_04_datModUTM` DATETIME NULL ,
  `_05_datBaixaUTM` DATETIME NULL ,
  PRIMARY KEY (`_00_pk_idUTM_auto`, `_01_pk_idUbicUTM`, `_02_pk_idMaqUTM`) ,
  INDEX `fk_ubicacio_has_maquina1_maquina1` (`_02_pk_idMaqUTM` ASC) ,
  CONSTRAINT `fk_ubicacio_has_maquina1_ubicacio1`
    FOREIGN KEY (`_01_pk_idUbicUTM` )
    REFERENCES `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ubicacio_has_maquina1_maquina1`
    FOREIGN KEY (`_02_pk_idMaqUTM` )
    REFERENCES `u555588791_pinba`.`maquina` (`_01_pk_idMaq` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u555588791_pinba`.`ronda1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u555588791_pinba`.`ronda1` ;

CREATE  TABLE IF NOT EXISTS `u555588791_pinba`.`ronda1` (
  `_00_pk_idRonda_auto` INT NOT NULL AUTO_INCREMENT ,
  `_01_pk_idPartRonda` INT NOT NULL ,
  `_05_pk_idRonda` INT NOT NULL ,
  `_06_fotoJugRonda` VARCHAR(45) NULL ,
  `_07_puntsRonda` VARCHAR(45) NULL ,
  `_08_datModRonda` DATETIME NULL ,
  `_09_datBaixaRonda` DATETIME NULL ,
  PRIMARY KEY (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`) ,
  INDEX `aa` (`_01_pk_idPartRonda` ASC) ,
  CONSTRAINT `aa`
    FOREIGN KEY (`_01_pk_idPartRonda` )
    REFERENCES `u555588791_pinba`.`partida` (`_00_pk_idPart_auto` )
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
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`, `_11_activacioUsuari`, `_12_estatUsuari`) VALUES ('2', 'joan', 'salas', 'joan', 'joan', 'jsalas@gmail.com', NULL, '2014-05-13', NULL, NULL, '1', 0);
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`, `_11_activacioUsuari`, `_12_estatUsuari`) VALUES ('3', 'josep', 'puig', 'josep', 'josep', 'jpuig@gmail.com', NULL, '2014-05-13', NULL, NULL, '1', 0);
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`, `_11_activacioUsuari`, `_12_estatUsuari`) VALUES ('4', 'miquel', 'roca', 'miquel', 'miquel', 'mroca@gmail.com', NULL, '2014-05-13', NULL, NULL, '1', 0);
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`, `_11_activacioUsuari`, `_12_estatUsuari`) VALUES ('5', 'rob', 'lopez', 'rob', 'rob', 'rob@gmail.com', NULL, '2014-05-13', NULL, NULL, '1', 0);
INSERT INTO `u555588791_pinba`.`usuari` (`_01_pk_idUsuari`, `_02_nomUsuari`, `_03_cognomUsuari`, `_04_loginUsuari`, `_05_pwdUsuari`, `_06_emailUsuari`, `_07_fotoUsuari`, `_08_datAltaUsuari`, `_09_datModUsuari`, `_10_datBaixaUsuari`, `_11_activacioUsuari`, `_12_estatUsuari`) VALUES ('1', 'admin', 'admin', 'admin', 'admin', 'admadm@gmail.com', NULL, '2014-06-15', NULL, NULL, '1', 0);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`admin`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`admin` (`_00_pk_idAdm_auto`, `_01_pk_idAdm`, `_02_faceAdm`, `_03_twitterAdm`, `_04_datAltaAdm`, `_05_datModAdm`, `_06_datBaixaAdm`) VALUES ('1', '1', NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`jugador`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`jugador` (`_00_pk_idJug_auto`, `_01_pk_idJug`, `_02_faceJug`, `_03_twitterJug`, `_04_datAltaJug`, `_05_datModJug`, `_06_datBaixaJug`) VALUES ('1', '2', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`jugador` (`_00_pk_idJug_auto`, `_01_pk_idJug`, `_02_faceJug`, `_03_twitterJug`, `_04_datAltaJug`, `_05_datModJug`, `_06_datBaixaJug`) VALUES ('2', '3', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`jugador` (`_00_pk_idJug_auto`, `_01_pk_idJug`, `_02_faceJug`, `_03_twitterJug`, `_04_datAltaJug`, `_05_datModJug`, `_06_datBaixaJug`) VALUES ('3', '4', NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`jugador` (`_00_pk_idJug_auto`, `_01_pk_idJug`, `_02_faceJug`, `_03_twitterJug`, `_04_datAltaJug`, `_05_datModJug`, `_06_datBaixaJug`) VALUES ('4', '5', NULL, NULL, '2014-06-15', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`joc`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('100', 'ARMAGEDON', 'El Gobierno estaba probando una nueva tecnología para los viajes espaciales, el sistema es inestable y....... !!!! ESTAN ABRIENDO PUERTAS QUE JAMAS DEBERIAN HABER SIDO ABIERTAS ¡¡¡. Además parece ser las Fuerzas Extraterrestres están interesados en esta tecnología también. Menos mal que ,los componentes de la Resistencia solucionán todos los problemas .....y detendrán los lios generados por los gobernantes.\nTendras que:\nCERRAR las puertas del cementerio, antes que los zombies alcancen la ciudad.\nDestruir la SONDA OVNI que está desplegando ROBOTS.\nEntrar en la planta nuclear Y DETENER LA FUGA DE RIESGO BIOLOGICO.\nDestruir LA PUERTA NEGRA con dos potentes bombas.\nLas vacas están siendo ADDUCIDAS, sálvalas y los granjeros te ayudaran.\nCIERRA todas las fugas DEL NUCLEO Yy la ciudad te dara un MEDI-KIT ( KIT MEDICO).\nDestruye OVNIS para conseguir sus armas o completa el BUMPER GIRATORIO.\n', 'armagedon.jpg', '2', '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('101', 'CARS & GIRLS', 'Tu MEJOR AMIGO HACE HACE LA despedida de soltero es este fin de semana. sólo A 1000 MILLAS de distancia y TU NO TE LO QUEIRES PERDER.\nasí que TOMA tu viejo camión y mantener el acelerador a fondo.\nEl viaje:\nEl túnel: acceso directo a través del túnel para obtener 200 millas.\nEl paso: completar para obtener OTRAS 200 MILLAS.\nCallejón sin salida: salir de allí con acceso directo de 200 millas.\nEl combustible:\nEn la Gasolinera conseguir 2 tanques de combustible para evitar la falta de gas.\nLas chicas:\nSUBIR A LAS CHICAS AL COCHE COMPLETANDO LAS DIANAS \"LOVE TRUCK\".\nPROMETISTE llevar cuatro niñas a la fiesta.\nEl garaje:\nGaraje-thornes estará disponible cuando SE ESTROPEE el motor.\nLa Policía:\nTenga cuidado con los radares y los bloqueos de carreteras.\nSi se rompen todos los BLOQUEOS DE CARRETERA se consigue una multa .\nCon tres MULTAS ESTARAS FUERA DE LA LEY, PEREPARATE.\nSpeed:\nACELERA PARA CONSEGUIR MAS VELOCIDAD .\nCuanto más rápido vayas, más rápido se llega a la fiesta.\nConseguir \"COMBOS NITRO \" para una dosis de locura de la aceleración.\n!!!!!BUEN VIAJE ¡¡¡¡¡.\n', 'cars&girls.jpg', '12', '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('102', 'TIME MACHINE', 'La maquina del tiempo esta lista para ser usada, pero un problema elctrico hace que los viajes en el tiempo no accedan a la fecha seleccionada….COMIENZA La aventura.\nSelecciona el objetivo “weird”  encenciendo  las luces de los pasillos de la parte superior.\nDesactiva las palancas  “time” situadas  en la parte media izquierda para desbloquear el pasillo sin salida y atrapar bolas para el multiball.\nMultiball se ejecuta cuando todas las luces de bonus estan iluminandas.\nDesactiva las palancas “explore” situadas ern la parte central derecha  para incrementar tiempo de extra bonus dirante el descuento del reloj.\nHaz que la bola pase por los pasillos “add bonus iluminados” hasta completar el mensaje  bajo el reloj “ time machine ” para incrementar puntuacion de bonus.\nGolpear con la bola las dianas que se encuentra a la derecha y a la izquierda del “ portal temporal humeante”.\nPara ir incrementando el bounus de la puerta  1000, 10.000, 50.000 y  lit special 100.000. Despues introducir la bola en la base de la puerta para visualizar un personaje de la epoca o dimension  en la que estamos actuamente y sumando los bonus acumulados.\n', 'time_machine.jpg', '0', '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('103', 'LUCKY FIRE', 'Cartas (dianas abatibles): eliminar todas las cartas para abrir el casino.\nCasino: para ganar bola extra o para activar el multiplicador.\nMultiplicador campo de juego: multiplica todos los puntajes de 2, 3 o 5 durante 10 segundos\nBumper\'s: aumenta la puntuacion .\nRevolver (dianas abatibles): elimina las dianas de las gun pabrir el banco y aumentar los puntos.\nRecompensa: pasar por las rampas y eliminar las dianas del sheriff para incrementar el valor de la recompensa,\nPasar por la rampa horseshoe para escribir la siguiente letra de recompensa.\nBanco: recoges el el valor de lods bonus guardados o la recompensa del jackpot.\nAgua ramp: activa el letreo de la palabra \"engine\" .\nRodeo: incrementa los puntos del rodeo y enciende las luces de la palabra \"engine\", abre el tunel para la\nLocomotora express ,cuando la palabra \"engine\"esta encendida .\nTúnel: consigues el bonus de la recompensa y el multiplicador del bonus ,o enciende la bola extra cuando se entra.\nJuega a juego de la locomotora (en dmd) si la palabra \"engine esta encendida.\nBala: recoge puntuacion del bonus.\nGoldrush: enciende todas las letras del lingote de oro para activar el modo goldrush, las letras se encienden\nPasando por la rampa de agua, el rodeo, el banco y las cartas. Todas las rampas y las dianas del banco incremeta\nEl valor de \"goldrush\".\nHerradura: deletrea la siguiente letra de la recompensa \"reward\", activa el \"goldrush\" y da valor al multiball.\nOutlaw: abre la mina para recoger las letras \"tnt\".\nMina y la cárcel: deletrean la siguiente letra de \"tnt\" ilumina tosdas las letras para comenzar el multiball.\nSidelanes:\"pasillos laterales\" bola extra cuando esta encendido.\nDuelo nocturno premio: una puntuacion establecida activa el duelo. \n\n', 'lucky_fire.jpg', '0', '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('104', 'PACMAN', 'El objetivo del juego es controlar nuestro personaje a través de un laberinto mientras él va comiendo puntos. Cuando todos los puntos son comidos se pasa al siguiente nivel.\nPulsa en \"Start Game\" para iniciar el juego, mueves con las teclas de flechas del teclado, con la tecla M, apagas el sonido, con P, pausas el juego y Q hace que lo abandones. Existen cuatro fantasmas que recorren el laberinto e intentan atraparnos. Si algún fantasma llegase a tocarnos perdemos una vida. Inicialmente tenemos tres vidas, cuando se han perdido todas las vidas el juego terminará. Cerca de las esquinas del laberinto hay cuatro galletas de superpoder, cuando las comemos, nos volvemos más fuertes, los fantasmas no podrán tocarnos, girarán en dirección opuesta a dónde estamos y se moverán más lentamente, de hecho, si ellos nos tocan, los enviaremos temporalmente a un espacio cerrado en el centro del laberinto y obtendremos puntos por ello. \nTambién podemos obtener bonos en forma de fruta cerca del centro del laberinto. Cuando logramos comer estas frutas obtenemos puntos extra.\n', 'pacman.jpg', '0', '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`torneig`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1000', '100', 'fifa 2014', '100', '2014-05-13', '2014-07-30', '2014-05-13 10:11:12', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1001', '101', 'arcade 2014', '200', '2014-05-14', '2014-07-14', '2014-05-13 10:11:12', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1002', '102', 'web 2014', '300', '2014-05-15', '2014-06-30', '2014-05-13 10:11:12', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1003', '103', 'castles 2014', '400', '2014-05-16', '2014-06-30', '2014-05-13 10:11:12', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1004', '104', 'webapp 2014', '500', '2014-05-17', '2014-07-30', '2014-05-13 10:11:12', NULL, NULL);
INSERT INTO `u555588791_pinba`.`torneig` (`_01_pk_idTorn`, `_02_pk_idJocTorn`, `_03_nomTorn`, `_04_premiTorn`, `_05_datIniTorn`, `_06_datFinTorn`, `_07_datAltaTorn`, `_08_datModTorn`, `_09_datBaixaTorn`) VALUES ('1005', '100', 'mytorn 2014', '600', '2014-05-18', '2014-07-13', '2014-05-13 10:11:12', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`inscrit`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('1', '1000', '100', '2', '2014-06-15 10:10:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('2', '1001', '101', '3', '2014-06-15 10:10:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('3', '1002', '102', '4', '2014-06-15 10:10:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('4', '1003', '103', '2', '2014-06-15 10:10:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('5', '1004', '104', '3', '2014-06-15 10:10:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('6', '1005', '100', '2', '2014-06-15 10:10:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('7', '1001', '101', '2', '2014-06-15 10:10:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('8', '1001', '101', '4', '2014-06-15 10:10:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`inscrit` (`_00_pk_idInsc_auto`, `_01_pk_idTornInsc`, `_02_pk_idJocInsc`, `_03_pk_idJugInsc`, `_04_datAltaInsc`, `_05_datModInsc`, `_06_datBaixaInsc`) VALUES ('9', '1001', '101', '5', '2014-06-15 10:10:10', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`maquina`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('10', '12:FF:RT:3E:4R:55', 'josep guijosa', '100', '1200', '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('20', '3E:00:00:3E:R4', 'josep guijosa', '200', '1500', '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('30', '45:RT:HY:E3:Q1', 'joan farres', '300', '10200', '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('40', 'GH:00:87:5T:OP', 'joan farres', '400', '5400', '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`maquina` (`_01_pk_idMaq`, `_02_macMaq`, `_03_propMaq`, `_04_credMaq`, `_05_totCredMaq`, `_06_datAltaMaq`, `_07_datModMaq`, `_08_datBaixaMaq`) VALUES ('50', 'SD:34:00:12:4D', 'miquel farres', '500', '3200', '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`ubicacio`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_empUbic`, `_03_dirUbic`, `_04_pobUbic`, `_05_cpUbic`, `_06_provUbic`, `_07_latUbic`, `_08_longUbic`, `_09_altUbic`, `_10_contUbic`, `_11_emailUbic`, `_12_telUbic`, `_13_mobUbic`, `_14_datAltaUbic`, `_15_datModUbic`, `_16_datBaixaUbic`) VALUES ('1', 'astic,sa', 'santa anna,23', 'sabadell', '08201', 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_empUbic`, `_03_dirUbic`, `_04_pobUbic`, `_05_cpUbic`, `_06_provUbic`, `_07_latUbic`, `_08_longUbic`, `_09_altUbic`, `_10_contUbic`, `_11_emailUbic`, `_12_telUbic`, `_13_mobUbic`, `_14_datAltaUbic`, `_15_datModUbic`, `_16_datBaixaUbic`) VALUES ('2', 'kormel,sa', 'paris,23', 'terrassa', '08301', 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_empUbic`, `_03_dirUbic`, `_04_pobUbic`, `_05_cpUbic`, `_06_provUbic`, `_07_latUbic`, `_08_longUbic`, `_09_altUbic`, `_10_contUbic`, `_11_emailUbic`, `_12_telUbic`, `_13_mobUbic`, `_14_datAltaUbic`, `_15_datModUbic`, `_16_datBaixaUbic`) VALUES ('3', 'fermol,sl', 'robert,2', 'barcelona', '08081', 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_empUbic`, `_03_dirUbic`, `_04_pobUbic`, `_05_cpUbic`, `_06_provUbic`, `_07_latUbic`, `_08_longUbic`, `_09_altUbic`, `_10_contUbic`, `_11_emailUbic`, `_12_telUbic`, `_13_mobUbic`, `_14_datAltaUbic`, `_15_datModUbic`, `_16_datBaixaUbic`) VALUES ('4', 'aisol,sl', 'lliure,2', 'barcelona', '08181', 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacio` (`_01_pk_idUbic`, `_02_empUbic`, `_03_dirUbic`, `_04_pobUbic`, `_05_cpUbic`, `_06_provUbic`, `_07_latUbic`, `_08_longUbic`, `_09_altUbic`, `_10_contUbic`, `_11_emailUbic`, `_12_telUbic`, `_13_mobUbic`, `_14_datAltaUbic`, `_15_datModUbic`, `_16_datBaixaUbic`) VALUES ('5', 'iol,sa', 'londres,90', 'mollet', '08456', 'barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-13', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`ronda`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '2', '2014-06-15 14:00:10', '1', NULL, '10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '2', '2014-06-15 14:00:10', '2', NULL, '20', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '2', '2014-06-15 14:00:10', '3', NULL, '30', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '3', '2014-06-15 14:00:10', '1', NULL, '400', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '3', '2014-06-15 14:00:10', '2', NULL, '500', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '3', '2014-06-15 14:00:10', '3', NULL, '60', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '4', '2014-06-15 14:00:10', '1', NULL, '5', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '4', '2014-06-15 14:00:10', '2', NULL, '10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '4', '2014-06-15 14:00:10', '3', NULL, '15', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '5', '2014-06-15 14:00:10', '1', NULL, '20', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '5', '2014-06-15 14:00:10', '2', NULL, '25', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '101', '5', '2014-06-15 14:00:10', '3', NULL, '30', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '2', '2014-06-15 14:00:10', '1', NULL, '10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '2', '2014-06-15 14:00:10', '2', NULL, '20', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '2', '2014-06-15 14:00:10', '3', NULL, '30', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '3', '2014-06-15 14:00:10', '1', NULL, '40', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '3', '2014-06-15 14:00:10', '2', NULL, '50', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '3', '2014-06-15 14:00:10', '3', NULL, '60', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '4', '2014-06-15 14:00:10', '1', NULL, '70', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '4', '2014-06-15 14:00:10', '2', NULL, '80', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '4', '2014-06-15 14:00:10', '3', NULL, '90', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '5', '2014-06-15 14:00:10', '1', NULL, '100', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '5', '2014-06-15 14:00:10', '2', NULL, '110', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '101', '5', '2014-06-15 14:00:10', '3', NULL, '120', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '2', '2014-06-15 14:00:10', '1', NULL, '130', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '2', '2014-06-15 14:00:10', '2', NULL, '140', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '2', '2014-06-15 14:00:10', '3', NULL, '150', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '3', '2014-06-15 14:00:10', '1', NULL, '160', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '3', '2014-06-15 14:00:10', '2', NULL, '170', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '3', '2014-06-15 14:00:10', '3', NULL, '180', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '4', '2014-06-15 14:00:10', '1', NULL, '190', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '4', '2014-06-15 14:00:10', '2', NULL, '200', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '4', '2014-06-15 14:00:10', '3', NULL, '210', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '5', '2014-06-15 14:00:10', '1', NULL, '220', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '5', '2014-06-15 14:00:10', '2', NULL, '230', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '101', '5', '2014-06-15 14:00:10', '3', NULL, '240', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '100', '2', '2014-06-15 14:00:10', '1', NULL, '10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '100', '2', '2014-06-15 14:00:10', '2', NULL, '90', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '100', '2', '2014-06-15 14:00:10', '3', NULL, '200', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '100', '2', '2014-06-15 14:00:10', '1', NULL, '80', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '100', '2', '2014-06-15 14:00:10', '2', NULL, '20', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda` (`_01_pk_idMaqRonda`, `_02_pk_idJocRonda`, `_03_pk_idJugRonda`, `_04_pk_idDatHoraPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '100', '2', '2014-06-15 14:00:10', '3', NULL, '30', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`maqInstall`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('1', '10', '100', '1', '100', '300', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('2', '10', '101', '2', '100', '800', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('3', '10', '102', '0', '100', '100', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('4', '20', '102', '0', '200', '400', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('5', '20', '103', '0', '200', '900', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('6', '20', '104', '0', '200', '200', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('7', '30', '101', '6', '1000', '8200', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('8', '30', '103', '0', '2000', '2000', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('9', '40', '100', '1', '200', '1000', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('10', '40', '101', '4', '300', '400', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('11', '40', '102', '0', '400', '2000', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('12', '40', '103', '0', '500', '600', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('13', '40', '104', '0', '600', '1400', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('14', '50', '103', '0', '2000', '1200', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`maqInstall` (`_00_pk_idMaqInst_auto`, `_01_pk_idMaqInst`, `_02_pk_idJocInst`, `_03_numPartidesJugadesMaqInst`, `_04_credJocMaqInst`, `_05_totCredJocMaqInst`, `_06_datAltaMaqInst`, `_07_datModMaqInst`, `_08_datBaixaMaqInst`) VALUES ('15', '50', '104', '0', '1000', '2000', NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`partida`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('1', '10', '101', '2', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('2', '10', '101', '3', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('3', '10', '101', '4', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('4', '10', '101', '5', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('5', '30', '101', '2', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('6', '30', '101', '3', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('7', '30', '101', '4', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('8', '30', '101', '5', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('9', '40', '101', '2', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('10', '40', '101', '3', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('11', '40', '101', '4', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('12', '40', '101', '5', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('13', '10', '100', '2', '2014-06-15 14:00:10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`partida` (`_00_pk_idPart_auto`, `_01_pk_idMaqPart`, `_02_pk_idJocPart`, `_03_pk_idJugPart`, `_04_pk_idDatHoraPart`, `_05_datModPart`, `_06_datBaixaPart`) VALUES ('14', '40', '100', '2', '2014-06-15 14:00:10', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`torneigTePartida`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('1', '1001', '10', '101', '2');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('2', '1001', '10', '101', '3');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('3', '1001', '10', '101', '4');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('4', '1001', '10', '101', '5');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('5', '1001', '30', '101', '2');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('6', '1001', '30', '101', '3');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('7', '1001', '30', '101', '4');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('8', '1001', '30', '101', '5');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('9', '1001', '40', '101', '2');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('10', '1001', '40', '101', '3');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('11', '1001', '40', '101', '4');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('12', '1001', '40', '101', '5');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('13', '1000', '10', '100', '2');
INSERT INTO `u555588791_pinba`.`torneigTePartida` (`_00_pk_idTTP_auto`, `_01_pk_idTornTTP`, `_02_pk_idMaqTTP`, `_03_pk_idJocTTP`, `_04_pk_idJugTTP`) VALUES ('14', '1000', '40', '100', '2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`productes`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('1', 'BINGO ELECTRONICO', 'Tecnología avanzada.</br><em>Microprocesador Coldfire 5206e</em></br>Cartones con iluminación LED de luz blanca Multicromática.</br>Comunicación serial entre todos los elementos que componen el Kit.</br>Sistema de lectura de \"Holes\" inteligente ( para evitar manipulación externa).</br>Control de selector electrónico, aceptador de billetes,  llaves de pago y cobro. Totalizadores electromecánicos y electrónicos.</br>Hopper. Bolas antimagnéticas. Varios idiomas. Amplia configuración adaptable a holomologaciones del país. Posibilidad de LINK con  acumulativo inalámbrico. Tutorial de juego en luces y display alfanumérico.</br>Bonus para cartón individual, SuperBonus para cartón individual, Numero Mágico, premio 4 esquinas, premio DIAGONAL, premio Súper línea, 6ª 7ª y 8ª bolas extras, multiplicadores de cartones Individuales.</br><b>Personalización de serigrafía y gráficos tanto en tablero como en Frontal.</b>', '235', 'bingo.jpg', '2014-05-16', NULL, NULL);
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('2', 'KIT DE DIANA ZONE DART', 'Amplia gama de juegos:</br>180 – simple-double in-double out-double in/out-master out</br>301 – simple-double in-double out-double in/out-master out</br>501 – simple-double in-double out-double in/out-master out</br>701 – simple-double in-double out-double in/out-master out</br>901 – simple-double in-double out-double in/out-master out</br>301 KILLER – simple-double in-double out-double in/out-master out</br>CRICKEt – simple-no score-cutthroat-master-crazy-wild and crazy</br>HI SCORE</br>LOW SCORE</br>ROULETTE</br>SHANGHAI</br></br>Opciones :</br></br>EQUAL</br>HANDICAP</br>TEAM</br>EQUAL TEAM</br>EQUAL HANDICAP</br></br></br>Selección de Bull 25/50 , 50/50, Happy Hour programable.</br>Amplia configuración. Selección intuitiva de juegos. Muestra del resultado final de la partida por clasificación, handicap, PPD. Hazañas. Varios idiomas. Sonidos indicadores de eventos. Selector electrónico de monedas, selector de billetes, interface de sensor de dardos inteligente. </br></br></br>', '235', 'diana.jpg', '2014-05-16', NULL, NULL);
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('3', 'ROULETTE', 'Rouleta electrónica</br>Triple ruleta electrónica de luces con visualizador de apuestas individual por número.</br>Display informativo LCD, 4 apuestas fijas, turbo, refill, pago manual, contabilidad en totalizadores Mecánicos y electrónicos, 2 hoppers, selector de caída directa, selector de billetes, activación directa a cajón, amplia configuración, reserva de contabilidad encriptada, caducidad del juego por tiempo, atractivos sonidos.', '235', 'roulette.jpg', '2014-05-16', NULL, NULL);
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('4', 'COMMA6-A', '<p>Estándar para gaming en Italia.</p></br><p>Cumpliendo los requisitos de</br>homologación que se requieren para el hardware. Dos tampers</br>para detección de apertura de las cajas que protegen placa contra manipulación.  Protocolo de comunicación con Monopolio de Estado. Soporte de tarjeta en la parte inferior. Gráficos y sonido en SD-CARD. Programa Embebido en microcontrolador, etc.</p></br>', '235', 'comma6a.jpg', '2014-05-16', NULL, NULL);
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('5', 'STANDARD GAMES', '<p>Placa integral de vídeo de alta resolución, gran velocidad y prestaciones adaptables para cualquier tipo de necesidad, adaptable a cualquier  sistema que necesite un Terminal de vídeo para comunicarse con el usuario gráficamente.</p></br><p>Microcontrolador hitachi h8/2329 , 384 kbytes de flash interna y 32 kbytes de ram interna, 25mhz. El micro dispone de dos DAC con los que se puede generar sonido de alta calidad  (22 ks/s) para   poder realizar orientaciones verbales, acústicas o musicales.</br>1 ADC de 2 entradas.  (Papa poder sensar todas las alimentaciones y mostrarlas en la pantalla de monitor )</br>SD-Card  4 BITS   para almacenamiento de todos los gráficos (128 megas) y sonidos  ilimitados.</br>Ram estática ferrítica  4 mega bits , para gestion de clases en el montaje del video y con retención de datos.</br>Control de  periféricos integrados por ecuación en cpld, (incluido el tiempo de  NMI ).</br>Protección anticopy . Periféricos , antisparck y  DAC para el control del volumen hasta  256 niveles Lógicos</br>Tensión de alimentación desde 8 a 45Volt. Regulador en placa a 3.3Volt.', '235', 'standar_games.jpg', '2014-05-16', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`ubicacioTeMaquina`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`ubicacioTeMaquina` (`_00_pk_idUTM_auto`, `_01_pk_idUbicUTM`, `_02_pk_idMaqUTM`, `_03_datAltaUTM`, `_04_datModUTM`, `_05_datBaixaUTM`) VALUES ('1', '1', '10', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacioTeMaquina` (`_00_pk_idUTM_auto`, `_01_pk_idUbicUTM`, `_02_pk_idMaqUTM`, `_03_datAltaUTM`, `_04_datModUTM`, `_05_datBaixaUTM`) VALUES ('2', '2', '20', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacioTeMaquina` (`_00_pk_idUTM_auto`, `_01_pk_idUbicUTM`, `_02_pk_idMaqUTM`, `_03_datAltaUTM`, `_04_datModUTM`, `_05_datBaixaUTM`) VALUES ('3', '3', '30', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacioTeMaquina` (`_00_pk_idUTM_auto`, `_01_pk_idUbicUTM`, `_02_pk_idMaqUTM`, `_03_datAltaUTM`, `_04_datModUTM`, `_05_datBaixaUTM`) VALUES ('4', '4', '40', NULL, NULL, NULL);
INSERT INTO `u555588791_pinba`.`ubicacioTeMaquina` (`_00_pk_idUTM_auto`, `_01_pk_idUbicUTM`, `_02_pk_idMaqUTM`, `_03_datAltaUTM`, `_04_datModUTM`, `_05_datBaixaUTM`) VALUES ('5', '5', '50', NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`ronda1`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('1', '1', '1', NULL, '10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('2', '1', '2', NULL, '20', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('3', '1', '3', NULL, '30', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('4', '2', '1', NULL, '400', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('5', '2', '2', NULL, '500', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('6', '2', '3', NULL, '50', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('7', '3', '1', NULL, '5', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('8', '3', '2', NULL, '10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('9', '3', '3', NULL, '15', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('10', '4', '1', NULL, '20', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('11', '4', '2', NULL, '25', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('12', '4', '3', NULL, '30', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('13', '5', '1', NULL, '10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('14', '5', '2', NULL, '20', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('15', '5', '3', NULL, '30', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('16', '6', '1', NULL, '40', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('17', '6', '2', NULL, '50', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('18', '6', '3', NULL, '60', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('19', '7', '1', NULL, '70', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('20', '7', '2', NULL, '80', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('21', '7', '3', NULL, '90', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('22', '8', '1', NULL, '100', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('23', '8', '2', NULL, '110', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('24', '8', '3', NULL, '120', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('25', '9', '1', NULL, '130', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('26', '9', '2', NULL, '140', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('27', '9', '3', NULL, '150', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('28', '10', '1', NULL, '160', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('29', '10', '2', NULL, '170', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('30', '10', '3', NULL, '180', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('31', '11', '1', NULL, '190', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('32', '11', '2', NULL, '200', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('33', '11', '3', NULL, '210', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('34', '12', '1', NULL, '220', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('35', '12', '2', NULL, '230', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('36', '12', '3', NULL, '240', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('37', '13', '1', NULL, '10', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('38', '13', '2', NULL, '90', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('39', '13', '3', NULL, '200', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('40', '14', '1', NULL, '80', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('41', '14', '2', NULL, '20', NULL, NULL);
INSERT INTO `u555588791_pinba`.`ronda1` (`_00_pk_idRonda_auto`, `_01_pk_idPartRonda`, `_05_pk_idRonda`, `_06_fotoJugRonda`, `_07_puntsRonda`, `_08_datModRonda`, `_09_datBaixaRonda`) VALUES ('42', '14', '3', NULL, '30', NULL, NULL);

COMMIT;
