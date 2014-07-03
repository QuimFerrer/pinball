// Sidebar per l'administrador
$('#sidebar').w2sidebar({
	name: 'sidebar',
	nodes: [ 
		{ id: '2000', text: 'Opcions', expanded: true, group: true,
		  nodes: [  { id: '3000', text: 'Perfil', img: 'icon-edit' },
					{ id: '3100', text: 'Partides', img: 'icon-folder',
					nodes: [{ id: '3110', text: 'per màquina',  img: 'icon-page' },
							{ id: '3120', text: 'per jugador',  img: 'icon-page' },
							{ id: '3130', text: 'bloquejar',    img: 'icon-page' },
							{ id: '3140', text: 'desbloquejar', img: 'icon-page' }]},
					{ id: '3200', text: 'Jocs', img: 'icon-folder',
					nodes: [{ id: '3210', text: 'Alta',  img: 'icon-edit' },
							{ id: '3220', text: 'Baixa',  img: 'icon-edit' },
							{ id: '3225', text: 'Modificació',  img: 'icon-edit' },							
							{ id: '3230', text: 'Llistat',  img: 'icon-page' },
							{ id: '3240', text: 'Històric', img: 'icon-page' },
							{ id: '3245', text: 'Màquines', img: 'icon-folder',									
							nodes: [{ id: '3250', text: 'Actual',  img: 'icon-page' },
									{ id: '3260', text: 'Històric',  img: 'icon-page' }]}]},
					{ id: '3300', text: 'Torneigs', img: 'icon-folder',
					nodes: [{ id: '3310', text: 'Alta',  img: 'icon-edit' },
							{ id: '3320', text: 'Baixa',  img: 'icon-edit' },					
							{ id: '3330', text: 'Modificació',  img: 'icon-edit' },
							{ id: '3340', text: 'Relació',  img: 'icon-page' },
							{ id: '3345', text: 'Llistats',  img: 'icon-folder',
							nodes: [{ id: '3346', text: 'Jugadors',  img: 'icon-folder',
									nodes: [{ id: '3350', text: 'Actual',  img: 'icon-page' },
											{ id: '3360', text: 'Històric',  img: 'icon-page' }]},
									{ id: '3370', text: 'Màquines',  img: 'icon-folder',
									nodes: [{ id: '3380', text: 'Actual',  img: 'icon-page' },
											{ id: '3390', text: 'Històric',  img: 'icon-page' } ]}]}]},
					{ id: '3400', text: 'Màquines', img: 'icon-folder',
					nodes: [{ id: '3410', text: 'Alta',  img: 'icon-edit' },
							{ id: '3420', text: 'Baixa',  img: 'icon-edit' },
							{ id: '3425', text: 'Modificació',  img: 'icon-edit' },							
							{ id: '3430', text: 'Act. Recaudació',  img: 'icon-edit' },														
							{ id: '3440', text: 'Llistat',  img: 'icon-page' },
							{ id: '3450', text: 'Històric',  img: 'icon-page' },									
							{ id: '3455', text: 'Assignar Jocs',  img: 'icon-folder',
							nodes: [{ id: '3460', text: 'Alta',  img: 'icon-edit' },
									{ id: '3470', text: 'Baixa',  img: 'icon-edit' },
									{ id: '3480', text: 'Modificació',  img: 'icon-edit' },									
									{ id: '3490', text: 'Llistat',  img: 'icon-page' }]},
							{ id: '3500', text: 'Recaudacions',  img: 'icon-folder',
							nodes: [{ id: '3510', text: 'Maq i Ranking',  img: 'icon-page' },
									{ id: '3520', text: 'Joc i Ranking',  img: 'icon-page' },
									{ id: '3530', text: 'Joc i Maq',  img: 'icon-page' },
									{ id: '3540', text: 'Propietari',  img: 'icon-page' },
									{ id: '3550', text: 'Propiet. i Maq',  img: 'icon-page' },
									{ id: '3560', text: 'Propiet. i Joc',  img: 'icon-page' },
									{ id: '3570', text: 'Prov. i Pobl.',  img: 'icon-page' },
									{ id: '3580', text: 'Població',  img: 'icon-page' },
									{ id: '3590', text: 'Prov,Pob i Maq',  img: 'icon-page' },
									{ id: '3600', text: 'Joc',  img: 'icon-page' },
									{ id: '3610', text: 'Joc i Població',  img: 'icon-page' },											
									{ id: '3620', text: 'Joc,Prov i Pob',  img: 'icon-page' }]},
							{ id: '3700', text: 'Estadístiques',  img: 'icon-folder',
							nodes: [{ id: '3710', text: '1',  img: 'icon-page' },
									{ id: '3720', text: '2',  img: 'icon-page' },									
									{ id: '3730', text: '3',  img: 'icon-page' }]}]},											
					{ id: '3800', text: 'Ubicacions', img: 'icon-folder',
					nodes: [{ id: '3810', text: 'Alta',  img: 'icon-edit' },
							{ id: '3820', text: 'Baixa',  img: 'icon-edit' },
							{ id: '3830', text: 'Modificació',  img: 'icon-edit' },							
							{ id: '3835', text: 'Llistats',  img: 'icon-folder',
							nodes: [{ id: '3840', text: 'Prov, Pob i CP',  img: 'icon-page' },
									{ id: '3850', text: 'Coordenades',  img: 'icon-page' },							
									{ id: '3860', text: 'Empreses',  img: 'icon-page' },
									{ id: '3870', text: 'Empr.Prov-Pob',  img: 'icon-page' }]},
							{ id: '3875', text: 'Màquines',  img: 'icon-folder',
							nodes: [{ id: '3880', text: 'Alta',  img: 'icon-edit' },
									{ id: '3890', text: 'Baixa',  img: 'icon-edit' },
									{ id: '3900', text: 'Modificació',  img: 'icon-edit' },									
									{ id: '3910', text: 'Canvi ubicació',  img: 'icon-page' },
									{ id: '3920', text: 'Llistats',  img: 'icon-folder',
									nodes: [{ id: '3930', text: 'Prov i Pob',  img: 'icon-page' },
											{ id: '3940', text: 'Coordenades',  img: 'icon-page' },
											{ id: '3950', text: 'Empreses',  img: 'icon-page' }]}]}]},
					{ id: '4000', text: 'Jugadors', img: 'icon-folder',
					nodes: [{ id: '4010', text: 'Perfils',  img: 'icon-page' },
							{ id: '4020', text: 'Bloquejar',  img: 'icon-edit' },
							{ id: '4030', text: 'Desbloquejar',    img: 'icon-edit' },
							{ id: '4040', text: 'Torneigs registrats', img: 'icon-page' }]},
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////							
					{ id: '1020', text: 'Productes', img: 'icon-edit' },
					{ id: '1060', text: 'Torneigs', img: 'icon-page' },
					{ id: '1080', text: 'Usuaris', img: 'icon-edit' },
					{ id: '1090', text: 'Test', img: 'icon-edit' },
			  		{ id: '1120', text: 'Partides',	img:'icon-edit'},
			  		{ id: '1200', text: 'Partides Victor',	img:'icon-edit'},							
					]
				}
			],
			onClick: function(e){ controller(e) }
		});
/*
 * Paràmetres DataGrid(title, table, toolbar, columns, fieldsOrId, pkName)
 */
var controller = function(e) {
	e.preventDefault();
	var columns;
	var fields;

	switch(e.target) {
// Productes
		case '1020':
			columns = [              
				{ field: 'recid',       caption: 'Id.',              size: '5%',   sortable: true,   resizable: true  },
				{ field: 'nom',         caption: 'Nom del Producte', size: '30%',  sortable: true,   resizable: true  },
				{ field: 'descripcio',  caption: 'Descripció',       size: '35%',  sortable: true,   resizable: true  },
				{ field: 'preu',        caption: 'Preu',             size: '10%',  sortable: true,   resizable: true  },
				{ field: 'foto',        caption: 'Foto',             size: '20%',  sortable: false,  resizable: false }
			];
			fields = [
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
		    DataGrid("Manteniment de productes", "productes", false, columns, fields);
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
// Test
		case '1090':
			DataView('../html/external.php');
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

		case '1200': location.href="partides.php";  
			break;


///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////


		case '3000':
			break;

		case '3110':
			columns = [			   	
				{ field: 'idMaq',          caption: 'Maq',         size: '4%' },
				{ field: 'idJoc',          caption: 'Joc',         size: '4%' },
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '12%' },
				{ field: 'idUser',         caption: 'Jug',         size: '4%' },
				{ field: 'loginUser',      caption: 'login',       size: '7%' },
				{ field: 'nomUser',        caption: 'Nom',         size: '8%' },
				{ field: 'datHoraPartida', caption: 'Data Hora',   size: '16%' },
				{ field: 'idTorn',         caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',        caption: 'Torneig',     size: '10%' },
				{ field: 'datIniTorn',     caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',     caption: 'Final Torn.', size: '9%' },
				{ field: 'datBaixaPart',   caption: 'DataBaixa',   size: '9%'}
				];
			DataGrid("Partides per màquina", false, true, columns, e.target);				
			break;
		case '3120':
			columns = [			   	
				{ field: 'idUser',         caption: 'Jug',         size: '4%' },
				{ field: 'loginUser',      caption: 'login',       size: '7%' },
				{ field: 'nomUser',        caption: 'Nom',         size: '8%' },
				{ field: 'idMaq',          caption: 'Maq',         size: '4%' },
				{ field: 'idJoc',          caption: 'Joc',         size: '4%' },
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '12%' },
				{ field: 'datHoraPartida', caption: 'Data Hora',   size: '16%' },
				{ field: 'idTorn',         caption: 'idTorn',      size: '6%' },
				{ field: 'nomTorn',        caption: 'Torneig',     size: '10%' },
				{ field: 'datIniTorn',     caption: 'Inici Torn.', size: '9%' },
				{ field: 'datFinTorn',     caption: 'Final Torn.', size: '9%' },
				{ field: 'datBaixaPart',   caption: 'DataBaixa',   size: '9%' }
				];
		  	DataGrid("Partides per jugador", false, true, columns, e.target);
		    break;
			
		case '3130':
			break;
		case '3140':
		    break;

		case '3210':
		    break;
		case '3220':
		    break;
		case '3225':
		    break;
		case '3230':
			columns = [			   	
				{ field: 'idJoc',       caption: 'Joc',           size: '5%' },
				{ field: 'nomJoc',      caption: 'Nom Joc',       size: '20%' },
				{ field: 'numPartides', caption: 'Num. partides', size: '10%' },
				{ field: 'datAltaJoc',  caption: 'Data Alta',     size: '20%' },
				{ field: 'datModJoc',   caption: 'Data Modif.',   size: '20%' }
				];
			DataGrid("Jocs", false, true, columns, e.target);
			break;
		case '3240':
			columns = [			   	
				{ field: 'idJoc',       caption: 'Joc',           size: '5%' },
				{ field: 'nomJoc',      caption: 'Nom Joc',       size: '20%' },
				{ field: 'numPartides', caption: 'Num. partides', size: '10%' },
				{ field: 'datAltaJoc',  caption: 'Data Alta',     size: '20%' },
				{ field: 'datModJoc',   caption: 'Data Modif.',   size: '20%' },
				{ field: 'datBaixaJoc', caption: 'Data Baixa',    size: '20%' }
				];
			DataGrid("Històric de jocs", false, true, columns, e.target);
			break;
		case '3250':
			columns = [			   	
				{ field: 'idJoc',       caption: 'Joc',           size: '10%' },
				{ field: 'nomJoc',      caption: 'Nom Joc',       size: '20%' },
				{ field: 'idMaq',       caption: 'Maq',           size: '10%' },
				{ field: 'macMaq',      caption: 'Mac',           size: '15%' },
				{ field: 'numPartides', caption: 'Num. partides', size: '10%' },
				{ field: 'totalCredit', caption: 'Crèdits (€)',   size: '10%',attr: 'align=right' }
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
		case '3310':
			break;
		case '3320':
			break;
		case '3330':
			break;
		case '3340':
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
				{ field: 'datBaixaTorn', caption: 'DataBaixa',   size: '15%' }
				];
			DataGrid("Relació de Torneigs", false, true, columns, e.target);
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
				{ field: 'datFinTorn', caption: 'Final Torn.', size: '9%' }
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
				{ field: 'datBaixaTorn', caption: 'Baixa Torn',  size: '9%' },
				{ field: 'datBaixaUser', caption: 'Baixa Jug',   size: '9%' }						
				];
			DataGrid("Històric de jugadors dels Torneigs", false, true, columns, e.target);								
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
			DataGrid("Màquines dels Torneigs", false, true, columns, e.target);				
			break;
		case '3390':
			columns = [				
				{ field: 'nomTorn',        caption: 'Torneig',     size: '13%' },
				{ field: 'premiTorn',      caption: 'Premi (€)',   size: '8%',attr: 'align=center' },
				{ field: 'nomJoc',         caption: 'Nom Joc',     size: '13%' },											
				{ field: 'idMaq',          caption: 'Maq',         size: '5%' },
				{ field: 'nomUser',        caption: 'Jugador',     size: '8%' },
				{ field: 'rondaPart',      caption: 'Ronda',       size: '5%' },						
				{ field: 'punts',          caption: 'Punts',       size: '5%' },						
				{ field: 'datHoraPartida', caption: 'Data Hora Partida',size: '16%' },
				{ field: 'datBaixaTorn',   caption: 'Baixa Torn',  size: '9%' },
				{ field: 'datBaixaPart',   caption: 'Baixa Part',  size: '9%' }						
				];
	    	DataGrid("Històric de màquines dels Torneigs", false, true, columns, e.target);				
		    break;

		case '3410':
		    break;
		case '3420':
		    break;				    
		case '3425':
		    break;		    
		case '3430':
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
				{ field: 'datAltaMaq',     caption: 'Alta Maq',    size: '9%' }
				];
		   	DataGrid("Màquines", false, true, columns, e.target);
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
				{ field: 'datBaixaMaq',    caption: 'Baixa Maq',   size: '9%' }						
			];
		   	DataGrid("Històric de màquines", false, true, columns, e.target);				
		    break;				    				    
		case '3460':
		    break;
		case '3470':
		    break;
		case '3480':
		    break;		   
		case '3490':
			columns = [
				{ field: 'idMaq',        caption: 'Maq',           size: '8%' },
				{ field: 'macMaq',       caption: 'Mac',           size: '13%' },
				{ field: 'idJoc',        caption: 'Joc',           size: '8%' },							
				{ field: 'nomJoc',       caption: 'Nom Joc',       size: '15%' },											
				{ field: 'numPartides',  caption: 'Num. partides', size: '8%' },
				{ field: 'totalCredits', caption: 'Crèdits (€)',   size: '10%',attr: 'align=right' }
			];
		   	DataGrid("Jocs assignats a cada màquina", false, true, columns, e.target);				
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
		case '3710':
		    break;
		case '3720':
		    break;
		case '3730':
		    break;			


		case '3810':
		    break;			
		case '3820':
		    break;			
		case '3830':
		    break;		    
		case '3840':
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
				{ field: 'datAltaUbic',    caption: 'Data Alta',   size: '5%' },
				{ field: 'datBaixaUbic',   caption: 'Data Baixa',  size: '5%' }
			];
		   	DataGrid("Ubicacions per cada provincia, poblacio i codi postal", false, true, columns, e.target);
		    break;			
		case '3850':
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
				{ field: 'datAltaUbic',    caption: 'Data Alta',   size: '5%' },
				{ field: 'datBaixaUbic',   caption: 'Data Baixa',  size: '5%' }
			];
		   	DataGrid("Ubicacions per coordenades (Latitut, Longitut i Altitut)", false, true, columns, e.target);		
		    break;			
		case '3860':
			columns = [
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
				{ field: 'datAltaUbic',    caption: 'Data Alta',   size: '5%' },
				{ field: 'datBaixaUbic',   caption: 'Data Baixa',  size: '5%' }
			];
		   	DataGrid("Empreses d'ubicacions", false, true, columns, e.target);
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
				{ field: 'datAltaUbic',    caption: 'Data Alta',   size: '5%' },
				{ field: 'datBaixaUbic',   caption: 'Data Baixa',  size: '5%' }
			];
		   	DataGrid("Empreses d'ubicacions per provincia, codi postal i població", false, true, columns, e.target);		
		    break;		

		case '3880':
		    break;			
		case '3890':
		    break;		    
		case '3900':
		    break;
		case '3910':
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
	                { type: 'button', id: 'lock',    caption: 'bloquejar', img: 'icon-delete' },
	                { type: 'button', id: 'unlock',  caption: 'desbloquejar', img: 'icon-edit' }	                
	            ],
                onClick: function(target, data) {
			        var row = w2ui['grid'].getSelection();

			        if (row.length != 0) {
			            w2confirm('Estas segur ?', "Bloquejar un jugador", 
			            function (msg) { 

			                if (msg=='Yes') {
								w2ui['grid'].lock('Actualitzant dades ...', true);

								$.ajax({url: "query.php", data: {pid: "4020", idUsr: row[0]}})
								.done(function(e) {
									// console.log(e);
				                    w2ui['grid'].reload();
								})
								.fail(function(error) { 
									// console.log(error);	
								})
								.always(function() { 
									w2ui['grid'].unlock();
								});
			                }
			            })
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
