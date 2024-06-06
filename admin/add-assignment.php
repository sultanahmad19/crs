<?php include("header.php"); ?>

<?php
require_once("db.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aridedu";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$courseCode = $courseName = $teacherName = $assignment = "";

$courseCodeErr = $courseNameErr = $teacherNameErr = $assignmenterr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

  if (empty($_POST["teacherName"])) {
    $teacherNameErr = "Teacher Name is required.";
  } else {
    $teacherName = $_POST["teacherName"];
  }

  if (isset($_FILES['assignmentContent'])) {
    $uploadedFiles = array(); // Array to store uploaded file names

    foreach ($_FILES['assignmentContent']['tmp_name'] as $key => $tmp_name) {
      $file = $_FILES['assignmentContent'];

      if ($file['error'][$key] === UPLOAD_ERR_OK) {
        $filename = uniqid() . '_' . $file['name'][$key];
        $destination = 'assignments/' . $filename;
        if (move_uploaded_file($file['tmp_name'][$key], $destination)) {
          $uploadedFiles[] = $filename;
        } else {
          $assignmenterr = "Failed to move one of the uploaded files.";
        }
      } else {
        $assignmenterr = "File upload error: " . $file['error'][$key];
      }
    }

    if (empty($courseCodeErr) && empty($courseNameErr) && empty($teacherNameErr) && empty($assignmenterr)) {
   
      foreach ($uploadedFiles as $filename) {
        $sql = "INSERT INTO assignment_details (coursecode, coursename, teachername, assignment) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
          mysqli_stmt_bind_param($stmt, "ssss", $courseCode, $courseName, $teacherName, $filename);

          if (mysqli_stmt_execute($stmt)) {
            $dataInserted = true; // Flag to track data insertion success
          } else {
            $dataInserted = false; // Flag to track data insertion failure
            echo '<div class="alert alert-warning" role="alert">' . mysqli_error($con) . '</div>';
          }
        } else {
          $dataInserted = false; // Flag to track data insertion failure
          echo "Preparation of the statement failed: " . mysqli_error($con);
        }
      }
      
      if ($dataInserted) {
        echo '<div class="alert alert-warning" role="alert">Data Inserted</div>'; // Display the alert only once if data insertion was successful
      }

      mysqli_stmt_close($stmt);
    }
  }
}
?>


<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <!-- Navbar content -->
</nav> <!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="col-md-12 text-right">
    <a class="btn bg-gradient-dark mb-0" href="add-assignment.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Assignment</a>
  </div><br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Add Assignment</h6>
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
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Course Name</label>
                      <input type="text" class="form-control" name="courseName" id="courseName" placeholder="ex. Cyber Security" aria-label="Name" aria-describedby="email-addon">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Teacher Name</label>
                      <input type="text" class="form-control" name="teacherName" id="teacherName" placeholder="ex. John Doe" aria-label="Name" aria-describedby="email-addon">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Assignments</label>
                      <input type="file" class="form-control" name="assignmentContent[]" id="assignmentContent" placeholder="" aria-label="Name" aria-describedby="email-addon" multiple required>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-20 my-4 mb-2">Submit</button>
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
