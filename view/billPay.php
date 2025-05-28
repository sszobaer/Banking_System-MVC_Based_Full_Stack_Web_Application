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
        <title>Pay Bill</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/_variable.css">
        <link rel="stylesheet" href="../assets/css/_global.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    </head>

    <body>
        <?php
        include "./header.php";
        include "./userSidebar.php";
        ?>
        <section class="bill-pay-main" id="bill-pay-main">
            <div class="bill-pay-container">
                <h1>Pay Bill</h1>
                <form id="billPayForm" method="post" action="../controller/payBillController.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Payment Account Number</label>
                        <input type="text" id="PaymentAccountNumber" name="paymentAccountNumber"
                            placeholder="Enter payment account number">
                        <div id="paymentAccountNumberError" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="biller">select Biller</label>
                        <select id="biller" name="biller">
                            <option value="">Select biller</option>
                            <option value="electric">Electric Company</option>
                            <option value="water">Water Utility</option>
                            <option value="gas">Gas Utillity</option>
                            <option value="internet">Internet Provider</option>
                            <option value="phone">Phone Company</option>
                        </select>
                        <div id="payeeError" class="error-message"></div>
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
                        <label for="amount">Payment Amount</label>
                        <input type="number" id="amount" name="amount" placeholder="Enter payment amount">
                        <div id="amountError" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="memo">Memo (Optional)</label>
                        <input type="text" id="memo" name="memo" placeholder="E.g., Bill Payment Reference">
                        <div id="memoError" class="erroricable=" memoError"></div>
                    </div>
                    <div class="form-group">
                        <label for="upload-receipt">upload Receipt</label>
                        <input type="file" id="upload-receipt"
                            name="upload-receipt">
                        <div id="uploadReceiptError"
                            class="error-message"></div>
                    </div>
                    <div class="form-group-terms">
                        <input type="checkbox" id="terms" name="terms">
                        I agree to the <a href="#" target="_blank" class="termsNdcondition">Terms & Conditions</a>
                        <div id="termsError" class="error-message"></div>
                    </div>
                    <button class="btn" id="pay-btn">Pay Bill</button>
                </form>
            </div>
        </section>
        <script src="../assets/js/billPay.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:../view/login.php");
    exit();
}
?>