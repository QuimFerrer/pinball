<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretatLogin.php");

?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Partides</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Generar Partida</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section>
			<h1>Tria les dades de la partida</h1>
			
			<?php 
				$data = date("Y-n-j");
				$dataHora = date("Y-n-j H:i:s");
				$query   = 'SELECT _04_loginUsuari FROM usuari;';
				$response = dbExec($query);

				echo '<ul class="promo">';
				//var_dump($response);
				

				foreach($response as $jugador) {
					echo '<li>';
					echo $jugador->_04_loginUsuari;					 
					//echo '<p>Data d\'inici: '. 	date('j-m-Y',strtotime($torn->_05_datIniTorn)) .'</p>';
					//echo '<p>Data final: '. 	date('j-m-Y',strtotime($torn->_06_datFinTorn)) .'</p>';
					echo '</li>';
				}

				
				echo '</ul>';
				echo "Hola dins el php </br>";
				echo date("Y-n-j H:i:s");
			 ?>
			 
			 <p> Hola Victor prova d'escriptura... </p>
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
