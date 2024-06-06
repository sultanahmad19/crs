<?php include("header.php"); ?>
<?php require_once("db.php"); ?>
<?php require_once("deletecourse.php"); ?>
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Quizzes</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Quizzes</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center w-40">
        <div class="input-group">
          </div>
      </div>

      <?php include("navbar.php"); ?>

    </div>
  </div>
</nav> <!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="col-md-12 text-right">
    <a class="btn bg-gradient-dark mb-0" href="add-quizz.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Quizz</a>
  </div><br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Quizzes Detail</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quiz ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Code</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Teacher Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quiz Date</th>
                 
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
              <?php
require_once("db.php");

$sql = "SELECT id, coursecode, coursename, teachername, quizdate, quiz FROM quiz_details";
$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $quizId = $row['id'];
        $courseCode = $row['coursecode'];
        $courseName = $row['coursename'];
        $teacherName = $row['teachername'];
        $quizDate = $row['quizdate'];
        $quizFiles = explode(',', $row['quiz']); // Explode the quiz file names

        echo '<tr>';
        echo '<td>' . $quizId . '</td>';
        echo '<td>' . $courseCode . '</td>';
        echo '<td>' . $courseName . '</td>';
        echo '<td>' . $teacherName . '</td>';
        echo '<td>' . $quizDate . '</td>';
       
        echo '<td class="align-middle text-center">';
        echo '<a href="download_quiz.php?quiz_id=' . $quizId . '" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Download all files">';
        echo 'Download ';
        echo '</a> | ';
        echo '<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete quiz" onclick="deleteQuiz(' . $quizId . ')">';
        echo '<i class="fa fa-trash-alt"></i>';
        echo '</a>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo "No quiz details found.";
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

  function deleteQuiz(quizId) {
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
            var row = document.getElementById("courseRow_" + quizId);
            if (row) {
              row.parentNode.removeChild(row);
            }
          } else {
            console.log('deleted')
          }
        }
      };
      xhr.send("quizId=" + quizId);
    }
  }

  function editQuiz(quizId) {
    window.location.href = "editquiz.php?quizId=" + quizId;
  }



  // Search Function
  document.addEventListener('DOMContentLoaded', function() {
    const searchCourseInput = document.getElementById('searchCourse');
    const tableRows = document.querySelectorAll('table tbody tr');

    searchCourseInput.addEventListener('input', function() {
      const searchValue = searchCourseInput.value.toLowerCase();
      tableRows.forEach(function(row) {
        const quizName = row.querySelector('td:nth-child(3)').textContent.toLowerCase(); // Adjust the column index as needed
        if (quizName.includes(searchValue)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
</body>

</html>