/********productes***************************************************************************************/
/* prova de numeracio de linies */

SELECT @rn:=@rn+1 AS ‘recid’, j.* FROM jugador AS j, (SELECT @rn:=0) rr;


/**********************************************usuari*************************************************/
/* 2.a.1 - 5021 - consulta perfil jugador / usuari */
/***********************************************************************************************/


SELECT _01_pk_idUsuari AS idUsr,_02_nomUsuari AS nomUsr,_03_cognomUsuari AS cogUsr,
_04_loginUsuari AS loginUsr, _05_pwdUsuari AS passwordUsr, _06_emailUsuari AS emailUsr,
_07_fotoUsuari AS fotoUsr, _02_faceJug AS facebookUsr, _03_twitterJug AS twitterUsr
FROM usuari
LEFT JOIN jugador ON _01_pk_idUsuari = _01_pk_idJug
WHERE
	_10_datBaixaUsuari IS NULL AND
	_06_datBaixaJug    IS NULL AND
	
	/* canviar pel login de l'usuari */
	
	_04_loginUsuari = "$login";

/*
SELECT _01_pk_idUsuari AS idUsr,_02_nomUsuari AS nomUsr,_03_cognomUsuari AS cogUsr,
_04_loginUsuari AS loginUsr, _05_pwdUsuari AS passwordUsr, _06_emailUsuari AS emailUsr,
_07_fotoUsuari AS fotoUsr, _02_faceJug AS facebookUsr, _03_twitterJug AS twitterUsr
FROM usuari
LEFT JOIN jugador ON _01_pk_idUsuari = _01_pk_idJug
WHERE
	_10_datBaixaUsuari IS NULL AND
	_06_datBaixaJug    IS NULL AND
	_04_loginUsuari = "joan";

*/

/***********************************************************************************************/
/* 2.a.2 - 5022 - modificacio perfil jugador */
/***********************************************************************************************/

/* canviar variables amb $ per valors */

UPDATE usuari SET _02_nomUsuari    = "$nom",
						_03_cognomUsuari = "$cognom",
						_05_pwdUsuari    = "$passwor",
						_06_emailUsuari  = "$email",						
						_07_fotoUsuari   = "$nomFoto",
						_09_datModUsuari = NOW()
WHERE
		_10_datBaixaUsuari IS NULL AND
		
		/* canviar pel login de l'usuari */
	
		_04_loginUsuari = "$login";

UPDATE jugador SET _02_faceJug    = "$facebook",
						 _03_twitterJug = "$twitter",
						 _05_datModJug  = NOW()
WHERE 
		_06_datBaixaJug IS NULL AND
		
		/* canviar pel login de l'usuari */		
		
		(_01_pk_idJug IN ( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
		WHERE _04_loginUsuari = "$login"));


/* ejemplo

START TRANSACTION;
UPDATE usuari SET _02_nomUsuari    = "joan josep",
						_03_cognomUsuari = "salas torres",
						_05_pwdUsuari    = "joan",
						_06_emailUsuari  = "joanjosep@gmail.com",						
						_07_fotoUsuari   = "jjsalas.jpg",
						_09_datModUsuari = NOW()
WHERE _04_loginUsuari = "joan" and _10_datBaixaUsuari IS NULL;

UPDATE jugador SET _02_faceJug    = "jjsalas@hotmail.com",
						 _03_twitterJug = "@jjsalas",
						 _05_datModJug  = NOW()
WHERE 
		_06_datBaixaJug IS NULL AND
		(_01_pk_idJug IN ( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
		WHERE _04_loginUsuari = "joan"));

select * from usuari;
select * from jugador;
COMMIT;
*/

/***********************************************************************************************/
/* 2.a.3 - 5023 - baixa perfil usuari / jugador */
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


/*  ejemplo

START TRANSACTION;
UPDATE usuari SET _10_datBaixaUsuari = NOW()
WHERE 
	_10_datBaixaUsuari IS NULL AND
	_04_loginUsuari = "joan"
	

UPDATE jugador SET _06_datBaixaJug  = NOW()
WHERE 
		_06_datBaixaJug IS NULL and
		(_01_pk_idJug IN ( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
		WHERE _04_loginUsuari = "joan"));		 

select * from usuari;
select * from jugador;
COMMIT;

*/


/***********************************************************************************************/
/* 2.b.1 - SIN USO torneigs amb els jocs als que está registrat un jugador */
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
		
		BB.loginJug = "miquel";

/*

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
		BB.loginJug = "joan";

*/


/***********************************************************************************************/
/* 2.b.2 - 5041 - torneigs amb els jocs als que está registrat un jugador amb login, el seu nom, el codi i nom de joc */
/***********************************************************************************************/

SELECT _01_pk_idTorn AS recid,_01_pk_idTorn AS idTorn,
_03_nomTorn AS nomTorn,_01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc 
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
		
		_04_loginUsuari = "joan"
		
ORDER BY nomTorn;

/*
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
		_04_loginUsuari = "joan";

*/

/***********************************************************************************************/
/* 2.b.3 - 5050 - PUNTUACIONS. ranking d'un jugador i punts dins del ranking als torneigs registrats */
/****************************************************************************/


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

/***********************************************************************************************/
/* 2.b.4 - 5051 - HISTÒRIC. ranking històric d'un jugador als torneigs registrats finalitzats i en curs */
/****************************************************************************/



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
SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking
FROM CC,
(SELECT CC.idTorn, COUNT(*) AS numRK, group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS FROM CC GROUP BY CC.idTorn) AS XX,
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
WHERE ranking BETWEEN 1 AND 10
GROUP BY idTorn, idJug
ORDER BY idTorn, ranking;

DROP TABLE CC;



/****************************************************************************/
/*  2.b.5 - 5043 - baixa de la inscripció a un torneig per jugador
/****************************************************************************/

UPDATE inscrit SET _06_datBaixaInsc  = NOW()
WHERE 
		_06_datBaixaInsc IS NULL AND
		(_02_pk_idJocInsc IN ( SELECT _02_pk_idJocTorn AS _02_pk_idJocInsc FROM torneig WHERE   
		
		 	/*  canviar pel codi del torneig */	
		 
				_01_pk_idTornInsc = "$idTorneig"

		 )) AND
		 
	/*  canviar pel ID del torneig */
	/* canviar pel login de l'usuari */	
		
		_01_pk_idTornInsc = "$idTorneig" AND
		(_03_pk_idJugInsc IN ( SELECT _01_pk_idUsuari AS _03_pk_idJugInsc FROM usuari
		WHERE _04_loginUsuari = "$login"));

/*

Exemple

UPDATE inscrit SET _06_datBaixaInsc  = NOW()
WHERE 
		_06_datBaixaInsc IS NULL AND
		(_02_pk_idJocInsc IN ( SELECT _02_pk_idJocTorn AS _02_pk_idJocInsc FROM torneig WHERE   
		_01_pk_idTornInsc = 1001 )) AND
		
		_01_pk_idTornInsc = 1001 AND
		
		(_03_pk_idJugInsc IN ( SELECT _01_pk_idUsuari AS _03_pk_idJugInsc FROM usuari
		WHERE _04_loginUsuari = "joan"));

select * from inscrit;


UPDATE inscrit SET _06_datBaixaInsc  = NULL
WHERE 
		_06_datBaixaInsc IS NOT NULL AND
		(_02_pk_idJocInsc IN ( SELECT _02_pk_idJocTorn AS _02_pk_idJocInsc FROM torneig WHERE   
		_01_pk_idTornInsc = 1003 )) AND
		
		_01_pk_idTornInsc = 1003 AND
	
		(_03_pk_idJugInsc IN ( SELECT _01_pk_idUsuari AS _03_pk_idJugInsc FROM usuari
		WHERE _04_loginUsuari = "joan"));

select * from inscrit;

*/

/***********************************************************************************************/
/* 2.c.1 - 5061 - consultar tots els torneigs actius als que es pot registrar un jugador */
/***********************************************************************************************/

SELECT _01_pk_idTorn AS idTorn,_03_nomTorn AS nomTorn, _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc,
_04_premiTorn AS premiTorn, _05_datIniTorn AS dataIniTorn, _06_datFinTorn AS dataFinTorn

FROM torneig
INNER JOIN joc ON _02_pk_idJocTorn = _01_pk_idJoc
WHERE 
		_09_datBaixaTorn IS NULL AND
		_06_datFinTorn >= CURDATE() AND
		_01_pk_idTorn NOT IN
(SELECT _01_pk_idTorn
FROM usuari
LEFT JOIN jugador  ON _01_pk_idUsuari = _01_pk_idJug
LEFT JOIN inscrit  ON _01_pk_idJug    = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )

	/* canviar pel login de l'usuari */	

WHERE _04_loginUsuari = "$login"
GROUP BY _01_pk_idTorn)

ORDER BY _05_datIniTorn;


/***********************************************************************************************/
/* 2.c.2 - 5070 - PUNTUACIONS. ranking i punts dins del ranking dels torneigs que està inscrit el jugador  */
/****************************************************************************/


CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idTorn AS idTorn,_03_nomTorn AS nomTorn, idJoc, aa.nomJoc,_03_pk_idJugRonda AS idJug ,
BB.nomJug, BB.loginJug, SUM(_07_puntsRonda) AS punts, IF(BB.nomJug = "rob",_01_pk_idTorn,"0") AS idTornInscrit

FROM 

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

SELECT * 

FROM
(
SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking

FROM 
	CC,
	(SELECT CC.idTorn,
			  COUNT(*) AS numRK,
			  group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS,
	   	  group_concat(CC.idTornInscrit ORDER BY CC.idTornInscrit DESC) AS LLISTA_TORNS
	FROM CC
	GROUP BY CC.idTorn
	) AS XX,

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
		SUBSTRING_INDEX(XX.LLISTA_TORNS, ',', 1)>0 AND
		_06_datFinTorn   >= CURDATE()
		
) AS ZZ
WHERE ranking BETWEEN 1 AND 10
GROUP BY idTorn, idJug
ORDER BY idTorn, ranking;

DROP TABLE CC;


/* select * from cc; 
*/



/***********************************************************************************************/
/* 2.c.3 - 5071 - HISTÒRIC. ranking històric d'un torneig finalitzats i en curs */
/****************************************************************************/


CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idTorn AS idTorn,_03_nomTorn AS nomTorn, idJoc, aa.nomJoc,_03_pk_idJugRonda AS idJug ,
BB.nomJug, BB.loginJug, SUM(_07_puntsRonda) AS punts, IF(BB.nomJug = "rob",_01_pk_idTorn,"0") AS idTornInscrit
FROM 
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
SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking
FROM CC,
(SELECT CC.idTorn,
		  COUNT(*) AS numRK,
		  group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS,
		  group_concat(CC.idTornInscrit ORDER BY CC.idTornInscrit DESC) AS LLISTA_TORNS
		  FROM CC GROUP BY CC.idTorn) AS XX,
jugador
LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
WHERE 
		_06_datBaixaJug  IS NULL AND
		_09_datBaixaTorn IS NULL AND
		CC.idJug = _01_pk_idJug AND
		SUBSTRING_INDEX(XX.LLISTA_TORNS, ',', 1)>0 AND		
		CC.idTorn = XX.idTorn	
) AS ZZ
WHERE ranking BETWEEN 1 AND 10
GROUP BY idTorn, idJug
ORDER BY idTorn, ranking;

DROP TABLE CC;



/***********************************************************************************************/
/* 2.c.4 - 5063 - apuntar-se a un torneig  */
/***********************************************************************************************/

	/* canviar pel login de l'usuari */	

SELECT _01_pk_idUsuari INTO @IDJUG FROM usuari WHERE _04_loginUsuari = "$login";

INSERT INTO inscrit (_00_pk_idInsc_auto,_01_pk_idTornInsc,_02_pk_idJocInsc,_03_pk_idJugInsc,_04_datAltaInsc)
VALUES (NULL,"$idTorn","$idJoc",@IDJUG,NOW());


/*

SELECT _01_pk_idUsuari INTO @idJug FROM usuari WHERE _04_loginUsuari = "joan";

INSERT INTO inscrit (_00_pk_idInsc_auto,_01_pk_idTornInsc,_02_pk_idJocInsc,_03_pk_idJugInsc,_04_datAltaInsc)
VALUES (NULL,"1006","103",@idJug,NOW());
select * from inscrit;
*/



