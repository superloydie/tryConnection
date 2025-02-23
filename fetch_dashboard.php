<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "sample";

$connection = mysqli_connect($hostname, $username, $password, $dbName, 3306);
if (!$connection) {
    die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()])); 
}

$query = "SELECT * FROM `dashboard_list`"; 
$result = mysqli_query($connection, $query);

if (!$result) {
    die(json_encode(["error" => "Query failed: " . mysqli_error($connection)]));
}

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);
mysqli_close($connection);
?>
