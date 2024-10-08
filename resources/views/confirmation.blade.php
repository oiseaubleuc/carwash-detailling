@extends('layouts.layout')

@section('content')
    <h1 class="text-4xl font-bold text-center my-6">Boeking Bevestigd!</h1>

    <div class="border p-4 rounded shadow bg-gray-800 text-white">
        <h2 class="text-xl font-semibold">Je boeking voor {{ $service->name }} is succesvol!</h2>
        <p>Datum: {{ $booking->date }}</p>
        <p>Tijd: {{ $booking->time }}</p>
        <p>Prijs: €{{ $service->price }}</p>
    </div>

    <a href="{{ route('home') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4 inline-block">Terug naar Home</a>
@endsection
