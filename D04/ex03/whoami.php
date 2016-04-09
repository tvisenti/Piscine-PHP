<?php
    session_start();
    if ($_SESSION["loggued_on_user"] !== "" && $_SESSION["loggued_on_user"] !== NULL)
        echo $_SESSION["loggued_on_user"]."\n";
    else
    {
        $_SESSION["loggued_on_user"] = "";
        echo "ERROR\n";
    }
?>
