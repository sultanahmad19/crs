<?php
require_once("db.php");

if(isset($_POST['teacherId'])) {
    $teacherId = $_POST['teacherId'];
    $teacherName = $_POST['teacherName'];
    $position = $_POST['position'];
    $contactNumber = $_POST['contactNumber'];
    $description = $_POST['description'];
    
    // Update teacher details in the database
    $sql = "UPDATE teacher_details SET teachername = '$teacherName', position = '$position', contact = '$contactNumber', description = '$description' WHERE id = $teacherId";
    
    if(mysqli_query($con, $sql)) {
        echo "Teacher details updated successfully.";
    } else {
        echo "Error updating teacher details: " . mysqli_error($con);
    }
}
?>
