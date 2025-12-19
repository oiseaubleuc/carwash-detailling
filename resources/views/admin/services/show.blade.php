@extends('layouts.admin')

@section('title', 'Dienst Details')

@section('content')
<div style="width: 100%; max-width: 800px;">
    <h1 style="color: #E8D5B7; font-size: 2.5rem; margin-bottom: 20px;">Dienst Details</h1>

    <div style="background-color: #111111; padding: 30px; border-radius: 8px; border: 1px solid rgba(232, 213, 183, 0.3);">
        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Naam</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $service->name }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Beschrijving</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $service->description ?? 'Geen beschrijving' }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Prijs</label>
            <p style="color: #e8e8e8; margin: 0;">€{{ number_format($service->price ?? 0, 2, ',', '.') }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Aantal Boekingen</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $service->bookings->count() }}</p>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn" style="background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%); color: #000000; padding: 10px 30px; border: 2px solid #E8D5B7; border-radius: 5px; cursor: pointer; font-weight: 600; font-size: 16px; text-decoration: none; display: inline-block;">
                Bewerken
            </a>
            <a href="{{ route('admin.services.index') }}" style="color: #E8D5B7; text-decoration: none; margin-left: 15px;">Terug naar Overzicht</a>
        </div>
    </div>
</div>
@endsection


