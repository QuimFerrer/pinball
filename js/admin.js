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
					{ id: '1090', text: 'Test', img: 'icon-edit' },
					{ id: '1100', text: 'Consultes', img: 'icon-folder',
			  			nodes: [
						   { id: '1110', text: 'Consulta 1', img: 'icon-page' },
						   { id: '1120', text: 'Consulta 2', img: 'icon-page' },
						   { id: '1130', text: 'Consulta 3', img: 'icon-page',
						   nodes: [
						   	{ id: '1131', text: 'Sub Consulta 1', img: 'icon-page' }
						   ]}
			  		]},
			  		{ id: '1200', text: 'Generar Partides',	img:'icon-edit'}
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
// Màquines
		case '1040':
			columns = [				
				{ field: '_01_pk_idMaq', caption: 'ID Maquina', size: '10%' },
				{ field: '_03_propMaq', caption: 'Nom del propietari', size: '50%' },
				{ field: '_06_datAltaMaq', caption: 'Data alta', size: '40%' }
			];
		    DataGrid("Llistat de màquines", false, false, columns, e.target);
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
		    DataGrid("Llistat de torneigs", "torneig", toolbar, columns, fields, "_01_pk_idTorn");
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
		    DataGrid("Manteniment de partides", "partides", false, columns, e.target);
		    break;

		    
		default:
		    console.log("default");
	}
	return false;
};
