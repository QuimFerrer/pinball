// Sidebar per l'Usuari
w2ui.layout.content('left',
	$('#sidebar').w2sidebar({
		name: 'sidebar',
		nodes: [ 
			{ id: '5000', text: 'Opcions', expanded: true, group: true,
			  nodes: [ 
					{ id: '5020', text: 'Perfil', img: 'icon-page'},
					{ id: '5040', text: 'Els Meus Torneigs', img: 'icon-folder',
						nodes: [
							{ id: '5041', text: 'Consulta', img: 'icon-page' },
				   			{ id: '5042', text: 'Ranking', img: 'icon-folder', 
				   				nodes: [
				   						{ id: '5050', text: 'Actual', img: 'icon-page' },
				   						{ id: '5051', text: 'Històric', img: 'icon-page' }
				   				]
				   			},
			   			]
			   		},
					{ id: '5060', text: 'Tots els Torneigs', img: 'icon-folder',
						nodes: [
							{ id: '5061', text: 'Consulta - Inscripcions', img: 'icon-page' },
					   		{ id: '5062', text: 'Ranking', img: 'icon-folder',
					   			nodes: [
					   				{ id: '5070', text: 'Actual', img: 'icon-page' },
					   				{ id: '5071', text: 'Històric', img: 'icon-page' }
					   			]
					   		}
					   	]
					}
				]
			}
		],
		onClick: function(e){ controller(e) }
	})
);

var controller = function(e) {
	e.preventDefault();
	var columns;
	var fields;

	switch(e.target) {

		case '5020':
		    DataView('../html/perfil.php');
		    break;
		    
		case '5041':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'desactivar',  img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'activar',     img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "5043", idTorn: row[0]};
						     	msgAction("Anul.lar l'inscripció a un Torneig", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "5044", idTorn: row[0]};					        
						     	msgAction("Recuperar l'inscripció d'un Torneig", 'Estàs segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};		
			columns = [
				{ field: 'idTorn',       caption: 'Torneig',     size: '25%' },
				{ field: 'nomTorn',      caption: 'Nom',         size: '25%' },
				{ field: 'idJoc',        caption: 'Joc',         size: '25%' },
				{ field: 'nomJoc',       caption: 'Nom joc',     size: '25%' },
				{ field: 'datAltaInsc',  caption: 'Data Alta',  size: '16%' },
				{ field: 'datModInsc',   caption: 'Data Modif.',  size: '16%' },
				{ field: 'datBaixaInsc', caption: 'Data Baixa',  size: '16%' }				
			];
	    	DataGrid("Torneigs als que estic inscrit", false, toolbar, columns, e.target);
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

		case '5061':
			columns = [
				{ field: 'idTorn',           caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',          caption: 'Torneig',     size: '15%' },
				{ field: 'premiTorn',        caption: 'Premi (€)',   size: '9%',attr: 'align=center' },
				{ field: 'idJoc',            caption: 'Joc',         size: '6%' },
				{ field: 'nomJoc',           caption: 'Nom Joc',     size: '15%' },
				{ field: 'datIniTorn',       caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',       caption: 'Final Torn.', size: '9%' },
				{ field: 'datAltaTorn',      caption: 'Data Alta',   size: '16%' },
			];

            toolbar = { 
	            items: [
	                { type: 'button', id: 'edit',    caption: 'Inscripció',    	 img: 'icon-add' },
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
			        var row = w2ui['grid'].get(row);
				    if (row.length != 0)
				    	{
				    	console.log(row);
				    	switch(target)
				    		{
				    		case 'edit':
					        	var params ={pid: "5063", idTorn: row['idTorn'], idJoc: row['idJoc']};
						     	msgAction("Inscripció a un Torneig", 'Estàs segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};
		   	DataGrid("Torneigs actius per inscripcions", false, toolbar, columns, e.target);
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

		default:
		    console.log("default");
	}
	return false;
};
