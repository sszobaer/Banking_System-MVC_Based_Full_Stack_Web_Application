<?php
session_start();
if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Pin Management</title>
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

    <!--------------------Card Management Start-------------------------------->
    <section class="card-management" id="card-management">
        <div class="card-management-container">
            <div id="pin-changer">
                <form id="pin-changer-form" method="post" action="../controller/cardPinManagementController.php">
                    <div class="form-group">
                        <label for="set-pin">Set PIN</label>
                        <div class="password-container">
                            <input type="password" class="password-field" id="set-pin" name="set-pin" placeholder="Enter new PIN">
                        </div>
                        <div id="newPinError" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="confirm-pin">Confirm New PIN</label>
                        <div class="password-container">
                            <input type="password" class="password-field" id="confirm-pin" name="confirm-pin" placeholder="Confirm new PIN">
                        </div>
                        <div id="confirmPinError" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <button class="btn" id="change-pin-button">Change PIN</button>
                        <div id="pin-message" class="error-message"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--------------------Card Management End---------------------------------->

    <script src="../assets/js/cardManagement.js"></script>
    <script src="../assets/js/index.js"></script>
</body>

</html>
<?php
} else {
    header("Location: login.php");
    exit();
}
?>