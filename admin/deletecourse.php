<!-- Delete Courses -->
<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["courseId"])) {
  $courseId = $_POST["courseId"];

  $sql = "DELETE FROM course_details WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "i", $courseId);

  if (mysqli_stmt_execute($stmt)) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
}
?>
<!-- Delete Assignment -->
<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["assignmentId"])) {
  $assignmentId = $_POST["assignmentId"];

  $sql = "DELETE FROM assignment_details WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "i", $assignmentId);

  if (mysqli_stmt_execute($stmt)) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
}
?>

<!-- Delete Quizzes -->
<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["quizId"])) {
  $assignmentId = $_POST["quizId"];

  $sql = "DELETE FROM quiz_details WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "i", $assignmentId);

  if (mysqli_stmt_execute($stmt)) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
}
?>



