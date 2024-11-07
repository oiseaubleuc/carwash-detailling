<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bevestiging van uw afspraak</title>
</head>
<body>
<h1>Bevestiging van uw afspraak</h1>
<p>Geachte klant,</p>
<p>Hierbij bevestigen we uw afspraak met de volgende details:</p>
<ul>
    <li>Naam: {{ $details['name'] }}</li>
    <li>Datum: {{ $details['date'] }}</li>
    <li>Tijd: {{ $details['time'] }}</li>
    <li>Diensten: {{ $details['services'] }}</li>
</ul>
<p>We kijken ernaar uit u te verwelkomen!</p>
</body>
</html>
