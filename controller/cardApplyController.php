<?php
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

function validateDateofBirth(){
    $dateOfBirth = trim($_POST['dob']);
    if ($dateOfBirth == "") {
        echo "Date of Birth is required<br>";
        return false;
    }
    return true;
}

function validateGender(){
    if (!isset($_POST['gender']) || trim($_POST['gender']) == "") {
        echo "Gender is required<br>";
        return false;
    }
    return true;
}
function validateAccountNo(){
    $accountNumber = trim($_POST["acc-no"]);
    if (empty($accountNumber)) {
        echo "Please enter your account number.<br>";
        return false;
    }

    $length = strlen($accountNumber);
    if ($length < 8 || $length > 12) {
        echo "Account number must be 8-12 digits.<br>";
        return false;
    }

    for ($i = 0; $i < $length; $i++) {
        if ($accountNumber[$i] < "0" || $accountNumber[$i] > "9") {
            echo "Account number must contain only digits.<br>";
            return false;
        }
    }

    return true;
}
function validateCardType(){
    $cardType = $_POST["cardType"];
    if(empty($cardType)){
        echo "Card type must be checked!";
        return false;
    }
    return true;
}
function brandValidation() {
    if (!isset($_POST["cardBrand"])) {
        echo "Please select a card brand.<br>";
        return false;
    }
    return true;
}

function occupationValidation() {
    $occupation = trim($_POST["occupation"]);
    if (empty($occupation)) {
        echo "Please enter your occupation.<br>";
        return false;
    }
    return true;
}

function incomeValidation() {
    $income = trim($_POST["monthlyIncome"]);
    if (empty($income)) {
        echo "Please enter your income.<br>";
        return false;
    } elseif (!is_numeric($income) || floatval($income) <= 0) {
        echo "Income must be a valid positive number.<br>";
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

function profilePhotoValidation() {
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

    $uploadPath = "../assets/uploads/creditCardProfilePicture/";
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

function termsValidation() {
    if (!isset($_POST["terms"])) {
        echo "You must agree to the terms and conditions.<br>";
        return false;
    }
    return true;
}

function registrationController() {
    return (
        validateName() &&
        validateEmail() &&
        validatePhone() &&
        validateDateofBirth() &&
        validateGender() &&
        validateAccountNo() &&
        validateCardType() &&
        brandValidation() &&
        occupationValidation() &&
        incomeValidation() &&
        validatePresentAddress() &&
        validatePermanentAddress() &&
        profilePhotoValidation() &&
        termsValidation()
    );
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (registrationController()) {
        header("Location:/BankingSystem");
        exit;
    }
}

?>