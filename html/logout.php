<?php 

include ("../src/seguretat.php");

$arr = controlLogout();
$sessioAutenticada = $arr[0];
$sessioCaducada    = $arr[1];


$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'inici.php';
$url = 'http://'.$host.$uri.'/'.$extra;
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php print('<meta content="5;URL=' . $url .'" http-equiv="REFRESH"> </meta>'); ?>
	<title>Log out</title>
	<style>
		
	</style>
</head>
<body>
	<section>
		<?php
			if ($sessioCaducada == "SI")
	        	echo '<h2>La sessió ha caducat.</h2>';
			if ($sessioAutenticada == "SI")
	        	echo '<h2>Finalitzada la sessió.</h2><br><h3>Fins aviat !!!!</h3>';
		?>
	</section>
</body>
</html>
