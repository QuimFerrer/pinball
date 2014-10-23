<?php

ob_start();

include ("../src/pinball.h");
include ("../src/seguretat.php");
include ("../src/seguretatLogin.php");

$msg = "";
if ((isset($_GET['id'])) and (isset($_GET['activateKey'])))
	$msg = updateActivacioUsuari( $_GET['id'], $_GET['activateKey'] );

?>
<!doctype html>
<html>
<head>
	<meta content="" http-equiv="REFRESH"> </meta>		
	<meta charset="UTF-8">
	<title>Pinball. Activació registre</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Activació registre Pinball</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section class="staticPage">
			<img src="../resources/img/recreatius/roulette.jpg" height="400" alt="">			
			<?php
				if ($msg <> "") echo "<h2>$msg</h2>";
			?>			
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
</html>

<?php

if ($msg != "")
	{
	$extra = '../html/index.php';
	$res   = '<meta content="4;URL= ' . $extra . '" http-equiv="REFRESH"> </meta>';
	echo $res;
	}

// if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);
?>