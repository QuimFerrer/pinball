<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretatLogin.php");

?>
<!doctype html>
<html>
<head>
	<meta content="" http-equiv="REFRESH"> </meta>			
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
			<h2>Llista de Torneigs</h2>
			<?php 
				$data = date("Y-n-j");
				// $dataHora = date("Y-n-j H:i:s");
				$query   = 'SELECT * 
							FROM torneig
							INNER JOIN joc ON _02_pk_idJocTorn = _01_pk_idJoc
							WHERE _06_datFinTorn > "' . $data .'" and 
							_09_datBaixaTorn IS NULL
							ORDER BY _05_datIniTorn;';
				$response = dbExec($query)[1];

				echo '<ul class="promo">';

				foreach($response as $torn) {
					echo '<li>';
					echo '<img src="../resources/img/jocs/'. $torn->_04_imgJoc .'" alt="'. $torn->_02_nomJoc .'">';
					echo '<h3>Id: '. 			$torn->_01_pk_idTorn .'</h3>';
					echo '<p><h3>'. 			$torn->_03_nomTorn .'</h3></p>';
					echo '<p><h3>Joc: '. 		$torn->_02_nomJoc .'</h3></p>';
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
if (isset($_POST['entrar']) and !(isset($_POST['resetPassword'])) ) controlAcces($_POST["usr"],$_POST["pwd"]);
if (isset($_POST['entrar']) and   isset($_POST['resetPassword'])  ) resetPassword($_POST["usr"]);
?>
