<?php
session_start();
include 'auth.php';
include 'initdata.php';
if ($_POST["username"] && $_POST["password"])
{
	if (auth($_POST["username"], $_POST["password"]) === TRUE)
	{
		$_SESSION["log_user"] = $_POST["username"];
		$_SESSION["money"] = getall("user", $_POST["username"], "money");
		$_SESSION["user_lvl"] = getall("user", $_POST["username"], "userlvl");
		$_SESSION["total"] = 0;
		header("location: index.php");
	}
	else
	{
		$_SESSION["log_user"] = "";
		header("location: index.html");
		echo "ERROR\n";
	}
}
else
{
	$_SESSION["log_user"] = "";
	header("location: index.html");
	echo "ERROR\n";
}
?>
