<?php
session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Validate and sanitize form inputs
//     $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
//     $password = isset($_POST["password"]) ? $_POST["password"] : "";

//     $servername = "localhost";
//     $username = "root";
//     $dbpassword = "";
//     $dbname = "bloodhub";
//     $conn = new mysqli($servername, $username, $dbpassword, $dbname);
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Check if the email exists in the database
//     $stmt = $conn->prepare("SELECT password FROM register WHERE email = ?");
//     if (!$stmt) {
//         die("Error: " . $conn->error);
//     }
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows > 0) {
//         $stmt->bind_result($hashedPassword);
//         $stmt->fetch();

//         // Verify the password
//         if (password_verify($password, $hashedPassword)) {
//             // Password is correct, set session or do any other action
//             $_SESSION["loggedin"] = true;
//             $_SESSION["email"] = $email;
//             // Check if "Remember Me" is checked
//             if (isset($_POST["remember_me"]) && $_POST["remember_me"] === "1") {
//                 $cookie_name = "remember_me_cookie";
//                 $cookie_value = $email;
//                 $cookie_expiry = time() + (86400 * 30); // 30 days (86400 seconds per day)
//                 setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");
//             }
//             // Redirect the user to the dashboard or any other page
//             header("Location: dashboard.php");
//             exit();
//         } else {
//             // echo '<script>alert("Incorrect email or password. Please try again.");</script>';
//             $_SESSION["login"] = "failure";
//         }
//     } else {
//         // echo '<script>alert("Incorrect email or password. Please try again.");</script>';
//         $_SESSION["login"] = "failure";
//     }
//     $stmt->close();
//     $conn->close();
// }
?>

<?php
  include 'assets/components/header.php';
?>

  <style>
    hr {
      border: none;
      height: 1px;
      background-color: #c5c7c9;
      margin: 20px 0;
    }

    /* Form Styles */
    .form-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-title {
      color: var(--oxford-blue-1);
      font-family: var(--ff-poppins);
      font-size: 3.4rem;
      font-weight: var(--fw-800);
      text-align: center;
      margin-bottom: 20px;
    }

    .form-section {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .form-field {
      flex: 0 0 48%;
      margin-bottom: 20px;
    }

    .form-field label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-field input,
    .form-field select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-field input[type="submit"] {
      background-color: #216aca;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .form-field input[type="submit"]:hover {
      background-color: #060952;
    }

    .form-title-login {
      text-align: center;
      margin-top: 30px;
      font-family: var(--ff-poppins);
      font-size: 1.8rem;
      color: #216aca;
    }

    .form-title-login a {
      color: #216aca;
      text-decoration: underline;
    }

    .form-title-login a:hover {
      color: #03d9ff;
    }
    .swal2-title {
      font-size: 30px !important; /* Increase title font size */
    }
    .swal2-html-container {
      font-size: 20px !important; /* Increase content font size */
    }
    .swal2-confirm {
      font-size: 18px !important;
    }
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php
    if (isset($_SESSION["login"]) && $_SESSION["login"] == "failure") {
      echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Wrong Password or Email!',
                    text: '" . $_SESSION["error_msg"] . "',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
          unset($_SESSION["login"]);
    }
    if (isset($_SESSION["notLoggedIn"]) && $_SESSION["notLoggedIn"] == true) {
      echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'First Login Yourself',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
          unset($_SESSION["notLoggedIn"]);
    }
  ?>
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
      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png'); margin: 0%;"
        aria-label="hero">
        <!-- Login and Registration Form -->
        <div class="container">
          <div class="form-container">
            <div class="form-title">Login</div>
            <hr><br><br>
            <form action="assets/actions/loginupd.php" method="POST">
              <div class="form-section">
                <div class="form-field">
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" required>
                </div>
                <div class="form-field">
                  <label for="password">Password:</label>
                  <input type="password" id="password" name="password" required>
                </div>
                <div class="form-field" style="display: flex; align-items: center;">
                  <label for="remember_me">Remember Me:</label>
                  <input type="checkbox" id="remember_me" name="remember_me" value="1" style="width:32px;">
                </div>
              </div><br>
              <button type="submit" class="btn">Login</button>
            </form><br><br>
            <div class="form-title">Not Registered? <u><a href="register.php" style="display: inline; color: #216aca;" onmouseover="this.style.color='#03d9ff'" onmouseout="this.style.color='#216aca'">Register Here</a></u></div>
          </div>
          <figure class="hero-banner">
            <img src="./assets/images/bg.svg" width="587" height="839" alt="hero banner" class="w-100">
            <center><h1>Welcome back</h1><center>
          </figure>
        </div>
      </section>
    </article>
  </main>

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