
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all);
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener));
      } else {
        selectEl.addEventListener(type, listener);
      }
    } else {
      console.error('Element not found:', el);
    }
  };
  
  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200;
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink || !navbarlink.hash) return; // Null check
      let section = select(navbarlink.hash);
      if (!section) return;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active');
      } else {
        navbarlink.classList.remove('active');
      }
    });
  };
  
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  let selectTopbar = select('#topbar')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.add('topbar-scrolled')
        }
      } else {
        selectHeader.classList.remove('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.remove('topbar-scrolled')
        }
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Menu isotope and filter
   */
  window.addEventListener('load', () => {
    let menuContainer = select('.menu-container');
    if (menuContainer) {
      let menuIsotope = new Isotope(menuContainer, {
        itemSelector: '.menu-item',
        layoutMode: 'fitRows'
      });

      let menuFilters = select('#menu-flters li', true);

      on('click', '#menu-flters li', function(e) {
        e.preventDefault();
        menuFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        menuIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        menuIsotope.on('arrangeComplete', function() {
          AOS.refresh()
        });
      }, true);
    }

  });

  /**
   * Initiate glightbox 
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Events slider
   */
  new Swiper('.events-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 3,
        spaceBetween: 20
      }
    }
  });

  /**
   * Initiate gallery lightbox 
   */
  const galleryLightbox = GLightbox({
    selector: '.gallery-lightbox'
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

})()

function planclose(){
  document.getElementById("plan").style.display = "none";
}

function planopen(){
  document.getElementById("plan").style.display = "block";
}

function nameValidate() {
  var name = document.getElementById("name").value.trim(); // Trim to remove leading and trailing spaces

  // Replace multiple spaces with a single space
  name = name.replace(/\s+/g, ' ');

  // Check if name contains any special characters
  if (/[^a-zA-Z\s]/.test(name)) {
    document.getElementById("name-tag").style.display = "block";
    document.getElementById("name-tag").innerHTML = "Special characters are not allowed.";
    return false;
  }

  // Check if name contains any digits
  if (/\d/.test(name)) {
    document.getElementById("name-tag").style.display = "block";
    document.getElementById("name-tag").innerHTML = "Numbers are not allowed.";
    return false;
  }

  // Check if name is empty
  if (name === "") {
    document.getElementById("name-tag").style.display = "block";
    document.getElementById("name-tag").innerHTML = "Name cannot be empty.";
    return false;
  }

  // Check if name contains less than two letters
  if (!/[a-zA-Z]{2,}/.test(name)) {
    document.getElementById("name-tag").style.display = "block";
    document.getElementById("name-tag").innerHTML = "Enter a valid Name containing more than one letter.";
    return false;
  }

  // If all validations pass, hide error message and return true
  document.getElementById("name-tag").style.display = "none";

  // Set the value of the input field to the cleaned up name
  document.getElementById("name").value = name;

  return true;
}


function emailValidate() {
  var email = document.getElementById("email").value;
  // Regular expression for email validation
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  // Regular expression for username validation
  var usernameRegex = /^[a-zA-Z0-9.]+$/;
  // Regular expression for domain validation
  var domainRegex = /^[a-zA-Z.]+\.[a-zA-Z]+$/;

  if (!emailRegex.test(email) || email === "") {
    document.getElementById("email-tag").style.display = "block";
    document.getElementById("email-tag").innerHTML = "Please enter a valid email address";
    return false;
  }

  var username = email.split('@')[0];
  var domain = email.split('@')[1];

  if (!usernameRegex.test(username)) {
    document.getElementById("email-tag").style.display = "block";
    document.getElementById("email-tag").innerHTML = "Username can only contain alphanumeric characters";
    return false;
  }
  
  // Check if username consists only of numbers
  if (/^\d+$/.test(username)) {
    document.getElementById("email-tag").style.display = "block";
    document.getElementById("email-tag").innerHTML = "Username can't be all numbers";
    return false;
  }

  if (!domainRegex.test(domain)) {
    document.getElementById("email-tag").style.display = "block";
    document.getElementById("email-tag").innerHTML = "Domain should have at least one alphabet";
    return false;
  }

  document.getElementById("email-tag").style.display = "none";
  return true;
}


function siginemailValidate() {
  var email = document.getElementById("email-signin").value;
  // Regular expression for email validation
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  // Regular expression for username validation
  var usernameRegex = /^[a-zA-Z0-9.]+$/;

  if (!emailRegex.test(email) || email === "") {
    document.getElementById("email-signin-tag").style.display = "block";
    document.getElementById("email-signin-tag").innerHTML = "Enter a valid email address";
    return false;
  }

  var username = email.split('@')[0];
  if (!usernameRegex.test(username)) {
    document.getElementById("email-signin-tag").style.display = "block";
    document.getElementById("email-signin-tag").innerHTML = "Username can only contain alphanumeric characters";
    return false;
  }
  
  // Check if username consists only of numbers
  if (/^\d+$/.test(username)) {
    document.getElementById("email-signin-tag").style.display = "block";
    document.getElementById("email-signin-tag").innerHTML = "Username can't be all numbers";
    return false;
  }

  // Check if the domain contains any numbers
  var domain = email.split('@')[1];
  if (/\d/.test(domain)) {
    document.getElementById("email-signin-tag").style.display = "block";
    document.getElementById("email-signin-tag").innerHTML = "Domain can't contain numbers";
    return false;
  }

  document.getElementById("email-signin-tag").style.display = "none";
  return true;
}



function phoneValidate(){
  var phone = document.getElementById("phone").value;
  // Regular expression for phone number validation (10 digits, starts with 6, 7, 8, or 9)
  var phoneRegex = /^[6-9]\d{9}$/;

  if (!phoneRegex.test(phone) || phone === "") {
    document.getElementById("phone-tag").style.display="block";
    document.getElementById("phone-tag").innerHTML = "Invalid phone number. Please enter 10 digits starting with 6, 7, 8, or 9.";
    return false;
  }
  document.getElementById("phone-tag").style.display="none";
  return true;
}


function dateValidate(){
  var date = document.getElementById("date").value; // Get the value from the Flatpickr date picker input

  var enteredDate = new Date(date);
  var currentDate = new Date();
  currentDate.setDate(currentDate.getDate() + 2);

  if (date === "") {
    document.getElementById("date-tag").style.display = "block";
    document.getElementById("date-tag").innerHTML = "Please select a date.";
    return false;
  }

  // Check if the entered date is in the past
  if (enteredDate < currentDate) {
    document.getElementById("date-tag").style.display = "block";
    document.getElementById("date-tag").innerHTML = "Please select a date that is at least 2 days in the future.";
    return false;
  }

  document.getElementById("date-tag").style.display = "none";
  return true;
}

function guestValidate(){
  var people = document.getElementById("people").value;
  if (people > 6 || people === "" || people < 1) {
    document.getElementById("guest-tag").style.display="block";
    document.getElementById("guest-tag").innerHTML = "Number of Guests should not be more than 6 per Reservation";
    return false;
  }
  document.getElementById("guest-tag").style.display="none";
  return true;
}

function seatValidate() {
  var seat = document.getElementById("seat").value;
  if (seat === "default") {
      document.getElementById("seat-tag").style.display = "block";
      document.getElementById("seat-tag").innerHTML = "Please select your preferred Seat";
      return false;
  } else {
      document.getElementById("seat-tag").style.display = "none";
      return true;
  }
}

function seats(){
  var people = document.getElementById("people").value;
  document.getElementById("seat1").hidden = true;
  document.getElementById("seat2").hidden = true;
  document.getElementById("seat3").hidden = true;
  document.getElementById("seat4").hidden = true;
  if( people == 1 || people == 2){
    document.getElementById("seat1").hidden = false;
    document.getElementById("seat3").hidden = false;
  }
  if( people == 3 || people == 4){
    document.getElementById("seat2").hidden = false;
    document.getElementById("seat3").hidden = false;
  }
  if( people == 5 || people == 6){
    document.getElementById("seat3").hidden = false;
    document.getElementById("seat4").hidden = false;
  }
}


function batchValidate(){ 
  if (!batchName || batchName.trim() === "") {
    document.getElementById("batch-tag").style.display="block";
    document.getElementById("batch-tag").innerHTML = "Please select your preferred Time";
    return false;
  }
  document.getElementById("batch-tag").style.display="none";
  return true;
}

function validatePassword() { 
  password=document.getElementById("password_reg").value;
  document.getElementById("pswd-tag").style.display="block";
  // Check for empty password
  if (!password.trim()) {
    document.getElementById("pswd-tag").innerHTML = "Please Enter password";
    return false;
  }
  // Minimum 8 characters
  if (password.length < 8) {
    document.getElementById("pswd-tag").innerHTML = "Minimum 8 characters";
      return false;
  }

  // At least one uppercase letter
  if (!/[A-Z]/.test(password)) {
    document.getElementById("pswd-tag").innerHTML = "At least one uppercase letter";
      return false;
  }

  // At least one lowercase letter
  if (!/[a-z]/.test(password)) {
    document.getElementById("pswd-tag").innerHTML = "At least one lowercase letter";
      return false;
  }

  // At least one digit
  if (!/\d/.test(password)) {
    document.getElementById("pswd-tag").innerHTML = "At least one digit";
      return false;
  }

  // At least one special character
  if (!/[!@#$%^&*]/.test(password)) {
    document.getElementById("pswd-tag").innerHTML = "At least one special character";
      return false;
  }

  // If all criteria are met
  document.getElementById("pswd-tag").style.display="none";
  return true;
}


function validation() { 
  var flag = 0;

  if (!nameValidate()){
    flag = 1;
  }
  if (!emailValidate()){
    flag = 1;
  }
  if (!phoneValidate()){
    flag = 1;
  }
  if (!dateValidate()){
    flag = 1;
  }
  if (!guestValidate()){
    flag = 1;
  } 
  if (!seatValidate()){
    flag = 1;
  } 
  if (!batchValidate()){
    flag = 1;
  } 
  if (!timeValidate()){
    flag = 1;
  }

  if (flag === 0) {
    return true;
  } else {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      timer: 1700,
      showConfirmButton: false,
      text: "Something went wrong!",
      footer: '<a href="#form1" style="color:red">Please Enter All details</a>'
    });
    return false;
  }
}

function timeValidate(){
  var selectedSeat = document.getElementById('selectedSeat').value;
  var errorDiv = document.getElementById('seat-tag');
  if (!selectedSeat) {
    errorDiv.innerText = "Please select a seat before submitting the form.";
    return false; 
  }
  errorDiv.innerText = "";
  return true;
}

function disableButtons() {
  var elements = document.querySelectorAll('.button-6');
  elements.forEach(function (id) {
    id.disabled = true;
  });

  return true;
}

var batchName=" ";
function lock(element,ele) {
  var elements = document.querySelectorAll(ele);
  if (element.style.borderColor == "red") {
    batchName=" "
    element.style.borderColor = "#18d26e";
    return true;
  } else { 
    elements.forEach(function (id) {
      id.style.borderColor = "#18d26e";
    });
  }
  element.style.borderColor = "red";
  batchName=element.value;
  document.getElementById('selectedSeat').value = batchName;
  document.getElementById('selectedOccation').value = batchName;
}

function add_qty(element, buttonAdd, buttonSub) {
  var inputElement = document.getElementById(element);
  var button1 = document.querySelector(buttonAdd);
  var button2 = document.querySelector(buttonSub);
  var value = parseInt(inputElement.value);

  if (value < 6) {
      button1.disabled = false;
      button1.style.color = 'green';
      inputElement.value = value + 1;
      value+=1;
  }

  if (value == 6) {
      button1.disabled = true;
      button1.style.color = '#cda45e'; 
  }
  button2.disabled = false;
  button2.style.color = 'red'; 
}

function remove_qty(element, buttonAdd, buttonSub) {
  var inputElement = document.getElementById(element);
  var button1 = document.querySelector(buttonAdd);
  var button2 = document.querySelector(buttonSub);
  var value = parseInt(inputElement.value);

  if (value > 0) {
      button2.disabled = false;
      button2.style.color = 'red';
      inputElement.value = value - 1;
      value-=1;
  }

  if (value == 0) {
      button2.disabled = true;
      button2.style.color = '#cda45e';
  }
  button1.disabled = false;
  button1.style.color = 'green';
}

//----------------------Billing----------------------------------//

  // Function to handle button click
  function addItem(name, price) {
    // Extract data from the clicked button
    var itemName = name;
    var itemprice = price;
    // Collect data
    var data = {
      itemName: itemName,
      itemprice: itemprice
    };
  
    // Log the data to the console for debugging
    console.log("Data to be sent:", data);
  
    // Send data to PHP script using AJAX
    $.ajax({
      type: "POST",
      url: "addbill.php", // Path to your PHP script
      data: data,
      success: function (response) {
        // Handle the response from the server (if needed)
        console.log("Server response:", response);
        
        // Display the updated bill after successfully adding the item
        displayBill();
      },
      error: function (error) {
        // Handle errors if the request fails
        console.log("Error:", error);
      }
    });
}
  ///////------------------Remove from cart---------------------////////////////
  function removeItem(name, price) {
    // Extract data from the clicked button
    var itemName = name;
    var itemprice = price;
  
    // Collect data
    var data = {
      itemName: itemName,
      itemprice: itemprice
    };
  
    // Log the data to the console for debugging
    console.log("Data to be sent:", data);
  
    // Send data to PHP script using AJAX
    $.ajax({
      type: "POST",
      url: "removebill.php", // Path to your PHP script
      data: data,
      success: function (response) {
        // Handle the response from the server (if needed)
        console.log("Server response:", response);
        displayBill();
      },
      error: function (error) {
        // Handle errors if the request fails
        console.log("Error:", error);
      }
    });
  }
  //////////-------------------Display-------------------------//////////////////
  displayBill();
  var totalBillAmount = 0;

function updateTotalBillAmount() {
    // Update the total bill amount in the designated <td>
    $("#bill-total").text("Total: " + totalBillAmount.toFixed(2));
    console.log("Total Bill Amount:", totalBillAmount);
    console.log("Updated total bill amount:", $("#bill-total").text());
}

function displayBill() {
    // Fetch data from the PHP script using AJAX
    $.ajax({
        type: "GET",
        url: "getbill.php",
        dataType: "json",
        success: function(data) {
            // Clear previous content in the table body
            $("#billDetailsTable").empty();

            // Reset total bill amount
            totalBillAmount = 0;

            // Display the data in the table body
            if (data.length > 0) {
                data.forEach(function(item, index) {
                    // Append data as a new row in the table body
                    $("#billDetailsTable").append(
                        "<tr>" +
                        "<td>" + (index + 1) + "</td>" +
                        "<td>" + item.Name + "</td>" +
                        "<td>" + item.Qty + "</td>" +
                        "<td>" + item.Price + "</td>" +
                        "<td>" + item.Cost + "</td>" +
                        "</tr>"
                    );

                    // Add the cost of the current item to the total
                    totalBillAmount += parseFloat(item.Cost);
                });

                // Call the function to update the total bill amount
                updateTotalBillAmount();
            } else {
                // Display a message if no data is available
                updateTotalBillAmount();
                $("#billDetailsTable").append("<tr><td style='width: 100%;'>No data available.</td></tr>");
            }
        },
        error: function(xhr, status, error) {
            console.log("Error fetching data:", status, error);
            // Display an error message in the table body
            $("#billDetailsTable").append("<tr><td>Error fetching data. Please try again.</td></tr>");
        }
    });
}

// Call the displayBill function to initiate the process
displayBill();


