@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-orange-500">Admin Dashboard</h1>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            <div class="dashboard-card bg-gray-900 text-white p-6 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <h2 class="text-xl font-semibold">Aantal gebruikers</h2>
                <p class="text-4xl">{{ $userCount }}</p>
                <a href="{{ route('admin.users.index') }}" class="text-orange-400 hover:underline">Beheer gebruikers</a>
            </div>

            <div class="dashboard-card bg-gray-900 text-white p-6 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <h2 class="text-xl font-semibold">Aantal boekingen</h2>
                <p class="text-4xl">{{ $bookingCount }}</p>
                <a href="{{ route('admin.bookings.index') }}" class="text-orange-400 hover:underline">Beheer boekingen</a>
            </div>

            <div class="dashboard-card bg-gray-900 text-white p-6 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <h2 class="text-xl font-semibold">Aantal diensten</h2>
                <p class="text-4xl">{{ $serviceCount }}</p>
                <a href="{{ route('admin.services.index') }}" class="text-orange-400 hover:underline">Beheer diensten</a>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-semibold">Beheeropties</h2>
            <ul class="mt-4 space-y-2">
                <li><a href="{{ route('admin.users.index') }}" class="text-orange-400 hover:underline">Beheer Gebruikers</a></li>
                <li><a href="{{ route('admin.bookings.index') }}" class="text-orange-400 hover:underline">Beheer Boekingen</a></li>
                <li><a href="{{ route('admin.services.index') }}" class="text-orange-400 hover:underline">Beheer Diensten</a></li>
                <li><a href="{{ route('admin.users.create') }}" class="text-orange-400 hover:underline">Nieuwe Gebruiker Aanmaken</a></li>
                <li><a href="{{ route('admin.bookings.create') }}" class="text-orange-400 hover:underline">Nieuwe Boekingen Aanmaken</a></li>
                <li><a href="{{ route('admin.services.create') }}" class="text-orange-400 hover:underline">Nieuwe Dienst Aanmaken</a></li>
            </ul>
        </div>


    </div>
@endsection
