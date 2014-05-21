<?php include("../src/pinball.h");

	const CONSULTA_ADM = 1020;
	const CONSULTA_USR = 2020;
	const MAQUINES 	= 1040;

	$pid = isset($_REQUEST['pid']) ? (int) $_REQUEST['pid'] : 0;

	if ($pid > 0) {

		switch ($pid) {
			case CONSULTA_ADM :
				// $query    = 'SELECT id, nom, foto FROM productes';
				// $response = dbExec($query);

				// $records = array();
				// // Respectar format que espera el grid
				// foreach($response as $row) {
				// 	$records[] = (object) array('recid'=>(int)$row->id, 'nom'=>$row->nom, 'foto'=>$row->foto);
				// }

				$records[] = (object) array('recid'=>1, 'nom'=>"Quim", 'foto'=>"foto de Quim");
				$records[] = (object) array('recid'=>2, 'nom'=>"Joan", 'foto'=>"foto de Joan");

				echo json_encode( $records );
				break;

			case MAQUINES :
				$query    = 'SELECT id, nom FROM maquines';
				$response = dbExec($query);

				$records = array();
				foreach($response as $row) {
					$records[] = (object) array('recid'=>(int)$row->01_pk_idMaq, 'nom'=>$row->03_propMaq);
				}

				echo json_encode( $records );
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