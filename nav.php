<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light main-menu">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo/logo.jpg" alt="Your Logo" width="100">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="course_01.php">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="resources.php">Resources</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact_us.php">Contact</a>
        </li>
        <?php
        session_start();
        if (isset($_SESSION['email'])) {
          echo '<li class="shopping-cart"><a href="#"><span class="ti-user"></span></a>
                          <ul class="submenu">
                              <li><a href="profile.php"><i class="fa fa-user mr-2" aria-hidden="true"></i>Profile</a></li>
                              <li><a href="#" id="logout-link"><i class="fa-solid fa-right-from-bracket mr-2" aria-hidden="true"></i>Log Out</a></li>
                          </ul>
                      </li>';
        }
        ?>
      </ul>
    </div>
    <ul class="navbar-nav ml-auto d-none d-lg-block">

    </ul>

<?php
  

  // Check if the user is logged in
  if (isset($_SESSION['email'])) {
      // If logged in, show logout button
      echo '<ul class="navbar-nav ml-auto d-none d-lg-block">
                <li class="nav-item">
                  <form action="logout.php" method="post">
                    <button type="submit" class="btn btn-primary yellow-bg-btn rounded-3">Logout</button>
                  </form>
                </li>
              </ul>';
  } else {
      // If not logged in, show login button
      echo '<ul class="navbar-nav ml-auto d-none d-lg-block">
                <li class="nav-item">
                  <button class="btn btn-primary yellow-bg-btn rounded-3" onclick="window.location.href=\'login.php\';">Login</button>
                </li>
              </ul>';
  }
?>


    

  </nav>
</div>