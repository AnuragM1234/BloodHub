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
            <h1 class="h1 hero-title">The Different Types of Blood Donations Explained</h1>
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
            Blood donation is a vital practice that supports medical treatments and saves countless lives. However, not all blood donations are the same. There are various types of blood donations, each serving a specific purpose and benefiting different patients. In this blog, we'll explain the different types of blood donations and their unique benefits.
            </p><br>
            <figure class="hero-banner">
                <img src="assets/images/Your-blood-type-difference1.jpg" class="w-100" alt="">
            </figure>
            <h3 class="hero-text2">Whole Blood Donation</h3>
            <p class="hero-text">Whole blood donation is the most common and traditional type of blood donation. It involves donating approximately one pint of blood, which is then separated into its components—red cells, plasma, and platelets.</p>
            <h9 class="hero-text2">Key Points:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Whole blood is typically used for trauma patients and surgeries.</li>   
                <li class="list-item">The donation process takes about 10-15 minutes.</li>
                <li class="list-item">Donors can give whole blood every 56 days.
                    </li>
                </ul> 
                <p class="hero-text">This type of donation is crucial for maintaining an adequate supply of all blood components and is often the type of donation requested during blood drives.</p>
            <h3 class="hero-text2">Platelet Donation</h3>
            <p class="hero-text">Platelet donation, also known as apheresis, is a process where only the platelets are collected, and the remaining blood components are returned to the donor. Platelets are essential for blood clotting and are often needed by cancer patients, those undergoing major surgeries, and trauma victims.</p>
            <h9 class="hero-text2">Benefits:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Platelets have a short shelf life of only five days, making frequent donations essential.</li>   
                <li class="list-item">Inform staff about all medications you are taking.</li>
				<li class="list-item">One platelet donation can provide enough platelets for a full therapeutic dose, whereas it might take several whole blood donations to gather the same amount.
                    </li>
                </ul> 
                <h3 class="hero-text2">Plasma Donation</h3>
                <p class="hero-text">Plasma is the liquid part of the blood that carries cells and proteins throughout the body. Plasma donations, also known as plasmapheresis, involve separating plasma from the other blood components and returning the red cells and platelets to the donor.</p> 
                <figure class="hero-banner">
                    <img src="assets/images/TypesOfBloodDonation-2.png" class="w-100" alt="">
                </figure>
                <h9 class="hero-text2">Uses:</h9>
                <ul class="circle hero-text" style="margin-top: 10px;">   
                    <li class="list-item">Plasma is used to treat patients with liver conditions, burns, and severe infections.</li>   
                    <li class="list-item">It is also used in therapies for clotting disorders and immune deficiencies.</li>
            </ul> 
              <ul class="circle hero-text" style="margin-top: 10px;">
              <h9 class="hero-text2">Process and Frequency:</h9>
                <li class="list-item">The donation process takes about 1-2 hours.
                </li>
                <li class="list-item">Donors can give plasma every 28 days.
                </li>
              </ul>
            <h3 class="hero-text2">Double Red Cell Donation</h3>
            <p class="hero-text">Double red cell donation is a type of apheresis where two units of red blood cells are collected, and the plasma and platelets are returned to the donor. Red blood cells are critical for carrying oxygen to the body's tissues and are often needed for surgery patients, trauma victims, and individuals with anemia.</p>
            <h9 class="hero-text2">Advantages:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">This type of donation is particularly beneficial for patients with significant blood loss.</li>   
                <li class="list-item">Double red cell donations provide twice the amount of red cells compared to a whole blood donation.</li>
			</ul> 
            <h3 class="hero-text2">Benefits of Each Donation Type</h3>
            <p class="hero-text">Understanding the benefits of each type of donation can help you decide which method is best suited for you. Here are some additional benefits to consider:</p>
            <h9 class="hero-text2">Whole Blood Donation:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Provides a complete set of blood components.</li>   
                <li class="list-item">Simple and quick process.</li>
			</ul> 
            <h9 class="hero-text2">Platelet Donation:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Crucial for cancer treatments and surgical patients.</li>   
                <li class="list-item">Frequent donation intervals.
                </li>
			</ul> 
            <h9 class="hero-text2">Plasma Donation:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Essential for treating a variety of medical conditions.</li>   
                <li class="list-item">Donors can donate more often.
                </li>
			</ul> 
            <h9 class="hero-text2">Double Red Cell Donation:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Efficiently provides a high quantity of red blood cells.</li>   
                <li class="list-item">Longer interval between donations.
                </li>
			</ul> 
            <h3 class="hero-text2">Final Thoughts</h3>
            <p class="hero-text">Each type of blood donation plays a critical role in saving lives and supporting medical treatments. By understanding the different types of donations, you can choose the method that best fits your lifestyle and preferences, while making a significant impact. Whether you donate whole blood, platelets, plasma, or double red cells, your contribution is invaluable. Consider reaching out to your local blood donation center to learn more about the donation options available and how you can help. Together, we can ensure a steady and diverse blood supply, providing vital support to those in need.</p>

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