<?php 
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email === "user@fake.com" && $password === "user12") {
        header('Location: ../view/userDashboard.php');
        exit();
    } else {
        echo "<script>alert('Email or password is invalid');</script>";
    }
}
?>
