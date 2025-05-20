<?php
//ZOBAER AHMED
function selectAccountValidation() {
    $selectAccount = trim($_POST["selectAccount"]);
    if (empty($selectAccount)) {
        echo "Please select an account.<br>";
        return false;
    }
    return true;
}

function paymentAccountNumberValidation() {
    $accountNumber = trim($_POST["paymentAccountNumber"]);
    if (empty($accountNumber)) {
        echo "Please enter your account number.<br>";
        return false;
    }

    $length = strlen($accountNumber);
    if ($length < 8 || $length > 12) {
        echo "Account number must be 8-12 digits.<br>";
        return false;
    }

    for ($i = 0; $i < $length; $i++) {
        if ($accountNumber[$i] < "0" || $accountNumber[$i] > "9") {
            echo "Account number must contain only digits.<br>";
            return false;
        }
    }

    return true;
}

function billerValidation() {
    $biller = trim($_POST["biller"]);
    if (empty($biller)) {
        echo "Please select a biller.<br>";
        return false;
    }
    return true;
}

function amountValidation() {
    if (!isset($_POST["amount"])) {
        echo "Amount field is missing.<br>";
        return false;
    }

    $amount = trim($_POST["amount"]);
    if (empty($amount)) {
        echo "Please enter a valid payment amount.<br>";
        return false;
    }

    if (!is_numeric($amount) || floatval($amount) <= 0) {
        echo "Please enter a valid payment amount.<br>";
        return false;
    }

    return true;
}

function currencyValidation() {
    $currency = trim($_POST["currency"]);
    if (empty($currency)) {
        echo "Please select a currency.<br>";
        return false;
    }
    return true;
}

function receiptValidation() {
    if (!isset($_FILES["upload-receipt"])) {
        echo "Receipt file is required.<br>";
        return false;
    }

    $file = $_FILES["upload-receipt"];
    $allowedTypes = ["image/jpg", "image/jpeg", "image/png", "application/pdf"];
    $maxSize = 5 * 1024 * 1024;

    if ($file["error"] !== UPLOAD_ERR_OK) {
        echo "Receipt file is required.<br>";
        return false;
    }

    if (!in_array($file["type"], $allowedTypes)) {
        echo "Only JPG, JPEG, PNG, or PDF formats are allowed.<br>";
        return false;
    }

    if ($file["size"] > $maxSize) {
        echo "File size must be less than 5MB.<br>";
        return false;
    }
    // File upload
    $src = $file["tmp_name"];
    $des = "../assets/uploads/payBill/" . basename($file["name"]);
    if (move_uploaded_file($src, $des)) {
        return true;
    } else {
        echo "Error uploading receipt file.<br>";
        return false;
    }
    return true;
}

function termsValidation() {
    if (!isset($_POST["terms"])) {
        echo "You must agree to the terms and conditions.<br>";
        return false;
    }
    return true;
}

function billPayController() {
    return (
        selectAccountValidation() &&
        paymentAccountNumberValidation() &&
        billerValidation() &&
        amountValidation() &&
        currencyValidation() &&
        receiptValidation() &&
        termsValidation()
    );
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (billPayController()) {
        header("Location: ../view/userDashboard.php");
        exit();
    }
}
?>
