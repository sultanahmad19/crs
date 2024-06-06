<?php include("header.php"); ?>


<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Students</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Student</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <div class="input-group">
           </div>
      </div>

      <?php include("navbar.php"); ?>

    </div>
  </div>
</nav> <!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="col-md-12 text-right">
    <a class="btn bg-gradient-dark bg-gradient-dark mb-0" href="add-student.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Student</a>
  </div><br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Students List</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Full Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once("db.php");

                $sql = "SELECT * FROM users";
                $result = mysqli_query($con, $sql);
    
                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $studentId = $row['id'];
                    $studentName = $row['name'];
                    $email = $row['email']; 
    
                    echo '<tr id="student_' . $studentId . '">';
                    echo '<td>';
                    echo '<h6 class="text-xs  text-center text-secondary  mb-0">' . $studentName . '</h6>';
                    echo '</td>';
    
                    echo '<td class="align-middle text-center">';
                    echo '<span class="text-secondary text-xs font-weight-bold">' . $email . '</span>';
                    echo '</td>';
                   
                    
                    
    
                     
                    echo '<td class="align-right text-center">';
                    
                    echo '<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete student" onclick="deleteStudent(' . $studentId . ')">';
                    echo '<i class="fa fa-trash-alt"></i>';
                    echo '</a>';
                    echo '</td>';
                    echo '</tr>';
                  }
                } else {
                  echo "No student details found.";
                }

                mysqli_close($con);
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</main>

<!--   Core JS Files   -->
<script src="alert.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<!-- <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script> -->
</body>

</html>
