/***********************************************************************************************/
/* prova de numeracio de linies */

SELECT @rn:=@rn+1 AS ‘recid’, j.* FROM jugador AS j, (SELECT @rn:=0) rr;

/***********************************************************************************************/
/* torneigs als que está registrat un jugador amb el codi de joc */

SELECT  _01_pk_idJug,_01_pk_idTorn,_03_nomTorn,_02_pk_idJocInsc
FROM jugador
LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
WHERE _01_pk_idJug = 2 AND _06_datBaixaJug IS NULL AND _09_datBaixaTorn IS NULL;

/***********************************************************************************************/
/* torneigs als que está registrat un jugador amb el seu nom, el codi de joc i el nom del joc */

SELECT _01_pk_idUsuari,_02_nomUsuari,_01_pk_idTorn,_03_nomTorn,_01_pk_idJoc,_02_nomJoc 
FROM usuari
LEFT JOIN jugador  ON _01_pk_idUsuari = _01_pk_idJug
LEFT JOIN inscrit  ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
INNER JOIN joc     ON _02_pk_idJocTorn = _01_pk_idJoc
WHERE _01_pk_idUsuari = 2        AND 
		_10_datBaixaUsuari IS NULL AND
		_09_datBaixaTorn   IS NULL AND
		_08_datBaixaJoc    IS NULL;


/***********************************************************************************************/
/* ranking de cada torneig */


SELECT *
FROM
( 
SELECT _01_pk_idTorn AS torn,_03_nomTorn,aa.nomJoc,_03_pk_idJugRonda AS jug, 
		 bb.nomUsuari, sum(_07_puntsRonda) AS punts,
		 find_in_set(punts,XX.LISTA_PUNTS) AS RANK
		 
FROM 
(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS aa,
(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomUsuari FROM usuari) AS bb,
(SELECT _01_pk_idTorn, group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS 
FROM CC GROUP BY _01_pk_idTorn) AS XX,
torneig
LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
INNER JOIN partida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  _03_pk_idJocTTP = _02_pk_idJocPart AND
							  _04_pk_idJugTTP = _03_pk_idJugPart )
INNER JOIN ronda ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 _04_pk_idDatHorPart = _04_pk_idDatHorPartRonda )
WHERE _03_pk_idJugRonda > 1 AND 
		_02_pk_idJocTorn  = aa.idJoc AND
		_03_pk_idJugRonda = bb.idUsuari AND
		_06_datFinTorn   >= "2014-06-15" AND
		_06_datFinTorn   >= DATE(_04_pk_idDatHorPart)
		
GROUP BY _01_pk_idTorn,_03_pk_idJugRonda
ORDER BY _01_pk_idTorn, punts DESC
) AS CC,
jugador
LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
WHERE _06_datBaixaJug  IS NULL AND
		_09_datBaixaTorn IS NULL AND
		_06_datFinTorn   >= "2014-06-15" AND
		CC.jug = _01_pk_idJug AND
		CC.torn = _01_pk_idTorn AND
		XX.jug = _01_pk_idJug AND 
		RANK <=10 and RANK > 0 AND
		XX._01_pk_idTorn = CC.torn
		
/*GROUP BY _01_pk_idTorn,_01_pk_idJug*/
ORDER BY _01_pk_idTorn,RANK;



/****************************************************************************/



SELECT * FROM
( 
SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS RANK
FROM CC,
(SELECT CC.idTorn, group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS FROM CC GROUP BY CC.idTorn) AS XX,
jugador
LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
WHERE 
		_01_pk_idJug = 2 AND
		_06_datBaixaJug  IS NULL AND
		_09_datBaixaTorn IS NULL AND
		_06_datFinTorn   >= "2014-06-15" AND
		CC.idJug = _01_pk_idJug AND
		CC.idTorn = XX.idTorn ) AS ZZ

WHERE RANK <=10 AND RANK > 0

GROUP BY idTorn,idJug

ORDER BY idTorn,RANK;




/****************************************************************************/







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
WHERE _03_pk_idJugRonda > 1 AND 
		_02_pk_idJocTorn  = aa.idJoc AND
		_03_pk_idJugRonda = bb.idUsuari AND
		_06_datFinTorn   >= "2014-06-15" AND
		_06_datFinTorn   >= DATE(_04_pk_idDatHorPart)
GROUP BY _01_pk_idTorn,_03_pk_idJugRonda

ORDER BY _01_pk_idTorn, punts DESC;


select * from cc;


DROP TABLE CC;

/***********************************************************************************************/
/* TOTS ELS TORNEIGS ACTIUS ALS QUE ES POT REGISTRAR UN JUGADOR */

SELECT * 
FROM torneig
INNER JOIN joc ON _02_pk_idJocTorn = _01_pk_idJoc
WHERE _06_datFinTorn > "$data_avui" and 
		_09_datBaixaTorn IS NULL
ORDER BY _05_datIniTorn;


