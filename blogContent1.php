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
  .hero-text {
    /* color: black; */
    color: hsl(218, 70%, 18%);
  }

	.list-item { 
		list-style:disc;
		margin-bottom: 10px;
		color:hsl(218, 70%, 38%);;
	}

	.hero-text2 {
		line-height: 1.45;
  margin-block-end: 40px;
		font-size: var(--fs-4);
		color:hsl(218, 70%, 18%);
	}

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
	.hero-banner {
		margin-bottom: 35px;
	}
  .author {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    /* justify-content: center; */
    /* margin: auto; */
    justify-content: space-between;
		margin-bottom: 50px;
  }
  .authorName {
    display: flex;
    flex-direction: column;
    /* justify-content: center; */
  }
  .dateBadge {
    background-color: var(--royal-blue-light);
    color: var(--white);
    /* position: absolute; */
    /* bottom: 25px; */
    /* left: 25px; */
    width: 180px;
    display: flex;
    gap: 5px;
    padding: 10px 15px;
    border-radius: var(--radius-6);
    /* margin-left: 40px; */
  }
  .profile-img {
    width: 30px;
    margin-right: 12px;
    display: inline-block;
    position: relative;
    top: 5px;
  }
  /* Responsive layout */
	@media screen and (min-width: 768px) {
    .hero .container {
			align-items: normal;
		}
  }
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
            <!-- <p class="section-subtitle">Welcome To Red Stream</p> -->
            <h1 class="h1 hero-title">Top 10 Myths About Blood Donation Debunked</h1>
            <div class="author">
                <div class="authorName">
                    <img src="assets/images/profile_3135715.png" alt="" width="45px">
                    <p class="section-subtitle">Dr. Delusa Doms</p>
                </div>
                <div class="dateBadge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                </div>
            </div>
            <p class="hero-text">
            Blood donation is a simple yet vital act that can save lives. However, numerous myths and misconceptions often deter people from donating blood. In this blog, we'll debunk the top 10 myths about blood donation and provide you with accurate information to help you make an informed decision.
            </p><br>
            <h3 class="hero-text2">Myth 1: Donating Blood is Painful</h3>
            <p class="hero-text">Many people fear that donating blood is a painful process. In reality, the discomfort is minimal. The initial needle prick may cause a brief sting, but the process is generally painless. Most donors describe the experience as similar to a quick pinch.</p>

            <h3 class="hero-text2">Myth 2: I Don't Have Enough Blood to Donate</h3>
            <p class="hero-text">The human body contains about 10-12 pints of blood. During a donation, only about one pint is taken, which is quickly replenished by the body. Healthy adults can safely donate blood without affecting their health.</p>
						<figure class="hero-banner">
							<img src="assets/images/myth_img.jpg" class="w-100" alt="">
						</figure>
            <h3 class="hero-text2">Myth 3: Only Certain Blood Types Are Needed</h3>
            <p class="hero-text">All blood types are needed. While O-negative blood is universal and highly sought after, other blood types are equally important. Blood banks need a diverse supply to meet the needs of different patients.</p>
            <h3 class="hero-text2">Myth 4: I Can Get Sick from Donating Blood</h3>
            <p class="hero-text">Blood donation is a safe process conducted in a sterile environment. The equipment used is sterile and single-use, ensuring that there is no risk of contracting diseases from donating blood.</p>
            <h3 class="hero-text2">Myth 5: Donating Blood Takes a Long Time</h3>
            <p class="hero-text">The actual blood donation takes about 10-15 minutes. Including the pre-donation screening and post-donation rest, the entire process typically takes around an hour. It’s a small time investment for a significant impact.</p>
            <h3 class="hero-text2">Myth 6: Vegetarians Can't Donate Blood</h3>
            <p class="hero-text">Vegetarians can donate blood as long as they meet the general health requirements. Being vegetarian does not affect your blood’s ability to be donated. Ensure you have a well-balanced diet to maintain healthy iron levels.</p>

            <h3 class="hero-text2">Myth 7: You Can Donate Blood Only Once a Year</h3>
            <p class="hero-text">You can donate whole blood every 56 days, which is approximately every two months. For platelet donations, the interval is shorter, allowing for more frequent donations. Your body has ample time to replenish the donated blood.</p>

            <h3 class="hero-text2">Myth 8: Older Adults Shouldn't Donate Blood</h3>
            <p class="hero-text">There is no upper age limit for blood donation, as long as the donor is in good health and meets the eligibility criteria. Many older adults donate regularly and help save lives.</p>

            <h3 class="hero-text2">Myth 9: Blood Donation Weakens Your Immune System</h3>
            <p class="hero-text">Blood donation does not weaken your immune system. In fact, donating blood regularly can have health benefits, such as reducing the risk of certain diseases. Your body replenishes the donated blood within a few weeks.</p>

            <h3 class="hero-text2">Myth 10: My Health Problems Prevent Me from Donating</h3>
            <p class="hero-text">While some health conditions may temporarily or permanently defer donation, many people with manageable conditions like controlled high blood pressure or diabetes can still donate. It’s essential to discuss your health status with the blood bank staff.</p>
            <h3 class="hero-text2">Final Thoughts</h3>
            <p class="hero-text">Donating blood is a noble and life-saving act that can significantly impact many lives. By debunking these myths, we hope to encourage more people to become regular donors. If you meet the eligibility criteria, consider making a blood donation. Your contribution could be the lifeline someone desperately needs. Always consult with your healthcare provider if you have any concerns about donating blood. Together, we can ensure a steady and diverse blood supply for those in need.</p>
        </div>
          <figure class="hero-banner">
            <img src="assets/images/myths-and-taboos-of-blood-donation.jpg" width="587" height="839" alt="hero banner" class="w-100">
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