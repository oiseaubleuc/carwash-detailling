@extends('layouts.admin')

@section('title', 'Beheer Tijd Slots')

@section('content')
<div style="width: 100%;">
    <h1 style="color: #E8D5B7; font-size: 2.5rem; margin-bottom: 20px;">Beheer Tijd Slots</h1>

    <!-- Date selector -->
    <div style="margin-bottom: 30px;">
        <form method="GET" action="{{ route('admin.time-slots.index') }}" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
            <label for="date" style="color: #E8D5B7; font-weight: 500; min-width: 120px;">Selecteer Datum:</label>
            <input type="date" name="date" id="date" value="{{ $selectedDate->format('Y-m-d') }}" 
                   style="padding: 8px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #111111; color: #e8e8e8; flex: 1; min-width: 150px; font-size: 16px;">
            <button type="submit" class="btn" style="background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%); color: #000000; padding: 8px 20px; border: 2px solid #E8D5B7; border-radius: 5px; cursor: pointer; font-weight: 600; white-space: nowrap;">
                Bekijk
            </button>
        </form>
    </div>

    @if(session('success'))
        <div style="background-color: #4CAF50; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 8px rgba(76, 175, 80, 0.3);">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    
    @if(session('error'))
        <div style="background-color: #ff6b6b; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 8px rgba(255, 107, 107, 0.3);">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif
    
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

    <!-- Time slots table -->
    <div style="background-color: #111111; border-radius: 8px; padding: 20px; border: 1px solid rgba(232, 213, 183, 0.3); overflow-x: auto;">
        <h2 style="color: #E8D5B7; margin-bottom: 20px;">Tijd Slots voor {{ $selectedDate->format('d-m-Y') }}</h2>
        
        <form method="POST" action="{{ route('admin.time-slots.bulk-update') }}">
            @csrf
            <input type="hidden" name="date" value="{{ $selectedDate->format('Y-m-d') }}">
            
            <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                <thead>
                    <tr style="border-bottom: 2px solid #E8D5B7;">
                        <th style="padding: 15px; text-align: left; color: #E8D5B7;">Tijd</th>
                        <th style="padding: 15px; text-align: left; color: #E8D5B7;">Beschikbaar</th>
                        <th style="padding: 15px; text-align: left; color: #E8D5B7;">Max Boekingen</th>
                        <th style="padding: 15px; text-align: left; color: #E8D5B7;">Huidige Boekingen</th>
                        <th style="padding: 15px; text-align: left; color: #E8D5B7;">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeSlots as $slot)
                    <tr style="border-bottom: 1px solid rgba(232, 213, 183, 0.2);">
                        <td data-label="Tijd" style="padding: 15px; color: #e8e8e8;">{{ $slot->time }}</td>
                        <td data-label="Beschikbaar" style="padding: 15px;">
                            <input type="checkbox" name="slots[{{ $slot->time }}][is_available]" 
                                   {{ $slot->is_available ? 'checked' : '' }} 
                                   style="width: 20px; height: 20px; cursor: pointer;">
                        </td>
                        <td data-label="Max Boekingen" style="padding: 15px;">
                            <input type="number" name="slots[{{ $slot->time }}][max_bookings]" 
                                   value="{{ $slot->max_bookings }}" min="1" 
                                   style="width: 100%; max-width: 100px; padding: 5px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8; font-size: 16px;">
                        </td>
                        <td data-label="Huidige Boekingen" style="padding: 15px; color: #e8e8e8;">
                            <span style="color: {{ $slot->bookings_count >= $slot->max_bookings ? '#ff6b6b' : '#4CAF50' }};">
                                {{ $slot->bookings_count }} / {{ $slot->max_bookings }}
                            </span>
                        </td>
                        <td data-label="Acties" style="padding: 15px;">
                            <form method="POST" action="{{ route('admin.time-slots.destroy', $slot->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Weet je zeker dat je dit tijd slot wilt verwijderen?')" 
                                        style="background-color: #ff6b6b; color: white; padding: 5px 15px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-size: 14px;">
                                    Verwijderen
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div style="margin-top: 20px;">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%); color: #000000; padding: 10px 30px; border: 2px solid #E8D5B7; border-radius: 5px; cursor: pointer; font-weight: 600; font-size: 16px;">
                    Opslaan Wijzigingen
                </button>
            </div>
        </form>
    </div>

    <div style="margin-top: 30px;">
        <a href="{{ route('admin.dashboard') }}" style="color: #E8D5B7; text-decoration: none; font-weight: 500;">← Terug naar Dashboard</a>
    </div>
</div>
@endsection

