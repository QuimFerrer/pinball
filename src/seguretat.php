<?php

// temps màxim de sessió
define("TIMEOUT",1000000);

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

function generaCodiActivacioAleatori($length)
    {
    $randstr = "";
    for($i=0; $i<$length; $i++)
        {
        $randnum = mt_rand(0,61);
        if ($randnum < 10) $randstr .= chr($randnum+48);
        else
            {
            if ($randnum < 36) $randstr .= chr($randnum+55);
            else               $randstr .= chr($randnum+61);
            }
        }
    return ( md5($randstr) );
    } 


function updateActivacioUsuari($id, $activateKey)
    {
    $msg = "";
    $response = getUsuari($id);
    if ( ($response['status'] != "error") and ($response['total'] == 1) )
        if ($response['records'][0]->_12_estatUsuari == 0)
            $msg = "Aquest compte ja està activat. Ja pots accedir a la web de Pinball. Gràcies.";
        else
            if ($response['records'][0]->_11_activacioUsuari === $activateKey)
                {
                $query  = sprintf("UPDATE usuari
                                        SET _12_estatUsuari   = '%d'
                                        WHERE _01_pk_idUsuari = '%d';",0,$id);
                $response = dbExec($query,3);
                $response = (object)controlErrorQuery($response);
                if ($response->status != "error")
                    $msg = "El seu compte s'ha activat correctament. Ja pot accedir a la web de Pinball. Gràcies.";
                else
                    $msg = "Error en l'activació del seu compte. Torni a intentar-ho o faci un nou registre des de la web. Gràcies.";
                }
    return( $msg );
    }

?> 