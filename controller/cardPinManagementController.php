<?php
require_once "../model/connection.php";
require_once "../model/cards.php";
require_once "../model/users.php";

function pinValidation() {
    $setPin = trim(isset($_POST['set-pin']));
    $confirmPin = trim(isset($_POST['confirm-pin']));
    if ($setPin === '') {
        echo "Please enter a new PIN.<br>";
        return false;
    }
    if (strlen($setPin) !== 4) {
        echo "PIN must be 4 digits.<br>";
        return false;
    }
    for ($i = 0; $i < 4; $i++) {
        if ($setPin[$i] < '0' || $setPin[$i] > '9') {
            echo "PIN must be 4 digits.<br>";
            return false;
        }
    }
    if ($confirmPin === '') {
        echo "Please confirm your new PIN.<br>";
        return false;
    }
    if ($setPin !== $confirmPin) {
        echo "PIN and confirmation do not match.<br>";
        return false;
    }
    return true;
}
function pushPin(){
    $setPin = trim(isset($_POST['set-pin']));
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = [
        'email' => $email,
        'password' => $password
    ];
    $userInfo = fetchUser($user);

    $cardInfo = fetchAllFromCardByUserId($userInfo['user_id']);
//'{$pin['pin_id']}', '{$pin['card_id']}','{$pin['pin']}'
    $pin = [
        'pin_id' => NULL,
        'card_id' => $cardInfo['card_id'],
        'pin' => $setPin
    ];
}

function getCardPins(){
    
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (pinValidation() && pushPin()) {
        header("Location: ../view/cardPin.php");
        exit();
    }
}
?>