<?php

include ("../src/pinball.h");
include ("../src/seguretat.php");
//Script per usar gmail amb la llibreria PHP Mailer, desde un localhost (XAMPP). 
//Utilitzacio d'una clase de la llibreria.
include('../src/PHPMailer/class.phpmailer.php');


comprovaSessio();


define("DEBUG",0);
define("HOST","smtp.gmail.com");
define("PORT_HOST",587);
define("USER","activar.cuenta.usuario@gmail.com");
define("PASS","sudoku06");
define("FROM","activar.cuenta.usuario@gmail.com");
define("NOM_FROM","Pinball");
define("NOM_FROM_CONTACTE","Contacte Pinball");
define("DESTINACION_UPLOADS", "./uploads/");
define("CANAL_ENVIO","PHPMAILER");
define("PATH_MAIL_SUSCRIPCION","http://localhost/curso/pinball/registro/");
// define("PATH_MAIL_SUSCRIPCION","http://localhost/pinball/registro/");
// define("CANAL_ENVIO","SENDMAIL_PHP");
define("SIZE_UPLOAD",2000000);


$pid      = isset($_REQUEST['pid'])        ? (int) $_REQUEST['pid']  : 0;


function buildEmail($tipusMail, $dades)
{
    $res = true;
    if (CANAL_ENVIO === "PHPMAILER")
        {
        if ($tipusMail == "contacte") $resMail = montaMailContacte($dades);
        if ($tipusMail == "registre") $resMail = montaMailRegistre($dades);        
        if ($resMail != "") $res = false;
        }
    if (CANAL_ENVIO === "SENDMAIL_PHP")
        {
        if ($tipusMail == "contacte") $resMail = montaMailContacte_php($dades);
        if ($tipusMail == "registre") $resMail = montaMailRegistre_php($dades);        
        if (!$resMail) $res = false;
        }
    return($res);
}

// monta mail con librería phpmailer

function montaMailContacte($dades)
{
    $isHtml  = true;
    $altBody = "";
    $to      = FROM;
    $nomTo   = NOM_FROM_CONTACTE;
    $subject = "Contacte des de Pinball";
    $body  = "S'ha rebut un missatge de contacte des de la web de Pinball amb les següents dades: <br><br><br>";
    $body .= "<b>Nom       : " . "</b>  ". $dades['nom'] .       "<br><br>";
    $body .= "<b>Cognoms   : " . "</b>  ". $dades['cognoms'] .   "<br><br>";
    $body .= "<b>eMail     : " . "</b>  ". $dades['email'] .     "<br><br>";
    $body .= "<b>Comentari : " . "</b><br>". nl2br($dades['comentari']) . "<br><br>";

    return( prepMail($isHtml, $subject, $body, $altBody, $to, $nomTo) );
}

function montaMailRegistre($dades)
{
    $isHtml  = true;
    $altBody = "";
    $to      = FROM;
    $nomTo   = NOM_FROM_CONTACTE;
    $subject = "Contacte des de Pinball";
    $body  = "S'ha rebut un missatge de contacte des de la web de Pinball amb les següents dades: <br><br><br>";
    $body .= "<b>Nom       : " . "</b><br>". $dades->nom .       "<br><br>";
    $body .= "<b>Cognoms   : " . "</b><br>". $dades->cognoms .   "<br><br>";
    $body .= "<b>eMail     : " . "</b><br>". $dades->email .     "<br><br>";
    $body .= "<b>Comentari : " . "</b><br>". $dades->comentari . "<br><br>";

    return( prepMail($isHtml, $subject, $body, $altBody, $to, $nomTo) );
}

// prepara y envía mail con phpmailer

function prepMail($isHtml, $subject, $body, $altBody, $to, $nomTo)
{
    $params = (object) array(   "isHtml"      => $isHtml,
                                "debug"       => DEBUG,
                                "host"        => HOST,
                                "port"        => PORT_HOST,
                                "username"    => USER,
                                "password"    => PASS,
                                "from"        => FROM,
                                "nomFrom"     => NOM_FROM,
                                "replayTo"    => FROM,
                                "nomReplayTo" => NOM_FROM,
                                "subject"     => $subject,
                                "altBody"     => $altBody,
                                "body"        => $body,
                                "to"          => $to,
                                "nomTo"       => $nomTo);
   return (enviarMail($params));
}


function enviarMail($params)
{

    $mail = new PHPMailer(); //Crea un objecte/instancia.
    $mail->IsSMTP(); // enviament per protocol SMTP
    $mail->IsHTML($params->isHtml);
     

    // Habilita el SMTPDebug per test.
    // 0 = off (producción)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug  = $params->debug; 
    $mail->Host       = $params->host; //Estableix GMAIL com el servidor SMTP.
    $mail->SMTPAuth   = true; //Habilita la autenticaciÃ³ SMPT.
    $mail->SMTPSecure = "tls"; //Estableix el prefix del servidor.
    $mail->Port       = $params->port ; //Estableix el port SMTP.
    $mail->Username   = $params->username; //Username de la compte de correu que s'utilitza com a servei d'enviament.
    $mail->Password   = $params->password; //contrasenya del compte.
     
    // Parametres de Remitents
    $mail->SetFrom($params->from, $params->nomFrom);
    $mail->AddReplyTo($params->replayTo,$params->nomReplayTo);
    $mail->Subject  = $params->subject;
    //Messatge d'advertencia pels usuaris que no utilitzan un client HTML.
    $mail->AltBody  = $params->altBody;
     
    // Construccio del Body
    $mail->MsgHTML($params->body);

    // Adreça del destinatari
    $mail->AddAddress($params->to,$params->nomTo);

    // Enviament del email     
    $res = "";
    if(!$mail->Send())
        $res = $mail->ErrorInfo;

    return ($res);
}

// monta mail con sendmail de php

function montaMailContacte_php($dades)
{
    $isHtml  = true;
    $to      = FROM;
    $nomTo   = NOM_FROM_CONTACTE;

    $body  = "S'ha rebut un missatge de contacte des de la web de Pinball amb les següents dades: <br><br><br>";
    $body .= "Nom       : " . $dades->nom .       "<br>";
    $body .= "Cognoms   : " . $dades->cognoms .   "<br>";
    $body .= "eMail     : " . $dades->email .     "<br>";
    $body .= "Comentari : " . $dades->comentari . "<br>";

    $subject = "Contacte des de Pinball";    

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    if($isHtml)
        $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    else
        $headers .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: " . NOM_FROM . " " . FROM . " \r\n";
    $headers .= "Reply-To: " . FROM . " \r\n";;
    $headers .= "Return-path: " . FROM . " \r\n";;

    $subject = mb_encode_mimeheader($subject);

    $message  = $body;
    $message .= "E-mail   : " . FROM . " \r\n";
    $message .= "Enviat   : " . date('d/m/Y', time());
    // $message = htmlspecialchars($message);     // Emmascarar caracters especials d' HTML
    $message = stripslashes($message);         // Eliminar barres invertides

    return ( mail( $to, $subject, $message, $headers) );
}

function montaMailRegistre_php($dades)
{
    $isHtml  = true;
    $to      = FROM;
    $nomTo   = NOM_FROM_CONTACTE;

    $body  = "S'ha rebut un missatge de contacte des de la web de Pinball amb les següents dades: <br><br><br>";
    $body .= "Nom       : " . $dades->nom .       "<br>";
    $body .= "Cognoms   : " . $dades->cognoms .   "<br>";
    $body .= "eMail     : " . $dades->email .     "<br>";
    $body .= "Comentari : " . $dades->comentari . "<br>";

    $subject = "Contacte des de Pinball";    

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    if($isHtml)
        $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    else
        $headers .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: " . NOM_FROM . " " . FROM . " \r\n";
    $headers .= "Reply-To: " . FROM . " \r\n";;
    $headers .= "Return-path: " . FROM . " \r\n";;

    $subject = mb_encode_mimeheader($subject);

    $message  = $body;
    $message .= "E-mail   : " . FROM . " \r\n";
    $message .= "Enviat   : " . date('d/m/Y', time());
    // $message = htmlspecialchars($message);     // Emmascarar caracters especials d' HTML
    $message = stripslashes($message);         // Eliminar barres invertides

    return ( mail( $to, $subject, $message, $headers) );
}


/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

switch($pid)
    {
    case 1000:
        $response = buildEmail("contacte", $_REQUEST['record']);
        break;
    default:
        $response = "";
        break;
    }
    
echo json_encode( $response );

?> 