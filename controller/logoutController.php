<?php
//ZOBAER AHMED
    session_start();
    // print_r($_SESSION);

    session_unset();
    session_destroy();

    // print_r($_SESSION);
    setcookie('remember_email', '', time() - 3600, "/");
    setcookie('remember_password', '', time() - 3600, "/");



    header('Location:../view/login.php');
    exit();
?>