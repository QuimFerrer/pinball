/************************************************************************************/
/*  3.e.i.1 - 3410 - ALTA de MAQUINA   */
/************************************************************************************/

/* canviar les variables */

INSERT INTO maquina 
VALUES (NULL,"$macMaq","$propMaq",0,0,NOW(),NULL,NULL);

/*
INSERT INTO maquina 
VALUES (NULL,"abc","Josep Perez",0,0,NOW(),NULL,NULL);

select * from maquina;
*/
/************************************************************************************/
/*  3.e.i.2 - 3420 - BAIXA d'UNA màquina   */
/* implica donar de bloquejar tots els jocs d'aquella màquina */
/************************************************************************************/

/* canviar variables per valors  */

UPDATE maquina SET _08_datBaixaMaq = NOW()

WHERE 
		_01_pk_idMaq = "$idMaq" AND
		_08_datBaixaMaq IS NULL;

UPDATE maqinstall SET _08_datBaixaMaqInst = NOW()

WHERE 
		_01_pk_idMaqInst = "$idMaq" AND
		_08_datBaixaMaqInst IS NULL;


/*
SELECT * FROM MAQUINA;
UPDATE maquina SET _08_datBaixaMaq = NOW()

WHERE 
		_01_pk_idMaq = "51" AND
		_08_datBaixaMaq IS NULL;

*/

/************************************************************************************/
/* 3.e.i.3 -  3425 - MODIFICACIO d'UNA Máquina  */
/************************************************************************************/

/* canviar variables per valors  */

UPDATE maquina SET      _02_macMaq      = "$macMaq",
						      _03_propMaq     = "$propMaq",
						      _04_credMaq     = "$credMaq",
						      _05_totCredMaq  = "$totCredMaq",
						      _06_datAltaMaq  = "$dataAltaMaq",
						      _07_datModMaq   = NOW(),
								_08_datBaixaMaq = "$dataBaixaMaq"						      

WHERE 
		_01_pk_idMaq    = "$idMaq";

/*
SELECT * FROM MAQUINA;
UPDATE maquina SET      _02_macMaq      = "DEF",
						      _03_propMaq     = "Josep Perez Guijosa",
						      _04_credMaq     = "10",
						      _05_totCredMaq  = "10",
						      _06_datAltaMaq  = "2014-06-22 10:10:10",
						      _07_datModMaq   = NOW(),
								_08_datBaixaMaq = NULL

WHERE 
		_01_pk_idMaq    = "51";
SELECT * FROM MAQUINA;

*/

/************************************************************************************/
/* 3.e.i.4 - 3430 - Actualització recaudació d'una Máquina  */
/************************************************************************************/

/* canviar variables per valors  */

UPDATE maquina SET      _04_credMaq     = "$credMaq",
						      _05_totCredMaq  = _05_totCredMaq + "$credMaq",
						      _07_datModMaq   = NOW()

WHERE 
		_01_pk_idMaq    = "$idMaq" AND
		_08_datBaixaMaq IS NULL;

/*
SELECT * FROM MAQUINA;
UPDATE maquina SET      _04_credMaq     = "100",
						      _05_totCredMaq  = _05_totCredMaq + "100",
						      _07_datModMaq   = NOW()

WHERE 
		_01_pk_idMaq    = "51" AND
		_08_datBaixaMaq IS NULL;
SELECT * FROM MAQUINA;

*/


/***********************************************************************************************/
/* 3.e.i.5 - 3440 - llistat de totes les màquines informat de la seva ubicació, jocs instal.lats, credits totals, etc. */
/***********************************************************************************************/


SELECT MAQ._01_pk_idMaq AS idMaq, MAQ._02_macMaq AS macMaq, MAQ._03_propMaq AS propMaq,
_01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc, _05_totCredJocMaqInst AS totalCredits,
AA._01_pk_idUbic AS idUbic,
AA._02_empUbic AS empUbic, AA._04_pobUbic AS pobUbic, AA._06_provUbic AS provUbic,
DATE_FORMAT(MAQ._06_datAltaMaq, "%d-%m-%Y") AS datAltaMaq

FROM
(SELECT * FROM ubicacio
INNER JOIN ubicacioTeMaquina ON _01_pk_idUbic = _01_pk_idUbicUTM
INNER JOIN maquina ON _02_pk_idMaqUTM = _01_pk_idMaq) AS AA,

maquina AS MAQ
LEFT  JOIN maqInstall ON ( MAQ._01_pk_idMaq = _01_pk_idMaqInst)
INNER JOIN joc        ON ( _02_pk_idJocInst = _01_pk_idJoc)

WHERE 
	AA._01_pk_idMaq  = MAQ._01_pk_idMaq AND
	AA._08_datBaixaMaq   IS NULL AND
	_16_datBaixaUbic     IS NULL AND
	_08_datBaixaJoc      IS NULL AND
	_05_datBaixaUTM      IS NULL AND
	_08_datBaixaMaqInst  IS NULL

GROUP BY idMaq, idUbic, idJoc;


/***********************************************************************************************/
/* 3.e.i.6 - 3450 - llistat de totes les màquines informat de la seva ubicació, jocs instal.lats,  */
/*         credits totals, etc. Històric*/
/***********************************************************************************************/


SELECT MAQ._01_pk_idMaq AS idMaq, MAQ._02_macMaq AS macMaq, MAQ._03_propMaq AS propMaq,
_01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc, _05_totCredJocMaqInst AS totalCredits,
AA._01_pk_idUbic AS idUbic,
AA._02_empUbic AS empUbic, AA._04_pobUbic AS pobUbic, AA._06_provUbic AS provUbic,
DATE_FORMAT(MAQ._08_datBaixaMaq, "%d-%m-%Y") AS datBaixaMaq

FROM
(SELECT * FROM ubicacio
INNER JOIN ubicacioTeMaquina ON _01_pk_idUbic = _01_pk_idUbicUTM
INNER JOIN maquina ON _02_pk_idMaqUTM = _01_pk_idMaq) AS AA,

maquina AS MAQ
LEFT  JOIN maqInstall ON ( MAQ._01_pk_idMaq = _01_pk_idMaqInst)
INNER JOIN joc        ON ( _02_pk_idJocInst = _01_pk_idJoc)

WHERE 
	AA._01_pk_idMaq  = MAQ._01_pk_idMaq

GROUP BY idMaq, idUbic, idJoc;


/************************************************************************************/
/*  3.e.ii.1 - 3460 - Alta d'assignació de joc a una màquina   */
/************************************************************************************/

/* canviar les variables */

INSERT INTO maqInstall
VALUES (NULL,"$idMaq","$idJoc",0,0,0,NOW(),NULL,NULL);

/*
INSERT INTO maqInstall
VALUES (NULL,"51","102",0,0,0,NOW(),NULL,NULL);

select * from maqInstall;
*/

/************************************************************************************/
/*  3.e.ii.2 - 3470 -Baixa d'assignació de joc a una màquina  */
/************************************************************************************/

/* canviar les variables */

UPDATE maqInstall SET _08_datBaixaMaqInst = NOW()

WHERE 

	_01_pk_idMaqInst  = "$idMaq" AND
	_02_pk_idJocInst  = "$idJoc" AND
	_08_datBaixaMaqInst  IS NULL;

/*

SELECT * FROM MAQINSTALL;
UPDATE maqInstall SET _08_datBaixaMaqInst = NOW()

WHERE 

	_01_pk_idMaqInst  = "51" AND
	_02_pk_idJocInst  = "102" AND
	_08_datBaixaMaqInst  IS NULL;

SELECT * FROM MAQINSTALL;

*/


/************************************************************************************/
/*  3.e.ii.3 - 3480 - Modificació d'assignació de joc a una màquina   */
/************************************************************************************/

/* canviar les variables */

UPDATE maqInstall SET 
									_03_numPartidesJugadesMaqInst    = "$parcialCreditsJoc",
									_04_credJocMaqInst    = "$parcialCreditsJoc",
									_05_totCredJocMaqInst = "$totalCreditsJoc",										
									_06_datAltaMaqInst    = "$dataAltaMaqInst",
									_07_datModMaqInst     = NOW(),
									_08_datBaixaMaqInst   = "$dataBaixaMaqInst"

WHERE 

	_01_pk_idMaqInst = "$idMaq"     AND
	_02_pk_idJocInst = "$idJoc";
	

/*
SELECT * FROM MAQINSTALL;
UPDATE maqInstall SET 
									_03_numPartidesJugadesMaqInst    = "3",
									_04_credJocMaqInst    = "100",
									_05_totCredJocMaqInst = "110",										
									_06_datAltaMaqInst    = "2014-06-22 10:10:10",
									_07_datModMaqInst     = NOW(),
									_08_datBaixaMaqInst   = NULL

WHERE 

	_01_pk_idMaqInst = "51"     AND
	_02_pk_idJocInst = "102";
SELECT * FROM MAQINSTALL;
*/ 

/************************************************************************************/
/*  3.e.ii.4 - 3480 - Llistat de jocs assignats a cada màquina amb num de partides jugades i crédits  */
/************************************************************************************/

SELECT _01_pk_idMaq AS idMaq, _02_macMaq AS macMaq, _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc,
_03_numPartidesJugadesMaqInst AS numPartides, _05_totCredJocMaqInst AS totalCredits

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq

WHERE 	
	_08_datBaixaJoc      IS NULL AND
	_08_datBaixaMaqInst  IS NULL AND
	_08_datBaixaMaq      IS NULL
	
GROUP BY idMaq,idJoc
ORDER BY idMaq,idJoc;



/***********************************************************************************************/
/* 3.e.iii.1 - 3510 - llistat de totes les màquines informat la recaudació de cada màquina amb ranking i totals*/
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


CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idMaq AS idMaq, _02_macMaq AS macMaq, _03_propMaq AS propMaq,
_05_totCredMaq AS totalCredits

FROM maquina

WHERE  _08_datBaixaMaq IS NULL

GROUP BY idMaq
ORDER BY totalCredits DESC;

SELECT * FROM CC
UNION
SELECT "9999" AS idMaq, "TOTAL" AS macMaq, "RECAUDACIÓ" AS propMaq,
SUM(_05_totCredMaq) AS totalCredits

FROM maquina;
DROP TABLE CC;

/***********************************************************************************************/
/* 3.e.iii.2 - 3520 - llistat de recaudació per cada joc amd ranking i totals*/
/***********************************************************************************************/

/*
SELECT _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc, SUM(_04_totCredJocMaqInst) AS totalCreditJoc

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc = _02_pk_idJocInst
INNER JOIN maquina ON _01_pk_idMaqInst = _01_pk_idMaq

GROUP BY idJoc
ORDER BY idJoc,_01_pk_idMaq;

*/


CREATE TABLE CC  ENGINE=MEMORY
SELECT _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc, SUM(_05_totCredJocMaqInst) AS totalCredits

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq

WHERE 	
	_08_datBaixaJoc      IS NULL AND
	_08_datBaixaMaqInst  IS NULL AND
	_08_datBaixaMaq      IS NULL
	
GROUP BY idJoc
ORDER BY totalCredits;

SELECT * FROM CC
UNION
SELECT "9999" AS idJoc, "TOTAL RECAUDACIÓ" AS nomJoc, SUM(totalCredits) AS totalCredits

FROM CC

ORDER BY totalCredits;

DROP TABLE CC;


/***********************************************************************************************/
/* 3.e.iii.3 - 3530 - llistat de recaudació per cada joc i màquina*/
/***********************************************************************************************/

SELECT _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc,_01_pk_idMaq AS idMaq, _02_macMaq AS macMaq,
_05_totCredJocMaqInst AS totalCredits

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc = _02_pk_idJocInst
INNER JOIN maquina ON _01_pk_idMaqInst = _01_pk_idMaq

WHERE 	
	_08_datBaixaJoc      IS NULL AND
	_08_datBaixaMaqInst  IS NULL AND
	_08_datBaixaMaq      IS NULL
	
ORDER BY idJoc,idMaq;


/***********************************************************************************************/
/* 3.e.iii.4 - 3540 - llistat de recaudació per cada propietari */
/***********************************************************************************************/

SELECT _03_propMaq AS propMaq, SUM(_05_totCredMaq) AS totalCredits

FROM maquina

WHERE 	
	_08_datBaixaMaq  IS NULL

GROUP BY propMAq
ORDER BY propMaq,totalCredits;


/***********************************************************************************************/
/* 3.e.iii.5 - 3550 - llistat de recaudació per cada propietari de màquina*/
/***********************************************************************************************/

SELECT _03_propMaq AS propMaq, _01_pk_idMaq AS idMaq, _02_macMaq AS macMaq,
SUM(_05_totCredMaq) AS totalCredits

FROM maquina

WHERE 	
	_08_datBaixaMaq  IS NULL

GROUP BY propMAq,idMaq
ORDER BY propMaq,idMaq,totalCredits;



/***********************************************************************************************/
/* 3.e.iii.6 - 3560 - llistat de recaudació de cada propietari per cada joc i màquina*/
/***********************************************************************************************/

SELECT _03_propMaq AS propMaq, _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc,_01_pk_idMaq AS idMaq,
_02_macMaq AS macMaq, SUM(_05_totCredJocMaqInst) AS totalCredits

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq

WHERE
	_08_datBaixaJoc      IS NULL AND
	_08_datBaixaMaqInst  IS NULL AND
	_08_datBaixaMaq      IS NULL
	
GROUP BY propMaq, nomJoc, idMaq
ORDER BY propMaq, nomJoc,totalCredits DESC, idMaq;


/***********************************************************************************************/
/* 3.e.iii.7 - 3570 - llistat de recaudació per provincia, poblacio, cp */
/***********************************************************************************************/

SELECT _06_provUbic AS provincia, _04_pobUbic AS poblacio,_05_cpUbic AS cPostal,
SUM(_05_totCredMaq) AS totalCredits

FROM maquina
LEFT JOIN ubicacioTeMaquina ON _01_pk_idMaq = _02_pk_idMaqUTM
INNER JOIN ubicacio ON _01_pk_idUbicUTM = _01_pk_idUbic

WHERE 	
	_08_datBaixaMaq  IS NULL AND
	_05_datBaixaUTM  IS NULL AND	
	_16_datBaixaUbic IS NULL
	
GROUP BY provincia, poblacio, cPostal
ORDER BY provincia, poblacio, cPostal, totalCredits;


/***********************************************************************************************/
/* 3.e.iii.8 - 3580 - llistat de recaudació per poblacio */
/***********************************************************************************************/

SELECT _04_pobUbic AS poblacio, SUM(_05_totCredMaq) AS totalCredits

FROM maquina
LEFT JOIN ubicacioTeMaquina ON _01_pk_idMaq = _02_pk_idMaqUTM
INNER JOIN ubicacio ON _01_pk_idUbicUTM = _01_pk_idUbic

WHERE 	
	_08_datBaixaMaq  IS NULL AND
	_05_datBaixaUTM  IS NULL AND	
	_16_datBaixaUbic IS NULL

GROUP BY poblacio
ORDER BY poblacio, totalCredits;


/***********************************************************************************************/
/* 3.e.iii.9 - 3590 llistat de recaudació per provincia, poblacio, cp de cada màquina*/
/***********************************************************************************************/

SELECT _06_provUbic AS provincia, _04_pobUbic AS poblacio, _05_cpUbic AS cPostal, _01_pk_idMaq AS idMaq,
_02_macMaq AS macMaq, SUM(_05_totCredMaq) AS totalCredits

FROM maquina
LEFT JOIN ubicacioTeMaquina ON _01_pk_idMaq = _02_pk_idMaqUTM
INNER JOIN ubicacio ON _01_pk_idUbicUTM = _01_pk_idUbic

WHERE 	
	_08_datBaixaMaq  IS NULL AND
	_05_datBaixaUTM  IS NULL AND		
	_16_datBaixaUbic IS NULL

GROUP BY provincia, poblacio, cPostal, idMaq
ORDER BY provincia, poblacio, cPostal, idMaq, totalCredits;



/***********************************************************************************************/
/* 3.e.iii.10 - 3600 - llistat de recaudació per joc*/
/***********************************************************************************************/

SELECT _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc,
SUM(_05_totCredJocMaqInst) AS totalCredits

FROM joc
LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq

WHERE 	
	_08_datBaixaJoc      IS NULL AND
	_08_datBaixaMaqInst  IS NULL AND
	_08_datBaixaMaq      IS NULL
	
GROUP BY nomJoc
ORDER BY totalCredits DESC;


/***********************************************************************************************/
/* 3.e.iii.11 - 3610 - llistat de recaudació per joc de cada poblacio que tingui màquines instal.lades*/
/***********************************************************************************************/

SELECT AA._04_pobUbic AS poblacio, _01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc,
MAQ._01_pk_idMaq AS idMaq, MAQ._02_macMaq AS macMaq, SUM(_05_totCredJocMaqInst) AS totalCredits

FROM

(SELECT * FROM ubicacio
INNER JOIN ubicacioTeMaquina ON _01_pk_idUbic = _01_pk_idUbicUTM
INNER JOIN maquina ON _02_pk_idMaqUTM = _01_pk_idMaq) AS AA,

maquina AS MAQ
LEFT  JOIN maqInstall ON ( MAQ._01_pk_idMaq = _01_pk_idMaqInst)
INNER JOIN joc        ON ( _02_pk_idJocInst = _01_pk_idJoc)

WHERE
	AA._01_pk_idMaq  = MAQ._01_pk_idMaq AND
	AA._08_datBaixaMaq   IS NULL AND
	_16_datBaixaUbic     IS NULL AND
	_08_datBaixaJoc      IS NULL AND
	_05_datBaixaUTM      IS NULL AND
	_08_datBaixaMaqInst  IS NULL

GROUP BY poblacio, idJoc, idMaq
ORDER BY poblacio, idJoc, totalCredits DESC;


/***********************************************************************************************/
/* 3.e.iii.12 - 3620 - llistat de recaudació per joc de cada provincia, poblacio, cp que tingui màquines instal.lades */
/***********************************************************************************************/

SELECT AA._06_provUbic AS provincia, AA._04_pobUbic AS poblacio, AA._05_cpUbic AS cPostal,
_01_pk_idJoc AS idJoc, _02_nomJoc AS nomJoc,MAQ._01_pk_idMaq AS idMaq, MAQ._02_macMaq AS macMaq,
SUM(_05_totCredJocMaqInst) AS totalCredits

FROM

(SELECT * FROM ubicacio
INNER JOIN ubicacioTeMaquina ON _01_pk_idUbic = _01_pk_idUbicUTM
INNER JOIN maquina ON _02_pk_idMaqUTM = _01_pk_idMaq) AS AA,

maquina AS MAQ
LEFT  JOIN maqInstall ON ( MAQ._01_pk_idMaq = _01_pk_idMaqInst)
INNER JOIN joc        ON ( _02_pk_idJocInst = _01_pk_idJoc)

WHERE 

	AA._01_pk_idMaq  = MAQ._01_pk_idMaq AND
	AA._08_datBaixaMaq   IS NULL AND
	_16_datBaixaUbic     IS NULL AND
	_08_datBaixaJoc      IS NULL AND
	_05_datBaixaUTM      IS NULL AND
	_08_datBaixaMaqInst  IS NULL

GROUP BY provincia, poblacio, cPostal, idJoc, idMaq
ORDER BY provincia, poblacio, cPostal, idJoc, totalCredits DESC;


