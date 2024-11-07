
    document.getElementById('confirmBookingButton').addEventListener('click', function() {

    document.getElementById('confirmationModal').style.display = 'block';

    document.getElementById('bookingForm').style.display = 'none';
});

    // Sluit de modal wanneer de gebruiker ergens buiten de modal klikt
    window.onclick = function(event) {
    var modal = document.getElementById('confirmationModal');
    if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById('bookingForm').style.display = 'block'; // Toon het formulier weer
}
}
