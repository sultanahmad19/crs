<?php
require_once("db.php"); // Include your database connection file

if (isset($_GET['course_id'])) {
    $courseId = $_GET['course_id'];

    // Fetch file names associated with the course ID
    $sql = "SELECT lecture FROM course_details WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $courseId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $lecture);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Handle database error
        echo "Database error: " . mysqli_error($con);
        exit;
    }

    // Directory where course files are stored
    $directory = "courses/";

    // Check if the lecture field is not empty
    if (!empty($lecture)) {
        $lectureFiles = explode(",", $lecture);

        // Compress files into a zip archive
        $zip = new ZipArchive();
        $zipName = "course_files_$courseId.zip";
        if ($zip->open($zipName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($lectureFiles as $file) {
                $filePath = $directory . $file;
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, $file);
                }
            }
            $zip->close();

            // Download the zip archive
            header('Content-Type: application/zip');
            header("Content-Disposition: attachment; filename=\"$zipName\"");
            header('Content-Length: ' . filesize($zipName));
            readfile($zipName);
            unlink($zipName); // Delete the zip file after download
        } else {
            // Handle zip archive creation error
            echo "Failed to create zip archive";
        }
    } else {
        // Handle empty lecture field
        echo "No files associated with this course";
    }
} else {
    // Handle missing course ID parameter
    echo "Course ID parameter is missing";
}
?>