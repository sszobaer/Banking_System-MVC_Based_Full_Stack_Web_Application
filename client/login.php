<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="loginContainer">
        <h2>Login</h2>
        <div class="formGroup">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>  
        </div>
        <div class="formGroup">
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <span id="togglePassword" class="eye-icon">👁️</span>
            </div>
        </div>
        <div class="formGroup"> 
                <input type="submit" value="Login">
                <input type="reset" value="Reset">
            </div>
    </div>
</body>
</html>