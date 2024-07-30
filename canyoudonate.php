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
          <img src="assets/images/pixel-hand-holding-blood-removebg-preview.png" alt="" width="80px">
            <p class="section-subtitle">Clear your doubts now...</p>
            <h1 class="h1 hero-title">Can you  donate blood ?</h1>
            <p class="hero-text">
                Giving blood saves lives. The blood you give is a lifeline in an emergency
                and for people who need longterm treatments. Donating blood is a selfless act that can save lives and make a positive impact on your community.
                However, not everyone is eligible to donate blood. To ensure the safety of both donors and recipients, specific eligibility criteria must be met.<br><br>
                Remember, even if you cannot donate blood, there are other ways you can support blood donation efforts, such as encouraging eligible friends and
                family members to donate or volunteering at blood drives and donation centers.
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
              <img src="./assets/images/canyou.png" width="587" height="839" alt="hero banner" class="w-100">             
            </p>
          </div>
          <figure class="hero-banner">
            <h1 class="h1 hero-title">Who can give blood</h1>
            <p class="section-subtitle">Find out if you are able give blood for the first time.</p>
            <p style="font-size: larger;"><h1>To donate blood you will need to :</h1><br><br>
            <ul>
                <li>• Be generally fit and well</li><br>
                <li>• Be aged between 17 and 65</li><br>
                <li>• Weigh between 7 stone 12 lbs (50kg) and 25 stone (158kg)</li><br>
                <li>• Have suitable veins (we will check these before you donate)</li><br>
                <li>• Meet all donor eligibility criteria (we will check this before you donate) </li>
            </ul></p>
          </figure>
        </div>
      </section>
    <!--Hero THIRD-->
    <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
          <img src="assets/images/pixel-hand-holding-blood-removebg-preview.png" alt="" width="80px">
            <p class="section-subtitle">BloodHub</p>
            <h1 class="h1 hero-title">Who can't donate blood</h1>
            <p class="hero-text">
                <h1>You can't donate blood if you:</h1>
                <ul>
                    <li>• Are a hepatitis B carrier</li><br>
                    <li>• Are a hepatitis C carrier </li><br>   
                    <li>• Have some heart conditions</li><br>
                    <li>• Have tested positive for HIV </li><br>
                    <li>• Have had an organ transplant</li><br>
                    <li>• Have had most types of cancer </li><br>                               
                    <li>• Have received blood, platelets, plasma or any other blood products after 1 January 1980</li><br>
                    <li>• Have injected non-prescribed drugs including body-building and injectable tanning  &nbsp;&nbsp;agents. You may be
                        able to give if a doctor prescribed the drugs</li><br>
                </ul>
                <p>• There are other medical conditions that may mean you can't donate...</p>
            </p>
          </div>
          <figure class="hero-banner">
            <img src="./assets/images/canyou2.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>
        </div>
      </section>
      <!--Hero THIRD-->
      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            
            <p class="hero-text">
              <img src="./assets/images/canyou3.png" width="587" height="839" alt="hero banner" class="w-100">             
            </p>
          </div>
          <figure class="hero-banner">
            <h1 class="h1 hero-title">Who might have to wait to donate blood !</h1>
            <p style="font-size: larger;">
                <p>There are some health, travel and lifestyle reasons that may stop you from being able to donate blood on
                    a
                    temporary basis.<br>
                    If you are not sure you can donate, please contact us to discuss your situation.</p>
                <ul>
                    <li>
                        <h1>Sexual activity that means you may have to wait</h1>
                        <h4>You may have to wait up to three months before you can donate if: </h4>
                        <ul>
                            <li>• You have had anal sex with a new partner in the last three months</li>
                            <li>• You finished taking Pre-Exposure Prophylaxis (PrEP) or Post-Exposure &nbsp;&nbsp;&nbsp;Prophylaxis (PEP) in
                                the last threemonths</li>
                        </ul>
                        <h4>In the last three months you have had sexual contact with a partner who is:</h4>
                        <ul>
                            <li>• HIV positive</li>
                            <li>• HTLV positive</li>
                            <li>• A hepatitis B carrier</li>
                            <li>• A hepatitis C carrier</li>
                            <li>• Syphilis positive</li>
                            <li>• Has received money or drugs for sex</li>
                            <li>• Has injected non-prescribed drugs including body-building and injectable &nbsp;&nbsp;tanning agents</li>
                        </ul>
                    </li>
                    <li>
                        <h3>Other reasons why you might need to wait </h3>
                        <h4>You will need to wait before you can donate if you:</h4>
                        <ul>
                            <li>• Feel ill</li>
                            <li>• Are pregnant or had a baby in the last 6 months</li>
                            <li>• Have recently got a tattoo or piercing</li>
                            <li>• Are undergoing assessment or investigations for a medical condition. For &nbsp;&nbsp;example, heart
                                condition</li>
                        </ul>
                    </li>
                </ul>
            </p>
          </figure>
        </div>
      </section>
      <!--Hero FOURTH-->
      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
          <img src="assets/images/pixel-hand-holding-blood-removebg-preview.png" alt="" width="80px"> 
            <p class="section-subtitle">BloodHub</p>
            <h1 class="h1 hero-title">Female donors under 20 years</h1>
            <p class="section-subtitle">Check how much blood you have</p>
            <p class="hero-text">
                If you are a woman under 20 and you weigh under 10st 3lb (65kg) or are under 5' 6" (168cm) tall you will
                need to check you have enough blood to donate safely.
            </p>
          </div>
          <figure class="hero-banner">
            <img src="./assets/images/female.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>
        </div>
        <hr style="margin-left: 3cm; margin-right: 3cm;">
      </section>
    <!--HERO FIFTH-->
    <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            
            <p class="hero-text">
              <img src="./assets/images/mf.png" width="587" height="839" alt="hero banner" class="w-100">             
            </p>
          </div>
          <figure class="hero-banner">
            <h1 class="h1 hero-title">How often can I give blood?</h1>
            <p class="section-subtitle">There is difference !</p>
            <p style="font-size: larger;"><h1>Men can give blood every 12 weeks and women can give blood every 16 weeks.
                This is because men generally have higher iron levels than women. </h1><br><br>
          </figure>
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