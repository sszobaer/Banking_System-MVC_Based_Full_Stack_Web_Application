<!-- ZOBAER AHMED -->
<?php
session_start();
if (isset($_SESSION['email'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Card Management</title>
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
        include "./userSidebar.php";
        ?>
        <!--------------------Card Management Start-------------------------------->
        <section class="card-management" id="card-management">
            <div class="card-management-container">
                <h1>Card Management</h1>
                <div class="tabs">
                    <div class="tab active" data-tab="card-control">Card Control</div>
                    <div class="tab" data-tab="pin-changer">PIN Changer</div>
                    <div class="tab" data-tab="fraud-alert">Fraud Alert</div>
                </div>
                <div id="card-control" class="tab-content active">
                    <form id="card-control-form" method="post" action="../controller/cardManagementController.php">
                        <div class="form-group">
                            <label>Card Status</label>
                            <button class="btn" id="freeze-button">Temporarily Freeze Card</button>
                            <button class="btn" id="report-lost-button">Report Lost/Stolen Card</button>
                            <div id="control-message" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="category">Spending Limit Category</label>
                            <select id="category" name="category">
                                <option value="">Select Category</option>
                                <option value="dining">Dining</option>
                                <option value="travel">Travel</option>
                                <option value="shopping">Shopping</option>
                            </select>
                            <div id="categoryError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <select id="currency" name="currency">
                                <option value="">Select currency</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="BDT">BDT</option>
                            </select>
                            <div id="currencyError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="limit-amount">Limit Amount</label>
                            <input type="number" id="limit-amount" name="limit-amount" placeholder="Enter amount">
                            <div id="limitAmountError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn" id="set-limit-button">Set Limit</button>
                            <div id="setLimitMessage" class="error-message"></div>
                        </div>
                    </form>
                </div>
                <div id="pin-changer" class="tab-content">
                    <form id="pin-changer-form" method="post" action="../controller/cardManagementController.php">
                        <div class="form-group">
                            <label for="current-pin">Current PIN</label>
                            <div class="password-container">
                                <input type="password" class="password-field" id="current-pin" name="current-pin" placeholder="Enter current PIN">
                                <span class="toggle-password eye-icon">👁️</span>
                            </div>
                            <div id="currentPinError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="new-pin">New PIN</label>
                            <div class="password-container">
                                <input type="password" class="password-field" id="new-pin" name="new-pin" placeholder="Enter new PIN">
                                <span class="toggle-password eye-icon">👁️</span>
                            </div>
                            <div id="newPinError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="confirm-pin">Confirm New PIN</label>
                            <div class="password-container">
                                <input type="password" class="password-field" id="confirm-pin" name="confirm-pin" placeholder="Confirm new PIN">
                                <span class="toggle-password eye-icon">👁️</span>
                            </div>
                            <div id="confirmPinError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn" id="change-pin-button">Change PIN</button>
                            <div id="pin-message" class="error-message"></div>
                        </div>
                    </form>
                </div>
                <div id="fraud-alert" class="tab-content">
                    <form id="fraud-alert-form" method="post" action="../controller/cardManagementController.php">
                    <div class="form-group">
                        <label for="fraud-details">Suspicious Activity Details</label>
                        <textarea id="fraud-details" name="fraud-details" rows="4" placeholder="Describe the suspicious activity"></textarea>
                        <div id="fraudDetailsError" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <button class="btn" id="report-fraud-button">Report Fraud</button>
                        <div id="fraud-message" class="error-message"></div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        <!--------------------Card Management End---------------------------------->
        <script src="../assets/js/cardManagement.js"></script>
        <script src="../assets/js/index.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: login.php");
    exit();
}
?>