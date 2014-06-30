<?php 

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

// comprovaSessio();

	const FORM_CONTACTE= 1000;
	const FORM_REGISTRE= 1010;
	const CONSULTA_ADM = 1020;
	const MAQUINES 	   = 1040;
	const TORNEIGS 	   = 1060;
	const USUARIS 	   = 1080;
	const PARTIDA	   = 1120;

	const CONSULTA_USR  = 2090;
	const TORNEIGs_USR  = 2091;

	const CONSULTA_USR_TORNEIGS         = 2041;
	const CONSULTA_USR_RANKING_ACTUAL   = 2050;
	const CONSULTA_USR_RANKING_HISTORIC = 2051;
	const BAIXA_USR_TORN                = 2043;
	const CONSULTA_USR_TOTS_TORNEIGS    = 2061;
	const CONSULTA_RANKING_ACTUAL       = 2070;
	const CONSULTA_RANKING_HISTORIC     = 2071;
	const INSCRIPCIO_USR_TORNEIG        = 2063;	

	
	$pid = isset($_REQUEST['pid']) ? (int) $_REQUEST['pid'] : 0;

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
				$response = dbExec($query);

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
				// Preparar array per a retornar al grid tots els registres
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );
				break;

			case TORNEIGS :
				$query    = 'SELECT * FROM torneig';
				$response = dbExec($query);
				// Preparar array per a retornar al grid tots els registres
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );
				break;

			case USUARIS :
				$query    = 'SELECT @var:=@var+1 as recid, p.* FROM usuari as p, (SELECT @var:=0) as r';
				$response = dbExec($query);
				echo json_encode( $response );
				break;
				
			case PARTIDA :
				$query    = 'SELECT * FROM usuari';
				$response = dbExec($query);
				// Preparar array per a retornar al grid tots els registres
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );
				break;

			case CONSULTA_USR :
				$query    = 'SELECT id, nom, foto FROM productes WHERE id < 3';
				$response = dbExec($query);

				$records = array();
				foreach($response as $row) {
					$records[] = (object) array('recid'=>(int)$row->id, 'nom'=>$row->nom, 'foto'=>$row->foto);
				}

				echo json_encode( $records );
				break;

			case TORNEIGS_USR :
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
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );
				break;

			case CONSULTA_USR_TORNEIGS :
				$query    = 'SELECT _01_pk_idTorn AS idTorn,
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
								_04_loginUsuari = "' . $_SESSION["login"] . '"
							ORDER BY nomTorn;';
				$response = dbExec($query);
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );
				break;	

			case CONSULTA_USR_RANKING_ACTUAL :
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
							ORDER BY _01_pk_idTorn, punts DESC;

							SELECT * FROM
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
							ORDER BY idTorn, ranking;

							DROP TABLE CC;';
				$response = dbExec($query);
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );
				break;	

			case CONSULTA_USR_RANKING_HISTORIC :
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
							ORDER BY _01_pk_idTorn, punts DESC;

							SELECT * FROM
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
							ORDER BY idTorn, ranking;

							DROP TABLE CC;';
				$response = dbExec($query);
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );
				break;				

			case BAIXA_USR_TORN :
				// $query    = ' ';
				// $response = dbExec($query);
				// $response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				// echo json_encode( $response );				
				break;				

			case CONSULTA_USR_TOTS_TORNEIGS :
				$query    = 'SELECT _01_pk_idTorn  AS idTorn,
									_03_nomTorn    AS nomTorn,
									_01_pk_idJoc   AS idJoc,
									_02_nomJoc     AS nomJoc,
									_04_premiTorn  AS premiTorn,
									_05_datIniTorn AS dataIniTorn,
									_06_datFinTorn AS dataFinTorn
							FROM torneig INNER JOIN joc ON _02_pk_idJocTorn = _01_pk_idJoc
							WHERE 
								_09_datBaixaTorn IS NULL AND
								_06_datFinTorn >= CURDATE() AND
								_01_pk_idTorn NOT IN
									(SELECT _01_pk_idTorn
									FROM usuari
										LEFT JOIN jugador  ON _01_pk_idUsuari = _01_pk_idJug
										LEFT JOIN inscrit  ON _01_pk_idJug    = _03_pk_idJugInsc
										INNER JOIN torneig ON (_01_pk_idTornInsc = _01_pk_idTorn AND _02_pk_idJocInsc = _02_pk_idJocTorn )
									WHERE _04_loginUsuari = "joan"
									GROUP BY _01_pk_idTorn)
							ORDER BY dataIniTorn;';
				$response = dbExec($query);
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );			
				break;				

			case CONSULTA_RANKING_ACTUAL :
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
							ORDER BY _01_pk_idTorn, punts DESC;

							SELECT * FROM
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
							ORDER BY idTorn, ranking;

							DROP TABLE CC;';
				$response = dbExec($query);
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );			
				break;				

			case CONSULTA_RANKING_HISTORIC :
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
							ORDER BY _01_pk_idTorn, punts DESC;

							SELECT * FROM
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
							ORDER BY idTorn, ranking;

							DROP TABLE CC;';

				$response = dbExec($query);
				$response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				echo json_encode( $response );			
				break;				

			case INSCRIPCIO_USR_TORNEIG :
				// $query    = ' ';
				// $response = dbExec($query);
				// $response = array( 'total' => count($response), 'page' => 0, 'records' => $response );
				// echo json_encode( $response );			
				break;				

			default:
				die ("error");
		}
	} else {
		die ("error");
	}

?>