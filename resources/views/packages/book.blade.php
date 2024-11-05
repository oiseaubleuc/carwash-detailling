@extends('layouts.layout')

@section('content')
    <div class="booking-container">
        <h2>Boek uw afspraak voor {{ $service->name }}</h2>
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">

            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Telefoonnummer:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="appointment_date">Datum:</label>
                <input type="date" id="appointment_date" name="appointment_date" required>
            </div>

            <button type="submit">Bevestig Boeking</button>
        </form>
    </div>
@endsection
