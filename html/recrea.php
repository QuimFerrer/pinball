<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretat.php");
include ("../src/seguretatLogin.php");

comprovaSessio();

?>
<!doctype html>
<html>
<head>
	<meta content="" http-equiv="REFRESH"> </meta>			
	<meta charset="UTF-8">
	<title>Pinball. Recreatius</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Màquines recreatives</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section class="staticPage">
			<h2>Llista de productes</h2>
			<?php 
				$query    = 'SELECT * FROM productes
								WHERE datBaixaPro IS NULL;';
				$response = dbExec($query)[1];

				echo '<ul class="promo">';

				foreach($response as $producte) {
					echo '<li>';
					echo '<img src="../resources/img/recreatius/'. $producte->foto .'" alt="'. $producte->nom .'">';
					echo '<h3>'. 				$producte->nom .'</h3>';
					echo '<p>Codi: '. 			$producte->id .'</p>';
					echo '<h3>Preu: '. 			$producte->preu .'€</h3>';
					echo '<p>Data d\'alta: '. 	date('j-m-Y',strtotime($producte->datAltaPro)) .'</p>';
					echo '<p>Detall: '. 		$producte->descripcio .'</p>';
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
?>
