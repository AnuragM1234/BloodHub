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
            <h1 class="h1 hero-title">Who Can Donate? Understanding Blood Donation Eligibility</h1>
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
                Donating blood is a noble act that can save lives, but not everyone is eligible to donate. Understanding the criteria and guidelines for blood donation eligibility is crucial for ensuring both donor safety and the safety of the blood supply. In this blog, we’ll break down who can donate blood and what factors might affect eligibility.
            </p><br>
            <h3 class="hero-text2">General Eligibility Requirements</h3>
            <p class="hero-text">Before donating blood, potential donors must meet several basic requirements. These ensure that the donation process is safe for both the donor and the recipient. Donors must typically be at least 16 or 17 years old, depending on state regulations and the blood donation center’s policies. Some centers require parental consent for donors under 18. Most blood donation centers also require donors to weigh at least 110 pounds (50 kg) to ensure they have enough blood volume to donate safely. Additionally, donors should be in good general health, meaning they should feel well on the day of donation and not be experiencing any acute infections or illnesses.</p>
            <figure class="hero-banner">
                <img src="assets/images/donate_blood2.jpg" class="w-100" alt="">
            </figure>
            <h3 class="hero-text2">Health Conditions and Medications</h3>
            <p class="hero-text">Certain health conditions and medications can affect your ability to donate blood. It's important to be honest about your medical history during the pre-donation screening process. Some chronic conditions, like controlled hypertension or diabetes, may not disqualify you from donating blood as long as they are well-managed. Many medications do not prevent you from donating blood, but specific medications may require a waiting period after your last dose before you can donate. Always inform the blood center staff about any medications you are taking. If you’ve recently had a cold, flu, or other acute illness, you may need to wait until you’ve fully recovered before donating blood.</p>
            <h9 class="hero-text2">Points to remember:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Managed chronic conditions may still allow for donation.</li>   
                <li class="list-item">Inform staff about all medications you are taking.</li>
				<li class="list-item">Wait until fully recovered from recent illnesses before donating.
                </li>
			</ul> 
            <h3 class="hero-text2">Travel and Lifestyle Factors</h3>
            <p class="hero-text">Your travel history and lifestyle choices can also impact your eligibility to donate blood. These factors are assessed to reduce the risk of transmitting infections through the blood supply. If you have traveled to areas with high risks of diseases like malaria or Zika virus, you may need to wait for a specific period before donating blood. The waiting period can vary based on the disease risk in the area visited. If you’ve recently gotten a tattoo or piercing, you might be deferred from donating blood for a certain period, typically 3-12 months, depending on the blood center’s policies and the location where the procedure was done. Engaging in high-risk behaviors, such as intravenous drug use or having unprotected sex with multiple partners, can temporarily or permanently defer you from donating blood.</p> 
            <figure class="hero-banner">
                <img src="assets/images/donate_img.png" class="w-100" alt="">
            </figure>
            <h3 class="hero-text2">Blood Donation Frequency</h3>
            <p class="hero-text">Different types of blood donations have different frequency guidelines. Understanding these can help you plan your donations and maintain your eligibility. You can donate whole blood every 56 days (about every two months), which allows your body ample time to replenish the donated blood. Platelet donations can be made more frequently, typically every 7 days, up to 24 times a year. Plasma donations can be done every 28 days, with the exact frequency varying based on the donor center’s guidelines.</p>
            <h9 class="hero-text2">Points to remember:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Registration involves filling out forms and providing ID.</li>   
                <li class="list-item">The donation process takes about 10-15 minutes.</li>
				<li class="list-item">Post-donation rest and refreshments are provided.
                </li>
			</ul> 
            <h3 class="hero-text2">Post-Donation Care</h3>
            <p class="hero-text">Taking care of yourself after donating blood is essential. Here are some tips to help you recover quickly:</p>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Drink plenty of fluids over the next 24-48 hours to replenish the fluids lost during donation.</li>   
                <li class="list-item">Refrain from heavy lifting or vigorous exercise for the rest of the day to prevent any complications.</li>
				<li class="list-item">Incorporate iron-rich foods into your diet to help restore your body's iron levels. Foods like spinach, red meat, and legumes are excellent choices.</li>
				<li class="list-item">If you feel lightheaded or dizzy, sit down or lie down until you feel better. If any unusual symptoms persist, contact the blood donation center or seek medical attention.</li>
			</ul> 
            <h3 class="hero-text2">Final Thoughts</h3>
            <p class="hero-text">Understanding the eligibility criteria for blood donation is essential for ensuring a safe and efficient donation process. By knowing who can donate and the factors that might affect eligibility, you can better prepare for your donation and help maintain a safe blood supply. If you meet the criteria, consider donating blood – your contribution could be lifesaving. Always consult with your local blood donation center for the most accurate and up-to-date information on eligibility requirements. Together, we can make a difference and support those in need through the gift of blood donation.</p>

        </div>
          <figure class="hero-banner">
            <img src="assets/images/Can_I_Donate_Blood_Check_Your_Eligibility_Today_561f773b49.png" width="587" height="839" alt="hero banner" class="w-100">
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