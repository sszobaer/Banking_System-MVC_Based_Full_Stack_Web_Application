<?php
//ZOBAER AHMED
require_once '../model/connection.php';

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
function fetchAllBillPaymentsById($payBill){
    $conn = getConnection();

    $sql = "SELECT SUM(payment_amount) AS total_bill_payment FROM pay_bills WHERE user_id = '{$payBill['user_id']}'";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}
?>