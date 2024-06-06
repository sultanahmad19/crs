<?php include("header.php"); ?>
<?php
require_once("db.php");

$studentName = $studentEmail = $studentPhone = $studentPassword = "";
$studentNameErr = $studentEmailErr = $studentPhoneErr = $studentPasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["sname"])) {
    $studentNameErr = "Student Name is required.";
  } else {
    $studentName = $_POST["sname"];
  }

  if (empty($_POST["semail"])) {
    $studentEmailErr = "Student Email is required.";
  } else {
    $studentEmail = $_POST["semail"];
  }

  if (empty($_POST["phone"])) {
    $studentPhoneErr = "Phone Number is required.";
  } else {
    $studentPhone = $_POST["phone"];
  }

  if (empty($_POST["password"])) {
    $studentPasswordErr = "Password is required.";
  } else {
    $studentPassword = $_POST["password"];
  }

  if (empty($studentNameErr) && empty($studentEmailErr) && empty($studentPhoneErr) && empty($studentPasswordErr)) {
    $hashedPassword = password_hash($studentPassword, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ssss", $studentName, $studentEmail, $studentPhone, $hashedPassword);

      if (mysqli_stmt_execute($stmt)) {
        echo '<div class="alert alert-success" role="alert">Student data has been added successfully.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Failed to save student data: ' . mysqli_error($con) . '</div>';
      }
      mysqli_stmt_close($stmt);
    } else {
      echo '<div class="alert alert-danger" role="alert">Preparation of the statement failed: ' . mysqli_error($con) . '</div>';
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
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Students</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Students</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <div class="input-group">
          </div>
      </div>

      <?php include("navbar.php"); ?>

    </div>
  </div>
</nav> <!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Add Student</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <div class="card-body">
              <form role="form text-left" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Student Name</label>
                      <input type="text" name="sname" class="form-control" placeholder="John Doe" aria-label="Name" aria-describedby="email-addon">
                    </div>
                  </div>
                  
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Phone Number</label>
                      <input type="text" name="phone" class="form-control" placeholder="e.g., 123-456-7890" aria-label="Phone" aria-describedby="phone-addon">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Email</label>
                      <input type="email" name="semail" class="form-control" placeholder="john@example.com" aria-label="Email" aria-describedby="email-addon">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter Password" aria-label="Password" aria-describedby="password-addon">
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
<script src="./alert.js"></script>
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
