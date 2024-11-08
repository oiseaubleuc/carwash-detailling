@extends('layouts.layout')

@section('content')
    <div class="services-container">
        <h1>Onze Services</h1>
        <p>Ontdek onze exclusieve carwash-pakketten, zorgvuldig ontworpen om aan al uw behoeften te voldoen.</p>

        <div class="services-grid">
            <div class="service-card">
                <h2>Basis Pack</h2>
                <p>Een grondige buitenreiniging, inclusief het wassen en drogen van het voertuig.</p>
                <p class="price">€29.99</p>
                <a href="{{ route('book', ['service_id' => 1]) }}" class="book-btn">Kies dit pakket</a>
            </div>

            <div class="service-card">
                <h2>Premium Pack</h2>
                <p>Basisreiniging plus interieurreiniging, ramen, en velgenreiniging.</p>
                <p class="price">€49.99</p>
                <a href="{{ route('book', ['service_id' => 2]) }}" class="book-btn">Kies dit pakket</a>
            </div>

            <div class="service-card">
                <h2>Deluxe Pack</h2>
                <p>Volledige buiten- en interieurreiniging, polijsten, en waxbehandeling voor een luxueuze glans.</p>
                <p class="price">€79.99</p>
                <a href="{{ route('book', ['service_id' => 3]) }}" class="book-btn">Kies dit pakket</a>
            </div>
        </div>
    </div>
@endsection
