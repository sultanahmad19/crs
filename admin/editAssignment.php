<?php include("header.php"); ?>
<?php require_once("db.php"); ?>

<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$assignmentId = '';
$courseCode = '';
$courseName = '';
$teacherName = '';

if(isset($_GET['assignmentId'])) {
    $assignmentId = $_GET['assignmentId'];

    $sql = "SELECT id, coursecode, coursename, teachername FROM assignment_details WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $assignmentId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {
        $courseCode = $row['coursecode'];
        $courseName = $row['coursename'];
        $teacherName = $row['teachername'];
    } else {
        echo "Assignment not found.";
        exit; 
    }

    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editedCourseCode = $_POST['courseCode'];
    $editedCourseName = $_POST['courseName'];
    $editedTeacherName = $_POST['teacherName'];
    $assignmentId = $_POST['assignmentId'];

    // Debugging: Print form data
    echo "Submitted data: Course Code=$editedCourseCode, Course Name=$editedCourseName, Teacher Name=$editedTeacherName, Assignment Id=$assignmentId";

    // Handle multiple file uploads
    if(isset($_FILES['assignmentContent'])) {
        $uploadedFiles = array();
        $fileNames = $_FILES['assignmentContent']['name'];
        $fileTmpNames = $_FILES['assignmentContent']['tmp_name'];
        $fileErrors = $_FILES['assignmentContent']['error'];

        foreach ($fileNames as $key => $fileName) {
            if ($fileErrors[$key] === UPLOAD_ERR_OK) {
                $filename = uniqid() . '_' . $fileName;
                $destination = 'assignments/' . $filename;
                if (move_uploaded_file($fileTmpNames[$key], $destination)) {
                    $uploadedFiles[] = $filename;
                } else {
                    echo "Failed to move one of the uploaded files.";
                }
            } else {
                echo "File upload error: " . $fileErrors[$key];
            }
        }
    }

    // Update assignment details in the database
    if(empty($uploadedFiles)) {
        echo "No files uploaded.";
    } else {
        // Update assignment details with new file names
        foreach ($uploadedFiles as $filename) {
            $sql = "INSERT INTO assignment_files (assignment_id, file_name) VALUES (?, ?)";
            $stmt = mysqli_prepare($con, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "is", $assignmentId, $filename);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Assignment file inserted successfully.";
                } else {
                    echo "Failed to insert assignment file: " . mysqli_error($con);
                }

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
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Courses</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Courses</h6>
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

<div class="container-fluid py-4">
  <div class="col-md-12 text-right">
    <a class="btn bg-gradient-dark mb-0" href="add-course.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Course</a>
  </div><br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Assignment Detail</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <div class="card-body">
              <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?assignmentId=' . $assignmentId); ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label for="courseCode">Course Code</label>
                      <input type="text" class="form-control" name="courseCode" id="courseCode" aria-label="Course Code" value="<?php echo $courseCode; ?>" required>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label for="courseName">Course Name</label>
                      <input type="text" class="form-control" name="courseName" id="courseName" value="<?php echo $courseName; ?>" aria-label="Course Name" required>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label for="teacherName">Teacher Name</label>
                      <input type="text" class="form-control" name="teacherName" id="teacherName" value="<?php echo $teacherName; ?>" aria-label="Instructor Name" required>
                    </div>
                  </div>
                  <input type="hidden" name="assignmentId" value="<?php echo $assignmentId; ?>">
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label for="assignmentContent">Assignment Files</label>
                      <input type="file" class="form-control" name="assignmentContent[]" id="assignmentContent" aria-label="Assignment Files" multiple required>
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-dark w-25 my-4 mb-2">Submit</button>
                    </div>
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
