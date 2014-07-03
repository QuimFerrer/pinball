<?php 

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

isEndSessionInQuery();

////////////////////////////////////////////////////////////////////////////////////
//   OPCIONS D'ADMINISTRADOR
////////////////////////////////////////////////////////////////////////////////////

	const FORM_CONTACTE_1000 = 1000;
	const FORM_REGISTRE_1010 = 1010;
	const CONSULTA_ADM_1020  = 1020;
	const TORNEIGS_1060 	 = 1060;
	const USUARIS_1080  	 = 1080;
	const PARTIDA_1120	     = 1120;

	const MODIFICA_PERFIL_ADM_3000             = 3000;

	const PARTIDES_X_MAQUINA_3110              = 3110; //
	const PARTIDES_X_JUGADOR_3120              = 3120; //

	const BLOQUEJAR_PARTIDES_3130              = 3130;
	const DESBLOQUEJAR_PARTIDES_3140           = 3140; 

	const ALTA_JOC_3210						   = 3210;
	const BAIXA_JOC_3220					   = 3220;
	const MODIFICACIO_JOC_3225 		           = 3225;	
	const JOCS_ACTUAL_3230 		 	           = 3230; //
	const JOCS_HISTORIC_3240 	 	           = 3240; //
	const JOCS_X_MAQUINA_3250 		           = 3250; //
	const JOCS_X_MAQUINA_HISTORIC_3260         = 3260; //	
	const ACTUALITZA_NUM_PARTIDES_JUGADES_3270 = 3270;

	const ALTA_TORNEIG_3310				       = 3310;
	const BAIXA_TORNEIG_3320 				   = 3320;
	const MODIFICACIO_TORNEIG_3330 			   = 3330;	
	const RELACIO_TORNEIGS_3340 	           = 3340; //	
	const TORNEIGS_AMB_JUGADORS_ACTUAL_3350    = 3350; //
	const TORNEIGS_AMB_JUGADORS_HISTORIC_3360  = 3360; //
	const TORNEIGS_AMB_MAQUINES_ACTUAL_3380    = 3380; //
	const TORNEIGS_AMB_MAQUINES_HISTORIC_3390  = 3390; //

	const ALTA_MAQUINA_3410					   = 3410;
	const BAIXA_MAQUINA_3420 				   = 3420;
	const MODIFICACIO_MAQUINA_3425 			   = 3425;	
	const ACTUALITZA_RACAUDACIO_MAQ_3430       = 3430;		
	const LLISTAT_MAQUINES_3440 	           = 3440; //
	const LLISTAT_MAQUINES_HISTORIC_3450 	   = 3450; //

	const ALTA_ASSIGNACIO_JOC_MAQUINA_3460	   = 3460;
	const BAIXA_ASSIGNACIO_JOC_MAQUINA_3470    = 3470;
	const MODIF_ASSIGNACIO_JOC_MAQUINA_3480    = 3480;	
	const LLISTAT_ASSIGNACIO_JOC_MAQUINA_3490  = 3490; //

	const RECAUDACIO_X_MAQ_AMB_RANKING_3510    = 3510; //
	const RECAUDACIO_X_JOC_AMB_RANKING_3520    = 3520; //
	const RECAUDACIO_X_JOC_I_MAQ_3530          = 3530; //
	const RECAUDACIO_X_PROPIETARI_3540         = 3540; //	
	const RECAUDACIO_X_PROPIETARI_I_MAQ_3550   = 3550; //		
	const RECAUDACIO_X_PROPIETARI_I_JOC_3560   = 3560; //
	const RECAUDACIO_X_PROV_CP_POB_3570        = 3570; //	
	const RECAUDACIO_X_POBLACIO_3580           = 3580; //	
	const RECAUDACIO_X_PROV_CP_POB_MAQ_3590    = 3590; //	
	const RECAUDACIO_X_JOC_3600  			   = 3600; //		
	const RECAUDACIO_X_JOC_POB_3610    	  	   = 3610; //			
	const RECAUDACIO_X_JOC_PROV_POB_CP_3620    = 3620; //	

	const ALTA_UBICACIO_3810				   = 3810;
	const BAIXA_UBICACIO_3820 				   = 3820;
	const MODIFICACIO_UBICACIO_3830 		   = 3830;	
	const LLISTAT_UBICS_X_PROV_POB_3840        = 3840; //
	const LLISTAT_UBICS_X_COORDENADES_3850     = 3850; //
	const LLISTAT_UBICS_X_EMPRESA_3860         = 3860; //	
	const LLISTAT_UBICS_X_EMPRESA_PROV_POB_3870= 3870; //		

	const ALTA_MAQ_X_UBICACIO_3880			   = 3880;
	const BAIXA_MAQ_X_UBICACIO_3890	 	       = 3890;	
	const MODIFICACIO_MAQ_X_UBICACIO_3900	   = 3900;
	const CANVI_MAQ_D_UBICACIO_3910 		   = 3910;
	const LLISTAT_MAQS_X_UBIC_PROV_POB_3930    = 3930; //
	const LLISTAT_MAQS_X_UBIC_COORDENADES_3940 = 3940; //
	const LLISTAT_MAQS_X_EMPRESA_3950          = 3950; //	

	const PERFILS_JUGADORS_4010 			   = 4010; //
	const BLOQUEJAR_JUGADOR_4020 			   = 4020;
	const DESBLOQUEJAR_JUGADOR_4030 		   = 4030;
	const TORNEIGS_REGISTRATS_X_JUGADOR_4040   = 4040; //

////////////////////////////////////////////////////////////////////////////////////
//   OPCIONS D'USUARI
////////////////////////////////////////////////////////////////////////////////////

	const CONSULTA_USR_5020					   = 5020;
	const GET_DADES_PERFIL_USR_5021			   = 5021;	
	const MODIF_PERFIL_USR_5022           	   = 5022;
	const BAIXA_PERFIL_USR_5023           	   = 5023;
	const CONSULTA_USR_TORNEIGS_5041           = 5041; //
	const BAIXA_USR_TORN_5043                  = 5043; //
	const CONSULTA_USR_RANKING_ACTUAL_5050     = 5050; //
	const CONSULTA_USR_RANKING_HISTORIC_5051   = 5051; //
	const CONSULTA_USR_TOTS_TORNEIGS_5061      = 5061; //
	const CONSULTA_RANKING_ACTUAL_5070         = 5070; //
	const CONSULTA_RANKING_HISTORIC_5071       = 5071; //
	const INSCRIPCIO_USR_TORNEIG_5063          = 5063;	

	const PLANTILLA = 9999;
	
	$pid      = isset($_REQUEST['pid'])       ? (int) $_REQUEST['pid'] : 0;
	$usrLogin = isset($_REQUEST['params'])    ? $_REQUEST['params'] : $_SESSION["login"];	
	$idTorn   = isset($_REQUEST['idTorn'])    ? $_REQUEST['idTorn'] : "";
	$idPart   = isset($_REQUEST['idPart'])    ? $_REQUEST['idPart'] : "";
	$idMaq    = isset($_REQUEST['idMaq'])     ? $_REQUEST['idMaq'] : "";
	$idJoc    = isset($_REQUEST['idJoc'])     ? $_REQUEST['idJoc'] : "";	
	$idUsr    = isset($_REQUEST['idUsr'])     ? $_REQUEST['idUsr'] : "";		
	$idUbic   = isset($_REQUEST['idUbic'])    ? $_REQUEST['idUbic'] : "";
	$idUbicNOU= isset($_REQUEST['idUbicNOU']) ? $_REQUEST['idUbicNOU'] : "";

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
//
//
//								QUERYS D'ADMINISTRADOR
//
//
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////


	if ($pid > 0) {

		switch ($pid) {

			case PLANTILLA :
				$query    = '';			
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;

			case FORM_CONTACTE_1000:
				echo json_encode($_REQUEST['record']);
				break;

			case FORM_REGISTRE_1010:
				echo json_encode($_REQUEST['record']);
				break;

			case CONSULTA_ADM_1020 :
				$query    = 'SELECT @var:=@var+1 as recid, p.* FROM productes as p, (SELECT @var:=0) as r';
				$response = dbExec($query)[1];

				// // Respectar format que espera el grid'
				// foreach($response as $row) {
				// 	$records[] = (object) array('recid'=>(int)$row->id, 'nom'=>$row->nom, 'foto'=>$row->foto);
				// }

				// // $records[] = (object) array('recid'=>1, 'nom'=>"Quim", 'foto'=>"foto de Quim");
				// // $records[] = (object) array('recid'=>2, 'nom'=>"Joan", 'foto'=>"foto de Joan");

				echo json_encode( $response );
				break;

			case TORNEIGS_1060 :
				$query    = 'SELECT * FROM torneig';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;

			case USUARIS_1080 :
				$query    = 'SELECT @var:=@var+1 as recid, p.* FROM usuari as p, (SELECT @var:=0) as r';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;
				
			case PARTIDA_1120 :
				$query    = 'SELECT * FROM usuari';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

			case MODIFICA_PERFIL_ADM_3000 :
				$query    = 'UPDATE usuari SET _02_nomUsuari     = "$nom",
											   _03_cognomUsuari  = "$cognom",
						                       _06_emailUsuari   = "$email",
						                       _07_fotoUsuari    = "$nomFoto",
						                       _08_datAltaUsuari = "$dataAltaUsuari",						
						                       _09_datModUsuari  = NOW()
							WHERE
								_10_datBaixaUsuari IS NULL AND
								_04_loginUsuari = "admin";';
				$response = dbExec($query,0);
				$query    = 'UPDATE admin SET  _02_faceAdm    = "$facebook",
						 					   _03_twitterAdm = "$twitter",
						 					   _04_datAltaAdm = "$dataAltaAdm",	
						 					   _05_datModAdm  = NOW()
							WHERE 
									_06_datBaixaAdm IS NULL AND
									(_01_pk_idAdm IN
										( SELECT _01_pk_idUsuari AS _01_pk_idAdm FROM usuari
											WHERE _04_loginUsuari = "admin"));';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));							
				break;
			case PARTIDES_X_MAQUINA_3110 :
				$query    = 'SELECT _01_pk_idMaqPart AS idMaq,
									_02_pk_idJocTorn AS idJoc,
									_02_nomJoc       AS nomJoc, 
									BB.idUsuari      AS idUser,
									BB.loginJug      AS loginUser,
									BB.nomJug        AS nomUser,
									DATE_FORMAT(_04_pk_idDatHoraPart, "%d-%m-%Y %H:%i:%s") AS datHoraPartida,
									_01_pk_idTorn AS idTorn,
									_03_nomTorn AS nomTorn,
									DATE_FORMAT(_05_datIniTorn, "%d-%m-%Y") AS datIniTorn,
									DATE_FORMAT(_06_datFinTorn, "%d-%m-%Y") AS datFinTorn, 
									DATE_FORMAT(_06_datBaixaPart, "%d-%m-%Y %H:%i:%s") AS datBaixaPart
							FROM
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug,_04_loginUsuari AS loginJug FROM usuari) AS BB,
								partida
									LEFT JOIN torneigTePartida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							          							   _03_pk_idJocTTP = _02_pk_idJocPart AND
						         	 							   _04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN torneig 		   ON (_01_pk_idTornTTP = _01_pk_idTorn AND
										  						   _03_pk_idJocTTP  = _02_pk_idJocTorn)
									INNER JOIN joc 			   ON (_02_pk_idJocTorn = _01_pk_idJoc)

							GROUP BY idMaq, nomJoc, loginUser, datHoraPartida, nomTorn, datIniTorn
							ORDER BY idMaq, nomJoc, loginUser, datHoraPartida, nomTorn, datIniTorn;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;
			case PARTIDES_X_JUGADOR_3120 :
				$query    = 'SELECT BB.idUsuari      AS idUser,
									BB.loginJug      AS loginUser,
									BB.nomJug        AS nomUser,
									_01_pk_idMaqPart AS idMaq,
									_02_pk_idJocTorn AS idJoc,
									_02_nomJoc AS nomJoc, 
									DATE_FORMAT(_04_pk_idDatHoraPart, "%d-%m-%Y %H:%i:%s") AS datHoraPartida,
									_01_pk_idTorn AS idTorn,
									_03_nomTorn AS nomTorn,
									DATE_FORMAT(_05_datIniTorn, "%d-%m-%Y") AS datIniTorn,
									DATE_FORMAT(_06_datFinTorn, "%d-%m-%Y") AS datFinTorn, 
									DATE_FORMAT(_06_datBaixaPart, "%d-%m-%Y %H:%i:%s") AS datBaixaPart
							FROM
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug,_04_loginUsuari AS loginJug FROM usuari) AS BB,
								partida
									LEFT JOIN torneigTePartida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							         							   _03_pk_idJocTTP = _02_pk_idJocPart AND
						         	 							   _04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN torneig 		   ON (_01_pk_idTornTTP = _01_pk_idTorn AND
										  						   _03_pk_idJocTTP  = _02_pk_idJocTorn)
									INNER JOIN joc 		       ON (_02_pk_idJocTorn = _01_pk_idJoc)
							GROUP BY loginJug, idMaq, nomJoc, datHoraPartida, nomTorn, datIniTorn
							ORDER BY loginJug, idMaq, nomJoc, datHoraPartida, nomTorn, datIniTorn;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;
			case BLOQUEJAR_PARTIDES_3130 :
				$query    = 'UPDATE partida SET _06_datBaixaPart  = NOW()
							 WHERE 
								_06_datBaixaPart IS NULL AND
								_00_pk_idPart_auto = "' . $idPart . '";';			
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));
				break;
			case DESBLOQUEJAR_PARTIDES_3140 : 
				$query    = 'UPDATE partida SET _06_datBaixaPart  = NULL
 							 WHERE 
									_06_datBaixaPart IS NOT NULL AND
									_00_pk_idPart_auto = "' . $idPart . '";';			
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));
				break;
			case ALTA_JOC_3210 :
				$query    = 'INSERT INTO joc 
								VALUES (NULL,
										"$nomJoc",
										"$descJoc",
										"$imgJoc",0,NOW(),NULL,NULL);';			
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));
				break;
			case BAIXA_JOC_3220 :
				$query    = 'UPDATE joc SET _08_datBaixaJoc = NOW()
							WHERE 
								_01_pk_idJoc = "' . $idJoc . '" AND
								_08_datBaixaJoc IS NULL;';
				$response = dbExec($query,0);
				$query    = 'UPDATE torneig SET _09_datBaixaTorn = NOW()
							WHERE 
								_02_pk_idJocTorn = "' . $idJoc . '" AND
								_09_datBaixaTorn IS NULL;';
				$response = dbExec($query,0);
				$query    = 'UPDATE maqinstall SET _08_datBaixaMaqInst = NOW()
							WHERE 
								_02_pk_idJocInst = "' . $idJoc . '" AND
								_08_datBaixaMaqInst IS NULL;';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;				
			case MODIFICACIO_JOC_3225 :
				$query    = 'UPDATE joc SET   _02_nomJoc      = "$nomJoc",
											  _03_descJoc     = "$descJoc",
											  _04_imgJoc      = "$imgJoc",
											  _06_datAltaJoc  = "$dataAltaJoc",
											  _07_datModJoc   = NOW(),
											  _08_datBaixaJoc = "$dataBaixaJoc"						  
							WHERE _01_pk_idJoc = "' . $idJoc . '";';			
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;
			case JOCS_ACTUAL_3230 :
				$query    = 'SELECT _01_pk_idjoc AS idJoc, 
									_02_nomJoc AS nomJoc, 
									_05_numPartidesJugadesJoc AS numPartides,
									DATE_FORMAT(_06_datAltaJoc,  "%d-%m-%Y %H:%i:%s") AS datAltaJoc,
									DATE_FORMAT(_07_datModJoc, "%d-%m-%Y %H:%i:%s")   AS datModJoc
							FROM joc
							WHERE _08_datBaixaJoc IS NULL;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;
			case JOCS_HISTORIC_3240 :
				$query    = 'SELECT _01_pk_idjoc AS idJoc, 
									_02_nomJoc AS nomJoc, 
									_05_numPartidesJugadesJoc AS numPartides,
									DATE_FORMAT(_06_datAltaJoc,  "%d-%m-%Y %H:%i:%s") AS datAltaJoc,
									DATE_FORMAT(_07_datModJoc, "%d-%m-%Y %H:%i:%s")   AS datModJoc,
									DATE_FORMAT(_08_datBaixaJoc, "%d-%m-%Y %H:%i:%s") AS datBaixaJoc
							FROM joc;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;			
			case JOCS_X_MAQUINA_3250 :
				$query    = 'SELECT _01_pk_idJoc AS idJoc,
									_02_nomJoc   AS nomJoc,
									_01_pk_idMaq AS idMaq,
									_02_macMaq   AS macMaq,
									_03_numPartidesJugadesMaqInst AS numPartides,
									_05_totCredJocMaqInst AS totalCredit
							FROM joc
								LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
								INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq
							WHERE 	
								_08_datBaixaJoc      IS NULL AND
								_08_datBaixaMaqInst  IS NULL AND
								_08_datBaixaMaq      IS NULL
							GROUP BY idJoc,idMaq
							ORDER BY idJoc,idMaq;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;
			case JOCS_X_MAQUINA_HISTORIC_3260 :
				$query    = 'SELECT _01_pk_idJoc AS idJoc,
									_02_nomJoc   AS nomJoc,
									_01_pk_idMaq AS idMaq,
									_02_macMaq   AS macMaq,
									_03_numPartidesJugadesMaqInst AS numPartides,
									_05_totCredJocMaqInst AS totalCredits,
									DATE_FORMAT(_06_datAltaJoc,  "%d-%m-%Y %H:%i:%s") AS datAltaJoc,
									DATE_FORMAT(_07_datModJoc, "%d-%m-%Y %H:%i:%s")   AS datModJoc,
									DATE_FORMAT(_08_datBaixaJoc, "%d-%m-%Y %H:%i:%s") AS datBaixaJoc									
							FROM joc
								LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
								INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq
							GROUP BY idJoc,idMaq
							ORDER BY idJoc,idMaq;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;
			case ACTUALITZA_NUM_PARTIDES_JUGADES_3270 :
				$query    = 'UPDATE joc
								SET _05_numPartidesJugadesJoc = "$NumPartides",
									_07_datModJoc = NOW()
							WHERE 
								_01_pk_idJoc = "' . $idJoc . '" AND
								_08_datBaixaJoc IS NULL;';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));				
				break;
			case ALTA_TORNEIG_3310 :
				$query    = 'INSERT INTO torneig 
								VALUES (NULL,
										"' . $idJoc . '",
										"$nomTorn",
										"$premiTorn",
										"$dataIniciTorn",
										"$dataFinTorn",NOW(),NULL,NULL);';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));				
				break;
			case BAIXA_TORNEIG_3320 :
				$query    = 'UPDATE torneig SET _09_datBaixaTorn = NOW()
								WHERE 
									_01_pk_idTorn    = "' . $idTorn . '" AND
									_02_pk_idJocTorn = "' . $idJoc  . '" AND
									_09_datBaixaTorn IS NULL;';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;
			case MODIFICACIO_TORNEIG_3330 :
				$query    = 'UPDATE torneig SET _03_nomTorn     = "$nomTorn",
					    						_04_premiTorn   = "$premiTorn",
								   	       		_05_datIniTorn  = "$dataIniTorn",
												_06_datFinTorn  = "$dataFinTorn",
												_07_datAltaTorn = "$dataAltaTorn",
												_08_datModTorn  = NOW(),
												_09_datBaixaTorn = "$dataBaixaTorn"						 
							WHERE 
									_01_pk_idTorn    = "' . $idTorn . '" AND
									_02_pk_idJocTorn = "' . $idJoc  . '";';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;								
			case RELACIO_TORNEIGS_3340 :		
				$query    = 'SELECT _01_pk_idTorn AS idTorn,
									_03_nomTorn   AS nomTorn,
									_04_premiTorn AS premiTorn,
									_01_pk_idJoc  AS idJoc,
									_02_nomJoc    AS nomJoc,
									DATE_FORMAT(_05_datIniTorn, "%d-%m-%Y") AS datIniTorn,
									DATE_FORMAT(_06_datFinTorn, "%d-%m-%Y") AS datFinTorn, 
									_01_pk_idMaq AS idMaq, _02_macMaq as macMaq,
									DATE_FORMAT(_09_datBaixaTorn, "%d-%m-%Y %H:%i:%s") AS datBaixaTorn
							FROM torneig
								LEFT JOIN joc         ON _02_pk_idJocTorn = _01_pk_idJoc
								INNER JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
								INNER JOIN maquina    ON _01_pk_idMaqInst = _01_pk_idMaq
							GROUP BY idTorn,idMaq;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;
			case TORNEIGS_AMB_JUGADORS_ACTUAL_3350 :
				$query    = 'SELECT _01_pk_idTorn    AS idTorn,
									_03_nomTorn      AS nomTorn,
									_04_premiTorn    AS premiTorn,
									_02_pk_idJocTorn AS idJoc,
									BB.nomJoc        AS nomJoc, 
									_01_pk_idJug     AS idUser,
									_04_loginUsuari  AS loginUser,
									_02_nomUsuari    AS nomUser,
									DATE_FORMAT(_05_datIniTorn, "%d-%m-%Y") AS datIniTorn,
									DATE_FORMAT(_06_datFinTorn, "%d-%m-%Y") AS datFinTorn
							FROM
								(SELECT _02_nomJoc AS nomJoc FROM joc) AS BB,
								torneig
									LEFT JOIN inscrit  ON (_01_pk_idTorn    = _01_pk_idTornInsc  AND 
														   _02_pk_idJocTorn = _02_pk_idJocInsc )
									INNER JOIN jugador ON _01_pk_idJug  = _03_pk_idJugInsc
									INNER JOIN usuari  ON _01_pk_idJug  = _01_pk_idUsuari
							WHERE 
								_09_datBaixaTorn   IS NULL AND
								_10_datBaixaUsuari IS NULL
							ORDER BY idTorn, idUser;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;
			case TORNEIGS_AMB_JUGADORS_HISTORIC_3360 :
				$query    = 'SELECT _01_pk_idTorn    AS idTorn,
									_03_nomTorn      AS nomTorn,
									_04_premiTorn    AS premiTorn,
									_02_pk_idJocTorn AS idJoc,
									BB.nomJoc        AS nomJoc, 									
									_01_pk_idJug     AS idUser,
									_04_loginUsuari  AS loginUser,
									_02_nomUsuari    AS nomUser,
									DATE_FORMAT(_05_datIniTorn, "%d-%m-%Y") AS datIniTorn,
									DATE_FORMAT(_06_datFinTorn, "%d-%m-%Y") AS datFinTorn,
									DATE_FORMAT(_09_datBaixaTorn, "%d-%m-%Y") AS datBaixaTorn,
									DATE_FORMAT(_10_datBaixaUsuari, "%d-%m-%Y") AS datBaixaUser
							FROM
								(SELECT _02_nomJoc AS nomJoc FROM joc) AS BB,							
								torneig
									LEFT JOIN inscrit  ON (_01_pk_idTorn = _01_pk_idTornInsc  AND _02_pk_idJocTorn = _02_pk_idJocInsc )
									INNER JOIN jugador ON _01_pk_idJug  = _03_pk_idJugInsc
									INNER JOIN usuari  ON _01_pk_idJug  = _01_pk_idUsuari
							ORDER BY idTorn, idUSer;';				
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;	
			case TORNEIGS_AMB_MAQUINES_ACTUAL_3380 :
				$query    = 'SELECT _01_pk_idTorn    AS idTorn,
									_03_nomTorn      AS nomTorn,
									_04_premiTorn    AS premiTorn,
									_02_pk_idJocTorn AS idJoc,
									CC.nomJoc        AS nomJoc,
									_02_pk_idMaqTTP  AS idMaq,
									BB.idUsuari      AS idUser,
									BB.nomJug        AS nomUser,
									_05_pk_idRonda   AS rondaPart,
									_07_puntsRonda   AS punts,
									DATE_FORMAT(_04_pk_idDatHoraPart, "%d-%m-%Y %H:%i:%s") AS datHoraPartida
							FROM
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug FROM usuari) AS BB,
								(SELECT _02_nomJoc AS nomJoc FROM joc) AS CC,
								torneig
									LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
									INNER JOIN partida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  							   _03_pk_idJocTTP = _02_pk_idJocPart AND
							  							   _04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN ronda ON (_01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 							 _04_pk_idDatHoraPart = _04_pk_idDatHoraPartRonda )						  
							WHERE 
								_09_datBaixaTorn IS NULL AND
								_06_datBaixaPart IS NULL	
							GROUP BY idTorn,idMaq,idUsuari,datHoraPartida,rondaPart
							ORDER BY idTorn,idMaq,idUsuari,datHoraPartida,rondaPart;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;	
			case TORNEIGS_AMB_MAQUINES_HISTORIC_3390 :
				$query    = 'SELECT _01_pk_idTorn    AS idTorn,
									_03_nomTorn      AS nomTorn,
									_04_premiTorn    AS premiTorn,
									_02_pk_idJocTorn AS idJoc,
									CC.nomJoc        AS nomJoc,
									_02_pk_idMaqTTP  AS idMaq,
									BB.idUsuari      AS idUser,
									BB.nomJug        AS nomUser,
									_05_pk_idRonda   AS rondaPart,
									_07_puntsRonda   AS punts,
									DATE_FORMAT(_04_pk_idDatHoraPart, "%d-%m-%Y %H:%i:%s") AS datHoraPartida,
									DATE_FORMAT(_09_datBaixaTorn, "%d-%m-%Y") AS datBaixaTorn,
									DATE_FORMAT(_06_datBaixaPart, "%d-%m-%Y") AS datBaixaPart									
							FROM
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug FROM usuari) AS BB,
								(SELECT _02_nomJoc AS nomJoc FROM joc) AS CC,
								torneig
									LEFT JOIN torneigTePartida ON (_01_pk_idTorn = _01_pk_idTornTTP AND _02_pk_idJocTorn = _03_pk_idJocTTP)
									INNER JOIN partida ON (_02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  							   _03_pk_idJocTTP = _02_pk_idJocPart AND
							  							   _04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN ronda ON (_01_pk_idMaqPart = _01_pk_idMaqRonda AND
							 							 _02_pk_idJocPart = _02_pk_idJocRonda AND
							 							 _03_pk_idJugPart = _03_pk_idJugRonda AND
							 							 _04_pk_idDatHoraPart = _04_pk_idDatHoraPartRonda )						  
							GROUP BY idTorn,idMaq,idUsuari,datHoraPartida,rondaPart
							ORDER BY idTorn,idMaq,idUsuari,datHoraPartida,rondaPart;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;	

			case ALTA_MAQUINA_3410 :
				$query    = 'INSERT INTO maquina 
								VALUES (NULL,
										"$macMaq",
										"$propMaq",0,0,NOW(),NULL,NULL);';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));				
				break;			
			case BAIXA_MAQUINA_3420 :
				$query    = 'UPDATE maquina SET _08_datBaixaMaq = NOW()
								WHERE 
									_01_pk_idMaq = "' . $idMaq . '" AND
									_08_datBaixaMaq IS NULL;';
				$response = dbExec($query,0);
				$query    = 'UPDATE maqinstall SET _08_datBaixaMaqInst = NOW()
								WHERE 
									_01_pk_idMaqInst = "' . $idMaq . '" AND
									_08_datBaixaMaqInst IS NULL;';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;
			case MODIFICACIO_MAQUINA_3425 :
				$query    = 'UPDATE maquina SET _02_macMaq      = "$macMaq",
										        _03_propMaq     = "$propMaq",
										        _04_credMaq     = "$credMaq",
										        _05_totCredMaq  = "$totCredMaq",
										        _06_datAltaMaq  = "$dataAltaMaq",
										        _07_datModMaq   = NOW(),
												_08_datBaixaMaq = "$dataBaixaMaq"						      
								WHERE
									_01_pk_idMaq    = "' . $idMaq . '";';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;
			case ACTUALITZA_RACAUDACIO_MAQ_3430 :
				$query    = 'UPDATE maquina SET _04_credMaq     = "$credMaq",
 										        _05_totCredMaq  = _05_totCredMaq + "$credMaq",
										        _07_datModMaq   = NOW()
								WHERE 
									_01_pk_idMaq    = "' . $idMaq . '" AND
									_08_datBaixaMaq IS NULL;';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
			case LLISTAT_MAQUINES_3440 :
				$query    = 'SELECT MAQ._01_pk_idMaq AS idMaq,
									MAQ._02_macMaq   AS macMaq,
									MAQ._03_propMaq  AS propMaq,
									_01_pk_idJoc     AS idJoc,
									_02_nomJoc       AS nomJoc,
									_05_totCredJocMaqInst AS totalCredits,
									AA._01_pk_idUbic AS idUbic,
									AA._02_empUbic   AS empUbic,
									AA._04_pobUbic   AS pobUbic,
									AA._06_provUbic  AS provUbic,
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
							GROUP BY idMaq, idUbic, idJoc;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;
			case LLISTAT_MAQUINES_HISTORIC_3450 :
				$query    = 'SELECT MAQ._01_pk_idMaq AS idMaq,
									MAQ._02_macMaq   AS macMaq,
									MAQ._03_propMaq  AS propMaq,
									_01_pk_idJoc     AS idJoc,
									_02_nomJoc       AS nomJoc,
									_05_totCredJocMaqInst AS totalCredits,
									AA._01_pk_idUbic AS idUbic,
									AA._02_empUbic   AS empUbic,
									AA._04_pobUbic   AS pobUbic,
									AA._06_provUbic  AS provUbic,
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
							GROUP BY idMaq, idUbic, idJoc;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;

			case ALTA_ASSIGNACIO_JOC_MAQUINA_3460 :
				$query    = 'INSERT INTO maqInstall
								VALUES (NULL,
										"' . $idMaq . '",
										"' . $idJoc . '",0,0,0,NOW(),NULL,NULL);';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;			
			case BAIXA_ASSIGNACIO_JOC_MAQUINA_3470 :
				$query    = 'UPDATE maqInstall SET _08_datBaixaMaqInst = NOW()
								WHERE 
									_01_pk_idMaqInst  = "' . $idMaq . '" AND
									_02_pk_idJocInst  = "' . $idJoc . '" AND
									_08_datBaixaMaqInst  IS NULL;';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;
			case MODIF_ASSIGNACIO_JOC_MAQUINA_3480 :
				$query    = 'UPDATE maqInstall SET 
											_03_numPartidesJugadesMaqInst    = "$parcialCreditsJoc",
											_04_credJocMaqInst    = "$parcialCreditsJoc",
											_05_totCredJocMaqInst = "$totalCreditsJoc",										
											_06_datAltaMaqInst    = "$dataAltaMaqInst",
											_07_datModMaqInst     = NOW(),
											_08_datBaixaMaqInst   = "$dataBaixaMaqInst"
								WHERE 
									_01_pk_idMaqInst = "' . $idMaq . '" AND
									_02_pk_idJocInst = "' . $idJoc . '";';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;				
			case LLISTAT_ASSIGNACIO_JOC_MAQUINA_3490 :
				$query    = 'SELECT _01_pk_idMaq AS idMaq,
									_02_macMaq   AS macMaq,
									_01_pk_idJoc AS idJoc,
									_02_nomJoc   AS nomJoc,
									_03_numPartidesJugadesMaqInst AS numPartides,
									_05_totCredJocMaqInst AS totalCredits
							FROM joc
								LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
								INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq
							WHERE 	
								_08_datBaixaJoc      IS NULL AND
								_08_datBaixaMaqInst  IS NULL AND
								_08_datBaixaMaq      IS NULL	
							GROUP BY idMaq,idJoc
							ORDER BY idMaq,idJoc;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;
			case RECAUDACIO_X_MAQ_AMB_RANKING_3510 :
				$query    = 'DROP TABLE CC;';
				$response  = dbExec($query,0);
				$query    = 'CREATE TABLE CC  ENGINE=MEMORY
							SELECT _01_pk_idMaq   AS idMaq,
								   _02_macMaq     AS macMaq,
								   _03_propMaq    AS propMaq,
								   _05_totCredMaq AS totalCredits
							FROM maquina
							WHERE  _08_datBaixaMaq IS NULL
							GROUP BY idMaq
							ORDER BY totalCredits DESC;';
				$response  = dbExec($query,0);
				$response1 = controlErrorQuery($response);				
				if ( !($response[0]->error) )
					{
					$query    = 'SELECT * FROM CC
								UNION
								SELECT ""      AS idMaq,
									   ""      AS macMaq,
									   "TOTAL" AS propMaq,
								   		SUM(_05_totCredMaq) AS totalCredits
								FROM maquina;';
					$response  = dbExec($query);	
					$response1 = controlErrorQuery($response);
					$query    = 'DROP TABLE CC;';
					$response  = dbExec($query,0);
					}
				echo json_encode( $response1 );
				break;			
			case RECAUDACIO_X_JOC_AMB_RANKING_3520 :
				$query    = 'DROP TABLE CC;';
				$response  = dbExec($query,0);			
				$query    = 'CREATE TABLE CC  ENGINE=MEMORY
							SELECT _01_pk_idJoc AS idJoc,
								   _02_nomJoc   AS nomJoc,
								   SUM(_05_totCredJocMaqInst) AS totalCredits
							FROM joc
								LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
								INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq
							WHERE 	
								_08_datBaixaJoc      IS NULL AND
								_08_datBaixaMaqInst  IS NULL AND
								_08_datBaixaMaq      IS NULL
							GROUP BY idJoc
							ORDER BY totalCredits;';
				$response = dbExec($query,0);
				$response1 = controlErrorQuery($response);				
				if ( !($response[0]->error) )
					{
					$query    = 'SELECT * FROM CC
								UNION
								SELECT ""      AS idJoc,
									   "TOTAL" AS nomJoc,
									   SUM(totalCredits) AS totalCredits
								FROM CC
								ORDER BY totalCredits;';
					$response  = dbExec($query);	
					$response1 = controlErrorQuery($response);
					$query     = 'DROP TABLE CC;';
					$response  = dbExec($query,0);
					}
				echo json_encode( $response1 );
				break;			
			case RECAUDACIO_X_JOC_I_MAQ_3530 :
				$query    = 'SELECT _01_pk_idJoc AS idJoc,
									_02_nomJoc   AS nomJoc,
									_01_pk_idMaq AS idMaq,
									_02_macMaq   AS macMaq,
									_05_totCredJocMaqInst AS totalCredits
							FROM joc
								LEFT JOIN maqInstall ON _01_pk_idJoc = _02_pk_idJocInst
								INNER JOIN maquina ON _01_pk_idMaqInst = _01_pk_idMaq
							WHERE 	
								_08_datBaixaJoc      IS NULL AND
								_08_datBaixaMaqInst  IS NULL AND
								_08_datBaixaMaq      IS NULL	
							ORDER BY idJoc,idMaq;';
				$response = dbExec($query);							
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_PROPIETARI_3540 :	
				$query    = 'SELECT _03_propMaq AS propMaq,
							  		SUM(_05_totCredMaq) AS totalCredits
							FROM maquina
							WHERE 	
								_08_datBaixaMaq  IS NULL
							GROUP BY propMAq
							ORDER BY propMaq,totalCredits;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_PROPIETARI_I_MAQ_3550 :		
				$query    = 'SELECT _03_propMaq  AS propMaq,
								    _01_pk_idMaq AS idMaq,
								    _02_macMaq   AS macMaq,
									SUM(_05_totCredMaq) AS totalCredits
							FROM maquina
							WHERE 	
								_08_datBaixaMaq  IS NULL
							GROUP BY propMAq,idMaq
							ORDER BY propMaq,idMaq,totalCredits;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_PROPIETARI_I_JOC_3560 :
				$query    = 'SELECT _03_propMaq  AS propMaq,
									_01_pk_idJoc AS idJoc,
									_02_nomJoc   AS nomJoc,
									_01_pk_idMaq AS idMaq,
									_02_macMaq   AS macMaq,
									SUM(_05_totCredJocMaqInst) AS totalCredits
							FROM joc
								LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
								INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq
							WHERE
								_08_datBaixaJoc      IS NULL AND
								_08_datBaixaMaqInst  IS NULL AND
								_08_datBaixaMaq      IS NULL
								
							GROUP BY propMaq, nomJoc, idMaq
							ORDER BY propMaq, nomJoc,totalCredits DESC, idMaq;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_PROV_CP_POB_3570 :
				$query    = 'SELECT _06_provUbic AS provincia,
								    _04_pobUbic  AS poblacio,
								    _05_cpUbic   AS cPostal,
									SUM(_05_totCredMaq) AS totalCredits
							FROM maquina
								LEFT JOIN ubicacioTeMaquina ON _01_pk_idMaq = _02_pk_idMaqUTM
								INNER JOIN ubicacio ON _01_pk_idUbicUTM = _01_pk_idUbic
							WHERE 	
								_08_datBaixaMaq  IS NULL AND
								_05_datBaixaUTM  IS NULL AND	
								_16_datBaixaUbic IS NULL
							GROUP BY provincia, poblacio, cPostal
							ORDER BY provincia, poblacio, cPostal, totalCredits;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_POBLACIO_3580 :		
				$query    = 'SELECT _04_pobUbic AS poblacio,
									SUM(_05_totCredMaq) AS totalCredits
							FROM maquina
								LEFT JOIN ubicacioTeMaquina ON _01_pk_idMaq = _02_pk_idMaqUTM
								INNER JOIN ubicacio ON _01_pk_idUbicUTM = _01_pk_idUbic
							WHERE 	
								_08_datBaixaMaq  IS NULL AND
								_05_datBaixaUTM  IS NULL AND	
								_16_datBaixaUbic IS NULL
							GROUP BY poblacio
							ORDER BY poblacio, totalCredits;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_PROV_CP_POB_MAQ_3590 :
				$query    = 'SELECT _06_provUbic AS provincia,
									_04_pobUbic  AS poblacio,
									_05_cpUbic   AS cPostal,
									_01_pk_idMaq AS idMaq,
									_02_macMaq   AS macMaq,
									SUM(_05_totCredMaq) AS totalCredits
							FROM maquina
								LEFT JOIN ubicacioTeMaquina ON _01_pk_idMaq = _02_pk_idMaqUTM
								INNER JOIN ubicacio ON _01_pk_idUbicUTM = _01_pk_idUbic
							WHERE 	
								_08_datBaixaMaq  IS NULL AND
								_05_datBaixaUTM  IS NULL AND		
								_16_datBaixaUbic IS NULL
							GROUP BY provincia, poblacio, cPostal, idMaq
							ORDER BY provincia, poblacio, cPostal, idMaq, totalCredits;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_JOC_3600 :	
				$query    = 'SELECT _01_pk_idJoc AS idJoc,
									_02_nomJoc   AS nomJoc,
									SUM(_05_totCredJocMaqInst) AS totalCredits
							FROM joc
								LEFT JOIN maqInstall ON _01_pk_idJoc     = _02_pk_idJocInst
								INNER JOIN maquina   ON _01_pk_idMaqInst = _01_pk_idMaq
							WHERE 	
								_08_datBaixaJoc      IS NULL AND
								_08_datBaixaMaqInst  IS NULL AND
								_08_datBaixaMaq      IS NULL
							GROUP BY nomJoc
							ORDER BY totalCredits DESC;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_JOC_POB_3610 :			
				$query    = 'SELECT AA._04_pobUbic   AS poblacio,
									_01_pk_idJoc     AS idJoc,
									_02_nomJoc       AS nomJoc,
									MAQ._01_pk_idMaq AS idMaq,
									MAQ._02_macMaq   AS macMaq,
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
							GROUP BY poblacio, idJoc, idMaq
							ORDER BY poblacio, idJoc, totalCredits DESC;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case RECAUDACIO_X_JOC_PROV_POB_CP_3620 :
				$query    = 'SELECT AA._06_provUbic  AS provincia,
									AA._04_pobUbic   AS poblacio,
									AA._05_cpUbic    AS cPostal,
									_01_pk_idJoc     AS idJoc,
									_02_nomJoc       AS nomJoc,
									MAQ._01_pk_idMaq AS idMaq,
									MAQ._02_macMaq   AS macMaq,
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
							ORDER BY provincia, poblacio, cPostal, idJoc, totalCredits DESC;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			

			case ALTA_UBICACIO_3810 :
				$query    = 'INSERT INTO ubicacio
								VALUES (NULL,
										"$empUbic",
										"$dirUbic",
										"$pobUbic",
										"$cpUbic",
										"$provUbic",
										"$latUbic",
										"$longUbic",
										"$altUbic",
										"$contactoUbic",
										"$emailUbic",
										"$telUbic",
										"$mobilUbic",NOW(),NULL,NULL);';
				$response = dbExec($query,0);				
				echo json_encode(controlErrorQuery($response));
				break;
			case BAIXA_UBICACIO_3820 :
				$query    = 'UPDATE ubicacio SET _16_datBaixaUbic = NOW()
								WHERE 
									_01_pk_idUbic = "' . $idUbic . '" AND
									_16_datBaixaUbic IS NULL;';
				$response = dbExec($query,0);				
				echo json_encode(controlErrorQuery($response));			
				break;			
			case MODIFICACIO_UBICACIO_3830 :
				$query    = 'UPDATE ubicacio SET 
											_02_empUbic     = "$emp",
											_03_dirUbic     = "$dir",
											_04_pobUbic     = "$pob",
											_05_cpUbic      = "$cp",
											_06_provUbic    = "$prov",
											_07_latUbic     = "$latitut",
											_08_longUbic    = "&longitud",
											_09_altUbic     = "&altitud",
											_10_contUbic    = "$personaContacte",
											_11_emailUbic   = "$emailContacte",
											_12_telUbic     = "$telContacte",
											_13_mobUbic     = "$mobilContacte",
											_14_datAltaUbic = "$dataAltaUbic",
											_15_datModUbic  = NOW(),
											_16_datBaixaUbic= "$dataBaixaUbic"
								WHERE 
									_01_pk_idUbic = "' . $idUbic . '";';
				$response = dbExec($query,0);				
				echo json_encode(controlErrorQuery($response));			
				break;
			case LLISTAT_UBICS_X_PROV_POB_3840 :
				$query    = 'SELECT _06_provUbic     AS provincia,
									_04_pobUbic      AS poblacio,
									_05_cpUbic       AS cPostal,
									_01_pk_idUbic    AS idUbic,
									_02_empUbic      AS empUbic,
									_03_dirUbic      AS dirUbic,
									_07_latUbic      AS latitut,
									_08_longUbic     AS longitut,
									_09_altUbic      AS altitut,
									_10_contUbic     AS contactUbic,
									_11_emailUbic    AS emailContacte,
									_12_telUbic      AS telefonContacte,
									_13_mobUbic      AS mobilContacte,
									DATE_FORMAT(_14_datAltaUbic, "%d-%m-%Y")  AS datAltaUbic, 
									DATE_FORMAT(_16_datBaixaUbic, "%d-%m-%Y") AS datBaixaUbic
							FROM ubicacio
							GROUP BY provincia, poblacio, cPostal, idUbic
							ORDER BY provincia, poblacio, cPostal;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_UBICS_X_COORDENADES_3850 :
				$query    = 'SELECT _07_latUbic   AS latitut,
									_08_longUbic  AS longitut,
									_09_altUbic   AS altitut,
									_01_pk_idUbic AS idUbic,
									_02_empUbic   AS empUbic,
									_03_dirUbic   AS dirUbic,
									_06_provUbic  AS provincia,
									_05_cpUbic    AS cPostal,
									_04_pobUbic   AS poblacio,
									_10_contUbic  AS contactUbic,
									_11_emailUbic AS emailContacte,
									_12_telUbic   AS telefonContacte,
									_13_mobUbic   AS mobilContacte,
									DATE_FORMAT(_14_datAltaUbic, "%d-%m-%Y")  AS datAltaUbic,
									DATE_FORMAT(_16_datBaixaUbic, "%d-%m-%Y") AS datBaixaUbic
							FROM ubicacio
							GROUP BY latitut, longitut, altitut, idUbic
							ORDER BY latitut, longitut, altitut;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_UBICS_X_EMPRESA_3860 :
				$query    = 'SELECT _01_pk_idUbic AS idUbic,
									_02_empUbic   AS empUbic,
									_03_dirUbic   AS dirUbic,
									_06_provUbic  AS provincia,
									_05_cpUbic    AS cPostal,
									_04_pobUbic   AS poblacio,
									_10_contUbic  AS contactUbic,
									_11_emailUbic AS emailContacte,
									_12_telUbic   AS telefonContacte,
									_13_mobUbic   AS mobilContacte,
									DATE_FORMAT(_14_datAltaUbic, "%d-%m-%Y")  AS datAltaUbic,
									DATE_FORMAT(_16_datBaixaUbic, "%d-%m-%Y") AS datBaixaUbic
							FROM ubicacio
							ORDER BY empUbic;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_UBICS_X_EMPRESA_PROV_POB_3870 :
				$query    = 'SELECT _06_provUbic  AS provincia,
									_04_pobUbic   AS poblacio,
									_05_cpUbic    AS cPostal,
									_01_pk_idUbic AS idUbic,
									_02_empUbic   AS empUbic,
									_03_dirUbic   AS dirUbic,
									_10_contUbic  AS contactUbic,
									_11_emailUbic AS emailContacte,
									_12_telUbic AS telefonContacte,
									_13_mobUbic AS mobilContacte,
									DATE_FORMAT(_14_datAltaUbic, "%d-%m-%Y")  AS datAltaUbic,
									DATE_FORMAT(_16_datBaixaUbic, "%d-%m-%Y") AS datBaixaUbic
							FROM ubicacio
							ORDER BY provincia, poblacio, cPostal;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;
			case ALTA_MAQ_X_UBICACIO_3880 :
				$query    = 'INSERT INTO ubicacioTeMaquina
								VALUES (NULL,
										"' . $idUbic . '",
										"' . $idMaq . '",
										NOW(),NULL,NULL);';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;			
			case BAIXA_MAQ_X_UBICACIO_3890 :
				$query    = 'UPDATE ubicacioTeMaquina SET _05_datBaixaUTM = NOW()
								WHERE 
									_01_pk_idUbicUTM = "' . $idUbic . '" AND
									_02_pk_idMaqUTM  = "' . $idMaq . '" AND
									_05_datBaixaUTM  IS NULL;';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;			
			case MODIFICACIO_MAQ_X_UBICACIO_3900 :
				$query    = 'UPDATE ubicacioTeMaquina SET 
														_03_datAltaUTM  = "$dataAltaUTM",
														_04_datModUTM   = NOW(),
														_05_datBaixaUTM = "$dataBaixaUTM"
								WHERE 
									_01_pk_idUbicUTM = "' . $idUbic . '" AND
									_02_pk_idMaqUTM  = "' . $idMaq . '";';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;				
			case CANVI_MAQ_D_UBICACIO_3910 :
				$query    = 'UPDATE ubicacioTeMaquina SET _05_datBaixaUTM = NOW()
								WHERE 
									_01_pk_idUbicUTM = "' . $idUbic . '" AND
									_02_pk_idMaqUTM  = "' . $idMaq . '" AND
									_05_datBaixaUTM  IS NULL;';
				$response = dbExec($query,0);
				$query    = 'INSERT INTO ubicacioTeMaquina
								VALUES (NULL,
										"' . $idUbicNOU . '",
										"' . $idMaq . '",
										NOW(),NULL,NULL);';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));			
				break;			
			case LLISTAT_MAQS_X_UBIC_PROV_POB_3930 :
				$query    = 'SELECT _06_provUbic AS provincia,
									_04_pobUbic  AS poblacio,
									_05_cpUbic   AS cPostal,
									_01_pk_idMaq AS idMaq,
									_02_macMaq   AS macMaq,
									SUM(_05_totCredMaq) AS totalCredits
							FROM ubicacio
								INNER JOIN ubicacioTeMaquina ON _01_pk_idUbic   = _01_pk_idUbicUTM
								INNER JOIN maquina           ON _02_pk_idMaqUTM = _01_pk_idMaq
							WHERE 	
								_08_datBaixaMaq  IS NULL AND
								_05_datBaixaUTM  IS NULL AND	
								_16_datBaixaUbic IS NULL
							GROUP BY provincia, poblacio, cPostal, _01_pk_idUbic, idMaq
							ORDER BY provincia, poblacio, cPostal, _01_pk_idUbic, idMaq, totalCredits;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_MAQS_X_UBIC_COORDENADES_3940 :
				$query    = 'SELECT _07_latUbic  AS latitut,
									_08_longUbic AS longitut,
									_09_altUbic  AS altitut,
									_06_provUbic AS provincia,
									_04_pobUbic  AS poblacio,
									_01_pk_idMaq AS idMaq,
									_02_macMaq   AS macMaq,
									SUM(_05_totCredMaq) AS totalCredits
							FROM ubicacio
							INNER JOIN ubicacioTeMaquina ON _01_pk_idUbic   = _01_pk_idUbicUTM
							INNER JOIN maquina           ON _02_pk_idMaqUTM = _01_pk_idMaq
							WHERE 	
								_08_datBaixaMaq  IS NULL AND
								_05_datBaixaUTM  IS NULL AND	
								_16_datBaixaUbic IS NULL								
							GROUP BY latitut, longitut, altitut, _01_pk_idUbic, idMaq
							ORDER BY latitut, longitut, altitut, _01_pk_idUbic, idMaq, totalCredits;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_MAQS_X_EMPRESA_3950 :
				$query    = 'SELECT _01_pk_idUbic AS idUbic,
									_02_empUbic   AS empUbic,
									_03_dirUbic   AS dirUbic,
									_06_provUbic  AS provincia,
									_05_cpUbic    AS cPostal,
									_04_pobUbic   AS poblacio,
									_10_contUbic  AS contactUbic,
									_11_emailUbic AS emailContacte, 
									_12_telUbic   AS telefonContacte,
									_13_mobUbic   AS mobilContacte,
									_01_pk_idMaq  AS idMaq,
									_02_macMaq    AS macMaq,
									SUM(_05_totCredMaq) AS totalCredits
							FROM ubicacio
								INNER JOIN ubicacioTeMaquina ON _01_pk_idUbic   = _01_pk_idUbicUTM
								INNER JOIN maquina           ON _02_pk_idMaqUTM = _01_pk_idMaq
							WHERE 	
								_08_datBaixaMaq  IS NULL AND
								_05_datBaixaUTM  IS NULL AND	
								_16_datBaixaUbic IS NULL
							GROUP BY empUbic, _01_pk_idUbic, idMaq
							ORDER BY empUbic, _01_pk_idUbic, idMaq, totalCredits;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case PERFILS_JUGADORS_4010 :
				$query    = 'SELECT _01_pk_idUsuari  AS recid,
				 					_01_pk_idUsuari  AS idUsr,
									_02_nomUsuari    AS nomUsr,
									_03_cognomUsuari AS cogUsr,
									_04_loginUsuari  AS loginUsr,
									_06_emailUsuari  AS emailUsr,
									_07_fotoUsuari   AS fotoUsr,
									_02_faceJug      AS facebookUsr,
									_03_twitterJug   AS twitterUsr,
									DATE_FORMAT(_08_datAltaUsuari,  "%d-%m-%Y %H:%i:%s") AS datAltaUsr,
									DATE_FORMAT(_09_datModUsuari, "%d-%m-%Y %H:%i:%s") AS datModUsr,
									DATE_FORMAT(_10_datBaixaUsuari, "%d-%m-%Y %H:%i:%s") AS datBaixaUsr
							FROM usuari
								LEFT JOIN jugador ON _01_pk_idUsuari = _01_pk_idJug;';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));
				break;			
			case BLOQUEJAR_JUGADOR_4020 :
				$query    = 'UPDATE usuari SET _10_datBaixaUsuari = NOW()
								WHERE 
									_10_datBaixaUsuari IS NULL AND
									_01_pk_idUsuari = "' . $idUsr . '";';
				$response  = dbExec($query,0);
				$query    = 'UPDATE jugador SET _06_datBaixaJug  = NOW()
								WHERE
									 _06_datBaixaJug IS NULL AND
									 _01_pk_idJug = "' . $idUsr . '";';
				$response  = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));				
				break;			
			case DESBLOQUEJAR_JUGADOR_4030 :
				$query    = 'UPDATE usuari SET _09_datModUsuari   = NOW(),
											   _10_datBaixaUsuari = NULL
								WHERE 
									_10_datBaixaUsuari IS NOT NULL AND
									_04_loginUsuari = "' . $usrLogin . '";';
				$response  = dbExec($query,0);
				$query    = 'UPDATE jugador SET _05_datModJug    = NOW(),
						 						_06_datBaixaJug  = NULL
								WHERE
									 _06_datBaixaJug IS NOT NULL AND
									(_01_pk_idJug IN
											( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
												WHERE _04_loginUsuari = "' . $usrLogin . '"));';
				$response  = dbExec($query,0);			
				echo json_encode(controlErrorQuery($response));			
				break;		
			case TORNEIGS_REGISTRATS_X_JUGADOR_4040 :
				$query    = 'DROP TABLE CC;';
				$response  = dbExec($query,0);
				$query    = 'CREATE TABLE CC  ENGINE=MEMORY
							SELECT 	_03_pk_idJugRonda AS idJug,
						 			BB.nomJug,
						 			BB.loginJug,
									_01_pk_idTorn AS idTorn,
							 		_03_nomTorn   AS nomTorn,
						 			idJoc,
						 			AA.nomJoc,
						 			SUM(_07_puntsRonda) AS punts
							FROM 
								(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS AA,
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug, _04_loginUsuari AS loginJug FROM usuari) AS BB,
								torneig
									LEFT JOIN torneigTePartida ON (	_01_pk_idTorn = _01_pk_idTornTTP AND
																	_02_pk_idJocTorn = _03_pk_idJocTTP)
									INNER JOIN partida ON ( _02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  								_03_pk_idJocTTP = _02_pk_idJocPart AND
							  								_04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN ronda   ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
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
							ORDER BY _01_pk_idTorn, punts DESC;';
				$response = dbExec($query,0);
				$response1 = controlErrorQuery($response);				
				if ( !($response[0]->error) )
					{					
					$query    = 'SELECT * FROM
								( 
								SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking
								FROM 
									CC,
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
									_06_datFinTorn   >= CURDATE() ) AS ZZ
								WHERE ranking BETWEEN 1 AND 10
								GROUP BY idJug, idTorn
								ORDER BY idJug, idTorn, ranking;';
					$response  = dbExec($query);	
					$response1 = controlErrorQuery($response);
					$query     = 'DROP TABLE CC;';
					$response  = dbExec($query,0);
					}
				echo json_encode( $response1 );
				break;
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
//
//
//								QUERYS D'USUARIS
//
//
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

			case CONSULTA_USR_5020 :
				// $query    = 'SELECT id, nom, foto FROM productes WHERE id < 3';
				// $response = dbExec($query)[1];

				// $records = array();
				// foreach($response as $row) {
				// 	$records[] = (object) array('recid'=>(int)$row->id, 'nom'=>$row->nom, 'foto'=>$row->foto);
				// }

				// echo json_encode( $records );
				break;
			case GET_DADES_PERFIL_USR_5021 :
				$query    = 'SELECT _01_pk_idUsuari  AS idUsr,
									_02_nomUsuari    AS nomUsr,
									_03_cognomUsuari AS cogUsr,
									_04_loginUsuari  AS loginUsr,
									_05_pwdUsuari    AS passwordUsr,
									_06_emailUsuari  AS emailUsr,
									_07_fotoUsuari   AS fotoUsr,
									_02_faceJug      AS facebookUsr,
									_03_twitterJug   AS twitterUsr
							FROM usuari
								LEFT JOIN jugador ON _01_pk_idUsuari = _01_pk_idJug
							WHERE
								_10_datBaixaUsuari IS NULL AND
								_06_datBaixaJug    IS NULL AND
								_04_loginUsuari = "' . $usrLogin . '";';
			case MODIF_PERFIL_USR_5022 :
				$query    = 'UPDATE usuari SET _02_nomUsuari    = "$nom",
								               _03_cognomUsuari = "$cognom",
								  			   _05_pwdUsuari    = "$passwor",
										   	   _06_emailUsuari  = "$email",						
											   _07_fotoUsuari   = "$nomFoto",
											   _09_datModUsuari = NOW()
							WHERE
								_10_datBaixaUsuari IS NULL AND
								_04_loginUsuari = "' . $usrLogin . '";';
				$response = dbExec($query,0);
				$query    = 'UPDATE jugador SET _02_faceJug    = "$facebook",
						 						_03_twitterJug = "$twitter",
						 						_05_datModJug  = NOW()
							WHERE 
								_06_datBaixaJug IS NULL AND
								(_01_pk_idJug 
									IN ( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
										WHERE _04_loginUsuari = "' . $usrLogin . '"));';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));				
				break;

			case BAIXA_PERFIL_USR_5023 :
				$query    = 'UPDATE usuari SET _10_datBaixaUsuari = NOW()
							 WHERE 
								_10_datBaixaUsuari IS NULL AND
								_04_loginUsuari = "' . $usrLogin . '";';		
				$response = dbExec($query,0);
				$query    = 'UPDATE jugador SET _06_datBaixaJug  = NOW()
							 WHERE
								 _06_datBaixaJug IS NULL AND
								 (_01_pk_idJug IN ( SELECT _01_pk_idUsuari AS _01_pk_idJug FROM usuari
							       WHERE _04_loginUsuari = "' . $usrLogin . '"));';
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));				
				break;

			case CONSULTA_USR_TORNEIGS_5041 :
				$query    = 'SELECT _01_pk_idTorn AS recid,
									_01_pk_idTorn AS idTorn,
									_03_nomTorn AS nomTorn,
									_01_pk_idJoc AS idJoc,
									_02_nomJoc AS nomJoc 
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
								_04_loginUsuari = "' . $usrLogin . '" ' . ' ORDER BY nomTorn;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;	

			case BAIXA_USR_TORN_5043 :
				$query    = 'UPDATE inscrit SET _06_datBaixaInsc  = NOW()
							 WHERE 
								_06_datBaixaInsc IS NULL AND
								(_02_pk_idJocInsc IN 
									( SELECT _02_pk_idJocTorn AS _02_pk_idJocInsc FROM torneig 
										WHERE _01_pk_idTornInsc = "' . $idTorn . '" )) AND
		
								_01_pk_idTornInsc = "' . $idTorn . '" AND
								(_03_pk_idJugInsc IN 
									( SELECT _01_pk_idUsuari AS _03_pk_idJugInsc FROM usuari
										WHERE _04_loginUsuari = "' . $usrLogin . '"));';			
				$response = dbExec($query,0);
				echo json_encode(controlErrorQuery($response));				
				break;
			case CONSULTA_USR_RANKING_ACTUAL_5050 :
				$query    = 'DROP TABLE CC;';
				$response  = dbExec($query,0);
				$query    = 'CREATE TABLE CC  ENGINE=MEMORY
							SELECT 	_01_pk_idTorn AS idTorn,
							 		_03_nomTorn AS nomTorn,
						 			idJoc,
						 			AA.nomJoc,
						 			_03_pk_idJugRonda AS idJug,
						 			BB.nomJug,
						 			BB.loginJug,
						 			sum(_07_puntsRonda) AS punts
							FROM 
								(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS AA,
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug, _04_loginUsuari AS loginJug FROM usuari) AS BB,

								torneig
									LEFT JOIN torneigTePartida ON (	_01_pk_idTorn = _01_pk_idTornTTP AND
																	_02_pk_idJocTorn = _03_pk_idJocTTP)
									INNER JOIN partida ON ( _02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  								_03_pk_idJocTTP = _02_pk_idJocPart AND
							  								_04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN ronda   ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
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
							ORDER BY _01_pk_idTorn, punts DESC;';
				$response = dbExec($query,0);
				$response1 = controlErrorQuery($response);				
				if ( !($response[0]->error) )
					{					
					$query    = 'SELECT * FROM
								( 
								SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking
								FROM 
									CC,
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
									_06_datFinTorn   >= CURDATE() AND
									CC.loginJug = "' . $usrLogin . '" ) AS ZZ
								WHERE ranking BETWEEN 1 AND 10
								GROUP BY idTorn, idJug
								ORDER BY idTorn, ranking;';
					$response  = dbExec($query);	
					$response1 = controlErrorQuery($response);
					$query     = 'DROP TABLE CC;';
					$response  = dbExec($query,0);
					}
				echo json_encode( $response1 );
				break;	
			case CONSULTA_USR_RANKING_HISTORIC_5051 :
				$query    = 'DROP TABLE CC;';
				$response  = dbExec($query,0);			
				$query =	'CREATE TABLE CC  ENGINE=MEMORY
						 	SELECT 	_01_pk_idTorn AS idTorn,
							 		_03_nomTorn AS nomTorn,
						 			idJoc,
						 			AA.nomJoc,
						 			_03_pk_idJugRonda AS idJug,
						 			BB.nomJug,
						 			BB.loginJug,
						 			sum(_07_puntsRonda) AS punts
							FROM 
								(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS AA,
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug, _04_loginUsuari AS loginJug FROM usuari) AS BB,

								torneig
									LEFT JOIN torneigTePartida ON (	_01_pk_idTorn = _01_pk_idTornTTP AND
																	_02_pk_idJocTorn = _03_pk_idJocTTP)
									INNER JOIN partida ON ( _02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  								_03_pk_idJocTTP = _02_pk_idJocPart AND
							  								_04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN ronda   ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
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
							ORDER BY _01_pk_idTorn, punts DESC;';
				$response = dbExec($query,0);
				$response1 = controlErrorQuery($response);				
				if ( !($response[0]->error) )
					{				
					$query = 	'SELECT * FROM
								( 
								SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking
								FROM 
									CC,
									(SELECT CC.idTorn, COUNT(*) AS numRK, group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS FROM CC GROUP BY CC.idTorn) AS XX,
									jugador
										LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
										INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
								WHERE 
									_06_datBaixaJug  IS NULL AND
									_09_datBaixaTorn IS NULL AND
									CC.idJug  = _01_pk_idJug AND
									CC.idTorn = XX.idTorn AND
									CC.loginJug = "' . $usrLogin . '" ) AS ZZ
								WHERE ranking BETWEEN 1 AND 10
								GROUP BY idTorn, idJug
								ORDER BY idTorn, ranking;';
					$response  = dbExec($query);
					$response1 = controlErrorQuery($response);
					$query     = 'DROP TABLE CC;';
					$response  = dbExec($query,0);
					}
				echo json_encode( $response1 );				
				break;				

			case BAIXA_USR_TORN_5043 :
				$ret = array("test"=>"val");
				echo json_encode($ret);
				// echo "({val:'test'})";
				break;				

			case CONSULTA_USR_TOTS_TORNEIGS_5061 :
				$query    = 'SELECT _01_pk_idTorn  AS idTorn,
									_03_nomTorn    AS nomTorn,
									_01_pk_idJoc   AS idJoc,
									_02_nomJoc     AS nomJoc,
									_04_premiTorn  AS premiTorn,
									DATE_FORMAT(_05_datIniTorn, "%d-%m-%Y") AS datIniTorn,
									DATE_FORMAT(_06_datFinTorn, "%d-%m-%Y") AS datFinTorn
							FROM torneig INNER JOIN joc ON _02_pk_idJocTorn = _01_pk_idJoc
							WHERE 
								_09_datBaixaTorn IS NULL AND
								_06_datFinTorn >= CURDATE() AND
								_01_pk_idTorn NOT IN
									(SELECT _01_pk_idTorn
									FROM usuari
										LEFT JOIN jugador  ON _01_pk_idUsuari = _01_pk_idJug
										LEFT JOIN inscrit  ON _01_pk_idJug    = _03_pk_idJugInsc
										INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND
															   _02_pk_idJocInsc = _02_pk_idJocTorn )
									WHERE _04_loginUsuari = "' . $usrLogin . '"
									GROUP BY _01_pk_idTorn)
							ORDER BY datIniTorn;';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;				

			case CONSULTA_RANKING_ACTUAL_5070 :
				$query    = 'DROP TABLE CC;';
				$response  = dbExec($query,0);			
				$query    = 'CREATE TABLE CC  ENGINE=MEMORY
							SELECT 	_01_pk_idTorn AS idTorn,
							 		_03_nomTorn AS nomTorn,
						 			idJoc,
						 			AA.nomJoc,
						 			_03_pk_idJugRonda AS idJug,
						 			BB.nomJug,
						 			BB.loginJug,
						 			sum(_07_puntsRonda) AS punts,
						 			IF(BB.nomJug = "' . $usrLogin . '",_01_pk_idTorn,"0") AS idTornInscrit
							FROM 
								(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS AA,
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug, _04_loginUsuari AS loginJug FROM usuari) AS BB,

								torneig
									LEFT JOIN torneigTePartida ON (	_01_pk_idTorn = _01_pk_idTornTTP AND
																	_02_pk_idJocTorn = _03_pk_idJocTTP)
									INNER JOIN partida ON ( _02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  								_03_pk_idJocTTP = _02_pk_idJocPart AND
							  								_04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN ronda   ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
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
							ORDER BY _01_pk_idTorn, punts DESC;';
				$response = dbExec($query,0);
				$response1 = controlErrorQuery($response);				
				if ( !($response[0]->error) )
					{				
					$query    = 'SELECT * FROM
								( 
								SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking
								FROM 
									CC,
									(SELECT CC.idTorn,
											COUNT(*) AS numRK,
											group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS,
	   	  									group_concat(CC.idTornInscrit ORDER BY CC.idTornInscrit DESC) AS LLISTA_TORNS
											FROM CC
											GROUP BY CC.idTorn) AS XX,
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
									SUBSTRING_INDEX(XX.LLISTA_TORNS, ",", 1)>0 AND
									_06_datFinTorn   >= CURDATE() ) AS ZZ
								WHERE ranking BETWEEN 1 AND 10
								GROUP BY idTorn, idJug
								ORDER BY idTorn, ranking;';
					$response  = dbExec($query);	
					$response1 = controlErrorQuery($response);
					$query     = 'DROP TABLE CC;';
					$response  = dbExec($query,0);
					}
				echo json_encode( $response1 );						
				break;				

			case CONSULTA_RANKING_HISTORIC_5071 :
				$query    = 'DROP TABLE CC;';
				$response  = dbExec($query,0);			
				$query    = 'CREATE TABLE CC  ENGINE=MEMORY
							SELECT 	_01_pk_idTorn AS idTorn,
							 		_03_nomTorn AS nomTorn,
						 			idJoc,
						 			AA.nomJoc,
						 			_03_pk_idJugRonda AS idJug,
						 			BB.nomJug,
						 			BB.loginJug,
						 			sum(_07_puntsRonda) AS punts,
						 			IF(BB.nomJug = "' . $usrLogin . '",_01_pk_idTorn,"0") AS idTornInscrit						 			
							FROM 
								(SELECT _01_pk_idJoc AS idJoc ,_02_nomJoc AS nomJoc FROM joc) AS AA,
								(SELECT _01_pk_idUsuari AS idUsuari ,_02_nomUsuari AS nomJug, _04_loginUsuari AS loginJug FROM usuari) AS BB,

								torneig
									LEFT JOIN torneigTePartida ON (	_01_pk_idTorn = _01_pk_idTornTTP AND
																	_02_pk_idJocTorn = _03_pk_idJocTTP)
									INNER JOIN partida ON ( _02_pk_idMaqTTP = _01_pk_idMaqPart AND
							  								_03_pk_idJocTTP = _02_pk_idJocPart AND
							  								_04_pk_idJugTTP = _03_pk_idJugPart )
									INNER JOIN ronda   ON ( _01_pk_idMaqPart = _01_pk_idMaqRonda AND
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
							ORDER BY _01_pk_idTorn, punts DESC;';
				$response = dbExec($query,0);
				$response1 = controlErrorQuery($response);				
				if ( !($response[0]->error) )
					{				
					$query = 	'SELECT * FROM
								( 
								SELECT CC.*, find_in_set(CC.punts,XX.LLISTA_PUNTS) AS ranking, XX.numRK AS totalRanking
								FROM 
									CC,
									(SELECT CC.idTorn,
											COUNT(*) AS numRK,
											group_concat(CC.punts ORDER BY CC.punts DESC) AS LLISTA_PUNTS,
	   	  									group_concat(CC.idTornInscrit ORDER BY CC.idTornInscrit DESC) AS LLISTA_TORNS
											FROM CC
											GROUP BY CC.idTorn) AS XX,
									jugador
										LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
										INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
								WHERE 
									_06_datBaixaJug  IS NULL AND
									_09_datBaixaTorn IS NULL AND
									CC.idJug  = _01_pk_idJug AND
									SUBSTRING_INDEX(XX.LLISTA_TORNS, ",", 1)>0 AND
									CC.idTorn = XX.idTorn ) AS ZZ
								WHERE ranking BETWEEN 1 AND 10
								GROUP BY idTorn, idJug
								ORDER BY idTorn, ranking;';
					$response  = dbExec($query);
					$response1 = controlErrorQuery($response);
					$query     = 'DROP TABLE CC;';
					$response  = dbExec($query,0);
					}
				echo json_encode( $response1 );				
				break;				

			case INSCRIPCIO_USR_TORNEIG_5063 :
					$query = 'SELECT _01_pk_idUsuari INTO @IDJUG 
							  FROM usuari 
							  WHERE _04_loginUsuari = "' . $usrLogin . '";';
					$response  = dbExec($query,0);
					$query = 'INSERT INTO inscrit 
										(_00_pk_idInsc_auto,
										 _01_pk_idTornInsc,
										 _02_pk_idJocInsc,
										 _03_pk_idJugInsc,
										 _04_datAltaInsc)
							  VALUES (NULL,
							  		  "$idTorn",
							  		  "$idJoc",
							  		  @IDJUG,
							  		  NOW());';
				$response  = dbExec($query,0);
				echo json_encode( $response );		
				break;				

			default:
				die ("error");
		}
	} else {
		print_r($_REQUEST);
		// die ("error");
	}

?>