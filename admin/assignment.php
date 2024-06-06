<?php include("header.php"); ?>
<?php require_once("db.php"); ?>
<?php require_once("deletecourse.php"); ?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Assignments</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Assignments</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center w-40">
        <div class="input-group">
        </div>
      </div>
      <?php  include("navbar.php");?>

    </div>
  </div>
</nav> <!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="col-md-12 text-right">
    <a class="btn bg-gradient-dark mb-0" href="add-assignment.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Assignments</a>
  </div><br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Assignment Detail</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Course ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Code</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 py-3">Teacher Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3">Assignment Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3">Action</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Fetch course details from the database and iterate through the results
                $sql = "SELECT id, coursecode, coursename, teachername, assignment FROM assignment_details";
                $result = mysqli_query($con, $sql);

                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $assignmentId = $row['id'];
                    $courseCode = $row['coursecode'];
                    $courseName = $row['coursename'];
                    $teacherName = $row['teachername'];
                    $assignmentfilename = $row['assignment'];
                    $assignmentPath = 'assignments/' . $assignmentfilename;

                    // Output a table row for each course
                    echo '<tr>';
                    echo '<td>';
                    echo '<p class="text-xs text-secondary mb-0">' . $assignmentId . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<p class="text-xs text-secondary mb-0">' . $courseCode . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<div class="d-flex px-2 py-1">';
                    echo '<p class="text-xs text-secondary mb-0">' . $courseName . '</p>';
                    echo '</div>';
                    echo '</td>';
                    echo '<td>';
                    echo '<div class="d-flex px-2 py-1">';
                    echo '<p class="text-xs text-secondary mb-0">' . $teacherName . '</p>';
                    echo '</div>';
                    echo '</td>';
                    echo '<td>';
                    echo '<div class="d-flex px-9 py-1">';
                    echo '<a href="' . $assignmentPath . '" target="_blank">View Assignment Details</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '<td class="align-right text-center">';
                    // echo '<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="editAssignment(' . $assignmentId . ')">';
                    // echo '<i class="fa fa-edit"></i>';
                    // echo '</a> | ';
                    echo '<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" onclick="deleteAssignment(' . $assignmentId . ')">';
                    echo '<i class="fa fa-trash-alt"></i>';
                    echo '</a>';
                    echo '</td>';
                    echo '</tr>';
                  }
                } else {
                  echo "No course details found.";
                }
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

  function deleteAssignment(assignmentId) {
    if (confirm("Are you sure you want to delete this course?")) {
      // Send an AJAX request to the server to delete the course
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "deletecourse.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Check if the deletion was successful
          if (xhr.responseText === "success") {
            // Remove the corresponding row from the HTML table
            var row = document.getElementById("courseRow_" + assignmentId);
            if (row) {
              row.parentNode.removeChild(row);
            }
          } else {
            alert("Failed to delete the course.");
          }
        }
      };
      xhr.send("assignmentId=" + assignmentId);
    }
  }

  function editAssignment(assignmentId) {
    window.location.href = "editAssignment.php?assignmentId=" + assignmentId;
  }

// Search Function
  document.addEventListener('DOMContentLoaded', function() {
    const searchCourseInput = document.getElementById('searchCourse');
    const tableRows = document.querySelectorAll('table tbody tr');

    searchCourseInput.addEventListener('input', function() {
      const searchValue = searchCourseInput.value.toLowerCase();
      tableRows.forEach(function(row) {
        const assignmentName = row.querySelector('td:nth-child(3)').textContent.toLowerCase(); // Adjust the column index as needed
        if (assignmentName.includes(searchValue)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
</body>

</html>