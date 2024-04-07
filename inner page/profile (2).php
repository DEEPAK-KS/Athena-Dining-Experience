<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ATHENA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/css/project_style.css" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+91 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 10AM - 20PM</span></i>
      </div>
      <?php
      if (isset($_SESSION['userName'])) {
        echo "<div style='font-weight:600;'>Welcome <span style='color: #cda45e;'>" . $_SESSION['userName'] . "</span></div>";
      } else {
      ?>
        <div class="languages d-none d-md-flex align-items-center" onclick="window.location.href='../login.php'">
          <ul>
            <li>Login</li>
            <li><a href="#">Register</a></li>
          </ul>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php"><img src="../logo.png"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="dropdown"><a href="ChefCart/index.php"><span>Cloud Chef</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="ChefCart/index.php">Home</a></li>
              <li><a href="ChefCart/index.php#bookingstart">Booking</a></li>
              <li><a href="ChefCart/index.php#myteamstart">Culinary Clan</a></li>
              <li><a href="ChefCart/jointhecrew.php">Join the Cloud Crew</a></li>
            </ul>
          </li>
          <?php if (isset($_SESSION['userName'])) { ?>
            <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Bookings</a></li>
                <li><a href="logout.php">Log-Out</a></li>
              </ul>
            </li><?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="Booking.php" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>User Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Profile </li>
          </ol>
        </div>
      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <p>
          Example inner page template
        </p>
      </div>
    </section>

  </main><!-- End #main -->

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Athena</h3>
              <p>
                Prinsengracht 456 <br>
                1016 HL Amsterdam, Netherlands<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> Athena@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#why-us">Why us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="crew_login.php">Staff Login</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Table Reservation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Food Reservation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Event Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Open Bar</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cloud Chef</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Explore the culinary wonders of Athena Restaurant in Amsterdam, where every dish is a masterpiece, and indulge in exclusive offers and events by subscribing to our newsletter today!</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Athena</span></strong>. All Rights Reserved.Deepak
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main-project.js"></script>

</body>

</html>