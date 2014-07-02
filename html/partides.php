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
	 
	$(document).ready(function(){
	    $("#I_User").change(function(){
		var iuserlogin = document.getElementById("I_User").value;
		//alert(iuserlogin);
		//var params={UserAjax:iuserlogin};
		//pantallajoc(iuserlogin);
		
		$.ajax({
			url: "query.php",
			data: {pid:'5041', params:iuserlogin}
		})
		.always( function(e) {
		    console.log(e);
		})
		.error( function(e) {
		    console.log(e);
		});
	
		/*
		$.ajax({
		    data: {pid:5041}, //'$_REQUEST['5041']',
		    url:'query.php',
		    done:function(e){
		       console.log(e);
		    }//dadesjugador){pantallajoc(dadesjugador);} // sense coma al final si es la última
		    //error: 	function(){$("#confirmerror").html("Error en les dades");}
		    });
		*/
		});
	    }); 
	    
	    function pantallajoc(dades){
	    //alert(dades);
	    }
	     
	 </script>
	 
</head>

<body>
  <div id="main">
	  <header>
		  <h1>Generar Partida</h1>
	  </header>
	  <menu>
		  <?php menu(); ?>
	  </menu>
	  <section>
		  <h1>Tria les dades de la partida</h1>
		  
	    <?php 
	    
	      if (isset($_SESSION['emplenat']))  {
		    if (($_SESSION['emplenat'])=="NO"){
			echo "Hola 1 dins el php </br>";
			
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
		      }
			
		      else {
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
	      }
	      
	      ?>
	       
	  </section>
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

?>
