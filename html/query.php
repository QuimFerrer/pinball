<?php 

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

isEndSessionInQuery();

	const FORM_CONTACTE= 1000;
	const FORM_REGISTRE= 1010;
	const CONSULTA_ADM = 1020;
	const MAQUINES 	   = 1040;
	const TORNEIGS 	   = 1060;
	const USUARIS 	   = 1080;
	const PARTIDA	   = 1120;

	const CONSULTA_USR_2020  = 2020;
	const TORNEIGS_USR_2021  = 2021;


	const PLANTILLA 						   = 9999;

	const PARTIDES_X_MAQUINA_3110              = 3110; //
	const PARTIDES_X_JUGADOR_3120              = 3120; //

	const ALTA_JOCS_3210					   = 3210;
	const GESTIO_JOCS_3220 		 	           = 3220;
	const JOCS_ACTUAL_3230 		 	           = 3230; //
	const JOCS_HISTORIC_3240 	 	           = 3240; //
	const JOCS_X_MAQUINA_3250 		           = 3250; //
	const JOCS_X_MAQUINA_HISTORIC_3260         = 3260; //	

	const ALTA_TORNEIGS_3310				   = 3310;
	const GESTIO_TORNEIGS_3315 				   = 3315;
	const RELACIO_TORNEIGS_3320 	           = 3320; //	
	const TORNEIGS_AMB_JUGADORS_ACTUAL_3350    = 3350; //
	const TORNEIGS_AMB_JUGADORS_HISTORIC_3360  = 3360; //
	const TORNEIGS_AMB_MAQUINES_ACTUAL_3380    = 3380; //
	const TORNEIGS_AMB_MAQUINES_HISTORIC_3390  = 3390; //

	const ALTA_MAQUINES_3410				   = 3410;
	const GESTIO_MAQUINES_3420 				   = 3420;
	const LLISTAT_MAQUINES_3430 	           = 3430; //
	const LLISTAT_MAQUINES_HISTORIC_3440 	   = 3440; //

	const ALTA_ASSIGNACIO_JOC_MAQUINA_3460	   = 3460;
	const GESTIO_ASSIGNACIO_JOC_MAQUINA_3470   = 3470;
	const LLISTAT_ASSIGNACIO_JOC_MAQUINA_3480  = 3480; //

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

	const ALTA_UBICACIONS_3810				   = 3810;
	const GESTIO_UBICACIONS_3820 			   = 3820;
	const LLISTAT_UBICS_X_PROV_POB_3840        = 3840;
	const LLISTAT_UBICS_X_COORDENADES_3850     = 3850;
	const LLISTAT_UBICS_X_EMPRESA_3860         = 3860;	
	const LLISTAT_UBICS_X_EMPRESA_PROV_POB_3870= 3870;		

	const ALTA_MAQS_X_UBICACIO_3890			   = 3890;
	const GESTIO_MAQS_X_UBICACIO_3900	       = 3900;	
	const CANVI_MAQS_UBICACIO_3910 			   = 3910;
	const LLISTAT_MAQS_X_UBIC_PROV_POB_3930    = 3930;
	const LLISTAT_MAQS_X_UBIC_COORDENADES_3940 = 3940;
	const LLISTAT_MAQS_X_EMPRESA_3950          = 3950;	

	const PERFILS_JUGADORS_4010 			   = 4010;
	const BLOQUEJAR_JUGADOR_4020 			   = 4020;
	const DESBLOQUEJAR_JUGADOR_4030 		   = 4030;
	const TORNEIGS_REGISTRATS_X_JUGADOR_4040   = 4040;	

	const CONSULTA_PEFIL_USR_5020              = 5020;

	const CONSULTA_USR_TORNEIGS_5041           = 5041; //
	const CONSULTA_USR_RANKING_ACTUAL_5050     = 5050; //
	const CONSULTA_USR_RANKING_HISTORIC_5051   = 5051; //
	const BAIXA_USR_TORN_5043                  = 5043;
	const CONSULTA_USR_TOTS_TORNEIGS_5061      = 5061; //
	const CONSULTA_RANKING_ACTUAL_5070         = 5070; //
	const CONSULTA_RANKING_HISTORIC_5071       = 5071; //
	const INSCRIPCIO_USR_TORNEIG_5063          = 5063;	

	
	$pid 	  = isset($_REQUEST['pid']) ? (int) $_REQUEST['pid'] : 0;
	$usrLogin = isset($_REQUEST['params']) ? $_REQUEST['params'] : $_SESSION["login"];

	if ($pid > 0) {
		switch ($pid) {
			case FORM_CONTACTE:
				echo json_encode($_REQUEST['record']);
				break;

			case FORM_REGISTRE:
				echo json_encode($_REQUEST['record']);
				break;

			case CONSULTA_ADM :
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

			case MAQUINES :
				$query    = 'SELECT * FROM maquina';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;

			case TORNEIGS :
				$query    = 'SELECT * FROM torneig';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;

			case USUARIS :
				$query    = 'SELECT @var:=@var+1 as recid, p.* FROM usuari as p, (SELECT @var:=0) as r';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));
				break;
				
			case PARTIDA :
				$query    = 'SELECT * FROM usuari';
				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;

			case CONSULTA_USR_2020 :
				$query    = 'SELECT id, nom, foto FROM productes WHERE id < 3';
				$response = dbExec($query)[1];

				$records = array();
				foreach($response as $row) {
					$records[] = (object) array('recid'=>(int)$row->id, 'nom'=>$row->nom, 'foto'=>$row->foto);
				}

				echo json_encode( $records );
				break;

			case TORNEIGS_USR_2021 :
				$query    = 'SELECT _01_pk_idJug AS idJug, _01_pk_idTorn AS idTorn, _03_nomTorn AS nomTorn, _02_pk_idJocInsc AS idJoc
							FROM jugador
							LEFT JOIN inscrit ON _01_pk_idJug = _03_pk_idJugInsc
							INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
							WHERE 
								_06_datBaixaJug  IS NULL AND
								_09_datBaixaTorn IS NULL AND
								_06_datBaixaInsc IS NULL AND	
								_04_datAltaInsc  IS NOT NULL AND _01_pk_idJug = 2';

				$response = dbExec($query);
				echo json_encode(controlErrorQuery($response));				
				break;

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

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

			case ALTA_JOCS_3210 :
				break;
			case GESTIO_JOCS_3220 :
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

			case ALTA_TORNEIGS_3310 :
				break;
			case GESTIO_TORNEIGS_3315 :
				break;				
			case RELACIO_TORNEIGS_3320 :		
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

			case ALTA_MAQUINES_3410 :
				break;			
			case GESTIO_MAQUINES_3420 :
				break;

			case LLISTAT_MAQUINES_3430 :
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
			case LLISTAT_MAQUINES_HISTORIC_3440 :
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
				break;			
			case GESTIO_ASSIGNACIO_JOC_MAQUINA_3470 :
				break;

			case LLISTAT_ASSIGNACIO_JOC_MAQUINA_3480 :
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

			case ALTA_UBICACIONS_3810 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;
			case GESTIO_UBICACIONS_3820 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_UBICS_X_PROV_POB_3840 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_UBICS_X_COORDENADES_3850 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_UBICS_X_EMPRESA_3860 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_UBICS_X_EMPRESA_PROV_POB_3870 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case ALTA_MAQS_X_UBICACIO_3890 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case GESTIO_MAQS_X_UBICACIO_3900 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case CANVI_MAQS_UBICACIO_3910 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_MAQS_X_UBIC_PROV_POB_3930 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_MAQS_X_UBIC_COORDENADES_3940 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case LLISTAT_MAQS_X_EMPRESA_3950 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case PERFILS_JUGADORS_4010 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case BLOQUEJAR_JUGADOR_4020 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;			
			case DESBLOQUEJAR_JUGADOR_4030 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;		
			case TORNEIGS_REGISTRATS_X_JUGADOR_4040 :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;


			case PLANTILLA :
				$query    = '';
				$response = dbExec($query);				
				echo json_encode(controlErrorQuery($response));				
				break;
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

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
									CC.loginJug = "' . $_SESSION["login"] . '" ) AS ZZ
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
									CC.loginJug = "' . $_SESSION["login"] . '" ) AS ZZ
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
									WHERE _04_loginUsuari = "' . $_SESSION["login"] . '"
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
				break;				

			default:
				die ("error");
		}
	} else {
		print_r($_REQUEST);
		// die ("error");
	}

?>