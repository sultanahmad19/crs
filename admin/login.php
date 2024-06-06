<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('db.php');

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, email, password FROM admin WHERE email = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $adminId, $dbEmail, $dbPassword);
            if (mysqli_stmt_fetch($stmt)) {
                
                    $_SESSION['email'] = $email;
                    header('Location: index.php'); // Redirect to admin dashboard
                    exit;
            
            } else {
                echo '<div class="alert alert-warning" role="alert">Invalid email or password</div>';
            }
        } else {
            echo "Failed to execute the query: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Preparation of the statement failed: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .card{
      --bs-card-bg:#b36666 !important;
    }
    .clr {
      color: #002147;
    }

    .btn {
      background-color: #002147;
      color: white;
    }
  </style>
</head>

<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Admin</p>

                  <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw clr"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw clr"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" class="form-control" id="password" placeholder=" Enter Your Password" />
                      </div>
                    </div>



                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Log In</button>
                    </div>

                    <div class="col-lg-12 fs-4 text-center mt-5">
                                    <a href="../login.php" style="color: beige;">Go to User Panel</a> 
                                </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="../img/post/draw1.webp" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>