<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretatLogin.php");

?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Empresa</title>
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Empresa</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section>
			<p>	Soporte Tecnológico Aplicado al Recreativo, S.L., está constituido como un Laboratorio de
				electrónica con una larga experiencia en el sector y un consolidado equipo de desarrollo
				especializado en la creación de proyectos a medida según las necesidades del cliente.
			</p>
			</br>
			<p> También dispone de producto propio, el cual se está comercializando tanto nacional como
				internacionalmente, por lo que tiene presencia en países como Argentina, Brasil, Venezuela,
				Italia...al tiempo que cuenta con una total confianza por parte de sus distribuidores.
			</p>
			</br>			
			<p> El objetivo del Laboratorio es proveer de los recursos necesarios a sus clientes con un
				producto tecnológicamente avanzado y capaz de cubrir todas las necesidades en los desarrollos
				de sus proyectos. Productos innovadores, robustos y personalizados según la necesidad a la que
				respondan. 
			</p>
			</br>			
			<p>	Dispone de un área de investigación que se mantiene en contacto constante con las nuevas
				tecnologías y en colaboración directa con sus distribuidores. Este contacto con tecnologías
				avanzadas le proporciona una visión muy amplia y un conocimiento actualizado de las herramientas
				existentes para desarrollos presentes y futuros, dando así una orientación a sus clientes del
				estado actual de la tecnología, y ofreciendo un servicio añadido en la evolución de su futuro
				producto.
			</p>
			</br>			
			<p> Gracias a su apuesta por las nuevas tecnologías y a su gran compromiso con la innovación en sus
				productos, ha sido reconocido en Freescale Design Alliance. Gozando así de un reconocimiento
				internacional de la calidad de sus proyectos y productos.
			</p>
			</br>			
			<p> La política de STAR es hacer particípe al cliente en su proyecto y darle toda la información y
				orientación posibles para que el resultado sea, como objetivo común, la calidad y el bajo coste.
			</p>
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	<script src="../js/pinball.js"></script>
</html>

<?php
if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);
?>
