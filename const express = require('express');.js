const express = require('express');
const axios = require('axios');

const app = express();
const PORT = process.env.PORT || 3000;

// API endpoint to fetch course videos
app.get('/videos', async (req, res) => {
    try {
        // Get the course name from the request query parameters
        const course = req.query.course;

        // Make a GET request to the YouTube API to search for videos based on the course name
        const response = await axios.get('https://www.googleapis.com/youtube/v3/search', {
            params: {
                part: 'snippet',
                q: course + ' course', // Append 'course' to the query for better search results
                maxResults: 10, // Number of results to fetch
                key: 'YOUR_YOUTUBE_API_KEY' // Replace 'YOUR_YOUTUBE_API_KEY' with your actual YouTube Data API key
            }
        });

        // Extract video data from the response
        const videos = response.data.items.map(item => ({
            title: item.snippet.title,
            videoId: item.id.videoId,
            thumbnail: item.snippet.thumbnails.default.url
        }));

        // Send the videos as JSON response
        res.json({ videos });
    } catch (error) {
        console.error('Error fetching videos:', error.message);
        res.status(500).json({ error: 'Internal Server Error' });
    }
});

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
