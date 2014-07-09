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
	<title>Pinball. Inici</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Pagina d'inici</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section class="staticPage">
			<img src="../resources/img/recreatius/roulette.jpg" height="400" alt="">
			<p>Jugadors i Jugadores !!  Ludopates i Viciats !! aquesta és la vostra web on podreu gastar tans diners com vulgueu i podreu puntuar en els vostres rankings totes les vostres activitats !! </p>
			</br>
			<p>Apunta't ja als torneigs, hi ha molta gent esperan-te!! .... juga ...juga  .. i premi !! ha-ha-ha-ha  (riure malvat)</p>
			</br>
			<p>Dolorum, deleniti, cum, voluptate, praesentium dignissimos nulla dolor vero fugit quasi officiis temporibus nobis excepturi iusto dolore iste maxime quos. Rem eius tenetur nihil aperiam veritatis iure ipsam nulla aliquam.</p>
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
