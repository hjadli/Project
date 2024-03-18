<a href="#" class="scrolltop" id="scroll-top">
    <i class="bx bx-up-arrow-alt scrolltop__icon"></i>
</a>

<header class="l-header" id="header">
    <nav class="nav bd-container">
        <?php
        // Check if user is logged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            echo '<a href="index.php" class="nav__logo">CryptoShow</a>';
        } else {
            echo '<a href="index.php" class="nav__logo">CRYPTO SHOW</a>';
        }
        ?>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    echo '<li class="nav__item"><a href="Events.php" class="nav__link">Events</a></li>';
                    echo '<li class="nav__item"><a href="Profile.php" class="nav__link">Profile</a></li>';
                    echo '<li class="nav__item"><a href="Devices.php" class="nav__link">My Devices</a></li>';
                    echo '<li class="nav__item"><a href="logout.php" class="nav__link">Logout</a></li>';
                    
                } else {
                    echo '<li class="nav__item"><a href="index.php" class="nav__link active-link">Home</a></li>';
                    echo '<li class="nav__item"><a href="#share" class="nav__link">Login</a></li>';
                    echo '<li class="nav__item"><a href="#decoration" class="nav__link">Events</a></li>';
                   
                    echo '<li class="nav__item"><a href="#accessory" class="nav__link">Contact</a></li>';
                    
                }
                ?>
            </ul>
        </div>
       <li class="nav__item"><i class="bx bx-toggle-left change-theme" id="theme-button"></i></li>
                <div class="nav__toggle" id="nav-toggle">
                    <i class="bx bx-grid-alt"></i>
                </div>

        
    </nav>
</header>
