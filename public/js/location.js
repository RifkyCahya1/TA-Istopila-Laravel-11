const map = L.map('map').setView([-7.450451879831571, 112.71845945186416], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { errorTileUrl: 'error.png',}).addTo(map);

// Inisialisasi penyedia pencarian lokasi
const provider = new GeoSearch.OpenStreetMapProvider({
    params: {
        addressdetails: 1, // include additional address detail parts
      },
});

// Inisialisasi kontrol pencarian lokasi
const search = new GeoSearch.GeoSearchControl({
    provider: provider,
    notFoundMessage: 'Sorry, that address could not be found.',
    style: 'bar',
})

map.addControl(search);

let marker;

map.on('moveend', function() {
    console.log('Peta telah digeser ke', map.getCenter());
});

map.on('zoomend', function() {
    console.log('Peta telah di-zoom ke level', map.getZoom());
});

map.on('click', function(event) {
    // Dapatkan koordinat lokasi dari event klik
    const lat = event.latlng.lat;
    const lng = event.latlng.lng;

    // Hapus marker yang mungkin sudah ada sebelumnya
    if (marker) {
        map.removeLayer(marker);
    }

    // Buat marker baru dengan koordinat yang didapatkan dari event klik
    marker = L.marker([lat, lng]).addTo(map);

    // Set nilai input hidden dengan koordinat lokasi
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
});

// Tambahkan event listener untuk event 'markgeocode'
map.on('geosearch/showlocation', function(event) {
    // Dapatkan koordinat lokasi
    const lat = event.location.y;
    const lng = event.location.x;

    // Set nilai input hidden dengan koordinat lokasi
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
});
