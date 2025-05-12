<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/_variable.css">
    <link rel="stylesheet" href="../assets/css/_global.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
        rel="stylesheet">
</head>

<body>
<?php
    include "./header.php";
    ?>
    <!--------------------Sign Up Start-------------------------------->
    <section class="reg" id="reg">
        <div class="regContainer">
            <h1>Bank Registration Form</h1>
            <form id="registrationForm" method="post"
                action="../controller/registrationController.php">
                <div class="form-group">
                    <div class="name-group">
                        <div class="name-field">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName"
                                name="firstName"
                                placeholder="Enter your first name">
                            <div id="firstNameError"
                                class="error-message"
                                name="error-message"></div>
                        </div>
                        <div class="name-field">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName"
                                placeholder="Enter your last name">
                            <div id="lastNameError"
                                class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email"
                        placeholder="Enter your email">
                    <div id="emailError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone"
                        placeholder="Enter your phone number">
                    <div id="phoneError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob">
                    <div id="dobError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-group">
                        <input type="radio" id="male" name="gender"
                            value="male">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender"
                            value="female">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender"
                            value="other">
                        <label for="other">Other</label>
                    </div>
                    <div id="genderError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="accountType">Account Type</label>
                    <select id="accountType" name="accountType">
                        <option value>Select Account Type</option>
                        <option value="savings">Savings Account</option>
                        <option value="checking">Checking Account</option>
                        <option value="business">Business Account</option>
                    </select>
                    <div id="accountTypeError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="initialDeposit">Initial Deposit
                        (USD)</label>
                    <input type="number" id="initialDeposit"
                        name="initialDeposit" placeholder="Enter amount">
                    <div id="initialDepositError"
                        class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="nidNumber">NID / Passport Number</label>
                    <input type="text" id="nidNumber" name="nidNumber"
                        placeholder="Enter your NID or Passport Number">
                    <div id="nidNumberError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" class="password-field"
                            id="password" name="password"
                            placeholder="Enter your Password">
                        <span class="toggle-password eye-icon">👁️</span>
                    </div>
                    <div id="passwordError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <div class="password-container">
                        <input type="password" class="password-field"
                            id="confirmPassword" name="confirmPassword"
                            placeholder="Confirm your new Password">
                        <span class="toggle-password eye-icon">👁️</span>
                    </div>
                    <div id="confirmPasswordError"
                        class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="presentAdress">Present Address</label>
                    <input type="presentAdress" id="presentAdress"
                        name="presentAddress"
                        placeholder="Enter your present adress">
                    <div id="presentAdressError"
                        class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="permanentAdress">Permanent Address</label>
                    <input type="permanentAdress" id="permanentAdress"
                        name="permanentAdress"
                        placeholder="Enter your permanent adress">
                    <div id="permanentAdressError"
                        class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="profile-photo">Profile Picture</label>
                    <input type="file" id="profile-photo"
                        name="profile-photo">
                    <div id="profilePhotoError"
                        class="error-message"></div>
                </div>
                <div class="form-group-terms">
                    <input type="checkbox" id="terms" name="terms">
                    I agree to the <a href="./terms.php" target="_blank"
                        class="termsNdcondition">Terms & Conditions</a>
                    <div id="termsError" class="error-message"></div>
                </div>

                <div class="login-link">
                    Already have an account? <a href="./login.php">Login</a>
                </div>
                <button class="btn" id="regBtn"
                    name="regBtn">Register</button>
            </form>
        </div>
    </section>
    <?php
    include "./footer.php";
    ?>
    <!--------------------Sign Up End---------------------------------->
    <script src="../assets/js/registrationValidation.js"></script>
    <script src="../assets/js/index.js"></script>
</body>

</html>