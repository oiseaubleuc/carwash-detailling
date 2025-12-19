@extends('layouts.layout')

@section('title', 'Over Ons - MEA Detailing')

@section('content')
    <div class="about-container">
        <h1>Over Ons</h1>
        <p>Welkom bij MEA Detailing! Wij zijn gespecialiseerd in hoogwaardige autoverzorging en bieden een scala aan services om uw auto weer te laten stralen. Van basisonderhoud tot diepgaande detailing, ons team is toegewijd aan het leveren van perfectie in elk detail.</p>

        <div class="about-services">
            <div class="service-description">
                <h2>Onze Diensten</h2>
                <p>Bij Car Wash Detailing bieden wij uitgebreide diensten om uw auto te reinigen, te beschermen en de uitstraling te verbeteren. Ons ervaren team gebruikt de beste producten en technieken voor een resultaat dat de verwachtingen overtreft.</p>
            </div>

            <div class="about-images">
                <div class="image-card">
                    <img src="{{ asset('images/service-wash.jpg') }}" alt="Professionele Wasbeurt">
                    <h3>Professionele Wasbeurt</h3>
                    <p>Onze professionele wasbeurten zijn ontworpen om zelfs het meest hardnekkige vuil te verwijderen. We gebruiken veilige en effectieve producten die uw lak beschermen en uw auto weer als nieuw laten glanzen.</p>
                </div>

                <div class="image-card">
                    <img src="{{ asset('images/service-interior.jpg') }}" alt="Interieur Reiniging">
                    <h3>Interieur Reiniging</h3>
                    <p>Een frisse en schone omgeving in uw auto begint bij een grondige interieurreiniging. Wij reinigen en desinfecteren uw stoelen, tapijten, dashboard en meer voor een compleet opgefrist interieur.</p>
                </div>

                <div class="image-card">
                    <img src="{{ asset('images/service-polish.jpg') }}" alt="Exterieur Polijsten">
                    <h3>Exterieur Polijsten</h3>
                    <p>Onze polijstservice verwijdert kleine krassen en onvolkomenheden uit de lak van uw auto. Hierdoor krijgt uw auto een diepere glans en ziet het er weer als nieuw uit.</p>
                </div>

                <div class="image-card">
                    <img src="{{ asset('images/service-premium.jpg') }}" alt="Keramische Coating">
                    <h3>Keramische Coating</h3>
                    <p>Onze keramische coating biedt een langdurige bescherming tegen vuil, UV-stralen en andere externe invloeden. Het zorgt ervoor dat uw lak beschermd is en een schitterende glans behoudt.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .about-container {
        text-align: center;
        padding: 50px 20px;
        color: #E8D5B7;
        background-color: #000000;
        min-height: calc(100vh - 300px);
    }

    .about-container h1 {
        font-size: 2.5rem;
        color: #E8D5B7;
        margin-bottom: 20px;
        text-shadow: 0 0 20px rgba(232, 213, 183, 0.5);
        word-wrap: break-word;
    }

    .about-container > p {
        color: #e8e8e8;
        font-size: 1.1rem;
        max-width: 800px;
        margin: 0 auto 40px;
        line-height: 1.6;
        word-wrap: break-word;
    }

    .service-description {
        max-width: 900px;
        margin: 0 auto 50px;
    }

    .service-description h2 {
        font-size: 2rem;
        color: #E8D5B7;
        margin-bottom: 20px;
        text-shadow: 0 0 15px rgba(232, 213, 183, 0.3);
        word-wrap: break-word;
    }

    .service-description p {
        color: #e8e8e8;
        font-size: 1.1rem;
        line-height: 1.8;
        word-wrap: break-word;
    }

    .about-images {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .image-card {
        background-color: #111111;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid rgba(232, 213, 183, 0.3);
        box-shadow: 0 4px 8px rgba(232, 213, 183, 0.2);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .image-card:hover {
        transform: translateY(-5px);
        border-color: #E8D5B7;
        box-shadow: 0 8px 20px rgba(232, 213, 183, 0.4);
    }

    .image-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
    }

    .image-card h3 {
        font-size: 1.5rem;
        color: #E8D5B7;
        margin: 20px 20px 10px;
        font-weight: 600;
        word-wrap: break-word;
    }

    .image-card p {
        color: #e8e8e8;
        font-size: 1rem;
        line-height: 1.6;
        margin: 0 20px 20px;
        word-wrap: break-word;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
        .about-images {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
    }

    @media (max-width: 768px) {
        .about-container {
            padding: 40px 15px;
        }

        .about-container h1 {
            font-size: 2rem;
        }

        .about-container > p,
        .service-description p {
            font-size: 1rem;
        }

        .service-description h2 {
            font-size: 1.7rem;
        }

        .about-images {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .image-card {
            max-width: 100%;
        }
    }

    @media (max-width: 480px) {
        .about-container {
            padding: 30px 10px;
        }

        .about-container h1 {
            font-size: 1.5rem;
        }

        .about-container > p,
        .service-description p {
            font-size: 0.95rem;
        }

        .service-description {
            margin-bottom: 30px;
        }

        .service-description h2 {
            font-size: 1.4rem;
        }

        .image-card {
            border-radius: 8px;
        }

        .image-card img {
            height: 180px;
        }

        .image-card h3 {
            font-size: 1.3rem;
            margin: 15px 15px 8px;
        }

        .image-card p {
            font-size: 0.9rem;
            margin: 0 15px 15px;
        }
    }

    @media (max-width: 360px) {
        .about-container h1 {
            font-size: 1.3rem;
        }

        .image-card img {
            height: 150px;
        }
    }
</style>
@endsection
