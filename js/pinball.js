/*
 * JS for pinball project
 */

//Formulari d'accés usuaris registrats

var access = document.querySelector("#access");


// window.onload = init();

// function init()
// {
// 	access['sortir'].disabled = true;
// }

// access.onsubmit = function(e) {
// 	e.preventDefault();

// 	// Preparar enviament per ajax i POST
// 	// La URL és : login.php

// 	// De moment, per a proves
// 		this.action = "login.php";
// 		this.method = "POST";
// 		this.submit();

// 	return false;
// }

access.onclick = function(e) {
	e.preventDefault();

	// Preparar enviament per ajax i POST
	// La URL és : login.php

	// De moment, per a proves
	accio = e.target.value;
	// console.log(accio);
	if (accio == "Sortir")
		{
		this.action = "logout.php";
		this.method = "POST";
		this.submit();
		}
	if (accio == "Entrar")
		{
		this.action = "login.php";
		this.method = "POST";
		this.submit();
		}		

	return false;
}