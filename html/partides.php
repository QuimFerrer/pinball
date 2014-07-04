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
	    data: {pid:'5041', idUserPartida:iuserlogin},
	    success: function(Resultat1){crearmenu1(Resultat1);}});
	});
    
    
    function crearmenu1(dadesretornades1){
	var dadesfiltrades1= JSON.parse(dadesretornades1); 
	var torneigfiltrats = dadesfiltrades1.records;
	 
	$("#desplegable").html('Tria una maquina <select id="seleccionador" label="Combinacio" name="botomaq"> </select>');
	
	var grups = "";
	if (dadesfiltrades1.total>=0) {
	  for (var i=0; i<torneigfiltrats.length; i++){
	  console.log("i: " + i);
	  var estorneig = torneigfiltrats[i].nomTorn;
	  var esjoc = torneigfiltrats[i].nomJoc;
	  document.getElementById('paquetdades2').innerHTML += " / " + estorneig + " ** " + esjoc + " ** " + iuserlogin; 
	  
	  
	   // for (estorneig in torneigfiltrats[i]){
	    console.log("estorneig: " + estorneig);
	    grups += '<optgroup id="'+i+'" label="'+estorneig+'">'+estorneig+'</optgroup>'; 
	    //+estorneig+'">'+estorneig+
	    //+idMaq[nomTorn]+'">'+idMaq[nomTorn]+
	    //+estorneig[nomTorn]+'">'+estorneig[nomTorn]+
	   //}
	    document.getElementById('paquetdades2').innerHTML = grups;
	    $("#seleccionador").html(grups); 
	
	    $.ajax({
	    url: "query.php",
	    data: {pid:'6000', idUserPartida:iuserlogin, novaopcio:estorneig},
	    success: function(Resultat2){crearmenu2(Resultat2);}});
	
	    
	    function crearmenu2(dadesretornades2){
		    var dadesfiltrades2 = JSON.parse(dadesretornades2);  
		    var maquinafiltrada = dadesfiltrades2.records; 
			document.getElementById('paquetdades1').innerHTML = dadesretornades2; // veure al final del docu una copia del resultat
			console.log("dadesfiltrades2: " , dadesfiltrades2);  // !!!!!!!!!!!!!!!!!!!! COMA ,,,, i NO + ,,,,, !!!!!!!!!!!!!!!!!!!!

		    
		    var contingut = "";
		    if (dadesfiltrades2.total>=0) {
			  for (var j=0; j<maquinafiltrada.length; j++){
			  //console.log(maquinafiltrada.length);
			 // document.getElementById('paquetdades3').innerHTML += " / " + maquinafiltrada[j].idMaq; 
			  console.log("j: " + j);

			      var esmaquina = maquinafiltrada[j].idMaq;
			      
				//for (idMaq in maquinafiltrada[j]){
				console.log("esmaquina: " + esmaquina);
				
				console.log("j: " + j);
				contingut += '<option value="'+esmaquina+'" name="'+esmaquina+'">'+esmaquina+'</option>';
				//contingut += 'hola';
				//}
				
			    } // end for j
			    
			    document.getElementById('paquetdades3').innerHTML = contingut;
			    $("#"+i+"").html(contingut); // "#"+i+""   '#group'+i+'"'  
			    
			    } // end if 
			    
	    } // end crearmenu2
	} // end for i
	} // end if
	
	else document.getElementById('paquetdades2').innerHTML = "No hi ha cap torneig";
		
    } // end crearmenu1
     
   });
     
</script>
	 
</head>

<body>
  <div id="main">
    <header>
	    <h1>Marcos, deixa de copiar!!</h1>
    </header>
    <menu>
	    <?php menu(); ?>
    </menu>
    
    <section>
	<h1>Marcos, deixa de copiar!!</h1>
	    
      <?php 
      
	/*if (isset($_SESSION['emplenat']))  {
	      if (($_SESSION['emplenat'])=="NO"){
		  echo "Hola 1 dins el php </br>";*/
		  
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
		  
		  echo '<form action=" partides.php" method="POST">';
		  echo '<select align="right" id="I_User" name="User">';
		
		    foreach($response as $jugador) {
		    echo '<option value="'.$jugador->_04_loginUsuari .'" name="Jugador">' .$jugador->_04_loginUsuari .'	</option>';
		    }
		  echo '</select></br>'; 
		  echo '<button type="submit" />Enviar dades a la BB.DD';
		  echo '</form"></br>'; 
		      
		  $_SESSION['emplenat']="SI";
		// }
		  
	/*	else {
		  if (($_SESSION['emplenat'])=="SI"){
		  echo "<p>soc a l'insert</p>";
		  //var_dump($_SESSION['resultat'])
		  //array(5) { 
		  //[0]=> object(stdClass)#1 (1) { ["_04_loginUsuari"]=> string(5) "admin" } 
		  //[1]=> object(stdClass)#2 (1) { ["_04_loginUsuari"]=> string(4) "joan" } 
		  //[2]=> object(stdClass)#3 (1) { ["_04_loginUsuari"]=> string(5) "josep" } 
		  //[3]=> object(stdClass)#4 (1) { ["_04_loginUsuari"]=> string(6) "miquel" } 
		  //[4]=> object(stdClass)#5 (1) { ["_04_loginUsuari"]=> string(3) "rob" } } 
	    
		    $query   = 'INSERT INTO joc VALUES (NULL,"' .$_SESSION['resultat'][3]->_04_loginUsuari .'","descJoc45","imgJoc45",0,NOW(),NULL,NULL);';
		    $response = dbExec($query)[1];
		    return $response;
		    
		    $_SESSION['emplenat']="NO";
		  }
		}
	  }
	  
	else {
	    echo "Hola 3 dins el php </br>"; 
	    $_SESSION['emplenat']="NO";
	    header('location:partides.php');
	}*/
	
	?>
	  
    </section>
     
    <div id="paquetdades1"> paquetdades1: </div> </br></br></br>
    <div id="paquetdades2"> paquetdades2: </div> </br></br></br>
    <div id="paquetdades3"> paquetdades3: </div>
    <div id="desplegable"> desplegable </div>
    
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
{"total":11,"page":0,"records":[{"idMaq":"10","macMaq":"","idJoc":"100","nomJoc":"ARMAGEDON","idJug":"2","loginUsuari":"joan","idTorn":"1005","nomTorn":"mytorn 2014"},{"idMaq":"10","macMaq":"","idJoc":"100","nomJoc":"ARMAGEDON","idJug":"2","loginUsuari":"joan","idTorn":"1000","nomTorn":"fifa 2014"},{"idMaq":"10","macMaq":"","idJoc":"101","nomJoc":"CARS & GIRLS","idJug":"2","loginUsuari":"joan","idTorn":"1001","nomTorn":"arcade 2014"},{"idMaq":"20","macMaq":"","idJoc":"103","nomJoc":"LUCKY FIRE","idJug":"2","loginUsuari":"joan","idTorn":"1003","nomTorn":"castles 2014"},{"idMaq":"30","macMaq":"","idJoc":"101","nomJoc":"CARS & GIRLS","idJug":"2","loginUsuari":"joan","idTorn":"1001","nomTorn":"arcade 2014"},{"idMaq":"30","macMaq":"","idJoc":"103","nomJoc":"LUCKY FIRE","idJug":"2","loginUsuari":"joan","idTorn":"1003","nomTorn":"castles 2014"},{"idMaq":"40","macMaq":"","idJoc":"100","nomJoc":"ARMAGEDON","idJug":"2","loginUsuari":"joan","idTorn":"1005","nomTorn":"mytorn 2014"},{"idMaq":"40","macMaq":"","idJoc":"100","nomJoc":"ARMAGEDON","idJug":"2","loginUsuari":"joan","idTorn":"1000","nomTorn":"fifa 2014"},{"idMaq":"40","macMaq":"","idJoc":"101","nomJoc":"CARS & GIRLS","idJug":"2","loginUsuari":"joan","idTorn":"1001","nomTorn":"arcade 2014"},{"idMaq":"40","macMaq":"","idJoc":"103","nomJoc":"LUCKY FIRE","idJug":"2","loginUsuari":"joan","idTorn":"1003","nomTorn":"castles 2014"},{"idMaq":"50","macMaq":"","idJoc":"103","nomJoc":"LUCKY FIRE","idJug":"2","loginUsuari":"joan","idTorn":"1003","nomTorn":"castles 2014"}]}
*/
?>
