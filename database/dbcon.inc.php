<?php

$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "shop";

$conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}

?>