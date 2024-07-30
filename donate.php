<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  $_SESSION["notLoggedIn"] = true;
  header("Location: login.php");
  exit;
}
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Validate and sanitize form inputs
//     $email = $_SESSION["email"];
//     $name = isset($_POST["full_name"]) ? htmlspecialchars($_POST["full_name"]) : "";
//     $phone = isset($_POST["mobile_number"]) ? htmlspecialchars($_POST["mobile_number"]) : "";
//     $bloodgroup = isset($_POST["blood_group"]) ? htmlspecialchars($_POST["blood_group"]) : "";
//     $weight = isset($_POST["weight"]) ? htmlspecialchars($_POST["weight"]) : "";
//     $height = isset($_POST["height"]) ? htmlspecialchars($_POST["height"]) : "";
//     $conditions = isset($_POST["conditions"]) ? htmlspecialchars($_POST["conditions"]) : "";
//     $previous_donations = isset($_POST["previous_donations"]) ? htmlspecialchars($_POST["previous_donations"]) : "";
//     $last_donation = isset($_POST["last_donation"]) ? htmlspecialchars($_POST["last_donation"]) : "";
//     $schedule_date = isset($_POST["schedule_date"]) ? htmlspecialchars($_POST["schedule_date"]) : "";
//     $state = isset($_POST["state"]) ? htmlspecialchars($_POST["state"]) : "";
//     $city = isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : "";

//     $servername = "localhost";
//     $username = "root";
//     $dbpassword = "";
//     $dbname = "bloodhub";
//     $conn = new mysqli($servername, $username, $dbpassword, $dbname);
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }
//     // $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
//     $stmt = $conn->prepare("INSERT INTO donor (email, name, contact_number, blood_group, weight, medical_conditions, height, last_donation, schedule_date, state, city) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//     if (!$stmt) {
//         die("Error: " . $conn->error);
//     }
//     $stmt->bind_param("sssssssssss", $email, $name, $phone, $bloodgroup, $weight, $conditions, $height, $last_donation, $schedule_date, $state, $city);
//     if ($stmt->execute()) {
//         echo '<script>alert("Registration for Donation successful!");</script>';
//     } else {
//         echo '<script>alert("Error: Unable to register. Please try again later.");</script>';
//     }
//     $stmt->close();
//     $conn->close();
// }
?>

<?php
  include 'assets/components/header.php';
?>

  <style>
    .flatpickr-calendar {
        z-index: 1000; /* Ensure it appears above other content */
    }

    .flatpickr-calendar {
        margin-top: 5px; /* Adjust the margin to position it correctly below the input */
    }
    /* Form Styles */
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

    .check-eligibilty {
      padding: 30px;
      border: 1px solid var(--light-gray);
      border-radius: var(--radius-4);
      text-align: center;
      /* min-height: 100%; */
      border-radius: 8px;
      overflow: hidden;
      margin-block-end: 25px;
      font-size: var(--fs-4);
      transition: var(--transition);
    }

    .check-eligibilty:is(:hover, :focus-within) .card-title { color: var(--royal-blue-light); }

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
  .flatpickr-calendar {
        z-index: 1000; /* Ensure it appears above other content */
    }

    .flatpickr-calendar {
        margin-top: 5px; /* Adjust the margin to position it correctly below the input */
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
            if (isset($_SESSION["donate"]) && $_SESSION["donate"] == "success") {
              echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "Registered!",
                            text: "Check your email/message for further information.",
                            icon: "success",
                            confirmButtonText: "OK",
                            customClass: {
                                title: "swal2-title",
                                content: "swal2-content"
                          }
                        });
                    });
                    </script>';
              
              unset($_SESSION["donate"]);
            }
            elseif (isset($_SESSION["donate"]) && $_SESSION["donate"] == "failure") {
              echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "Registered!",
                            text: "Couldnt be Registered for Donation.",
                            icon: "failure",
                            confirmButtonText: "OK",
                            customClass: {
                                title: "swal2-title",
                                content: "swal2-content"
                          }
                        });
                    });
                    </script>';
              unset($_SESSION["donate"]);
            }
            ?>
          <div class="container">
            <div class="hero-content">
              <h1 class="h1 hero-title">Ensure You Are Eligible to Donate Blood</h1>
              <p class="section-subtitle">Please review the eligibility criteria before proceeding with your donation.</p>
              <p class="hero-text">
                Before you complete the blood donation form, it is essential to verify that you meet the eligibility criteria. Please take a moment to read through our eligibility guidelines to ensure a safe and successful donation process.
              </p><br>
                <div class="check-eligibilty">
                  <h3 class="h3">
                    <a href="canyoudonate.php" class="card-title">Check Eligibilty Criteria</a>
                  </h3>
                </div>
                <br><br>
            </div>
            <figure class="hero-banner">
              <img src="./assets/images/check_blood.jpg" width="587" height="839" alt="hero banner" class="w-100">
            </figure>
          </div>
            <!-- Login and Registration Form -->
            <div class="container">
              <div class="form-container">
                <div class="form-title">Donate Blood</div>
                <form action="assets/actions/donatepd.php" method="POST">
                  <!-- Login Information -->
                  <div class="form-section">
                    <div class="form-field">
                      <label for="full-name">FULL NAME OF DONOR</label>
                      <input type="text" id="full-name" name="full_name" required>
                    </div>
                    <div class="form-field">
                      <label for="mobile">CONTACT NUMBER</label>
                      <input type="text" id="mobile" name="mobile_number" required>
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
                    <!-- <div class="form-field">
                      <label for="birth-date">BIRTH DATE</label>
                      <input type="date" id="birth-date" name="birth_date" required>
                    </div> -->
                    <div class="form-field">
                      <label for="weight">WEIGHT (kg)</label>
                      <input type="text" id="weight" name="weight" required>
                    </div>
                    <div class="form-field">
                      <label for="height">Height (cm)</label>
                      <input type="text" id="height" name="height" required>
                    </div>
                    <div class="form-field">
                      <label for="conditions">MEDICAL CONDITIONS</label>
                      <select id="conditions" name="conditions" required>
                        <option value="" disabled selected>Select</option>
                        <option value="None">None</option>
                        <option value="Diabetes">Diabetes</option>
                        <option value="Hypertension">Hypertension</option>
                        <option value="SelectAll">Select All</option>
                      </select>
                    </div>
                    <div class="form-field">
                      <label for="previous_donations">PREVIOUS DONATIONS</label>
                      <select id="previous_donations" name="previous_donations" required>
                        <option value="" disabled selected>Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <div class="form-field">
                      <label for="last_donation">DATE OF LAST DONATION ( If applicable )</label>
                      <input type="date" id="last_donation" name="last_donation" placeholder="Select Date">
                    </div>
                  </div>
                  <!-- Contact Information -->
                  <div class="form-field">
                    <label for="schedule_date">SCHEDULE DATE</label>
                    <input type="date" id="schedule_date" name="schedule_date" placeholder="Select Date" required>
                  </div>
                  <div class="form-field">
                      <label for="state">STATE</label>
                      <select id="state" name="state" required>
                        <option value="" disabled selected>Select state</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>

                      </select>
                  </div>
                  <div class="form-field">
                      <label for="city">CITY</label>
                      <select id="city" name="city" required>
                        <option value="" disabled selected>Select City</option>

                      </select>
                  </div>
                  <button type="submit" class="btn">Donate Blood</button>
                </form>
              </div>
              <figure class="hero-banner">
                <img src="./assets/images/donate-blood_copy.png" width="587" height="839" alt="hero banner" class="w-100">
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
  <script>
    const citiesByState = {
        "Andhra Pradesh": ["Hyderabad", "Visakhapatnam", "Vijayawada", "Tirupati"],
        "Arunachal Pradesh": ["Itanagar", "Tawang", "Naharlagun", "Bomdila"],
        "Assam": ["Guwahati", "Silchar", "Dibrugarh", "Jorhat"],
        "Bihar": ["Patna", "Gaya", "Bhagalpur", "Muzaffarpur"],
        "Chhattisgarh": ["Raipur", "Bilaspur", "Korba", "Durg"],
        "Goa": ["Panaji", "Margao", "Vasco da Gama", "Mapusa"],
        "Gujarat": ["Ahmedabad", "Surat", "Vadodara", "Rajkot"],
        "Haryana": ["Chandigarh", "Gurgaon", "Faridabad", "Ambala"],
        "Himachal Pradesh": ["Shimla", "Manali", "Dharamshala", "Kullu"],
        "Jharkhand": ["Ranchi", "Jamshedpur", "Dhanbad", "Bokaro"],
        "Karnataka": ["Bangalore", "Mysore", "Hubli", "Mangalore"],
        "Kerala": ["Thiruvananthapuram", "Kochi", "Kozhikode", "Kannur"],
        "Madhya Pradesh": ["Bhopal", "Indore", "Gwalior", "Jabalpur"],
        "Maharashtra": ["Mumbai", "Pune", "Nagpur", "Nashik"],
        "Manipur": ["Imphal", "Bishnupur", "Thoubal", "Churachandpur"],
        "Meghalaya": ["Shillong", "Tura", "Jowai", "Nongstoin"],
        "Mizoram": ["Aizawl", "Lunglei", "Champhai", "Serchhip"],
        "Nagaland": ["Kohima", "Dimapur", "Wokha", "Mokokchung"],
        "Odisha": ["Bhubaneswar", "Cuttack", "Rourkela", "Berhampur"],
        "Punjab": ["Amritsar", "Ludhiana", "Chandigarh", "Jalandhar"],
        "Rajasthan": ["Jaipur", "Udaipur", "Jodhpur", "Kota"],
        "Sikkim": ["Gangtok", "Namchi", "Pelling", "Mangan"],
        "Tamil Nadu": ["Chennai", "Coimbatore", "Madurai", "Trichy"],
        "Telangana": ["Hyderabad", "Warangal", "Khammam", "Nizamabad"],
        "Tripura": ["Agartala", "Udaipur", "Ambassa", "Belonia"],
        "Uttar Pradesh": ["Lucknow", "Kanpur", "Agra", "Varanasi"],
        "Uttarakhand": ["Dehradun", "Nainital", "Haridwar", "Rishikesh"],
        "West Bengal": ["Kolkata", "Darjeeling", "Siliguri", "Asansol"]
    };

    document.getElementById('state').addEventListener('change', function() {
        const state = this.value;
        const citySelect = document.getElementById('city');
        
        // Clear existing options
        citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';
        
        if (state && citiesByState[state]) {
            // Add new options based on the selected state
            citiesByState[state].forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                citySelect.appendChild(option);
            });
        }
    });
</script>

  <!--custom js link-->
  <script src="./assets/js/script.js" defer></script>
  <!--ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('last_donation').setAttribute('max', today);
        flatpickr("#last_donation", {
          altInput: true, // Use alternative input
          altFormat: "F j, Y", // Format for the alternative input
          dateFormat: "Y-m-d", // Format for the actual input value
          maxDate: "today", // Restrict to today or earlier dates
          position: "below" // Force calendar to display below the input
        });
        // flatpickr("#schedule_date", {
        //     altInput: true, // Use alternative input
        //     altFormat: "F j, Y", // Format for the alternative input
        //     dateFormat: "Y-m-d", // Format for the actual input value
        //     minDate: "today", // Restrict to today or later dates
        //     position: "below" // Force calendar to display below the input
        // });
    });
</script>
</body>
</html>