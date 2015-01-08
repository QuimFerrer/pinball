<?php 
function UseConex() {

	$pConnect = mysql_pconnect('localhost', 'root', '');
			
	if ($pConnect) mysql_select_db('u555588791_pinba', $pConnect );		
	return $pConnect;
}

function queryLog($message, $query) {

    $data = date("Y-m-d H:i:s");
    $txt  = fopen("log.txt","a") or die("Error en obrir log.txt");
    fputs($txt,str_pad(strtoupper($data), 19 ," ")." - ".str_pad(strtoupper($message), 32 ," ")." - ".str_pad($query, 256 ," ")."\r\n");

    fclose($txt);
}

function SqlExec($query) {
	
	queryLog("Consulta: ", $query);
	$result = mysql_query($query);

	if (!$result) $result = mysql_error();
	return $result;
}

function controlErrorQueryFromDbui($status, $id, $kName)
{
	if ($status != "error")
		{
		$data[$kName] = $data['recid'] = ($id != 0) ? $id : mysql_insert_id();
		$data['rows'] = mysql_affected_rows();
		}
	else
		$data['recid'] = $data['rows'] = "999999";
	
	return ($data);
}
?>