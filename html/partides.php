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
    $("#I_User").change(function(){
	iuserlogin = document.getElementById("I_User").value;
	
	$.ajax({
	    url: "query.php",
	    data: {pid:'6000', idUserPart:iuserlogin},
	    success: function(Resultat1){crearmenu(Resultat1);}});
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
	  var esTorneig = dadesfiltrades[i].nomTorn;
	  var esMaquina = dadesfiltrades[i].idMaq;
	  var esJoc = dadesfiltrades[i].idJoc;
	  var esJug = dadesfiltrades[i].idJug;
	  var esIdTorneig = dadesfiltrades[i].idTorn;
	  
	  contingut += '<option id="'+esTorneig+'*'+esMaquina+'" value="'+esTorneig+'*'+esMaquina+'">Torneig: '+esTorneig+' // Maquina: '+esMaquina+'</option>';
	  //  console.log("esTorneig: " , esTorneig);  // !!!!!!!!!!!!!!!!!!!! COMA ,,,, i NO + ,,,,, !!!!!!!!!!!!!!!!!!!! 
	 
      	  } // end for
	
	  $("#seleccionador").html(contingut);
	  document.getElementById('informacions').innerHTML = "";
	  
	  console.log(document.getElementsByName('Combinacio').value);
	  
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
	    
	    var sonPunts1 = "";
	    var sonPunts2 = "";
	    var sonPunts3 = "";
	    
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
	      success: function(Resultat1){console.log('he carregat els valors que s han d enviar');}});
	    
	  }); // end jQuery onchange combinacio
    } // end crearmenu
</script>
	 
</head>

<body>
  <div id="main">
    <header>
	    <h1>tria</h1>
    </header>
    <menu>
	    <?php menu(); ?>
    </menu>
    
    <section>
	<h1>tria</h1>
	    
      <?php 
      
	if (isset($_SESSION['emplenat']))  {
	      if (($_SESSION['emplenat'])=="NO"){
		  $query   = 'SELECT _04_loginUsuari FROM usuari;';
		  $response = dbExec($query)[1];
		  $_SESSION['resultat']=$response;
		  //var_dump($_SESSION['resultat'])
		  //array(5) { 
		  //[0]=> object(stdClass)#1 (1) { ["_04_loginUsuari"]=> string(5) "admin" } 
		  //[1]=> object(stdClass)#2 (1) { ["_04_loginUsuari"]=> string(4) "joan" } 
		  //[2]=> object(stdClass)#3 (1) { ["_04_loginUsuari"]=> string(5) "josep" } 
		  //[3]=> object(stdClass)#4 (1) { ["_04_loginUsuari"]=> string(6) "miquel" } 
		  //[4]=> object(stdClass)#5 (1) { ["_04_loginUsuari"]=> string(3) "rob" } } 
		  
		  //$row = $response->fetch_assoc(); // ->fetch_assoc() Mètode de l'objecte RESULT que em permet accedir al seu contingut
		  //Fatal error: Call to a member function fetch_assoc() on a non-object in /opt/lampp/htdocs/Projectes/pinball/html/partides.php on line 42
		  
		  echo '<form action="partides.php?carregar=NO" method="POST">';
		  echo '<select align="right" id="I_User" name="User">';
		
		    foreach($response as $jugador) {
		    echo '<option value="'.$jugador->_04_loginUsuari .'">' .$jugador->_04_loginUsuari .'</option>';
		    }
		  echo '</select></br>'; 
		  echo '<div id="llistat"></div>';
		  echo 'PUNTUACIONS <div id="puntuacions"> Ronda 1 <input id="punt1" type="number" value="" readonly /> Ronda 2 <input id="punt2" type="number" value="" readonly /> Ronda 3 <input id="punt3" type="number" value="" readonly /> </div>';
		  echo '</br></br></br> <button type="submit" />Enviar dades a la BB.DD';
		  echo '</form"></br>'; 
		      
		  $_SESSION['emplenat']="SI";
		 } // end IF Emplenat NO
		  
	      else {
			$IDMAQ = $_REQUEST['MAQ'];
			var_dump($IDMAQ);
			
			$IDJOC = $_REQUEST['JOC'];
			$IDJUG = $_REQUEST['JUG'];
			//$IDDATA = $_REQUEST['DATA'];
			$IDFOTO = $_REQUEST['FOTO'];
			$PUNTUA_1 = $_REQUEST['PUNTUA1'];
			$PUNTUA_2 = $_REQUEST['PUNTUA2'];
			$PUNTUA_3 = $_REQUEST['PUNTUA3'];
			 
		      if (($_REQUEST['carregar'])=="SI"){
		      
		      echo "<p>carregant dades a les variables</p>"; 
		   
		 //   $opcio = isset($_REQUEST['novaopcio'])  ? $_REQUEST['novaopcio'] : "";
		      } // end IF SI
	      
		      if (($_REQUEST['carregar'])=="NO"){
			  
		   // echo "<p>S'ha fet l'insert!</p>"; 
		    
			    $query   = 'INSERT INTO joc VALUES (NULL, "'.$PUNTUA_1.'", "'.$PUNTUA_2.'", "'.$IDJUG.'", "'.$PUNTUA_3.'", NOW(), NULL, NULL);'; // "' .$IDMAQ .'","' .$IDJOC .'","' .$IDJUG .'"
			    $response = dbExec($query)[1];
			    return $response;
			      
			    $_SESSION['emplenat']="NO";
		    } //end IF NO
		    
		 // }//end IF isset
		
		} //end ELSE
	   } // END IF
    
	    else {
		$_SESSION['emplenat']="NO";
		header('location:partides.php');
	    } // end Else
	
	?>
    </section>
     
    <div id="desplegable"> </div> </br></br></br>
    <div id="informacions">  </div> </br></br></br>
    <footer>
	    <?php footer(); ?>
    </footer>
  </div>
</body>	
</html>

<?php
if (isset($_POST['entrar'])) controlAcces($_POST["usr"],$_POST["pwd"]);

function formatarDataHora($dataHora)
{

} 
 /*
 	 
// {"total":11,"page":0,"records":[
//{"idMaq":"10","macMaq":"","idJoc":"101","nomJoc":"CARS & GIRLS","idJug":"2","loginUsuari":"joan","idTorn":"1001","nomTorn":"arcade 2014"},
//{"idMaq":"30","macMaq":"","idJoc":"101","nomJoc":"CARS & GIRLS","idJug":"2","loginUsuari":"joan","idTorn":"1001","nomTorn":"arcade 2014"},
//{"idMaq":"40","macMaq":"","idJoc":"101","nomJoc":"CARS & GIRLS","idJug":"2","loginUsuari":"joan","idTorn":"1001","nomTorn":"arcade 2014"},
//{"idMaq":"20","macMaq":"","idJoc":"103","nomJoc":"LUCKY FIRE","idJug":"2","loginUsuari":"joan","idTorn":"1003","nomTorn":"castles 2014"},
//{"idMaq":"30","macMaq":"","idJoc":"103","nomJoc":"LUCKY FIRE","idJug":"2","loginUsuari":"joan","idTorn":"1003","nomTorn":"castles 2014"},
//{"idMaq":"40","macMaq":"","idJoc":"103","nomJoc":"LUCKY FIRE","idJug":"2","loginUsuari":"joan","idTorn":"1003","nomTorn":"castles 2014"},
//{"idMaq":"50","macMaq":"","idJoc":"103","nomJoc":"LUCKY FIRE","idJug":"2","loginUsuari":"joan","idTorn":"1003","nomTorn":"castles 2014"},
//{"idMaq":"10","macMaq":"","idJoc":"100","nomJoc":"ARMAGEDON","idJug":"2","loginUsuari":"joan","idTorn":"1000","nomTorn":"fifa 2014"},
//{"idMaq":"40","macMaq":"","idJoc":"100","nomJoc":"ARMAGEDON","idJug":"2","loginUsuari":"joan","idTorn":"1000","nomTorn":"fifa 2014"},
//{"idMaq":"10","macMaq":"","idJoc":"100","nomJoc":"ARMAGEDON","idJug":"2","loginUsuari":"joan","idTorn":"1005","nomTorn":"mytorn 2014"},
//{"idMaq":"40","macMaq":"","idJoc":"100","nomJoc":"ARMAGEDON","idJug":"2","loginUsuari":"joan","idTorn":"1005","nomTorn":"mytorn 2014"}]}

*/
?>
