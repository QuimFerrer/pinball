<?php

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

comprovaSessio();
	
function mostraUsuariLogat()
{
	if (isset($_SESSION["tipoUsr"]))
		{
	  	if ($_SESSION["tipoUsr"] == 'admin')
  			echo '<h2>Aministrador</h2>';
		else
			echo '<h2>Usuari</h2>';
		}

	// if ($_GET['id'] == 'adm') 
	// 	echo '<h2>Aministrador</h2>';
	// elseif ($_GET['id'] == 'usr') 
	// 	echo '<h2>Usuari</h2>';
	// else
	// 	echo "No previst";
}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Usuaris</title>
	<link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" />
	<link rel="stylesheet" href="../css/pinball.css">
</head>
<body>
	<div id="main">
		<header>
			<h1>Pagina d'usuaris</h1>
		</header>
		<menu>
			<?php menu(); ?>
		</menu>
		<section id="users">

			<article>
				<?php mostraUsuariLogat();?>
				<div id="toolbar"></div>
			</article>
				
			<div id="grid"></div>
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	<script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script>
	<script type="text/javascript" src="../js/pinball.js"></script>
	<script type="text/javascript" src="../js/lib/dbui.js"></script>
	<script>
// Toolbar per l'Administrador
<?php if (isset($_SESSION["tipoUsr"]))
		if ($_SESSION["tipoUsr"] == 'admin') :?>

	$('#toolbar').w2toolbar({
		name: 'toolbar',
		items: [
			{ type: 'button',  id: '1020', caption: 'Productes', img: 'icon-edit', hint: 'Manteniment de productes' },
			{ type: 'button',  id: '1040', caption: 'Màquines',  img: 'icon-folder', hint: 'Accés a màquines' },
			{ type: 'button',  id: '1060', caption: 'Torneigs',  img: 'icon-edit', hint: 'Accés a torneigs' },
			{ type: 'button',  id: '1080', caption: 'Usuaris',  img: 'icon-folder', hint: 'Accés a usuaris' },
			{ type: 'button',  id: '1100', caption: 'Consultes', img: 'icon-page', hint: 'Mòdul de consultes' }
		],
		onClick: function(e){ modelVista(e) }
	});

	var modelVista = function(e) {
		e.preventDefault();

		switch(e.target) {
			case '1020':
				var columns = [              
					{ field: 'recid',       caption: 'Id.',              size: '5%',   sortable: true,   resizable: true  },
					{ field: 'nom',         caption: 'Nom del Producte', size: '30%',  sortable: true,   resizable: true  },
					{ field: 'descripcio',  caption: 'Descripció',       size: '35%',  sortable: true,   resizable: true  },
					{ field: 'preu',        caption: 'Preu',             size: '10%',  sortable: true,   resizable: true  },
					{ field: 'foto',        caption: 'Foto',             size: '20%',  sortable: false,  resizable: false }
				];
				var fields = [
			        { name: 'nom', type: 'text', required: true,
			          html: { caption: 'Nom', attr: 'size="40"', span: 5 }
			        },
			        { name: 'descripcio', type: 'text', required: false,
			          html: { caption: 'Descripció', attr: 'size="40"', span: 5 }
			        },
			        { name: 'preu', type: 'text', required: false,
			          html: { caption: 'Preu', attr: 'size="40"', span: 5 }
			        },
			        { name: 'foto', type: 'text', required: false,
			          html: { caption: 'Foto', attr: 'size="40"', span: 5 }
			        }
			    ];
			    DataGrid("Manteniment de productes", "productes", columns, fields);
			    break;

			case '1040':
				columns = [				
					{ field: '01_pk_idMaq', caption: 'ID Maquina', size: '10%' },
					{ field: '03_propMaq', caption: 'Nom del propietari', size: '50%' },
					{ field: '06_datAltaMaq', caption: 'Data alta', size: '40%' }
				];
			    DataGrid("Llistat de màquines", false, columns, e.target);
			    break;

			case '1080':
				columns = [				
					{ field: '01_pk_idUsuari', caption: 'ID Usuari', size: '10%' },
					{ field: '02_nomUsuari', caption: 'Nom', size: '30%' },
					{ field: '03_cognomUsuari', caption: 'Cognom', size: '30%' },
					{ field: '04_loginUsuari', caption: 'Login', size: '15%' },
					{ field: '05_pwdUsuari', caption: 'Password', size: '15%' }
				];
			    DataGrid("Manteniment d'usuaris", "usuari", columns, e.target);
			    break;
			default:
			    console.log("default");
		}
		return false;
	};
<?php endif ?>


// Toolbar per l'Usuari
<?php if (isset($_SESSION["tipoUsr"]))
		if ($_SESSION["tipoUsr"] == 'usuari') :?>

	$('#toolbar').w2toolbar({
		name: 'toolbar',
		items: [
			{ type: 'button',  id: '2020', caption: 'Perfil',  img: 'icon-page', hint: 'Hint for item 1' },
			{ type: 'button',  id: '2040', caption: 'Donar-se de baixa',  img: 'icon-folder', hint: 'Hint for item 2' },
			{ type: 'button',  id: '2060', caption: 'Torneigs',  img: 'icon-page', hint: 'Hint for item 3' }
		],
		onClick: function (e) {
			var columns;
			e.preventDefault();

			switch(e.target) {
				case '2020':
					columns = [				
						{ field: 'nom', caption: 'usuari', size: '20%' },
						{ field: 'foto', caption: 'partida', size: '20%' }
					];
				    DataGrid("Perfil d'usuari", e.target, columns);
				    break;
				default:
				    console.log("default");
			}
			return false;
		}
	});
<?php endif ?>
	</script>
</html>