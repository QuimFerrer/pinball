<?php

// tiempo máximo de sesión
define("TIMEOUT",10000);

function comprovaSessio()
{
session_name("loginUsuari"); 
//Inicia la sessió
session_start();

//comprova que el usuari está autentificat

if (isset($_SESSION['autentificat']))
    {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    if ($_SESSION['autentificat'] != "SI")
	    {
        //si no existeix, envio a la pàgina de autentificació
        $extra = 'inici.php';
        header("Location: http://$host$uri/$extra");
    	}
    else
        if( IsEndSession() == "SI")
            { 
            $extra = 'logout.php';
            header("Location: http://$host$uri/$extra");
            }
    }
}

function isEndSession()
{
    $_SESSION['endTime'] = "";
    if (isset($_SESSION['lastAccessTime']))
        {
        $now = date("Y-n-j H:i:s"); 
        if ( (strtotime($now)-strtotime($_SESSION["lastAccessTime"])) > TIMEOUT )
            $_SESSION['endTime'] = "SI";
        else
            $_SESSION["lastAccessTime"] = $now;
        }
    return ($_SESSION['endTime']);
}

// obté la sessió i si ha caducat des de query.php

function isEndSessionInQuery()
{
session_name("loginUsuari"); 
session_start();
isEndSession();
}

function controlLogout()
{
    session_name("loginUsuari"); 
    session_start();

    $sessioAutenticada = controlAutentificacio();
    $sessioCaducada    = isEndSession();
    
    session_destroy();
    $arr[0] = $sessioAutenticada;
    $arr[1] = $sessioCaducada;
    return ($arr);
}

function controlAutentificacio()
{
    $res = "";
    if (isset($_SESSION['autentificat']))
        if ($_SESSION['autentificat'] == "SI")
            $res = "SI";
    return ($res);
}


?> 