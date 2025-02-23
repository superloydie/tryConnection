<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "sample";

$connection = mysqli_connect($hostname, $username, $password, $dbName, port: 3306);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>