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
	
	//$mysqli_aux = mysql_connect($server,$username,$password,$port);
    $mysqli_aux = mysql_connect($server,$username,$password);
    mysql_select_db($database,$mysqli_aux);
    if ($mysqli_aux) {
    	return $mysqli_aux;	
    }
?>