<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretatLogin.php");

?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Registre</title>
	<link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" />
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Contacte</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section class="staticPage">
			<hgroup>
				<h2>Formulari de registre</h2><br>
			</hgroup>
			<br>
			<div id="form">
				<div class="w2ui-page page-0">
					<br>
					<div class="w2ui-label">Nom:</div>
					<div class="w2ui-field"><input name="nomUsr" type="text" maxlength="100" size="60"/></div>
					<div class="w2ui-label">Cognom:</div>
					<div class="w2ui-field"><input name="cogUsr" type="text" maxlength="100" size="60"/></div>
					<div class="w2ui-label">Login:</div>
					<div class="w2ui-field"><input name="loginUsr" type="text" maxlength="100" size="60"/></div>
					<div class="w2ui-label">Password:</div>
					<div class="w2ui-field"><input name="passwordUsr" type="text" maxlength="100" size="60"/></div>
					<br>
					<div class="w2ui-label">Email:</div>
					<div class="w2ui-field"><input name="emailUsr" type="text" maxlength="100" size="60"/></div>
					<div class="w2ui-label">Foto:</div>
					<div class="w2ui-field"><input name="fotoUsr" type="text" maxlength="100" size="60"/></div>
					<br>
					<div class="w2ui-label">Facebook:</div>
					<div class="w2ui-field"><input name="facebookUsr" type="text" maxlength="100" size="60"/></div>
					<div class="w2ui-label">Twitter:</div>
					<div class="w2ui-field"><input name="twitterUsr" type="text" maxlength="100" size="60"/></div>
				</div>
				<div class="w2ui-buttons">
					<input type="reset"  value="Esborrar" name="reset">
					<input type="submit" value="Enviar"   name="save">					
				</div>
				<img src="../resources/img/avatar.jpg" alt="" class="perfil">
			</div>
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
<script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/lib/dbui.js"></script>
<script>
$(function () {
	$('#form').w2form({ 
		name  : 'form',
		url   : 'query.php',
		fields: [
			{ name: 'nom', 			type: 'text', required: true },
			{ name: 'cognoms',  	type: 'text', required: true },
			{ name: 'email',  		type: 'email', required: true },
			{ name: 'comentari',  	type: 'text', required: true}
		],
		actions: {
			reset: function () {
				this.clear();
			},
			save: function() {
				var self = this;
				this.save( {pid:1010}, function(e) {
					console.log(e);
					w2alert('Gràcies per la teva col.laboració', 'Missatge');
					self.clear();
				});
			}
		}
	});
});
</script>
</html>

<?php
if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);

if (isset($_POST['save']))
	{
	$dades = (object)array("nom"      => $_POST['nomUsr'],
						   "cognoms"  => $_POST['cogUsr'],
						   "login"    => $_POST['loginUsr'],
						   "password" => $_POST['passwordUsr'],
						   "email"    => $_POST['emailUsr'],
						   "foto"     => $_POST['fotoUsr'],
						   "facebook" => $_POST['facebookUsr'],
						   "twitter"  => $_POST['twitterUsr']);
	if ( enviaEmail("registre", $dades) )
		echo "<script>alert('Enviament corecte. Gràcies per la teva col.laboració');</script>";
	else
		echo "<script>alert('S'ha produit una incidència en l'enviament. Torna a intentar-ho. Gràcies.');</script>";
	}

?>
