<?php
$servername = "localhost";
$username = "nico";
$password = "Black11060!";
$dbname = "nico_blog";
//$dbport = 3306;

$con = mysqli_connect($servername, $username, $password,$dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>