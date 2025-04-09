<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signUpflex">
    <div class="signupContainer">
        <div class="signUpMain">
            <h2>Sign Up</h2>
            <form action="" method="post">  
                <div class="formGroup">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" required>  
                </div>
                <div class="formGroup">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" required>  
                </div>
                <div class="formGroup">
                    <label for="studentId">ID:</label>
                    <input type="number" id="Id" name="Id" required>  
                </div>
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
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>  
                </div>
                <div class="formGroup">
                    <label>Gender:</label>
                    <div class="radio-group">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Rather not to say</label>
                    </div>
                </div>
                <div class="formGroup">
                    <label>Skills:</label>
                    <div class="checkbox-group">
                        <input type="checkbox" id="c" name="skills[]" value="C">  <label for="c">C</label>
                        <input type="checkbox" id="cpp" name="skills[]" value="C++">  <label for="cpp">C++</label>
                        <input type="checkbox" id="csharp" name="skills[]" value="C#">  <label for="csharp">C#</label>
                        <input type="checkbox" id="Java" name="skills[]" value="Java">  <label for="Java">Java</label>
                        <input type="checkbox" id="Python" name="skills[]" value="Python">  <label for="Python">Python</label>
                        <input type="checkbox" id="JavaScript" name="skills[]" value="JavaScript">  <label for="JavaScript">JavaScript</label>
                        <input type="checkbox" id="PHP" name="skills[]" value="PHP"> <label for="PHP">PHP</label>
                    </div>
                </div>
                <div class="formGroup">
                    <label for="department">Department:</label>
                    <select id="department" name="department" required>  <option value="cse">CSE</option>
                        <option value="eee">EEE</option>
                        <option value="chemistry">Chemistry</option>
                        <option value="ipe">IPE</option>
                        <option value="architecture">Architecture</option>
                        <option value="physics">Physics</option>
                    </select>
                </div>
                <div class="formGroup">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required></textarea>  </div>
                <div class="formGroup">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image">
                </div>
                <div class="formGroup"> 
                    <input type="submit" value="Sign Up">
                    <input type="reset" value="Reset">
                </div>
            </form>
        </div>    
    </div>
    </div>
    
</body>
</html>