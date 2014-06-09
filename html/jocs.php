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
					echo "<li>". $joc->_01_pk_idJoc ."</li>";
					echo "<li>". $joc->_02_nomJoc ."</li>";
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