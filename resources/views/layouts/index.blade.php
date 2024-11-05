@extends('layouts.layout')

@section('title', 'Diensten')

@section('content')
    <h1 class="text-4xl font-bold text-center my-6">hehelife</h1>
    <ul class="space-y-4">
        @foreach($services as $service)
            <li class="border p-4 rounded shadow">
                <h3 class="text-xl font-semibold">{{ $service->name }}</h3>
                <p>{{ $service->description }}</p>
                <p class="text-lg font-bold">Prijs: €{{ $service->price }}</p>
                <a href="{{ route('booking.create', ['service_id' => $service['id']]) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Boek nu</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('home') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Terug naar Home</a>
@endsection
