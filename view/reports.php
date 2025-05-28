<!-- Shuvra -->
 <?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reports - Doughnut Chart</title>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css?v2.0">
    <link rel="stylesheet" href="../assets/css/_variable.css?v2.0">
    <link rel="stylesheet" href="../assets/css/_global.css?v2.0">
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
<style>
    .transactions-main{
        margin-top: 120px;
        margin-left: 250px;
        width: 78%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body>
    <?php
        include "./header.php";
        include "./adminSidebar.php";
    ?>
  <div class="right-section">
                <div class="transactions-main">
                    <div class="transactions-title">
                        <h1>Transactions</h1>
                    </div>
                    <div class="chart-section">

                        <div class="chart-header">
                            <canvas id="transactionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../assets/js/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

</body>
</html>
