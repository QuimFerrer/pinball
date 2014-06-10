<?php

// tiempo máximo de sesión
define("TIMEOUT",10);
define("USUARI_ADM","adm");

function controlLogin($user,$pswd)
{
    $query = 'SELECT @nl:=@nl+1 as estat, u.*
              FROM usuari as u, (SELECT @nl:=0) as nnl
              WHERE u._04_loginUsuari = "' . $user
              . '" and u._05_pwdUsuari = "' . $pswd 
              . '" and (u._10_datBaixaUsuari IS NULL OR u._10_datBaixaUsuari = "");';
    $res = dbExecLocal($query);

    if ($res != NULL)
        {
        //usuari i contrasenya vàlid
        //assigno un nom a la sessió per poder guardar diferentes dades 
        session_name("loginUsuari");             
        //defineixo una sessió i guardo dades
        session_start();
        $_SESSION["autentificat"] = "SI";
        $_SESSION["tipoUsr"] = "usuari";
        if ($user == USUARI_ADM)
            $_SESSION["tipoUsr"] = "admin";
        $_SESSION["login"] = $user;
        $_SESSION["nomUsr"] = $res[0]->_02_nomUsuari;
        $_SESSION["cognomUsr"] = $res[0]->_03_cognomUsuari;
        //defineixo la data i hora d'inici de sessió en format aaaa-mm-dd hh:mm:ss 
        $_SESSION['lastAccessTime'] = date("Y-n-j H:i:s");
        $res = "SI";
        }
    else
        {
        // delay failed output by 2 seconds
        // to prevent bruit force attacks
        sleep(1);
        $res="";
        }
    return ($res);
}

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