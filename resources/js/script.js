
    document.getElementById('confirmBookingButton').addEventListener('click', function() {

    document.getElementById('confirmationModal').style.display = 'block';

    document.getElementById('bookingForm').style.display = 'none';
});

    window.onclick = function(event) {
    var modal = document.getElementById('confirmationModal');
    if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById('bookingForm').style.display = 'block';
}
}


    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [

            ]
        });

        calendar.render();
    });
