    <!-- ZOBAER AHMED -->
    <!--------------------- Sidebar Start ----------------------------->
    <aside class="sidebar">
        <ul>
            <li><a href="./userProfile.php"><img class="profile-logo" height="40px" width="40px" src="<?php echo $_SESSION['imageUrl']; ?>" alt="avatar">
                    <span class="profile-name"><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></span>
                </a></li>
            <li>
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="search" name="search" id="search"
                        placeholder="Search...">
                </div>
            </li>
            <li>
                <a href="./adminDashboard.php">
                    <i class="fa-solid fa-house"></i> Dashboard
                </a>
            </li>
            <li class="notification-sidebar">
                <a href="./notification.php"><i class="fa-solid fa-bell"></i>Notification</a>
                <span class="notification-count">3</span>
            </li>
            <li><a href="./error.php"><i class="fa-solid fa-money-bill"></i>
                    Transactions</a></li>
            <li><a href="./reports.php"><i class="fa-solid fa-chart-line"></i>
                    Reports</a></li>
            <li><a href="./settings.php"><i class="fa-solid fa-cog"></i>
                    Settings</a></li>
            <li><a href="../view/userManagement.php"><i class="fa-solid fa-users"></i>
                    Manage Users</a></li>

        </ul>
    </aside>
    <!--------------------- Sidebar End ------------------------------->