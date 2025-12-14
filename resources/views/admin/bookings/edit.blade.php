@extends('layouts.admin')

@section('title', 'Boeking Bewerken')

@section('content')
<div style="width: 100%; max-width: 800px;">
    <h1 style="color: #E8D5B7; font-size: 2.5rem; margin-bottom: 20px;">Boeking Bewerken</h1>

    @if($errors->any())
        <div style="background-color: #ff6b6b; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(255, 107, 107, 0.3);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Er zijn fouten opgetreden:</strong>
            </div>
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" style="background-color: #111111; padding: 30px; border-radius: 8px; border: 1px solid rgba(232, 213, 183, 0.3);">
            @csrf
            @method('PUT')

        <div style="margin-bottom: 20px;">
            <label for="customer_name" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Klantnaam *</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ $booking->customer_name }}" required
                   style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="customer_email" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Email *</label>
            <input type="email" name="customer_email" id="customer_email" value="{{ $booking->customer_email }}" required
                   style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="customer_phone" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Telefoon</label>
            <input type="text" name="customer_phone" id="customer_phone" value="{{ $booking->customer_phone }}"
                   style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="service_id" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Dienst *</label>
            <select name="service_id" id="service_id" required
                    style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $booking->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="booking_time" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Datum *</label>
            <input type="date" name="booking_time" id="booking_time" value="{{ $booking->booking_time ? \Carbon\Carbon::parse($booking->booking_time)->format('Y-m-d') : '' }}" required
                   style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
            </div>

        <div style="margin-bottom: 20px;">
            <label for="time_slot" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Tijd Slot *</label>
            <select name="time_slot" id="time_slot" required
                    style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
                <option value="16:00" {{ $booking->time_slot == '16:00' ? 'selected' : '' }}>16:00</option>
                <option value="17:00" {{ $booking->time_slot == '17:00' ? 'selected' : '' }}>17:00</option>
                <option value="18:00" {{ $booking->time_slot == '18:00' ? 'selected' : '' }}>18:00</option>
                <option value="19:00" {{ $booking->time_slot == '19:00' ? 'selected' : '' }}>19:00</option>
                <option value="20:00" {{ $booking->time_slot == '20:00' ? 'selected' : '' }}>20:00</option>
                <option value="21:00" {{ $booking->time_slot == '21:00' ? 'selected' : '' }}>21:00</option>
            </select>
            </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn" style="background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%); color: #000000; padding: 10px 30px; border: 2px solid #E8D5B7; border-radius: 5px; cursor: pointer; font-weight: 600; font-size: 16px;">
                Boeking Bijwerken
            </button>
            <a href="{{ route('admin.bookings.index') }}" style="color: #E8D5B7; text-decoration: none; margin-left: 15px;">Annuleren</a>
        </div>
        </form>
    </div>
@endsection
