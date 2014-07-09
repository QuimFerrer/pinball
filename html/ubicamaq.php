<?php

ob_start();

include ("../src/pinball.h");
include ("../src/conex.php");
include ("../src/seguretat.php");
include ("../src/seguretatLogin.php");

comprovaSessio();

if (isset($_REQUEST['cmd']) ) :

	$data  = array();

	if (UseConex()) :
		if (isset($_REQUEST['cmd']))    $action = $_REQUEST['cmd'];
		if (isset($_REQUEST['param']))  $table  = $_REQUEST['param'];
		if (isset($_REQUEST['recid']))	$id 	= $_REQUEST['recid'];

		$pid    = isset($_REQUEST['pid'])     ? (int) $_REQUEST['pid'] : 0;
		$kName  = isset($_REQUEST['keyname']) ? $_REQUEST['keyname']   : 'id';
		$qry 	= "";

		switch ($action) {
			case 'get-record' :
				$qry  	= "SELECT *	FROM $table WHERE $kName=$id;";
	  			$result = SqlExec($qry);
	  			$data 	= mysql_fetch_assoc($result);
	  			break;

			case 'save-record' :
				$record = $_REQUEST['record'];			

				if ($id>0) :	
					$qry = sprintf(
							"INSERT INTO torneig
							VALUES (NULL,'%d','%s','%f','%s','%s',NOW(),NULL,NULL);",
							$record['_02_pk_idJocTorn'], $record['_03_nomTorn'], $record['_04_premiTorn'], 
							$record['datIniTorn'], $record['datFinTorn']);
				endif;

				$sql = SqlExec($qry);
				$data['recid']  = ($id != 0) ? $id : mysql_insert_id();
				$data['rows']   = ($id != 0) ? mysql_affected_rows() : 0;
				$record['recid']= $data['recid'];
				$data['record'] = $record;
	  			break;

	  		default:
	  			$data = array("msg"=>$_REQUEST);
		}
	else :
		$data['error'] = 'Error de connexió a la bd';
	endif;

	echo json_encode( $data );

else: ?>
<!-- Formulari d'edició -->
<div class="w2ui-page page-0">
	<h3 class="text-dialog">Relació entre màquines i ubicacions</h3>
	<p class="text-dialog">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt earum eius, dolor voluptates vel architecto assumenda quaerat deserunt, aliquid quos, fugit.</p>
	<p class="text-dialog">Nesciunt earum eius, dolor voluptates vel architecto assumenda quaerat deserunt, aliquid quos, fugit. Vitae dolore nemo animi quisquam adipisci necessitatibus iure! Numquam!</p>
	<br><br>
	<div class="w2ui-label">Escollir l'ubicació:</div>
	<div class="w2ui-field">
<?php 
	$query    = 'SELECT * FROM joc WHERE _08_datBaixaJoc IS NULL';
	$response = dbExec($query)[1];

	echo '<select name="_01_pk_idUbicUTM" width="300" style="width: 300px">';

	foreach($response as $joc) {
		echo '<option value="'. $joc->_01_pk_idJoc .'">'. $joc->_02_nomJoc .'</option>';
	}
	echo '</select>';
?>
    </div>

	<div class="w2ui-label">Escollir la màquina:</div>
	<div class="w2ui-field">
<?php 
	$query    = 'SELECT * FROM joc WHERE _08_datBaixaJoc IS NULL';
	$response = dbExec($query)[1];

	echo '<select name="_02_pk_idMaqUTM" width="300" style="width: 300px">';

	foreach($response as $joc) {
		echo '<option value="'. $joc->_01_pk_idJoc .'">'. $joc->_02_nomJoc .'</option>';
	}
	echo '</select>';
?>
    </div>
</div>
<div class="w2ui-buttons">
	<input type="button" value="Guardar" name="save">
	<input type="button" value="Sortir" name="exit">
</div>
<img src="../resources/img/ubicacio.png" alt="" class="perfil">
<?php endif; ?>