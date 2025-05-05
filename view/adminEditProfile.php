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
        <!------------------- Header Start ------------------------------->
        <div class="contrainer">
            <header class="header">
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Apply Now</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li>
                            <a href="registration.html">
                                <button class="btn">
                                    Open An Account
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </a>
                        </li>
                        <li>
                            <a href="login.html" id="login-btn">
                                <button class="btn2">
                                    Login
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
        <!------------------- Header End --------------------------------->
        <!--------------------- Sidebar Start ----------------------------->
        <div class="container">
            <aside class="sidebar">
                <ul>
                    <li><a href="#"><img class="profile-logo"
                                src="img/avatar.jpg" alt="avatar">
                            <span class="profile-name">Zobaer Ahmed</span>
                        </a></li>
                    <li>
                        <div class="search-container">
                            <i class="fas fa-search search-icon"></i>
                            <input type="search" name="search" id="search"
                                placeholder="Search...">
                        </div>
                    </li>
                    <li class="notification">
                        <a href="#"><i
                                class="fa-solid fa-bell"></i>Notification</a>
                        <span class="notification-count">3</span>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-money-bill"></i>
                            Transactions</a></li>
                    <li><a href="#"><i class="fa-solid fa-chart-line"></i>
                            Reports</a></li>
                    <li><a href="#"><i class="fa-solid fa-cog"></i>
                            Settings</a></li>
                    <li><a href="manageUsers.html"><i
                                class="fa-solid fa-users"></i>
                            Manage Users</a></li>

                </ul>
            </aside>
        </div>
        <!--------------------- Sidebar End ------------------------------->

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
        <script src="js/editProfile.js"></script>
    </body>
</html>