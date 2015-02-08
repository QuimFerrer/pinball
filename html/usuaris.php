<?php

ob_start();

include ("../src/pinball.h");
include ("../src/seguretat.php");
include ("../src/seguretatLogin.php");

comprovaSessio();

function mostraUsuariLogat()
{
	if (isset($_SESSION["login"]))
		{
		$nom    = (isset($_SESSION["nomUsr"])    ? $_SESSION["nomUsr"]    : "");
		$cognom = (isset($_SESSION["cognomUsr"]) ? $_SESSION["cognomUsr"] : "");
	  	if ($_SESSION["login"] == 'admin') $nom = 'Administrador - ' . $nom . ' ' . $cognom;
	  	else $nom = 'Jugador - ' . $nom . ' ' . $cognom;
		echo $nom;
		}
}
?>

<!doctype html>
<html>
<head>
	<meta content="" http-equiv="REFRESH"> </meta>
	<meta charset="UTF-8">
	<title>Pinball. Usuaris</title>
	<!-- <link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" /> -->
	<link rel="stylesheet" href="../w2ui/dist/w2ui-1.5.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../w2ui/libs/font-awesome/font-awesome.css"/>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Pagina d'usuaris</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<h2 id="username"><?php mostraUsuariLogat();?></h2>
		<section id="users" style="width: 100%; height: 500px;">

			<article>
<!-- 				<?php mostraUsuariLogat();?>
 -->				
 				<div id="sidebar"></div>
 				<div id="grid"></div>
				<div id="form"></div>
			</article> 
				
			
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	
<!-- <script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script> -->
<!-- <script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script> -->

<script type="text/javascript" src="../w2ui/libs/jquery/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="../w2ui/dist/w2ui-1.5.min.js"></script>


	<script type="text/javascript" src="../js/pinball.js"></script>
	<script type="text/javascript" src="../js/lib/dbui.js"></script>

<?php if (isset($_SESSION["login"])) :
	if ($_SESSION["login"] == 'admin') :?>
		<script type="text/javascript" src="../js/admin.js"></script>
	<?php else : ?>
		<script type="text/javascript" src="../js/user.js"></script>
	<?php endif; ?>
<?php endif; ?>
</html>

<?php
if (isset($_POST['entrar']) and !(isset($_POST['resetPassword'])) ) controlAcces($_POST["usr"],$_POST["pwd"]);
if (isset($_POST['entrar']) and   isset($_POST['resetPassword'])  ) resetPassword($_POST["usr"]);
?>
