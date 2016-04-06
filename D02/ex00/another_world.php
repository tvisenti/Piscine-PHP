#!/usr/bin/php
<?php
    if ($argv[1] != NULL)
    {
        $str = preg_replace("/\s+/",' ', trim($argv[1]));
        echo "$str\n";
    }
?>
