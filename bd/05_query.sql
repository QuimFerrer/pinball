/***********************************************************************************************/
/* 3.g.i.1 - relació de jugadors */
/***********************************************************************************************/

SELECT _01_pk_idUsuari AS idUsr,_02_nomUsuari AS nomUsr,_03_cognomUsuari AS cogUsr,
_06_emailUsuari AS emailUsr

FROM usuari;


/***********************************************************************************************/
/* 3.g.i.2 - consulta perfil jugador / usuari */
/***********************************************************************************************/


SELECT _01_pk_idUsuari AS idUsr,_02_nomUsuari AS nomUsr,_03_cognomUsuari AS cogUsr,
_04_loginUsuari AS loginUsr, _05_pwdUsuari AS passwordUsr, _06_emailUsuari AS emailUsr,
_07_fotoUsuari AS fotoUsr, _02_faceJug AS facebookUsr, _03_twitterJug AS twitterUsr

FROM usuari

LEFT JOIN jugador ON _01_pk_idUsuari = _01_pk_idJug

WHERE
	
	/* canviar pel login de l'usuari */
	
	_04_loginUsuari = "$login";

/*

SELECT _01_pk_idUsuari AS idUsr,_02_nomUsuari AS nomUsr,_03_cognomUsuari AS cogUsr,
_04_loginUsuari AS loginUsr, _05_pwdUsuari AS passwordUsr, _06_emailUsuari AS emailUsr,
_07_fotoUsuari AS fotoUsr, _02_faceJug AS facebookUsr, _03_twitterJug AS twitterUsr

FROM usuari

LEFT JOIN jugador ON _01_pk_idUsuari = _01_pk_idJug

WHERE
	
	_04_loginUsuari = "joan";

*/


/***********************************************************************************************/
/* 3.g.i.3 - anul.lar / bloquejar jugador / usuari */
/***********************************************************************************************/

UPDATE usuari SET _10_datBaixaUsuari = NOW()
WHERE 
		_10_datBaixaUsuari IS NULL AND
		
		/* canviar pel login de l'usuari */
	
		_04_loginUsuari = "$login";		

UPDATE jugador SET _06_datBaixaJug  = NOW()
WHERE
		 _06_datBaixaJug IS NULL AND
		 
		/* canviar pel login de l'usuari */		
		
		(_01_pk_idJug IN ( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
		WHERE _04_loginUsuari = "$login"));		 
		

/*

UPDATE usuari SET _10_datBaixaUsuari = NOW()
WHERE 
		_10_datBaixaUsuari IS NULL AND		
		_04_loginUsuari = "miquel";		

START TRANSACTION;

UPDATE jugador SET _06_datBaixaJug  = NOW()
WHERE
		 _06_datBaixaJug IS NULL AND
		(_01_pk_idJug IN ( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
		WHERE _04_loginUsuari = "miquel"));		 

select * from jugador;
select * from usuari;
*/	
	
/***********************************************************************************************/
/* 3.g.i.4 - desanul.lar / desbloquejar jugador / usuari */
/***********************************************************************************************/



UPDATE usuari SET _09_datModUsuari   = NOW(),
						_10_datBaixaUsuari = NULL
WHERE 
		_10_datBaixaUsuari IS NOT NULL AND
		
		/* canviar pel login de l'usuari */
	
		_04_loginUsuari = "$login";		

UPDATE jugador SET _05_datModJug    = NOW(),
						 _06_datBaixaJug  = NULL
WHERE
		 _06_datBaixaJug IS NOT NULL AND
		 
		/* canviar pel login de l'usuari */		
		
		(_01_pk_idJug IN ( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
		WHERE _04_loginUsuari = "$login"));		 

/*

UPDATE usuari,jugador SET
						_09_datModUsuari   = NOW(),
						_10_datBaixaUsuari = NULL,
						_05_datModJug    = NOW(),
						_06_datBaixaJug  = NULL						
WHERE 
		_10_datBaixaUsuari IS NOT NULL AND	
		_04_loginUsuari = "joan" AND
		_06_datBaixaJug IS NOT NULL;

select * from usuari;
select * from jugador;


*/

/***********************************************************************************************/
/* 3.g.ii.1 - torneigs registrats amb la seva posició i punts de cada torneig */
/***********************************************************************************************/


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
		_06_datFinTorn   >= CURDATE()
		
GROUP BY _01_pk_idTorn,_03_pk_idJugRonda
ORDER BY _01_pk_idTorn, punts DESC;


SELECT * FROM
( 
SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking
FROM CC,
(SELECT CC.idTorn, COUNT(*) AS numRK, group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS FROM CC GROUP BY CC.idTorn) AS XX,
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
		
		/* canviar el login del jugador */
		
		_06_datFinTorn   >= CURDATE() AND
		CC.loginJug = "$login"
		
) AS ZZ
WHERE ranking BETWEEN 1 AND 10
GROUP BY idTorn, idJug
ORDER BY idTorn, ranking;

DROP TABLE CC;


/* select * from cc; 
*/


