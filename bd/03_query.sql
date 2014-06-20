
/***********************************************************************************************/
/* llistat de torneigs amb el premi, codi de joc i máquines que tenen instal.lat el joc */
/***********************************************************************************************/

SELECT _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _04_premiTorn AS premiTorn, _01_pk_idJoc AS idJoc,
_05_datIniTorn AS datIniTorn,_06_datFinTorn AS datFinTorn, _01_pk_idMaq AS idMaq, _02_macMaq as macMaq,
_09_datBaixaTorn AS dataBaixaTorn
FROM torneig
LEFT JOIN joc ON _02_pk_idJocTorn = _01_pk_idJoc
INNER JOIN maqInstall ON _01_pk_idJoc = _02_pk_idJocInst
INNER JOIN maquina ON _01_pk_idMaqInst = _01_pk_idMaq
GROUP BY _01_pk_idTorn,_01_pk_idMaq;


/************************************************************************************/
/*** ALTA d'UN TORNEIG   */
/************************************************************************************/

/* canviar les variables */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

INSERT INTO torneig 
VALUES (NULL,$idJoc,$nomTorn,$premiTorn,$dataIniciTorn,$dataFinTorn,$dataTime,NULL,NULL);


/************************************************************************************/
/*** BAIXA d'UN TORNEIG   */
/************************************************************************************/

/* canviar variables per valors  */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE FROM torneig SET _09_datBaixaTorn = "$dataTime"

WHERE 
		_01_pk_idTorn = "$idTorn" AND
		_02_pk_idJocTorn = "$idJoc" AND
		_09_datBaixaTorn IS NOT NULL;



/************************************************************************************/
/*** MODIFICACIO d'UN TORNEIG   */
/************************************************************************************/

/* canviar variables per valors  */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE FROM torneig SET _03_nomTorn     = "$nomTorn",
						      _04_premiTorn   = "$premiTorn",
						      _05_datIniTorn  = "$dataIniTorn",
						      _06_datFinTorn  = "$dataFinTorn",
						      _07_datAltaTorn = "$dataAltaTorn",
						      _08_datModTorn  = "$dataTime"

WHERE 
		_01_pk_idTorn    = "$idTorn" AND
		_02_pk_idJocTorn = "$idJoc";



/***********************************************************************************************/
/* tots els torneigs amb els jugadors registrats amb el seu nom, el codi de joc i el nom del joc */
/* inclou els torneigs amb cap jugador registrat
/***********************************************************************************************/

SELECT _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _04_premiTorn AS premiTorn, _02_pk_idJocTorn AS idJoc,
_01_pk_idJug AS idJug,_02_nomUsuari AS nomJug,_05_datIniTorn AS datIniTorn,_06_datFinTorn AS datFinTorn,
_09_datBaixaTorn AS dataBaixaTorn
FROM torneig
LEFT JOIN inscrit  ON (_01_pk_idTorn = _01_pk_idTornInsc  AND _02_pk_idJocTorn = _02_pk_idJocInsc )
LEFT JOIN jugador ON _01_pk_idJug  = _03_pk_idJugInsc
LEFT JOIN usuari  ON _01_pk_idJug  = _01_pk_idUsuari
ORDER BY idTorn;


/***********************************************************************************************/
/* llistat de torneigs amb el premi, codi de joc i máquines que tenen instal.lat el joc */
/* i els jugadors registrats a cada torneig amb les partides, rondes i punts obtinguts */
/***********************************************************************************************/

SELECT _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _04_premiTorn AS premiTorn,
_02_pk_idJocTorn AS idJoc, _02_pk_idMaqTTP AS idMaq, BB.idUsuari, BB.nomJug,
_05_pk_idRonda AS rondaPart, _07_puntsRonda AS punts,_04_pk_idDatHoraPart AS dataHoraPartida,
_05_datIniTorn AS datIniTorn,_06_datFinTorn AS datFinTorn, _09_datBaixaTorn AS dataBaixaTorn
FROM
(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug FROM usuari) AS BB,
torneig
LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
INNER JOIN partida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  _03_pk_idJocTTP = _02_pk_idJocPart AND
							  _04_pk_idJugTTP = _03_pk_idJugPart )
INNER JOIN ronda ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 _04_pk_idDatHoraPart = _04_pk_idDatHoraPartRonda )						  

GROUP BY idTorn,idMaq,idUsuari,dataHoraPartida,rondaPart
ORDER BY idTorn,idMaq,idUsuari,dataHoraPartida,rondaPart;



