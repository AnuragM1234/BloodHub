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
            <h1 class="h1 hero-title">The Lifesaving Impact of Blood Donation</h1>
            <div class="author">
                <div class="authorName">
                    <img src="assets/images/profile_3135715.png" alt="" width="45px">
                    <p class="section-subtitle">Dr. Delusa Doms</p>
                </div>
                <div class="dateBadge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2023</time>
                </div>
            </div>
            <p class="hero-text">
                In the realm of healthcare, few acts are as immediately impactful as donating blood. It's a simple gesture that holds the power to save lives. Whether it's for emergency surgeries, treatments for chronic illnesses, or supporting patients battling cancer, donated blood is a lifeline that hospitals depend on daily.
            </p><br>
            <h3 class="hero-text2">The Need for Blood</h3>
            <p class="hero-text">Picture this: every two seconds, someone, somewhere needs blood. This unrelenting demand underscores the critical importance of blood donation. Despite advancements in medical technology, there's no substitute for human blood. It's essential for a range of medical procedures and treatments, from helping trauma victims regain their strength to supporting patients undergoing complex surgeries.</p>

            <h3 class="hero-text2">Who Benefits from Blood Donation?</h3>
            <p class="hero-text">The beneficiaries of blood donation are diverse and numerous. Patients in emergency rooms rely on donated blood to stabilize their conditions swiftly. Those undergoing treatments like chemotherapy often need blood transfusions to replenish what their bodies have lost. Even premature infants and individuals with blood disorders require specific blood types that are often only available through donations.</p>
						<figure class="hero-banner">
							<img src="assets/images/save_living.webp" class="w-100" alt="">
						</figure>
            <h3 class="hero-text2">The Impact of Each Donation</h3>
            <p class="hero-text">Every donation matters. A single pint of blood can potentially save up to three lives. It's not just the quantity but the quality of life that improves for recipients. For someone battling cancer, blood donation can mean the strength to fight another day. For an accident victim, it can mean the chance to recover and return to their loved ones. Each donor, regardless of their background or circumstances, becomes a silent hero in someone's life story.</p>
            <h3 class="hero-text2">Final Thoughts</h3>
						<ul class="circle hero-text">   
							<li class="list-item">Blood donation is crucial for emergency medical treatments.Donated blood supports patients with chronic illnesses.</li>   
							<li class="list-item">Blood donations help cancer patients during chemotherapy.There is a constant need for blood donations.</li>
							<li class="list-item">Blood is vital for trauma and surgical patients.Emergency room patients benefit greatly from blood donations.</li>
							<li class="list-item">Premature infants and those with blood disorders rely on specific blood types.
							</li>
							<li class="list-item">Donors become silent heroes in the lives of recipients.</li>
					 </ul> 
        </div>
          <figure class="hero-banner">
            <img src="assets/images/the-life-saving-benefits-of-donating-blood.png" width="587" height="839" alt="hero banner" class="w-100">
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