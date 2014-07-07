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
			<input type="button" value="Guardar" name="save">
			<input type="button" value="Baixa" name="reset">
		</div>
		<img src="../resources/img/avatar.jpg" alt="" class="perfil">
	</div>
</body>
<script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/pinball.js"></script>
<script>
// http://localhost/pinball/src/dbui.php?cmd=get-record&param=usuari&recid=2&keyname=_01_pk_idUsuari

	if(w2ui['form']) w2ui['form'].destroy();

	$("#form").w2form({ 
		name     : 'dialog',
		recid    : "1",
		header   : 'El meu perfil',
		url      : 'query.php',
		postData : {pid:5020},
		fields: [
			{ name: 'nomUsr', type: 'text', required: false },
			{ name: 'cogUsr', type: 'text', required: false },
			{ name: 'loginUsr', type: 'text', required: false },
			{ name: 'passwordUsr', type: 'text', required: false },
			{ name: 'emailUsr', type: 'text', required: false },
			{ name: 'fotoUsr', type: 'text', required: false },
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
					console.log(data);
					if (data.status == 'error') {
						console.log('ERROR: '+ data.message);
						return;
					}
					obj.clear();
				});
			}
		},
		onLoad: function(eventData) {
            var result = JSON.parse(eventData.xhr.responseText);
            var row = result[1];
            result = row[0];
			eventData.preventDefault();
			console.log(result);

			for (var i in result) {
				w2ui['dialog'].record[i] = result[i];
				console.log(i, result[i]);
			}
			w2ui['dialog'].refresh();
		} 
	});
</script>
</html>