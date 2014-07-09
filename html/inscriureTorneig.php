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
				$qry  = "SELECT * FROM $table WHERE $kName=$id";
	  			$result = SqlExec($qry);
	  			$data 	= mysql_fetch_assoc($result);
	  			break;

			case 'save-record' :
				$record = $_REQUEST['record'];			

				if ($id==0)
					{
					$query = sprintf("SELECT _01_pk_idUsuari INTO @IDJUG 
							  			FROM usuari 
							  			WHERE _04_loginUsuari = '%s';",$usrLogin);
					$response  = dbExec($query,0);
					$query = sprintf("INSERT INTO inscrit 
											VALUES (NULL,'%d','%d',@IDJUG,NOW(),NULL,NULL);",
											$idTorn,$idJoc);
					$response  = dbExec($query,0);
					}

				$response = controlErrorQuery( $response );
				$data = controlErrorQueryFromDbui( $response, $id, $kName);
				$record['recid'] = $data['recid'];
				$data['record']  = $record;
	  			break;

			case 'delete' :
				$response = dbExec($query,0)[1];
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
	<br><br>
	<div class="w2ui-label">Nom del torneig:</div>
	<div class="w2ui-field"><input name="_03_nomTorn" maxlength="100" size="60"/></div>
	<div class="w2ui-label">Premi:</div>
	<div class="w2ui-field"><input name="_04_premiTorn" maxlength="50" size="30"/></div>
	<br>
	<div class="w2ui-label">Escollir el joc:</div>
	<div class="w2ui-field">
<?php 
	$query    = 'SELECT * FROM joc WHERE _08_datBaixaJoc IS NULL';
	$response = dbExec($query)[1];

	echo '<select name="_02_pk_idJocTorn">';

	foreach($response as $joc) {
		echo '<option value="'. $joc->_01_pk_idJoc .'">'. $joc->_02_nomJoc .'</option>';
	}
	echo '</select>';
?>
    </div>
	<div class="w2ui-label">Data d'inici:</div>
	<div class="w2ui-field"><input name="datIniTorn" maxlength="60" size="30"/></div>
	<div class="w2ui-label">Data Finalització:</div>
	<div class="w2ui-field"><input name="datFinTorn" maxlength="60" size="30"/></div>
</div>
<div class="w2ui-buttons">
	<input type="button" value="Guardar" name="save">
	<input type="button" value="Sortir" name="exit">
</div>
<img src="../resources/img/torneig.png" alt="" class="perfil">
<?php endif; ?>