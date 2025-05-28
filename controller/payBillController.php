<?php
//ZOBAER AHMED
session_start();
error_reporting(E_ALL);
require_once '../model/pay_bills.php';
require_once '../model/users.php';
require_once '../model/accounts.php';

function paymentAccountNumberValidation()
{
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

function billerValidation()
{
    $biller = trim($_POST["biller"]);
    if (empty($biller)) {
        echo "Please select a biller.<br>";
        return false;
    }
    return true;
}

function amountValidation()
{
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

function currencyValidation()
{
    $currency = trim($_POST["currency"]);
    if (empty($currency)) {
        echo "Please select a currency.<br>";
        return false;
    }
    return true;
}

function receiptValidation()
{
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

function termsValidation()
{
    if (!isset($_POST["terms"])) {
        echo "You must agree to the terms and conditions.<br>";
        return false;
    }
    return true;
}

function billPayController()
{
    return (
        paymentAccountNumberValidation() &&
        billerValidation() &&
        amountValidation() &&
        currencyValidation() &&
        receiptValidation() &&
        termsValidation()
    );
}
function handleBillPayement()
{
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = [
        'email' => $email,
        'password' => $password
    ];
    $userInfo = fetchUser($user);

    // print_r($userInfo);
    // echo "<br>";

    $account = [
        'user_id' => $userInfo['user_id']
    ];
    $accountInfo = fetchAccountsByUserId($account);
    $paymentAmount = trim($_POST['amount']);

    if ($accountInfo['balance'] < $paymentAmount && $userInfo['depositAmount'] < $paymentAmount) {
        echo "Insufficient balance in your account.";
        return false;
    }
    $accountId = $accountInfo['account_id'];

    $account = [
        'account_id' => $accountId,
        'payment_amount' => $paymentAmount
    ];
    $user = [
        'user_id' => $userInfo['user_id'],
        'payment_amount' => $paymentAmount
    ];
    $status_for_users = subtractFromAccountBalanceInUsers($user);
    $status_for_accounts = subtractFromAccountBalanceInAccount($account);
    if ($status_for_users && $status_for_accounts) {
        return true;
    } else {
        echo "Error updating account balance.";
        return false;
    }
}

function pushBillPayData()
{
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = [
        'email' => $email,
        'password' => $password
    ];
    $userInfo = fetchUser($user);

    // print_r($userInfo);
    // echo "<br>";

    $account = [
        'user_id' => $userInfo['user_id']
    ];
    $accountInfo = fetchAccountsByUserId($account);

    // print_r($accountInfo);
    // echo "<br>";

    $file = $_FILES["upload-receipt"];
    $tmp = explode('.', $file['name']);
    $newFileName = round(microtime(true)) . '.' . end($tmp);

    $paymentAccountNo = trim($_POST['paymentAccountNumber']);
    $biller = trim($_POST['biller']);
    $currency = trim($_POST['currency']);
    $amount = trim($_POST['amount']);
    $memo = isset($_POST['memo']) ? trim($_POST['memo']) : '';
    $user_id = $userInfo['user_id'];
    $account_id = $accountInfo['account_id'];
    $account_no = $accountInfo['account_number'];
    $receipt = "../assets/uploads/payBill/" . $newFileName;

    $bill = [
        'dest_account_no' => $paymentAccountNo,
        'biller' => $biller,
        'currency' => $currency,
        'payment_amount' => $amount,
        'memo' => $memo,
        'user_id' => $user_id,
        'account_id' => $account_id,
        'account_no' => $account_no,
        'receipt' => $receipt
    ];
    if(!handleBillPayement()) {
        return false;
    }

    $status = insertBillPayment($bill);

    // print_r($status);

    if ($status) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (billPayController() && pushBillPayData()) {
        header("Location: ../view/userDashboard.php");
        exit();
    }
    // pushBillPayData();
}
