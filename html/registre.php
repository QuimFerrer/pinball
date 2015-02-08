<?php

ob_start();

include ("../src/pinball.h");
include ("../src/seguretatLogin.php");

?>
<!doctype html>
<html>
<head>
	<meta content="" http-equiv="REFRESH"> </meta>			
	<meta charset="UTF-8">
	<title>Pinball. Registre</title>
	<link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" />
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Registre</h1>
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
					<div class="w2ui-field"><input name="fotoUsr" type="text" maxlength="100" size="60" readonly/></div>
					<br>
					<div class="w2ui-label">Facebook:</div>
					<div class="w2ui-field"><input name="facebookUsr" type="text" maxlength="100" size="60"/></div>
					<div class="w2ui-label">Twitter:</div>
					<div class="w2ui-field"><input name="twitterUsr" type="text" maxlength="100" size="60"/></div>
				</div>
				<div class="w2ui-buttons">
					<input type="button"  value="Esborrar" name="reset">
					<input type="button"  value="Enviar"   name="save">					
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
			{ name: 'nomUsr',      type: 'text',  required: true },
			{ name: 'cogUsr',      type: 'text',  required: true },
			{ name: 'loginUsr',    type: 'text',  required: true },
			{ name: 'passwordUsr', type: 'text',  required: true },
			{ name: 'emailUsr',    type: 'email', required: true },
			{ name: 'fotoUsr',     type: 'text',  required: false },
			{ name: 'facebookUsr', type: 'text',  required: false },
			{ name: 'twitterUsr',  type: 'text',  required: false }
		],
		actions: {
			reset: function () {
				this.clear();
			},
			save: function() {
				var self = this;
				this.save( { idUserPart:"", pid:1010 }, 
					function (data)
						{
						console.log(data); 
						if (data.status != 'error')
							{
							w2alert("Registre correcte. Revisa la teva safata d'entrada del teu correu electrònic per activar el teu compte. Gràcies", 'Missatge');
							// document.getElementsByTagName("META")[0].content = "5;URL=../html/index.php";
							setTimeout(function () { location.replace("../html/index.php");}, 7000);
							}
						else
							w2alert(data.message + ". Torna a intentar-ho. Gràcies.", 'Missatge');
						self.clear();
						});
			}
		}
	});
});
</script>
</html>

<?php
if (isset($_POST['entrar']) and !(isset($_POST['resetPassword'])) ) controlAcces($_POST["usr"],$_POST["pwd"]);
if (isset($_POST['entrar']) and   isset($_POST['resetPassword'])  ) resetPassword($_POST["usr"]);
?>
