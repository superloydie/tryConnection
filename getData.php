<?php
include("connection.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

$sql = "SELECT * FROM tbluser ORDER BY name ASC";
$result = mysqli_query($connection, $sql);


$users = array();


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    echo json_encode($users);
} else {
    echo json_encode([]);
}


mysqli_close($connection);
?>
