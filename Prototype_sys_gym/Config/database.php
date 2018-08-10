<?php

$server   = "localhost";
$username = "root";
$password = "";
$database = "sysgym";

$mysqli = new mysqli($server, $username, $password, $database);

if ($mysqli->connect_error) {
    header("Location: ../../index.php?alert=4");
} ?>