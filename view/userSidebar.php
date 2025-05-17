
<!--------------------- Sidebar Start ----------------------------->
    <div class="sidebar-container">
        <aside class="sidebar">
            <ul>
                <li><a href="./userProfile.php"><img class="profile-logo" height="40px" width="40px" src="<?php echo $_SESSION['imageUrl']; ?>" alt="avatar">
                        <span class="profile-name"><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></span>
                    </a></li>
                <li>
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="search" name="search" id="search" placeholder="Search...">
                    </div>
                </li>
                <li>
                    <a href="./userDashboard.php">
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                </li>
                <li class="notification-sidebar">
                    <a href="./notification.php"><i class="fa-solid fa-bell"></i>Notification</a>
                    <span class="notification-count">3</span>
                </li>
                <li><a href="./billPay.php"><i class="fa-solid fa-cash-register"></i>
                        Pay Bill</a></li>
                <li><a href="#"><i class="fa-solid fa-money-bill-transfer"></i>
                        Transfer Money</a></li>
                <li><a href="./deposits.php"><i class="material-symbols-outlined">savings</i>
                        Deposit Money</a></li>
                <li><a href="./loanApplication.php"><i class="fa-solid fa-landmark"></i>
                        Loan Application</a></li>
            </ul>
        </aside>
    </div>
    <!--------------------- Sidebar End ------------------------------->