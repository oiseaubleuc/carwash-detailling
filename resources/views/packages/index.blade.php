@extends('layouts.layout')

@section('content')
    <div class="packages-container">
        <h2>Kies Uw Pakket</h2>
        <div class="packages">
            @foreach($services as $service)
                <div class="package-card">
                    <h3>{{ $service->name }}</h3>
                    <p>{{ $service->description }}</p>
                    <p class="price">€{{ number_format($service->price, 2) }}</p>
                    <a href="{{ route('packages.show', $service->id) }}" class="choose-btn">Kies dit pakket</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
