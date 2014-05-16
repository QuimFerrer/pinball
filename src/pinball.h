<?php function dbExec($query) {
    /* dbExec. Connecta amb script remot link.php
     * Executa : string amb consulta SQL
     * Retorna : string JSON
     */
    $ch = curl_init();

    $query = urlencode($query);

    $url = "http://getex.net/cloud/php/link.php?query={$query}";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response);
}?>

<?php function menu() { ?>
    <div class="menu">
        <h3>Menu</h3>
        <ul>
            <li><a id="inici"  		href="../html/inici.php">Inici</a></li>
            <li><a id="recrea" 		href="../html/recrea.php">Recreatius</a></li>
            <li><a id="empresa" 	href="../html/empresa.php">Empresa</a></li>
            <li><a id="torneig" 	href="../html/torneig.php">Torneigs</a></li>
            <li><a id="contacte"	href="../html/contacte.php">Contactar</a></li>
            <li><a id="usuaris"     href="../html/usuaris.php">Zona de joc</a></li>
        </ul>
    </div> 
<?php } ?>