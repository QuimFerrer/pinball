<?php

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

comprovaSessio();

?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Zona de jocs</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Zona de jocs</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section>
			<h1>Llista de jocs</h1>
			<?php 
				$query    = 'SELECT * FROM joc';
				$response = dbExecLocal($query);

				echo '<ul class="promo">';

				foreach($response as $joc) {
					echo '<li>';
					echo '<img src="..\resources\img\jocs\\'. $joc->_04_imgJoc .'" alt="">';
					echo '<h2>'. 				$joc->_02_nomJoc .'</h3>';
					echo '<p>Codi: '. 			$joc->_01_pk_idJoc .'</p>';
					echo '<p>Data d\'alta: '. 	$joc->_06_datAltaJoc .'</p>';
					echo '<p>Detall: '. 		$joc->_03_descJoc .'</p>';
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