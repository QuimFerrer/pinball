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
DROP INDEX `fk_ubicacio_maquina1` ,
ADD INDEX `fk_ubicacio_maquina1_idx` (`_02_pk_idMaqUbic` ASC);

ALTER TABLE `u555588791_pinba`.`maqInstall` 
DROP COLUMN `_04_totCredJocMaqInst`,
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
