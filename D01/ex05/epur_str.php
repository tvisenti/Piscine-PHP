#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        $str = trim($argv[1]);
        while ($str != str_replace('  ', ' ', $str))
            $str = str_replace('  ', ' ', $str);
        echo ("$str\n");
    }
?>
