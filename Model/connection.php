<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "Banking System";

    $conn = new mysqli($serverName, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }
    // else{
    //     echo "Database connected successfully";
    // }
?>