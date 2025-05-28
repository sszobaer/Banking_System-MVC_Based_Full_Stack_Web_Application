<?php
//ZOBAER AHMED
require_once "../model/connection.php";
function insertAccounts($user) {
    $conn = getConnection();

    $sql = "INSERT INTO accounts (
        account_id, user_id, account_number, account_type, balance, currency, account_status, created_at, updated_at
    ) VALUES (
        NULL,
        '{$user['user_id']}',
        '{$user['account_number']}',
        '{$user['account_type']}',
        '{$user['balance']}',
        '{$user['currency']}',
        '{$user['account_status']}',
        '{$user['created_at']}',
        '{$user['updated_at']}'
    )";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    } else {
        echo "Insert error: " . mysqli_error($conn);
        return false;
    }
}
function fetchAccountsByUserId($user) {
    $conn = getConnection();
    $sql = "SELECT * FROM accounts WHERE user_id = '{$user['user_id']}'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}
function subtractFromAccountBalanceInAccount($account) {
    $conn = getConnection();
    $sql = "UPDATE accounts SET balance = balance - '{$account['payment_amount']}' WHERE account_id = '{$account['account_id']}'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn);
        return false;
    }
}
?>