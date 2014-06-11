<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretatLogin.php");

?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Torneigs</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Torneigs</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section>
			<h1>Llista de Torneigs</h1>
			<?php 
				$data = date("Y-n-j");
				// $dataHora = date("Y-n-j H:i:s");
				$query    = 'SELECT * FROM torneig as t 
							INNER JOIN joc as j ON t._02_pk_idJocTorn = j._01_pk_idJoc
							WHERE t._06_datFinTorn > "' . $data .'" and 
							t._09_datBaixaTorn IS NULL
							ORDER BY t._05_datIniTorn';
				$response = dbExec($query);

				echo '<ul class="promo">';

				foreach($response as $torn) {
					echo '<li>';
					echo '<img src="../resources/img/jocs/'. $torn->_04_imgJoc .'" alt="'. $torn->_02_nomJoc .'">';
					echo '<h2>Id: '. 			$torn->_01_pk_idTorn .'</h2>';
					echo '<p><h1>'. 			$torn->_03_nomTorn .'</h1></p>';
					echo '<p><h2>Joc: '. 		$torn->_02_nomJoc .'</h2></p>';
					echo '<p><h4>Premi: '. 		$torn->_04_premiTorn .' €</h4></p>';
					echo '<p>Data d\'inici: '. 	date('j-m-Y',strtotime($torn->_05_datIniTorn)) .'</p>';
					echo '<p>Data final: '. 	date('j-m-Y',strtotime($torn->_06_datFinTorn)) .'</p>';
					echo '</li>';
				}
				echo '</ul>';
			 ?>
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	<script src="../js/pinball.js"></script>
</html>

<?php
if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);

function formatarDataHora($dataHora)
{

}

?>
