<?php
session_start();
  include 'assets/components/header.php';
?>
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
  <link rel="stylesheet" href="assets/components/assets/css/pagination.css">
  <style>
        .paginationjs-pages li>a {
          min-width: 40px !important;
          height: 42px !important;
          line-height: 42px !important;
        }
        .paginationjs-pages li.active>a {
          background-color: hsla(225, 68%, 53%, 0.907) !important;
          min-width: 40px !important;
          height: 44px !important;
          line-height: 44px !important;
        }
        ul, li {
            list-style: none;
        }

        #wrapper {
            width: 900px;
            margin: 20px auto;
        }

        .data-container {
            margin-top: 20px;
        }

        .data-container ul {
            padding: 0;
            margin: 0;
        }

        .data-container li {
            margin-bottom: 5px;
            padding: 5px 10px;
            background: #ffffff;
        }
        .paginationjs {
          display: flex;
          justify-content: center;
          margin-top: 30px;
        }
        .blog-list {
          opacity: 1;
          transition: opacity 0.2s;
        }

        .blog-list.fade-out {
          opacity: 0;
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

      <!--SERVICE-->
      <!--ABOUT-->

      <!--services-->

      <!--CTA-->

      <!--BLOG-->
      <section class="section blog" id="blog" aria-label="blog">
        <div class="container">
          <!-- <p class="section-subtitle text-center">Our Blog</p> -->
          <h2 class="h2 section-title text-center" style="padding: 25px 0px;">Read Our Latest Blog & News</h2>
          <div class="data-container">
          </div>
          <!-- <div class="data-container"></div> -->
          <div id="pagination-demo1"></div>
        </div>
      </section>
    </article>
  </main>

  <a href="assets/images/cancer_prevention.jpg"></a>
  <!--FOOTER-->
  <?php
    include 'assets/components/footer.php';
  ?>

<?php
ob_start();
// Check if the form is submitted
if(isset($_SESSION['status']))
{
  $mssg=$_SESSION['status'];
  if ($mssg != "") {
      echo $mssg;
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
      session_destroy();
  }
  else {
    // Invalid email address, show the popup message
    echo '<script>showPopup("Error: Invalid email address. Please enter a valid email.");</script>';
  }
}
ob_end_flush();
?>

  <!--BACK TO TOP-->
  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up" aria-hidden="true"></ion-icon>
  </a>
  <script src="http://code.jquery.com/jquery-3.6.1.js"></script>
  <script src="../src/pagination.js"></script>
  <script>
    $(function() {
      (function(name) {
        var container = $('#pagination-' + name);
        if (!container.length) return;
    
        var sources = function () {
          var result = [`
              <div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/the-life-saving-benefits-of-donating-blood.png" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="blogContent.php" class="card-title">The Lifesaving Impact of Blood Donation</a>
                  </h3>
                  <p class="card-text">
                    Discover how a single blood donation can save multiple lives and understand the science behind it. Learn about the profound impact your donation has on patients in critical need of blood.
                  </p>
                  <a href="blogContent.php" class="card-link">Read More</a>
                </div>
              </div>
            `,`
            <div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/myths-and-taboos-of-blood-donation.jpg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="blogContent1.php" class="card-title">Top 10 Myths About Blood Donation Debunked</a>
                  </h3>
                  <p class="card-text">
                    Uncover the truth behind common misconceptions about blood donation. This post debunks myths and provides factual information to encourage more people to donate blood confidently.
                  </p>
                  <a href="blogContent1.php" class="card-link">Read More</a>
                </div>
              </div>
            `,`
            <div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/blooddonation-1592231841.webp" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">Health Benefits of Donating Blood</a>
                  </h3>
                  <p class="card-text">
                    Learn how donating blood can positively impact your health. From improved cardiovascular health to reduced cancer risk, discover the many benefits of giving the gift of life.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>
            `,`
            <div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/Can_I_Donate_Blood_Check_Your_Eligibility_Today_561f773b49-modified.png" width="880" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="blogContent3.php" class="card-title">Who Can Donate? Understanding Blood Donation Eligibility</a>
                  </h3>
                  <p class="card-text">
                    Find out if you’re eligible to donate blood and what factors affect eligibility. Clear up any confusion with comprehensive eligibility criteria and real-life stories from diverse donors.
                  </p>
                  <a href="blogContent3.php" class="card-link">Read More</a>
                </div>
              </div>
            `,`<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/RYTHM_World-Blood-Donor-Day_02-WB.jpg" width="880" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="blogContent4.php" class="card-title">The Different Types of Blood Donations Explained</a>
                  </h3>
                  <p class="card-text">
                    Whole blood, plasma, and platelets—what’s the difference? This post explains each type of donation, their specific medical uses, and how to choose the best type for your donation.
                  </p>
                  <a href="blogContent4.php" class="card-link">Read More</a>
                </div>
              </div>
            `,`<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/first_time_donation.jpeg" width="880" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="blogContent5.php" class="card-title">Preparing for Your First Blood Donation</a>
                  </h3>
                  <p class="card-text">
                    Tips and advice to ensure a successful first donation. Learn how to prepare physically and mentally, what to eat, and what to expect during your visit to the donation center.
                  </p>
                  <a href="blogContent5.php" class="card-link">Read More</a>
                </div>
              </div>
            `,`
            <div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/journey_of_blood-modified.png" width="880" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">The Journey of Donated Blood</a>
                  </h3>
                  <p class="card-text">
                    Follow the path of your donation from the donor center to the patient in need. This illustrated guide shows each step of the process, including testing, storage, and transfusion to patients.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>
            `,
            `<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/donor_stories-modified.png" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">Real Stories: Blood Donors and Recipients</a>
                  </h3>
                  <p class="card-text">
                    Heartwarming stories from people whose lives were changed by blood donations. Read personal interviews and watch videos documenting the journeys of donors and the recipients they helped.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>
            `,
            `<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/upcoming_blood_drive.jpeg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">Upcoming Blood Drives: How to Get Involved</a>
                  </h3>
                  <p class="card-text">
                    Join us at our next blood drive event in your community. Get details on upcoming events, learn how to register, and see what you can expect at the blood drive, including past highlights.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>
            `,
            `<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/volunteer_blood.jpg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">Volunteering at Blood Donation Centers</a>
                  </h3>
                  <p class="card-text">
                    Ways you can help beyond donating blood. Explore volunteer opportunities, understand roles and responsibilities, and hear testimonials from current volunteers about their impactful experiences.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>`,
            `<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/technology_donation.webp" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">Innovations in Blood Donation Technology</a>
                  </h3>
                  <p class="card-text">
                    Explore the latest advancements making blood donation safer and more efficient. Learn about new technologies in blood collection, testing, and storage, and hear from experts in the field.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>`,
            `<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/cancer_prevention.jpg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">How Blood Donation Helps Cancer Patients</a>
                  </h3>
                  <p class="card-text">
                    Learn about the critical role blood donations play in cancer treatment. Read stories from cancer patients who have benefited from donations and explanations from oncologists about blood products' usage.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>`,
            `<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/blood_donor_ambassador.jpg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">Meet Our Blood Donation Ambassadors</a>
                  </h3>
                  <p class="card-text">
                    Get to know the faces behind our advocacy and awareness campaigns. Meet prominent figures and everyday heroes who advocate for blood donation, learn their stories, and see their impact.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>`,
            `<div class="blog-card">
                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="assets/images/question_and_answer.jpg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <time class="time" datetime="2024-07-17">17th July 2024</time>
                  </div>
                </figure>
                <div class="card-content">
                  <h3 class="h3">
                    <a href="#" class="card-title">Common Questions About Blood Donation Answered</a>
                  </h3>
                  <p class="card-text">
                    Answers to the most frequently asked questions about blood donation. This comprehensive FAQ covers the donation process, eligibility, and post-donation care, supported by expert advice and insights.
                  </p>
                  <a href="#" class="card-link">Read More</a>
                </div>
              </div>`
            ];
    
          // for (var i = 1; i < 15; i++) { // Adjusted loop to generate 15 items
          //   var t = `
          //     <div class="blog-card">
          //       <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
          //         <img src="./assets/images/blog-1.jpg" width="1180" height="800" loading="lazy"
          //           alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">
          //         <div class="card-badge">
          //           <ion-icon name="calendar-outline"></ion-icon>
          //           <time class="time" datetime="2024-07-17">17th July 2024</time>
          //         </div>
          //       </figure>
          //       <div class="card-content">
          //         <h3 class="h3">
          //           <a href="#" class="card-title">Write whatever you want here. Blah Blah Blah</a>
          //         </h3>
          //         <p class="card-text">
          //           When it spins, when it swirls When it whirls, when it twirls Two little beautiful girls Lookin' puzzled, in a daze I know it's confusing you
          //         </p>
          //         <a href="#" class="card-link">Read More</a>
          //       </div>
          //     </div>
          //   `;
          //   result.push(t);
          // }
    
          return result;
        }();
    
        var options = {
      dataSource: sources,
      pageSize: 6, // Set the page size to 6 items per page
      callback: function (response, pagination) {
        window.console && console.log(response, pagination);

        var dataHtml = '<ul class="blog-list">';

        // Loop through only the items for the current page
        $.each(response, function (index, item) {
          dataHtml += '<li>' + item + '</li>';
        });

        dataHtml += '</ul>';

        var $prevContent = container.prev();

        // Fade out the current content
        $prevContent.find('.blog-list').addClass('fade-out');

        setTimeout(function() {
          // Replace the content after the fade-out transition
          $prevContent.html(dataHtml);

          // Remove fade-out class and trigger fade-in
          $prevContent.find('.blog-list').removeClass('fade-out');

          // Scroll to the top of the blog section
          $('html, body').animate({
            scrollTop: $('#blog').offset().top
          }, 500);
        }, 500); // This timeout should match the CSS transition duration
      },
      afterPageOnClick: function (event, pageNumber) {
        // Store the current page number in local storage
        localStorage.setItem('currentPage', pageNumber);
      }
    };

    var currentPage = localStorage.getItem('currentPage') || 1;
    options.pageNumber = parseInt(currentPage, 10);

    container.pagination(options);

    container.addHook('beforeInit', function () {
      window.console && console.log('beforeInit...');
    });

    container.addHook('beforePageOnClick', function () {
      window.console && console.log('beforePageOnClick...');
      //return false
    });
  })('demo1');
});
</script>
    
  <!--custom js link-->
  <script src="./assets/components/assets/js/pagination.js" defer></script>
  <!--ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
