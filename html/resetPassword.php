<?php 
ob_start();

include ("../src/pinball.h");
include ("../src/seguretat.php");
include ("../src/seguretatLogin.php");

comprovaSessio();

?>
<!doctype html>
<html>
<head>
	<meta content="" http-equiv="REFRESH"> </meta>			
	<meta charset="UTF-8">
	<title>Pinball. Reset Clau</title>
	<link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" />
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Inicialitzar la clau d'accés</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section class="staticPage">
			<hgroup>
				<h2>Inicialitzar la clau d'accés</h2><br>
			</hgroup>
			<p>Per inicialitzar la clau d'accés introdueix el teu usuari i la teva adreça de correu electrònic amb la que et vas registrar al joc. En uns minuts rebràs un correu amb instruccions per restablir la clau. Gràcies.</p><br>
			<img src="../resources/img/idea.png" height="300" width="220" alt="" style="float:left;margin-right:40px;">

			<div id="resetPassword" style="width: 60%;">
				<div class="w2ui-page page-0">
					<div class="w2ui-label">Nom d'usuari:</div>
					<div class="w2ui-field">
						<input name="usuari" type="text" maxlength="100" size="60"/>
					</div>					
					<div class="w2ui-label">eMail:</div>
					<div class="w2ui-field">
						<input name="email" type="text" maxlength="100" size="60"/>
					</div>
					<div class="w2ui-label">Nou Password:</div>
					<div class="w2ui-field">
						<input name="passwordUsr" type="text" maxlength="100" size="60"/>
					</div>
				</div>
				<div class="w2ui-buttons">
					<input type="button"  value="Esborrar" name="reset">
					<input type="button"  value="Enviar"   name="save">
				</div>
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
	$('#resetPassword').w2form({ 
		name  : 'resetPassword',
		url   : 'query.php',
		fields: [
			{ name: 'usuari', 	    type: 'text',  required: true },		
			{ name: 'email',  		type: 'email', required: true },
			{ name: 'passwordUsr',  type: 'text', required: true }
		],
		actions: {
			reset: function () {
				this.clear();
			},
			save: function() {
				var self = this;
				this.save( { idUserPart:"", pid:1001},
					function (data)
						{
						console.log(data); 
						if (data.error != 'si')
							{
							w2alert("Registre correcte. Revisa la teva safata d'entrada del teu correu electrònic per activar el teu compte. Gràcies", 'Missatge');
							document.getElementsByTagName("META")[0].content = "5;URL=../html/index.php";
							window.location.replace("../html/index.php");
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
if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);
?>
