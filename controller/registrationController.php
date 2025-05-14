<?php
require_once "../Model/registrationModel.php";
function validateName()
{
    global $firstName, $lastName;
    if ($firstName === "" || $lastName === "") {
        echo "First and Last Name are required<br>";
        return false;
    }
    return true;
}

function validateEmail()
{
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

function validatePhone()
{
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

function validateDateofBirth()
{
    $dateOfBirth = trim($_POST['dob']);
    if ($dateOfBirth == "") {
        echo "Date of Birth is required<br>";
        return false;
    }
    return true;
}

function validateGender()
{
    if (!isset($_POST['gender']) || trim($_POST['gender']) == "") {
        echo "Gender is required<br>";
        return false;
    }
    return true;
}

function validateAccountType()
{
    $accountType = trim($_POST['accountType']);
    if ($accountType == "") {
        echo "Account Type is required<br>";
        return false;
    }
    return true;
}

function validateInitialDeposit()
{
    $initialDeposit = trim($_POST['initialDeposit']);
    if ($initialDeposit == "") {
        echo "Initial Deposit is required<br>";
        return false;
    } else if (!is_numeric($initialDeposit) || $initialDeposit < 0) {
        echo "Initial Deposit must be a valid number<br>";
        return false;
    }
    return true;
}
function validateNid()
{
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
function validatePassword()
{
    $password = trim($_POST['password']);

    if ($password == "") {
        echo "Password is required<br>";
        return false;
    } else if (strlen($password) < 6) {
        echo "Password must be at least 6 characters<br>";
        return false;
    }
    return true;
}
function validateConfirmPassword()
{
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    if (empty($confirmPassword)) {
        echo "Confirm password is required";
        return false;
    } else if ($password !== $confirmPassword) {
        echo "Password and confirm password does not match";
        return false;
    }
    return true;
}
function validatePresentAddress()
{
    $presentAddress = trim($_POST['presentAddress']);

    if ($presentAddress === "") {
        echo "Present address is required.";
        return false;
    }
    return true;
}
function validatePermanentAddress()
{
    $permanentAddress = trim($_POST['permanentAddress']);

    if ($permanentAddress === "") {
        echo "Permanent address is required.";
        return false;
    }
    return true;
}
function validateUploadPhoto()
{
    $profilePhoto = $_FILES["profile-photo"];
    if (!$profilePhoto) {
        echo "Profile Photo is required.<br>";
        return false;
    }

    $allowedTypes = ["image/jpg", "image/jpeg", "image/png"];
    $maxSize = 5 * 1024 * 1024;

    if ($profilePhoto["error"] !== UPLOAD_ERR_OK) {
        echo "Profile Picture is required.<br>";
        return false;
    }

    if (!in_array($profilePhoto["type"], $allowedTypes)) {
        echo "Only JPG, JPEG, or PNG formats are allowed.<br>";
        return false;
    }

    if ($profilePhoto["size"] > $maxSize) {
        echo "File size must be less than 5MB.<br>";
        return false;
    }

    $uploadPath = "../assets/uploads/profilePicture/";
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $src = $profilePhoto["tmp_name"];
    $des = $uploadPath . basename($profilePhoto["name"]);

    if (move_uploaded_file($src, $des)) {
        return true;
    } else {
        echo "Error uploading profile photo.<br>";
        return false;
    }
}

function registrationController()
{
    return (
        validateName() &&
        validateEmail() &&
        validatePhone() &&
        validateDateofBirth() &&
        validateGender() &&
        validateAccountType() &&
        validateInitialDeposit() &&
        validateNid() &&
        validatePassword() &&
        validateConfirmPassword() &&
        validatePresentAddress() &&
        validatePermanentAddress() &&
        validateUploadPhoto()
    );
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (registrationController()) {
        // Collecting form data from POST
    $userData = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'dob' => $_POST['dob'],
        'gender' => $_POST['gender'],
        'accountType' => $_POST['accountType'],
        'initialDeposit' => $_POST['initialDeposit'],
        'nidNumber' => $_POST['nidNumber'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // hashing password
        'presentAddress' => $_POST['presentAddress'],
        'permanentAddress' => $_POST['permanentAddress'],
        'profilePhoto' => $_FILES['profile-photo']['name'],
    ];
    $result = insertUser($userData);

    if ($result['status']) {
        echo $result['message'];
    } else {
        echo "Error: " . $result['message'];
    }
    }
}

