<?php

$lati = $_GET['latitude'];
$longi = $_GET['longitude'];

?>


<!DOCTYPE html>
<html>
<head>
  <title>Map Integration using Leaflet</title>
  <link rel="stylesheet" href="map/leaflet.css" />
  <script src="map/leaflet.js"></script>
</head>
<body>
  <!-- <h1>Map Integration Example</h1> -->
  <div id="map" style="height: 1000px;"></div>

  <script>
    // Function to initialize the map
    function initMap() {
      // Latitude and Longitude values (change these with your desired coordinates)
      var latitude = <?php echo $lati ?>;
      var longitude = <?php echo $longi ?>;

      var map = L.map('map').setView([latitude, longitude], 12); // You can adjust the zoom level as per your needs

      // Add a tile layer from OpenStreetMap
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      // Add a marker for the specified location
      L.marker([latitude, longitude]).addTo(map)
        .bindPopup('Your Bus is Here')
        .openPopup();
    }
  </script>

  <script>
    // Call the initMap() function once the page has loaded
    window.onload = initMap;
  </script>
</body>
</html>
