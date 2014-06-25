/***********************************************************************************************/
/* 3.a.1 - consulta perfil administrador / usuari */
/***********************************************************************************************/


SELECT _01_pk_idUsuari AS idUsr,_02_nomUsuari AS nomUsr,_03_cognomUsuari AS cogUsr,
_04_loginUsuari AS loginUsr, _05_pwdUsuari AS passwordUsr, _06_emailUsuari AS emailUsr,
_07_fotoUsuari AS fotoUsr, _02_faceAdm AS facebookAdm, _03_twitterAdm AS twitterAdm
FROM usuari
LEFT JOIN admin ON _01_pk_idUsuari = _01_pk_idAdm
WHERE
	_10_datBaixaUsuari IS NULL AND
	_06_datBaixaAdm    IS NULL AND
	_04_loginUsuari = "admin";


/***********************************************************************************************/
/* 3.a.2 - modificacio perfil administrador */
/***********************************************************************************************/

/* canviar variables amb $ per valors */

START TRANSACTION;
UPDATE usuari SET _02_nomUsuari     = "$nom",
						_03_cognomUsuari  = "$cognom",
						_06_emailUsuari   = "$email",
						_07_fotoUsuari    = "$nomFoto",
						_08_datAltaUsuari = "$dataAltaUsuari",						
						_09_datModUsuari  = NOW()
WHERE
		_10_datBaixaUsuari IS NULL AND
		_04_loginUsuari = "admin";


/* canviar variables amb $ per valors */


UPDATE admin SET   _02_faceAdm    = "$facebook",
						 _03_twitterAdm = "$twitter",
						 _04_datAltaAdm = "$dataAltaAdm",	
						 _05_datModAdm  = NOW()
WHERE 
		_06_datBaixaAdm IS NULL AND
		(_01_pk_idAdm IN ( SELECT _01_pk_idUsuari AS _01_pk_idAdm FROM usuari
		WHERE _04_loginUsuari = "admin"));
		
COMMIT;

/* ejemplo

START TRANSACTION;
UPDATE usuari SET _02_nomUsuari    = "admin",
						_03_cognomUsuari = "admin",
						_06_emailUsuari  = "admin@gmail.com",
						_07_fotoUsuari   = 'admin.jpg',
						_09_datModUsuari = NOW()
WHERE
		_10_datBaixaUsuari IS NULL AND
		_04_loginUsuari = "admin";


UPDATE admin SET   _02_faceAdm    = "adminfacebook",
						 _03_twitterAdm = "@adminpinball",
						 _05_datModAdm  = NOW()
WHERE 
		_06_datBaixaAdm IS NULL AND
		(_01_pk_idAdm IN ( SELECT _01_pk_idUsuari AS _01_pk_idAdm FROM usuari
		WHERE _04_loginUsuari = "admin"));
		
select * from usuari;
select * from admin;
COMMIT;

*/


/************************************************************************************/
/* 3.b.1 - llistar partides   */
/************************************************************************************/

SELECT _01_pk_idTorn AS idTorn, P.* FROM partida AS P, torneig
WHERE
	(_03_pk_idJugPart IN ( SELECT _01_pk_idUsuari AS _03_pk_idJugPart FROM usuari

	/* canviar pel login de l'usuari */	

		WHERE _04_loginUsuari = "$login")) AND
		P._06_datBaixaPart IS NULL
		GROUP BY _00_pk_idPart_auto;


/*
SELECT _01_pk_idTorn AS idTorn, P.* FROM partida AS P, torneig
WHERE
	(_03_pk_idJugPart IN ( SELECT _01_pk_idUsuari AS _03_pk_idJugPart FROM usuari


		WHERE _04_loginUsuari = "joan")) AND
		P._06_datBaixaPart IS NULL
		GROUP BY _00_pk_idPart_auto;

*/

/************************************************************************************/
/* 3.b.2 - anul.lar / bloquejar  partides   */
/************************************************************************************/


UPDATE partida SET _06_datBaixaPart  = NOW()
WHERE 
		_06_datBaixaPart IS NULL AND
		
		 	/*  canviar pel id de partida */	
		 	
		_00_pk_idPart_auto = "$idPartida";

/*
SELECT * FROM PARTIDA;
UPDATE partida SET _06_datBaixaPart  = NOW()
WHERE 
		_06_datBaixaPart IS NULL AND
		_00_pk_idPart_auto = "1";
SELECT * FROM PARTIDA;

*/

/************************************************************************************/
/* 3.b.3 - desanul.lar / desbloquejar  partides   */
/************************************************************************************/

UPDATE partida SET _06_datBaixaPart  = NULL
WHERE 
		_06_datBaixaPart IS NOT NULL AND
		
		 	/*  canviar pel id de partida */	
		 	
		_00_pk_idPart_auto = "$idPartida";

/*

UPDATE partida SET _06_datBaixaPart  = NULL
WHERE 
		_06_datBaixaPart IS NOT NULL AND
		_00_pk_idPart_auto = "1";

*/


/************************************************************************************/
/* 3.c.1 - llistat de jocs   */
/************************************************************************************/

SELECT * FROM joc
WHERE _08_datBaixaJoc IS NULL;


/************************************************************************************/
/* 3.c.2 - llistat de jocs històric  */
/************************************************************************************/

SELECT * FROM joc;

/************************************************************************************/
/* 3.c.3 - alta d'un joc   */
/************************************************************************************/

/* canviar les variables */

INSERT INTO joc VALUES (NULL,"$nomJoc","$descJoc","$imgJoc",0,NOW(),NULL,NULL);

/*
SELECT * FROM joC;
INSERT INTO joc VALUES (NULL,"ABC","DEF","DDD.JPG",0,NOW(),NULL,NULL);
SELECT * FROM joC;

*/


/************************************************************************************/
/* 3.c.4 - baixa d'un joc   */
/************************************************************************************/


UPDATE joc SET _08_datBaixaJoc = NOW()

WHERE 

/* canviar variables per valors  */

		_01_pk_idJoc = "$idJoc" AND
		_08_datBaixaJoc IS NULL;

/*

UPDATE joc SET _08_datBaixaJoc = NOW()

WHERE 
		_01_pk_idJoc = "104" AND
		_08_datBaixaJoc IS NULL;
SELECT * FROM JOC;
*/

/************************************************************************************/
/* 3.c.5 - modificació d'un joc   */
/************************************************************************************/

/* canviar variables per valors  */

UPDATE joc SET  	  _02_nomJoc      = "$nomJoc",
						  _03_descJoc     = "$descJoc",
						  _04_imgJoc      = "$imgJoc",
						  _06_datAltaJoc  = "$dataAltaJoc",
						  _07_datModJoc   = NOW(),
						  _08_datBaixaJoc = "$dataBaixaJoc"						  

WHERE _01_pk_idJoc = "$idJoc";

/*

UPDATE joc SET  	  _02_nomJoc      = "RRRTTT",
						  _03_descJoc     = "HGJ",
						  _04_imgJoc      = "ABV.JPG",
						  _06_datAltaJoc  = "2014-06-22 10:10:10",
						  _07_datModJoc   = NOW(),
						  _08_datBaixaJoc = NULL				  

WHERE _01_pk_idJoc = "106";
SELECT * FROM JOC;

*/

/************************************************************************************/
/* 3.c.6 - actualització de partides jugades a un joc   */
/************************************************************************************/

/* canviar variables per valors  */

UPDATE joc SET _05_numPartidesJugadesJoc = "$partides",
					_07_datModJoc = NOW()

WHERE 
		_01_pk_idJoc = "$idJoc" AND
		_08_datBaixaJoc IS NULL;
		
/*

UPDATE joc SET _05_numPartidesJugadesJoc = "8",
					_07_datModJoc = NOW()

WHERE 
		_01_pk_idJoc = "106" AND
		_08_datBaixaJoc IS NULL;
SELECT * FROM JOC;

*/

/************************************************************************************/
/*  3.c.7 - Llistat de màquines amb els jocs que té assignats amb num de partides jugades i crédits   */
/************************************************************************************/

SELECT _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc, _01_pk_idMaq AS idMaq, _02_macMaq AS macMaq,
_03_numPartidesJugadesMaqInst AS numPartides, _05_totCredJocMaqInst AS totalCredit

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq

WHERE 	
	_08_datBaixaJoc      IS NULL AND
	_08_datBaixaMaqInst  IS NULL AND
	_08_datBaixaMaq      IS NULL
	
GROUP BY idJoc,idMaq
ORDER BY idJoc,idMaq;


/***********************************************************************************************/
/* 3.d.1 - llistat de torneigs amb el premi, codi de joc i máquines que tenen instal.lat el joc */
/***********************************************************************************************/

SELECT _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _04_premiTorn AS premiTorn, _01_pk_idJoc AS idJoc,
_05_datIniTorn AS datIniTorn,_06_datFinTorn AS datFinTorn, _01_pk_idMaq AS idMaq, _02_macMaq as macMaq,
_09_datBaixaTorn AS dataBaixaTorn
FROM torneig

LEFT JOIN joc         ON _02_pk_idJocTorn = _01_pk_idJoc
INNER JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
INNER JOIN maquina    ON _01_pk_idMaqInst = _01_pk_idMaq

GROUP BY _01_pk_idTorn,_01_pk_idMaq;


/************************************************************************************/
/*  3.d.2 - alta d'un torneig   */
/************************************************************************************/

/* canviar les variables */

INSERT INTO torneig 
VALUES (NULL,"$idJoc","$nomTorn","$premiTorn","$dataIniciTorn","$dataFinTorn",NOW(),NULL,NULL);


/*
INSERT INTO torneig 
VALUES (NULL,"103","MI CASA","1100","2014-06-10","2014-07-23",NOW(),NULL,NULL);
SELECT * FROM TORNEIG;
*/

/************************************************************************************/
/*  3.d.3 - Baixa d'un torneig   */
/************************************************************************************/


UPDATE torneig SET _09_datBaixaTorn = NOW()

WHERE 

/* canviar variables per valors  */

		_01_pk_idTorn    = "$idTorn" AND
		_02_pk_idJocTorn = "$idJoc" AND
		_09_datBaixaTorn IS NULL;


/*

UPDATE torneig SET _09_datBaixaTorn = NOW()

WHERE 

		_01_pk_idTorn    = "1006" AND
		_02_pk_idJocTorn = "103" AND
		_09_datBaixaTorn IS NULL;
SELECT * FROM TORNEIG;
*/

/************************************************************************************/
/*  3.d.4 - Modificació d'un torneig   */
/************************************************************************************/

/* canviar variables per valors  */

UPDATE torneig SET _03_nomTorn     = "$nomTorn",
					    _04_premiTorn   = "$premiTorn",
		   	       _05_datIniTorn  = "$dataIniTorn",
						 _06_datFinTorn  = "$dataFinTorn",
						 _07_datAltaTorn = "$dataAltaTorn",
						 _08_datModTorn  = NOW(),
						 _09_datBaixaTorn = "$dataBaixaTorn"						 

WHERE 
		_01_pk_idTorn    = "$idTorn" AND
		_02_pk_idJocTorn = "$idJoc";

/*
UPDATE torneig SET _03_nomTorn     = "MI PISO",
					    _04_premiTorn   = "2200",
		   	       _05_datIniTorn  = "2014-05-10",
						 _06_datFinTorn  = "2014-07-22",
						 _07_datAltaTorn = "2014-05-05 10:10:10",
						 _08_datModTorn  = NOW(),
						 _09_datBaixaTorn = NULL					 

WHERE 
		_01_pk_idTorn    = "1006" AND
		_02_pk_idJocTorn = "103";
SELECT * FROM TORNEIG;
*/

/***********************************************************************************************/
/* 3.d.5 - llistat de torneigs amb els jugadors registrats amb el seu nom, el codi de joc i el nom del joc */
/* incloent els torneigs amb cap jugador registrat
/***********************************************************************************************/

SELECT _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _04_premiTorn AS premiTorn, _02_pk_idJocTorn AS idJoc,
_01_pk_idJug AS idJug,_02_nomUsuari AS nomJug,_05_datIniTorn AS datIniTorn,_06_datFinTorn AS datFinTorn

FROM torneig
LEFT JOIN inscrit  ON (_01_pk_idTorn = _01_pk_idTornInsc  AND _02_pk_idJocTorn = _02_pk_idJocInsc )
LEFT JOIN jugador ON _01_pk_idJug  = _03_pk_idJugInsc
LEFT JOIN usuari  ON _01_pk_idJug  = _01_pk_idUsuari

WHERE 
	_09_datBaixaTorn   IS NULL AND
	_10_datBaixaUsuari IS NULL
	
ORDER BY idTorn;


/***********************************************************************************************/
/* 3.d.6 - llistat de torneigs amb els jugadors registrats amb el seu nom, el codi de joc i el nom del joc */
/* incloent els torneigs amb cap jugador registrat. Històric
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
/* 3.d.7 - llistat de torneigs amb el premi, codi de joc i máquines que tenen instal.lat el joc */
/* i els jugadors registrats a cada torneig amb les partides, rondes i punts obtinguts */
/***********************************************************************************************/

SELECT _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _04_premiTorn AS premiTorn,
_02_pk_idJocTorn AS idJoc, _02_pk_idMaqTTP AS idMaq, BB.idUsuari, BB.nomJug,
_05_pk_idRonda AS rondaPart, _07_puntsRonda AS punts,_04_pk_idDatHoraPart AS dataHoraPartida,
_05_datIniTorn AS datIniTorn,_06_datFinTorn AS datFinTorn
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

WHERE 
	_09_datBaixaTorn IS NULL AND
	_06_datBaixaPart IS NULL
	
GROUP BY idTorn,idMaq,idUsuari,dataHoraPartida,rondaPart
ORDER BY idTorn,idMaq,idUsuari,dataHoraPartida,rondaPart;


/***********************************************************************************************/
/* 3.d.8 - llistat de torneigs amb el premi, codi de joc i máquines que tenen instal.lat el joc */
/* i els jugadors registrats a cada torneig amb les partides, rondes i punts obtinguts. Històric */
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


