<?php
// Assuming you have established a database connection
$host = "127.0.0.1";
$userName = "root";
$userPass = "";
$database = "barangay";
$connectQuery = mysqli_connect($host, $userName, $userPass, $database);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($connectQuery, $_GET['search']);

    // Define an array of tables to search from
    $tables = array(
        'anabu1a','anabu1b','anabu1c','anabu1d','anabu1e','anabu1f',
        'anabu2a','anabu2b','anabu2c','anabu2d','anabu2e','anabu2f',
        'bagongsilang','buhaynatubig','carsadangbago1','carsadangbago2',
         'malagasang2a','malagasang2b','malagasang2c', 'malagasang2d','malagasang2g',
        'marianoespeleta1','marianoespeleta2','marianoespeleta3',
        'pagasa1','pagasa2','pagasa3',
        'palico1','palico2','palico3','palico4',
        'pasongbuaya1','pasongbuaya2','pinagbuklod');



    $suggestions = array();

    foreach ($tables as $table) {
        $query = "SELECT DISTINCT menuname, restaurant_name FROM (SELECT menuname, restaurant_name FROM $table WHERE menuname LIKE '%$searchTerm%') AS subquery";
        $result = mysqli_query($connectQuery, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $menuNameLines = explode("\n", $row['menuname']);
            $restaurantName = $row['restaurant_name'];

            foreach ($menuNameLines as $line) {
                if (stripos($line, $searchTerm) !== false) {
                    $suggestions[] = '<span style="color: black;font-size: 14px;">' . $line . '</span>' . ' - <span style="font-style: italic; font-size: 10px; color: gray;">' . htmlspecialchars($restaurantName) . '</span>' . ' - ' . $table ;
                }
            }
        }
    }

    echo json_encode($suggestions);
    exit(); // Stop further execution after sending suggestions
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>KaiNimo</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8nZ7sRmOQKqzXrPVJ0M-s5g56iL44yLo&callback=initMap"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>
<body>
    <div id="floatingLogo">
        <img src="logo.png" alt="Your Logo" />
    </div>
    <header>
        <h1></h1>
        <nav>
            <a href="homepage.html">HOME</a>
            <div class="dropdown">
                <a href="dashboard.html" class="dropbtn">BARANGAYS</a>
                <div class="dropdown-content">
                    <div class="nested-dropdown">
                        <a href="#">Alapan</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/alapan1a.php">Alapan I-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/alapan1b.php">Alapan I-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/alapan1c.php">Alapan I-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/alapan2a.php">Alapan II-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/alapan2b.php">Alapan II-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/alapan2c.php">Alapan II-C</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Anabu</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/KaiNimo/KaiNimo/anabu1a.php">Anabu I-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu1b.php">Anabu I-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu1c.php">Anabu I-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu1d.php">Anabu I-D</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu1e.php">Anabu I-E</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu1f.php">Anabu I-F</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu2a.php">Anabu II-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu2b.php">Anabu II-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu2c.php">Anabu II-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu2d.php">Anabu II-D</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu2e.php">Anabu II-E</a>
                            <a href="http://localhost/kainimo/KaiNimo/anabu2f.php">Anabu II-F</a>
                        </div>
                    </div>
                    <a href="http://localhost/kainimo/KaiNimo/bagongsilang.php">Bagong Silang</a>
                    <div class="nested-dropdown">
                        <a href="http://localhost/kainimo/KaiNimo/bayanluma.php">Bayan Luma</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma1.php">Bayan Luma I</a>
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma2.php">Bayan Luma II</a>
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma3.php">Bayan Luma III</a>
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma4.php">Bayan Luma IV</a>
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma5.php">Bayan Luma V</a>
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma6.php">Bayan Luma VI</a>
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma7.php">Bayan Luma VII</a>
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma8.php">Bayan Luma VII</a>
                            <a href="http://localhost/kainimo/KaiNimo/bayanluma9.php">Bayan Luma IX</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Bucandala</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/bucandala1.php">Bucandala I</a>
                            <a href="http://localhost/kainimo/KaiNimo/bucandala2.php">Bucandala II</a>
                            <a href="http://localhost/kainimo/KaiNimo/bucandala3.php">Bucandala III</a>
                            <a href="http://localhost/kainimo/KaiNimo/bucandala4.php">Bucandala IV</a>
                            <a href="http://localhost/kainimo/KaiNimo/bucandala5.php">Bucandala V</a>
                        </div>
                    </div>
                    <a href="http://localhost/kainimo/KaiNimo/buhaynatubig.php">Buhay na Tubig</a>
                    <div class="nested-dropdown">
                        <a href="#">Carsadong Bago</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/carsadongbago1.php">Carsadong Bago I</a>
                            <a href="http://localhost/kainimo/KaiNimo/carsadongbago2.php">Carsadong Bago II</a>
                        </div>
                    </div>
                    <a href="http://localhost/kainimo/KaiNimo/magdalo.php">Magdalo</a>
                    <a href="http://localhost/kainimo/KaiNimo/maharlika.php">Maharlika</a>

                    <div class="nested-dropdown">
                        <a href="#">Malagasang</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/malagasang1a.php">Malagasang I-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang1b.php">Malagasang I-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang1c.php">Malagasang I-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang1d.php">Malagasang I-D</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang1e.php">Malagasang I-E</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang1f.php">Malagasang I-F</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang1g.php">Malagasang I-G</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang2a.php">Malagasang II-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang2b.php">Malagasang II-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang2c.php">Malagasang II-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang2d.php">Malagasang II-D</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang2e.php">Malagasang II-E</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang2f.php">Malagasang II-F</a>
                            <a href="http://localhost/kainimo/KaiNimo/malagasang2g.php">Malagasang II-G</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Mariano Espeleta</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/marianoespeleta1.php">Mariano Espeleta I</a>
                            <a href="http://localhost/kainimo/KaiNimo/marianoespeleta2.php">Mariano Espeleta II</a>
                            <a href="http://localhost/kainimo/KaiNimo/marianoespeleta3.php">Mariano Espeleta III</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Medicion</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/medicion1a">Medicion I-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion1b">Medicion I-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion1c">Medicion I-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion1d">Medicion I-D</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion2a">Medicion II-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion2b">Medicion II-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion2c">Medicion II-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion2d">Medicion II-D</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion2e">Medicion II-E</a>
                            <a href="http://localhost/kainimo/KaiNimo/medicion2f">Medicion II-F</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Pag-asa</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/pagasa1">Pag-asa I</a>
                            <a href="http://localhost/kainimo/KaiNimo/pagasa2">Pag-asa II</a>
                            <a href="http://localhost/kainimo/KaiNimo/pagasa3">Pag-asa III</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Palico</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/palico1">Palico I</a>
                            <a href="http://localhost/kainimo/KaiNimo/palico2">Palico II</a>
                            <a href="http://localhost/kainimo/KaiNimo/palico3">Palico III</a>
                            <a href="http://localhost/kainimo/KaiNimo/palico4">Palico IV</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Pasong Buaya</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/pasongbauya1">Pasong Buaya I</a>
                            <a href="http://localhost/kainimo/KaiNimo/pasongbauya2">Pasong Buaya II</a>
                        </div>
                    </div>
                    <a href="#">Pinagbuklod</a>
                    <div class="nested-dropdown">
                        <a href="#">Poblacion</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/poblacion1a">Poblacion I-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion1b">Poblacion I-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion1c">Poblacion I-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion2a">Poblacion II-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion2b">Poblacion II-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion2c">Poblacion II-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion3a">Poblacion III-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion3b">Poblacion III-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion3c">Poblacion III-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion4a">Poblacion IV-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion4b">Poblacion IV-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion4c">Poblacion IV-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/poblacion4d">Poblacion IV-D</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Tanzang Luma</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/tanzangluma1">Tanzang Luma I</a>
                            <a href="http://localhost/kainimo/KaiNimo/tanzangluma2">Tanzang Luma II</a>
                            <a href="http://localhost/kainimo/KaiNimo/tanzangluma3">Tanzang Luma III</a>
                            <a href="http://localhost/kainimo/KaiNimo/tanzangluma4">Tanzang Luma IV</a>
                            <a href="http://localhost/kainimo/KaiNimo/tanzangluma5">Tanzang Luma V</a>
                            <a href="http://localhost/kainimo/KaiNimo/tanzangluma6">Tanzang Luma VI</a>
                        </div>
                    </div>
                    <div class="nested-dropdown">
                        <a href="#">Toclong</a>
                        <div class="nested-dropdown-content">
                            <a href="http://localhost/kainimo/KaiNimo/toclong1a">Toclong I-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/toclong1b">Toclong I-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/toclong1c">Toclong I-C</a>
                            <a href="http://localhost/kainimo/KaiNimo/toclong2a">Toclong II-A</a>
                            <a href="http://localhost/kainimo/KaiNimo/toclong2b">Toclong II-B</a>
                            <a href="http://localhost/kainimo/KaiNimo/toclong2c">Toclong II-C</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="about.html">ABOUT</a>
        </nav>
    </header>
    <h2> SEARCH WITHOUT <br />LEAVING YOUR  <span class="yellow-text"> SPACE</span></h2>

    <h3> <i>What are you craving for? </i></h3>
    <section id="search" class="autocomplete">
        <form id="searchForm" action="" method="get">
            <input type="search" id="searchInput" name="search" placeholder="Search..." />
            <button type="submit"><i class="fas fa-search"></i></button>
            <div class="autocomplete-items" id="autocompleteItems"></div>
        </form>
        <button id="seeNearYouButton" onclick="seeNearYou()">See near you <i class="fas fa-map-pin"></i></button>
        <div id="map" style="height: 400px;"></div>
    </section>
   

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span id="modalClose" class="close">&times;</span>
            <p style="font-size:10px;color:maroon;"></p>

            <div id="modalContent"></div>
        </div>
    </div>

    <?php
    // Assuming you have established a database connection
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = mysqli_real_escape_string($connectQuery, $_GET['search']);

        $query = "SELECT menuname, 'anabu1a' as source_table FROM anabu1a WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu1b' as source_table FROM anabu1b WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu1c' as source_table FROM anabu1c WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu1d' as source_table FROM anabu1d WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu1e' as source_table FROM anabu1e WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu1f' as source_table FROM anabu1f WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu2a' as source_table FROM anabu2a WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu2b' as source_table FROM anabu2b WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu2c' as source_table FROM anabu2c WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu2d' as source_table FROM anabu2d WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu2e' as source_table FROM anabu2e WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'anabu2f' as source_table FROM anabu2f WHERE menuname LIKE '%$searchTerm%'
                  UNION
              
                  SELECT menuname, 'bagongsilang' as source_table FROM bagongsilang WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'bucandala1' as source_table FROM bucandala1 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'bucandala2' as source_table FROM bucandala2 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'buhaynatubig' as source_table FROM buhaynatubig WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'carsadangbago1' as source_table FROM carsadangbago1 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'carsadangbago2' as source_table FROM carsadangbago2 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  
                  SELECT menuname, 'malagasang2a' as source_table FROM malagasang2a WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'malagasang2b' as source_table FROM malagasang2b WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'malagasang2c' as source_table FROM malagasang2c WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'malagasang2d' as source_table FROM malagasang2d WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  
                  SELECT menuname, 'malagasang2g' as source_table FROM malagasang2g WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'marianoespeleta1' as source_table FROM marianoespeleta1 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'marianoespeleta2' as source_table FROM marianoespeleta2 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'marianoespeleta3' as source_table FROM marianoespeleta3 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  
                  SELECT menuname, 'pagasa1' as source_table FROM pagasa1 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'pagasa2' as source_table FROM pagasa2 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'pagasa3' as source_table FROM pagasa3 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'palico1' as source_table FROM palico1 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'palico2' as source_table FROM palico2 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'palico3' as source_table FROM palico3 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'palico4' as source_table FROM palico4 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'pasongbuaya1' as source_table FROM pasongbuaya1 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'pasongbuaya2' as source_table FROM pasongbuaya2 WHERE menuname LIKE '%$searchTerm%'
                  UNION
                  SELECT menuname, 'pinagbuklod' as source_table FROM pinagbuklod WHERE menuname LIKE '%$searchTerm%'";

        $result = mysqli_query($connectQuery, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Display the search results
            while ($row = mysqli_fetch_assoc($result)) {
                // Display only the menu items that contain the search term
                if (stripos($row['menuname'], $searchTerm) !== false) {
                    echo "<p>Menu Item: " . htmlspecialchars($row['menuname']) . "</p>";
                    echo "<p>Source Table: " . htmlspecialchars($row['source_table']) . "</p>";
                    // Display other menu details as needed
                }
            }
        } else {
            echo "No results found for '$searchTerm'.";
        }
    }
    ?>

    <footer>
        <div class="footer-container">
            <p>Copyright &copy; 2023 KaiNimo</p>
        </div>
    </footer>
    <script src="homepage.js"></script>
    <script>
        function initMap() {
            // Initialize the map
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom: 15
            });

            // Try HTML5 geolocation
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Set the map center to the user's location
                    map.setCenter(userLocation);

                    // Add a marker for the user's location
                    var marker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: 'Your Location'
                    });

                    // You can customize the marker or add additional features as needed
                }, function() {
                    handleLocationError(true, map.getCenter());
                });
            } else {
                // Browser doesn't support geolocation
                handleLocationError(false, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            // Handle errors when geolocation is not supported or fails
            // You can customize this function based on your requirements
            console.error(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        }
            document.getElementById("seeNearYouButton").addEventListener("click", function () {
        // Open the modal
        document.getElementById("myModal").style.display = "block";

        // Initialize the map
        initMap();
    });

    // Close the modal when the close button is clicked
    document.getElementById("modalClose").addEventListener("click", function () {
        document.getElementById("myModal").style.display = "none";
    });

    // Close the modal when clicking outside of it
    window.onclick = function (event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
            function seeNearYou() {
        // Open the modal
        document.getElementById("myModal").style.display = "block";

        // Initialize the map
        initMap();
    }

    </script>




</body>
</html>
