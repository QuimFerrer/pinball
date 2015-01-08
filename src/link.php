<?php
	/* 
	 * Script de connexió a BD remota pinball
	 * Aquest script s'ha de situar al mateix directori remot on resideix la BD
	 * Cal donar permisos d'execució i permisos a la BD (drop/create/insert/delete/update)
	 * Actua com a wraper entre els scripts locals del grup de treball i la connexió a
	 * la BD remota.
	 * Parámetres : reb->URL codificada, retorna->resultat de la consulta en JSON
	 */

	if (!isset($_GET['query']) ) die('<h1>No es una consulta correcte !</h1>');

	$link = mysql_connect('host', 'usr', 'pwd');

	if (!$link)	die('Not connected : ' . mysql_error());

	$db_selected = mysql_select_db('u555588791_pinba', $link);

	if (!$db_selected) {
	    die ('No es possible utilitzar bd pinball: ' . mysql_error());
	}

	$query  = rawurldecode($_GET['query']);
	$result = mysql_query($query);

	if (!$result) {
	    die('Consulta no valida: ' . mysql_error());
	}

	// Obtenir la consulta en forma d'arrays d'objectes
	$json = array();
	while ($obj = mysql_fetch_object($result)) {
	    $json[] = $obj;
	}

	// Retornar array codificat JSON
	echo json_encode($json);

	// Alliberar resultat
	mysql_free_result($result);

	// Tancar connexió
	mysql_close($link);
?>