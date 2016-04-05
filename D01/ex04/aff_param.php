#!/usr/bin/php
<?php
    $num = 1;
    foreach (array_slice($argv, $num) as $elem)
        echo ("$elem\n");
?>
