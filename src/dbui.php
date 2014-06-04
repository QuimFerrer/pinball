<?php

	if (!isset($_REQUEST['cmd']) ) die('<h1>No es una consulta correcte !</h1>');

	$link = mysql_connect('host', 'usr', 'pwd');

	if (!$link)	die('Not connected : ' . mysql_error());

	$db_selected = mysql_select_db('database', $link);

	if (!$db_selected) {
	    die ('No es possible utilitzar bd pinball: ' . mysql_error());
	}

	$action = $_REQUEST['cmd'];
	$table  = $_REQUEST['param'];
	$id	 	= $_REQUEST['recid'];
	$data   = array();
	$qry    = "";

	switch ($action)
	{
		case 'get-record' :
			$qry  	= "SELECT * FROM $table WHERE id=$id";
			$result = Sql_Exec($qry);
			$data 	= mysql_fetch_assoc($result);
			break;

		case 'get-records' :
			$qry = "SELECT * FROM $table";
			$result = Sql_Exec($qry);

			while ($row = mysql_fetch_assoc($result)) {
				   $row["recid"] = $row["id"];	
			       $data[] = $row;
			}
			// Preparar array per a retornar al grid tots els registres
			$data = array( 'total' => mysql_num_rows($result), 'page' => 0, 'records' => $data );
			$data['cmd'] = "get-records";
			break;

		case 'delete' :
			$qry  = "DELETE FROM $table WHERE id=$id";
	    	$sql  = Sql_Exec($qry);
			$data = array( 'cmd' => 'delete', 'success' => (mysql_affected_rows() != 0) );
			break;

		case 'save-record' :
			$record = json_decode($_REQUEST['record']);

			if ($id != 0) :
				foreach( $record as $key => $value ) {
					if ($key != 'recid') $qry .= $key .'="'. $value .'",';
				}
	    		// Eliminar ultima comma ","
	    		$qry = substr( $qry, 0, -1 ); 
				$qry = "UPDATE $table SET ". $qry ." WHERE id=$id";
				$data['recid'] = $id;

			else :
				$sKey=""; $sVal="";
				foreach( $record as $key => $value ) {
					if ($key  != 'recid') {
						$sKey .= $key .",";
						$sVal .= "'". $value ."',";
					}
				}
				$sKey = substr( $sKey, 0, -1 );  
        		$sVal = substr( $sVal, 0, -1 );  
				$qry  = "INSERT INTO $table (". $sKey . ") VALUES (". $sVal . ")";
				$data['recid'] = mysql_insert_id();	// Comptador retornat per l'operació INSERT
			endif;

			$sql = Sql_Exec($qry);
			$data['rows']  = mysql_affected_rows();
			break;
	}

	echo json_encode( $data );


	function Sql_Exec($query) {
		
		$result = mysql_query($query);

		if (!$result) {
		    die('Consulta no valida: ' . mysql_error());
		}

		return $result;
	}
 ?>