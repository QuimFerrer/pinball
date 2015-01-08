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
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- <meta charset="UTF-8"> -->
	<title>Pinball. Jocs</title>
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
		<section class="staticPage">
			<h2>Llista de jocs</h2>
			<?php 
				$query    = 'SELECT * FROM joc
							 WHERE _08_datBaixaJoc IS NULL';
				$response = dbExec($query)[1];

				echo '<ul class="promo">';

				foreach($response as $joc) {
					echo '<li>';
					echo '<img src="../resources/img/jocs/'. $joc->_04_imgJoc .'" alt="'. $joc->_02_nomJoc .'">';
					echo '<h3>'. 				$joc->_02_nomJoc .'</h3>';
					echo '<p>Codi: '. 			$joc->_01_pk_idJoc .'</p>';
					echo '<p>Data d\'alta: '. 	date('j-m-Y',strtotime($joc->_06_datAltaJoc)) .'</p>';
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

<?php
if (isset($_POST['entrar']) and !(isset($_POST['resetPassword'])) ) controlAcces($_POST["usr"],$_POST["pwd"]);
if (isset($_POST['entrar']) and   isset($_POST['resetPassword'])  ) resetPassword($_POST["usr"]);
?>
