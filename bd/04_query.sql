
/***********************************************************************************************/
/* llistat de totes les màquines informat de la seva ubicació, jocs instal.lats, credits totals, etc. */
/***********************************************************************************************/


SELECT MAQ._01_pk_idMaq AS idMaq, MAQ._02_macMaq AS macMaq, MAQ._03_propMaq AS propMaq,
_01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc, AA._01_pk_idUbic AS idUbic,
AA._03_empUbic AS empUbic, AA._05_pobUbic AS pobUbic, AA._07_provUbic AS provUbic,
MAQ._06_datAltaMaq AS dataAltaMaq, MAQ._08_datBaixaMaq AS dataBaixaMaq

FROM
(SELECT * FROM ubicacio INNER JOIN maquina ON _02_pk_idMaqUbic = _01_pk_idMaq) AS AA,

maquina AS MAQ
LEFT  JOIN maqInstall ON ( MAQ._01_pk_idMaq = _01_pk_idMaqInst)
INNER JOIN joc        ON ( _02_pk_idJocInst = _01_pk_idJoc)

WHERE 
	AA._02_pk_idMaqUbic  = MAQ._01_pk_idMaq

GROUP BY idMaq, idUbic, idJoc;


/************************************************************************************/
/*** ALTA de MAQUINA   */
/************************************************************************************/

/* canviar les variables */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

INSERT INTO maquina 
VALUES (NULL,$macMaq,$propMaq,0,0,$dataTime,NULL,NULL);


/************************************************************************************/
/*** BAIXA d'UNA màquina   */
/************************************************************************************/

/* canviar variables per valors  */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE FROM maquina SET _08_datBaixaMaq = "$dataTime"

WHERE 
		_01_pk_idMaq = "$idMaq" AND
		_08_datBaixaMaq IS NOT NULL;



/************************************************************************************/
/*** MODIFICACIO d'UNA Máquina  */
/************************************************************************************/

/* canviar variables per valors  */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE FROM maquina SET _02_macMaq      = "$macMaq",
						      _03_propMaq     = "$propMaq",
						      _04_credMaq     = "$credMaq",
						      _05_totCredMaq  = "$totCredMaq",
						      _06_datAltMaq   = "$dataAltaMaq",
						      _07_datModMaq   = "$dataTime"

WHERE 
		_01_pk_idMaq    = "$idMaq";



/************************************************************************************/
/*** Actualització recaudació d'UNA Máquina  */
/************************************************************************************/

/* canviar variables per valors  */
/* canviar $dataTime Y-n-j H:i:s ( 2014-06-15 10:10:10 ) per Data CURRENT */

UPDATE FROM maquina SET _04_credMaq     = "$credMaq",
						      _05_totCredMaq  = _05_totCredMaq + "$credMaq",
						      _07_datModMaq   = "$dataTime"

WHERE 
		_01_pk_idMaq    = "$idMaq";


/***********************************************************************************************/
/* llistat de totes les màquines informat la recaudació de cada màquina amb ranking i totals*/
/***********************************************************************************************/

/*
SELECT _01_pk_idMaq AS idMaq, _02_macMaq AS macMaq, _03_propMaq AS propMaq,
_05_totCredMaq AS totalCreditMaq

FROM maquina

WHERE  _08_datBaixaMaq IS NULL

GROUP BY idMaq

UNION

SELECT "" AS idMaq, "TOTAL" AS macMaq, "RECAUDACIÓ" AS propMaq,
SUM(_05_totCredMaq) AS totalCreditMaq

FROM maquina

*/


START TRANSACTION;
CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idMaq AS idMaq, _02_macMaq AS macMaq, _03_propMaq AS propMaq,
_05_totCredMaq AS totalCreditMaq

FROM maquina

WHERE  _08_datBaixaMaq IS NULL

GROUP BY idMaq
ORDER BY totalCreditMaq DESC;

SELECT * FROM CC
UNION
SELECT "" AS idMaq, "TOTAL" AS macMaq, "RECAUDACIÓ" AS propMaq,
SUM(_05_totCredMaq) AS totalCreditMaq

FROM maquina;
DROP TABLE CC;
COMMIT;

/***********************************************************************************************/
/* llistat de recaudació per cada joc amd ranking i totals*/
/***********************************************************************************************/

/*
SELECT _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc, SUM(_04_totCredJocMaqInst) AS totalCreditJoc

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc = _02_pk_idJocInst
INNER JOIN maquina ON _01_pk_idMaqInst = _01_pk_idMaq

GROUP BY idJoc
ORDER BY idJoc,_01_pk_idMaq;

*/


START TRANSACTION;
CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc, SUM(_04_totCredJocMaqInst) AS totalCreditJoc

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc = _02_pk_idJocInst
INNER JOIN maquina ON _01_pk_idMaqInst = _01_pk_idMaq

GROUP BY idJoc;

SELECT * FROM CC
UNION
SELECT "" AS idJoc, "TOTAL RECAUDACIÓ" AS nomJoc, SUM(totalCreditJoc) AS totalCreditJoc

FROM CC

ORDER BY totalCreditJoc;

DROP TABLE CC;
COMMIT;


/***********************************************************************************************/
/* llistat de recaudació per cada joc i màquina*/
/***********************************************************************************************/

SELECT _01_pk_idJoc AS idJoc, _01_pk_idMaq AS idMaq, _02_macMaq as macMaq,
_04_totCredJocMaqInst AS totalCreditJocMaq

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc = _02_pk_idJocInst
INNER JOIN maquina ON _01_pk_idMaqInst = _01_pk_idMaq

ORDER BY idJoc,idMaq;


