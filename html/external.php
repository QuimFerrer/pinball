<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretatLogin.php");

?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html">
	<meta charset="UTF-8">
	<title>Pinball. Jocs</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<h1>Llista de jocs</h1>
	<?php 
		$query    = 'SELECT * FROM joc';
		$response = dbExec($query)[1];

		echo '<ul class="promo">';

		foreach($response as $joc) {
			echo '<li>';
			// echo '<img src="../resources/img/jocs/'. $joc->_04_imgJoc .'" alt="'. $joc->_02_nomJoc .'">';
			echo '<h2>'. 				$joc->_02_nomJoc .'</h3>';
			echo '<p>Codi: '. 			$joc->_01_pk_idJoc .'</p>';
			echo '<p>Data d\'alta: '. 	date('j-m-Y',strtotime($joc->_06_datAltaJoc)) .'</p>';
			echo '<p>Detall: '. 		$joc->_03_descJoc .'</p>';
			echo '</li>';
		}

		echo '</ul>';
	 ?>
</body>
</html>