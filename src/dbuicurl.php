<?php 
    // Interfície cross domain :)

    $params = "cmd=". $_REQUEST['cmd'] ."&param=". $_REQUEST['param'];

    if (isset($_REQUEST['recid'])) {
        $params .= "&recid=". $_REQUEST['recid'];
    }

    if (isset($_REQUEST['record'])) {
        $record = rawurlencode(json_encode($_REQUEST['record']));
        $params .= "&record=$record";
    }

    $url  = "http://getex.net/cloud/php/dbui.php?". $params;

    $link = curl_init();
    curl_setopt($link, CURLOPT_URL, $url);
    curl_setopt($link, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($link, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($link);
    curl_close($link);

    echo $response;
?>