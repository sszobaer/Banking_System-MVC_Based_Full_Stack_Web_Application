<?php
require_once '../model/connection.php';

function fetchUser($user){
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE email = '{$user['email']}' AND password = '{$user['password']}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}
function insertUser($user){
    $conn = getConnection();
    $sql = "INSERT INTO users VALUES(
    '{$user['user_id']}',
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
    '{$user['updatedAt']}',
    '{$user['role_id']}'
)";
    $checkEmail = "SELECT * FROM users WHERE email = '{$user['email']}'";
    $result = mysqli_query($conn, $checkEmail);
    if (mysqli_num_rows($result) > 0) {
        return false;
    } elseif (mysqli_query($conn, $sql)) {
        return true;
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
            JOIN roles r ON u.role_id = r.role_id";
    $result = mysqli_query($conn, $sql);

    $users = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    return $users;
}

function deleteUserFromAdmin($user){
    $conn = getConnection();
    $query = "DELETE FROM users WHERE user_id = '{$user['user_id']}'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Deleted Successfully";
    } else {
        echo "Invalid";
    }
}
function editUserFromAdmin($user){
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
