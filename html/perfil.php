<?php 
ob_start();

include ("../src/pinball.h");
include ("../src/seguretat.php");
include ("../src/seguretatLogin.php");

comprovaSessio();
?>
<!DOCTYPE html>
<html>
<head>
	<meta content="" http-equiv="REFRESH"> </meta>			
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
			<div class="w2ui-field"><input name="loginUsr" type="text" maxlength="100" size="60" readonly /></div>
			<div class="w2ui-label">Password:</div>
			<div class="w2ui-field"><input name="passwordUsr" type="password" maxlength="100" size="60" readonly /></div>
			<br>
			<div class="w2ui-label">Email:</div>
			<div class="w2ui-field"><input name="emailUsr" type="text" maxlength="100" size="60"/></div>
			<div class="w2ui-label">Foto:</div>
			<div class="w2ui-field"><input id="fotoUsr" name="fotoUsr" type="text" maxlength="100" size="60"/></div>
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

	if(w2ui['dialog']) w2ui['dialog'].destroy();

	$("#form").w2form({ 
		name     : 'dialog',
		recid    : true,
		header   : 'El meu perfil',
		url      : 'query.php',
		postData : {pid:5020},
		fields: [
			{ name: 'nomUsr', type: 'text', required: true },
			{ name: 'cogUsr', type: 'text', required: true },
			{ name: 'loginUsr', type: 'text', required: true },
			{ name: 'passwordUsr', type: 'text', required: true },
			{ name: 'emailUsr', type: 'email', required: true },
			{ name: 'fotoUsr', type: 'upload', required: false,
				options : {
						url             : '',       // not yet implemented
						base64          : true,     // only true for now, max file size is 20mb
						hint            : w2utils.lang('Seleccionar arxiu ...'),
						max             : 1,        // max number of files, 0 - unlim
						maxSize         : 0,        // max size of all files, 0 - unlim
						maxFileSize     : 0,        // max size of a single file, 0 -unlim
						onAdd           : function (event) {
							tipos="image/gif,image/jpg,image/jpeg,image/png";
							if( tipos.split(",").indexOf(event.type) == -1 )
								{
								console.log(event.type);
								w2alert("Arxius acceptats: .gif, .jpg, .jpeg i .png", "Avís");
								$('#fotoUsr').data('selected', []);
								$('#fotoUsr')[0].refresh();
   								}
						},     // event on item add
						onRemove        : null,     // event on item remove
						onItemClick     : null,     // event on item click
						onItemDblClick  : null,     // event on item dbl click
						onItemOver      : null,     // event on item mouse over
						onItemOut       : null,     // event on item mouse out
						onProgress      : null,     // not yet implemented
						onComplete      : null      // not yet implemented
					} },
			{ name: 'facebookUsr', type: 'text', required: false },
			{ name: 'twitterUsr', type: 'text', required: false }
		],
		actions: {
			reset: function () {
				var self = this;
	            w2confirm('Estas segur que vols la baixa?', "Donar-se de baixa d'usuari", 
	            function (msg) { 
	                if (msg=='Yes')
	                	console.log("aki");
	                	w2ui['dialog'].submit({'pid':5023}, function(e) {
	                		if (e.total)
	                			{
	                			w2ui['dialog'].destroy();
			                    document.getElementsByTagName("META")[0].content = "1;URL= ../html/logout.php";
	                			}
	                	});
	            });
			},
			save: function () {
				this.save({'pid':5022}, function (data) { 
					if (data.status == 'error')
						{
						console.log('ERROR: '+ data.message);
						return;
						}
					else
						{
						$("#form").hide();
						w2alert("Les dades s'han guardat correctament", "El meu perfil");
						document.getElementsByTagName("META")[0].content = "3;URL= ./usuaris.php";						
						}
				});
			}
		},
		onLoad: function(eventData) {
			console.log("load", eventData.xhr.responseText);
            var result = JSON.parse(eventData.xhr.responseText)[1][0];
			eventData.preventDefault();

			for (var i in result)
				w2ui['dialog'].record[i] = result[i];

			// w2ui['dialog'].refresh();
			if (result['fotoUsr'] != "")
				{
				$('#fotoUsr').data('selected', [{ name	: result['fotoUsr']}] );
				$('#fotoUsr')[0].refresh();
				var aa=Array();
				aa[0] = new Object();
				aa[0]['name'] =  result["fotoUsr"];
				w2ui['dialog'].record["fotoUsr"] = aa;
				}
		} 
	});
</script>
</html>