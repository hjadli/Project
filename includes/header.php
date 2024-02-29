
<header class="header">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="logo">
               <a href="#">CryptoShow</a>
            </div>
            <button type="button" class="nav-toggler">
               <span></span>
            </button>
            <nav class="nav">
               <ul>
                  
                  
                  <?php
                  
                  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                      echo '<li><a href="Events.php">Events</a></li>';
                      echo '<li><a href="Profile.php">Profile</a></li>';
                      
                      echo '<li><a href="logout.php">Logout</a></li>';
                  }
                  else{
                     echo '<li><a href="index.php" class="active">home</a></li>';
                      echo '<li><a href="login.php">Login</a></li>';
                      echo '<li><a href="signup.php">Signup</a></li>';
                      echo '<li><a href="aboutus.php">About Us</a></li>';
                  }
                  ?>
               </ul>
               
            </nav>
            <!-- Toggle theme button -->
               <img src="../images/moon.png" alt="" height="20px" width="20px" id="iconn">
        </div>
    </div>
 </header>