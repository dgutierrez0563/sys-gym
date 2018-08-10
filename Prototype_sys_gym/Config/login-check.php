<?php
require_once "../Config/database.php";
require_once "../Config/content.php";

$usernameC = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['usernameC'])))));
$passwordC = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['passwordC']))))));

if (!ctype_alnum($usernameC) AND !ctype_alnum($passwordC)) {
	header("Location: ../../index.php?alert=1");
}
else {
	$query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE NombreUsuario='$usernameC' AND Contrasenia='$passwordC' AND Estado='Enabled'");
	$rows  = mysqli_num_rows($query);

	if ($query) {
		# code...
		if ($rows > 0) {
			$data  = mysqli_fetch_assoc($query);

			session_start();
			$_SESSION['IDUsuario']   	= $data['IDUsuario'];
			$_SESSION['NombreUsuario']  = $data['NombreUsuario'];
			$_SESSION['Contrasenia']  	= $data['Contrasenia'];
			$_SESSION['NombreCompleto'] = $data['NombreCompleto'];
			$_SESSION['Estado']			= $data['Estado'];
			$_SESSION['Role'] 			= $data['Role'];

			header("Location: ../main.php?module=start");
		}
		else {
			header("Location: ../index.php?alert=1");
		}		
	}else{
		header("Location: ../index.php?alert=4");
	}
}?>