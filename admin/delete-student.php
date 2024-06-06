<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["studentId"])) {
  $studentId = intval($_POST["studentId"]);

  $sql = "DELETE FROM users WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "i", $studentId);

  if (mysqli_stmt_execute($stmt)) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
}
?>