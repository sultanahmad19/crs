<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('db.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        
        if (mysqli_query($con, $sql)) {
            header('Location: login.php'); // Redirect to login page after successful registration
        } else {
            echo 'Registration failed: ' . mysqli_error($con);
        }
    }
    mysqli_close($con);
}
?>
