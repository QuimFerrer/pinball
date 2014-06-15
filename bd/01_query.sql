/***********************************************************************************************/
/* prova de numeracio de linies */

SELECT @rn:=@rn+1 AS ‘recid’, j.* FROM jugador AS j, (SELECT @rn:=0) rr;

/***********************************************************************************************/
/* torneigs als que está registrat un jugador amb el codi de joc */
/***********************************************************************************************/

SELECT _01_pk_idJug AS idJug, _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _02_pk_idJocInsc AS idJoc
FROM jugador
LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
WHERE 
		_06_datBaixaJug  IS NULL AND
		_09_datBaixaTorn IS NULL AND
		_06_datBaixaInsc IS NULL AND	
		_04_datAltaInsc  IS NOT NULL AND

		/* canviar pel codi del jugador */
		
		_01_pk_idJug = 2;


/***********************************************************************************************/
/* torneigs als que está registrat un jugador amb el seu nom, el codi de joc i el nom del joc */
/***********************************************************************************************/

SELECT _01_pk_idUsuari AS idJug,_02_nomUsuari AS nomJug ,_01_pk_idTorn AS idTorn,_03_nomTorn AS nomTorn,
_01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc 
FROM usuari
LEFT JOIN jugador  ON _01_pk_idUsuari = _01_pk_idJug
LEFT JOIN inscrit  ON _01_pk_idJug    = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
INNER JOIN joc     ON _02_pk_idJocTorn = _01_pk_idJoc
WHERE 
		_10_datBaixaUsuari IS NULL AND
		_09_datBaixaTorn   IS NULL AND
		_08_datBaixaJoc    IS NULL AND
		_06_datBaixaInsc   IS NULL AND	
		_04_datAltaInsc    IS NOT NULL AND

		/* canviar pel codi del jugador */
		
		_01_pk_idUsuari = 2;


/***********************************************************************************************/
/* ranking d'un jugador als torneigs registrats */
/****************************************************************************/


START TRANSACTION;
CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idTorn as idTorn,_03_nomTorn as nomTorn, idJoc, aa.nomJoc,_03_pk_idJugRonda as idJug ,
bb.nomJug, sum(_07_puntsRonda) AS punts FROM 
(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS aa,
(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug FROM usuari) AS bb,
torneig
LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
INNER JOIN partida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  _03_pk_idJocTTP = _02_pk_idJocPart AND
							  _04_pk_idJugTTP = _03_pk_idJugPart )
INNER JOIN ronda ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 _04_pk_idDatHorPart = _04_pk_idDatHorPartRonda )
WHERE 
		nomJug <> "admin" AND
		_02_pk_idJocTorn  = aa.idJoc AND
		_03_pk_idJugRonda = bb.idUsuari AND
		_06_datFinTorn   >= DATE(_04_pk_idDatHorPart) AND
		
		/* canviar $data Y-n-j ( 2014-06-15 ) per Data CURRENT */
				
		_06_datFinTorn   >= "2014-06-15"
		
GROUP BY _01_pk_idTorn,_03_pk_idJugRonda
ORDER BY _01_pk_idTorn, punts DESC;


SELECT * FROM
( 
SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking
FROM CC,
(SELECT CC.idTorn, group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS FROM CC GROUP BY CC.idTorn) AS XX,
jugador
LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
WHERE 
		_06_datBaixaJug  IS NULL AND
		_09_datBaixaTorn IS NULL AND
		_06_datBaixaInsc IS NULL AND	
		_04_datAltaInsc  IS NOT NULL AND		
		CC.idJug = _01_pk_idJug AND
		CC.idTorn = XX.idTorn AND
		
		/* canviar $data Y-n-j ( 2014-06-15 ) per Data CURRENT */
		/* canviar el codi del jugador */
		
		_06_datFinTorn   >= "2014-06-15" AND
		_01_pk_idJug = 2
		
) AS ZZ
WHERE ranking > 0
GROUP BY idTorn, idJug
ORDER BY idTorn, ranking;

DROP TABLE CC;
COMMIT;


/***********************************************************************************************/
/* ranking històric d'un jugador als torneigs registrats finalitzats i en curs */
/****************************************************************************/


START TRANSACTION;
CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idTorn as idTorn,_03_nomTorn as nomTorn, idJoc, aa.nomJoc,_03_pk_idJugRonda as idJug ,
bb.nomJug, sum(_07_puntsRonda) AS punts FROM 
(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS aa,
(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug FROM usuari) AS bb,
torneig
LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
INNER JOIN partida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  _03_pk_idJocTTP = _02_pk_idJocPart AND
							  _04_pk_idJugTTP = _03_pk_idJugPart )
INNER JOIN ronda ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 _04_pk_idDatHorPart = _04_pk_idDatHorPartRonda )
WHERE 
		nomJug <> "admin" AND
		_02_pk_idJocTorn  = aa.idJoc AND
		_03_pk_idJugRonda = bb.idUsuari AND
		_06_datFinTorn   >= DATE(_04_pk_idDatHorPart)
GROUP BY _01_pk_idTorn,_03_pk_idJugRonda
ORDER BY _01_pk_idTorn, punts DESC;

select * from CC;

SELECT * FROM
( 
SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking
FROM CC,
(SELECT CC.idTorn, group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS FROM CC GROUP BY CC.idTorn) AS XX,
jugador
LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
WHERE 
		_06_datBaixaJug  IS NULL AND
		_09_datBaixaTorn IS NULL AND
		CC.idJug = _01_pk_idJug AND
		CC.idTorn = XX.idTorn AND
		
		/*  canviar pel codi del jugador */

		_01_pk_idJug = 2
		
) AS ZZ
WHERE ranking > 0
GROUP BY idTorn, idJug
ORDER BY idTorn, ranking;

DROP TABLE CC;
COMMIT;


/****************************************************************************/
/* baixa de la inscripció a un torneig per jugador
/****************************************************************************/

	/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE inscrit SET _06_datBaixaInsc  = "$dataTime"
WHERE 
		_06_datBaixaInsc IS NULL AND
		(_02_pk_idJocInsc IN ( SELECT _02_pk_idJocTorn AS _02_pk_idJocInsc FROM torneig WHERE   
		
		 	/*  canviar pel codi del torneig */	
		 
				_01_pk_idTornInsc = 1001

		 )) AND
	/*  canviar pel codi del torneig i del jugador */	
		
		_01_pk_idTornInsc = 1001 AND
		_03_pk_idJugInsc  = 2;

/*

Exemple

UPDATE inscrit SET _06_datBaixaInsc  = "2014-06-15 10:00:10"
WHERE 
		_06_datBaixaInsc IS NULL AND
		(_02_pk_idJocInsc IN ( SELECT _02_pk_idJocTorn AS _02_pk_idJocInsc FROM torneig WHERE   
		_01_pk_idTornInsc = 1001 )) AND
		_01_pk_idTornInsc = 1001 AND
		_03_pk_idJugInsc  = 2;

*/

/***********************************************************************************************/
/* TOTS ELS TORNEIGS ACTIUS ALS QUE ES POT REGISTRAR UN JUGADOR */

SELECT * 
FROM torneig
INNER JOIN joc ON _02_pk_idJocTorn = _01_pk_idJoc
WHERE 
		_09_datBaixaTorn IS NULL AND

	/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

		_06_datFinTorn >= "$dataTime"

ORDER BY _05_datIniTorn;


