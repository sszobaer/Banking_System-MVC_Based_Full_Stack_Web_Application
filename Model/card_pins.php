<!-- ZOBAER AHMED -->
<?php
require_once "../model/connection.php";

function insertPin($pin){
    $conn = getConnection();

    $sql = "INSERT INTO card_pins VALUES ('{$pin['pin_id']}', '{$pin['card_id']}','{$pin['pin']}')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn);
        return false;
    }
}
function fetchAllFromCardPin($pin){
    $conn = getConnection();
    $sql = "SELECT * FROM card_pins WHERE card_id = '{$pin['card_id']}'";
    $result = mysqli_query($conn, $sql);
    $pins = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pins[] = $row;
        }
    }
    return $pins;
}
?>