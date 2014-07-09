<?php 

function UseConex() {

	$pConnect = mysql_pconnect('localhost', 'root', '');
			
	if ($pConnect) mysql_select_db('u555588791_pinba', $pConnect );		
	return $pConnect;
}


function SqlExec($query) {
	
	$result = mysql_query($query);

	if (!$result) $result = mysql_error();
	return $result;
}

function controlErrorQueryFromDbui($response, $id, $kName)
{
	if ($response['status'] != "error")
		{
		$data[$kName] = $data['recid'] = ($id != 0) ? $id : mysql_insert_id();
		$data['rows'] = mysql_affected_rows();
		}
	else
		$data['recid'] = $data['rows'] = "999999";
	
	return ($data);
}

?>