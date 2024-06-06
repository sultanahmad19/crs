<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Content-Recommendation-System
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.2" rel="stylesheet" />
  <style>
    .bg-active{
      background-color: rgb(28, 153, 124) !important;
      color:seashell !important;
      margin: 10px;
    }
  </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3" id="sidenav-main" style="overflow: hidden;">
    <a href="index.php" class="brand-link animated swing">
      <img src="../assets/img/logo.jpg" alt="Logo" width="200" style="margin-top: -30px;">
      </a>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main" style="height: auto;">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="index.php">
            <div class="icon-sm bg-gradient-dark border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-tachometer-alt text-white"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="course.php">
            <div class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fab fa-internet-explorer"></i>
            </div>
            <span class="nav-link-text ms-1">Courses</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="student.php">
            <div class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Students</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="teacher.php">
            <div class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Teachers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="quiz.php">
            <div class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-certificate"></i>
            </div>
            <span class="nav-link-text ms-1">Quizzes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="assignment.php">
            <div class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-file-word"></i>
            </div>
            <span class="nav-link-text ms-1">Assignments</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="paper.php">
            <div class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-regular fa-file"></i>
          </div>
            <span class="nav-link-text ms-1">Past Papers</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link  " href="feedback.php">
            <div class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-comment-dots"></i>
            </div>
            <span class="nav-link-text ms-1">Feedback</span>
          </a>
        </li> -->
      </ul>
    </div>
  </aside>
  <main class="main-content mt-1 border-radius-lg">