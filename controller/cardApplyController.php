<?php
//ZOBAER AHMED
session_start();
require_once "../model/cards.php";
require_once "../model/users.php";
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

function pushCard(){
    $cardType = $_POST["cardType"];
    $cardBrand = isset($_POST["cardBrand"]);
    // $issueDate = date("Y-m-d");
    // $expiryDate = date("Y-m-d", strtotime("+5 years"));
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = [
        'email' => $email,
        'password' => $password
    ];
    $userInfo = fetchUser($user);

    $card = [
        'card_type' => $cardType,
        'brand' => $cardBrand,
        'issue_date' => NULL,
        'expiry_date' => NULL,
        'user_id' => $userInfo['user_id']
    ];

    $status = InsertCard($card);

    if($status){
        // print_r($status);
        // print_r($userInfo);
        // echo $userInfo['user_id'];
        return true;
    } else{
        return false;
    }

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (validateCardType() && brandValidation() && termsValidation() && pushCard()) {
        header('location: ../view/cardInitial.php');
        exit;
    }
}

?>