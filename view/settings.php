<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/_variable.css">
    <link rel="stylesheet" href="../assets/css/_global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php include "./header.php"; ?>
    <?php include "./adminSidebar.php"; ?>

    <section class="dashboard" id="dashboard">
        <div class="main-content">
            <div class="dashboard-cards-container">

            <a href="./loanManagement.php">
                <div class="admin-card">
                    <i class="fa-solid fa-landmark"></i>
                    <div>
                        <h2>Loan Management</h2>
                    </div>
                </div>
            </a>
                
            <a href="#">
                <div class="admin-card">
                    <i class="fa-solid fa-landmark"></i>
                    <div>
                        <h2>----</h2>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="admin-card">
                    <i class="fa-solid fa-landmark"></i>
                    <div>
                        <h2>----</h2>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </section>