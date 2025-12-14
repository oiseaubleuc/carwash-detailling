@extends('layouts.layout')

@section('title', 'Boek een Afspraak - MEA Detailing')

@section('content')
<div class="booking-container">
    <h1>Boek een Afspraak</h1>

    <div class="booking-form-wrapper">
        <form method="POST" action="{{ route('booking.submit') }}" id="bookingForm" class="booking-form">
            @csrf

            @if($errors->any())
                <div class="form-message error">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Er zijn fouten opgetreden:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="firstname">Voornaam *</label>
                <input type="text" class="form-control" id="firstname" name="firstname" 
                       value="{{ old('firstname') }}" placeholder="Voer je voornaam in" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail *</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email') }}" placeholder="Voer je e-mail in" required>
            </div>

            <div class="form-group">
                <label for="phone">Telefoonnummer *</label>
                <input type="tel" class="form-control" id="phone" name="phone" 
                       value="{{ old('phone') }}" placeholder="Voer je telefoonnummer in" required>
            </div>

            <div class="form-group">
                <label for="service">Kies een Dienst *</label>
                <select class="form-select" id="service" name="service" required>
                    <option value="">-- Selecteer een dienst --</option>
                    @forelse($services as $service)
                        <option value="{{ $service->id }}" 
                                {{ old('service', request('service_id'), $selectedServiceId ?? null) == $service->id ? 'selected' : '' }}>
                            {{ $service->name }} - €{{ number_format($service->price ?? 0, 2, ',', '.') }}
                        </option>
                    @empty
                        <option value="" disabled>Geen diensten beschikbaar</option>
                    @endforelse
                </select>
                @if($services->isEmpty())
                    <small class="form-help" style="color: #ff6b6b; display: block; margin-top: 5px;">
                        Geen diensten beschikbaar. Neem contact op met de beheerder.
                    </small>
                @endif
            </div>

            <div class="form-group">
                <label for="date">Datum *</label>
                <input type="date" class="form-control" id="date" name="date" 
                       value="{{ old('date') }}" min="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="time_slot">Tijd Slot *</label>
                <select class="form-select" id="time_slot" name="time_slot" required>
                    <option value="">Selecteer eerst een datum...</option>
                </select>
                <small id="time_slot_help" class="form-help">Selecteer eerst een datum om beschikbare tijd slots te zien</small>
            </div>

            <div class="form-group">
                <label for="note">Opmerking</label>
                <textarea id="note" name="note" rows="4" 
                          placeholder="Optionele opmerkingen...">{{ old('note') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-calendar-check"></i> Bevestig Boeking
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('date');
    const timeSlotSelect = document.getElementById('time_slot');
    const timeSlotHelp = document.getElementById('time_slot_help');
    
    // Load slots when date is selected or changed
    dateInput.addEventListener('change', function() {
        const selectedDate = this.value;
        
        if (!selectedDate) {
            timeSlotSelect.innerHTML = '<option value="">Selecteer eerst een datum...</option>';
            timeSlotHelp.textContent = 'Selecteer eerst een datum om beschikbare tijd slots te zien';
            timeSlotHelp.style.color = '#e8e8e8';
            return;
        }
        
        // Show loading state
        timeSlotSelect.innerHTML = '<option value="">Laden...</option>';
        timeSlotSelect.disabled = true;
        timeSlotHelp.textContent = 'Beschikbare slots worden geladen...';
        timeSlotHelp.style.color = '#E8D5B7';
        
        // Fetch available slots
        fetch(`{{ route('api.available-slots') }}?date=${selectedDate}`)
            .then(response => response.json())
            .then(slots => {
                timeSlotSelect.innerHTML = '<option value="">Selecteer een tijd...</option>';
                
                let availableCount = 0;
                slots.forEach(slot => {
                    const option = document.createElement('option');
                    option.value = slot.time;
                    option.textContent = slot.time;
                    
                    if (!slot.available) {
                        option.disabled = true;
                        option.textContent += ' (Vol)';
                    } else {
                        availableCount++;
                    }
                    
                    // Preselect if it was previously selected
                    if (option.value === '{{ old('time_slot') }}') {
                        option.selected = true;
                    }
                    
                    timeSlotSelect.appendChild(option);
                });
                
                timeSlotSelect.disabled = false;
                
                if (availableCount === 0) {
                    timeSlotHelp.textContent = 'Geen beschikbare slots voor deze datum';
                    timeSlotHelp.style.color = '#ff6b6b';
                } else {
                    timeSlotHelp.textContent = `${availableCount} beschikbare slot(s) voor deze datum`;
                    timeSlotHelp.style.color = '#4CAF50';
                }
            })
            .catch(error => {
                console.error('Error fetching slots:', error);
                timeSlotSelect.innerHTML = '<option value="">Fout bij laden van slots</option>';
                timeSlotHelp.textContent = 'Er is een fout opgetreden. Probeer het opnieuw.';
                timeSlotHelp.style.color = '#ff6b6b';
                timeSlotSelect.disabled = false;
            });
    });
    
    // If date is already selected on page load (from old input), trigger change
    if (dateInput.value) {
        dateInput.dispatchEvent(new Event('change'));
    }
});
</script>
@endsection

@section('styles')
<style>
    .booking-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 20px;
        min-height: calc(100vh - 300px);
    }

    .booking-container h1 {
        color: #E8D5B7;
        font-size: 2.5rem;
        margin-bottom: 30px;
        text-align: center;
        text-shadow: 0 0 20px rgba(232, 213, 183, 0.5);
        word-wrap: break-word;
    }

    .booking-form-wrapper {
        background-color: #111111;
        padding: 40px;
        border-radius: 8px;
        border: 1px solid rgba(232, 213, 183, 0.3);
        box-shadow: 0 4px 8px rgba(232, 213, 183, 0.2);
    }

    .booking-form {
        width: 100%;
    }

    .form-message {
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        word-wrap: break-word;
    }

    .form-message.error {
        background-color: #ff6b6b;
        color: white;
    }

    .form-message ul {
        margin: 10px 0 0 0;
        padding-left: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #E8D5B7;
        font-weight: 500;
        margin-bottom: 8px;
        font-size: 1rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 2px solid rgba(232, 213, 183, 0.3);
        border-radius: 5px;
        background-color: #000000;
        color: #e8e8e8;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-group select {
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%23E8D5B7' d='M8 11L3 6h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px;
        padding-right: 40px;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #E8D5B7;
        box-shadow: 0 0 10px rgba(232, 213, 183, 0.3);
        background-color: #111111;
    }

    .form-group select option {
        background-color: #111111 !important;
        color: #e8e8e8 !important;
        padding: 12px !important;
        border: none;
    }

    .form-group select option:hover {
        background-color: rgba(232, 213, 183, 0.1) !important;
    }

    .form-group select option:checked {
        background-color: rgba(232, 213, 183, 0.2) !important;
        color: #E8D5B7 !important;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-group select {
        cursor: pointer;
    }

    .form-help {
        display: block;
        color: #e8e8e8;
        font-size: 0.9rem;
        margin-top: 5px;
        transition: color 0.3s ease;
    }

    .form-actions {
        text-align: center;
        margin-top: 30px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%);
        color: #000000;
        padding: 12px 40px;
        border: 2px solid #E8D5B7;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        touch-action: manipulation;
        text-shadow: none;
    }

    .btn-submit:hover,
    .btn-submit:active {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(232, 213, 183, 0.3);
        background: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 100%);
        color: #000000;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .booking-container {
            padding: 30px 15px;
        }

        .booking-container h1 {
            font-size: 2rem;
            margin-bottom: 25px;
        }

        .booking-form-wrapper {
            padding: 30px 20px;
        }
    }

    @media (max-width: 480px) {
        .booking-container {
            padding: 20px 10px;
        }

        .booking-container h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .booking-form-wrapper {
            padding: 20px 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 10px;
            font-size: 16px; /* Prevents zoom on iOS */
        }

        .form-help {
            font-size: 0.85rem;
        }

        .btn-submit {
            width: 100%;
            padding: 12px 20px;
            justify-content: center;
        }
    }

    @media (max-width: 360px) {
        .booking-container h1 {
            font-size: 1.3rem;
        }

        .booking-form-wrapper {
            padding: 15px 12px;
        }
    }
</style>
@endsection
