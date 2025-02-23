<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "cmpgarage";

$connection = mysqli_connect($hostname, $username, $password, $dbName, 3306);
if (!$connection) {
    die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()])); 
}

// Assuming you're getting username and password from the URL parameters
$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

if ($username && $password) {
    // Use prepared statements to avoid SQL injection
    $query = "SELECT * FROM tbluser WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Successful login
        echo "LogIn Successful";
    } else {
        // Failed login
        echo "Invalid username or password";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Please provide both username and password.";
}

mysqli_close($connection);
?>