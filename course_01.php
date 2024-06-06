<!Doctype html>
<html class="no-js" lang="zxx">
    <style>
    
    
    .courses-area .courses-wrapper {
        max-width: 100%;
    }
   
        .courses-wrapper{
            border-bottom: 1px solid #ccc;
            border-top: 1px solid #ccc;
        }
    

     

    </style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AridEduToolKit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.php">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include('nav.php'); ?>
    <!-- slider-start -->
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/bg/others_bg.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Our Course</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- courses start -->
    <div class="courses-area courses-bg-height gray-bg pt-100 pb-70">
        <div class="container">
            <div class="courses-list" id="courses-list">
            <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12" style="display: grid;">
                <?php
                require_once("db.php");

                $query = "SELECT * FROM course_details";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $courseName = $row['coursename'];
                        $courseDescription = $row['description'];
                        $degreename = $row['degree'];
                        $author = $row['teachername'];
                        $coursecode = $row['coursecode'];
                        $teachername = $row['teachername'];

                        echo '<div class="courses-wrapper course-radius-none mb-30">';
                        echo '<div class="courses-thumb">';
                        echo '<img src="admin/courses/' . $row['course_image'] . '" alt=""></a>';
                        echo '</div>';
                        echo '<div class="courses-author">';
                        // echo '<img src="img/courses/coursesauthor1.png" alt="">';
                        echo '</div>';
                        echo '<div class="course-main-content clearfix">';
                        echo '<div class="courses-content">';
                        echo '<div class="courses-category-name">';
                        echo '<span>';
                        echo '<a >' . $degreename . '</a>';
                        echo '</span>';
                        echo '</div>';
                        echo '<div class="courses-heading">';
                        echo '<h1><a href="course_details.php?coursename=' . urlencode($courseName) . '&description=' . urlencode($courseDescription) . '&degree=' . urlencode($degreename) . '&teachername=' . urlencode($teachername) . '&coursecode=' . urlencode($coursecode) . '">' . $courseName . '</a></h1>';
                        echo '</div>';
                        echo '<div class="courses-para">';
                        echo '<p>' . $courseDescription . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="courses-wrapper-bottom clearfix">';
                        echo '<div class="courses-icon d-flex f-left">';
                        echo '<div class="courses-single-icon">';
                        echo '<span class="ti-book"></span>';
                        echo '<span class="user-number">' . $coursecode . '</span>';
                        echo '</div>';
                        echo '<div class="courses-single-icon">';
                        echo '<span class="ti-user"></span>';
                        echo '<span class="user-number">' . $teachername . '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="courses-button f-right">';
                        echo '<a href="course_details.php?coursename=' . urlencode($courseName) . '&description=' . urlencode($courseDescription) . '&degree=' . urlencode($degreename) . '&teachername=' . urlencode($teachername) . '&coursecode=' . urlencode($coursecode) . '">View Details</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No courses found.</p>';
                }
                mysqli_close($con);
                ?>
            </div>
            </div>
            </div>

        </div>
    </div>
    <!-- courses end -->
    <!-- brand start -->

    <!-- brand end -->

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
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/search.js"></script>



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