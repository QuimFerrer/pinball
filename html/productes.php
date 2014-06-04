<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestio de productes</title>
    <link rel="stylesheet" href="../css/lib/w2ui-1.3.2.css" />
    <link rel="stylesheet" href="../css/lib/dbui.css" />
</head>
<body style='margin:0 !important;padding:1px;'>
    <div id="grid"></div>
</body>

<script type="text/javascript" src="../js/lib/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/lib/w2ui-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/lib/dbui.js"></script>
<script>
// Columnes del grid
// Respectar les paraules reservades: field, caption, size...
    var columns = 
    [              
        { field: 'recid',       caption: 'Id.',              size: '5%',   sortable: true,   resizable: true  },
        { field: 'nom',         caption: 'Nom del Producte', size: '30%',  sortable: true,   resizable: true  },
        { field: 'descripcio',  caption: 'Descripció',       size: '35%',  sortable: true,   resizable: true  },
        { field: 'preu',        caption: 'Preu',             size: '10%',  sortable: true,   resizable: true  },
        { field: 'foto',        caption: 'Foto',             size: '20%',  sortable: false,  resizable: false }
   ];
// Camps de formulari per a dialeg d'edició
// Respectar les paraules reservades: name, type, html, caption, attr, span...
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

   var grid   = new dbGrid();                     // Crear el grid
   grid.title = "Manteniment de productes";       // Titol a header

   grid.setDataTable('productes');                // Assignar taula
   grid.setColumns(columns);                      // Assignar les columnes

   var form = new dbForm();                       // Crear el diàleg d'edició
   form.setFields(fields);                        // Assignar els camps al dialeg

   grid.setForm(form);                            // Assignar el formulari al grid
   grid.Activate();                               // Mostrar el grid

</script>
</html>