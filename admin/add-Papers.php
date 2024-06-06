<?php include("header.php"); ?>
<?php require_once("db.php"); ?>

<?php
$courseCode = $courseName =  $papererr = "";
$courseCodeErr = $courseNameErr  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate input fields
  if (empty($_POST["courseCode"])) {
    $courseCodeErr = "Course Code is required.";
  } else {
    $courseCode = $_POST["courseCode"];
  }

  if (empty($_POST["courseName"])) {
    $courseNameErr = "Course Name is required.";
  } else {
    $courseName = $_POST["courseName"];
  }

  

  // Check for file uploads
  if (isset($_FILES['quizcontent'])) {
    $fileCount = count($_FILES['quizcontent']['name']);
    $filenames = array();

    // Loop through each file
    for ($i = 0; $i < $fileCount; $i++) {
      $file = $_FILES['quizcontent'];
      $filename = uniqid() . '_' . $file['name'][$i];
      $destination = 'pastpepers/' . $filename;

      // Move each file to the destination directory
      if (move_uploaded_file($file['tmp_name'][$i], $destination)) {
        $filenames[] = $filename;
      } else {
        $quizerr = "Failed to move the uploaded file.";
      }
    }

    if (empty($courseCodeErr) && empty($courseNameErr) && empty($quizerr)) {
      // Insert quiz details into the database
      $sql = "INSERT INTO peper_details (coursecode, coursename, peper) VALUES (?, ?, ?)";
      $stmt = mysqli_prepare($con, $sql);

      if ($stmt) {
        // Bind parameters and execute the statement for each file
        for ($i = 0; $i < $fileCount; $i++) {
          mysqli_stmt_bind_param($stmt, "sss", $courseCode, $courseName,  $filenames[$i]);
          mysqli_stmt_execute($stmt);
        }

        echo '<div class="alert alert-warning" role="alert">Data Inserted</div>';
           
        mysqli_stmt_close($stmt);
      } else {
        echo "Preparation of the statement failed: " . mysqli_error($con);
      }
    }
  }
}
?>
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Papers</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Papers</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <div class="input-group">
         </div>
      </div>
      <?php  include("navbar.php");?>

    </div>
  </div>
</nav> <!-- End Navbar -->

<!-- Your HTML code for the form -->
<div class="container-fluid py-4">
  <div class="col-md-12 text-right">
    <a class="btn bg-gradient-dark mb-0" href="add-Papers.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Paper</a>
  </div><br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Add Papers</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <div class="card-body">
              <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Course Code</label>
                      <input type="text" class="form-control" name="courseCode" id="courseCode" placeholder="TST-101" aria-label="Name" aria-describedby="email-addon">
                      <span class="text-danger"><?php echo $courseCodeErr; ?></span>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Course Name</label>
                      <input type="text" class="form-control" name="courseName" id="courseName" placeholder="ex. Cyber Security" aria-label="Name" aria-describedby="email-addon">
                      <span class="text-danger"><?php echo $courseNameErr; ?></span>
                    </div>
                  </div>
                  
                  
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Papers</label>
                      <input type="file" class="form-control" name="quizcontent[]" id="quizcontent" multiple placeholder="" aria-label="Name" aria-describedby="email-addon">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-20 my-4 mb-2">Submit</button>
                  </div>
              </form>
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
