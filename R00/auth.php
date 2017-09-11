<?php
function	auth($login, $passwd)
{
	if (file_exists("./private/passwd"))
	{
		$x = 0;
		$contents = file_get_contents("./private/passwd");
		$tab = unserialize($contents);
		foreach ($tab as $key => $value)
		{
			if ($login == $key && $value == hash("haval224,3", $passwd))
			{
				return TRUE;
				$x = 1;
			}
		}
		if ($x == 0)
			return FALSE;
	}
	else
		return FALSE;
}
?>
