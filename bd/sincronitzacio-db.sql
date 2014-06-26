SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `u555588791_pinba`.`admin` 
DROP INDEX `fk_admin_usuari1` ,
ADD INDEX `fk_admin_usuari1_idx` (`_01_pk_idAdm` ASC);

ALTER TABLE `u555588791_pinba`.`jugador` 
DROP INDEX `fk_jugador_usuari` ,
ADD INDEX `fk_jugador_usuari_idx` (`_01_pk_idJug` ASC);

ALTER TABLE `u555588791_pinba`.`torneig` 
CHANGE COLUMN `_04_premiTorn` `_04_premiTorn` DECIMAL(10) NULL DEFAULT NULL ,
DROP INDEX `torneig_2_joc` ,
ADD INDEX `torneig_2_joc_idx` (`_02_pk_idJocTorn` ASC);

ALTER TABLE `u555588791_pinba`.`inscrit` 
DROP INDEX `fk_torneig_has_jugador_jugador1` ,
ADD INDEX `fk_torneig_has_jugador_jugador1_idx` (`_03_pk_idJugInsc` ASC),
DROP INDEX `fk_torneig_has_jugador_torneig1` ,
ADD INDEX `fk_torneig_has_jugador_torneig1_idx` (`_01_pk_idTornInsc` ASC, `_02_pk_idJocInsc` ASC);

ALTER TABLE `u555588791_pinba`.`maquina` 
CHANGE COLUMN `_04_credMaq` `_04_credMaq` DECIMAL(10) NULL DEFAULT NULL ,
CHANGE COLUMN `_05_totCredMaq` `_05_totCredMaq` DECIMAL(10) NULL DEFAULT NULL ;

ALTER TABLE `u555588791_pinba`.`ubicacio` 
DROP COLUMN `_16_datBaixaUbic`,
DROP COLUMN `_15_datModUbic`,
DROP COLUMN `_14_datAltaUbic`,
DROP COLUMN `_13_mobUbic`,
DROP COLUMN `_12_telUbic`,
DROP COLUMN `_11_emailUbic`,
DROP COLUMN `_10_contUbic`,
DROP COLUMN `_09_altUbic`,
DROP COLUMN `_08_longUbic`,
DROP COLUMN `_07_latUbic`,
DROP COLUMN `_06_provUbic`,
DROP COLUMN `_05_cpUbic`,
DROP COLUMN `_04_pobUbic`,
DROP COLUMN `_03_dirUbic`,
DROP COLUMN `_02_empUbic`,
CHANGE COLUMN `_01_pk_idUbic` `_01_pk_idUbic` INT(11) NOT NULL ,
ADD COLUMN `_00_pk_idUbic_auto` INT(11) NOT NULL AUTO_INCREMENT FIRST,
ADD COLUMN `_02_pk_idMaqUbic` INT(11) NOT NULL AFTER `_01_pk_idUbic`,
ADD COLUMN `_03_empUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_02_pk_idMaqUbic`,
ADD COLUMN `_04_dirUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_03_empUbic`,
ADD COLUMN `_05_pobUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_04_dirUbic`,
ADD COLUMN `_06_cpUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_05_pobUbic`,
ADD COLUMN `_07_provUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_06_cpUbic`,
ADD COLUMN `_08_latUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_07_provUbic`,
ADD COLUMN `_09_longUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_08_latUbic`,
ADD COLUMN `_10_altUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_09_longUbic`,
ADD COLUMN `_11_contUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_10_altUbic`,
ADD COLUMN `_12_emailUbic` VARCHAR(45) NULL DEFAULT NULL AFTER `_11_contUbic`,
ADD COLUMN `_13_telUbic` VARCHAR(15) NULL DEFAULT NULL AFTER `_12_emailUbic`,
ADD COLUMN `_14_mobUbic` VARCHAR(15) NULL DEFAULT NULL AFTER `_13_telUbic`,
ADD COLUMN `_15_datAltaUbic` DATETIME NULL DEFAULT NULL AFTER `_14_mobUbic`,
ADD COLUMN `_16_datModUbic` DATETIME NULL DEFAULT NULL AFTER `_15_datAltaUbic`,
ADD COLUMN `_17_datBaixaUbic` DATETIME NULL DEFAULT NULL AFTER `_16_datModUbic`,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`_00_pk_idUbic_auto`, `_01_pk_idUbic`, `_02_pk_idMaqUbic`),
ADD INDEX `fk_ubicacio_maquina1_idx` (`_02_pk_idMaqUbic` ASC);

ALTER TABLE `u555588791_pinba`.`maqInstall` 
DROP COLUMN `_08_datBaixaMaqInst`,
DROP COLUMN `_07_datModMaqInst`,
DROP COLUMN `_06_datAltaMaqInst`,
DROP COLUMN `_05_totCredJocMaqInst`,
DROP COLUMN `_04_credJocMaqInst`,
DROP COLUMN `_03_numPartidesJugadesMaqInst`,
ADD COLUMN `_03_credJocMaqInst` INT(11) NULL DEFAULT NULL AFTER `_02_pk_idJocInst`,
ADD COLUMN `_04_totCredJocMaqInst` INT(11) NULL DEFAULT NULL AFTER `_03_credJocMaqInst`,
DROP INDEX `fk_maquina_has_juego_juego1` ,
ADD INDEX `fk_maquina_has_juego_juego1_idx` (`_02_pk_idJocInst` ASC),
DROP INDEX `fk_maquina_has_juego_maquina1` ,
ADD INDEX `fk_maquina_has_juego_maquina1_idx` (`_01_pk_idMaqInst` ASC);

ALTER TABLE `u555588791_pinba`.`partida` 
DROP INDEX `partida_2_ronda` ,
ADD INDEX `partida_2_ronda_idx` (`_01_pk_idMaqPart` ASC, `_02_pk_idJocPart` ASC, `_03_pk_idJugPart` ASC, `_04_pk_idDatHoraPart` ASC),
DROP INDEX `partida_2_maquina` ,
ADD INDEX `partida_2_maquina_idx` (`_01_pk_idMaqPart` ASC),
DROP INDEX `partida_2_joc` ,
ADD INDEX `partida_2_joc_idx` (`_02_pk_idJocPart` ASC),
DROP INDEX `partida_2_jugador` ,
ADD INDEX `partida_2_jugador_idx` (`_03_pk_idJugPart` ASC);

ALTER TABLE `u555588791_pinba`.`torneigTePartida` 
DROP INDEX `TTP_2_partida` ,
ADD INDEX `TTP_2_partida_idx` (`_02_pk_idMaqTTP` ASC, `_03_pk_idJocTTP` ASC, `_04_pk_idJugTTP` ASC),
DROP INDEX `TTP_2_torneig` ,
ADD INDEX `TTP_2_torneig_idx` (`_01_pk_idTornTTP` ASC, `_03_pk_idJocTTP` ASC);

DROP TABLE IF EXISTS `u555588791_pinba`.`ubicacioTeMaquina` ;

ALTER TABLE `u555588791_pinba`.`ubicacio` 
ADD CONSTRAINT `fk_ubicacio_maquina1`
  FOREIGN KEY (`_02_pk_idMaqUbic`)
  REFERENCES `u555588791_pinba`.`maquina` (`_01_pk_idMaq`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
