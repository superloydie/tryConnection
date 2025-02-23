<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "cmpgarage";

$connection = mysqli_connect($hostname, $username, $password, $dbName, 3306);
if (!$connection) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}

// Get search parameter
$search = isset($_GET['search']) ? mysqli_real_escape_string($connection, $_GET['search']) : "";

// SQL Query: Search by barcode OR product name
if ($search !== "") {
    $query = "SELECT ProductCode, ProductName, ProductGroup, stock FROM tblproduct
              WHERE ProductCode LIKE '%$search%' OR ProductName LIKE '%$search%'";
} else {
    $query = "SELECT ProductCode, ProductName, ProductGroup, stock FROM tblproduct";
}

$result = mysqli_query($connection, $query);

if (!$result) {
    die(json_encode(["error" => "Query failed: " . mysqli_error($connection)]));
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
mysqli_close($connection);
?>
