<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7Map</title>
    <link href="assets/favicon.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="assets/css/leaflet.css" />
    <link rel="stylesheet" href="assets/css/styles.css<?= "?v=" . rand(1, 999) ?>" />
    <script src="assets/js/leaflet.js<?= "?v=" . rand(99, 9999999) ?>"></script>
</head>

<body>
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟">
        </div>
        <div class="mapContainer">
            <div id="map"></div>
        </div>
    </div>

    <script>
        const dafaultLocation = [29.544, 51.666];
        const defaultZoom = 15;
        var map = L.map('map').setView(dafaultLocation, defaultZoom);

        var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: ' پروژه سون‌مپ &copy; بازنویسی شده توسط دانشجوی سون لرن <a href="https://github.com/seyedrezabazyar/7map">7Map</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        document.getElementById('map').style.setProperty('height', window.innerHeight + 'px');

        // Show and pin marker
        // L.marker(dafaultLocation).addTo(map).bindPopup("My Location").openPopup();
        // L.marker([29.540, 51.664]).addTo(map).bindPopup("My Location");
        // map.on('popupopen', function() {
        //     alert('Popup Opened!');
        // });

        // Get view bound information
        // var northLine = map.getBounds().getNorth(); // Khate Shomali
        // var westLine = map.getBounds().getWest(); // Khate Gharbi
        // var southLine = map.getBounds().getSouth(); // Khate Jonoobi
        // var eastLine = map.getBounds().getEast(); // Khate Sharghi

        // Use map events
        map.on('zoomend', function() {
            // alert(map.getBounds().getCenter());
            //1 : get bounds lines
            //2 : send bound lines to server
            //3 : search location in bound
            //4 : display location markers in map
        });

        // Use map events
        map.on('dblclick', function(event) {
            // alert(event.latlng.lat + " , " + event.latlng.lng);
            // L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);
            //1 : add marker to clickable location
            //2 : open modal (form) for save the clicked location
            //3 : fill the form and submit location data to server
            //4 : save location in database (status: pending review)
            //5 : review location and verify if ok
        });

        // Set view in map
        setTimeout(function() {
            // map.setView([33.772, 50.328], defaultZoom);
            // map.setView([northLine, westLine], defaultZoom);
        }, 2000)
    </script>
</body>

</html>