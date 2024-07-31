<?php
session_start();
  include 'assets/components/header.php';
?>
  <script>
    // Function to display the popup message
    function showPopup(message) {
      const popup = document.createElement("div");
      popup.className = "popup";
      popup.textContent = message;
      document.body.appendChild(popup);

      // Automatically close the popup after 3 seconds
      setTimeout(function () {
        popup.remove();
      }, 3000);
    }
  </script>
  <style>
    .profile-img {
    width: 30px;
    margin-right: 12px;
    display: inline-block;
    position: relative;
    top: 5px;
  }
    @media (min-width: 992px) {
      .prof {
        display: block;
      }
      .blo {
        display: none; 
      }
      .logreg {
        display: none;
      }
    }
    @media (max-width: 992px) {
      .prof {
        position: relative;
        left: 20vw;
      }
    }
    @media (max-width: 767px) {
      .prof {
        position: relative;
        left: 8vw;
      }
    }
    @media (max-width: 420px) {
      .prof {
        position: relative;
        left: 6vw;
      }
    }
    @media (max-width: 399px) {
      .prof {
        position: relative;
        left: 4vw;
      }
    }
    @media (max-width: 385px) {
      .prof {
        position: relative;
        left: 1vw;
      }
      .profile-img {
        margin-right: 0px;
      }
      /* .header-bottom > .container {
        justify-content:unset;
        gap: 5px;
      } */
    }
    @media (max-width: 373px) {
      .header-bottom > .container {
        justify-content:unset;
        gap: 10px;
      }
      .prof {
        position: relative;
        left: 1vw;
      }
    }
    @media (max-width: 353px) {
      .container {
        padding-inline: 15px;
      }
      .header-bottom > .container {
        justify-content:unset;
        gap: 8px;
      }
      .prof {
        position: relative;
        left: 1vw;
      }
    }
    @media (max-width: 330px) {
      .container {
        padding-inline: 8px;
      }
    }
  </style>
</head>

<body id="top">
  <!-- HEADER-->
  <header class="header">
    <div class="header-bottom" data-header>
      <div class="container">
      <a href="#" class="logo"><img src="assets/images/pixel-hand-holding-blood-removebg-preview.png" alt="" class="profile-img">BloodHub</a>
        <?php
              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
              {
                if(isset($_SESSION['imageSrc']) && $_SESSION['imageSrc'] != "data:image/jpeg;base64,"){
                  // echo $_SESSION['imageSrc'];
                echo '<li>
                        <a href="dashboard.php">
                            <img src="' . $_SESSION['imageSrc'] . '" class="prof blo" alt="error" width="40px" style="z-index: 100; border-radius: 50%;">
                        </a>
                      </li>';
                // echo '<li>
                        // <a href="dashboard.php"><img src="'.$_SESSION['imageSrc'].'" class="prof blo" alt="error" width="40px" style="z-index: 100;border-radius: 50%;"></a>
                      // </li>';
                } else {
                  echo '<li>
                        <a href="dashboard.php"><img src="assets/images/profile_3135715.png" class="prof blo" alt="error" width="40px" style="z-index: 100;border-radius: 50%;"></a>
                      </li>';
                }
              } 
              // else
              // {
              //   echo '<a href="register.php" class="btn">Login / Register</a>';
              // }
            ?>
    
    <nav class="navbar container" data-navbar>
          <ul class="navbar-list">
            <li>
              <a href="index.php" class="navbar-link" data-nav-link>Home</a>
            </li>
            <?php
              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
              {
                echo '
                <li>
                  <a href="find_donor.php" class="navbar-link" data-nav-link>Recent donors</a>
                </li>
                <li>
                  <a href="donate.php" class="navbar-link" data-nav-link>Donate Blood</a>
                </li>';
              }
            ?>
            <li>
              <a href="about.php" class="navbar-link" data-nav-link>About Us</a>
            </li>
            <li>
              <a href="blog.php" class="navbar-link" data-nav-link>Blog</a>
            </li>
            <li>
              <a href="contact.php" class="navbar-link" data-nav-link>Contact</a>
            </li>
            <?php
              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
              {
                if(isset($_SESSION['imageSrc']) && $_SESSION['imageSrc'] != "data:image/jpeg;base64,"){
                  // echo $_SESSION['imageSrc'];
                echo '<li>
                        <a href="dashboard.php">
                            <img src="' . $_SESSION['imageSrc'] . '" class="prof" alt="error" width="40px" style="z-index: 100; border-radius: 50%;">
                        </a>
                      </li>';
                // echo '<li>
                        // <a href="dashboard.php"><img src="'.$_SESSION['imageSrc'].'" class="prof" alt="error" width="40px" style="z-index: 100;border-radius: 50%;"></a>
                      // </li>';
                } else {
                  echo '<li>
                          <a href="dashboard.php"><img src="assets/images/profile_3135715.png" class="prof"   alt="error" width="40px" style="z-index: 100;border-radius: 50%;"></a>
                        </li>';
                }
              }
              else
              {
                echo '<a href="register.php" class="btn">Login / Register</a>
                      <li>
                        <a href="login.php" class="navbar-link logreg" data-nav-link>Login / Register</a>
                      </li>';
              }
            ?>
             
          </ul>
        </nav>
        <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
          <ion-icon name="menu-sharp" aria-hidden="true" class="menu-icon"></ion-icon>
          <ion-icon name="close-sharp" aria-hidden="true" class="close-icon"></ion-icon>
        </button>
      </div>
    </div>
  </header>
  <main>
    <article>
      <!--HERO-->
      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            <p class="section-subtitle">Welcome To BloodHub</p>
            <h1 class="h1 hero-title">Connecting The Donors...</h1>
            <p class="hero-text">
              Our mission is to bridge the gap between blood donors and recipients, providing a seamless and efficient experience for both parties.
              You can trust us,
              we provide the best service...
            </p>
            <form action="send_email.php" class="hero-form" method="POST">
              <input type="email" name="email_address" aria-label="email" placeholder="Your Email Address..." required
                class="email-field">
              <button type="submit" class="btn">Get Response Back</button>
            </form>
          </div>
          <figure class="hero-banner">
            <img src="./assets/images/pngtree-photo-men-doctor-physician-chest-smiling-png-image_10132895.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>
        </div>
      </section>
      <?php
        if(isset($_SESSION['last_page']))
        echo $_SESSION['last_page'];
      ?>

      <!--SERVICE-->
      <!--ABOUT-->
      <section class="section about" id="about" aria-label="about">
        <div class="container">
          <figure class="about-banner">
            <img src="./assets/images/about-banner.png" width="470" height="538" loading="lazy" alt="about banner"
              class="w-100">
          </figure>
          <div class="about-content">
            <p class="section-subtitle">About Us</p>
            <h2 class="h2 section-title">We Care For Your Loved Ones</h2>
            <img src="assets/images/love_icon.png" alt="" width="60px">
            <p class="section-text section-text-1">
              At BloodHub, we are passionate about connecting blood donors with recipients and bridging the gap in the healthcare industry.
               Our mission is to provide a seamless and efficient experience for both donors and recipients, ensuring timely access to life-saving blood transfusions.
            </p>
            <p class="section-text">
              We strive to create a community that fosters empathy, support, and solidarity among individuals who are committed to making a difference.
               Whether you're a potential donor or someone in need of blood, we are here to assist you every step of the way.
            </p>
            <a href="about.php" class="btn">Read more About Us</a>
          </div>
        </div>
      </section>

      <!--services-->

      <section class="section doctor" aria-label="doctor">
        <div class="container">
          <p class="section-subtitle text-center">Emergency !</p>
          <h2 class="h2 section-title text-center">Our other services</h2>
          <ul class="has-scrollbar">
            <li class="scrollbar-item">
              <div class="doctor-card">
                <div class="card-banner img-holder" style="--width: 460; --height: 500;">
                  <img src="./assets/images/doctor-1.png" width="460" height="500" loading="lazy" alt="PREBOOK"
                    class="img-cover">
                </div>
                <h3 class="h3">
                  <a href="#" class="card-title">Pre Book Blood</a>
                </h3>
                <p class="card-subtitle">Book Blood For An upcoming Date</p>
                <ul class="card-social-list">
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="scrollbar-item">
              <div class="doctor-card">
                <div class="card-banner img-holder" style="--width: 460; --height: 500;">
                  <img src="./assets/images/doctor-2.png" width="460" height="500" loading="lazy" alt="AMBULANCE"
                    class="img-cover">
                </div>
                <h3 class="h3">
                  <a href="#" class="card-title">Call Ambulance</a>
                </h3>
                <p class="card-subtitle">Get our ambulance service</p>
                <ul class="card-social-list">
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="scrollbar-item">
              <div class="doctor-card">

                <div class="card-banner img-holder" style="--width: 460; --height: 500;">
                  <img src="./assets/images/doctor-3.png" width="460" height="500" loading="lazy" alt="WHY DONATE ?"
                    class="img-cover">
                </div>
                <h3 class="h3">
                  <a href="#" class="card-title">Why Donate ?</a>
                </h3>
                <p class="card-subtitle">Why donate blood ?</p>
                <ul class="card-social-list">
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="scrollbar-item">
              <div class="doctor-card">
                <div class="card-banner img-holder" style="--width: 460; --height: 500;">
                  <img src="./assets/images/doctor-4.png" width="460" height="500" loading="lazy" alt="CAN YOU DONATE"
                    class="img-cover">
                </div>
                <h3 class="h3">
                  <a href="canyoudonate.html" class="card-title">Can You Donate ?</a>
                </h3>
                <p class="card-subtitle">Check that can you donate blood</p>
                <ul class="card-social-list">
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </section>


      <!--CTA-->
      <section class="section cta" aria-label="cta">
        <div class="container">
          <figure class="cta-banner">
            <img src="./assets/images/cta-banner3.png" width="1056" height="1076" loading="lazy" alt="cta banner"
              class="w-100">
          </figure>
          <div class="cta-content">
            <p class="section-subtitle">Give Blood Directly To Us</p>
            <h2 class="h2 section-title">We Are open And Welcoming Donors</h2>
            <a href="donate.php" class="btn">Book schedule</a>
          </div>
        </div>
      </section>

      <!--BLOG-->
      <section class="section blog" id="blog" aria-label="blog">
        <div class="container">
          <p class="section-subtitle text-center">Our Blog</p>
          <h2 class="h2 section-title text-center">Latest Blog & News</h2>
          <ul class="blog-list">
            <li>
            <div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/the-life-saving-benefits-of-donating-blood.png" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2022-03-24">24th March 2022</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="blogContent.php" class="card-title">The Lifesaving Impact of Blood Donation</a>
                  </h3>
                  <p class="card-text">
                    Discover how a single blood donation can save multiple lives and understand the science behind it. Learn about the profound impact your donation has on patients in critical need of blood.
                  </p>
                  <a href="blogContent.php" class="card-link">Read More</a>
                </div>
              </div>
            </li>
            <li>
            <div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/myths-and-taboos-of-blood-donation.jpg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2022-03-24">24th March 2022</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="blogContent1.php" class="card-title">Top 10 Myths About Blood Donation Debunked</a>
                  </h3>
                  <p class="card-text">
                    Uncover the truth behind common misconceptions about blood donation. This post debunks myths and provides factual information to encourage more people to donate blood confidently.
                  </p>
                  <a href="blogContent1.php" class="card-link">Read More</a>
                </div>
              </div>
            </li>
            <li>
            <div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/upcoming_blood_drive.jpeg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2022-03-24">24th March 2022</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">Upcoming Blood Drives: How to Get Involved</a>
                  </h3>
                  <p class="card-text">
                    Join us at our next blood drive event in your community. Get details on upcoming events, learn how to register, and see what you can expect at the blood drive, including past highlights.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </article>
  </main>


  <!--FOOTER-->
  <?php
    include 'assets/components/footer.php';
  ?>

<?php
ob_start();
// Check if the form is submitted
if(isset($_SESSION['status']) && isset($_SESSION['last_page']) && strpos($_SESSION['last_page'], 'index.php') !== false)
{
  $mssg=$_SESSION['status'];
  if ($mssg != "") {
      // echo $mssg;
      // Check if the email is inserted successfully
        // Email added successfully, show the popup message
        echo '<script>showPopup("Email added successfully!");</script>';
        // else {
        //   // Unable to add email, show the popup message
        //   echo '<script>showPopup("Error: Unable to add email. Please try again later.");</script>';
      // }
      // Close the statement and connection
      // $stmt->close();
      // $conn->close();
      unset($_SESSION['status']);
      unset($_SESSION['last_page']);
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
      session_destroy();
  }
  else {
    // Invalid email address, show the popup message
    echo '<script>showPopup("Error: Invalid email address. Please enter a valid email.");</script>';
  }
}
ob_end_flush();
?>

  <!--BACK TO TOP-->
  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up" aria-hidden="true"></ion-icon>
  </a>

  <!--custom js link-->
  <script src="./assets/js/script.js" defer></script>
  <!--ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
