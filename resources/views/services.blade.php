@extends('layouts.layout')

@section('title', 'Onze Services - MEA Detailing')

@section('content')
    <div class="services-container">
        <h1>Onze Services</h1>
        <p>Ontdek onze exclusieve carwash-pakketten, zorgvuldig ontworpen om aan al uw behoeften te voldoen.</p>

        <div class="services-grid">
            @php
                $services = \App\Models\Service::all();
            @endphp
            @forelse($services as $service)
                <div class="service-card">
                    <h2>{{ $service->name }}</h2>
                    <p>{{ $service->description ?? 'Premium service voor uw voertuig' }}</p>
                    <p class="price">€{{ number_format($service->price ?? 0, 2, ',', '.') }}</p>
                    <a href="{{ route('book', ['service_id' => $service->id]) }}" class="book-btn">
                        <i class="fas fa-calendar-alt"></i> Kies dit pakket
                    </a>
                </div>
            @empty
                <div class="service-card">
                    <h2>Basis Wash</h2>
                    <p>Interior wash</p>
                    <p>Exterior wash</p>
                    <p class="price">€35.00</p>
                    <a href="{{ route('book', ['service_id' => 1]) }}" class="book-btn">
                        <i class="fas fa-calendar-alt"></i> Kies dit pakket
                    </a>
                </div>

                <div class="service-card">
                    <h2>Premium Interior</h2>
                    <p>Interior detailing</p>
                    <p>Car seat shampoo</p>
                    <p>Floor mat shampoo</p>
                    <p class="price">€85.00</p>
                    <a href="{{ route('book', ['service_id' => 2]) }}" class="book-btn">
                        <i class="fas fa-calendar-alt"></i> Kies dit pakket
                    </a>
                </div>

                <div class="service-card">
                    <h2>Premium Full</h2>
                    <p>Interior detailing</p>
                    <p>Car seat shampoo</p>
                    <p>Floor mat shampoo</p>
                    <p>Exterior wash</p>
                    <p class="price">€95.00</p>
                    <a href="{{ route('book', ['service_id' => 2]) }}" class="book-btn">
                        <i class="fas fa-calendar-alt"></i> Kies dit pakket
                    </a>
                </div>

                <div class="service-card">
                    <h2>Polish</h2>
                    <p>Volledige buiten- en interieurreiniging, polijsten, en waxbehandeling voor een luxueuze glans.</p>
                    <p class="price">from €150.00</p>
                    <a href="{{ route('book', ['service_id' => 3]) }}" class="book-btn">
                        <i class="fas fa-calendar-alt"></i> Kies dit pakket
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('styles')
<style>
    .services-container {
        text-align: center;
        padding: 50px 20px;
        background-color: #000000;
        color: #E8D5B7;
        min-height: calc(100vh - 300px);
    }

    .services-container h1 {
        font-size: 2.5rem;
        color: #E8D5B7;
        margin-bottom: 20px;
        text-shadow: 0 0 20px rgba(232, 213, 183, 0.5);
        word-wrap: break-word;
    }

    .services-container p {
        color: #e8e8e8;
        font-size: 1.1rem;
        margin-bottom: 40px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        word-wrap: break-word;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .service-card {
        background-color: #111111;
        color: #e8e8e8;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(232, 213, 183, 0.2);
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(232, 213, 183, 0.3);
        display: flex;
        flex-direction: column;
    }

    .service-card:hover {
        transform: translateY(-5px);
        border-color: #E8D5B7;
        box-shadow: 0 8px 20px rgba(232, 213, 183, 0.4);
    }

    .service-card h2 {
        font-size: 1.5rem;
        color: #E8D5B7;
        margin-bottom: 15px;
        font-weight: 600;
        word-wrap: break-word;
    }

    .service-card p {
        color: #e8e8e8;
        margin-bottom: 10px;
        line-height: 1.6;
        word-wrap: break-word;
    }

    .service-card .price {
        font-size: 1.5rem;
        font-weight: bold;
        color: #E8D5B7;
        margin: 20px 0;
        text-shadow: 0 0 15px rgba(232, 213, 183, 0.3);
    }

    .book-btn {
        background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%);
        color: #000000;
        padding: 12px 25px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        border: 2px solid #E8D5B7;
        box-shadow: 0 4px 6px rgba(232, 213, 183, 0.3);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: auto;
        touch-action: manipulation;
        text-shadow: none;
    }

    .book-btn:hover,
    .book-btn:active {
        background: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(232, 213, 183, 0.5);
        color: #000000;
    }

    .book-btn i {
        font-size: 1rem;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
        .services-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
    }

    @media (max-width: 768px) {
        .services-container {
            padding: 40px 15px;
        }

        .services-container h1 {
            font-size: 2rem;
        }

        .services-container p {
            font-size: 1rem;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .service-card {
            padding: 25px;
        }
    }

    @media (max-width: 480px) {
        .services-container {
            padding: 30px 10px;
        }

        .services-container h1 {
            font-size: 1.5rem;
        }

        .services-container p {
            font-size: 0.95rem;
        }

        .service-card {
            padding: 20px;
        }

        .service-card h2 {
            font-size: 1.3rem;
        }

        .service-card .price {
            font-size: 1.3rem;
        }

        .book-btn {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 360px) {
        .services-container h1 {
            font-size: 1.3rem;
        }

        .service-card {
            padding: 15px;
        }
    }
</style>
@endsection
