<?php include("../src/pinball.h");

	const CONSULTA_ADM = 1020;
	const CONSULTA_USR = 2020;
	const MAQUINES 	   = 1040;
	const USUARIS 	   = 1080;

	$pid = isset($_REQUEST['pid']) ? (int) $_REQUEST['pid'] : 0;

	if ($pid > 0) {

		switch ($pid) {
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


			default:
				die ("error");
		}
	} else {
		die ("error");
	}

?>