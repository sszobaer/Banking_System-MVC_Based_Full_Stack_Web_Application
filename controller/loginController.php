<?php
session_start();
function validateEmail()
{
    $email = trim($_POST['email']);
    $atPosition = strpos($email, '@');
    $dotPosition = strrpos($email, '.');
    if ($email === "") {
        echo "Email is required<br>";
        return false;
    } else if (strpos($email, '@') === false || strpos($email, '.') === false) {
        echo "Email must contain @ and .<br>";
        return false;
    } else if ($atPosition < 1 || $dotPosition < $atPosition + 2 || $dotPosition + 1 >= strlen($email)) {
        echo "Invalid email format<br>";
        return false;
    }
    return true;
}
function validatePassword()
{
    $password = trim($_POST['password']);

    if ($password == "") {
        echo "Password is required<br>";
        return false;
    } else if (strlen($password) < 6) {
        echo "Password must be at least 6 characters<br>";
        return false;
    }
    return true;
}
$email = trim($_POST['email']);
$password = trim($_POST['password']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (validateEmail() && validatePassword()) {
        if ($email == "user@fake.com" && $password == "password123") {
            $_SESSION['user_email'] = $email;
            $_SESSION['logged_in'] = true;

            //print_r($_SESSION);
            header("Location:../view/userDashboard.php");
            exit();
        } else {
            echo "Invalid credentials";
        }
    }
}
