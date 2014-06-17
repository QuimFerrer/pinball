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
/*** anul.lar / bloquejar  partides   */
/************************************************************************************/

SELECT _01_pk_idTorn as idTorn,_03_nomTorn as nomTorn, idJoc, aa.nomJoc,_03_pk_idJugRonda as idJug ,
BB.nomJug, BB.loginJug, R.* FROM
(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS AA,
(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug, _04_loginUsuari AS loginJug FROM usuari) AS BB,
torneig
LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
INNER JOIN partida AS P ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  _03_pk_idJocTTP = _02_pk_idJocPart AND
							  _04_pk_idJugTTP = _03_pk_idJugPart )
INNER JOIN ronda AS R ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 _04_pk_idDatHorPart = _04_pk_idDatHorPartRonda )
WHERE 
		loginJug <> "admin" AND
		_02_pk_idJocTorn  = AA.idJoc AND
		_03_pk_idJugRonda = BB.idUsuari AND
		_06_datBaixaPart IS NULL AND
		_06_datFinTorn   >= DATE(_04_pk_idDatHorPart) AND
		
		/* canviar $data Y-n-j ( 2014-06-15 ) per Data CURRENT */
				
		_06_datFinTorn   >= "2014-06-15"
		
GROUP BY _01_pk_idTorn,_03_pk_idJugRonda
ORDER BY _01_pk_idTorn;
