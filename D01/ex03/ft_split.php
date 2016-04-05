<?php
    function ft_split ($str)
    {
        $explosion = explode(' ', $str);
        $tab = array_filter($explosion);
        sort($tab);
        print_r($tab);
    }
?>
