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
?>