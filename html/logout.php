<?php 

include ("../src/seguretat.php");
include ("../src/pinball.h");

$arr = controlLogout();
$sessioAutenticada = $arr[0];
$sessioCaducada    = $arr[1];


$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
$url = 'http://'.$host.$uri.'/'.$extra;
?>

<!doctype html>
<html lang="en">
<head>
	<?php print('<meta content="2;URL=' . $url .'" http-equiv="REFRESH"> </meta>'); ?>
	<meta charset="UTF-8">	
	<title>Pinball. Log out</title>
	<link rel="stylesheet" href="../css/pinball.css">	
</head>
<body>
	<div id="main">	
		<header>
			<h1>Final de sessió</h1>
		</header>
		<section>
			<?php
			if ($sessioCaducada == "SI")
	        	echo '<h2>La sessió ha caducat.</h2>';
			if ($sessioAutenticada == "SI")
	        	echo "</br><h2>T'esperem molt aviat !!!!</h2></br>";
			?>
			<img src="../resources/img/logout/PINBALL_TRONIC.jpg" width="35%" alt="Màquina Pinball" />
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	<script src="../js/pinball.js"></script>
</html>


