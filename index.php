<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ATHENA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/project_style.css" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
  <?php
  session_start();
  if (isset($_SESSION["registered"])) {
    echo "<script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: 'success',
          title: 'Registered successfully'
        });
      </script>";
    unset($_SESSION["registered"]);
  }
  ?>
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
        if (isset($_SESSION['login-alert'])) {
          echo "<script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: 'success',
          title: 'Signed In successfully'
        });
      </script>";
          unset($_SESSION['login-alert']);
        }
      } else {
      ?>
        <div class="languages d-none d-md-flex align-items-center" onclick="window.location.href='login.php'">
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

      <h1 class="logo me-auto me-lg-0"><a href="index.php"><img src="logo.png"></a></h1>
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
              <li><a href="ChefCart/index.php#contactstart">Join the Cloud Crew</a></li>
            </ul>
          </li>
          <?php if (isset($_SESSION['userName'])) { ?>
            <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="usr_profile/profile.php">Profile</a></li>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <video autoplay loop muted plays-inline class="back-video">
      <source src="assets\video\hero_bg_video.mp4" type="video/mp4">
    </video>
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Full Of Flavour <span>And Tradition</span></h1>
          <h2>Tailored to your taste and crafted for unforgettable moments</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Step into a world of culinary elegance at Athena, where each visit promises an
              exceptional dining experience. From our carefully curated menu to our enchanting
              ambiance, we invite you to discover the essence of refined gastronomy.</h3>
            <ul><br>
              <li><i class="bi bi-check-circle"></i> Seamless reservations at Athena: Your table,
                your preferences – all in a click. Arrive to find your chosen dishes elegantly presented,
                ensuring every moment is truly exceptional</li>
              <li><i class="bi bi-check-circle"></i> Athena is more than a restaurant; it's a canvas for your
                celebrations. Whether it's a birthday, anniversary, or an intimate dinner, reserve a table
                to make every moment special. Our commitment to excellence ensures that your cherished occasions
                are celebrated in style.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Restaurant</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Inviting Ambiance</h4>
              <p>Step into Athena and embrace an atmosphere designed for comfort and sophistication</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Culinary odyssey</h4>
              <p>Dive into Athena's culinary artistry, where every dish promises an unmatched gastronomic journey.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Tailored Celebrations</h4>
              <p>Athena goes beyond being a restaurant; it's a dedicated space for your special moments</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <p>MENU
          <p>
          <h2>Check Our Tasty Menu</h2>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
              <h4>Starters</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
              <h4>Breakfast</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
              <h4>Lunch</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
              <h4>Dinner</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Starters</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/Spinach_salad.png" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Spinach Salad <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/French_fries.png" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>French Fries <i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Crafted from premium potatoes, our golden fries offer crispy perfection.
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/Mommos.png" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Dumpling Chino <i class="fa-solid fa-drumstick-bite"></i>&nbsp;<i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Savor the delicate harmony of flavors in our Chino Steamed Dumplings
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/greek_salad.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Greek Salad <i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Fresh and vibrant, our Greek Salad is a colorful Mediterranean symphony
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/sushi.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Sushi <i class="fa-solid fa-drumstick-bite"></i>&nbsp;<i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Immerse yourself in exquisite flavors with our artfully crafted Sushi.
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/paneer_tikka.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Paneer Tikka <i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Savor the essence of Indian spices with our succulent Paneer Tikka.
                </p>
              </div><!-- Menu Item -->
            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-breakfast">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Breakfast</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/bread-barrel.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Bread Barrel <i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Indulge in the rustic charm of our artisanal Bread Barrel
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/chocolate-cake.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Chocolate Cake <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Decadent delight: Our Chocolate Cake, a rich symphony of indulgence.
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/eggs-benedict.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Eggs Benedict <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Elevate your brunch experience with Eggs Benedict and Smoked Salmon
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/french-toasts.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>French Toast <i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Golden perfection: our French Toast, a breakfast classic with a twist
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/masala-dosa.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Masala Dosa <i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Savor the aromatic delight of our crispy Masala Dosa specialty.
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/pancakes.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Fluffy Pancakes <i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Spoon into indulgence with our delectable Fluffy Pancakes - a morning delight
                </p>
              </div><!-- Menu Item -->
            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Lunch</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/Biriyani.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Biriyani <i class="fa-solid fa-seedling"></i>&nbsp;<i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Experience the aromatic symphony of flavors in our delectable Biryani
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/chicken-grill.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Jamaican Jerk Chicken <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Savor the fiery rhythm of Jamaican Jerk Chicken a flavorful dance
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/ramen.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Ramen <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Sip into satisfaction with our authentic and savory Ramen bowls
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/beef_steak.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Rump steak <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Succulent and savory: our Beef Steak, a feast for meat enthusiasts
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/lobster-tail.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Lobster Tail <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Indulge in luxury with our Lobster Tail – a sea inspired delicacy.
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/NI_thali2.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>North Indian Thali <i class="fa-solid fa-seedling"></i>&nbsp;<i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Embark on a culinary journey with our North Indian Thali experience
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Lunch Menu Content -->

          <div class="tab-pane fade" id="menu-dinner">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Dinner</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/grilled-chicken-breasts.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Herb Broiled Chicken <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Savor the aromatic delight of Herb Broiled Chicken – a culinary masterpiece
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/shrimp-ceviche.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Shrimp Ceviche <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Delight in the refreshing burst of flavors with our Shrimp Ceviche
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/stuffed-lobster.webp" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Stuffed Lobster <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Indulge in opulence with our Baked Stuffed Lobster – a gourmet sensation
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/Roasted Rack of Lamb.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Roasted Lamb <i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Savor perfection with our Roasted Rack of Lamb – a culinary masterpiece.
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/mabo-tofu.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Mapo Tofu <i class="fa-solid fa-seedling"></i></h4>
                <p class="ingredients">
                  Experience the bold and spicy allure of our Mapo Tofu dish.
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/kebab.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Kebab <i class="fa-solid fa-seedling"></i>&nbsp;<i class="fa-solid fa-drumstick-bite"></i></h4>
                <p class="ingredients">
                  Delight in savory perfection with our succulent Kebabs – grilled to perfection
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Dinner Menu Content -->

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Eggs Benedict</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Sushi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Stuffed Lobster</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Herb Broiled Chicken</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Biryani</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Sunrise Benedictions on English Muffin Thrones. </h3>
                    <p class="fst-italic">Golden orbs, a hollandaise embrace on an English chariot, whispering with Canadian grace, chives confessing in a dance.</p>
                    <p>a symphony of velvety perfection on an English muffin stage, crowned in hollandaise dreams, whispered with Canadian grace—an enchanting gastronomic reverie.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2 special">
                    <img src="assets/img/menu/eggs-benedict.jpeg" alt="" class="img-fluid ">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Serenade Sushi: Ocean's Poetry on a Plate.</h3>
                    <p class="fst-italic">Ocean's jewels, nestled in rice's embrace, seaweed whispers cradle fish dreams, a dance of soy symphony, and ginger confessions on the palate's stage.</p>
                    <p>Sushi, a sea-kissed poetry on rice, where seaweed whispers cradle ocean delights—a bite-sized dance of flavors, orchestrated by soy and ginger.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2 special">
                    <img src="assets/img/menu/sushi2.jpeg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Lobster's Embrace: A Symphony of Stuffed Secrets.</h3>
                    <p class="fst-italic">Lobster's bounty, a treasure trove within, with echoes of crab confessions, breadcrumbs of dreams, and herb whispers—a poetic rendezvous of oceanic indulgence.</p>
                    <p>
                      Lobster's sanctuary, a poetic canvas adorned with succulent crab, breadcrumb dreams, and herb-infused confessions—an indulgent tapestry of flavors awaits within.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2 special">
                    <img src="assets/img/menu/stuffed-lobster.webp" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Garden's Embrace: Herb-Kissed Reverie of Broiled Elegance.</h3>
                    <p class="fst-italic">
                      Herb-Broiled Chicken: Thyme's poetry, rosemary's ballad, sage's confessions dance beneath the broiler's gaze—a garden symphony on succulent wings.</p>
                    <p>Chicken, a herbal sonnet: thyme's delicate verse, rosemary's aromatic ballad, sage's silent confessions—broiled to a succulent crescendo, a poetic feast for discerning palates.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2 special">
                    <img src="assets/img/menu/grilled-chicken-breasts.jpeg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Spice-laden Symphony: Biryani's Culinary Overture.</h3>
                    <p class="fst-italic">Basmati's hushed whispers, saffron's golden threads, cardamom's dance, marinated tales of succulent meat, garlic confessions—an aromatic Biryani symphony.</p>
                    <p>Biryani's aromatic tale: Basmati whispers, saffron threads gold, cardamom dances, succulent marinated tales unfold—garlic confessions weave a fragrant symphony, a feast for the senses.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2 special">
                    <img src="assets/img/menu/chicken-biriyani.jpeg" alt="" class="img-fluid" style="background-blend-mode: lighten;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Organize Your Events in our Restaurant</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/bday_party.jpeg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Birthday Parties</h3>
                  <div class="price">
                    <p><span>From 1,899</span></p>
                  </div>
                  <p class="fst-italic">
                    Let us turn your birthday into an artfully curated event, with personalized touches that make every moment uniquely yours.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i>Elevate birthday joy with orchestrated surprises at Athena, ensuring a truly memorable and delightful affair.</li>
                    <li><i class="bi bi-check-circled"></i>Capture joy in every frame at Athena, where designated Instagram-worthy corners ensure every photo embodies the essence of celebration</li>
                  </ul>
                  <p>
                    Transform birthdays at Athena: Personalized keepsakes, seamless planning, joyous ambiance – unforgettable moments.
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/private_party.jpeg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Private Parties</h3>
                  <div class="price">
                    <p><span>From 2,999</span></p>
                  </div>
                  <p class="fst-italic">
                    Immerse yourself in an exclusive atmosphere tailored for your private event,
                    where every corner of Athena becomes your personal space for celebration.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i>Design your menu, craft a gastronomic journey at Athena.</li>
                    <li><i class="bi bi-check-circled"></i>Impeccable service by a dedicated team at your private party, ensuring precision and care in every detail.</li>
                  </ul>
                  <p>
                    Host at Athena: Exclusivity, bespoke menus, seamless coordination – an exclusive experience tailored uniquely for you.
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/custom_party.jpeg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Parties</h3>
                  <div class="price">
                    <p><span>From 1,999</span></p>
                  </div>
                  <p class="fst-italic">
                    Design a party that reflects your unique style and preferences, with Athena as the perfect canvas for creating a personalized atmosphere.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Athena offers scalable spaces for intimate or grand celebrations, ensuring the perfect setting for your custom party, any size.</li>
                    <li><i class="bi bi-check-circled"></i> Elevate your custom party at Athena with unique performances, ensuring a standout experience resonating with your theme.</li>
                  </ul>
                  <p>
                    "Athena: Where dreams meet reality. Versatile spaces, dedicated coordination—an etched celebration in every heartbeat."
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Reservation</h2>
          <p>Book a Table</p>
        </div>
      </div>
      <div class="booktbl">
        <div class="booktbl-img" data-aos="fade-up">
          <img src="assets/img/reservation.jpeg">
        </div>
        <div class="booktbl-content" data-aos="fade-up">
          <h5>
            Join Athena's culinary journey, where reservations are brushstrokes in
            your dining masterpiece. In our ambiance's elegance and flavors' poetry, we
            craft a table uniquely yours. Reserve now, indulge in tailored moments, where
            each visit becomes a poetic chapter in your gastronomic delight.
          </h5><br>
          <p> <i class="bi bi-check-circle"></i> Indulge in Athena's culinary artistry, where every dish is meticulously crafted, promising an unparalleled gastronomic experience.</p>
          <p><i class="bi bi-check-circle"></i> From intimate gatherings to grand celebrations, Athena provides a versatile and elegant setting, ensuring each visit is a uniquely tailored dining affair.</p>
          <a href="Booking.php">Book a table</a>
        </div>
      </div>
    </section>
    <!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Effortless reservations, personalized orders, and the Cloud Chef feature make dining memorable. Exceptional service, real-time updates, and loyalty rewards—impressive innovation! <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Seamless reservations, customizable orders, and Cloud Chef services redefine dining. Real-time updates, loyalty rewards, and excellent service make this platform a standout experience!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Efficient reservations, customized orders, and the Cloud Chef option enhance dining. Real-time updates, loyalty perks, and outstanding service make this platform exceptional!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Smooth reservations, tailor-made orders, and Cloud Chef brilliance redefine dining. Real-time updates, loyalty perks, and stellar service—culinary excellence at its best!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Effortless reservations, custom orders, and Cloud Chef creativity make dining exceptional. Real-time updates, loyalty perks, and superb service ensure an outstanding culinary experience!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Restaurant</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.png" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-1.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-2.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-3.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-4.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-5.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-9.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-9.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-7.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-8.jpeg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Our Proffesional Chefs</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid chef-img" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Head Chef</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/chefs/chefs-2.jpg" class="img-fluid chef-img" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Eleanor Graceworth</h4>
                  <span>Master Chef</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid chef-img" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Alejandro Rivera</h4>
                  <span>Chef</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Athena Restaurant, Prinsengracht 456, 1016 HL Amsterdam, Netherlands</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  10:00 AM - 20:00 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>athena@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+91 96334 30662</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form id="contactForm" action="#" method="POST" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" value="<?php if (isset($_SESSION['userName'])) { echo $_SESSION['userName']; } ?>" id="name" placeholder="Your Name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php if (isset($_SESSION['Email'])) { echo $_SESSION['Email']; } ?>">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" id="message" rows="8" placeholder="Message"></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center">
                <input type="button" class="book-a-table-btn" value="Send Message" onclick="sendMessage()">
              </div>
            </form>



          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main-project.js"></script>
  <script>
    function validateReview() {
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var subject = document.getElementById("subject").value;
      var message = document.getElementById("message").value;

      if (name == "" || email == "" || subject == "" || message == "") {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true,
        });
        Toast.fire({
          icon: 'error',
          title: 'Please enter all fields'
        });
        return false;
      }
      return true;
    }
  </script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function sendMessage() {
    if (!validateReview()) {
        return;
    }
    // If validation is successful, submit the form data using AJAX
    $.ajax({
        type: "POST",
        url: "review.php", // Replace with your PHP file handling form submission
        data: $("#contactForm").serialize(),
        success: function(response) {
            $(".sent-message").fadeIn().html(response); // Show success message
            $("#contactForm")[0].reset(); // Reset form after successful submission
        },
        error: function(xhr, status, error) {
            $(".error-message").fadeIn().html("Error: " + xhr.responseText); // Show error message
        }
    });
}
</script>
</html>