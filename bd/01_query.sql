/***********************************************************************************************/
/* prova de numeracio de linies */

SELECT @rn:=@rn+1 AS ‘recid’, j.* FROM jugador AS j, (SELECT @rn:=0) rr;

/***********************************************************************************************/
/* torneigs als que está registrat un jugador amb el codi de joc */
/***********************************************************************************************/

SELECT _01_pk_idJug AS idJug, BB.loginJug, _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _02_pk_idJocInsc AS idJoc
FROM
(SELECT _01_pk_idUsuari as idUsuari,_04_loginUsuari as loginJug FROM usuari) AS BB,
jugador
LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
WHERE 
		_06_datBaixaJug  IS NULL AND
		_09_datBaixaTorn IS NULL AND
		_06_datBaixaInsc IS NULL AND	
		_04_datAltaInsc  IS NOT NULL AND
		BB.idUsuari = _01_pk_idJug AND

		/* canviar pel login de l'usuari */
		
		BB.loginJug = "joan";


/***********************************************************************************************/
/* torneigs als que está registrat un jugador amb el seu nom, el codi de joc i el nom del joc */
/***********************************************************************************************/

SELECT _01_pk_idUsuari AS idJug, _04_loginUsuari AS loginJug, _02_nomUsuari AS nomJug ,_01_pk_idTorn AS idTorn,_03_nomTorn AS nomTorn,
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

		/* canviar pel login de l'usuari */
		
		_04_loginUsuari = "joan";


/***********************************************************************************************/
/* ranking d'un jugador als torneigs registrats */
/****************************************************************************/


START TRANSACTION;
CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idTorn as idTorn,_03_nomTorn as nomTorn, idJoc, aa.nomJoc,_03_pk_idJugRonda as idJug ,
BB.nomJug, BB.loginJug, sum(_07_puntsRonda) AS punts FROM 
(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS AA,
(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug, _04_loginUsuari AS loginJug FROM usuari) AS BB,
torneig
LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
INNER JOIN partida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  _03_pk_idJocTTP = _02_pk_idJocPart AND
							  _04_pk_idJugTTP = _03_pk_idJugPart )
INNER JOIN ronda ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 _04_pk_idDatHoraPart = _04_pk_idDatHoraPartRonda )
WHERE 
		loginJug <> "admin" AND
		_02_pk_idJocTorn  = AA.idJoc AND
		_03_pk_idJugRonda = BB.idUsuari AND
		_06_datBaixaPart IS NULL AND
		_06_datFinTorn   >= DATE(_04_pk_idDatHoraPart) AND
		
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
		CC.idJug  = _01_pk_idJug AND
		CC.idTorn = XX.idTorn AND
		
		/* canviar $data Y-n-j ( 2014-06-15 ) per Data CURRENT */
		/* canviar el login del jugador */
		
		_06_datFinTorn   >= "2014-06-15" AND
		CC.loginJug = "$login"
		
) AS ZZ
WHERE ranking > 0
GROUP BY idTorn, idJug
ORDER BY idTorn, ranking;

DROP TABLE CC;
COMMIT;

/* select * from cc; 
*/

/***********************************************************************************************/
/* ranking històric d'un jugador als torneigs registrats finalitzats i en curs */
/****************************************************************************/


START TRANSACTION;
CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idTorn as idTorn,_03_nomTorn as nomTorn, idJoc, aa.nomJoc,_03_pk_idJugRonda as idJug ,
BB.nomJug, BB.loginJug, sum(_07_puntsRonda) AS punts FROM 
(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS AA,
(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug, _04_loginUsuari AS loginJug FROM usuari) AS BB,
torneig
LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
INNER JOIN partida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  _03_pk_idJocTTP = _02_pk_idJocPart AND
							  _04_pk_idJugTTP = _03_pk_idJugPart )
INNER JOIN ronda ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 _04_pk_idDatHoraPart = _04_pk_idDatHoraPartRonda )
WHERE 
		loginJug <> "admin" AND
		_02_pk_idJocTorn  = AA.idJoc AND
		_03_pk_idJugRonda = BB.idUsuari AND
		_06_datBaixaPart IS NULL AND
		_06_datFinTorn   >= DATE(_04_pk_idDatHoraPart)
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
		CC.idJug = _01_pk_idJug AND
		CC.idTorn = XX.idTorn AND
		
	/* canviar el login del jugador */
		CC.loginJug = "$login"		
		
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
		 
	/* canviar pel login de l'usuari */	
		
		_01_pk_idTornInsc = 1001 AND
		(_03_pk_idJugInsc IN ( SELECT _01_pk_idUsuari AS _03_pk_idJugInsc FROM usuari
		WHERE _04_loginUsuari = "$login"));

/*

Exemple

UPDATE inscrit SET _06_datBaixaInsc  = "2014-06-15 10:00:10"
WHERE 
		_06_datBaixaInsc IS NULL AND
		(_02_pk_idJocInsc IN ( SELECT _02_pk_idJocTorn AS _02_pk_idJocInsc FROM torneig WHERE   
		_01_pk_idTornInsc = 1001 )) AND
		_01_pk_idTornInsc = 1001 AND
		(_03_pk_idJugInsc IN ( SELECT _01_pk_idUsuari AS _03_pk_idJugInsc FROM usuari
		WHERE _04_loginUsuari = "joan"));

select * from inscrit;


*/

/***********************************************************************************************/
/* TOTS ELS TORNEIGS ACTIUS ALS QUE ES POT REGISTRAR UN JUGADOR */
/***********************************************************************************************/

SELECT * 
FROM torneig
INNER JOIN joc ON _02_pk_idJocTorn = _01_pk_idJoc
WHERE 
		_09_datBaixaTorn IS NULL AND

	/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

		_06_datFinTorn >= "$dataTime"

ORDER BY _05_datIniTorn;


/***********************************************************************************************/
/*  APUNTAR-SE A UN TORNEIG  */
/***********************************************************************************************/

	/* canviar pel login de l'usuari */	

SELECT _01_pk_idUsuari FROM usuari WHERE _04_loginUsuari = "joan";

/* dades a insertar: idTorneig, idJoc, idJugador, data Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

INSERT INTO inscrit (_00_pk_idInscrit,_01_pk_idTorn,_02_pk_idJocInsc,_03_pk_idJugInsc,_04_datAltaInsc)
VALUES (NULL,?,?,?,?);





