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
	<meta content="" http-equiv="REFRESH"></meta>
	<meta charset="UTF-8"></meta>
	<title>Configuració</title>
	<!-- <link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="../w2ui/dist/w2ui-1.5.css" /> 
    <link rel="stylesheet" href="../css/pinball.css">
</head>

<!-- <script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script> -->
<!-- <script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script> -->

<script type="text/javascript" src="../w2ui/libs/jquery/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="../w2ui/src/w2utils.js"></script>
<script type="text/javascript" src="../w2ui/src/w2fields.js"></script>
<script type="text/javascript" src="../w2ui/src/w2form.js"></script>
<script type="text/javascript" src="../w2ui/src/w2tabs.js"></script>
<script type="text/javascript" src="../w2ui/src/w2toolbar.js"></script>
<script type="text/javascript" src="../w2ui/src/w2popup.js"></script>

<script type="text/javascript" src="../js/pinball.js"></script>

<script>

	if(w2ui['dialog']) w2ui['dialog'].destroy();

	$("#form").w2form({ 
		name     : 'dialog',
		recid    : true,
		header   : 'Configuració',
		url      : 'query.php',
		postData : {pid:3030},

		// style1 : 'border: 1px solid red;',
		
		tabs: [
			{ id: 'tab1', caption: 'Base de dades' },
			{ id: 'tab2', caption: 'Email' },
			{ id: 'tab3', caption: 'Varis' }
			],
		
		// toolbar: {
		// 	items: [
		// 	{ type: 'button', id: 'button1', caption: 'Button1', img: 'icon-add' },
		// 	{ type: 'break' },
		// 	{ type: 'check', id: 'button2', caption: 'Button2', img: 'icon-add' },
		// 	{ type: 'check', id: 'button3', caption: 'Button3', img: 'icon-add' },
		// 	{ type: 'spacer' },
		// 	{ type: 'button', id: 'save', caption: 'Save', img: 'icon-folder' },
		// 	],
		// 	},
		
		// muestra los valores de los campos si eliminamos el campo 'url'

		// record: {
		// 	"nomServerMYSQL" : 'uuuuuuuuuuu',
		// 	"usrMYSQL" : 'uu',
		// 	"passwordUsrMYSQL" : 'uu',
		// 	"dbLocalOrRemot" : '1',
		// 	"emailDebug" : '0',
		// 	"emailSMTPHost" : 'uu',
		// 	"emailSMTPHostPort" : 999,
		// 	"emailUser" : 'uu',
		// 	"emailPassword" : 'uu',
		// 	"emailFrom" : 'uu',
		// 	"emailNomFrom" : 'uu',
		// 	"emailNomToContacte" : 'uu',
		// 	"emailCanal" : '1',
		// 	"emailPathRegistre" : 'uu',
		// 	"pathUploads" : 'uu',
		// 	"sizeUploads" : 2000
		// },

		fields: [
			// primera pestanya
			 { field: 'nomServerMYSQL',     type: 'text',  required: false }
			,{ field: 'usrMYSQL',           type: 'text',  required: false }
			,{ field: 'passwordUsrMYSQL',   type: 'text',  required: false }			
			,{ field: 'dbLocalOrRemot',     type: 'radio', required: true }
			 // segona pestanya
			,{ field: 'emailDebug',         type: 'select',required: false,
				options: { items: [{"id": 0, "text":'0 - Producció'},
								   {"id": 1, "text":'1 - Missatges del client'},
								   {"id": 2, "text":'2 - Missatges del client i servidor'}]
			// 0 = off (producción) 
			// 1 = client messages
			// 2 = client and server messages
				}
			 }
			,{ field: 'emailSMTPHost',      type: 'text',  required: false }
			,{ field: 'emailSMTPHostPort',  type: 'int',   required: false }
			,{ field: 'emailUser',          type: 'text',  required: false }
			,{ field: 'emailPassword',      type: 'text',  required: false }
			,{ field: 'emailFrom',          type: 'text',  required: false }
			,{ field: 'emailNomFrom',       type: 'text',  required: false }
			,{ field: 'emailNomToContacte', type: 'text',  required: false }
			,{ field: 'emailCanal',         type: 'select',required: false,
				options: { items: [{"id": 0, "text":'PHPMailer'}, 
					               {"id": 1, "text":'SendMail'}]
				}
			 }
			,{ field: 'emailPathRegistre',  type: 'text',  required: false }
			// tercera pestanya
			,{ field: 'pathUploads',        type: 'text',  required: false }
			,{ field: 'sizeUploads',        type: 'float', required: false }
		],

		actions: {
			reset: {
				caption : 'Some Action',
				style : 'border: 1px solid red',
				"class" : 'w2ui-btn-blue',
				onClick : function () {
					this.clear();
					}
			},
			save: function ()
				{
				console.log('save', this.record);
				options = {
				    msg          : 'Estas segur que vols guardar les modificacions?',
				    title        : w2utils.lang('Modificació de parámetres de configuració'),
				    width        : 450,       // width of the dialog
				    height       : 220,       // height of the dialog
				    yes_text     : 'Si',      // text for yes button
				    yes_class    : '',        // class for yes button
				    yes_style    : '',        // style for yes button
				    yes_callBack : function() {  // callBack for yes button
				    				   // record['dbLocalOrRemot'] ? 'on':'1':'0';
				    				   w2ui['dialog'].submit({'pid':3040}); },
				    no_text      : 'No',      // text for no button
				    no_class     : '',        // class for no button
				    no_style     : '',        // style for no button
				    no_callBack  : null,      // callBack for no button
				    callBack     : null       // common callBack
					};
	           	w2confirm(options);
	           	// console.log(this);
				}
		},

		onLoad: function(eventData) {
			// console.log("load", eventData.xhr.responseText);
            var result = JSON.parse(eventData.xhr.responseText).records[0];
			eventData.preventDefault();
			for (var i in result) w2ui['dialog'].record[i] = result[i];
			w2ui['dialog'].refresh();
		},

		onSave: function(eventData) {
			// console.log("save", eventData.xhr.responseText);
			var result = JSON.parse(eventData.xhr.responseText);
			eventData.preventDefault();
			var msg = "Configuració actualitzada correctament";
			if (result.status == "error") msg = result.message;
			w2alert(msg, "Modificació de parámetres de configuració");
			$("#form").hide();
			w2ui['dialog'].destroy();
			// setTimeout(function () { location.replace("../html/logout.php");}, 7000);
		},

		onProgress: function (event) {
			// console.log('progress');
			event.preventDefault();
		}
	});

</script>

<body>
	<div id="form">		
		<div class="w2ui-page page-0">
			<div class="w2ui-group-title">Base de Dades</div>
			<!-- <div class="w2ui-group group-0"  style="width: 450px; height: 150px;"> -->
			<div class="w2ui-group" style="width: 550px;">
				<div class="w2ui-field">
					<label>Servidor MySQL:</label>
					<div><input name="nomServerMYSQL" type="text" maxlength="100" size="30" placeholder="path/servidor:port" readonly/></div>
				</div>					
				<div class="w2ui-field">
					<label>Usuari MYSQL:</label>
					<div><input name="usrMYSQL" type="text" maxlength="100" size="30" placeholder="localhost" readonly/></div>
				</div>					
				<div class="w2ui-field">
					<label>Password MYSQL:</label>
					<div><input name="passwordUsrMYSQL" type="text" maxlength="100" size="30" readonly/></div>
				</div>
				<div class="w2ui-field">
					<label>Base de dades:</label>
					<div>
						<label>
					    	<input name="dbLocalOrRemot" type="radio" checked = "checked" readonly/>
							MYSQL Remota
						</label>
						<label>
					    	<input name="dbLocalOrRemot" type="radio" readonly/>
							MYSQL Local
						</label>
				 	</div>
				</div>
			</div>
		</div>

		<div class="w2ui-page page-1">
			<div class="w2ui-group-title">Email</div>
			<!-- <div class="w2ui-group group-1"  style="width: 450px; height: 325px;"> -->
			<div class="w2ui-group"  style="width: 550px;">				
				<div class="w2ui-field">
					<label>Mode operatiu:</label>
					<div>
						<select name="emailDebug" style="width: 180px;">
							<option value="0">Producció</option>
							<option value="1">Missatges del client</option>
							<option value="2">Missatges del client i servidor</option>
						</select>
					</div>
				</div>
				<div class="w2ui-field">
					<label>SMTP Host:</label>
					<div><input name="emailSMTPHost" type="text" maxlength="100" size="40" placeholder = "smtp.gmail.com"/></div>
				</div>
				<div class="w2ui-field">
					<label>SMTP Host Port:</label>
					<div><input name="emailSMTPHostPort" type="number" maxlength="5" size="3" placeholder="587"/></div>
				</div>
				<div class="w2ui-field">
					<label>User:</label>
					<div><input name="emailUser" type="text" maxlength="100" size="40" placeholder="activar.cuenta.usuario@gmail.com"/></div>
				</div>
				<div class="w2ui-field">
					<label>Password:</label>
					<div><input name="emailPassword" type="text" maxlength="100" size="40" placeholder=""/></div>
				</div>
				<div class="w2ui-field">
					<label>From:</label>
					<div><input name="emailFrom" type="text" maxlength="100" size="40" placeholder="activar.cuenta.usuario@gmail.com"/></div>
				</div>
				<div class="w2ui-field">
					<label>Nom From:</label>
					<div><input name="emailNomFrom" type="text" maxlength="100" size="40" placeholder="Pinball"/></div>
				</div>
				<div class="w2ui-field">
					<label>Nom To pel ContactePinball:</label>
					<div><input name="emailNomToContacte" type="text" maxlength="100" size="40" placeholder="Contacte Pinball"/></div>
				</div>
				<div class="w2ui-field">
					<label>Canal enviament:</label>
					<div>
						<select name="emailCanal" style="width: 180px;">
							<option value="0">PHPMailer</option>
							<option value="1">SendMail</option>
						</select>
					</div>
				</div>
				<br>
				<div class="w2ui-field">
					<label>Path registre:</label>
					<div><input name="emailPathRegistre" type="text" maxlength="100" size="40" placeholder="registre/"/></div>
				</div>
			</div>
		</div>

		<div class="w2ui-page page-2">
			<div class="w2ui-group-title">Varis</div>
			<div class="w2ui-group"  style="width: 550px;">
			<!-- <div class="w2ui-group group-2"  style="width: 450px; height: 80px;"> -->
				<div class="w2ui-field">
					<label>Path uploads:</label>
					<div><input name="pathUploads" type="text" maxlength="100" size="40" placeholder="uploads/"/></div>
				</div>
				<div class="w2ui-field">
					<label>Size uploads (bytes):</label>
					<div><input name="sizeUploads" type="text" maxlength="10" size="8" placeholder="2000000"/></div>
				</div>
			</div>			
		</div>
		<div class="w2ui-buttons">
            <button class="w2ui-btn" name="reset">Reset</button>
            <button class="w2ui-btn w2ui-btn-green" name="save" id="ssl-submit">Guardar</button>
		</div>
	</div>
</body>
</html>