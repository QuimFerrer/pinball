<?php

//Script per usar gmail amb la llibreria PHP Mailer, desde un localhost (XAMPP). 
//Utilitzacio d'una clase de la llibreria.
include('../src/PHPMailer/class.phpmailer.php');

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
// define("CANAL_ENVIO","SENDMAIL_PHP");
define("PATH_MAIL_SUSCRIPCION","http://localhost/pinball/registre/");
define("SIZE_UPLOAD",2000000);


function buildEmail($tipusMail, $dades)
{
    $res = true;
    if (CANAL_ENVIO === "PHPMAILER")
        {
        $resMail = "";            
        switch( $tipusMail )
            {
            case "contacte":
                $resMail = montaMailContacte($dades);
                break;
            case "registre":
            case "resetPassword":
                $resMail = montaMailRegistre($dades);
                break;
            }
        if ($resMail != "") $res = false;
        }
    if (CANAL_ENVIO === "SENDMAIL_PHP")
        {
        $resMail = true;            
        switch( $tipusMail )
            {
            case "contacte":
                $resMail = montaMailContacte_php($dades);
                break;
            case "registre":
            case "resetPassword":
                $resMail = montaMailRegistre_php($dades);
                break;
            }    
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
    $body = montaBodyContacte($dades);
    return( prepMail($isHtml, $subject, $body, $altBody, $to, $nomTo) );
}

function montaMailRegistre($dades)
{
    $isHtml  = true;
    $altBody = "";
    $to      = $dades['emailUsr'];
    $nomTo   = $dades['nomUsr'] . " " . $dades['cogUsr'];
    $subject = $dades['loginUsr'] . " Dades per accedir al Pinball, guardi aquest email.";
    $body = montaBodyRegistre($dades);
    return( prepMail($isHtml, $subject, $body, $altBody, $to, $nomTo) );
}

function montaBodyContacte($dades)
{
    $body  = "S'ha rebut un missatge de contacte des de la web de Pinball amb les següents dades: <br><br><br>";
    $body .= "<b>Nom       : " . "</b>  ". $dades['nom'] .       "<br><br>";
    $body .= "<b>Cognoms   : " . "</b>  ". $dades['cognoms'] .   "<br><br>";
    $body .= "<b>eMail     : " . "</b>  ". $dades['email'] .     "<br><br>";
    $body .= "<b>Comentari : " . "</b><br>". nl2br($dades['comentari']) . "<br><br>";
    return ($body);
}

function montaBodyRegistre($dades)
{
    // creem el nostre link per enviar per mail la variable $activateLink
    $path = PATH_MAIL_SUSCRIPCION; 
    $activateLink = $path . sprintf("activarRegistre.php?id=%d&activateKey=%s",$dades['idUsr'],
                                                                               $dades['activateUsr']);
    $body = '<table width="629" border="0" cellspacing="1" cellpadding="2">
      <tr>
        <td width="623" align="left"></td>
      </tr>
      <tr>
        <td bgcolor="#FF8951"><div style="color:#FFFFFF; font-size:1.8em; font-family: Arial, Helvetica, sans-serif; text-transform: capitalize; font-weight: bold;">
        <strong>' . $dades['nomUsr'] .' '. $dades['cogUsr'] . '. aquestes son les teves dades de registre: </strong></div>
        </td>
      </tr>
      <tr>
        <td height="95" align="left" valign="top"><div style=" color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:1.4em; margin-bottom:3px;"><br>
              <strong>Login             : </strong>'.$dades["loginUsr"].'<br><br>
              <strong>Clau d\'accés     : </strong>'.$dades["passwordUsr"].'<br><br>
              <strong>Email             : </strong>'.$dades["emailUsr"].'<br><br>
              <strong>Link d\'activació :<br><a href="'.$activateLink.'">'.$activateLink.' </strong></a><br><br>
              <strong>Per activar el teu compte de Pinball i accedir a la web sense cap <br>
              restricció, fes click al link superior o copia\'l a la barra del teu explorador <br>
              d\'internet.</strong><br><br>
              <strong>Si el link no funciona a la primera, torna a intentar-ho, el servidor a vegades triga en processar l\'ordre.</strong><br><br>
              <strong>Gràcies.</strong><br><br>
              <strong>Equip de Pinball.</strong><br><br>              
        </div>
        </td>
      </tr>
    </table>';

    return ($body);
}

// prepara i envia mail amb la classe de PHPMailer

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
    // $nomTo   = NOM_FROM_CONTACTE;
    $body    = montaBodyContacte($dades);
    $subject = "Contacte des de Pinball";

/// monta el email

    $headers  = montaCapsaleresEmail($isHtml);
    $subject  = mb_encode_mimeheader($subject);
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
    $to      = $dades['emailUsr'];
    // $nomTo   = $dades['nomUsr'] . " " . $dades['cogUsr'];
    $body    = montaBodyRegistre($dades);
    $subject = $dades['loginUsr'] . " Dades de registre al Pinball, guardi aquest email.";

/// monta el email

    $headers = montaCapsaleresEmail($isHtml);
    $subject = mb_encode_mimeheader($subject);
    $message  = $body;
    $message .= "E-mail   : " . FROM . " \r\n";
    $message .= "Enviat   : " . date('d/m/Y', time());
    // $message = htmlspecialchars($message);     // Emmascarar caracters especials d' HTML
    $message = stripslashes($message);         // Eliminar barres invertides

    return ( mail( $to, $subject, $message, $headers) );
}

function montaCapsaleresEmail($isHtml)
{
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    if($isHtml)
        $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    else
        $headers .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: " . NOM_FROM . " " . FROM . " \r\n";
    $headers .= "Reply-To: " . FROM . " \r\n";;
    $headers .= "Return-path: " . FROM . " \r\n";;
    return ($header);
}

?> 