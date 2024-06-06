<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
    exit();
}
?>
<?php
require_once ("db.php");

?>


<!Doctype html>
<html class="no-js" lang="zxx">


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css"
        integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .courses-wrapper {
            border-bottom: 1px solid #ccc;
        }
    </style>

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- header-start -->

    <!-- /end header-top -->
    <!-- header-bottom -->
    <div class="header-bottom-area header-sticky" style="transition: .6s;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                    <div class="logo">
                        <a href="index.php">
                            <img src="img/logo/logo.jpg" alt="Your Logo" width="100">
                        </a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-6 col-6">
                    <div class="header-bottom-icon f-right">
                        <ul>
                           
                        </ul>
                    </div>
                    <div class="main-menu f-right">
                        <nav id="mobile-menu" style="display: block;">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about_us.php">About Us</a></li>
                                <li><a href="course_01.php">Courses</a></li>
                                <li><a href="resources.php">Resources</a></li>
                                <li><a href="contact_us.php">Contact</a></li>
                                <?php
                                if (isset($_SESSION['email'])) {
                                    echo '<li class="shopping-cart"><a href="#"><span class="ti-user"></span></a>
                <ul class="submenu">
                    <li><a href="profile.php"><i class="fa fa-user mr-2" aria-hidden="true"></i>Profile</a></li>
                    <li><a href="#" id="logout-link"><i class="fa-solid fa-right-from-bracket mr-2" aria-hidden="true"></i>Log Out</a></li>
                </ul>
            </li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /end header-bottom -->
    </div>
    </header>
    <!-- header-end -->
    <!-- slider-start -->
    <div class="slider-area">
        <div class="pages-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center"
                style="background-image: url(img/bg/others_bg.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Course Details</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <div class="course-details-area gray-bg pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="single-course-details-area mb-30">
                        <div class="course-details-thumb">

                            <!-- <img src="img/courses/course_details_thumb.jpg" alt=""> -->
                        </div>
                        <div class="single-course-details white-bg">
                            <div class="course-details-title mb-20">
                                <h1>
                                    <?php echo isset($_GET['coursename']) ? urldecode($_GET['coursename']) : 'Course Name Not Found'; ?>
                                </h1>
                            </div>

                            <div class="course-details-tabs">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <!-- <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true">Overview</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill"
                                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                                            aria-selected="false">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                            href="#pills-contact" role="tab" aria-controls="pills-contact"
                                            aria-selected="false">Assignments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-quizzes-tab" data-toggle="pill"
                                            href="#pills-reviews" role="tab" aria-controls="pills-contact"
                                            aria-selected="false">Quizzes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-past-papers-tab" data-toggle="pill"
                                            href="#pills-past-papers" role="tab" aria-controls="pills-past-papers"
                                            aria-selected="false">Past Papers</a>
                                    </li>
                                </ul>


                                <div class="tab-content" id="pills-tabContent">
                                    
                                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">

                                        <div class="col-xl-12 col-lg-12 col-md-4">
                                        <?php
require_once("db.php");
$courseName = isset($_GET['coursename']) ? $_GET['coursename'] : '';
$query = "SELECT * FROM course_details WHERE coursename = '$courseName' ";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<h3>Slides</h3>';
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Course Image</th>';
    echo '<th>Lecture</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $lectureNumber = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $lectureFiles = explode(',', $row['lecture']);
        // $lecturePath = 'admin/courses/' . $lectureFiles;

        echo '<tr>';
        echo '<td>';
        echo '<img src="admin/courses/' . $row['course_image'] . '" alt="Course Image" style="width: 100px; height: auto;">';
        echo '</td>';
        echo '<td>';
        foreach ($lectureFiles as $lectureFilename) {
            $lecturePath = 'admin/courses/' . $lectureFilename;
            echo '<span class="ti-book"></span>';
            echo '<span class="chapter-name">Lecture ' . $lectureNumber . '</span>';
            echo '<br>';
            echo '<a href="' . $lecturePath . '" download>' . $lectureFilename . '</a>';
            echo '<br>'; // New line for each file
            $lectureNumber++;
        }
        echo '</td>';
        echo '</tr>';

        $lectureNumber++;
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No courses found.</p>';
    mysqli_close($con);
}
?>



                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <h4 class="primary-color font-weight-bold">Assignments</h4>
                                        <?php
                                        require_once ("db.php");

                                        function sanitizeFilename($filename)
                                        {
                                            return basename($filename);
                                        }

                                        $courseName = isset($_GET['coursename']) ? urldecode($_GET['coursename']) : 'Course Name Not Found';
                                        $sql = "SELECT assignment FROM assignment_details WHERE coursename = '$courseName'";
                                        $result = mysqli_query($con, $sql);

                                        if ($result) {
                                            echo '<table class="table">';
                                            echo '<tbody>';
                                            $assignmentNumber = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $assignmentFilename = sanitizeFilename($row['assignment']);
                                                $assignmentPath = 'admin/assignments/' . $assignmentFilename;

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<span class="ti-book"></span>';
                                                echo '<span class="chapter-name">- Assignment ' . $assignmentNumber . '</span>';
                                                echo '<br>';
                                                echo '<a href="' . $assignmentPath . '" download="' . $assignmentFilename . '">' . $assignmentFilename . '</a>';
                                                echo '</td>';
                                                echo '</tr>';

                                                $assignmentNumber++;
                                            }
                                            echo '</tbody>';
                                            echo '</table>';
                                        } else {
                                            echo "Failed to fetch assignment content: " . mysqli_error($con);
                                        }
                                        ?>


                                    </div>
                                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel"
                                        aria-labelledby="pills-quizzes-tab">
                                        <?php
                                        require_once ("db.php");
                                        $courseName = isset($_GET['coursename']) ? urldecode($_GET['coursename']) : 'Course Name Not Found';
                                        $sql = "SELECT quiz FROM quiz_details WHERE coursename = '$courseName'";
                                        $result = mysqli_query($con, $sql);

                                        if ($result) {
                                            echo '<div class="quiz-wrapper">';
                                            echo '<h2>Quizzes for ' . $courseName . '</h2>';
                                            echo '<table class="table">';
                                            echo '<tbody>';
                                            $quizNumber = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $quizFilename = $row['quiz'];
                                                $quizPath = 'admin/quizzes/' . $quizFilename;

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<span class="ti-book"></span>';
                                                echo '<span class="chapter-name">- Quiz ' . $quizNumber . '</span>';
                                                echo '<br>';
                                                // Link to the download.php file with the file path as a parameter
                                                echo '<a href="download.php?file=' . urlencode($quizPath) . '">' . $quizFilename . '</a>';
                                                echo '</td>';
                                                echo '</tr>';
                                                $quizNumber++;
                                            }
                                            echo '</tbody>';
                                            echo '</table>';
                                            echo '</div>';
                                        } else {
                                            echo "Failed to fetch quiz content: " . mysqli_error($con);
                                        }
                                        ?>





                                    </div>
                                    <div class="tab-pane fade" id="pills-past-papers" role="tabpanel"
                                        aria-labelledby="pills-past-papers-tab">
                                        <?php
    require_once("db.php");

    // Assuming $courseName is already defined elsewhere in your code
    $courseName = isset($_GET['coursename']) ? urldecode($_GET['coursename']) : 'Course Name Not Found';

    // Query to fetch past papers for the given course
    $sql = "SELECT peper FROM peper_details WHERE coursename = '$courseName'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Start displaying the past papers
        echo '<div class="past-paper-wrapper">';
        echo '<h2>Past Papers for ' . $courseName . '</h2>';
        echo '<table class="table">';
        echo '<tbody>';
        $paperNumber = 1;

        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $paperFilename = $row['peper'];
            $paperPath = 'admin/pastpepers/' . $paperFilename;

            // Display the paper information in a table row
            echo '<tr>';
            echo '<td>';
            echo '<span class="ti-book"></span>';
            echo '<span class="chapter-name">- Paper ' . $paperNumber . '</span>';
            echo '<br>';
            // Link to the download.php file with the file path as a parameter
            echo '<a href="download.php?file=' . urlencode($paperPath) . '">' . $paperFilename . '</a>';
            echo '</td>';
            echo '</tr>';
            $paperNumber++;
        }

        // Finish displaying the past papers
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        // Display an error message if the query fails
        echo "Failed to fetch past paper content: " . mysqli_error($con);
    }
    ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- courses start -->
    <div class="courses-area courses-bg-height gray-bg pt-60 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color">Our Latest Courses</h1>
                        </div>
                        <div class="section-title-para">
                            <p>Belis nisl adipiscing sapien sed malesu diame lacus eget erat Cras mollis scelerisqu
                                Nullam arcu liquam here was consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="courses-list">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <?php
                        require_once ("db.php"); 
                        
                        $query = "SELECT * FROM course_details";
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $courseName = $row['coursename'];
                                $courseDescription = $row['description'];
                                $teachername = $row['teachername'];
                                $degreename = $row['degree'];
                                $coursecode = $row['coursecode'];

                                echo '<div class="courses-wrapper courses-wrapper-3 mb-30">';
                                echo '<div class="courses-thumb">';
                                echo '<img src="admin/courses/' . $row['course_image'] . '" alt="Course Image" ">';
                                echo '</div>';
                                echo '<div class="courses-content courses-content-3 clearfix">';
                                echo '<div class="courses-heading mt-25 d-flex">';
                                echo '<div class="course-title-3">';
                                echo '<h1><a href="#">' . $courseName . '</a></h1>';
                                echo '</div>';
                                // echo '<div class="courses-pricing-3">';
                                // echo '<span>$20.50</span>';
                                // echo '</div>';
                                echo '</div>';
                                echo '<div class="courses-para mt-15">';
                                echo '<p>' . $courseDescription . '</p>';
                                echo '</div>';
                                echo '<div class="courses-wrapper-bottom clearfix mt-35">';
                                echo '<div class="courses-button">';
                                echo '<a href="course_details.php?coursename=' . urlencode($courseName) . '&description=' . urlencode($courseDescription) . '&degree=' . urlencode($degreename) . '&teachername=' . urlencode($teachername) . '&coursecode=' . urlencode($coursecode) . '">View Details</a>';
                                echo '</div>';
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
                <div class="courses-view-more-area mt-20 mb-30 text-center">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="courses-view-more-btn">
                                <a href="course_01.php">
                                    <button class="btn gray-border-btn">view more</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end -->

   
    <?php include ('footer.php'); ?>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="fic-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/search.js"></script>
    <script>
        $(document).ready(function () {
            $('.nav-link').click(function () {
                $('.tab-pane').removeClass('show active');
                $($(this).attr('href')).addClass('show active');
            });
        });
    </script>




    <script>
        document.getElementById('logout-link').addEventListener('click', function (event) {
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