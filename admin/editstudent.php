<?php include("header.php"); ?>

<?php
require_once("db.php");

if(isset($_GET['studentId'])) {
    $teacherId = $_GET['studentId'];
}
// $teacherId = 1; 
// $teacherName = 'updated_name';
// $position = 'updated_position';
// $description = 'updated_description';
// $contact = 'updated_contact';

// $studentId = $_POST['studentId'];
//$studentName = $_POST['sname'];
//$studentEmail = $_POST['semail'];
// $studentPhone = $_POST['sphone'];



$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ssssi", $teacherName, $position, $description, $contact, $teacherId);
$result = mysqli_stmt_execute($stmt);


if ($result) {
    echo "Teacher details updated successfully.";
} else {
    echo "Failed to update teacher details: " . mysqli_error($con);
}


mysqli_stmt_close($stmt);
mysqli_close($con);
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
    <div class="col-md-12 text-right">
        <a class="btn bg-gradient-dark mb-0" href="add-student.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Student</a>
    </div><br>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Student Detail</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="card-body">
                            <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                <div class="row">
                                <?php
                                    require_once("db.php");

                                    // Initialize variables
                                    $studentId = $studentName = $studentEmail = $studentPhone = '';

                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Retrieve posted form data
                                        $studentId = $_POST['studentId'];
                                        $studentName = $_POST['sname'];
                                        $studentEmail = $_POST['semail'];
                                        $studentPhone = $_POST['sphone'];

                                        // Construct SQL UPDATE query
                                        $sql = "UPDATE users SET name=?, email=?, phone=? WHERE id=?";
                                        
                                        // Prepare and execute the query
                                        $stmt = mysqli_prepare($con, $sql);
                                        mysqli_stmt_bind_param($stmt, "sssi", $studentName, $studentEmail, $studentPhone, $studentId);
                                        $result = mysqli_stmt_execute($stmt);

                                        if ($result) {
                                            echo "Student details updated successfully.";
                                            // Redirect or show success message
                                        } else {
                                            echo "Failed to update student details: " . mysqli_error($con);
                                        }

                                        mysqli_stmt_close($stmt);
                                        mysqli_close($con);
                                    }
                                    ?>
                                    
                                    <!-- Input fields for student details -->
                                    <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                                        <div class="mb-3">
                                            <input type="hidden" name="studentId" value="<?php echo $studentId; ?>">

                                            <label for="sname">Student Name</label>
                                            <input type="text" class="form-control" name="sname" id="sname" value="<?php echo $studentName; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                                        <div class="mb-3">
                                            <label for="semail">Student Email</label>
                                            <input type="email" class="form-control" name="semail" id="semail" value="<?php echo $studentEmail; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                                        <div class="mb-3">
                                            <label for="sphone">Student Phone</label>
                                            <input type="tel" class="form-control" name="sphone" id="sphone" value="<?php echo $studentPhone; ?>" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-25 my-4 mb-2">Submit</button>
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


             



