<?php include("header.php"); ?>
<?php require_once("db.php"); ?>
<?php require_once("deletecourse.php"); ?>
<?php require_once("download.php"); ?>




<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Papers</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Papers</h6>
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
    <a class="btn bg-gradient-dark mb-0" href="add-Papers.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Papers</a>
  </div><br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Papers Detail</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paper ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Code</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Name</th>
                 
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Papers Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Fetch course details from the database and iterate through the results
                $sql = "SELECT id, coursecode, coursename, peper FROM peper_details";
                $result = mysqli_query($con, $sql);

                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $peperId = $row['id'];
                    $courseCode = $row['coursecode'];
                    $courseName = $row['coursename'];
                    $PaperFilename = $row['peper'];
                    $PaperPath = 'pastpapers/' . $PaperFilename;

                    // Output a table row for each course
                    echo '<tr>';
                    echo '<td>';
                    echo '<p class="text-xs text-secondary mb-0">' . $peperId . '</p>';
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
                    echo '<div class="d-flex px-9 py-1">';
                    echo '<a href="download.php?peperId=' . $peperId . '">View Paper Details</a>';

                    echo '</div>';
                    echo '</td>';
                    echo '<td class="align-right text-center">';
                    // echo '<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="editPaper(' . $peperId . ')">';
                    // echo '<i class="fa fa-edit"></i>';
                    // echo '</a> | ';
                    echo '<a href="javascript:;" class="text-secondary font-weight-bold text-xs delete-paper" data-toggle="tooltip" data-original-title="Delete paper" data-paper-id="' . $peperId . '">';
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
  document.addEventListener('DOMContentLoaded', function() {
    // Event listener for clicking on the "Delete" link
    document.querySelectorAll('.delete-paper').forEach(function(link) {
      link.addEventListener('click', function() {
        // Get the paper ID from the data attribute
        var paperId = this.getAttribute('data-paper-id');

        // Confirm deletion
        var confirmDelete = confirm("Are you sure you want to delete this paper?");
        if (confirmDelete) {
          // Send AJAX request to delete the paper
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'delete_paper.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              // Check if deletion was successful
              if (xhr.responseText === "success") {
                // Remove the corresponding row from the HTML table
                var row = document.getElementById("paperRow_" + paperId);
                if (row) {
                  row.parentNode.removeChild(row);
                }
              } else {
                console.error('Error deleting paper.');
              }
            }
          };
          xhr.send('paperId=' + paperId);
        }
      });
    });
  });
</script>




<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }

  

  function editPaper(peperId) {
    window.location.href = "editPaper.php?peperId=" + peperId;
  }



  // Search Function
  document.addEventListener('DOMContentLoaded', function() {
    const searchCourseInput = document.getElementById('searchCourse');
    const tableRows = document.querySelectorAll('table tbody tr');

    searchCourseInput.addEventListener('input', function() {
      const searchValue = searchCourseInput.value.toLowerCase();
      tableRows.forEach(function(row) {
        const PaperName = row.querySelector('td:nth-child(3)').textContent.toLowerCase(); // Adjust the column index as needed
        if (PaperName.includes(searchValue)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script
<script>
    
</script>

<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
</body>

</html>