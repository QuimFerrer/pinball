/*
 * JS for pinball project
 */

//Formulari d'accés usuaris registrats

var access = document.querySelector("#access");

access.onsubmit = function(e) {
	e.preventDefault();
	this.action = "login.php";
	this.method = "POST";
	this.submit();

	return false;
}