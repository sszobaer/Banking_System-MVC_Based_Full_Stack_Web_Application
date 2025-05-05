<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
        <!--------------------- Profile Start ----------------------------->
        <section class="edit-profile" id="edit-profile">
            <div class="editProfileContainer">
                <h1>UPDATE YOUR INFORMATION</h1>
                <form id="editProfileForm" method="post">
                    <div class="form-group">
                        <div class="name-group">
                            <div class="name-field">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName"
                                    name="firstName">
                                <div id="firstNameError"
                                    class="error-message"
                                    name="error-message"></div>
                            </div>
                            <div class="name-field">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" name="lastName">
                                <div id="lastNameError"
                                    class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email">
                        <div id="emailError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone">
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
                        <label for="presentAdress">Present Address</label>
                        <input type="presentAdress" id="presentAdress"
                            name="presentAdress">
                        <div id="presentAdressError"
                            class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="permanentAdress">Permanent Address</label>
                        <input type="permanentAdress" id="permanentAdress"
                            name="permanentAdress">
                        <div id="permanentAdressError"
                            class="error-message"></div>
                    </div>
                    
                    <button class="btn" id="updateProfile"
                        name="updateProfile">Save Changes</button>
                </form>
            </div>
        </section>
        <!--------------------- Profile End ------------------------------->
        <script src="../assets//js//editProfile.js"></script>
    </body>
</html>