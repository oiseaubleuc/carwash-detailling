@extends('layouts.layout')

@section('content')
    <div class="about-container">
        <h1>Over Ons</h1>
        <p>Welkom bij Car Wash Detailing! Wij zijn gespecialiseerd in hoogwaardige autoverzorging en bieden een scala aan services om uw auto weer te laten stralen. Van basisonderhoud tot diepgaande detailing, ons team is toegewijd aan het leveren van perfectie in elk detail.</p>

        <div class="about-services">
            <div class="service-description">
                <h2>Onze Diensten</h2>
                <p>Bij Car Wash Detailing bieden wij uitgebreide diensten om uw auto te reinigen, te beschermen en de uitstraling te verbeteren. Ons ervaren team gebruikt de beste producten en technieken voor een resultaat dat de verwachtingen overtreft.</p>
            </div>

            <div class="about-images">
                <!-- Service 1 -->
                <div class="image-card">
                    <img src="{{ asset('images/carwash.jpg') }}" alt="Professionele Wasbeurt">
                    <h3>Professionele Wasbeurt</h3>
                    <p>Onze professionele wasbeurten zijn ontworpen om zelfs het meest hardnekkige vuil te verwijderen. We gebruiken veilige en effectieve producten die uw lak beschermen en uw auto weer als nieuw laten glanzen.</p>
                </div>

                <!-- Service 2 -->
                <div class="image-card">
                    <img src="{{ asset('images/interieur.jpg') }}" alt="Interieur Reiniging">
                    <h3>Interieur Reiniging</h3>
                    <p>Een frisse en schone omgeving in uw auto begint bij een grondige interieurreiniging. Wij reinigen en desinfecteren uw stoelen, tapijten, dashboard en meer voor een compleet opgefrist interieur.</p>
                </div>

                <!-- Service 3 -->
                <div class="image-card">
                    <img src="{{ asset('images/foto1.jpg') }}" alt="Exterieur Polijsten">
                    <h3>Exterieur Polijsten</h3>
                    <p>Onze polijstservice verwijdert kleine krassen en onvolkomenheden uit de lak van uw auto. Hierdoor krijgt uw auto een diepere glans en ziet het er weer als nieuw uit.</p>
                </div>

                <!-- Service 4 -->
                <div class="image-card">
                    <img src="{{ asset('images/foto2.png') }}" alt="Keramische Coating">
                    <h3>Keramische Coating</h3>
                    <p>Onze keramische coating biedt een langdurige bescherming tegen vuil, UV-stralen en andere externe invloeden. Het zorgt ervoor dat uw lak beschermd is en een schitterende glans behoudt.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
