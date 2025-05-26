<?php
//ZOBAER AHMED
error_reporting(E_ALL);
require_once "../Model/users.php";
function validateName()
{
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
    } else if ($atPosition < 1 || $dotPosition < $atPosition + 2 || 
                $dotPosition + 1 >= strlen($email)) {
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
function validatePassword(){
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
function validateConfirmPassword(){
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

function validateUploadPhoto(){
    if (!isset($_FILES["profile-photo"]) || $_FILES["profile-photo"]["error"] === UPLOAD_ERR_NO_FILE) {
        echo "Profile Photo is required.<br>";
        return false;
    }

    $file = $_FILES["profile-photo"];
    $allowedTypes = ["image/jpg", "image/jpeg", "image/png"];
    $maxSize = 5 * 1024 * 1024;

    if ($file["error"] !== UPLOAD_ERR_OK) {
        echo "Error uploading file.<br>";
        return false;
    }

    if (!in_array($file["type"], $allowedTypes)) {
        echo "Only JPG, JPEG, or PNG formats are allowed.<br>";
        return false;
    }

    if ($file["size"] > $maxSize) {
        echo "File size must be less than 5MB.<br>";
        return false;
    }

    $tmp = explode('.', $file['name']);
    $newFileName = round(microtime(true)) . '.' . end($tmp);

    $uploadDir = "../assets/uploads/profilePicture/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadPath = $uploadDir . $newFileName;

    if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
        return true;
    } else {
        echo "Error saving uploaded photo.<br>";
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

function pushUser(){
    $conn = getConnection();
    $file = $_FILES["profile-photo"];
    $tmp = explode('.', $file['name']);
    $newFileName = round(microtime(true)) . '.' . end($tmp);
    $firstName = mysqli_real_escape_string($conn, trim($_POST['firstName']));
    $lastName = mysqli_real_escape_string($conn, trim($_POST['lastName']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $dob = mysqli_real_escape_string($conn, trim($_POST['dob']));
    $gender = mysqli_real_escape_string($conn, trim($_POST['gender']));
    $accountType = mysqli_real_escape_string($conn, trim($_POST['accountType']));
    $initialDeposit = mysqli_real_escape_string($conn, trim($_POST['initialDeposit']));
    $nidNumber = mysqli_real_escape_string($conn, trim($_POST['nidNumber']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $presentAddress = mysqli_real_escape_string($conn, trim($_POST['presentAddress']));
    $permanentAddress = mysqli_real_escape_string($conn, trim($_POST['permanentAddress']));
    $imageUrl = mysqli_real_escape_string($conn, "../assets/uploads/profilePicture/" . $newFileName);
    $createdAt = date("Y-m-d H:i:s");
    $updatedAt = date("Y-m-d H:i:s");
    
    $user = [
        'user_id'=> null,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'phoneNo' => $phone,
        'dob' => $dob,
        'gender' => $gender,
        'accountType' => $accountType,
        'depositAmount' => $initialDeposit,
        'nid/passport' => $nidNumber,
        'password' => $password,
        'presentAddress' => $presentAddress,
        'permanentAddress' => $permanentAddress,
        'imageUrl' => $imageUrl,
        'createdAt' => $createdAt,
        'updatedAt' => $updatedAt
    ];
    $status = insertUser($user);
    if($status){
        return true;
    }else{
        return false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (registrationController() && pushUser()) {
        header('Location: ../view/login.php');
        exit();
    } else{
        echo "The email have already used";
    }
}

