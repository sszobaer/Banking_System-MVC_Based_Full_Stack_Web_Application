<?php
require_once "../model/connection.php";

function insertDeposit($deposit) {
    $conn = getConnection();

    $sql = "INSERT INTO deposits VALUES (
    NULL,
        '{$deposit['account_no']}',
        '{$deposit['deposit_type']}',
        '{$deposit['deposit_method']}',
        '{$deposit['currency']}',
        '{$deposit['amount_per_deposit']}',
        '{$deposit['deposit_amount']}',
        '{$deposit['memo']}',
        '{$deposit['user_id']}',
        '{$deposit['account_id']}'
    )";

    if (mysqli_query($conn, $sql)) {
        $deposit_id = mysqli_insert_id($conn);
        if (!$deposit_id) {
            echo "Insert error: " . mysqli_error($conn);
            return false;
        }
        if ($deposit['deposit_type'] === 'fixed') {
            $sql_fixed = "INSERT INTO fixed_deposits (deposit_id, tenure) VALUES ($deposit_id, '{$deposit['tenure']}')";
            if (!mysqli_query($conn, $sql_fixed)) {
                echo "Fixed SQL Error: " . mysqli_error($conn);
                return false;
            }
        } else if ($deposit['deposit_type'] === 'recurring') {
            $sql_recurring = "INSERT INTO recurring_deposits (deposit_id, deposit_frequency) VALUES ($deposit_id, '{$deposit['frequency']}')";
            if (!mysqli_query($conn, $sql_recurring)) {
                echo "Recurring SQL Error: " . mysqli_error($conn);
                return false;
            }
        }

        return true;
    } else {
        echo "Main SQL Error: " . mysqli_error($conn);
        return false;
    }
}

function fetchDepositById($deposit){
    $conn = getConnection();

    $sql = "SELECT SUM(deposit_amount) AS total_deposit FROM deposits WHERE user_id = '{$deposit['user_id']}'";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}


?>
