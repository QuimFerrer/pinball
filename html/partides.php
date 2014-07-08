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
	<!-- <script src="../js/pinball.js"></script> -->
	<script language="JavaScript" src="../js/lib/jquery-1.11.0.min.js"> </script> 
	
<script>
 
var iuserlogin="";

$(document).ready(function(){
    
	var esTorneig;
	var esMaquina;
	var esJoc;
	var esJug;  
	var sonPunts1;
	var sonPunts2;
	var sonPunts3;

    $("#I_User").change(function(){
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
     
    function crearmenu(dadesretornades1){
		var dadesconvert= JSON.parse(dadesretornades1); 
		
		var dadesfiltrades = dadesconvert.records;  
		document.getElementById('informacions').innerHTML = dadesretornades1;  
	 
		if (dadesconvert.total>0) {
		
			$("#llistat").html('Tria una combinacio torneig/maquina <select id="seleccionador"  name="Combinacio"> </select>'); // label="Combinacio"
			
		  	var contingut = "";
		
			for (var i=0; i<dadesfiltrades.length; i++){
				//console.log("i: " + i);
				var esIdTorneig = dadesfiltrades[i].idTorn;
				esTorneig = dadesfiltrades[i].nomTorn;
				esMaquina = dadesfiltrades[i].idMaq;
				esJoc = dadesfiltrades[i].idJoc;
				esJug = dadesfiltrades[i].idJug;

				contingut += '<option id="'+esMaquina+'" name="'+esMaquina+'" value="'+esMaquina+'"> Torneig: '+esTorneig+' // Maquina: '+esMaquina+'</option>';
				//  console.log("esTorneig: " , esTorneig);  // !!!!!!!!!!!!!!!!!!!! COMA ,,,, i NO + ,,,,, !!!!!!!!!!!!!!!!!!!! 
			}
		
			$("#seleccionador").html(contingut);
			document.getElementById('informacions').innerHTML = "";

			console.log(document.getElementById('seleccionador').value);
	  
		} // end if 
	
		else {
			document.getElementById('llistat').innerHTML = "No hi ha cap torneig";
			$("#seleccionador").html("");
		}
	  
	  $('#seleccionador').on('change',function(){
	    var combinat = $(this).val();
	    console.log("combinat!" , combinat, "///", "combinat.length" ,   combinat.length); // per veure el contingut amb el separador * 
	//    console.log(combinat.length);
	    var seraTorneig = combinat.substring(0,1); 
	    var seraMaquina = combinat.substring(0,1);
	    
	    sonPunts1 = "";
	    sonPunts2 = "";
	    sonPunts3 = "";
	    
	    function aleatoris(){
			var incorrecte=true;
			while (incorrecte){
			var a = Math.round(Math.random()*10);   // MAJUSCULES LA M !! .. multiplica el random x10 i arrodoneix (ROUND) el Random a l'enter superior 
			if (a<10) incorrecte=false;		// comprova si és mejor que 10 i en cas que sigui igual a 10 recalcula el numero
			} // end while
			
			var incorrecte=true;
			while (incorrecte){
			var b = Math.round(Math.random()*10);   // MAJUSCULES LA M !! .. multiplica el random x10 i arrodoneix (ROUND) el Random a l'enter superior 
			if (b<10) incorrecte=false;		// comprova si és mejor que 10 i en cas que sigui igual a 10 recalcula el numero
			} // end while
			
			var incorrecte=true;
			while (incorrecte){
			var c = Math.round(Math.random()*10);   // MAJUSCULES LA M !! .. multiplica el random x10 i arrodoneix (ROUND) el Random a l'enter superior 
			if (c<10) incorrecte=false;		// comprova si és mejor que 10 i en cas que sigui igual a 10 recalcula el numero
			} // end while
			
		     sonPunts1 = document.getElementById('punt1').value=a*b;
		     sonPunts2 = document.getElementById('punt2').value=b*c;
		     sonPunts3 = document.getElementById('punt3').value=a*c;
		};

	    aleatoris();    
	    
	    $.ajax({
	      url: "partides.php",
	      data: {carregar:'SI', MAQ:esMaquina, JOC:esJoc, JUG:esJug, FOTO:'NO', PUNTUA1:sonPunts1, PUNTUA2:sonPunts2, PUNTUA3:sonPunts3}, //date("Y-n-j H:i:s")
	      success: function(Resultat1){console.log('carregar SI : he carregat els valors que s han d enviar');}});
	    
	  }); // end jQuery onchange combinacio
    } // end crearmenu

	document.querySelector("#dialog").onsubmit = function(e) {
		e.preventDefault();
	    $.ajax({
	      url: "partides.php",
	      data: {carregar:'NO', MAQ:esMaquina, JOC:esJoc, JUG:esJug, FOTO:'NO', PUNTUA1:sonPunts1, PUNTUA2:sonPunts2, PUNTUA3:sonPunts3}, //date("Y-n-j H:i:s")
	      success: function(Resultat1){console.log('carregar NO : he enviat i rebo aquest return: ' , Resultat1);}});
		// return false;
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
      
	if (isset($_SESSION['emplenat'])) {

		if (($_SESSION['emplenat'])=="NO")
		{
			$query   = 'SELECT _04_loginUsuari FROM usuari;';
			$response = dbExec($query)[1];
			$_SESSION['resultat']=$response;
			echo '<form id="dialog" method="POST">';
			echo 'Tria jugador :<select align="right" id="I_User" name="User">';

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

			$_SESSION['emplenat']="SI";
		} 
		elseif ($_SESSION['emplenat'] =="SI") 
		{

			$IDMAQ = $_REQUEST['MAQ'];
			
	  $IDMAQ2 = $_REQUEST['Combinacio'];
	  print_r($IDMAQ2);
	  //<b>Notice</b>:  Undefined index: Combinacio in <b>/opt/lampp/htdocs/Projectes/pinball/html/partides.php</b> on line <b>178</b><br />
			
			$IDJOC = $_REQUEST['JOC'];
			$IDJUG = $_REQUEST['JUG'];
			//$IDDATA = $_REQUEST['DATA'];
			$IDFOTO = $_REQUEST['FOTO'];
			$PUNTUA_1 = $_REQUEST['PUNTUA1'];
			$PUNTUA_2 = $_REQUEST['PUNTUA2'];
			$PUNTUA_3 = $_REQUEST['PUNTUA3'];
		 
			if (($_REQUEST['carregar'])=="SI"){
				echo "<p>carregant dades a les variables</p>"; 
			}	      
			
			if (($_REQUEST['carregar'])=="NO")
			{
			  
		      echo "<p>S'ha fet l'insert!</p>"; 
		      //<p>S'ha fet l'insert!</p><br />
		      
			    $query   = 'INSERT INTO joc VALUES (NULL, "'.$IDMAQ.'", "'.$PUNTUA_2.'", "'.$IDJUG.'", "'.$PUNTUA_3.'", NOW(), NULL, NULL);'; // "' .$IDMAQ .'","' .$IDJOC .'","' .$IDJUG .'"
			    $response = dbExec($query)[1];
			    
			    $_SESSION['emplenat']="NO";
			    return $response;
			    //<b>Warning</b>:  mysql_fetch_assoc() expects parameter 1 to be resource, boolean given in <b>/opt/lampp/htdocs/Projectes/pinball/src/pinball.h</b> on line <b>74</b><br />

			    header('location:partides.php');
		    } 
		} 
	} 
    else 
    {
		$_SESSION['emplenat']="NO";
		header('location:partides.php');
	}
?>
	    <div id="desplegable"> </div> </br></br></br>
	    <div id="informacions">  </div> </br></br></br>
    </section>
    <footer>
	    <?php footer(); ?>
    </footer>
  </div>
</body>	
</html>

<?php
// if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);
?>
