#!/usr/bin/php
<?php
    if ($argv[1] != NULL)
    {
        $explosion = explode(' ', $argv[1]);
        $str = array_filter($explosion);
        foreach (array_slice($str, 1) as $word)
        {
            echo "$word"." ";
        }
        echo "$str[0]"."\n";
    }
?>
