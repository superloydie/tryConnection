<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "android_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT 1";
$result = $conn->query($sql);

if ($result) {
    echo "Database connection OK";
} else {
    echo "Database connection failed: " . $conn->error;
}

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, username, email FROM users";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($data);

    $conn->close();
?>