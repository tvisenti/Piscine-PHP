<?php
session_start();
include 'initdata.php';
if ($_POST["name"] && $_POST["price"] && $_POST["stock"] && $_POST["category"] && $_POST["size"] && $_POST["comment"])
{
	if ($_POST["submit"] === "OK")
	{
		$tab = array();
		if (!file_exists("./private/"))
			mkdir("./private");
		if (file_exists("./private/database"))
		{
			$fp = fopen("./private/database", "r+");
			flock($fp, LOCK_EX | LOCK_SH);
			$contents = file_get_contents("./private/database");
			$tab = unserialize($contents);
		}
		$name = html_entity_decode($_POST["name"]);
		$category = html_entity_decode($_POST["category"]);
		$comment = html_entity_decode($_POST["comment"]);
		array_push($tab, add($name, $_POST["price"], $_POST["stock"], $category, $_POST["size"], $comment));
		$data = serialize($tab);
		file_put_contents("./private/database", $data);
		header("location: home.php");
		echo "OK"."\n";
		if ($fp)
		{
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	}
}
else
{
	header("location: admin.php");
	echo "ERROR"."\n";
}
?>
