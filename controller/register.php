<?php 
    function validateName(){  
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        if($firstName === "" || $lastName === ""){
            echo "<script>alert('Name is Required');</script>";
        }
    }
    function validateEmail(){
        $email = trim($_POST['email']);
        if($email == ""){
            echo "<script>alert('Email is required');</script>";
        } 
    }
    function validatePhone(){
        $phone = trim($_POST['phone']);
        if($phone == ""){
            echo "<script>alert('Phone is required');</script>";
        }
        else if(!strlen($phone)==11){
            echo "<script>alert('Phone number must be 11 digits');</script>";
        }
        for ($i = 0; $i < strlen($phone); $i++) {
            if ($phone[$i] < "0" || $phone[$i] > "9") {
                echo "<script>alert('Phone number must be digits only');</script>";
            }
          }
    }
    function validateDateofBirth(){
        $dateOfBirth = trim($_POST['dob']);
        if($dateOfBirth == ""){
            echo "<script>alert('Date of Birth is required');</script>";
        }
    }
    function validateGender(){
        $gender = trim($_POST['gender']);
        if($gender == ""){
            echo "<script>alert('Date of Birth is required');</script>";
    }
    function validateAccountType(){
        $accountType = trim($_POST['accountType']);
        if($accountType == ""){
            echo "<script>alert('Account Type is required');</script>";
        } 
    }
    function validateInitialDeposit(){
        $initialDeposit = trim($_POST['initialDeposit']);
        if($initialDeposit == ""){
            echo "<script>alert('Initial Deposit is required');</script>";
        } 
    }
    function validatePassword(){
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmPassword']);
        if($password == ""){
            echo "<script>alert('Password is required');</script>";
        } else if($confirmPassword == ""){
            echo "<script>alert('Confirm Password is required');</script>";
        } else if($password != $confirmPassword){
            echo "<script>alert('Passwords do not match');</script>";
        }
    }
    $btnClicked = isset($_POST['regBtn']);
    if($btnClicked){
        validateName();
    }
}
?>