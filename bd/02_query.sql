/***********************************************************************************************/
/* consulta perfil administrador / usuari */
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
/* modificacio perfil administrador */
/***********************************************************************************************/

/* canviar variables amb $ per valors */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

START TRANSACTION;
UPDATE usuari SET _02_nomUsuari    = '$nom',
						_03_cognomUsuari = '$cognom',
						_06_emailUsuari  = '$email',
						_07_fotoUsuari   = '$nomFoto',
						_09_datModUsuari = '$dataTime'
WHERE
		_10_datBaixaUsuari IS NULL AND
		_04_loginUsuari = "admin";


UPDATE admin SET   _02_faceAdm    = '$facebook',
						 _03_twitterAdm = '$twitter',
						 _05_datModAdm  = '$dataTime'
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
						_09_datModUsuari = "2014-06-16 12:12:12"
WHERE
		_10_datBaixaUsuari IS NULL AND
		_04_loginUsuari = "admin";


UPDATE admin SET   _02_faceAdm    = "adminfacebook",
						 _03_twitterAdm = "@adminpinball",
						 _05_datModAdm  = "2014-06-16 12:12:12"
WHERE 
		_06_datBaixaAdm IS NULL AND
		(_01_pk_idAdm IN ( SELECT _01_pk_idUsuari AS _01_pk_idAdm FROM usuari
		WHERE _04_loginUsuari = "admin"));
		
select * from usuari;
select * from admin;
COMMIT;

*/


/************************************************************************************/
/*** llistar partides   */
/************************************************************************************/

SELECT _01_pk_idTorn AS idTorn, P.* FROM partida AS P, torneig
WHERE
	(_03_pk_idJugPart IN ( SELECT _01_pk_idUsuari AS _03_pk_idJugPart FROM usuari

	/* canviar pel login de l'usuari */	

		WHERE _04_loginUsuari = "$login"))
		GROUP BY _00_pk_idPart_auto;


/************************************************************************************/
/*** anul.lar / bloquejar  partides   */
/************************************************************************************/

	/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE partida SET _06_datBaixaPart  = "$dataTime"
WHERE 
		_06_datBaixaPart IS NULL AND
		
		 	/*  canviar pel id de partida */	
		 	
		_00_pk_idPart_auto = "$idPartida";

/************************************************************************************/
/*** desanul.lar / desbloquejar  partides   */
/************************************************************************************/

UPDATE partida SET _06_datBaixaPart  = NULL
WHERE 
		_06_datBaixaPart IS NOT NULL AND
		
		 	/*  canviar pel id de partida */	
		 	
		_00_pk_idPart_auto = "$idPartida";



/************************************************************************************/
/*** llistat de JOCS   */
/************************************************************************************/

SELECT * FROM joc;

/************************************************************************************/
/*** ALTA d'UN JOC   */
/************************************************************************************/

/* canviar les variables */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

INSERT INTO joc VALUES (NULL,$nomJoc,$descJoc,$imgJoc,0,$dataTime,NULL,NULL);


/************************************************************************************/
/*** BAIXA d'UN JOC   */
/************************************************************************************/

/* canviar variables per valors  */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE FROM joc SET _08_datBaixaJoc = "$dataTime"

WHERE 
		_01_pk_idJoc = "$idJoc" AND
		_08_datBaixaJoc IS NOT NULL;



/************************************************************************************/
/*** MODIFICACIO d'UN JOC   */
/************************************************************************************/

/* canviar variables per valors  */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE FROM joc SET _02_nomJoc    = "$nomJoc",
						  _03_descJoc   = "$descJoc",
						  _04_imgJoc    = "$imgJoc",
						  _07_datModJoc = "$dataTime"

WHERE _01_pk_idJoc = "$idJoc";


/************************************************************************************/
/*** ACTUALITZACIÓ DE PARTIDES JUGADES A UN JOC   */
/************************************************************************************/

/* canviar variables per valors  */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE joc SET _05_numPartidesJugadesJoc = "$partides",
						  _07_datModJoc = "$dataTime"

WHERE 
		_01_pk_idJoc = "$idJoc" AND
		_08_datBaixaJoc IS NULL;
		
		


