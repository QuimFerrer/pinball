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
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('100', 'ARMAGEDON', 'El Gobierno estaba probando una nueva tecnología para los viajes espaciales, el sistema es inestable y....... !!!! ESTAN HABRIENDO PUERTAS QUE JAMAS DEBERIAN HABER SIDO ABIERTAS ¡¡¡. AdemÁs parece ser las Fuerzas Extraterrestres están interesados en esta tecnología también. Menos mal que ,los componentes de la Resistencia solucionán todos los problemas .....y detendrán los lios generados por los gobernantes.\nTendras que:\nCERRAR las puertas del cementerio, antes que los zombies alcancen la ciudad.\nDestruir la SONDA OVNI que está desplegando ROBOTS.\nEntrar en la planta nuclear Y DETENER LA FUGA DE RIESGO BIOLOGICO.\nDestruir LA PUERTA NEGRA con dos potentes bombas.\nLas vacas están siendo ADDUCIDAS, sálvalas y los granjeros te ayudaran.\nCIERRA todas las fugas DEL NUCLEO Yy la ciudad te dara un MEDI-KIT ( KIT MEDICO).\nDestruye OVNIS para conseguir sus armas o completa el BUMPER GIRATORIO.\n', 'armagedon.jpg', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('101', 'CARS & GIRLS', 'Tu MEJOR AMIGO HACE HACE LA despedida de soltero es este fin de semana. sólo A 1000 MILLAS de distancia y TU NO TE LO QUEIRES PERDER.\nasí que TOMA tu viejo camión y mantener el acelerador a fondo.\nEl viaje:\nEl túnel: acceso directo a través del túnel para obtener 200 millas.\nEl paso: completar para obtener OTRAS 200 MILLAS.\nCallejón sin salida: salir de allí con acceso directo de 200 millas.\nEl combustible:\nEn la Gasolinera conseguir 2 tanques de combustible para evitar la falta de gas.\nLas chicas:\nSUBIR A LAS CHICAS AL COCHE COMPLETANDO LAS DIANAS \"LOVE TRUCK\".\nPROMETISTE llevar cuatro niñas a la fiesta.\nEl garaje:\nGaraje-thornes estará disponible cuando SE ESTROPEE el motor.\nLa Policía:\nTenga cuidado con los radares y los bloqueos de carreteras.\nSi se rompen todos los BLOQUEOS DE CARRETERA se consigue una multa .\nCon tres MULTAS ESTARAS FUERA DE LA LEY, PEREPARATE.\nSpeed:\nACELERA PARA CONSEGUIR MAS VELOCIDAD .\nCuanto más rápido vayas, más rápido se llega a la fiesta.\nConseguir \"COMBOS NITRO \" para una dosis de locura de la aceleración.\n!!!!!BUEN VIAJE ¡¡¡¡¡.\n', 'cars&girls.jpg', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('102', 'TIME MACHINE', 'La maquina del tiempo esta lista para ser usada, pero un problema elctrico hace que los viajes en el tiempo no accedan a la fecha seleccionada….COMIENZA La aventura.\nSelecciona el objetivo “weird”  encenciendo  las luces de los pasillos de la parte superior.\nDesactiva las palancas  “time” situadas  en la parte media izquierda para desbloquear el pasillo sin salida y atrapar bolas para el multiball.\nMultiball se ejecuta cuando todas las luces de bonus estan iluminandas.\nDesactiva las palancas “explore” situadas ern la parte central derecha  para incrementar tiempo de extra bonus dirante el descuento del reloj.\nHaz que la bola pase por los pasillos “add bonus iluminados” hasta completar el mensaje  bajo el reloj “ time machine ” para incrementar puntuacion de bonus.\nGolpear con la bola las dianas que se encuentra a la derecha y a la izquierda del “ portal temporal humeante”.\nPara ir incrementando el bounus de la puerta  1000, 10.000, 50.000 y  lit special 100.000. Despues introducir la bola en la base de la puerta para visualizar un personaje de la epoca o dimension  en la que estamos actuamente y sumando los bonus acumulados.\n', 'time_machine.jpg', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('103', 'LUCKY FIRE', 'Cartas (dianas abatibles): eliminar todas las cartas para abrir el casino.\nCasino: para ganar bola extra o para activar el multiplicador.\nMultiplicador campo de juego: multiplica todos los puntajes de 2, 3 o 5 durante 10 segundos\nBumper\'s: aumenta la puntuacion .\nRevolver (dianas abatibles): elimina las dianas de las gun pabrir el banco y aumentar los puntos.\nRecompensa: pasar por las rampas y eliminar las dianas del sheriff para incrementar el valor de la recompensa,\nPasar por la rampa horseshoe para escribir la siguiente letra de recompensa.\nBanco: recoges el el valor de lods bonus guardados o la recompensa del jackpot.\nAgua ramp: activa el letreo de la palabra \"engine\" .\nRodeo: incrementa los puntos del rodeo y enciende las luces de la palabra \"engine\", abre el tunel para la\nLocomotora express ,cuando la palabra \"engine\"esta encendida .\nTúnel: consigues el bonus de la recompensa y el multiplicador del bonus ,o enciende la bola extra cuando se entra.\nJuega a juego de la locomotora (en dmd) si la palabra \"engine esta encendida.\nBala: recoge puntuacion del bonus.\nGoldrush: enciende todas las letras del lingote de oro para activar el modo goldrush, las letras se encienden\nPasando por la rampa de agua, el rodeo, el banco y las cartas. Todas las rampas y las dianas del banco incremeta\nEl valor de \"goldrush\".\nHerradura: deletrea la siguiente letra de la recompensa \"reward\", activa el \"goldrush\" y da valor al multiball.\nOutlaw: abre la mina para recoger las letras \"tnt\".\nMina y la cárcel: deletrean la siguiente letra de \"tnt\" ilumina tosdas las letras para comenzar el multiball.\nSidelanes:\"pasillos laterales\" bola extra cuando esta encendido.\nDuelo nocturno premio: una puntuacion establecida activa el duelo. \n\n', 'lucky_fire.jpg', NULL, '2014-05-13', NULL, NULL);
INSERT INTO `u555588791_pinba`.`joc` (`_01_pk_idJoc`, `_02_nomJoc`, `_03_descJoc`, `_04_imgJoc`, `_05_numPartidesJugadesJoc`, `_06_datAltaJoc`, `_07_datModJoc`, `_08_datBaixaJoc`) VALUES ('104', 'PACMAN', 'El objetivo del juego es controlar nuestro personaje a través de un laberinto mientras él va comiendo puntos. Cuando todos los puntos son comidos se pasa al siguiente nivel.\nPulsa en \"Start Game\" para iniciar el juego, mueves con las teclas de flechas del teclado, con la tecla M, apagas el sonido, con P, pausas el juego y Q hace que lo abandones. Existen cuatro fantasmas que recorren el laberinto e intentan atraparnos. Si algún fantasma llegase a tocarnos perdemos una vida. Inicialmente tenemos tres vidas, cuando se han perdido todas las vidas el juego terminará. Cerca de las esquinas del laberinto hay cuatro galletas de superpoder, cuando las comemos, nos volvemos más fuertes, los fantasmas no podrán tocarnos, girarán en dirección opuesta a dónde estamos y se moverán más lentamente, de hecho, si ellos nos tocan, los enviaremos temporalmente a un espacio cerrado en el centro del laberinto y obtendremos puntos por ello. \nTambién podemos obtener bonos en forma de fruta cerca del centro del laberinto. Cuando logramos comer estas frutas obtenemos puntos extra.\n', 'pacman.jpg', NULL, '2014-05-13', NULL, NULL);

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

-- -----------------------------------------------------
-- Data for table `u555588791_pinba`.`productes`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `u555588791_pinba`;
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('1', 'BINGO ELECTRONICO', 'Tecnología avanzada.\\r\\n<em>Microprocesador Coldfire 5206e</em>\\r\\nCartones con iluminación LED de luz blanca Multicromática.\\r\\nComunicación serial entre todos los elementos que componen el Kit.\\r\\nSistema de lectura de \"Holes\" inteligente ( para evitar manipulación externa).\\r\\nControl de selector electrónico, aceptador de billetes,  llaves de pago y cobro. Totalizadores electromecánicos y electrónicos.\\r\\nHopper. Bolas antimagnéticas. Varios idiomas. Amplia configuración adaptable a holomologaciones del país. Posibilidad de LINK con  acumulativo inalámbrico. Tutorial de juego en luces y display alfanumérico.\\r\\nBonus para cartón individual, SuperBonus para cartón individual, Numero Mágico, premio 4 esquinas, premio DIAGONAL, premio Súper línea, 6ª 7ª y 8ª bolas extras, multiplicadores de cartones Individuales.\\r\\n<b>Personalización de serigrafía y gráficos tanto en tablero como en Frontal.</b>\'', '235', 'bingo.jpg', '2014-05-16', NULL, NULL);
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('2', 'KIT DE DIANA ZONE DART', 'Amplia gama de juegos:\\r\\n180 – simple-double in-double out-double in/out-master out\\r\\n301 – simple-double in-double out-double in/out-master out\\r\\n501 – simple-double in-double out-double in/out-master out\\r\\n701 – simple-double in-double out-double in/out-master out\\r\\n901 – simple-double in-double out-double in/out-master out\\r\\n301 KILLER – simple-double in-double out-double in/out-master out\\r\\nCRICKEt–simple-no score-cutthroat-master-crazy-wild and crazy\\r\\nHI SCORE\\r\\nLOW SCORE\\r\\nROULETTE\\r\\nSHANGHAI\\r\\n\\r\\nOpciones :\\r\\n<ul>\\r\\n<li>EQUAL</li>\\r\\n<li>HANDICAP</li>\\r\\n<li>TEAM</li>\\r\\n<li>EQUAL TEAM</li>\\r\\n<li>EQUAL HANDICAP</li>\\r\\n</ul>\\r\\n\\r\\nSelección de Bull 25/50 , 50/50, Happy Hour programable.\\r\\nAmplia configuración. Selección intuitiva de juegos. Muestra del resultado final de la partida por clasificación, handicap, PPD. Hazañas. Varios idiomas. Sonidos indicadores de eventos. Selector electrónico de monedas, selector de billetes, interface de sensor de dardos inteligente. \\r\\n\\r\\n\\r\\n', '235', 'diana.jpg', '2014-05-16', NULL, NULL);
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('3', 'ROULETTE', 'Rouleta electrónica', '235', 'roulette.jpg', '2014-05-16', NULL, NULL);
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('4', 'COMMA6-A', '\'<p>Estándar para gaming en Italia.</p>\\r\\n<p>Cumpliendo los requisitos de\\r\\nhomologación que se requieren para el hardware. Dos tampers\\r\\npara detección de apertura de las cajas que protegen placa contra manipulación.  Protocolo de comunicación con Monopolio de Estado. Soporte de tarjeta en la parte inferior. Gráficos y sonido en SD-CARD. Programa Embebido en microcontrolador, etc.</p>\\r\\n', '235', 'comma6a.jpg', '2014-05-16', NULL, NULL);
INSERT INTO `u555588791_pinba`.`productes` (`id`, `nom`, `descripcio`, `preu`, `foto`, `datAltaPro`, `datModPro`, `datBaixaPro`) VALUES ('5', 'STANDARD GAMES', 'games descr', '235', NULL, '2014-05-16', NULL, NULL);

COMMIT;
