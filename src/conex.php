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
?>