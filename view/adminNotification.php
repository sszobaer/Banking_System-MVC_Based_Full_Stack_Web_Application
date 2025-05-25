<!-- ZOBAER AHMED -->
 <?php 
    session_start(); 
    if(isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/_variable.css">
    <link rel="stylesheet" href="../assets/css/_global.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
        rel="stylesheet">
</head>

<body>
    <?php
    include "./header.php";
    include "./adminSidebar.php";
    ?>
    <div class="notification-container">
        <div class="headings">
            <h1>Notifications</h1>
        </div>
        <div class="notification-box">
            <a href="#" class="mark-all">Mark all as read</a>
            <h2>Recent Notifications</h2>
            <div class="notification transaction">
                <p><strong>Transaction</strong></p>
                <p>Deposit of $500.00 was successful.</p>
                <p class="date">May 08, 2025, 10:30 AM</p>
                <a href="#" class="action">Mark as Read</a>
            </div>
            <div class="notification alert">
                <p><strong>Alert</strong></p>
                <p>Unusual login attempt detected. Please verify your account.</p>
                <p class="date">May 07, 2025, 3:15 PM</p>
                <a href="#" class="action">Mark as Read</a>
            </div>
            <div class="notification update read">
                <p><strong>Update</strong></p>
                <p>Your new debit card has been shipped.</p>
                <p class="date">May 06, 2025, 9:00 AM</p>
                <a href="#" class="action">Mark as Unread</a>
            </div>
        </div>
    </div>
</body>

</html>
<?php
    } else {
        header("Location: ../view/login.php");
        exit();
    }
?>