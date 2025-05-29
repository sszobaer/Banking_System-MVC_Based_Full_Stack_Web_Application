<?php
require_once "../model/accounts.php";
require_once "../model/cards.php";
require_once "../model/users.php";
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = [
        'email' => $email,
        'password' => $password
    ];
    $userInfo = fetchUser($user);
    $account = fetchAccountsByUserId(['user_id' => $userInfo['user_id']]);
    $card = fetchAllFromCardByUserId(['user_id' => $userInfo['user_id']]);
?>