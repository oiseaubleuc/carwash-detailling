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


@endsection
