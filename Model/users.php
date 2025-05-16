<?php
require_once '../model/connection.php';

function getAllUsers($user) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE email = '{$user['email']}' AND password = '{$user['password']}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        return true;
    } else {
        return false;
    }
}
function insertUser($user){
    $conn = getConnection();
    $sql = "INSERT INTO users VALUES(
    '{$user['id']}',
    '{$user['firstName']}',
    '{$user['lastName']}',
    '{$user['email']}',
    '{$user['phoneNo']}',
    '{$user['dob']}',
    '{$user['gender']}',
    '{$user['accountType']}',
    '{$user['depositAmount']}',
    '{$user['nid/passport']}',
    '{$user['password']}',
    '{$user['presentAddress']}',
    '{$user['permanentAddress']}',
    '{$user['imageUrl']}',
    '{$user['createdAt']}',
    '{$user['updatedAt']}'
)";
$checkEmail = "SELECT * FROM users WHERE email = '{$user['email']}'";
$result = mysqli_query($conn, $checkEmail);
if(mysqli_num_rows($result) > 0){
    return false;
} elseif(mysqli_query($conn, $sql)){
    return true;
} else {
    return false;
}
}

?>