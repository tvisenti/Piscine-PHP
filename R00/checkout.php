<?php
session_start();
if (!$_SESSION["log_user"])
	header("location: index.html");
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="page.css">
        <meta charset="utf-8">
        <title>Checkout</title>
    </head>
    <body>
        <div id="container">
            <?php require_once('header.php');?>
            <div id="page">
                <div class="shop_row">
                    <?php

                     ?>
                    </div>
                </div>
            </div>
            <footer>
            <div id="footer">
                <p>&copy; amerelo & tvisenti</p>
            </div>
        </footer>
        </div>
    </body>
</html>
