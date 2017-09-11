<?php
include 'initdata.php';
if ($_POST["login"] && $_POST["oldpw"] && $_POST["submit"] && $_POST["newpw"])
{
	if ($_POST["submit"] === "OK" && file_exists("./private/passwd"))
	{
		$x = 0;
		$fp = fopen("./private/passwd", "r+");
		flock($fp, LOCK_EX | LOCK_SH);
		$contents = file_get_contents("./private/passwd");
		$tab = unserialize($contents);
		foreach ($tab as $key => $value)
		{
			if ($_POST["login"] == $key && $value == hash("haval224,3", $_POST["oldpw"]))
			{
				$tab[$_POST["login"]] = hash("haval224,3", $_POST["newpw"]);
				$data = serialize($tab);
				file_put_contents("./private/passwd", $data);
				header("location: index.html");
				echo "OK"."\n";
				$x = 1;
			}
		}
		if ($x == 0)
		{
			header("location: modif.html");
			echo "ERROR"."\n";
		}
		flock($fp, LOCK_UN);
		fclose($fp);
	}
	else
	{
		header("location: modif.html");
		echo "ERROR"."\n";
	}
}
else
{
	header("location: modif.html");
	echo "ERROR"."\n";
}
?>
