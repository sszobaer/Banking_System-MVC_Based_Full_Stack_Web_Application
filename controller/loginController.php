<?php
//ZOBAER AHMED
require_once "../model/users.php";
session_start();
function validateEmail(){
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
    } else if (strlen($password) <6) {
        echo "Password must be at least 6 characters<br>";
        return false;
    }
    return true;
}
function loginUserController(){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $user = [
        'email' => $email,
        'password' => $password
    ];
    $status = fetchUser($user);
    
    //Set Session
    if ($status) {
        $_SESSION['user_id'] = $status['user_id'];
        $_SESSION['email'] = $status['email'];
        $_SESSION['firstName'] = $status['firstName'];
        $_SESSION['lastName'] = $status['lastName'];
        $_SESSION['phoneNo'] = $status['phoneNo'];
        $_SESSION['dob'] = $status['dob'];
        $_SESSION['gender'] = $status['gender'];
        $_SESSION['accountType'] = $status['accountType'];
        $_SESSION['depositAmount'] = $status['depositAmount'];
        $_SESSION['nid/passport'] = $status['nid/passport'];
        $_SESSION['password'] = $status['password'];
        $_SESSION['presentAddress'] = $status['presentAddress'];
        $_SESSION['permanentAddress'] = $status['permanentAddress'];
        $_SESSION['imageUrl'] = $status['imageUrl'];
        $_SESSION['createdAt'] = $status['createdAt'];
        $_SESSION['updatedAt'] = $status['updatedAt'];
        $_SESSION['role_id'] = $status['role_id'];
        $_SESSION['logged_in'] = true;

        //Set Cookie
        if (isset($_POST['remember-me'])) {
            setcookie('remember_email', $email, time() + (86400 * 7), "/"); 
            setcookie('remember_token', bin2hex(random_bytes(16)), time() + (86400 * 7), "/");
        } else {
            setcookie('remember_email', '', time() - 3600, "/");
            setcookie('remember_token', '', time() - 3600, "/");
        }

        if($_SESSION['role_id']==='1'){
            header("Location: ../view/adminDashboard.php");
            exit();
        } else if($_SESSION['role_id']==='2'){
            // print_r($status);
            // echo "<br><br>";
            // print_r($_SESSION);
            header("Location: ../view/userDashboard.php");
            exit();
        } else {
            session_destroy();
            header("location: ../view/unauthorizedUser.php");
        }
    } else {
        echo "Invalid credentials";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (validateEmail() && validatePassword()) {
        loginUserController();
    } else {
        echo "Invalid input";
    }
}
