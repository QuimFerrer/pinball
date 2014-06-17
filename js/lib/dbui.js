var grid;
var action;

/*
 **********************************************************************************************
 *  Classe grid
 **********************************************************************************************
 */
var dbGrid = function() {

    var self    = this;
    var title   = "";
    var columns = [];
    var base    = "";
    var table   = false;
    var dialog;
    var id;

    // Propietats per defecte
    var options = 
    {
        header          : true,
        footer          : true,
        toolbar         : true,
        toolbarReload   : false,
        toolbarColumns  : false,
        toolbarSearch   : false
    };

    this.setDataTable = function(strTable)  { table = strTable; };
    this.setColumns   = function(cols)      { columns = cols; };
    this.getColumns   = function()          { return columns; };
    this.setForm      = function(form)      { dialog = form;  };
    this.setId        = function(pid)       { id = pid; };

    this.Edit = function(mode) { 
        var recno;
        if (mode)
            recno = 0;
        else
            recno = grid.getSelection()[0];

        dialog.title = mode ? "Afegir" : "Modificar";
        dialog.Define(recno); 
    };

    this.Delete = function() {
        var row = grid.getSelection();

        if (row.length != 0) {
            w2confirm('Estas segur d\'esborrar?', "Eliminar registre :" + row[0], 
            function (msg) { 
                if (msg=='Yes') grid.request('delete', { "recid" : row[0] }, action);
                // No fa res, revisar !
                // grid.refresh();
                // grid.select(this.record.recid);
            })
        }  
    };

    this.Create = function() {

        var toolbar;
        var postData;
        var fnOnDblClick = false;
        var fnOnError    = false;
        var fnOnLoad     = false;

        if (table) {
            // Mode edició 
            var buttons = 
            [
                { type: 'button', id: 'new',  caption: 'Afegir',    img: 'icon-add' },
                { type: 'button', id: 'edit', caption: 'Modificar', img: 'icon-edit' },
                { type: 'button', id: 'del',  caption: 'Eliminar',  img: 'icon-delete' }
                // { type: 'button', id: 'seek', caption: 'Buscar',    img: 'icon-search' }
            ];

            toolbar = { 
                items: buttons, 
                onClick: function(target, data) {

                    switch(target) {
                        case 'new' : self.Edit(true); break;
                        case 'edit': self.Edit(false); break;
                        case 'del' : self.Delete(); break;
                    } 
                }
            }; 

            action      = "../src/dbuicurl.php";
            postData    = { param: table };
            fnOnDblClick  = function(target, eventData) { self.Edit(false); };
            fnOnError     = function(target, error) { console.log( error.xhr.responseText, error ); };

            fnOnLoad = function(target, eventData) {
                alert("load");
                        var result = JSON.parse(eventData.xhr.responseText);

                        if (typeof result  != 'undefined') {
                            if (result.cmd == 'delete' && result.success)  {
                                grid.remove.apply(grid, grid.getSelection());
                            }
                        }
            };

        } else {
            // Mode consulta
            options.toolbar = false;
            action   = "query.php";
            postData = { pid: id };
        }

        $('#grid').w2grid({
            name        : 'grid',
            header      : this.title,
            url         : action,
            show        : options,
            msgRefresh  : 'Consultant dades',
            toolbar     : toolbar,
            columns     : columns,
            postData    : postData,
            onDblClick  : fnOnDblClick,
            onError     : fnOnError, 
            onLoad      : fnOnLoad
        });
    };

    this.Activate = function() {
        this.Create();
        grid = w2ui['grid'];
    }
};

/*
 **********************************************************************************************
 *  Classe formulari
 **********************************************************************************************
 */
var dbForm = function() {
    var self   = this;
    var title  = "";
    var fields;

    this.setFields = function(fieldList) {
        fields = fieldList;
    };

    this.Load = function(data) {
        if (data)
            w2ui['dialog'].record = { 'recid' : data.recid };
        else
            w2ui['dialog'].record = { 'recid' : 0 };
console.log(data);
        w2ui['dialog'].fields.forEach( 
            function(value, index) {
                if (data)
                    w2ui['dialog'].record[value.name] = data[value.name];
                else
                    w2ui['dialog'].record[value.name] = "";
            }
        );
    };

    this.Define = function(recno) {

        $().w2destroy('dialog');

        $().w2form({ 
            name  : 'dialog',
            url   : action,
            style : 'border: 0px; background-color: transparent;',
            msgRefresh : 'Consultant dades',
            msgSaving  : 'Guardant dades',
            fields: fields,            
            postData: { param: 'productes' },
            actions: {
                // reset: function() { this.clear(); },
                Guardar: function() { this.save( { 'recid' : recno } ); },
                Sortir:  function() { $().w2popup('close'); }
            },
            onSave: function(target, eventData) {

                // console.log(target, eventData);
                $().w2popup('close');

                if (eventData.status == "success") {
                    var result = JSON.parse(eventData.xhr.responseText);

                    if (result.rows == 1) {
                        if (recno > 0) {
                            grid.set(result.recid, this.record, true);
                        } else  {
                            this.record.recid = result.recid;
                            grid.add(this.record);
                        }
                    } 
                }
                grid.refresh();
            }
        });

        if (recno > 0) {

            w2ui['grid'].lock('Carregant dades ...', true);

            w2ui['dialog'].request( { 'recid' : recno }, 
                function( data ){
                    if (data.status !== 'error') {
                        self.Load(data);
                        w2ui['grid'].unlock();
                        self.Activate();
                    } else {
                        console.log( data.responseText );  // status, message, responseText
                    }
                }
            );
        } else {
            self.Load();  // Blank
            self.Activate();
        }
    };
// w2ui.dialog.on('*', function (event) {
//         console.log('Event: '+ event.type, 'Target: '+ event.target, event);
//     });

    this.Activate = function() {
        $().w2popup('open', {
            title   : self.title,
            modal   : true,
            body    : '<div id="form"></div>',
            style   : 'padding: 0px',
            width   : 520,
            height  : 400
        });
        $('#form').w2render('dialog');        
    };
};

/*
 **********************************************************************************************
 *  Api per construir el grid
 **********************************************************************************************
 */

function DataGrid(title, table, columns, fieldsOrId) {
    
    if (w2ui.grid)  w2ui['grid'].destroy();

    var grid   = new dbGrid();                      // Crear el grid
    grid.title = title;                             // Titol a header
    grid.setColumns(columns);                       // Assignar les columnes

    if (table) {                                    // Si es passa taula, és editable
        grid.setDataTable(table);                   // Assignar taula
        var form = new dbForm();                    // Crear el diàleg d'edició
        form.setFields(fieldsOrId);                 // Assignar els camps al dialeg
        grid.setForm(form);                         // Assignar el formulari al grid
    } else {
        grid.setId(fieldsOrId);                     // Assignar Pid (Id de la petició per a query.php)
    }
                      
    grid.Activate();                                // Mostrar el grid
}