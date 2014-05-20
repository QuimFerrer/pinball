/*
 * JS for pinball project
 */

//Formulari d'accés usuaris registrats

var access = document.querySelector("#access");

access.onsubmit = function(e) {
	e.preventDefault();

	// Preparar enviament per ajax i POST
	// La URL és : login.php

	// De moment, per a proves
	this.action = "login.php";
	this.method = "POST";
	this.submit();

	return false;
}
