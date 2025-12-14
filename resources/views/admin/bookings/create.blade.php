@extends('layouts.admin')

@section('title', 'Nieuwe Boeking Aanmaken')

@section('content')
<div style="width: 100%; max-width: 800px;">
    <h1 class="admin-page-title">Nieuwe Boeking Aanmaken</h1>

    @if($errors->any())
        <div class="admin-message error">
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

    <form action="{{ route('admin.bookings.store') }}" method="POST" class="admin-form">
        @csrf
        
        <div class="admin-form-group">
            <label for="customer_name" class="admin-form-label">Klantnaam *</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required
                   class="admin-form-input">
        </div>

        <div class="admin-form-group">
            <label for="customer_email" class="admin-form-label">E-mail *</label>
            <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email') }}" required
                   class="admin-form-input">
        </div>

        <div class="admin-form-group">
            <label for="customer_phone" class="admin-form-label">Telefoon</label>
            <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}"
                   class="admin-form-input">
        </div>

        <div class="admin-form-group">
            <label for="service_id" class="admin-form-label">Dienst *</label>
            <select name="service_id" id="service_id" required class="admin-form-select">
                <option value="">Selecteer een dienst...</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="admin-form-group">
            <label for="booking_time" class="admin-form-label">Datum *</label>
            <input type="date" name="booking_time" id="booking_time" value="{{ old('booking_time') }}" required
                   min="{{ date('Y-m-d') }}" class="admin-form-input">
        </div>

        <div class="admin-form-group">
            <label for="time_slot" class="admin-form-label">Tijd Slot *</label>
            <select name="time_slot" id="time_slot" required class="admin-form-select">
                <option value="">Selecteer een tijd...</option>
                <option value="16:00" {{ old('time_slot') == '16:00' ? 'selected' : '' }}>16:00</option>
                <option value="17:00" {{ old('time_slot') == '17:00' ? 'selected' : '' }}>17:00</option>
                <option value="18:00" {{ old('time_slot') == '18:00' ? 'selected' : '' }}>18:00</option>
                <option value="19:00" {{ old('time_slot') == '19:00' ? 'selected' : '' }}>19:00</option>
                <option value="20:00" {{ old('time_slot') == '20:00' ? 'selected' : '' }}>20:00</option>
                <option value="21:00" {{ old('time_slot') == '21:00' ? 'selected' : '' }}>21:00</option>
            </select>
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="admin-form-submit">
                Boeking Aanmaken
            </button>
            <a href="{{ route('admin.bookings.index') }}" class="admin-form-cancel">Annuleren</a>
        </div>
    </form>
</div>
@endsection
