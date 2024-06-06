<!doctype html>
<html class="no-js" lang="zxx">
    <style>
        .events-inner {
            background: #3333330d;
        }
        .yt-video{
            display: block;
            text-decoration: none;
            max-width: 100%;
            border-radius: 15px;
            background: #3333330d;
            overflow: hidden;
            margin-bottom: 30px;
            height: 100%;
            padding: 26px;
            
        }
        .yt-video img{
            width: 100%;
        }
        .yt-video h2{
            font-size: 1.5rem;
            font-weight: 200;
            padding: 15px;
            background: black;
            color: white;
        }
        .events-list{
            margin-top: 15px;
        }
        .video-container {
            border-bottom: 1px solid black; 
            margin: 15px 0; 
        }

        .yt-video video {
            display: inline-block; 
            margin: 5px; 
        }

    </style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Content Recommendation System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.php">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


<?php include('nav.php'); ?>

    <!-- Add your site or application content here -->
   
   
    <!-- slider-start -->
    <div class="slider-area">
        <div class="pages-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/bg/others_bg.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Learning Resources</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    

<!-- courses start -->

<section class="event-area">

    <div class="events-area gray-bg pt-100 pb-70">
        <div class="container">

            <form class="d-flex" id="searchForm" role="search">
                <input id="searchInput" class="form-control me-2" type="search" placeholder="Search"  value="javascript" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>



            <div class="events-list" id="events-list">
                <div class="row">
                    <div class="col-xl-6 offset-xl-0 col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                        <div class="single-events mb-30">
                            <div class="events-wrapper events-wrapper-padding">
                                <div class="events-inner d-flex">
                                    <div class="yt-video" id="videoResults">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-6 offset-xl-0 col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                        <div class="single-events mb-30">
                            <div class="events-wrapper events-wrapper-padding">
                                <div class="events-inner d-flex">
                                <div class="yt-video" id="searchResults">
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

                   
            </div>

            
        </div>
    </div>

</section>
    <!-- courses end -->




    <!-- brand start -->
    <div class="brand-area pt-80 pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                </div>
            </div>
        </div>
    </div>
    <!-- brand end -->
  
    <?php include('footer.php'); ?>


    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/one-page-nav-min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="app.js"></script>

    <script>
        function performEventSearch() {
            const searchInput = document.getElementById("event-search-input").value.toLowerCase();
            const eventList = document.getElementById("events-list");

            const eventItems = eventList.querySelectorAll(".single-events");

            for (const eventItem of eventItems) {
                const eventTitle = eventItem.querySelector(".events-text-title h4").innerText.toLowerCase();
                if (eventTitle.includes(searchInput)) {
                    eventItem.style.display = "block";
                } else {
                    eventItem.style.display = "none";
                }
            }
        }

        document.getElementById("event-search-input").addEventListener("input", performEventSearch);

    document.getElementById('logout-link').addEventListener('click', function(event) {
      event.preventDefault();

      fetch('logout.php', {
          method: 'POST',
        })
        .then(response => response.json())
        .then(data => {

        })
        .catch(error => {
          console.error('An error occurred:', error);
        });
      alert("You have been logged out.")
      location.reload();

    });
  </script>


<!-- Custom Search Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');

        // Set default value for the input field
        searchInput.value = 'javascript';

        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();
            searchPapers(searchInput.value); // Fetch papers with the provided keyword
        });

        // Default fetch on page load
        searchPapers('javascript');
    });

    function searchPapers(keyword) {
        const apiKey = 'AIzaSyDJVcwlAQ3Y9UTn1dnkuZA5ezbnf9iakt4';
        const cx = '918ffb6b37b96405c';

        const url = `https://www.googleapis.com/customsearch/v1?q=${encodeURIComponent(keyword)}&key=${apiKey}&cx=${cx}&num=10`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const results = data.items;
                let output = '';

                if (results) {
                    output += '<h2>Search Results:</h2>';
                    results.forEach(result => {
                        output += `<div><h3><a href="${result.link}" target="_blank">${result.title}</a></h3><p>${result.snippet}</p></div>`;
                    });
                } else {
                    output += '<p>No results found.</p>';
                }

                document.getElementById('searchResults').innerHTML = output;
            })
            .catch(error => console.error('Error:', error));
    }
</script>
  
</body>


</html>