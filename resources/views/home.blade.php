@extends('layouts.layout')

@section('title', 'Welkom bij Eye For Detailing')

@section('content')

    @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="hero" style="background-image: url('{{ asset('images/achtergrond.jpg') }}'); height: 100vh; background-size: cover; background-position: center;">
        <a href="{{ route('services') }}" class="nav-button">Diensten</a>
        <a href="{{ route('contact') }}" class="nav-button">Contact</a>
    </div>

@endsection
