@extends('layouts.layout')

@section('content')
    <h1 class="text-4xl font-bold text-center my-6 text-yellow-500">Boek een Dienst: {{ $service->name }}</h1>

    <form action="{{ route('booking.store') }}" method="POST" class="max-w-md mx-auto bg-gray-800 p-6 rounded-lg shadow-lg">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">

        <!-- Naam -->
        <div class="mb-4">
            <label for="customer_name" class="block text-white">Naam</label>
            <input type="text" name="customer_name" id="customer_name" required class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- E-mail -->
        <div class="mb-4">
            <label for="customer_email" class="block text-white">E-mail</label>
            <input type="email" name="customer_email" id="customer_email" required class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Datum -->
        <div class="mb-4">
            <label for="date" class="block text-white">Datum</label>
            <input type="date" name="date" id="date" required class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Tijd -->
        <div class="mb-4">
            <label for="time" class="block text-white">Tijd</label>
            <input type="time" name="time" id="time" required class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Opmerkingen -->
        <div class="mb-4">
            <label for="remarks" class="block text-white">Opmerkingen</label>
            <textarea name="remarks" id="remarks" class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
        </div>

        <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400 transition duration-200">Bevestig Boeking</button>
    </form>

    <a href="{{ route('services') }}" class="block text-center text-white mt-6 underline hover:text-yellow-500">Terug naar Diensten</a>
@endsection
