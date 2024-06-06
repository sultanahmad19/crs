<?php include("header.php"); ?>
<?php

require("db.php");
$courseCountQuery = "SELECT COUNT(*) AS courseCount FROM course_details";
$courseCountResult = mysqli_query($con, $courseCountQuery);
$courseCount = 0;  

if ($courseCountResult) {
    $row = mysqli_fetch_assoc($courseCountResult);
    $courseCount = $row['courseCount'];
}

$quizCountQuery = "SELECT COUNT(*) AS quizCount FROM quiz_details";
$quizCountResult = mysqli_query($con, $quizCountQuery);
$quizCount = 0;  

if ($quizCountResult) {
    $row = mysqli_fetch_assoc($quizCountResult);
    $quizCount = $row['quizCount'];
}

$assignmentCountQuery = "SELECT COUNT(*) AS assignmentCount FROM assignment_details";
$assignmentCountResult = mysqli_query($con, $assignmentCountQuery);
$assignmentCount = 0;  

if ($quizCountResult) {
    $row = mysqli_fetch_assoc($assignmentCountResult);
    $assignmentCount = $row['assignmentCount'];
}
?>
<?php

// Query to count the number of past papers
$pastPapersCountQuery = "SELECT COUNT(*) AS pastPapersCount FROM peper_details";
$pastPapersCountResult = mysqli_query($con, $pastPapersCountQuery);
$pastPapersCount = 0;  

if ($pastPapersCountResult) {
    $row = mysqli_fetch_assoc($pastPapersCountResult);
    $pastPapersCount = $row['pastPapersCount'];
}

mysqli_close($con);

?>



     <!-- Navbar -->
     <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
            </div>
          </div>
          
          <?php  include("navbar.php");?>

        </div>
      </div>
    </nav>    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-4 mb-4 offset-xl-3">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Number of Courses</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?php echo $courseCount; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="bg-gradient-dark shadow text-center border-radius-md">
                  <i class="ni ni-book-bookmark text-lg opacity-10 text-white" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-4 mb-4 offset-xl-3">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Number of Assignments</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?php echo $assignmentCount; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="bg-gradient-dark shadow text-center border-radius-md">
                  <i class="ni ni-archive-2 text-lg opacity-10 text-white" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-4 mb-4 offset-xl-3">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Number of Quizzes</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?php echo $quizCount; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="bg-gradient-dark shadow text-center border-radius-md">
                  <i class="ni ni-single-copy-04 text-lg opacity-10 text-white" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-4 mb-4 offset-xl-3">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Number of Past Papers</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?php echo $pastPapersCount; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="bg-gradient-dark shadow text-center border-radius-md">
                  <i class="ni ni-single-copy-04 text-lg opacity-10 text-white" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/plugins/Chart.extension.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
</body>

</html>