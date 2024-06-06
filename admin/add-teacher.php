<?php include("header.php"); ?>

<?php
require_once("db.php");

$teacherName = $teacherPosition = $contactNumber = $teacherDescription = "";
$teacherNameErr = $teacherPositionErr = $contactNumberErr = $teacherDescriptionErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["tname"])) {
    $teacherNameErr = "Teacher Name is required.";
  } else {
    $teacherName = $_POST["tname"];
  }

  if (empty($_POST["tposition"])) {
    $teacherPositionErr = "Teacher Position is required.";
  } else {
    $teacherPosition = $_POST["tposition"];
  }

  if (empty($_POST["contact"])) {
    $contactNumberErr = "Contact Number is required.";
  } else {
    $contactNumber = $_POST["contact"];
  }

  if (empty($_POST["description"])) {
    $teacherDescriptionErr = "Description is required.";
  } else {
    $teacherDescription = $_POST["description"];
  }

  if (empty($teacherNameErr) && empty($teacherPositionErr) && empty($contactNumberErr) && empty($teacherDescriptionErr)) {
    $sql = "INSERT INTO teacher_details (teachername, position,description,contact) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ssss", $teacherName, $teacherPosition, $contactNumber, $teacherDescription);

      if (mysqli_stmt_execute($stmt)) {
        echo '<div class="alert alert-success" role="alert">Teacher data has been added successfully.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Failed to save teacher data: ' . mysqli_error($con) . '</div>';
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
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Teacher</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Teacher</h6>
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
          <h6>Add Teacher</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <div class="card-body">
              <form role="form text-left" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Teacher Name</label>
                      <input type="text" name="tname" class="form-control" placeholder="Ali Haider" aria-label="Name" aria-describedby="email-addon">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Teacher Position</label>
                      <input type="text" name="tposition" class="form-control" placeholder="etc Professor or Lecturar" aria-label="Name" aria-describedby="email-addon">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Description</label>
                      <input type="text" name="description" class="form-control" placeholder="Description" aria-label="Name" aria-describedby="email-addon">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="mb-3">
                      <label>Contact Number </label>
                      <input type="text" name="contact" class="form-control" placeholder="etc 0346-9241933" aria-label="Name" aria-describedby="email-addon">
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