<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
 
</head>

<body>
    <!-- header -->
    <?php
    include '../includes/header.php';
   
   
  
    

    ?>
    

  <main class="l-main">
    <section class="home" id="home">
      <div class="home__container bd-container bd-grid">
        <div class="home__img">
          <img src="https://images.pexels.com/photos/5588490/pexels-photo-5588490.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" />
        </div>

        <div class="home__data">
          <h1 class="home__title">Welcome To..</h1>
          <p class="home__description">
           CryptoShow is online platform that host multiple world top class tech companies events . You can join us and attend these events .
          </p>
          <a href="Signup.php" class="button">Get Started</a>
        </div>
      </div>
    </section>

    <section class="share section bd-container" id="share">
      <div class="share__container bd-grid">
        <div class="share__data">
          <h2 class="section-title-center">
           Login with your account
          </h2>
          <p class="share__description">
            Choose from 100,000 video online video courses with new additions published every month
          </p>
          <a href="Login.php" class="button">Login</a>
          <span>OR</span>
          <a href="Signup.php" class="button">Signup</a>

        </div>

        <div class="share__img">
          <img src="../images/login.png" alt="" />
        </div>
      </div>
    </section>

    <section class="decoration section bd-container" id="decoration">
      <h2 class="section-title">
        Book upcoming  <br />
       Events
      </h2>
      <div class="decoration__container bd-grid">
        <div class="decoration__data">
          <img src="../images/apple.png" alt="" class="decoration__img" />
          <h3 class="decoration__title">Apple</h3>
          <a href="#" class="button button-link">Book Event</a>
        </div>

        <div class="decoration__data">
          <img src="../images/microsoft.png" alt="" class="decoration__img" />
          <h3 class="decoration__title">Microsoft</h3>
          <a href="#" class="button button-link">Book Event</a>
        </div>

        <div class="decoration__data">
          <img src="../images/google.png" alt="" class="decoration__img" />
          <h3 class="decoration__title">Google</h3>
          <a href="#" class="button button-link">Book Event</a>
        </div>
      </div>
    </section>

    <section class="accessory section bd-container" id="accessory">
      <h2 class="section-title">
        Our <br />
        Team Members
      </h2>

      <div class="accessory__container bd-grid">
        <div class="accessory__content">
          <img src="https://images.pexels.com/photos/583842/pexels-photo-583842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="accessory__img" />
          <h3 class="accessory__title">Harpreet Singh </h3>
          <span class="accessory__category">Tech Expert</span>
          <span class="accessory__preci"></span>
          <a href="#" class="button accessory__button"><i class="bx bx-heart"></i></a>
        </div>

        <div class="accessory__content">
          <img src="https://images.pexels.com/photos/1693627/pexels-photo-1693627.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="accessory__img" />
          <h3 class="accessory__title">Iphone Pro 12</h3>
          <span class="accessory__category">Accessory</span>
          <span class="accessory__preci">$2.52</span>
          <a href="#" class="button accessory__button"><i class="bx bx-heart"></i></a>
        </div>

        <div class="accessory__content">
          <img src="https://images.pexels.com/photos/607812/pexels-photo-607812.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="accessory__img" />
          <h3 class="accessory__title">Nokia</h3>
          <span class="accessory__category">Accessory</span>
          <span class="accessory__preci">$13.15</span>
          <a href="#" class="button accessory__button"><i class="bx bx-heart"></i></a>
        </div>

        <div class="accessory__content">
          <img src="https://images.pexels.com/photos/583847/pexels-photo-583847.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="accessory__img" />
          <h3 class="accessory__title">Macbook</h3>
          <span class="accessory__category">Accessory</span>
          <span class="accessory__preci">$800</span>
          <a href="#" class="button accessory__button"><i class="bx bx-heart"></i></a>
        </div>

        <div class="accessory__content">
          <img src="https://images.pexels.com/photos/4158/apple-iphone-smartphone-desk.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260assets/img/accessory5.png" alt="" class="accessory__img" />
          <h3 class="accessory__title">Macbook Pro</h3>
          <span class="accessory__category">Accessory</span>
          <span class="accessory__preci">$1000</span>
          <a href="#" class="button accessory__button"><i class="bx bx-heart"></i></a>
        </div>
      </div>
    </section>

    <section class="send section">
      <div class="send__container bd-container bd-grid">
        <div class="send__content">
          <h2 class="section-title-center send__title">Workspace</h2>
          <p class="send__description">
            Start giving away before the holidays are over. Write the home
            address of the person who will send the course.
          </p>
          <form action="">
            <div class="send__direction">
              <input type="text" placeholder="House address" class="send__input" />
              <a href="#" class="button">Send</a>
            </div>
          </form>
        </div>

        <div class="send__img">
          <img src="https://images.pexels.com/photos/389819/pexels-photo-389819.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" />
        </div>
      </div>
    </section>
  </main>

  <footer class="footer section">
    <div class="footer__container bd-container bd-grid">
      <div class="footer__content">
        <h3 class="footer__title">
          <a href="#" class="footer__logo">CRYPTO SHOW</a>
        </h3>
        <p class="footer__description">
          Learning, share CSS free <br />
          courses
        </p>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Our Services</h3>
        <ul>
          <li><a href="#" class="footer__link">Pricing </a></li>
          <li><a href="#" class="footer__link">Discounts</a></li>
          <li><a href="#" class="footer__link">Shipping mode</a></li>
        </ul>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Our Company</h3>
        <ul>
          <li><a href="#" class="footer__link">Blog</a></li>
          <li><a href="#" class="footer__link">About us</a></li>
          <li><a href="#" class="footer__link">Our mision</a></li>
        </ul>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Social</h3>
        <a href="#" class="footer__social"><i class="bx bxl-facebook-circle"></i></a>
        <a href="#" class="footer__social"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="footer__social"><i class="bx bxl-instagram-alt"></i></a>
      </div>
    </div>

    <p class="footer__copy">&#169; 2023 CryptoShow</p>
  </footer>
  

</body>
<script src="https://unpkg.com/scrollreveal"></script>
 
<script src="../js/script.js"></script>

</html>