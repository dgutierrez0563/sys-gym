<?php  

	$server		= "localhost";
	$username	= "root";
	$password 	= "";
	$database 	= "sysgym";
	
    $mysqli_aux = mysql_connect($server,$username,$password);
    mysql_select_db($database,$mysqli_aux);
    if ($mysqli_aux) {
    	return $mysqli_aux;	
    }
?>