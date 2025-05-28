<?php
require_once "../Model/connection.php";
function fetchTransactionById($transactions){
    $conn = getConnection();

    $sql = "SELECT SUM(amount) AS total_transaction FROM fund_transfers WHERE user_id = '{$transactions['user_id']}'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}