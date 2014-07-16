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
	<link rel="shortcut icon" href="../resources/img/favicon.ico">
	<meta content="" http-equiv="REFRESH"> </meta>		
	<meta charset="UTF-8">
	<title>Pinball. Inici</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Pagina d'inici JOAN</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section class="mainPage">
			<h2>Benvinguts a pinball games</h2>
			<h3>El teu espai personal de joc</h3>
			<?php 
				$query    = 'SELECT * FROM joc';
				$response = dbExec($query)[1];

				echo '<ul>';

				foreach($response as $joc) {
					echo '<li>';
					echo '<h4>'. $joc->_02_nomJoc .'</h4>';
					echo '<img src="../resources/img/jocs/'. $joc->_04_imgJoc .'" alt="'. $joc->_02_nomJoc .'" width="180" height="120">';
					echo '<p>'. substr($joc->_03_descJoc,0,500) .' ...</p>';
					echo '</li>';
				}
				echo '<li><h4>No et perdis les novetats</h4><h4>t\'esperem !</h4><img src="../resources/img/novetat.png" height="167" width="184" alt="">';
				echo '<p>Volem que estiguis sempre al dia de totes les actualitzacions, per això tenim una secció especialment dedicada per a tu</p></li>';
				echo '</ul>';
			 ?>
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
</html>

<?php
if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);
?>
