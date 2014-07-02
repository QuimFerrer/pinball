// Sidebar per l'Usuari
$('#sidebar').w2sidebar({
	name: 'sidebar',
	nodes: [ 
		{ id: '5000', text: 'Opcions', expanded: true, group: true,
		  nodes: [ 
				{ id: '5020', text: 'Perfil', img: 'icon-page'},
				{ id: '5040', text: 'Els Meus Torneigs', img: 'icon-folder',
					nodes: [{ id: '5041', text: 'Consulta', img: 'icon-page' },

				   			{ id: '5042', text: 'Ranking', img: 'icon-folder', 
				   				nodes: [{ id: '5050', text: 'Actual', img: 'icon-page' },
				   						{ id: '5051', text: 'Històric', img: 'icon-page' }]},
						   			
				   			{ id: '5043', text: 'Baixa', img: 'icon-page' } ]},

				{ id: '5060', text: 'Tots els Torneigs', img: 'icon-folder',
					nodes: [{ id: '5061', text: 'Consulta', img: 'icon-page' },

				   			{ id: '5062', text: 'Ranking', img: 'icon-folder',
				   				nodes: [{ id: '5070', text: 'Actual', img: 'icon-page' },
				   						{ id: '5071', text: 'Històric', img: 'icon-page' }]},
					   						
				   			{ id: '5063', text: 'Inscripció', img: 'icon-edit' } ]}
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
		case '5041':
			columns = [
				{ field: 'idTorn',  caption: 'Torneig', size: '25%' },
				{ field: 'nomTorn', caption: 'Nom',     size: '25%' },
				{ field: 'idJoc',   caption: 'Joc',     size: '25%' },
				{ field: 'nomJoc',  caption: 'Nom joc', size: '25%' }
			];
	    	DataGrid("Torneigs als que estic inscrit", false, true, columns, e.target);
		    break;				
		case '5050':
			columns = [				
				{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
				{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
				{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
				{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
				{ field: 'ranking', caption: 'Posició', size: '12%',attr: 'align=center' },
				{ field: 'punts',   caption: 'Punts',   size: '12%',attr: 'align=right' },
				{ field: 'totalRanking',   caption: 'Posicions Ranking',   size: '12%',attr: 'align=center' }						
			];
		   	DataGrid("Ranking dels meus torneigs", false, true, columns, e.target);
		    break;
		case '5051':
			columns = [				
				{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
				{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
				{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
				{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
				{ field: 'ranking', caption: 'Posició', size: '12%',attr: 'align=center' },
				{ field: 'punts',   caption: 'Punts',   size: '12%',attr: 'align=right' },
				{ field: 'totalRanking',   caption: 'Posicions Ranking',   size: '12%',attr: 'align=center' }						
			];
		   	DataGrid("Ranking històric dels meus torneigs", false, true, columns, e.target);				
		    break;
		case '5043':				
		    break;				
		case '5061':
			columns = [
				{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
				{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
				{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
				{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
				{ field: 'premiTorn',   caption: 'Premi (€)',  size: '12%',attr: 'align=center' },
				{ field: 'datIniTorn',  caption: 'Data Inici', size: '12%' },
				{ field: 'datFinTorn',  caption: 'Data Final', size: '12%' }
			];
		   	DataGrid("Torneigs actius per inscripcions", false, true, columns, e.target);
		    break;				
		case '5070':
			columns = [				
				{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
				{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
				{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
				{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
				{ field: 'loginJug',caption: 'Jugador', size: '12%' },						
				{ field: 'ranking', caption: 'Posició', size: '12%',attr: 'align=center' },
				{ field: 'punts',   caption: 'Punts',   size: '12%',attr: 'align=right' },
				{ field: 'totalRanking',   caption: 'Posicions Ranking',   size: '12%',attr: 'align=center' }						
			];
		    DataGrid("Ranking actual dels torneigs", false, true, columns, e.target);
			break;				
		case '5071':
			columns = [				
				{ field: 'idTorn',  caption: 'Torneig', size: '12%' },
				{ field: 'nomTorn', caption: 'Nom',     size: '12%' },
				{ field: 'idJoc',   caption: 'Joc',     size: '12%' },
				{ field: 'nomJoc',  caption: 'Nom joc', size: '12%' },
				{ field: 'loginJug',caption: 'Jugador', size: '12%' },						
				{ field: 'ranking', caption: 'Posició', size: '12%',attr: 'align=center' },
				{ field: 'punts',   caption: 'Punts',   size: '12%',attr: 'align=right' },
				{ field: 'totalRanking',   caption: 'Posicions Ranking',   size: '12%',attr: 'align=center' }
			];
	    	DataGrid("Ranking històric dels torneigs", false, true, columns, e.target);				
		    break;				
		case '5063':
		    break;

		case '2020':
			columns = [				
				{ field: 'nom', caption: 'usuari', size: '20%' },
				{ field: 'foto', caption: 'foto', size: '20%' }
			];
		    DataGrid("Perfil d'usuari", false, true, columns, e.target);
		    DataForm();
		    break;

		case '2021':
			columns = [				
				{ field: 'idTorn', caption: 'Torneig', size: '33%' },
				{ field: 'nomTorn', caption: 'Nom', size: '33%' },
				{ field: 'idJoc', caption: 'Joc', size: '33%' }
			];
	    	DataGrid("Torneigs als que estic inscrit", false, true, columns, e.target);
		    break;

		default:
		    console.log("default");
	}
	return false;
};
