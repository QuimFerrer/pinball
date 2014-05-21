<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
	<style>
		
	</style>
</head>
<body>

<?php 

	// Recupera POST usr i pwd
	// Si usr= "adm" && pwd="adm"
	// directament a usuaris.php?id=adm
	// Si no, buscar a BD i en funcio del resultar entrar
    // usuaris.php?id=usr
	// El pas de params es farà per SESSION, de moment per GET

	if ($_POST['usr'] == 'adm')
		header("Location:usuaris.php?id=adm");
	else if ($_POST['usr'] == 'usr')
		header("Location:usuaris.php?id=usr");
	else
		header("Location:inici.php");

 ?>
	
</body>
</html>