<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
        <section class="profile" id="profile">
            <div class="profile-contrainer">
                <div class="profile-title">
                    <h1>Profile</h1>
                    <h2>View and edit your profile information</h2>
                </div>
                <div class="profile-table-div">
                    <table class="profile-table">
                        <tr>
                            <td colspan="2">
                                <div class="profile-container">
                                    <img
                                        class="profile-img" src="../assets//img//avatar.jpg"
                                        alt="avatar">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>Zobaer Ahmed</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>ahmedzobaer@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>+8801234567890</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>Dhaka, Bangladesh</td>
                        </tr>
                        <tr>
                            <td>Account Type</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>Account Balance</td>
                            <td>$10,000.00</td>
                        </tr>
                        <tr>
                            <td>Account Status</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>Last Login</td>
                            <td>2023-10-01 12:00:00</td>
                        </tr>
                        <tr>
                            <td>Account Created</td>
                            <td>2023-01-01 12:00:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="button-container">
                                    <a href="?userEditProfile=true"><button
                                            class="btn">Edit
                                            information</button></a>
                                    <a href="?changeAvatar=true"><button class="btn2">Change
                                            Photo</button></a>
                                    <a href="?changePassword=true"><button class="btn">Change
                                            Password</button></a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <!--------------------- Profile End ------------------------------->
    </body>
</html>