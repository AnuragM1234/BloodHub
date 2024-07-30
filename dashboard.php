<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("Location: login.php");
  exit;
}
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "bloodhub";
$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION["email"];

$stmt = $conn->prepare("SELECT full_name, phone_number, email, password, blood_group, birth_date, gender, weight, state, city, zip_code, area, landmark, donations, received, profile_image FROM register WHERE email = ?");

if (!$stmt) {
    die("Error: " . $conn->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($name, $phone, $email, $password, $bloodgroup, $birthdate, $gender, $weight, $state, $city, $zipcode, $area, $landmark, $donations, $received, $imageData);

if ($stmt->fetch()) {
    // Encode the binary data to Base64
    $base64Image = base64_encode($imageData);

    // Create the data URL
    $imageSrc = 'data:image/jpeg;base64,' . $base64Image; // Adjust the mime type if necessary

    // Store the data URL in session
    $_SESSION['imageSrc'] = $imageSrc;
} else {
    echo "No data found for this user.";
    $_SESSION['imageSrc'] = ''; // Clear the session variable if no data is found
}

$stmt->fetch();
$stmt->close();

// Calculate the number of donations from the "donations" table
$donations_count = 0;
if ($conn->query("SELECT COUNT(*) as total FROM donor WHERE email = '$email'")) {
    $result = $conn->query("SELECT COUNT(*) as total FROM donor WHERE email = '$email'");
    $data = $result->fetch_assoc();
    $donations_count = $data['total'];
}
$_SESSION["review"] = "t";
$stmt2 = "SELECT schedule_date AS date
        FROM (
            SELECT email, schedule_date, review, 
                   ROW_NUMBER() OVER (PARTITION BY email ORDER BY schedule_date DESC) AS rn
            FROM donor
        ) AS RankedEmails
        WHERE rn = 1 AND (review IS NULL OR review = '') AND email = ?";

// Prepare statement
$stmt = $conn->prepare($stmt2);
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("s", $email);

// Execute statement
if ($stmt->execute() === false) {
    die("Execute failed: " . $stmt->error);
}

// Bind result variables
$stmt->bind_result($schedule_date);

// Fetch result
$stmt->fetch();

// Close statement
$stmt->close();
if($schedule_date != "")
{$_SESSION["sche"] = $schedule_date;

$dateTime = new DateTime($schedule_date);

$schDate = date("d-m-y h:i:s");

$month = $dateTime->format('m');
$year = $dateTime->format('Y');
$day = $dateTime->format('d');

// Get the current date and time
$currentDateTime = new DateTime();

// Format the current date and time as "d-m-y H:i:s"
$currentDate = $currentDateTime->format('d-m-y H:i:s');

// Extract day, month, and year for the current date
$currentMonth = $currentDateTime->format('m');
$currentYear = $currentDateTime->format('Y');
$currentDay = $currentDateTime->format('d');

$_SESSION["reviewDone"] = false;
if ($dateTime < $currentDateTime && $_SESSION["reviewDone"] == false) {
  $_SESSION["review"] = "expire";
} elseif ($dateTime >= $currentDateTime) {
  $_SESSION["review"] = "";
}

if(isset($_SESSION["reviewDone"]) && $_SESSION["reviewDone"] == true) {
  $_SESSION["review"] = "done";
}}

?>
<?php
  include 'assets/components/header.php';
?>
    <style>
    /* New CSS for Dashboard Section */
    hr {
      border: none; /* Remove the default border */
      height: 1px; /* Set the height to control the thickness */
      background-color: #c5c7c9; /* Set the desired color */
      margin: 20px 0; /* Add some margin to separate form sections */
    }
    .dashboard-section {
      padding: 60px 0;
    }

    .dashboard-container {
      display: flex;
      justify-content: space-between;
      max-width: 1200px;
      margin: 0 auto;
    }

    .dashboard-form-container {
      flex-basis: 65%;
      margin-top: 6%;
    }

    .dashboard-form {
      background-color: #f4f4f4;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .dashboard-fields {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      grid-gap: 20px;
    }

    .dashboard-field {
      margin-bottom: 20px;
    }

    .donation-password-section {
      flex-basis: 30%;
      margin-top: 6%;
    }

    .donation-received-box {
      background-color: #f4f4f4;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .schedule-box {
      background-color: #f4f4f4;
      padding: 20px;
      border-radius: 8px;
    }

    .donation-received-box label {
      font-weight: 600;
    }

    .count {
      font-size: 24px;
      font-weight: 700;
      color: #6c63ff;
    }

    .password-change {
      background-color: #f4f4f4;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .password-change h2 {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .save-changes-btn,
    .logout-btn {
      display: block;
      width: 100%;
      max-width: 200px;
      margin: 0 auto;
      text-align: center;
      background-color: #6c63ff;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .save-changes-btn:hover,
    .logout-btn:hover {
      background-color: #524dff;
    }

        /*css for the date and weight fields of form*/
    .dashboard-field input[type="number"],
  .dashboard-field input[type="date"] {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 4px;
    transition: border-color 0.3s ease;
  }

  .dashboard-field input[type="number"]:focus,
  .dashboard-field input[type="date"]:focus {
    border-color: #6c63ff;
  }

  /* CSS for the password change fields */
  .password-change input[type="password"] {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 4px;
    transition: border-color 0.3s ease;
  }

  .password-change input[type="password"]:focus {
    border-color: #6c63ff;
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
  .review-section {
    /* max-width: 600px; */
    margin: 0 auto;
    padding: 20px;
    /* border: 1px solid #ccc; */
    background-color: #f4f4f4;
    /* font-family: Arial, sans-serif; */
    font-size: 1.8rem;
}

.review-form {
    display: flex;
    flex-direction: column;
    margin-top: 10px;
}

.review-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
    /* font-size: 1em; */
    height: 80px; /* Fixed height */
    resize: none; /*Disable resizing*/
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
    @media (max-width: 493px) {
      .container {
        padding-inline: 8px;
      }
      .dashboard-container {
        display: inline-block;
      }
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <?php
      if(isset($_SESSION["reviewDone"]) && $_SESSION["reviewDone"] == true) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Accepted!",
                    text: "Thank you for sharing your feedback!",
                    icon: "success",
                    confirmButtonText: "OK",
                    customClass: {
                        title: "swal2-title",
                        content: "swal2-content"
                  }
                });
            });
            </script>';
            unset($_SESSION["reviewDone"]);
      }
      if (isset($_SESSION["updated"]) && $_SESSION["updated"] == "success") {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Updated!",
                    text: "Your password was Updated Successfully.",
                    icon: "success",
                    confirmButtonText: "OK",
                    customClass: {
                        title: "swal2-title",
                        content: "swal2-content"
                  }
                });
            });
            </script>';
            unset($_SESSION["updated"]);
            unset($_SESSION["error_msg"]);
      }
      elseif (isset($_SESSION["updated"]) && $_SESSION["updated"] == "failure") {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error!',
                    text: '" . $_SESSION["error_msg"] . "',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
        unset($_SESSION["updated"]);
        unset($_SESSION["error_msg"]);
      }
      elseif (isset($_SESSION["updated_details"]) && $_SESSION["updated_details"] == "success") {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Updated!",
                    text: "Your contacts were Updated Successfully.",
                    icon: "success",
                    confirmButtonText: "OK",
                    customClass: {
                        title: "swal2-title",
                        content: "swal2-content"
                  }
                });
            });
            </script>';
        unset($_SESSION["updated_details"]);
        unset($_SESSION["error_msg"]);
      }
    ?>

  <section class="section dashboard-section" id="dashboard">
    <div class="container">
    <div class="donation-password-section">
          <!-- Donation and Received Counts Box -->
          <?php
            if($donations_count > 0 && $_SESSION["review"] == "") {
              // echo $_SESSION["review"];
              // echo "The type of intVar is: " . gettype($_SESSION["review"]) . "\n";
              echo '<div class="schedule-box">
            <div class="donation-count">
              <h3 style="text-decoration: underline;text-underline-offset: 3px;">Upcoming Schedule !</h3>
              <br>
            <label>Schedule Date:<p class="count" style="font-size: 20px;display: inline-block">&ensp;'.$day.'/'.$month.'/'.$year.'</p></label>
            <div class="count"></div>
          </div>';

              unset($_SESSION["donate"]);
            } 
            else if($_SESSION["review"] == "expire") {
              echo '<div class="review-section">
        <h3>Customer Reviews</h3>
            <form action="assets/actions/updations.php" method="post" class="review-form">
                <textarea name="review_text" placeholder="Write your review here..." rows="2"></textarea>
                <button class="btn" name="submitReview" type="submit">Submit Review</button>
            </form>
          </div>';
            }
          ?>
        </div>
      <div class="dashboard-container">
        <!-- User Information Form Section -->
        
        <div class="dashboard-form-container">
          <form class="dashboard-form" action="assets/actions/updations.php" method="post" enctype="multipart/form-data">
          <div class="dashboard-title">Dashboard  |  Welcome, <?php echo $name; ?> ! </div>
          <hr>
          <div class="dashboard-fields">
            <div class="dashboard-field">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="dashboard-field">
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo $email; ?>" disabled>
            </div>
            <div class="dashboard-field">
                <label>Phone:</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="dashboard-field">
                <label>Blood Group:</label>
                <input type="text" name="bloodgroup" value="<?php echo $bloodgroup; ?>">
            </div>
            <div class="dashboard-field">
                <label>Gender:</label>
                <input type="text" name="gender" value="<?php echo $gender; ?>">
            </div>
            <div class="dashboard-field">
                <label>Birthdate:</label>
                <input type="date" name="birthdate" value="<?php echo $birthdate; ?>">
            </div>
            <div class="dashboard-field">
                <label>Weight (kg):</label>
                <input type="number" name="weight" value="<?php echo $weight; ?>">
            </div>
            <div class="dashboard-field">
                <label>State:</label>
                <input type="text" name="state" value="<?php echo $state; ?>">
            </div>
            <div class="dashboard-field">
                <label>Zipcode:</label>
                <input type="text" name="zipcode" value="<?php echo $zipcode; ?>">
            </div>
            <div class="dashboard-field">
                <label>City:</label>
                <input type="text" name="city" value="<?php echo $city; ?>">
            </div>
            <div class="dashboard-field">
                <label>Area:</label>
                <input type="text" name="area" value="<?php echo $area; ?>">
            </div>
            <div class="dashboard-field">
                <label>Landmark:</label>
                <input type="text" name="landmark" value="<?php echo $landmark; ?>">
            </div>
            <div class="dashboard-field">
              <label>Select image to upload:</label>
              <input type="file" name="profile_image" required>
            </div>
          </div>
          <button type="submit" name="update_details" class="btn">Update Details</button>
        </form>
      </div>
        
        <!-- Donation/Received and Password Change Section -->
        <div class="donation-password-section">
          <!-- Donation and Received Counts Box -->
          <div class="donation-received-box">
            <div class="donation-count">
              <label>Donations:</label>
            <div class="count"><?php echo $donations_count; ?></div>
          </div>
            <div class="received-count">
              <label>Received:</label>
            <div class="count"><?php echo $received; ?></div>
          </div>
        </div>

          <!-- Password Change Section -->
<section class="password-change">
    <h2>Password Change</h2>
    <form action="assets/actions/updations.php" method="post">
        <div class="dashboard-field">
            <label>Current Password:</label>
            <input type="password" name="current_password" required>
        </div>
        <div class="dashboard-field">
            <label>New Password:</label>
            <input type="password" name="new_password" required>
        </div>
        <div class="dashboard-field">
            <label>Confirm New Password:</label>
            <input type="password" name="confirm_new_password" required>
        </div>
        <button type="submit" name="change_password" class="btn">Change Password</button>
    </form>
</section>

          <br>
          <a href="logout.php" class="btn logout-btn">Logout</a>
        </div>
      </div>
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
</body>
</html>