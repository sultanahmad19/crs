<?php
session_start();
require_once('db.php');


$name = '';
$email = $_SESSION['email'];
$phone = '';
$address = '';
// Fetch existing user details
$sql = "SELECT name FROM users WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
  mysqli_stmt_bind_param($stmt, "s", $email);
  if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_bind_result($stmt, $name,);
    mysqli_stmt_fetch($stmt);
  } else {
    echo "Failed to fetch user details: " . mysqli_error($con);
  }
  mysqli_stmt_close($stmt);
} else {
  echo "Preparation of the statement failed: " . mysqli_error($con);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }

  // if (isset($_POST['phone'])) {
  //   $phone = $_POST['phone'];
  // }

  // if (isset($_POST['address'])) {
  //   $address = $_POST['address'];
  // }



  // Update the user details
  // $updateSql = "UPDATE users SET name = ?, phone = ?, address = ? WHERE email = ?";
  $updateSql = "UPDATE users SET name = ? WHERE email = ?";
  $stmt = mysqli_prepare($con, $updateSql);

  if ($stmt) {
    // mysqli_stmt_bind_param($stmt, "ssss", $name, $phone, $address, $email);
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);

    if (mysqli_stmt_execute($stmt)) {
      header('Location: profile.php');
    } else {
      echo "Failed to update profile: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "Preparation of the statement failed: " . mysqli_error($con);
  }

  mysqli_close($con);
}
?>






<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>AridEduToolKit</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="manifest" href="site.php" />
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
  <!-- Place favicon.ico in the root directory -->

  <!-- CSS here -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/animate.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/fontawesome-all.min.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="css/slick.css" />
  <link rel="stylesheet" href="css/meanmenu.css" />
  <link rel="stylesheet" href="css/default.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- Main-start -->
  <div class="container">
    <div class="main-body">
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
      </nav>
      <div class="row">
        <!-- <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                <div class="mt-3">
                  <h4>John Doe</h4>
                  <button class="btn btn-outline-primary">Message</button>
                </div>
              </div>
              <hr class="my-4">
              <ul class="list-group list-group-flush">
              </ul>

            </div>

          </div>
          <br>
        </div> -->
        <div class="col-lg-8 my-5 mx-auto">
          <div class="card">
            <div class="card-body">
              <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                  </div>
                </div>

                <!-- <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                  </div>
                </div> -->

                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  </div>
  </div>

  <!-- Main-end -->

  <!-- footer start -->
  <footer id="Contact">
    <div class="footer-area primary-bg pt-80">
      <div class="container">
        <div class="footer-top pb-35">
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="footer-widget mb-30">
                <div class="footer-logo">
                <img src="img/logo/logo.jpg" alt="Your Logo" width="100">
                </div>
                <div class="footer-para">
                  <p>
                    Discover a smarter way to access university course content with our content recommendation system. We provide tailored resources to enhance your learning experience, covering a wide range of academic disciplines.
                  </p>
                </div>
                <div class="footer-socila-icon">
                  <span>Follow Us</span>
                  <div class="footer-social-icon-list">
                    <ul>
                      <li>
                        <a href="#"><span class="ti-facebook"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="ti-dribbble"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="ti-google"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="ti-pinterest"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="ti-instagram"></span></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="footer-widget mb-30">
                <div class="footer-heading">
                  <h1>Quick Links</h1>
                </div>
                <div class="footer-menu clearfix">
                  <ul>
                    <li><a href="about_us.php">Who we are</a></li>
                    <li><a href="course_01.php">Courses</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="resources.php">Learning Resources</a></li>
                    <li><a href="#">Assignment & Quizzes</a></li>
                    <li><a href="#">Chat with Admin</a></li>
                    <li><a href="faq.php">FAQs</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 d-lg-none d-xl-block col-md-6">
              <div class="footer-widget mb-30">
                <div class="footer-heading">
                  <h1>Recent Post</h1>
                </div>
                <div class="recent-post d-flex mb-25">
                  <div class="recent-post-thumb">
                    <img src="img/post/recent_post1.jpg" alt="" />
                  </div>
                  <div class="recent-post-text">
                    <p>Prime Minister Laptop Scheme</p>
                    <div class="footer-time">
                      <span class="ti-time"></span>
                      <span class="footer-published-time">05 May 2018</span>
                    </div>
                  </div>
                </div>
                <div class="recent-post d-flex">
                  <div class="recent-post-thumb">
                    <img src="img/post/recent_post1.jpg" alt="" />
                  </div>
                  <div class="recent-post-text">
                    <p>Admission Opened in Department of Social Sciences</p>
                    <div class="footer-time">
                      <span class="ti-time"></span>
                      <span class="footer-published-time">05 May 2018</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="footer-widget mb-30">
                <div class="footer-heading">
                  <h1>Contact Us</h1>
                </div>
                <div class="footer-contact-list">
                  <div class="single-footer-contact-info">
                    <span class="ti-headphone"></span>
                    <span class="footer-contact-list-text">+92-51-9292195 </span>
                  </div>
                  <div class="single-footer-contact-info">
                    <span class="ti-email"></span>
                    <span class="footer-contact-list-text">admissions@uaar.edu.pk</span>
                  </div>
                  <div class="single-footer-contact-info">
                    <span class="ti-location-pin"></span>
                    <span class="footer-contact-list-text">PMAS-Arid Agriculture University Rawalpindi,
                      Shamsabad, Muree Road Rawalpindi - Pakistan.
                    </span>
                  </div>
                </div>
                <div class="opening-time">
                  <span>Opening Hour</span>
                  <span class="opening-date">
                    Mon - Fri : 08:00 am - 06:00 pm
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom pt-25 pb-25">

        </div>
      </div>
    </div>
  </footer>
  <!-- footer end -->

  <!-- JS here -->
  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/one-page-nav-min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/ajax-form.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.meanmenu.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/jquery.barfiller.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/search.js"></script>

  <script src="../admin/alert.js"></script>



  <script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
      event.preventDefault();

      fetch('logout.php', {
          method: 'POST',
        })
        .then(response => response.json())
        .then(data => {

        })
        .catch(error => {
          console.error('An error occurred:', error);
        });
      alert("You have been logged out.")
      location.reload();

    });
  </script>





</body>

</html>