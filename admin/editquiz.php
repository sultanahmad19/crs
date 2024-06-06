<?php include("header.php"); ?>
<?php require_once("db.php"); ?>
<?php


$quizId = '';
$courseCode = '';
$courseName = '';
$teacherName = '';
$quizdate = '';

if(isset($_GET['quizId'])) {
    $quizId = $_GET['quizId'];

// Fetch quiz details from the database
$sql = "SELECT id, coursecode, coursename, teachername, quizdate FROM quiz_details WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $quizId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch data if quiz exists
if($row = mysqli_fetch_assoc($result)) {
    $courseCode = $row['coursecode'];
    $courseName = $row['coursename'];
    $teacherName = $row['teachername'];
    $quizdate = $row['quizdate'];
} else {
    echo "Quiz not found.";
    exit; // Terminate script if quiz not found
}

mysqli_stmt_close($stmt);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quizid = $_POST['quizId'];
    $editedCourseCode = $_POST['courseCode'];
    $editedCourseName = $_POST['courseName'];
    $editedTeacherName = $_POST['teacherName'];
    $editedquizdate = $_POST['quizdate'];

    // Update the course details in the database
    $sql = "UPDATE quiz_details SET coursecode=?, coursename=?, teachername=?,quizdate=? WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $editedCourseCode, $editedCourseName, $editedTeacherName, $editedquizdate, $quizid);

        if (mysqli_stmt_execute($stmt)) {
            echo "Quiz details updated successfully.";
            // header("Location: quiz.php");
        } else {
            echo "Failed to update course details: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Preparation of the statement failed: " . mysqli_error($con);
    }
}
// Inside your existing PHP code, after updating quiz details in the database, handle file uploads
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Code for updating quiz details (already implemented)
    
    // Handle file uploads
    if (!empty($_FILES['quizFiles']['name'][0])) {
        $totalFiles = count($_FILES['quizFiles']['name']);
        $fileNames = [];
        
        for ($i = 0; $i < $totalFiles; $i++) {
            $fileName = $_FILES['quizFiles']['name'][$i];
            $fileTmpName = $_FILES['quizFiles']['tmp_name'][$i];
            
            $fileDestination = 'quiz_files/' . $fileName;
            
            // if (move_uploaded_file($fileTmpName, $fileDestination)) {
            //     $fileNames[] = $fileName;
            // } else {
            //     echo "Failed to move uploaded file.";
            // }
        }
        
        // Update the quiz details in the database to include file names
        $fileNamesStr = implode(',', $fileNames);
        $sql = "UPDATE quiz_details SET files=? WHERE id=?";
        $stmt = mysqli_prepare($con, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si", $fileNamesStr, $quizid);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "Quiz details updated successfully.";
            } else {
                echo "Failed to update quiz details: " . mysqli_error($con);
            }
            
            mysqli_stmt_close($stmt);
        } else {
            echo "Preparation of the statement failed: " . mysqli_error($con);
        }
    }
}

// Fetch and display existing files for the quiz
if (!empty($fileNames)) {
    echo "<ul>";
    foreach ($fileNames as $fileName) {
        echo "<li>" . $fileName . "</li>";
    }
    echo "</ul>";
}





?>




<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Quizzes</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Quizzes</h6>
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
        <a class="btn bg-gradient-dark mb-0" href="add-quizz.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Quizzes</a>
    </div><br>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Quiz Detail</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="card-body">
                            <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                                        <div class="mb-3">
                                            <input type="hidden" name="quizId" value="<?php echo $quizId; ?>">

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
                                    <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                                        <div class="mb-3">
                                            <label for="Date">Date</label>
                                            <input type="date" class="form-control" name="quizdate" id="quizdate" value="<?php echo $quizdate; ?>" aria-label="Quiz Date" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                                        <div class="mb-3">
                                            <label for="quizFiles" class="form-label">Quiz Files</label>
                                            <input type="file" class="form-control" name="quizFiles[]" id="quizFiles" multiple>
                                        </div>

                                    </div>
                                    <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">

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