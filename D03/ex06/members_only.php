<?php

    $valid_login = "zaz";
    $valid_pass = "jaimelespetitsponeys";

    if ($_SERVER['PHP_AUTH_USER'] === $valid_login && $_SERVER['PHP_AUTH_PW'] === $valid_pass)
    {
        echo "<html><body>\nBonjour Zaz<br />\n<img src='data:image/png;base64,";
    	echo base64_encode(file_get_contents("../img/42.png"));
    	echo "'>\n</body></html>\n";
        exit ;
    }

    else
    {
        header('WWW-Authenticate: Basic realm="Espace membres"');
        header("HTTP/1.0 401 Unauthorized");
        echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>"."\n";
        exit ;
    }
?>
