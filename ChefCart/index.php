<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ChefCart | Athena</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content name="keywords">
    <meta content name="description">
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">
    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    .mid-fix {
        width: 80%;
        left: 10%;
        top: 15%;
    }

    .navbar {
        transition: padding 0.3s;
        /* Adding smooth transition */
    }
    .py-12{
        padding-top: 12rem;
        padding-bottom: 9rem;
    }
</style>

<body>
    <?php
    session_start();
    if (isset($_SESSION['Success'])) {
        echo "<script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 4000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: 'success',
          title: 'Booking Registered'
        });
      </script>";
        unset($_SESSION['Success']);
    }
    ?>
    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar start -->
    <div class="container-fluid nav-bar fixed-top">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-4" id="navbar">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-primary fw-bold mb-0">Chef<span class="text-white">Cart</span> </h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="index.php#aboutstart" class="nav-item nav-link">About</a>
                        <a href="index.php#Numberstart" class="nav-item nav-link">Counts</a>
                        <a href="index.php#servicecount" class="nav-item nav-link">Services</a>
                        <a href="index.php#contactstart" class="nav-item nav-link">Contact</a>
                        <a href="jointhecrew.php" class="nav-item nav-link">Join the Crew</a>
                        <a href="/Athena/index.php" class="nav-item nav-link ">Back Home</a>
                    </div>
                    <a href="index.php#bookingstart" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Book
                        Now</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <div class="container-fluid py-12 my-6 mt-0">
        <div class="container">
            <div class="row g-5 align-items-center" style="margin-top: -100px;">
                <div class="col-lg-7 col-md-12">
                    <h2 class="display-1 mb-4 animated bounceInDown">
                        Elevate home dining with ChefCart from <p class="text-white">Athena</p>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-12">
                    <img src="img/hero.png" class="img-fluid rounded animated zoomIn" alt>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Satrt -->
    <div class="container-fluid py-6" id="aboutstart">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="img/about.jpg" class="img-fluid rounded" alt>
                </div>
                <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                    <h4 style="color: #aaaaaa; font-size:larger;">WHY
                        US</h4>
                    <h1 class="display-5 mb-4">Trusted By 200 + satisfied
                        clients</h1>
                    <p class="mb-4" style="text-align: justify; line-height: 30px;">Embark
                        on a culinary odyssey with Athena's ChefCart.
                        Seamlessly integrated and trusted by discerning
                        diners, our platform offers bespoke culinary
                        journeys tailored to your taste. Celebrate
                        individuality with each dish, ensuring an
                        unparalleled dining experience that resonates with
                        your palate and preferences.</p>
                    <div class="row g-4 text-white mb-5">
                        <div class="col-sm-6">
                            <i class="fas fa-share text-primary me-2"></i>Seamless
                            Booking Process
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-share text-primary me-2"></i>Expertise
                            On Demand
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-share text-primary me-2"></i>Professional
                            Service
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-share text-primary me-2"></i>Flexibility
                            and Convenience
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Fact Start-->
    <div class="container-fluid faqt py-6" id="Numberstart">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.3s">
                            <div class="faqt-item box-border rounded p-4 text-center">
                                <i class="fas fa-users fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold text-white" data-toggle="counter-up">982</h1>
                                <p class="text-white text-uppercase fw-bold mb-0">
                                    Customers</p>
                            </div>
                        </div>
                        <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.5s">
                            <div class="faqt-item box-border rounded p-4 text-center">
                                <i class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold text-white" data-toggle="counter-up">307</h1>
                                <p class="text-white text-uppercase fw-bold mb-0">Expert
                                    Chefs</p>
                            </div>
                        </div>
                        <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.7s">
                            <div class="faqt-item box-border rounded p-4 text-center">
                                <i class="fas fa-check fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold text-white" data-toggle="counter-up">453</h1>
                                <p class="text-white text-uppercase fw-bold mb-0">Events
                                    Complete</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="video">
                        <video autoplay loop muted plays-inline class="back-video">
                            <source src="Food Reel _ FH Studio.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube
                        Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

    <!-- Service Start -->
    <div class="container-fluid service py-6" id="servicecount">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <h4 style="color: #aaaaaa; font-size:larger;">OUR
                    SERVICES</h4>
                <h1 class="display-5 mb-5">What We Offer</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="my_border rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center">
                            <div class="service-content-icon text-center p-4">
                                <img src="cooking.png" class="image_services">
                                <h4 class="mb-3 hover_color">Cheift</h4>
                                <p class="mb-4">Cook for One Meal</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="my_border rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center">
                            <div class="service-content-icon text-center p-4">
                                <img src="chef-hat.png" class="image_services">
                                <h4 class="mb-3 hover_color">Chef-in-Residence</h4>
                                <p class="mb-4">Cook for a Month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="my_border rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center">
                            <div class="service-content-icon text-center p-4">
                                <img src="chef.png" class="image_services">
                                <h4 class="mb-3 hover_color">Festivity
                                    Chef</h4>
                                <p class="mb-4">Chef for Party</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                    <div class="my_border rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center">
                            <div class="service-content-icon text-center p-4">
                                <img src="mchef.png" class="image_services">
                                <h4 class="mb-3 hover_color">Royale</h4>
                                <p class="mb-4">Full time Chef</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service End -->

            <!-- Book Us Start -->
            <form action="chef_booking.php" method="POST" onsubmit="return(validateForm());" id="bookingstart">
                <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="border-bottom border-top border-primary py-5 px-4">
                                    <div class="text-center">
                                        <h4 style="color: #aaaaaa; font-size:larger;">OUR
                                            SERVICES</h4>
                                        <h1 class="display-5 mb-5">Where you
                                            want Our
                                            Services</h1>
                                    </div>
                                    <div class="row g-4 form">
                                        <div class="col-lg-4 col-md-6">
                                            <input type="text" id="name" name="name" class="form-control border-primary p-2" placeholder="Name" onblur="validateName()">
                                            <span id="nameError" style="color: red;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <input list="cities" class="form-control border-primary p-2" id="city" name="city" aria-label="Default select example" placeholder="City" onblur="clearIfNotInDatalist(this); validateCity()">
                                            <span id="cityError" style="color: red;"></span>
                                            <datalist id="cities">
                                                <option value="Ahmedabad">Ahmedabad</option>
                                                <option value="Bangalore">Bangalore</option>
                                                <option value="Chennai">Chennai</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Hyderabad">Hyderabad</option>
                                                <option value="Jaipur">Jaipur</option>
                                                <option value="Kolkata">Kolkata</option>
                                                <option value="Mumbai">Mumbai</option>
                                                <option value="Pune">Pune</option>
                                                <option value="Surat">Surat</option>
                                                <option value="Lucknow">Lucknow</option>
                                                <option value="Kanpur">Kanpur</option>
                                                <option value="Nagpur">Nagpur</option>
                                                <option value="Indore">Indore</option>
                                                <option value="Thane">Thane</option>
                                                <option value="Bhopal">Bhopal</option>
                                                <option value="Visakhapatnam">Visakhapatnam</option>
                                                <option value="Patna">Patna</option>
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Ghaziabad">Ghaziabad</option>
                                                <option value="Ludhiana">Ludhiana</option>
                                                <option value="Agra">Agra</option>
                                                <option value="Nashik">Nashik</option>
                                                <option value="Faridabad">Faridabad</option>
                                                <option value="Meerut">Meerut</option>
                                                <option value="Rajkot">Rajkot</option>
                                                <option value="Kalyan-Dombivali">Kalyan-Dombivali</option>
                                                <option value="Vasai-Virar">Vasai-Virar</option>
                                                <option value="Varanasi">Varanasi</option>
                                                <option value="Srinagar">Srinagar</option>
                                                <option value="Aurangabad">Aurangabad</option>
                                                <option value="Dhanbad">Dhanbad</option>
                                                <option value="Amritsar">Amritsar</option>
                                                <option value="Allahabad">Allahabad</option>
                                                <option value="Howrah">Howrah</option>
                                                <option value="Ranchi">Ranchi</option>
                                                <option value="Gwalior">Gwalior</option>
                                                <option value="Jabalpur">Jabalpur</option>
                                                <option value="Coimbatore">Coimbatore</option>
                                                <option value="Vijayawada">Vijayawada</option>
                                                <option value="Jodhpur">Jodhpur</option>
                                                <option value="Madurai">Madurai</option>
                                                <option value="Raipur">Raipur</option>
                                                <option value="Kota">Kota</option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Guwahati">Guwahati</option>
                                                <option value="Solapur">Solapur</option>
                                                <option value="Hubli-Dharwad">Hubli-Dharwad</option>
                                                <option value="Bareilly">Bareilly</option>
                                                <option value="Moradabad">Moradabad</option>
                                                <option value="Mysore">Mysore</option>
                                                <option value="Gurgaon">Gurgaon</option>
                                                <option value="Aligarh">Aligarh</option>
                                                <option value="Jalandhar">Jalandhar</option>
                                                <option value="Tiruchirappalli">Tiruchirappalli</option>
                                                <option value="Bhubaneswar">Bhubaneswar</option>
                                                <option value="Salem">Salem</option>
                                            </datalist>

                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <input type="email" id="email" name="email" class="form-control border-primary p-2" placeholder="Enter Your Email" onblur="validateEmail()">
                                            <span id="emailError" style="color: red;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <select class="form-select border-primary p-2" id="service" name="service" aria-label="Service" onblur="validateService()">
                                                <option selected hidden disabled value="0">Service</option>
                                                <option value="1">One
                                                    Meal</option>
                                                <option value="2">For a
                                                    Month</option>
                                                <option value="3">Party</option>
                                                <option value="4">Full
                                                    Time</option>
                                            </select>
                                            <span id="serviceError" style="color: red;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <select class="form-select border-primary p-2" id="numberOfPeople" name="numberOfPeople" aria-label="Default select example" onblur="validateNumberOfPeople()">
                                                <option selected hidden disabled value="0">No.
                                                    Of People</option>
                                                <option value="1">1-10</option>
                                                <option value="2">10-20</option>
                                                <option value="3">20-30</option>
                                                <option value="4">40-50</option>
                                                <option value="5">50+</option>
                                            </select>
                                            <span id="numberOfPeopleError" style="color: red;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <select id="type" name="type" class="form-select border-primary p-2" aria-label="Default select example" onblur="validateType()">
                                                <option selected disabled hidden value="0">Select
                                                    Food Type</option>
                                                <option value="1">Vegetarian</option>
                                                <option value="2">Non
                                                    Vegetarian</option>
                                            </select>
                                            <span id="typeError" style="color: red;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <input type="text" id="contact" name="contact" class="form-control border-primary p-2" placeholder="Your Contact No." onblur="validateContact()">
                                            <span id="contactError" style="color: red;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control border-primary p-2" name="dob" id="dob" placeholder="Date" onblur="validateDate()">
                                                <span class="error" id="dobError" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div id="mapModal" class="modal mid-fix">
                                                <div class="modal-content">
                                                    <span class="close"><i class="bi bi-x-circle-fill"></i></span>
                                                    <div id="map"></div>
                                                </div>
                                            </div>
                                            <input type="text" id="locationInput" name="locationInput" class="form-control border-primary p-2" value="Choose Current Location">
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" id="submit" class="btn btn-primary px-5 py-3 rounded-pill">Book
                                                Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Book Us End -->

            <!-- Team Start -->
            <div class="container-fluid team py-6" id="myteamstart">
                <div class="container">
                    <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                        <h4 style="color: #aaaaaa; font-size:larger;">OUR TEAM</h4>
                        <h1 class="display-5 mb-5">We have
                            experienced chef
                            Team</h1>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                            <div class="team-item rounded">
                                <img class="img-fluid rounded-top " src="img/team-1.jpg" alt>
                                <div class="team-content text-center py-3 bg-dark rounded-bottom">
                                    <h4 class="text-primary">Henry</h4>
                                    <p class="text-white mb-0">Decoration
                                        Chef</p>
                                </div>
                                <div class="team-icon d-flex flex-column justify-content-center m-4">
                                    <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fas fa-share-alt"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-facebook-f"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-twitter"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.3s">
                            <div class="team-item rounded">
                                <img class="img-fluid rounded-top " src="img/team-2.jpg" alt>
                                <div class="team-content text-center py-3 bg-dark rounded-bottom">
                                    <h4 class="text-primary">Jemes
                                        Born</h4>
                                    <p class="text-white mb-0">Executive
                                        Chef</p>
                                </div>
                                <div class="team-icon d-flex flex-column justify-content-center m-4">
                                    <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fas fa-share-alt"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-facebook-f"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-twitter"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.5s">
                            <div class="team-item rounded">
                                <img class="img-fluid rounded-top " src="img/team-3.jpg" alt>
                                <div class="team-content text-center py-3 bg-dark rounded-bottom">
                                    <h4 class="text-primary">Martin
                                        Hill</h4>
                                    <p class="text-white mb-0">Kitchen
                                        Porter</p>
                                </div>
                                <div class="team-icon d-flex flex-column justify-content-center m-4">
                                    <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fas fa-share-alt"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-facebook-f"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-twitter"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.7s">
                            <div class="team-item rounded">
                                <img class="img-fluid rounded-top " src="img/team-4.jpg" alt>
                                <div class="team-content text-center py-3 bg-dark rounded-bottom">
                                    <h4 class="text-primary">Adam
                                        Smith</h4>
                                    <p class="text-white mb-0">Head
                                        Chef</p>
                                </div>
                                <div class="team-icon d-flex flex-column justify-content-center m-4">
                                    <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fas fa-share-alt"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-facebook-f"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-twitter"></i></a>
                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Team End -->

            <!-- Testimonial Start -->
            <div class="container-fluid py-6">
                <div class="container">
                    <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                        <h4 style="color: #aaaaaa; font-size:larger;">TESTIMONIAL</h4>
                        <h1 class="display-5 mb-5">What Our Customers Say!</h1>
                    </div>
                    <div class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4 wow bounceInUp" data-wow-delay="0.1s">
                        <!-- Testimonial 1 -->
                        <div class="testimonial-item rounded">
                            <div class="d-flex mb-3">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle flex-shrink-0" alt>
                                <div class="position-absolute" style="top: 15px; right: 20px;">
                                    <i class="fa fa-quote-right fa-2x"></i>
                                </div>
                                <div class="ps-3 my-auto">
                                    <h4 class="mb-0">John Doe</h4>
                                    <p class="m-0">Chef</p>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="fs-5 m-0 pt-3">Delightful food! Great taste and wonderful display. Will surely return!</p>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="testimonial-item rounded">
                            <div class="d-flex mb-3">
                                <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle flex-shrink-0" alt>
                                <div class="position-absolute" style="top: 15px; right: 20px;">
                                    <i class="fa fa-quote-right fa-2x"></i>
                                </div>
                                <div class="ps-3 my-auto">
                                    <h4 class="mb-0">Jane Smith</h4>
                                    <p class="m-0">Food Critic</p>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="fs-5 m-0 pt-3">Awesome meal! Tasty treats and splendid presentation. Will definitely come again!.</p>
                            </div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="testimonial-item rounded">
                            <div class="d-flex mb-3">
                                <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle flex-shrink-0" alt>
                                <div class="position-absolute" style="top: 15px; right: 20px;">
                                    <i class="fa fa-quote-right fa-2x"></i>
                                </div>
                                <div class="ps-3 my-auto">
                                    <h4 class="mb-0">Emily Johnson</h4>
                                    <p class="m-0">Restaurant Owner</p>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="fs-5 m-0 pt-3">Superb service and amazing flavors! This place always delivers. Ideal for any event.</p>
                            </div>
                        </div>

                        <!-- Testimonial 4 -->
                        <div class="testimonial-item rounded">
                            <div class="d-flex mb-3">
                                <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle flex-shrink-0" alt>
                                <div class="position-absolute" style="top: 15px; right: 20px;">
                                    <i class="fa fa-quote-right fa-2x"></i>
                                </div>
                                <div class="ps-3 my-auto">
                                    <h4 class="mb-0">Michael Johnson</h4>
                                    <p class="m-0">Food Blogger</p>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="fs-5 m-0 pt-3">Fantastic cuisine! Every dish was a masterpiece. Can't wait to return</p>
                            </div>
                        </div>
                    </div>

                    <div class="owl-carousel testimonial-carousel testimonial-carousel-2 wow bounceInUp" data-wow-delay="0.3s">
                        <!-- Testimonial 5 -->
                        <div class="testimonial-item rounded">
                            <div class="d-flex mb-3">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle flex-shrink-0" alt>
                                <div class="position-absolute" style="top: 15px; right: 20px;">
                                    <i class="fa fa-quote-right fa-2x"></i>
                                </div>
                                <div class="ps-3 my-auto">
                                    <h4 class="mb-0">Jessica Brown</h4>
                                    <p class="m-0">Food Enthusiast</p>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="fs-5 m-0 pt-3">Outstanding culinary experience! Every dish was a masterpiece of flavor and presentation.</p>
                            </div>
                        </div>

                        <!-- Testimonial 6 -->
                        <div class="testimonial-item rounded">
                            <div class="d-flex mb-3">
                                <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle flex-shrink-0" alt>
                                <div class="position-absolute" style="top: 15px; right: 20px;">
                                    <i class="fa fa-quote-right fa-2x"></i>
                                </div>
                                <div class="ps-3 my-auto">
                                    <h4 class="mb-0">David Wilson</h4>
                                    <p class="m-0">Food Lover</p>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="fs-5 m-0 pt-3">Wonderful dining experience! Every dish was a delight to the taste buds. Can't wait to come back!</p>
                            </div>
                        </div>

                        <!-- Testimonial 7 -->
                        <div class="testimonial-item rounded">
                            <div class="d-flex mb-3">
                                <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle flex-shrink-0" alt>
                                <div class="position-absolute" style="top: 15px; right: 20px;">
                                    <i class="fa fa-quote-right fa-2x"></i>
                                </div>
                                <div class="ps-3 my-auto">
                                    <h4 class="mb-0">Sophia Clark</h4>
                                    <p class="m-0">Foodie</p>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="fs-5 m-0 pt-3">Delightful culinary experience! Each dish was flavorful and beautifully presented. Highly recommended!</p>
                            </div>
                        </div>

                        <!-- Testimonial 8 -->
                        <div class="testimonial-item rounded">
                            <div class="d-flex mb-3">
                                <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle flex-shrink-0" alt>
                                <div class="position-absolute" style="top: 15px; right: 20px;">
                                    <i class="fa fa-quote-right fa-2x"></i>
                                </div>
                                <div class="ps-3 my-auto">
                                    <h4 class="mb-0">Olivia Taylor</h4>
                                    <p class="m-0">Food Connoisseur</p>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="fs-5 m-0 pt-3">Exceptional food quality! Every dish was meticulously crafted and bursting with flavor. Can't wait to return!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial End -->

            <!-- Blog Start -->
            <div class="container-fluid blog py-6">
                <div class="container">
                    <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                        <h4 style="color: #aaaaaa; font-size:larger;">OUR BLOG</h4>
                        <h1 class="display-5 mb-5">Be First Who
                            Read News</h1>
                    </div>
                    <div class="row gx-4 justify-content-center">
                        <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                            <div class="blog-item">
                                <div class="overflow-hidden rounded">
                                    <img src="img/blog-1.jpg" class="img-fluid w-100" alt>
                                </div>
                                <div class="blog-content mx-4 d-flex rounded bg-light">
                                    <div class="text-dark bg-primary rounded-start">
                                        <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                            <p class="fw-bold mb-0">16</p>
                                            <p class="fw-bold mb-0">Sep</p>
                                        </div>
                                    </div>
                                    <a href="#" class="h5 lh-base my-auto h-100 p-3">How
                                        to
                                        get more test in your
                                        food from</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.3s">
                            <div class="blog-item">
                                <div class="overflow-hidden rounded">
                                    <img src="img/blog-2.jpg" class="img-fluid w-100" alt>
                                </div>
                                <div class="blog-content mx-4 d-flex rounded bg-light">
                                    <div class="text-dark bg-primary rounded-start">
                                        <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                            <p class="fw-bold mb-0">16</p>
                                            <p class="fw-bold mb-0">Sep</p>
                                        </div>
                                    </div>
                                    <a href="#" class="h5 lh-base my-auto h-100 p-3">How
                                        to
                                        get more test in your
                                        food from</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.5s">
                            <div class="blog-item">
                                <div class="overflow-hidden rounded">
                                    <img src="img/blog-3.jpg" class="img-fluid w-100" alt>
                                </div>
                                <div class="blog-content mx-4 d-flex rounded bg-light">
                                    <div class="text-dark bg-primary rounded-start">
                                        <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                            <p class="fw-bold mb-0">16</p>
                                            <p class="fw-bold mb-0">Sep</p>
                                        </div>
                                    </div>
                                    <a href="#" class="h5 lh-base my-auto h-100 p-3">How
                                        to
                                        get more test in your
                                        food from</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog End -->

            <!-- Footer Start -->
            <div class="container-fluid footer py-6 my-6 mb-0 wow bounceInUp" data-wow-delay="0.1s" id="contactstart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-item">
                                <h1 class="text-primary">Chef<span class="text-light">Cart</span></h1>
                                <p class="lh-lg mb-4">
                                    Chef Cart is a one-stop online destination for chefs and home cooks, offering a wide range of top-quality ingredients, kitchen tools, and equipment.</p>
                                <div class="footer-icon d-flex">
                                    <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm-square me-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm-square rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-item">
                                <h4 class="mb-4">Facilities</h4>
                                <div class="d-flex flex-column align-items-start">
                                    <a class="text-body mb-3" href><i class="fa fa-check text-primary me-2"></i>Cheift</a>
                                    <a class="text-body mb-3" href><i class="fa fa-check text-primary me-2"></i>Chef-in-Residence</a>
                                    <a class="text-body mb-3" href><i class="fa fa-check text-primary me-2"></i>Festivity Chef</a>
                                    <a class="text-body mb-3" href><i class="fa fa-check text-primary me-2"></i>Royale</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-item">
                                <h4 class="mb-4">Contact Us</h4>
                                <div class="d-flex flex-column align-items-start">
                                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                        Prinsengracht 456 1016 HL Amsterdam, Netherlands</p>
                                    <p><i class="fa fa-phone-alt text-primary me-2"></i>
                                        (+91) 9548 9568 58</p>
                                    <p><i class="fas fa-envelope text-primary me-2"></i>
                                        Athena@gmail.com</p>
                                    <p><i class="fa fa-clock text-primary me-2"></i>
                                        26 / 7 Hours Service</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-item">
                                <h4 class="mb-4">Social
                                    Gallery</h4>
                                <div class="row g-2">
                                    <div class="col-4">
                                        <img src="img/menu-01.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                                    </div>
                                    <div class="col-4">
                                        <img src="img/menu-02.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                                    </div>
                                    <div class="col-4">
                                        <img src="img/menu-03.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                                    </div>
                                    <div class="col-4">
                                        <img src="img/menu-04.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                                    </div>
                                    <div class="col-4">
                                        <img src="img/menu-05.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                                    </div>
                                    <div class="col-4">
                                        <img src="img/menu-06.jpg" class="img-fluid rounded-circle border border-primary p-2" alt>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

            <!-- Copyright Start -->
            <div class="container-fluid copyright bg-dark py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Athena</a>, All right
                                reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

            <!-- JavaScript Libraries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/wow/wow.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/counterup/counterup.min.js"></script>
            <script src="lib/lightbox/js/lightbox.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
            <script>
                function clearIfNotInDatalist(input) {
                    var validOptions = document.getElementById('cities').getElementsByTagName('option');
                    var inputValue = input.value.toLowerCase();
                    var optionFound = false;
                    for (var i = 0; i < validOptions.length; i++) {
                        if (validOptions[i].value.toLowerCase() === inputValue) {
                            optionFound = true;
                            break;
                        }
                    }
                    if (!optionFound) {
                        input.value = '';
                    }
                }
            </script>
            <script>
                flatpickr("#dob", {
                    dateFormat: "Y-m-d",
                    altInput: true,
                    altFormat: "F j, Y",
                    theme: "dark",
                    onClose: function() {
                        validateDate();
                    }
                });
            </script>
            <script>
                // Function to open the modal with the static map
                function openMapModal(latitude, longitude) {
                    // Get the modal
                    var modal = document.getElementById("mapModal");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                    // Open the modal
                    modal.style.display = "block";

                    // Construct the URL for the static map image using OpenStreetMap
                    var mapUrl = "https://www.openstreetmap.org/export/embed.html?bbox=" + (longitude - 0.01) + "," + (latitude - 0.01) + "," + (longitude + 0.01) + "," + (latitude + 0.01) + "&layer=mapnik";

                    // Create an iframe element and set its source to the map URL
                    var mapFrame = document.createElement("iframe");
                    mapFrame.src = mapUrl;
                    mapFrame.width = "100%";
                    mapFrame.height = "400";
                    mapFrame.style.border = "none";

                    // Clear existing content of the map div and append the iframe
                    var mapDiv = document.getElementById("map");
                    mapDiv.innerHTML = "";
                    mapDiv.appendChild(mapFrame);

                    // Add SVG marker icon
                    var markerSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    markerSvg.setAttribute("viewBox", "0 0 24 24");
                    markerSvg.setAttribute("width", "32");
                    markerSvg.setAttribute("height", "32");
                    markerSvg.style.position = "absolute";
                    markerSvg.style.left = "50%";
                    markerSvg.style.top = "50%";
                    markerSvg.style.transform = "translate(-50%, -100%)";
                    markerSvg.style.zIndex = "1000";

                    var markerPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    markerPath.setAttribute("d", "M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z");
                    markerPath.setAttribute("fill", "red");

                    markerSvg.appendChild(markerPath);
                    mapDiv.appendChild(markerSvg);

                    // Close the modal after 5 seconds
                    setTimeout(function() {
                        modal.style.display = "none";
                    }, 2000);
                }

                // Function to get the current location
                function getCurrentLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                }

                // Function to display the current position and open the modal
                function showPosition(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Set the current location to the input field
                    document.getElementById("locationInput").value = latitude + ", " + longitude;

                    // Open the modal with the static map
                    openMapModal(latitude, longitude);
                }

                // Event listener to call getCurrentLocation() when input is focused
                document.getElementById("locationInput").addEventListener("focus", getCurrentLocation);
            </script>
            <script>
                function validateName() {
                    var nameInput = document.getElementById("name");
                    var nameError = document.getElementById("nameError");
                    var name = nameInput.value.trim();

                    if (name === "") {
                        nameError.textContent = "Name is required";
                        return false;
                    } else {
                        nameError.textContent = "";
                        return true;
                    }
                }

                function validateCity() {
                    var cityInput = document.getElementById("city");
                    var cityError = document.getElementById("cityError");
                    var city = cityInput.value.trim();

                    if (city === "") {
                        cityError.textContent = "City is required";
                        return false;
                    } else {
                        cityError.textContent = "";
                        return true;
                    }
                }

                function validateEmail() {
                    var emailInput = document.getElementById("email");
                    var emailError = document.getElementById("emailError");
                    var email = emailInput.value.trim();

                    if (email === "") {
                        emailError.textContent = "Email is required";
                        return false;
                    } else if (!isValidEmail(email)) {
                        emailError.textContent = "Invalid email format";
                        return false;
                    } else {
                        emailError.textContent = "";
                        return true;
                    }
                }

                function isValidEmail(email) {
                    // You can implement more sophisticated email validation logic here
                    return /\S+@\S+\.\S+/.test(email);
                }

                function validateService() {
                    var serviceInput = document.getElementById("service");
                    var serviceError = document.getElementById("serviceError");
                    var service = serviceInput.value;

                    if (service === "0") {
                        serviceError.textContent = "Please select a service";
                        return false;
                    } else {
                        serviceError.textContent = "";
                        return true;
                    }
                }

                function validateNumberOfPeople() {
                    var numberOfPeopleSelect = document.getElementById("numberOfPeople");
                    var numberOfPeopleError = document.getElementById("numberOfPeopleError");
                    var selectedNumberOfPeople = numberOfPeopleSelect.value;

                    if (selectedNumberOfPeople === "0") {
                        numberOfPeopleError.textContent = "Please select the number of people";
                        return false;
                    } else {
                        numberOfPeopleError.textContent = "";
                        return true;
                    }
                }

                function validateType() {
                    var typeSelect = document.getElementById("type");
                    var typeError = document.getElementById("typeError");
                    var selectedType = typeSelect.value;

                    if (selectedType === "0") {
                        typeError.textContent = "Please select a type";
                        return false;
                    } else {
                        typeError.textContent = "";
                        return true;
                    }
                }

                function validateContact() {
                    var contactInput = document.getElementById("contact");
                    var contactError = document.getElementById("contactError");
                    var contact = contactInput.value.trim();

                    var contactRegex = /^\d{10}$/; // Regular expression for 10-digit phone number

                    if (contact === "") {
                        contactError.textContent = "Contact number is required";
                        return false;
                    } else if (!contactRegex.test(contact)) {
                        contactError.textContent = "Invalid contact number format";
                        return false;
                    } else {
                        contactError.textContent = "";
                        return true;
                    }
                }

                function validateDate() {
                    var dobInput = document.getElementById("dob");
                    var dobError = document.getElementById("dobError");
                    var selectedDateStr = dobInput.value; // Get the date string from the input value

                    if (!selectedDateStr) {
                        dobError.textContent = "Please select a date";
                        return false;
                    }

                    // Parse the date string to a Date object
                    var selectedDate = new Date(selectedDateStr);

                    // Get today's date
                    var today = new Date();

                    // Set the minimum date to 4 days in the future
                    var minDate = new Date();
                    minDate.setDate(today.getDate() + 4);

                    if (selectedDate < minDate) {
                        dobError.textContent = "Date must be at least 4 days in the future";
                        return false;
                    }

                    dobError.textContent = "";
                    return true;
                }

                function validateForm() {

                    if (!validateName()) {
                        return false;
                    } else if (!validateCity()) {
                        return false;
                    } else if (!validateEmail()) {
                        return false;
                    } else if (!validateService()) {
                        return false;
                    } else if (!validateNumberOfPeople()) {
                        return false;
                    } else if (!validateType()) {
                        return false;
                    } else if (!validateContact()) {
                        return false;
                    } else if (!validateDate()) {
                        return false;
                    } else {
                        return true;
                    }

                }
            </script>
            <script>
                window.addEventListener('scroll', function() {
                    var navbar = document.getElementById('navbar');
                    if (window.scrollY > 0) {
                        navbar.classList.remove('py-4');
                    } else {
                        navbar.classList.add('py-4');
                    }
                });
            </script>
</body>

</html>