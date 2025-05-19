<!-- ZOBAER AHMED -->
 <?php 
    session_start(); 
    if(isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
    include "./userSidebar.php";
    ?>
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
                                        class="profile-img" height="250px" width="250px" src="<?php echo $_SESSION['imageUrl']; ?>"
                                        alt="avatar">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?= $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $_SESSION['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?= $_SESSION['phoneNo'] ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?= date('Y-m-d', strtotime($_SESSION['dob'])) ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?= $_SESSION['gender'] ?></td>
                        </tr>
                        <tr>
                            <td>Present Address</td>
                            <td><?= $_SESSION['presentAddress'] ?></td>
                        </tr>
                        <tr>
                            <td>Permanent Address</td>
                            <td><?= $_SESSION['permanentAddress'] ?></td>
                        </tr>
                        <tr>
                            <td>Account Type</td>
                            <td><?= $_SESSION['accountType'] ?></td>
                        </tr>
                        <tr>
                            <td>Account Balance</td>
                            <td>$<?= $_SESSION['depositAmount'] ?></td>
                        </tr>
                        <tr>
                            <td>Account Status</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>Account Created</td>
                            <td><?= date('Y-m-d H:i:s', strtotime($_SESSION['createdAt'])) ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="button-container">
                                    <a href="./userEditProfile.php"><button
                                            class="btn">Edit
                                            information</button></a>
                                    <a href="./changeAvatar.php"><button class="btn2">Change
                                            Photo</button></a>
                                    <a href="./changePassword.php"><button class="btn">Change
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
<?php
    } else {
        header("Location: ../view/login.php");
        exit();
    }
?>