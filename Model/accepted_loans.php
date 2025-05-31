<?php
    require_once "../model/connection.php";
function insertAcceptedLoan($accepted_loan) {

    $conn = getConnection();

    $sql = "INSERT INTO accepted_loans VALUES (
        '{$accepted_loan['accepted_loan_id']}',
        '{$accepted_loan['loan_id']}',
        '{$accepted_loan['user_id']}',
        '{$accepted_loan['account_id']}',
        '{$accepted_loan['loan_amount']}'     
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