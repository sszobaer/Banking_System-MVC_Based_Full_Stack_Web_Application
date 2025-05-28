<?php
require_once '../model/connection.php';
//bill_id	dest_account_no	biller	currency	payment_amount	memo	receipt	user_id	account_id	account_no	

// Insert a new bill payment
function insertBillPayment($bill) {
    $conn = getConnection();
    $sql = "INSERT INTO pay_bills (
        bill_id, dest_account_no, biller, currency, payment_amount, memo, receipt, user_id, account_id, account_no
    ) VALUES (
        NULL,
        '{$bill['dest_account_no']}',
        '{$bill['biller']}',
        '{$bill['currency']}',
        '{$bill['payment_amount']}',
        '{$bill['memo']}',
        '{$bill['receipt']}',
        '{$bill['user_id']}',
        '{$bill['account_id']}',
        '{$bill['account_no']}'
    )";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn);
        return false;
    }
}

function fetchAllBillPayments() {
    $conn = getConnection();
    $sql = "SELECT * FROM pay_bills ORDER BY bill_id DESC";
    $result = mysqli_query($conn, $sql);
    $bills = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $bills[] = $row;
        }
    }
    return $bills;
}

function fetchBillPaymentsByUser($user_id) {
    $conn = getConnection();
    $user_id = mysqli_real_escape_string($conn, $user_id);
    $sql = "SELECT * FROM pay_bills WHERE user_id = '$user_id' ORDER BY bill_id DESC";
    $result = mysqli_query($conn, $sql);
    $bills = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $bills[] = $row;
        }
    }
    return $bills;
}

function fetchBillPaymentById($bill_id) {
    $conn = getConnection();
    $bill_id = mysqli_real_escape_string($conn, $bill_id);
    $sql = "SELECT * FROM pay_bills WHERE bill_id = '$bill_id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}
?>