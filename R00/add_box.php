<?php
session_start();
include 'initdata.php';
if ($_POST["stock"] && $_POST["add_basket"])
{
	$verif = getdata("database", $_POST["add_basket"], "stock");
	$price = getdata("database", $_POST["add_basket"], "price");
	if ($verif >= $_POST["stock"])
	{
		header("location: index.php");
		$pretab = array();
		$tab = array();
		if (file_exists("./private/box"))
		{
			$fp = fopen("./private/box", "r+");
			flock($fp, LOCK_EX | LOCK_SH);
			$contents = file_get_contents("./private/box");
			$tab = unserialize($contents);
		}
		array_push($pretab, $_POST["add_basket"], $_POST["stock"], $_SESSION["log_user"], $price);
		array_push($tab, $pretab);
		$data = serialize($tab);
		file_put_contents("./private/box", $data);
		$_SESSION["total"] = $price;
		if ($fp)
		{
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	}
	else
	{
		header("location: index.php");
		echo "KO";
	}
}
else
{
	header("location: index.php");
	echo "ERROR"."\n";
}
?>
