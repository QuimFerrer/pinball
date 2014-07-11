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
	
				$qry    = sprintf("INSERT INTO ubicaciotemaquina
									VALUES (NULL,'%d','%d',NOW(),NULL,NULL);",
									$record['_01_pk_idUbicUTM'], $record['_02_pk_idMaqUTM']);

				$sql = SqlExec($qry);
				$data['rows']   = mysql_affected_rows();
				$record['recid']= mysql_insert_id();
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
	<p class="text-dialog">Per assignar una màquina a una ubicació cal donar d'alta l'assinació escollint
						   del desplegable d'ubicacions a on anirà la maquina i escollint la màquina del
						   desplegable de màquines.</p>
	<p class="text-dialog">En el cas que es vulgui anul.lar l'assignació perque la màquina es canvia
						   d'ubicació o perque deixa de ser operativa, caldrà bolquejar l'assignació amb
						   l'opció corresponent i tornar a crear una assignació nova en el cas que la
						   màquina es canvii d'ubicació.</p>
	<br><br>
	<div class="w2ui-label">Escollir l'ubicació:</div>
	<div class="w2ui-field">
<?php 
	$query    = 'SELECT * FROM ubicacio WHERE _16_datBaixaUbic IS NULL';
	$response = dbExec($query)[1];

	echo '<select name="_01_pk_idUbicUTM" width="300" style="width: 300px">';

	foreach($response as $row) {
		echo '<option value="'. $row->_01_pk_idUbic .'">'. $row->_02_empUbic .'</option>';
	}
	echo '</select>';
?>
    </div>

	<div class="w2ui-label">Escollir la màquina:</div>
	<div class="w2ui-field">
<?php 
	$query    = 'SELECT * FROM maquina WHERE _08_datBaixaMaq IS NULL';
	$response = dbExec($query)[1];

	echo '<select name="_02_pk_idMaqUTM" width="300" style="width: 300px">';

	foreach($response as $row) {
		echo '<option value="'. $row->_01_pk_idMaq .'">'. $row->_02_macMaq .'</option>';
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