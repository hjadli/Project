<header class="header">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="logo">
                <a href="admin.php">CryptoShow</a>
            </div>
            <button type="button" class="nav-toggler">
                <span></span>
            </button>
            <nav class="nav">
                <ul>
                    <?php
                    if (isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] === true) {
                        echo '<li><a href="dashboard.php" class="active">Dashboard</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li><a href="admin.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <!-- Toggle theme button -->
            <img src="../images/moon.png" alt="" height="20px" width="20px" id="iconn">
        </div>
    </div>
</header>