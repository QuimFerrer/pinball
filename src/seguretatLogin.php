<?php


function controlLogin($user, $pswd)
{
    if ($user == 'joan' or $user == 'josep' or $user == 'miquel' or
        $user == 'rob' or $user == 'admin')
          $res = controlLoginSenseMD5($user, $pswd);
    else
          $res = controlLoginAmbMD5($user, $pswd);
    return ($res);
}

function controlLoginSenseMD5($user, $pswd)
{
    $query = 'SELECT @nl:=@nl+1 as estat, u.*
              FROM usuari as u, (SELECT @nl:=0) as nnl
              WHERE u._04_loginUsuari = "' . $user
              . '" and u._05_pwdUsuari = "' . $pswd
              . '" and (u._10_datBaixaUsuari IS NULL OR u._10_datBaixaUsuari = "");';
    $res = dbExec($query)[1];    
    if ($res != NULL)
        {
        //usuari i contrasenya vàlids
        //assigno un nom a la sessió per poder guardar diferentes dades 
        session_name("loginUsuari");             
        //defineixo una sessió i guardo dades
        session_start();
        $_SESSION["autentificat"]   = "SI";
        $_SESSION["login"]          = $user;
        $_SESSION["nomUsr"]         = $res[0]->_02_nomUsuari;
        $_SESSION["cognomUsr"]      = $res[0]->_03_cognomUsuari;
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

function controlLoginAmbMD5($user, $pswd)
{
    $estat = 0;
    $response = getUsuari(0, $user, $pswd, $estat);
    if ( ($response['status'] != "error") and ($response['total'] == 1) )
        {
        //usuari i contrasenya vàlids
        //assigno un nom a la sessió per poder guardar diferentes dades 
        session_name("loginUsuari");             
        //defineixo una sessió i guardo dades
        session_start();
        $_SESSION["autentificat"]   = "SI";
        $_SESSION["login"]          = $user;
        $_SESSION["nomUsr"]         = $response['records'][0]->_02_nomUsuari;
        $_SESSION["cognomUsr"]      = $response['records'][0]->_03_cognomUsuari;        
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


function getUsuari($id, $user="", $pswd="", $estat=0)
{
    if ($id != 0)
            $query = sprintf("SELECT *
                             FROM usuari
                             WHERE _01_pk_idUsuari = '%d';",$id);        
        else
            $query = sprintf("SELECT *
                             FROM usuari
                             WHERE _04_loginUsuari = '%s' AND
                                   _05_pwdUsuari   = '%s' AND
                                   _12_estatUsuari = '%d' AND
                                   (_10_datBaixaUsuari IS NULL OR
                                    _10_datBaixaUsuari = '');",$user,
                                                               md5($pswd),
                                                               $estat);
    $response = dbExec($query);
    $response = controlErrorQuery($response);
    return ($response);
}

?> 