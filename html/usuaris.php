<?php

include ("../src/pinball.h");
include ("../src/seguretat.php"); 

comprovaSessio();
	
function mostraUsuariLogat()
{
	if (isset($_SESSION["login"]))
		{
	  	if ($_SESSION["login"] == 'admin')
  			echo '<h2>Aministrador</h2>';
		else
			echo '<h2>Usuari</h2>';
		}
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
				<!-- <div id="toolbar"></div> -->
				<div id="sidebar"></div>
				<div id="grid"></div>
			</article>
				
			
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

<?php 

if (isset($_SESSION["login"])) :

	if ($_SESSION["login"] == 'admin') :?>
		// Sidebar per l'administrador
		$('#sidebar').w2sidebar({
			name: 'sidebar',
			nodes: [ 
				{ id: '2000', text: 'Opcions', expanded: true, group: true,
				  nodes: [ 
							{ id: '1020', text: 'Productes', img: 'icon-edit' },
							{ id: '1040', text: 'Màquines', img: 'icon-folder' },
							{ id: '1060', text: 'Torneigs', img: 'icon-page' },
							{ id: '1080', text: 'Usuaris', img: 'icon-edit' },
							{ id: '1100', text: 'Consultes', img: 'icon-folder',
					  			nodes: [
								   { id: '1101', text: 'Consulta 1', img: 'icon-page' },
								   { id: '1102', text: 'Consulta 2', img: 'icon-page' },
								   { id: '1103', text: 'Consulta 3', img: 'icon-page' }
					  		]},
					  		{ id: '1120', text: 'Generar Partides',	img:'icon-edit'}
						 ]
				}
			],
			onClick: function(e){ controller(e) }
		});

		var controller = function(e) {
			e.preventDefault();
			var columns;
			var fields;

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
						{ field: '_01_pk_idMaq', caption: 'ID Maquina', size: '10%' },
						{ field: '_03_propMaq', caption: 'Nom del propietari', size: '50%' },
						{ field: '_06_datAltaMaq', caption: 'Data alta', size: '40%' }
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
			
				case '1120':
					columns = [				
						{ field: '_02_nomUsuari', caption: 'Usuari', size: '10%' },
						{ field: '_02_macMaq', caption: 'MAC Maquina', size: '30%' },
						{ field: '_02_nomJoc', caption: 'Joc', size: '30%' },
						{ field: '_04_pk_idDatHorPart', caption: 'Data/Hora', size: '30%' },
						{ field: '_01_pk_idTorn', caption: 'Torneig', size: '15%' },
						{ field: '_04_credMaq', caption: 'Credits', size: '15%' },
						{ field: '_05_pk_idRonda', caption: 'Ronda Nº', size: '15%' },
						{ field: '_07_puntsRonda', caption: 'Puntuacio Ronda', size: '15%' }
					];
				    DataGrid("Manteniment de partides", "partides", columns, e.target);
				    break;

				    
				default:
				    console.log("default");
			}
			return false;
		};
	
	<?php else : ?>
		// Sidebar per l'Usuari
		$('#sidebar').w2sidebar({
			name: 'sidebar',
			nodes: [ 
				{ id: '2000', text: 'Opcions', expanded: true, group: true,
				  nodes: [ 
						{ id: '2020', text: 'Perfil', img: 'icon-folder',
							nodes: [{ id: '2021', text: 'Consulta', img: 'icon-page' },
						   			{ id: '2022', text: 'Modificació', img: 'icon-edit' },
						  			{ id: '2023', text: 'Baixa', img: 'icon-page' } ]},

						{ id: '2040', text: 'Els Meus Torneigs', img: 'icon-folder',
							nodes: [{ id: '2041', text: 'Consulta', img: 'icon-page' },

						   			{ id: '2042', text: 'Ranking', img: 'icon-folder', 
						   				nodes: [{ id: '2050', text: 'Actual', img: 'icon-page' },
						   						{ id: '2051', text: 'Històric', img: 'icon-page' }]},
						   			
						   			{ id: '2043', text: 'Baixa', img: 'icon-page' } ]},

						{ id: '2060', text: 'Tots els Torneigs', img: 'icon-folder',
							nodes: [{ id: '2061', text: 'Consulta', img: 'icon-page' },

						   			{ id: '2062', text: 'Ranking', img: 'icon-folder',
						   				nodes: [{ id: '2070', text: 'Actual', img: 'icon-page' },
						   						{ id: '2071', text: 'Històric', img: 'icon-page' }]},
						   						
						   			{ id: '2063', text: 'Inscripció', img: 'icon-edit' } ]}
					]
				}
			],
			onClick: function(e){ controller(e) }
		});

		var controller = function(e) {
			e.preventDefault();
			var columns;
			var fields;

			switch(e.target) {
				case '2041':
					columns = [
						{ field: 'idTorn',  caption: 'Torneig', size: '25%' },
						{ field: 'nomTorn', caption: 'Nom',     size: '25%' },
						{ field: 'idJoc',   caption: 'Joc',     size: '25%' },
						{ field: 'nomJoc',  caption: 'Nom joc', size: '25%' }
					];
			    	DataGrid("Torneigs als que estic inscrit", false, columns, e.target);
				    break;				
				case '2050':
					columns = [				
						{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
						{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
						{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
						{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
						{ field: 'ranking', caption: 'Posició', size: '12%' },
						{ field: 'punts',   caption: 'Punts',   size: '12%' },
						{ field: 'totalRanking',   caption: 'Num. Posicions',   size: '12%' }						
					];
			    	DataGrid("Ranking dels meus torneigs", false, columns, e.target);
				    break;
				case '2051':
					columns = [				
						{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
						{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
						{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
						{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
						{ field: 'ranking', caption: 'Posició', size: '12%' },
						{ field: 'punts',   caption: 'Punts',   size: '12%' },
						{ field: 'totalRanking',   caption: 'Num. Posicions',   size: '12%' }						
					];
			    	DataGrid("Ranking històric dels meus torneigs", false, columns, e.target);				
				    break;
				case '2043':
				    break;				
				case '2061':
					columns = [
						{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
						{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
						{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
						{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
						{ field: 'premiTorn',   caption: 'Premi (€)',  size: '12%' },
						{ field: 'datIniTorn',  caption: 'Data Inici', size: '12%' },
						{ field: 'datFinTorn',  caption: 'Data Final', size: '12%' }
					];
			    	DataGrid("Torneigs actius per inscripcions", false, columns, e.target);
				    break;				
				case '2070':
					columns = [				
						{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
						{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
						{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
						{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
						{ field: 'loginJug',caption: 'Jugador', size: '12%' },						
						{ field: 'ranking', caption: 'Posició', size: '12%' },
						{ field: 'punts',   caption: 'Punts',   size: '12%' },
						{ field: 'totalRanking',   caption: 'Num. Posicions',   size: '12%' }						
					];
			    	DataGrid("Ranking actual dels torneigs", false, columns, e.target);
				    break;				
				case '2071':
					columns = [				
						{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
						{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
						{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
						{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
						{ field: 'loginJug',caption: 'Jugador', size: '12%' },						
						{ field: 'ranking', caption: 'Posició', size: '12%' },
						{ field: 'punts',   caption: 'Punts',   size: '12%' },
						{ field: 'totalRanking',   caption: 'Num. Posicions',   size: '12%' }						
					];
			    	DataGrid("Ranking històric dels torneigs", false, columns, e.target);				
				    break;				
				case '2063':
				    break;

				case '2090':
					columns = [				
						{ field: 'nom', caption: 'usuari', size: '20%' },
						{ field: 'foto', caption: 'partida', size: '20%' }
					];
				    DataGrid("Perfil d'usuari", e.target, columns);
				    break;
				case '2091':
					columns = [				
						{ field: 'idTorn',  caption: 'Torneig', size: '33%' },
						{ field: 'nomTorn', caption: 'Nom',     size: '33%' },
						{ field: 'idJoc',   caption: 'Joc',     size: '33%' }
					];
			    	DataGrid("Torneigs als que estic inscrit", false, columns, e.target);				

				default:
				    console.log("default");
			}
			return false;
		};

	<?php endif; ?>
<?php endif; ?>
	</script>
</html>