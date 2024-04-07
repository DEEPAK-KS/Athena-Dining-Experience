<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['userName'])) {
  header("Location: login.php");
  exit();
}
include 'connect.php';
?>
<style>
  .popup {
    position: absolute;
    background-color: inherit;
    border: 1px solid #ccc;
    color: #cda45e;
    margin-top: -4px;
    padding: 5px 10px 5px 10px;
    border-radius: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
    opacity: 0;
    /* Start with opacity 0 */
    transition: opacity 0.5s ease-in-out;
    /* Apply ease-in-out transition */
  }

  .popup-message {
    display: block;
  }

  .popup::before {
    content: "";
    position: absolute;
    top: 100%;
    left: 21%;
    margin-left: -10px;
    border-width: 10px;
    border-style: solid;
    border-color: #f9f9f9 transparent transparent transparent;
  }

  /* Show the popup when it has the 'show' class */
  .popup.show {
    opacity: 1;
    /* Change opacity to 1 to reveal the popup */
  }
  .pref_div{
    width: 70%; 
    margin-left:200px;
  }
  .pref_tag {
    color: #aaaaaa;
    background-color: inherit;
    border: 2px solid #625b4b;
    box-shadow: none;
    border-radius: 20px;
    width: calc(100% - 20px); /* Adjust width to accommodate padding */
    padding: 10px; /* Add padding to create space inside the textarea */
}
  .pref_div .pref_tag:focus {
    outline: none;
    border-color: #cda45e ;
}

</style>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="assets/img/favicon.png" rel="icon">
  <title>ATHENA | Reservation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Main CSS File -->
  <link href="assets/css/project_style.css" rel="stylesheet">

  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- Flatpickr JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
  body {
    z-index: 0;
  }
</style>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+91 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 10:00AM - 20:00PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>Welcome</li>
          <li><a href="#"><?php echo $_SESSION['userName']; ?></a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php"><img src="logo.png"></a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="index.php#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="index.php#events">Events</a></li>
          <li><a class="nav-link scrollto" href="index.php#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="index.php#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
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
      <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Reservation</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Reservation</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table">
          <div class="container" data-aos="fade-up">

            <div class="section-title" id="form1">
              <h2>Reservation</h2>
              <p>Book a Table</p>
              <div id="popup" class="popup">
                <span class="popup-message">This is the seating plan. Click the seat icon to open the plan.</span>
              </div>
            </div>
            <!-- <p class="floor-plan">SEATING <i class="bi bi-house-exclamation-fill" onclick="planopen()"></i></p> -->
            <p class="floor-plan">SEATING <img src="assets/img/seat.png" onclick="planopen()"></p>
            <div class="plan" id="plan">
              <i class="bi bi-x-octagon" onclick="planclose()"></i>
              <img src="assets/img/plan.jpeg">
            </div>
            <form method="POST" action="store_booking.php" class="reservation_form" data-aos="fade-up" data-aos-delay="100" onsubmit="return(validation());">
              <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                  <input type="text" name="name" value="<?php echo $_SESSION['userName'];  ?>" class="form-control" id="name" placeholder="Your Name" onblur="nameValidate()">
                  <div class="validate" id="name-tag"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" value="<?php echo $_SESSION['Email'];  ?>" name="email" id="email" placeholder="Your Email" onblur="emailValidate()">
                  <div class="validate" id="email-tag"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" onblur="phoneValidate()">
                  <div class="validate" id="phone-tag"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                  <input type="text" name="date" class="form-control" id="date" placeholder="Reservation Date" onchange="dateValidate()">
                  <div class="validate" id="date-tag"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                  <input type="number" class="form-control" name="people" id="people" placeholder="# of Guests" onblur="guestValidate(); showPopup();" onchange="seats()">
                  <div class="validate" id="guest-tag"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                  <select class="form-control book-seat" name="seat" id="seat" onblur="seatValidate(); showPopup();">
                    <option value="default" selected hidden>Select Your Preferred Seat</option>
                    <option value="patio" id="seat1" hidden>PATIO</option>
                    <option value="private_dining" id="seat2" hidden>PRIVATE DINING</option>
                    <option value="outdoor_seating" id="seat3" hidden>OUTDOOR SEATING</option>
                    <option value="buffet_table" id="seat4" hidden>BUFFET TABLE</option>
                  </select>
                  <div class="validate" id="seat-tag"></div>
                </div>
              </div>
              <div class="button-cover-1">
                <div class="button-set-1">
                  <input type="button" value="9 AM" class="button-6" id="btn-1" onclick="lock(this,'.button-6')" value="9 AM" style="border-color: #18d26e;">
                  <input type="button" value="11 AM" class="button-6" id="btn-2" onclick="lock(this,'.button-6')" value="11 AM" style="border-color: #18d26e;">
                </div>
                <div class="button-set-1">
                  <input type="button" class="button-6" id="btn-3" role="button" onclick="lock(this,'.button-6')" value="1 PM" style="border-color: #18d26e;">
                  <input type="button" class="button-6" id="btn-4" role="button" onclick="lock(this,'.button-6')" value="3 PM" style="border-color: #18d26e;">
                </div>
                <div class="button-set-1">
                  <input type="button" class="button-6" id="btn-5" role="button" onclick="lock(this,'.button-6')" value="5 PM" style="border-color: #18d26e;">
                  <input type="button" class="button-6" id="btn-6" role="button" onclick="lock(this,'.button-6')" value="7 PM" style="border-color: #18d26e;">
                </div>
                <div class="button-set-1">
                  <input type="button" class="button-6" id="btn-7" role="button" onclick="lock(this,'.button-6')" value="9 PM" style="border-color: #18d26e;">
                  <input type="button" class="button-6" id="btn-8" role="button" onclick="lock(this,'.button-6')" value="11 PM" style="border-color: #18d26e;">
                </div>
              </div>
              <input type="hidden" id="selectedSeat" name="SelectedTimeSlot" value="">
              <div class="validate" name="batch-tag" id="batch-tag"></div>
              <div class="text-center"><button type="submit" id="submitBtn" name="submit">Book a Table</button>
              </div>
            </form>
          </div>
        </section><!-- End Book A Table Section -->
      </div>
    </section>
    <?php
    if (isset($_SESSION['booking_status'])) {
      echo "<script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true,
        });
        Toast.fire({
          icon: 'success',
          title: 'Booking successfull'
        });
      </script>";
      unset($_SESSION['booking_status']);
    }
    if (isset($_SESSION['booking_error'])) {
      echo "<script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: 'error',
        title: 'Booking Failed, Please try after some time'
      });
    </script>";
      unset($_SESSION['booking_error']);
    }
    ?>
    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header menu-heading-box">
          <div></div>
          <p>MENU
          <p>
          <h2>What's on your mind?</h2>
          <p class="menu-quote">
            "Reserve your culinary delight, a symphony of tastes handpicked for you. Time's promise, a table set with warmth awaits; your feast, prepared with love, served piping hot as the clock chimes your reserved moment."
          </p>
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
                <div class="center">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn-minus min1 btn" onclick="remove_qty('Spinach_Salad','.add1','.min1');removeItem('Spinach_Salad',10)">
                        <i class="bi bi-dash-circle-dotted"></i>
                      </button>
                    </span>
                    <input type="number" name="quant[1]" id="Spinach_Salad" class="input-number" value="0" disabled>
                    <span class="input-group-btn">
                      <button type="button" class="btn-plus add1 btn" onclick="add_qty('Spinach_Salad', '.add1', '.min1');addItem('Spinach_Salad',10)">
                        <i class="bi bi-plus-circle-dotted"></i>
                      </button>
                    </span>
                  </div>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/French_fries.png" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>French Fries <i class="fa-solid fa-seedling"></i></h4>
                <div class="center">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn-minus min2 btn" onclick="remove_qty('French_Fries','.add2','.min2');removeItem('French_Fries',10)">
                        <i class="bi bi-dash-circle-dotted"></i>
                      </button>
                    </span>
                    <input type="number" name="quant[1]" id="French_Fries" class="input-number" value="0" disabled>
                    <span class="input-group-btn">
                      <button type="button" class="btn-plus add2 btn" onclick="add_qty('French_Fries', '.add2', '.min2');addItem('French_Fries',10)">
                        <i class="bi bi-plus-circle-dotted"></i>
                      </button>
                    </span>
                  </div>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/Mommos.png" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Dumpling Chino <i class="fa-solid fa-drumstick-bite"></i>&nbsp;<i class="fa-solid fa-seedling"></i></h4>
                <div class="center">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn-minus min3 btn" onclick="remove_qty('Dumpling_Chino','.add3','.min3');removeItem('Dumpling_Chino',10)">
                        <i class="bi bi-dash-circle-dotted"></i>
                      </button>
                    </span>
                    <input type="number" name="quant[1]" id="Dumpling_Chino" class="input-number" value="0" disabled>
                    <span class="input-group-btn">
                      <button type="button" class="btn-plus add3 btn" onclick="add_qty('Dumpling_Chino', '.add3', '.min3');addItem('Dumpling_Chino',10)">
                        <i class="bi bi-plus-circle-dotted"></i>
                      </button>
                    </span>
                  </div>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/greek_salad.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Greek Salad <i class="fa-solid fa-seedling"></i></h4>
                <div class="center">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn-minus min4 btn" onclick="remove_qty('Greek_Salad','.add4','.min4');removeItem('Greek_Salad',10)">
                        <i class="bi bi-dash-circle-dotted"></i>
                      </button>
                    </span>
                    <input type="number" name="quant[1]" id="Greek_Salad" class="input-number" value="0" disabled>
                    <span class="input-group-btn">
                      <button type="button" class="btn-plus add4 btn" onclick="add_qty('Greek_Salad', '.add4', '.min4');addItem('Greek_Salad',10)">
                        <i class="bi bi-plus-circle-dotted"></i>
                      </button>
                    </span>
                  </div>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/sushi.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Sushi <i class="fa-solid fa-drumstick-bite"></i>&nbsp;<i class="fa-solid fa-seedling"></i></h4>
                <div class="center">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn-minus min5 btn" onclick="remove_qty('Sushi','.add5','.min5');removeItem('Sushi',10)">
                        <i class="bi bi-dash-circle-dotted"></i>
                      </button>
                    </span>
                    <input type="number" name="quant[1]" id="Sushi" class="input-number" value="0" disabled>
                    <span class="input-group-btn">
                      <button type="button" class="btn-plus add5 btn" onclick="add_qty('Sushi', '.add5', '.min5');addItem('Sushi',10)">
                        <i class="bi bi-plus-circle-dotted"></i>
                      </button>
                    </span>
                  </div>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/paneer_tikka.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Paneer Tikka <i class="fa-solid fa-seedling"></i></h4>
                <div class="center">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn-minus min6 btn" onclick="remove_qty('Paneer_Tikka','.add6','.min6');removeItem('Paneer_Tikka',10)">
                        <i class="bi bi-dash-circle-dotted"></i>
                      </button>
                    </span>
                    <input type="number" name="quant[1]" id="Paneer_Tikka" class="input-number" value="0" disabled>
                    <span class="input-group-btn">
                      <button type="button" class="btn-plus add6 btn" onclick="add_qty('Paneer_Tikka', '.add6', '.min6');addItem('Paneer_Tikka',10)">
                        <i class="bi bi-plus-circle-dotted"></i>
                      </button>
                    </span>
                  </div>
                </div>
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
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min7 btn" onclick="remove_qty('Bread_Barrel','.add7','.min7');removeItem('Bread_Barrel',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Bread_Barrel" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add7 btn" onclick="add_qty('Bread_Barrel', '.add7', '.min7');addItem('Bread_Barrel',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/chocolate-cake.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Chocolate Cake <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min8 btn" onclick="remove_qty('Chocolate_Cake','.add8','.min8');removeItem('Chocolate_Cake',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Chocolate_Cake" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add8 btn" onclick="add_qty('Chocolate_Cake', '.add8', '.min8');addItem('Chocolate_Cake',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/eggs-benedict.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Eggs Benedict <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min9 btn" onclick="remove_qty('Eggs_Benedict','.add9','.min9');removeItem('Eggs_Benedict',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Eggs_Benedict" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add9 btn" onclick="add_qty('Eggs_Benedict', '.add9', '.min9');addItem('Eggs_Benedict',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/french-toasts.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>French Toast <i class="fa-solid fa-seedling"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min10 btn" onclick="remove_qty('French_Toast','.add10','.min10');removeItem('French_Toast',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="French_Toast" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add10 btn" onclick="add_qty('French_Toast', '.add10', '.min10');addItem('French_Toast',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/masala-dosa.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Masala Dosa <i class="fa-solid fa-seedling"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min11 btn" onclick="remove_qty('Masala_Dosa','.add11','.min11');removeItem('Masala_Dosa',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Masala_Dosa" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add11 btn" onclick="add_qty('Masala_Dosa', '.add11', '.min11');addItem('Masala_Dosa',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/pancakes.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Fluffy Pancakes<i class="fa-solid fa-seedling"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min12 btn" onclick="remove_qty('Fluffy_Pancakes','.add12','.min12');removeItem('Fluffy_Pancakes',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Fluffy_Pancakes" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add12 btn" onclick="add_qty('Fluffy_Pancakes', '.add12', '.min12');addItem('Fluffy_Pancakes',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
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
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min13 btn" onclick="remove_qty('Biriyani','.add13','.min13');removeItem('Biriyani',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Biriyani" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add13 btn" onclick="add_qty('Biriyani', '.add13', '.min13');addItem('Biriyani',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/chicken-grill.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Jamaican Jerk Chicken <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min14 btn" onclick="remove_qty('Jerk_Chicken','.add14','.min14');removeItem('Jerk_Chicken',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Jerk_Chicken" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add14 btn" onclick="add_qty('Jerk_Chicken', '.add14', '.min14');addItem('Jerk_Chicken',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/ramen.jpg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Ramen <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min15 btn" onclick="remove_qty('Ramen','.add15','.min15');removeItem('Ramen',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Ramen" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add15 btn" onclick="add_qty('Ramen', '.add15', '.min15');addItem('Ramen',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/beef_steak.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Rump steak <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min16 btn" onclick="remove_qty('Rump_steak','.add16','.min16');removeItem('Rump_steak',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Rump_steak" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add16 btn" onclick="add_qty('Rump_steak', '.add16', '.min16');addItem('Rump_steak',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/lobster-tail.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Lobster Tail <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min17 btn" onclick="remove_qty('Lobster_Tail','.add17','.min17');removeItem('Lobster_Tail',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Lobster_Tail" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add17 btn" onclick="add_qty('Lobster_Tail', '.add17', '.min17');addItem('Lobster_Tail',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/NI_thali2.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>North Indian Thali <i class="fa-solid fa-seedling"></i>&nbsp;<i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min18 btn" onclick="remove_qty('Indian_Thali','.add18','.min18');removeItem('Indian_Thali',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Indian_Thali" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add18 btn" onclick="add_qty('Indian_Thali', '.add18', '.min18');addItem('Indian_Thali',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
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
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min19 btn" onclick="remove_qty('Broiled_Chicken','.add19','.min19');removeItem('Broiled_Chicken',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Broiled_Chicken" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add19 btn" onclick="add_qty('Broiled_Chicken', '.add19', '.min19');addItem('Broiled_Chicken',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/shrimp-ceviche.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Shrimp Ceviche <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min20 btn" onclick="remove_qty('Shrimp_Ceviche','.add20','.min20');removeItem('Shrimp_Ceviche',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Shrimp_Ceviche" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add20 btn" onclick="add_qty('Shrimp_Ceviche', '.add20', '.min20');addItem('Shrimp_Ceviche',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/stuffed-lobster.webp" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Stuffed Lobster <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min21 btn" onclick="remove_qty('Stuffed_Lobster','.add21','.min21');removeItem('Stuffed_Lobster',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Stuffed_Lobster" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add21 btn" onclick="add_qty('Stuffed_Lobster', '.add21', '.min21');addItem('Stuffed_Lobster',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/Roasted Rack of Lamb.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Roasted Lamb <i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min22 btn" onclick="remove_qty('Roasted_Lamb','.add22','.min22');removeItem('Roasted_Lamb',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Roasted_Lamb" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add22 btn" onclick="add_qty('Roasted_Lamb', '.add22', '.min22');addItem('Roasted_Lamb',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/mabo-tofu.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Mapo Tofu <i class="fa-solid fa-seedling"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min23 btn" onclick="remove_qty('Mapo_Tofu','.add23','.min23');removeItem('Mapo_Tofu',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Mapo_Tofu" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add23 btn" onclick="add_qty('Mapo_Tofu', '.add23', '.min23');addItem('Mapo_Tofu',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <img src="assets/img/menu/kebab.jpeg" class="menu-img img-fluid" alt="Circle Image" style=" border-radius: 50%; object-fit: cover;">
                <h4>Kebab <i class="fa-solid fa-seedling"></i>&nbsp;<i class="fa-solid fa-drumstick-bite"></i></h4>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn-minus min24 btn" onclick="remove_qty('Kebab','.add24','.min24');removeItem('Kebab',10)">
                      <i class="bi bi-dash-circle-dotted"></i>
                    </button>
                  </span>
                  <input type="number" name="quant[1]" id="Kebab" class="input-number" value="0" disabled>
                  <span class="input-group-btn">
                    <button type="button" class="btn-plus add24 btn" onclick="add_qty('Kebab', '.add24', '.min24');addItem('Kebab',10)">
                      <i class="bi bi-plus-circle-dotted"></i>
                    </button>
                  </span>
                </div>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Dinner Menu Content -->

        </div>

      </div>
    </section><!-- End Menu Section -->
    <div class="pref_div">
        <textarea class="pref_tag" name="message" id="message" rows="8" placeholder="Cooking Preference" data-aos="fade-up"></textarea>
    </div>
    <section class="special-occation">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Whispers of Eternity</h2>
          <p>Any Special occasion ?</p>
        </div>
        <div class="button-cover-1">
          <div class="button-set-1">
            <button class="button-6 occasion" id="btn-10" role="button" onclick="lock(this,'.occasion')" value="Bday">Birthday</button>
            <button class="button-6 occasion" id="btn-11" role="button" onclick="lock(this,'.occasion')" value="Date">Date</button>
          </div>
          <div class="button-set-1">
            <button class="button-6 occasion" id="btn-12" role="button" onclick="lock(this,'.occasion')" value="Anniversary">Anniversary</button>
            <button class="button-6 occasion" id="btn-13" role="button" onclick="lock(this,'.occasion')" value="Graduation">Graduation</button>
          </div>
          <div class="button-set-1">
            <button class="button-6 occasion" id="btn-5" role="button" onclick="lock(this,'.occasion')" value="Promotion">Promotion</button>
            <button class="button-6 occasion" id="btn-6" role="button" onclick="lock(this,'.occasion')" value="Proposal">Proposal</button>
          </div>
          <div class="button-set-1">
            <button class="button-6 occasion" id="btn-7" role="button" onclick="lock(this,'.occasion')" value="Farewell">Farewell</button>
            <button class="button-6 occasion" id="btn-8" role="button" onclick="lock(this,'.occasion')" value="Homecoming">Homecoming</button>
          </div>
          <input type="hidden" id="selectedOccation" name="selectedOccation" value="">
        </div>
        <p class="menu-quote">
          "Embark upon the dance of anticipation, let whispers of live music serenade your moments, a devoted staff attend to your every wish with regal grace.
          In the soft glow of romantic candlelight, envision bespoke surprises woven into the fabric of your special day.<a href="#footer"> Contact us</a> , and together, we shall
          craft a poetic symphony, painting your celebration with the hues of enchantment."
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <div class="bill-container" id="invoice">
    <div class="bill-adress">
      <div>
        Customer Name : <p class="reserve-location"><?php if (isset($_SESSION['booking_name'])) { echo $_SESSION['booking_name']; } ?></p>
      </div>
      <div>
        Table Name : <p class="reserve-location"><?php if (isset($_SESSION['table_name'])) { echo $_SESSION['table_name']; } ?></p>
      </div>
      <div>
        Date : <p class="reserve-location"><?php if (isset($_SESSION['booking_date'])) { echo $_SESSION['booking_date']; } ?></p>
      </div>
      <div>
        Time : <p class="reserve-location"><?php if (isset($_SESSION['booking_time'])) { echo $_SESSION['booking_time']; } ?></p>
      </div>

    </div>
    <table class="finalbill">
      <thead>
        <tr>
          <td>Sl</td>
          <td>Description</td>
          <td>Qty</td>
          <td>Rate</td>
          <td>Amount</td>
        </tr>
      </thead>
    </table>
    <table id="billDetailsTable" class="finalbill">
    </table>
    <table>
      <tr>
        <td>
          <p>Total Bill: <span id="bill-total">0.00</span></p>
        </td>
      </tr>
    </table>
  </div>
  <button id="rzp-button1" class="download_btn">Check-Out</button>
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
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#why-us">Why us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Login</a></li>
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

</body>

</html>

<script>
  $(document).ready(function() {
    // Make an AJAX request to fetch data from the server
    $.ajax({
      url: 'fetch_items.php', 
      type: 'GET',
      dataType: 'json', //Response is in JSON format
      success: function(data) {
        // Iterate through the data and update input tags
        $.each(data, function(index, item) {
          // Update quantity input tag for the respective item
          $('#' + item.name).val(item.quantity);
        });
      },
      error: function(xhr, status, error) {
        console.error('Error fetching data: ' + error);
      }
    });
  });
</script>

<script>
  var button = document.getElementById("js-btn"),
    timer = document.getElementById("js-timer"),
    reset = document.getElementById("js-reset");

  button.addEventListener("click", doSubmit);
  reset.addEventListener("click", resetButton);

  function doSubmit() {
    if (button.classList.contains("do-submit")) {
      return;
    }

    button.classList.add("do-submit");

    setTimeout(function() {
      doTimer(0);
    }, 1200);

    setTimeout(function() {
      doTimer(15);
    }, 1200);

    setTimeout(function() {
      doTimer(75);
    }, 2000);

    setTimeout(function() {
      doTimer(100);
    }, 2800);
  }

  function doTimer(amountLoaded) {
    timer.style.strokeDashoffset = 3.83 * (100 - amountLoaded) + "px";

    if (amountLoaded === 100) {
      setTimeout(function() {
        button.classList.add("success");
      }, 500);
    }
  }

  function resetButton() {
    button.classList.add("reset");
    setTimeout(function() {
      button.classList.remove("success");
      button.classList.remove("do-submit");
      button.classList.remove("reset");
    }, 500);

    timer.style.strokeDashoffset = "383px";

    time = 90;
  }
</script>
<script>
  // Function to show the popup
  function showPopup() {
    var popup = document.getElementById("popup");
    popup.classList.add("show"); // Add the 'show' class to trigger the transition
    setTimeout(hidePopup, 6000);
  }

  // Function to hide the popup
  function hidePopup() {
    var popup = document.getElementById("popup");
    popup.classList.remove("show"); // Remove the 'show' class to hide the popup
  }
  // Show the popup on load
  window.onload = showPopup;
</script>
<script>
  flatpickr("#date", {
    dateFormat: "Y-m-d",
    // defaultDate: "today",
    altInput: true,
    altFormat: "F j, Y",
    theme: "dark",
    backgroundColor: "inherit"
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
$(document).ready(function() {
    $('#rzp-button1').click(function(event) {
        event.preventDefault();
        
        // Get the text content of the span element with id "bill-total"
        var billTotalText = document.getElementById('bill-total').innerText;
        
        // Extract the cost part from the text content
        var price = parseFloat(billTotalText.split(': ')[1]); // Convert amd to a float value
        
        var buynow = document.getElementById('bookingform');
        var tid = document.getElementById('tid');

        if (price <= 0 || isNaN(price)) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Your Product is not available"
            })
            return; // Exit function if price is not valid
        }

        var options = {
            "key": "Your-API-code-here", // Replace with your Razorpay Key
            "amount": price * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Athena",
            "description": "Transaction",
            "image": "https://s.tmimgcdn.com/scr/1200x750/328400/eco-leaf-green-tree-tea-leaf-and-nature-leaf-logo-v34_328405-original.jpg",
            "handler": function(response) {
              checkout();
                tid.value = response.razorpay_payment_id;
                buynow.submit();
                // Call checkout() function upon successful payment
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    });
});
function checkout() {
        // Retrieve values from input and textarea
        const selectedOccationValue = document.getElementById("selectedOccation").value;
        const messageValue = document.getElementById("message").value;

        // Get the invoice element
        const invoice = document.getElementById("invoice");

        // Check if additional data already exists and remove it
        const existingAdditionalData = invoice.querySelector(".additional-data");
        if (existingAdditionalData) {
            invoice.removeChild(existingAdditionalData);
        }

        // Create a container for additional data
        const additionalDataContainer = document.createElement("div");
        additionalDataContainer.classList.add("additional-data");

        // Append selected occasion data if it's not empty
        if (selectedOccationValue.trim() !== '') {
            const selectedOccationElement = document.createElement("div");
            selectedOccationElement.textContent = "Selected Occasion: " + selectedOccationValue;
            additionalDataContainer.appendChild(selectedOccationElement);
        }

        // Append cooking preference data if it's not empty
        if (messageValue.trim() !== '') {
            const messageElement = document.createElement("div");
            messageElement.textContent = "Cooking Preference: " + messageValue;
            additionalDataContainer.appendChild(messageElement);
        }

        // Append the additional data container to the invoice content
        invoice.appendChild(additionalDataContainer);

        // Set styles (if needed)
        invoice.style.color = 'black';

        // Log invoice and window (for debugging)
        console.log(invoice);
        console.log(window);

        // PDF generation options
        var opt = {
            margin: 1,
            filename: 'myfile.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'landscape'
            }
        };

        // Generate PDF from invoice and save it
        html2pdf().from(invoice).set(opt).save();
        deleteBillRows();
    }

    function deleteBillRows() {
      
        var userID = <?php echo json_encode($_SESSION['userID']); ?>;
        $.ajax({
            type: 'POST',
            url: 'delete_bill_rows.php', // Change to the appropriate URL for your PHP script
            data: { userID: userID },
            success: function(response) {
                // Handle success here, if needed
                console.log('Rows deleted successfully.');
                displayBill();
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error deleting rows: ' + error);
            }
        });
    }
</script>
