<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        include "../view/header.php";
        ?>
        <!--------------------Login Start-------------------------------->
        <section class="reg" id="reg">
            <div class="regContainer">
                <h1>Login to your account</h1>
                <form id="loginForm" method="post" action="../controller/loginValidation.php">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email"
                            placeholder="Enter your email">
                        <div id="emailError" class="error-message"></div>
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

                    <div class="forgot-password">
                        <a href="./forgotPassword.php">forgot Password?</a>
                    </div>
                    <div class="login-link">
                        Not registered yet? <a href="./registration.php">Create
                            Account</a>
                    </div>
                    <button class="btn" id="loginBtn">Login</button>
                </form>
            </div>
        </section>
        <?php
        include "./footer.php";
        ?>
        <!--------------------Login End---------------------------------->
        <script src="../assets/js/loginValidation.js"></script>
        <script src="../assets/js/index.js"></script>
    </body>
</html>