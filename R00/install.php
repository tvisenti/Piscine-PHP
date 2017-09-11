#!/usr/bin/php
<?php
	mkdir("./private");
	$tab["admin"] = hash("haval224,3", html_entity_decode("admin"));
	$data = serialize($tab);
	file_put_contents("./private/passwd", $data);
	$toto = array();
	$admin = array("id" => "admin", "money" => 0, "userlvl" => 2);
	array_push($toto, $admin);
	$final = serialize($toto);
	file_put_contents("./private/user", $final);
?>
