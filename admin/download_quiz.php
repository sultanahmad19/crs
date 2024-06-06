<?php
require_once("db.php");

if (isset($_GET['quiz_id'])) {
    $quizId = $_GET['quiz_id'];

    // Fetch file names associated with the quiz ID
    $sql = "SELECT quiz FROM quiz_details WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $quizId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $quiz);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo "Database error: " . mysqli_error($con);
        exit;
    }

    // Directory where quiz files are stored
    $directory = "quizzes/";
    $quizFiles = explode(',', $quiz);

    // Create a ZIP file
    $zip = new ZipArchive();
    $zipFilename = tempnam(sys_get_temp_dir(), 'quiz_') . ".zip";

    if ($zip->open($zipFilename, ZipArchive::CREATE) !== TRUE) {
        exit("Cannot open <$zipFilename>\n");
    }

    // Add files to the ZIP
    foreach ($quizFiles as $file) {
        $zip->addFile($directory . $file, $file);
    }

    $zip->close();

    // Serve the ZIP file for download
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="quizzes.zip"');
    header('Content-Length: ' . filesize($zipFilename));

    readfile($zipFilename);

    // Remove the temporary file
    unlink($zipFilename);
}
?>
