<?php
require_once("db.php");

$name = $email = $password = $repeatpassword = "";
$nameErr = $emailErr = $passwordErr = $repeatpasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passwordPattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if (empty($_POST["name"])) {
        $nameErr = "Name is required.";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required.";
    } elseif (!preg_match($passwordPattern, $_POST["password"])) {
        $passwordErr = "Password must be at least 8 characters long and include a letter, a number, and a special character.";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["repeatpassword"])) {
        $repeatpasswordErr = "Please repeat the password.";
    } else {
        $repeatpassword = $_POST["repeatpassword"];
    }

    if ($password !== $repeatpassword) {
        $repeatpasswordErr = "Passwords do not match.";
    }

    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($repeatpasswordErr)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: login.php');
        } else {
            echo "Failed to Insert: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .card {
      --bs-card-bg: #b36666 !important;
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
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                  <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw clr"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="name" class="form-control" id="form3Example1c" placeholder="Your Name" />
                        <span class="text-danger"><?php echo $nameErr; ?></span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw clr"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" class="form-control" id="form3Example3c" placeholder="Your Email" />
                        <span class="text-danger"><?php echo $emailErr; ?></span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw clr"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" class="form-control mt-2" id="password" placeholder="Password" />
                        <span id="passwordError" class="text-danger bg-dark"><?php echo $passwordErr; ?></span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw clr"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="repeatpassword" class="form-control" id="repeatpassword" placeholder="Repeat Your Password" />
                        <span id="repeatpasswordError" class="text-danger bg-dark"><?php echo $repeatpasswordErr; ?></span>
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                      <label class="form-check-label" for="form2Example3c">
                        I agree to all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img src="./img/post/draw1.webp" class="img-fluid" alt="Sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
  document.addEventListener('DOMContentLoaded', (event) => {
      const password = document.getElementById('password');
      const repeatpassword = document.getElementById('repeatpassword');
      const passwordError = document.getElementById('passwordError');
      const repeatpasswordError = document.getElementById('repeatpasswordError');
      const form = document.querySelector('form');

      const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

      form.addEventListener('submit', function (event) {
          let valid = true;

          if (!passwordPattern.test(password.value)) {
              passwordError.textContent = 'Password must be at least 8 characters long and include a letter, a number, and a special character.';
              valid = false;
          } else {
              passwordError.textContent = '';
          }

          if (password.value !== repeatpassword.value) {
              repeatpasswordError.textContent = 'Passwords do not match.';
              valid = false;
          } else {
              repeatpasswordError.textContent = '';
          }

          if (!valid) {
              event.preventDefault();
          }
      });
  });
  </script>

</body>

</html>
