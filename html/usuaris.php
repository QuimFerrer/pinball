<?php

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

comprovaSessio();
	
function mostraUsuariLogat()
{
	if (isset($_SESSION["login"]))
		{
	  	if ($_SESSION["login"] == 'admin')
  			echo '<h2>Aministrador</h2>';
		else
			echo '<h2>Usuari</h2>';
		}
}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Usuaris</title>
	<link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" />
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
		<section id="users">

			<article>
				<?php mostraUsuariLogat();?>
				<!-- <div id="toolbar"></div> -->
				<div id="sidebar"></div>
				<div id="grid"></div>
			</article>
				
			
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	<script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script>
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