
    const apiKey = 'AIzaSyBbPQ4aBI2qBhiAw6VzD2cKOT4faYExc9U';

    function fetchVideos(keyword) {
        // Validate the input to ensure a valid keyword
        if (!keyword.trim()) {
            alert("Please enter a keyword to search for videos.");
            return;
        }

        // Fetch data from YouTube API
        fetch(`https://www.googleapis.com/youtube/v3/search?key=${apiKey}&q=${encodeURIComponent(keyword)}&part=snippet&maxResults=10&type=video`)
            .then(response => response.json())
            .then(data => {
                const videoResultsDiv = document.getElementById("videoResults");
                videoResultsDiv.innerHTML = ""; // Clear previous results

                if (data.items) {
                    data.items.forEach(item => {
                        const videoId = item.id.videoId;
                        const title = item.snippet.title;

                        const videoContainer = document.createElement("div");
                        videoContainer.classList.add("video-container");

                        const videoTitle = document.createElement("h2");
                        videoTitle.textContent = title;

                        const videoFrame = document.createElement("iframe");
                        videoFrame.src = `https://www.youtube.com/embed/${videoId}`;
                        videoFrame.allowFullscreen = true;

                        videoContainer.appendChild(videoTitle);
                        videoContainer.appendChild(videoFrame);

                        videoResultsDiv.appendChild(videoContainer);
                    });
                } else {
                    videoResultsDiv.textContent = "No videos found.";
                }
            })
            .catch(error => console.error("Error fetching videos:", error));
    }

    document.addEventListener("DOMContentLoaded", function() {
        const searchForm = document.getElementById("searchForm");
        const searchInput = document.getElementById("searchInput");

        // Set a default value for the input field
        searchInput.value = "javascript"; 

        // Call the fetch function when the form is submitted
        searchForm.addEventListener("submit", function(event) {
            event.preventDefault();
            fetchVideos(searchInput.value); // Fetch videos with the input keyword
        });

        // Perform a default fetch on page load
        fetchVideos("javascript"); // Default keyword
    });