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
				$qry  	= "SELECT T.*,
							DATE_FORMAT(_05_datIniTorn, '%m/%d/%Y') AS datIniTorn,
							DATE_FORMAT(_06_datFinTorn, '%m/%d/%Y') AS datFinTorn
							FROM $table AS T
							WHERE $kName=$id;";
	  			$result = SqlExec($qry);
	  			$data 	= mysql_fetch_assoc($result);
	  			break;

			case 'save-record' :
				$record = $_REQUEST['record'];			

				if ($id>0) :	
					$qry = sprintf(
							"UPDATE torneig 
							SET _03_nomTorn    = '%s',
								_04_premiTorn  = '%s',
								_05_datIniTorn = DATE_FORMAT('%s','%s'),
								_06_datFinTorn = DATE_FORMAT('%s','%s'),
								_08_datModTorn = NOW()
							WHERE _01_pk_idTorn  = '%d';",
							$record['_03_nomTorn'],	$record['_04_premiTorn'], $record['datIniTorn'],
							"%Y-%m-%d",	$record['datFinTorn'],"%Y-%m-%d", $id);
				else :
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

			case 'delete' :
				$qry = sprintf(
						"UPDATE torneig 
						SET _08_datModTorn   = NOW(),
							_09_datBaixaTorn = NOW()
						WHERE _01_pk_idTorn = '%d' AND _09_datBaixaTorn IS NULL;", $id);
				$sql = SqlExec($qry);
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

<?php 
if (isset($_REQUEST['joc']) ) :

	echo '<div class="w2ui-label">Escollir el joc:</div>';
	echo '<div class="w2ui-field">';

	$query    = 'SELECT * FROM joc WHERE _08_datBaixaJoc IS NULL';
	$response = dbExec($query)[1];

	echo '<select name="_02_pk_idJocTorn">';

	foreach($response as $joc) {
		echo '<option value="'. $joc->_01_pk_idJoc .'">'. $joc->_02_nomJoc .'</option>';
	}
	echo '</select>';
    echo '</div>';
endif;
?>
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