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
				
			<div id="grid" style="width: 100%; height: 500px;"></div>
		</section>
		<footer>
			<?php footer(); ?>
		</footer>
	</div>
</body>
	<script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script>
	<script type="text/javascript" src="../js/pinball.js"></script>
	<script>
// Toolbar per l'Administrador
<?php if ($_GET['id'] == 'adm') :?>

	$('#toolbar').w2toolbar({
		name: 'toolbar',
		items: [
			{ type: 'button',  id: '1020', caption: 'Torneigs',  img: 'icon-edit', hint: 'Accés a torneigs' },
			{ type: 'button',  id: '1040', caption: 'Màquines',  img: 'icon-folder', hint: 'Accés a màquines' },
			{ type: 'button',  id: '1060', caption: 'Partides',  img: 'icon-page', hint: 'Accés a partides' },
			{ type: 'button',  id: '1080', caption: 'Jugadors',  img: 'icon-folder', hint: 'Accés a jugadors' },
			{ type: 'button',  id: '1100', caption: 'Consultes', img: 'icon-page', hint: 'Mòdul de consultes' }
		],
		onClick: function(e){ modelVista(e) }
	});

	var modelVista = function(e) {
		e.preventDefault();

		switch(e.target) {
			case '1020':
				columns = [				
					{ field: 'nom', caption: 'Nom del producte', size: '40%' },
					{ field: 'foto', caption: 'Foto del producte', size: '40%' }
				];
			    showGrid("Torneigs", e.target, columns, true);
			    break;

			case '1040':
				columns = [				
					{ field: '01_pk_idMaq', caption: 'ID Maquina', size: '10%' },
					{ field: '03_propMaq', caption: 'Nom del propietari', size: '50%' },
					{ field: '06_datAltaMaq', caption: 'Data alta', size: '40%' }
				];
			    showGrid("Maquines", e.target, columns, false);
			    break;

			default:
			    console.log("default");
		}
		return false;
	};
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
				    showGrid("Perfil d'usuari", e.target, columns);
				    break;
				default:
				    console.log("default");
			}
			return false;
		}
	});
<?php endif ?>

	function showGrid(title, target, columns, toolbar) {
		
		if (!w2ui.grid)	createGrid(title, toolbar);
		w2utils.lock("#grid", 'Connectant ...', true);

		$.post( "query.php", 
			{pid:target}, 

			function(data) {
				console.log(data);
				w2ui.grid.columns = columns;
				w2ui.grid.records = data;
				w2utils.unlock("#grid");
				w2ui.grid.refresh();
			}, "json"
		)
		.fail( function(e) {
			console.log(e);
			$( "#grid" ).empty().append( "error:"+ e.status );
		});
	}


	function createGrid(title, toolbar) {

		show = {
		    header         : true,  	// indicates if header is visible
		    toolbar        : toolbar,  	// indicates if toolbar is visible
		    footer         : true,  	// indicates if footer is visible
		    columnHeaders  : true,   	// indicates if columns is visible
		    lineNumbers    : false,  	// indicates if line numbers column is visible
		    expandColumn   : false,  	// indicates if expand column is visible
		    selectColumn   : true,  	// indicates if select column is visible
		    emptyRecords   : false,  	// indicates if empty records are visible
		    toolbarReload  : false,   	// indicates if toolbar reload button is visible
		    toolbarColumns : true,   	// indicates if toolbar columns button is visible
		    toolbarSearch  : false,   	// indicates if toolbar search controls are visible
		    toolbarAdd     : toolbar,   	// indicates if toolbar add new button is visible
		    toolbarEdit	   : toolbar,   	// indicates if toolbar delete button is visible
		    toolbarDelete  : toolbar,   	// indicates if toolbar delete button is visible
		    toolbarSave    : toolbar,   	// indicates if toolbar save button is visible
			selectionBorder: true,	 	// display border arround selection (for selectType = 'cell')
			recordTitles   : false	 	// indicates if to define titles for records
		}

		$('#grid').w2grid({ 
			name: 'grid', 
			header: title,
			show: show,		
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