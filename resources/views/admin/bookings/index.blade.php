@extends('layouts.admin')

@section('title', 'Beheer Boekingen')

@section('content')
<div style="width: 100%;">
    <h1 class="admin-page-title">Beheer Boekingen</h1>
    
    @if(session('success'))
        <div class="admin-message success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    
    @if(session('error'))
        <div class="admin-message error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif
    
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

    <a href="{{ route('admin.bookings.create') }}" class="admin-btn">
        <i class="fas fa-plus"></i> Nieuwe Boeking Aanmaken
    </a>

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Klantnaam</th>
                    <th>Email</th>
                    <th>Telefoon</th>
                    <th>Dienst</th>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td data-label="Klantnaam">{{ $booking->customer_name ?? 'N/A' }}</td>
                        <td data-label="Email">{{ $booking->customer_email ?? 'N/A' }}</td>
                        <td data-label="Telefoon">{{ $booking->customer_phone ?? 'N/A' }}</td>
                        <td data-label="Dienst">{{ $booking->service->name ?? 'N/A' }}</td>
                        <td data-label="Datum">{{ $booking->booking_time ? \Carbon\Carbon::parse($booking->booking_time)->format('d-m-Y') : 'N/A' }}</td>
                        <td data-label="Tijd" style="color: #E8D5B7; font-weight: 500;">{{ $booking->time_slot ?? 'N/A' }}</td>
                        <td data-label="Acties">
                            <div style="display: flex; flex-direction: column; gap: 8px;">
                                <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="admin-link">Bewerken</a>
                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Weet je zeker dat je deze boeking wilt verwijderen?')" 
                                            class="admin-delete-btn">
                                        Verwijderen
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 30px; color: #e8e8e8;">Geen boekingen gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 30px;">
        <a href="{{ route('admin.dashboard') }}" class="admin-link">
            <i class="fas fa-arrow-left"></i> Terug naar Dashboard
        </a>
    </div>
</div>
@endsection
