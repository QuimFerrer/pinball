<?php include("../src/pinball.h"); ?>
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
			<h1>Registre d'usuari</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section>
			<hgroup>
				<h2>Registre d'usuari</h2><br>
			</hgroup>
			<div id="form" style="width: 100%;">
				<div class="w2ui-page page-0">
					<div class="w2ui-label">Nom:</div>
					<div class="w2ui-field">
						<input name="nom" type="text" maxlength="100" size="60"/>
					</div>
					<div class="w2ui-label">Cognoms:</div>
					<div class="w2ui-field">
						<input name="cognoms" type="text" maxlength="100" size="60"/>
					</div>
					<div class="w2ui-label">Ciutat:</div>
					<div class="w2ui-field">
						<input name="ciutat" type="text" maxlength="100" size="60"/>
					</div>
					<div class="w2ui-label">eMail:</div>
						<div class="w2ui-field">
							<input name="email" type="text" maxlength="100" size="60"/>
						</div>
				</div>
				<div class="w2ui-buttons">
					<input type="button" value="Esborrar" name="reset">
					<input type="button" value="Enviar" name="save">
				</div>
			</div><br>
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
			{ name: 'ciutat',  		type: 'text', required: true },
			{ name: 'email',  		type: 'email', required: true }
		],
		actions: {
			reset: function () {
				this.clear();
			},
			save: function() {
				var self = this;
				this.save( {pid:1010}, function(e) {
					console.log(e);
					w2alert('Gràcies per registrar-te !', 'Missatge');
					self.clear();
				});
			}
		}
	});
});
</script>
</html>