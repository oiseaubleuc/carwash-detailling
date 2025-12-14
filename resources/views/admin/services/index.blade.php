@extends('layouts.admin')

@section('title', 'Beheer Diensten')

@section('content')
<div style="width: 100%;">
    <h1 class="admin-page-title">Beheer Diensten</h1>
    
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

    <a href="{{ route('admin.services.create') }}" class="admin-btn">
        <i class="fas fa-plus"></i> Nieuwe Dienst Aanmaken
    </a>

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td data-label="Naam">{{ $service->name }}</td>
                        <td data-label="Beschrijving">{{ \Illuminate\Support\Str::limit($service->description ?? 'Geen beschrijving', 50) }}</td>
                        <td data-label="Prijs">€{{ number_format($service->price ?? 0, 2, ',', '.') }}</td>
                        <td data-label="Acties">
                            <div style="display: flex; flex-direction: column; gap: 8px;">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="admin-link">Bewerken</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Weet je zeker dat je deze dienst wilt verwijderen?')" 
                                            class="admin-delete-btn">
                                        Verwijderen
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 30px; color: #e8e8e8;">Geen diensten gevonden.</td>
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
