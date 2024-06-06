<?php
// Check if the required parameters are present in the URL
if (isset($_GET['coursename']) && isset($_GET['lectureFiles'])) {
    // Get course name and lecture file names from the URL parameters
    $courseName = $_GET['coursename'];
    $lectureFiles = explode(',', $_GET['lectureFiles']);

    // Directory where lecture files are stored
    $directory = 'admin/courses/';

    // Create a zip archive containing all lecture files
    $zip = new ZipArchive();
    $zipName = "all_lectures_$courseName.zip";
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
    // Handle missing parameters
    echo "Course name or lecture files are missing";
}
?>
