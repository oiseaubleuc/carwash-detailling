@extends('layouts.layout') <!-- Verander dit naar de juiste layout die je gebruikt -->

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Aantal gebruikers -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold">Aantal gebruikers</h2>
                <p class="text-2xl">{{ $userCount }}</p>
                <a href="{{ route('admin.users.index') }}" class="text-blue-500 hover:underline">Beheer gebruikers</a>
            </div>

            <!-- Aantal boekingen -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold">Aantal boekingen</h2>
                <p class="text-2xl">{{ $bookingCount }}</p>
                <a href="{{ route('admin.bookings.index') }}" class="text-blue-500 hover:underline">Beheer boekingen</a>
            </div>

            <!-- Aantal diensten -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold">Aantal diensten</h2>
                <p class="text-2xl">{{ $serviceCount }}</p>
                <a href="{{ route('admin.services.index') }}" class="text-blue-500 hover:underline">Beheer diensten</a>
            </div>
        </div>

        <!-- Opties om de zaak te beheren -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold">Beheeropties</h2>
            <ul class="mt-4 space-y-2">
                <li><a href="{{ route('admin.users.index') }}" class="text-blue-500 hover:underline">Beheer Gebruikers</a></li>
                <li><a href="{{ route('admin.bookings.index') }}" class="text-blue-500 hover:underline">Beheer Boekingen</a></li>
                <li><a href="{{ route('admin.services.index') }}" class="text-blue-500 hover:underline">Beheer Diensten</a></li>
                <li><a href="{{ route('admin.users.create') }}" class="text-blue-500 hover:underline">Nieuwe Gebruiker Aanmaken</a></li>
                <li><a href="{{ route('admin.bookings.create') }}" class="text-blue-500 hover:underline">Nieuwe Boekingen Aanmaken</a></li>
                <li><a href="{{ route('admin.services.create') }}" class="text-blue-500 hover:underline">Nieuwe Dienst Aanmaken</a></li>
            </ul>
        </div>
    </div>
@endsection
