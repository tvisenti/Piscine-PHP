<?php
	include 'initdata.php';
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
		if($action == "emptycart")
			gettab_box_empty("box", $_SESSION['log_user']);
		if($action == "seemycart")
		{
			box_pay("admin");
			die();
		}
	}
	header("location:index.php");
?>
