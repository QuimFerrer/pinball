<?php

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

isEndSessionInQuery();


	if (!isset($_REQUEST['cmd']) ) die('<h1>No es una consulta correcte !</h1>');

	$link = mysql_connect('localhost', 'root', '');

	if (!$link)	die('Not connected : ' . mysql_error());

	$db_selected = mysql_select_db('u555588791_pinba', $link);

	if (!$db_selected) {
	    die ('No es possible utilitzar bd pinball: ' . mysql_error());
	}

	if (isset($_REQUEST['cmd']))    $action = $_REQUEST['cmd'];
	if (isset($_REQUEST['param']))  $table  = $_REQUEST['param'];
	if (isset($_REQUEST['recid']))	$id 	= $_REQUEST['recid'];


	$pid      = isset($_REQUEST['pid'])       ? (int) $_REQUEST['pid'] : 0;


	$kName  = isset($_REQUEST['keyname']) ? $_REQUEST['keyname'] : 'id';
	$data   = array();
	$qry    = "";

	switch ($action)
	{
		case 'ld' :
			$qry  	= "SELECT * FROM $table";
			$result = Sql_Exec($qry);

			while ($row = mysql_fetch_object($result)) {
			       $data[] = $row->_01_pk_idJoc; //. "-". $row->_02_nomJoc;
			}
			$data = array("items"=>$data);
			break;

		case 'get-record' :
			$qry  	= "SELECT * FROM $table WHERE $kName=$id";
			$result = Sql_Exec($qry);
			$data 	= mysql_fetch_assoc($result);
			break;

		case 'get-records' :
			$qry = getQueryForGetRecords($table);
			$result = Sql_Exec($qry);

			while ($row = mysql_fetch_assoc($result)) {
				   $row["recid"] = current($row);	
			       $data[] = $row;
			}
			// Preparar array per a retornar al grid tots els registres
			$data = array( 'total' => mysql_num_rows($result), 'page' => 0, 'records' => $data );
			$data['cmd'] = "get-records";
			break;

		case 'delete' :
			$qry = getQueryForDelete($table,$id);
			if ($qry == "")
				{
				$query  = "DELETE FROM $table WHERE $kName=$id";
	    		$sql  = Sql_Exec($qry);
				$data = array( 'cmd' => 'delete', 'success' => (mysql_affected_rows() != 0) );
				}	
			break;

		case 'save-record' :
			if($pid) :
			 	$data = customQuerySaveRecord($pid, $id, $_REQUEST['record'], $kName);
			else :
				$record = (object)$_REQUEST['record'];				
				if ($id != 0) :
					foreach( $record as $key => $value ) {
						if ($key != 'recid') $qry .= $key .'="'. $value .'",';
					}
		    		// Eliminar ultima comma ","
		    		$qry = substr( $qry, 0, -1 ); 
					$qry = "UPDATE $table SET ". $qry ." WHERE $kName=$id";
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
				endif;

				$sql = Sql_Exec($qry);
				$data['recid'] = ($id != 0) ? $id : mysql_insert_id();
				$data['rows']  = mysql_affected_rows();
			endif;
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

	function customQuerySaveRecord($pid, $id, $record, $kName)
	{
		switch($pid)
			{
			case '3230':
				if ($id != 0)
					$query    = 'UPDATE joc SET   _02_nomJoc      = "' . $record['_02_nomJoc']  . '",' .
											  	 '_03_descJoc     = "' . $record['_03_descJoc'] . '",' .
											     '_04_imgJoc      = "' . $record['_04_imgJoc']  . '",' .
											     '_07_datModJoc   = NOW() ' .
							     'WHERE _01_pk_idJoc = "' . $id . '";';
				else
					$query    = 'INSERT INTO joc 
									VALUES (NULL,"' .
											$record['_02_nomJoc']  . '","' .
											$record['_03_descJoc'] . '","' .
											$record['_04_imgJoc']  . '",0,NOW(),NULL,NULL);';
				$response = dbExec($query,0);
				$response = controlErrorQuery($response);
				if ($response['status'] != "error")
					{
					$data['recid'] = ($id != 0) ? $id : mysql_insert_id();
					$data['rows']  = mysql_affected_rows();						
					$data[$kName] = $data['recid'];
					}
				else
					$data['recid'] = $data['rows'] = "999999";
				break;
			case '3340':
				if ($id != 0)
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
				else
				$query    = 'INSERT INTO torneig 
								VALUES (NULL,
										"' . $idJoc . '",
										"$nomTorn",
										"$premiTorn",
										"$dataIniciTorn",
										"$dataFinTorn",NOW(),NULL,NULL);';
				$response = dbExec($query,0);
				$response = controlErrorQuery($response);
				if ($response['status'] != "error")
					{
					$data['recid'] = ($id != 0) ? $id : mysql_insert_id();
					$data['rows']  = mysql_affected_rows();						
					$data[$kName] = $data['recid'];
					}
				else
					$data['recid'] = $data['rows'] = "999999";
				break;				
			default:
				$data = "";
				break;
			}
		return ($data);
	}

	function getQueryForGetRecords($table)
		{
		$query = "SELECT * FROM $table";
		switch($table)
			{
			case 'joc':
				$query  .= ' WHERE _08_datBaixaJoc IS NULL';
				break;
			default:
				break;
			}			
		return ($query);	
		}

	function getQueryForDelete($table,$id)
		{
		switch($table)
			{
			case 'joc':
				$query    = 'UPDATE torneig SET _09_datBaixaTorn = NOW()
							WHERE 
								_02_pk_idJocTorn = "' . $id . '" AND
								_09_datBaixaTorn IS NULL;';
				$response = dbExec($query,0);
				$query    = 'UPDATE maqinstall SET _08_datBaixaMaqInst = NOW()
							WHERE 
								_02_pk_idJocInst = "' . $id . '" AND
								_08_datBaixaMaqInst IS NULL;';
				$response = dbExec($query,0);
				$query    = 'UPDATE joc SET _08_datBaixaJoc = NOW()
							WHERE 
								_01_pk_idJoc = "' . $id . '" AND
								_08_datBaixaJoc IS NULL;';
				$response = dbExec($query,0);				
				// $response = controlErrorQuery($response);
				$data['recid'] = ($id != 0) ? $id : mysql_insert_id();
				$data['rows']  = mysql_affected_rows();
				break;
			default:
				$query = "";
				break;
			}			
		return ($query);	
		}

 ?>