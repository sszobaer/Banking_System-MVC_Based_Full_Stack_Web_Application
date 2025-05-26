<?php
//ZOBAER AHMED
function validateCardType(){
    $cardType = $_POST["cardType"];
    if(empty($cardType)){
        echo "Card type must be checked!";
        return false;
    }
    return true;
}
function brandValidation() {
    if (!isset($_POST["cardBrand"])) {
        echo "Please select a card brand.<br>";
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


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (validateCardType() && brandValidation() && termsValidation()) {
        header("Location:/BankingSystem");
        exit;
    }
}

?>