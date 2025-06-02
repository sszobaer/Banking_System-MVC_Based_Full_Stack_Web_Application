<?php
//ZOBAER AHMED
require_once "../model/connection.php";

function insertLoanApplications($loan){
    $conn = getConnection();
    $sql = "INSERT INTO loan_applications VALUES (
        '{$loan['loan_id']}',
        '{$loan['employment_type']}',
        '{$loan['currency']}',
        '{$loan['loan_type']}',
        '{$loan['monthly_income']}',
        '{$loan['loan_amount']}',
        '{$loan['acknowledgement_slip_no']}',
        '{$loan['user_id']}'
        
    )";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn);
        return false;
    }
}

function fetchAllLoanApplication(){
    $conn = getConnection();
    $sql = "SELECT * FROM loan_applications ORDER BY loan_id DESC";
    $result = mysqli_query($conn, $sql);

    $loan = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $loan[] = $row;
        }
    }
    return $loan;
}

function fetchRequestedLoanById($loan){
    $conn = getConnection();

    $sql = "SELECT * FROM loan_applications WHERE loan_id = '{$loan['loan_id']}'";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}


