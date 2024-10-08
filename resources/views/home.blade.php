<!-- resources/views/home.blade.php -->
@extends('layouts.layout')

@section('content')
    <h1 class="text-4xl font-bold text-center my-6">Welkom bij onze Car Wash Service!</h1>
    <p class="text-center">Bekijk onze diensten en boek vandaag nog een afspraak.</p>
    <a href="{{ route('services.index') }}" class="btn">Bekijk Diensten</a>
@endsection
