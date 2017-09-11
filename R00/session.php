<?php
session_start();
include 'initdata.php';
if ($_POST["LOGOUT"] == "LOGOUT")
{
	session_destroy ();
	header("location: index.html");
}
if ($_POST["DELETE_ACCOUNT"] == "DELETE_ACCOUNT")
{
	header("location: index.html");
	delete_user("user", $_SESSION["log_user"]);
	delete_user("passwd", $_SESSION["log_user"]);
}
?>
