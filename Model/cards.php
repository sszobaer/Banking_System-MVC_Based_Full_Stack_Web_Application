<!-- ZOBAER AHMED -->
<?php
require_once "../model/connection.php";
   function InsertCard ($card){
    $conn = getConnection();
    $sql = "INSERT INTO cards 
    VALUES (
        NULL,
        '{$card['card_type']}',
        '{$card['brand']}',
        '{$card['issue_date']}',
        '{$card['expiry_date']}',
        '{$card['user_id']}'
    )";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn);
        return false;
    }
   }

function fetchAllFromCardByUserId($user){
    $conn = getConnection();
    $sql = "SELECT * FROM cards WHERE user_id = '{$user['user_id']}'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}
?>