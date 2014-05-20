<?php include("../src/pinball.h"); ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Inici</title>
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
<?php if ($_GET['id'] == 'adm') :?>
			<article>
				<h2>Aministrador</h2>
				<ul>
					<li><a href="#">Torneigs</a></li>
					<li><a href="#">Màquines</a></li>
					<li><a href="#">Partides</a></li>
					<li><a href="#">Jugadors</a></li>
					<li><a href="#">Consultes</a></li>
				</ul>		
			</article>

<?php endif ?>
<?php if ($_GET['id'] == 'usr') :?>

			<article>
				<h2>Usuari</h2>
				<ul>
					<li><a href="#">Perfil</a></li>
					<li><a href="#">Donar-se de baixa</a></li>
					<li><a href="#">Torneigs</a></li>
				</ul>					
			</article>
		
<?php endif ?>
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	<script src="../js/pinball.js"></script>
	<script>
		var op;
		var options = document.querySelectorAll('#users a');

		for (options in op)
			op.onclick = function (e) {
				e.preventDefault();

				alert('click');
				return false;
			}

	</script>
</html>