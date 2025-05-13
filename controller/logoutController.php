<?php
    session_start();
    // print_r($_SESSION);

    session_unset();
    session_destroy();

    // print_r($_SESSION);

    header('Location:../view/login.php');
    exit();
?>