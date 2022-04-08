
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
map.on('zoomend', function () {
    // alert(map.getBounds().getCenter());
    //1 : get bounds lines
    //2 : send bound lines to server
    //3 : search location in bound
    //4 : display location markers in map
});

// Use map events
map.on('dblclick', function (event) {
    // alert(event.latlng.lat + " , " + event.latlng.lng);
    //1 : add marker to clickable location
    L.marker(event.latlng).addTo(map);
    //2 : open modal (form) for save the clicked location
    $('.modal-overlay').fadeIn(500);
    $('#lat-display').html(event.latlng.lat);
    $('#lng-display').html(event.latlng.lng);
    //3 : fill the form and submit location data to server
    //4 : save location in database (status: pending review)
    //5 : review location and verify if ok
});

// Set view in map
// setTimeout(function () {
//     map.setView([33.772, 50.328], defaultZoom);
//     map.setView([northLine, westLine], defaultZoom);
// }, 2000)

// find Current Location (at first, Use Shekan.ir)
var current_position, current_accuracy;
map.on('locationfound', function (e) {
    // if position defined, then remove the existing position marker and accuracy circle from the map
    if (current_position) {
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);
    }
    var radius = e.accuracy;
    current_position = L.marker(e.latlng).addTo(map)
        .bindPopup("دقت تقریبی: " + radius + " متر").openPopup();
    current_accuracy = L.circle(e.latlng, radius).addTo(map);
});
map.on('locationerror', function (e) {
    alert(e.message);
});
// wrap map.locate in a function    
function locate() {
    map.locate({ setView: true, maxZoom: defaultZoom });
}
// call locate every 5 seconds... forever
// setInterval(locate, 5000);