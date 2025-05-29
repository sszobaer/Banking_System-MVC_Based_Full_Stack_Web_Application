<!-- ZOBAER AHMED -->
<?php
session_start();
if (isset($_SESSION['email'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Card</title>
        <link rel="stylesheet" href="../assets/css/style.css?2.0">
        <link rel="stylesheet" href="../assets/css/_variable.css?2.0">
        <link rel="stylesheet" href="../assets/css/_global.css?2.0">
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
                <div class="card-intro">
                    <h1>Apply for Your Virtual Card</h1>
                    <p>Welcome to Aura Bank’s Card Management portal. Apply for a new card and enjoy exclusive benefits tailored to your financial needs.</p>
                </div>
                <div class="card-types">
                    <div class="card-type">
                        <i class="fa-solid fa-credit-card"></i>
                        <h3>Visa Classic</h3>
                        <p>Perfect for everyday purchases with low fees and worldwide acceptance.</p>
                    </div>
                    <div class="card-type">
                        <i class="fa-solid fa-gem"></i>
                        <h3>Visa Platinum</h3>
                        <p>Premium benefits, including travel rewards and higher credit limits.</p>
                    </div>
                    <div class="card-type">
                        <i class="fa-solid fa-shield-halved"></i>
                        <h3>Visa Secured</h3>
                        <p>Build or rebuild credit with a secure card backed by your deposit.</p>
                    </div>
                    <div class="card-type">
                        <i class="fa-brands fa-cc-mastercard"></i>
                        <h3>Master Card</h3>
                        <p>Build or rebuild credit with a secure card backed by your deposit.</p>
                    </div>
                </div>
                <div class="card-benefits">
                    <h2>Why Choose Our Cards?</h2>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Secure transactions with advanced encryption</li>
                        <li><i class="fa-solid fa-check"></i> Earn rewards on every purchase</li>
                        <li><i class="fa-solid fa-check"></i> 24/7 customer support</li>
                        <li><i class="fa-solid fa-check"></i> Flexible payment options</li>
                        <li><i class="fa-solid fa-check"></i> No annual fees on select cards</li>
                    </ul>
                </div>
                <div class="apply-button">
                    <a href="../view/cardApply.php" class="btn">Apply for Card</a>
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