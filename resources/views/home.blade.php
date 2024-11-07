@extends('layouts.layout')

@section('title', 'Welkom bij Eye For Detailing')

@section('content')

    @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <video autoplay muted loop id="backgroundVideo">
        <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
    </video>

    <div class="promotions-container">
        <h2>Onze Promotiepakketten</h2>
        <div class="promotions-grid">
            <div class="promotion-item">
                <h3>Basis Wash</h3>
                <p>Een snelle wasbeurt voor jouw auto.</p>
                <p>Prijs: €20</p>
                <a href="{{ route('book') }}" class="nav-button">Boek nu</a>
            </div>
            <div class="promotion-item">
                <h3>Standaard Detail</h3>
                <p>Een grondige schoonmaak en interieur detail.</p>
                <p>Prijs: €50</p>
                <a href="{{ route('book') }}" class="nav-button">Boek nu</a>
            </div>
            <div class="promotion-item">
                <h3>Volledige Detail</h3>
                <p>Een uitgebreide behandeling voor jouw auto.</p>
                <p>Prijs: €100</p>
                <a href="{{ route('book') }}" class="nav-button">Boek nu</a>
            </div>
        </div>
    </div>

@endsection
