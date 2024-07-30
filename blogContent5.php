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
            <h1 class="h1 hero-title">Preparing for Your First Blood Donation</h1>
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
            Donating blood for the first time can be an exciting and rewarding experience. It’s a simple yet impactful way to help save lives. If you’re considering donating blood for the first time, you might have some questions and concerns about the process. This blog will guide you through what to expect and how to prepare for your first blood donation.
            </p><br>
            <figure class="hero-banner">
                <img src="assets/images/first_time_donate.jpg" class="w-100" alt="">
            </figure>
            <h3 class="hero-text2">Understanding the Importance of Blood Donation</h3>
            <p class="hero-text">Blood donation is crucial for maintaining an adequate supply for medical treatments and emergencies. Donated blood is used for various purposes, including surgeries, trauma care, cancer treatment, and managing chronic illnesses. By donating blood, you are providing a lifeline to those in need.</p>
            <h9 class="hero-text2">Key Points:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Blood donation supports medical treatments and emergencies.</li>   
                <li class="list-item">Your donation can save multiple lives.</li>
                <li class="list-item">Regular donations are needed to maintain a stable blood supply.
                    </li>
                </ul> 
                <p class="hero-text">This type of donation is crucial for maintaining an adequate supply of all blood components and is often the type of donation requested during blood drives.</p>
            <h3 class="hero-text2">Pre-Donation Preparation</h3>
            <p class="hero-text">Preparation is key to ensuring a smooth and successful blood donation experience. Here are some essential steps to take before your donation day:</p>
            <h9 class="hero-text2">Benefits:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Ensure you meet the basic eligibility criteria for donating blood. This typically includes being in good health, being at least 16 or 17 years old (depending on your location), and weighing at least 110 pounds (50 kg).</li>   
                <li class="list-item">Drink plenty of fluids before your donation. Staying hydrated helps maintain healthy blood pressure levels and makes the donation process easier.</li>
				<li class="list-item"> Have a nutritious meal rich in iron a few hours before donating. Foods like lean meats, beans, spinach, and fortified cereals can help keep your iron levels up.
                </li>
				<li class="list-item"> Being well-rested will help you feel more relaxed and prepared for the donation.
                </li>
				<li class="list-item"> Choose clothing with sleeves that can be easily rolled up. This will make the process more convenient for you and the medical staff.
                </li>
                </ul> 
                <h3 class="hero-text2">The Donation Process
                </h3>
                <p class="hero-text">Understanding what happens during the donation process can help alleviate any anxiety you might have. Here’s a step-by-step guide:</p> 
                <ul class="circle hero-text" style="margin-top: 10px;">   
                    <li class="list-item">Upon arrival at the donation center, you’ll fill out a registration form and provide a valid ID.</li>   
                    <li class="list-item">A brief health screening will be conducted to check your blood pressure, pulse, temperature, and hemoglobin levels. This ensures you’re in good health to donate.</li>
                    <li class="list-item">The actual blood donation takes about 10-15 minutes. You’ll be seated comfortably while a small needle is used to draw blood from your arm. The staff will monitor you throughout to ensure you’re comfortable.</li>
                    <li class="list-item">After donating, you’ll be asked to rest for a few minutes and enjoy some refreshments. This helps replenish your energy and ensures you’re feeling well before leaving.</li>
            </ul> 
              <ul class="circle hero-text" style="margin-top: 10px;">
              <h9 class="hero-text2">Process and Frequency:</h9>
                <li class="list-item">The donation process takes about 1-2 hours.
                </li>
                <li class="list-item">Donors can give plasma every 28 days.
                </li>
              </ul>
            <h3 class="hero-text2">Final Thoughts</h3>
            <p class="hero-text">Your first blood donation is a generous act that can have a profound impact on the lives of others. By following these preparation tips and understanding the donation process, you can ensure a positive and rewarding experience. Remember, your contribution is invaluable, and every donation makes a difference. If you have any concerns or questions, don’t hesitate to reach out to your local blood donation center for more information. Together, we can help save lives and support those in need through the simple act of donating blood.</p>

        </div>
          <figure class="hero-banner">
            <img src="assets/images/RYTHM_World-Blood-Donor-Day_02-WB.jpg" width="587" height="839" alt="hero banner" class="w-100">
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