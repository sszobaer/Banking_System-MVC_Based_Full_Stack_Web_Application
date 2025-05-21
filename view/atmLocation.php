<!-- Shuvra -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ATM Locator</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/_variable.css">
    <link rel="stylesheet" href="../assets/css/_global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
<body>
 
    <h1>ATM Locator</h1>
 
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14603.203371116706!2d90.4264!3d23.8213!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a85011f6fb%3A0x92b989a885509730!2sKuril%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1683367691220!5m2!1sen!2sbd"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
 
    <div class="atm">
        <h3>BRAC Bank ATM</h3>
        <p>300 meters away</p>
        <p>Kuril Flyover, Dhaka 1229</p>
        <button onclick="window.open('https://www.google.com/maps/dir/?api=1&destination=BRAC+Bank+ATM+Kuril+Dhaka')">Directions</button>
    </div>
 
    <div class="atm">
        <h3>Dutch-Bangla Bank ATM</h3>
        <p>500 meters away</p>
        <p>Kuril Bishwa Road, Dhaka 1229</p>
        <button class="btn" onclick="window.open('https://www.google.com/maps/dir/?api=1&destination=Dutch+Bangla+Bank+ATM+Kuril+Dhaka')">Directions</button>
    </div>
 
</body>
</html>