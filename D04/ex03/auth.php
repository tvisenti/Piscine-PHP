<?php
    function auth($login, $passwd)
    {
        $arr_lp = unserialize(file_get_contents("../private/passwd"));
        $password = hash(whirlpool, $passwd);
        foreach ($arr_lp as &$user)
        {
            if ($user["login"] == $login && $user["passwd"] == $password)
                return TRUE;

        }
        return FALSE;
    }
?>
