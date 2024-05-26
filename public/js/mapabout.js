var mymap = L.map('map-about').setView([-7.450451879831571, 112.71845945186416], 15);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(mymap);

var predeterminedLocation = L.marker([-7.450451879831571, 112.71845945186416]).addTo(mymap);
predeterminedLocation.bindPopup("<b>Istopila</b><br>Fotografer.<br>Couple, Engagement, Wedding").openPopup();

mymap.on('click', function(e) {
    var destinationLatLng = predeterminedLocation.getLatLng(); 
    var googleMapsLink = "https://www.google.com/maps/dir/?api=1&destination=" + destinationLatLng.lat + "," + destinationLatLng.lng;
    window.open(googleMapsLink, "_blank");
});
