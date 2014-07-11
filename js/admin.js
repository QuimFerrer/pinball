// Sidebar per l'administrador
// Exemple per incorporar un fitxer extern
//{ id: '0000', text: 'Test', img: 'icon-edit' },
w2ui.layout.content('left',
	$('#sidebar').w2sidebar({
		name: 'sidebar',
		nodes: [ 
			{ id: '2000', text: 'Opcions', expanded: true, group: true,
			  nodes: [  { id: '3000', text: 'Perfil', img: 'icon-edit' },
						{ id: '3100', text: 'Partides', img: 'icon-folder',
						nodes: [{ id: '3180', text: 'Generador partides', img:'icon-add'},
								{ id: '3110', text: 'per màquina',  img: 'icon-page' },
								{ id: '3120', text: 'per jugador',  img: 'icon-page' },
								{ id: '3160', text: 'Manteniment Rondes',  img: 'icon-edit' },
								{ id: '3170', text: 'Històric de Rondes',  img: 'icon-page' }]},
						{ id: '3200', text: 'Jocs', img: 'icon-folder',
						nodes: [{ id: '3230', text: 'Manteniment',  img: 'icon-edit' },
								{ id: '3240', text: 'Històric', img: 'icon-page' },
								{ id: '3245', text: 'Màquines', img: 'icon-folder',									
								nodes: [{ id: '3250', text: 'Actual',  img: 'icon-page' },
										{ id: '3260', text: 'Històric',  img: 'icon-page' }]}]},
						{ id: '3300', text: 'Torneigs', img: 'icon-folder',
						nodes: [{ id: '3340', text: 'Manteniment',  img: 'icon-edit' },
								{ id: '3342', text: 'Històric',  img: 'icon-page' },
								{ id: '3345', text: 'Llistats',  img: 'icon-folder',
								nodes: [{ id: '3348', text: 'Jugadors',  img: 'icon-folder',
										nodes: [{ id: '3350', text: 'Actual',  img: 'icon-page' },
												{ id: '3360', text: 'Històric',  img: 'icon-page' }]},
										{ id: '3370', text: 'Màquines',  img: 'icon-folder',
										nodes: [{ id: '3375', text: 'Relació máquines',  img: 'icon-page' },
												{ id: '3380', text: 'Amb partides. Actual',  img: 'icon-page' },
												{ id: '3390', text: 'Amb partides. Històric',  img: 'icon-page' } ]}]}]},
						{ id: '3400', text: 'Màquines', img: 'icon-folder',
						nodes: [{ id: '3420', text: 'Manteniment',  img: 'icon-edit' },
								{ id: '3425', text: 'Històric',  img: 'icon-page' },
								{ id: '3440', text: 'Jocs',  img: 'icon-page' },
								{ id: '3450', text: 'Històric de jocs',  img: 'icon-page' },
								{ id: '3456', text: 'Disponibles',  img: 'icon-page' },							
								{ id: '3459', text: 'Assignar Jocs',  img: 'icon-folder',
								nodes: [{ id: '3485', text: 'Manteniment',  img: 'icon-edit' },									
										{ id: '3490', text: 'Històric',  img: 'icon-page' }]},
								{ id: '3500', text: 'Recaudacions',  img: 'icon-folder',
								nodes: [{ id: '3510', text: 'Maquina i Ranking',  img: 'icon-page' },
										{ id: '3520', text: 'Joc i Ranking',  img: 'icon-page' },
										{ id: '3530', text: 'Joc i Màquina',  img: 'icon-page' },
										{ id: '3540', text: 'Propietari',  img: 'icon-page' },
										{ id: '3550', text: 'Propietari i Màquina',  img: 'icon-page' },
										{ id: '3560', text: 'Propietari i Joc',  img: 'icon-page' },
										{ id: '3570', text: 'Provincia i Població',  img: 'icon-page' },
										{ id: '3580', text: 'Població',  img: 'icon-page' },
										{ id: '3590', text: 'Provincia,Població i Màquina',  img: 'icon-page' },
										{ id: '3600', text: 'Joc',  img: 'icon-page' },
										{ id: '3610', text: 'Joc, Màq i Població',  img: 'icon-page' },											
										{ id: '3620', text: 'Joc, Màq, Provincia i Població',  img: 'icon-page' }] }] },
						{ id: '3700', text: 'Estadístiques',  img: 'icon-folder',
						nodes: [{ id: '3701', text: 'Jocs',  img: 'icon-folder',
								nodes: [{ id: '3711', text: '1',  img: 'icon-page' },
										{ id: '3712', text: '2',  img: 'icon-page' },
										{ id: '3713', text: '3',  img: 'icon-page' }]},
								{ id: '3720', text: 'Màquines',  img: 'icon-folder',
								nodes: [{ id: '3721', text: '1',  img: 'icon-page' },
										{ id: '3722', text: '2',  img: 'icon-page' },
										{ id: '3723', text: '3',  img: 'icon-page' }]},
								{ id: '3730', text: 'Ubicacions',  img: 'icon-folder',
								nodes: [{ id: '3731', text: '1',  img: 'icon-page' },
										{ id: '3732', text: '2',  img: 'icon-page' },
										{ id: '3733', text: '3',  img: 'icon-page' }]} ]},
						{ id: '3800', text: 'Ubicacions', img: 'icon-folder',
						nodes: [{ id: '3830', text: 'Manteniment',  img: 'icon-edit' },
								{ id: '3840', text: 'Històric',  img: 'icon-page' },							
								{ id: '3845', text: 'Llistats',  img: 'icon-folder',
								nodes: [{ id: '3850', text: 'Provincia, Població i CP',  img: 'icon-page' },
										{ id: '3860', text: 'Coordenades',  img: 'icon-page' },
										{ id: '3870', text: 'Empresa, Provincia i Població',  img: 'icon-page' }]},
								{ id: '3875', text: 'Assignar màquines',  img: 'icon-folder',
								nodes: [{ id: '3890', text: 'Manteniment',  img: 'icon-edit' },
										{ id: '3920', text: 'Llistats',  img: 'icon-folder',
										nodes: [{ id: '3930', text: 'Provincia i Població',  img: 'icon-page' },
												{ id: '3940', text: 'Coordenades',  img: 'icon-page' },
												{ id: '3950', text: 'Empreses',  img: 'icon-page' }]}]}]},
						{ id: '4000', text: 'Jugadors', img: 'icon-folder',
						nodes: [{ id: '4010', text: 'Perfils',  img: 'icon-page' },
								{ id: '4040', text: 'Torneigs registrats', img: 'icon-page' }]},
						{ id: '1015', text: 'Productes', img: 'icon-folder',
						nodes: [{ id: '1020', text: 'Manteniment',  img: 'icon-edit' },
								{ id: '1021', text: 'Històric',     img: 'icon-page' }]},
						]
					}
				],
				onClick: function(e){ controller(e) }
	})
);
/*
 * Paràmetres DataGrid(title, table, toolbar, columns, fieldsOrId, pkName)
 */
var controller = function(e) {
	e.preventDefault();
	var columns;
	var fields;

	switch(e.target) {
		case '0000':
			// DataView('../html/test.php');
			DataView('../html/external.php');
			break;

// Productes
		case '1020':
			columns = [              
				{ field: 'recid',       caption: 'Id.',              size: '5%',   sortable: true,   resizable: true  },
				{ field: 'nom',         caption: 'Nom del Producte', size: '30%',  sortable: true,   resizable: true  },
				{ field: 'descripcio',  caption: 'Descripció',       size: '35%',  sortable: true,   resizable: true  },
				{ field: 'preu',        caption: 'Preu',             size: '10%',  sortable: true,   resizable: true  },
				{ field: 'foto',        caption: 'Foto',             size: '20%',  sortable: false,  resizable: false },
				{ field: 'datAltaPro',  caption: 'Data Alta',        size: '16%'},
				{ field: 'datModPro',   caption: 'Data Modif.',      size: '16%'},				
			];
			fields = [
		        { name: 'nom', type: 'text', required: true,
		          html: { caption: 'Nom', attr: 'size="40"', span: 5 }
		        },
		        { name: 'descripcio', type: 'textarea', required: false,
		          html: { caption: 'Descripció', attr: 'size="40"', span: 5 }
		        },
		        { name: 'preu', type: 'text', required: false,
		          html: { caption: 'Preu', attr: 'size="40"', span: 5 }
		        },
		        { name: 'foto', type: 'text', required: false,
		          html: { caption: 'Foto', attr: 'size="40"', span: 5 }
		        }
		    ];
		    DataGrid("Manteniment de productes", "productes", false, columns, fields, 1020, "id");
		    break;
		case '1021':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "1035", idProd: row[0]};
						     	msgAction("Bloquejar un producte", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "1040", idProd: row[0]};					        
						     	msgAction("Desbloquejar un producte", 'Estàs segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};
			columns = [              
				{ field: 'recid',       caption: 'Id.',              size: '5%',   sortable: true,   resizable: true  },
				{ field: 'nom',         caption: 'Nom del Producte', size: '30%',  sortable: true,   resizable: true  },
				{ field: 'descripcio',  caption: 'Descripció',       size: '35%',  sortable: true,   resizable: true  },
				{ field: 'preu',        caption: 'Preu',             size: '10%',  sortable: true,   resizable: true  },
				{ field: 'foto',        caption: 'Foto',             size: '20%',  sortable: false,  resizable: false },
				{ field: 'datAltaPro',  caption: 'Data Alta',        size: '16%'},
				{ field: 'datModPro',   caption: 'Data Modif.',      size: '16%'},				
				{ field: 'datBaixaPro', caption: 'Data Baixa',       size: '16%'}				
			];
			DataGrid("Històric de Productes recreatius", false, toolbar, columns, e.target);				
			break;
// Torneigs
		case '1060':
            toolbar = { 
                items: [
	                { type: 'button', id: 'opcio_1',  caption: 'un',    img: 'icon-add' },
	                { type: 'button', id: 'opcio_2',  caption: 'dos', img: 'icon-edit' },
	                { type: 'button', id: 'opcio_3',  caption: 'tres',  img: 'icon-delete' }
	            ],
                onClick: function(target, data) {
                    switch(target) {
                        case 'opcio_1' : console.log(grid.getSelection()[0]); break;
                        case 'opcio_2' : grid.reload(); break;
                        case 'opcio_3' : console.log(target,data); break;
                    } 
                }
            };
			columns = [				
				{ field: "_01_pk_idTorn", caption: 'ID Torneig', size: '10%' },
				{ field: "_02_pk_idJocTorn", caption: 'ID Joc', size: '10%' },
				{ field: "_03_nomTorn", caption: 'Nom del torneig', size: '50%', editable: { type: 'text' } },
				{ field: "_04_premiTorn", caption: 'Premi', size: '10%' },
				{ field: "_05_datIniTorn", caption: 'Inici', size: '10%' },
				{ field: "_06_datFinTorn", caption: 'Final', size: '10%' }
			];
			fields = [
		        { name: "_03_nomTorn", type: 'text', required: true,
		          html: { caption: 'Nom', attr: 'size="40"', span: 5 }
		        },
		        { name: "_02_pk_idJocTorn", type: 'list', 
		          html: { caption: 'Joc', attr: 'readonly', span: 5 },
				  options: {
				  	url: '../src/dbui.php?cmd=ld&param=joc',   
				  	showNone: false     // shows first element - none - with empty value
				  }
		        },
		        { name: "_04_premiTorn", type: 'float', required: false,
		          html: { caption: 'Premi', attr: 'size="40"', span: 5 }
		        },
		        { name: "_05_datIniTorn", type: 'date', required: false,
		          html: { caption: 'Data inici', attr: 'size="40"', span: 5 }
		        },
		        { name: "_06_datFinTorn", type: 'date', required: false,
		          html: { caption: 'Data final', attr: 'size="40"', span: 5 }
		        }
		    ];
		    DataGrid("Llistat de torneigs", "torneig", false, columns, fields, "_01_pk_idTorn");
		    break;
// Usuaris
		case '1080':
			columns = [				
				{ field: '_01_pk_idUsuari', caption: 'ID Usuari', size: '10%' },
				{ field: '_02_nomUsuari', caption: 'Nom', size: '30%' },
				{ field: '_03_cognomUsuari', caption: 'Cognom', size: '30%' },
				{ field: '_04_loginUsuari', caption: 'Login', size: '15%' },
				{ field: '_05_pwdUsuari', caption: 'Password', size: '15%' }
			];
			fields = [
		        { name: '_02_nomUsuari', type: 'text', required: true,
		          html: { caption: 'Nom', attr: 'size="40"', span: 5 }
		        },
		        { name: '_03_cognomUsuari', type: 'text', required: false,
		          html: { caption: 'Cognoms', attr: 'size="40"', span: 5 }
		        },
		        { name: '_04_loginUsuari', type: 'text', required: false,
		          html: { caption: 'Login', attr: 'size="40"', span: 5 }
		        },
		        { name: '_05_pwdUsuari', type: 'text', required: false,
		          html: { caption: 'Password', attr: 'size="40"', span: 5 }
		        }
		    ];
		    DataGrid("Manteniment d'usuaris", "usuari", false, columns, fields, '_01_pk_idUsuari');
		    break;

//Generar partides
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
		    DataGrid("Manteniment de partides", "partides", false, false, columns, e.target);
		    break;

///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

		case '3000':
		    DataView('../html/perfilAdm.php');		
		    break;

		case '3110':
			columns = [
				{ field: 'idMaq',          caption: 'Maq',         size: '6%' },
				{ field: 'idTorn',         caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',        caption: 'Torneig',     size: '10%' },
				{ field: 'idJoc',          caption: 'Joc',         size: '6%' },
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '12%' },
				{ field: 'datHoraPartida', caption: 'Data Hora Partida',   size: '20%' },
				{ field: 'datIniTorn',     caption: 'Inici Torn.', size: '11%' },
				{ field: 'datFinTorn',     caption: 'Final Torn.', size: '11%' },
				{ field: 'datModPart',     caption: 'Data Modif.', size: '16%'},				
				{ field: 'datBaixaPart',   caption: 'Data Baixa',  size: '16%'}
				];
			DataGrid("Partides per màquina", false, true, columns, e.target);				
			break;
		case '3120':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
			        var row = w2ui['grid'].get(row);			        
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "3130", idMaq: row['idMaq'], idJoc: row['idJoc'], idUsr: row['idUser'], idDatHorPart: row['datHoraPartida']};
						     	msgAction("Bloquejar una partida", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "3140", idMaq: row['idMaq'], idJoc: row['idJoc'], idUsr: row['idUser'], idDatHorPart: row['datHoraPartida']};
						     	msgAction("Desbloquejar una partida", 'Estàs segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};
			columns = [			   	
				{ field: 'idUser',         caption: 'Jug',         size: '4%' },
				{ field: 'loginUser',      caption: 'login',       size: '7%' },
				{ field: 'nomUser',        caption: 'Nom',         size: '8%' },
				{ field: 'idTorn',         caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',        caption: 'Torneig',     size: '10%' },
				{ field: 'idJoc',          caption: 'Joc',         size: '4%' },
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '12%' },
				{ field: 'idMaq',          caption: 'Maq',         size: '4%' },
				{ field: 'datHoraPartida', caption: 'Data Hora Partida',   size: '16%' },							
				{ field: 'datIniTorn',     caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',     caption: 'Final Torn.', size: '9%' },
				{ field: 'datModPart',     caption: 'Data Modif.', size: '16%'},				
				{ field: 'datBaixaPart',   caption: 'Data Baixa',  size: '16%'}
				];		
		  	DataGrid("Partides per jugador", false, toolbar, columns, e.target);
		    break;
			
		case '3160':
			columns = [
				{ field: 'recid',          caption: 'idRonda',     size: '6%' },
				{ field: 'idTorn',         caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',        caption: 'Torneig',     size: '10%' },
				{ field: 'premiTorn',      caption: 'Premi (€)',   size: '9%',attr: 'align=center' },
				{ field: 'idJoc',          caption: 'Joc',         size: '6%' },
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '12%' },
				{ field: 'idMaq',          caption: 'Maq',         size: '4%' },
				{ field: 'idUser',         caption: 'Jug',         size: '4%' },
				{ field: 'loginUser',      caption: 'login',       size: '7%' },
				{ field: 'nomUser',        caption: 'Nom',         size: '8%' },
				{ field: 'datHoraPartida', caption: 'Data Hora Partida',   size: '16%' },
				{ field: 'idRonda',        caption: 'Ronda No',    size: '7%' },
				{ field: '_06_fotoJugRonda',caption: 'Foto',       size: '8%' },
				{ field: '_07_puntsRonda', caption: 'Punts',       size: '8%' },
				{ field: 'datIniTorn',     caption: 'Inici Torn.', size: '11%' },
				{ field: 'datFinTorn',     caption: 'Final Torn.', size: '11%' },
				{ field: 'datModRonda',    caption: 'Data Modif.', size: '16%'}
				];
			fields = [
		        { name: '_06_fotoJugRonda', type: 'text', required: true,
		          html: { caption: 'Foto Jugador', attr: 'size="45"', span: 5 }
		        },
		        { name: '_07_puntsRonda', type: 'float', required: false,
		          html: { caption: 'Punts ronda', attr: 'size="10"', span: 5 }
		        }
		    ];
		    DataGrid("Rondes de cada partida", "ronda", false, columns, fields, 3160, "_00_pk_idRonda_auto");
			break;
		case '3170':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "3155", idRonda: row[0]};
						     	msgAction("Bloquejar una ronda", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "3157", idRonda: row[0]};					        
						     	msgAction("Desbloquejar una ronda", 'Estàs segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};		
			columns = [			   	
				{ field: 'idTorn',         caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',        caption: 'Torneig',     size: '10%' },
				{ field: 'premiTorn',      caption: 'Premi (€)',   size: '9%',attr: 'align=center' },
				{ field: 'idJoc',          caption: 'Joc',         size: '6%' },
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '12%' },
				{ field: 'idMaq',          caption: 'Maq',         size: '4%' },
				{ field: 'idUser',         caption: 'Jug',         size: '4%' },
				{ field: 'loginUser',      caption: 'login',       size: '7%' },
				{ field: 'nomUser',        caption: 'Nom',         size: '8%' },								
				{ field: 'idPart',         caption: 'idPart',      size: '7%' },				
				{ field: 'datHoraPartida', caption: 'Data Hora Partida',   size: '16%' },
				{ field: 'recid',          caption: 'Ronda',       size: '7%' },
				{ field: 'fotoJugRonda',   caption: 'Foto',        size: '8%' },				
				{ field: 'puntsRonda',     caption: 'Punts',       size: '8%' },
				{ field: 'datIniTorn',     caption: 'Inici Torn.', size: '11%' },
				{ field: 'datFinTorn',     caption: 'Final Torn.', size: '11%' },
				{ field: 'datModRonda',    caption: 'Data Modif.', size: '16%'},				
				{ field: 'datBaixaRonda',  caption: 'Data Baixa',  size: '16%'}
				];
			DataGrid("Històric de Rondes de cada partida", false, toolbar, columns, e.target);				
			break;
		case '3180': 
			DataView('../html/partides.php');
			break;			
		case '3230':
			columns = [			   	
				{ field: '_01_pk_idJoc', caption: 'Joc',           size: '5%' },
				{ field: '_02_nomJoc',   caption: 'Nom Joc',       size: '10%' },
				{ field: '_03_descJoc',  caption: 'Descripció',    size: '45%' },
				{ field: '_04_imgJoc',   caption: 'Imatge',        size: '8%' },
				{ field: '_05_numPartidesJugadesJoc',   caption: 'Partides', size: '10%' },				
				{ field: 'datAltaJoc',  caption: 'Data Alta',  size: '10%' },
				{ field: 'datModJoc',   caption: 'Data Modif.',size: '10%' }
				];

			fields = [
		        { name: '_02_nomJoc', type: 'text', required: true,
		          html: { caption: 'Nom', attr: 'size="40"', span: 5 }
		        },
		        { name: '_03_descJoc', type: 'textarea', required: false,
		          html: { caption: 'Descripció', attr: 'size="60"', span: 5 }
		        },
		        { name: '_04_imgJoc', type: 'text', required: false,
		          html: { caption: 'Imatge', attr: 'size="40"', span: 5 }
		        }
		    ];
		    DataGrid("Manteniment de jocs", "joc", false, columns, fields, 3230, "_01_pk_idJoc");
			break;
		case '3240':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "3220", idJoc: row[0]};
						     	msgAction("Bloquejar un joc", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "3222", idJoc: row[0]};					        
						     	msgAction("Desbloquejar un joc", 'Estàs segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};		
			columns = [			   	
				{ field: 'recid',       caption: 'Joc',           size: '5%' },
				{ field: 'nomJoc',      caption: 'Nom Joc',       size: '20%' },
				{ field: 'imgJoc',      caption: 'Imatge',        size: '15%' },				
				{ field: 'numPartides', caption: 'Num. partides', size: '10%' },
				{ field: 'datAltaJoc',  caption: 'Data Alta',     size: '18%' },
				{ field: 'datModJoc',   caption: 'Data Modif.',   size: '18%' },
				{ field: 'datBaixaJoc', caption: 'Data Baixa',    size: '18%' }
				];
			DataGrid("Històric de jocs", false, toolbar, columns, e.target);
			break;
		case '3250':
			columns = [			   	
				{ field: 'idJoc',       caption: 'Joc',           size: '10%' },
				{ field: 'nomJoc',      caption: 'Nom Joc',       size: '20%' },
				{ field: 'idMaq',       caption: 'Maq',           size: '10%' },
				{ field: 'macMaq',      caption: 'Mac',           size: '15%' },
				{ field: 'numPartides', caption: 'Num. partides', size: '10%' },
				{ field: 'totalCredit', caption: 'Crèdits (€)',   size: '10%',attr: 'align=right' },
				{ field: 'datAltaJoc',  caption: 'Data Alta',     size: '18%' },
				{ field: 'datModJoc',   caption: 'Data Modif.',   size: '18%' }
				];
	    	DataGrid("Jocs amb màquines instal.lades", false, true, columns, e.target);
		    break;
		case '3260':
			columns = [			   	
				{ field: 'idJoc',       caption: 'Joc',           size: '6%' },
				{ field: 'nomJoc',      caption: 'Nom Joc',       size: '15%' },
				{ field: 'idMaq',       caption: 'Maq',           size: '6%' },
				{ field: 'macMaq',      caption: 'Mac',           size: '9%' },
				{ field: 'numPartides', caption: 'Num. partides', size: '6%' },
				{ field: 'totalCredits',caption: 'Crèdits (€)',   size: '9%',attr: 'align=center' },
				{ field: 'datAltaJoc',  caption: 'Data Alta',     size: '16%' },
				{ field: 'datModJoc',   caption: 'Data Modif.',   size: '16%' },
				{ field: 'datBaixaJoc', caption: 'Data Baixa',    size: '16%' }						
				];
			DataGrid("Històric de jocs amb màquines instal.lades", false, true, columns, e.target);
			break;				    
		case '3340':
			columns = [
				{ field: '_01_pk_idTorn',    caption: 'idTorn',      size: '6%' },
				{ field: '_03_nomTorn',      caption: 'Torneig',     size: '15%' },
				{ field: '_04_premiTorn',    caption: 'Premi (€)',   size: '9%',attr: 'align=center' },
				{ field: '_02_pk_idJocTorn', caption: 'Joc',         size: '6%' },
				{ field: '_02_nomJoc',       caption: 'Nom Joc',     size: '15%' },
				{ field: 'datIniTorn',       caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',       caption: 'Final Torn.', size: '9%' },
				{ field: 'datAltaTorn',      caption: 'Data Alta',   size: '16%' },
				{ field: 'datModTorn',       caption: 'Data Modif.', size: '16%' }				
			];

            toolbar = { 
	            items: [
	                { type: 'button', id: 'new',  caption: 'Afegir',    img: 'icon-add' },
	                { type: 'button', id: 'edit', caption: 'Modificar', img: 'icon-edit' },
	                { type: 'button', id: 'del',  caption: 'Bloquejar', img: 'icon-delete' }
	            ],
	            onClick: function(target, data) {
			        var action = "../html/torneig.php";
			        var row    = w2ui['grid'].getSelection();

			    	switch(target) {
			    		case 'new':
							fields = [
								{ name: '_03_nomTorn', type: 'text', required: true },
								{ name:'_02_pk_idJocTorn', type:'text', required:true }, 
								{ name: '_04_premiTorn', type: 'float', required: true },
								{ name: 'datIniTorn', type: 'date', required: true },
								{ name: 'datFinTorn', type: 'date', required: true }
							];
			        		DataForm("Crear torneig", 0, fields, action, 
			        				{param:'torneig', keyname:'_01_pk_idTorn'}, action+"?joc=true");	
				        	break;

				        case 'edit':
				        	if (row.length != 0) 
								fields = [
									{ name: '_03_nomTorn', type: 'text', required: true },
									{ name: '_04_premiTorn', type: 'float', required: true },
									{ name: 'datIniTorn', type: 'date', required: true },
									{ name: 'datFinTorn', type: 'date', required: true }
								];
				        		DataForm("Modificar torneig", row[0], fields, action, 
				        				{param:'torneig', keyname:'_01_pk_idTorn'});
				        	break;

				        case 'del':
				            w2confirm('Estas segur de bloquejar el torneig?', "Bloquejar torneig", 
				            function (msg) { 
				                if (msg=='Yes') 
						        	w2ui['grid'].request('delete', {recid:row[0]}, action, function() {
						        		w2ui['grid'].reload();
						        	});
				            });
				        	break;

				        default:
				        	console.log(target, " No definit");
				        	break;
				    }
			    }
  			};	

		    DataGrid("Relació de Torneigs", "torneig", toolbar, columns, fields, 3340, "_01_pk_idTorn");
			break;			        
		case '3342':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "3320", idTorn: row[0]};
						     	msgAction("Bloquejar un torneig", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "3325", idTorn: row[0]};					        
						     	msgAction("Desbloquejar un torneig", 'Estàs segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};				
			columns = [
				{ field: 'recid',      caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',     caption: 'Torneig',     size: '15%' },
				{ field: 'premiTorn',   caption: 'Premi (€)',   size: '9%',attr: 'align=center' },
				{ field: 'idJoc',       caption: 'Joc',         size: '6%' },
				{ field: 'nomJoc',      caption: 'Nom Joc',     size: '15%' },
				{ field: 'datIniTorn',  caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',  caption: 'Final Torn.', size: '9%' },
				{ field: 'datAltaTorn', caption: 'Data Alta',   size: '16%' },
				{ field: 'datModTorn',  caption: 'Data Modif.', size: '16%' },
				{ field: 'datBaixaTorn',caption: 'Data Baixa',  size: '16%' }
				];
		    DataGrid("Relació de Torneigs amb màquines", false, toolbar, columns, e.target);
			break;			
		case '3350':
			columns = [				
				{ field: 'idTorn',     caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',    caption: 'Torneig',     size: '15%' },
				{ field: 'premiTorn',  caption: 'Premi (€)',   size: '9%',attr: 'align=center' },
				{ field: 'idJoc',      caption: 'Joc',         size: '6%' },						
				{ field: 'nomJoc',     caption: 'Nom Joc',     size: '15%' },						
				{ field: 'idUser',     caption: 'Jug',         size: '6%' },
				{ field: 'loginUser',  caption: 'login',       size: '7%' },
				{ field: 'nomUser',    caption: 'Nom',         size: '8%' },
				{ field: 'datIniTorn', caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn', caption: 'Final Torn.', size: '9%' },
				{ field: 'datAltaTorn',caption: 'Data Alta',   size: '16%' },
				{ field: 'datModTorn', caption: 'Data Modif.', size: '16%' }
				];
			DataGrid("Jugadors dels Torneigs", false, true, columns, e.target);				
			break;
		case '3360':
			columns = [				
				{ field: 'idTorn',       caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',      caption: 'Torneig',     size: '13%' },
				{ field: 'premiTorn',    caption: 'Premi (€)',   size: '8%',attr: 'align=center' },
				{ field: 'idJoc',        caption: 'Joc',         size: '6%' },						
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '13%' },
				{ field: 'loginUser',    caption: 'login',       size: '6%' },
				{ field: 'nomUser',      caption: 'Jugador',     size: '8%' },
				{ field: 'datIniTorn',   caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',   caption: 'Final Torn.', size: '9%' },
				{ field: 'datBaixaTorn', caption: 'Data Baixa Torn',  size: '9%' },
				{ field: 'datBaixaUser', caption: 'Data Baixa Jug',   size: '9%' }						
				];
			DataGrid("Històric de jugadors dels Torneigs", false, true, columns, e.target);								
			break;
		case '3375':
			columns = [
				{ field: 'idTorn',       caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',      caption: 'Torneig',     size: '15%' },
				{ field: 'premiTorn',    caption: 'Premi (€)',   size: '9%',attr: 'align=center' },
				{ field: 'idJoc',        caption: 'Joc',         size: '6%' },
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '15%' },
				{ field: 'datIniTorn',   caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',   caption: 'Final Torn.', size: '9%' },
				{ field: 'idMaq',        caption: 'Maq',         size: '6%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '10%' },
				{ field: 'datBaixaTorn', caption: 'Data Baixa',   size: '15%' }
				];
		    DataGrid("Màquines dels Torneigs", false, true, columns, e.target);
			break;				    						
		case '3380':
			columns = [				
				{ field: 'idTorn',       caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',      caption: 'Torneig',     size: '15%' },
				{ field: 'premiTorn',    caption: 'Premi (€)',   size: '8%',attr: 'align=center' },
				{ field: 'idJoc',        caption: 'Joc',         size: '6%' },	
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '13%' },											
				{ field: 'idMaq',        caption: 'Maq',         size: '6%' },
				{ field: 'idUser',       caption: 'Jug',         size: '6%' },
				{ field: 'nomUser',      caption: 'Nom',         size: '8%' },
				{ field: 'rondaPart',    caption: 'Ronda',       size: '6%' },						
				{ field: 'punts',        caption: 'Punts',       size: '6%' },						
				{ field: 'datHoraPartida', caption: 'Data Hora Partida',   size: '16%' }
				];
			DataGrid("Màquines dels Torneigs amb partides", false, true, columns, e.target);				
			break;
		case '3390':
			columns = [
				{ field: 'idTorn',         caption: 'idTorn',      size: '6%' },			
				{ field: 'nomTorn',        caption: 'Torneig',     size: '13%' },
				{ field: 'premiTorn',      caption: 'Premi (€)',   size: '8%',attr: 'align=center' },
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '13%' },											
				{ field: 'idMaq',          caption: 'Maq',         size: '5%' },
				{ field: 'nomUser',        caption: 'Jugador',     size: '8%' },
				{ field: 'rondaPart',      caption: 'Ronda',       size: '5%' },						
				{ field: 'punts',          caption: 'Punts',       size: '5%' },						
				{ field: 'datHoraPartida', caption: 'Data Hora Partida',size: '16%' },
				{ field: 'datBaixaTorn',   caption: 'Data Baixa Torn',  size: '9%' },
				{ field: 'datBaixaPart',   caption: 'Data Baixa Part',  size: '9%' }						
				];
	    	DataGrid("Històric de màquines amb partides dels Torneigs", false, true, columns, e.target);				
		    break;
		case '3420':
			columns = [
				{ field: '_01_pk_idMaq',   caption: 'Maq',         size: '6%' },
				{ field: '_02_macMaq',     caption: 'Mac',         size: '15%' },
				{ field: '_03_propMaq',    caption: 'Propietari',  size: '20%' },							
				{ field: '_04_credMaq',    caption: 'Crèdits Parcials (€)', size: '9%',attr: 'align=right' },
				{ field: '_05_totCredMaq', caption: 'Crèdits (€)', size: '9%',attr: 'align=right' },
				{ field: 'datAltaMaq',     caption: 'Data Alta',   size: '15%' },
				{ field: 'datModMaq',      caption: 'Data Modif',  size: '15%' }
				];
			fields = [
		        { name: '_02_macMaq', type: 'text', required: true,
		          html: { caption: 'Mac màquina', attr: 'size="45"', span: 5 }
		        },
		        { name: '_03_propMaq', type: 'text', required: true,
		          html: { caption: 'Nom propietari', attr: 'size="45"', span: 5 }
		        },
		        { name: "_04_credMaq", type: 'float', required: false,
		          html: { caption: 'Crèdits Parcials', attr: 'size="10"', span: 5 }
		        },
		        { name: "_05_totCredMaq", type: 'float', required: false,
		          html: { caption: 'Crèdits Totals', attr: 'size="10"', span: 5 }
		        }
		    ];
		    DataGrid("Relació de Màquines", "maquina", false, columns, fields, 3420, "_01_pk_idMaq");
		    break;
		case '3425':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' },
	                { type: 'button', id: 'recauda', caption: 'Act. Recaudació', img: 'icon-add' }
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "3415", idMaq: row[0]};
						     	msgAction("Bloquejar una màquina", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "3416", idMaq: row[0]};					        
						     	msgAction("Desbloquejar una màquina", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'recauda':
					        	var params ={pid: "3430", idMaq: row[0]};					        
						     	msgAction("Actualitzar recaudació d'una màquina", 'Estàs segur ?', "query.php", params);
					        	break;					        	
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};		
			columns = [
				{ field: 'recid',       caption: 'Maq',         size: '6%' },
				{ field: 'macMaq',      caption: 'Mac',         size: '15%' },
				{ field: 'propMaq',     caption: 'Propietari',  size: '20%' },							
				{ field: 'credMaq',     caption: 'Crèdits Parcials (€)', size: '9%',attr: 'align=right' },
				{ field: 'totCredMaq',  caption: 'Crèdits (€)', size: '9%',attr: 'align=right' },
				{ field: 'datAltaMaq',  caption: 'Data Alta',   size: '16%' },
				{ field: 'datModMaq',   caption: 'Data Modif',  size: '16%' },
				{ field: 'datBaixaMaq', caption: 'Data Baixa',  size: '16%' }				
				];
		    DataGrid("Històric de Màquines", false, toolbar, columns, e.target);
		    break;
		case '3440':
			columns = [
				{ field: 'idMaq',          caption: 'Maq',         size: '5%' },
				{ field: 'macMaq',         caption: 'Mac',         size: '7%' },
				{ field: 'propMaq',        caption: 'Propietari',  size: '17%' },							
				{ field: 'idJoc',          caption: 'Joc',         size: '5%' },							
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '13%' },											
				{ field: 'totalCredits',   caption: 'Crèdits (€)', size: '9%',attr: 'align=center' },
				{ field: 'idUbic',         caption: 'Ubic',        size: '5%' },
				{ field: 'empUbic',        caption: 'Empresa',     size: '12%' },
				{ field: 'pobUbic',        caption: 'Població',    size: '8%' },						
				{ field: 'provUbic',       caption: 'Provincia',   size: '8%' },						
				{ field: 'datAltaMaq',     caption: 'Data Alta',    size: '15%' },
				{ field: 'datModMaq',      caption: 'Data Modif',   size: '15%' }				
				];
		   	DataGrid("Màquines amb jocs instal.lats i les seves ubicacions", false, true, columns, e.target);
		    break;
		case '3450':
			columns = [
				{ field: 'idMaq',          caption: 'Maq',         size: '5%' },
				{ field: 'macMaq',         caption: 'Mac',         size: '7%' },
				{ field: 'propMaq',        caption: 'Propietari',  size: '17%' },							
				{ field: 'idJoc',          caption: 'Joc',         size: '5%' },							
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '13%' },											
				{ field: 'totalCredits',   caption: 'Crèdits (€)', size: '9%',attr: 'align=center' },
				{ field: 'idUbic',         caption: 'Ubic',        size: '5%' },
				{ field: 'empUbic',        caption: 'Empresa',     size: '12%' },
				{ field: 'pobUbic',        caption: 'Població',    size: '8%' },						
				{ field: 'provUbic',       caption: 'Provincia',   size: '8%' },
				{ field: 'datAltaMaq',     caption: 'Data Alta',   size: '9%' },
				{ field: 'datModMaq',      caption: 'Data Modif.',   size: '9%' },
				{ field: 'datBaixaMaq',    caption: 'Data Baixa',   size: '9%' }								
			];
		   	DataGrid("Històric de màquines amb jocs instal.lats i les seves ubicacions", false, true, columns, e.target);				
		    break;
		case '3456':
			columns = [
				{ field: 'idMaq',      caption: 'Maq',         size: '7%' },
				{ field: 'macMaq',     caption: 'Mac',         size: '10%' },
				{ field: 'idJoc',      caption: 'Joc',         size: '7%' },							
				{ field: 'nomJoc',     caption: 'Nom Joc',     size: '13%' },											
				{ field: 'idUser',     caption: 'Jug',         size: '7%' },
				{ field: 'loginUser',  caption: 'login',       size: '10%' },				
				{ field: 'idTorn',     caption: 'idTorn',      size: '7%' },
				{ field: 'nomTorn',    caption: 'Torneig',     size: '15%' },
				{ field: 'premiTorn',  caption: 'Premi (€)',   size: '8%',attr: 'align=center' }
			];
		   	DataGrid("Màquines disponibles de cada torneig per cada jugador", false, true, columns, e.target);				
		    break;

		case '3485':
			columns = [
				{ field: 'recid',                 caption: 'Id',            size: '8%' },
				{ field: '_01_pk_idMaqInst',      caption: 'Maq',           size: '8%' },
				{ field: '_02_macMaq',            caption: 'Mac',           size: '13%' },
				{ field: '_02_pk_idJocInst',      caption: 'Joc',           size: '8%' },							
				{ field: '_02_nomJoc',            caption: 'Nom Joc',       size: '15%' },
				{ field: '_03_numPartidesJugadesMaqInst',  caption: 'Num. partides', size: '8%' },
				{ field: '_04_credJocMaqInst',    caption: 'Crèdits parcials (€)',   size: '10%', attr: 'align=right' },
				{ field: '_05_totCredJocMaqInst', caption: 'Crèdits totals (€)',     size: '10%', attr: 'align=right' },
				{ field: 'datAltaMaqInst',        caption: 'Data Alta',     size: '16%' },
				{ field: 'datModMaqInst',         caption: 'Data Modif.',   size: '16%' }
			];
            toolbar = { 
	            items: [
	                { type: 'button', id: 'new',  caption: 'Afegir',    img: 'icon-add' },
	                { type: 'button', id: 'edit', caption: 'Modificar', img: 'icon-edit' },
	                { type: 'button', id: 'del',  caption: 'Bloquejar',  img: 'icon-delete' }
	            ],
	            onClick: function(target, data) {
			        var action = "../html/maqInstall.php";
			        var row    = w2ui['grid'].getSelection();

			    	switch(target) {
			    		case 'new':
							fields = [
						        { name: '_01_pk_idMaqInst', type: 'float', required: true},
						        { name: '_02_pk_idJocInst', type: 'float', required: true},
						        { name: '_03_numPartidesJugadesMaqInst', type: 'float', required: false},
						        { name: "_04_credJocMaqInst", type: 'float', required: false},
						        { name: "_05_totCredJocMaqInst", type: 'float', required: false}
						    ];			    		
			        		DataForm("Associar Joc a Màquina", 0, fields, action, 
			        				{param: "maqInstall", keyname: "_00_pk_idMaqInst_auto"}, action+"?new=true");
				        	break;

				        case 'edit':
				        	if (row.length != 0)
				        		{
								fields = [
							        { name: '_03_numPartidesJugadesMaqInst', type: 'float', required: false},
							        { name: "_04_credJocMaqInst", type: 'float', required: false},
							        { name: "_05_totCredJocMaqInst", type: 'float', required: false}
							    ];
				        		DataForm("Modificar dades d'associació de Joc a Màquina", row[0], fields, action, 
				        				{param: "maqInstall", keyname: "_00_pk_idMaqInst_auto"});
				        		}
				        	break;

				        case 'del':
				            w2confirm('Estas segur de bloquejar el joc assignat?', "Bloquejar joc", 
				            function (msg) { 
				                if (msg=='Yes') 
						        	w2ui['grid'].request('delete', {recid:row[0]}, action, function() {
						        		w2ui['grid'].reload();
						        	});
				            });
				        	break;

				        default:
				        	console.log(target, " No definit");
				        	break;
				    }
			    }
  			};	
		    DataGrid("Jocs assignats a cada màquina", "maqInstall", toolbar, columns, fields, 3485, "_00_pk_idMaqInst_auto");
			break;
		case '3490':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' },
	                { type: 'button', id: 'recauda', caption: 'Act. Recaudació', img: 'icon-add' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "3470", idMaqInst: row[0]};
						     	msgAction("Bloquejar una associació Màquina-Joc", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "3475", idMaqInst: row[0]};					        
						     	msgAction("Desbloquejar una associació Màquina-Joc", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'recauda':
					        	var params ={pid: "3476", idMaqInst: row[0]};					        
						     	msgAction("Actualitzar recaudació d'un joc d'una màquina", 'Estàs segur ?', "query.php", params);
					        	break;					        						        	
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};		
			columns = [
				{ field: 'recid',          caption: 'idMaqInst',     size: '10%' },			
				{ field: 'idMaq',          caption: 'Maq',           size: '8%' },
				{ field: 'macMaq',         caption: 'Mac',           size: '13%' },
				{ field: 'idJoc',          caption: 'Joc',           size: '8%' },							
				{ field: 'nomJoc',         caption: 'Nom Joc',       size: '15%' },
				{ field: 'numPartides',    caption: 'Num. partides', size: '8%' },
				{ field: 'credits',        caption: 'Crèdits Parcials (€)', size: '9%',attr: 'align=right' },
				{ field: 'totalCredits',   caption: 'Crèdits (€)',   size: '10%', attr: 'align=right' },
				{ field: 'datAltaMaqInst', caption: 'Data Alta',     size: '16%' },
				{ field: 'datModMaqInst',  caption: 'Data Modif.',   size: '16%' },
				{ field: 'datBaixaMaqInst',caption: 'Data Baixa',    size: '16%' }				
			];
		   	DataGrid("Històric de jocs assignats a cada màquina", false, toolbar, columns, e.target);				
		    break;			
		case '3510':
			columns = [
				{ field: 'idMaq',        caption: 'Maq',           size: '8%' },
				{ field: 'macMaq',       caption: 'Mac',           size: '13%' },
				{ field: 'propMaq',      caption: 'Propietari',    size: '17%' },						
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per màquina", false, true, columns, e.target);
		    break;
		case '3520':
			columns = [
				{ field: 'idJoc',        caption: 'Joc',           size: '15%' },							
				{ field: 'nomJoc',       caption: 'Nom Joc',       size: '15%' },											
				{ field: 'totalCredits', caption: 'Crèdits (€)',   size: '15%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per joc", false, true, columns, e.target);				
		    break;
		case '3530':
			columns = [
				{ field: 'idJoc',        caption: 'Joc',         size: '10%' },	
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '15%' },											
				{ field: 'idMaq',        caption: 'Maq',         size: '10%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '15%' },
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }				
			];
		   	DataGrid("Ranking de recaudacions per joc i màquina", false, true, columns, e.target);
		    break;
		case '3540':
			columns = [
				{ field: 'propMaq',      caption: 'Propietari',  size: '20%' },
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per propietari", false, true, columns, e.target);						
		    break;
		case '3550':
			columns = [
				{ field: 'propMaq',      caption: 'Propietari',  size: '20%' },			
				{ field: 'idMaq',        caption: 'Maq',         size: '10%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '20%' },
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per propietari de màquina", false, true, columns, e.target);						
			break;
		case '3560':
			columns = [
				{ field: 'propMaq',      caption: 'Propietari',  size: '20%' },			
				{ field: 'idJoc',        caption: 'Joc',         size: '10%' },	
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '15%' },															
				{ field: 'idMaq',        caption: 'Maq',         size: '10%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '20%' },
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions de cada propietari per joc i màquina", false, true, columns, e.target);								
		    break;
		case '3570':
			columns = [
				{ field: 'provincia',    caption: 'Provincia',   size: '15%' },						
				{ field: 'poblacio',     caption: 'Població',    size: '20%' },						
				{ field: 'cPostal',      caption: 'Codi postal', size: '10%' },										
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per provincia i població", false, true, columns, e.target);										
		    break;
		case '3580':
			columns = [
				{ field: 'poblacio',     caption: 'Població',    size: '20%' },						
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per població", false, true, columns, e.target);		
		    break;
		case '3590':
			columns = [
				{ field: 'provincia',    caption: 'Provincia',   size: '15%' },									
				{ field: 'poblacio',     caption: 'Població',    size: '20%' },						
				{ field: 'cPostal',      caption: 'Codi postal', size: '10%' },										
				{ field: 'idMaq',        caption: 'Maq',         size: '10%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '20%' },				
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions de cada màquina per provincia, població i Codi postal", false, true, columns, e.target);		
		    break;
		case '3600':
			columns = [
				{ field: 'idJoc',        caption: 'Joc',         size: '10%' },	
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '15%' },															
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per cada joc", false, true, columns, e.target);		
		    break;
		case '3610':
			columns = [
				{ field: 'poblacio',     caption: 'Població',    size: '20%' },						
				{ field: 'idJoc',        caption: 'Joc',         size: '10%' },	
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '15%' },
				{ field: 'idMaq',        caption: 'Maq',         size: '10%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '20%' },				
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per joc de cada poblacio que tingui màquines instal.lades", false, true, columns, e.target);
		    break;
		case '3620':
			columns = [
				{ field: 'provincia',    caption: 'Provincia',   size: '15%' },												
				{ field: 'poblacio',     caption: 'Població',    size: '20%' },						
				{ field: 'cPostal',      caption: 'Codi postal', size: '10%' },														
				{ field: 'idJoc',        caption: 'Joc',         size: '10%' },	
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '15%' },
				{ field: 'idMaq',        caption: 'Maq',         size: '10%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '20%' },				
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Ranking de recaudacions per joc de cada provincia i poblacio que tingui màquines instal.lades", false, true, columns, e.target);
		    break;

		case '3711':
			break;
		case '3712':
			break;		
		case '3713':
			break;		
		case '3721':
			break;		
		case '3722':
			break;		
		case '3723':
			break;		
		case '3731':
			break;		
		case '3732':
			break;		
		case '3733':
			break;

		case '3830':
			columns = [
				// { field: '_01_pk_idUbic', caption: 'Ubic',        size: '4%' },
				{ field: '_02_empUbic',   caption: 'Empresa',     size: '8%' },
				{ field: '_03_dirUbic',   caption: 'Adreça',      size: '8%' },			
				{ field: '_06_provUbic',  caption: 'Provincia',   size: '8%' },												
				{ field: '_05_cpUbic',    caption: 'Codi postal', size: '6%' },				
				{ field: '_04_pobUbic',   caption: 'Població',    size: '8%' },				
				{ field: '_07_latUbic',   caption: 'Lat',         size: '5%' },
				{ field: '_08_longUbic',  caption: 'Lng',         size: '5%' },				
				{ field: '_09_altUbic',   caption: 'Alt',         size: '5%' },								
				{ field: '_10_contUbic',  caption: 'Contacte',    size: '8%' },
				{ field: '_11_emailUbic', caption: 'eMail',       size: '8%' },				
				{ field: '_12_telUbic',   caption: 'Telef.',      size: '8%' },	
				{ field: '_13_mobUbic',   caption: 'Mòbil',       size: '8%' },	
				{ field: 'datAltaUbic',   caption: 'Data Alta',   size: '15%' },
				{ field: 'datModUbic',    caption: 'Data Modif.', size: '15%' }
			];
			fields = [
		        { name: '_02_empUbic', type: 'text', required: true,
		          html: { caption: 'Empresa', attr: 'size="45"', span: 5 }
		        },
		        { name: '_03_dirUbic', type: 'text', required: true,
		          html: { caption: 'Adreça', attr: 'size="45"', span: 5 }
		        },
		        { name: '_06_provUbic', type: 'text', required: true,
		          html: { caption: 'Provincia', attr: 'size="45"', span: 5 }
		        },
		        { name: '_05_cpUbic', type: 'text', required: true,
		          html: { caption: 'Codi Postal', attr: 'size="10"', span: 5 }
		        },
		        { name: '_04_pobUbic', type: 'text', required: true,
		          html: { caption: 'Població', attr: 'size="45"', span: 5 }
		        },
		        { name: "_07_latUbic", type: 'text', required: false,
		          html: { caption: 'Latitut', attr: 'size="5"', span: 5 }
		        },
		        { name: "_08_longUbic", type: 'text', required: false,
		          html: { caption: 'Longitut', attr: 'size="5"', span: 5 }
		        },
		        { name: "_09_altUbic", type: 'text', required: false,
		          html: { caption: 'Altitut', attr: 'size="5"', span: 5 }
		        },
		        { name: '_10_contUbic', type: 'text', required: true,
		          html: { caption: 'Contacte', attr: 'size="45"', span: 5 }
		        },
		        { name: "_11_emailUbic", type: 'text', required: false,
		          html: { caption: 'eMail', attr: 'size="45"', span: 5 }
		        },
		        { name: "_12_telUbic", type: 'text', required: false,
		          html: { caption: 'Telèfon', attr: 'size="15"', span: 5 }
		        },
		        { name: "_13_mobUbic", type: 'text', required: true,
		          html: { caption: 'Mòbil', attr: 'size="15"', span: 5 }
		        }
		    ];			
		   	DataGrid("Empreses d'ubicacions", "ubicacio", false, columns, fields, 3830, "_01_pk_idUbic");
		    break;
		case '3840':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	// console.log(row);
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "3820", idUbic: row[0]};
						     	msgAction("Bloquejar una empresa d'ubicació", 'Estàs segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "3825", idUbic: row[0]};					        
						     	msgAction("Desbloquejar una empresa d'ubicació", 'Estàs segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};		
			columns = [
				{ field: 'recid',          caption: 'Ubic',        size: '4%' },
				{ field: 'empUbic',        caption: 'Empresa',     size: '8%' },
				{ field: 'dirUbic',        caption: 'Adreça',      size: '8%' },			
				{ field: 'provincia',      caption: 'Provincia',   size: '8%' },												
				{ field: 'cPostal',        caption: 'Codi postal', size: '6%' },				
				{ field: 'poblacio',       caption: 'Població',    size: '8%' },				
				{ field: 'contactUbic',    caption: 'Contacte',    size: '8%' },
				{ field: 'emailContacte',  caption: 'eMail',       size: '8%' },				
				{ field: 'telefonContacte',caption: 'Telef.',      size: '8%' },	
				{ field: 'mobilContacte',  caption: 'Mòbil',       size: '8%' },	
				{ field: 'datAltaUbic',    caption: 'Data Alta',   size: '15%' },
				{ field: 'datModUbic',     caption: 'Data Modif.', size: '15%' },
				{ field: 'datBaixaUbic',   caption: 'Data Baixa',  size: '15%' }
			];
		   	DataGrid("Històric d'empreses d'ubicacions", false, toolbar, columns, e.target);
		    break;		    	   
		case '3850':
			columns = [
				{ field: 'provincia',      caption: 'Provincia',   size: '8%' },												
				{ field: 'poblacio',       caption: 'Població',    size: '8%' },						
				{ field: 'cPostal',        caption: 'Codi postal', size: '6%' },						
				{ field: 'idUbic',         caption: 'Ubic',        size: '4%' },
				{ field: 'empUbic',        caption: 'Empresa',     size: '8%' },
				{ field: 'dirUbic',        caption: 'Adreça',      size: '8%' },
				{ field: 'latitut',        caption: 'Lat',         size: '5%' },
				{ field: 'longitut',       caption: 'Lng',         size: '5%' },				
				{ field: 'altitut',        caption: 'Alt',         size: '5%' },				
				{ field: 'contactUbic',    caption: 'Contacte',    size: '8%' },
				{ field: 'emailContacte',  caption: 'eMail',       size: '8%' },				
				{ field: 'telefonContacte',caption: 'Telef.',      size: '8%' },	
				{ field: 'mobilContacte',  caption: 'Mòbil',       size: '8%' },	
				{ field: 'datAltaUbic',    caption: 'Data Alta',   size: '15%' },
				{ field: 'datModUbic',     caption: 'Data Modif.', size: '15%' },
				{ field: 'datBaixaUbic',   caption: 'Data Baixa',  size: '15%' }
			];
		   	DataGrid("Ubicacions per cada provincia, poblacio i codi postal", false, true, columns, e.target);
		    break;			
		case '3860':
			columns = [
				{ field: 'latitut',        caption: 'Lat',         size: '5%' },
				{ field: 'longitut',       caption: 'Lng',         size: '5%' },				
				{ field: 'altitut',        caption: 'Alt',         size: '5%' },				
				{ field: 'idUbic',         caption: 'Ubic',        size: '4%' },
				{ field: 'empUbic',        caption: 'Empresa',     size: '8%' },
				{ field: 'dirUbic',        caption: 'Adreça',      size: '8%' },			
				{ field: 'provincia',      caption: 'Provincia',   size: '8%' },
				{ field: 'cPostal',        caption: 'Codi postal', size: '6%' },				
				{ field: 'poblacio',       caption: 'Població',    size: '8%' },
				{ field: 'contactUbic',    caption: 'Contacte',    size: '8%' },
				{ field: 'emailContacte',  caption: 'eMail',       size: '8%' },				
				{ field: 'telefonContacte',caption: 'Telef.',      size: '8%' },	
				{ field: 'mobilContacte',  caption: 'Mòbil',       size: '8%' },	
				{ field: 'datAltaUbic',    caption: 'Data Alta',   size: '15%' },
				{ field: 'datModUbic',     caption: 'Data Modif.', size: '15%' },
				{ field: 'datBaixaUbic',   caption: 'Data Baixa',  size: '15%' }
			];
		   	DataGrid("Ubicacions per coordenades (Latitut, Longitut i Altitut)", false, true, columns, e.target);		
		    break;
		case '3870':
			columns = [
				{ field: 'provincia',      caption: 'Provincia',   size: '8%' },												
				{ field: 'cPostal',        caption: 'Codi postal', size: '6%' },				
				{ field: 'poblacio',       caption: 'Població',    size: '8%' },			
				{ field: 'idUbic',         caption: 'Ubic',        size: '4%' },
				{ field: 'empUbic',        caption: 'Empresa',     size: '8%' },
				{ field: 'dirUbic',        caption: 'Adreça',      size: '8%' },			
				{ field: 'contactUbic',    caption: 'Contacte',    size: '8%' },
				{ field: 'emailContacte',  caption: 'eMail',       size: '8%' },				
				{ field: 'telefonContacte',caption: 'Telef.',      size: '8%' },	
				{ field: 'mobilContacte',  caption: 'Mòbil',       size: '8%' },	
				{ field: 'datAltaUbic',    caption: 'Data Alta',   size: '15%' },
				{ field: 'datModUbic',     caption: 'Data Modif.', size: '15%' },				
				{ field: 'datBaixaUbic',   caption: 'Data Baixa',  size: '15%' }
			];
		   	DataGrid("Empreses d'ubicacions per provincia, codi postal i població", false, true, columns, e.target);		
		    break;		

		case '3890':
 			columns = [
				{ field: 'provincia',    caption: 'Provincia',   size: '10%' },				
				{ field: 'poblacio',     caption: 'Població',    size: '15%' },			
				{ field: 'cPostal',      caption: 'Codi postal', size: '8%' },
				{ field: 'idUbic',       caption: 'Ubic',        size: '6%' },												
				{ field: 'empUbic',      caption: 'Empresa',     size: '8%' },				
				{ field: 'idMaq',        caption: 'Maq',         size: '6%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '15%' },				
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' },
				{ field: 'datAltaUTM',   caption: 'Data Alta',   size: '16%'},
				{ field: 'datModUTM',    caption: 'Data Modif.', size: '16%'},				
				{ field: 'datBaixaUTM',  caption: 'Data Baixa',  size: '16%'},
				{ field: 'datBaixaMaq',  caption: 'Data Baixa Maq',  size: '16%'},
				{ field: 'datBaixaUbic', caption: 'Data Baixa Ubic',  size: '16%'}				
				];

			fields = [
				{ name: '_01_pk_idUbicUTM', type: 'text', required: true },
				{ name: '_02_pk_idMaqUTM', type: 'text', required: true }
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
			        				{param:"ubicacioTeMaquina", keyname:"_00_pk_idUTM_auto"});	
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
		    DataGrid("Màquines per ubicació", "ubicaciotemaquina", toolbar, columns, fields, e.target, "_00_pk_idUTM_auto");
		    break;		        

		case '3930':
			columns = [
				{ field: 'provincia',    caption: 'Provincia',   size: '10%' },				
				{ field: 'poblacio',     caption: 'Població',    size: '15%' },			
				{ field: 'cPostal',      caption: 'Codi postal', size: '8%' },				
				{ field: 'idMaq',        caption: 'Maq',         size: '6%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '15%' },				
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }				
			];
		   	DataGrid("Màquines de cada ubicació per provincia, població i codi postal", false, true, columns, e.target);
		    break;			
		case '3940':
			columns = [
				{ field: 'latitut',      caption: 'Lat',         size: '10%' },
				{ field: 'longitut',     caption: 'Lng',         size: '10%' },				
				{ field: 'altitut',      caption: 'Alt',         size: '10%' },				
				{ field: 'provincia',    caption: 'Provincia',   size: '10%' },
				{ field: 'poblacio',     caption: 'Població',    size: '15%' },
				{ field: 'idMaq',        caption: 'Maq',         size: '8%' },
				{ field: 'macMaq',       caption: 'Mac',         size: '15%' },
				{ field: 'totalCredits', caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Màquines de cada ubicació per coordenades (Latitut, Longitut i Altitut)", false, true, columns, e.target);		
		    break;			
		case '3950':
			columns = [
				{ field: 'idUbic',         caption: 'Ubic',        size: '4%' },
				{ field: 'empUbic',        caption: 'Empresa',     size: '8%' },
				{ field: 'dirUbic',        caption: 'Adreça',      size: '8%' },
				{ field: 'provincia',      caption: 'Provincia',   size: '8%' },												
				{ field: 'cPostal',        caption: 'Codi postal', size: '4%' },				
				{ field: 'poblacio',       caption: 'Població',    size: '8%' },							
				{ field: 'contactUbic',    caption: 'Contacte',    size: '8%' },
				{ field: 'emailContacte',  caption: 'eMail',       size: '8%' },				
				{ field: 'telefonContacte',caption: 'Telef.',      size: '8%' },	
				{ field: 'mobilContacte',  caption: 'Mòbil',       size: '8%' },
				{ field: 'idMaq',          caption: 'Maq',         size: '8%' },
				{ field: 'macMaq',         caption: 'Mac',         size: '10%' },				
				{ field: 'totalCredits',   caption: 'Crèdits (€)', size: '10%',attr: 'align=right' }				
			];
		   	DataGrid("Empreses d'ubicacions per provincia, codi postal i població", false, true, columns, e.target);				
		    break;			
		case '4010':
            toolbar = { 
                items: [
	                { type: 'button', id: 'lock',    caption: 'bloquejar',    img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();
				    if (row.length != 0)
				    	{
				    	switch(target)
				    		{
				    		case 'lock':
					        	var params ={pid: "4020", idUsr: row[0]};
						     	msgAction("Bloquejar un jugador", 'Estas segur ?', "query.php", params);
					        	break;
					        case 'unlock':
					        	var params ={pid: "4030", idUsr: row[0]};					        
						     	msgAction("Desbloquejar un jugador", 'Estas segur ?', "query.php", params);
					        	break;
					        default:
					        	console.log(target , " No definit");
					        	break;
					        }
				    	}
				    }
      			};
			columns = [
				{ field: 'idUsr', 		caption: 'idUsr', 	size: '5%' },
				{ field: 'nomUsr', 		caption: 'Nom', 	size: '10%' },
				{ field: 'cogUsr', 		caption: 'Cognoms', size: '10%' },
				{ field: 'loginUsr', 	caption: 'Login',   size: '7%' },				
				{ field: 'emailUsr', 	caption: 'eMail', 	size: '10%' },
				{ field: 'fotoUsr', 	caption: 'Foto', 	size: '10%' },
				{ field: 'facebookUsr', caption: 'Facebook',size: '10%' },	
				{ field: 'twitterUsr',  caption: 'Twitter', size: '8%' },
				{ field: 'datAltaUsr',  caption: 'Data Alta',  size: '10%' },
				{ field: 'datModUsr',   caption: 'Data Modif.',size: '10%' },				
				{ field: 'datBaixaUsr', caption: 'Data Baixa', size: '10%' }
			];
		   	DataGrid("Relació de jugadors", false, toolbar, columns, e.target);				
		    break;			
		case '4020':
		    break;			
		case '4030':
		    break;			
		case '4040':
			columns = [
				{ field: 'idJug',        caption: 'Jug',         size: '5%' },
				{ field: 'nomJug',       caption: 'Nom',         size: '8%' },
				{ field: 'loginJug',     caption: 'login',       size: '8%' },
				{ field: 'idTorn',       caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',      caption: 'Torneig',     size: '12%' },
				{ field: 'idJoc',        caption: 'Joc',         size: '5%' },
				{ field: 'nomJoc',       caption: 'Nom Joc',     size: '12%' },						
				{ field: 'ranking',      caption: 'Posició',     size: '6%',attr: 'align=center' },
				{ field: 'punts',        caption: 'Punts',       size: '8%',attr: 'align=right' },
				{ field: 'totalRanking', caption: 'Posicions Ranking',   size: '12%',attr: 'align=center' }						
			];
		   	DataGrid("Ranking i punts dels torneigs registrats per cada jugador", false, true, columns, e.target);
		    break;			
		    
		default:
		    console.log("default");
	}
	return false;
};