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
    var pkName;
    var dialog;
    var toolbar;
    var id;

    // Propietats per defecte
    var options = 
    {
        header          : true,
        footer          : true,
        toolbar         : true,
        toolbarReload   : false,
        toolbarColumns  : true,
        toolbarSearch   : false,
        toolbarSave     : false
    };

    this.setDataTable = function(strTable, strPkName)  { 
        table  = strTable; 
        pkName = strPkName;
    };
    this.setColumns   = function(cols)      { columns = cols; };
    this.getColumns   = function()          { return columns; };
    this.setForm      = function(form)      { dialog = form;  };
    this.setId        = function(pid)       { id = pid; };
    this.setToolBar   = function(tools)     { this.toolbar = tools;};

    this.Edit = function(mode) { 
        var recno    = mode ? 0 : grid.getSelection()[0];
        dialog.title = mode ? "Afegir" : "Modificar";
        dialog.Define(table, recno, pkName); 
    };

    this.Delete = function() {
        var row = grid.getSelection();

        if (row.length != 0) {
            w2confirm('Estas segur d\'esborrar?', "Eliminar registre :" + row[0], 
            function (msg) { 
                if (msg=='Yes') grid.request('delete', { 'recid': row[0], 'keyname': pkName }, action);
                    grid.reload();
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
            if (!this.toolbar) {
                var buttons = 
                [
                    { type: 'button', id: 'new',  caption: 'Afegir',    img: 'icon-add' },
                    { type: 'button', id: 'edit', caption: 'Modificar', img: 'icon-edit' },
                    { type: 'button', id: 'del',  caption: 'Eliminar',  img: 'icon-delete' }
                    // { type: 'button', id: 'seek', caption: 'Buscar',    img: 'icon-search' }
                ];

                this.toolbar = { 
                    items: buttons, 
                    onClick: function(target, data) {

                        switch(target) {
                            case 'new' : self.Edit(true); break;
                            case 'edit': self.Edit(false); break;
                            case 'del' : self.Delete(); break;
                        } 
                    }
                }; 
            }
            // if remote
            // action      = "../src/dbuicurl.php";
            // else
            action       = "../src/dbui.php";
            postData     = { param: table };
            // fnOnDblClick = function(target, eventData) { self.Edit(false); };
            fnOnError    = function(target, error) { console.log( error.xhr.responseText, error ); };

            fnOnLoad = function(target, eventData) {
                console.log(eventData.xhr.responseText);
                var result = JSON.parse(eventData.xhr.responseText);
                
                if (typeof result  != 'undefined') {
                    if (result.cmd == 'delete' && result.success)  {
                        grid.remove.apply(grid, grid.getSelection());
                    }
                }
            };

        } else {
            // Mode consulta
            if (!this.toolbar) options.toolbar = false;
            action   = "query.php";
            postData = { pid: id };
            fnOnError    = function(target, error)
                { 
                // console.log( error.xhr.responseText, error ); 
                if (target == "grid" && error.message.indexOf("expirat")>0)
                    document.getElementsByTagName("META")[0].content = "4;URL= ../html/logout.php";
                };
        }

        $('#grid').w2grid({
            name        : 'grid',
            header      : this.title,
            url         : action,
            show        : options,
            msgRefresh  : 'Consultant dades',
            toolbar     : this.toolbar,
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
    var pid;

    this.setFields = function(fieldList) {
        this.fields = fieldList;
    };

    this.Load = function(data) {
        if (data)
            w2ui['dialog'].record = { 'recid' : data.recid };
        else
            w2ui['dialog'].record = { 'recid' : 0 };

        w2ui['dialog'].fields.forEach( 
            function(value, index) {
                if (data)
                    w2ui['dialog'].record[value.name] = data[value.name];
                else
                    w2ui['dialog'].record[value.name] = "";
            }
        );
    };

    this.Request = function(params) {
        w2ui['grid'].lock('Carregant dades ...', true);

        w2ui['dialog'].request(params, 
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
    };

    this.Define = function(table, recno, pkName) {
        var self = this;

        $().w2destroy('dialog');

        $().w2form({ 
            name  : 'dialog',
            url   : action,
            style : 'border: 0px; background-color: transparent;',
            postData   : { param: table, keyname: pkName },
            msgRefresh : 'Consultant dades',
            msgSaving  : 'Guardant dades',
            fields: this.fields,            
            actions: {
                // reset: function() { this.clear(); },
                Guardar: function() { this.save( {'recid': recno, 'pid':self.pid} ); },
                Sortir:  function() { $().w2popup('close'); }
            },
            onSave: function(target, eventData) {

                $().w2popup('close');

                // var result = JSON.parse(eventData.xhr.responseText);
                // if (result.recid == 999999 && result.rows == 999999)
                //     {
                //         eventData.status = "fail";
                //         w2alert("Error a l'accès a la base de dades", 'Missatge');
                //         eventData.preventDefault();
                //     }

                if (eventData.status == "success") {
                    // console.log(eventData.xhr.responseText);
                    var result = JSON.parse(eventData.xhr.responseText);
                    
                    console.log(result, this.record, recno);
                    
                    if (result.rows == 1) {
                        if (recno > 0) {
                            // canviat el 5-7-14 per jjft per que no actualitza
                            // correctament les dates en taula torneig (datIniTorn, datFinTorn) un
                            // cop fet INSERT
                            grid.reload();  
                            // grid.set(result.recid, this.record, true);
                        } else  {
                            this.record.recid = result.recid;
                            this.record[pkName] = result.recid;                            
                            // grid.add(this.record);
                            grid.reload();                            
                        }
                    } 
                }
                grid.refresh();
            }
        });

        if (recno > 0) {
            self.Request({'recid':recno}); 
        } else {
            self.Load();  // Blank
            self.Activate();
        }
    };

    this.Activate = function() {
        // Alçada del camp:29px
        var height = this.fields.length*29; 
        // Incrementa 134px barra de botons
        height +=134; 

        $().w2popup('open', {
            title   : self.title,
            modal   : true,
            body    : '<div id="form"></div>',
            style   : 'padding: 0px',
            width   : 450,
            height  : height
        });
        // Forma equivalent
        // w2ui['dialog'].render($('#form')[0]); 
        $('#form').w2render('dialog'); 
    };
};

/*
 **********************************************************************************************
 *  Api per construir un grid
 **********************************************************************************************
 */
function DataGrid(title, table, toolbar, columns, fieldsOrId, pid, pkName) {
    
    if (w2ui.grid)  w2ui['grid'].destroy();
    pkName = typeof pkName !=='undefined' ? pkName: 'id';
                                                    // Nom de la clau primària (id per defecte)
    var grid   = new dbGrid();                      // Crear el grid
    grid.title = title;                             // Titol a header
    grid.setColumns(columns);                       // Assignar les columnes

    if (table) {                                    // Si es passa taula, és editable
        grid.setDataTable(table, pkName);           // Assignar taula i nom clau primaria
        var form = new dbForm();                    // Crear el diàleg d'edició
        form.pid = pid;                             // Petició diferent per a save()
        form.setFields(fieldsOrId);                 // Assignar els camps al dialeg
        grid.setForm(form);                         // Assignar el formulari al grid
    } else {
        grid.setId(fieldsOrId);                     // Assignar Pid (Id de la petició per a query.php)
    }
    grid.setToolBar(toolbar);                       // Barra de botons personalitzada
    grid.Activate();                                // Mostrar el grid
}

/*
 **********************************************************************************************
 *  Api per construir un layout
 **********************************************************************************************
 */
function DataView(url) {
    if (w2ui.grid)  w2ui['grid'].destroy();

    var pstyle = 'border: 1px solid #dfdfdf; padding: 5px;'
    
    $('#grid').w2layout({
        name: 'grid',
        panels: [{type: 'main', style: pstyle}]
    });

    // w2ui['layout'].lock('Carregant dades ...', true);
    // w2utils.lock("#grid", 'Carregant dades ...', true);
    w2ui['grid'].load('main', url);
    // w2utils.unlock("#grid");

   // w2ui['layout'].unlock();
}

/*
 **********************************************************************************************
 *  Api per construir un formulari
 **********************************************************************************************
 */
function DataForm(action, pId, record) {
    if (w2ui.grid)  w2ui['grid'].destroy();

    $('#grid').w2form({ 
        name  : 'grid',
        header     : 'Form Header',
        msgRefresh : 'Please Wait...',
        url   : action,
        fields: record,
        actions: {
            reset: function () {
                this.clear();
            },
            save: function() {
                var self = this;
                this.save( {pid:pId}, function(e) {
                    console.log(e);
                    w2alert('Gràcies per la teva col.laboració', 'Missatge');
                    self.clear();
                });
            }
        }
    });
    // w2ui['grid'].recid = "1";
    w2ui['grid'].request( {pid:'5020'}, function(data){
        // console.log(data);

        w2ui['grid'].fields.forEach( 
            function(value, index) {

                if (data) {
                    console.log( data.records[0][value.name]);
                    w2ui['grid'].record[value.name] = data.records[0][value.name];
                }
            }
        );
        w2ui['grid'].record = { 'recid' : 0 };
    });
}