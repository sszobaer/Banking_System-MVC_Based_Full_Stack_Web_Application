<!-- ZOBAER AHMED -->
<div class="contrainer">
    <header class="header">
        <nav>
            <ul>
                <?php 
                if (basename($_SERVER['PHP_SELF']) == "index.php") { ?>
                    <li><a href="/BankingSystem">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#calculator">Calculator</a></li>
                    <li><a href="#contact">Contact</a></li>

                    <li>
                        <a href="./view/registration.php">
                            <button class="btn">
                                Open An Account
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="./view/login.php" id="login-btn">
                            <button class="btn2">
                                Login
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </a>
                    </li>

                <?php 
                } else if (isset($_SESSION['logged_in'])) { ?>
                    <li><a href="/BankingSystem">Home</a></li>
                    <li><a href="/BankingSystem">About</a></li>
                    <li><a href="/BankingSystem">Services</a></li>
                    <li><a href="/BankingSystem">Testimonials</a></li>
                    <li><a href="/BankingSystem">Calculator</a></li>
                    <li><a href="/BankingSystem">Contact</a></li>
                    <li>
                        <a href="../controller/logoutController.php" id="logout-btn">
                            <button class="btn2">
                                Logout
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </a>
                    </li>

                <?php 
                } else { ?>
                    <li><a href="/BankingSystem">Home</a></li>
                    <li><a href="/BankingSystem">About</a></li>
                    <li><a href="/BankingSystem">Services</a></li>
                    <li><a href="/BankingSystem">Testimonials</a></li>
                    <li><a href="/BankingSystem">Calculator</a></li>
                    <li><a href="/BankingSystem">Contact</a></li>

                    <li>
                        <a href="../view/registration.php">
                            <button class="btn">
                                Open An Account
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="../view/login.php" id="login-btn">
                            <button class="btn2">
                                Login
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </header>
</div>
