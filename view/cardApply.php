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
    <title>Apply for Card</title>
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

    <!--------------------Card Apply Start-------------------------------->
    <section class="cardApply" id="cardApply">
        <div class="cardApplyContainer">
            <h1>Apply for Credit/Debit Card</h1>
            <form id="cardApplyForm" method="post"
                action="../controller/cardApplyController.php"
                enctype="multipart/form-data">

                <div class="form-group">
                    <label for="cardType">Card Type</label>
                    <select id="cardType" name="cardType">
                        <option value>Select Card Type</option>
                        <option value="debit">Debit Card</option>
                        <option value="credit">Credit Card</option>
                        <option value="prepaid">Prepaid Card</option>
                    </select>
                    <div id="cardTypeError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="cardBrand">Card Brand</label>
                    <select id="cardBrand" name="cardBrand">
                        <option value>Select Card Brand</option>
                        <option value="visa">VISA</option>
                        <option value="mastercard">MasterCard</option>
                        <option value="amex">American Express</option>
                        <option value="rupay">Rupay</option>
                    </select>
                    <div id="cardBrandError" class="error-message"></div>
                </div>


                <div class="form-group-checkBox">
                    <input type="checkbox" id="terms" name="terms">
                    I agree to the <a href="./terms.php" target="_blank"
                        class="termsNdcondition">Terms & Conditions</a>
                    <div id="termsError" class="error-message"></div>
                </div>

                <button class="btn" id="applyBtn" name="applyBtn">Apply
                    Now</button>
            </form>
        </div>
    </section>
    <!--------------------Card Apply End---------------------------------->
    <script src="../assets/js/cardApply.js"></script>
    <script src="../assets/js/index.js"></script>
</body>

</html>
<?php
} else {
    header("Location: login.php");
    exit();
}
?>