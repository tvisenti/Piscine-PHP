<?php
//Start a new session
    session_start();

//Array with session variables available to the current script
    if ($_GET["submit"] === "OK")
    {
        if (($_GET["login"]) !== NULL)
            $_SESSION["login"] = $_GET["login"];
        if (($_GET["passwd"]) !== NULL)
            $_SESSION["passwd"] = $_GET["passwd"];
    }
?>
<html>
    <head>
        <style>
        body {
            font-family: sans-serif;
            font-size: 20px;
        }
        input {
            width: 30%;
            border-radius: 10px;
            height: 50px;
            font-size: 15px;
        }
        input[type=submit] {
            background-color: pink;
            padding: 16px 32px;
            margin-top: 20px;
        }
        input[type=text],
        input[type=password] {
            margin-top: 20px;
            margin-right: 20px;
            padding-left: 10px;
        }
        </style>
    </head>

    <body><center>
        <!-- FORMULAIRE -->
        <form action="index.php" method="get">
            Identifiant: <input type="text" name="login" value="<?php echo $_GET["login"];?>" placeholder="login ..."/>
            Mot de passe: <input type="password" name="passwd" value="<?php echo $_GET["passwd"];?>" placeholder="password"/>
                <br>
            <input type="submit" value="OK"/>
        </form>
    </center></body>
</html>
