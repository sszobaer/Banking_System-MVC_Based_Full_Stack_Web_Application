<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/./css/./style.css">
    <link rel="stylesheet" href="../assets/./css/./_variable.css">
    <link rel="stylesheet" href="../assets/./css/./_global.css">
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
    include "./userSidebar.php";
    if (isset($_GET["userProfile"])) {
        include "./userProfile.php";
    }else if(isset($_GET["userEditProfile"])){
        include "./userEditProfile.php";
    } else if(isset($_GET["changeAvatar"])){
        include "./changeAvatar.php";
    } else if(isset($_GET["changePassword"])){
        include "./changePassword.php";
    }
    else {
    ?>
        <!--------------------- Dashboard Start --------------------------->
        <section class="dashboard" id="dashboard">
            <div class="main-content">
                <div class="left-section">
                    <div class="balance-and-name">
                        <div class="balance">
                            <h2>Account Balance</h2>
                            <p>$10,000.00</p>
                        </div>
                        <div class="name">
                            <h2>Welcome, Zobaer Ahmed</h2>
                        </div>
                        <div class="role">
                            <h2>Role: <span class="role-type">User</span></h2>
                        </div>
                    </div>
                    <a href="./cardManagement.php">
                        <div class="debit-card">
                            <div class="card-top">
                                <div class="chip"></div>
                                <div class="card-type">VISA</div>
                            </div>
                            <div class="card-middle">
                                <div class="card-number">**** ****
                                    ********</div>
                                <div class="expiry-date">MM/YY</div>
                            </div>
                            <div class="card-bottom">
                                <div class="card-holder">ZOBAER AHMED</div>
                                <div class="bank-logo">AURA BANK PLC</div>
                            </div>
                        </div>
                    </a>
                </div>
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
            </div>
            <div class="bottom-section">
                <div class="deposits">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    <h2>Deposits</h2>
                    <p>$3,000</p>
                </div>
                <div class="withdrawals">
                    <i class="fa-solid fa-arrow-down"></i>
                    <h2>Withdrawals</h2>
                    <p>$1,200</p>
                </div>
                <div class="transfers">
                    <i class="fa-solid fa-right-left"></i>
                    <h2>Transfers</h2>
                    <p>$800</p>
                </div>
            </div>
            <div class="down-section">
                <div class="transactions">
                    <div class="transactions-title">
                        <h1>Recent Transactions</h1>
                    </div>

                    <div class="transactions-controls">
                        <input type="date" id="filter-date">
                        <input type="number" id="filter-amount"
                            placeholder="Amount">
                        <select id="filter-type">
                            <option value>All Types</option>
                            <option value="credit">Credit</option>
                            <option value="debit">Debit</option>
                        </select>
                        <input type="text" id="search-reference"
                            placeholder="Search Merchant/Ref">
                    </div>
                    <div class="button">
                        <button class="btn" id="download-pdf">Download
                            PDF <i class="fa-solid fa-file-pdf"></i></button>
                    </div>

                    <div class="transactions-table-div">
                        <table class="transactions-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-04-15</td>
                                    <td>Amazon - Ref123</td>
                                    <td>120</td>
                                    <td class="completed">Completed</td>
                                </tr>
                                <tr>
                                    <td>2025-04-16</td>
                                    <td>Netflix - Ref456</td>
                                    <td>15</td>
                                    <td class="pending">Pending</td>
                                </tr>
                                <tr>
                                    <td>2025-04-17</td>
                                    <td>PayPal - Credit - Ref789</td>
                                    <td>500</td>
                                    <td class="completed">Completed</td>
                                </tr>
                                <tr>
                                    <td>2025-04-18</td>
                                    <td>Apple - Debit - Ref999</td>
                                    <td>250</td>
                                    <td class="completed">Completed</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!--------------------- Dashboard End ----------------------------->
    <script src="../assets//js//transaction.js"></script>
    <script src="../assets//js//chart.js"></script>
</body>