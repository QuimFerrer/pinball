<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretatLogin.php");

?>
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
			<h1>Pagina d'inici</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, nemo, ducimus aliquam totam rerum neque asperiores similique ad vel reprehenderit commodi praesentium atque nostrum assumenda mollitia unde voluptatibus quo facilis!</p>
			<p>Nulla, aliquam, ullam commodi quae repellat molestiae aut cumque dolor porro laudantium blanditiis facilis reprehenderit officiis eius laboriosam at autem tenetur vel nesciunt distinctio aliquid eveniet perferendis nam natus dolore.</p>
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
