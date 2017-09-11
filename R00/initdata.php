<?php
session_start();
function	inituser($user)
{
	$data = array("id" => $user, "money" => 0, "userlvl" => 1);
	return $data;
}

function	add($name, $price, $stock, $category, $size, $comment, $image)
{
	$category = explode(",", $category);
	$data = array("name" => $name, "price" => $price, "stock" => $stock, "category" => $category, "size" => $size, "comment" => $comment, "image" => $image);
	return $data;
}

function	user_money($user)
{
	$file = "user";
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$tab = unserialize(file_get_contents("./private/"."$file"));
	$i = 0;
	$money = 0;
	while($tab[$i])
	{
		if($tab[$i]['id'] == $user)
			$money = $tab[$i]['money'];
		$i++;
	}
	flock($fp, LOCK_UN);
	fclose($fp);
	return ($money);
}

function	user_delete_money($username, $amount)
{
	$fp = fopen("./private/user", "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$contents = file_get_contents("./private/user");
	$user = unserialize($contents);
	$user[$username]["money"] -= $amount;
	$_SESSION["money"] = $user[$username]["money"];
	$_POST["add"] = 0;
	$data = serialize($user);
	file_put_contents("./private/user", $data);
	flock($fp, LOCK_UN);
	fclose($fp);
}

function	remove_from_stock($name, $qty)
{
	$file = "database";
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$tab = unserialize(file_get_contents("./private/"."$file"));
	$before = 0;
	$after = 0;
	foreach($tab as $key => $val)
	{
		if($val["name"] == $name)
		{
			$before = $tab[$key]["stock"];
			$tab[$key]["stock"] -= (($tab[$key]["stock"] - $qty) >= 0) ? $qty : 0 ;
			$after = $tab[$key]["stock"];
		}
	}

	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return (($before < $after) ? 1 : 0);
}

function	box_pay($user)
{
	$file = "box";
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$paybox = array();
	$total_to_pay = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	foreach($tab as $key => $val)
	{
		if($val[2] == $user)
		{
			$paybox[$key] = $val;
			$total_to_pay += ($val[1] * $val[3]);
		}
		$total_money_user = user_money($user);
	}
	if($total_money_user >= $total_to_pay)
	{
		foreach($tab as $key => $val)
		{
			$done = remove_from_stock($val[0], $val[1]);
			if(!$done)
				return (0);
		}
		user_delete_money($user, $_SESSION['money']);
		gettab_box_empty("box", $user);
	}
	flock($fp, LOCK_UN);
	fclose($fp);
	return (1);
}

function    gettab_box($file, $user)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	foreach($tab as $key => $val)
		if($val[2] == $user)
			$x += $val[1];
	flock($fp, LOCK_UN);
	fclose($fp);
	return ($x);
}

function    gettab_box_total($file, $user)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	foreach($tab as $key => $val)
	{
		if($val[2] == $user)
			$x += ($val[3] * $val[1]);
	}
	flock($fp, LOCK_UN);
	fclose($fp);
	return ($x);
}

function  gettab_box_empty($file, $user)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	foreach($tab as $key => $val)
	{
		if($val[2] == $user)
			unset($tab[$key]);
	}
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return ($x);
}

function	getall($file, $user ,$info)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	while ($tab[$x])
	{
		if ($tab[$x]["id"] == $user)
			$tab1 = $tab[$x][$info];
		$x++;
	}
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return $tab1;
}

function	getdata($file, $user ,$info)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	while ($tab[$x])
	{
		if ($tab[$x]["name"] == $user)
			$tab1 = $tab[$x][$info];
		$x++;
	}
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return $tab1;
}


function	getelem($file, $elem)
{
	$x = 0;
	$tab = unserialize(file_get_contents("./private/"."$file"));
	while ($tab[$x])
	{
		if ($tab[$x]["id"] == $elem)
			$tab1 = $tab[$x][$info];
		$x++;
		return $tab1;
	}
}

function	getelem2($file, $elem)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$tab = unserialize(file_get_contents("./private/"."$file"));
	$toto =	$tab[$user][$info];
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return $toto;
}

function	modif_value($file, $user, $field ,$new_value)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$tab = unserialize(file_get_contents("./private/".$file));
	foreach ($tab as $value)
	{
		if($value["id"] == $user)
		{
			$value[$field] = $new_value;
			return 1;
		}
	}
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return 0;
}

function	delete_user($file, $user)
{
	$fp = fopen("./private/".$file, "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$tab = unserialize(file_get_contents("./private/"."$file"));
	foreach ($tab as $key => $value)
	{
		if ($user == $key)
			unset($tab[$key]);
	}
	file_put_contents("./private/".$file, serialize($tab));
	flock($fp, LOCK_UN);
	fclose($fp);
	return 0;
}

function	initdata($user)
{
	$tab = array();
	if (file_exists("./private/user"))
	{
		$fp = fopen("./private/user", "r+");
		flock($fp, LOCK_EX | LOCK_SH);
		$contents = file_get_contents("./private/user");
		$tab = unserialize($contents);
	}
	array_push($tab, inituser($user));
	$data = serialize($tab);
	file_put_contents("./private/user", $data);
	if ($fp)
	{
		flock($fp, LOCK_UN);
		fclose($fp);
	}
}
?>
