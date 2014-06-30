// Sidebar per l'Usuari
$('#sidebar').w2sidebar({
	name: 'sidebar',
	nodes: [ 
		{ id: '2000', text: 'Opcions', expanded: true, group: true,
		  nodes: [ 
				{ id: '2020', text: 'Perfil', img: 'icon-edit' },
				{ id: '2040', text: 'Baixa', img: 'icon-folder' },
				{ id: '2060', text: 'Consultes', img: 'icon-folder',
					nodes: [
				   { id: '2061', text: 'Torneigs', img: 'icon-page' },
				   { id: '1102', text: 'Consulta 2', img: 'icon-page' },
				   { id: '1103', text: 'Consulta 3', img: 'icon-page' }
				]}
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
		case '2020':
			columns = [				
				{ field: 'nom', caption: 'usuari', size: '20%' },
				{ field: 'foto', caption: 'foto', size: '20%' }
			];
		    // DataGrid("Perfil d'usuari", false, false, columns, e.target);
		    DataForm();
		    break;

		case '2061':
			columns = [				
				{ field: 'idTorn', caption: 'Torneig', size: '33%' },
				{ field: 'nomTorn', caption: 'Nom', size: '33%' },
				{ field: 'idJoc', caption: 'Joc', size: '33%' }
			];
	    	DataGrid("Torneigs als que estic inscrit", false, columns, e.target);
		    break;

		default:
		    console.log("default");
	}
	return false;
};
