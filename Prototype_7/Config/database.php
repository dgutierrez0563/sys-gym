<?php
	// $server   = "mydbsysgym.ciun7vkpevqw.us-east-2.rds.amazonaws.com";
	// $username = "wsullivan";
	// $password = "Alexia21+";
	// $database = "dbsysgym";
	// $port     =	"3306";
	$server		= "localhost";
	$username	= "root";
	$password 	= "";
	$database 	= "sysgym";

	//$mysqli = new mysqli($server, $username, $password, $database,$port);
	$mysqli = new mysqli($server, $username, $password, $database);
	//GLOBAL $mysqli;
	if($mysqli){
		return $mysqli;
	}

	if ($mysqli->connect_error) {
	    header("Location: ../../index.php?alert=4");
	}
?>