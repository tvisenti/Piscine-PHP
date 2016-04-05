#!/usr/bin/php
<?php
    function ft_split ($str)
    {
        $explosion = explode(' ', $str);
        $tab = array_filter($explosion);
        sort($tab);
        foreach($tab as $line)
            echo $line."\n";
    }

    function epur_str($sap)
    {
        $str = trim($sap);
        while ($str != str_replace('  ', ' ', $str))
            $str = str_replace('  ', ' ', $str);
        return ($str);
    }

    $num = 1;
    foreach (array_slice($argv, $num) as $elem)
    {
        $tab = epur_str($elem);
        if ($tab2)
            $tab2 = $tab2.' '.$tab;
        else
            $tab2 = $tab;
    }
    ft_split($tab2);
?>
