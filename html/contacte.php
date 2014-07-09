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
	<title>Pinball. Contacte</title>
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
				<h2>Formulari de contacte</h2><br>
				<h3>Ens interessa conèixer la teva opinió</h3>				
			</hgroup>
			<p>El nostre objectiu és la millora contínua, per això totes les opinions compten i ens ajuden a seguir avançant. Si vols expressar alguna idea o tens algun suggeriment sobre els nostres productes o la nostra marca, t’agrairem que ens contactis des del nostre correu electrònic. Les teves inquietuds seran tingudes en compte i les teves idees també.</p><br>
			<img src="../resources/img/idea.png" height="300" width="220" alt="" style="float:left;margin-right:40px;">

			<div id="form" style="width: 60%;">
				<div class="w2ui-page page-0">
					<div class="w2ui-label">Nom:</div>
					<div class="w2ui-field">
						<input name="nom" type="text" maxlength="100" size="60"/>
					</div>
					<div class="w2ui-label">Cognoms:</div>
					<div class="w2ui-field">
						<input name="cognoms" type="text" maxlength="100" size="60"/>
					</div>
					<div class="w2ui-label">eMail:</div>
					<div class="w2ui-field">
						<input name="email" type="text" maxlength="100" size="60"/>
					</div>
					<div class="w2ui-label">Comentari:</div>
					<div class="w2ui-field">
						<textarea name="comentari" type="text" style="width: 385px; height: 80px; resize: none"></textarea>
					</div>
				</div>
				<div class="w2ui-buttons">
					<input type="button"  value="Esborrar" name="reset">
					<input type="button"  value="Enviar"   name="save">
				</div>
			</div>
			<div>
				<br>
				<p>De conformitat amb el que estableix la Llei Orgànica 15/1999, de 13 de desembre, de Protecció de Dades de Caràcter Personal, l’informem que les seves dades de caràcter personal s’incorporaran a un fitxer amb la finalitat de gestionar els processos de selecció de personal, atendre les seves consultes, suggeriments i reclamacions i informar sobre nous productes i promocions per qualsevol mitjà (inclosos mitjans electrònics). Així mateix, l’informem de la possibilitat de fer efectius els seus drets d’accés, oposició, rectificació i cancel.lació en els termes previstos en la llei esmentada, davant el titular i responsable del fitxer.</p>
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
				this.save( { idUserPart:"", pid:1000}, function(e) {
					// console.log(e.xhr.responseText);
					console.log(e);
					if (e)
						w2alert('Enviament correcte. Gràcies per la teva col.laboració', 'Missatge');
					else 
						w2alert("S'ha produit una incidència en l'enviament. Torna a intentar-ho. Gràcies.", 'Missatge');
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
