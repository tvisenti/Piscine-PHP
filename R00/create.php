<?php
include 'initdata.php';
if ($_POST["login"] && $_POST["passwd"] && $_POST["submit"])
{
	if ( $_POST["submit"] === "OK")
	{
		if (!file_exists("./private"))
			mkdir("./private");
		$x = 0;
		if (file_exists("./private/passwd"))
		{
			$fp = fopen("./private/passwd", "r+");
			flock($fp, LOCK_EX | LOCK_SH);
			$contents = file_get_contents("./private/passwd");
			$tab = unserialize($contents);
			foreach ($tab as $key => $value)
			{
				if ($_POST["login"] == $key)
					$x = 1;
			}
		}
		if ($x == 0)
		{
			$tab[$_POST["login"]] = hash("haval224,3", html_entity_decode($_POST["login"]));
			$data = serialize($tab);
			initdata(html_entity_decode($_POST["login"]));
			file_put_contents("./private/passwd", $data);
			header("location: index.html");
			echo "OK"."\n";
		}
		else
		{
			header("location: create.html");
			echo "ERROR"."\n";
		}
		if ($fp)
		{
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	}
}
else
{
	header("location: create.html");
	echo "ERROR"."\n";
}
?>
