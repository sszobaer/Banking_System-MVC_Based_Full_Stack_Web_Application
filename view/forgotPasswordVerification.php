<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../assets/./css/./style.css">
    <link rel="stylesheet" href="../assets/./css/./_variable.css">
    <link rel="stylesheet" href="../assets/./css/./_global.css">
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
        <?php include"./header.php";?>
        <!--------------------Forgot password form start-------------->
        <section class="reg" id="reg">
            <div class="regContainer">
                <h1>Forgot your password</h1>
                <form id="registrationForm" method="post" action>

                    <div class="form-group">
                        <label for="verificationCode">verification Code</label>
                        <input type="text" id="verificationCode"
                            name="verificationCode"
                            placeholder="Enter the verification Code">
                        <div id="verificationError" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <div class="password-container">
                            <input type="password" class="password-field"
                                id="newPassword" name="newPassword"
                                placeholder="Enter your new Password">
                            <span class="toggle-password eye-icon">👁️</span>
                        </div>
                        <div id="newPasswordError" class="error-message"></div>
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
                    <div class="button-group">
                        <button class="btn" id="changePasswordBtn">
                            Change Password
                        </button>
                        <button class="btn2" id="cancel-btn">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </section>
        <!--------------------Forgot password form End-------------->
        <?php include "./footer.php";?>
        <script src="../assets//js//index.js"></script>
        <script src="../assets//js//forgotPassword.js"></script>
    </body>
</html>