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
    <title>Change Avatar</title>
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
        <!--------------------Login Start-------------------------------->
        <section class="edit-profile" id="edit-profile">
            <div class="editProfileContainer">
                <h1>Change your current Avatar</h1>
                <form id="editProfileForm" method="post" action="../controller/changeAvatarController.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="profile-photo">Profile</label>
                        <input type="file" id="profile-photo" name="profile-photo">
                        <div id="profilePhotoError" class="error-message"></div>
                    </div>
                    <button class="btn" id="profile-change-btn">save Changes</button>
                </form>
            </div>
        </section>
        <!--------------------Login End---------------------------------->
        <script src="../assets/js/fileValidation.js"></script>
    </body>
</html>
<?php
    } else {
        header("Location: login.php");
        exit();
    }
?>