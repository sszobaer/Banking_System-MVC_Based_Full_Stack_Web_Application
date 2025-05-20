<?php
//ZOBAER AHMED
require_once "../model/users.php";
session_start();

function validateCurrentPassword()
{
    $currentPassword = trim($_POST['currentPassword']);
    if ($currentPassword == "") {
        echo "Current password is required<br>";
        return false;
    } else if (strlen($currentPassword) < 6) {
        echo "Current password must be at least 6 characters<br>";
        return false;
    }
    return true;
}

function validatePassword()
{
    $password = trim($_POST['newPassword']);
    if ($password == "") {
        echo "Password is required<br>";
        return false;
    } else if (strlen($password) < 6) {
        echo "Password must be at least 6 characters<br>";
        return false;
    }
    return true;
}

function validateConfirmPassword()
{
    $password = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);
    if (empty($confirmPassword)) {
        echo "Confirm password is required";
        return false;
    } else if ($password !== $confirmPassword) {
        echo "Password and confirm password does not match";
        return false;
    }
    return true;
}

function changePasswordController()
{
    return (
        validateCurrentPassword() &&
        validatePassword() &&
        validateConfirmPassword()
    );
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo $_SESSION['password'];
    $currentPassword = trim($_POST['currentPassword']);
    $newPassword = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);

    if (changePasswordController()) {
        if ($_SESSION['password'] == $currentPassword) {
            $user = [
                'email' => $_SESSION['email'],
                'password' => $newPassword, 
                'updatedAt' => date("Y-m-d H:i:s")
            ];
            
            $status = updatePassword($user);

            if ($status) {
                $_SESSION['password'] = $newPassword; 
                header('location:../view/login.php');
                exit();
            } else {
                echo "Failed to change password";
            }
        } else {
            echo "Current password is incorrect";
        }
    }
}
?>