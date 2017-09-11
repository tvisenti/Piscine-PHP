<?php
header("location: index.php");
session_start();
if (isset($_POST['add_money']))
{
		$fp = fopen("./private/user", "r+");
		flock($fp, LOCK_EX | LOCK_SH);
		$contents = file_get_contents("./private/user");
		$user = unserialize($contents);
	$user[$_SESSION["log_user"]]["money"] += $_POST["add"];
	$_SESSION["money"] = $user[$_SESSION["log_user"]]["money"];
	$_POST["add"] = 0;
	$data = serialize($user);
	file_put_contents("./private/user", $data);
		flock($fp, LOCK_UN);
		fclose($fp);
}
?>
