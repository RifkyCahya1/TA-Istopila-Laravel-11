document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: '/bookings-on-progress',
      eventClick: function(info) {
          const bookingData = info.event.extendedProps.bookingData;
          showBookingDetailModal(bookingData);
      }
  });
  calendar.render();
});

function showBookingDetailModal(bookingData) {
  $('#bookingName').text('Nama: ' + bookingData.nama);
  $('#bookingAddress').text('Alamat: ' + bookingData.alamat);
  $('#bookingDateTime').text('Waktu: ' + bookingData.date);
  $('#bookingDate').text('Tanggal: ' + bookingData.date);
  $('#navigateToLocationBtn').attr('onclick', `navigateToLocation(${bookingData.latitude}, ${bookingData.longitude})`);
  
  const startDateTime = new Date(bookingData.date).toISOString().replace(/-|:|\.\d+/g, '');
  const endDateTime = new Date(new Date(bookingData.date).getTime() + 60 * 60 * 1000).toISOString().replace(/-|:|\.\d+/g, ''); // Assume 1-hour event

  const googleCalendarUrl = `https://www.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(bookingData.nama)}&dates=${startDateTime}/${endDateTime}&details=${encodeURIComponent(bookingData.alamat)}&location=${encodeURIComponent(bookingData.alamat)}`;
  $('#addToCalendarBtn').attr('onclick', `window.open('${googleCalendarUrl}', '_blank')`);

  $('#bookingDetailModal').modal('show');
}

function navigateToLocation(latitude, longitude) {
  window.open(`https://www.google.com/maps?q=${latitude},${longitude}`);
}
