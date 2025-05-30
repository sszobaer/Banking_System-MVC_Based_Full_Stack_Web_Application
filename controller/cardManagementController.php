<?php
//ZOBAER AHMED
require_once "../model/users.php";
require_once "../model/cards.php";

function categoryValidation() {
    $category = isset($_POST['category']);
    if ($category === '') {
        echo "Please select a spending limit category.<br>";
        return false;
    }
    if ($category !== 'dining' && $category !== 'travel' && $category !== 'shopping') {
        echo "Invalid category selected.<br>";
        return false;
    }
    return true;
}

function currencyValidation() {
    $currency = isset($_POST['currency']);
    if ($currency === '') {
        echo "Please select a currency.<br>";
        return false;
    }
    if ($currency !== 'USD' && $currency !== 'EUR' && $currency !== 'BDT') {
        echo "Invalid currency selected.<br>";
        return false;
    }
    return true;
}

function limitAmountValidation() {
    $amount = trim($_POST['limit-amount']);
    if (!isset($amount)) {
        echo "Limit amount field is missing.<br>";
        return false;
    }
    if ($amount === '' || !is_numeric($amount)) {
        echo "Please enter a valid limit amount.<br>";
        return false;
    }
    $amountValue = floatval($amount);
    if ($amountValue <= 0) {
        echo "Limit amount must be a positive number.<br>";
        return false;
    }
    if ($amountValue > 10000) {
        echo "Limit amount cannot exceed $10,000.<br>";
        return false;
    }
    return true;
}

function pinValidation() {
    $currentPin = trim(isset($_POST['current-pin']));
    $newPin = trim(isset($_POST['new-pin']));
    $confirmPin = trim(isset($_POST['confirm-pin']));
    if ($currentPin === '') {
        echo "Please enter your current PIN.<br>";
        return false;
    }
    if (strlen($currentPin) !== 4) {
        echo "Current PIN must be 4 digits.<br>";
        return false;
    }
    for ($i = 0; $i < 4; $i++) {
        if ($currentPin[$i] < '0' || $currentPin[$i] > '9') {
            echo "Current PIN must be 4 digits.<br>";
            return false;
        }
    }
    if ($newPin === '') {
        echo "Please enter a new PIN.<br>";
        return false;
    }
    if (strlen($newPin) !== 4) {
        echo "New PIN must be 4 digits.<br>";
        return false;
    }
    for ($i = 0; $i < 4; $i++) {
        if ($newPin[$i] < '0' || $newPin[$i] > '9') {
            echo "New PIN must be 4 digits.<br>";
            return false;
        }
    }
    if ($confirmPin === '') {
        echo "Please confirm your new PIN.<br>";
        return false;
    }
    if ($newPin !== $confirmPin) {
        echo "New PIN and confirmation do not match.<br>";
        return false;
    }
    if ($currentPin === $newPin) {
        echo "New PIN must be different from current PIN.<br>";
        return false;
    }
    return true;
}

function fraudDetailsValidation() {
    $details = trim(isset($_POST['fraud-details']));
    if ($details === '') {
        echo "Please describe the suspicious activity.<br>";
        return false;
    }
    if (strlen($details) > 500) {
        echo "Details cannot exceed 500 characters.<br>";
        return false;
    }
    return true;
}

function cardControlController() {
    return categoryValidation() && currencyValidation() && limitAmountValidation();
}

function pinChangerController() {
    return pinValidation();
}

function fraudAlertController() {
    return fraudDetailsValidation();
}

function getCard(){
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = [
        'email' => $email,
        'password' => $password
    ];
    $userInfo = fetchUser($user);

    $card = ['user_id' => $userInfo];

    $status = fetchAllFromCardByUserId($card);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['set-limit-button'])) {
        if (cardControlController()){
            header("Location: ../view/cardManagement.php");
            exit();
        }
    } elseif (isset($_POST['change-pin-button'])){
        if (pinChangerController()) {
            header("Location: ../view/cardManagement.php");
            exit();
        }
    } elseif (isset($_POST['report-fraud-button'])){
        if (fraudAlertController()) {
            header("Location: ../view/cardManagement.php");
            exit();
        }
    }
}