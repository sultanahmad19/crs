<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Content Recommendation System</title>
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
<style>
  #myp{
    text-align:justify;
  }
</style>
</head>


<body>
<?php include('nav.php'); ?>

  <!-- slider-start -->
  <div class="slider-area pos-relative">
    <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url(img/slider/slider_bg_1.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 col-md-12">
            <div class="slider-content slider-content-2">
              <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s">
                <span>Education makes you a better-learned person</span><br />
              </h1>
              <p data-animation="fadeInUp" data-delay=".4s">
                Education is the key to unlocking human potential and
                fostering a brighter future for individuals and society as a
                whole. It empowers individuals and society as whole. It
                empowers individuals with knowledge and critical thinking
                skills, enabling them to make informed decisions and
                contribute to the betterment of the world.
              </p>

              <?php
                // Check if the user is logged in
                if (isset($_SESSION['email'])) {
                    // If logged in, redirect to the course page
                    echo '<button class="theme-btn" data-animation="fadeInUp" data-delay=".6s">
                              <a href="course_01.php"><span class="btn-text">Our Courses</span></a>
                          </button>';
                } else {
                    // If not logged in, redirect to the signup page
                    echo '<button class="theme-btn" data-animation="fadeInUp" data-delay=".6s">
                              <a href="signup.php"><span class="btn-text">Sign Up</span></a>
                          </button>';
                }
              ?>


             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- slider-end -->
  <!-- about start -->
  <div id="about" class="about-area pt-100 pb-70">
    <div class="container">
      <div class="row">
        <div class="col-xl-7 col-lg-7">
          <div class="about-title-section mb-30">
            <h1>Welcome To Our CRS</h1>
            <p id="myp">
              Welcome to our cutting-edge content recommendation system
              tailored for IT students. In the fast-paced world of Information
              Technology, staying up-to-date with the latest knowledge and
              trends is paramount. Our platform is designed to make the
              learning journey smoother and more efficient. Powered by
              advanced algorithms, it understands your unique learning
              preferences and suggests the most relevant resources, courses,
              and materials to help you excel in your IT studies. Whether
              you're a budding programmer, a cybersecurity enthusiast, or a
              network engineer in the making, our content recommendation
              system ensures that you have access to the right educational
              materials, enabling you to reach your full potential in the
              dynamic field of IT. Join us today and embark on a personalized
              learning journey that maximizes your educational experience.
            </p>
          </div>
        </div>
        <div class="col-xl-5 col-lg-5">
          <div class="about-right-img mb-30">
            <img src="img/about/about-right.png" alt="" />
          </div>
        </div>
      </div>
      <div class="row pt-65">
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="feature-wrapper mb-30">
            <div class="feature-title-heading">
              <h3>Realtime Chat Support</h3>
              <span>01</span>
            </div>
            <div class="feature-text">
              <p>
                We offers a real-time chat feature, facilitating instant
                communication between students and the admin.
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="feature-wrapper mb-30">
            <div class="feature-title-heading">
              <h3>User-Friendly Experience</h3>
              <span>02</span>
            </div>
            <div class="feature-text">
              <p>
                We thoughtfully designed to be incredibly user-friendly,
                making navigation and content access a breeze for everyone.
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="feature-wrapper mb-30">
            <div class="feature-title-heading">
              <h3>Free Learning Resources</h3>
              <span>03</span>
            </div>
            <div class="feature-text">
              <p>
                We provides free learning resources, empowering students with
                accessible and valuable educational materials.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- about end -->
  <!-- courses start -->
  <div id="courses" class="courses-area courses-bg-height pt-100 pb-70" style="background-image: url(img/courses/courses_bg.png)">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
          <div class="section-title mb-50 text-center">
            <div class="section-title-heading mb-20">
              <h1 class="white-color">Our Latest Courses</h1>
            </div>
            <div class="section-title-para">
              <p class="white-color">
                Discover latest course offerings related to your university,
                designed to align perfectly with your academic journey.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="courses-list">
        <div class="row courses-active">
          <div class="col-xl-12">
            <div class="courses-wrapper course-radius-none mb-30">
              <div class="courses-thumb">
                <a href="course_01.php"><img src="img/courses/single_courses_thumb_01.jpg" style="width:70%" alt="" /></a>
              </div>
              <!-- <div class="courses-author">
                <img src="img/courses/coursesauthor1.png" alt="" />
              </div> -->
              <div class="course-main-content clearfix">
                <div class="courses-content">
                  <div class="courses-category-name">
                    <span>
                      <a href="#">Software Engineering</a>
                    </span>
                  </div>
                  <div class="courses-heading">
                    <h1>
                      <a href="course_01.php">Requirement Engineering</a>
                    </h1>
                  </div>
                  <div class="courses-para">
                    <p>Explore More>></p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-xl-12">
            <div class="courses-wrapper course-radius-none mb-30">
              <div class="courses-thumb">
                <a href="course_01.php"><img src="img/courses/single_courses_thumb_02.jpg" style="width:70%" alt="" /></a>
              </div>
              <!-- <div class="courses-author">
                <img src="img/courses/coursesauthor1.png" alt="" />
              </div> -->
              <div class="course-main-content clearfix">
                <div class="courses-content">
                  <div class="courses-category-name">
                    <span>
                      <a href="#">Computer Science</a>
                    </span>
                  </div>
                  <div class="courses-heading">
                    <h1>
                      <a href="course_01.php">Web Technologies</a>
                    </h1>
                  </div>
                  <div class="courses-para">
                    <p>Explore More>></p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-xl-12">
            <div class="courses-wrapper course-radius-none mb-30">
              <div class="courses-thumb">
                <a href="course_01.php"><img src="img/courses/single_courses_thumb_03.jpg" style="width:70%" alt="" /></a>
              </div>
              <!-- <div class="courses-author">
                <img src="img/courses/coursesauthor1.png" alt="" />
              </div> -->
              <div class="course-main-content clearfix">
                <div class="courses-content">
                  <div class="courses-category-name">
                    <span>
                      <a href="#">Artificial Intelligence</a>
                    </span>
                  </div>
                  <div class="courses-heading">
                    <h1>
                      <a href="course_01.php">Operating System</a>
                    </h1>
                  </div>
                  <div class="courses-para">
                    <p>Explore More>></p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

        </div>
      </div>
      <div class="text-center">
        <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s">
          <a href="course_01.php"><span class="btn-text">Explore More Courses</span></a>
        </button>
      </div>
    </div>
  </div>
  <!-- courses end -->

  <!-- testimonials start -->
  <div class="testimonilas-area pt-100 pb-90">
    <!-- <div class="container">
      <div class="row">
        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
          <div class="section-title mb-50 text-center">
            <div class="section-title-heading mb-20">
              <h1 class="primary-color">What Our Students Say</h1>
            </div>
            <div class="section-title-para">
              <p class="gray-color">
                Check out our latest reviews to hear what our satisfied users have to say about their experiences, and discover why our platform is the trusted choice for quality education and support.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="testimonilas-list">
        <div class="row testimonilas-active">
         
        </div>
      </div>
    </div> -->
  </div>

  <!-- events start -->
  <div id="events" class="events-area events-bg-height pt-100 pb-95" style="background-image: url(img/courses/courses_bg.png)">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
          <div class="section-title mb-50 text-center">
            <div class="section-title-heading mb-20">
              <h1 class="white-color">Latest Learning Resources</h1>
            </div>
            <div class="section-title-para">
              <p class="white-color">Explore our latest learning resources, meticulously curated to keep you ahead of the curve, with up-to-date, high-quality materials that empower your educational journey.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="events-list mb-30">
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="single-events mb-30">
              <div class="events-wrapper">
                <div class="events-inner d-flex">
                  <div class="events-text events-text-3">
                    <div class="event-text-heading d-flex mb-20">
                      <div class="events-calendar text-center">
                        <span class="date">18</span>
                        <span class="month">Sep, 2018</span>
                      </div>
                      <div class="events-text-title events-text-title-3">
                        <a href="https://www.programiz.com/cpp-programming/oop">
                          <h4>OOP Concept in C++</h4>
                        </a>
                        <div class="time-area">
                          <span class="ti-time"></span>
                          <span class="published-time">05:23 AM - 09:23 AM</span>
                        </div>
                      </div>
                    </div>
                    <div class="events-para">
                      <p>Detailed article on all OOP Concepts in C++</p>
                    </div>
                    <div class="events-speaker">
                      <h2>Subject : <span>Programming Fundamentals</span></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="single-events mb-30">
              <div class="events-wrapper">
                <div class="events-inner d-flex">
                  <div class="events-text events-text-3">
                    <div class="event-text-heading d-flex mb-20">
                      <div class="events-calendar text-center">
                        <span class="date">20</span>
                        <span class="month">Sep, 2018</span>
                      </div>
                      <div class="events-text-title events-text-title-3">
                        <a href="#">
                          <h4>Coding Languages in Web Development</h4>
                        </a>
                        <div class="time-area">
                          <span class="ti-time"></span>
                          <span class="published-time">05:23 AM - 09:23 AM</span>
                        </div>
                      </div>
                    </div>
                    <div class="events-para">
                      <p>Differences between different web technologies</p>
                    </div>
                    <div class="events-speaker">
                      <h2>Subject : <span>Web Technologies</span></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="single-events mb-30">
              <div class="events-wrapper">
                <div class="events-inner d-flex">
                  <div class="events-text events-text-3">
                    <div class="event-text-heading d-flex mb-20">
                      <div class="events-calendar text-center">
                        <span class="date">25</span>
                        <span class="month">Sep, 2018</span>
                      </div>
                      <div class="events-text-title events-text-title-3">
                        <a href="#">
                          <h4>Latest Semantics Tag</h4>
                        </a>
                        <div class="time-area">
                          <span class="ti-time"></span>
                          <span class="published-time">05:23 AM - 09:23 AM</span>
                        </div>
                      </div>
                    </div>
                    <div class="events-para">
                      <p>The latest HTML tags that will help you with better responsive design.</p>
                    </div>
                    <div class="events-speaker">
                      <h2>Subject : <span>Web Technologies</span></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="single-events mb-30">
              <div class="events-wrapper">
                <div class="events-inner d-flex">
                  <div class="events-text events-text-3">
                    <div class="event-text-heading d-flex mb-20">
                      <div class="events-calendar text-center">
                        <span class="date">29</span>
                        <span class="month">Sep, 2018</span>
                      </div>
                      <div class="events-text-title events-text-title-3">
                        <a href="https://git-scm.com/docs/git">
                          <h4>Introduction to Git and GitHub</h4>
                        </a>
                        <div class="time-area">
                          <span class="ti-time"></span>
                          <span class="published-time">05:23 AM - 09:23 AM</span>
                        </div>
                      </div>
                    </div>
                    <div class="events-para">
                      <p>A detailed knowledge on Git and GitHub Technology</p>
                    </div>
                    <div class="events-speaker">
                      <h2>Subject : <span>Operating System</span></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="single-events mb-30">
              <div class="events-wrapper">
                <div class="events-inner d-flex">
                  <div class="events-text events-text-3">
                    <div class="event-text-heading d-flex mb-20">
                      <div class="events-calendar text-center">
                        <span class="date">30</span>
                        <span class="month">Sep, 2018</span>
                      </div>
                      <div class="events-text-title events-text-title-3">
                        <a href="#">
                          <h4>Agile Technology</h4>
                        </a>
                        <div class="time-area">
                          <span class="ti-time"></span>
                          <span class="published-time">05:23 AM - 09:23 AM</span>
                        </div>
                      </div>
                    </div>
                    <div class="events-para">
                      <p>Detail knowledge on Agile technology and scrum master.</p>
                    </div>
                    <div class="events-speaker">
                      <h2>Subject : <span>SDLC</span></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="single-events mb-30">
              <div class="events-wrapper">
                <div class="events-inner d-flex">
                  <div class="events-text events-text-3">
                    <div class="event-text-heading d-flex mb-20">
                      <div class="events-calendar text-center">
                        <span class="date">03</span>
                        <span class="month">Dec, 2018</span>
                      </div>
                      <div class="events-text-title events-text-title-3">
                        <a href="#">
                          <h4>Latest Trend in Mobile App Development</h4>
                        </a>
                        <div class="time-area">
                          <span class="ti-time"></span>
                          <span class="published-time">05:23 AM - 09:23 AM</span>
                        </div>
                      </div>
                    </div>
                    <div class="events-para">
                      <p>Detail knowledge on latest tools and frameworks being used in mobile app development.</p>
                    </div>
                    <div class="events-speaker">
                      <h2>Subject : <span>Mobile App Development</span></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="events-view-btn">
        <div class="row">
          <div class="col-xl-12">
            <div class="view-all-events text-center">
              <a href="resources.php"><button class="yewello-btn">View all Resources<span>&rarr;</span></button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- events end -->

  <!-- counter start -->
  <div class="counter-area">
    <div class="container pt-90 pb-65">
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3">
          <div class="couter-wrapper mb-30 text-center">
            <img src="img/counter/counter_icon1.png" alt="" />
            <span class="counter">10532</span>
            <h3>Satisfied Students</h3>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3">
          <div class="couter-wrapper mb-30 text-center">
            <img src="img/counter/counter_icon2.png" alt="" />
            <span class="counter">7985</span>
            <h3>Course Material</h3>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3">
          <div class="couter-wrapper mb-30 text-center">
            <img src="img/counter/counter_icon3.png" alt="" />
            <span class="counter">5382</span>
            <h3>Learning Resources</h3>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3">
          <div class="couter-wrapper mb-30 text-center">
            <img src="img/counter/counter_icon4.png" alt="" />
            <span class="counter">354</span>
            <h3>Admin Support</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- counter end -->
 

 

  <?php include('footer.php'); ?>

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