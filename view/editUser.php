<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
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
    include "./adminSidebar.php";
    ?>
    <!--------------------- Profile Start ----------------------------->
    <section class="edit-profile" id="edit-profile">
        <div class="editProfileContainer">
            <h1>UPDATE YOUR INFORMATION</h1>
            <form id="editProfileForm" method="post" action="../controller/editUserController.php">
                <div class="form-group">
                    <div class="name-group">
                        <div class="name-field">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName"
                                name="firstName" value="">
                            <div id="firstNameError"
                                class="error-message"
                                name="error-message"></div>
                        </div>
                        <div class="name-field">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" value="">
                            <div id="lastNameError"
                                class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="">
                    <div id="emailError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="">
                    <div id="phoneError" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="nidNumber">NID / Passport Number</label>
                    <input type="text" id="nidNumber" name="nidNumber"
                        value="">
                    <div id="nidNumberError" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="role">User Role</label>
                    <select id="role" name="role">
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <div id="roleError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="presentAddress">Present Address</label>
                    <input type="text" id="presentAddress"
                        name="presentAddress" value="">
                    <div id="presentAddressError"
                        class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="permanentAddress">Permanent Address</label>
                    <input type="text" id="permanentAddress"
                        name="permanentAddress" value="">
                    <div id="permanentAddressError"
                        class="error-message"></div>
                </div>

                <button class="btn" id="updateProfile"
                    name="updateProfile">Save Changes</button>
            </form>
        </div>
    </section>
    <!--------------------- Profile End ------------------------------->
    <script src="../assets/js/editUser.js"></script>
</body>

</html>