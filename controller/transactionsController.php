<?php
require_once "../Model/connection.php";
require_once "../Model/users.php";
require_once "../Model/transactions.php";
session_start();

function getFundTransfers(){
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    $user = [
        'email' => $email,
        'password' => $password
    ];

    $userInfo = fetchUser($user);

    $transactions = [
        'user_id' => $userInfo['user_id']
    ];
    // print_r($transactions);

    $status = fetchTransactionById($transactions);

    if ($status) {
        return json_encode($status);
    } else {
        echo "No deposit found.";
    }
}
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo getFundTransfers();
}
