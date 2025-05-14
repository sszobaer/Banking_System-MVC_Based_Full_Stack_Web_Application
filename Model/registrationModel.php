<?php
require_once "../model/connection.php";

function insertUser($userData) {
    $conn = getConnection();

    // Prepared statement with placeholders
    $sql = "INSERT INTO users (
        firstName, lastName, email, phoneNumber, dob, gender,
        accountType, initialDeposit, nid, password,
        presentAddress, permanentAddress, profilePicture
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    if (!$stmt) {
        return [
            'status' => false,
            'message' => 'Error preparing statement: ' . mysqli_error($conn)
        ];
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssissss", 
        $userData['firstName'],
        $userData['lastName'],
        $userData['email'],
        $userData['phone'],
        $userData['dob'],
        $userData['gender'],
        $userData['accountType'],
        $userData['initialDeposit'],
        $userData['nidNumber'],
        $userData['password'],
        $userData['presentAddress'],
        $userData['permanentAddress'],
        $userData['profilePhoto']
    );

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $response = [
            'status' => true,
            'message' => 'User inserted successfully'
        ];
    } else {
        $response = [
            'status' => false,
            'message' => 'Insert failed: ' . mysqli_error($conn)
        ];
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $response;
}
?>
