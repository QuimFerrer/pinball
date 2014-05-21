<?php include("../src/pinball.h"); ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pinball. Inici</title>
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
<?php 
	if ($_GET['id'] == 'adm') 
		echo '<h2>Aministrador</h2>';
	elseif ($_GET['id'] == 'usr') 
		echo '<h2>Usuari</h2>';
	else
		echo "No previst";
?>
				<div id="toolbar" style="padding: 4px; border: 1px solid silver; border-radius: 3px"></div>
			</article>
				
			<div id="grid" style="width: 100%; height: 450px;"></div>
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	<script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//w2ui.com/src/w2ui-1.3.min.js"></script>
	<script src="../js/pinball.js"></script>
	<script>
// Toolbar per l'Administrador
<?php if ($_GET['id'] == 'adm') :?>

	$('#toolbar').w2toolbar({
		name: 'toolbar',
		items: [
			{ type: 'button',  id: '1020', caption: 'Torneigs',  img: 'icon-edit', hint: 'Hint for item 1' },
			{ type: 'button',  id: '1040', caption: 'Màquines',  img: 'icon-folder', hint: 'Hint for item 2' },
			{ type: 'button',  id: '1060', caption: 'Partides',  img: 'icon-page', hint: 'Hint for item 3' },
			{ type: 'button',  id: '1080', caption: 'Jugadors',  img: 'icon-folder', hint: 'Hint for item 4' },
			{ type: 'button',  id: '1100', caption: 'Consultes', img: 'icon-page', hint: 'Hint for item 5' }
		],
		onClick: function (e) {

			e.preventDefault();

			switch(e.target) {
				case '1020':
					columns = [				
						{ field: 'nom', caption: 'Nom del producte', size: '40%' },
						{ field: 'foto', caption: 'Foto del producte', size: '40%' }
					];
				    querySend(e.target, columns);
				    break;
				case '1040':
					columns = [				
						{ field: '03_propMaq', caption: 'Nom del propietari', size: '100%' }
					];
				    querySend(e.target, columns);
				    break;
				default:
				    console.log("default");
			}
			return false;
		}
	});
<?php endif ?>

// Toolbar per l'Usuari
<?php if ($_GET['id'] == 'usr') :?>

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
				    querySend(e.target, columns);
				    break;
				default:
				    console.log("default");
			}
			return false;
		}
	});
<?php endif ?>

	function querySend(target, columns) {

		$.post( "query.php", 
			{pid:target}, 

			function(data) {
				if (!w2ui.grid)	CreateGrid();

				w2ui.grid.columns = columns;
				w2ui.grid.records = data;
				w2ui.grid.refresh();

			}, "json")

			.fail( function(e) {
				$( "#grid" ).empty().append( "error:"+ e );
			}
		);
	}


	function CreateGrid() {

		$('#grid').w2grid({ 
			name: 'grid', 
			header: 'Titol de la consulta',
			show: {
				header: true,
				toolbar: true,
				footer: true,
				toolbarAdd: true,
				toolbarDelete: true,
				toolbarSave: true,
				toolbarEdit: true,
				lineNumbers	: true,
				selectColumn: true,
				expandColumn: true
			},		
			columns: [				
				{ field: 'nom', caption: 'Nom del producte', size: '40%' },
				{ field: 'foto', caption: 'Foto del producte', size: '40%' }
			],
			onAdd: function (event) {
				w2alert('add');
			},
			onEdit: function (event) {
				w2alert('edit');
			},
			onDelete: function (event) {
				console.log('delete');
			},
			onSave: function (event) {
				w2alert('save');
			}
		});
	}

	</script>
	
</html>