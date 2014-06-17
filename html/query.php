<?php 

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

// comprovaSessio();

	const FORM_CONTACTE= 1000;
	const FORM_REGISTRE= 1010;
	const CONSULTA_ADM = 1020;
	const MAQUINES 	   = 1040;
	const USUARIS 	   = 1080;

	const CONSULTA_USR = 2020;
	const TORNEIGS_USR = 2061;

	
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

			case USUARIS :
				$query    = 'SELECT @var:=@var+1 as recid, p.* FROM usuari as p, (SELECT @var:=0) as r';
				$response = dbExec($query);
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

			default:
				die ("error");
		}
	} else {
		die ("error");
	}

?>