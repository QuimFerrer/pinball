<?php

function customQuerySaveRecord($pid, $id, $record, $kName)
{
	switch($pid)
		{
		case '1020': //productes
			if ($id != 0)
				$query    = sprintf("UPDATE productes SET nom        = '%s',
														  descripcio = '%s',
														  preu       = '%f',
														  foto       = '%s',
					  						  			  datModPro  = NOW()
							WHERE
									datBaixaPro IS NULL AND id = '%d';",$record['nom'],
																		$record['descripcio'],
																		$record['preu'],
																		$record['foto'],
																		$id);
			else
				$query    = sprintf("INSERT INTO productes
								     VALUES (NULL,'%s','%s','%f','%s',NOW(),NULL,NULL);",$record['nom'],
																						 $record['descripcio'],
																						 $record['preu'],
																						 $record['foto']);
			$response = controlErrorQuery( dbExec($query,0) );
			$data = controlErrorQueryFromDbui( $response['status'], $id, $kName);
			break;			
		case '3160': // ronda
			if ($id != 0)
				$query = sprintf("UPDATE ronda SET _06_fotoJugRonda = '%s',
		   		  							 	   _07_puntsRonda   = '%d',
					  						  	   _08_datModRonda  = NOW()
								  WHERE _09_datBaixaRonda IS NULL AND
									    _00_pk_idRonda_auto = '%d;';", $record['_06_fotoJugRonda'],
									    							   $record['_07_puntsRonda'],
															    	   $id);
			else
				$query = sprintf("INSERT INTO ronda
								VALUES (NULL,'%d','%d','%d','%s','%d','%s',0,NOW(),NULL,NULL);",
																		$record['_01_pk_idMaqRonda'],
																	    $record['_02_pk_idJocRonda'],
																	    $record['_03_pk_idJugRonda'],
																	    $record['_04_pk_idDatHoraPartRonda'],
																		$record['_05_pk_idRonda'],
																		$record['_06_fotoJugRonda']);
			$response = controlErrorQuery( dbExec($query,0) );
			$data = controlErrorQueryFromDbui( $response['status'], $id, $kName);
			break;			
		case '3230': // joc
			if ($id != 0)
				$query = sprintf("UPDATE joc SET _02_nomJoc    = '%s',
												 _03_descJoc   = '%s',
												 _04_imgJoc    = '%s',
												 _07_datModJoc = NOW()
								  WHERE _01_pk_idJoc = '%d';", $record['_02_nomJoc'],
															   $record['_03_descJoc'],
															   $record['_04_imgJoc'],
															   $id);
			else
				$query = sprintf("INSERT INTO joc 
								  VALUES (NULL,'%s','%s','%s',0,NOW(),NULL,NULL);",
																$record['_02_nomJoc'],
																$record['_03_descJoc'],
																$record['_04_imgJoc']);
			$response = controlErrorQuery( dbExec($query,0) );
			$data = controlErrorQueryFromDbui( $response['status'], $id, $kName);
			break;
		case '3340':  // torneig
			if ($id != 0)
				$query = sprintf("UPDATE torneig SET _03_nomTorn    = '%s',
													 _04_premiTorn  = '%s',
													 _05_datIniTorn = DATE_FORMAT('%s','%s'),
													 _06_datFinTorn = DATE_FORMAT('%s','%s'),
													 _08_datModTorn = NOW()
								  WHERE _01_pk_idTorn  = '%d';",$record['_03_nomTorn'],
																$record['_04_premiTorn'],
								   	       		  				$record['datIniTorn'],"%Y-%m-%d",
								   	       		 				$record['datFinTorn'],"%Y-%m-%d",
								   	       	 					$id);
			else
				$query = sprintf("INSERT INTO torneig
								  VALUES (NULL,'%d','%s','%f','%s','%s',NOW(),NULL,NULL);",
																$record['_02_pk_idJocTorn'],
																$record['_03_nomTorn'],
																$record['_04_premiTorn'],
																$record['datIniTorn'],
																$record['datFinTorn']);
			$response = controlErrorQuery( dbExec($query,0) );
			$data = controlErrorQueryFromDbui( $response['status'], $id, $kName);
			break;				
		case '3420':  // màquina
			if ($id != 0)
				$query = sprintf("UPDATE maquina SET _02_macMaq     = '%s',
						        					 _03_propMaq    = '%s',
						        					 _04_credMaq    = '%f',
											         _05_totCredMaq = '%f',
											         _07_datModMaq  = NOW()
								  WHERE _01_pk_idMaq = '%d';",	$record['_02_macMaq'],
															   	$record['_03_propMaq'],
															   	$record['_04_credMaq'],
												   			   	$record['_05_totCredMaq'],
															   	$id);
			else
				$query = sprintf("INSERT INTO maquina
 								  VALUES (NULL,'%s','%s','%f','%f',NOW(),NULL,NULL);",
																$record['_02_macMaq'],
																$record['_03_propMaq'],
															   	$record['_04_credMaq'],
												   			   	$record['_05_totCredMaq']);
			$response = controlErrorQuery( dbExec($query,0) );
			$data = controlErrorQueryFromDbui( $response['status'], $id, $kName);
			break;
		case '3485': // maqInstall
			if ($id != 0)
				$query = sprintf("UPDATE maqInstall SET _03_numPartidesJugadesMaqInst = '%d',
														_04_credJocMaqInst    = '%d',
														_05_totCredJocMaqInst = '%d',
														_07_datModMaqInst     = NOW()
								  WHERE _00_pk_idMaqInst_auto = '%d';",
								  								$record['_03_numPartidesJugadesMaqInst'],
								  								$record['_04_credJocMaqInst'],
										  						$record['_05_totCredJocMaqInst'],
										  						$id);
			else
				$query = sprintf("INSERT INTO maqInstall
							 	  VALUES (NULL,'%d','%d',0,0,0,NOW(),NULL,NULL);",
																$record['_01_pk_idMaqInst'],
																$record['_02_pk_idJocInst']);
			$response = controlErrorQuery( dbExec($query,0) );
			$data = controlErrorQueryFromDbui( $response['status'], $id, $kName);
			break;	
		case '3830': // ubicacio
			if ($id != 0)
				$query = sprintf("UPDATE ubicacio SET _02_empUbic     = '%s',
													  _03_dirUbic     = '%s',
												  	  _04_pobUbic     = '%s',
													  _05_cpUbic      = '%s',
													  _06_provUbic    = '%s',
													  _07_latUbic     = '%s',
													  _08_longUbic    = '%s',
													  _09_altUbic     = '%s',
													  _10_contUbic    = '%s',
													  _11_emailUbic   = '%s',
													  _12_telUbic     = '%s',
													  _13_mobUbic     = '%s',
													  _15_datModUbic  = NOW()
								WHERE _01_pk_idUbic = '%d';", 	$record['_02_empUbic'],
																$record['_03_dirUbic'],
																$record['_04_pobUbic'],
																$record['_05_cpUbic'],
																$record['_06_provUbic'],
																$record['_07_latUbic'],
																$record['_08_longUbic'],
																$record['_09_altUbic'],
																$record['_10_contUbic'],
																$record['_11_emailUbic'],
																$record['_12_telUbic'],
																$record['_13_mobUbic'],
																$id);
			else
				$query = sprintf("INSERT INTO ubicacio
								VALUES (NULL,'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',NOW(),NULL,NULL);",
																$record['_02_empUbic'],
																$record['_03_dirUbic'],
																$record['_04_pobUbic'],
																$record['_05_cpUbic'],
																$record['_06_provUbic'],
																$record['_07_latUbic'],
																$record['_08_longUbic'],
																$record['_09_altUbic'],
																$record['_10_contUbic'],
																$record['_11_emailUbic'],
																$record['_12_telUbic'],
																$record['_13_mobUbic']);
			$response = controlErrorQuery( dbExec($query,0) );
			$data = controlErrorQueryFromDbui( $response['status'], $id, $kName);					
			break;
		default:
			$data = "";
			break;
		}
	return ($data);
}

function customGetQueryForGetRecords($table)
	{
	switch($table)
		{
		case 'productes': //1020
			$query    = 'SELECT P.*,
									id AS recid,
									DATE_FORMAT(datAltaPro, "%d-%m-%Y %H:%i:%s") AS datAltaPro,
									DATE_FORMAT(datModPro,  "%d-%m-%Y %H:%i:%s") AS datModPro,
									DATE_FORMAT(datBaixaPro,"%d-%m-%Y %H:%i:%s") AS datBaixaPro
							FROM  productes AS P
							WHERE datBaixaPro IS NULL;';									
			break;			
		case 'ronda':
			$query  = 'SELECT 	_00_pk_idRonda_auto AS recid,
								_01_pk_idTorn      AS idTorn,
								_03_nomTorn        AS nomTorn,
								_04_premiTorn      AS premiTorn,
								_02_pk_idJocTorn   AS idJoc,
								JJ.nomJoc          AS nomJoc,
								_02_pk_idMaqTTP    AS idMaq,
								BB.idUsuari        AS idUser,
								BB.loginUsuari     AS loginUser,									
								BB.nomUsuari       AS nomUser,
								DATE_FORMAT(_04_pk_idDatHoraPart, "%d-%m-%Y %H:%i:%s") AS datHoraPartida,
								_01_pk_idMaqRonda,
								_02_pk_idJocRonda,
								_03_pk_idJugRonda,
								_04_pk_idDatHoraPartRonda,
								_05_pk_idRonda     AS idRonda,
								_06_fotoJugRonda,
								_07_puntsRonda,
								DATE_FORMAT(_08_datModRonda, "%d-%m-%Y %H:%i:%s") AS datModRonda
						FROM
						torneig
							LEFT JOIN torneigTePartida ON (_01_pk_idTorn    = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
							INNER JOIN partida         ON (_02_pk_idMaqTTP  = _01_pk_idMaqPart AND
														   _03_pk_idJocTTP  = _02_pk_idJocPart AND
														   _04_pk_idJugTTP  = _03_pk_idJugPart )
				 			INNER JOIN ronda           ON (_01_pk_idMaqPart = _01_pk_idMaqRonda AND
				 										   _02_pk_idJocPart = _02_pk_idJocRonda AND
				 										   _03_pk_idJugPart = _03_pk_idJugRonda AND
				 										   _04_pk_idDatHoraPart = _04_pk_idDatHoraPartRonda ),
						(SELECT _01_pk_idUsuari AS idUsuari, _02_nomUsuari AS nomUsuari, _04_loginUsuari AS loginUsuari FROM usuari) AS BB,
						(SELECT _01_pk_idJoc, _02_nomJoc AS nomJoc FROM joc) AS JJ
						WHERE
							BB.idUsuari     = _03_pk_idJugPart AND
							JJ._01_pk_idJoc = _02_pk_idJocPart AND
							_09_datBaixaTorn IS NULL AND
							_06_datBaixaPart IS NULL AND
							_09_datBaixaRonda IS NULL
						GROUP BY idTorn, idUsuari, idMaq, datHoraPartida, idRonda
						ORDER BY idTorn, idUsuari, idMaq, datHoraPartida, idRonda;';
			break;			
		case 'joc':
			$query  = "SELECT J.*,
							_01_pk_idJoc AS recid,
							DATE_FORMAT(_06_datAltaJoc, '%d-%m-%Y %H:%i:%s') AS datAltaJoc,
							DATE_FORMAT(_07_datModJoc,  '%d-%m-%Y %H:%i:%s') AS datModJoc			
							FROM joc AS J
							WHERE _08_datBaixaJoc IS NULL;";
			break;
		case 'torneig':  // 3340
			$query    = 'SELECT T.*,
								_01_pk_idTorn AS recid,
								_01_pk_idJoc,
								_02_nomJoc,
								_02_pk_idJocTorn,
								DATE_FORMAT(_05_datIniTorn, "%d/%m/%Y") AS datIniTorn,
								DATE_FORMAT(_06_datFinTorn, "%d/%m/%Y") AS datFinTorn,
								DATE_FORMAT(_07_datAltaTorn, "%d-%m-%Y %H:%i:%s") AS datAltaTorn,
								DATE_FORMAT(_08_datModTorn,  "%d-%m-%Y %H:%i:%s") AS datModTorn								
						FROM torneig AS T
							LEFT JOIN joc         ON _02_pk_idJocTorn = _01_pk_idJoc
						WHERE _09_datBaixaTorn IS NULL
						GROUP BY _01_pk_idTorn, _01_pk_idJoc;';
			break;
		case 'maquina': //3420
			$query    = 'SELECT M.*,
								_01_pk_idMaq AS recid,			
								DATE_FORMAT(_06_datAltaMaq,"%d-%m-%Y %H:%i:%s") AS datAltaMaq,
								DATE_FORMAT(_07_datModMaq, "%d-%m-%Y %H:%i:%s") AS datModMaq									
						FROM
							maquina AS M
						WHERE _08_datBaixaMaq   IS NULL;';
			break;
		case 'maqInstall': //3485
			$query    = 'SELECT MQ.*,
								_00_pk_idMaqInst_auto AS recid,
								_01_pk_idMaqInst   AS idMaq,									
								_02_macMaq,
								_01_pk_idJoc AS idJoc,
								_02_nomJoc,
								_03_numPartidesJugadesMaqInst AS numPartides,
								_05_totCredJocMaqInst AS totalCredits,
								DATE_FORMAT(_06_datAltaMaqInst, "%d-%m-%Y %H:%i:%s") AS datAltaMaqInst,
								DATE_FORMAT(_07_datModMaqInst,  "%d-%m-%Y %H:%i:%s") AS datModMaqInst									
						FROM joc
							LEFT JOIN maqInstall AS MQ ON _01_pk_idJoc     = _02_pk_idJocInst
							INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq
						WHERE 	
							_08_datBaixaJoc      IS NULL AND
							_08_datBaixaMaqInst  IS NULL AND
							_08_datBaixaMaq      IS NULL	
						GROUP BY idMaq,idJoc
		 				ORDER BY idMaq,idJoc;';		
			// $query    = 'SELECT M.*,
			// 					DATE_FORMAT(_06_datAltaMaqInst,"%d-%m-%Y %H:%i:%s") AS datAltaMaqInst,
			// 					DATE_FORMAT(_07_datModMaqInst, "%d-%m-%Y %H:%i:%s") AS datModMaqInst									
			// 			FROM
			// 				maqInstall AS M
			// 			WHERE _08_datBaixaMaqInst   IS NULL;';
			break;			
		case 'ubicacio': //3830
			$query    = 'SELECT U.*,
								_01_pk_idUbic AS recid,			
								DATE_FORMAT(_14_datAltaUbic,"%d-%m-%Y %H:%i:%s") AS datAltaUbic,
								DATE_FORMAT(_15_datModUbic, "%d-%m-%Y %H:%i:%s") AS datModUbic
						FROM
							ubicacio AS U
						WHERE _16_datBaixaUbic   IS NULL
						ORDER BY _02_empUbic;';
			break;			

		case 'ubicaciotemaquina': //3890
			$query    = 'SELECT _00_pk_idUTM_auto   AS recid,
								_06_provUbic        AS provincia,
								_04_pobUbic         AS poblacio,
								_05_cpUbic          AS cPostal,
								_01_pk_idUbicUTM    AS idUbic,
								_02_empUbic         AS empUbic, 
								_02_pk_idMaqUTM     AS idMaq,
								_02_macMaq          AS macMaq,
								_03_propMaq         AS propMaq,
								SUM(_05_totCredMaq) AS totalCredits,
								DATE_FORMAT(_03_datAltaUTM,  "%d-%m-%Y %H:%i:%s") AS datAltaUTM,
								DATE_FORMAT(_04_datModUTM,   "%d-%m-%Y %H:%i:%s") AS datModUTM,
								DATE_FORMAT(_05_datBaixaUTM, "%d-%m-%Y %H:%i:%s") AS datBaixaUTM,
								DATE_FORMAT(_08_datBaixaMaq, "%d-%m-%Y %H:%i:%s") AS datBaixaMaq,
								DATE_FORMAT(_16_datBaixaUbic,"%d-%m-%Y %H:%i:%s") AS datBaixaUbic
						FROM ubicacio
							INNER JOIN ubicacioTeMaquina ON _01_pk_idUbic   = _01_pk_idUbicUTM
							INNER JOIN maquina           ON _02_pk_idMaqUTM = _01_pk_idMaq
						GROUP BY provincia, poblacio, cPostal, idUbic, idMaq
						ORDER BY provincia, poblacio, cPostal, idUbic, idMaq, totalCredits;';
			break;			

		default:
			$query  = "SELECT * FROM $table;";		
			break;
		}			
	return ($query);	
	}

function customGetQueryForDelete($table, $id, $kName)
	{
	$query = "";		
	switch($table)
		{
		case 'productes':
			$query    = sprintf("UPDATE productes SET datModPro   = NOW(),
										 	          datBaixaPro = NOW()
						 		WHERE datBaixaPro IS NULL AND id = '%d';",$id);
			$response = controlErrorQuery( dbExec($query,0) );
		case 'ronda':
			$query = sprintf("UPDATE ronda SET _08_datModRonda   = NOW(),
									   	       _09_datBaixaRonda = NOW()
							 WHERE _09_datBaixaRonda IS NULL AND _00_pk_idRonda_auto = '%d';",$id);
			$response = controlErrorQuery( dbExec($query,0) );
			break;
		case 'joc':
			$query = sprintf("UPDATE torneig SET _08_datModTorn   = NOW(),
												 _09_datBaixaTorn = NOW()
							  WHERE _02_pk_idJocTorn = '%d' AND _09_datBaixaTorn IS NULL;",$id);
			$response = controlErrorQuery( dbExec($query,0) );
			$query = sprintf("UPDATE maqinstall SET _07_datModMaqInst   = NOW(),
								  					_08_datBaixaMaqInst = NOW()
							  WHERE _02_pk_idJocInst = '%d' AND _08_datBaixaMaqInst IS NULL;",$id);
			$response = controlErrorQuery( dbExec($query,0) );
			$query = sprintf("UPDATE joc SET _07_datModJoc   = NOW(),
											 _08_datBaixaJoc = NOW()
							  WHERE _01_pk_idJoc = '%d' AND _08_datBaixaJoc IS NULL;",$id);
			$response = controlErrorQuery( dbExec($query,0) );
			break;
		case 'torneig':
			$query = sprintf("UPDATE torneig SET _08_datModTorn   = NOW(),
												 _09_datBaixaTorn = NOW()
							  WHERE _01_pk_idTorn = '%d' AND _09_datBaixaTorn IS NULL;",$id);
			$response = controlErrorQuery( dbExec($query,0) );						
			break;
		case 'maquina':
			$query = sprintf("UPDATE maqinstall SET _07_datModMaqInst   = NOW(),
													_08_datBaixaMaqInst = NOW()
							  WHERE _01_pk_idMaqInst = '%d' AND _08_datBaixaMaqInst IS NULL;",$id);
			$response = controlErrorQuery( dbExec($query,0) );						
			$query = sprintf("UPDATE maquina SET _07_datModMaq   = NOW(),
												 _08_datBaixaMaq = NOW()
					  		  WHERE _01_pk_idMaq = '%d' AND _08_datBaixaMaq IS NULL;",$id);
			$response = controlErrorQuery( dbExec($query,0) );
			break;
		case 'maqInstall':
			$query = sprintf("UPDATE maqinstall SET _07_datModMaqInst   = NOW(),
													_08_datBaixaMaqInst = NOW()				
							  WHERE _00_pk_idMaqInst_auto = '%d' AND _08_datBaixaMaqInst IS NULL;",$id);
			$response = controlErrorQuery( dbExec($query,0) );		
			break;			
		case 'ubicacio':
			$query = sprintf("UPDATE ubicacio SET _15_datModUbic   = NOW(),
												  _16_datBaixaUbic = NOW()
							  WHERE _01_pk_idUbic = '%d' AND _16_datBaixaUbic IS NULL;",$id);
			$response = controlErrorQuery( dbExec($query,0) );
			break;			
		default:
			$data = "";
			break;
		}
	if ($query != "") $data = controlErrorQueryFromDbui( $response['status'], $id, $kName);		
	return ($data);	
	}

function customGetQueryForGetRecord($table, $id, $kName)
	{
	switch($table)
		{
		case 'torneig':
			$query  = "SELECT T.*,
							_01_pk_idTorn AS recid,			
							DATE_FORMAT(_05_datIniTorn, '%m/%d/%Y') AS datIniTorn,
							DATE_FORMAT(_06_datFinTorn, '%m/%d/%Y') AS datFinTorn
						FROM $table AS T
						WHERE $kName=$id;";
			break;
		default:
			$query  = "SELECT * FROM $table WHERE $kName=$id";
			break;
		}								
	return ($query);
	}							

 ?>