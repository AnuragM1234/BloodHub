<?php
  session_start();
  include 'assets/components/header.php';
?>

  <style>
    hr {
      border: none;
      height: 1px;
      background-color: #c5c7c9;
      margin: 20px 0;
    }
      /* Define the column layout */
  .column {
    width: 33.33%;
    float: left;
    padding: 20px;
    box-sizing: border-box;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  .profile-img {
    width: 30px;
    margin-right: 12px;
    display: inline-block;
    position: relative;
    top: 5px;
  }
  /* Responsive layout */
  @media screen and (max-width: 1024px) {
    .column {
      width: 100%;
    }
  }

  /* Adjust font size for smaller screens */
  @media screen and (max-width: 768px) {
    h1 {
      font-size: 22px;
    }
    p {
      font-size: 14px;
    }
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

<body>
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
  <!--HERO-->
  <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            <p class="section-subtitle">Welcome To BloodHub</p>
            <h1 class="h1 hero-title">Connecting The Donors...</h1>
            <p class="hero-text">
              Welcome to BloodHub, a dedicated community-driven platform that aims to connect blood donors and recipients seamlessly.
              Our mission is to bridge the gap in the healthcare industry by making blood donation more accessible and efficient by avoiding the intermediaries,
              ultimately saving lives and fostering solidarity within the community.
            </p><br><br><br>
          </div>
          <figure class="hero-banner">
            <img src="./assets/images/about.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>
        </div>
      </section>
    <!--HERO SECOND-->
    <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            
            <p class="hero-text">
              <img src="./assets/images/blood_don.cms" width="587" height="839" alt="hero banner" class="w-100">             
            </p>
          </div>
          <figure class="hero-banner">
            <h1 class="h1 hero-title">Who We Are</h1>
            <p style="font-size: larger;">BloodHub is started by the brainchild of a passionate group of engineering students of BTech college - National Institute of Technology Karnataka.
              United by a common purpose, we came together to address the pressing need for a streamlined process of blood donation so that we can use our knowledge in the field of technology
            and give a small contibution to the society from our side.</p>
          </figure>
        </div>
      </section>
    <!--Hero THIRD-->
    <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            <img src="assets/images/pixel-hand-holding-blood-removebg-preview.png" alt="ICON" width="70" height="70"> 
            <p class="section-subtitle">BloodHub</p>
            <h1 class="h1 hero-title">Our Vision</h1>
            <p class="hero-text">
              At BloodHub, our vision is to create a centralized hub that connects blood donors and recipients in need. We envision a future where finding a suitable blood donor
              is no longer a time-consuming and challenging task. Instead, it becomes a simple, efficient, and accessible process that can save lives during critical moments. Also we tried
              our best in creating a user-friendly interface for this site so normal users can navigate and use our services easly.
            </p>
          </div>
          <figure class="hero-banner">
            <img src="./assets/images/about5.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>
        </div>
      </section>
      <!--Hero THIRD-->
      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            
            <p class="hero-text">
              <img src="./assets/images/how_we_work.webp" width="587" height="839" alt="hero banner" class="w-100">             
            </p>
          </div>
          <figure class="hero-banner">
            <h1 class="h1 hero-title">How We Work</h1>
            <p style="font-size: larger;">The process is straightforward: donors register their details with us, providing essential information about their blood type,
              contact details, and location. By creating a comprehensive database of donors, we can quickly match them with recipients searching for compatible donors.<br><br>
              For recipients seeking blood, our user-friendly platform allows them to enter their requirements and search for potential matches within the donor database.
              The matching process is efficient and designed to connect recipients with suitable donors promptly.<br>
            Also we provide a simple response back utility which users can enter their email address and we will directly respond from our side. Also users can pre-book blood for 
          an upcoming date and we will arrange blood directly and reach you. We also have an emergency ambulance service you can call any time.</p>
          </figure>
        </div>
      </section>
      <!--Hero FOURTH-->
      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            <img src="assets/images/pixel-hand-holding-blood-removebg-preview.png" alt="ICON" width="70" height="70"> 
            <p class="section-subtitle">BloodHub</p>
            <h1 class="h1 hero-title">24x7 Support and Service</h1>
            <p class="hero-text">
            We take pride in offering round-the-clock service and support and service including the ambulance services. Our team is dedicated to providing prompt assistance and addressing any concerns or queries you may have.
            Your well-being and satisfaction are our top priorities.
            </p>
          </div>
          <figure class="hero-banner">
            <img src="./assets/images/about2.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>
        </div>
        <hr style="margin-left: 3cm; margin-right: 3cm;">
        
        <div class="row" style="overflow: hidden; padding: 1cm;">
          <!-- First Column -->
          <div class="column">
            <h1 style="color: var(--oxford-blue-1); font-size: var(--fs-1);">Join the BloodHub Community</h1>
            <br>
            <p style="font-size: 17px;">
              We invite you to join our growing community of blood donors and recipients. By becoming a part of BloodHub,
              you contribute to a noble cause and play a vital role in saving lives. Your selfless act of blood donation can make a significant impact and bring hope to those in need.
            </p>
          </div>
        
          <!-- Second Column -->
          <div class="column">
            <h1 style="color: var(--oxford-blue-1); font-size: var(--fs-1);">Let's Create a Better Tomorrow</h1>
            <br>
            <p style="font-size: 17px;">
              At BloodHub, we firmly believe that when individuals come together with a common purpose, remarkable things can happen. With your support and participation,
              we can build a future where blood donation is readily available to those who need it the most. Together, we can create a better tomorrow and foster a community of caring and compassion.
            </p>
          </div>
        
          <!-- Third Column -->
          <div class="column">
            <h1 style="color: var(--oxford-blue-1); font-size: var(--fs-1);">Raise a fund if you can</h1>
            <br>
            <p style="font-size: 17px;">
              Ours is a service group of  dedicated persons without any intention of making profits. But inorder to run and maintain our services we have expenses, currently we are running
              our services with the contribution of our own team and some kind personalities and sponsors. You can donate us a fund and join us to run our services seamlessly.
              You can call or message at <a href="tel:+917052101786" class="footer-link" style="display: inline; color: #216aca;" onmouseover="this.style.color='#03d9ff'" onmouseout="this.style.color='#216aca'">+91-7558-951-351 to donate fund</a>.
            </p>
          </div>
        </div>
        
      </section>


  <!--Footer-->
  <?php
    include 'assets/components/footer.php';
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