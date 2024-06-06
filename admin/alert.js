function hideAlert() {
    var alerts = document.querySelectorAll('.alert');
    if (alerts) {
      setTimeout(function() {
        alerts.forEach(function(alert) {
          alert.style.display = 'none';
        });
      }, 2000); // Adjust the duration as needed
    }
  }

  document.addEventListener('DOMContentLoaded', hideAlert);



  // Delete teacher
function deleteTeacher(teacherId) {
  if (confirm("Are you sure you want to delete this teacher?")) {
    fetch('delete-teacher.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `teacherId=${teacherId}`
    })
    .then(response => response.text())
    .then(data => {
      if (data === "success") {
        const teacherRow = document.getElementById(`teacherRow_${teacherId}`);
        if (teacherRow) {
          teacherRow.remove();
        }
      } else {
        alert("Failed to delete the teacher.");
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert("An error occurred while deleting the teacher.");
    });
  }
}


  function editTeacher(teacherId) {
    window.location.href = "editteacher.php?teacherId=" + teacherId;
  }
  

 



  

   

//  delete student 

  function deleteStudent(studentId) {
    if (confirm("Are you sure you want to delete this student?")) {
      fetch('delete-student.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `studentId=${studentId}`
      })
      .then(response => response.text())
      .then(data => {
        if (data === "success") {
          const studentRow = document.getElementById(`student_${studentId}`);
          if (studentRow) {
            studentRow.remove();
          }
        } else {
          alert("Failed to delete the student.");
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert("An error occurred while deleting the student.");
      });
    }
  }


  
  

  // Search Function

  // document.addEventListener('DOMContentLoaded', function() {
  //   const searchCourseInput = document.getElementById('searchCourse');
  //   const tableRows = document.querySelectorAll('table tbody tr');

  //   searchCourseInput.addEventListener('input', function() {
  //     const searchValue = searchCourseInput.value.toLowerCase();
  //     tableRows.forEach(function(row) {
  //       const courseName = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
  //       if (courseName.includes(searchValue)) {
  //         row.style.display = '';
  //       } else {
  //         row.style.display = 'none';
  //       }
  //     });
  //   });
  // });