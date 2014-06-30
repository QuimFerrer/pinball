<?php 

    define("LOCAL", true);

    function dbExec($query,$tipusResultat=1) {
        if(LOCAL) $response = dbExecLocal($query,$tipusResultat);
        else      $response = dbExecRemote($query,$tipusResultat);
        return $response;
    }


    function dbExecRemote($query,$tipusResultat) {
    /* dbExec. Connecta amb script remot link.php
     * Executa : string amb consulta SQL
     * Retorna : string JSON
     */
    $ch = curl_init();

    $query = rawurlencode($query);

    $url = "http://getex.net/cloud/php/link.php?query={$query}";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response);
}?>

<?php function dbExecLocal($query,$tipusResultat) {
    /* dbExec. Connecta amb script remot link.php
     * Executa : string amb consulta SQL
     * Retorna : string JSON
     */
         
    if (!isset($query) ) die('<h1>No es una consulta correcte !</h1>');

    $link = mysql_connect("localhost", "root", "");

    if (!$link) die('Not connected : ' . mysql_error());

    $db_selected = mysql_select_db('u555588791_pinba', $link);

    if (!$db_selected) {
        die ('No es possible utilitzar bd pinball: ' . mysql_error());
    }

    $result = mysql_query($query);

    if (!$result) {
        die('Consulta no valida: ' . mysql_error());
    }

    // Obtenir la consulta en forma d'arrays d'objectes
    // $json = array();
    // while ($obj = mysql_fetch_object($result)) {
    //     $json[] = $obj ;

    switch($tipusResultat)
        {
        // retorna un array associatiu (SELECT)
        case 1: 
            $json = array(); 
            while ($obj = mysql_fetch_assoc($result)) 
                $json[] = (object)array_map('utf8_encode', $obj) ;
            break;
        // insert
        case 2:
            break;
        // update
        case 3:
            break;

        default:
            $json = true;
            break;
        }
   
    // if ($result && gettype($result)=="object")

    
    return $json;

    // Alliberar resultat
    mysql_free_result($result);

    // Tancar connexió
    mysql_close($link);

}?>

<?php function menu() { 

    if (isset($_SESSION["autentificat"]) && $_SESSION["autentificat"] == "SI") :
?>
        <div class="menu">
            <ul>
                <li><a id="inici"       href="../html/inici.php">Inici</a></li>
                <li><a id="recrea"      href="../html/recrea.php">Recreatius</a></li>
                <li><a id="empresa"     href="../html/empresa.php">Empresa</a></li>
                <li><a id="jocs"        href="../html/jocs.php">Pinball kit</a></li>
                <li><a id="contacte"    href="../html/contacte.php">Contactar</a></li>
                <li><a id="logout"      href="../html/logout.php">Sortir</a></li>
            </ul>
        </div>
<?php else : ?>
        <div class="menu">
            <ul>
                <li><a id="inici"       href="../html/inici.php">Inici</a></li>
                <li><a id="recrea"      href="../html/recrea.php">Recreatius</a></li>
                <li><a id="empresa"     href="../html/empresa.php">Empresa</a></li>
                <li><a id="jocs"        href="../html/jocs.php">Pinball kit</a></li>
                <li><a id="torneig"     href="../html/torneig.php">Torneigs</a></li>
                <li><a id="registre"    href="../html/registre.php">Registre</a></li>
                <li><a id="contacte"    href="../html/contacte.php">Contactar</a></li>
            </ul>
            <div id="dialog">
                <span>Accés a usuaris registrats</span>
                <span id="errorLogin"></span>                        
                <form name="login" action="" method="post">
                    <input type="text" name="usr" placeholder="Nom d'usuari" required>
                    <input type="password" name="pwd" placeholder="Clau d'accés">
                    <input type="submit" name="entrar" value="Entrar"/>
                </form>
            </div>
        </div>
<?php endif; ?>
<?php } ?>

<?php function footer() { ?>
    <p>&copy;2014 cal molins team group</p>
<?php } ?>

<?php function controlAcces($usr,$pwd)
    {
    if (controlLogin($usr,$pwd) == "SI")
        {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = './usuaris.php';
        header("Location: http://$host$uri/$extra");
        }   
    else
        {
?>
    <script>document.querySelector("#errorLogin").innerHTML = "</br>Usuari o clau incorrecte";</script>
<?php
        echo '<meta content="2" http-equiv="REFRESH"> </meta>';     
        }
    }
?>

