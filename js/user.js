// Sidebar per l'Usuari
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
						{ id: '5061', text: 'Consulta', img: 'icon-page' },
				   		{ id: '5062', text: 'Ranking', img: 'icon-folder',
				   			nodes: [
				   				{ id: '5070', text: 'Actual', img: 'icon-page' },
				   				{ id: '5071', text: 'Històric', img: 'icon-page' }
				   			]
				   		},
				   		{ id: '5063', text: 'Inscripció', img: 'icon-edit' } 
				   	]
				}
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
        //     toolbar = { 
        //         items: [
	       //          { type: 'button', id: 'del',  caption: 'baixa', img: 'icon-delete' }
	       //      ],
        //         onClick: function(target, data) {
			     //    var row = w2ui['grid'].getSelection();

			     //    if (row.length != 0) {
			     //        w2confirm('Estas segur ?', "Donar-te de baixa del torneig", 
			     //        function (msg) { 

			     //            if (msg=='Yes') {
								// w2ui['grid'].lock('Actualitzant dades ...', true);

								// $.ajax({url: "query.php", data: {pid: "5043", idTorn: row[0]}})
								// .done(function(e) {
								// 	// console.log(e);
				    //                 w2ui['grid'].reload();
								// })
								// .fail(function(error) { 
								// 	// console.log(error);	
								// })
								// .always(function() { 
								// 	w2ui['grid'].unlock();
								// });
			     //            }
			     //        })
			     //    }  
        //         }
        //     };            
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
			columns = [
				{ field: '_01_pk_idTornInsc',caption: 'idTorn',      size: '6%' },
				{ field: '_03_nomTorn',      caption: 'Torneig',     size: '15%' },
				{ field: '_04_premiTorn',    caption: 'Premi (€)',   size: '9%',attr: 'align=center' },
				{ field: '_02_pk_idJocInsc', caption: 'Joc',         size: '6%' },
				{ field: '_02_nomJoc',       caption: 'Nom Joc',     size: '15%' },
				{ field: 'datIniTorn',       caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',       caption: 'Final Torn.', size: '9%' },
				{ field: 'datAltaTorn',      caption: 'Data Alta',   size: '16%' },
				{ field: 'datModTorn',       caption: 'Data Modif.', size: '16%' }				
			];

			fields = [
				{ name: '_01_pk_idTornInsc', type: 'text', required: true },
				{ name: '_02_pk_idJocInsc', type: 'text', required: true },
			];


            toolbar = { 
	            items: [
	                { type: 'button', id: 'new',    caption: 'Afegir',    	 img: 'icon-add' },
	                { type: 'button', id: 'lock',   caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock', caption: 'desbloquejar', img: 'icon-edit' }
	            ],
	            onClick: function(target, data) {
			        var action = "../html/ubicamaq.php";
			        var row    = w2ui['grid'].getSelection();

			    	switch(target) {
			    		case 'new':
			        		DataForm("Afegir màquina a una ubicació", 0, fields, action, 
			        				{param:'inscrit', keyname:'_00_pk_idInsc_auto'});	
				        	break;

			    		case 'lock':
				        	var params ={pid: "3900", idUTM: row[0]};
				        	if (row.length != 0)
					     	msgAction("Desactivar una màquina d'una ubicació", 'Estàs segur ?', "query.php", params);
				        	break;
				        case 'unlock':
				        	var params ={pid: "3905", idUTM: row[0]};					        
				        	if (row.length != 0)
					     	msgAction("Activar una màquina d'una ubicació", 'Estàs segur ?', "query.php", params);
				        	break;

				        default:
				        	console.log(target, " No definit");
				        	break;
				    }
			    }
  			};	
		    DataGrid("Inscripció a un Torneig", "inscrit", toolbar, columns, fields, 5063, "_00_pk_idInsc_auto");
		    break;

		default:
		    console.log("default");
	}
	return false;
};
