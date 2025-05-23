<?php
require_once "../Model/users.php";
 function validateName(){
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    if ($firstName === "" || $lastName === "") {
        echo "First and Last Name are required<br>";
        return false;
    }
    return true;
}

function validateEmail(){
    $email = trim($_POST['email']);
    $atPosition = strpos($email, '@');
    $dotPosition = strrpos($email, '.');
    if ($email === "") {
        echo "Email is required<br>";
        return false;
    } else if (strpos($email, '@') === false || strpos($email, '.') === false) {
        echo "Email must contain @ and .<br>";
        return false;
    } else if ($atPosition < 1 || $dotPosition < $atPosition + 2 || $dotPosition + 1 >= strlen($email)) {
        echo "Invalid email format<br>";
        return false;
    }
    return true;
}

function validatePhone(){
    $phone = trim($_POST['phone']);
    if ($phone == "") {
        echo "Phone number is required";
        return false;
    } else if (strlen($phone) != 11) {
        echo "Phone number must be exactly 11 digits";
        return false;
    }
    for ($i = 0; $i < strlen($phone); $i++) {
        if ($phone[$i] < "0" || $phone[$i] > "9") {
            echo "Phone number must contain digits only";
            return false;
            break;
        }
    }
    return true;
}

function validateNid(){
    $nid = trim($_POST['nidNumber']);

    if (empty($nid)) {
        echo "Please enter your nid/passport number.";
        return false;
    } elseif (strlen($nid) !== 10) {
        echo "NID / Passport number must be 10 digits.";
        return false;
    } elseif (!ctype_digit($nid)) {
        echo "NID / Passport number must contain only digits.";
        return false;
    }
    return true;
}
function validateRole(){
    $role = trim($_POST['role']);
    if ($role === "") {
        echo "Role is required<br>";
        return false;
    }
    if ($role !== '1' && $role !== '2' && $role !== '3') {
        echo "Invalid role selected<br>";
        return false;
    }
    return true;
}
function validatePresentAddress(){
    $presentAddress = trim($_POST['presentAddress']);

    if ($presentAddress === "") {
        echo "Present address is required.";
        return false;
    }
    return true;
}
function validatePermanentAddress(){
    $permanentAddress = trim($_POST['permanentAddress']);

    if ($permanentAddress === "") {
        echo "Permanent address is required.";
        return false;
    }
    return true;
}


function editUserController()
{
    return(
        validateName() &&
        validateEmail() &&
        validatePhone() &&
        validateNid() &&
        validateRole() &&
        validatePresentAddress() &&
        validatePermanentAddress()
    );
}

function updateUserController() {
    $userId = trim($_POST['user_id']);
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $nidNumber = trim($_POST['nidNumber']);
    $role = trim($_POST['role']);
    $presentAddress = trim($_POST['presentAddress']);
    $permanentAddress = trim($_POST['permanentAddress']);
    $updatedAt = date("Y-m-d H:i:s");

    $user = [
        'user_id' => $userId,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'phoneNo' => $phone,
        'nid_passport' => $nidNumber,
        'role_id' => intval($role),
        'presentAddress' => $presentAddress,
        'permanentAddress' => $permanentAddress,
        'updatedAt' => $updatedAt
    ];
    // print_r($user);
    $status = updateUserByAdmin($user); 
    // print_r($status);
    if($status) {
        return true;
    } else {
        echo "Failed to update user information<br>";
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (editUserController() && updateUserController()) {
        header('Location: ../view/userManagement.php');
        exit();
    } else {
        echo "Invalid input<br>";
    }

}
?>