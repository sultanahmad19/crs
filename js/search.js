        // Function to perform the search
        function performSearch() {
            const searchInput = document.getElementById("search-input").value.toLowerCase();
            const courseList = document.getElementById("courses-list");

            const courseItems = courseList.querySelectorAll(".courses-wrapper");

            for (const courseItem of courseItems) {
                const courseTitle = courseItem.querySelector(".courses-heading h1").innerText.toLowerCase();
                if (courseTitle.includes(searchInput)) {
                    courseItem.style.display = "block";
                } else {
                    courseItem.style.display = "none";
                }
            }
        }
        document.getElementById("search-input").addEventListener("input", performSearch);


        document.getElementById('logout-link').addEventListener('click', function (event) {
          event.preventDefault(); // Prevent the default link behavior
        
          // Send an AJAX request to log the user out
          fetch('logout.php', {
            method: 'POST', // You can use POST or GET, depending on your server-side handling
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              window.location.href = 'login.php'; // Redirect to the login page, for example
            } else {
              // Handle any error messages if needed
              console.error(data.message);
            }
          })
          .catch(error => {
            console.error('An error occurred:', error);
          });
        });
