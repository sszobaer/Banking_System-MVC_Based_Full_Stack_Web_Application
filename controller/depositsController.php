<?php
function accountNumberValidation(){
    $accountNumber = trim($_POST["accountNumber"]);
    if (empty($accountNumber)) {
        echo "Please enter your account number.<br>";
        return false;
    } else {
        $length = strlen($accountNumber);
        if ($length < 8 || $length > 12) {
            echo "Account number must be 8-12 digits.<br>";
            return false;
        }

        for ($i = 0; $i < $length; $i++) {
            if ($accountNumber[$i] < "0" || $accountNumber[$i] > "9") {
                echo "Account number must contain only digits.<br>";
                return false;
                break;
            }
        }
    }
    return true;
}
function depositTypeValidation(){
    $depositeType=trim($_POST["depositType"]);
    if (empty($depositeType)) {
        echo "Please select a deposit type.<br>";
        return false;
    }
    return true;
}
function tenureValidation(){
    $depositType = isset($_POST["tenure"]);
    $fixedDeposit = $_POST["depositType"];
    $tenure = trim($_POST["tenure"]);
    if ( $depositType && $fixedDeposit === "fixed") {
        if (empty($tenure)) {
            echo "Please select a tenure for fixed deposit.<br>";
            return false;
        }
    }
    return true;
}
function frequencyValidation(){
    if (isset($_POST["depositType"]) && $_POST["depositType"] === "recurring") {
        if (empty($_POST["frequency"])) {
            echo "Please select a deposit frequency.<br>";
            return false;
        }
    }
    return true;
}
function depositMethodValidation(){
    if (empty($_POST["depositMethod"])) {
        echo "Please select a deposit method.<br>";
        return false;
    }
    return true;
}
function currencyValidation(){
    if (empty($_POST["currency"])) {
        echo "Please select a currency.<br>";
        return false;
    }
    return true;
}
function amountvalidation() {
    if (empty(isset($_POST["amount"]))) {
        echo "Amount field is missing.<br>";
        return false;
    }

    $amount = trim($_POST["amount"]);

    if (empty($amount)) {
        echo "Please enter an amount.<br>";
        return false;
    }

    $decimalCount = 0;

    for ($i = 0; $i < strlen($amount); $i++) {
        if ($amount[$i] === ".") {
            $decimalCount++;
            if ($decimalCount > 1) {
                echo "Amount must be a valid decimal number.<br>";
                return false;
            }
        } elseif ($amount[$i] < "0" || $amount[$i] > "9") {
            if ($amount[$i] !== ".") {
                echo "Amount must be a valid number.<br>";
                return false;
            }
        }
    }

    $amountValue = floatval($amount);

    if ($amountValue <= 0) {
        echo "Amount must be a positive number.<br>";
        return false;
    }

    if (isset($_POST["depositType"])) {
        $depositType = $_POST["depositType"];

        if ($depositType === "fixed" && $amountValue < 1000) {
            echo "Fixed deposit requires minimum \$1000.<br>";
            return false;
        } elseif ($depositType === "recurring" && $amountValue > 5000) {
            echo "Recurring deposit cannot exceed \$5000 per deposit.<br>";
            return false;
        }
    }

    if ($amountValue > 10000) {
        echo "Amount cannot exceed \$10,000.<br>";
        return false;
    }

    return true;
}
function memoValidation(){
    if (!empty($_POST["memo"])) {
        $memo = trim($_POST["memo"]);
        if (strlen($memo) > 50) {
            echo "Memo cannot exceed 50 characters.<br>";
            return false;
        }
    }
    return true;
}
function termsValidation(){
    if (!isset($_POST["terms"])) {
        echo "You must agree to the terms and conditions.<br>";
        return false;
    }
    return true;
}

function depositController(){
    return(
        accountNumberValidation() &&
        depositTypeValidation()&&
        tenureValidation() &&
        frequencyValidation()&&
        depositMethodValidation() &&
        currencyValidation() &&
        amountvalidation() &&
        memoValidation() &&
        termsValidation()
    );
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(depositController()){
        header("location:../view/userDashboard.php");
    }
}
?>
