<?php

include ("../model/sudoku.php");
include ("../model/lib/libreria.php");
include ("../model/lib/database.php");

$msg = "";

if ((isset($_GET['id'])) and (isset($_GET['activateKey'])))
	{
	$res = json_decode(updateActivacionJugador($_GET['id'],$_GET['activateKey']))[0];
	if ($res->estat)
		$msg = "Su cuenta se ha activado correctamente";
	else
		$msg = "Error en la activación de su cuenta.";
	}

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Sudoku. Registro</title>
    <link rel="stylesheet" href="../view/css/estilo.css" type="text/css" media="screen" />
</head>

<body>
	<div id="main">
		<header id="cabecera">
			<nav></nav>
		</header>
		<section>
			<article id="cap">
				<h1>Activación de cuenta</h1>
			</article>
			<article id="cos">
				<?php
					if ($msg <> "") echo "<h2>$msg</h2>";
				?>
			</article>			
			<article id="peu">
			</article>
		</section>
		<footer>
		</footer>
    </div>

</body>
</html>

<?php

if ($msg != "")
	{
	$extra = '../index.php';
	$res   = '<meta content="4;URL= ' . $extra . '" http-equiv="REFRESH"> </meta>';		
	echo $res;
	}

?>