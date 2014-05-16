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
			<h1>Màquines recreatives</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section>
			<h1>Llista de productes</h1>
			<?php 
				$query    = 'SELECT * FROM productes';
				$response = dbExec($query);

				echo '<ul class="promo">';

				foreach($response as $producte) {
					echo '<li>';
					echo '<img src="..\resources\img\\'. $producte->foto .'" alt="">';
					echo '<h2>'. 				$producte->nom .'</h3>';
					echo '<p>Codi: '. 			$producte->id .'</p>';
					echo '<h3>Preu: '. 			$producte->preu .'€</h3>';
					echo '<p>Data d\'alta: '. 	$producte->data_alta .'</p>';
					echo '<p>Detall: '. 		$producte->descripcio .'</p>';
					echo '</li>';
				}
				echo '</ul>';
			 ?>
		</section>
		<footer>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, nemo, ducimus aliquam totam rerum neque asperiores similique ad vel reprehenderit commodi praesentium atque nostrum assumenda mollitia unde voluptatibus quo facilis!</p>
		</footer>
	</div>
</body>
</html>