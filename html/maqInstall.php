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

				if ($id>0) :
					$query = sprintf("UPDATE maqInstall SET _03_numPartidesJugadesMaqInst = '%d',
														  _04_credJocMaqInst    = '%d',
														  _05_totCredJocMaqInst = '%d',
														  _07_datModMaqInst     = NOW()
									  WHERE _00_pk_idMaqInst_auto = '%d';",
								  									$record['_03_numPartidesJugadesMaqInst'],
								  									$record['_04_credJocMaqInst'],
										  							$record['_05_totCredJocMaqInst'],
										  							$id);
				else :
					$query = sprintf("INSERT INTO maqInstall
								 	  VALUES (NULL,'%d','%d','%d','%d','%d',NOW(),NULL,NULL);",
																	$record['_01_pk_idMaqInst'],
																	$record['_02_pk_idJocInst'],
																	$record['_03_numPartidesJugadesMaqInst'],
								  									$record['_04_credJocMaqInst'],
										  							$record['_05_totCredJocMaqInst']);
				endif;
				$response = controlErrorQuery( dbExec($query,0) );
				$data = controlErrorQueryFromDbui( $response['status'], $id, $kName);
				$record['recid'] = $data['recid'];
				$data['record']  = $record;
	  			break;

			case 'delete' :
				$qry = sprintf("UPDATE maqinstall SET _07_datModMaqInst   = NOW(),
													  _08_datBaixaMaqInst = NOW()				
								  WHERE _00_pk_idMaqInst_auto = '%d' AND 
								        _08_datBaixaMaqInst IS NULL;",$id);
				$sql = SqlExec($qry);
				// $response = dbExec($query,0)[1];
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
<?php 
if (isset($_REQUEST['new']) )
	{
	echo'<h3 class="text-dialog">Relació entre màquines i ubicacions</h3>';
	echo'<p class="text-dialog">Per assignar una joc a una màquina cal donar d\'alta l\'assinació escollint
						   del desplegable de màquines la maquina i escollint el joc del desplegable de jocs.
						   En el cas que es vulgui anul.lar l\'assignació perque el joc es canvia
						   de màquina o perque deixa d\'estar operatiu en aquella màquina, caldrà bolquejar
						   l\'assignació amb l\'opció corresponent i tornar a crear una assignació nova.</p>';
	echo'<div class="w2ui-label">Escollir la màquina:</div>';
	echo '<div class="w2ui-field">';
	$query    = 'SELECT * FROM maquina WHERE _08_datBaixaMaq IS NULL';
	$response = dbExec($query)[1];

	echo '<select name="_01_pk_idMaqInst">';

	foreach($response as $maquina)
		echo '<option value="'. $maquina->_01_pk_idMaq .'">'. $maquina->_02_macMaq .'</option>';

	echo '</select>';
	echo '</div>';

	echo '<div class="w2ui-label">Escollir el joc:</div>';
	echo '<div class="w2ui-field">';
	$query    = 'SELECT * FROM joc WHERE _08_datBaixaJoc IS NULL';
	$response = dbExec($query)[1];

	echo '<select name="_02_pk_idJocInst">';

	foreach($response as $joc)
		echo '<option value="'. $joc->_01_pk_idJoc .'">'. $joc->_02_nomJoc .'</option>';
	
	echo '</select>';
	echo '</div>';
	}		
?>
	<div class="w2ui-label">Partides Maq-Joc</div>
	<div class="w2ui-field"><input name="_03_numPartidesJugadesMaqInst" maxlength="50" size="30"/></div>
	<br>
	<div class="w2ui-label">Crèdits Maq-Joc</div>
	<div class="w2ui-field"><input name="_04_credJocMaqInst" maxlength="50" size="30"/></div>
	<br>
	<div class="w2ui-label">Crèdits totals Maq-Joc</div>
	<div class="w2ui-field"><input name="_05_totCredJocMaqInst" maxlength="50" size="30"/></div>	
	<br>
</div>
<div class="w2ui-buttons">
	<input type="button" value="Guardar" name="save">
	<input type="button" value="Sortir" name="exit">
</div>
<img src="../resources/img/torneig.png" alt="" class="perfil">
<?php endif; ?>