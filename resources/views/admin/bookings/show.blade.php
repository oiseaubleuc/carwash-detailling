@extends('layouts.admin')

@section('title', 'Boeking Details')

@section('content')
<div style="width: 100%; max-width: 800px;">
    <h1 style="color: #E8D5B7; font-size: 2.5rem; margin-bottom: 20px;">Boeking Details</h1>

    <div style="background-color: #111111; padding: 30px; border-radius: 8px; border: 1px solid rgba(232, 213, 183, 0.3);">
        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Klantnaam</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $booking->customer_name }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Email</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $booking->customer_email }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Telefoon</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $booking->customer_phone ?? 'N/A' }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Dienst</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $booking->service->name ?? 'N/A' }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Datum</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $booking->booking_time ? $booking->booking_time->format('d-m-Y') : 'N/A' }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Tijd Slot</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $booking->time_slot ?? 'N/A' }}</p>
        </div>

        @if($booking->user)
        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Gebruiker</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $booking->user->name }} ({{ $booking->user->email }})</p>
        </div>
        @endif

        <div style="margin-top: 30px;">
            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn" style="background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%); color: #000000; padding: 10px 30px; border: 2px solid #E8D5B7; border-radius: 5px; cursor: pointer; font-weight: 600; font-size: 16px; text-decoration: none; display: inline-block;">
                Bewerken
            </a>
            <a href="{{ route('admin.bookings.index') }}" style="color: #E8D5B7; text-decoration: none; margin-left: 15px;">Terug naar Overzicht</a>
        </div>
    </div>
</div>
@endsection


