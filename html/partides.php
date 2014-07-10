<?php 

ob_start();

include ("../src/pinball.h");
include ("../src/seguretat.php");
include ("../src/seguretatLogin.php");

comprovaSessio();

?>

<!doctype html>
<html>
<head>
	<meta content="" http-equiv="REFRESH"> </meta>	
	<meta charset="UTF-8">
	<title>Pinball. Partides</title>
	<link rel="stylesheet" href="../css/pinball.css"> 
	<!-- <script src="../js/pinball.js"></script> -->
	<script language="JavaScript" src="../js/lib/jquery-1.11.0.min.js"> </script> 
	
<script>
 
var iuserlogin="";

$(document).ready(function(){
      
        var esIdTorneig;
	var esTorneig;
	var esMaquina;
	var esJoc;
	var esJug;  
	var sonPunts1;
	var sonPunts2;
	var sonPunts3;
	var seraMaquina;
	var seraJoc;
	var seraTorneigId;
	 
	 
    $("#I_User").change(function(){ // Quan es selecciona un jugador, dinàmicament es fa una query a la DB per obtenir els torneigs apuntats.
		iuserlogin = document.getElementById("I_User").value;
	
		$.ajax({
		    url: "query.php",
		    data: {pid:'6000', idUserPart:iuserlogin},
		    success: function(Resultat1){
		    	console.log(Resultat1);
		    	crearmenu(Resultat1);
		    }
		});
	});
     
    function crearmenu(dadesretornades1){ // Els torneigs retornats, i les dades implicades, creen dinàmicament un menu desplegable select.
		var dadesconvert= JSON.parse(dadesretornades1); 
		
		var dadesfiltrades = dadesconvert.records;  
		document.getElementById('informacions').innerHTML = dadesretornades1;  
	 
		if (dadesconvert.total>0) {
		
			$("#llistat").html('Tria una combinacio: </br> <select id="seleccionador"  name="Combinacio"> </select>'); // label="Combinacio"
			
		  	var contingut = "";
		
			for (var i=0; i<dadesfiltrades.length; i++){
				//console.log("i: " + i);
				esIdTorneig = dadesfiltrades[i].idTorn;
				esTorneig = dadesfiltrades[i].nomTorn;
				esMaquina = dadesfiltrades[i].idMaq;
				esJoc = dadesfiltrades[i].idJoc;
				console.log("esJoc: " + esJoc);
				esJug = dadesfiltrades[i].idJug;
				
				contingut += '<option id="'+esMaquina+'" name="'+esMaquina+'" value="'+esMaquina+esJoc+esIdTorneig+'"> Torneig: '+esTorneig+' // Maquina: '+esMaquina+' // Joc: '+esJoc+'</option>';
				//console.log("contingut: " , contingut);  // !!!!!!!!!!!!!!!!!!!! COMA ,,,, i NO + ,,,,, !!!!!!!!!!!!!!!!!!!! 
			}
		
			$("#seleccionador").html(contingut); // Generació del menu desplegable select dinàmic.
			document.getElementById('informacions').innerHTML = "";

			console.log(document.getElementById('seleccionador').value);
	  
		} // end if 
	
		else { // Si no hi ha cap torneig apuntat, surt aquest missatge.
			document.getElementById('llistat').innerHTML = "No hi ha cap torneig";
			$("#seleccionador").html("");
		}
	  
	  $('#seleccionador').on('change',function(){ // Quan es selecciona una combinacio de torneig, maquina i joc, les dades es carreguen al PHP dinàmicament via ajax
	    var combinat = $(this).val();
	    seraMaquina = combinat.substring(0, 2); 
	    seraJoc = combinat.substring(2,5); 
	    seraTorneigId = combinat.slice(5);
	    console.log("sera Maquina Joc TorneigId " , combinat, "/", seraMaquina, "/", seraJoc,  "/", seraTorneigId, "/", "combinat.length" ,   combinat.length); // per veure el contingut amb el separador * 
	  
	    sonPunts1 = "";
	    sonPunts2 = "";
	    sonPunts3 = "";
	    
	    function aleatoris(){ // Generació aleatoris dels resultats de les rondes.
      
		  var a = Math.round(Math.random()*10);
		  var b = Math.round(Math.random()*10);   
		  var c = Math.round(Math.random()*10); 
		  
		  sonPunts1 = document.getElementById('punt1').value=a*b;
		  sonPunts2 = document.getElementById('punt2').value=b*c;
		  sonPunts3 = document.getElementById('punt3').value=a*c;
	    };

	    aleatoris();    
	    
	    $.ajax({ // Precarregar (=SI): els valors seleccionats al PHP (que conectarà amb la DB per fer les modificacions(.
	      url: "partides.php",
	      data: {carregar:'SI', MAQ:seraMaquina, JOC:seraJoc, JUG:esJug, FOTO:'NO', TORNID:seraTorneigId, PUNTUA1:sonPunts1, PUNTUA2:sonPunts2, PUNTUA3:sonPunts3}, //date("Y-n-j H:i:s")
	      success: function(Resultat1){console.log('carregar SI : he carregat els valors que s han d enviar');}});
	    
	  }); // end jQuery onchange combinacio
    } // end crearmenu

	document.querySelector("#dialog").onsubmit = function(e) { // Quan es selecciona el botó Submit per enviar les dades
		e.preventDefault();
	    $.ajax({ // Precarregar (=NO): els valors precarregats al PHP s'enviaran definitivament a la DB i farà les modificacions. 
	      url: "partides.php",
	      data: {carregar:'NO', MAQ:seraMaquina, JOC:seraJoc, JUG:esJug, FOTO:'NO', TORNID:seraTorneigId, PUNTUA1:sonPunts1, PUNTUA2:sonPunts2, PUNTUA3:sonPunts3}, //date("Y-n-j H:i:s")
	      success: function(Resultat2){processar(Resultat2);}});
	      
	        function processar(dadesretornades2){ // Retorn de les notificacions de l'operació de gestió a la DB.
		//var dadesconvert2= JSON.parse(dadesretornades2); 
		
		//var dadesfiltrades = dadesconvert2.records;  
		document.getElementById('informacions').innerHTML = dadesretornades2;  
		// return false;
		}
	}
});
</script>
	 
</head>

<body>
  <div id="main">
    <header>
	    <h1>Generador de partides</h1>
    </header>
	<section>
<?php 
      
	if (isset($_SESSION['emplenat'])) { // Emplenat és la variable que controla si ja hi ha jugadors carregats al menu seleccionable.

	if (($_SESSION['emplenat'])=="NO") // Emplenat=NO: Encara no  hi ha jugadors carregats al menu seleccionable i s'han de cridar amb query de la DB.
	{
		$query   = 'SELECT _04_loginUsuari FROM usuari;';
		$response = dbExec($query)[1];
		$_SESSION['resultat']=$response;
		echo '<form id="dialog" method="POST">';
		echo 'Tria el jugador: <select align="right" id="I_User" name="User">';

		foreach($response as $jugador) {
		echo '<option value="'.$jugador->_04_loginUsuari .'">' .$jugador->_04_loginUsuari .'</option>';
		}

		echo '</select></br>'; 
		echo '<div id="llistat"></div>';
		echo '</br></br></br>';
		echo 'PUNTUACIONS <div id="puntuacions"> Ronda 1 <input id="punt1" type="number" value="" /></br> Ronda 2 <input id="punt2" type="number" value="" /></br> Ronda 3 <input id="punt3" type="number" value="" /> </div>';
		echo '</br></br></br>';
		echo '<input type="submit" name="submit" value="Generar partida"';
		echo '</form"></br>'; 

		$_SESSION['emplenat']="SI"; // Emplenat ja es pot posar a =SI..
	}
	
	elseif ($_SESSION['emplenat'] =="SI") // Emplenat=SI: si hi ha jugadors carregats al menu seleccionable, podem seguir muntant el menu.
	
		{

		// Aquestes variables venen del Ajax per ser precarregats en l'entorn PHP i disponibles per fer les querys necessàries. 
		$IDMAQ = $_REQUEST['MAQ'];
		$IDJOC = $_REQUEST['JOC'];
		$IDJUG = $_REQUEST['JUG'];
		$IDTORN = $_REQUEST['TORNID'];
		//$IDDATA = $_REQUEST['DATA'];
		$IDFOTO = $_REQUEST['FOTO'];
		$PUNTUA_1 = $_REQUEST['PUNTUA1'];
		$PUNTUA_2 = $_REQUEST['PUNTUA2'];
		$PUNTUA_3 = $_REQUEST['PUNTUA3'];
	  
		if (($_REQUEST['carregar'])=="SI"){ // No cal fer rès, en realitat el resultat ja es veu en pantalla.
			echo "<p>carregant dades a les variables</p>"; 
		}	      
			
		  if (($_REQUEST['carregar'])=="NO"){ // Ja no cal pregarregar res, ara toca enviar les dades definitivament a la DB.
		      
		      $_SESSION['emplenat']="NO"; // Resetejar per tornar a muntar la pàgina amb els jugadors actuals de la DB.
		    
		      
		      //<p>S'ha fet l'insert!</p><br />
		  
			  $now = date("Y-n-j H:i:s"); // Capturar l'hora actual per totes les querys
			  
			  // Actualitzar Partida actual
			  $query    = sprintf("INSERT INTO partida
						    VALUES ('%d','%d','%d','%s',NULL,NULL);",$IDMAQ,
											    $IDJOC,
											    $IDJUG,
											    $now);
			  $response = dbExec($query)[1];
			  
			  // Actualitzar Ronda 1
			  $query    = sprintf("INSERT INTO ronda
						    VALUES (NULL, '%d','%d','%d','%s','%d','%s','%d', NULL, NULL);"
									    ,$IDMAQ,
									    $IDJOC,
									    $IDJUG,
									    $now,
									    1,
									    "foto.jpg",
									    $PUNTUA_1);
			  $response = dbExec($query)[1];
			  
			  // Actualitzar Ronda 2
			  $query    = sprintf("INSERT INTO ronda
						    VALUES (NULL, '%d','%d','%d','%s','%d','%s','%d', NULL, NULL);"
									,$IDMAQ,
									$IDJOC,
									$IDJUG,
									$now,
									2,
									"foto.jpg",
									$PUNTUA_2);
			  $response = dbExec($query)[1];			
			  
			  // Actualitzar Ronda 3
			  $query    = sprintf("INSERT INTO ronda
						    VALUES (NULL, '%d','%d','%d','%s','%d','%s','%d', NULL, NULL);"
									,$IDMAQ,
									$IDJOC,
									$IDJUG,
									$now,
									3,
									"foto.jpg",
									$PUNTUA_3);									 											    			  				
			  $response = dbExec($query)[1];

			  // Actualitzar Credits maquina
			  $query    = sprintf("UPDATE maquina 
					      set _04_credMaq=(_04_credMaq+1), _05_totCredMaq=_05_totCredMaq+_04_credMaq 
					      where _01_pk_idMaq = '%d';",$IDMAQ);
					      
			  $response = dbExec($query)[1];
			  
			  // Actualitzar Partides maqInstall
			  $query    = sprintf("UPDATE maqInstall
					      set _03_numPartidesJugadesMaqInst=(_03_numPartidesJugadesMaqInst+1), _04_credJocMaqInst=(_04_credJocMaqInst+1)
					      where (_01_pk_idMaqInst = '%d') and (_02_pk_idJocInst = '%d');",$IDMAQ,$IDJOC);	 
					      
			  $response = dbExec($query)[1];
			  
			  // Actualitzar Partides joc
			  $query    = sprintf("UPDATE joc
					      set _05_numPartidesJugadesJoc=(_05_numPartidesJugadesJoc+1)
					      where (_01_pk_idJoc = '%d');",$IDJOC);
					      
			  $response = dbExec($query)[1];
			  
			  // Insertar Partides torneigTePartida
			  $query    = sprintf("INSERT INTO torneigTePartida
						  VALUES (NULL, '%d','%d','%d','%d');",$IDTORN,$IDMAQ,$IDJOC,$IDJUG);
					      
			  $response = dbExec($query)[1];
			   
			  
			// Falta posar:   _05_totCredJocMaqInst 
			 
		       
		      //<b>Warning</b>:  mysql_fetch_assoc() expects parameter 1 to be resource, boolean given in <b>/opt/lampp/htdocs/Projectes/pinball/src/pinball.h</b> on line <b>74</b><br />
	  
	  echo "<p>S'ha fet l'insert !</p>"; 
	  
		// header('location:partides.php');  // Tornar a muntar la pagina ??
		//
		
		}
	}
    }
    else 
    {
		$_SESSION['emplenat']="NO"; // Emplenat=NO: Aqui és genera per primer cop la variable Session per poder fer les diferents accions.
		var_dump($_SESSION['emplenat']);
		echo "<p>no esta emplenat</p>";
		header('location:partides.php'); // s'ha de tornar a muntar la pàgina amb la variable Session activa i en valor = NO.
	}
?>
	    <div id="desplegable"> </div> </br></br></br> <!--Zona de mostrar desplegable-->
	    <div id="informacions">  </div> </br></br></br> <!--Zona de mostrar desplegable-->
    </section>
    <footer>
	    <?php footer(); ?>
    </footer>
  </div>
</body>	
</html>

<?php
 
?>
