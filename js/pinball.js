/*
 * JS for pinball project
 */

 // $(document).ready(function(){
	//      $("#I_User").change(function(){
	//     alert("he seleccionat un usuari");
	//     });
	//     });

// $(document).ready(function(){
// 	var ph = $( window ).height();
//      // $("#gid").css("height", ph+"px");
//      console.log($("#gid"));
// });


function msgAction(title, message, action, params)
{
	w2confirm(message, title, function (msg) { 
    	if (msg=='Yes') {
			w2ui['grid'].lock('Actualitzant dades ...', true);

			$.ajax({url: action, data: params })
			.done(function(e) {
				// console.log(e);
				// w2alert("correcte");
	            w2ui['grid'].reload();
			})
			.fail(function(error) { 
				// w2alert("error");
				// console.log(error);	
			})
			.always(function() { 
				w2ui['grid'].unlock();
			});
    	}
	});
}
