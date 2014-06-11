<?php

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

?> 