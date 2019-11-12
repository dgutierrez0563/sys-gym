<?php
	session_start();
	// log out session
	session_destroy();
	// go to login (index.php) alert = 2
	header('Location: ../index.php?alert=2');
?>