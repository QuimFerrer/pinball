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
	<meta charset="UTF-8">
	<title>Pinball. Partides</title>
	<link rel="stylesheet" href="../css/pinball.css"> 
</head>
<body>
  <div id="main">
    <header>
	    <h1>Generador de partides</h1>
    </header>
	<section id="partides">
<?php 
      
      if (isset($_SESSION['emplenat'])) { // Emplenat és la variable que controla si ja hi ha jugadors disponibles al menu seleccionable.

	if ($_SESSION['emplenat']=="NO"){ // Emplenat=NO: Encara no hi ha jugadors precarregats al menu seleccionable i s'han de cridar amb query de la DB.
				
		$query   = 'SELECT _04_loginUsuari FROM usuari;';
		$response = dbExec($query)[1];
		$_SESSION['resultat']=$response;
		echo '<form name="formdata" method="POST">';
		echo 'Tria el jugador: <select align="right" id="I_User" name="User">';

		foreach($response as $jugador) {
		  if ($jugador->_04_loginUsuari != "admin"){
		  echo '<option value="'.$jugador->_04_loginUsuari .'">' .$jugador->_04_loginUsuari .'</option>';
		  }
		}
		
		echo '</select></br>'; 
		echo '<div id="llistat"></div>';
		echo '<p>PUNTUACIONS</p>';
		echo '<div id="puntuacions"> Ronda 1 <input id="punt1" type="number" value="" /></br> Ronda 2 <input id="punt2" type="number" value="" /></br> Ronda 3 <input id="punt3" type="number" value="" /> </div>';
		echo '<p><input type="submit" name="submit" value="Generar partida"</p>';
		echo '</form">'; 


		$_SESSION['emplenat']="SI"; // Emplenat ja es pot posar = SI..
		 
	} // end if emplenat NO
	
	else {
	
	    if (($_SESSION['emplenat'] == "SI") && (isset($_REQUEST['enviardades'])) && ($_REQUEST['enviardades'] == "SI")) { 
	    // Emplenat=SI: si hi ha jugadors precarregats al menu seleccionable, i hem fet una peticio d'enviar dades, podem generar querys.
	 
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
	 
		  $now = date("Y-n-j H:i:s"); // Capturar l'hora actual per totes les querys.
		  
		  // Actualitzar Partida actual.
		  $query    = sprintf("INSERT INTO partida
					    VALUES ('%d','%d','%d','%s',NULL,NULL);",$IDMAQ,
										    $IDJOC,
										    $IDJUG,
										    $now);
		  $response = dbExec($query)[2];
		  
		  // Actualitzar Ronda 1.
		  $query    = sprintf("INSERT INTO ronda
					    VALUES (NULL, '%d','%d','%d','%s','%d','%s','%d', NULL, NULL);"
								    ,$IDMAQ,
								    $IDJOC,
								    $IDJUG,
								    $now,
								    1,
								    "foto.jpg",
								    $PUNTUA_1);
		  $response = dbExec($query)[2];
		  
		  // Actualitzar Ronda 2.
		  $query    = sprintf("INSERT INTO ronda
					    VALUES (NULL, '%d','%d','%d','%s','%d','%s','%d', NULL, NULL);"
								,$IDMAQ,
								$IDJOC,
								$IDJUG,
								$now,
								2,
								"foto.jpg",
								$PUNTUA_2);
		  $response = dbExec($query)[2];			
		  
		  // Actualitzar Ronda 3.
		  $query    = sprintf("INSERT INTO ronda
					    VALUES (NULL, '%d','%d','%d','%s','%d','%s','%d', NULL, NULL);"
								,$IDMAQ,
								$IDJOC,
								$IDJUG,
								$now,
								3,
								"foto.jpg",
								$PUNTUA_3);									 											    			  				
		  $response = dbExec($query)[2];

		  // Actualitzar Credits maquina.
		  $query    = sprintf("UPDATE maquina 
				      set _04_credMaq=(_04_credMaq+1), _05_totCredMaq=_05_totCredMaq+_04_credMaq 
				      where _01_pk_idMaq = '%d';",$IDMAQ);
				      
		  $response = dbExec($query)[3];
		  
		  // Actualitzar Partides maqInstall.
		  $query    = sprintf("UPDATE maqInstall
				      set _03_numPartidesJugadesMaqInst=(_03_numPartidesJugadesMaqInst+1), _04_credJocMaqInst=(_04_credJocMaqInst+1)
				      where (_01_pk_idMaqInst = '%d') and (_02_pk_idJocInst = '%d');",$IDMAQ,$IDJOC);	 
				      
		  $response = dbExec($query)[3];
		  
		  // Actualitzar Partides joc.
		  $query    = sprintf("UPDATE joc
				      set _05_numPartidesJugadesJoc=(_05_numPartidesJugadesJoc+1)
				      where (_01_pk_idJoc = '%d');",$IDJOC);
				      
		  $response = dbExec($query)[3];
		  
		  // Insertar Partides torneigTePartida.
		  $query    = sprintf("INSERT INTO torneigTePartida
					  VALUES (NULL, '%d','%d','%d','%d');",$IDTORN,$IDMAQ,$IDJOC,$IDJUG);
				      
		  $response = dbExec($query)[2];
		    
		  
		// Falta posar:   _05_totCredJocMaqInst 
		 
	   
	    $_SESSION['emplenat']="NO"; // Emplenat ja es pot posar a = NO
	    //echo "<p>S'ha fet l'insert !</p>"; 
	  
    }
    
      else  $_SESSION['emplenat']="NO";  
    
    }
    }
    
      else {
	    $_SESSION['emplenat'] = "NO"; // Emplenat=NO: Aqui és genera per primer cop la variable $_SESSION['emplenat'] per poder fer les diferents accions.
	     
	    header('location:partides.php'); // s'ha de tornar a muntar la pàgina amb la variable Session activa i en valor = NO.
	     
      }
?>
	    <div id="desplegable"> </div> </br></br></br> <!--Zona de mostrar desplegable-->
	    <div id="informacions">  </div> </br></br></br> <!--Zona de mostrar infos-->
	 </section>
  </div>
</body>	
<script src="../js/lib/jquery-1.11.0.min.js"></script> 
<script>
 
	var iuserlogin="";
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
	 
    $("#I_User").change(function(){ // Quan es selecciona un jugador, dinàmicament es fa una query a la DB per obtenir els torneigs als que està apuntat.
		iuserlogin = document.getElementById("I_User").value;
	
		$.ajax({
		    url: "query.php",
		    data: {pid:'6000', idUserPart:iuserlogin},
		    success: function(Resultat1){crearmenu(Resultat1);}});
	});
     
    function crearmenu(dadesretornades1){ // Els torneigs retornats, i les dades implicades, creen dinàmicament un menu desplegable select.
		var dadesconvert= JSON.parse(dadesretornades1); 
		
		var dadesfiltrades = dadesconvert.records;  
		document.getElementById('informacions').innerHTML = dadesretornades1;  
	 
		if (dadesconvert.total>0) {
		
			$("#llistat").html('</br> Tria una combinacio: </br> <select id="seleccionador"  name="Combinacio"> </select>'); // label="Combinacio"
			
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
				//console.log("contingut: " , contingut);  // COMA ,,,, i NO +  !! 
			}
		
			$("#seleccionador").html(contingut); // Generació del menu desplegable select dinàmic.
			document.getElementById('informacions').innerHTML = "";

			console.log(document.getElementById('seleccionador').value);
	  
		} // end if 
	
		else { // Si no hi ha cap torneig apuntat, surt aquest missatge.
			document.getElementById('llistat').innerHTML = "No hi ha cap torneig";
			$("#seleccionador").html("");
		}
	  
	  $('#seleccionador').on('change',function(){ // Quan es selecciona una combinacio de torneig, maquina i joc, es generen 3 Rondes aleatories.
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
	    
	  }); // end jQuery onchange combinacio
    } // end crearmenu

    var form = document.forms.formdata;
    if (form) {
		form.onsubmit = function(e) { // Quan es selecciona el botó Submit per enviar les dades.
			e.preventDefault();
			$.ajax({ // enviardades (=SI): els valors s'enviaran a la DB i farà les modificacions. 
				url: "partides.php",
				data: {enviardades:'SI', MAQ:seraMaquina, JOC:seraJoc, JUG:esJug, FOTO:'NO', 
					   TORNID:seraTorneigId, PUNTUA1:sonPunts1, PUNTUA2:sonPunts2, PUNTUA3:sonPunts3}, //date("Y-n-j H:i:s")
				success: function(Resultat){
					console.log(Resultat);
				}
			});
		}
	}
</script>
</html>
<?php
if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);
?>