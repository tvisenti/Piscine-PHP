#!/usr/bin/php
<?php
    if ($argv[1] != NULL)
    {
        $num = 1;
        $explosion = explode(' ', $argv[1]);
        $str = array_filter($explosion);
        foreach (array_slice($str, $num) as $word)
        {
            echo "$word"." ";
        }
        echo "$str[0]"."\n";
    }
?>
