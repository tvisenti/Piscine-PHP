<?php
session_start();
if (!$_SESSION["log_user"])
	header("location: index.html");
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
        </style>
        <link rel="stylesheet" type="text/css" href="page.css">
        <title>Kwamashop</title>
    </head>
    <body>
        <div id="container">
            <?php require_once('header.php');?>
            <div id="page">
                <?php

                $x = 0;
                $tab = unserialize(file_get_contents("./private/database"));
                while ($tab[$x])
                {
                ?>
                <div class="shop_row">
                    <div class="shop_item">
                        <div class="item_title">
                            <?php echo $tab[$x]["name"]?>
                        </div>
                        <div class="item_description">
                            <?php echo $tab[$x]["comment"]?>
                            <br>
                            <img src="<?php echo $tab[$x]["image"];?>" width="140px" height="165px"/></a>
                            <br><br>
                            <div class="stock-input">
                                <a style="font-size:10px;">In stock : <?php echo $tab[$x]["stock"]?></a>
                                <div class="price"><?php echo $tab[$x]["price"]?>&euro;</div>
                                    <form action="add_box.php" method="POST">
                                		<input type="number" min="1" name="stock" placeholder="Cuánto" required>
                                		<input type="submit" name="add_basket" value=<?php echo $tab[$x]['name'] ?> >
										<img src="http://my-powershell.fr/wp-content/uploads/2014/04/error.png" name="del-item" width="20px" height="auto">
                                </form>
                            </div>
                        </div>
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

<?php
++$x;
}
 ?>
