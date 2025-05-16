<?php
function getConnection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "Banking System";

    $conn = mysqli_connect($host, $user, $pass, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>