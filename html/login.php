<?php 

include ("../src/pinball.h");
include ("../src/seguretat.php");

// $_GET["errorusuario"] = "";

 // if (isset($_POST['entrar']) )
// 	if ($_POST['entrar'] == "Entrar") $_GET['errorusuario'] = 'si';

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
	<style>
		
	</style>
</head>
<body>

<section>
	<table align="center" width="225" cellspacing="2" cellpadding="2" border="0">
		<tr><td colspan="2" align="center">
		<?php
			if ($_GET["errorusuario"]=="si")
				echo '<span style="color:000000"><b>Dades incorrectes</b></span>';
		?>
	</td></tr></table>
</section>	
</body>
</html>

<?php 

	// Recupera POST usr i pwd
	// Valida usuari/password en BD i en funcio del resultar entrar
    // usuaris.php?id=usr
	// El pas de params es farà per SESSION, de moment per GET

	// $host  = $_SERVER['HTTP_HOST'];
	// $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	
	// if (controlLogin($_POST["usr"],$_POST["pwd"]) == "SI")
	// 	$extra = 'usuaris.php';
	// else
	// 	$extra = 'inici.php';

	// header("Location: http://$host$uri/$extra");

	if ($_GET["errorusuario"]=="si")
		print('<meta content="2;URL=' . $extra .'" http-equiv="REFRESH"> </meta>');

 ?>
