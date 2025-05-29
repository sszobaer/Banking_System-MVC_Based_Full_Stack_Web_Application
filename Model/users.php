<?php
require_once '../model/connection.php';

function fetchUser($user) {
    $conn = getConnection();

    $sql = "SELECT u.*, r.role AS role_name 
            FROM users u 
            LEFT JOIN roles r ON u.role_id = r.role_id
            WHERE u.email = '{$user['email']}' AND u.password = '{$user['password']}'";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function insertUser($user) {
    $conn = getConnection();

    $sql = "INSERT INTO users (
        user_id, firstName, lastName, email, phoneNo, dob, gender,
        accountType, depositAmount, `nid/passport`, password,
        presentAddress, permanentAddress, imageUrl,
        createdAt, updatedAt
    ) VALUES (
        NULL,
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

    if (mysqli_num_rows($result) == 0) {
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Insert error: " . mysqli_error($conn); // Debugging line
            return false;
        }
    } else {
        return false;
    }
}

function updateUser($user){
    $conn = getConnection();
    $sql = "UPDATE users SET
        `firstName` = '{$user['firstName']}',
        `lastName` = '{$user['lastName']}',
        `email` = '{$user['email']}',
        `phoneNo` = '{$user['phoneNo']}',
        `dob` = '{$user['dob']}',
        `gender` = '{$user['gender']}',
        `nid/passport` = '{$user['nid/passport']}',
        `presentAddress` = '{$user['presentAddress']}',
        `permanentAddress` = '{$user['permanentAddress']}',
        `updatedAt` = '{$user['updatedAt']}',
        `role_id` = '{$user['role_id']}'
     WHERE email = '{$user['email']}'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function updateUserByAdmin($user){
    $conn = getConnection();
    $sql = "UPDATE users SET
        `user_id` = '{$user['user_id']}',
        `firstName` = '{$user['firstName']}',
        `lastName` = '{$user['lastName']}',
        `email` = '{$user['email']}',
        `phoneNo` = '{$user['phoneNo']}',
        `nid/passport` = '{$user['nid_passport']}',
        `presentAddress` = '{$user['presentAddress']}',
        `permanentAddress` = '{$user['permanentAddress']}',
        `updatedAt` = '{$user['updatedAt']}',
        `role_id` = '{$user['role_id']}'
     WHERE user_id = '{$user['user_id']}'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn);
        return false;
    }
}
function updateAvatar($user){
    $conn = getConnection();
    $sql = "UPDATE users SET imageUrl = '{$user['imageUrl']}', updatedAt = '{$user['updatedAt']}' WHERE email = '{$user['email']}'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function updatePassword($user){
    $conn = getConnection();
    $sql = "UPDATE users SET password = '{$user['password']}', updatedAt = '{$user['updatedAt']}' WHERE email = '{$user['email']}'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function fetchAllUser(){
    $conn = getConnection();
    $sql = "SELECT u.*, r.role AS role
            FROM users u 
            LEFT JOIN roles r ON u.role_id = r.role_id ORDER BY u.user_id DESC";
    $result = mysqli_query($conn, $sql);

    $users = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    return $users;
}
function fetchIndivisualUserbyID($user){
    $conn = getConnection();
    $sql = "SELECT u.*, r.role AS role
            FROM users u 
            LEFT JOIN roles r ON u.role_id = r.role_id WHERE u.user_id = {$user['user_id']}";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function deleteUserByAdmin($user){
    $conn = getConnection();
    $query = "DELETE FROM users WHERE user_id = '{$user['user_id']}'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Deleted Successfully";
    } else {
        echo "Invalid";
    }
}
function editUserByAdmin($user){
    $conn = getConnection();
    $query = "SELECT * FROM users WHERE user_id = '{$user['user_id']}'";
    $result = mysqli_query($conn, $query);
    $info = mysqli_fetch_assoc($result);
    if ($result) {
        return $info;
    } else {
        echo "User not found";
        return false;
    }
}
function approveUserByAdmin($user){
    $conn = getConnection();
    $query = "UPDATE users SET role_id = 2 WHERE user_id = '{$user['user_id']}'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
function rejectUserByAdmin($user){
    $conn = getConnection();
    $query = "DELETE FROM users WHERE user_id = '{$user['user_id']}'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function subtractFromAccountBalanceInUsers($user) {
    $conn = getConnection();
    $sql = "UPDATE users SET depositAmount = depositAmount - '{$user['payment_amount']}' WHERE user_id = '{$user['user_id']}'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn);
        return false;
    }
}
function additionFromAccountBalanceInUsers($user){
    $conn = getConnection();
    $sql = "UPDATE users SET depositAmount = depositAmount + '{$user['deposit_amount']}' WHERE user_id = '{$user['user_id']}'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "SQL Error: " . mysqli_error($conn);
        return false;
    }
}
