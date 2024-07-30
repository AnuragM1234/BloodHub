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
  .profile-img {
    width: 30px;
    margin-right: 12px;
    display: inline-block;
    position: relative;
    top: 5px;
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
            <h1 class="h1 hero-title">Upcoming Blood Drives: How to Get Involved</h1>
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
            Blood drives are an excellent opportunity for communities to come together and contribute to a life-saving cause. Whether you're a first-time donor or a seasoned veteran, getting involved in an upcoming blood drive can make a significant difference. This blog will guide you through everything you need to know about participating in a blood drive and how you can help save lives.
            </p><br>
            <h3 class="hero-text2">Why Blood Drives Are Important</h3>
            <p class="hero-text">Blood drives are crucial in maintaining an adequate supply of blood for hospitals and medical facilities. They help bridge the gap between the consistent need for blood and the limited number of regular donors. Blood collected during these drives is used for various medical procedures, including surgeries, treatments for chronic illnesses, and emergency care for trauma patients.</p>
            <figure class="hero-banner">
                <img src="assets/images/blood_drive.webp" class="w-100" alt="">
            </figure>
            <h9 class="hero-text2">Points to remember:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Blood drives help maintain a steady blood supply.</li>   
                <li class="list-item">They support a wide range of medical treatments.</li>
                <li class="list-item">Community involvement increases donation rates.
                </li>
            </ul> 
            <h3 class="hero-text2">How to Find Upcoming Blood Drives</h3>
            <p class="hero-text">Finding a blood drive near you is easier than ever, thanks to numerous online resources and local community organizations. Here are some ways to locate upcoming blood drives:</p>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Check the websites of major blood banks and organizations like the American Red Cross, which often have searchable databases of upcoming blood drives.</li>   
                <li class="list-item">Many local medical facilities host regular blood drives. Contacting them directly or visiting their websites can provide you with information on scheduled events.</li>
				<li class="list-item">Community centers, schools, and places of worship frequently organize blood drives. Keep an eye on local event boards or community newsletters for announcements.</li>
				<li class="list-item">Follow blood donation organizations on social media platforms for updates on blood drives in your area.</li>
			</ul> 
            <h9 class="hero-text2">Points to remember:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Use blood bank websites and local hospital resources.</li>   
                <li class="list-item">Check community centers and event boards.</li>
				<li class="list-item">Follow relevant organizations on social media.
                </li>
			</ul> 
            <h3 class="hero-text2">Preparing for a Blood Drive</h3>
            <p class="hero-text">Preparation is key to ensuring a smooth and successful blood donation experience. Here’s what you need to do before heading to a blood drive:</p>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Make sure you meet the eligibility criteria for donating blood. This typically includes being in good health, meeting age and weight requirements, and not having certain medical conditions.</li>   
                <li class="list-item">Drink plenty of water before your donation to help maintain healthy blood pressure and make the process easier.</li>
				<li class="list-item">Consume a nutritious meal rich in iron before donating. This helps keep your energy levels up and prevents dizziness or fainting.</li>
				<li class="list-item">Carry a valid ID, such as a driver’s license or passport, as it will be required during registration.</li>
				<li class="list-item">Choose clothing with sleeves that can be easily rolled up.</li>
			</ul> 
            <h9 class="hero-text2">Points to remember:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Use blood bank websites and local hospital resources.</li>   
                <li class="list-item">Check community centers and event boards.</li>
				<li class="list-item">Follow relevant organizations on social media.
                </li>
			</ul> 
            <figure class="hero-banner">
                <img src="assets/images/blood_drive3.jpg" class="w-100" alt="">
            </figure>
            <h3 class="hero-text2">What to Expect During the Blood Drive</h3>
            <p class="hero-text">Understanding what happens during the blood donation process can help alleviate any anxiety you might have. Here’s a brief overview:</p>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Upon arrival, you will fill out a registration form and provide your ID.</li>   
                <li class="list-item">A health professional will conduct a brief health screening, including checking your blood pressure, pulse, and hemoglobin levels.</li>
				<li class="list-item">The actual blood donation takes about 10-15 minutes. You'll be seated comfortably while a small needle is used to draw blood from your arm. The process is generally painless, and staff will be there to ensure you're comfortable throughout.</li>
				<li class="list-item">After donating, you’ll be asked to rest for a few minutes and enjoy some refreshments. This helps replenish your energy and ensures you’re feeling well before leaving.</li>
			</ul> 
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
            <h9 class="hero-text2">Points to remember:</h9>
            <ul class="circle hero-text" style="margin-top: 10px;">   
                <li class="list-item">Registration involves filling out forms and providing ID.</li>   
                <li class="list-item">The donation process takes about 10-15 minutes.</li>
				<li class="list-item">Post-donation rest and refreshments are provided.
                </li>
			</ul>
            <h3 class="hero-text2">Final Thoughts</h3>
            <p class="hero-text">Getting involved in a blood drive is a simple yet impactful way to contribute to your community. Whether you donate blood, volunteer, or help spread the word, your efforts can make a significant difference. By dispelling myths and understanding the importance of blood donation, we can all play a part in ensuring a steady and diverse blood supply. Join an upcoming blood drive and be a part of this life-saving mission. Together, we can save lives and support those in need.</p>

        </div>
          <figure class="hero-banner">
            <img src="assets/images/upcoming_blood_drive.jpeg" width="587" height="839" alt="hero banner" class="w-100">
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