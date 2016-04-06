#!/usr/bin/php
<?php
    if ($argc == 4)
    {
        $nb = trim(str_replace('\t', ' ', $argv[1]));
        $op = trim(str_replace('\t', ' ', $argv[2]));
        $nb2 = trim(str_replace('\t', ' ', $argv[3]));

        if ($op == '+')
            $res = $nb + $nb2;
        if ($op == '-')
            $res = $nb - $nb2;
        if ($op == '*')
            $res = $nb * $nb2;
        if ($op == '/')
            $res = $nb / $nb2;
        if ($op == '%')
            $res = $nb % $nb2;
        echo "$res\n";
        return ;
    }
        echo "Incorrect Parameters\n";
?>
