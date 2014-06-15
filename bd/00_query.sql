/***********************************************************************************************/
/* consulta perfil jugador / usuari */
/***********************************************************************************************/


SELECT _01_pk_idUsuari AS idUsr,_02_nomUsuari AS nomUsr,_03_cognomUsuari AS cogUsr,
_04_loginUsuari AS loginUsr, _05_pwdUsuari AS passwordUsr, _06_emailUsuari AS emailUsr,
_07_fotoUsuari AS fotoUsr, _02_faceJug AS facebookUsr, _03_twitterJug AS twitterUsr
FROM usuari
LEFT JOIN jugador ON _01_pk_idUsuari = _01_pk_idJug
WHERE
	_10_datBaixaUsuari IS NULL AND
	
	/* canviar pel codi del usuari */
	
	_01_pk_idUsuari = 2;


/***********************************************************************************************/
/* modificacio perfil jugador */
/***********************************************************************************************/

/* canviar variables amb $ per valors */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

START TRANSACTION;
UPDATE usuari SET _02_nomUsuari    = '$nom',
						_03_cognomUsuari = '$cognom',
						_05_pwdUsuari    = '$password',
						_06_emailUsuari  = '$email',						
						_07_fotoUsuari   = '$nomFoto',
						_09_datModUsuari = '$dataTime'
WHERE
		_10_datBaixaUsuari IS NULL AND
		
		/*  canviar pel codi del jugador */		
		
		_01_pk_idUsuari = 2;


UPDATE jugador SET _02_faceJug    = '$facebook',
						 _03_twitterJug = '$twitter',
						 _05_datModJug  = '$dataTime'
WHERE 
		_06_datBaixaJug IS NULL AND

		/*  canviar pel codi del jugador */		

		_01_pk_idJug = 2;
		
COMMIT;

/* ejemplo

START TRANSACTION;
UPDATE usuari SET _02_nomUsuari    = "joan josep",
						_03_cognomUsuari = "salas torres",
						_05_pwdUsuari    = "joan",
						_06_emailUsuari  = "joanjosep@gmail.com",						
						_07_fotoUsuari   = "jjsalas.jpg",
						_09_datModUsuari = "2014-06-15 12:11:11"
WHERE _01_pk_idUsuari = 2 and _10_datBaixaUsuari IS NULL;

UPDATE jugador SET _02_faceJug    = "jjsalas@hotmail.com",
						 _03_twitterJug = "@jjsalas",
						 _05_datModJug  = "2014-06-15 12:11:11"
WHERE _01_pk_idJug = 2 and _06_datBaixaJug IS NULL;

SELECT _01_pk_idUsuari,_02_nomUsuari,_03_cognomUsuari,_04_loginUsuari,_05_pwdUsuari,_06_emailUsuari,_07_fotoUsuari,
_02_faceJug,_03_twitterJug
from usuari as u
left join jugador as j on _01_pk_idUsuari = _01_pk_idJug
WHERE _01_pk_idUsuari = 2 and _10_datBaixaUsuari IS NULL;
COMMIT;
*/

/***********************************************************************************************/
/* baixa perfil usuari / jugador */
/***********************************************************************************************/

/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

START TRANSACTION;
UPDATE usuari SET _10_datBaixaUsuari = "$dataTime"
WHERE 
		_10_datBaixaUsuari IS NULL AND
		
		/*  canviar pel codi del jugador */			
		
		_01_pk_idUsuari = 2;

UPDATE jugador SET _06_datBaixaJug  = "$dataTime"
WHERE
		 _06_datBaixaJug IS NULL AND

		/*  canviar pel codi del jugador */	

		_01_pk_idJug = 2;
COMMIT;

/*  ejemplo

START TRANSACTION;
UPDATE usuari SET _10_datBaixaUsuari = "2014-06-15 13:10:20"
WHERE _01_pk_idUsuari = 2 and _10_datBaixaUsuari IS NULL;

UPDATE jugador SET _06_datBaixaJug  = "2014-06-15 13:10:20"
WHERE _01_pk_idJug = 2 and _06_datBaixaJug IS NULL;
COMMIT;

*/

