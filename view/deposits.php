<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposits</title>
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
    <section class="deposits-main" id="deposits-main">
        <div class="deposit-container">
            <h1>Make a Deposit</h1>
            <form id="depositForm" method="post" action="../controller/depositsController.php">
                <div class="form-group">
                    <label for="accountNumber">Account Number</label>
                    <input type="text" id="accountNumber" name = "accountNumber" placeholder="Enter account number" >
                    <div id="accountNumberError" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="depositType">Deposit Type</label>
                    <select id="depositType" name="depositType">
                        <option value="">Select deposit type</option>
                        <option value="savings">Savings Deposit</option>
                        <option value="checking">Checking Deposit</option>
                        <option value="fixed">Fixed Deposit</option>
                        <option value="recurring">Recurring Deposit</option>
                    </select>
                    <div id="depositTypeError" class="error-message"></div>
                </div>
                <div class="form-group" id="tenureGroup">
                    <label for="tenure">Tenure (Months)</label>
                    <select id="tenure" name="tenure">
                        <option value="">Select tenure</option>
                        <option value="6">6 Months</option>
                        <option value="12">12 Months</option>
                        <option value="24">24 Months</option>
                        <option value="36">36 Months</option>
                    </select>
                    <div id="tenureError" class="error-message"></div>
                </div>
                <div class="form-group" id="frequencyGroup">
                    <label for="frequency">Deposit Frequency</label>
                    <select id="frequency" name="frequency">
                        <option value="">Select frequency</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="semi-annually">Semi-Annually</option>
                    </select>
                    <div id="frequencyError" class="error-message"></div>
                </div>
                <div class="form-group" id="depositMethodGroup">
                    <label for="depositMethod">Deposit Method</label>
                    <select id="depositMethod" name="depositMethod">
                        <option value="">Select deposit method</option>
                        <option value="cash">Cash</option>
                        <option value="check">Check</option>
                        <option value="transfer">Electronic Transfer</option>
                    </select>
                    <div id="depositMethodError" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="currency">Currency</label>
                    <select id="currency" name="currency" aria-describedby="currencyError">
                        <option value="">Select currency</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="BDT">BDT</option>
                    </select>
                    <div id="currencyError" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="amount" id="amountLabel">Deposit Amount</label>
                    <input type="number" id="amount" name = "amount"placeholder="Enter deposit amount" min="1" step="0.01">
                    <div id="amountError" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="memo">Memo (Optional)</label>
                    <input type="text" id="memo" placeholder="E.g., Salary, Gift">
                    <div id="memoError" class="error-message"></div>
                </div>
                <div class="form-group-terms">
                    <input type="checkbox" id="terms" name="terms">
                    I agree to the <a href="#" target="_blank"
                        class="termsNdcondition">Terms & Conditions</a>
                    <div id="termsError" class="error-message"></div>
                </div>
                <button class="btn" id="deposite-btn">Deposit</button>
            </form>
        </div>
    </section>
    <script src="../assets/js/deposits.js"></script>
</body>

</html>