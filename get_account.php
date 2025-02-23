<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cmpgarage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbluser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $accounts = array();

    while($row = $result->fetch_assoc()) {
        $accounts[] = $row;
    }
    
    echo json_encode($accounts);
} else {
    echo json_encode(array());
}

$conn->close();
?>
