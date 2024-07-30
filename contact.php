<?php
  session_start();
  include 'assets/components/header.php';
?>

  <style>
    /* Popup styles */
    .popup {
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background: linear-gradient(135deg, #ffffff, #a3d2ee);
      color: #0e254e;
      font-size: 16px;
      z-index: 9999;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    .profile-img {
    width: 30px;
    margin-right: 12px;
    display: inline-block;
    position: relative;
    top: 5px;
  }

    @media screen and (max-width: 768px) {
    .hero-form {
        display: flex;
        flex-direction: column;
      }
      .email-field {
        margin-bottom: 10px;
      }
      .hero-banner iframe {
        width: 100%;
        height: 200px;
      }
    }
    @media screen and (max-width: 900px) {
      .hero-form {
        display: flex;
        flex-direction: column;
      }

      .email-field {
        margin-bottom: 10px;
      }

      .hero-banner iframe {
        width: 100%;
        height: 250px;
      }
    }
    /* Media query for screen sizes between 905x800 and 1197x800 */
    @media screen and (min-width: 905px) and (max-width: 1197px) {
      .hero-form {
        max-width: 70%;
        margin: 0 auto;
      }
      .hero-banner iframe {
        width: 100%;
        height: 300px;
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
            <p class="section-subtitle">BloodHub</p>
            <h1 class="h1 hero-title">Contact Us</h1>
            <h2 style="color: var(--royal-blue-light);">Address</h2>
            <p class="hero-text">
            1st Floor Unit 6, Glenroyal Shopping Centre, Maynooth, Co. Kildare, W23 C2V1, Ireland<br>
            </p>
            <h2 style="color: var(--royal-blue-light);">Contact Details</h2>
            <p class="hero-text">
            MOBILE: +91 7558 9513 51 | TELEPHONE: 0484-292674<br>
            EMAIL : anuragmahto1968@gmail.com<br>
            </p>
            <form action="send_email.php" class="hero-form" method="POST">
              <input type="email" name="email_address" aria-label="email" placeholder="Your Email Address..." required
                class="email-field">
              <button type="submit" class="btn">Get Response Back</button>
            </form>
          </div>
          <figure class="hero-banner">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2379.9239957152536!2d-6.591290923583893!3d53.380409372174626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486771c9341775db%3A0xb29a003ef2505c85!2sBloodhub%20Blood%20Test%20Service!5e0!3m2!1sen!2sin!4v1721315382020!5m2!1sen!2sin" width="700" height="600" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

  <!--FOOTER-->
  <?php
    include 'assets/components/footer.php';
  ?>
<?php
ob_start();
// Check if the form is submitted
if(isset($_SESSION['status']) && isset($_SESSION['last_page']) && strpos($_SESSION['last_page'], 'contact.php') !== false)
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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email_address"]) && filter_var($_POST["email_address"], FILTER_VALIDATE_EMAIL)) {
        // Sanitize the email address to prevent SQL injection
        $email = htmlspecialchars($_POST["email_address"]);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "redstream_db";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("INSERT INTO response_back (email) VALUES (?)");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo '<script>showPopup("Email added successfully!");</script>';
        } else {
            echo '<script>showPopup("Error: Unable to add email. Please try again later.");</script>';
        }
        $stmt->close();
        $conn->close();
    } else {
        echo '<script>showPopup("Error: Invalid email address. Please enter a valid email.");</script>';
    }
}
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