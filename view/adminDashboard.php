
<?php
session_start();
$clients = 150;
$staffs = 12;
$accounts = 110;
$deposits = 50000;
$withdrawals = 30000;
$transfers = 20000;
$walletBalance = 75000;
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

                <div class="admin-card">

                    <i class="fa-solid fa-users"></i>
                    <div>
                        <h2>Clients</h2>
                        <p><?= $clients ?></p>
                    </div>
                </div>

                <div class="admin-card">
                    <i class="fa-solid fa-user-tie"></i>
                    <div>
                        <h2>Staffs</h2>
                        <p><?= $staffs ?></p>
                    </div>
                </div>

                <div class="admin-card">
                    <i class="fa-solid fa-id-card"></i>
                    <div>
                        <h2>Accounts</h2>
                        <p><?= $accounts ?></p>
                    </div>
                </div>

                <div class="admin-card">
                    <i class="fa-solid fa-upload"></i>
                    <div>
                        <h2>Deposits</h2>
                        <p>$<?= number_format($deposits, 2) ?></p>
                    </div>
                </div>

                <div class="admin-card">
                    <i class="fa-solid fa-download"></i>
                    <div>
                        <h2>Withdrawals</h2>
                        <p>$<?= number_format($withdrawals, 2) ?></p>
                    </div>
                </div>

                <div class="admin-card">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <div>
                        <h2>Transfers</h2>
                        <p>$<?= number_format($transfers, 2) ?></p>
                    </div>
                </div>

                <div class="admin-card">
                    <i class="fa-solid fa-wallet"></i>
                    <div>
                        <h2>Wallet Balance</h2>
                        <p>$<?= number_format($walletBalance, 2) ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Transactions Section -->
    <section class="transactions-section" id="transactionsSection" style="display: none;">
    <h2>Transactions</h2>
    <table class="transactions-table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Deposit</td>
                <td>$<?= number_format($deposits, 2) ?></td>
                <td>Completed</td>
                <td>2025-05-19</td>
            </tr>
            <tr>
                <td>Withdrawal</td>
                <td>$<?= number_format($withdrawals, 2) ?></td>
                <td>Completed</td>
                <td>2025-05-18</td>
            </tr>
            <tr>
                <td>Transfer</td>
                <td>$<?= number_format($transfers, 2) ?></td>
                <td>Completed</td>
                <td>2025-05-17</td>
            </tr>
            <tr>
                <td>Wallet Balance</td>
                <td>$<?= number_format($walletBalance, 2) ?></td>
                <td>Available</td>
                <td>As of Today</td>
            </tr>
        </tbody>
    </table>
</section>

<script src="../assets/js/admin_Dashboard.js"></script>
<script src="../assets/js/sidebar.js"></script>
<script src="../assets/js/header.js"></script>
<script src="../assets/js/transactions.js"></script>
<script src="../assets/js/loader.js"></script>

</body>
</html>
