<?php 

// ob_start();

// include ("../src/pinball.h");
// include ("../src/seguretat.php");
// include ("../src/seguretatLogin.php");

// comprovaSessio();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Perfil usuari</title>
	<link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" />
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
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
			<input type="button" value="Reset" name="reset">
			<input type="button" value="Save" name="save">
		</div>
		<img src="../resources/img/avatar.jpg" alt="" class="perfil">
	</div>
</body>
<script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/pinball.js"></script>
<script>
// http://localhost/pinball/src/dbui.php?cmd=get-record&param=usuari&recid=2&keyname=_01_pk_idUsuari
	$('#form').w2form({ 
	name     : 'form',
	recid    : 1,
	header   : 'El meu perfil',
	url      : 'query.php',
	postData : {pid:5020},
	// formURL  : '../pages/demo/demo-forms.html', 
	fields: [
		{ name: 'nomUsr', type: 'text', required: false },
		{ name: 'cogUsr', type: 'text', required: false },
		{ name: 'loginUsr', type: 'text', required: false },
		{ name: 'passwordUsr', type: 'text', required: false },
		{ name: 'emailUsr', type: 'text', required: false },
		{ name: 'fotoUsr', type: 'upload', required: false },
		{ name: 'facebookUsr', type: 'text', required: false },
		{ name: 'twitterUsr', type: 'text', required: false }
	],
	actions: {
		reset: function () {
			this.clear();
		},
		save: function () {
			var obj = this;
			this.save({}, function (data) { 
				if (data.status == 'error') {
					console.log('ERROR: '+ data.message);
					return;
				}
				obj.clear();
			});
		}
	}
	});
	// all event listener
	// w2ui['form'].on('refresh', function (event) {
	// 	console.log(event);
	// });
</script>
</html>