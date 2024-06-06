<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["paperId"])) {
  $paperId = $_POST["paperId"];

  $sql = "DELETE FROM peper_details WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "i", $paperId);

  if (mysqli_stmt_execute($stmt)) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
}
?>
