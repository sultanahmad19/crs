<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filepath = 'courses/' . $file;

    if (file_exists($filepath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        echo "File not found.";
    }
}
?>
<?php
require_once("db.php");


// Check if the quizId is provided
if(isset($_GET['quizId'])) {
    // Get the quizId from the URL
    $quizId = $_GET['quizId'];

    // Fetch the quiz details from the database
    $sql = "SELECT quiz FROM quiz_details WHERE id = $quizId";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Check if quiz record exists
        if(mysqli_num_rows($result) == 1) {
            // Fetch the quiz filename
            $row = mysqli_fetch_assoc($result);
            $quizFilename = $row['quiz'];
            $quizPath = 'quizzes/' . $quizFilename;

            // Check if the file exists
            if(file_exists($quizPath)) {
                // Set headers for file download
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($quizPath).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($quizPath));
                readfile($quizPath);
                exit;
            } else {
                // Quiz file not found
                echo "Quiz file not found.";
            }
        } else {
            // Quiz record not found
            echo "Quiz details not found.";
        }
    } else {
        // Error in SQL query
        echo "Error: " . mysqli_error($con);
    }
} 
?>



<?php
// Include your database connection file
require_once("db.php");

// Check if quizId parameter is provided in the URL
if(isset($_GET['peperId'])) {
    // Sanitize the quizId to prevent SQL injection
    $peperId = mysqli_real_escape_string($con, $_GET['peperId']);

    // Query to fetch the quiz file path based on the provided quizId
    $sql = "SELECT peper FROM peper_details WHERE id = '$peperId'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $quizFilename = $row['peper'];
        $quizPath = 'pastpepers/' . $quizFilename;

        // Set headers to force download
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . $quizFilename . "\"");
        
        // Read the file and output it to the browser
        readfile($quizPath);
        exit;
    } else {
        // Quiz details not found
        echo "Quiz details not found.";
    }
} 
?>
