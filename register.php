<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $name = isset($_POST["full_name"]) ? htmlspecialchars($_POST["full_name"]) : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $phone = isset($_POST["mobile_number"]) ? htmlspecialchars($_POST["mobile_number"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : ""; // No need to htmlspecialchars for the password
    $bloodgroup = isset($_POST["blood_group"]) ? htmlspecialchars($_POST["blood_group"]) : "";
    $gender = isset($_POST["gender"]) ? htmlspecialchars($_POST["gender"]) : "";
    $birthdate = isset($_POST["birth_date"]) ? htmlspecialchars($_POST["birth_date"]) : "";
    $weight = isset($_POST["weight"]) ? htmlspecialchars($_POST["weight"]) : "";
    $state = isset($_POST["state"]) ? htmlspecialchars($_POST["state"]) : "";
    $zipcode = isset($_POST["zip_code"]) ? htmlspecialchars($_POST["zip_code"]) : "";
    $city = isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : "";
    $area = isset($_POST["area"]) ? htmlspecialchars($_POST["area"]) : "";
    $landmarks = isset($_POST["landmarks"]) ? htmlspecialchars($_POST["landmarks"]) : "";

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "bloodhub";
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
    $stmt = $conn->prepare("INSERT INTO register (full_name, phone_number, email, password, blood_group,  birth_date, gender, weight, state, city, zip_code, area, landmark) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }
    $stmt->bind_param("sssssssssssss", $name, $phone, $email, $hashedPassword, $bloodgroup, $birthdate, $gender, $weight, $state, $city, $zipcode, $area, $landmarks);
    if ($stmt->execute()) {
        $_SESSION['display_alert'] = 1;
        
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        echo '<script>alert("Error: Unable to register. Please try again later.");</script>';
    }
    $stmt->close();
    $conn->close();
}

$display_alert = isset($_SESSION['display_alert']) ? $_SESSION['display_alert'] : 0;
if ($display_alert) {
    unset($_SESSION['display_alert']);
}
?>

<?php
  include 'assets/components/header.php';
?>

  <style>
    /* Form Styles */
    
    /**/
          /* Modal styles */
/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 999; /* Ensure it appears on top of everything */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
    backdrop-filter: blur(5px); /* Blur effect */
    -webkit-backdrop-filter: blur(5px); /* For older browsers */
    overflow: auto; /* Enable scrolling if needed */
}

.modal-content {
    position: relative;
    background-color: #7ccddf;
    color: black;
    margin: 15% auto;
    padding: 20px;
    border-radius: 8px;
    width: 80%;
    max-width: 600px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.close {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 28px;
    color: #000000;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

    /**/
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
    .flatpickr-calendar {
        z-index: 1000; /* Ensure it appears above other content */
    }

    .flatpickr-calendar {
        margin-top: 5px; /* Adjust the margin to position it correctly below the input */
    }
  </style>
  <!-- Include Flatpickr CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png'); margin: 0%;" aria-label="hero">
            <?php
            if ($display_alert == 1) {
              echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "Registered!",
                            text: "You are Successfully Registered.",
                            icon: "success",
                            confirmButtonText: "OK",
                            customClass: {
                                title: "swal2-title",
                                content: "swal2-content"
                          }
                        });
                    });
                    </script>';
            }
            ?>
            <!-- Login and Registration Form -->
            <div class="container">
              <div class="form-container">
                <div class="form-title">Register</div>
                <form action="" method="POST">
                  <!-- Login Information -->
                  <div class="form-section">
                    <div class="form-field">
                      <label for="full-name">FULL NAME</label>
                      <input type="text" id="full-name" name="full_name" required>
                    </div>
                    <div class="form-field">
                      <label for="mobile">MOBILE NUMBER</label>
                      <input type="text" id="mobile" name="mobile_number" required>
                    </div>
                    <div class="form-field">
                      <label for="email">EMAIL</label>
                      <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-field">
                      <label for="password">PASSWORD</label>
                      <input type="password" id="password" name="password" required>
                    </div>
                  </div>
                  <!-- Donor Information -->
                  <div class="form-section">
                    <div class="form-field">
                      <label for="blood-group">BLOOD GROUP</label>
                      <select id="blood-group" name="blood_group" required>
                        <option value="" disabled selected>Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                      </select>
                    </div>
                    <div class="form-field">
                      <label for="birth-date">BIRTH DATE</label>
                      <input type="date" id="birth-date" name="birth_date" placeholder="Select Date" required>
                    </div>
                    <div class="form-field">
                      <label for="gender">GENDER</label>
                      <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                    <div class="form-field">
                      <label for="weight">WEIGHT</label>
                      <input type="text" id="weight" name="weight" required>
                    </div>
                  </div>
                  <!-- Contact Information -->
                  <div class="form-section">
                    <div class="form-field">
                      <label for="state">STATE</label>
                      <input type="text" id="state" name="state" required>
                    </div>
                    <div class="form-field">
                      <label for="city">CITY</label>
                      <input type="text" id="city" name="city" required>
                    </div>
                    <div class="form-field">
                      <label for="zip-code">ZIP CODE</label>
                      <input type="number" id="zip-code" name="zip_code" required>
                    </div>
                    <div class="form-field">
                      <label for="area">AREA</label>
                      <input type="text" id="area" name="area" required>
                    </div>
                  </div>
                  <div class="form-field">
                      <label for="area">Landmarks (Optional)</label>
                      <input type="text" id="landmarks" name="landmarks">
                    </div>
                  <button type="submit" class="btn">Register</button>
                </form>
                <div class="form-title">Already Registered? <u><a href="login.php" style="display: inline; color: #216aca;" onmouseover="this.style.color='#03d9ff'" onmouseout="this.style.color='#216aca'">Login Here</a></u></div>
              </div>
              <figure class="hero-banner">
                <img src="./assets/images/bg.svg" width="587" height="839" alt="hero banner" class="w-100">
                <center><h2>New Here ?</h2></center>
              </figure>
            </div>
          </section>
  
  <!--FOOTER-->
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
  <script>
    // Get the close button element
    var closeButton = document.querySelector('.close');

    // Add click event listener to close button
    closeButton.addEventListener('click', function() {
      // Get the parent element (alert box) and remove it from the DOM
      var alertBox = closeButton.closest('.alert');
      alertBox.remove();
    });
  </script>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("modalAlert");
    const closeBtn = modal.querySelector(".close");

    // Show modal function
    function showModal() {
        modal.style.display = "block";
        document.body.style.overflow = "hidden"; // Disable scrolling on background content
    }

    // Hide modal function
    function hideModal() {
        modal.style.display = "none";
        document.body.style.overflow = ""; // Enable scrolling on background content
    }

    // Close modal when close button is clicked
    closeBtn.addEventListener("click", hideModal);

    // Close modal when clicking outside of it
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            hideModal();
        }
    });

    // Close modal when pressing Escape key
    document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            hideModal();
        }
    });

    // Initially show modal if it should be displayed
    if (<?php echo $display_alert; ?>) {
        showModal();
    }
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('birth-date').setAttribute('max', today);
        flatpickr("#birth-date", {
            altInput: true, // Use alternative input
            altFormat: "F j, Y", // Format for the alternative input
            dateFormat: "Y-m-d", // Format for the actual input value
            maxDate: "today", // Restrict to today or earlier dates
            position: "below" // Force calendar to display below the input
        });
    });
</script>
</body>
</html>