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
    $district = isset($_POST["district"]) ? htmlspecialchars($_POST["district"]) : "";
    $area = isset($_POST["area"]) ? htmlspecialchars($_POST["area"]) : "";
    $landmarks = isset($_POST["landmarks"]) ? htmlspecialchars($_POST["landmarks"]) : "";

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "redstream_db";
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
    $stmt = $conn->prepare("INSERT INTO register (name, email, phone, password, bloodgroup, gender, birthdate, `weight(kg)`, state, zipcode, district, area, landmark) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }
    $stmt->bind_param("sssssssssssss", $name, $email, $phone, $hashedPassword, $bloodgroup, $gender, $birthdate, $weight, $state, $zipcode, $district, $area, $landmarks);
    if ($stmt->execute()) {
        echo '<script>alert("Registration successful!");</script>';
    } else {
        echo '<script>alert("Error: Unable to register. Please try again later.");</script>';
    }
    $stmt->close();
    $conn->close();
}
?>

<?php
  include 'assets/components/header.php';
?>

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <style>
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

    h1 {
        margin-bottom: 20px;
    }

    form {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    input[type="text"] {
        width: 70%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .sub {
        padding: 10px 20px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 10px;
    }

    .sub:hover {
        background-color: #0056b3;
    }

    #results {
        margin-top: 20px;
    }

    .result-item {
        background-color: #f9f9f9;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
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
    @media (max-width: 370px) {
      .prof {
        position: relative;
        left: 4vw;
      }
    }

  table {
    /* width: 100%; */
    width: 100%;
    max-width: 100%;
    table-layout: auto;
    border-collapse: collapse;
    margin-top: 20px;
  }
  .table-container {
    width: 100%;
    overflow-x:visible;
    margin-top: 10px;
  }
  .odd {
    background-color: #f2f2f2 !important; /* Color for odd rows */
  }
  .even {
      background-color: #ffffff !important; /* Color for even rows */
  }
  th, td {
    white-space: nowrap;
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }
  th {
    background-color: #f2f2f2;
    color: hsl(217, 100%, 12%);
  }
  td {
    color: hsl(0, 0%, 12%);
  }
  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  .dataTables_wrapper .dataTables_filter {
    float: none;
    text-align: center; /* Center align the search input */
    margin-bottom: 20px; /* Add space below the search input */
  }
  .dataTables_wrapper .dataTables_filter input {
    height: 50px;
    border-style: solid;
    border-width: 1px;
    display: inline-block;
    /* width: 70%; */
    /* float: left; */
    /* margin-right: 5px;  */
    /* Space between input and button */
  }
  .searchBar {
    font-size: 12px;
    font-weight: 100;
    padding: 10px;
    color: hsl(0, 0%, 18%);
    font-family: var(--ff-poppins);
    font-size: 1.7rem;
    border-radius: 5px;
    /* font-weight: var(--fw-800); */
    width: 80%;
    /* float: left; */
    outline: none;
  }
  .dataTables_filter {
    width: 100%;
  }
  .dataTables_wrapper .dataTables_filter button {
    display: inline-block;
    vertical-align: middle;
  }
  .dataTables_length {
    width: 65px;
    position: relative;
    top: -29px;
  }
  .dataTables_length select {
    height: 48px;
    outline: none;
  }
  .dataTables_wrapper .dataTables_length {
    /* width: 10%; */
    float: right;
    margin-top: 10px;
  }
  .profile-img {
    width: 30px;
    margin-right: 12px;
    display: inline-block;
    position: relative;
    top: 5px;
  }
  #datatable th:nth-child(1), #datatable td:nth-child(1) { width: 0px; } /* Sr No. */
  #datatable th:nth-child(2), #datatable td:nth-child(2) { width: 50px; } /* Donor Name */
  #datatable th:nth-child(3), #datatable td:nth-child(3) { width: 60px; } /* Blood Group */
  #datatable th:nth-child(4), #datatable td:nth-child(4) { width: 50px; } /* State */
  #datatable th:nth-child(5), #datatable td:nth-child(5) { width: 40px; } /* City */
#datatable th:nth-child(7), #datatable td:nth-child(7) { width: 50px; } /* Recently Donated */
#datatable th:nth-child(8), #datatable td:nth-child(8) { width: 50px; } /* Review */
  @media (max-width: 768px) {
  #datatable th, #datatable td {
    padding: 8px 1px;
    font-size: 11px;
  }

  #datatable th, #datatable td {
    white-space: nowrap;
  }

  /* Optional: Adjust font size or hide less important columns on very small screens */
  /* #datatable td:nth-child(6), Medical Conditions */
  /* #datatable td:nth-child(7), Recently Donated */
  /* #datatable td:nth-child(8) { Review */
    /* display: none; */
  }
  @media (max-width: 514px) {
  #datatable th, #datatable td {
    padding: 8px 1px;
    font-size: 11px;
  }
  .table-container {
    width: 100%;
    overflow-x:auto;
  }
  .searchBar {
    width: 70%;
    float: left;
  }

  .dataTables_length select{
    width: 65px
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
    <section class="section service" id="service" aria-label="service">
    <div class="container">
      <p class="section-subtitle text-center">Heroes among you</p>
      <h2 class="h2 section-title text-center">RECENT DONORS</h2>
        <!-- <form id="searchForm" style="margin-top:40px;">
            <input type="text" id="searchInput" placeholder="Enter blood type or location" required>
            <button type="submit" class="sub">Search</button>
        </form> -->
        <!-- <div class="card"> -->
           <!-- <div class="card-body"> -->
           <div class="table-container">
            <table id="datatable" class="table table-striped table-bordered table-hover">
              <thead>
                  <tr>
                      <th style="background-color: #216aca55;">Sr No.</th>
                      <th style="background-color: #216aca55;">Donor Name</th>
                      <th style="background-color: #216aca55;">Blood Group</th>
                      <th style="background-color: #216aca55;">State</th>
                      <th style="background-color: #216aca55;">City</th>
                      <th style="background-color: #216aca55;">Recently Donated</th>
                      <th style="background-color: #216aca55;">Review</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "bloodhub";
      
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }
      
                  $sql = "SELECT d.*
FROM donor d
JOIN (
    SELECT email, MAX(schedule_date) AS max_date
    FROM donor
    GROUP BY email
) max_dates ON d.email = max_dates.email AND d.schedule_date = max_dates.max_date
WHERE NOT (d.review IS NULL OR d.review = '');";
                  $result = $conn->query($sql);
                  $srno = 1;
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td data-label='Sr No.'>" . $srno . "</td>";
                          echo "<td data-label='Donor Name'>" . $row["name"] . "</td>";
                          echo "<td data-label='Blood Group'>" . $row["blood_group"] . "</td>";
                          echo "<td data-label='State'>" . $row["state"] . "</td>";
                          echo "<td data-label='City'>" . $row["city"] . "</td>";
                          $date = $row["schedule_date"];
                          $year = date('Y', strtotime($date));
                          $month = date('m', strtotime($date));
                          $day = date('d', strtotime($date));
                          echo "<td data-label='Recently Donated'>" . $day."/".$month."/".$year . "</td>";
                          echo "<td data-label='Review'>" . $row["review"] . "</td>";
                          echo "</tr>";
                          $srno++;
                      }
                  } else {
                      echo "<tr><td colspan='7'>0 results</td></tr>";
                  }
                  $conn->close();
                  ?>
              </tbody>
          </table>
<!-- </div> -->
  
          
              <!-- </div>   -->
          
              </div>        
          
        <div id="results"></div>
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

    $(document).ready(function(){

 $("#datatable").dataTable();

});

  </script>
      <script>
        $(document).ready(function() {
            // Select the label element within the div with id 'datatable_filter' and remove the text 'Search:'
            var label = $('#datatable_filter label');
            if (label.length > 0) {
                label.contents().filter(function() {
                    return this.nodeType === 3; // NodeType 3 is Text node
                }).each(function() {
                    this.textContent = '';
                });
            }
            $("#datatable tbody tr").removeClass("odd even");
            $("#datatable tbody tr:odd").addClass("odd");
            $("#datatable tbody tr:even").addClass("even");
        });
    </script>
    
      <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            // Select the input element within the label inside the div with id 'datatable_filter'
            var input = document.querySelector('#datatable_filter label input');
            
            // Ensure the input element exists before adding the class
            if (input) {
                input.classList.add('searchBar'); // Add the desired class
            }
            var searchBar = document.querySelector('.searchBar');

        // Set the placeholder attribute
        searchBar.placeholder = "Search here...";
        });
    </script>
</body>
</html>