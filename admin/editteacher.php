<?php include("header.php"); ?>

<?php
require_once("db.php");

if(isset($_GET['id'])) {
    $teacherId = $_GET['id'];
    
    // Fetch teacher details based on teacherId using prepared statement
    $sql = "SELECT * FROM teacher_details WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $teacherId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Check if any rows are returned
    if($row = mysqli_fetch_assoc($result)) {
        $teacherName = $row['teachername'];
        $position = $row['position'];
        $contactNumber = $row['contact'];
        $description = $row['description'];
    } else {
        echo "Teacher not found.";
    }
}
?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Teachers</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Teachers</h6>
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

<form role="form" method="POST" action="update_teacher.php">
                                <input type="hidden" name="teacherId" value="<?php echo $teacherId; ?>">
                                <div class="form-group">
                                    <label for="teacherName">Teacher Name</label>
                                    <input type="text" class="form-control" id="teacherName" name="teacherName" value="<?php echo $teacherName; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" id="position" name="position" value="<?php echo $position; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" value="<?php echo $contactNumber; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>

<!--   Core JS Files   -->
<script src="alert.js"></script>
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