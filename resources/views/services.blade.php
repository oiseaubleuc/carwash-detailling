@extends('layouts.layout')

@section('content')
    <h1 class="text-4xl font-bold text-center my-6">Onze Diensten</h1>

    <!-- Dynamische services uit de database -->
    <div class="service-list">
        @foreach($services as $service)
            <div class="service-item mb-6 p-4 bg-gray-800 rounded shadow-lg">
                <h3 class="text-xl font-semibold text-yellow-500">{{ $service->name }}</h3>
                <p class="text-gray-300">{{ $service->description }}</p>
                <p class="text-lg font-bold text-white">Prijs: €{{ number_format($service->price, 2, ',', '.') }}</p>
                <!-- Boeken button voor dynamische diensten -->
                <a href="{{ route('booking.create', ['service_id' => $service->id]) }}" class="btn book-button mt-2 inline-block bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400 transition duration-200">Boek Nu</a>
            </div>
        @endforeach
    </div>

    <!-- Statische services met prijzen tussen 20 en 80 euro -->
    <h2 class="text-3xl font-semibold my-4">Statische Diensten</h2>
    <ul class="service-list">
        @php
            $staticServices = [
                [
                    'name' => 'Basic Exterior Wash',
                    'description' => 'Snelle en efficiënte buitenreiniging van uw voertuig met een zachte wasbeurt.',
                    'price' => 20.00,
                    'id' => 1
                ],
                [
                    'name' => 'Interior Vacuum & Dust',
                    'description' => 'Stofzuigen van vloermatten en stoelen, plus afstoffen van oppervlakken in het interieur.',
                    'price' => 25.00,
                    'id' => 2
                ],
                [
                    'name' => 'Standard Wash & Wax',
                    'description' => 'Buitenwasbeurt met een premium waxafwerking voor langdurige glans en bescherming.',
                    'price' => 30.00,
                    'id' => 3
                ],
                // Voeg hier meer statische diensten toe...
            ];
        @endphp

        @foreach($staticServices as $service)
            <li class="service-item mb-6 p-4 bg-gray-800 rounded shadow-lg">
                <h3 class="text-xl font-semibold text-yellow-500">{{ $service['name'] }}</h3>
                <p class="text-gray-300">{{ $service['description'] }}</p>
                <p class="text-lg font-bold text-white">Prijs: €{{ number_format($service['price'], 2, ',', '.') }}</p>
                <a href="{{ route('booking.create', ['service_id' => $service['id']]) }}" class="btn book-button mt-2 inline-block bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400 transition duration-200">Boek Nu</a>
            </li>
        @endforeach
    </ul>
@endsection




















