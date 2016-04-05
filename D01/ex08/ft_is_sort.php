<?php
    function ft_is_sort($tab)
    {
        $sortab = $tab;
        sort ($sortab);
        if (!(array_diff_assoc($tab, $sortab)))
            return (1);
        return (0);
    }

?>
